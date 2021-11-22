<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <br>
        <h1>Update Category</h1>
        <br /> </br>

        <?php

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * from tbl_category where id=$id";
            $res = mysqli_query($con, $sql);

            $count = mysqli_num_rows($res);

            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $current_image = $row['image_name'];
                $title = $row['title'];
                $featured = $row['featured'];
                $active = $row['active'];
            } else {

                $_SESSION['no-category'] = "<div class='bg-danger'>No Category Found</div>";
                header('location:' . SITE_URL . 'admin/manage-category.php');
                // header('location:manage-category.php');
            }
        }

        ?>



        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-full">


                <tr>
                    <td> Title:</td>
                    <td><input type="text" name="title" id="" placeholder="Category Title" class="form-control " style="width:30%;" value="<?php echo $title; ?>"></td>
                </tr>
                <tr>
                <tr>
                    <td> Current Image</td>
                    <td>
                        <?php

                        if ($current_image == true) {
                        ?>
                            <img src="<?php echo SITE_URL; ?>/images/category/<?php echo $current_image; ?>" width="200px" height="150px">
                        <?php

                        } else {
                            echo "No Image Found";
                        }



                        ?>
                    </td>
                </tr>

                <tr>
                    <td> New Image</td>
                    <td>
                        <input type="file" value=" " class="" name="image">
                    </td>
                </tr>

                <td>Featured:</td>
                <td>
                    <input <?php if ($featured == "Yes") {
                                echo "checked";
                            }  ?> type="radio" name="featured" id="" value="Yes"> Yes
                    <input <?php if ($featured == "No") {
                                echo "checked";
                            }  ?> type="radio" name="featured" id="" value="No"> NO
                </td>
                </tr>
                <tr>
                    <td> Active :</td>
                    <td>
                        <input <?php if ($featured == "Yes") {
                                    echo "checked";
                                }  ?> type="radio" name="active" id="" value="Yes">Yes
                        <input <?php if ($featured == "No") {
                                    echo "checked";
                                }  ?> type="radio" name="active" id="" value="No"> NO
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" id="" value="<?php echo $id;  ?>">
                        <input type="submit" value="Update category" class="btn btn-success" name="submit">
                    </td>
                </tr>

            </table>
        </form>

        <?php

        if (isset($_POST['submit'])) {
            // echo "clicked";
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];
            // check if image is selected the update the image
            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];

                if ($image_name !="") {



                   // $ext = end(explode('.', $image_name));

                    $image_name = rand(10, 1000).$image_name  ;

                    $image_source = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/" . $image_name;

                    $upload = move_uploaded_file($image_source, $destination_path);

                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='bg-danger'>Failed to Upload Image</div>";
                        header('location:manage-category.php');
                        die();
                    }
                    // remove current image

                    if ($current_image == true) {
                        $remove_path = "../images/category/" . $current_image;
                        $remove = unlink($remove_path);

                        if ($remove == false) {
                            $_SESSION['failed-remove-image'] = "<div class='bg-danger'>Unable to Remove image</div>";
                            header('location:manage-category.php');
                            die();
                        }
                    } else {
                        $image_name = $current_image;
                    }
                }
                else {
                    $image_name = $current_image;
                }
            } else {
                $image_name = $current_image;
            }

            // update the database
            $sql2 = "UPDATE tbl_category SET
         title='$title',
         image_name='$image_name',
         featured='$featured',
         active='$active'
         where id=$id
        ";

            $res = mysqli_query($con, $sql2);

            if ($res == true) {
                $_SESSION['update'] = "<div class='bg-success'>Category Updated Successfully</div>";
                header('location:' . SITE_URL . 'admin/manage-category.php');
            } else {
                $_SESSION['update'] = "<div class='bg-danger >Failed to  Updated category</div>";
            }
        }


        ?>



    </div>
</div>





<?php include('partial/footer.php'); ?>