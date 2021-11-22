<?php 

// Authorization and Access Control

if (!isset($_SESSION['user'])) {

     $_SESSION['no-login-message']="<div class='text-danger text-center'> please login to access  admin </div>";
     header('location:'.SITE_URL.'admin/login.php');
    
     
}
 else{
     // echo "welcome ".$_SESSION['user'];
 }




?>