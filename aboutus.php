<?php
include 'topheader.php';
?>
<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  background-color:lightgrey;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}



.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color:darkgreen;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color:#FFE4C4;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.section{
     margin:30px;   
  
}
body{
    margin:0;
    padding:0;
    top:0;
    
    
}
.us{
    width:95%;
    height:500px;
    background:url(3.jpg);
    margin: 10px auto;
    /* animation:slide 2s ; */
    background-size:cover;
    background-position: center center;
    background-attachment: fixed;
  
}
.head h1{
text-align:center;
margin-top:2px;
color:darkgreen;
}
</style>
</head>
<body>
<body>
<div class="us">     
</div>
<span class="head">
<h1>About US</h1></span>
  <div class="section">
  <p>PLANTS BIRATNAGAR is an e-commerce site built for the purpose to provide facility of buying plants of their choice through computer network. This is a site to login to get the latest update of different plants of your desire and buy accordingly.
  Online shopping is expected to grow at a great pace. As of now e-commerce is one of the fastest growing industries in the global economy. Different organizations have to coordinate and direct their products to the customers similarly get the products from the supplier and satisfy everyone’s requirement to maintain smooth and professional status.
  Plants.biratnagar site is a  custom e-commerce website for selling plants to  those who are willing to get different variety of plants to their doorstep. It helps our clients to achieve their desired needs. It is design to built a profitable growth with reduction of cost to customer, developing customer reach and providing a unique customer experience.
</p>
  </div>
<h1 style="color:darkgreen; text-align:center">Our Team</h1>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="3.jpg" alt="Manisha" style="width:100%">
      <div class="container">
        <h2>Manisha Dhakal</h2>
        <p class="title">CEO & Founder</p>
        <!-- <p>hello i ma wolf ..i roOOOar, at same time i can be cute woof woof.</p> -->
        <p>manisa@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="3.jpg" alt="Shuvam" style="width:100%">
      <div class="container">
        <h2>Shuvham Acharya</h2>
        <p class="title">Art Director</p>
        <!-- <p>hello im a snake i will bite you til your death.</p> -->
        <p>shubham@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="3.jpg" alt="Shushma" style="width:100%">
      <div class="container">
        <h2>Shushma Thapa</h2>
        <p class="title">Designer</p>
        <!-- <p>hello i ma cat,shaaaatup you all are my staff..</p> -->
        <p>shushma@example.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<?php
include  "footer.php";                 //footer
?>