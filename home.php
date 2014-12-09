<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="shoe_mart.css">
   </head>
   <body>
     <?php
     if(!isset($_SESSION)){
       session_start();
     }
     ?>
      <div class= "main">
         <div class="title">
            <h1>Shoe@mart</h1>
         </div>
         <div class="left-Nav">

           <?php include('left_nav.php'); ?>

         </div>
         <div class ="Center-Nav" style="text-align: center;width:1250px">
            <br><br>
            <!-- Search button -->
            <form action="search.php" method="GET" >

               <input type="submit" value="Start Shopping" name ="search" style="width:80px"><br><br>

            </form>
         </div>
         <div class="brands">
            <img src="assets/logo/logo1.gif" style="width:90px;height:90px"><br>
            <img src="assets/logo/logo2.gif" style="width:90px;height:90px"><br>
            <img src="assets/logo/logo3.gif" style="width:90px;height:90px"><br>
            <img src="assets/logo/logo4.gif" style="width:90px;height:90px"><br>
            <img src="assets/logo/logo1.gif" style="width:90px;height:90px"><br>
            <img src="assets/logo/logo4.gif" style="width:90px;height:90px">
         </div>
         <div class="images">
            <img src="assets/home/img8.jpg" id="image1" style="width:500px;height:400px">
            <img src="assets/home/img0.jpg" id="image2" style="width:500px;height:400px">
         </div>
         <div class="code-section">
         </div>
         <div class="footer">
            Copyright © Team-7
         </div>
		  <script src="change_image.js"></script>
      </div>
   </body>
</html>
