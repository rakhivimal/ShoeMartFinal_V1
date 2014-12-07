<?php
ob_start();
?>
<html>
<body>
</body>
<?php
require "Blogic.php";
session_start();
$_SESSION['b']=$_GET['c'];

  $r=$_SESSION['b'];
 $v=$_SESSION['model'];

    $str="select rate from review where model_id='$v'";
    $obj=new Blogic();
    $res=$obj->ExecuteQuery($str); 
    if(mysql_affected_rows()>0)
    {
        $row=mysql_fetch_row($res);
        $rate=$row[0];
        $rate=($rate+$r)/2;
        echo $rate;
    } 
    
    $str="update review set rate=$rate where model_id='$v'";
    $obj=new Blogic();
    $res=$obj->ExecuteQuery($str); 
    if(mysql_affected_rows()>0)
    {
        echo "ok";
    } 
     
?>

<div>
<table>
<form>
<tr><td><h4>THANK YOU FOR RATING <?php echo $_GET['c']; ?></h4></td></tr>
<tr>
<td align="center"><input type="submit" value="OK" name="t1"</td>
</tr>
</form>
</table>
</div>

<?php
if(isset($_GET['t1']))
{
  header("location:rate1.php");  
}
ob_flush();
?>

