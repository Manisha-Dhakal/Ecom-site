
<?php
$title = "Welcome";                 
include "head.php";                 //header
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
    margin-top:15%;
    background:lightgrey;

}

.wrapper{
	position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0,0.6);
    max-width: 550px;
    width: 100%;
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
</style>
<body>
    <h1 style="text-align:center">Hi, how can we help you?</h2>
    <div class="wrapper">
	<input type="text" class="input" 
	placeholder="What are you looking for?">
	<div class="searchbtn"><i class="fas fa-search"></i></div>
</div>

</body>

</html
