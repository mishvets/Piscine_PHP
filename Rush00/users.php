<?php
session_start();
include("search-in-id-category.php");
// $filename = "./private/user";
// $category_arr = unserialize(file_get_contents($filename));
// $data_c = category_search($_GET['users']);
//$data_p = item_category_search($_GET["category"]);
// echo "<div style='position: absolute; top: 40px; bottom: 0;'>".LOOOOOOOOOOOOOL."</div>";
// $data_p = item_category_search("cake");
// if ($_GET['method'] == 'delete') {



// 	echo "<pre>";
// 	echo "<div style='position: absolute; top: 40px; bottom: 0;'>".$_GET['id']."</div>";
// var_dump($_GET['id']);
// 	echo "</pre>";
// } elseif ($_GET['method'] == 'update') {
// 	echo "<pre>";
// 	echo "<div style='position: absolute; top: 40px; bottom: 0;'>".$_GET['id']."</div>";
// 	var_dump($_GET);
// 	echo "</pre>";
// }
	
	if ($_GET['method'] == 'delete')
	{
		// echo "<br />";
		// echo "<br />";
		// echo "<br />";
		// var_dump($_GET);
		$prod_del = unserialize(file_get_contents("./private/user"));
		$count = 0;
		foreach ($prod_del as $key => $value) {
			if ($value['email'] == $_GET['email']) {
				$count++;
				unset($prod_del[$key]);
			}
		}
		
		file_put_contents("./private/user", serialize($prod_del));
		if ($count == 1)
			header('Location: http://localhost:8100/Rush00/users.php');

	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title></title>
</head>
<body class="fon">
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
					<li><a href="category-adm.php">CATEGORY</a>
						<ul>
                            <?php
                            foreach ($category_arr as $value=>$k) {
                                ?>
                                <li><a href="category-adm.php?categorie=<?php echo $k["name"]; ?>"><?php echo $k["name"]; ?></a>
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
						?>
					
				</ul>
			</nav>
	</header>
	<div class="content">
		<div class="category">
			<!-- <p>Category</p> -->
			<div class="product">
				 
                    
                    <?php
                    $data_p = user_search($k['name']);
                    foreach ($data_p as $index => $key) {
                        ?>
                       
                            <div class="title"><?php echo $key['name']; ?></div>
                            <div class="price"><?php echo $key['surnm']; ?></div>
                        	<div class="price"><?php echo $key['tel']; ?></div>
                        	<div class="price"><?php echo $key['email']; ?></div>

                        <!-- <img class="product1" src="<?php //echo $key['img']; ?>"> -->
                        <button name="del" type="submit" class="buy" value="KILL THIS"><a href="users.php?email=<?= $key['email']; ?>&method=delete">Delete</a></button>
      
                        <!-- <a href="category-adm.php?id=<?= $key['id']; ?>&method=delete">Delete</a> -->
                        <?php
                    }
                
				?>				
			</div>
		</div>
	</div>
</body>
</html>