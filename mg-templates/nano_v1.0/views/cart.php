<?php mgSEO($data); ?>
<?php mgTitle('Корзина'); ?>
<h1 class="new-products-title"><span>Корзина</span> товаров</h1>
<div class="product-cart" style="display:<?php echo!$data['isEmpty']?'none':'block'; ?>">
    <div class="cart-wrapper">
        <form method="post" action="<?php echo SITE ?>/cart">
            <table class="cart-table">
                <?php $i = 1;
                foreach($data['productPositions'] as $product): ?>
                <tr>
                    <td class="img-cell">
                        <a href="<?php echo $product["link"] ?>" target="_blank" class="cart-img">
                            <img src="<?php echo mgImageProductPath($product["image_url"], $product['id'], 'small')?>" alt="">
                        </a>
                    </td>
                    <td class="name-cell">
                        <a href="<?php echo $product["link"]?>" target="_blank">
                            <?php echo $product['title'] ?>
                        </a>
                        <br/><?php echo $product['property_html'] ?>
                    </td>
                    <td class="count-cell">
                        <div class="cart_form">
                            <div class="amount_change">
                                <a href="#" class="down"></a>
                                    <input type="text" name="item_<?php echo $product['id'] ?>[]" class="amount_input zeroToo" data-max-count="<?php echo $data['maxCount'] ?>" value="<?php echo $product['countInCart'] ?>" />
                                <a href="#" class="up"></a>
                            </div>
                        </div>
                        <input type="hidden"  name="property_<?php echo $product['id'] ?>[]" value = "<?php echo $product['property'] ?>"/>
                    </td>
                    <td class="price-cell">
                        <?php echo MG::numberFormat($product['countInCart']*$product['price']) ?>  <?php echo $data['currency']; ?>
                    </td>
                    <td>
                        <a class="deleteItemFromCart delete-btn" href="<?php echo SITE ?>/cart" data-delete-item-id="<?php echo $product['id'] ?>" data-property="<?php echo $product['property'] ?>" data-variant="<?php echo $product['variantId'] ?>" title="Удалить товар">&#215;</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </form>
        <div class="total-sum">
            Всего: <strong class="total-sum-strong"><?php echo $data['totalSumm']; ?> <?php echo $data['currency']; ?></strong>
        </div>

        <form action="<?php echo SITE ?>/order" method="post" class="checkout-form">
            <button type="submit" class="checkout-btn default-btn" name="order" value="Оформить заказ">Оформить заказ</button>
        </form>
    </div>

</div>
<div class="j-alert__default empty-cart-block alert-info" style="display:<?php echo!$data['isEmpty']?'block':'none'; ?>">
    Ваша корзина пуста
</div>