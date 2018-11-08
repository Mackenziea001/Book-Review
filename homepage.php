<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title = "Book2Ealuate";
 
// include login checker
$require_login=false;
include_once "login_checker.php";
 
// default to false
$access_denied=false;
 
?>

<header>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
      
</header>

<body>


<!-- slide show -->
<section>
  <img class="mySlides" src= "https://i2.wp.com/www.singlemotherahoy.com/wp-content/uploads/2015/08/Book-Review-.png?zoom=1.25&resize=820%2C502&ssl=1"
  style="width:100%" height="550" >
  <img class="mySlides" src="http://www.penguinrandomhouseaudio.com/wp-content/uploads/2017/12/close-to-me.jpg"
  style="width:100%" height="550">
  <img class="mySlides" src="https://d1nz104zbf64va.cloudfront.net/dt/a/o/top-7-books-that-changed-the-world.jpg"
  style="width:100%" height="550">
</section>

<!-- Book Review Description -->
<section class="w3-container w3-center w3-content" style="max-width:600px">
  <h2 class="w3-wide">Book Review</h2>
  <p class="w3-opacity"><i>We love books</i></p>
  <p class="w3-justify">We have created this book review website. Its a form of critcism in which a book is analyzed based on content, style, and merit. The review will commonlys use the methods of literary criticism. This review often contains evaulations of books.</p>
</section>

<!-- Band Members -->
<section class="w3-row-padding w3-center w3-light-grey">
  <article class="w3-third">
    <p>J.K. Rowling</p>
    <img src="https://pmcvariety.files.wordpress.com/2018/04/jk-rowling.jpg?w=1000" alt="Random Name" style="width:100%">
  </article>
  <article class="w3-third">
    <p>Neal Shusterman</p>
    <img src="https://i.ytimg.com/vi/7QdhYa5qvfc/maxresdefault.jpg" alt="Random Name" style="width:100%">
  </article>
  <article class="w3-third">
    <p>Dr.Seuss</p>
    <img src="https://www.stmuhistorymedia.org/wp-content/uploads/2017/04/Dr-seuss-ew-770x476.jpg" alt="Random Name" style="width:90%">
  </article>
</section>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-black w3-xlarge">
</footer>

<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 3000);
}
</script>

