<?php include('partial-front/menu.php'); ?>



<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>


        <?php
        $sql = "SELECT * from tbl_category where active='Yes' ";

        $res = mysqli_query($con, $sql);

        $count = mysqli_num_rows($res);

        if ($count > 0) {

            while ($rows = mysqli_fetch_assoc($res)) {

                $id = $rows['id'];
                $title = $rows['title'];
                $image_name = $rows['image_name'];

        ?>

                <a href="<?php echo SITE_URL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">

                         <?php 
                         
                          // check image in availabe or not 
                          if($image_name=="")
                          {
                           echo " <div class='bg-danger'> Image not Available </div>";
                          }
                          else{
                                
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

            echo " <div class='bg-danger'> Catgories not found </div>";
        }
        ?>







        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->


<?php include('partial-front/footer.php'); ?>