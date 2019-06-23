<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="ps_head"><a class="ps_head_link" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><h2 class="ps_head_h"><?=$arItem["NAME"]?></h2></a><p><?=$arItem["PROPERTIES"]["price"]["NAME"]?>: <?=$arItem["PROPERTIES"]["price"]["VALUE"]?></p> <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" align="left" alt="<?=$arItem["NAME"]?>"/> </div>
			

		<div style="clear:both"></div>
		<hr>
<?endforeach;?>
