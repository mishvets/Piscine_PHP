<?php
session_start(); //??
function auth($_POST) {
    $filename = "./private/user";
    $data_u[] = array("adm"=>"0",
        "name"=>$_POST['name'],
        "surnm"=>$_POST['surnm'],
        "passwd"=>hash("sha512", $_POST['passwd']),
        "tel"=>$_POST['tel'],
        "email"=>$_POST['email']);
    $err = 0;
    $passwd_arr = unserialize(file_get_contents($filename));
    foreach ($passwd_arr as $index=>$value) {
        if ($value['email'] === $_POST['email']) {
            $err = 1;
        }
    }
    if (!$err){
        $passwd_arr[] = $data_u;
        $input_str = serialize($passwd_arr);
        file_put_contents($filename, $input_str);
        return (1);
    }
    return ("0");
}

if ($_POST['submit'] === "OK"){
    if (!$_POST['name'] || !$_POST['surnm'] || !$_POST['passwd'] ||
        !$_POST['tel'] || !$_POST['email']){
        $_POST["error"] = "Fill info in all the fields";
    }
    elseif (auth($_POST)) {
        $_SESSION['loggued_on_user'] = $_POST['email'];
        header("Location: http://localhost:8100/Rush00/user.php");//Разные пути!!!!
    }
    else {
        $_SESSION['loggued_on_user'] = '';
        $_POST["error"] = "User with the same email already exists";
    }
}
?>