
<?php 

// Start session 
if(!session_id()){ 
    session_start(); 
} 
// Database configuration 
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "ecom"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}
// // Initialize shopping cart class 
// include_once 'Cart.class.php'; 
// $cart = new Cart; 
 
// // Include the database config file 
// require_once 'dbConfig.php'; 
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<div class="heading">
<h1>P L A C E  &emsp;Y O U R &emsp; O R  D E R  </h1>
</div>

<?php
$result = $db->query("SELECT id,name,image,price FROM product");
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>

<div class="column">
      <div class="slider-box">
<p class="time">New</p><br>
<div class="img-box"><img src="<?php echo "admin/media/product/".$row['image']?>"/> 
</div>
<p class="detail"><?php echo $row["name"];?><br>
<a href="#" class="price">Rs.<?php echo $row["price"];?></a><br>

<div class="cart">
<?php $link ="product _details.php";?>
  <?php $id = $row["id"];?>
<a href="product _details.php?id=<?php echo $id;?>"<?php echo $link;?> data-toggle="modal" data-target="#modal" onClick="baka_function()">Quick View</a> 
<!-- <div class="cart"> -->
<!-- <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" name="Register" onclick="showDetails(this)" id="cart" data-cart-type="-icon">Add To Cart</a> -->
</div>
</div>
</div>
<?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
</form>
<?php
//  include  "footer.php";                 //footer
?>

