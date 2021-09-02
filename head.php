<?php
// Start session 
if(!session_id()){ 
    session_start(); 
}
?>
<?php
require('connection.inc.php');
require('functions.inc.php');
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
  $cat_arr[]=$row;
}
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// Include the database config file 
require_once 'dbConfig.php'; 
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <!-- <script src="https://kit.fontawesome.com/beaccf3494.js" crossorigin="anonymous"></script> -->
  <script>
function showDetails(cart) {
  var cartType = cart.getAttribute("data-cart-type");
  alert("" + cart.innerHTML + " helps you stores product information in upper cart" + cartType + ".");
}
</script> 
<style>
  /* footer */
   @import url('http://fonts.googleapis.com/css?family=Open+Sans:400,700');

   *{        
	padding:0;
	margin:0;
}

html{
	background-color: #eaf0f2;        
}

body{
	font:16px/1.6 Arial,  sans-serif;
}

.header{
	text-align: center;
	padding-top: 100px;
	margin-bottom:190px;
  
}



/* stay updated with us */
*{
	margin: 0;
	padding: 0;
	outline: none;
	box-sizing: border-box;
	font-family: aerial;
}
.header{
  background-color:darkgreen;
}
.header h1{
  color:grey;
	font: normal 36px 'Cookie', cursive;
	margin: 0;
}
.header h1 span{
	color:#FBFAD9;
}
.wrapper{
	position: absolute;
    margin-top: 100px;
    left: 50%; 
    transform: translate(-50%, -50%);
    background:grey;
    max-width: 550px;
    width: 10000px;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    border-radius: 5px;
   
}

.wrapper .input {
    width: 85%;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
    font-weight: bold;
}

.sbtn {
    background:#FBFAD9;
    width: 20%;
    border-radius: 5px;
    position: relative;
    cursor: pointer;
    height:55px;
}


.sbtn:hover{
    background-color:grey;
}
/* footer fixed bhayo*/

footer{
	position: fixed;
	bottom: 0;
}

@media (max-height:800px){
	footer { position: static; }
	header { padding-top:40px; }
}


.footer-distributed{
	background-color: #2c292f;
	box-sizing: border-box;
	width: 100%;
	text-align: left;
	font: bold 16px sans-serif;
	padding: 50px 50px 60px 50px;
	margin-top: 80px;
}

.footer-distributed .footer-left,
.footer-distributed .footer-center,
.footer-distributed .footer-right{
	display: inline-block;
	vertical-align: top;
}

/* Footer left */

.footer-distributed .footer-left{
	width: 30%;
}

.footer-distributed h3{
	color:  #ffffff;
	font: normal 36px 'Cookie', cursive;
	margin: 0;
}

/*  logo */

.footer-distributed .footer-left img{
	width: 30%;
}

.footer-distributed h3 span{
	color:  #e0ac1c;
}

/*links */

.footer-distributed .footer-links{
	color:  #ffffff;
	margin: 20px 0 12px;
}

.footer-distributed .footer-links a{
	display:inline-block;
	line-height: 1.8;
	text-decoration: none;
	color:  inherit;
}

.footer-distributed .footer-company-name{
	color:  #8f9296;
	font-size: 14px;
	font-weight: normal;
	margin: 0;
}

/*  Center */
.footer-distributed .footer-center h3{
	color:  #ffffff;
	font: normal 36px 'Cookie', cursive;
	margin: 0;
}
.footer-distributed .footer-center{
	width: 35%;
}

.footer-distributed .footer-center i{
	background-color:  #33383b;
	color: black;
	font-size: 25px;
	width: 38px;
	height: 38px;
	border-radius: 50%;
	text-align: center;
	line-height: 42px;
	margin: 10px 15px;
	vertical-align: middle;
    background-color:#FBFAD9;
}

.footer-distributed .footer-center i.fa-envelope{
	font-size: 17px;
	line-height: 38px;
}

.footer-distributed .footer-center p{
	display: inline-block;
	color: #ffffff;
	vertical-align: middle;
	margin:0;
}

.footer-distributed .footer-center p span{
	display:block;
	font-weight: normal;
	font-size:14px;
	line-height:2;
    color:lightgrey;
}

.footer-distributed .footer-center p a{
	color:  #e0ac1c;
	text-decoration: none;
}
.footer-distributed .footer-center i:hover{
	background-color: green;
}

/* Right */

.footer-distributed .footer-right{
	width: 30%;
}

.footer-distributed .footer-company-about{
	line-height: 20px;
	color:  #92999f;
	font-size: 13px;
	font-weight: normal;
	margin: 0;
}

.footer-distributed .footer-company-about span{
	display: block;
	color:  #ffffff;
	font-size: 18px;
	font-weight: bold;
	margin-bottom: 20px;
}
.footer-distributed .footer-right p{
    color:white;
}
.footer-distributed .footer-right b{
    color:yellow;
}
.footer-distributed .footer-right h3{
	color:  #ffffff;
	font: normal 36px 'Cookie', cursive;
	margin: 0;
}
.footer-distributed .footer-icons{
	margin-top: 25px;
    
}
.footer-distributed .footer-icons i{
	size: 50px;  
}

.footer-distributed .footer-icons a{
	display: inline-block;
	width: 35px;
	height: 35px;
	cursor: pointer;
	background-color:#FBFAD9;
	border-radius: 2px;

	font-size: 20px;
	color: black;
	text-align: center;
	line-height: 35px;

	margin-right: 3px;
	margin-bottom: 5px;
}
.footer-distributed .footer-icons a:hover{
    background-color:green;
}
/* code responsive banauna ko laagi*/


@media (max-width: 880px) {

	.footer-distributed .footer-left,
	.footer-distributed .footer-center,
	.footer-distributed .footer-right{
		display: block;
		width: 100%;
		margin-bottom: 40px;
		text-align: center;
	}

	.footer-distributed .footer-center i{
		margin-left: 0;
	}

}
/* for bg */
body{
    margin:0;
    padding:0;
    top:0;
    
    
}
.slider{
    width:95%;
    height:1000px;
    background:url(1.jpg);
    margin: 10px auto;
    animation:slide 2s ;
    background-size:cover;
    background-position: center center;
    background-attachment: fixed;
  
}
@keyframes slide{

    100%{
        background:url(3.jpg);
    }
  
} 

/* for product */
body{
margin:0px;
padding:0px;
font-family:montserrat,sans-serif;
background-color:#FBFAD9;

}

     .slider-box{
      
margin:20px;
height:400px;
width:250px;
position: initial;
background-color:#EFEFEF;
border-radius:5px;
display:flex;
    float:left;
flex-direction:column;
justify-content:left;
align-items:center;
text-align:center;
/* border:1px solid rgba(187,187,187,0.40); */


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
             background-color:grey;
             width:100%;
                 display:flex;
             justify-content:center;
             align-items:center;}
             .cart a{
               color:black;}
               .slider-box:hover .img-box img{
                   transform:scale(1.07);
                   transition:all ease 0.3s;}
                   .cart:hover{
                     transform:scale(1.1);
                     background-color:#FBFAD9;
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
        font-family:calib
                    }	
                    .column{
float: left;
width: 20%; 
background-color:#EFEFEF;


}
/* for product detail page */

.slider1-box{
      
      margin:20px;
      height:500px;
       width:95%; 
      position: initial;
      background-color:#FFFFFF;
      border-radius:5px;
      display:flex;
          float:left;
      flex-direction:column;
      justify-content:left;
      align-items:center;
      text-align:center;
      padding:14px;
      /* border:1px solid rgba(187,187,187,0.40); */
      
      
      }
      
      .slider1-box a{
text-decoration:none;
text-align:center;
        } 
        .box{
  height:200px;
  position:initial;

  }
            .box img{
    height:auto;
    max-width:200%;
    max-height:180%; 
    
    
}

      .column1{
float: left;
width: 100%; 
background-color:white;


}
.col8{
  /* padding-left:2px; */
float: right;
/* width: 50%;  */
/* background-color:lightgrey; */
size:50%;
height:200%;
/* left:40%; */


}
//product showDetails
@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');

main{
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    /* margin-left:100px; */
}
.pcontainer{
  margin-top:100px;
  margin-left:150px;
    width: 80%;
    display: grid;
    grid-template-columns: 40% 60%;
    grid-template-areas: "cover content";
    box-shadow:-2px 0px 33px 0px rgba(0,0,0,0.75);

    /* background-image: url('insert3.jpg'); */
    
    /* height: 80vh; */

}
.pcover img{
  height:100%;
  width:100%;
}
.pcover{
    grid-area: cover;
    height: 80vh;
    /* background-image: url('insert3.jpg'); */
    background-size: cover;
    background-position: center center;
    /* transform:scale(0.5 ); */

                   
    

}

.pcontent{
    grid-area: content;
    background:#efefef;
    display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: space-between;
}
.plogonav{
    margin: 10px 20px;
    height: 40px;
    width: 90%;
    display: flex;
    justify-content: space-between;
    align-content: center;
    color: gray;
}
.pcontent-body{
    display: flex;
    flex-direction: row;
}
.ppages{
    width: 20%;
    height: 40%;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: 10px;
    color: gray;
    position: relative;
    transform: translateY(38px);
}
.ppages span{
    margin-top: 15px;
}
.pblack-label{
    width: 80%;
}
.pblack-label p{
    font-size: 13px;
    color: gray;
    width: 70%;
}
.ptitle{
    font-size: 64px;
}
.pprix{
    margin: 50px 0px;
    width: 45%;
    display: flex;
    justify-content: space-between;
    border-left: 4px solid rgb(255,177,33);
}
.pprix span{
    padding-left: 10px;
}
.pcrt{
    color: gray;
    left: 2px;
    border-bottom: 1px solid rgb(177,177,177);
}
.active{
    color: black;
    position: relative;
    transform: translateX(60px);
}
.active::before{
    position: absolute;
    content: "";
    display: block;
    width: 67px;
    right: 117%;
    top: 45%;
    background-color: #555;
    height: .2em;
    min-height: 1px;
    z-index: 1;
}

</style>   
  
</head>
<body>
<?php               
include "topheader.php";                 //topheader
?>
    </div>
<div class="navbar">
<div class="logo">
  <a href="index.php">
  <img src="logo.png" width="250px">
  </div>
  
   <!--for the categories -->
  <!-- <?php 
    foreach($cat_arr as $list){
    ?>
     <a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list ['categories']?></a>
<?php
}
?> -->
  <div class="subnav">
<a href="viewCart.php">
<button class="subnavbtn">
<div class="cart-view">
         <a href="viewCart.php" title="View Cart"><i class="fa fa-shopping-cart"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)</a>
        </div>
        </button>
    </div>
  <div class="subnav" >
<button class="subnavbtn"><i class="fa fa-user"></i></button>
 <div class="subnav-content">
   <a href="pleaselogin.php">LOGIN</a>
   <a href="pleaseregister.php">NEW HERE?</a>
 </div>
</div>
  <div class="subnav">
  <a href="aboutus.php">
  <button class="subnavbtn">ABOUT US <i class="fa fa-caret-down"></i></button>
  </div> 
<div class="subnav" >
<button class="subnavbtn">CUSTOMER SERVICES <i class="fa fa-rocket"></i></button>
  <div class="subnav-content">
   <a href="helpcenter.php">Help center</a>
   <a href="order.php"> Order</a>
   <a href="shipping.php">Shipping & Delivery</a>
   <a href="payment.php">Payment</a>
   <a href="returns.php">Returns & Refunds</a>
 </div>
</div>
 </div>
