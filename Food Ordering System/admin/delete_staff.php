<?php 

 include('../config/config.php');

 $id=$_GET['id'];

 $sql= "DELETE from tbl_staff where id=$id;";

  $res=mysqli_query($con,$sql);

 if($res==true)
 {
   // query executed successfully 
    $_SESSION['delete']="Staff deleted successfully";
   header('location:manage-admin.php');

 }
 else{
  // failed to delete admin
  $_SESSION['delete']="Failed to delete Staff";
  header('location:manage-admin.php');

 }

?>