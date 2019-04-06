<?php
function ft_split($string)
{
    $str = trim($string);
    $all = explode(', ', $str);
    $arr = array_filter($all);
    sort($arr);
    return ($arr);
}

function auth($_POST) {
    $filename = "./private/product";
    $data_p[] = array("id"=>"0",
        "name"=>$_POST['name'],
        "price"=>$_POST['price'],
        "img"=>$_POST['img'],
        "category"=>ft_split($_POST['categoty']));
    $err = 0;
    $passwd_arr = unserialize(file_get_contents($filename));
    foreach ($passwd_arr as $index=>$value) {
        if ($value['email'] === $_POST['email']) {
            $err = 1;
        }
    }
    if (!$err){
        $passwd_arr[] = $data_p;
        $input_str = serialize($passwd_arr);
        file_put_contents($filename, $input_str);
        return (1);
    }
    return ("0");
}

if ($_POST['submit'] === "OK"){
    if (!$_POST['id'] || !$_POST['name'] || !$_POST['price'] ||
        !$_POST['img'] || !$_POST['category']){
        $_POST["error"] = "Fill info in all the fields";
    }
    elseif (auth($_POST)) {
        $_SESSION['loggued_on_user'] = $_POST['name'];
        header("Location: http://localhost:8100/Rush00/user.php");//Разные пути!!!!
    }
    else {
        $_SESSION['loggued_on_user'] = '';
        $_POST["error"] = "User with the same email already exists";
    }
}
?>
