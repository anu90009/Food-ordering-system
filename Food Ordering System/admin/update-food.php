<?php include('partial/menu.php'); ?>

<?php
ob_start();
// fix this error ob_strt is used to remove error only line no 243
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql2 = "SELECT * from tbl_food where id=$id";

    $res2 = mysqli_query($con, $sql2);

    $row2 = mysqli_fetch_assoc($res2);

    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $feature = $row2['feature'];
    $active = $row2['active'];
} else {

    header('location:manage-food.php');
}

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>

        <br /> <br />

        <?php 
        
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        if (isset($_SESSION['failed-remove-image'])) {
            echo $_SESSION['failed-remove-image'];
            unset($_SESSION['failed-remove-image']);
        }
        
        ?>


        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-full">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" id="" placeholder="Title of Food" class="form-control " style="width:30%;" value="<?php echo $title; ?>"></td>
                </tr>
                <tr>
                    <td>Description :</td>
                    <td> <textarea rows="30" cols="30" name="description" class="form-control" style="width: 30%; height:60px;"   > <?php echo $description; ?></textarea></td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td> <input type="number" name="price" id="" class="form-control" style="width:30%;" value="<?php echo $price; ?>"> </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td> <?php

                            if ($current_image == true) {
                            ?>
                            <img src="<?php echo SITE_URL; ?>/images/food/<?php echo $current_image; ?>" width="200px" height="150px" >
                        <?php

                            } else {
                                echo "No Image Found";
                            }



                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image:</td>
                    <td> <input type="file" name="image" value=""> </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category" id="" class="form-control" style="width:30%;">
                            <?php

                            // code to display categories from database
                            // retrieve all catgory from database

                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                            $res = mysqli_query($con, $sql);

                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $category_id = $row['id'];
                                    $title = $row['title'];
                            ?>
                                    <option <?php if($current_category==$category_id){ echo "selected" ;} ?> value="<?php echo $category_id; ?>"> <?php echo $title; ?></option>
                                <?php
                                }
                            } else {

                                ?>
                                <option value="0">No category Found</option>
                            <?php
                            }



                            ?>


                            <!-- <option value="1">Food</option>
                 <option value="2">Snacks</option>
                   -->
                        </select>
                    </td>
                </tr>

                </tr>
                <td>featured:</td>
                <td>
                    <input <?php if ($feature == "Yes") {
                                echo "checked";
                            }  ?> type="radio" name="feature" id="" value="Yes"> Yes
                    <input <?php if ($feature == "No") {
                                echo "checked";
                            }  ?> type="radio" name="feature" id="" value="No"> NO
                </td>
                </tr>
                <tr>
                    <td> Active :</td>
                    <td>
                        <input <?php if ($active == "Yes") {
                                    echo "checked";
                                }  ?> type="radio" name="active" id="" value="Yes">Yes
                        <input <?php if ($active == "No") {
                                    echo "checked";
                                }  ?> type="radio" name="active" id="" value="No"> NO
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" value="<?php echo $id; ?>" class="btn btn-success" name="id">
                        <input type="hidden" value="<?php echo $current_image; ?>" class="btn btn-success" name="current_image">
                        <input type="submit" value="Update Food" class="btn btn-success" name="submit">
                    </td>
                </tr>

            </table>


        </form>

        <?php

        if (isset($_POST['submit'])) {

            $description = $_POST['description'];
            $id = $_POST['id'];
            $title = $_POST['title'];
            $active = $_POST['active'];
            $feature = $_POST['feature'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];

            if (isset($_FILES['image']['name'])) {
                
                   $image_name=$_FILES['image']['name'];
                   

                if ($image_name!="" ) {

                    // uploading new image
                    //echo $image_name;

                  //  $ext = end(explode('.', $image_name));

                    $image_name = rand(10, 1000) . $image_name;

                    $image_source = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/food/" . $image_name;

                    $upload = move_uploaded_file($image_source, $destination_path);

                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='bg-danger'>Failed to Upload Image</div>";
                        header('location:manage-food.php');
                       die();
                    }
                 //   remove current image

                    if ($current_image ==true) {
                        $remove_path = "../images/food/".$current_image;
                        $remove = unlink($remove_path);

                        if ($remove == false) {
                            $_SESSION['failed-remove-image'] = "<div class='bg-danger'>Unable to Remove image</div>";
                            header('location:manage-food.php');
                            die();
                        }
                    } else {
                        $image_name = $current_image;
                        header('location:manage-food.php');
                    }
                }
                else {
                    //  echo " Image not find";
                    $image_name = $current_image;
                }
            } 
            else {
                //  echo " Image not find";
                $image_name = $current_image;
            }

            $sql3 = "UPDATE tbl_food SET
            title='$title',
            image_name='$image_name',
             description='$description',
             category_id='$category',
             price='$price',
            feature='$feature',
            active='$active'
            where id=$id
           ";

            $res3 = mysqli_query($con, $sql3);

            if ($res3 == true) {
                    
                    $_SESSION['update'] = "<div class='bg-success'>food Updated Successfully</div>";
                   header('location:manage-food.php');
                  
               // echo " done";
            } else {
                $_SESSION['update'] = "<div class='bg-danger >Failed to  Updated food</div>";
                header('location:manage-food.php');
            }
        }




        ?>






    </div>
</div>

<?php include('partial/footer.php'); ?>