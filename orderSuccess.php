<?php 
if(!isset($_REQUEST['id'])){ 
    header("Location: index.php"); 
} 
 
// Include the database config file 
require_once 'dbConfig.php'; 
 
// Fetch order details from database 
$result = $db->query("SELECT r.*, c.first_name, c.last_name, c.email, c.phone FROM orders as r LEFT JOIN customers as c ON c.id = r.customer_id WHERE r.id = ".$_REQUEST['id']); 
 
if($result->num_rows > 0){ 
    $orderInfo = $result->fetch_assoc(); 
}else{ 
    header("Location: index.php"); 
} 
?>
<?php

include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Order Status - PHP Shopping Cart</title>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">
<style>
body{
    background-color:lightgrey;
}
.container {
     margin-top:60px;
  border-radius: 5px;
  background-color: #FFE4C4;
  padding: 20px;
  width:80%;
  margin-left:10%;
  /* justify-content:right; */
}
.table th{
  padding-top: 17px;
  padding-bottom: 12px; 
  text-align: left;
  background-color: grey;
  color: white;
  border: 1px solid #ddd;
  padding: 8px;
}
.table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
  margin-top:100px;
  margin-left:5%;
  height:20px;
}
.table td:nth-child(even){background-color: #f2f2f2;}
.table td:nth-child(odd){background-color: #f2f2f2;}

.table td:hover {background-color: white;}
.hdr{
    color:grey;
    font-size:25px;
}
.column {
  float: left;
  width: 50%;
  padding: 9px;
  border:2px lightgrey;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  /* width:20%; */
}
.us{
    width:95%;
    height:600px;
    background:url(5.jpg);
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
<div class="container">
    <h1>ORDER STATUS</h1>
    <div class="col-12">
        <?php if(!empty($orderInfo)){ ?>
            <div class="col-md-12">
                <div class="alert alert-success">Your order has been placed successfully.</div>
            </div>
			
            <!-- Order status & shipping info -->
            
                <div class="hdr">Order Info</div>
                <div class="row">
                <div class="column">
                <p><b>Reference ID:</b></div><div class="column">#<?php echo $orderInfo['id']; ?></p></div>
                <div class="column">
                <p><b>Total:</b></div><div class="column"> <?php echo 'RS.'.$orderInfo['grand_total']; ?></p></div>
                <div class="column">
                <p><b>Placed On:</b></div><div class="column"> <?php echo $orderInfo['created']; ?></p></div>
                <div class="column">
                <p><b>Buyer Name:</b></div> <div class="column"><?php echo $orderInfo['first_name'].' '.$orderInfo['last_name']; ?></p></div>
                <div class="column">
                <p><b>Email:</b></div><div class="column"> <?php echo $orderInfo['email']; ?></p></div>
                <div class="column">
                <p><b>Phone:</b></div><div class="column"> <?php echo $orderInfo['phone']; ?></p></div> 
            </div></div></div>
		
            <!-- Order items -->
            <div class="table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>QTY</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Get order items from the database 
                        $result = $db->query("SELECT i.*, p.name, p.price FROM order_items as i LEFT JOIN product as p ON p.id = i.product_id WHERE i.order_id = ".$orderInfo['id']); 
                        if($result->num_rows > 0){  
                            while($item = $result->fetch_assoc()){ 
                                $price = $item["price"]; 
                                $quantity = $item["quantity"]; 
                                $sub_total = ($price*$quantity); 
                        ?>
                        <tr>
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo 'RS.'.$price; ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo 'RS.'.$sub_total; ?></td>
                        </tr>
                        <?php } 
                        } ?>
                    </tbody>
                </table>
            </div>
        <?php  }else{ ?>
        <div class="col-md-12">
            <div class="alert alert-danger">Your order submission failed.</div>
        </div>
        <?php } ?>
    </div>
</div>
<?php

include 'footer.php';
?>