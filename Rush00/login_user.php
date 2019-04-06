<?php
//include("auth.php");
session_start();

function auth($login, $pwd) {
    $filename = "./private/passwd";
    $passwd = hash("sha512", $pwd);
    $passwd_arr = unserialize(file_get_contents($filename));
    foreach ($passwd_arr as $value) {
        if ($login === $value['login'] && $passwd === $value['passwd']) {
            if ($value['adm'] === "1"){
                return ("2");
            }
            return ("1");
        }
    }
    return ("0");
}

if ($_POST['submit'] === "OK") {
    if (auth($_POST['login'], $_POST['passwd'])) {
        $_SESSION['loggued_on_user'] = $_POST['login'];
        header("Location: localhost:8100/ex05/read_img.php");
    } else {
        $_SESSION['loggued_on_user'] = '';
        $_POST["error"] = "No user with this login/password";
    }
}
?>
