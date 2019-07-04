<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if (isset($_POST["search"])) {
		$filter = Array("EMAIL" => $_POST["search"]);
	}else{
		$filter =  Array("EMAIL" => "",
	);
};
if (isset($_POST["from"]) && isset($_POST["to"])) {
	$fromDate = date('d.m.Y', strtotime($_POST['from']));
	$toDate = date('d.m.Y', strtotime($_POST['to']));
	$filter = Array(
		"LAST_LOGIN_1" => $fromDate,
		"LAST_LOGIN_2" => $toDate,

	);
}
if (isset($_POST["from"])) {
	$fromDate = date('d.m.Y', strtotime($_POST['from']));
	$toDate = date('d.m.Y', strtotime($_POST['to']));
	$filter = Array(
		"LAST_LOGIN_1" => $fromDate
	);
}
if (isset($_POST["to"])) {
	$toDate = date('d.m.Y', strtotime($_POST['to']));
	$filter = Array(
		"LAST_LOGIN_2" => $toDate
	);
}
$rsUsers = CUser::GetList(($by = "DATE_REGISTER"), ($order = "asc"), $filter);
	while($arResult[] = $rsUsers->GetNext())	
	{
		
	}

$this -> includeComponentTemplate();