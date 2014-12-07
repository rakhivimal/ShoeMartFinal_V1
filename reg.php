<?php
ob_start();
require "Blogic.php";
session_start();
?>
<html>
<body > 
<form method="POST">
<hr width="100%" size=8 color="red"/>
<center><h1><b>REGISTRATION FORM</h1></center>
</form>
<hr width="100%" size=8 color="red"/>
<form method="post">
<fieldset>
<legend>Personal Details</legend>
<div align="center">
<table>
<tr><td><b>Firstname:</td>
<td><input type="text" name="s1"/></td></tr>
<tr><td><b>Lastname:</td>
<td><input type="text" name="s2"/></td></tr>
<tr><td><b>Gender:</td>
<td><input type="radio" name="r1" value="male"/><b>male
<input type="radio" name="r1" value="female"/><b>female</td></tr>
<tr><td><b>Email id:</td>
<td><input type="text" name="s3"/></td></tr>
<tr><td><b>Password:</td>
<td><input type="password" name="s4"/></td></tr>
<tr><td><b>Address:</td>
<td><textarea cols="25" rows="3" name="s5"></textarea></tr>
<tr><td><b>City:</td>
<td><input type="text" name="s6"/></td></tr>
<tr><td><b>State:</td>
<td><input type="text" name="s7"/></td></tr>
<tr><td><b>Zipcode:</td>
<td><input type="text" name="s8"/></td></tr>
<tr><td><b>Phone no:</td>
<td><input type="text" name="s9"/></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="sub1" value="REGISTER"/></td>
</table>
</div>
</form>
</fieldset>

<?php
error_reporting(E_ALL ^ E_NOTICE); 
$i=0;
if(isset($_POST['sub1']))
{
    $token = getRandomString(10);
	$email=$_POST[s3];
	echo $email;
    $a=md5($token);
    $i=substr($a,0,4);
    $id="mart".$i;
    $str="insert into CUSTOMER(cid,fname,lname,gender,email,password,address,city,state,zipcode,phonenumber) values('$id','$_POST[s1]','$_POST[s2]','$_POST[r1]','$_POST[s3]','$_POST[s4]','$_POST[s5]','$_POST[s6]','$_POST[s7]','$_POST[s8]',$_POST[s9])";
    $obj=new Blogic();
    $res=$obj->ExecuteQuery($str); 
	
    if(@mysql_affected_rows()>0)
    {
        require_once 'swiftmailer/lib/swift_required.php';

  $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
->setUsername('GMAIL_ID')
->setPassword('GMAIL_PASSWORD');

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Registration Email Confirmation')
->setFrom(array('shoemart.team6@gmail.com'))
->setTo(array('vasavimadadi@gmail.com'))
->setBody('You have succefully completed your registration with shoemart. Please use the below link to login <br>http://localhost/ShoeMartFinal/login.php');

$result = $mailer->send($message);
        echo "You have been successfully registered";?>
        </br>
       <?php  echo "Confirmation email is sent to your mail to login";
	    echo "Your ID is ".$id; ?> </br>
        <?php echo "Please use this ID to login";
		  
       
        ob_end_flush();

    }
}
function getRandomString($length) 
{
	       
    $validCharacters = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ123456789_@";
    $validCharNumber = strlen($validCharacters);
    $result = "";
 
    for ($i = 0; $i < $length; $i++)
    {
        $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
	return $result;
 }
?>