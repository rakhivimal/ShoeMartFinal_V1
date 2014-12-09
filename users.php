<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>
</head>
<body>
<?php
session_start();
include_once("connect.php");

   $sql = "SELECT cid,fname,lname,email from customer ";
   $count = "select Count(cid) as total_customers from customer";
   $result2 = mysqli_query($conn,$count);
    
  $result1 = mysqli_query($conn,$sql);
  $rows = mysqli_fetch_assoc($result2);
  
 


  if ( !($result = mysqli_query($conn,$sql)) ) {

      die('<p>Error reading database</p>');
   }
    echo "Total Number of Registered Customers :". $rows["total_customers"]."<br>";
	?>
    <table style="width:30%;align=center;">
    <tr><th>Customer_id</th>
	    <th>Firstname</th>  
		<th>LastName</th>
        <th>Email</th> 		</tr>
 <?php   while( $row = mysqli_fetch_assoc($result)){
?>
	
    <tr> <td>  <?php echo   $row["cid"] ;?></td>
	     <td>  <?php echo   $row["fname"];?></td>
	     <td>  <?php echo   $row["lname"];?></td>
		 <td>  <?php echo   $row["email"];?></td></tr><br>

<?php
}
mysqli_close($conn);
?>
</table>
</body>
</html>