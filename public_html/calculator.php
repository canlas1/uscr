<?php

//A = AMOUNT OF DEBT
//I = INTEREST RATE
FUNCTION GET_MONTHLY_PAYMENT($I, $A, $N, $MONTHLY_RATE = FALSE) {
	// =I*A/(1-(1+I)^(-n))
	IF ($MONTHLY_RATE > 0) {
		$I = $I/100/12;
		$BALANCE = $A;
		$COUNT = 0;$TOTAL_COST = $A;
		WHILE ($BALANCE > 0) {
			$MIN = $MONTHLY_RATE * $BALANCE;
			if ($MIN < 10) $MIN = 10;
			$INTEREST_PAID = $BALANCE * $I;
			$PRINCIPAL_PAID = $MIN - $INTEREST_PAID;
			$COUNT++;
			$BALANCE = $BALANCE - $PRINCIPAL_PAID;
			$TOTAL_COST += $INTEREST_PAID;
			$EXTRA_INTEREST = $TOTAL_COST - $A;
			$N = $COUNT;
			
			
			
		}
		$MONTHLY_PAYMENT = $A*$MONTHLY_RATE;

		/*
		$MONTHLY_PAYMENT = $MONTHLY_RATE * $A;
		$P = $MONTHLY_PAYMENT;
		$I = $I / 1200;
		$i = $I / 12;
		$iAdP = $i * $A / $P;
		$nL = -log(1-$iAdP);
		$L = log(1 + $i);
		$N = $nL / $L;
		*/
	}
	ELSEIF ($I==0) {
		$MONTHLY_PAYMENT = $A/$N;
		$TOTAL_COST = $MONTHLY_PAYMENT * $N;

	}
	ELSE {
		$I = $I / 1200;
		$IxA = $I * $A;
		$POW = POW((1+$I),(0-$N));
		$MONTHLY_PAYMENT = $IxA/(1-$POW);
		$TOTAL_COST = $MONTHLY_PAYMENT * $N;

	}
	$EXTRA_INTEREST = $TOTAL_COST - $A;

	$RETURN["MONTHLY_PAYMENT"] = round($MONTHLY_PAYMENT);

	$RETURN["TOTAL_COST"] = ROUND($TOTAL_COST);
	$RETURN["EXTRA_INTEREST"] = ROUND($EXTRA_INTEREST);
	$RETURN["INTEREST_RATE"] = sprintf("%01.2f", $I*1200);
	$RETURN["LOAN_AMOUNT"] = ROUND($A);
	$RETURN["NUM_PAYMENTS"] = ROUND($N);
	RETURN $RETURN;
}//FUNCTION GET_MONTHLY_PAYMENT



FUNCTION GET_USCR_SOLUTION($A){
	IF ($A <10000) $N = 24;
	ELSEIF ($A < 36000) $N = 36;
	ELSE $N = 48;
	$MONTHLY_PAYMENT = 0.55 * $A/$N;
	$TOTAL_COST = $MONTHLY_PAYMENT * $N;
	$RETURN["MONTHLY_PAYMENT"] = ROUND($MONTHLY_PAYMENT);
	$RETURN["NUM_PAYMENTS"] = ROUND($N);
	$RETURN["TOTAL_COST"] = ROUND($TOTAL_COST);
	$RETURN["EXTRA_INTEREST"] = 0;
	$RETURN["INTEREST_RATE"] = 0;
	$RETURN["LOAN_AMOUNT"] = ROUND($A);
	RETURN $RETURN;
}//FUNCTION GET_USCR_SOLUTION
















if (array_key_exists("userTotalUnsecuredDebt", $_POST) and array_key_exists("userAvgInterestRate", $_POST)) {
	$A = $_POST["userTotalUnsecuredDebt"];
	$I = $_POST["userAvgInterestRate"];
	$N = 60;
	
	
}
else {
	$A = 25000;
	$I = 18.9;
	$N = 60;
}


$I2 = 9.99;
$CONSOLIDATION = GET_MONTHLY_PAYMENT($I2, $A, $N);


$MP1 =	number_format($CONSOLIDATION["MONTHLY_PAYMENT"]);
$TC1 =	number_format($CONSOLIDATION["TOTAL_COST"]);
$EI1 =	number_format($CONSOLIDATION["EXTRA_INTEREST"]);
$IR1 =	$CONSOLIDATION["INTEREST_RATE"];
$LA1 =	number_format($CONSOLIDATION["LOAN_AMOUNT"]);
$NP1 =	$CONSOLIDATION["NUM_PAYMENTS"];


$I3 = $I;
$CREDIT_COUNSELING = GET_MONTHLY_PAYMENT($I3, $A, $N);

$MP2 =	number_format($CREDIT_COUNSELING["MONTHLY_PAYMENT"]);
$TC2 =	number_format($CREDIT_COUNSELING["TOTAL_COST"]);
$EI2 =	number_format($CREDIT_COUNSELING["EXTRA_INTEREST"]);
$IR2 =	$CREDIT_COUNSELING["INTEREST_RATE"];
$LA2 =	number_format($CREDIT_COUNSELING["LOAN_AMOUNT"]);
$NP2 =	$CREDIT_COUNSELING["NUM_PAYMENTS"];




$I3 = $I;
$DO_NOTHING = GET_MONTHLY_PAYMENT($I3, $A, $N, 0.03);

$MP3 =	number_format($DO_NOTHING["MONTHLY_PAYMENT"]);
$TC3 =	number_format($DO_NOTHING["TOTAL_COST"]);
$EI3 =	number_format($DO_NOTHING["EXTRA_INTEREST"]);
$IR3 =	$DO_NOTHING["INTEREST_RATE"];
$LA3 =	number_format($DO_NOTHING["LOAN_AMOUNT"]);
$NP3 =	$DO_NOTHING["NUM_PAYMENTS"];



$SOLUTION = GET_USCR_SOLUTION($A);

$MP4 =	number_format($SOLUTION["MONTHLY_PAYMENT"]);
$TC4 =	number_format($SOLUTION["TOTAL_COST"]);
$EI4 =	number_format($SOLUTION["EXTRA_INTEREST"]);
$IR4 =	$SOLUTION["INTEREST_RATE"];
$LA4 =	number_format($SOLUTION["LOAN_AMOUNT"]);
$NP4 =	$SOLUTION["NUM_PAYMENTS"];



//$DO_NOTHING = GET_MONTHLY_PAYMENT_LOOPED($I3, $A, $N);












?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" media="screen" href="UScredit.css" />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" media="screen" href="UScreditIE.css" />
<![endif]-->
<title>Debt Calculator: USCreditRelief.com</title>
</head>
<body>
<div id="mainContainer" align="center">
<!-- header -->
<div id="headerContainer">
	<div id="imageContainer3">    <div id="titleContainer2">
      	<h1>&ldquo;Getting rid of our debt was the best thing I could have done for my family.&rdquo; &ndash;</h1>
        <h2>Help from the US Credit Relief definitely made it easier!</h2>
    </div>
</div>
    <div id="breadCrumb">
    </div>
	<div id="headerMain">
   	  <div id="logoContainer2"><a href="#"><img src="images/logoV2.gif" width="215" height="109" alt="logo" /></a>
      	<div id="topLeftBg">
        	<div class="text3">Debt Calculator</div>
        	<div class="text2">When deciding the best option for your debt issues, you must first look at your cash flow on a monthly basis. The calculator will compare each option on a monthly cash flow basis as well as the costs to pay back the debt over a specific period of time.
</div>
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
    	<h5>Calculate Your Options for Debt Relief</h5>
      	<div class="text1">When deciding the best option for your debt issues, you must first look at your cash flow on a monthly basis. The calculator will compare each option on a monthly cash flow basis as well as the costs to pay back the debt over a specific period of time.</div>
        <br />
 		<div id="calculatorContainer">
        	<div id="calculatorBg" align="center">
                <div class="calcTextTitle">Enter Your Information</div>
                	<form id="calculator" action="calculator.php" method="post" name="calculator">
                	<table width="500" class="calcTextTitle2" cellpadding="0" cellspacing="0" border="0">                    
                    <tr>
                    <td height="5" colspan="5"></td>
                    </tr>
                    <tr>
                    <td>Total Unsecured Debt:</td>
                    <td><input id="userTotalUnsecuredDebt" class="main" type="text" size="10" value="<? echo $A; ?>" name="userTotalUnsecuredDebt"/></td>
                    <td width="10"></td>
                    <td>Current Int. Rate (Wtd):</td>
                    <td><input id="userAvgInterestRate" class="main" type="text" size="10" value="<? echo $I; ?>" name="userAvgInterestRate"/></td>
                    </tr>
                    <tr>
                    <td height="10" colspan="5"></td>
                    </tr>
                    <tr>
                    <td colspan="5" align="center"><input class="button" type="submit" value="Calculate" name="Submit"/></td>
                    </tr>                    
                    </table>
                    </form>
            </div>       
        </div>
        <div id="debtCalc">
        	<table width="550" cellpadding="0" cellspacing="0" border="0">
            <tr>
            <td width="182" height="20" class="calcTextTitle3" align="center" bgcolor="#5f99cb">$0 - $9,999.99</td>
            <td width="1" bgcolor="#FFFFFF"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            <td width="182" class="calcTextTitle3" align="center" bgcolor="#5f99cb">$10,000 - $35,999</td>
            <td width="1" bgcolor="#FFFFFF"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            <td width="182" class="calcTextTitle3" align="center" bgcolor="#5f99cb">$36,000 - plus</td>
            </tr>
            <tr>
            <td colspan="5" height="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            </tr>
            <tr>
            <td width="182" height="20" class="calcTextTitle3" align="center" bgcolor="#7f7f7f">24 Month Term MAX</td>
            <td width="1" bgcolor="#FFFFFF"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            <td width="182" class="calcTextTitle3" align="center" bgcolor="#7f7f7f">36 Month Term MAX</td>
            <td width="1" bgcolor="#FFFFFF"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            <td width="182" class="calcTextTitle3" align="center" bgcolor="#7f7f7f">48 Month Term MAX</td>
            </tr>
            <tr>
            <td colspan="5" height="30"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            </tr>
            <tr>
            <td colspan="5">
            	<table width="550" cellpadding="0" cellspacing="0" border="0" class="calcTextTitle4">
                <tr>
                <td width="1" ><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca"></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca"><strong>Bank Approved Consolidation Loan</strong></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca"><strong>Credit Counseling*</strong></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca"><strong>Do Nothing <br />(pay min req.)*</strong></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#5f99cb"><strong>US Credit Relief Solution*</strong></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                </tr>
                <tr>
           		<td colspan="11" height="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            	</tr>
                <tr>
                <td width="1" ><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" height="20">Total Unsecured Debt</td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca">$<? echo $LA1; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca">$<? echo $LA2; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca">$<? echo $LA3; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#5f99cb">$<? echo $LA4; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                </tr>
                <tr>
           		<td colspan="11" height="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            	</tr>
                <tr>
                <td width="1" ><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" height="20">Months To Pay Off</td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca"><? echo $NP1; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca"><? echo $NP2; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca"><? echo $NP3; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#5f99cb"><? echo $NP4; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                </tr>
                <tr>
           		<td colspan="11" height="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            	</tr>
                <tr>
                <td width="1" ><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" height="20">Interest Rate</td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca"><? echo $IR1; ?>%</td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca">Variable</td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca"><? echo $IR3; ?>%</td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#5f99cb">None</td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                </tr>
                <tr>
           		<td colspan="11" height="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            	</tr>
                <tr>
                <td width="1" ><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" height="20">Extra Interest Paid</td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca">$<? echo $EI1; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca">$<? echo $EI2; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca">$<? echo $EI3; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#5f99cb">None</td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                </tr>
                <tr>
           		<td colspan="11" height="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            	</tr>
                <tr>
                <td width="1" ><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" height="20" class = "calcTextBold">Monthly Payment</td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" class = "calcTextBold">$<? echo $MP1; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" class = "calcTextBold">$<? echo $MP2; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" class = "calcTextBold">$<? echo $MP3; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#5f99cb" class = "calcTextBold">$<? echo $MP4; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                </tr>
                <tr>
           		<td colspan="11" height="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
            	</tr>
                <tr>
                <td width="1" ><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" height="20" class = "calcTextBold">Your Total Cost</td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" class = "calcTextBold">$<? echo $TC1; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" class = "calcTextBold">$<? echo $TC2; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#cacaca" class = "calcTextBold">$<? echo $TC3; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                <td width="109" bgcolor="#5f99cb" class = "calcTextBold">$<? echo $TC4; ?></td>
                <td width="1"><img src="images/seethru.gif" width="1" height="1" alt="trans" /></td>
                </tr>
                </table>
            </td>
            </tr>
            </table>
        </div>
        <div class="text1">
<p>*The minimum payment on credit card debt is defined by your  credit card companies.  While the  formula can differ from one account to another, it generally amounts to a small  percentage of your current balance.  The  minimum payment becomes lower as your balance is paid.  However, thanks to the way compounding  interest works, you'll end up paying for an extremely long time!</p>
<p>*Credit Counseling is based on a “fixed” or &quot;variable&quot;  interest rate.  Note: formula used is  customer’s average interest rate entered above.</p>
<p>*US Credit Relief Solution is based on a conservative debt  settlement estimate through our debt settlement program at 55% of original  balance.</p>
        </div>
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
