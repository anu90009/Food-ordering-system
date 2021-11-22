<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br /> <br />

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['no-category'])) {
            echo $_SESSION['no-category'];
            unset($_SESSION['no-category']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if (isset($_SESSION['failed-remove-image'])) {
            echo $_SESSION['failed-remove-image'];
            unset($_SESSION['failed-remove-image']);
        }

        ?>
        <br> <br>
        <!-- button to add admin -->
        <a href="add-category.php"> <button type="button" class="btn btn-primary">Add Category </button></a>

        <br />
        <br />
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Acions</th>
            </tr>

            <?php

            $sql = "SELECT * from tbl_category";

            $res = mysqli_query($con, $sql);

            $count = mysqli_num_rows($res);
            if ($count > 0) {
                $sn=1;
                while ($rows = mysqli_fetch_assoc($res)) {
                    
                    $id = $rows['id'];
                    $title = $rows['title'];
                    $image_name = $rows['image_name'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];

            ?>

                    <tr>
                        <td><?php echo $sn++; ?> </td>
                        <td><?php echo $title; ?></td>
                        <td><?php  
                         
                          if($image_name==true)
                          {
                             ?> 
                                <img src="<?php echo SITE_URL; ?>images/category/<?php echo $image_name; ?>" width="200px" height="150px"  >
                             <?php
                           
                          }
                          else{
                               echo "No Image Found";
                          }
                        
                        
                        
                        ?></td>
                        <td><?php echo $featured; ?> </td>
                        <td><?php echo $active; ?> </td>


                        <td>
                            <a href="<?php echo SITE_URL?>admin/update-category.php?id=<?php echo $id;?> "> <button type="button" class="btn btn-success">Update Category </button> </a>
                            <a href="<?php echo SITE_URL?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>"> <button type="button" class="btn btn-danger">Delete Category </button> </a>
                        </td>
                    </tr>




                <?php
                }
            } else {

                ?>
                <tr>

                    <td colspan="6">
                        <div class="error"> no category added</div>
                    </td>
                </tr>

            <?php




            }





            ?>





        </table>
    </div>


</div>




<?php include('partial/footer.php'); ?>