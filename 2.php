<?php
 function convertString($a, $b)
{
	if (preg_match_all("/$b/", $a) >= 2) {
		return substr_replace($a, strrev($b), strpos($a, $b, strpos($a, $b)+1), strlen($b));
	}
}
