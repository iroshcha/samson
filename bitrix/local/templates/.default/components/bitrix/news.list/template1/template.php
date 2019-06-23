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
// echo "<pre>";
// var_dump($arResult);
// echo "</pre>";
?>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<div class="rw_reviewed">
			<div class="rw_slider">
				<h4>Отзывы</h4>
				<ul id="foo">
<?foreach($arResult["ITEMS"] as $arItem):?>
					<li>
						<div class="rw_message">
							<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="rw_avatar" alt=""/>
							<span class="rw_name"><?=$arItem["NAME"]?></span>
							<span class="rw_job"><?=$arItem["PROPERTIES"]["position"]["VALUE"]?> “<?=$arItem["PROPERTIES"]["name_company"]["VALUE"]?>”</span>
							<p><?=$arItem["PREVIEW_TEXT"]?></p>
							<div class="clearboth"></div>
							<div class="rw_arrow"></div>
						</div>
					</li>
				
<?endforeach;?>

</ul>
				<div id="rwprev"></div>
				<div id="rwnext"></div>
				<a href="" class="rw_allreviewed">Все отзывы</a>
			</div>
		</div>