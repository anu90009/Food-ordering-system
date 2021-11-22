<?php include('partial/menu.php') ?>

<!-- main content start -->
<div class="main-content">
    <div class="wrapper">

        <h1>Manage Admin</h1>
      
        <div class=" alert-success" role="alert">
            <?php

            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']); // removing mess
            }

   
 
            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']); // removing mess
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']); // removing mess
            }

            if (isset($_SESSION['change'])) {
                echo $_SESSION['change'];
                unset($_SESSION['change']); // removing mess
            }

            if (isset($_SESSION['pwd'])) {
                echo $_SESSION['pwd'];
                unset($_SESSION['pwd']); // removing mess
            }
             
          

            ?>
        </div>
        <br /> <br />
        <!-- button to add admin -->
        <a href="add-admin.php"> <button type="button" class="btn btn-primary">Add Admin </button></a>
        <!-- <a href="staff.php"> <button type="button" class="btn btn-primary">Add staff </button></a> -->

        <br />
        <br />
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Acions</th>
            </tr>

            <?php

            $sql = "SELECT * from tbl_admin";

            $res = mysqli_query($con, $sql);
            if ($res == true) {
                $count = mysqli_num_rows($res);
                 
                $sn=1;

                if ($count > 0) {

                    while ($rows = mysqli_fetch_assoc($res)) {

                       $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

            ?>

                        <tr>
                            <td><?php echo $sn++; ?> </td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                            <a href="update-password.php?id=<?php echo $id; ?>"> <button type="button" class="btn btn-success">Change Password </button> </a>
                                <a href="update-admin.php?id=<?php echo $id; ?>"> <button type="button" class="btn btn-success">Update Admin </button> </a>
                                 <!-- to pass the id over url  -->
                                <a href="<?php echo SITE_URL?>admin/delete-admin.php?id=<?php echo $id;?>"> <button type="button" class="btn btn-danger">Delete Admin </button> </a>
                            </td>
                        </tr>


            <?php

                    }
                }
            }





            ?>



 
        </table>

    </div>
      <!-- main content end -->
 <!-- for STAFf -->

 <div class="main-content">
    <div class="wrapper">

        <h1>Manage Staff</h1>
        
        <div class=" alert-success" role="alert">
            <?php

            if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']); // removing mess
            }

   
 
            if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']); // removing mess
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']); // removing mess
            }

            if (isset($_SESSION['change'])) {
                echo $_SESSION['change'];
                unset($_SESSION['change']); // removing mess
            }

            if (isset($_SESSION['pwd'])) {
                echo $_SESSION['pwd'];
                unset($_SESSION['pwd']); // removing mess
            }
             
          

            ?>
        </div>
        <br /> <br />
        <!-- button to add admin -->
        
        <a href="staff.php"> <button type="button" class="btn btn-primary">Add staff </button></a>

        <br />
        <br />
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Acions</th>
            </tr>

            <?php

            $sql = "SELECT * from tbl_staff";

            $res = mysqli_query($con, $sql);
            if ($res == true) {
                $count = mysqli_num_rows($res);
                 
                $sn=1;

                if ($count > 0) {

                    while ($rows = mysqli_fetch_assoc($res)) {

                       $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

            ?>

                        <tr>
                            <td><?php echo $sn++; ?> </td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                            <!-- <a href="update-password.php?id=<?php echo $id; ?>"> <button type="button" class="btn btn-success">Change Password </button> </a>
                                <a href="update-admin.php?id=<?php echo $id; ?>"> <button type="button" class="btn btn-success">Update Admin </button> </a> -->
                                 <!-- to pass the id over url  -->
                                <a href="<?php echo SITE_URL?>admin/delete_staff.php?id=<?php echo $id;?>"> <button type="button" class="btn btn-danger">Delete Staff </button> </a>
                            </td>
                        </tr>


            <?php

                    }
                }
            }





            ?>




<!-- 
            <tr>
                <td>1. </td>
                <td>Abhishek</td>
                <td>akv286</td>
                <td>
                    <a href="#"> <button type="button" class="btn btn-success">Update Admin </button> </a>
                    <a href="#"> <button type="button" class="btn btn-danger">Delete Admin </button> </a>
                </td>
            </tr>
            <tr>
                <td>2. </td>
                <td>Abhishek</td>
                <td>akv286</td>
                <td>
                    <a href="#"> <button type="button" class="btn btn-success">Update Admin </button> </a>
                    <a href="#"> <button type="button" class="btn btn-danger">Delete Admin </button> </a>
                </td>
            </tr>
            <tr>
                <td>3. </td>
                <td>Abhishek</td>
                <td>akv286</td>
                <td>
                    <a href="#"> <button type="button" class="btn btn-success">Update Admin </button> </a>
                    <a href="#"> <button type="button" class="btn btn-danger">Delete Admin </button> </a>
                </td>
            </tr> -->
        </table>

    </div>

  <!--  STAFf end  -->
     

  

    <?php include('partial/footer.php') ?>