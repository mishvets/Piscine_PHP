#!/usr/bin/php
<?php
if($argc == 2)
{
	$i = 0;
	$str = trim($argv[1]);
	while ($str[$i])
	{
		if ($str[$i] == ' ')
		{
			print_r("$str[$i]");
			while($str[$i] == ' ')
				++$i;
		}
		else
		{
			print_r("$str[$i]");
			++$i;
		}
	}
	print_r("\n");
}
?>