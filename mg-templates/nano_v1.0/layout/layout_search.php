<?php mgAddMeta('<script type="text/javascript" src="' . SCRIPT . 'standard/js/layout.search.js"></script>'); ?>

<div class="mg-search-block">
    <form method="GET" action="<?php echo SITE ?>/catalog" class="search-form">
        <input type="search" autocomplete="off" name="search" class="search-field" placeholder="Поиск товаров..." value="<?php echo urldecode($_GET['search']); ?>">
        <button type="submit" class="search-button default-btn">
        	<svg class="icon icon--search"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--search"></use></svg>
    	</button>
    </form>
    <div class="wraper-fast-result">
        <div class="fastResult"></div>
    </div>
</div>