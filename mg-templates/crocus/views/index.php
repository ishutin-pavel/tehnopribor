<?php mgSEO($data); ?>

<!-- Новинки - start -->
<?php if(!empty($data['newProducts'])): ?>

    <div class="j-carousel__title j-carousel__title--new <?php echo count($data['newProducts'])>3?"m-p-products-slider-start":"" ?>">

        <!-- j-carousel__slideset - start -->
        <div class="j-carousel j-carousel__slideset">

            <!-- j-goods - start -->
            <?php foreach($data['newProducts'] as $item): ?>
            <div class="j-goods__item">

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
                                    <?php echo $item["old_price"] ?> <?php echo $data['currency']; ?>
                                </span>
                            </li>
                            <?php endif; ?>
                            <li class="j-goods__price__current   product-default-price">
                                <?php echo priceFormat($item["price"]) ?> <?php echo $data['currency']; ?>
                            </li>
                        </ul>
                    </div>

                    <?php if(class_exists('JSProperty')): ?>[jsproperty id="<?php echo $item['id']?>"]<?php endif; ?>

                    <div class="j-goods__buttons">
                        <?php echo $item[$data['actionButton']] ?>
                    </div>

                    <?php if(class_exists('OneClick')): ?>[one-click product="<?php echo $item['id']?>"]<?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- j-goods - end-->
        </div>
        <!-- j-carousel__slideset - end -->
    </div>
<?php endif; ?>
<!-- Новинки - end -->



<!-- Хиты продаж - start -->
<?php if(!empty($data['recommendProducts'])): ?>

    <div class="j-carousel__title j-carousel__title--hit <?php echo count($data['recommendProducts'])>3?"m-p-products-slider-start":"" ?>">

        <!-- j-carousel__slideset - start -->
        <div class="j-carousel j-carousel__slideset">

            <!-- j-goods - start -->
            <?php foreach($data['recommendProducts'] as $item): ?>
            <div class="j-goods__item">

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
                                    <?php echo $item["old_price"] ?> <?php echo $data['currency']; ?>
                                </span>
                            </li>
                            <?php endif; ?>
                            <li class="j-goods__price__current   product-default-price">
                                <?php echo priceFormat($item["price"]) ?> <?php echo $data['currency']; ?>
                            </li>
                        </ul>
                    </div>

                    <?php if(class_exists('JSProperty')): ?>[jsproperty id="<?php echo $item['id']?>"]<?php endif; ?>

                    <div class="j-goods__buttons">
                        <?php echo $item[$data['actionButton']] ?>
                    </div>

                    <?php if(class_exists('OneClick')): ?>[one-click product="<?php echo $item['id']?>"]<?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- j-goods - end-->
        </div>
        <!-- j-carousel__slideset - end -->
    </div>
<?php endif; ?>
<!-- Хиты продаж - end -->



<!-- Акции - start -->
<?php if(!empty($data['saleProducts'])): ?>

    <div class="j-carousel__title j-carousel__title--sale <?php echo count($data['saleProducts'])>3?"m-p-products-slider-start":"" ?>">

        <!-- j-carousel__slideset - start -->
        <div class="j-carousel j-carousel__slideset">

            <!-- j-goods - start -->
            <?php foreach($data['saleProducts'] as $item): ?>
            <div class="j-goods__item">

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
                                    <?php echo $item["old_price"] ?> <?php echo $data['currency']; ?>
                                </span>
                            </li>
                            <?php endif; ?>
                            <li class="j-goods__price__current   product-default-price">
                                <?php echo priceFormat($item["price"]) ?> <?php echo $data['currency']; ?>
                            </li>
                        </ul>
                    </div>

                    <?php if(class_exists('JSProperty')): ?>[jsproperty id="<?php echo $item['id']?>"]<?php endif; ?>

                    <div class="j-goods__buttons">
                        <?php echo $item[$data['actionButton']] ?>
                    </div>

                    <?php if(class_exists('OneClick')): ?>[one-click product="<?php echo $item['id']?>"]<?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- j-goods - end-->
        </div>
        <!-- j-carousel__slideset - end -->
    </div>
<?php endif; ?>
<!-- Акции - end -->


<div class="j-seo">
    <?php echo $data['cat_desc'] ?>
</div>