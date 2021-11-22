<?php include('partial/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <br>
        <h1>Change Password</h1>
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
               
                $password = $rows['password'];
            }
            else{

               header('Location:manage-admin.php');
            }
        }
       
       
       ?>

       
<form action="" method="post">

<table  >
   

  <tr>
    <td>Current Password</td>
    <td><input class="form-control form-control-sm" type="password" placeholder="current password" aria-label=".form-control-sm example" name="current_password"  ></td>
  </tr>
  <tr>
    <td>New Password</td>
    <td><input class="form-control form-control-sm" type="password" placeholder="new password" aria-label=".form-control-sm example" name="new_password" ></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td><input class="form-control form-control-sm" type="password" placeholder=" confirm password" aria-label=".form-control-sm example" name="confirm_password"  ></td>
  </tr>
  
  <tr>
    <td>
    <button type="submit" class="btn btn-success" name="submit" value="change password">Change Password</button>
    </td>
  </tr>

</table>


</form>



    </div>
</div>

<?php 

 if(isset($_POST['submit']))
 {
      $current_password=md5($_POST['current_password']);
      $new_password=md5($_POST['new_password']);
      $confirm_passowrd=md5($_POST['confirm_password']);

      $sql=" SELECT * FROM tbl_admin where id=$id AND password='$current_password'";

      $res=mysqli_query($con,$sql);

      if($res==true)
      {
        $count=mysqli_num_rows($res);
        if($count==1)
        {  if($new_password==$confirm_passowrd)
            {
               
              $sql2= "UPDATE tbl_admin Set password='$new_password' where id=$id";

              $res2=mysqli_query($con,$sql2);

              if($res2==true){

                $_SESSION['pwd']="password changed successfully";
 
                header('location:manage-admin.php');

              }else{
 
                $_SESSION['pwd']="password Failed to changed  ";
 
                header('location:manage-admin.php');

              }

 
             
            }
            else{
                $_SESSION['pwd']="Password not matched";
                header('location:manage-admin.php');
            }
        }
        else{

            $_SESSION['change']="Password not found";
            header('location:manage-admin.php');
        }
      }
      

 }


?>

<?php include('partial/footer.php') ?>