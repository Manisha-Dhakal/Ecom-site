<?php
include  'navbar.php';
?>
<?php   
$id = $_GET['id'];
echo $id;
// Start session 
if(!session_id()){ 
    session_start(); 
} 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
// Include the database config file 
require_once 'dbConfig.php'; 
?>
<main>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
 <?php
$result = $db->query("SELECT * FROM product where id=$id"); 
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // $id = $row['id'];
    // $name = $row['name'];
    // $price = $row['price'];
?>
         <div class="pcontainer">
             <div class="pcover">
           <img  src =<?php echo "admin/media/product/".$row["image"];?>>
             <!-- </div> -->
             </div>

             <div class="pcontent">
                 <div class="plogonav">
                     <span class="plogo">Plants Biratnagar</span>
                     <!-- <span><i class='fab fa-sistrix' style='font-size:24px'></i></span> -->
                 </div>
                 <div class="pcontent-body">
                     <div class="ppages">
                         <!-- <span class="active"><b>01</b></span> -->
                        
                     </div>
                     <div class="pblack-label">
                         <span class="ptitle"><b><?php echo $row["name"];?></b></span>
                         <p><?php echo $row["description"];?>
                             </p>
                             <p><?php echo $row["description"];?></p>
                    
                                 <div class="pprix">
                                    <span><b>RS<?php echo $row["price"];?></b></span>
                                    <span class="pcrt">
                                    <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" name="Register" onclick="showDetails(this)" id="cart" data-cart-type="-icon">Add To Cart</a></span>
                                </div>
                                </div>

                    
                 </div>
             </div>
         </div>
         <?php } }else{ ?>
        <p>Product(s) not found.....</p>
        <?php } ?>
</form>
     </main>
         
     <?php
include 'footer.php';
?>
