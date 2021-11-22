<?php include('partial-front/menu.php');  

if(isset($_SESSION['order']))
{
   // echo $_SESSION['order'];
   echo " <div class='text-success'>YOU ORDER SUCCESSFULLY PLACED </div>";
    unset ($_SESSION['order']);
   
}


 include('partial-front/footer.php'); ?>