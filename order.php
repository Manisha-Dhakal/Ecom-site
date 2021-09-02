<?php
$id = $_GET['id'];
echo $id;
require('top.inc.php');
$sql="select o.id, o.customer_id, o.grand_total, o.created, o.status, i.order_id, i.product_id, i.quantity from orders o left join order_items i on o.id = i.id where customer_id=$id";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Customer Orders </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
                       <!-- <a href="#">Add item</a> -->
					  <table class="table">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>ID</th>
							   <th>Grand total</th>
                               <th>Product Id</th>
							   <th>Customer ID</th>
							   <th>Order ID</th>
							   <th>Quantity</th>
							   <th>Date</th>
                               <th>status</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['grand_total']?></td>
							   <td><?php echo $row['product_id']?></td>
							   <td><?php echo $row['customer_id']?></td>
                               <td><?php echo $row['order_id']?></td>
                               <td><?php echo $row['quantity']?></td>
							   <td><?php echo $row['created']?></td>
							   <td><?php echo $row['status']?></td>

							
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>



