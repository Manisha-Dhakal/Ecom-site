<?php
require('top.inc.php');
if(isset($_POST['submit']))
{
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecom";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$name=$_POST["name"];
$mobile=$_POST["mobile"];
$comment=$_POST["comment"];
$email=$_POST["email"];
$sql = "INSERT INTO contact_us(name, mobile, comment, email) VALUES ('$name','$mobile','$comment','$email');";
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}

?>
    <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Contact</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<!-- <label for="categories" class=" form-control-label">Categories</label> -->
									<!-- <select class="form-control" name="categories_id"> -->
										<!-- <option>Select Category</option> -->
										<!-- <?php
										$res=mysqli_query($con,"select id, from contact_us order by contact_us asc");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$id){
												echo "<option selected value=".$row['id'].">".$row['contact_us']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['contact_us']."</option>";
											}
											
										}
										?> -->
                                        </select>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Contact Name:</label>
									<input type="text" name="name" placeholder=" Enter Contact name" class="form-control" >
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Email:</label>
									<input type="text" name="email" placeholder="Enter email" class="form-control">
								</div>
                                <div class="form-group">
									<label for="categories" class=" form-control-label">Mobile No:</label>
									<input type="text" name="mobile" placeholder="Enter product price" class="form-control" >
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Comment:</label>
									<input type="text" name="comment" placeholder="Enter comment" class="form-control" >
								</div>
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <!-- <div class="field_error"><?php echo $msg?></div> -->
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
 require('footer.inc.php');
?>