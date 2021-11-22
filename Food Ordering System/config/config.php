<?php 

  session_start();
 // crate constant to store non repeating value
 define('SITE_URL','http://localhost/Food%20Ordering%20System/');
 
 define('LOCALHOST','localhost');
 define('DB_USERNAME','root');
 define('DB_PASSWORD','');
 define('DB_NAME','food-order');


$con = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_connect_error()); //connection

$db_select=mysqli_select_db($con,DB_NAME) or die(mysqli_error());

?>