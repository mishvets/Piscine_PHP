<?php
session_start();
    $prod_upd = unserialize(file_get_contents("./private/product"));
        $count = 0;
        foreach ($prod_upd as $key => $value) {
            if ($value['id'] == $_POST['id']) {
                $count++;
                $prod_upd[$key]['name'] = $_POST['name'];
                $prod_upd[$key]['price'] = $_POST['price'];
                $prod_upd[$key]['img'] = $_POST['img'];
                // $prod_upd[$key]['category'] = $_POST['category'];

            }
        }
        file_put_contents("./private/product", serialize($prod_upd));
        if ($count == 1)
            header('Location: http://localhost:8100/Rush00/category-adm.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/sign_up.css">
    <title></title>
</head>
<body>
<div class="login-page">
    <div class="form">
        <form class="login-form" method="POST" action="update-item.php">
            <h1>UPDATE PRODUCT</h1>
            <?php
            if (!empty($_POST["error"]))
            {
                echo "<h4>Error: ".$_POST["error"]."</h4>";
            }
            ?>
            <input type="text" placeholder="id" name="id" value="<?php echo $_POST['id']?>"/>
            <input type="text" placeholder="name" name="name" value="<?php echo $_POST['name']?>"/>
            <input type="text" placeholder="price" name="price" value="<?php echo $_POST['price']?>"/>
            <input type="text" placeholder="img" name="img" value="<?php echo $_POST['img']?>"/>
     <!--        <input type="text" placeholder="category" name="category" value="<?php echo $_POST['category']?>"/> -->
            <button type="submit" name="submit" value="OK">OK</button>
        </form>
    </div>
</body>
</html>