 
<?php  

//  define('LOCALHOST','localhost');
//  define('DB_USERNAME','root');
//  define('DB_PASSWORD','');
//  define('DB_NAME','food-order');


$con = mysqli_connect('LOCALHOST','root','') or die(mysqli_connect_error()); //connection

$db_select=mysqli_select_db($con,'food-order') or die();
 //$food_id=$_GET['food_id'];
$u = $_POST['uid'];
$p = $_POST['pass'];
//include  "connect.php";
  
// if($food_id!="")
// {        
//        echo $food_id;
// 	   header("location:order.php");
// }
// else
// {
	$s = mysqli_query($con,"select * from registration where userid='$u' and password='$p'");

	if($r = mysqli_fetch_array($s))
	{       session_start();
			// $_SESSION['uid'] = $u;
			$_SESSION['uid'] = $u;
			 
			header("location:index.php");
	
	}
	else
	{
			echo "<br><div style='color:black; border-radius:10px; padding:10px; text-align:center; background-color:tomato;'>Please Enter Valid User and password</div><br>";
			include "login.php";
	}
//}


?>

 