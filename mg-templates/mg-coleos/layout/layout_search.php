<?php mgAddMeta('<link type="text/css" href="'.SCRIPT.'standard/css/layout.search.css" rel="stylesheet"/>'); ?>
<?php mgAddMeta('<script type="text/javascript" src="'.SCRIPT.'standard/js/layout.search.js"></script>'); ?>

<div class="mg-search-block">
	<form method="get" action="<?php echo SITE?>/catalog" class="search-form">
		<input type="text" autocomplete="off" name="search" class="search-field" placeholder="Ключевое слово">
		<button type="submit" class="search-button">Поиск</button>
	</form>
	<div class="wraper-fast-result">
		<div class="fastResult">

		</div>
	</div>
</div>