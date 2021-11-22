<?php 

 include('../config/config.php');
 
  if(isset($_GET['id']) AND isset($_GET['image_name']))
  {
     // echo "delete";
      $id=$_GET['id']; 
      $image_name =$_GET['image_name'];

      if($image_name==true)
      {
          $path="../images/category/".$image_name;

          $remove=unlink($path);

          if($remove==false)
          {
            $_SESSION['remove']= "<div class='bg-danger'> Failed to remove image  </div>";
            header('location:manage-category.php');
            die();
          }
      }
      $sql= "DELETE from tbl_category where id=$id";
      $res=mysqli_query($con,$sql);
      if($res==true)
       {
         // query executed successfully 
          $_SESSION['delete']="category deleted successfully";
         header('location:manage-category.php');
      
        }

        else{
            // failed to delete admin
            $_SESSION['delete']="Failed to delete category";
            header('location:manage-category.php');
          
           }
      
       
  }
  else{
      
    header('location:manage-category.php');
  }
//  $id=$_GET['id'];

//  $sql= "DELETE from tbl_category where id=$id;";

//   $res=mysqli_query($con,$sql);

//  if($res==true)
//  {
//    // query executed successfully 
//     $_SESSION['delete']="category deleted successfully";
//    header('location:manage-category.php');

//  }
//  else{
//   // failed to delete admin
//   $_SESSION['delete']="Failed to delete category";
//   header('location:manage-category.php');

//  }

?>