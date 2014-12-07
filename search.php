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

  include_once("manage_cart.php");
  include_once("connect.php");
  include_once("shoe_mart_config_file.php");

  if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
      case "add":
      $dataArray=array($_POST["model_id"], $_POST["model_name"], $_POST["price"],$_POST["quantity"]);
      addToCart($dataArray);
      break;
      case "remove":
      removeFromCart($_GET["model_id"]);
      break;
      case "empty":
      unset($_SESSION["cart_item"]);
      break;
    }
  }

  /* Post with data from Search
  * Run the Search sql and get ready with the
  * result for display
  */

  if (isset($_GET['search'])) {
    if ($_GET['search'] == "fresh") {
      unset($_SESSION["brand_name"]);
      unset($_SESSION["category"]);
      unset($_SESSION["size"]);
      unset($_SESSION["sort_by"]);
      unset($_SESSION["type"]);
    }

    if (isset($_GET['brand_name'])){
      $_SESSION["brand_name"] = $_GET["brand_name"];
    }

    if (isset($_GET['category'])){
      $_SESSION["category"] = $_GET["category"];
    }

    if (isset($_GET['size'])){
      $_SESSION["size"] = $_GET["size"];
    }

    if (isset($_GET['sort_by'])){
      $_SESSION["sort_by"] = $_GET["sort_by"];
    }

    if (isset($_GET['type'])){
      $_SESSION["type"] = $_GET["type"];
    }


    $query = "SELECT model_id,image, model_name,model_price,size  FROM product where 1 ";

    if (isset($_SESSION['brand_name'])){
      echo $_SESSION['brand_name'];
    }

    if (isset($_SESSION['category'])){
      echo $_SESSION['category'];
    }
    if (isset($_SESSION['size'])){
      echo $_SESSION['size'];
    }
    if (isset($_SESSION['type'])){
      echo $_SESSION['type'];
    }
    if (isset($_SESSION['sort_by'])){
      echo $_SESSION['sort_by'];
    }

    if (isset($_SESSION['brand_name'])){
      $query = $query. " and brand_id ='".$_SESSION['brand_name']."'";
    }

    if (isset($_SESSION['category'])){
      $query = $query.  " and category = '".$_SESSION['category']."'";
    }

    if (isset($_SESSION['size'])){
      $query = $query. " and size = ".$_SESSION['size'];
    }

    if (isset($_SESSION['type'])){
      $query = $query. " and type = '".$_SESSION['type']."'";
    }


    if (isset($_SESSION["sort_by"])){
      $query = $query." order by ".$_SESSION["sort_by"];
    }

    echo $query;

    $result = mysqli_query($conn, $query);
    if (!$result) {
      die(mysqli_error($conn));
    }
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
      <p>
        <b><u>View cart</u></b> <a href="<?=$project_root?>/cart_items.php">
          <img src="assets/logo/cart.jpg" alt="Mountain View" style="width:60px;height:60px">
        </a>
      </p>

      <?php
      if (isset($result)) {
        ?>
        <table class ="result-table">
          <?php
          $columnMax=5;
          $columnCount=$columnMax;
          $status="Start";
          while ($row = mysqli_fetch_array($result)) {
            if($columnCount == $columnMax){
              echo "<tr>";
            }
              /*Image*/
              echo "<td>" ."<img src='assets/shoe_img/".$row[1]."' class='border' >". "</td>";
              echo "<td> <b>Model:</b>" . $row[2] . "</br>";
                echo "<b>Price:</b>" . $row[3] . "</br>";
                echo "<b>Size:</b>" . $row[4] . "</br>";
                echo " <form method='post' action='search.php?action=add&search=Search'>";
                  echo " <input type='hidden' name='model_id' value='".$row[0]."'/> ";
                  echo " <input type='hidden' name='model_name' value='".$row[2]."'/> ";
                  echo " <input type='hidden' name='price' value='".$row[3]."'/> ";
                  echo " <input type='text' name='quantity' value='1' size='1' /> ";
                  echo " <input type='submit' value='Add to cart'/>";
                  echo "</form>";

                  echo " <form action='review.php' method='post'>";
				  echo " <input type='hidden' name='reviews' value='".$row[0]."'/> ";
                    echo " <input type='submit' name ='review_submit' value='Reviews'>";
                    echo " </form>";
                  $columnCount = $columnCount - 1;

                  echo "</td>";

                  if($columnCount == 1){
                    $columnCount=$columnMax;
                    $status="End";
                  }
                }

                if($status="Start"){
                  echo "</tr>";
                }

                ?>
              </table>
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
