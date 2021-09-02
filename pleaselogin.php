
<?php 
include('connection.php');
// include('function.php');
 $msg='';
  if(isset($_POST['submit'])){
   $user_name=mysqli_real_escape_string($conn,$_POST['user_name']);
   $password=mysqli_real_escape_string($conn,$_POST['password']);
   $pass = password_hash($password, PASSWORD_DEFAULT); 
  //  $msg=$pass;
//    $hash = password_hash($password, PASSWORD_DEFAULT);
//    if (!password_verify($password, $hash)) {
//     echo 'Invalid password.';
//     exit;
// }
    $sql="select * from loginform where user_name='$user_name' and password='$password' limit 1";
    $res=mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($res);
    if($rowcount > 0){
      $_SESSION['loggedin'] ='yes';
      $_SESSION['user_name']= $user_name;
      header('location:index.php');
      die();
    }
  
    else{
     $msg="Please enter correct login details";	
    }
  
  }
       
 include "navbar.php";                 //header

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body {
  font-family: Arial, Helvetica, sans-serif;
  background-color:lightgrey;
  text-align: left;

}

* {
  box-sizing: border-box;
  
}

/* Add padding to containers */
 .container {
  padding: 16px ;
  background-color:white;
  margin-left:30%;
    margin-top: 7%; 
    width:50%;
    
    
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* line */
hr {
  border: 1px solid black;
  margin-bottom: 25px;
}
button[type=text]:focus, button[type=submit]:focus {
  background-color: #ddd;
  outline: solid black;
}
/*  submit button */
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
.img{
  float:right;
}

</style>
<body>
<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<div class="container">
 <h1>|LOGIN|<div class="img"><img src="logoo.jpg" width="150px"></div></h1>
<p>Please fill in this form to Login.</p>
<hr>
USERNAME OR EMAIL: <br><input type="text" placeholder="Enter username or email" name="user_name" required><br>
PASSWORD: <br><input type="password" placeholder="Enter password"  name="password" required><br>
<b><button type="submit" name="submit" class="submitbtn" value="Login">SUBMIT</button></b>
<br>
<?php echo $msg?>
</form>

</div>
<?php
  include  "footer.php";                 //footer
?>

