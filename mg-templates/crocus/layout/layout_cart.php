<?php mgAddMeta('<script type="text/javascript" src="'.PATH_SITE_TEMPLATE.'/js/layout.cart.js"></script>'); ?>

<!-- cart modal - start -->
<?php if(MG::getOption('popupCart')=='true'){ ?>
<div class="j-modal j-modal__cart">
    <div class="j-modal__content j-modal__cart__content">
        <div class="j-cart__title">Корзина товаров</div>
        <div class="j-cart__table">
            <table class="small-cart-table">
                <?php if(!empty($data['cartData']['dataCart'])){ ?>
                <?php foreach($data['cartData']['dataCart'] as $item): ?>
                <tr class="j-cart__table__tr">
                    <td class="small-cart-img">
                        <a class="j-cart__table__img" href="<?php echo SITE."/".(isset($item['category_url'])?$item['category_url']:'catalog/').$item['product_url'] ?>">
                            <img src="<?php echo $item["image_url_new"]?>" alt="<?php echo $item['title'] ?>" />
                        </a>
                    </td>
                    <td class="j-cart__table__name small-cart-name">
                        <ul class="small-cart-list">
                            <li>
                                <a class="j-cart__table__name__link" href="<?php echo SITE."/".(isset($item['category_url'])?$item['category_url']:'catalog/').$item['product_url'] ?>"><?php echo $item['title'] ?></a>
                                <span class="property"><?php echo $item['property_html'] ?></span>
                            </li>
                            <li class="j-cart__table__name__qty">
                                <?php echo $item['countInCart'] ?> шт. = <span><?php echo $item['priceInCart'] ?></span>
                            </li>
                        </ul>
                    </td>
                    <td class="j-cart__table__remove small-cart-remove">
                        <a href="#" class="deleteItemFromCart" title="Удалить" data-delete-item-id="<?php echo $item['id'] ?>"  data-property="<?php echo $item['property'] ?>"  data-variant="<?php echo $item['variantId'] ?>">&#215;</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php } else{ ?>
                <?php } ?>
            </table>
        </div>
        <ul class="j-cart__total total sum-list">
            <li class="total-sum">Всего: <strong><?php echo $data['cartData']['cart_price_wc'] ?></strong></li>
        </ul>
        <div class="j-cart__footer">
            <span class="j-cart__close">Продолжить покупки</span>
            <a class="j-cart__button j-button" href="<?php echo SITE ?>/order">Оформить</a>
        </div>
    </div>
</div>
<?php }; ?>
<!-- cart modal - end -->

<!-- cart - start -->
<div class="j-cart">
    <!-- visible - start -->
    <a href="<?php echo SITE ?>/order" class="j-cart__visible small-cart-icon">
        <svg class="icon icon--cart"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--cart"></use></svg>
        <ul class="j-cart__visible__ul cart-list">
            <li class="j-cart__visible__li">
                <span class="countsht j-cart__visible__count"><?php echo $data['cartCount']?$data['cartCount']:0 ?></span> <span class="j-cart__visible__suffix">шт.</span>
            </li>
            <li class="j-cart__visible__li cart-qty">
                <span class="pricesht j-cart__visible__amount"><?php echo $data['cartPrice']?$data['cartPrice']:0 ?></span> <span class="j-cart__visible__suffix"><?php echo $data['currency']; ?></span>
            </li>
        </ul>
    </a>
    <!-- visible - end -->

    <!-- dropdown - start -->
    <div class="j-cart__dropdown">
        <div class="j-cart__title">Корзина товаров</div>
        <div class="j-cart__table">
            <table class="small-cart-table">
                <?php if(!empty($data['cartData']['dataCart'])){ ?>
                <?php foreach($data['cartData']['dataCart'] as $item): ?>
                <tr class="j-cart__table__tr">
                    <td class="j-cart__table__img small-cart-img ">
                        <a href="<?php echo SITE."/".(isset($item['category_url'])?$item['category_url']:'catalog/').$item['product_url'] ?>">
                            <img src="<?php echo $item["image_url_new"]?>" alt="<?php echo $item['title'] ?>" />
                        </a>
                    </td>
                    <td class="j-cart__table__name small-cart-name">
                        <ul class="small-cart-list">
                            <li>
                                <a class="j-cart__table__name__link" href="<?php echo SITE."/".(isset($item['category_url'])?$item['category_url']:'catalog/').$item['product_url'] ?>"><?php echo $item['title'] ?></a>
                                <span class="property"><?php echo $item['property_html'] ?></span>
                            </li>
                            <li class="j-cart__table__name__qty">
                                <?php echo $item['countInCart'] ?> шт. = <span><?php echo $item['priceInCart'] ?></span>
                            </li>
                        </ul>
                    </td>
                    <td class="j-cart__table__remove small-cart-remove">
                        <a href="#" class="deleteItemFromCart" title="Удалить" data-delete-item-id="<?php echo $item['id'] ?>"  data-property="<?php echo $item['property'] ?>"  data-variant="<?php echo $item['variantId'] ?>">&#215;</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php } else{ ?>
                <?php } ?>
            </table>
        </div>
        <ul class="j-cart__total total sum-list">
            <li class="total-sum">Всего: <strong><?php echo $data['cartData']['cart_price_wc'] ?></strong></li>
        </ul>
        <div class="j-cart__footer">
            <a class="j-cart__button j-button" href="<?php echo SITE ?>/order">Оформить</a>
        </div>
    </div>
    <!-- dropdown - end -->
</div>
<!-- cart - end -->