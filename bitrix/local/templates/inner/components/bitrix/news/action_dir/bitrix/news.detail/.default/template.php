<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(is_array($arResult["DETAIL_PICTURE"])):?>
<h2 class="ps_head_h"><?=$arResult["NAME"]?></h2>
<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" align="left" alt="<?=$arResult["NAME"]?>"/>
<p><?=$arResult["PROPERTIES"]["price"]["NAME"]?>: <?=$arResult["PROPERTIES"]["price"]["VALUE"]?></p> 
<br>
<?endif;?>

