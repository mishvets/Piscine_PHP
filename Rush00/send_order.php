<?php
session_start();
$filename = "./private/order";
$order_arr = unserialize(file_get_contents($filename));
$order_arr[] = $_SESSION;
var_dump($_SESSION);
$input_str = serialize($order_arr);
file_put_contents($filename, $input_str);
header("Location: http://localhost:8100/Rush00/index.php");
?>
