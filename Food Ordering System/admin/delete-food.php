
 <?php 
   
   include('../config/config.php');
 
   if(isset($_GET['id']) && isset($_GET['image_name']))
   {
    //    echo "foodd0";

        $id=$_GET['id'];
        $image_name= $_GET['image_name'];

        if($image_name!="")
        {

          $path="../images/food/".$image_name;

          $remove=unlink($path);

          if($remove==false)
          {
              $_SESSION['upload']= "<div class='bg-danger'>Failed to Remove image file</div>";

              header('location:manage-food.php');
              die();
          }
        
           $sql= "DELETE FROM tbl_food where id=$id";

           $res=mysqli_query($con,$sql); 

            if($res==true)
            {
                $_SESSION['delete']="<div class='bg-success'>Food delete successfully </div>";
                header('location:manage-food.php');
            }
            else{
                $_SESSION['delete']="<div class='bg-success'>Failed to delete food </div>";
                header('location:manage-food.php');
            }

        }
       
         else{
    //    echo "not get";
       $_SESSION['unauthorized']="<div class='bg-danger'> Unauthorized Access </div>";
       header('location:manage-food.php');
   }

   }
   else{
    //    echo "not get";
       $_SESSION['unauthorized']="<div class='bg-danger'> Unauthorized Access </div>";
       header('location:manage-food.php');
   }
 
 
 ?>