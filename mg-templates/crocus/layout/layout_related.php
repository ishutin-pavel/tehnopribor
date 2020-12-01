<?php mgAddMeta('<script type="text/javascript" src="'.SCRIPT.'jquery.bxslider.min.js"></script>'); ?>

<div class="j-carousel__title j-carousel__title--related"></div>

<div class="j-carousel j-carousel__slideset">
    <?php foreach ($data['products'] as $item):?>
    <div class="j-goods__item   product-wrapper">

        <div class="j-goods__left">
            <a class="j-goods__image" href="<?php echo $item["url"]?>">
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
                <?php $item['image_url'] = $item['img']; echo mgImageProduct($item); ?>
            </a>
        </div>

        <div class="j-goods__right">
            <a class="j-goods__name" href="<?php echo $item["url"]?>">
                <?php echo $item["title"] ?>
            </a>

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
                        <?php echo priceFormat($item["price"]) ?> <?php echo $data['currency']; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>