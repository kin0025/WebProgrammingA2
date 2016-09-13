<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Me</title>
    <?php include 'resources/head.php';?>
    <link rel="stylesheet" type=text/css href="resources/styles/contact.css">
    <script>
        function fillFlexibilityField() {
            //Take the value of the slider
            var flexiValue = parseInt(document.getElementById('flexibility').value)

            //Should always be a number
            if (isNaN(flexiValue)) {
                alert('Input on the flexibility slider is invalid. Try resubmitting with different values');
                return false;
            }
            //Choose what we want to set
            var flexiFill;
            switch (flexiValue) {
                case 0:
                    flexiFill = 'none';
                    break;
                case 1:
                    flexiFill = 'days';
                    break;
                case 2:
                    flexiFill = 'weeks'
                    break;
                default:
                    flexiFill = 'none'
                    break;
            }
            //Set the value of the hidden element
            document.getElementById('flexibilityactual').value = flexiFill;
        }

        function fillFlexibilitySlider() {
            //Take the value of the slider
            var flexiValue = document.getElementById('flexibilityactual')
            var chosen = flexiValue.options[flexiValue.selectedIndex].value;

            //Choose what we want to set
            var flexiFill;
            switch (chosen) {
                case 'none':
                    flexiFill = 0;
                    break;
                case 'days':
                    flexiFill = 1;
                    break;
                case 'weeks':
                    flexiFill = 2;
                    break;
                default:
                    flexiFill = 0;
                    break;
            }
            //Set the value of the slider element
            document.getElementById('flexibility').value = flexiFill;
        }
    </script>
</head>

<body id="contact">
    <?php include 'resources/header.php';?>
    <main class="flex-responsive">
        <!-- I knew why this is needed, but for some reason stuff needs a double flex enclosure to work -->
        <div class="flex-magicbs">
            <article class="column-9">
                
                <div class="flex-row">
                    <h2 class="pagetitle">Book now!</h2>
                </div>
                
                <div class="flex-responsive">
                    <!-- Contact Form -->
                    <form id="contact-form" class="column-9 flex-column" method="post" action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php">
                        <!-- The name field. Accepts characters a-z A-Z and space hyphen and apostrophe -->
                        <p>Name*: </p> <input type="text" required type="text" name="firstname" pattern="[a-zA-Z \-\.]+" placeholder="Josh" />
                        <!-- The Last name. Has same requirements as the first name -->
                        <p>Last Name*: </p><input required type="text" name="lastname" pattern="[a-zA-Z \-\'\.]+" placeholder="Thomas" />
                        <!-- Email. Uses browser based requirements system, -->
                        <p>Email Address:*</p><input required type="email" name="email" placeholder="name@example.com" />
                        <!-- Phone number. Numbers 0-9, +, Brackets and hyphens -->
                        <p>Contact No*:</p><input type="tel" name="phone" pattern="[0-9\+\ \(\)\-]{1,20}" placeholder="+613 12345678" />
                        <!-- Event Name -->
                        <p>Event Date*: </p><input required input type="date" name="eventdate" />
                        <p>Event Time*:</p> <input required input type="time" name="eventtime" />
                        
                        <!-- Slider display. Uses flexbox to evenly space the words across one line -->
                        <p>Flexibility</p>
                        <div class="flex-row flexibility-text">
                            <p>Inflexible (No time variation)</p>
                            <p>Flexible (Couple of Day Variation)</p>
                            <p>Very Flexible (Week Variation)</p>
                        </div>
                        <!-- Slider input- values 0-2 that get translated to text input with javascript-->
                        <input id="flexibility" oninput="fillFlexibilityField()" required input type="range" min="0" max="2" step="1" value="0" name="eventflexibility" />
                        <!-- For accessibility. If using a screen reader then they can use this. Sets the value of the slider if changed. -->
                        <select id="flexibilityactual" onchange="fillFlexibilitySlider()" name="eventflexibility"> 
                                    <option value= 'none' >Inflexible</option>
                                    <option value= 'days' >Flexible</option>
                                    <option value= 'weeks'> Very Flexible</option>
                                    </select>
                                    
                        <p>Event Location </p> <textarea class="form-1" type="text" name="eventlocation" pattern="[A-Za-z0-9 .\-]+" required placeholder="1 Bourke St Melbourne Victoria Australia"></textarea>
                        <p>Event Description </p><textarea class="form-1" type="text" name="eventdescription" pattern="[A-Za-z .\-']+" required placeholder="MC for award ceremony"></textarea>
                        <p>Performance Required </p><select name='performance'> 
                                    <option value= ' ' selected> Please Select </option>
                                    <option value= 'Comedy Spot' > Comedy Spot </option>
                                    <option value= 'MC' > MC </option>
                                    <option value= 'Full Show'> Full Show </option>
                                    <option value= 'Other'> Other </option>
                                    </select>
                        <input type="submit" value="Submit" class="button"></input>

                    </form>
                </div>
            </article>

            <aside class="column-2 flex-column outer-highlight-box">
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
    <?php include 'resources/footer.php';?>
</body>

</html>