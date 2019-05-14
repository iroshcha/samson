<?php
 function convertString($a, $b)
{
	if (preg_match_all("/$b/", $a) >= 2) {
		return substr_replace($a, strrev($b), strpos($a, $b, strpos($a, $b)+1), strlen($b));
	}
}
function mySortForKey($a, $b) {
	$data_b=[];
	foreach($a as $key => $value) {
	    $data_b[$key] = $value[$b];
	}
	array_multisort($a, SORT_NUMERIC, $data_b);
	return $a;
}


 

