<?php mgAddMeta('<link type="text/css" href="'.SCRIPT.'standard/css/compare.css" rel="stylesheet"/>'); ?>
<?php mgAddMeta('<script type="text/javascript" src="'.SCRIPT.'standard/js/layout.compare.js"></script>'); ?>
<div class="mg-product-to-compare" style="<?php echo ($_SESSION['compareCount'])?'display:block;':'display:none;'; ?>">
	<a class="j-compare__informer" href="<?php echo SITE ?>/compare" title="Перейти к списку сравнений">
		<div class="j-compare__informer__count   mg-compare-count"><?php echo $_SESSION['compareCount']?$_SESSION['compareCount']:0?></div>
		<div class="j-compare__informer__text    mg-compare-text">Товаров для сравнения</div>
	</a>
</div>