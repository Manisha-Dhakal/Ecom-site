<?php require('top.php')?>


<!-- <?php
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

$name=$_POST["itemname"];
$price=$_POST["price"];
$image=$_POST["image"];
$description=$_POST["description"];
$sql = "INSERT INTO product(name, image, price, description) VALUES ('$name','$image','$price','$description');";
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
<?php
$title = "Welcome";                 
include "header.php";               
?>
<?php
$title = "Welcome";                 
include "sidenav.php";                
?>-->
<html>
<style>
  body {
  font-family: Arial, Helvetica, sans-serif;
  width:40%;
  text-align: left;

}
* {
  box-sizing: border-box;
  
}
.main {
  padding: 16px ;
  background-color:white;
  left: 100%;
    margin-left:40%;
    margin-top: 20%;
    width:100%;
    box-shadow:2px solid black;
    
}

/* Full-width input fields */
input[type=text], input[type=file] ,input[type=textarea]{
  width: 60%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=textarea]:focus, input[type=file]:focus {
  background-color: #ddd;
  outline: none;
}
.submitbtn {
  background-color: green;
  color:black;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 25%;
  opacity: 0.9;
}

.submitbtn:hover {
  opacity: 1;
  background-color:lightgrey;
}

</style>
<div class="main">
    <h3>ADD TO PRODUCT</h>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    IMAGE<BR><input type="file"  alt="submit"  width="50px" name="image"><br>
    PRODUCT NAME<br><input type="text"  name="itemname"><br>
    PRICE<br><input type="text" name="price"><br>
    DESCRIPTION<br><input type="textarea" name="description"><br>
    <input type="submit" class="submitbtn" name="submit">
    </form>
</div>


</body>
</html>