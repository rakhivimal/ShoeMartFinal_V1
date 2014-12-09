<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
          case "add":
          if(isset($_POST["model_id"])){
            $dataArray=array($_POST["model_id"], $_POST["model_name"], $_POST["price"],$_POST["quantity"]);
            addToCart($dataArray);
          }
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

        if ($_GET['search'] == "Clear") {
          unset($_SESSION["brand_name"]);
          unset($_SESSION["size"]);
          unset($_SESSION["sort_by"]);
          unset($_SESSION["type"]);
        }

        if (isset($_GET['brand_name'])){
          $_SESSION["brand_name"] = $_GET["brand_name"];
        }

        if (isset($_POST['brand_name'])){
          $_SESSION["brand_name"] = $_POST["brand_name"];
        }

        if (isset($_GET['category'])){
          $_SESSION["category"] = $_GET["category"];
        }

        if (isset($_POST['size'])){
          $_SESSION["size"] = $_POST["size"];
        }

        if (isset($_GET['size'])){
          $_SESSION["size"] = $_GET["size"];
        }

        if (isset($_GET['sort_by'])){
          $_SESSION["sort_by"] = $_GET["sort_by"];
        }

        if (isset($_POST['sort_by'])){
          $_SESSION["sort_by"] = $_POST["sort_by"];
        }

        if (isset($_POST['type'])){
          $_SESSION["type"] = $_POST["type"];
        }

        if (isset($_GET['type'])){
          $_SESSION["type"] = $_GET["type"];
        }


        $query = "SELECT model_id,image, model_name,model_price,size  FROM product where 1 ";

        if (isset($_SESSION['brand_name'])){
          if($_SESSION["brand_name"] != 'Select'){
            $query = $query. " and brand_name ='".$_SESSION['brand_name']."'";
          }
        }

        if (isset($_SESSION['category'])){
          $query = $query.  " and category = '".$_SESSION['category']."'";
        }

        if (isset($_SESSION['size'])){
          if($_SESSION["size"] != 'Select'){
            $query = $query. " and size = ".$_SESSION['size'];
          }

        }

        if (isset($_SESSION['type'])){
          if($_SESSION["type"] != 'Select'){
            $query = $query. " and type = '".$_SESSION['type']."'";
          }
        }


        if (isset($_SESSION["sort_by"])){
          if($_SESSION["sort_by"] != 'Select'){
            $query = $query." order by ".$_SESSION["sort_by"];
          }
        }

        $result = mysqli_query($conn, $query);
        if (!$result) {
          die(mysqli_error($conn));
        }
      }

      ?>
      <div class ="Center-Nav" style="text-align: center;width:1250px">


        <?php
        if (isset($result)) {
          ?>
          <form action="search.php?search=Search" method="post" align ="left">
            <br> <br><br> <br>
            <b>Brand </b>  <select name="brand_name">
              <option value="Select">--Select--</option>
              <<option value="Adidas">Adidas</option>
              <option value="Nike">Nike</option>
              <option value="New-Balance">New-Balance</option>
              <option value="Sketchers">Sketchers</option>
              <option value="Puma">Puma</option>
              <option value="Ralph-Lauren">Ralph-Lauren</option>
              <option value="Asics">Asics</option>
              <option value="Sporto">Sporto</option>
              <option value="Magnum">Magnum</option>
            </select>

            <b>Sort By </b>  <select  name="sort_by">
              <option value="model_id">--Select--</option>
              <option value="size">Size</option>
              <option value="brand_name">Brand</option>
              <option value="model_price">Price</option>
              <option value="type">Type</option>
            </select>

            <b>Shoe Model </b>  <select name="type">
              <option value="Select">--Select--</option>
              <option value="running">Running</option>
              <option value="sports">Sports</option>
              <option value="formal">Formal</option>
              <option value="casual">Casual</option>
            </select>

            <b>Size </b>  <select  name="size">
              <option value="Select">--Select--</option>
              <option value="2">2</option>
              <option value="2.5">2.5</option>
              <option value="3">3</option>
              <option value="3.5">3.5</option>
              <option value="4">4</option>
              <option value="4.5">4.5</option>
              <option value="5">5</option>
              <option value="5.5">5.5</option>
              <option value="6">6</option>
              <option value="6.5">6.5</option>
              <option value="7">7</option>
              <option value="7.5">7.5</option>
              <option value="8">8</option>
              <option value="8.5">8.5</option>
              <option value="9">9</option>
              <option value="9.5">9.5</option>
              <option value="10">10</option>
              <option value="10.5">10.5</option>
              <option value="11">11</option>
              <option value="11.5">11.5</option>
            </select>
            <br>  <br>
                <input type='submit' name ='Search' value='Search' style ="margin-left:500px;width:80px;"/>
          </form>

          <form action="search.php?search=Clear" method="post" align ="left">
                <input type='submit' name ='Clear' value='Clear' style ="margin-left:500px;width:80px;"/>
            <br> <br><br> <br>
          </form>

          <table class ="result-table">
            <?php
            $columnMax=4;
            $columnCount=$columnMax;
            $status="Start";
            while ($row = mysqli_fetch_array($result)) {
              if($columnCount == $columnMax){
                echo "<tr>";
                }
                /*Image*/
                echo "<div style='border=1px;'>";
                echo "<td>" ."<img src='assets/shoe_img/".$row[1]."' class='border' >". "</td>";
                echo "<td> <b>Model:</b>" . $row[2] . "</br>";
                  echo "<b>Price:</b>" . $row[3] . "</br>";
                  echo "<b>Size:</b>" . $row[4] . "</br>";
                  echo " <form method='post' action='search.php?action=add&search=Search'>";
                    echo " <input type='hidden' name='model_id' value='".$row[0]."'/> ";
                    echo " <input type='hidden' name='model_name' value='".$row[2]."'/> ";
                    echo " <input type='hidden' name='price' value='".$row[3]."'/> ";
                    echo " <input type='text' name='quantity' value='1' size='1' /> <br>";
                    echo " <input type='submit' value='Add to cart'/>";
                    echo "</form>";

                    echo " <form action='review.php?reviews=".$row[0]."' method='post'>";
                      echo " <input type='submit' name ='review_submit' value='Reviews'>";
                      echo " </form>";
                      $columnCount = $columnCount - 1;

                      echo "</td>";
                      echo "</div>";

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
              <!-- ============================ Container ============================-->
            </div>
            <?php include_once("footer.php");?>
          </div>
        </body>
        </html>
