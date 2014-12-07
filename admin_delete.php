<!DOCTYPE html>
<html>
<body>

<h1>Delete Stock</h1>
<fieldset style="width:300px;">
<legend>Stock Details</legend>
<div class="main">
<?php
$tbl_name="product"; // Table name
include_once("connect.php");

$sql="SELECT * FROM $tbl_name";
$result = mysqli_query($conn, $sql);

$count=mysqli_num_rows($result);
?>
<table width="400" border="0" cellspacing="1" cellpadding="20px" align="left">
<tr>
<td><form name="form1" method="post" action="">
<table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="5" bgcolor="#FFFFFF"><strong>Delete Shoe Stock</strong> </td>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF">#</td>
<td align="center" bgcolor="#FFFFFF"><strong>Model ID</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Model Name</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Model Price</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Category</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Type</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Size</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>Quantity</strong></td>
</tr>

<?php
while($rows=mysqli_fetch_array($result)){
?>

<tr>
<td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" value="<?php echo $rows['model_id']; ?>"></td>
<td bgcolor="#FFFFFF"><?php echo $rows['model_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['model_name'];?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['model_price'];?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['category'];?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['type'];?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['size'];?></td>
<td bgcolor="#FFFFFF"><?php echo $rows['quantity'];?></td>
</tr>
<?php
}
?>
<tr>
<td colspan="6" align="center" bgcolor="#FFFFFF"><input name="delete" type="submit" value="Delete"></td>
</tr>

<?php
error_reporting(E_ALL ^ E_NOTICE);
$delete = $_REQUEST['delete'];
$checkbox = $_REQUEST['checkbox'];
$count = count($_REQUEST['checkbox']);

if($delete){
for($i=0;$i<$count;$i++){
$del_id = $checkbox[$i];
$sql = "DELETE FROM product WHERE model_id='$del_id'";
echo $sql;
$result = mysqli_query($conn, $sql);
}
if($result){
echo "<meta http-equiv=\"refresh\" content=\"0;URL=admin_delete.php\">";
}
}
mysqli_close($conn);
?>
</table>
</form>
</td>
</tr>
</table>
</div>
<form  height="120" width="120" align ="center" name="input" action="admin_add.html" method="get">
    <table height="10" width="1260">
        <tr align ="left">
            <td align ="left"><input type="submit" value="Go Back" valign ="center"></td>
        </tr>

    </table>
</form>
</fieldset>
</body>
</html>
