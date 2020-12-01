<?php mgSEO($data); ?>
<?php if(empty($data['searchData'])): ?>

<?php if(MG::getSetting('picturesCategory') == 'true'):?>   
    <?php echo mgSubCategory($data['cat_id']); ?>
<?php endif;?>

<div class="j-catalog__header">

    <div class="j-apply">
        <?php layout("apply_filter", $data['applyFilter']);?>
    </div>

    <div class="j-switcher" data-toggle="buttons-radio">
        <button class="default-btn grid" title="Плиткой" data-type="grid">
            <svg class="icon icon--grid"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--grid"></use></svg>
        </button>
        <button class="default-btn list" title="Списком" data-type="list">
            <svg class="icon icon--list"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--list"></use></svg>
        </button>
    </div>

</div>

<div class="products-wrapper catalog">
    <?php foreach($data['items'] as $item): ?>
    <div class="j-product product-wrapper">
        
        <div class="j-list__left">    
            <a class="j-product__image" href="<?php echo $item["link"]?>">
                <?php
                    echo $item['recommend']?'
                        <span class="j-product__hit">
                            <svg class="icon icon--ribbon"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--ribbon"></use></svg>
                        </span>':'';
                    echo $item['new']?'
                        <span class="j-product__new">
                            <svg class="icon icon--ribbon"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--ribbon"></use></svg>
                        </span>':'';
                        
                        $price = intval(MG::numberDeFormat($item['price'])) ;
                        $oldprice = intval(MG::numberDeFormat($item['old_price']));
                        $calculate = $oldprice-$price;
                        $result = "Скидка " .round($calculate). " " .$data['currency'];
                    if(!empty($item['old_price'])){
                        echo '<span class="j-product__sale">' . $result . ' </span>' ;
                    } 
                ?>
                <?php echo mgImageProduct($item); ?>
            </a>
        </div>

        <div class="j-list__right">
            <div class="j-product__name">
                <a href="<?php echo $item["link"]?>"><?php echo $item["title"] ?></a>
            </div>
            <div class="j-product__additional">
                <?php if(class_exists('JSComments')): ?>[jscomments id="<?php echo $item['id']?>"]<?php endif; ?>
            </div>
            <div class="j-product__price product-price">
                <?php if($item["old_price"]!=""): ?>
					<ul class="product-status-list" style="display:inline-block">
						<li <?php echo (!$item['old_price'])?'style="display:none"':'style="display:inline-block"' ?>>
							<span class="j-product__price__old product-old-price old-price"><?php echo MG::priceCourse($item['old_price']); ?> <?php echo $data['currency']; ?></span>
						</li>
					</ul>
					<div class="j-product__price__current j-red product-default-price"><?php echo $item["price"] ?> <?php echo $data['currency']; ?></div>
                <?php endif; ?>
                <?php if($item["old_price"]==""): ?>
                    <div class="j-product__price__current product-default-price"><?php echo $item["price"] ?> <?php echo $data['currency']; ?></div>
                <?php endif; ?>
            </div>
            <div class="j-product__description">
                <?php echo MG::textMore($item["description"], 140) ?>
            </div>
            <div class="j-product__buttons">
                <?php echo $item['buyButton']; ?>
            </div>
        </div>

    </div>
    <?php endforeach; ?>
</div>
<?php echo $data['pager']; ?>

<?php else: ?>

<h1 class="new-products-title">При поиске по фразе: <strong>"<?php echo $data['searchData']['keyword'] ?>"</strong> найдено <strong><?php echo mgDeclensionNum($data['searchData']['count'], array('товар', 'товара', 'товаров')); ?></strong></h1>
<div class="search-results catalog">
    <?php foreach($data['items'] as $item): ?>
    <div class="j-product product-wrapper">
        
        <div class="j-list__left">    
            <a class="j-product__image" href="<?php echo $item["link"]?>">
                <?php
                    echo $item['recommend']?'
                        <span class="j-product__hit">
                            <svg class="icon icon--ribbon"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--ribbon"></use></svg>
                        </span>':'';
                    echo $item['new']?'
                        <span class="j-product__new">
                            <svg class="icon icon--ribbon"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--ribbon"></use></svg>
                        </span>':'';
                        
                        $price = intval(MG::numberDeFormat($item['price'])) ;
                        $oldprice = intval(MG::numberDeFormat($item['old_price']));
                        $calculate = $oldprice-$price;
                        $result = "Скидка " .round($calculate). " " .$data['currency'];
                    if(!empty($item['old_price'])){
                        echo '<span class="j-product__sale">' . $result . ' </span>' ;
                    } 
                ?>
                <?php echo mgImageProduct($item); ?>
            </a>
        </div>

        <div class="j-list__right">
            <div class="j-product__name">
                <a href="<?php echo $item["link"]?>"><?php echo $item["title"] ?></a>
            </div>
            <div class="j-product__additional">
                <?php if(class_exists('JSComments')): ?>[jscomments id="<?php echo $item['id']?>"]<?php endif; ?>
            </div>
			<div class="j-product__price product-price">
                <?php if($item["old_price"]!=""): ?>
					<ul class="product-status-list" style="display:inline-block">
						<li <?php echo (!$item['old_price'])?'style="display:none"':'style="display:inline-block"' ?>>
							<span class="j-product__price__old product-old-price old-price"><?php echo MG::priceCourse($item['old_price']); ?> <?php echo $data['currency']; ?></span>
						</li>
					</ul>
					<div class="j-product__price__current j-red product-default-price"><?php echo $item["price"] ?> <?php echo $data['currency']; ?></div>
                <?php endif; ?>
                <?php if($item["old_price"]==""): ?>
                    <div class="j-product__price__current product-default-price"><?php echo $item["price"] ?> <?php echo $data['currency']; ?></div>
                <?php endif; ?>
            </div>
            <div class="j-product__description">
                <?php echo MG::textMore($item["description"], 140) ?>
            </div>
            <div class="j-product__buttons">
                <?php echo $item['buyButton']; ?>
            </div>
        </div>

    </div>
    <?php endforeach; ?>
</div>

<?php echo $data['pager']; endif; ?>

<?php if($cd = str_replace("&nbsp;", "", $data['cat_desc'])): ?>
    <div class="j-category-discription">
        <h1><?php echo $data['titeCategory'] ?></h1>
        <?php echo $data['cat_desc'] ?>
    </div>
<?php endif; ?>