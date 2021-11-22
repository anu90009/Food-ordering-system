 <?php include('partial-front/menu.php'); ?>

 <!-- fOOD sEARCH Section Starts Here -->
 <section class="food-search text-center">
     <div class="container">

         <form action="food-search.php" method="POST">
             <input type="search" name="search" placeholder="Search for Food.." required>
             <input type="submit" name="submit" value="Search" class="btn btn-primary">
         </form>

     </div>
 </section>
 <!-- fOOD sEARCH Section Ends Here -->



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
                         <!-- <a href="<?php echo SITE_URL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a> -->
                         <!-- <a href="#" class="btn btn-primary">Order Now</a> -->
                        
                         <?php 
                          
                          if(isset($_SESSION['uid']))
                          {
                             // echo $_SESSION['uid'];
                             ?>
                           <a href="<?php echo SITE_URL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                             <?php
                              
                          }
                           else
                           {
                               ?>
                                <a href="<?php echo SITE_URL; ?>login.php" class="btn btn-primary">Order Now</a>
                               <?php
                           }
                         
                         ?>







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