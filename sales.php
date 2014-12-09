<html>
<head>
</head>
<body>
<?php
session_start();
include_once("connect.php");

   $sql = "SELECT all product_id,sum(quantity) as total_quantity from purchase_history product";
    
  $result = mysqli_query($conn,$sql);


  if ( !($result = mysqli_query($conn,$sql)) ) {

      die('<p>Error reading database</p>');
   }
    while( $row = mysqli_fetch_assoc($result)){
?>
	 <table >
	 <form action="review.php" method="post">
    <tr>
         <td>  <?php echo "<b>Model_id:</b> " . $row["model_id"]."<br>";?></td></tr>
	<tr> <td>  <?php echo "<b>Total Quantity sold:</b> " . $row["total_quantity"]."<br>";?><tr>
</table>
<?php
}
mysqli_close($conn);
?>
</body>
</html>