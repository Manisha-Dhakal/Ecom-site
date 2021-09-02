<?php
 session_start();
 $database_name="product_details";
 $con=mysqli_connect( host "localhost",user:"root",password"",$database_name);
 if (isset($_POST["add"])){
  if (isset($_SESSION["cart"])){
      $item_array_id = array_column($_SESSION["cart"],"product_id");
      if (!in_array($_GET["id"],$item_array_id)){
          $count = count($_SESSION["cart"]);
          $item_array = array(
              'product_id' => $_GET["id"],
              'item_name' => $_POST["hidden_name"],
              'product_price' => $_POST["hidden_price"],
              'item_quantity' => $_POST["quantity"],
          );
          $_SESSION["cart"][$count] = $item_array;
          echo '<script>window.location="Cart.php"</script>';
      }else{
          echo '<script>alert("Product is already Added to Cart")</script>';
          echo '<script>window.location="Cart.php"</script>';
      }
  }else{
      $item_array = array(
          'product_id' => $_GET["id"],
          'item_name' => $_POST["hidden_name"],
          'product_price' => $_POST["hidden_price"],
          'item_quantity' => $_POST["quantity"],
      );
      $_SESSION["cart"][0] = $item_array;
  }
}

if (isset($_GET["action"])){
  if ($_GET["action"] == "delete"){
      foreach ($_SESSION["cart"] as $keys => $value){
          if ($value["product_id"] == $_GET["id"]){
              unset($_SESSION["cart"][$keys]);
              echo '<script>alert("Product has been Removed...!")</script>';
              echo '<script>window.location="Cart.php"</script>';
          }
      }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shopping cart</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');
  *{
    font-family:'Roboto', sans-serif;
  }
  .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
  </style>
</head>
<body>
<div class=" container" style="width:65%">
<h2>Shopping Cart</h2>
<?php 
$query="SELECT*FROM product ORDER BY id ASC";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
   while ($row=mysqli_fetch_array($result)){
     ?>

       <div class="col-md-3">
       <form method="post" action="cart.php?action=add&id=<?php echo $row["id"] ?>">
       <div class="product">
       <img src="<?php echo $row["image" ]?>"class="img-responsive">
       <h5 class="text-info"><?php $row["pname"]; ?></h5>
       <h5 class="text-danger"><?php $row["price"];?></h5>
       <input type="text" name="quantity" class="form-control" value="1">
       <input type="hidden" name="hidden_name" value="<?php echo $row["pname"];?>">
       <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
       <input type="submit" name="add"  style="margin-top: 5px;" class="btn btn-success" value="Add to cart">
      </div>
      </form>  
      </div>
<?php
   }
  } 
?>
<div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>

    </div>


</body>
</html>