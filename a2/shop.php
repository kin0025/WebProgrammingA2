<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop</title>

    <meta Name="description" Content="Josh Thomas is an Australian comedian. He has starred in Please Like Me. You can purchase Please Like Me at the online shop.">
    <?php include 'resources/head.php'; ?>
    <link rel="stylesheet" type=text/css href="resources/styles/shop.css">
<script>
function calculateTotal(){
    var totalElement = document.getElementById('total');
    var counts1 = document.getElementById('s1amount').value;
        var counts2 = document.getElementById('s2amount').value;

    var counts3 = document.getElementById('s3amount').value;
    
    var total = (counts1 * 17) + (counts2*22.5) + (counts3*26.75);
    
    totalElement.value = "$" + total;
}
function calculateSubTotal(element,cost){
    var elementID = element.id;
    var subtotal;
    var total = element.value * cost;

    switch(elementID.charAt(1)){
        case '1': subtotal = document.getElementById('s1total');
        break;
           case '2': subtotal = document.getElementById('s2total');
        break;
           case '3': subtotal = document.getElementById('s3total');
        break;
    }
    
    subtotal.value = "$" + total.toFixed(2);
}
</script>
</head>

<body id="shop">
    <?php include 'resources/header.php'; ?>
    <main class="flex-responsive">
        <div class="flex-magicbs">
            <article class="column-9">
                <h2 class="pagetitle column-12 flex-row">Buy Stuff I Guess?</h2>
                <div class="column-12">
                    <form id="shopform" method="post" action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php">
                        <div class="flex-row">
                            <div class="shop-item column-6">
                                <h3>Please Like Me: Season 1</h3>
                                <div class="swap-container">
                                    <a class="button moreinfo" href="#">More Info</a>
                                      <!-- A3 Stuff 
                        <span>Subtotal:<input type="text" id="s1total" /></span>-->
                                    <p>$17.00</p>
                                    <span>Add to cart: <input id="s1amount" oninput="calculateTotal();calculateSubTotal(this,17)" type="number" name="plm[s1]" min="0" max="5" value="0"></span>
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
                            <div class="shop-item column-6">
                                <h3>Please Like Me: Season 2</h3>
                                <div class="swap-container">
                                    <a class="button moreinfo" href="#">More Info</a>
                                    <!-- A3 Stuff
                                    <span>Subtotal:<input type="text" id="s2total"/></span> -->
                                    <p>$22.50</p>                                       

                                    <span>Add to cart: <input  id="s2amount" oninput="calculateTotal();calculateSubTotal(this,22.50)" type="number" name="plm[s2]" min="0" max="5" value="0"></span>
                                    <div class="front">
                                                                    <!-- Original image below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-season-2-2dvd -->

                                        <img src="resources/images/s2.jpg" alt="Season 2 Cover Art" width="100px">
                                        <ul>
                                            <li>Released in 2014</li>
                                            <li>10 Episodes</li>
                                        </ul>
                                    </div>

                                    <div class="back">
                                        <!-- Original text below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-season-2-2dvd -->
                                        <details>
                                            <summary>Best new comedy</summary>
                                            The coming-of-age comedy returns having received critical acclaim in Australia and the USA, where it was hailed as “best new comedy”. The award-winning Please Like Me is back for a second season, written by and starring Josh Thomas.</details>
                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Original image below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-s3-2dvd -->
                            <div class="shop-item column-6">
                                <h3>Please Like Me: Season 3</h3>
                                <div class="swap-container">
                                    <a class="button moreinfo" href="#">More Info</a>
                                    <!-- A3 Stuff 
                                    <span>Subtotal:<input type="text" id="s3total"/></span>-->
                                    <p>$26.75</p>

                                    <span>Add to cart: <input  id="s3amount" oninput="calculateTotal();calculateSubTotal(this,26.75)" type="number" name="plm[s3]" min="0" max="5" value="0"></span>
                                    <div class="front">
                                        <img src="resources/images/s3.jpg" alt="Season 3 Cover Art" width="100px">

                                        <ul>
                                            <li>Released in 2015</li>
                                            <li>10 Episodes</li>
                                        </ul>
                                    </div>

                                    <div class="back">
                                                                        <!-- Original text below sourced for educational purposes: https://shop.abc.net.au/products/please-like-me-s3-2dvd -->
                                        <details>
                                            <summary>Hilariously awkward</summary>Kicking off with a half-hour romcom and ending with an unforgettable family Christmas lunch, this season is filled with food, sex, drugs, dancing, singing, secrets and a transgender
                                            chicken.</details>
                                
                                    </div>
                                </div>
                            </div>
                            <div class="shop-item column-6">
                                <h3>Please Like Me: Season 4</h3>
                                <div class="swap-container">
                                    <a class="button moreinfo" href="#">More Info</a>
                                    <p>$50</p>
                                    <span>Add to cart: <input style="background-colour:red;cursor:not-allowed;" type="number" name="plm[s4]" min="0" max="5" value="0" disabled></span>
                                    <div class="front">
                                        <ul>
                                            <li>Coming soon in 2016</li>
                                        </ul>
                                    </div>

                                    <div class="back">
                                        <h4>Broadcasting 2016</h4>
                                        <p>Season 4 has wrapped up filming and will be released later in the year. Look for it on your local distributing broadcaster or on one of the avaliable store options</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- A3 Stuff -->
                        <input type="text" id="total" style="display:none;"/>
                        <div class="flex-row">
                            <input type="submit" value="Checkout" class="button checkout"></input>
                        </div>
                    </form>
                </div>
            </article>
            <aside class="column-2 flex-column outer-highlight-box">
                <h4>Other places to get Please Like Me</h4>
                <div class="inner-highlight-box">
                    <i class="fa fa-globe" aria-hidden="true"></i> Australia
                    <ul class="fa-ul">
                        <li><i class="fa fa-li fa-television" aria-hidden="true"></i><a href="http://www.abc.net.au/tv/programs/please-like-me/">Airs on ABC</a></li>
                        <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 1</li>
                        <ul class="fa-ul">

                            <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a href="https://itunes.apple.com/au/tv-season/please-like-me-season-1/id616877503?showLC=true">iTunes</a></li>
                        </ul>
                        <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 2</li>
                        <ul class="fa-ul">

                            <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a href="https://itunes.apple.com/au/tv-season/please-like-me-season-2/id906508728">iTunes</a></li>
                        </ul>
                        <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 3</li>
                        <ul class="fa-ul">

                            <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a href="https://itunes.apple.com/au/tv-season/please-like-me-season-3/id1047334958">iTunes</a></li>
                        </ul>
                        <li><i class="fa fa-li fa-play" aria-hidden="true"></i><a href="http://iview.abc.net.au/collection/please-like-me-series-1-2">iView</a></li>
                    </ul>
                </div>
                <div class="inner-highlight-box">
                    <i class="fa fa-globe" aria-hidden="true"></i> USA
                    <ul class="fa-ul">
                        <li><i class="fa fa-li fa-television" aria-hidden="true"></i><a href="http://www.takepart.com/pivot/please-like-me">Airs on pivot</a></li>

                        <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 1</li>
                        <ul class="fa-ul">
                            <li><i class="fa fa-li fa-apple" aria-hidden="true"> </i><a href="https://itunes.apple.com/au/tv-season/please-like-me-season-1/id616877503?showLC=true">iTunes</a></li>
                            <li><i class="fa fa-li fa-amazon" aria-hidden="true"></i><a href="https://www.amazon.com/Rhubarb-and-Custard/dp/B00G5Z4VMM/ref=sr_1_1?s=instant-video&ie=UTF8&qid=1444384957&sr=1-1&keywords=please+like+me">Amazon Video</a></li>
                            <li><i class="fa fa-li fa-play" aria-hidden="true"></i> <a href="http://www.hulu.com/please-like-me">Hulu</a></li>
                        </ul>
                        <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 2</li>
                        <ul class="fa-ul">
                            <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a href="https://itunes.apple.com/au/tv-season/please-like-me-season-2/id906508728">iTunes</a></li>
                            <li><i class="fa fa-li fa-amazon" aria-hidden="true"></i> <a href="https://www.amazon.com/Milk/dp/B00MJOADIO/ref=sr_1_2?s=instant-video&ie=UTF8&qid=1444384957&sr=1-2&keywords=please+like+me">Amazon Video</a></li>
                            <li><i class="fa fa-li fa-play" aria-hidden="true"></i> <a href="http://www.hulu.com/please-like-me">Hulu</a></li>
                        </ul>
                        <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 3</li>
                        <ul class="fa-ul">
                            <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a href="https://itunes.apple.com/au/tv-season/please-like-me-season-3/id1047334958">iTunes</a></li>
                            <li><i class="fa fa-li fa-amazon" aria-hidden="true"></i> <a href="http://amzn.com/B016Q9W2NQ">Amazon Video</a></li>
                        </ul>
                    </ul>
                </div>

                <div class="inner-highlight-box">
                    <i class="fa fa-globe" aria-hidden="true"></i> Canada
                    <ul class="fa-ul">
                        <li><i class="fa fa-li fa-television" aria-hidden="true"></i><a href="http://www.cbc.ca/pleaselikeme/">Airs on CBC</a></li>

                        <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 1</li>
                        <ul class="fa-ul">

                            <li><i class="fa fa-li fa-apple" aria-hidden="true"> </i><a href="https://itunes.apple.com/ca/tv-season/please-like-me.-season-1/id1021317895">iTunes</a></li>
                        </ul>
                        <li><i class="fa fa-li fa-ellipsis-v" aria-hidden="true"></i>Season 2</li>
                        <ul class="fa-ul">

                            <li><i class="fa fa-li fa-apple" aria-hidden="true"></i><a href="https://itunes.apple.com/ca/tv-season/please-like-me.-season-2/id1021320142">iTunes</a></li>
                        </ul>

                    </ul>
                </div>
            </aside>
        </div>

    </main>

    <?php include 'resources/footer.php'; ?>
</body>
