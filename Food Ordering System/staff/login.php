<?php
include('../config/config.php');
  

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * From tbl_staff where username='$username' and password='$password'";

	$res = mysqli_query($con, $sql);

	$count = mysqli_num_rows($res);
     
	

	if ($count == 1) {
		
		// $rows=mysqli_fetch_assoc($res);
		// $full_name = $rows['full_name'];
		 

		
		$_SESSION['login'] ="<div class='bg-success'>User  Logged out</div>";
		//unset($_SESSION['login']);
		header('location:' . SITE_URL . 'staff/');
		$_SESSION['staff'] = $username;

		// $_SESSION['full_name']=$full_name;

	} 
	
	else {

		$_SESSION['login'] = " <div class='bg-danger' > staff Failed to Logged in </div>";
	}

	$sql2="SELECT * from tbl_staff where username='$username' and password='$password'";
	$res2 = mysqli_query($con, $sql2);
	$count2 = mysqli_num_rows($res2);

	if($count>0)
	{ 
		 while($rows=mysqli_fetch_assoc($res2))
		 {
			  $full_name=$rows['full_name'];
              
			  if($full_name!="")
			  {
                $_SESSION['full_name']=$full_name;
			  }
			  else{
				$_SESSION['full_name']=$username;
			  }

		 }

	}
	else{
		// echo "full name not found";
	}

}





?>




<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
	<!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" href="../css/login.css">



	<!--Custom styles-->

</head>

<body>
	<div class="container">

		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>Staff LogIn</h3>
					<div class="d-flex justify-content-end social_icon">
						<span><i class="fab fa-facebook-square"></i></span>
						<span><i class="fab fa-google-plus-square"></i></span>
						<span><i class="fab fa-twitter-square"></i></span>
					</div>
				</div>
				<div class="card-body">
					<form method="POST" action="">
						<?php

						if (isset($_SESSION['login'])) {
							echo $_SESSION['login'];
							unset($_SESSION['login']);
						}

						if (isset($_SESSION['no-login-message'])) {
							echo $_SESSION['no-login-message'];
							unset($_SESSION['no-login-message']);
						}


						?>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="username" name="username" value="">

						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" placeholder="password" name="password" value="">
						</div>
						<div class="row align-items-center remember">
							<input type="checkbox">Remember Me
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn float-right login_btn" name="submit">
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Don't have an account? Contact Admin  For Username and Passowrd 
					</div>
					 
				</div>
			</div>
		</div>
	</div>
</body>

</html>