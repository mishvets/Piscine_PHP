#!/usr/bin/php
<?php
	while (true)
	{
		echo "Enter a number: ";
		$var = trim((fgets(STDIN)));
		if (feof(STDIN))
			break;
		if (is_numeric($var))
		{
			if ($var % 2)
				echo "The number '$var' is odd\n";
			else
				echo "The number '$var' is even\n";
		}
		else
			echo "'$var' is not a number\n";
	}
	echo "\n";
?>