<?php
session_start();

if ($_GET["session"]){
    $_SESSION['backet-item'][] = $_GET["id"];
    header("Location: http://localhost:8100/Rush00/category.php");
}
include("search-in-id-category.php");
$filename = "./private/category";
$category_arr = unserialize(file_get_contents($filename));
$data_c = $category_arr;
$total = 0;
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
            <?php
            $data_p = item_search($_SESSION['backet-item']);
            foreach ($data_p as $index=>$key) {
                $total += $key['price'];
                ?>
                <!--					<div class="categories">--><?php //echo $key['category']; ?><!--</div>-->
                <div style="width: 100%; display: flex; justify-content: flex-end;">
                    <div class="title"><?php echo $key['name']; ?></div>
                    <div class="price"><?php echo $key['price']; ?></div>
                </div>

                <img class="product1" src="<?php echo $key['img']; ?>">
                <?php
            }
            //            }
            ?>
            <div style="width: 100%; display: flex; justify-content: flex-end;">
                <div class="title">TOTAL: </div>
                <div class="price"><?php echo $total; ?></div>
            </div>
            <button name="order" type="submit" class="buy" value="OK">
                <a style="text-decoration: none; color: slategrey" href="http://localhost:8100/Rush00/send_order.php">ORDER</a>
            </button>
        </div>
    </div>
</div>
</body>
</html>