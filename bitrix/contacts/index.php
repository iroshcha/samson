<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><b><u>Форма обратной связи</u></b><b><u><br>
 </u></b><br>
 <?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"USE_CAPTCHA" => "Y",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"EMAIL_TO" => "vl.roshchupkin@gmail.com",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "MESSAGE",
		),
		"EVENT_MESSAGE_ID" => array(
			0 => "7",
		)
	),
	false
);?><br>
 <br>
 <b><u>Карта<br>
 </u></b><br>
 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"API_KEY" => "",
		"CONTROLS" => array("ZOOM","MINIMAP","TYPECONTROL","SCALELINE"),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:5:{s:10:\"yandex_lat\";d:51.315803667135114;s:10:\"yandex_lon\";d:37.91098743282333;s:12:\"yandex_scale\";i:15;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.91098743282338;s:3:\"LAT\";d:51.31580366713325;s:4:\"TEXT\";s:12:\"Мы тут!\";}}s:9:\"POLYLINES\";a:1:{i:0;a:3:{s:6:\"POINTS\";a:2:{i:0;a:2:{s:3:\"LAT\";d:51.316239345930825;s:3:\"LON\";d:37.91030078731552;}i:1;a:2:{s:3:\"LAT\";d:51.314410542481895;s:3:\"LON\";d:37.90618091426865;}}s:5:\"TITLE\";s:0:\"\";s:5:\"STYLE\";a:2:{s:11:\"strokeColor\";s:8:\"FF00007F\";s:11:\"strokeWidth\";i:3;}}}}",
		"MAP_HEIGHT" => "500",
		"MAP_ID" => "",
		"MAP_WIDTH" => "600",
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM","ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING")
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>