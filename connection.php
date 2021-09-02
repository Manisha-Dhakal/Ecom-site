
  <?php 
  session_start();
// Database configuration 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecom";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn) {
  echo"connection succesfull";
   }else{
     echo"connection failed:";
   }
 