<?php 

// Authorization and Access Control

if (!isset($_SESSION['staff'])) {

     $_SESSION['no-login-message']="<div class='text-danger text-center'> please login to access  admin </div>";
     header('location:'.SITE_URL.'staff/login.php');
    
     
}
 else{
     // echo "welcome ".$_SESSION['user'];
     header('location:'.SITE_URL.'staff/');
 }




?>