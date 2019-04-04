<?php
switch ($_GET["action"]) {
	case "set":
	{	setcookie($_GET["name"], $_GET["value"], time()+60*60);
		break;
	}
	case "get":
	{
		echo $_COOKIE[$_GET["name"]];
		if ($_COOKIE[$_GET["name"]])
			echo "\n";
		break;
	}
	case "del":
	{
		setcookie($_GET["name"], "", -1);
		break;
	}
	default:
	{
		break;
	}
}
?>