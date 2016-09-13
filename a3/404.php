<html lang="en">

<head>
    <title>404</title>
    <!-- Import the standard head file -->
    <?php include 'resources/head.php'; ?>
    <link rel="stylesheet" type=text/css href="resources/styles/404.css">

</head>

<body>

    <?php include 'resources/header.php'; ?>
    <main class="drop-shadow-left-right flex-responsive">
        <!-- I knew why this is needed, but for some reason stuff needs a double flex enclosure to work -->
        <div class="flex-magicbs">
            
            <article class="column-9 flex-responsive">
             <div>
                 <h2>Not Found</h2>
            </div>
            <!-- A span that holds the fancy 404 text in a row -->
            <span> 
                <h1 id="text-404">4
                    <!-- Puts an image inside the O --><span id="insideimage">O</span>
                4</h1>
            </span>

            <span>We are sorry, but due to a unforseen error the page you were after was sucked into an alternate dimension. Please try a different page.</span>
             <!-- Original image below sourced for educational purposes:  https://twitter.com/joshthomas87 -->
            <!-- Original image below sourced for educational purposes:  http://www.lrdc.pitt.edu/schunn/research/peers.html -->

            </article>
            
            <!-- Side bar social lengths -->
                <aside class="column-2 flex-column outer-highlight-box">
                    <div class="inner-highlight-box">
                        Personal Social
                        <ul class="fa-ul">
                            <li><i class="fa fa-li fa-twitter" aria-hidden="true"></i><a href="https://twitter.com/joshthomas87">Twitter</a></li>
                            <li><i class="fa fa-li fa-facebook" aria-hidden="true"></i><a href="https://www.facebook.com/officialjoshthomas">Facebook</a></li>
                            <li><i class="fa fa-li fa-microphone" aria-hidden="true"></i><a href="https://itunes.apple.com/au/podcast/josh-thomas-and-friend/id292322464">Podcast</a></li>
                            <li><i class="fa fa-li fa-instagram" aria-hidden="true"></i><a href="https://www.instagram.com/joshthomas87/">Instagram</a></li>
                            <li><i class="fa fa-li fa-tumblr" aria-hidden="true"></i><a href="http://joshthomas87.tumblr.com">Tumblr</a></li>
                        </ul>
                    </div>
                    <div class="inner-highlight-box">
                        Please Like Me Social
                        <ul class="fa-ul">

                            <li><i class="fa fa-li fa-twitter" aria-hidden="true"></i><a href="http://twitter.com/Please_like_me">Twitter</a></li>
                            <li><i class="fa fa-li fa-facebook" aria-hidden="true"></i><a href="https://www.facebook.com/pleaselikemeABC2">Facebook</a></li>
                            <li><i class="fa fa-li fa-instagram" aria-hidden="true"></i><a href="http://instagram.com/pleaselikeme_">Instagram</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </main>
        <?php
include 'resources/footer.php';
?>
</body>

</html>