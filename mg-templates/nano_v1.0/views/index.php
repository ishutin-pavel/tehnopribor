<?php mgSEO($data); ?>


<?php if(!empty($data['newProducts'])): ?>
    <div class="owl-carousel__title">
        <span>Новинки</span>
        <a class="owl-carousel__title__link" href="<?php echo SITE; ?>/group?type=latest">cмотреть все Новинки</a>
    </div>
    <div class="<?php echo count($data['newProducts'])>3?"m-p-products-slider-start":"" ?>">
        <div id="j-carousel-1" class="owl-carousel">
            <?php foreach($data['newProducts'] as $item): ?>
                <div class="j-product">
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
                                $currency = MG::getSetting("currency");
                                $result = "Скидка " .round($calculate). " " .$currency;
                            if(!empty($item['old_price'])){
                                echo '<span class="j-product__sale">' . $result . ' </span>' ;
                            } 
                        ?>
                        <?php echo mgImageProduct($item); ?>
                    </a>
                    <div class="j-product__name">
                        <a href="<?php echo $item["link"]?>"><?php echo $item["title"] ?></a>
                    </div>
                    <div class="j-product__additional">
                        <?php if(class_exists('JSComments')): ?>[jscomments id="<?php echo $item['id']?>"]<?php endif; ?>
                    </div>
                    <div class="j-product__price">
                        <?php if($item["old_price"]!=""): ?>
                            <div class="j-product__price__old"><?php echo $item["old_price"] ?> <?php echo $data['currency']; ?></div>
                            <div class="j-product__price__current j-red"><?php echo priceFormat($item["price"]) ?> <?php echo $data['currency']; ?></div>
                        <?php endif; ?>
                        <?php if($item["old_price"]==""): ?>
                            <div class="j-product__price__current"><?php echo priceFormat($item["price"]) ?> <?php echo $data['currency']; ?></div>
                        <?php endif; ?>
                    </div>
                    <?php if(class_exists('JSProperty')): ?>[jsproperty id="<?php echo $item['id']?>"]<?php endif; ?>
                    <div class="j-product__buttons">
                        <?php echo $item[$data['actionButton']] ?>
                        <?php if(class_exists('OneClick')): ?>[one-click product="<?php echo $item['id']?>"]<?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>


<?php if(!empty($data['recommendProducts'])): ?>
    <div class="owl-carousel__title">
        <span>Хиты продаж</span>
        <a class="owl-carousel__title__link" href="<?php echo SITE; ?>/group?type=recommend">cмотреть все Хиты продаж</a>
    </div>
    <div class="<?php echo count($data['recommendProducts'])>3?"m-p-products-slider-start":"" ?>">
        <div id="j-carousel-2" class="owl-carousel">
            <?php foreach($data['recommendProducts'] as $item): ?>
                <div class="j-product">
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
                                $currency = MG::getSetting("currency");
                                $result = "Скидка " .round($calculate). " " .$currency;
                            if(!empty($item['old_price'])){
                                echo '<span class="j-product__sale">' . $result . ' </span>' ;
                            } 
                        ?>
                        <?php echo mgImageProduct($item); ?>
                    </a>
                    <div class="j-product__name">
                        <a href="<?php echo $item["link"]?>"><?php echo $item["title"] ?></a>
                    </div>
                    <div class="j-product__additional">
                        <?php if(class_exists('JSComments')): ?>[jscomments id="<?php echo $item['id']?>"]<?php endif; ?>
                    </div>
                    <div class="j-product__price">
                        <?php if($item["old_price"]!=""): ?>
                            <div class="j-product__price__old"><?php echo $item["old_price"] ?> <?php echo $data['currency']; ?></div>
                            <div class="j-product__price__current j-red"><?php echo priceFormat($item["price"]) ?> <?php echo $data['currency']; ?></div>
                        <?php endif; ?>
                        <?php if($item["old_price"]==""): ?>
                            <div class="j-product__price__current"><?php echo priceFormat($item["price"]) ?> <?php echo $data['currency']; ?></div>
                        <?php endif; ?>
                    </div>
					<?php if(class_exists('JSProperty')): ?>[jsproperty id="<?php echo $item['id']?>"]<?php endif; ?>
                    <div class="j-product__buttons">
                        <?php echo $item[$data['actionButton']] ?>
                        <?php if(class_exists('OneClick')): ?>[one-click product="<?php echo $item['id']?>"]<?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>


<?php if(!empty($data['saleProducts'])): ?>
    <div class="owl-carousel__title">
        <span>Акции</span>
        <a class="owl-carousel__title__link" href="<?php echo SITE; ?>/group?type=sale">cмотреть все Акции</a>
    </div>
    <div class="<?php echo count($data['saleProducts'])>3?"m-p-products-slider-start":"" ?>">
        <div id="j-carousel-3" class="owl-carousel">
            <?php foreach($data['saleProducts'] as $item): ?>
                <div class="j-product">
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
                                $currency = MG::getSetting("currency");
                                $result = "Скидка " .round($calculate). " " .$currency;
                            if(!empty($item['old_price'])){
                                echo '<span class="j-product__sale">' . $result . ' </span>' ;
                            } 
                        ?>
                        <?php echo mgImageProduct($item); ?>
                    </a>
                    <div class="j-product__name">
                        <a href="<?php echo $item["link"]?>"><?php echo $item["title"] ?></a>
                    </div>
                    <div class="j-product__additional">
                        <?php if(class_exists('JSComments')): ?>[jscomments id="<?php echo $item['id']?>"]<?php endif; ?>
                    </div>
                    <div class="j-product__price">
                        <?php if($item["old_price"]!=""): ?>
                            <div class="j-product__price__old"><?php echo $item["old_price"] ?> <?php echo $data['currency']; ?></div>
                            <div class="j-product__price__current j-red"><?php echo priceFormat($item["price"]) ?> <?php echo $data['currency']; ?></div>
                        <?php endif; ?>
                        <?php if($item["old_price"]==""): ?>
                            <div class="j-product__price__current"><?php echo priceFormat($item["price"]) ?> <?php echo $data['currency']; ?></div>
                        <?php endif; ?>
                    </div>
					<?php if(class_exists('JSProperty')): ?>[jsproperty id="<?php echo $item['id']?>"]<?php endif; ?>
                    <div class="j-product__buttons">
                        <?php echo $item[$data['actionButton']] ?>
                        <?php if(class_exists('OneClick')): ?>[one-click product="<?php echo $item['id']?>"]<?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<div class="j-category-discription"><?php echo $data['cat_desc'] ?></div>