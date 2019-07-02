<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Пользователь");
$rsUsers = CUser::GetList(); // выбираем пользователей
$rsUsers->NavStart(); // разбиваем постранично по 50 записей
foreach ($rsUsers->arResult as $key => $value) {
	if ($value["LOGIN"] == $_GET['login']) {
		$keyNew = $key;
	}
}
$user = $rsUsers->arResult[$keyNew];
// foreach ($rsUsers->arResult[$keyNew] as $key => $value) {
// 	echo $value . '<br>';
// }
?>
<p>LOGIN: <?=$user["LOGIN"]?></p>
<p>EMAIL: <?=$user["EMAIL"]?></p>
<p>ДАТА РЕГИСТРАЦИИ: <?=$user["DATE_REGISTER"]?></p>
<p>ПОСЛЕДНЯЯ АВТОРИЗАЦИЯ: <?=$user["LAST_LOGIN"]?></p>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>