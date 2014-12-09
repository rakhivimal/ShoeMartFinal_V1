
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="shoe_mart.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <?php
    if(!isset($_SESSION)){
      session_start();
    }
    include_once("connect.php");
    include_once("shoe_mart_config_file.php");
  ?>
    <div id="menu">
      <ul>
          <li><a href="<?=$project_root?>/index.php"  class="active">Home</a></li>
          <li><a href="<?=$project_root?>/login.php">Login</a></li>
          <li><a href="<?=$project_root?>/reg.php">Register</a></li>
          <li><a href="<?=$project_root?>/search.php?search=fresh&category=men">Men</a></li>
          <li><a href="<?=$project_root?>/search.php?search=fresh&category=women">Women</a></li>
          <li><a href="<?=$project_root?>/search.php?search=fresh&category=children">Children</a></li>
          <li><a href="<?=$project_root?>/cart_items.php">View Cart</a></li>
      </ul>
      <?php
        if(!empty($_SESSION["cart_item"])) {
      ?>
      <p>
        <b><a href="<?=$project_root?>/cart_items.php" onmouseover="Your cart">
          <img src="assets/logo/cart.png" alt="Mountain View" style="width:60px;height:60px;" >
        </a>
      </p>
      <?php } ?>
    </div>
</body>
</html>
