 <?php 
   include('../config/config.php');
  include('login-check.php'); 
 
  ?>




<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/admin.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
     <title>Food order Website</title>
 </head>
 <body>
     <!-- menu section start -->
     <div class="menu"> 
  
       <div class="wrapper">
       <ul>
                 <li>
                  <a href="index.php">Home</a>
                 </li>
                 <li>
                 <a href="manage-admin.php">Admin</a>
                 </li>
                 <li>
                 <a href="manage-category.php">Category</a>
                 </li>
                 <li>
                 <a href="manage-food.php">Food</a>
                 </li>
                 <li>
                 <a href="manage-order.php">Order</a>
                 </li>  
                 <li>
                 <a href="logout.php">Logout</a>
                 </li>  
             </ul>
       </div>
       </div>
    <!-- menu section end -->