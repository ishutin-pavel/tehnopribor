<?php mgSEO($data); ?>
<?php mgAddMeta('<link type="text/css" href="'.SCRIPT.'standard/css/datepicker.css" rel="stylesheet"/>'); ?>

<?php
switch($data['status']){
case 1: ?>
<div class="j-alert__red">Доступ пользователя к личному кабинету блокирован. Обратитесь к администратору</div>


<?php break;
case 2: ?>
<div class="j-alert__red">Пользователь не активирован! Для активации пользователя перейдите по ссылке указанной в письме, полученом Вами при регистрации <br/> Запрос повторной активации</div>
<form action = "<?php echo SITE ?>/registration" method = "POST">
    <input type="text" name="activateEmail" value="Email">
    <input type = "submit" class="enter-btn default-btn" name="reActivate" value = "Отправить запрос">
</form>


<?php break;
case 3: $userInfo = $data['userInfo'] ?>

<h1 class="new-products-title">Личный кабинет пользователя "<?php echo $userInfo->name ?>"</h1>

<?php if($data['message']): ?> <div class="j-alert__green mg-success"><?php echo $data['message'] ?></div> <?php endif; ?>
<?php if($data['error']): ?> <div class="j-alert__red mg-error"><?php echo $data['error'] ?></div> <?php endif; ?>


<div class="j-personal j-tabs">
    <ul class="j-tabs__nav">
        <li class="current"><a href="#tab1">Данные</a></li>
        <li><a href="#tab2">Пароль</a></li>
        <li><a href="#tab3">История</a></li>
    </ul>

    <!-- Личные данные -->
    <div class="j-tabs__content" id="tab1">
        <form action = "<?php echo SITE ?>/personal" method = "POST">
            <ul class="form-list">
                <li>Email: <span class="normal-text"><?php echo $userInfo->email ?></span></li>
                <li>Дата регистрации: <span class="normal-text"><?php echo date('d.m.Y', strtotime($userInfo->date_add)) ?></span></li>
            </ul>
            <ul class="form-list">
                <li><input type="text" name="name" value="<?php echo $userInfo->name ?>" placeholder="Имя"></li>
                <li><input type="text" name="sname" value="<?php echo $userInfo->sname ?>" placeholder="Фамилия"></li>
                <li><input class="birthday" type="text" name="birthday" value="<?php echo $userInfo->birthday?date('d.m.Y', strtotime($userInfo->birthday)):'' ?>" placeholder="День рождения"></li>
                <li><input type="text" name="phone" value="<?php echo $userInfo->phone ?>" placeholder="Телефон"></li>
                <li><textarea class="address-area" name="address" placeholder="Адрес доставки"><?php echo $userInfo->address ?></textarea></li>
                <li>
                    <select name="customer">
                        <?php $selected = $userInfo->inn?'selected':''; ?>
                        <option value="fiz">Физическое лицо</option>
                        <option value="yur" <?php echo $selected ?>>Юридическое лицо</option>
                    </select>
                </li>
            </ul>

            <?php if(!$userInfo->inn){ $style = 'style="display:none"'; } ?>

            <ul class="form-list yur-field" <?php echo $style ?>>
                <li><input type="text" name="nameyur" value="<?php echo $userInfo->nameyur ?>" placeholder="Юр. лицо"></li>
                <li><input type="text" name="adress" value="<?php echo $userInfo->adress ?>" placeholder="Юр. адрес"></li>
                <li><input type="text" name="inn" value="<?php echo $userInfo->inn ?>" placeholder="ИНН"></li>
                <li><input type="text" name="kpp" value="<?php echo $userInfo->kpp ?>" placeholder="КПП"></li>
                <li><input type="text" name="bank" value="<?php echo $userInfo->bank ?>" placeholder="Банк"></li>
                <li><input type="text" name="bik" value="<?php echo $userInfo->bik ?>" placeholder="БИК"></li>
                <li><input type="text" name="ks" value="<?php echo $userInfo->ks ?>" placeholder="К/Сч"></li>
                <li><input type="text" name="rs" value="<?php echo $userInfo->rs ?>" placeholder="Р/Сч"></li>
            </ul>
            <button type="submit" class="save-btn default-btn" name="userData" value ="save">Сохранить</button>
        </form>
    </div><!-- /Личные данные -->

    <!-- Сменить пароль -->
    <div class="j-tabs__content" id="tab2">
        <form action = "<?php echo SITE ?>/personal" method = "POST">
            <ul class="form-list">
                <li><input type="password" name="pass" placeholder="Старый парол*"></li>
                <li><input type="password" name="newPass" placeholder="Новый пароль(от 5 символов)*"></li>
                <li><input type="password" name="pass2" placeholder="Повторите новый пароль*"></li>
            </ul>
            <button type="submit" class="save-btn default-btn" name="chengePass" value = "save">Сохранить</button>
        </form>
    </div>

    <!-- История заказов -->
    <div class="j-tabs__content" id="tab3">
        <?php if($data['orderInfo']): ?>
            <?php $currencyShort = MG::getSetting('currencyShort'); $currencyShopIso = MG::getSetting('currencyShopIso'); foreach($data['orderInfo'] as $order): ?>
            
            <div class="j-history    order-history" id="<?php echo $order['id'] ?>">
                <div class="j-history__header    order-number">
                    <span class="j-history__header__number">№ <?php echo $order['number']!=''?$order['number']:$order['id'] ?></span> 
                    <span class="j-history__header__date"> <?php echo date('d.m.Y', strtotime($order['add_date'])) ?></span> 
                    <span class="j-history__header__status    <?php echo $data['assocStatusClass'][$order['status_id']]?>"><?php echo $lang[$order['string_status_id']] ?></span>
                </div>


                <div class="j-history__body">
                    <table class="j-history__table     status-table">
                        <?php $perOrder['currency_iso'] = $perOrder['currency_iso']?$perOrder['currency_iso']:$currencyShopIso; $perCurrencyShort = MG::getSetting('currency'); $perOrders = unserialize(stripslashes($order['order_content'])); ?>
                        <?php if(!empty($perOrders)) foreach($perOrders as $perOrder): ?>
                        <?php $perCurrencyShort = $currencyShort[$perOrder['currency_iso']]?$currencyShort[$perOrder['currency_iso']]:MG::getSetting('currency'); $coupon = $perOrder['coupon']; ?>
                        <tr>
                            <td>
                                <a href="<?php echo $perOrder['url'] ?>" target="_blank"><?php echo $perOrder['name'] ?></a>
                                <br/>
                                <?php echo htmlspecialchars_decode(str_replace('&amp;', '&', $perOrder['property'])) ?>
                            </td>
                            <td><?php echo $perOrder['code'] ?></td>
                            <td><?php echo MG::numberFormat(($perOrder['price'])).'  '.$perCurrencyShort; ?></td>
                            <td><?php echo $perOrder['count'] ?> шт.</td>
                            <td><?php echo MG::numberFormat(($perOrder['price']*$perOrder['count'])).'  '.$perCurrencyShort; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                    <div class="j-history__bottom">
                        <div class="j-history__bottom__left">

                            <?php if($order['status_id']==2||$order['status_id']==5): ?>
                                <a href="<?php echo SITE.'/order?getFileToOrder='.$order['id'] ?>" class="download-link">Скачать электронные товары</a>
                                <?php endif; ?>
                                <?php $yurInfo = unserialize(stripslashes($order['yur_info'])); if(!empty($yurInfo['inn'])): ?>
                                <a href="<?php echo SITE.'/order?getOrderPdf='.$order['id'] ?>" class="download-link">Скачать счет в PDF</a>
                            <?php endif; ?>

                            <?php if($order['status_id']<2): ?>
                            <div class="order-settings">
                                <button class="j-history__button    close-order" id="<?php echo $order['id'] ?>" date="<?php echo date('d.m.Y', strtotime($order['add_date'])) ?>" data-number="<?php echo $order['number']!=''?$order['number']:$order['id']; ?>">
                                    Отменить заказ
                                </button>
                                    <br/>
                                <button class="j-history__button    change-payment" id="<?php echo $order['id'] ?>" date="<?php echo date('d.m.Y', strtotime($order['add_date'])) ?>" data-number="<?php echo $order['number']!=''?$order['number']:$order['id']; ?>">
                                    Изменить способ оплаты
                                </button>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($order['comment'])): ?>
                                <div class="j-history__manager     manager-information">
                                    <div class="manager-information-comm"><?php echo $order['comment']; ?> </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="j-history__bottom__right     order-total">
                            <ul class="total-list">
                                <?php if($coupon): ?>
                                <li>
                                    <span>Купон:</span> 
                                    <span title="<?php echo $coupon ?>"><?php echo MG::textMore($coupon, 20) ?></span>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <span>Итого:</span> 
                                    <span class="total-summ"><?php echo MG::numberFormat($order['summ']).'  '.$perCurrencyShort ?></span>
                                </li>
                                <li>
                                    <span>Оплата:</span>
                                    <span class="paymen-name-to-history"><?php echo $order['name'] ?></span>
                                </li>
                                <?php if($order['description']): ?>
                                <li>
                                    <span>Доставка:</span> 
                                    <span><?php echo $order['description'] ?></span>
                                </li>
                                <?php if($order['date_delivery']): ?>
                                <li>
                                    <span>Дата доставки:</span> 
                                    <span><?php echo date('d.m.Y', strtotime($order['date_delivery'])) ?></span>
                                </li>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php $totSumm = $order['summ']+$order['delivery_cost']; ?>
                                <?php if($order['delivery_cost']): ?>
                                    <li>
                                        <span>Стоимость доставки:</span> 
                                        <span class="delivery-price"><?php echo MG::numberFormat($order['delivery_cost']).'  '.$perCurrencyShort; ?></span>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <span>Всего к оплате:</span> 
                                    <span class="total-order-summ"><?php echo MG::numberFormat($totSumm).'  '.$perCurrencyShort; ?></span>
                                </li>
                            </ul>

                            <?php if(2>$order['status_id']): ?>
                            <form  method="POST" action="<?php echo SITE ?>/order">
                                <input type="hidden" name="orderID" value="<?php echo $order['id'] ?>">
                                <input type="hidden" name="orderSumm" value="<?php echo $order['summ'] ?>">
                                <input type="hidden" name="paymentId" value="<?php echo $order['payment_id'] ?>">
                                <?php if($order['payment_id']!=3): ?>
                                <button type="submit" name="pay" value="go" class="default-btn">Оплатить заказ</button>
                                <?php endif; ?>
                            </form>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>


            <!-- Закрытие заказа -->
            <div class="j-modal" id="openModal">
                <div class="j-modal__content">
                    <div class="j-modal__content__close"></div>
                    <p class="order-number">Причина закрытия заказа <br /> № <strong name="orderId" class="orderId"></strong> от <span class="orderDate"></span></p>
                    <div class="error j-alert__red" style="display: none">Укажите причину отказа</div>
                    <textarea class="reason-text" type="text" name="comment_textarea"></textarea>
                    <button type="submit" class="close-order-btn">Закрыть</button>
                </div>
            </div>

            
            <!-- Смена способа оплаты заказа -->
            <div class="j-modal" id="changePayment">
                <div class="j-modal__content">
                    <div class="j-modal__content__close"></div>
                    <p class="order-number">Выберите способ оплаты <br /> № <strong name="orderId" class="orderId"></strong> от <span class="orderDate"></span></p>
                    <select class="order-changer-pay">
                        <?php 
                            foreach($data['paymentList'] as $item){ if(empty($item)){ continue; }
                            $delivery = json_decode($item['deliveryMethod']);
                            if($delivery->{$order['delivery_id']}){ echo "<option value='".$item['id']."'>".$item['name'].'</option>'; }
                            else{ echo "<option value='".$item['id']."'>".$item['name'].'</option>';  }  }
                        ?>
                    </select>
                    <button type="submit" class="change-payment-btn">Применить</button>
                </div>
            </div>
        <?php else: ?>
            <div class="j-alert__default">У вас нет заказов</div>
        <?php endif ?>
        <?php echo $data["pagination"]; ?>
    </div><!-- /История заказов -->
</div>

<?php break; default : ?>
    <div class="j-alert__red">Личный кабинет доступен только авторизованым пользователям!</div>
<?php } ?>




<script>
$(document).ready(function() {
    
    // Аккордион
    $('.j-history__header').on('click', function() {
        $(this).siblings('.j-history__body').slideToggle('fast');
        $(this).parent().toggleClass('j-history--open');
    });


    // Модальное окно
    $('.close-order').on('click', function() { $('#openModal').addClass('j-modal--open'); });
    $('.change-payment').on('click', function() { $('#changePayment').addClass('j-modal--open'); });
    $('.close-order, .change-payment').on('click', function() {
        $('.reason-text').val('');
        $('strong.orderId').attr('data-id-order', $(this).attr('id'));
        $('strong[class=orderId]').text($(this).attr('data-number'));
        $('span[class=orderDate]').text($(this).attr('date'));
    });


    // Закрытие заказа
    $('.close-order-btn').on('click', function() {
        var id = $(this).parents('#openModal').find('strong[name=orderId]').data('id-order');
        var comm = $('.reason-text').val();
        if (comm == '') {
            $('.error').slideDown();
            return false;
        }
        $.ajax({
            type: "POST",
            url: mgBaseDir + "/personal",
            data: {
                delOK: "OK",
                delID: id,
                comment: comm
            },
            cache: false,
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('.order-history#' + id + ' .order-number .order-status span').text(response.orderStatus);
                    $('.order-history#' + id + ' .order-number .order-status span').attr('class', 'dont-paid');
                    $('p#order-comm').html(response.comment);
                    $('.order-history#' + id + ' .order-settings').remove();
                    $('.j-modal').removeClass('j-modal--open');
                } 
            }
        });
    });


    // Смена способа оплаты заказа
    $('.change-payment-btn').on('click', function() {
        var paymetId = $(this).parents('#changePayment').find('.order-changer-pay').val();
        var paymetName = $(this).parents('#changePayment').find('.order-changer-pay option:selected').text();
        var id = $(this).parents('#changePayment').find('strong.orderId').attr('data-id-order');
        $('.order-history#' + id).find('input[name=paymentId]').val(paymetId);
        $('.order-history#' + id).find('.paymen-name-to-history').text(paymetName);
        $.ajax({
            type: "POST",
            url: mgBaseDir + "/personal",
            data: {
                changePaymentId: paymetId,
                orderId: id,
            },
            cache: false,
            dataType: 'json',
            success: function(response) {
                var deliveryPrice = $('.order-history#' + id).find('.delivery-price').text()
                deliveryPrice.replace(' <?php echo $perCurrencyShort;?>');
                $('.order-history#' + id).find('.total-summ').text(response.summ + ' <?php echo $perCurrencyShort;?>');
                var orderSumm = response.summ;
                if (deliveryPrice) {
                    orderSumm += parseFloat(deliveryPrice);
                }
                $('.order-history#' + id).find('.total-order-summ').text(orderSumm + ' <?php echo $perCurrencyShort;?>');
                $('.j-modal').removeClass('j-modal--open');
            }
        });
    });


    // Выбор физ./ юр. лицо
    $('.form-list select[name="customer"]').change(function() {
        if ($(this).val() == 'fiz') {
            $('.form-list.yur-field').hide();
        }
        if ($(this).val() == 'yur') {
            $('.form-list.yur-field').show();
        }
    });


    // День Рождения
    $('.birthday').datepicker({
        dateFormat: "dd.mm.yy",
        changeMonth: true,
        changeYear: true,
        yearRange: '-90:+0'
    });

    $(".ui-autocomplete").css('z-index', '1000');
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: '&#x3c;Пред',
        nextText: 'След&#x3e;',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
        ],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
            'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'
        ],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);

    var uri = window.location.href;
    uri = uri.split('?');
    if(uri.length>1) {
        uri = uri[1];
        uri = uri.replace(/page=[0-9]+/g, '');
        console.log(uri.length);
        if(uri.length==0) {
            $('.j-tabs__nav li').removeClass('current');
            $('.j-tabs__nav a[href="#tab3"]').parents('li').addClass('current');
            //console.log($('.j-tabs__content j-content[id^="tab"]'));
            $('[id^="tab"]').css('display','none');
            $('#tab3').css('display', 'block');
        }
    }


}); // end ready
</script>