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
 
?>

<?php
 
}
 
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="stylesheet-press.css" />
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
		<script src="js/jquery.scrollmagic.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
		<script src="js/jquery.stellar.min.js"></script>
		<script src="js/mainscript.js"></script>
        <title>Press Appearances | See Frank in Action!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    </head>
    <body>
		<div id="background" class="desktop" data-stellar-background-ratio=".05">
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
            <div id="content-wrapper">
                <div class="content" id="noslidercontent">
                    <div class="content-text-embedded-shell-no-padding" style="position:relative;">
                        <div id="mosaic" style="font-size:0;">
                            <div class="press-item full" id="item-1">
                                <div class="video-container">
                                    <iframe src="http://www.youtube.com/embed/videoseries?list=PLx-eOU6AESl16vEP7xMGBf-Bs776gzDa6" frameborder="0" width="560" height="315" allowfullscreen></iframe>
                                </div>
                                <div class="text-container">
                                    <div class="article-title">
                                        <span>Press Videos</span>
                                    </div>
                                    <span class="highlight" id="journal-name">YouTube</span>
                                    <span class="highlight" id="publish-time">December 14, 2014</span>
                                </div>
                            </div>
                            <a href="http://abcnews.go.com/Business/tech-millionaire-pled-guilty-selling-prescription-drugs/story?id=18649228">
                                <div class="press-item half" id="item-2">
                                    <div class="text-container">
                                        <div class="article-title">
                                            <span>Lawyer for Former Tech Millionaire Who Sold Prescription Drugs Said 'She Needs to Conquer Her Demons'</span>
                                        </div>
                                        <span  class="highlight" id="journal-name">ABC News</span>
                                        <span class="highlight" id="publish-time">March 6, 2013</span>
                                    </div>
                                    <div class="picture-container">
                                        <div class="article-image"></div>
                                    </div>
                                </div>
                            </a>
                            <a href="http://nypdconfidential.com/columns/1997/970721.html">
                                <div class="press-item half" id="item-3">
                                    <div class="text-container">
                                        <div class="article-title">
                                            <span>You call that benevolent?</span>
                                        </div>
                                        <span class="highlight" id="journal-name">NYPD Confidential</span>
                                        <span class="highlight" id="publish-time">July 21, 1997</span>
                                    </div>
                                    <div class="picture-container">
                                        <div class="article-image"></div>
                                    </div>
                                </div>
                            </a>
                            <a href="http://www.nydailynews.com/archives/news/nba-mason-hit-sex-rap-ex-knicks-star-denies-tale-tryst-teens-article-1.787931">
                                <div class="press-item full" id="item-4">
                                    <div class="text-container">
                                        <div class="article-title">
                                            <span>NBA'S Mason hit with sex rap: ex-Knicks star denies tale of tryst with teens</span>
                                        </div>
                                        <span class="highlight" id="journal-name">NY Daily News</span>
                                        <span class="highlight" id="publish-time">February 8, 1998</span>
                                    </div>
                                    <div class="picture-container">
                                        <div class="article-image"></div>
                                    </div>
                                </div>
                            </a>
                            <a href="http://nypost.com/2012/11/22/longest-sitting-nyc-judge-retires/">
                                <div class="press-item half" id="item-5">
                                    <div class="picture-container">
                                        <div class="article-image"></div>
                                    </div>
                                    <div class="text-container" >
                                        <div class="article-title">
                                            <span>Longest sitting NYC judge retires</span>
                                        </div>
                                        <span class="highlight" id="journal-name">NY Post</span>
                                        <span class="highlight" id="publish-time">November 22, 2012</span>
                                    </div>
                                </div>
                            </a>
                            <a href="http://newyork.cbslocal.com/2012/03/12/man-serving-life-sentence-is-back-in-court-accused-of-another-murder/">
                                <div class="press-item half" id="item-6">
                                    <div class="picture-container">
                                        <div class="article-image"></div>
                                    </div>
                                    <div class="text-container">
                                        <div class="article-title">
                                            <span>Man Serving Life Sentence Is Back In Court, Accused Of Another Murder</span>
                                        </div>
                                        <span class="highlight" id="journal-name">CBS New York</span>
                                        <span class="highlight" id="publish-time">March 12, 2012</span>
                                    </div>
                                </div>
                            </a>
                            <a href="http://www.salon.com/2014/12/20/lawyer_child_molester_wont_testify_in_1979_case/">
                                <div class="press-item half" id="item-7">
                                    <div class="text-container">
                                        <div class="article-title">
                                            <span>Lawyer: Child molester won’t testify in 1979 case</span>
                                        </div>
                                        <span class="highlight" id="journal-name">Salon</span>
                                        <span class="highlight" id="publish-time">December 19, 2014</span>
                                    </div>
                                    <div class="picture-container">
                                        <div class="article-image"></div>
                                    </div>
                                </div>
                            </a>
                            <a href="http://www.dnainfo.com/new-york/20101020/downtown/witness-pace-students-murder-was-beaten-says-da">
                                <div class="press-item half" id="item-8">
                                    <div class="text-container">
                                        <div class="article-title">
                                            <span>Witness to Pace Student’s Murder Was Beaten, Says DA</span>
                                        </div>
                                        <span class="highlight" id="journal-name">DNAinfo</span>
                                        <span class="highlight" id="publish-time">October 20, 2010</span>
                                    </div>
                                    <div class="picture-container">
                                        <div class="article-image"></div>
                                    </div>
                                </div>
                            </a>
                            <a href="http://nymag.com/daily/intelligencer/2011/09/what_does_yak_mean_to_you.html">
                                <div class="press-item full" id="item-9">
                                    <div class="text-container">
                                        <div class="article-title">
                                            <span>What Do ‘Yak’ and ‘Scud’ Mean to You?</span>
                                        </div>
                                        <span class="highlight" id="journal-name">New York Magazine</span>
                                        <span class="highlight" id="publish-time">September 29, 2011</span>
                                    </div>
                                    <div class="picture-container">
                                        <div class="article-image"></div>
                                    </div>
                                </div>
                            </a>
                            <a href="http://www.the411online.com/news/10240602.html">
                                <div class="press-item full" id="item-10">
                                    <div class="picture-container">
                                        <div class="article-image"></div>
                                    </div>
                                    <div class="text-container">
                                        <div class="article-title">
                                            <span>Judge threatens Foxy Brown with jail time</span>
                                        </div>
                                        <span class="highlight" id="journal-name">The 411 Online</span>
                                        <span class="highlight" id="publish-time">Unknown</span>
                                    </div>
                                </div>
                            </a>
                            <a href="http://www.nydailynews.com/new-york/nyc-crime/man-25-years-life-fatal-beatdown-68-year-old-article-1.2405128">
                                <div class="press-item half" id="item-11">
                                    <div class="text-container">
                                        <div class="article-title">
                                            <span>‘Menace to society’ gets 25 years to life in prison for fatally beating 68-year-old man</span>
                                        </div>
                                        <span  class="highlight" id="journal-name">NY Daily News</span>
                                        <span class="highlight" id="publish-time">October 20, 2015</span>
                                    </div>
                                    <div class="picture-container">
                                        <div class="article-image"></div>
                                    </div>
                                </div>
                            </a>
                            <a href="http://www.docnyc.net/film/rothman/#.Vph3FXr9LsO">
                                <div class="press-item half" id="item-12">
                                    <div class="text-container">
                                        <div class="article-title">
                                            <span>ROTHMAN</span>
                                        </div>
                                        <span class="highlight" id="journal-name">DOC NYC</span>
                                        <span class="highlight" id="publish-time">November 16, 2015</span>
                                    </div>
                                    <div class="picture-container">
                                        <div class="article-image"></div>
                                    </div>
                                </div>
                            </a>
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
