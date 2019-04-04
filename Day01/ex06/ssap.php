#!/usr/bin/php
<?php
function ft_split($str)
{
	$all = explode(' ', $str);
	$arr = array_filter($all);
	sort($arr);
	return ($arr);
}

unset($argv[0]);
$str = implode(" ", $argv);
$arr = ft_split($str);
foreach ($arr as $value)
	echo "$value\n";
?>