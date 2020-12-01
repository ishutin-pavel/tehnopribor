<?php mgAddMeta('<script type="text/javascript" src="'.PATH_SITE_TEMPLATE.'/js/layout.cart.js"></script>'); ?>
<?php if(MG::getOption('popupCart')=='true'){ ?>
<div class="j-modal__cart">
    <div class="j-modal__cart__content">
        <div class="j-modal__cart__title">Корзина товаров</div>
        <div class="j-modal__cart__table">
            <table class="small-cart-table">
                <?php if(!empty($data['cartData']['dataCart'])){ ?>
                <?php foreach($data['cartData']['dataCart'] as $item): ?>
                <tr>
                    <td class="small-cart-img">
                        <a href="<?php echo SITE."/".(isset($item['category_url'])?$item['category_url']:'catalog/').$item['product_url'] ?>">
                            <img src="<?php echo $item["image_url_new"]?>" alt="<?php echo $item['title'] ?>" />
                        </a>
                    </td>
                    <td class="small-cart-name">
                        <ul class="small-cart-list">
                            <li>
                                <a href="<?php echo SITE."/".(isset($item['category_url'])?$item['category_url']:'catalog/').$item['product_url'] ?>"><?php echo $item['title'] ?></a>
                                <span class="property"><?php echo $item['property_html'] ?> </span>
                            </li>
                            <li class="qty">
                                <?php echo $item['countInCart'] ?> шт. =
                                <span><?php echo $item['priceInCart'] ?></span>
                            </li>
                        </ul>
                    </td>
                    <td class="small-cart-remove">
                        <a href="#" class="deleteItemFromCart" title="Удалить" data-delete-item-id="<?php echo $item['id'] ?>"  data-property="<?php echo $item['property'] ?>"  data-variant="<?php echo $item['variantId'] ?>">&#215;</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php } else{ ?>
                <?php } ?>
            </table>
        </div>
        <ul class="total sum-list">
            <li class="total-sum">Всего:
                <strong><?php echo $data['cartData']['cart_price_wc'] ?></strong>
            </li>
        </ul>
        <div class="j-modal__cart__footer">
            <span class="j-modal__cart__close">Продолжить покупки</span>
            <a class="default-btn" href="<?php echo SITE ?>/order">Оформить</a>
        </div>
    </div>
</div>
<?php }; ?>
<div class="mg-desktop-cart">
    <div class="cart">
        <div class="cart-inner">
            <a href="<?php echo SITE ?>/order" class="small-cart-icon">
                <svg class="icon icon--cart"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--cart"></use></svg>
                <ul class="cart-list">
                    <li>
                        <span class="countsht"><?php echo $data['cartCount']?$data['cartCount']:0 ?></span>
                    </li>
                    <li class="cart-qty">
                        <span class="pricesht"><?php echo $data['cartPrice']?$data['cartPrice']:0 ?></span> <i><?php echo $data['currency']; ?></i>
                    </li>
                </ul>
            </a>
        </div>
    </div>
</div>