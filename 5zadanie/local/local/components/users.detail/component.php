<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$rsUser = CUser::GetByLogin($_GET['login']);
$arResult = $rsUser->Fetch();


$this -> includeComponentTemplate();