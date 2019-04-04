<?php
function ft_is_sort($tab)
{
	$tab_sort = $tab;
	sort($tab_sort);
	if (strcmp($tab[0], $tab_sort[0]))
	{
		$tab_sort = $tab;
		rsort($tab_sort);
	}
	$size = count($tab);
	for ($i = 0; $i < $size; $i++)
	{
		if (strcmp($tab[$i], $tab_sort[$i]))
			return (false);
	}
	return (true);
}
?>