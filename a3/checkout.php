<?php
/* VALIDATE THE STUFF HERE */
session_start();
include_once('resources/constants.php');

$session_set = (isset($_SESSION['cart']['plm']) && isset($_SESSION['cart']['media']));
$post_set = (isset($_POST['credit-card']) && isset($_POST['credit-expiry-year']) && isset($_POST['credit-expiry-month']) && isset($_POST['credit-cvc']));

if (!$session_set) {
    header("Location: shop.php");
}

$valid = false;
$date_valid = false;
$credit_valid = false;

if ($post_set) {
    $count_spaces = 0;
    $last_char_space = false;
    $name_len = strlen($_POST['credit-card']);
    for ($i = 0; $i < $name_len; $i++) {
        if ($_POST['credit-card'][$i] == ' ' || $_POST['credit-card'][$i] == '-') {
            $count_spaces++;
            $last_char_space = true;
            continue;
        }
        if ($last_char_space) {
            if ($_POST['credit-card'][$i] == ' ' || $_POST['credit-card'][$i] == '-') {
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
            if (($_POST['credit-card'][$i] <= '9') && ($_POST['credit-card'][$i] >= '0')) {
                $count_numbers++;
            } else if ($_POST['credit-card'][$i] != ' ') {
                $credit_valid = false;
            }
        }
        if ($count_numbers < 13 || $count_numbers > 18 || !$credit_valid) {

            $credit_valid = false;
        } else {
            $credit_valid = true;
        }
    }
    $expiry_year = filter_var($_POST['credit-expiry-year'], FILTER_VALIDATE_INT);
    $expiry_month = filter_var($_POST['credit-expiry-month'], FILTER_VALIDATE_INT);
    if ($expiry_year === false || $expiry_month === false) {
        $date_valid = false;
    } else if ($expiry_year == date("y")) {
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
}

$valid = $credit_valid && $date_valid;

if ($valid) {
    foreach ($_POST as $key => $value) {
        $_SESSION['checkout'][$key] = $value;
    }
    unset($value);
    $_SESSION['checkout']['address'] = str_replace(array("\r\n", "\r", "\n"), "<br />", $_SESSION['checkout']['address']);
    header("Location: confirmation.php");
}
unset($value);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>

    <meta Name="description"
          Content="Josh Thomas is an Australian comedian. He has starred in Please Like Me. You can purchase Please Like Me at the online shop.">
    <?php include 'resources/head.php'; ?>
    <link rel="stylesheet" type=text/css href="resources/styles/contact.css">
    <link rel="stylesheet" type=text/css href="resources/styles/shop.css">

</head>

<body id="checkout">
<?php include 'resources/header.php'; ?>
<main class="flex-responsive">
    <div class="flex-magicbs">
        <article class="column-9">
            <h2 class="pagetitle column-12 flex-column">Checkout</h2>
            <div class="column-12">
                <form id="cartform" class="column-12 flex-column" method="post" action="checkout.php">
                    <p>Name*: </p> <input type="text" id="name" required type="text" name="firstname" pattern="[a-zA-Z \-\.']+" placeholder="Josh"/>
                    <!-- The Last name. Has same requirements as the first name -->
                    <p>Last Name*: </p><input required id="surname" type="text" name="lastname" pattern="[a-zA-Z \-\.']+" placeholder="Thomas"/>
                    <p>Email Address:*</p><input required id="email" type="email" name="email" placeholder="name@example.com"/>
                    <!-- Phone number. Numbers 0-9, +, Brackets and hyphens -->
                    <p>Contact No*:</p><input id="phone" required type="tel" name="phone" pattern="^(\+|\(|\(\+|\+\(|){0,1}(\d){0,3}(\)){0,1}([ ]){0,1}([\d]){1,12}" placeholder="+613 12345678"/>
                    <p>Shipping and Billing Address:*</p><textarea id="address-field" name="address" class="form-1" pattern="[a-zA-Z \-\'\.\d\n]+" required></textarea>
                    <p>Shipping:</p>
                    <select id="shipping" required name='shipping'>
                        <option value='0.00'>Regular Shipping (Free)</option>
                        <option value='7.00'>Courier ($7.00)</option>
                        <option value='10.50'>Express Courier ($10.50)</option>
                    </select>
                    <p>Credit Card Number:</p>
                    <div id="credit-wrapper" class="flex-row column-12">
                        <?php if ($post_set && !$credit_valid) {
                            echo "<h4 class=\"error\"> Credit card number invalid. Maximum of 3 spaces, all characters must be numbers.</h4>";
                        } ?>
                        <input required id="credit-card" name="credit-card" pattern="^[\d]{1,18}[ |-]{0,1}[\d]{1,18}[ |-]{0,1}[\d]{1,18}[ |-]{0,1}[\d]{1,18}" type="text" size="21" maxlength="21" placeholder="1234566789909"> </input>

                        <p> CVC:</p>
                        <input id="credit-cvc" name="credit-cvc" required pattern="[\d]{3,4}" type="text" size="4" maxlength="4" placeholder="123"> </input>
                    </div>
                    <!-- Set this with javascript -->
                    <p>Credit Card Expiry:</p>
                    <div>
                        <?php if ($post_set && !$date_valid) {
                            echo "<h4 class=\"error\"> Credit card date invalid. Must be after current month</h4>";
                        } ?>
                        <select required id="credit-month" name="credit-expiry-month">
                            <option value="0">MM</option>
                            <?php for ($i = 1; $i <= 12; $i++) {
                                echo "<option value='{$i}' >{$i} </option>";
                            } ?>
                        </select>
                        <?php $year = date("y"); ?>
                        <select required id="credit-year" name="credit-expiry-year">
                            <option value="0">YY</option>
                            <?php for ($i = 1; $i <= 15; $i++) {
                                echo "<option value='{$year}' >{$year} </option>";
                                $year++;
                            } ?>
                        </select>
                        </br><p>Remember Me</p>
                        <input id="remember-me" type="checkbox"></input>
                    </div>
                    <div class="flex-column">
                        <input type="submit" value="Checkout" class="button checkout"></input>
                    </div>
                </form>
            </div>
        </article>

    </div>

</main>
<script src="resources/script/checkout.js"></script>

<?php include 'resources/footer.php'; ?>
</body>
</html>