<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); 

?>
<form action="#" method="POST">
	<div class="hd_search_form" style="float:left;">
		<input placeholder="Поиск" type="text" name="search"/>
		<input type="submit" value=""/>
	</div>
	С:<input type="date" name="from">
	До:<input type="date" name="to">
</form>
<div style="clear: both;"></div>
<?foreach ($arResult  as $user): ?>
	<?if ($user): ?>
	<a href="detail.php?login=<?=$user['LOGIN']?>"><?=$user['ID']?>. <?=$user['LOGIN']?> | <?=$user['EMAIL']?></a>
	<?endif ?>
<?endforeach ?>

