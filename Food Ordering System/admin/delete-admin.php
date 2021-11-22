<?php 

 include('../config/config.php');

 $id=$_GET['id'];

 $sql= "DELETE from tbl_admin where id=$id;";

  $res=mysqli_query($con,$sql);

 if($res==true)
 {
   // query executed successfully 
    $_SESSION['delete']="Admin deleted successfully";
   header('location:manage-admin.php');

 }
 else{
  // failed to delete admin
  $_SESSION['delete']="Failed to delete Admin";
  header('location:manage-admin.php');

 }

?>