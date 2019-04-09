<?php
session_start();
    $prod_upd = unserialize(file_get_contents("./private/user"));
        $count = 0;
        foreach ($prod_upd as $key => $value) {
            if ($value['email'] == $_POST['email']) {
                $count++;
                $prod_upd[$key]['name'] = $_POST['name'];
                $prod_upd[$key]['surnm'] = $_POST['surnm'];
                $prod_upd[$key]['tel'] = $_POST['tel'];
                $prod_upd[$key]['passwd'] = $_POST['passwd'];
                $prod_upd[$key]['email'] = $_POST['email'];

            }
        }
        file_put_contents("./private/user", serialize($prod_upd));
        if ($count == 1)
            header('Location: http://localhost:8100/Rush00/users.php');
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
        <form class="login-form" method="POST" action="update-users.php">
            <h1>UPDATE USER</h1>
            <?php
            if (!empty($_POST["error"]))
            {
                echo "<h4>Error: ".$_POST["error"]."</h4>";
            }
            ?>
            <input type="text" placeholder="name" name="name" value="<?php echo $_POST['name']?>"/>
            <input type="text" placeholder="surname" name="surnm" value="<?php echo $_POST['surnm']?>"/>
            <input type="text" placeholder="tel" name="tel" value="<?php echo $_POST['tel']?>"/>
            <input type="text" placeholder="email" name="email" value="<?php echo $_POST['email']?>"/>
            <input type="password" placeholder="passwd" name="passwd" value="<?php echo $_POST['passwd']?>"/>
            <button type="submit" name="submit" value="OK">OK</button>
        </form>
    </div>
</body>
</html>