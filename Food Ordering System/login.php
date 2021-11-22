<?php include('partial-front/menu.php');



?>



<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
<form action="loginck.php" method="post">

  <table tborder="0" talign="center" cellpadding="5" cellspacing="7">
	
	        <tr talign="right">	
		     <td> <img src="Login.png" style="width: 30%"> <br>
		      <a href="signup.php"> New User?</a></td>
		 </tr>
		<tr>
             <td> enter your user id </td>
        <td> <input type="text" name="uid" placeholder="Enter Your User ID" style="padding: 10px; width: 150%"> <br>  </td>
		
		</tr>

		<tr>
           <td> enter your password</td>
 <td> <input type="Password" name="pass" placeholder="Enter Your Password" style="padding: 10px; width: 150%"> <br>   </td>
		
		</tr>
        <?php 
		   if(isset($_GET['food_id']))
		   {
			   //Get the Food id and details of the selected food
			   $food_id = $_GET['food_id'];
			  // echo $food_id;
			  ?>
                <input type="hidden" name="food_id" placeholder="Enter Your Password" style="padding: 10px; width: 150%" value="<?php echo $food_id; ?>">
			  <?php
		   }
		?>
		



		<tr>	    
 <td talign="right"> <input type="submit" name="" value="Login Now" style="color: red; background-color: lightgreen; font-size: 1.5em; font-family: times new roman;"> </td> 
</tr>
               
              
</form>
		</table>			




				</div>
			</div>
		
		</div>
	</div>




<?php include('partial-front/footer.php'); ?>


