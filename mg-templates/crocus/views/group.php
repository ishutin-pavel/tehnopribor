<?php mgSEO($data); ?>

<h1 class="j-title <?php echo $data['class_title'] ?>" >
    <?php echo $data['titeCategory'] ?>
</h1>

<div class="j-goods">
    <?php if (!empty($data['items'])) foreach ($data['items'] as $item):?>

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
                <ul class="j-goods__price product-status-list">
                    <?php if($item["old_price"]!=""): ?>
                    <li <?php echo (!$item['old_price'])?'style="display:none"':'style="display:inline-block"' ?>>
                        <span class="j-goods__price__old   product-old-price old-price">
                            <?php echo $item["old_price"] ?> <?php echo $data['currency']; ?>
                        </span>
                    </li>
                    <?php endif; ?>
                    <li class="j-goods__price__current product-default-price">
                        <?php echo priceFormat($item["price"]) ?> <?php echo $data['currency']; ?>
                    </li>
                </ul>
            </div>

            <?php echo $item['buyButton']; ?>

        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php echo $data['pager']; ?>

<script>
    $(document).ready(function() {
        $('.j-title:contains("Распродажа")').text('Акции');
        $('.j-title:contains("Рекомендуемые товары")').text('Хиты продаж');
    });
</script>