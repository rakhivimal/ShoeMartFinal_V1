<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="shoe_mart.css">

	<style type="text/css">
	table.imagetable {
		font-family: verdana,arial,sans-serif;
		font-size:11px;
		color:#333333;
		width: 80%;
		border-width: 1px;
		margin-top: 1cm;
		border-color: #999999;
		border-collapse: collapse;
	}
	table.imagetable th {
		background:#b5cfd2 url('cell-blue.jpg');
		border-width: 1px;
		padding: 8px;
		border-style: solid;
		border-color: #999999;
	}
	table.imagetable td {
		background:#dcddc0 url('cell-grey.jpg');
		border-width: 1px;
		padding: 8px;
		border-style: solid;
		border-color: #999999;
	}

	.button_style{
		background-color:#57A957;
		color:white;
		margin-top: 1cm;
		width: 160px;
		height: 40px;
		margin-bottom: 1cm;
	}
	</style>

</head>
<body>
	<?php
	if(!isset($_SESSION)){
		session_start();
	}
	?>
	<div class= "main">
		<div class="title">
			<h1>Shoe@mart</h1>
		</div>
		<div class="left-Nav">

			<?php include('left_nav.php'); ?>

		</div>
		<div class ="Center-Nav" style="text-align: center;width:1250px">
			<br><br>
			<fieldset >
			<?php

			include_once("manage_cart.php");
			include_once("connect.php");

			if(!empty($_GET["action"])) {
				switch($_GET["action"]) {
					case "remove":
					removeFromCart($_GET["model_id"]);
					break;
					case "empty":
					unset($_SESSION["cart_item"]);
					break;
				}
			}

			if(!empty($_SESSION["cart_item"])) {
				?>
				<h3>Purchase Summary</h3>
				<table class="imagetable">
					<tr>
						<th>Model Name</th>
						<th>Total</th>
						<th>Reomve</th>
					</tr>
					<?php
					$totalPrice=0;
					foreach($_SESSION["cart_item"] as $k => $v) {
						if(!empty($_SESSION["cart_item"][$k]["model_name"])) {
							$totalPrice = $totalPrice +$_SESSION["cart_item"][$k]["total"];
							echo "<tr>";
								echo "<td> <b>".$_SESSION["cart_item"][$k]["model_name"]."</b></td>";
								echo "<td>".$_SESSION["cart_item"][$k]["total"]."</td>";
								echo "<td> <a href='cart_items.php?action=remove&model_id=".$_SESSION["cart_item"][$k]["model_id"]."'>Remove Item </a></td>";
								echo "</tr>";
							}
						}
						echo "</table>";
						echo " <b> The total price :".  $totalPrice. " <b><br>";
						} else {
							?>
							<h3>Your Cart is Empty </h3>
							<a href="<?=$project_root?>/home.php">Continue Shopping</a><br><br>
							<?php
						}
						?>


							<form method="post" action="confirmation.php" ENCTYPE="multipart/form-data">

<!-- your regular form follows -->
<table width=518 border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr bgcolor="#E5E5E5"> 
    <td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp;Billing Information (required)</strong></td>
  </tr>
  <tr> 
    <td height="22" width="180" align="right" valign="middle">First Name:</td>
    <td colspan="2" align="left"><input name="firstname" type="text" size="50"></td>
  </tr>
  <tr> 
    <td height="22" align="right" valign="middle">Last Name:</td>
    <td colspan="2" align="left"><input name="lastname" type="text" size="50"></td>
  </tr>
  <tr> 
    <td height="22" align="right" valign="middle">Street Address:</td>
    <td colspan="2" align="left"><input name="address" type="text" value="" size="50"></td>
  </tr> 
  <tr> 
    <td height="22" align="right" valign="middle">City:</td>
    <td colspan="2" align="left"><input name="city" type="text" value="" size="50"></td>
  </tr>
  <tr> 
    <td height="22" align="right" valign="middle">State/Province:</td>
    <td colspan="2" align="left"><input name="state" type="text" value="" size="50"></td>
  </tr>
  <tr> 
    <td height="22" align="right" valign="middle">Zip/Postal Code:</td>
    <td colspan="2" align="left"><input name="zip" type="text" value="" size="50"></td>
  </tr>
  <tr> 
    <td height="22" align="right" valign="middle">Country:</td>
    <td colspan="2" align="left"><input name="country" type="text" value="" size="50"></td>
  </tr>
  <tr> 
    <td height="22" align="right" valign="middle">Phone:</td>
    <td colspan="2" align="left"><input name="phone" type="text" value="" size="50"></td>
  </tr>
  <tr> 
    <td height="22" colspan="3" align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr bgcolor="#E5E5E5"> 
    <td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp;Credit Card (required)</strong></td>
  </tr>
  <tr> 
    <td height="22" align="right" valign="middle">Credit Card Number:</td>
    <td colspan="2" align="left"><input name="CCNo" type="text" value="" size="19" maxlength="40"></td>
  </tr>
  <tr> 
    <td height="22" align="right" valign="middle">Expiry Date:</td>
    <td colspan="2" align="left">
      <SELECT NAME="CCExpiresMonth">
        <OPTION VALUE="" SELECTED>--Month--
        <OPTION VALUE="01">January (01)
        <OPTION VALUE="02">February (02)
        <OPTION VALUE="03">March (03)
        <OPTION VALUE="04">April (04)
        <OPTION VALUE="05">May (05)
        <OPTION VALUE="06">June (06)
        <OPTION VALUE="07">July (07)
        <OPTION VALUE="08">August (08)
        <OPTION VALUE="09">September (09)
        <OPTION VALUE="10">October (10)
        <OPTION VALUE="11">November (11)
        <OPTION VALUE="12">December (12)
      </SELECT> /
      <SELECT NAME="CCExpiresYear">
        <OPTION VALUE="" SELECTED>--Year--
        <OPTION VALUE="04">2004
        <OPTION VALUE="05">2005
        <OPTION VALUE="06">2006
        <OPTION VALUE="07">2007
        <OPTION VALUE="08">2008
        <OPTION VALUE="09">2009
        <OPTION VALUE="10">2010
        <OPTION VALUE="11">2011
        <OPTION VALUE="12">2012
        <OPTION VALUE="13">2013
        <OPTION VALUE="14">2014
        <OPTION VALUE="15">2015
      </SELECT>
    </td>
  </tr>
  <tr> 
    <td height="22" colspan="3" align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr bgcolor="#E5E5E5"> 
    <td height="22" colspan="3" align="left" valign="middle"><strong>&nbsp;Additional Information</strong></td>
  </tr>
  <tr> 
    <td height="22" align="right" valign="middle">Contact Email:</td>
    <td colspan="2" align="left"><input name="contactemail" type="text" value="" size="50"></td>
  </tr>
</table>
<p><input name="submit" type="submit" value="PURCHASE"></p>
</form>
	</fieldset>

	</div>
	<?php
	if(isset($_POST['submit'])){
$fn=$_POST["firstname"];
 if ((empty($_POST["firstname"]))||(empty($_POST["lastname"]))||(empty($_POST["address"]))||(empty($_POST["city"]))||(empty($_POST["state"]))||(empty($_POST["zip"]))||(empty($_POST["country"]))){
    echo "<script>alert('Few fields are empty please check')</script>";
	//echo "<script>setTimeout(\"location.href = 'http://localhost/ecommerce_project/admin_add.html';\",100);</script>";
	exit();
}
 elseif((empty($_POST["CCNo"]))||(empty($_POST["CCExpiresMonth"]))||(empty($_POST["CCExpiresYear"]))){
  echo "<script>alert('Credit card fields are empty please check')</script>";
   exit();
}
if (!(empty($_POST["firstname"]))&&!(empty($_POST["lastname"]))&&!(empty($_POST["address"]))&&!(empty($_POST["city"]))&&!(empty($_POST["state"]))||!(empty($_POST["zip"]))&&!(empty($_POST["country"]))&& !(empty($_POST["CCNo"]))&&!(empty($_POST["CCExpiresMonth"]))&&!(empty($_POST["CCExpiresYear"]))){
//smtpmailer('$_POST["contactemail"]', 'vasavimadadi@mail.com', 'yourName', 'test mail message', 'Hello World!');
 echo "<script>alert('success')</script>";
}
}
?>
	<div class="footer">
	Copyright © Team-7
	</div>
	</div>
	</body>
	</html>
