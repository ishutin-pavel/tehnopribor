<script>
    $(document).ready(function() {

    $('.j-related').owlCarousel({
        items: 4,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [800, 2],
        itemsMobile: [480, 1],
        navigation: true,
        navigationText: false,
        pagination: false
    });
});</script>

<div class="j-related__title">Сопутствующие товары</div>
<div class="j-related owl-carousel">
    <?php foreach ($data['products'] as $item):?>
        <div class="product-wrapper j-product">
            <a class="j-product__image" href="<?php echo $item["url"]?>">
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
                <?php 
                $item['image_url'] = $item['img'];
                echo mgImageProduct($item); 
                ?>
            </a>
            <div class="j-product__name">
                <a href="<?php echo $item["url"]?>"><?php echo $item["title"] ?></a>
            </div>
            <div class="product-footer">
                <div class="j-product__price">
                    <div class="j-product__price__current"><?php echo priceFormat($item["price"]) ?> <span><?php echo $data['currency']; ?></span></div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>