<?php
function isPrime($number)
{
    if ($number == 2)
        return true;
	if ($number % 2 == 0)
		return false;
	$i=3;
	$max_factor = (int)sqrt($number);
	while ($i <= $max_factor){
		if ($number % $i == 0)
			return false;
		$i += 2;
	}
	return true;
}
function findSimple($a, $b) 
{
	$arr = range($a, $b);
	foreach ($arr as $value) {
		if (isPrime($value)) {
			$newArr[] =  $value;
		}
		
	}
	return $newArr;
}
function createTrapeze($a)
{	
	$keys = ['a', 'b', 'c'];
	if (count($a) % 3 == 0) {
		$countArr = count($a)/3;
		for ($i=0; $i < $countArr; $i++) { 
			$c[] = array_combine($keys, array_slice($a, 0, 3));
			array_splice($a, 0, 3);
		}
	} else {
		return "Колличество элементов массива не кратно 3 !!!";
	}
	return $c;
}

function squareTrapeze($a) 
{
	foreach ($a as $key => $value) {
		$b[] = $value;
		$b[$key]['s'] = ($b[$key]['a'] + $b[$key]['b'])*$b[$key]['c']/2;
	}
	return $b;
}

echo "<pre>";

function getSizeForLimit($a, $b) 
{
	$max = 0;
	$maxKey = 0;
	foreach ($a as $key => $value) {
		if ($max < $value['s'] && $b > $value['s']) {
			$max = $value['s'];
			$maxKey =  $key;
		}
    }
    return $a[$maxKey];
}
function getMin($a)
{
	$min = $a[0];
	foreach ($a as $value) {
		if ($min > $value) {
			$min = $value;
		}
	}
	return $min;
}
function printTrapeze($a)
{
	echo "<table>";
	echo "<tr><th>a</th><th>b</th><th>c</th><th>s</th></tr>";
	foreach ($a as $value) {
			if ($value['s'] % 2 == 0 && is_int($value['s'])) {
				echo "<tr>
						<td><h1>" . $value['a'] . "</h1></td>
						<td><h1>" . $value['b'] . "</h1></td>
						<td><h1>" . $value['c'] . "</h1></td>
						<td><h1>" . $value['s'] . "</h1></td>
					</tr>";
			} else {
				echo "<tr>
						<td>" . $value['a'] . "</td>
						<td>" . $value['b'] . "</td>
						<td>" . $value['c'] . "</td>
						<td>" . $value['s'] . "</td>
					</tr>";
			}
	}
	echo "</table>";
}
$arr = squareTrapeze(createTrapeze(findSimple(1, 263)));

printTrapeze($arr);
abstract class BaseMath 
{
	protected function exp1($a, $b, $c) 
	{
		return $a*(pow($b, $c));
	}

	protected function exp2($a, $b, $c)
	{
		return pow(($a/$b),$c);
	}

	abstract protected function getValue();

}

class F1 extends BaseMath
{
	public $a, $b, $c;

	function __construct($a, $b, $c)
	{
		$this->a = $a;
		$this->b = $b;
		$this->c = $c;
	}

	public function getValue() 
	{
		return $f = pow($this->exp1($this->a, $this->b, $this->c) + ($this->exp2($this->a, $this->b, $this->c) % 3),min($this->a, $this->b, $this->c));
	}
}
