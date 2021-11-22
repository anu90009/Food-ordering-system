<?php include('partial/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <br>
        <h1>Add Category</h1>
        <br /> </br>
        
        <?php 
        
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <!-- Add Category form start  -->

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-full">


                <tr>
                    <td> Title:</td>
                    <td><input type="text" name="title" id="" placeholder="Category Title" class="form-control " style="width:30%;"></td>
                </tr>
                <tr>
                <tr> 
                    <td>Image Name:</td>
                    <td>
                    <input type="file" value=" " class="" name="image">
                    </td>
                </tr>
                    <td>Featured:</td>
                    <td> 
                        <input type="radio" name="featured" id="" value="Yes"> Yes
                        <input type="radio" name="featured" id="" value="No"> NO
                </td>
                </tr>
                <tr>
                    <td> Active :</td>
                    <td>
                        <input type="radio" name="active" id="" value="Yes">Yes
                        <input type="radio" name="active" id="" value="No"> NO
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="submit" value="Add category" class="btn btn-success" name="submit">
                    </td>
                </tr>

            </table>
        </form>
        <!-- Add Category form end -->

   <?php
   
    if(isset($_POST['submit']))
    {
        
        $title=$_POST['title'];

        if(isset($_POST['featured']))
        {
            $featured=$_POST['featured'];
        }
        else{
            $featured="No";
      }

      if(isset($_POST['active']))
      {
          $active=$_POST['active'];
      }
      else{
          $active="No";
    }
   
     
        
      if(isset($_FILES['image']['name']))
      {
        $image_name=$_FILES['image']['name'];

        // Auto remane of image
       // get extemsion of image 
       // $ext=end(explode('.',$image_name));
        //renameing the image 
        $image_name=rand(10, 1000).$image_name;
        
        $image_source=$_FILES['image']['tmp_name'];

        $destination_path="../images/category/".$image_name;

        $upload = move_uploaded_file($image_source,$destination_path);

        if($upload==false)
        {
            $_SESSION['upload']="<div class='bg-danger'>Failed to Upload Image</div>";
            header('location:add-category.php');
            die();
        }

      }
      else{

        $image_name="";
      }
   
      $sql=" INSERT into tbl_category SET 
        
      title='$title',
      image_name='$image_name',
      featured='$featured',
      active='$active'
   ";

     $res=mysqli_query($con,$sql);

     if($res==true)
     {
       
         $_SESSION['add']=" <div class='bg-success'> Category Successfully added </div>";
         header('location:manage-category.php');
     }
     else{
         
         $_SESSION['add']=" <div class='bg-success'> Failed to add Category </div>";
         header('location:add-category.php');
     }


    }
   
   
   
   
   ?>
        





    </div>
</div>










<?php include('./partial/footer.php') ?>