<!DOCTYPE html>
<html lang="en">

<head>

    <title>Contact Us</title>
    <?php
include 'resources/head.php';
?>

        <body id="contact">

            <?php
include 'resources/header.php';
?>
                <main class="drop-shadow-left-right flex-responsive">
                    <div class="flex-magicbs">
                        <article class="column-9">
                            <div class="flex-row">
                                <h2 class="pagetitle">Contact Me Here</h2>
                            </div>
                            <div class="flex-responsive">
                                <form class="column-12">
                                    First Name*  <input type="text" name: firstname /> <br />
                                    Last Name* <input type= "text" name: lastname /> <br />
                                    Email Address* <input type= "text" name: email /> <br />
                                    Contact No* <input type="text" name: phone /> <br />
                                    Event Date* <input type= "text" name: eventdate /> <br />
                                    Event Location <input type= "text" name: eventloc /> <br />
                                    Event Description <input type= "text" name: eventdesc /> <br />
                                    Performance Required <select name= 'Performance Required'> 
                                    <option value= ' ' selected> Please Select </option>
                                    <option value= 'Comedy Spot' > Comedy Spot </option>
                                    <option value= 'MC' > MC </option>
                                    <option value= 'Full Show'> Full Show </option>
                                    <option value= 'Other'> Other </option>
                                    </select>
                                    
                                </form>
                            </div>
                        </article>

                        <aside id="sidebar-content" class="column-2 flex-column">
                            <div class="inner-highlight-box">
                                For all corporate and media enquiries:
                                <ul class="fa-ul">
                                    <li><i class="fa fa-li fa-globe" aria-hidden="true"></i>Australia and Rest of World Management: Token Artists <a href="mailto:erin@token.com.au">erin@token.com.au</a></li>
                                    <li><i class="fa fa-li fa-envelope" aria-hidden="true"></i>USA Management: Avalon <a href="mailto:davidm@avalon-usa.com">davidm@avalon-usa.com</a></li>
                                    <li><i class="fa fa-li fa-link" aria-hidden="true"></i>USA Agency: <a href="http://wmeentertainment.com/">WME</a></li>
                                </ul>
                             <p>If you would like to post me gifts or free things you can send them here:</p>
                             <p>ATTN: Josh Thomas PO Box 108 Fitzroy Victoria 3065</p>

                            </div>

                        </aside>
                    </div>
                </main>
                <?php
include 'resources/footer.php';
?>
        </body>

</html>