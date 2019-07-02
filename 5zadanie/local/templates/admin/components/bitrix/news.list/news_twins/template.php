<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?php



function isAr($str)
{
	$ar =  explode(" ", $GLOBALS['mycomponent_variable']);
	$newAr = [];
	foreach ($ar as $value) {
		if (strlen($value) > 4) {
			$newAr[] = $value;
		}
	}
	$arr =  explode(" ", $str);
	foreach ($arr as $value) {
		if (in_array($value, $newAr)) {
			return true;
		}
	}
	return false;
}
?>

<div class="news-list">
	<h4>Похожие новости:</h4>
<?foreach($arResult["ITEMS"] as $arItem):?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"] && isAr($arItem["NAME"]) && $arItem["NAME"] != $GLOBALS['mycomponent_variable']):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
		<?endif;?>
<?endforeach;?>
</div>