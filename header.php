<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Wallpaper</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">-->
	<script type="text/javascript" src="js/jquery-3.3.1.slim.min.js" ></script>
	<script type="text/javascript" src="js/popper.min.js" ></script>
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/create-account-script.js" ></script>
	<script type="text/javascript" src="js/user-login-script.js" ></script>
	<script type="text/javascript" src="js/uploadfile.js" ></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<a href="index.php"><img class="img-responsive logo" src="images/logo.svg"></a>
			</div>
			<div class="col-sm-12 text-center">
				Pure High-definition quality wallpapers for Desktop & mobiles in HD, Wide, 4K Ultra HD, 5K, 8K UHD monitor resolutions...
			</div>
		</div>
	</div>
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">HOME</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="latestwallpaper.php">LATEST WALLPAPER <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">TOP DOWNLOAD</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">MOST POPULAR WALLPAPER</a>
				</li>
				<li class="nav-item mr-10">
					<a class="nav-link" href="#">FOR ANDROID</a>
				</li>
			</ul>
			<?php

			if(empty($_SESSION["email"]))
			{
				echo "
				<a class='nav-link' href='user-login.php'>Login</a>
				<a class='nav-link' href='create-new-account.php'>Create New Account</a>";
				//session_unset();
				//session_destroy();
			}
			else
			{
				echo "
				<div class='dropdown'>
				<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
				".$_SESSION["email"]."
				</button>
				<div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenu2'>
				<a href='users.php' class='dropdown-item'>Users</a>
				<a href='wallpaper-details.php'class='dropdown-item'>Wallpaper</a>
				<a href='categories-detail.php' class='dropdown-item'>Categories</a>
				<div class='dropdown-divider'></div>
				<a href='logout.php' class='dropdown-item'>Logout</a>
				</div>
				</div>"; 
			}
			?>
		</div>
	</nav>
	
	
	
	