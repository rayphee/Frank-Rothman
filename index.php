<?php
 
if(isset($_POST["message"])) {
    $sender=$_POST["name"];
    $email_subject="Potential Client: $sender";
    $phone=$_POST["phone"];
    $senderEmail=$_POST["email"];
    $message=$_POST["message"];
    // EDIT THE 2 LINES BELOW AS REQUIRED 
    $email_to = "frothman@rssslaw.com";

    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
    // validation expected data exists
 
    if(!isset($sender) ||
 
        !isset($phone) ||
 
        !isset($senderEmail) ||
 
        !isset($message)) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$senderEmail)) {
 
    $error_message .= 'Whoops, the email address looks wrong.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$sender)) {
 
    $error_message .= 'Whoa there, we think you misspelled your name.<br />';
 
  }
 
  if(strlen($message) < 2) {
    $error_message .= 'Wow, that is a very short message. Can you write some more? <br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($sender)."\n";
 
    $email_message .= "Email: ".clean_string($senderEmail)."\n";
 
    $email_message .= "Phone: ".clean_string($phone)."\n";
 
    $email_message .= "Message: ".clean_string($message)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$senderEmail."\r\n".
 
'Reply-To: '.$senderEmail."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
mail($email_to, $email_subject, $email_message, $headers);
header('Location: about.php');
 
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--<link rel="stylesheet" type="text/css" href="stylesheet.css" />-->
        <link rel="stylesheet" type="text/css" href="slider-style.css" />
        <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,700,300,400' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,200,100,500,700' rel='stylesheet' type='text/css'>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
		<script src="js/jquery.gsap.min.js"></script>
		<script src="js/jquery.scrollmagic.js"></script>
		<script src="js/jquery.scrollmagic.debug.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
		<script src="js/jquery.stellar.min.js"></script>
        <script src="js/smooth-scroll.js"></script>
		<script src="js/mainscript.js"></script>
        <script src="js/slider.js"></script>
        <title>The Law Office of Frank Rothman | The Lower East Side Lawyer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    </head>
    <body>
		<div id="background" class="desktop" data-stellar-background-ratio=".15">
		</div>
        <div class="consultation">
            <div class="consultation-box">
                <div class="close-button close-consult" id="close"></div>
                <div class="consultation-form">
                    <div style="width:100%;text-align:center;">
                        <img src="images/rothman-logo-white.png" style="height:70px;">
                    </div>
                    <div style="color:white;font-size:30px;font-family:arvo;text-align:center;margin-top:10px;">
                        Let's make this a <span style="color:rgb(255,92,43);">fair fight</span>!
                    </div><br>
                    <div style="color:white;font-size:18px;font-family:montserrat;text-align:center;">
                        Please enter your contact information so we can reach you<br><br>
                        <form method="post">
                            <input class="textbox" type="text" name="name" placeholder="Name"><br>
                            <input class="textbox" type="email" name="email" placeholder="Email"><br>
                            <input class="textbox" type="tel" name="phone" placeholder="Phone Number"><br>
                            <textarea class="textbox-extended" name="message" rows="10" cols="30" placeholder="Message"></textarea><br>
                            <input class="submit-button close-consult" type="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="container">
            <div class="header" style="z-index:3;">
				<div class="navbar">
                    <div class="upperbar">
                        <ul class="links mobile">
                            <li><a href="tel:+12125715500"><img src="images/phone.png" style="height:20px;width:20px;margin-top:15px;"></a></li>
                            <li><a href="mailto:frothman@rssslaw.com" ><img src="images/email.png" style="height:20px;width:28px;margin-top:15px;"></a></li>
                            <li><a class="openmap"><img id="shake" src="images/map.png" style="height:20px;width:20px;margin-top:15px;"></a></li>
                            <li><a class="openmenu"><img src="images/menu.png" style="height:20px;width:20px;margin-top:15px;"></a></li>
                        </ul>
                        <ul class="links tablet">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="practice.php">Areas of Practice</a></li>
                                <li><a href="press.php">Press</a></li>
                                <li><a href="about.php">About me</a></li>
                                <li><a class="openmap">Contact</a></li>
                        </ul>
                        <ul class="links desktop">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="practice.php">Areas of Practice</a></li>
                                <li><a href="press.php">Press</a></li>
                                <li><a href="about.php">About me</a></li>
                                <li><a class="openmap">Contact</a></li>
                        </ul>
                        <div id="backing">
                        </div>
                        <div id="menu">
                            <ul>
                                <li style="border-top:1px solid white;"><a href="index.php">Home</a></li>
                                <li><a href="practice.php">Criminal Defense</a></li>
                                <li><a href="practice.php">Civil Rights</a></li>
                                <li><a href="press.php">Press</a></li>
                                <li style="border-bottom:none;"><a href="about.php">About me</a></li>
                            </ul>
                        </div>
                        <div id="map">
                            <div id="mapwrapper">
                                <div id="map_canvas">
                                    <div id="gmap_canvas" style="height:100%;width:100%;">
                                    </div>
                                </div>
                                <span class="tablet">
                                    <h class="rsss-logo-text" style="display:block;padding-bottom:5px;">Rothman, Schneider, Soloway & Stern, LLP</h>
                                    <img src="images/map.png" style="height:20px;width:20px;margin-top:15px;display:inline-block;"><a href="maps:daddr=(40.717824,-74.001283)&saddr=Current%20Location" style="color:white;display:block;padding-bottom:15px;">100 Lafayette Street, Suite 501<br>New York, NY 10013</a>
                                    <img src="images/phone.png" style="height:20px;width:20px;margin-top:15px;"><a href="tel:+12125715500" style="color:white;display:block;padding-bottom:15px;">(212) 571-5500</a>
                                    <img src="images/email.png" style="height:20px;width:28px;margin-top:15px;"><a href="mailto:frothman@rssslaw.com" style="color:white;display:block;">frothman@rssslaw.com</a>
                                </span>
                            </div>
                            <br>
                            <span class="mobile">
                                <h class="rsss-logo-text">Rothman, Schneider, Soloway & Stern, LLP</h><br>
                                <a href="maps:daddr=(40.717824,-74.001283)&saddr=Current%20Location" style="color:white;">100 Lafayette Street, Suite 501<br>New York, NY 10013</a>
                            </span>
                        </div>
                    </div>
				</div>
            </div>
            <div class="header" style="margin-top:50px;">
                <div class="lowerbar notupperbar">
                    <img id="rothman-logo" src="images/rothman-logo.png">
                    <span>
                        <a>The Lower East Side Lawyer</a>
                        <h><b>Frank Rothman</b></h>
                    </span>
                </div>
            </div>
			<div class="desktop">
                <div class="intro">
                    <div id="rothmananimationframe">
                        <div class="rothmananimationcomponent" id="rothmananimationlogo" style="padding-top:20vh;">
                            <img src="images/rothman-logo-stand.png" id="stand" style="left:55px;">
                            <img src="images/rothman-logo-bar.png" id="bar" style="margin-top:50px;">
                            <img src="images/rothman-logo-scale.png" id="scaleleft" style="left:-50px;margin-top:85px;">
                            <img src="images/rothman-logo-scale.png" id="scaleright" style="right:-37px;margin-top:85px;">
                        </div>
                        <div class="rothmananimationcomponent rothmananimationtext" id="message1" style="top:-400px">
                            <a>Need help balancing the scales?</a>
                        </div>
                        <div class="rothmananimationcomponent rothmananimationtext" id="skip" style="top:-650px">
                            <a data-scroll href="#content-wrapper" style="font-size:20px;color:rgb(150,150,150);text-decoration:none;margin-top:25px;"><!--<img style="height:50px;width:100px;" src="images/skip.png">-->Scroll Down</a>
                        </div>
                        <div class="rothmananimationcomponent rothmananimationtext" id="rothmanintrotext">
                            <a style="font-size:20px;">I can help to balance them</a>
                            <br>
                            <a>The <span style="color:rgb(255,93,41);">Lower East Side</span> Lawyer</a>
                            <h><b>Frank Rothman</b></h>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content-wrapper" name="contentwrapper" style="margin-top:125px;">
                <div class="content">
                        <section class="cd-hero slider">
                            <ul class="cd-hero-slider autoplay">
                                <li class="selected">
                                    <div class="cd-half-width">
                                        <a>I may not be a superhero, but...</a>
                                        <br>
                                        <h>I can make it a <span style="color:rgb(255,92,43);">fair fight</span>!</h>
                                    </div>
                                </li>
                                <li>
                                    <div class="cd-half-width">
                                        <a>I don't have a get out of jail free card, but...</a>
                                        <br>
                                        <h>I know the <span style="color:rgb(255,92,43);">right bondsman</span></h>
                                    </div>
                                </li>
                                <li>
                                    <div class="cd-half-width">
                                        <h><span style="color:rgb(255,92,43);">Remember:</span></h>
                                        <br>
                                        <a>You have the right to remain silent</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="cd-half-width">
                                        <h>If you find yourself in this position...</h>
                                        <br>
                                        <a>Ask for a lawyer and call me as soon as possible!</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="cd-half-width">
                                        <a>Law enforcement has to play by the rules...</a>
                                        <br>
                                        <h>I can make sure they do</h>
                                    </div>
                                </li>
                            </ul>
                            <div class="cd-slider-nav">
                                <nav>
                                    <span class="cd-marker item-1"></span>
                                    <ul>
                                        <li class="selected"><a href="#0"></a></li>
                                        <li><a href="#0"></a></li>
                                        <li><a href="#0"></a></li>
                                        <li><a href="#0"></a></li>
                                        <li><a href="#0"></a></li>
                                    </ul>
                                </nav> 
                            </div> <!-- .cd-slider-nav -->
                        </section> <!-- .cd-hero -->
                    <div class="content-text-embedded-shell" id="skills">
                        <div class="content-title-major">
                            <div style="background-color:rgba(0,0,0,0);">
                                Criminal <span style="color:rgb(255,92,43);">Defense</span> Attorney
                            </div>
                        </div>
                        <div class="content-text-embedded">
                            <div class="block-elements">
                                <div class="block-image">
                                    <img src="images/experience-icon.png" style="height:60px;width:60px;">
                                </div>
                                <div class="block-text">
                                    <span style="color:rgb(255,92,43);font-size:18px;">30+ Years</span> of Experience
                                </div>
                            </div>
                            <div class="block-elements">
                                <div class="block-image">
                                    <img src="images/clock-icon.png" style="height:60px;width:60px;">
                                </div>
                                <div class="block-text">
                                    Available <span style="color:rgb(255,92,43);font-size:18px;">24/7</span>
                                </div>
                            </div>
                            <div class="block-elements">
                                <div class="block-image">
                                    <img src="images/representation-icon.png" style="height:60px;width:60px;">
                                </div>
                                <div class="block-text">
                                    <span style="color:rgb(255,92,43);font-size:18px;">Dedicated</span> Representation
                                    
                                </div>
                            </div>
                            <div class="block-elements">
                                <div class="block-image">
                                    <img src="images/legal-services-icon.png" style="height:60px;width:60px;">
                                </div>
                                <div class="block-text">
                                    <span style="color:rgb(255,92,43);font-size:18px;">Comprehensive</span> Legal Services
                                    
                                </div>
                            </div>
                            <div class="block-elements">
                                <div class="block-image">
                                    <img src="images/linguist-icon.png" style="height:60px;width:60px;">
                                </div>
                                <div class="block-text">
                                    Hablamos <span style="color:rgb(255,92,43);font-size:18px;">Español</span>
                                    
                                </div>
                            </div>
                            <div class="block-elements consult-button" style="cursor:pointer">
                                <div class="block-image">
                                    <img src="images/consultation-icon.png" style="height:60px;width:60px;">
                                </div>
                                <div class="block-text">
                                    Request a <span style="color:rgb(255,92,43);font-size:18px;">Consultation</span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-text-embedded-shell" id="care">
                        <div class="content-text-embedded">
                            <span style="width:100%;display:block;text-align:center;font-variant:small-caps;font-size:24px;font-weight:700;font-family:Raleway;">30+ Years Of Legal Experience</span>
                            <br>
    More than 30 Years Of Legal Experience. Call (212) 571-5500 as soon as possible. <br><br>
                            Being arrested and charged with a crime is a traumatic event. The initial processing time from arrest until arraignment can reach 24 hours. This is a crucial time period for the accused to secure proper representaion. What’s done or NOT done during these early stages can drastically affect what bail is set in court and possibly effect the final outcome of the case. Being accused of a crime  is an event  that can change a person's life. I understand what it means to be arrested and face the prospect of a criminal conviction and a possible  jail sentence.
                            <br>
                            <br>
                            You need the assistance of a  dedicated professional to help you effectively deal with the criminal  justice system. Myself and my partners represent clients charged with misdemeanors and felonies in both state and federal court. 
                            <br>
                            <br>
                            <br>
                            <span style="width:100%;display:block;text-align:center;font-variant:small-caps;font-size:24px;font-weight:700;font-family:Raleway;">Get High-Quality & Comprehensive Representation</span>
                            <br>
    We defend clients charged with crimes ranging in seriousness from DWI and petty theft to murder and everything in between. Being charged with a crime is a serious matter, regardless of the charge. That is why we treat every case with the utmost care and personal attention.	 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
                <div class="rsss-logo"><img src="images/rsss-logo.png" style="height:100px;width:100px;margin-top:10px;"></div>
				<div class="footer-inner-wrapper">
                    <div class="rsss-text">
                        <h class="rsss-logo-text" style="display:block;padding-bottom:5px;">Rothman, Schneider, Soloway & Stern, LLP</h>
                        <a href="maps:daddr=(40.717824,-74.001283)&saddr=Current%20Location" style="color:rgba(15,0,70,1);display:block;padding-bottom:15px;">100 Lafayette Street, Suite 501<br>New York, NY 10013</a>
                        <a href="tel:+12125715500" style="color:rgba(15,0,70,1);display:block;">(212) 571-5500</a><br>
                        <a style="color:rgba(15,0,70,1);display:block;text-decoration:underline;cursor:pointer" class="consult-button">Request a Consulation</a>
                    </div>
                    <div class="rsss-social">
                        <a href="https://www.facebook.com/"><img class="socialicons" src="images/facebook.png"></a>
                        <a href="https://www.twitter.com/"><img class="socialicons" src="images/twitter.png"></a>
                        <a href="https://www.linkedin.com/"><img class="socialicons" src="images/linkedin.png"></a>
                    </div>
                    <div class="rsss-disclaimer">
                        <a>The information on these pages are  for general information purposes only. Nothing contained on these pages should be construed as legal advice for any particular case. </a>
                    </div><br>
                    <span>&copy 2015 <a href="http://www.panyktech.com" style="text-decoration:none;"><span style="color:rgb(247,187,0);position:relative;margin-left:none;margin-right:none;display:inline;text-decoration:none;">Panyk</span></a> Tech, LLC | All Rights Reserved. </span>
				</div>
                <div class="stripes" id="blue"></div>
            </div>
		<script src="js/auxiliary.js"></script>
    </body>
</html>
