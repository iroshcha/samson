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
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>	
<div class="review-block">
	<div class="review-text">
							
		<div class="review-block-title"><span class="review-block-name"><a href="#"><?=$arItem["NAME"]?></a></span><span class="review-block-description"><?=$arItem["PROPERTIES"]["position"]["VALUE"];?> <?=$arItem["PROPERTIES"]["name_company"]["VALUE"];?></span></div>
		
		<div class="review-text-cont">
			<?=$arItem["PREVIEW_TEXT"];?>
		</div>
	</div>
	<div class="review-img-wrap"><a href="#"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="img" height="75"></a></div>
</div>

<?endforeach;?>
