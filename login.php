<?php
ob_start();
require "Blogic.php";
?>
<html>
<body>
<table  height="100%" width="100%">
<tr height="25%"> <td colspan="4" valign="top" ></td> </tr>


<tr height="20%"> <td width="25%"></td> <td width="17%"></td> 
<td width="29%"><form>
<table>
<tr><td>ID:</td><td><input type="text" name="t1"/><br /></td></tr>
<tr><td>PASSWORD:</td><td><input type="password" name="t2"/><br /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="GO" name="log1"/></td></tr>
</form></td>
</table>
<br/>
<a href="login2.php">Forgot Password?</a>
<br />
<?php
if(isset($_GET['log1']))
{
    session_start();
    $str="select cid,password from CUSTOMER where cid='$_GET[t1]'";
    $obj=new Blogic();
    $res=$obj->ExecuteQuery($str);
    if(mysql_affected_rows()>0)
    {
        $row=mysql_fetch_row($res);
        $_SESSION['id']=$row[0];
        if(strcmp($_GET['t2'],$row[1])==0)
        {
header("location:captcha.php");

        }
		else
    echo "invalid username or password";
    }
    else
    echo "invalid username or password";
}
?>
<?php
ob_flush();
?>
<td width="33%"></td></tr>


<tr height="30%" >  <td colspan="4"></td>



</tr>


<tr height="25%" > <td colspan="4"></td> 
</tr>
</body>
</html>