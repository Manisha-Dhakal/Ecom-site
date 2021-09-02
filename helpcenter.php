
<?php            
include 'head.php';
?>  

<html>
<style>
*{
	margin: 0;
	padding: 0;
	outline: none;
	box-sizing: border-box;
	font-family: aerial;
}

body{
	width: 100%;
    margin-top:6%;
    background:white;

}


.wrapper .input {
    width: 85%;
    padding: 15px 20px;
    border: none;
    border-radius: 5px;
    font-weight: bold;
}

.searchbtn {
    background: lightgreen;
    width: 10%;
    border-radius: 5px;
    position: relative;
    cursor: pointer;
}

.searchbtn .fas{
	position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 18px;
}
.searchbtn:hover{
    background-color:pink;
}

#myInput {
  /* background-image: url('/css/searchicon.png'); */
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  /* list-style-type: none; */
  padding: 15px;
  margin: 0;
  width:40%;
}

#myUL li a {
  border: 1px solid orange;
  margin-top: 10px; /* Prevent double borders */
  background-color:lightgreen;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: orange;
}
#myUL2 {
  /* list-style-type: none; */
  padding: 15px;
  margin-top: 1px;
  width:40%;
  align-items:right;
}

#myUL2 li a {
  border: 1px solid orange;
  margin-top: 10px; /* Prevent double borders */
  background-color:lightgreen;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL2 li a:hover:not(.header) {
  background-color: orange;
}
.down{
    margin-top:200px;
}
</style>
<body>
    <h1 style="text-align:center">Hi, how can we help you?</h2>
    <div class="wrapper">
    <input type="text" id="myInput" class="input" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"
	placeholder="What are you looking for?">
    <div class="searchbtn"><i class="fas fa-search"></i></div>
	</div>
    <div class="down">
<ul id="myUL">
  <li><a href="#">How do i pay in on Plants Biratnagar?</a></li>
  <li><a href="#">How do find and use refund voucher?</a></li>

  <li><a href="#">Hpw can i track my order?</a></li>
  <li><a href="#">How do i return my item?</a></li>

  <li><a href="#">How can i add new delivery address to my account?</a></li>
  <li><a href="#">How can i create  new account in Plants Biratnagar?</a></li>
  <li><a href="#">How can i buy product?</a></li>
</ul>
</div>
<ul id="myUL2">
  <li><a href="#">How do i pay in on Plants Biratnagar?</a></li>
  <li><a href="#">How do find and use refund voucher?</a></li>

  <li><a href="#">Hpw can i track my order?</a></li>
  <li><a href="#">How do i return my item?</a></li>

  <li><a href="#">How can i add new delivery address to my account?</a></li>
  <li><a href="#">How can i create  new account in Plants Biratnagar?</a></li>
  <li><a href="#">How can i buy product?</a></li>
</ul>

<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
<?php
include  'footer.php';
?>
