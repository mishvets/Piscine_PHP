#!/usr/bin/php
<?php
if ($argc == 4)
{
	$err = 0;
	$num1 = trim($argv[1]);
	$op = trim($argv[2]);
	$num2 = trim($argv[3]);
	if ($op == '+')
		$res = $num1 + $num2;
	elseif ($op == '-')
		$res = $num1 - $num2;
	elseif ($op == '*')
		$res = $num1 * $num2;
	elseif ($op == '/')
	{
		if ($num2 == '0')
		{
			if ($num1 == '0')
				echo ("NAN\n");
			else
				echo ("INF\n");
			$err = 1;
		}
		else
			$res = $num1 / $num2;
	}
	elseif ($op == '%')
	{
		if ($num2 == '0')
		{
			if ($num1 == '0')
				echo ("NAN\n");
			else
				echo ("INF\n");
			$err = 1;
		}
		else
			$res = $num1 % $num2;
	}
	if ($err == 0)
		echo "$res\n";
}
?>