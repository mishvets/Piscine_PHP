#!/usr/bin/php
<?php
$err = 0;
if ($argc == 2)
{
	if (strripos($argv[1], '+'))
	{
		$op = '+';
	}
	elseif (strripos($argv[1], '-'))
	{
		$op = '-';
	}
	elseif (strripos($argv[1], '*'))
	{
		$op = '*';
	}
	elseif (strripos($argv[1], '/'))
	{
		$op = '/';
	}
	elseif (strripos($argv[1], '%'))
	{
		$op = '%';
	}
	else {
		$err = 1;
		echo "Syntax Error\n";
	}
	if (!$err)
	{
		$num = explode($op, $argv[1]);
		if (count($num) != 2)
		{
			$err = 1;
			echo "Syntax Error\n";
		}
		$num1 = trim($num[0]);
		$num2 = trim($num[1]);
		if (!is_numeric($num1) || !is_numeric($num2))
		{
			$err = 1;
			echo "Syntax Error\n";
		}
	}
	if (!$err)
	{
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
	}
	if ($err == 0)
		echo "$res\n";
}
?>