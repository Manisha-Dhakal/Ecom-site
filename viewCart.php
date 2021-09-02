<?php
include 'topheader.php';
?>
<?php 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/beaccf3494.js" crossorigin="anonymous"></script>
  <script>
function showDetails(cart) {
  var cartType = cart.getAttribute("data-cart-type");
  alert("" + cart.innerHTML + " helps you stores product information in upper cart" + cartType + ".");
}

function updateCartItem(obj,id){
    $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
        if(data == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}

</script> 
<style>
body{
  background-color:lightgrey;
}
.cont{
    margin-top:50px;
    margin-left:50px;
    height:250px;

}
.cont h1{
    background-color:lightgrey;
width:90%;
text-align:center;
color:darkgreen;
}

               #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 98%;
}

#customers td, #customers th {
  border: 1px solid white;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:#FFE4C4;
  color: black;
}
.check{
  margin-top:100px;
    background-color:darkgreen;
    width:200px; 
    color:white;
    height:50px;
}
.check:hover{
    background-color:grey;
  
}
.check1{
  /* margin-top:100px; */
    background-color:darkgreen;
    width:200px; 
    color:white;
    height:50px;
}
.check1:hover{
    background-color:grey;
  
}
body{
    margin:0;
    padding:0;
    top:0;
    
    
}
.us{
    width:95%;
    height:500px;
    background:url(2.jpg);
    margin: 10px auto;
    /* animation:slide 2s ; */
    background-size:cover;
    background-position: center center;
    background-attachment: fixed;
  
}

</style>   
  
</head>
<body>
<?php               
// include "topheader.php";                 //topheader
?>
  <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="cart-view">
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
            <label for="show-services">Services</label>
            <ul>
              <li><a href="#">Help Center</a></li>
              <li><a href="#">Order</a></li>
              <li><a href="#">Shipping & Delivery</a></li>
              <li><a href="#">Payment</a></li>
              <li><a href="#">Returns & Refunds</a></li>
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
          <li><a href="viewCart.php"><i class="fa fa-shopping-cart"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)</a></li>
        
        </ul>
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="Type Something to Search..." required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
      <!-- <label for="cart-view"><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
</label> -->
    </nav>
  </div>
</div>
</div>
<div class="us">     
</div>
<div class="cont">
    <h1>SHOPPING CART</h1>
                    <table id="customers">
                        <thead>
                            <tr>
                                <th width="45%">Product</th>
                                <th width="10%">Price</th>
                                <th width="15%">Quantity</th>
                                <th class="text-right" width="20%">Total</th>
                                <th width="10%"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if($cart->total_items() > 0){ 
                                // Get cart items from session 
                                $cartItems = $cart->contents(); 
                                foreach($cartItems as $item){ 
                            ?>
                            <tr>
                                <td><?php echo $item["name"]; ?></td>
                                <td><?php echo 'RS.'.$item["price"]; ?></td>
                                <td><input class="form-control" type="number" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"/></td>
                                <td class="text-right"><?php echo 'RS.'.$item["subtotal"]; ?></td>
                                <td class="text-right"><button onclick="return confirm('Are you sure?')?window.location.href='cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;"><i class="fa fa-trash"></i></button> </td>
                            </tr>
                            <?php } }else{ ?>
                            <tr><td colspan="5"><p>Your cart is empty.....</p></td>
                            <?php } ?>
                            <?php if($cart->total_items() > 0){ ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Cart Total</strong></td>
                                <td class="text-right"><strong><?php echo 'RS.'.$cart->total(); ?></strong></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><button class="check">
                        <a href="index.php" class="check" >CONTINUE SHOPPING</a></button>
                    </div>
                    <div>
                       <!-- <?php  
                       if(!isset($_SESSION['email'])){
                        header("Location: pleaselogin.php");
                       }else{
                       include('checkout.php');
                       }
                       ?>  -->
                      </div> 
                        <?php if($cart->total_items() > 0){ ?>
                       <button class="check1">
                        <a href="checkout.php" class="check1" >CHECKOUT  ORDER</a>
                        </button>
                        <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';?>