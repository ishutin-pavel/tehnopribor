<?php mgSEO($data); ?>
<?php if(empty($data['searchData'])): ?>

  
<!-- sub category - start -->
<?php if(MG::getSetting('picturesCategory') == 'true'):?>
    <?php echo mgSubCategory($data['cat_id']); ?>
<?php endif;?>
<!-- sub category - end -->


<!-- seo top - start -->
<div class="j-seo__top">
    <?php if($cd = str_replace("&nbsp;", "", $data['cat_desc'])): ?>
        <?php if (URL::isSection('catalog')||(((MG::getSetting('catalogIndex')=='true') && (URL::isSection('index') || URL::isSection(''))))): ?>
            <!-- Здесь можно добавить описание каталога - информация для пользователей (выводится только на странице каталог (не в категории)) -->
        <?php else :?>
  
        <?php endif;?>
    <?php endif; ?>
</div>
<!-- seo top - end -->


<!-- filter - start -->
<div class="j-filter-mobile">
    <svg class="icon icon--filter"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--filter"></use></svg>
    <span class="j-filter-mobile__title">Фильтр</span>
    <svg class="icon icon--arrow-down"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-down"></use></svg>
</div>
<?php filterCatalog(); ?>
<!-- filter - end -->


<!-- view - start -->
<div class="j-view">
    <div class="j-view__apply">
        <?php layout("apply_filter", $data['applyFilter']);?>
    </div>

    <div class="j-view__switcher j-switcher">
        <div class="j-switcher__item j-switcher__item--active" title="Вид сеткой" data-type="j-goods__grid">
            <svg class="icon icon--grid"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--grid"></use></svg>
        </div>
        <div class="j-switcher__item" title="Вид списком" data-type="j-goods__list">
            <svg class="icon icon--list"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--list"></use></svg>
        </div>
    </div>
</div>
<!-- view - end -->


<!-- catalog - start -->
<div class="j-goods j-goods__catalog   products-wrapper catalog">
    <?php foreach($data['items'] as $item): ?>
    <div class="j-goods__item   product-wrapper">

        <div class="j-goods__left">
            <a class="j-goods__image" href="<?php echo $item["link"]?>">
                <div class="j-ribbon">
                    <?php
                        $price = intval(MG::numberDeFormat($item['price'])) ;
                        $oldprice = intval(MG::numberDeFormat($item['old_price']));
                        $calculate = $oldprice-$price;
                        $result = "" .round($calculate). " " .$data['currency'];
                        if(!empty($item['old_price'])){
                            echo '<div class="j-ribbon__sale"> -' . $result . ' </div>' ;
                        }
                        echo $item['new']?'       <div class="j-ribbon__new">New</div>':'';
                        echo $item['recommend']?' <div class="j-ribbon__hit">Hit</div>':'';
                    ?>
                </div>
                <?php echo mgImageProduct($item); ?>
            </a>
        </div>

        <div class="j-goods__right">
            <a class="j-goods__name" href="<?php echo $item["link"]?>">
                <?php echo $item["title"] ?>
            </a>

            <?php if(class_exists('JSComments')): ?>[jscomments id="<?php echo $item['id']?>"]<?php endif; ?>

            <div class="product-price">
                <ul class="j-goods__price    product-status-list">
                  
                    <?php if($item["old_price"]!=""): ?>
                    <li <?php echo (!$item['old_price'])?'style="display:none"':'style="display:inline-block"' ?>>
                        <span class="j-goods__price__old   product-old-price old-price">
                            <?php echo MG::priceCourse($item['old_price']); ?> <?php echo $data['currency']; ?>
                        </span>
                    </li>
                    <?php endif; ?>
                    <li class="j-goods__price__current   product-default-price">
                        <?php echo $item["price"] ?> <?php echo $data['currency']; ?>
                    </li>
                </ul>
            </div>

            <div class="j-goods__description">
              
                              <?php echo MG::textMore($item["description"], 140) ?>
            </div>

            <?php echo $item['buyButton']; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php echo $data['pager']; ?>
<!-- catalog - end -->

<?php else: ?>

<!-- search page - start -->
<h1 class="j-title">
    При поиске по фразе: <strong>"<?php echo $data['searchData']['keyword'] ?>"</strong>
    найдено <strong><?php echo mgDeclensionNum($data['searchData']['count'], array('товар', 'товара', 'товаров')); ?></strong>
</h1>

<div class="j-goods   search-results catalog">
    <?php foreach($data['items'] as $item): ?>
    <div class="j-goods__item   product-wrapper">

        <div class="j-goods__left">
            <a class="j-goods__image" href="<?php echo $item["link"]?>">
                <div class="j-ribbon">
                    <?php
                        $price = intval(MG::numberDeFormat($item['price'])) ;
                        $oldprice = intval(MG::numberDeFormat($item['old_price']));
                        $calculate = $oldprice-$price;
                        $result = "" .round($calculate). " " .$data['currency'];
                        if(!empty($item['old_price'])){
                            echo '<div class="j-ribbon__sale"> -' . $result . ' </div>' ;
                        }
                        echo $item['new']?'       <div class="j-ribbon__new">New</div>':'';
                        echo $item['recommend']?' <div class="j-ribbon__hit">Hit</div>':'';
                    ?>
                </div>
                <?php echo mgImageProduct($item); ?>
            </a>
        </div>

        <div class="j-goods__right">
            <a class="j-goods__name" href="<?php echo $item["link"]?>">
                <?php echo $item["title"] ?>
            </a>

            <?php if(class_exists('JSComments')): ?>[jscomments id="<?php echo $item['id']?>"]<?php endif; ?>

            <div class="product-price">
                <ul class="j-goods__price    product-status-list">
                    <?php if($item["old_price"]!=""): ?>
                    <li <?php echo (!$item['old_price'])?'style="display:none"':'style="display:inline-block"' ?>>
                        <span class="j-goods__price__old   product-old-price old-price">
                            <?php echo MG::priceCourse($item['old_price']); ?> <?php echo $data['currency']; ?>
                        </span>
                    </li>
                    <?php endif; ?>
                    <li class="j-goods__price__current   product-default-price">
                        <?php echo $item["price"] ?> <?php echo $data['currency']; ?>
                    </li>
                </ul>
            </div>

            <div class="j-goods__description">
                <?php echo MG::textMore($item["description"], 140) ?>
            </div>

            <?php echo $item['buyButton']; ?>

        </div>
    </div>
    <?php endforeach; ?>
</div>


<?php echo $data['pager']; endif; ?>
<!-- search page - end -->


<!-- seo bottom - start -->
<div class="j-seo">
    <h1><?php echo $data['titeCategory'] ?></h1>
    <?php if (URL::isSection('catalog')||(((MG::getSetting('catalogIndex')=='true')))): ?>
        <?php echo $data['cat_desc_seo'] ?>
        <?php echo $data['cat_desc'] ?>
            <?php else :?>
        <?php echo $data['cat_desc_seo'] ?>
    <?php endif;?>
</div>
<!-- seo bottom - end -->