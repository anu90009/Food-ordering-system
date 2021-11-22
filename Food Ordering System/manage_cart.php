 <?php 
  include('partial-front/menu.php');  
 
  if(isset($_GET['food_id']))
  {
      //echo $_GET['food_id'];

   

    $food_id = $_GET['food_id'];

    //Get the DEtails of the SElected Food
    $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
    //Execute the Query
    $res = mysqli_query($con, $sql);
    //Count the rows
    $count = mysqli_num_rows($res);
    //CHeck whether the data is available or not
    if($count==1)
    {
        //WE Have DAta
        //GEt the Data from Database
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];


      if(isset($_SESSION['cart']))
      {
        
      }
      else
      {
        $_SESSION['cart'][0]=array('item_name'=>$_GET['food_id'],'price'=>$price,'title'=>$title);

        print_r($_SESSION['cart']);
      }






    }
    else
    {
        //Food not Availabe
        //REdirect to Home Page
        header('location:'.SITE_URL);
    }
}
else
{
    //Redirect to homepage
    header('location:'.SITE_URL);
}
  
 
 
 
 
 
 
 ?>