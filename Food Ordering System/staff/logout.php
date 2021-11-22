<?php 
 include('../config/config.php');
 //session_destroy();
 unset($_SESSION['staff']);
 header('location:login.php');


?>