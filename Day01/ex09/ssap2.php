#!/usr/bin/php
<?PHP
function ft_mycmp($str1, $str2)
{
	$base_alph = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	if (strlen($str1) > strlen($str2))
		$len = strlen($str2);
	else
		$len = strlen($str1);
	for ($i=0; $i < len; $i++)
	{
		if (strripos($base_alph, $str1[$i]) - strripos($base_alph, $str2[$i]))
			return (strripos($base_alph, $str1[$i]) - strripos($base_alph, $str2[$i]));
	}
	return (strripos($base_alph, $str1[$i]) - strripos($base_alph, $str2[$i]));
}

function ft_usplit($str)
{
	$all = explode(' ', $str);
	$arr = array_filter($all);
	usort($arr, "ft_mycmp");
	return ($arr);
}
unset($argv[0]);
$str = implode(" ", $argv);
$arr = ft_usplit($str);
foreach ($arr as $value)
	echo "$value\n";
?>