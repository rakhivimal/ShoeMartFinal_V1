<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
  <div id="wrap">
    <?php include_once("top_nav.php");?>
    <div id ="code-section">
      <!-- ============================ Container ============================-->

      <?php

      include_once("manage_cart.php");

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
        <label_v1>Your Cart Summary</label_v1>
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
            echo " <label_total> The total price :".  $totalPrice. " </label_total><br>";

            echo "<span ><a href='confirmation.php'><img src='assets/logo/checkout.png' alt='Mountain View' style='width:160px;height:40px;margin-left: 470px;'></a></span>";

          } else {
            ?>
            <label_v1>Your Cart is Empty </label_v1><br> <br>
            <a href="<?=$project_root?>/index.php">Continue Shopping</a><br><br>
          <?php
            }
          ?>
          <!-- ============================ Container ============================-->
        </div>
        <?php include_once("footer.php");?>
      </div>
    </body>
    </html>
