<?php 
// Database configuration 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecom";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($con) {
  echo"connection succesfull";
   }else{
     echo"connection failed:";
   }
 
  