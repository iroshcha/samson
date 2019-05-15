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
		if (!array_key_exists($b, $a[$key])) {
		throw new Exception('in array ' . $key . ' is missing index: b');
	}
			    $data_b[$key] = $value[$b];
	}
	array_multisort($a, SORT_NUMERIC, $data_b);
	return $a;
}
$arr = [
	[
	'a' => 1,
	'b' => 9
	],
	[
	'a' => 1,
	'b' => 2
	],
	[
	'a' => 1,
	'b' => 5
	]
]
try {
	print_r(mySortForKey($arr, 'b'));
} catch (Exception $e) {
	echo $e->getMessage();
}