$(document).ready(function() {



    // всплывающая корзина
    // ------------------------------------------------------------
    $('.j-cart__close').on('click', function() {
        $('.j-modal__cart').removeClass('j-modal--open');
    });



    // добавление класса для телефонов и планшетов
    // ------------------------------------------------------------
    if ($('.j-cart__table tr').length) {
        $('.j-cart__visible').addClass('j-cart__visible--open');
    } else {
        $('.j-cart__visible').removeClass('j-cart__visible--open');
        $('.j-cart__dropdown').hide();
    }



    // заполнение корзины аяксом
    // ------------------------------------------------------------
    $('body').on('click', '.addToCart', function() {

        var productId = $(this).data('item-id');
        transferEffect(productId, $(this), '.product-wrapper');

        if ($(this).parents('.property-form').length) {
            var request = $(this).parents('.property-form').formSerialize();
        } else {
            var request = 'inCartProductId=' + $(this).data('item-id') + "&amount_input=1";
        }

        $.ajax({
            type: "POST",
            url: mgBaseDir + "/cart",
            data: "updateCart=1&" + request,
            dataType: "json",
            cache: false,
            success: function(response) {
                $('.j-modal__cart').addClass('j-modal--open');
                $('.j-cart__visible').addClass('j-cart__visible--open');
                $('.j-cart__dropdown').show();

                if ('success' == response.status) {
                    dataSmalCart = '';
                    response.data.dataCart.forEach(printSmalCartData);
                    $('.small-cart-table').html(dataSmalCart);
                    $('.total .total-sum strong').text(response.data.cart_price_wc);
                    $('.pricesht').text(response.data.cart_price);
                    $('.countsht').text(response.data.cart_count);
                }
            }
        });

        return false;
    });



    // удаление вещи из корзины аяксом
    // ------------------------------------------------------------
    $('body').on('click', '.deleteItemFromCart', function() {

        var $this = $(this);
        var itemId = $this.data('delete-item-id');
        var property = $this.data('property');
        var $vari = $this.data('variant');
        $.ajax({
            type: "POST",
            url: mgBaseDir + "/cart",
            data: {
                action: "cart", // название действия в пользовательском класса Ajaxuser
                delFromCart: 1,
                itemId: itemId,
                property: property,
                variantId: $vari
            },
            dataType: "json",
            cache: false,
            success: function(response) {
                if ('success' == response.status) {
                    var table = $('.deleteItemFromCart[data-property="' + property + '"][data-delete-item-id="' + itemId + '"]').parents('table');
                    $('.deleteItemFromCart[data-property="' + property + '"][data-delete-item-id="' + itemId + '"]').parents('tr').remove();
                    var i = 1;
                    table.find('.index').each(function() {
                        $(this).text(i++);
                    });

                    $('.total-sum strong').text(response.data.cart_price_wc);
                    response.data.cart_price = response.data.cart_price ? response.data.cart_price : 0;
                    response.data.cart_count = response.data.cart_count ? response.data.cart_count : 0;
                    $('.pricesht').text(response.data.cart_price);
                    $('.countsht').text(response.data.cart_count);
                    $('.cart-table .total-sum-cell strong').text(response.data.cart_price_wc);

                    if ($('.small-cart-table tbody tr').length == 0) {
                        $('.j-modal__cart').removeClass('j-modal--open');
                        $('.j-cart__visible').removeClass('j-cart__visible--open');
                        $('.j-cart__dropdown').hide();

                        $('.product-cart').hide();
                        $('.empty-cart-block').show();
                        $('.payment-option').remove();
                    };
                }
            }
        });
        return false;
    });



    // строит содержимое маленькой корзины в  выпадащем блоке
    // ------------------------------------------------------------
    function printSmalCartData(element, index, array) {

        dataSmalCart += '<tr class="j-cart__table__tr">\
            <td>\
                <a class="j-cart__table__img" href="' + mgBaseDir + '/' + ((element.category_url || element.category_url == '') ? element.category_url : 'catalog/') + element.product_url + '"><img src="' + element.image_url_new + '" alt="' + element.title + '" alt="" /></a>\
            </td>\
            <td class="j-cart__table__name">\
                <ul class="small-cart-list">\
                    <li><a class="j-cart__table__name__link" href="' + mgBaseDir + '/' + ((element.category_url || element.category_url == '') ? element.category_url : 'catalog/') + element.product_url + '">' + element.title + '</a><span class="property">' + element.property_html + '</span></li>\
                    <li class="j-cart__table__name__qty">' + element.countInCart + ' <span>&nbsp; шт. = ' + element.priceInCart + '</span></li>\
                </ul>\
            </td>\
            <td class="j-cart__table__remove"><a href="#" class="deleteItemFromCart" title="Удалить" data-delete-item-id="' + element.id + '" data-property="' + element.property + '">&#215;</a></td>\
        </tr>';
    }


}); // end ready