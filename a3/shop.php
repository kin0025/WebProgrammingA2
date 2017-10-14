<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop</title>

    <meta Name="description"
          Content="Josh Thomas is an Australian comedian. He has starred in Please Like Me. You can purchase Please Like Me at the online shop.">
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

                <!-- Shop form -->
                <form id="shopform" method="post" action="cart.php">
                    <!-- A row for the first two items. Wraps for resonsiveness-->
                    <div class="flex-row">

                        <!-- Season 1 shop item All items are revered in order via flexbox-->
                        <div class="shop-item">
                            <h3>Please Like Me: Season 1</h3>
                            <div class="swap-container">

                                <span>Subtotal:<input type="text" id="s1total" class="total" size="7" readonly/></span>
                                <p>$17.00</p>
                                <span>Add to cart: <input id="s1amount"
                                                          oninput="calculateTotal();calculateSubTotal(this,17);saveCart(this)"
                                                          type="number" name="plm[s1]" min="0" max="5" value="0"></span>
                                <a class="button moreinfo" href="#">More Info</a>
                                <div class="front">
                                    <div class="flex-row">
                                        <img src="resources/images/s1.jpg" alt="Season 1 Cover Art">
                                        <ul>
                                            <!-- Original image below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-dvd-s1 -->
                                            <li>Released in 2013</li>
                                            <li>6 Episodes</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="details">
                                        <h4>A warm and hilarious journey</h4>
                                        <!-- Original text below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-dvd-s1 -->
                                        Based on the award-winning comedy of Josh Thomas, the six-part series is about
                                        cavoodles, custard tarts, boyfriends and girlfriends. Mostly, though, it’s about
                                        growing up quickly and realising that your parents are not heroes, but big dopes
                                        with no idea
                                        what’s going on – just like you.
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Season 2 shop item All items are revered in order via flexbox-->
                        <div class="shop-item">
                            <h3>Please Like Me: Season 2</h3>
                            <div class="swap-container">
                                <span>Subtotal:<input type="text" id="s2total" class="total" size="7" readonly/></span>
                                <p>$22.50</p>

                                <span>Add to cart: <input id="s2amount"
                                                          oninput="calculateTotal();calculateSubTotal(this,22.50);saveCart(this)"
                                                          type="number" name="plm[s2]" min="0" max="5" value="0"></span>
                                <a class="button moreinfo" href="#">More Info</a>

                                <!-- Displayed when not hovered over -->
                                <div class="front">
                                    <!-- Original image below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-season-2-2dvd -->
                                    <div class="flex-row">

                                        <img src="resources/images/s2.jpg" alt="Season 2 Cover Art">
                                        <ul>
                                            <li>Released in 2014</li>
                                            <li>10 Episodes</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Displayed when hovered over -->
                                <div class="back">
                                    <!-- Original text below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-season-2-2dvd -->
                                    <div class="details">
                                        <h4>Best new comedy</h4>
                                        The coming-of-age comedy returns having received critical acclaim in Australia
                                        and the USA, where it was hailed as “best new comedy”. The award-winning Please
                                        Like Me is back for a second season, written by and starring Josh Thomas.
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Season 3 shop item All items are revered in order via flexbox-->
                        <div class="shop-item">
                            <h3>Please Like Me: Season 3</h3>
                            <div class="swap-container">

                                <span>Subtotal:<input type="text" id="s3total" size="7" class="total" readonly/></span>
                                <p>$26.75</p>

                                <span>Add to cart: <input id="s3amount"
                                                          oninput="calculateTotal();calculateSubTotal(this,26.75);saveCart(this)"
                                                          type="number" name="plm[s3]" min="0" max="5" value="0"></span>
                                <a class="button moreinfo" href="#">More Info</a>

                                <!-- Displayed when not hovered over -->
                                <div class="front">
                                    <div class="flex-row">

                                        <!-- Original image below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-s3-2dvd -->
                                        <img src="resources/images/s3.jpg" alt="Season 3 Cover Art">

                                        <ul>
                                            <li>Released in 2015</li>
                                            <li>10 Episodes</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Displayed when hovered over -->
                                <div class="back">
                                    <!-- Original text below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-s3-2dvd -->
                                    <div class="details">
                                        <h4>Hilariously awkward</h4>Kicking off with a half-hour romcom and ending with
                                        an unforgettable family Christmas lunch, this season is filled with food, sex,
                                        drugs, dancing, singing, secrets and a transgender
                                        chicken.
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="shop-item">
                            <h3>Please Like Me: Season 4</h3>
                            <div class="swap-container">
                                <p>$50</p>
                                <span>Add to cart: <input style="background-colour:red;cursor:not-allowed;"
                                                          type="number" name="plm[s4]" min="0" max="5" value="0"
                                                          disabled></span>

                                <!-- Displayed when not hovered over -->
                                <a class="button moreinfo" href="#">More Info</a>
                                <div class="front">
                                    <ul>
                                        <li>Coming soon in 2016</li>
                                    </ul>
                                </div>

                                <!-- Displayed when hovered over -->
                                <div class="back">
                                    <div class="details">
                                        <h4>Broadcasting 2016</h4>
                                        <p>Season 4 has wrapped up filming and will be released later in the year. Look
                                            for it on your local distributing broadcaster or on one of the avaliable
                                            store options</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <span>Total:<input type="text" id="total" size="7" class="total" readonly/></span>
                    <div class="flex-row">
                        <button name="media" value="DVD" type="submit" class="button checkout column-1">Buy DVDs
                        </button>
                        <button name="media" value="BluRay" type="submit" class="button checkout column-1">Buy BluRay
                        </button>
                    </div>
                </form>
            </div>
        </article>

        <!-- A sidebar with links to retailers -->
        <aside class="column-2 flex-column outer-highlight-box">
            <h4>Other places to get Please Like Me</h4>
            <div class="inner-highlight-box">
                <i class="fa fa-globe" aria-hidden="true"></i> Australia
                <ul class="fa-ul">
                    <li><i class="fa fa-li fa-television" aria-hidden="true"></i><a
                            href="http://www.abc.net.au/tv/programs/please-like-me/">Airs on ABC</a></li>
                    <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 1</li>
                    <ul class="fa-ul">

                        <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a
                                href="https://itunes.apple.com/au/tv-season/please-like-me-season-1/id616877503?showLC=true">iTunes</a>
                        </li>
                    </ul>
                    <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 2</li>
                    <ul class="fa-ul">

                        <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a
                                href="https://itunes.apple.com/au/tv-season/please-like-me-season-2/id906508728">iTunes</a>
                        </li>
                    </ul>
                    <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 3</li>
                    <ul class="fa-ul">

                        <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a
                                href="https://itunes.apple.com/au/tv-season/please-like-me-season-3/id1047334958">iTunes</a>
                        </li>
                    </ul>
                    <li><i class="fa fa-li fa-play" aria-hidden="true"></i><a
                            href="http://iview.abc.net.au/collection/please-like-me-series-1-2">iView</a></li>
                </ul>
            </div>
            <div class="inner-highlight-box">
                <i class="fa fa-globe" aria-hidden="true"></i> USA
                <ul class="fa-ul">
                    <li><i class="fa fa-li fa-television" aria-hidden="true"></i><a
                            href="http://www.takepart.com/pivot/please-like-me">Airs on pivot</a></li>

                    <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 1</li>
                    <ul class="fa-ul">
                        <li><i class="fa fa-li fa-apple" aria-hidden="true"> </i><a
                                href="https://itunes.apple.com/au/tv-season/please-like-me-season-1/id616877503?showLC=true">iTunes</a>
                        </li>
                        <li><i class="fa fa-li fa-amazon" aria-hidden="true"></i><a
                                href="https://www.amazon.com/Rhubarb-and-Custard/dp/B00G5Z4VMM/ref=sr_1_1?s=instant-video&ie=UTF8&qid=1444384957&sr=1-1&keywords=please+like+me">Amazon
                                Video</a></li>
                        <li><i class="fa fa-li fa-play" aria-hidden="true"></i> <a
                                href="http://www.hulu.com/please-like-me">Hulu</a></li>
                    </ul>
                    <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 2</li>
                    <ul class="fa-ul">
                        <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a
                                href="https://itunes.apple.com/au/tv-season/please-like-me-season-2/id906508728">iTunes</a>
                        </li>
                        <li><i class="fa fa-li fa-amazon" aria-hidden="true"></i> <a
                                href="https://www.amazon.com/Milk/dp/B00MJOADIO/ref=sr_1_2?s=instant-video&ie=UTF8&qid=1444384957&sr=1-2&keywords=please+like+me">Amazon
                                Video</a></li>
                        <li><i class="fa fa-li fa-play" aria-hidden="true"></i> <a
                                href="http://www.hulu.com/please-like-me">Hulu</a></li>
                    </ul>
                    <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 3</li>
                    <ul class="fa-ul">
                        <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a
                                href="https://itunes.apple.com/au/tv-season/please-like-me-season-3/id1047334958">iTunes</a>
                        </li>
                        <li><i class="fa fa-li fa-amazon" aria-hidden="true"></i> <a href="http://amzn.com/B016Q9W2NQ">Amazon
                                Video</a></li>
                    </ul>
                </ul>
            </div>

            <div class="inner-highlight-box">
                <i class="fa fa-globe" aria-hidden="true"></i> Canada
                <ul class="fa-ul">
                    <li><i class="fa fa-li fa-television" aria-hidden="true"></i><a
                            href="http://www.cbc.ca/pleaselikeme/">Airs on CBC</a></li>

                    <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 1</li>
                    <ul class="fa-ul">

                        <li><i class="fa fa-li fa-apple" aria-hidden="true"> </i><a
                                href="https://itunes.apple.com/ca/tv-season/please-like-me.-season-1/id1021317895">iTunes</a>
                        </li>
                    </ul>
                    <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 2</li>
                    <ul class="fa-ul">

                        <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a
                                href="https://itunes.apple.com/ca/tv-season/please-like-me.-season-2/id1021320142">iTunes</a>
                        </li>
                    </ul>

                </ul>
            </div>
        </aside>
    </div>

</main>
<script src="resources/script/shop.js"></script>
<script>    document.onload = loadCart(), calculateTotal(), calculateSubTotal(document.getElementById('s1amount'), 17), calculateSubTotal(document.getElementById('s2amount'), 22.5), calculateSubTotal(document.getElementById('s3amount'), 26.75);
</script>
<?php include 'resources/footer.php'; ?>
</body>
