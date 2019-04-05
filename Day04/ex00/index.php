<?php
session_start();
if ($_GET['submit'] == "OK") {
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['password'] = $_GET['passwd'];
}
?>

<html>
<head>
<!--    <meta charset="utf-8">-->
    <title>User</title>
</head>
<body>
	<form action="index.php" method="get" enctype="text/plain">
		Username: <input type="text" name="login" value="<?php echo $_SESSION['login'];?>" />
		<br />
		Password: <input type="text" name="passwd" value="<?php echo $_SESSION['password'];?>" />
        <br />
		<input type="submit" name="submit" value="OK" />
	</form>
</body>
</html>
