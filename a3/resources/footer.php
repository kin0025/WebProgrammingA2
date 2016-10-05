<footer class="flex-column flex-center">
    <!-- A wrapper for footer content. Has different shadowing and styling from the standard footer content -->
    <div id="footer-wrapper" class="flex-responsive ">
        <!-- The links in the footer- import the page list -->
        <div id="footer-links" class="column-3">
            <?php include 'menu-items.php'; ?>
        </div>
        <!-- Wasn't sure what to put here, so a link to the top of the page -->
        <div class="column-1 "><a href="#top">Top</a></div>
                                          <ul class="fa-ul">
                            <li><i class="fa fa-li fa-twitter" aria-hidden="true"></i><a href="https://twitter.com/joshthomas87">Twitter</a></li>
                            <li><i class="fa fa-li fa-facebook" aria-hidden="true"></i><a href="https://www.facebook.com/officialjoshthomas">Facebook</a></li>
                            <li><i class="fa fa-li fa-microphone" aria-hidden="true"></i><a href="https://itunes.apple.com/au/podcast/josh-thomas-and-friend/id292322464">Podcast</a></li>
                            <li><i class="fa fa-li fa-instagram" aria-hidden="true"></i><a href="https://www.instagram.com/joshthomas87/">Instagram</a></li>
                            <li><i class="fa fa-li fa-tumblr" aria-hidden="true"></i><a href="http://joshthomas87.tumblr.com">Tumblr</a></li>
                        </ul>
                      
        <div class="column-6">
            &copy; 2016 - All rights reserved Alex Kinross-Smith (s3603437) and Mukund Boni (s3600893)
        </div>
    </div>
    <?php
    if (strpos($_SERVER['SERVER_NAME'],'csit.rmit.edu.au')!==false) {
include_once('/home/eh1/e54061/public_html/wp/debug.php');
}else{
   include_once('debug-lite.php');
    
} ?>
    <!--/*Font Awesome by Dave Gandy - http://fontawesome.io*/-->
    <script src="https://use.fontawesome.com/bd5483efa9.js"></script>
</footer>
