<?php include('partial/menu.php')?>

<div class="main-content">
         <div class="wrapper">
             <br>
            <h1>Add Admin</h1>
           <br /> </br>

           <div class=" alert-success" role="alert">
              <?php 
               
               if(isset($_SESSION['add']))
               {
                  echo $_SESSION['add'];
                  unset($_SESSION['add']); // removing mess
               }
              
              
              ?>
                </div>
           

           <form action="" method="post">

            <table  >
              <tr>
              <td> FullName</td>
                <td><input class="form-control form-control-sm" type="text" placeholder="Full name" aria-label=".form-control-sm example" name="fullname"></td>
               
              </tr>
              <tr>
                <td> Username</td>
                <td><input class="form-control form-control-sm" type="text" placeholder="user name" aria-label=".form-control-sm example" name="username"></td>
                
              </tr>

              <tr>
                <td>Password</td>
                <td><input class="form-control form-control-sm" type="password" placeholder="password" aria-label=".form-control-sm example" name="password"></td>
              </tr>
              
              <tr>
                <td>
                <button type="submit" class="btn btn-success" name="submit" value="add admin">Add</button>
                </td>
              </tr>

            </table>

           
           </form>
         </div>
</div>
 
<?php include('partial/footer.php')?>

<?php 

 if(isset($_POST['submit']))
 {
    
   $fullname=$_POST['fullname'];
   $username=$_POST['username'];
   $password=md5($_POST['password']); // password encryption Md5
 
   $sql= "INSERT INTO  tbl_admin set 
    full_name='$fullname',
    username='$username',
    password='$password'
       ";
        
      

       $res= mysqli_query($con,$sql) or die (mysqli_error());

       if($res==true)
       {
        //echo "data inserted";
         
        $_SESSION['add']= "Admin added successfully ";
         
        // redirect page

        header("location:".SITE_URL.'admin/manage-admin.php');

       }
        else
        {
          $_SESSION['add']= "Failed to add admin";
         
          // redirect page
  
          header("location:".SITE_URL.'admin/add-admin.php');
  
        }
 }
 






?>