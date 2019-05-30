<?php
header('Content-Type: text/html; charset=utf-8');
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
function importXml($a) 
{	
	$db_host = '192.168.88.21'; 
	$db_username = 'root'; 
	$db_password = ''; 
	$db_name = 'test_samson'; 
	$db_charset = 'utf8'; 
	$is_connected = mysqli_connect($db_host, $db_username, $db_password, $db_name); 
	$s= simplexml_load_file($a);
	foreach ($s->Товар as  $product) {
		$name = $product->attributes()->Название;	
		$code = $product->attributes()->Код;	
		$query ="INSERT INTO a_product(name, code) VALUES ('" . $name . "', '" . $code . "')"; 
		$result = mysqli_query($is_connected, $query) or die("Ошибка " . mysqli_error($is_connected));
		$query ="SELECT id FROM a_product WHERE name = '" . $name . "' LIMIT 1";
		$result = mysqli_query($is_connected, $query) or die("Ошибка " . mysqli_error($is_connected)); 
		$products = mysqli_fetch_array($result);
		$id = $products['id'];	 
		foreach ($product->Цена as $value) {
			$typePrice = $value->attributes();
			$price = $value;
			$query ="INSERT INTO a_price(type, price, id_product) VALUES ('" . $typePrice . "', '" . $price . "', '" . $id . "')"; 
			$result = mysqli_query($is_connected, $query) or die("Ошибка " . mysqli_error($is_connected));
		}
		foreach (json_decode(json_encode($product->Свойства)) as  $name => $property) {
			if (!is_array($property)) {
	 			$propertyProduct = 	$name . " - " . $property;
	 			$query ="INSERT INTO a_property(value, id_product) VALUES ('" . $propertyProduct . "', '" . $id . "')"; 
				$result = mysqli_query($is_connected, $query) or die("Ошибка " . mysqli_error($is_connected));
			} else {
				foreach ($property as  $property1) {
					$propertyProduct = 	$name . " - " . $property1;
	 				$query ="INSERT INTO a_property(value, id_product) VALUES ('" . $propertyProduct . "', '" . $id . "')"; 
					$result = mysqli_query($is_connected, $query) or die("Ошибка " . mysqli_error($is_connected));
				}
			}
		}
		$idCategory = [];
		foreach ($product->Разделы->Раздел as  $category) {
			$code = substr($product->attributes()->Код, 0, 1);
			$query1 ="SELECT name, id FROM a_category WHERE name = '" . $category . "'";
			$result1 = mysqli_query($is_connected, $query1) or die("Ошибка " . mysqli_error($is_connected)); 
			if (mysqli_num_rows($result1) == 0) {
				$query ="INSERT INTO a_category(name, code) VALUES ('" . $category . "', '" . $code . "')"; 
				$result = mysqli_query($is_connected, $query) or die("Ошибка " . mysqli_error($is_connected));
				
			}
			$query1 ="SELECT id FROM a_category WHERE name = '" . $category . "'";
			$result1 = mysqli_query($is_connected, $query1) or die("Ошибка " . mysqli_error($is_connected));
			while ($row = mysqli_fetch_array($result1)) {
				 	$idCategory[] = $row['id'];
				 	$idCategoryLast = $row['id'];
				 }
			$query ="INSERT INTO category_product(id_product, id_category) VALUES ('" . $id . "', '" . $idCategoryLast . "')"; 
			$result = mysqli_query($is_connected, $query) or die("Ошибка " . mysqli_error($is_connected));	 
			if (count($idCategory)>1) {
				$parentId = $idCategory[count($idCategory)-2];
				$query2 ="UPDATE a_category SET parent_id='" . $parentId . "', code='" .$code . $idCategoryLast. "' WHERE id='" . $idCategoryLast . "' ";
	    		$result = mysqli_query($is_connected, $query2) or die("Ошибка " . mysqli_error($link));  
			}
		}
	}
}
function exportXml($a,$b)
{
	$db_host = '192.168.88.21'; 
	$db_username = 'root'; 
	$db_password = ''; 
	$db_name = 'test_samson'; 
	$db_charset = 'utf8'; 
	$is_connected = mysqli_connect($db_host, $db_username, $db_password, $db_name); 
	$dom = new domDocument("1.0", "utf-8"); 
	$productsXml = $dom->createElement("Товары");
	$dom->appendChild($productsXml); 
	$query1 ="SELECT a_category.code_category, a_category.name_category, a_product.id,a_product.name, a_product.code FROM a_product 
	JOIN category_product ON a_product.id=category_product.id_product 
	JOIN a_category ON category_product.id_category=a_category.id
	WHERE a_category.code_category='" . $b . "'";
	$result1 = mysqli_query($is_connected, $query1) or die("Ошибка " . mysqli_error($is_connected));
	while ($row = mysqli_fetch_array($result1)) {
		$idProduct = $row['id'];
		$productXml = $dom->createElement("Товар"); 
	    $productXml->setAttribute("Код", $row['code']);
	    $productXml->setAttribute("Название",$row['name']);
		$query2 ="SELECT a_price.type, a_price.price FROM a_price 
		JOIN a_product ON a_product.id=a_price.id_product 
		WHERE a_product.id='". $idProduct ."'";
		$result2 = mysqli_query($is_connected, $query2) or die("Ошибка " . mysqli_error($is_connected));
		while ($row2 = mysqli_fetch_array($result2)) {
			$price[] = $row2['price'];
			$priceXml = $dom->createElement('Цена', $row2['price']);
	    	$priceXml->setAttribute('Тип', $row2['type']); 
	    	$productXml->appendChild($priceXml); 
		}
		$query3 = "SELECT a_property.value FROM a_property 
		JOIN a_product ON a_product.id=a_property.id_product 
		WHERE a_product.id='". $idProduct ."'";
		$result3 = mysqli_query($is_connected, $query3) or die("Ошибка " . mysqli_error($is_connected));
		$propertyXml = $dom->createElement("Свойства");
		while ($row3 = mysqli_fetch_array($result3)) {
			$property = explode(' - ', $row3['value']); 
			$propertyChildXml = $dom->createElement($property[0], $property[1]);
			$propertyXml->appendChild($propertyChildXml); 
		}
		$query4 ="SELECT a_category.code_category, a_category.name_category
		FROM a_product 
		JOIN category_product ON a_product.id=category_product.id_product 
		JOIN a_category ON category_product.id_category=a_category.id
		WHERE a_product.id='". $idProduct ."'";
		$result4 = mysqli_query($is_connected, $query4) or die("Ошибка " . mysqli_error($is_connected));
		$categoryXml = $dom->createElement("Разделы");
		while ($row4 = mysqli_fetch_array($result4)) {
			$categoryChildXml = $dom->createElement("Раздел",$row4['name_category']);
			$categoryXml->appendChild($categoryChildXml);  
		}
		$productXml->appendChild($propertyXml);
		$productXml->appendChild($categoryXml);
	    $productsXml->appendChild($productXml); 
	}
	$dom->save($a);
}