

<html>
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: white;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
  width: 100%;
  border: 3px solid green;
  border-right: none;
  padding: 5px;
  height: 20px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: green;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: green;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

/*Resize the wrap to see the search bar change!*/
.wrap{
  width: 30%;
  position: absolute;
  top: 25%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.about-section {
  padding: 150px;
  text-align: center;
  background-color: white;
  color: black;
  margin-top:200px;
  margin-left:20px;
}

.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;

}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: lightgrey;
  color:black;
  overflow: hidden;
}
</style>
<?php              
include "navbar.php";                 //header
?>
<body>
<!-- <div class="wrap">
<h1>Find more solutions</h1>
   <div class="search">
      <input type="text" class="searchTerm" placeholder="What are you looking for?">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div> -->
<div class="about-section">
<h2>Frequently Asked Questions </h2>

<button class="accordion">What can I return? </button>
<div class="panel">
  <p>You may return most new, unopened items sold and fulfilled by PlantsBiratnagar within 30 days of delivery for a full refund.</p>
</div>

<button class="accordion">When will I get my refund? </button>
<div class="panel">
  <p>Usually in about 2-3 weeks. Most refunds are fully refunded within 7 days after we receive and process your return.</p>
</div>

<button class="accordion">Does PlantsBiratnagar offer replacements and exchanges? </button>
<div class="panel">
  <p>Yes, you can create replacement and exchange orders from this page by clicking Return Items and following the instructions. If you received a damaged or defective item, we’ll ship you a replacement of the exact item. If you would like to exchange an item for another, you can exchange for a different size or color or for an item in your Cart.</p>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
  </p>
  </div>

<?php
include  "footer.php";                 //footer
?>
