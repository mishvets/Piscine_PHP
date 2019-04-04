#!/usr/bin/php
<?PHP
include("ft_is_sort.php");
$tab = array("toto", "tutu", "4234", "_hop", "A2l+", "XXX", "##", "1948372", "AhAhAh");
if (ft_is_sort($tab))
	echo "The array is sorted\n";
else
	echo "The array is not sorted\n";
?>