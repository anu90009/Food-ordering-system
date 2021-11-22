<?php include('partial/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <br>
        <h1>Update Admin</h1>
        <br /> </br>

        <?php 
        
         $id=$_GET['id'];

         $sql="SELECT * FROM tbl_admin where id=$id" ;

         $res=mysqli_query($con,$sql);
         if($res==true)
         {
             $count=mysqli_num_rows($res);

             if($count==1)
             {
                 $rows=mysqli_fetch_assoc($res);
                $full_name = $rows['full_name'];
                $username = $rows['username'];
             }
             else{

                header('Location:manage-admin.php');
             }
         }
        
        
        ?>


        <form action="" method="post">

            <table>
                <tr>
                    <td> FullName</td>
                    <td><input class="form-control form-control-sm" type="text" placeholder="Full name" aria-label=".form-control-sm example" name="full_name" value="<?php echo $full_name;?>"></td>

                </tr>
                <tr>
                    <td> Username</td>
                    <td><input class="form-control form-control-sm" type="text" placeholder="user name" aria-label=".form-control-sm example" name="username" value="<?php echo $username; ?>"></td>

                </tr>

                 

                <tr>
                    <td>
                        <button type="submit" class="btn btn-success" name="submit" value="add admin">Update</button>
                    </td>
                </tr>



            </table>







    </div>
</div>



<?php

 if(@$_POST['submit'])
 {
    $full_name = $_POST['full_name'];
     $username = $_POST['username'];

     $sql="UPDATE tbl_admin SET
      full_name='$full_name',
      username='$username'
      where id='$id'
     ";

     $res=mysqli_query($con,$sql);
     if($res==true)
     {
         $_SESSION['update']= " <h5>Admin updated Successfully</h5>";
         header('location:manage-admin.php');
     }
     else{
        $_SESSION['update']= "Failed to updated Admin";
        header('location:manage-admin.php');
     }
 }


?>




<?php include('partial/footer.php') ?>