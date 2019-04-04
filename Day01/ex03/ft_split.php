<?php
function ft_split($str)
{
	$all = explode(' ', $str);
	$arr = array_filter($all);
	sort($arr);
	return ($arr);
}
?>