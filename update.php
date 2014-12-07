<?php

include_once("connect.php");
include_once("shoe_mart_config_file.php");

if (isset($_POST['Submit'])){
    $modelid=$_POST['modelid'];
    $modelname=$_POST['modelname'];
	echo $modelname;
    $type=$_POST['type'];
    $size=$_POST['size'];
    $category=$_POST['category'];
    $price  = $_POST['price'];
	$quantity = $_POST['quantity'];
 // if (isset($_POST['submit'])){
  $update_query="update product set model_name='$modelname',model_price='$price',type='$type',category='$category',size='$size',quantity='$quantity' where model_id='$modelid'";
  $result2 = mysqli_query($conn, $update_query);
  }
   if ($result2==1){
   echo "<script>alert('stock updated successfully')</script>";
   echo "<script>setTimeout(\"location.href = '".$project_root."/admin_update.php';\",100);</script>";
   exit();
   }
   else{
   echo "Opps something went wrong!";
   }
?>
