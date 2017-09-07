<?php
require_once "Mail.php";
require_once "Mail/mime.php";
$_SERVER["E_HOST"] = "mail.daredealer.com";


$_SERVER["CUSTOMER_SERVICE_EMAIL"] 		= "forminfo@uscreditrelief.com";
$_SERVER["CUSTOMER_SERVICE_NAME"] 		= "Lead Info";
$_SERVER["CUSTOMER_SERVICE_USERNAME"] 	= "forminfo@uscreditrelief.com";
$_SERVER["CUSTOMER_SERVICE_PASSWORD"] 	= "P@55w0rd!";

$MAIN_IMAGE = "images/about_us_piggy.jpg";

	FUNCTION SEND_EMAIL($recipient, $subject, $MailMessage) {
		
		//PULL NAME FROM DATABASE BASED ON EMAIL ADDRESS IF THERE'S NO <NAME>
		
					
		
		$host 		= $_SERVER["E_HOST"];
		$username 	= $_SERVER["CUSTOMER_SERVICE_USERNAME"] ;//$fromArray["USERNAME"];
		$password 	= $_SERVER["CUSTOMER_SERVICE_PASSWORD"];//$fromArray["PASSWORD"];
        $sender = $_SERVER["CUSTOMER_SERVICE_EMAIL"];//$fromArray["EMAIL"];                           
        
		$html = $_SERVER["HTML_HEADER"] . $MailMessage . $_SERVER["EMAIL_SIGNATURE"] . $_SERVER["HTML_FOOTER"];
        $text = strip_tags($MailMessage);                                      // Text version of the email

        $crlf = "\n";
        $headers = array(
                        'From'          => $sender,
                        'Return-Path'   => $sender,
                        'Subject'       => $subject,
                        'To'            => $recipient
                        );
 
        // Creating the Mime message
        $mime = new Mail_mime($crlf);
 
        // Setting the body of the email
        $mime->setTXTBody($text);
        $mime->setHTMLBody($html);
 
        // Add an attachment
 //       $file = "Hello World!";
   //     $file_name = "Hello text.txt";
  //      $content_type = "text/plain";
   //     $mime->addAttachment ($file, $content_type, $file_name, 0);
 
        // Set body and headers ready for base mail class 
        $body = $mime->get();
        $headers = $mime->headers($headers);
 
        // SMTP authentication params
        $smtp_params["host"]     = $host;
        $smtp_params["port"]     = "25";
        $smtp_params["auth"]     = true;
        $smtp_params["username"] = $username;
        $smtp_params["password"] = $password;
 
        // Sending the email using smtp
        $mail =& Mail::factory("smtp", $smtp_params); 
        $result = $mail->send($recipient, $headers, $body);		
			
		sleep(2);
	}//SEND_EMAIL



foreach($_POST as $KEY=>$VALUE) $INFO .= "<TR><TD>${KEY}:</TD><TD>${VALUE}</TD></TR>";
$INFO = "<TABLE WIDTH = '500'>${INFO}</TABLE>";
SEND_EMAIL("dcanlas@uscreditrelief.com", "New Lead", $INFO);






?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="screen" href="UScredit.css" />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" media="screen" href="UScreditIE.css" />
<![endif]-->
<title>Thank You: US Credit Relief</title>
</head>
<body>
<div id="mainContainer" align="center">
<!-- header -->
<div id="headerContainer">
	<div id="imageContainer2">    <div id="titleContainer2">
      	<h1>&ldquo;I had so many questions &amp; US Credit Relief  answered them all!&rdquo; &ndash;</h1>
      <h2>Thank you, US Credit Relief!</h2>
    </div>
</div>
<div id="breadCrumb">
    </div>
	<div id="headerMain">
   	  <div id="logoContainer2"><a href="#"><img src="images/logoV2.gif" width="215" height="109" alt="logo" /></a>
      	<div id="topLeftBg">
        	<div class="text3">Get The Right Answers</div>
        	<div class="text2">I was overwhelmed and confused and felt I had  nowhere to turn—US Credit Relief came to my rescue!</div>
        </div>
      </div>
      	<?php
			include("../html_includes/header_links.html");
		?>
    <div id="headerFoot2"></div>
    </div>    
</div>
<!-- /header -->
<!-- content -->
<div id="contentContainer">
    <!-- left -->
<?php
	include("../html_includes/consult_form.html");
?>
    <!-- /left -->
    <!-- middle -->
    <div id="midSection">
    	<h5>We Will Be In Touch Soon</h5>
<div style="width:360px; height:auto; float:left; text-align:left;">
        	<A href="contact.php"><img src="<? echo $MAIN_IMAGE; ?>" width="186" alt="Contact US Credit Relief" border = "0" class = "imageMain" align = "right"/></A>

        	<div class="text1">
        	  <p>Thank you for submitting your information. We assure your privacy and will keep your information confidential. A representative will contact you shortly.
      	    </p>
        	  <p></p>
        	  <p><br />
      	    </p>
        	</div>
        </div>
        <div class="clear"></div>
        <br /><br />
    </div>
    <!-- /middle -->
    <!-- right -->
<?php
	include("../html_includes/faq_calc.html");
?>
    <!-- /right -->
</div>
<!-- /content -->
<!-- footer -->
<?php
	include("../html_includes/footer.html");
?>
<!-- /footer -->
</div>
</body>
</html>
