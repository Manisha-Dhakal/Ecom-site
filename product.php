
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
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
   body {
margin:0px;
padding:0px;
font-family:montserrat,sans-serif;
background-color:lightgrey;

}

     .slider-box{
      
margin:20px;
height:400px;
width:250px;
position: initial;
background-color:#FFFFFF;
border-radius:5px;
display:flex;
    float:left;
flex-direction:column;
justify-content:left;
align-items:center;
text-align:center;
border:1px solid rgba(187,187,187,0.40);


}
    .slider-box a{
text-decoration:none;
text-align:center;
        }
        .img-box{
  height:170px;
  position:initial;
  }
            .img-box img{
    height:auto;
    max-width:100%;
    max-height:100%;
    
}
             
      .detail{
        font-family: "Comic Sans MS", "Comic Sans", cursive;
      }
      .description{
        line-height:30px;
        color:black;
        padding:0px 2px;
        font-family: "Comic Sans MS", "Comic Sans", cursive;
      }
      .time{
        color:darkgreen;
        background-color:lightgrey;
      }
                    .price{
          color:#FFFFFF;
          background-color:grey;
           line-height:20px;
           }
           .cart{
             position:initial;
             bottom:auto;
              height:50px; 
             background-color:darkgreen;
             width:100%;
                 display:flex;
             justify-content:center;
             align-items:center;}
             .cart a{
               color:#FFFFFF;}
               .slider-box:hover .img-box img{
                   transform:scale(1.07);
                   transition:all ease 0.3s;}
                   .cart:hover{
                     transform:scale(1.1);
                     background-color:lightgrey;
      box-shadow:2px 2px 12px rgba(47,47,47,0.40);
      transition:all ease 0.1s;}
                    .heading{
        display:flex;
        justify-content:center;
      }
      .heading h1{
        border-left:2px solid #000000;
        Border-right:2px solid #000000;
        background-color:darkgreen;
        text-shadow:2px 2px 12px rgba(69,66,66,0.3);
        padding:0px 10px;
        color:#FFFFFF;
        margin:20px;
        font-size:30px;
        font-family:calib;
                    }	
                    .column{
float: left;
width: 20%; 
background-color:grey;


}
  </style>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<div class="return">
<button>
<a href="index.php">CLICK HERE TO RETURN TO THE HOME PAGE
</button>
</div>
<div class="heading">
<h1>INDOOR  &emsp; PLANTS </h1></div>
<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

echo '
<div class="column">
      <div class="slider-box">
<p class="time">New</p><br>
<div class="img-box">
<img src='.$row["image"].'>
</div>
<p class="detail">'.$row["name"].'<br>
<a href="#" class="price">'.$row["price"].'</a><br>
<a href="#" class="description">'.$row["description"].'</a></p>
<div class="cart">
<a href="#"  name="Register" onclick="showDetails(this)" id="cart" data-cart-type="-icon">Add To Cart</a>
</div>
</div>
</div>';

}
}
else {
  echo "0 results";
}
$conn->close();

?>
</form>
</body>
</html>