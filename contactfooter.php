
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecom";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM contact_us";
$result = $conn->query($sql);
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      echo'
      <i class="fa fa-phone"></i>
      <p>'.$row["mobile"].'</p>
  </div>
  <div>
      <i class="fa fa-envelope"></i>
      <p><a href="#">'.$row["email"].'</a></p>';
}
}
else {
  echo "0 results";
}
$conn->close();
  
      ?>
</form>
