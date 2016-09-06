<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop</title>

    <meta Name="description" Content="Josh Thomas is an Australian comedian. He has starred in Please Like Me. You can purchase Please Like Me at the online shop.">
    <?php include 'resources/head.php'; ?>
    <link rel="stylesheet" type=text/css href="resources/styles/shop.css">

</head>

<body id="shop">
    <?php include 'resources/header.php'; ?>
    <main class="flex-responsive">
        <div class="flex-magicbs">
            <article class="column-9">
                <h2 class="pagetitle column-12 flex-row">Buy Stuff I Guess?</h2>
                <div class="column-12">
                    <form id="cartform" method="post" action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php">
                        <div class="flex-row">
                            <?php 
                            while(true){
                            <div class="shop-item column-6">
                                <h3>Please Like Me: Season 1</h3>
                                <div class="swap-container">
                                    <a class="button moreinfo" href="#">More Info</a>
                                    <p>$17.00</p>
                                    <span>Add to cart: <input type="number" name="plm[s1]" min="0" max="5" value="0"></span>
                                    <div class="front">
                                        <img src="resources/images/s1.jpg" alt="Season 1 Cover Art" width="100px">
                                        <ul>
                                            <!-- Original image below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-dvd-s1 -->
                                            <li>Released in 2013</li>
                                            <li>6 Episodes</li>
                                        </ul>
                                    </div>
                                    <div class="back">
                                        <details>
                                            <summary>A warm and hilarious journey</summary>
                                            <!-- Original text below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-dvd-s1 -->
                                            Based on the award-winning comedy of Josh Thomas, the six-part series is about cavoodles, custard tarts, boyfriends and girlfriends. Mostly, though, it’s about growing up quickly and realising that your parents are not heroes, but big dopes with no idea
                                            what’s going on – just like you.
                                        </details>
                                        
                                    </div>
                                </div>
                            </div>
                            }
                            ?>
                        </div>
                        <select name='shipping'> 
                                    <option value= ' ' selected> Please Select </option>
                                    <option value= '0.00' >Regular Shipping (Free)</option>
                                    <option value= '7.00' >Courier ($7.00)</option>
                                    <option value= '10.50'>Express Courier ($10.50)</option>
                                    </select>
                                    <!-- Set this with javascript -->
                                    <p id="shipping-amount">0</p>
                                    <input type="month" name="credit-expiry">Credit Card Expiry Date </input>
                        <div class="flex-row">
                            <input type="submit" value="Checkout" class="button checkout"></input>
                        </div>
                    </form>
                </div>
            </article>
            
        </div>

    </main>

    <?php include 'resources/footer.php'; ?>
</body>
