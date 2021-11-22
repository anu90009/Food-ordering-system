<?php include('config/config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">

                <img src="images/logo.png" alt="logo" class="d-inline-block align-text-top">


            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITE_URL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITE_URL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                     
                    <li>
                    <?php
					if(isset($_SESSION['uid']))
					{
					?>
					HI <?php echo $_SESSION['uid']; ?> &nbsp;&nbsp; <a href="cart.php">Cart</a>&nbsp;&nbsp; <a href="logout.php">LogOut</a>
					<?php	
					}
					else
					{	
					?>
					<a href="signup.php">New User</a>&nbsp;&nbsp;&nbsp;<a href="login.php">Login</a>
					<?php
					}
					?>	
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
    <!-- Navbar Section Ends Here -->