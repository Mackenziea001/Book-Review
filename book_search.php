<?php 
// core configuration
include_once "config/core.php";
 
// set page title
$page_title="Book Buy";
 
// include login checker
$require_login=true;
include_once "login_checker.php";
 
   // include page header HTML
include_once 'layout_head.php';
 
echo "<div class='col-md-12'>";
?>

<body>
 <div id="search">
           <form action="ebaysearch.php" method="POST">
Search for Books 
<input type="text" name="search_entered" autocomplete="off" /><input type="submit" name="submit" value="Submit"/><br>


<?php
  include 'layout_foot.php';
     ?>