<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br /> <br />

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        if (isset($_SESSION['unauthorized'])) {
            echo $_SESSION['unauthorized'];
            unset($_SESSION['unauthorized']);
        }
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if (isset($_SESSION['failed-remove-image'])) {
            echo $_SESSION['failed-remove-image'];
            unset($_SESSION['failed-remove-image']);
        }


        ?>
        <!-- button to add admin -->
        <a href="add-food.php"> <button type="button" class="btn btn-primary">Add Food </button></a>

        <br />
        <br />
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>

            <?php

            $sql = "SELECT * FROM tbl_food";

            $res = mysqli_query($con, $sql);

            $count = mysqli_num_rows($res);

            if ($count > 0) {
                $sn = 1;
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $price = $row['price'];
                    $feature = $row['feature'];
                    $active = $row['active'];

            ?>

                    <tr>
                        <td> <?php echo $sn++; ?> </td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php
                                  if($image_name!="")
                                  {
                                      ?>
                                     <img src="<?php echo SITE_URL; ?>/images/food/<?php echo $image_name; ?>" width="200px" height="100px">
                                      <?php
                                  }
                                  else{
                                        
                                     echo "Image not added";
                                  }

                            ?></td>
                        <td><?php echo $feature; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="<?php echo SITE_URL; ?>/admin/update-food.php?id=<?php echo $id;?>"> <button type="button" class="btn btn-success">Update Food </button> </a>
                            <a href="<?php echo SITE_URL;?>/admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>"> <button type="button" class="btn btn-danger">Delete Food </button> </a>
                        </td>
                    </tr>



            <?php


                }
            } else {

                echo "food not added";
            }


            ?>







        </table>
    </div>


</div>




<?php include('partial/footer.php'); ?>