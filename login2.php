<?php
ob_start();
require "Blogic.php";
?>
<html>
<body >
<table  height="100%" width="100%">
<tr height="25%"> <td colspan="4" valign="top" ></td> </tr>


<tr height="20%"> <td width="21%"></td> <td width="18%"></td> 
<td width="29%">
<form>
<table>
<tr><td>PHNO:</td><td><input type="text" name="t1"/><br /></td></tr>
<tr><td>NEW PASSWORD:</td><td><input type="password" name="t2"/><br /></td></tr>
<tr><td>CONFIRM PASSWORD:</td><td><input type="password" name="t3"/><br /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="CHANGE" name="log1"/></td></tr>
</form></td>
</table>





<?php
if(isset($_GET['log1']))
{
	$a=$_GET['t1'];
    $str="select cid from CUSTOMER where phonenumber=$a";
    $obj=new Blogic();
    $res=$obj->ExecuteQuery($str);
    if($row=mysql_fetch_row($res))
    {
            $b=$row[0];
		if(strcmp($_GET['t2'],$_GET['t3'])==0)
	  {
		$str="update CUSTOMER set password='$_GET[t2]' where cid='$b'";
		$obj=new Blogic();
		$res=$obj->ExecuteQuery($str);
		if(mysql_affected_rows()>0)
		{echo "Changed..!!";} 
		else {echo "Give A New password";}
	  }
	  else
	  {
	  echo "Passwords don't match";
	  }
	}
	else{
	echo "Try again";
	}
}
?>
<td width="33%"></td></tr>


<tr height="30%" >  <td colspan="4"></td>



</tr>


<tr height="25%" > <td colspan="4"></td> 
</tr>
</body>
</html>