 
<?php 
   include('../config/config.php');
   if (isset($_SESSION['staff'])) {
    ?>
     <!-- main content start -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/admin.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
     <title>Food order Website</title>
 </head>
 <body>
     <!-- menu section start -->
     <div class="menu"> 
  
       <div class="wrapper">
       <ul>
                 
       <li>
                     <?php  
                      
                       if(isset($_SESSION['full_name']))
                       {
                          ?>
                         <strong> welcome
                         <?php echo $_SESSION['full_name']; ?>  </strong>
                          <?php

                       }
                        
                     
                     ?>
                
                 </li>


                 <li>
                 <a href="logout.php" class=" btn btn-danger">Logout</a>
                 </li>
                
             </ul>
       </div>
       </div>


       <div class="main-content">
    <div class="wrapper">
        <h1>Manage Order Status</h1>

        <br /> <br />

        <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

       
        ?>
       


       <table class=" table ">
            <thead>
                    <tr class="">
                        <th scope="col">S.N.</th> 

                        <th scope="col" >Food</th>

                        <th scope="col">Price</th>
                        <th scope="col">Qty.</th>
                        <th scope="col">Total</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($con, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>

                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href="<?php echo SITE_URL; ?>staff/update-order.php?id=<?php echo $id; ?>" class="btn btn-success">Update status</a>
                                            <!-- <a href="update-order.php" class="btn btn-success">Update status</a> -->
                                        </td>
                                         
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>


 <!-- main content end -->

 <?php include('../admin/partial/footer.php'); ?>
    
    <?php
}
else{

   // echo " user not login";
    header('location:login.php');
}
 ?>
  

