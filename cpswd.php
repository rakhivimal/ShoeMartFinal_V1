<?php
require "Blogic.php";
session_start();
?>
<body background="mbr2.jpg">
<?php
ob_start();
?>
<br /><br /><br /><br /><br />
<form>
<div align="center">
<table border="3">
<tr><td><b>New Password:</td><td><input type="password" name="t1"/></td></tr>
<tr><td><b>Confirm Password:</td><td><input type="password" name="t2"/></td></tr>
<tr><td colspan="2" align="center"><input  type="submit" value="Change Password" name="change"/></td></tr>
</form>

<?php
if(isset($_GET['change']))
{
  if(strcmp($_GET['t1'],$_GET['t2'])==0)
  {
    $a=$_SESSION['id'];
    $str="update CUSTOMER set password='$_GET[t2]' where cid='$a'";
    $obj=new Blogic();
    $res=$obj->ExecuteQuery($str); 
    if(mysql_affected_rows()>0)
    {
		echo "<h2>";
        echo "Password Changed";
		echo "</h2>";
    }
	else
	{
		echo "<h2>";
		echo "Give A New Password";
		echo "</h2>";
	}
	
  }
	else
	{
		echo "<h2>";
		echo "Passwords don't Match";
		echo "</h2>";
	}
    
}
ob_end_flush();
?>
</table>
</div>