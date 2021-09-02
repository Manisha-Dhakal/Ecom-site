
// Include the database config file 
// require_once 'dbConfig.php'; 

<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 'true') {
    echo "Welcome to the member's area, " . $_SESSION['user_name'] . "!";
}
else {
    echo "Please log in first to see this page.";
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
 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// If the cart is empty, redirect to the products page 
if($cart->total_items() <= 0){ 
    header("Location: index.php"); 
} 
 
// Get posted data from session 
$postData = !empty($_SESSION['postData'])?$_SESSION['postData']:array(); 
unset($_SESSION['postData']); 
 
// Get status message from session 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
?>
<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout - PHP Shopping Cart Tutorial</title>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">
<style>
body {
    background-color:lightgrey;
    font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;

}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
  background:white;
}
.submit {
    background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.add {
    background-color: grey;
  color: white;
  padding: 0px 30px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
/* .sub{
    background-color: black;
  color: white;
  padding: 5px 30px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
} */
.submit:hover {
  background-color: lightgrey;
}
.add:hover {
  background-color: lightgrey;
}
input[type=submit] {
  background-color: grey;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: lightgrey;
}
.container h4,h1{
    font-size:40px;
}
.container h3{
    font-size:30px;
    color:grey;
}
.container h6{
    font-size:15px;
    color:grey;
}
.container {
     margin-top: 60px;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width:50%;
  margin-left:5%;
  /* justify-content:right; */
}
.cont{
    margin-top:1px;
}
.col{

float: right;
width: 40%;
/* margin-left:2%;  */
}

.text{
    background-color:lightgrey;
}


.column {
  float: left;
  width: 50%;
  padding: 10px;
  border:2px lightgrey;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.items{
    font-size:19px;
}
.us{
    width:95%;
    height:500px;
    background:url(3.jpg);
    margin: 10px auto;
    /* animation:slide 2s ; */
    background-size:cover;
    background-position: center center;
    background-attachment: fixed;
  
}
</style>
</head>
<body>
<div class="us">     
</div> 
<div class="col">
<div class="container">
    <h1>Check Order</h1>
            <!-- <div class="c"> -->
                <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
                <div class="col">
                    <div class="success"><?php echo $statusMsg; ?></div>
                </div>
                <?php } elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
                <div class="col">
                    <div class="danger"><?php echo $statusMsg; ?></div>
                </div>
                <?php } ?>
			
                    <h3>
                        <span class="text-muted">Your Cart</span>
                        <span class="total"><?php echo $cart->total_items(); ?></span>
                    </h3>
                    
                        <?php 
                        if($cart->total_items() > 0){ 
                            //get cart items from session 
                            $cartItems = $cart->contents(); 
                            foreach($cartItems as $item){ 
                        ?>
                    
                            <div class="row">
                            <div class="column">
                                <h6><?php echo $item["name"]; ?></h6>
                                <small class="text"><?php echo 'RS.'.$item["price"]; ?>(<?php echo $item["qty"]; ?>)</small>
                            </div>
                            <div class="column">
                            <span class="muted"><?php echo 'RS.'.$item["subtotal"]; ?></span></div></div>
                        
                        <?php } } ?>
                        <div class="row">
                            <div class="column">
                       
                            <span class="items">Total (Rs)</span></div>
                            <div class="column">
                            <strong class="items" ><?php echo 'RS.'.$cart->total(); ?></strong></div>
                   
                    
                    <a href="index.php" class="add">Add Items</a>
                </div>
                </div>
                </div>
                 <div class="container">
                    <h4>Contact Details</h4>
                    <form method="post" action="cartAction.php">
                        <div class="row">
                            
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" value="<?php echo !empty($postData['first_name'])?$postData['first_name']:''; ?>" required>
                         
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="<?php echo !empty($postData['last_name'])?$postData['last_name']:''; ?>" required>
                         
                     
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" required>
                   
      
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" required>
                        
                     
                            <label for="last_name">Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo !empty($postData['address'])?$postData['address']:''; ?>" required>
             
                        <input type="hidden" name="action" value="placeOrder"/>
                        <input type="submit" name="checkoutSubmit" value="Place Order">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>