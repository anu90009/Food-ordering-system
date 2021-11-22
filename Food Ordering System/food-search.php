<?php include('partial-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
         
    <?php 
        $search = $_POST['search'];
    
    ?>

    <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php

        // get search keyword

       

        // sql query to get food based on title
        $sql = " SELECT * FROM tbl_food where title LIKE '%$search%' or description like'%$search%' ";

        // execute the query 
        $res = mysqli_query($con, $sql);

        $count = mysqli_num_rows($res);

        if ($count > 0) {

            while ($rows = mysqli_fetch_assoc($res)) {
                $id = $rows['id'];
                $title = $rows['title'];
                $image_name = $rows['image_name'];
                $description = $rows['description'];
                $price = $rows['price'];

        ?>


                <div class="food-menu-box">
                    <div class="food-menu-img">
                    <?php 
                     
                     if($image_name=="")
                     {
                         echo " <div class='bg-danger'> Image not Available </div>";
                     }
                     else{

                         ?>
                        <img src="<?php echo SITE_URL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                         <?php

                     }
                  
                  
                  ?>
                         

                        <!-- <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve"> -->
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">$<?php echo $price; ?></p>
                        <p class="food-detail">
                        <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

        <?php

            }
        }
         else {

            echo " <div class='bg-danger'> Search Food not Found </div>";
        }
        ?>

       

        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partial-front/footer.php'); ?>