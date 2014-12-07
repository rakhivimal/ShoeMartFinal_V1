<html>
<body>
<?php
if(!isset($_SESSION)){
	session_start();
}

	include_once("connect.php");
	include_once("shoe_mart_config_file.php");

	$modelname=$_POST['modelname'];
  $type=$_POST['type'];
  $size=$_POST['size'];
  $category=$_POST['category'];
  $price  = $_POST['price'];
	$quantity = $_POST['quantity'];
	$image_path = $_POST['path'];
	//$brandId= $_POST['brandId'];
	$brand_name= $_POST['brand_name'];

	echo $brand_name;


  if (empty($_POST['modelname']))  {
	echo "<script>alert('empty modelname')</script>";
	echo "<script>setTimeout(\"location.href = '$project_root/admin_add.html';\",100);</script>";
	exit();
	}
	if (empty($_POST['type']))  {
	echo "<script>alert('empty type')</script>";
	echo "<script>setTimeout(\"location.href = '$project_root/admin_add.html';\",100);</script>";
	exit();
	}
	if (empty($_POST['category']))  {
	echo "<script>alert('empty category')</script>";
	echo "<script>setTimeout(\"location.href = '$project_root/admin_add.html';\",100);</script>";
	exit();
	}
	if (empty($_POST['price']))  {
	echo "<script>alert('empty type')</script>";
	echo "<script>setTimeout(\"location.href = '$project_root/admin_add.html';\",100);</script>";
	exit();
	}
	if (empty($_POST['quantity']))  {
	echo "<script>alert('empty quantity')</script>";
	echo "<script>setTimeout(\"location.href = '$project_root/admin_add.html';\",100);</script>";
	exit();
	}
	if (empty($_POST['size']))  {
	echo "<script>alert('empty size')</script>";
	echo "<script>setTimeout(\"location.href = '$project_root/admin_add.html';\",100);</script>";
	exit();
	}


		$sql1 = "INSERT INTO product (model_name, model_price, category, type, quantity, size, image, brand_name)	VALUES	('$modelname', $price, '$category', '$type', '$quantity', '$size', '$image_path', '$brand_name')";
		echo 	$sql1 ;
		$result1 = mysqli_query($conn ,$sql1) or die(mysql_error());
		/*$sql2 = "INSERT INTO brand (brand_id, brand_name)	VALUES	('','$brand_name')";
		echo 	$sql2 ;

	
	    $result2 = mysqli_query($conn ,$sql2) or die(mysql_error());*/


	if ($result1==1) { // Error handling
	echo "success";
	echo "<script>alert('Record inserted successfully')</script>";
    echo "<script>setTimeout(\"location.href = '$project_root/admin_add.html';\",100);</script>";
	exit();
	}
	//}
	else{
    echo "Something went wrong! :(";
        }

?>
</body>
</html>
