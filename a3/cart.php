<?php
session_start();

$SEASON_VALUES = array('s1' => '17.00', 's2' =>'22.50','s3' =>'26.75','s4'=>'50.00');
$total = 0;

$post_valid = TRUE;
$purchased_items = 0;

$session_set = (isset($_SESSION['cart']['plm']) && isset($_SESSION['cart']['media']));
$post_cart_set = (isset($_POST['plm']) && isset($_POST['media']));

$cart_errors_encountered = FALSE;
if(!$session_set){
    if(!$post_cart_set){
        $post_valid = FALSE;
    }else{
        $_SESSION['cart']['plm'] = $_POST['plm'];
    }
}

if($post_cart_set){
    $_SESSION['cart']['media'] = $_POST['media'];
}


if($session_set && $post_cart_set){
    foreach($_SESSION['cart']['plm'] as $key => &$value){
        /*if(is_valid_quantity($value + $_POST['plm'][$key])){
            $value += $_POST['plm'][$key];
        */
        if(is_valid_quantity($_POST['plm'][$key])){
            $value = $_POST['plm'][$key];
        }else{
            $cart_errors_encountered = TRUE;
        }
    }
    unset($value);
}


if(isset($_POST['remove']) && isset($_SESSION['cart']['plm'])){
    $post_valid = TRUE;
    $_SESSION['cart']['plm'][$_POST['remove']] = 0;
}

if(isset($_POST['checkout'])){
    header("Location: checkout.php");
}

if($post_valid){
    foreach($_SESSION['cart']['plm'] as &$value){
        if(!is_valid_quantity($value)){
            $value = 0;
        }
    }
    unset($value);
}


if(!$post_valid){
    header("Location: shop.php"); 
}

foreach($_SESSION['cart']['plm'] as $key => $value){
    $season_subtotal[$key] = $value * $SEASON_VALUES[$key];
    $total += $value * $SEASON_VALUES[$key];
    $purchased_items += $value;

}
unset($value);


function is_valid_quantity($arg)
{
    $return = FALSE;
    $arg = intval($arg);
    if(!is_int($arg)){
        return FALSE;
    }
    if(($arg >=0) && ($arg <= 5)){
      $return = TRUE;  
    }
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
                            foreach($_SESSION['cart']['plm'] as $season => $value){
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
                                        <span class="column-12">Quantity: <span id="{$season}amount" value="{$value}">{$value}</span></br>
                                        Subtotal: \${$season_subtotal[$season]}</span>
                                        <button name="remove" value="{$season}" type="submit" class="button moreinfo">Remove</button>
                                    </div>
                                </div>
                            </div>
EOT;
                            }
                            }
         }
         if($cart_errors_encountered){
             echo "<h1 class=\"error\"> Some items had invalid values. You cannot purchase more than 5 of a single item at a time.</h1>";
         }
?>

                            </div>
                            <div class='shop-item'>
                            <span> Media Type: <?php echo $_SESSION['cart']['media']  ?></span>
                            <span>Total: $<?php echo $total ?></span></div>
                            <?php          if($purchased_items > 0){

 echo                           "<input name=\"checkout\" type=\"submit\" value=\"Checkout\" class=\"button checkout column-6\"></input>";
}?>
                        </form>
                    </div>
                </article>
            </div>

        </main>

        <script>
        document.onload = saveCart('s1amount'),saveCart('s2amount'),saveCart('s3amount');
         function saveCart(id){
            if(typeof(Storage) !== "undefined"){
                var element = document.getElementById(id);
                if(element != null){
                    localStorage.setItem(id, element.innerHTML);
                }else{
                    localStorage.setItem(id, 0);
                }
            }
        }
        </script>
        <?php include 'resources/footer.php'; ?>
    </body>
