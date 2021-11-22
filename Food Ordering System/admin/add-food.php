<?php include('partial/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>

        <?php

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }


        ?>

        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-full">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" id="" placeholder="Title of Food" class="form-control " style="width:30%;"></td>
                </tr>
                <tr>
                    <td>Description :</td>
                    <td> <textarea rows="30" cols="30" name="description" class="form-control" style="width: 30%; height:60px;" placeholder="Description"></textarea></td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td> <input type="number" name="price" id="" class="form-control" style="width:30%;"> </td>
                </tr>

                <tr>
                    <td>Select Image:</td>
                    <td> <input type="file" name="image" id="" class="form-control" style="width:30%;"> </td>
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
                                    $id = $row['id'];
                                    $title = $row['title'];
                            ?>

                                    <option value="<?php echo $id;?>"><?php echo $title; ?></option>

                                <?php
                                }
                            } 
                            else {

                                ?>
                                <option value="0">No category Found</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                </tr>
                <td>featured:</td>
                <td>
                    <input type="radio" name="feature" id="" value="Yes"> Yes
                    <input type="radio" name="feature" id="" value="No"> NO
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
                        <input type="submit" value="Add Food" class="btn btn-success" name="submit">
                    </td>
                </tr>

            </table>


        </form>

        <?php 

//CHeck whether the button is clicked or not
if(isset($_POST['submit']))
{
    //Add the Food in Database
    //echo "Clicked";
    
    //1. Get the DAta from Form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    //Check whether radion button for featured and active are checked or not
    if(isset($_POST['featured']))
    {
        $featured = $_POST['featured'];
    }
    else
    {
        $featured = "No"; //SEtting the Default Value
    }

    if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else
    {
        $active = "No"; //Setting Default Value
    }

    //2. Upload the Image if selected
    //Check whether the select image is clicked or not and upload the image only if the image is selected
    if(isset($_FILES['image']['name']))
    {
        //Get the details of the selected image
        $image_name = $_FILES['image']['name'];

        //Check Whether the Image is Selected or not and upload image only if selected
        if($image_name!="")
        {
            

            // Create New Name for Image
          //  $image_name = rand(0000,9999)."Food-Name-"; //New Image Name May Be "Food-Name-657.jpg"
            $image_name=rand(10, 1000).$image_name;
            //B. Upload the Image
            //Get the Src Path and DEstinaton path

            // Source path is the current location of the image
            $src = $_FILES['image']['tmp_name'];

            //Destination Path for the image to be uploaded
            $dst = "../images/food/".$image_name;

            //Finally Uppload the food image
            $upload = move_uploaded_file($src, $dst);

            //check whether image uploaded of not
            if($upload==false)
            {
                //Failed to Upload the image
                //REdirect to Add Food Page with Error Message
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                header('location:'.SITE_URL.'admin/add-food.php');
                //STop the process
                die();
            }

        }
        else
        {
            $_SESSION['upload'] = "<div class='bg-danger'>Failed to Upload Image.</div>";
             //SEtting DEfault Value as blank
             header('location:'.SITE_URL.'admin/add-food.php');
             die();
        }

    }
    else
    {
        $_SESSION['upload'] = "<div class='bg-danger'>Failed to Upload Image.</div>";
         //SEtting DEfault Value as blank
    }

    //3. Insert Into Database

    //Create a SQL Query to Save or Add food
    // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
    $sql2 = "INSERT INTO tbl_food SET 
        title = '$title',
        description = '$description',
        price = $price,
        image_name = '$image_name',
        category_id = $category,
        feature = '$featured',
        active = '$active'
    ";

    //Execute the Query
    $res2 = mysqli_query($con, $sql2);

    //CHeck whether data inserted or not
    //4. Redirect with MEssage to Manage Food page
    if($res2 == true)
    {
        //Data inserted Successfullly
        $_SESSION['add'] = "<div class='bg-success'>Food Added Successfully.</div>";
        header('location:'.SITE_URL.'admin/manage-food.php');
    }
    else
    {
        //FAiled to Insert Data
        $_SESSION['add'] = "<div class='border-danger'>Failed to Add Food.</div>";
        header('location:'.SITE_URL.'admin/manage-food.php');
    }

    
}

?>


</div>
</div>

<?php include('partial/footer.php'); ?>