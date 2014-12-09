<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="shoe_mart.css" rel="stylesheet" type="text/css" " />
    </head>
    <body>
       <?php
     if(!isset($_SESSION)){
       session_start();
     }
     ?>
    	<div id="wrap">
				<div id="menu">
					<ul>
						<li><a href="index.php" class="active">Home</a></li>
						<li><a href="search.php">Men</a></li>
						<li><a href="search.php">Women</a></li>
						<li><a href="search.php">Children</a></li>
						<li><a href="search.php">Login</a></li>
						<li><a href="search.php">Register</a></li>
						<li><a href="contact.phps">Contact Us</a></li>
					</ul>
				</div><br><br><br>
				
				
				<div id ="code-section">
				
<div class = "links">
<a href="admin_add.html" target="_blank">Add Shoe Stock</a><br><br>
<a href="admin_update.php" target="_blank">Update Shoe Stock</a><br><br>
<a href="sales.php" target="_blank">View Sales Report</a><br><br>
<a href="users.php" target="_blank">View Registered Users</a><br><br>
<a href="admin_delete.php" target="_blank">Delete Shoe Stock</a>

</div>
				</div>
					
              	  
              	  
              
                  	
                
				
				<div id="footer_bot">
					<p><b>Copyright  © Team-6 <b></p>
			        <p><b>E-Commerce Project|Fall 2014<b></p>
				</div>
		
    </body>
</html>
