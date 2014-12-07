<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="shoe_mart.css">

  <style type="text/css">
    table.imagetable {
      font-family: verdana,arial,sans-serif;
      font-size:11px;
      color:#333333;
      width: 60%;
      border-width: 1px;
      margin-top: 1cm;
      border-color: #999999;
      border-collapse: collapse;
    }
    table.imagetable th {
      background:#b5cfd2 url('cell-blue.jpg');
      border-width: 1px;
      padding: 8px;
      border-style: solid;
      border-color: #999999;
    }
    table.imagetable td {
      background:#dcddc0 url('cell-grey.jpg');
      border-width: 1px;
      padding: 8px;
      border-style: solid;
      border-color: #999999;
    }

    .button_style{
      background-color:#57A957;
      color:white;
      margin-top: 1cm;
      width: 300px;
      height: 40px;
      margin-bottom: 1cm;
    }
  </style>

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
      <?php

      include_once("manage_cart.php");
      include_once("connect.php");

      if(!empty($_GET["action"])) {
        switch($_GET["action"]) {
          case "remove":
          removeFromCart($_GET["model_id"]);
          break;
          case "empty":
          unset($_SESSION["cart_item"]);
          break;
        }
      }

      if(!empty($_SESSION["cart_item"])) {
        ?>
        <h3>Your Cart Summary</h3>
        <b><a href='cart_items.php?action=empty'>Empty Cart</a></b>
        <table class="imagetable">
          <tr>
            <th>Model Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Shipping Charge</th>
            <th>Total</th>
            <th>Reomve</th>
          </tr>
          <?php
          $totalPrice=0;
          foreach($_SESSION["cart_item"] as $k => $v) {
              if(!empty($_SESSION["cart_item"][$k]["model_name"])) {
                $totalPrice = $totalPrice +$_SESSION["cart_item"][$k]["total"];
                    echo "<tr>";
                    echo "<td> <b>".$_SESSION["cart_item"][$k]["model_name"]."</b></td>";
                    echo "<td>".$_SESSION["cart_item"][$k]["quantity"]."</td>";
                    echo "<td>".$_SESSION["cart_item"][$k]["price"]."</td>";
                    echo "<td>".$_SESSION["cart_item"][$k]["shippingCharge"]."</td>";
                    echo "<td>".$_SESSION["cart_item"][$k]["total"]."</td>";
                    echo "<td> <a href='cart_items.php?action=remove&model_id=".$_SESSION["cart_item"][$k]["model_id"]."'>Remove Item </a></td>";
                    echo "</tr>";
              }
            }
            echo "</table>";
            echo " <b> The total price :".  $totalPrice. " <b><br>";
            echo "<span class='button_style'><a href='confirmation.php'>Proceed To Checkout</a></span>";

          } else {
            ?>
            <h3>Your Cart is Empty </h3>
            <a href="<?=$project_root?>/home.php">Continue Shopping</a><br><br>
          <?php
            }
          ?>

    </div>

    <div class="footer">
      Copyright © Team-7
    </div>
  </div>
</body>
</html>
