<?PHP $MAIN_IMAGE = "images/debt_piggy.jpg"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="screen" href="UScredit.css" />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" media="screen" href="UScreditIE.css" />
<![endif]-->
<title>Debt Negotiation: US Credit Relief</title>
</head>
<body>
<div id="mainContainer" align="center">
<!-- header -->
<div id="headerContainer">
	<div id="imageContainer4">    <div id="titleContainer2">
	      	<h1>&ldquo;US Credit Relief gave us the help we needed to eliminate our financial burden.&rdquo; &ndash;</h1>
        <h2>No more stressing over unpaid bills!</h2>

    </div>
</div>
<div id="breadCrumb">
    </div>
	<div id="headerMain">
   	  <div id="logoContainer2"><a href="#"><img src="images/logoV2.gif" width="215" height="109" alt="logo" /></a>
      	<div id="topLeftBg">
        	<div class="text3">Choose Debt Negotiation</div>
        	<div class="text2">My debt gave me sleepless nights—US Credit  Relief gave me hope!</div>
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
    	<h5><strong>Why Choose Debt Negotiation?</strong></h5>
<div style="width:546px; height:auto; float:left; text-align:left;">
        	<div class="text1">
        	<A href="contact.php"><img src="<? echo $MAIN_IMAGE; ?>" width="186" alt="Contact US Credit Relief" border = "0" class = "imageMain" align = "right"/></A>
You need to take control of your finances before they take control of you, literally. US Credit Relief has a debt reduction program created just for you with affordable payments. We can reduce your debt significantly.  On average our customers are settling at approximately 55%. 
        	  <p>US Credit Relief has helped many clients, just like you, to get rid of their excessive debt. Our debt negotiators are trained professionals and have established solid relationships with creditors, banks and collection agencies-they have stellar track records in settling debt. They can resolve conflicts that you might have with your creditors and negotiate the best settlement for you, keeping your budget in mind at all times. </p>
        	  <p>The goal of our program is to help you take control of your financial situation before it gets any worse. We custom tailor a plan that works for you and will get your debts paid off in the shortest amount of time possible. Our debt negotiation professional will counsel you on what will work best for you. The length of time it takes to pay off your accounts varies by individual-it is based on your balances, the number of accounts you have, and how much you can pay monthly. Most clients completely pay off their accounts in 18 to 48 months. </p>
        	  <p>We are here to help you! </p>
        	  <p>If you really want to get out of debt once and for all and stay out of debt, we are committed to helping you reach this goal. You can avoid bankruptcy and pay off your creditors in shorter time than you ever imagined possible. Once you make the commitment, we will see you through the whole process. All we ask is that you are committed, patient and cooperative. Now is the time to take control of your finances-your finances have controlled you for too long! <br />
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
