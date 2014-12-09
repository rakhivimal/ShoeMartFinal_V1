<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
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
				</div>
				<div class ="Center-Nav" style="text-align: center;width:1000px">
            <br><br><br>
            <!-- Search button -->
            <form action="search.php" method="GET" >
               <input type="text" name="search_text">
               <input type="submit" value="Search" name ="search"><br><br>
               <!-- Radio buttons -->
               <input type="radio" name="value" value="Brand">Brand
               <input type="radio" name="value" value="Category">Category
            </form></div>
				<!--<div id="top_padding"></div>-->
			  <div id="images">
				
		    <img src="assets/home/img8.jpg" id="image1" style="width:500px;height:400px">
            <img src="assets/home/img0.jpg" id="image2" style="width:500px;height:400px">
			<script src="change_image.js"></script>	
				</div>
				
				
				<!--<div id="content_top"></div>	-->			
				<div id="content_bg_repeat">
					
					<div class="inside">
            	<div class="row-1 outdent">
              	<div class="wrapper">
              	  
              	  
              
                  	
                  </div>
              	</div>
              </div>
              <div class="row-2">
              	<div class="wrapper">
              	  <div class="metam1">
                  	<div class="indent">
                  	  <h2>Fitness</h2>
                      <ul class="list1">
                      	<li>&gt;  <a href="#">Athletic</a></li>
                        <li>&gt;  <a href="#">Cross Country training</a></li>
                        <li>&gt;  <a href="#">Running</a></li>
                        <li>&gt;  <a href="#">Sneakers</a></li>
                      </ul>
                      
                  	</div>
                  </div>
              	  <div class="metam2">
                  	<div class="indent">
                  	  <h2>Latest news</h2>
                      <ul class="news">
                      	<li>
                        	<p class="date">10<span>Dec</span></p>
                       	Demo of our Shoemart                     </li>
                        <li>
                        	<p class="date">23<span>Sept</span></p>
                       	Dolor dapibus eget elemeum ve ursus eleifend elit. Aenea  liq uaerat volutpat.                        </li>
                        <li>
                        	<p class="date">03<span>Oct</span></p>
                       	Aenean aucor wisi et urnuerat volu tpat. Duis ac turpis. Integeum  libero nisl porta.                        </li>
                      </ul>
                  	</div>
                  </div>
              	  <div class="metam3">
                  	<div class="indent">
                  	  <h2>About Us</h2>
                      <a href="#">Company Information</a>
                      <p>Know more about us..</p>
                      <a href="#">Terms and Conditions</a>
                      <p>Review our policies</p>
                      <a href="#">Facebook</a> 
                      <p>Stay Connected</p>
                  	</div>
                  </div>
              	</div>
              </div>
            </div>
					
				</div>
				
				
		</div>
    </body>
</html>
