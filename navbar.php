<?php
 include 'topheader.php';
?>
<?php
require('connection.inc.php');
require('functions.inc.php');
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
  $cat_arr[]=$row;
}
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// Include the database config file 
require_once 'dbConfig.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Plants Biratnagar</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/beaccf3494.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script>
function showDetails(cart) {
  var cartType = cart.getAttribute("data-cart-type");
  alert(" Are you sure?" );
}
</script> 
</head>
<body>
  <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href="index.php"><img src="logo.png" width="250px"></a></div>
        <ul class="links">
          <!-- <li><a href="#">Home</a></li> -->
          <li><a href="aboutus.php">ABOUT US</a></li>
          <li>
            <a href="#" class="desktop-link">MY ACCOUNT</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">MY ACCOUNT</label><?php echo "Welcome, " . $_SESSION['user_name'] . "!"; ?>
            <ul>
              <li><a href="pleaselogin.php">LOGIN</a></li>
              <li><a href="pleaseregister.php">NEW HERE?REGISTER</a></li>
            
            </ul>
          </li>
          <li>
            <a href="#" class="desktop-link">CUSTOMER SERVICES</a>
            <input type="checkbox" id="show-services">
            <label for="show-services">CUSTOMER SERVICES</label>
            <ul>
              <li><a href="helpcenter.php">Help Center</a></li>
              <li><a href="order.php">Order</a></li>
              <li><a href="shipping.php">Shipping & Delivery</a></li>
              <li><a href="payment.php">Payment</a></li>
              <li><a href="returns.php">Returns & Refunds</a></li>
              <li>
                <a href="#" class="desktop-link">About us/a>
                <input type="checkbox" id="show-items">
                <label for="show-items">More Items</label>
                <ul>
                  <li><a href="#">Sub Menu 1</a></li>
                  <li><a href="#">Sub Menu 2</a></li>
                  <li><a href="#">Sub Menu 3</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="viewCart.php"><i class="fa fa-shopping-cart"></i>(<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)</a></li>
          
        
        </ul>
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="Type Something to Search..." required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    </nav>
  </div>
  
