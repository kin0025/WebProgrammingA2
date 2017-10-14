<?php
session_start();

include_once('resources/constants.php');
$total = 0;

$purchased_items = 0;

$session_set = (isset($_SESSION['cart']['plm']) && isset($_SESSION['cart']['media']) && isset($_SESSION['checkout']));

$cart_errors_encountered = FALSE;
$success = false;

$checkout = $_SESSION['checkout'];
$cart = $_SESSION['cart'];

if (!$session_set) {
    header("Location: checkout.php");
}


$valid = false;
$date_valid = false;
$credit_valid = false;

$options = array(
    'options' => array(
        'default' => 0,
    ),
);

$count_spaces = 0;
$last_char_space = false;
$name_len = strlen($checkout['credit-card']);
for ($i = 0; $i < $name_len; $i++) {
    if ($checkout['credit-card'][$i] == ' ' || $checkout['credit-card'][$i] == '-') {
        $count_spaces++;
        $last_char_space = true;
    }
    if ($last_char_space) {
        if ($checkout['credit-card'][$i] == ' ') {
            $credit_valid = false;
        }
    } else {
        $last_char_space = false;
    }
}
if ($count_spaces > 3) {
    $credit_valid = false;
} else {
    $credit_valid = true;
}
if ($credit_valid) {
    $count_numbers = 0;
    for ($i = 0; $i < $name_len; $i++) {
        if (($checkout['credit-card'][$i] <= '9') && ($checkout['credit-card'][$i] >= '0')) {
            $count_numbers++;
        } else if ($checkout['credit-card'][$i] != ' ') {
            $credit_valid = false;
        }
    }
    if ($count_numbers < 13 || $count_numbers > 18 || !$credit_valid) {

        $credit_valid = false;
    } else {
        $credit_valid = true;
    }
}
$expiry_year = filter_var($checkout['credit-expiry-year'], FILTER_VALIDATE_INT, $options);
$expiry_month = filter_var($checkout['credit-expiry-month'], FILTER_VALIDATE_INT, $options);
if ($expiry_year == date("y")) {
    if ($expiry_month > date("n")) {
        $date_valid = true;
    } else {
        $date_valid = false;

    }
} else if ($expiry_year > date("y")) {
    $date_valid = true;
} else {
    $date_valid = false;
}


if ($session_set) {
    foreach ($cart['plm'] as $key => &$value) {
        if (!is_valid_quantity($cart['plm'][$key])) {
            $cart_errors_encountered = true;
        }
    }
    unset($value);
}


$valid = $credit_valid && $date_valid && !$cart_errors_encountered;

switch ($checkout['shipping']) {
    case '0.00':
        $shipping = 'Standard';
        break;
    case '7.00':
        $shipping = 'Courier';
        break;
    case '10.50':
        $shipping = 'Express Courier';
        break;
    default:
        $valid = false;
}

if (!$valid) {
    header("Location: checkout.php");
}

foreach ($cart['plm'] as $key => $value) {
    $season_subtotal[$key] = number_format ( $value * $SEASON_VALUES[$key] , $decimals = 2 , $dec_point = "." , $thousands_sep = "," );
    $total += $value * $SEASON_VALUES[$key];
    $purchased_items += $value;

}
unset($value);

$total += filter_var($checkout['shipping'], FILTER_VALIDATE_FLOAT, $options);

$total =  number_format ( $total , $decimals = 2 , $dec_point = "." , $thousands_sep = "," );


function is_valid_quantity($arg)
{
    $return = FALSE;
    $arg = intval($arg);
    if (!is_int($arg)) {
        return FALSE;
    }
    if (($arg >= 0) && ($arg <= 5)) {
        $return = TRUE;
    }
    return $return;
}

if (isset($_POST['checkout']) && $session_set) {
    $success = true;

    if ($_POST['checkout'] == 'Confirm') {
        //save stuff to file
        $file = fopen('orders.csv', 'a');
        if ($file == null) {
            $file_error_encountered = true;
        } else {
            flock($file, LOCK_EX);
            fwrite($file, "'{$checkout['firstname']}','{$checkout['lastname']}','{$checkout['email']}','{$checkout['phone']}','{$checkout['address']}','{$shipping}','{$cart['plm']['s1']}','{$cart['plm']['s2']}','{$cart['plm']['s3']}','{$cart['media']}'\n");
            flock($file, LOCK_UN);
            fclose($file);
            $file_error_encountered = false;
        }
    } else {
        session_destroy();
        header("Location: shop.php");

    }
} else {
    $success = false;
}
$cclen = strlen($checkout['credit-card']);
$last_four_cc = 'xxxx-xxxx-xxxx-' . substr($checkout['credit-card'], $cclen - 4)

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Confirm</title>

    <meta Name="description"
          Content="Josh Thomas is an Australian comedian. He has starred in Please Like Me. You can purchase Please Like Me at the online shop.">
    <?php include 'resources/head.php';
    if (!(isset($_POST['checkout']) && $session_set)) {
        echo "<link rel=\"stylesheet\" type=text/css href=\"resources/styles/shop.css\">";
    } else {
        echo "<link rel=\"stylesheet\" type=text/css href=\"resources/styles/reciept.css\" media=\"screen, projection\">";
        echo "<link rel=\"stylesheet\" type=text/css href=\"resources/styles/print.css\" media=\"print\">";
    }
    ?>
</head>

<body id="checkout">

<?php
include_once 'resources/header.php';
?>
<main class="flex-responsive">
    <div class="flex-magicbs">
        <article class="column-9">
            <h2 class="pagetitlecolumn-12 flex-row"><?php if ($success) {
                    echo 'Receipt';
                } else {
                    echo 'Checkout';
                } ?></h2>
            <div class="column-12">

                <!-- Shop form -->
                <form class="column-12" id="shopform" method="post" action="confirmation.php">
                    <!-- A row for the first two items. Wraps for resonsiveness-->
                    <div class="flex-row shop-item">

                        <div><span class='bold'>Media Type: </span><span> <?php echo $cart['media'] ?></br></span></div>
                    </div>
                    <div class="shop-item">
                        <div><span
                                class='bold'>Name: </span><span><?php echo "{$checkout['firstname']} {$checkout['lastname']}" ?></span>
                        </div>
                        <div><span class='bold'>Email: </span><span><?php echo $checkout['email'] ?></span></div>
                        <div><span class='bold'>  Phone: </span><span><?php echo $checkout['phone'] ?></span></div>
                    </div>
                    <div class="shop-item">
                        <span class='bold'> Address: </span><span
                            class='left-indent'><?php echo $checkout['address'] ?></span>
                    </div>
                    <?php if (!$success) {
                        $string = 'flex-row';
                    } else {
                        $string = '';

                    }
                    echo "<div class='$string'>";

                    if ($purchased_items == 0) {
                        echo "<h1> No items purchased. Go to the shop to add items to your cart.</h1>";
                    } else if (isset($_POST['checkout']) && $session_set) {
                        if ($file_error_encountered) {
                            echo "<h4 class=\"error\"> Error saving your order. Please contact us to make an order.</h4>";
                        }
                    }


                    $i = 0;
                    if (!$success) {
                        foreach ($cart['plm'] as $season => $value) {
                            $i++;
                            if ($value != 0) {
                                echo <<< EOT
                                    <div class="shop-item confirm flex-row">
                                    <img src="resources/images/s{$i}.jpg" alt="Season {$i} Cover Art">
                                    <div class="column-6">
                                    <p><span class="bold">
                                    Please Like Me: Season {$i}
                                    </span>
                                    </br>
                                    Quantity: <span id="{$season}amount">{$value}
                                    </br>
                                    Subtotal: \${$season_subtotal[$season]}
                                    </p>
                                    </div>
                                </div>
EOT;
                            }
                        }
                        echo '</div>';
                    } else {
                        echo <<< EOT
                            <table >
                            <tr class='item'> 
                            <th > Description</th >
                            <th > Unit Price </th >
                            <th > Quantity</th >
                            <th > Amount</th >
                            </tr >
EOT;
                        $i = 0;
                        foreach ($cart['plm'] as $season => $value) {
                            $i++;
                            if ($value != 0) {
                                echo <<< EOT
                                    <tr>
                                    <td>
                                    Please Like Me: Season {$i}
                                    </td>
                                    <td>
                                    \${$SEASON_VALUES[$season]}
                                    </td>
                                    <td>
                                    {$value}
                                    </td>
                                    <td>
                                    \${$season_subtotal[$season]}
                                    </td>
                                    </tr>
EOT;
                            }

                        }
                        echo "<tr class='block'><td>Shipping:</td><td></td><td>{$shipping}</td><td> \${$checkout['shipping']} </td></tr>";
                        echo "<tr ><td></td><td></td><td class='bold block'>Total</td><td class='block'> \${$total} </td></tr>
                            <tr></br></tr>";
                        echo "<tr><td></td><td></td><td class='bold'>Credit Card</td><td> -\${$total} </td></tr>";
                        echo '</table></br>';
                    }

                    if ($cart_errors_encountered) {
                        echo "<h1 class=\"error\"> Some items had invalid values. You cannot purchase more than 5 of a single item at a time.</h1>";
                    }
                    ?>
                    <div class="flex-row shop-item">
                        <div><span class='bold'> Credit Card: </span><span> <?php echo "{$last_four_cc}"; ?>
                                <div><span class="bold">Expiry: </span><span><?php echo "{$checkout['credit-expiry-month']}/{$checkout['credit-expiry-year']}" ?></span></div>
                                <?php if (!$success) {
                                    echo "<div><span class='bold'>Shipping: </span><span>\${$checkout['shipping']} </span></div>";
                                    echo "<span class='bold'>Total:</span><span>\${$total}</span>";
                                } ?>
                        </div>


                    </div>
                    </br>

                    <div class="flex-row">
                        <?php if ($purchased_items > 0 && !isset($_POST['checkout'])) {
                            echo "<input name=\"checkout\" type=\"submit\" value=\"Cancel\" class=\"button checkout column-6\"></input><input name=\"checkout\" type=\"submit\" value=\"Confirm\" class=\"button checkout column-6\"></input>";
                        } else {
                            echo "<a href='shop.php' class=\"button moreinfo column-6\">Return to Shop</a><a href='javascript:window.print()' class=\"button moreinfo column-6\">Print</a>";


                        } ?></div>
                </form>
            </div>
        </article>
    </div>

</main>
<?php

include_once 'resources/footer.php';

if ($success && !$file_error_encountered) {
    session_destroy();
}
?>
</body>
</html>