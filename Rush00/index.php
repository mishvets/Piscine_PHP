<?php
session_start();
include('instal.php');
init();
$filename = "./private/category";
$category_arr = unserialize(file_get_contents($filename));
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
					<li>
						<?php
						if (($_SESSION['loggued_on_user']))
						{
						?>
							<li><a>Hello <?php echo $_SESSION['loggued_on_user']?></a></li>
							<?php
						}

						elseif (!($_SESSION['loggued_on_user']))
						{
						?>
								<li><a href="sign-in.php">SIGN IN</a></li>
								<li><a href="sign-up.php">SIGN UP</a></li>
								<?php
						}
						?>
					</li>
					<li><a href="index.php">HOME</a></li>
                    <li><a href="category.php?">CATEGORY</a>
                        <ul>
                            <?php
                            foreach ($category_arr as $value=>$k) {
                                ?>
                                <li><a href="category.php?categorie=<?php echo $k["name"]; ?>"><?php echo $k["name"]; ?></a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
					<li>
						<?php
						if (($_SESSION['loggued_on_user'] === "admin"))
						{
						?>
							<li><a href="order.php">ORDERS</a></li>
							<li><a href="users.php">USERS</a></li>
							<li><a href="#">CONTROL</a>
								<ul>
									<li><a href="add-item.php">ADD PRODUCT</a></li>
									<li><a href="add-user.php">ADD USER</a></li>
									<li><a href="add-category.php">ADD CATEGORY</a></li>
									<li><a href="update-item.php">UPDATE CATEGORY</a></li>
									<li><a href="update-users.php">UPDATE USERS</a></li>
								</ul>
							</li>
							<li><a href="logout.php">LOGOUT</a>
							<?php
						}
						elseif ($_SESSION['loggued_on_user']) 
						{
						?>
								<li><a href="backet.php">BACKET</a></li>
								<li><a href="logout.php">LOGOUT</a>
								<?php
						}
						elseif (!$_SESSION['loggued_on_user']) {
							
						}
						?>
					
				</ul>
			</nav>
			
	</header>
	<div id="yo">HELLO</div>
	<div id="text">
		 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It's also called placeholder (or filler) text. It's a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it's not genuine, correct, or comprehensible Latin anymore. While lorem ipsum's still resembles classical Latin, it actually has no meaning whatsoever. As Cicero's text doesn't contain the letters K, W, or Z, alien to latin, these, and others are often inserted randomly to mimic the typographic appearence of European languages, as are digraphs not to be found in the original.

		 <img id="cake" src="https://www.missmaud.com.au/missmaud/media/product-images/cakes-whole/drip-cake-va-va-voom.jpg">
	</div>
	<div id="footer">Create: mshvets & tbahlai</div>
</body>
</html>