<?php include('partial-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required value="">
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
        
    ?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php


        $sql = "SELECT * from tbl_category where active='Yes' and featured='Yes' limit 3";

        $res = mysqli_query($con, $sql);

        $count = mysqli_num_rows($res);
        if ($count > 0) {
            //$sn=1;
            while ($rows = mysqli_fetch_assoc($res)) {

                 $id = $rows['id'];
                $title = $rows['title'];
                $image_name = $rows['image_name'];
               
        ?>
                       
                <a href="<?php echo SITE_URL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">

                        <?php
                        // check wether image is available or not 
                        if ($image_name == "") {
                            echo " <div class='bg-danger'> Image not Available </div>";
                        } else {

                        ?>
                            <img src="<?php echo SITE_URL; ?>images/category/<?php echo $image_name;  ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve" width="200px" height="300px">

                        <?php

                        }

                        ?>


                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>

        <?php
            }
        } else {

            echo " <div class='bg-danger'> Catgories not added </div>";
        }

        ?>







        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
     <div class="container">
         <h2 class="text-center">Food Menu</h2>

         <?php

            $sql = " SELECT * from tbl_food where active='Yes'";

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
                    
                     </div>

                     <div class="food-menu-desc">
                         <h4><?php echo $title; ?></h4>
                         <p class="food-price">$ <?php echo $price;?></p>
                         <p class="food-detail">
                             <?php echo $description;?>
                         </p>
                         <br>
                         <?php 
                          
                          if(isset($_SESSION['uid']))
                          {
                             // echo $_SESSION['uid'];
                             ?>
                           <a href="<?php echo SITE_URL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                           <a href="<?php echo SITE_URL; ?>manage_cart.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Add To Cart</a>
                             <?php
                              
                          }
                           else
                           {
                               ?>
                                <a href="<?php echo SITE_URL; ?>login.php" class="btn btn-primary">Order Now</a>
                               <?php
                           }
                         
                         ?>

                         <!-- <a href="<?php echo SITE_URL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a> -->
                         <!-- <a href="<?php echo SITE_URL; ?>login.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a> -->
                         
                     </div>
                 </div>

         <?php

                }
            } else {
                echo " <div class='bg-danger'> Food not Found </div>";
            }



            ?>




         <div class="clearfix"></div>



     </div>

 </section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partial-front/footer.php'); ?>