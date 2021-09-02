<?php
require('top.inc.php');
$sql="select * from customers order by id desc";
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
							   <th>FirstName</th>
                               <th>LastName</th>
							   <th>Email</th>
							   <th>Phone</th>
							   <th>Address</th>
							   <th>Date</th>
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
							   <td><?php echo $row['first_name']?></td>
							   <td><?php echo $row['last_name']?></td>
							   <td><?php echo $row['email']?></td>
                               <td><?php echo $row['phone']?></td>
                               <td><?php echo $row['address']?></td>
							   <td><?php echo $row['created']?></td>
							   <?php $link ="order.php";?>
                               <?php $id = $row["id"];?>
                               <td><a href="order.php?id=<?php echo $id;?>"<?php echo $link;?>>View order</a></td>
                               <!-- <td><a href="order.php?id=<?php echo $row["id"];?>">View Order</a> -->
							
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