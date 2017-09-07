<?PHP $MAIN_IMAGE = "images/about_us_piggy.jpg"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="screen" href="UScredit.css" />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" media="screen" href="UScreditIE.css" />
<![endif]-->
<title>About US Credit Relief</title>
</head>
<body>
<div id="mainContainer" align="center">
<!-- header -->
<div id="headerContainer">
	<div id="imageContainer5">
	    <div id="titleContainer2">
      	<h1>&ldquo;We're living the good life - no more debt or  harassing phone calls. Amazing!&rdquo; &ndash;</h1>
      <h2>US Credit Relief made this possible!</h2>
    </div>

	</div>
<div id="breadCrumb">
    </div>
	<div id="headerMain">
   	  <div id="logoContainer2"><a href="#"><img src="images/logoV2.gif" width="215" height="109" alt="logo" /></a>
      	<div id="topLeftBg">
        	<div class="text3">The Right Choice</div>
        	<div class="text2">I called debt consolidation services—they  weren’t looking out for me. US Credit Relief was!</div>
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
    	<h5>About Us</h5>
		<div style="width:546px; height:auto; float:left; text-align:left;">
        	<div class="text1">
        	<A href="contact.php"><img src="<? echo $MAIN_IMAGE; ?>" width="186" alt="Contact US Credit Relief" border = "0" class = "imageMain" align = "right"/></A>
<p>US Credit Relief was founded by two individuals with over 20 combined years  of financial experience within the credit markets at Fortune 100 companies.  By working with well over tens of thousands  of customers throughout their careers, they realized the only way for any  individual to truly reach the &quot;American Dream&quot; is to successfully  reduce their debts, manage their personal finances and rebuild their financial  future from the ground up.</p>
<P>Times are tough and we understand.  Falling  behind on credit card payments, you can quickly find yourself buried under high  late fees and compounding interest charges, as well as harassing phone  calls.  People have lost their homes to  foreclosure, cars have been repossessed and lives have been subject to  financial ruin.  Hence, US Credit Relief  was created solely to help the population achieve their financial goals.</P>
<P>Our mission is to reduce your debt with a cost-effective solution. Our  strategies are simple: we offer you a debt settlement solution to manage your  current debt condition and rebuild your credit.  With your best interests at heart, we will do everything we can to  help you change your current financial situation.  Gone will be the nights you spend worrying about how you will pay  your bills. You'll finally find yourself sleeping peacefully.</P>
<P>Our staff has many years of experience in the fields of finance, banking,  legal, collections and debt settlement.  We are professionals that will exceed your expectations and stand  out in the debt negotiation industry.  We  are a full-service company that provides stellar customer service.  We will never sell your debt to another  company and are committed to working with you from beginning to end until your  debts are settled and you are debt-free.  Our goal is to help Americans across the country reduce their debt  and rebuild their financial outlook.</P>
<P>US Credit Relief is located in New Jersey.  Our hours of operation are from 9am to 9pm EST.  If you are serious about reducing your debt,  call us immediately at (908)264-4200 or submit your basic information on our  online form!</P>
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
<div id="footerContainer">
<?php
	include("../html_includes/footer.html");
?>
<!-- /footer -->
</div>
</body>
</html>
