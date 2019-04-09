<?php
session_start();
if ($_SESSION['loggued_on_user'] === "admin"){
    header("Location: http://localhost:8100/Rush00/category-adm.php");
}
include("search-in-id-category.php");
$filename = "./private/category";
$category_arr = unserialize(file_get_contents($filename));
//$data_p = item_category_search($_GET["category"]);
//    $data_c = array(category_search($_GET['category']));
//$val = 0;
//echo"<br />";
//echo"<br />";
//echo"<br />";
//var_dump($_SESSION['backet-item']);
$data_c = category_search($_GET['categorie']);
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
                    <?php
                    if ($_SESSION['loggued_on_user']) {
                    ?>
                    <li><a href="backet.php">BACKET</a></li>
                    <li><a href="logout.php">LOGOUT</a>
                        <?php } ?>
				</ul>
			</nav>
	</header>
	<div class="content">
		<div class="category">
			<div class="product">
                <!-- <p>Product</p> -->
                <?php
                foreach ($data_c as $value=>$k)
                {
                    ?>
                    <div class="categories">
                        <h1 class="title"><?php echo mb_strtoupper($k['name']); ?></h1>
                    </div>
                <?php
                $data_p = item_category_search($k['name']);
//                var_dump($data_p);
                foreach ($data_p as $index=>$key)
				{
				?>
<!--					<div class="categories">--><?php //echo $key['category']; ?><!--</div>-->
					<div style="width: 100%; display: flex; justify-content: flex-end;">
						<div class="title"><?php echo $key['name']; ?></div>
						<div class="price"><?php echo $key['price']; ?></div>
					</div>

					<img class="product1" src="<?php echo $key['img']; ?>">
                    <?php if ($_SESSION['loggued_on_user']) {
                     ?>
                    <button name="new-item" type="submit" class="buy" value="OK">
                        <a style="text-decoration: none; color: slategrey" href="http://localhost:8100/Rush00/backet.php?id=<?php echo $key['id']; ?>&session=TRUE">BUY</a>
                    </button>
                    <?php } ?>
			  <?php
				}
				}
				?>				
			</div>
		</div>
	</div>
</body>
</html>