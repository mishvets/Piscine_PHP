<?php
session_start();
function ft_split($string)
{
    $str = trim($string);
    $all = explode(', ', $str);
    $arr = array_filter($all);
    sort($arr);
    return ($arr);
}

function auth($data) {
    $filename_p = "./private/product";

    $data_p = array("id"=>trim($data['id']),
        "name"=>trim($data['name']),
        "price"=>trim($data['price']),
        "img"=>trim($data['img']),
        "category"=>ft_split($data['category']));
    $err = 0;
//  id_check
    $product_arr = unserialize(file_get_contents($filename_p));
    foreach ($product_arr as $index=>$value) {
        if ($value['id'] == $data_p['id']) {
            $err = 1;
            break;
        }
    }
    if (!$err){
        $product_arr[] = $data_p;
        $input_str = serialize($product_arr);
        file_put_contents($filename_p, $input_str);
        return (1);
    }
    return (0);
}


////  category_check
//    $filename_c = "./private/category";
//$category_arr = unserialize(file_get_contents($filename_c));
//foreach ($category_arr as $index=>$value) {
//    var_dump($value['name']);
//    var_dump($data_p['category']);
//    if ($value['name'] === $data_p[0]['category']) {
//        var_dump("OK");
//        break;
//    }
//    else {
//        $_POST["error"] = "Invalid category";
//        $err = 1;
//    }
//}

if ($_SESSION['loggued_on_user'] !== "admin") {
    $_POST["error"] = "Only Admins can add new products";
}
if ($_POST['submit'] === "OK"){
    if (!$_POST['id'] || !$_POST['name'] || !$_POST['price'] ||
        !$_POST['img'] || !$_POST['category']){
        $_POST["error"] = "Fill info in all the fields";
    }
    elseif (!is_numeric($_POST['price'])) {
        $_POST["error"] = "Invalid price";
    }
    elseif (!is_numeric($_POST['id'])) {
        $_POST["error"] = "Invalid id";
    }
    elseif (auth($_POST)) {

//        header("Location: http://localhost:8100/Rush00/user.php");//Разные пути!!!!
    }
    else {
        $_POST["error"] = "Product with the same id already exists";
    }
}
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
        <form class="login-form" method="POST" action="add-item.php">
            <h1>ADD PRODUCT</h1>
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
            <input type="text" placeholder="category" name="category" value="<?php echo $_POST['category']?>"/>
            <button type="submit" name="submit" value="OK">OK</button>
        </form>
    </div>
</body>
</html>
