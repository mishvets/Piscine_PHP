<?php
session_start();

//return 0 - no user, 1 - user, 2 - adm;
function auth($email, $pwd) {
    $filename = "./private/user";
    $passwd = hash("sha512", $pwd);
    $passwd_arr = unserialize(file_get_contents($filename));
    foreach ($passwd_arr as $index=>$value) {
        if ($email === $value['email'] && $passwd === $value['passwd']) {
            $_SESSION['loggued_on_user'] = $value['name'];
            if ($value['adm'] === "1"){
                return ("2");
            }
            return ("1");
        }
    }
    return ("0");
}

if ($_POST['submit'] === "OK") {
    if (!$_POST['email'] || !$_POST['passwd']) {
        $_POST["error"] = "Fill info in all the fields";
    }
    elseif (auth($_POST['email'], $_POST['passwd'])) {
        header("Location: http://localhost:8100/Rush00/index.php");//Разные пути!!!!
    }
    else {
        $_SESSION['loggued_on_user'] = '';
        $_POST["error"] = "No user with this login/password";
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
    		<form class="login-form" method="POST" action="sign-in.php">
    			<h1>LOGIN</h1>
          <?php
              if (!empty($_POST["error"]))
              {
                  echo "<h4>Error: ".$_POST["error"]."</h4>";
              }
          ?>
     			<input type="text" placeholder="email" name="email" value="<?php echo $_POST['email']?>"/>
     			<input type="password" placeholder="password" name="passwd" />
      			<button type="submit" name="submit" value="OK">LOGIN</button>
      			<p class="message">Not registered? <a href="sign-up.php">Create an account</a>
    		</form>
  </div>
</div>
</body>
</html>