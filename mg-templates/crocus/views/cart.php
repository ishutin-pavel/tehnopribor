<?php mgSEO($data); ?>
<?php mgTitle('Корзина'); ?>

<h1 class="j-title">Корзина товаров</h1>

<div class="product-cart" style="display:<?php echo!$data['isEmpty']?'none':'block'; ?>">

    <div class="cart-wrapper">
        <form method="post" action="<?php echo SITE ?>/cart">
            <table class="j-order__table__wrapper   cart-table">
                <tbody class="j-order__table">
                    <?php $i = 1; foreach($data['productPositions'] as $product): ?>
                    <tr class="j-order__table__row">
                        <td class="j-order__table__column j-order__table__img   img-cell">
                            <a class="cart-img" href="<?php echo $product["link"] ?>" target="_blank">
                                <img src="<?php echo mgImageProductPath($product["image_url"], $product['id'], 'big')?>" alt="">
                            </a>
                        </td>
                        <td class="j-order__table__column j-order__table__title">
                            <a href="<?php echo $product["link"]?>" target="_blank">
                                <?php echo $product['title'] ?>
                            </a>
                            <div class="j-order__table__property">
                                <?php echo $product['property_html'] ?>
                            </div>
                            <div class="j-order__table__code">
                                Артикул: <span class="code"><?php echo $product['code'] ?></span>
                            </div>
                        </td>

                        <td class="j-order__table__column j-order__table__price">
                            <?php echo MG::numberFormat($product['price']) ?> <?php echo $data['currency']; ?>/шт.
                        </td>

                        <td class="j-order__table__column j-order__table__count   count-cell">
                            <div class="j-amount  cart_form">
                                <div class="j-amount__inner   amount_change">
                                    <a href="#" class="j-amount__arrow j-amount__arrow__minus   down">
                                        <svg class="icon icon--arrow-left"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-left"></use></svg>
                                    </a>
                                    <input type="text" name="item_<?php echo $product['id'] ?>[]" class="amount_input zeroToo" data-max-count="<?php echo $data['maxCount'] ?>" value="<?php echo $product['countInCart'] ?>" />
                                    <a href="#" class="j-amount__arrow j-amount__arrow__plus    up">
                                        <svg class="icon icon--arrow-right"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-right"></use></svg>
                                    </a>
                                </div>
                            </div>
                            <input type="hidden"  name="property_<?php echo $product['id'] ?>[]" value = "<?php echo $product['property'] ?>"/>
                            <!-- <button type="submit" name="refresh" class="refresh" title="Пересчитать" value="Пересчитать"></button> -->
                        </td>
                        <td class="j-order__table__column j-order__table__total   price-cell">
                            <?php echo MG::numberFormat($product['countInCart']*$product['price']) ?>  <?php echo $data['currency']; ?>
                        </td>
                        <td class="j-order__table__column j-order__table__delete">
                            <a class="deleteItemFromCart delete-btn" href="<?php echo SITE ?>/cart" data-delete-item-id="<?php echo $product['id'] ?>" data-property="<?php echo $product['property'] ?>" data-variant="<?php echo $product['variantId'] ?>" title="Удалить товар">&#215;</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>

        <div class="j-order__table__bottom   total-sum">
            <div class="j-order__table__bottom__promo">
                <?php if(class_exists('PromoCode')): ?>[promo-code]<?php endif; ?>
            </div>

            <div class="j-order__table__bottom__total">
                <strong><?php echo priceFormat($data['totalSumm']) ?> <?php echo $data['currency']; ?></strong>
            </div>
        </div>
    </div>

    <form action="<?php echo SITE ?>/order" method="post" class="checkout-form">
        <button type="submit" class="j-order__table__checkout   checkout-btn" name="order" value="Оформить заказ">Оформить заказ</button>
    </form>
</div>

<div class="j-alert j-alert__default    empty-cart-block" style="display:<?php echo!$data['isEmpty']?'block':'none'; ?>">
    Ваша корзина пуста!
</div>