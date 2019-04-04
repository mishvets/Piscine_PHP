#!/usr/bin/php
<?php
if ($argc > 1)
{
	$str = trim($argv[1]);
	$all = explode(' ', $str);
	$arr = array_filter($all);
	$buf = $arr[0];
	unset($arr[0]);
	array_push($arr, $buf);
	$str = implode(" ", $arr);
	echo("$str\n");
}
?>