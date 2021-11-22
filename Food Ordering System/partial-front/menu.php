
<?php include('config/config.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

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
        </div>
    </section>
    <!-- Navbar Section Ends Here -->