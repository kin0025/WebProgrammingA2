<?php
session_start();

$SEASON_VALUES = array('s1' => '17.00', 's2' =>'22.50','s3' =>'26.75','s4'=>'50.00');
$total = 0;

$post_valid = TRUE;
$purchased_items = 0;

$session_set = (isset($_SESSION['plm']) && isset($_SESSION['media']));
$post_cart_set = (isset($_POST['plm']) && isset($_POST['media']));

$cart_errors_encoutered = FALSE;
if(!$session_set){
    if(!$post_cart_set){
        $post_valid = FALSE;
    }else{
        $_SESSION['plm'] = $_POST['plm'];
    }
}

if($post_cart_set){
    $_SESSION['media'] = $_POST['media'];
}

if($session_set && $post_cart_set){
    foreach($_SESSION['plm'] as $key => &$value){
        if(is_valid_quantity(($value + $_POST['plm'][$key]))){
            $value += $_POST['plm'][$key];
        }else{
            $cart_errors_encountered = TRUE;
        }
    }
}


if(isset($_POST['remove']) && isset($_SESSION['plm'])){
    $post_valid = TRUE;
    $_SESSION['plm'][$_POST['remove']] = 0;
}

if(isset($_POST['checkout'])){
    header("Location: checkout.php");
}

if($post_valid){
    foreach($_SESSION['plm'] as $value){
        if(!is_valid_quantity($value)){
            $value = 0;
        }
    }    
}


if(!$post_valid){
    header("Location: shop.php"); 
}else {
    foreach($_SESSION['plm'] as $value)
    $purchased_items += $value;
}

foreach($_SESSION['plm'] as $key => $value){
$season_subtotal[$key] = $value * $SEASON_VALUES[$key];
$total += $value * $SEASON_VALUES[$key];
}


function is_valid_quantity($arg)
{
    $return = FALSE;
    if($arg >=0 && $arg <= 5) $return = TRUE;
    return $return;
}

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Cart</title>

        <meta Name="description" Content="Josh Thomas is an Australian comedian. He has starred in Please Like Me. You can purchase Please Like Me at the online shop.">
        <?php include 'resources/head.php'; ?>
        <link rel="stylesheet" type=text/css href="resources/styles/shop.css">
        <script src="resources/script/shop.js"></script>

    </head>

    <body id="checkout">
        <?php include 'resources/header.php'; ?>
        <main class="flex-responsive">
            <div class="flex-magicbs">
                <article class="column-9">
                    <h2 class="pagetitlecolumn-12 flex-row">Checkout</h2>
                    <div class="column-12">
                        <a href="shop.php" class="button">
                            Return to shop
                        </a>
                        <!-- Shop form -->
                        <form class="flex-column column-12" id="shopform" method="post" action="cart.php">
                            <!-- A row for the first two items. Wraps for resonsiveness-->
                            <div class="flex-row">
                                <?php
         if($purchased_items == 0){
            echo "<h1> No items purchased. Go to the shop to add items to your cart.</h1>";   
         }else{$i = 0;
                            foreach($_SESSION['plm'] as $season => $value){
                                $i++;
                            if($value != 0){
                            echo <<< EOT
                            <div class="shop-item column-4 ">
                                <div class="flex-column">

                                    <div>
                                        <!-- Original image below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-dvd-s1 -->
                                        <img src="resources/images/s{$i}.jpg" alt="Season {$i} Cover Art">
                                    </div>
                                    <div class="flex-column">
                                        <h3 class="column-12">Please Like Me: Season {$i}</h3>
                                        <span class="column-12">Quantity: {$value}</br>
                                        Subtotal: ${$season_subtotal[$season]}</span>
                                        <button name="remove" value="{$season}" type="submit" class="button moreinfo">Remove</button>
                                    </div>
                                </div>
                            </div>
EOT;
                            }
                            }
         }
         if($cart_errors_encoutered){
             echo "<h1> Some items had invalid values. They have not been changed. Try resubmitting</h1>";
         }
?>

                            </div>
                            <span> Media Type: <?php echo $_SESSION['media']  ?></span>
                            <span>Total: $<?php echo $total ?></span>
                            <?php          if($purchased_items > 0){

 echo                           "<input name=\"checkout\" type=\"submit\" value=\"Checkout\" class=\"button checkout column-6\"></input>";
}?>
                        </form>
                    </div>
                </article>
            </div>

        </main>

        <?php include 'resources/footer.php'; ?>
    </body>
