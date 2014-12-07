<?php ob_start();
require "Blogic.php";
session_start();
?>
<body>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<div align="center">
<form>
<table border="3"><tr><td colspan="2"><b>Are you sure you want to logout?</b></td></tr><tr><td align="center" ><input type="submit" name="y" value="YES"/></td><td align="center"><input type="submit" name="n" value="NO"/></td></tr></table>
</form>
</div>
<?php
if(isset($_GET['y']))
{
   header("location:home.php"); 
   session_destroy();
}
else if(isset($_GET['n']))
{
    header("location:mbrprofile.php");
}
ob_flush();
?>