<?php
	session_start();
	include('instal.php');
	init();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title></title>
</head>
<body>
	<header>
			<nav class="header">
				<ul>
					<li><a href="sign_in.php">SIGN IN</a></li>
					<li><a href="sign_up.php">SIGN UP</a></li>
				</ul>
			</nav>
	</header>
	<div class="content">
		<div class="category">
			<p>Category</p>
			<div class="product">
				<p>Product</p>
				<img src="https://www.w3schools.com/howto/img_forest.jpg">
			</div>
		</div>
	</div>
</body>
</html>