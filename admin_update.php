<html>
<body>
<h1>Update stock</h1>
<fieldset style="width:700px;">
<legend>Select model Id</legend>
<form action="" method="POST">
<?php

include_once("connect.php");

$sql = "SELECT model_id FROM product";
$result = mysqli_query($conn,$sql);
echo "<select name='model_id'>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['model_id'] . "'>" . $row['model_id'] . "</option>";
}
echo "</select>";
?><br><br>
<input type="submit" name = "get details" value="get details">
</form>
<?php
//if (isset($_POST['get details'])){
@$value=$_POST['model_id'];
echo "Details for Model ID: $value";
$details="select * from product where model_id ='$value'";
$result1 = mysqli_query($conn,$details);
while ($row = mysqli_fetch_array($result1)) {
?>
</fieldset>
<fieldset>
<form action="update.php" method = "POST">
<fieldset>
<legend>shoe details</legend>
Model ID:<br>
<input type="text" name="modelid" value="<?php echo $row['model_id']; ?>">
<br>
Model Name:<br>
<input type="text" name="modelname" value="<?php echo $row['model_name']; ?>">
<br>
model Price:<br>
<input type="text" name="price" value="<?php echo $row['model_price']; ?>">
<br>
Type:<br>
<input type="text" name="type"value="<?php echo $row['type']; ?>">
<br>
Category:<br>
<input type="text" name="category" value="<?php echo $row['category']; ?>">
<br>
size:<br>
<input type="text" name="size"value="<?php echo $row['size']; ?>">
<br>
Quantity:<br>
<input type="text" name="quantity" value="<?php echo $row['quantity']; ?>">
<br><br>
<input type="submit" name="Submit" value="Submit"></fieldset>
</form>
<?php
}

?>
</fieldset>

</body>
</html>
