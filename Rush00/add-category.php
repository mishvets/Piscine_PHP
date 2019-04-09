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
    $filename_c = "./private/category";

    $data_c = array("name"=>trim($data['name']));
//    $err = 0;
//  id_check
    $category_arr = unserialize(file_get_contents($filename_c));
    foreach ($category_arr as $index=>$value) {
        if ($value['name'] == $data_c['name']) {
            $err = 1;
            break;
        }
    }
    if (!$err){
        $category_arr[] = $data_c;
        $input_str = serialize($category_arr);
        file_put_contents($filename_c, $input_str);
        return (1);
    }
    else {
        return (0);
    }
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
    $_POST["error"] = "Only Admins can add new caregoty";
}
if ($_POST['submit'] === "OK"){
    if (!$_POST['name']){
        $_POST["error"] = "Fill info in all the fields";
    }
    elseif (auth($_POST)) {
//        var_dump("Done");
        header("Location: http://localhost:8100/Rush00/index.php");//Разные пути!!!!
    }
    else {
        $_POST["error"] = "Category with the same name already exists";
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
        <form class="login-form" method="POST" action="add-category.php">
            <h1>ADD CATEGORY</h1>
            <?php
            if (!empty($_POST["error"]))
            {
                echo "<h4>Error: ".$_POST["error"]."</h4>";
            }
            ?>
            <input type="text" placeholder="name" name="name" value="<?php echo $_POST['name']?>"/>
            <button type="submit" name="submit" value="OK">OK</button>
        </form>
    </div>
</body>
</html>
