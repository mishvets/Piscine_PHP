<?php
session_start(); //??
function auth($data) {
    var_dump($data);
    $filename = "./private/user";
    if ($data["adm"])
        $data["adm"] = "1";
    else {
        $data["adm"] = "0";
    }
    $data_u = array("adm" => $data["adm"],
        "name" => $data['name'],
        "surnm" => $data['surnm'],
        "passwd" => hash("sha512", $data['passwd']),
        "tel" => $data['tel'],
        "email" => $data['email']);
    $err = 0;
    $passwd_arr = unserialize(file_get_contents($filename));
    foreach ($passwd_arr as $index => $value) {
        if ($value['email'] === $data['email']) {
            $err = 1;
        }
    }
    if (!$err){
        $passwd_arr[] = $data_u;
        $input_str = serialize($passwd_arr);
        file_put_contents($filename, $input_str);
        return (1);
    }
    return (FALSE);
}

if ($_POST['submit'] === "OK"){
    if (!$_POST['name'] || !$_POST['surnm'] || !$_POST['passwd'] ||
        !$_POST['tel'] || !$_POST['email']){
        $_POST["error"] = "Fill info in all the fields";
    }
    elseif (!is_numeric($_POST['tel'])) {
        $_POST["error"] = "Invalid phone";
    }
    elseif (auth($_POST)) {
        header("Location: http://localhost:8100/Rush00/index.php");//Разные пути!!!!
    }
    else {
        $_POST["error"] = "User with the same email already exists";
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
        <form class="login-form" method="POST" action="add-user.php">
            <h1>ADD USER</h1>
            <?php
            if (!empty($_POST["error"]))
            {
                echo "<h4>Register Error: ".$_POST["error"]."</h4>";
            }
            ?>
            <input type="text" placeholder="name" name="name" value="<?php echo $_POST['name']?>"/>
            <input type="text" placeholder="surname" name="surnm" value="<?php echo $_POST['surnm']?>"/>
            <input type="text" placeholder="phone" name="tel" value="<?php echo $_POST['tel']?>"/>
            <input type="text" placeholder="email" name="email" value="<?php echo $_POST['email']?>"/>
            <input type="password" placeholder="password" name="passwd" value="<?php echo $_POST['passwd']?>"/>
            <div style="justify-content: flex-start; display: flex;">
                <div style="width: 20px;">
                    <input class="box" type="checkbox" placeholder="admin" name="adm">
                </div style="width: 12%;">
                <div>Admin</div>
            </div>
            <button type="submit" name="submit", value="OK">OK</button>

        </form>
    </div>
</body>
</html>
