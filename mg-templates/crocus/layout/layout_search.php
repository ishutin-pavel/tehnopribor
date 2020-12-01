<?php mgAddMeta('<script type="text/javascript" src="' . SCRIPT . 'standard/js/layout.search.js"></script>'); ?>

<div class="j-search mg-search-block">
    <form method="GET" action="<?php echo SITE ?>/catalog" class="j-search__form search-form">
        <input type="search" autocomplete="off" name="search" class="search-field" placeholder="Поиск товаров..." value="<?php echo urldecode($_GET['search']); ?>">
        <button type="submit" class="j-search__button search-button">
        	<svg class="icon icon--search"><use class="symbol" xlink:href="#icon--search"></use></svg>
        	<span class="j-search__button__text">Найти</span>
        </button>
    </form>
    <div class="j-search__results wraper-fast-result">
        <div class="fastResult"></div>
    </div>
</div>