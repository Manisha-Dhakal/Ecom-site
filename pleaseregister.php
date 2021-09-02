
<?php
 include 'db.php';
session_start();
if(isset($_POST['REGISTER']))
{
 $email= mysqli_real_escape_string($con,$_POST["email"]);
 $password= mysqli_real_escape_string($con,$_POST["psw"]);
 $repeatpassword= mysqli_real_escape_string($con,$_POST["psw-repeat"]);
 $user= mysqli_real_escape_string($con,$_POST["username"]);
 $phone= mysqli_real_escape_string($con,$_POST["phone"]);

//  $pass = password_hash($password, PASSWORD_BCRYPT);   //bcrypting password
//  $repeat = password_hash($repeatpassword, PASSWORD_BCRYPT);

 $emailquery = "select * from loginform where email='$email'"; //check the duplicate entry of email//not allowed
 $query = mysqli_query($con, $emailquery);

 $emailcount = mysqli_num_rows($query);

 if($emailcount > 0){
   ?>
   <script>
   alert("This Email already exists.Try Another one");
   </script>
   <?php
 }else{
   if($password === $repeatpassword){
     $sql ="INSERT INTO loginform (user_name, password, email, repeatpassword, phone) VALUES ('$user', '$password', '$email','$repeatpassword','$phone');";
    
      $iquery = mysqli_query($con, $sql);
      if($iquery){
       echo"connection succesfull";
      }else{
        echo"connection failed:";
         }
         
     }else{
       ?>
       <script>
           alert("Password do not match.");
      </script>
     <?php
    
    }
   }
}
  ?>


<?php                
include "navbar.php";                 //header
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color:lightgrey;
  text-align: left;

}
  
/* Add padding to containers */
.container {
  padding: 16px ;
  background-color:white;
  margin-left:30%;
    margin-top:6%; 
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

/* Overwrite default styles of hr */
hr {
  border: 1px solid black;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: green;
  color: black;
  padding: 16px 20px;
  margin: 8px 0;
  cursor: pointer;
  width: 30%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
  background-color:lightgrey;
}

/* Add  blue text color to terms and privacy*/
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: lightgreen;
  /* align-items: center; */
  width:50%;
  height:50px;
  margin-left:30%;
}
.img{
  float:right;
}

</style>
</head>
<body>
    <div class="bg-img">
        <!-- <img src="logo.png" width="300px"> -->
    </div>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" auto_complete="off">
  <div class="container">
    <h1>|REGISTER|<div class="img"><img src="logoo.jpg" width="150px"></div></h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="email"><b>USERNAME:</b></label>
    <input type="text" placeholder="Enter username" name="username" id="user" required >
    <span><?php if(isset($username_error)) echo $username_error;?></span>
    <br>
    <label for="fname"><b>Email:</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
    <br>
    <label for="pno."><b>PHONE NUMBER:</b></label>
    <input type="text" placeholder="Enter phone no." name="phone" id="phoneno" required>
    <br> 
    <label for="psw"><b>PASSWORD:</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
     <br>
    <label for="psw-repeat"><b>CONFIRM PASSWORD:</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

   <b><button type="submit" value="submit" class="registerbtn" name="REGISTER">REGISTER</button></b></div>
  <div class="signin">
    <p>Already have an account? <a href="pleaselogin.php">Sign in</a>.</p> 

</form>
  </div>
<?php
  include  "footer.php";                 //footer
?>