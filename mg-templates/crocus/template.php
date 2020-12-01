<!DOCTYPE html>
<html lang="ru" prefix="http://ogp.me/ns#">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700&amp;subset=cyrillic" rel="stylesheet">
        <?php mgMeta(); ?>
        <?php mgAddMeta('<script type="text/javascript" src="' . PATH_SITE_TEMPLATE . '/js/owl.carousel.min.js"></script>'); ?>
        <?php mgAddMeta('<script type="text/javascript" src="' . PATH_SITE_TEMPLATE . '/js/scripts.js"></script>'); ?>
    </head>
    <body class="
        <?php if(MG::get('isStaticPage')){echo 'j-page__static';} ?>
        <?php if(URL::isSection(null)){echo 'j-page__index';} else {echo 'j-page__noindex';} ?>
        <?php if(MG::get('controller')=="controllers_order"    && !isSearch()) {echo 'j-page__order'   ;} ?>
        <?php if(MG::get('controller')=="controllers_product"  && !isSearch()) {echo 'j-page__product' ;} ?>
        <?php if(MG::get('controller')=="controllers_catalog"  && !isSearch()) {echo 'j-page__catalog' ;} ?>
        <?php if(MG::get('controller')=="controllers_personal" && !isSearch()) {echo 'j-page__personal';} ?>"
        <?php backgroundSite(); ?>>
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    width: 130px;
    position: fixed;
    z-index: 1;
    top: 50%;
    left: 10px;
     overflow-x: hidden;
    padding: 8px 0;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #2196F3;
    display: block;
}

.sidenav a:hover {
    color: #064579;
}

.main {
    margin-left: 140px; /* Same width as the sidebar + left position in px */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>



<div class="sidenav">
  <a href="https://www.instagram.com/techno_pribor/" target="_blank"><img src="/inst.png"></a>
  <a href="whatsapp://send?phone=+79676451510" target="_blank"><img src="/what.png"></a>
  <a href="skype:russianrecords?chat" target="_blank"><img src="/vi.png"></a>

</div>

  
        <?php layout('svg'); ?>
<script type="text/javascript">
var _FDFeedBack = {
    formId: 118963,
    text: "Подбор конвектора",
    background: "#b50505",
    color: "#ffffff",
    fontSize: "18px",
    borderRadius: 5,
    buttonSide: "right",
    buttonAlign: "center",
    popup: {
        hideCloseBtn: false,
        host: "formdesigner.ru",
        overlay: {
            background: "#000000",
            opacity: 0.5
        }
    }
};
(function() {
    var fd = document.createElement("script"); fd.type = "text/javascript"; fd.async = true;
    fd.src = (document.location.protocol == "https:" ? "https:" : "http:")+"//formdesigner.ru/js/widgets/feedback.js";
   var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(fd, s);
})();
</script>
        <!-- header - start -->
<script type="text/javascript" src="https://formdesigner.ru/js/widgets/popup.js"></script>
<script type="text/javascript">
FDPopup.init(118963, {
    hideCloseBtn: false,
    disableOnMobileDevice: true,
    host: "formdesigner.ru",
    overlay: {
        background: "#000000",
        opacity: 0.5
    },
    type: "timeout",
    timeout: 40000,
    async: true,
    expires: 0
});
</script>
        <header class="j-header">
            <div class="j-container">

                <a class="j-block__logo" href="<?php echo SITE ?>">
                    <?php echo mgLogo(); ?>
                </a>

                <div class="j-block__search">
                    <?php layout('search'); ?>
                </div>

                <div class="j-block__contact">
                    <div class="j-contact">
                        <div class="j-contact__visible">
                            <div class="j-contact__visible__img">
                                <svg class="icon icon--phone"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--phone"></use></svg>
                            </div>
                            <a class="j-contact__visible__phone" href="tel:+79649449421">8 (964) 944 94 21</a>
                            <div class="j-contact__visible__arrow">
                                <svg class="icon icon--arrow-down"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-down"></use></svg>
                            </div>
                            <div class="j-contact__click"></div>
                        </div>
                        <ul class="j-contact__dropdown">
                            <li class="j-contact__dropdown__li">
                                <div class="j-contact__dropdown__img">
                             
                                </div>
                                <a class="j-contact__dropdown__a" href="tel:+78622590102">8 (862) 259-01-02</a>
                                <div class="j-contact__dropdown__title">Офис</div>
                            </li>
                            <li class="j-contact__dropdown__li">
                                <div class="j-contact__dropdown__img">
                                </div>
                                <a class="j-contact__dropdown__a" href="tel:+79649449421">8 (964) 944-94-21</a>
                                <div class="j-contact__dropdown__title">Инженер</div>
                            </li>
                          
                            <li class="j-contact__dropdown__li">
                                <div class="j-contact__worktime">
                                    <div class="j-contact__worktime__title">График работы</div>
                                    <ul class="j-contact__worktime__ul">
                                        <li class="j-contact__worktime__li">
                                            <span class="j-contact__worktime__day">Будние дни</span>
                                            <span class="j-contact__worktime__time">с 9:00 до 21:00</span>
                                        </li>
                                        <li class="j-contact__worktime__li">
                                            <span class="j-contact__worktime__day">Суббота</span>
                                            <span class="j-contact__worktime__time">с 10:00 до 18:00</span>
                                        </li>
                                        <li class="j-contact__worktime__li">
                                            <span class="j-contact__worktime__day">Воскресенье</span>
                                            <span class="j-contact__worktime__time">выходной</span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <?php if(class_exists('Callme')): ?>[call-me]<?php endif; ?>

                </div>

                <div class="j-block__cart">
                    <?php layout('cart'); ?>
                </div>

            </div>
        </header>
        <!-- header - end -->

        <!-- main - start -->
        <main class="j-main">
            <!-- aside - start -->
            <aside class="j-main__aside">
                <div class="j-block__catalog">
                    <?php layout('leftmenu'); ?>
                </div>

                <!-- payment and delivery - start 
                <div class="j-left-block">
                    <div class="j-tab__nav">
                        <a href="#tab-payment" class="j-tab__nav__a active">Оплата</a>
                        <a href="#tab-delivery" class="j-tab__nav__a">Доставка</a>
                    </div>

                    <div id="tab-payment" class="j-tab__content active">
                        <div class="j-payment">
                            <div class="j-payment__item" title="MasterCard">
                                <svg class="icon icon--master-card"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--master-card"></use></svg>
                            </div>
                            <div class="j-payment__item" title="Visa">
                                <svg class="icon icon--visa"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--visa"></use></svg>
                            </div>
                            <div class="j-payment__item" title="Сбербанк">
                                <svg class="icon icon--sberbank"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--sberbank"></use></svg>
                            </div>
                            <div class="j-payment__item" title="Webmoney">
                                <svg class="icon icon--webmoney"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--webmoney"></use></svg>
                            </div>
                            <div class="j-payment__item" title="Яндекс Деньги">
                                <svg class="icon icon--yadexmoney"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--yadexmoney"></use></svg>
                            </div>
                            <div class="j-payment__item" title="Qiwi">
                                <svg class="icon icon--qiwi"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--qiwi"></use></svg>
                            </div>
                        </div>
                    </div>

                    <div id="tab-delivery" class="j-tab__content">
                        <ul class="j-typography__list">
                            
                            <li>Деловые линии</li>
                     
                        </ul>

                    </div>

                    <a class="j-payment__link" href="<?php echo SITE ?>/dostavka">
                        Подробнее
                        <svg class="icon icon--arrow-right"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-right"></use></svg>
                    </a>
                </div>
                <!-- payment and delivery - end -->

                <!-- [news-anons count="2"] -->

                <!-- vkontakte - start 
                <div class="j-left-block">
                    <script type="text/javascript" src="//vk.com/js/api/openapi.js?136"></script>
                    <div id="vk_groups"></div>
                    <script type="text/javascript">
                    VK.Widgets.Group("vk_groups", {mode: 3, width: "235"}, 20003922);
                    </script>
                </div>
                <!-- vkontakte - end -->

                <?php if(class_exists('JSLastView')): ?>[js-lastview]<?php endif; ?>

            </aside>
            <!-- aside - end -->

            <!-- article - start -->
            <div class="j-main__article">

                <!-- article top - start -->
                <div class="j-main__article__top">

                    <div class="j-block__mobile">
                        <a href="#j-offcanvas__leftmenu" class="j-button j-button__mobile">
                            Каталог товаров
                        </a>
                        <a href="#j-offcanvas__topmenu" class="j-button j-button__mobile">
                            Меню
                        </a>
                    </div>

                    <div class="j-block__menu">
                        <?php layout('topmenu'); ?>
                    </div>

                    <div class="j-block__login">
                        <?php layout('auth'); ?>
                    </div>
                </div>
                <!-- article top - end -->

                <!-- index page - start -->
                <?php if(URL::isSection(null)): ?>

                    <!-- slider - start 
                    <div class="j-carousel j-carousel__slider">
                        <a href="<?php echo SITE ?>/">
                            <img src="<?php echo PATH_SITE_TEMPLATE ?>/images/slider/1.jpg" alt="img">
                        </a>
                        <a href="<?php echo SITE ?>/">
                            <img src="<?php echo PATH_SITE_TEMPLATE ?>/images/slider/2.jpg" alt="img">
                        </a>
                      
              		</div>
                    <!-- slider - end -->

                    <?php if(class_exists('JSSlider')): ?>[jsslider id=1]<?php endif; ?>

                    <!-- figure - start 
                    <div class="j-figure">
                        <a href="#" class="j-figure__item">
                            <div class="j-figure__icon">
                                <svg class="icon icon--24"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--24"></use></svg>
                            </div>
                            <div class="j-figure__text">
                                <span>Бесплатная</span>
                                круглосуточная доставка
                            </div>
                        </a>
                        <a href="#" class="j-figure__item">
                            <div class="j-figure__icon">
                                <svg class="icon icon--photocamera"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--photocamera"></use></svg>
                            </div>
                            <div class="j-figure__text">
                                <span>Фото</span>
                                получателя в подарок
                            </div>
                        </a>
                        <a href="#" class="j-figure__item">
                            <div class="j-figure__icon">
                                <svg class="icon icon--gift"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--gift"></use></svg>
                            </div>
                            <div class="j-figure__text">
                                <span>Добавить</span>
                                Конфеты <br>
                                Шампанское <br>
                                Плюшевого мишку
                            </div>
                        </a>
                    </div>
                    <!-- figure - end -->

                    <?php if(class_exists('JSShowCatalog')): ?>[jsshowcatalog]<?php endif; ?>

                <?php endif; ?>
                <!-- index page - end -->

                <div class="j-static">
                    <?php if(class_exists('JSNav')): ?>[jsnav]<?php endif; ?>

                    <?php layout('content'); ?>
                </div>

            </div>
            <!-- article - end -->
        </main>
        <!-- main - end -->

        <!-- footer - start -->
        <footer class="j-footer">
            <div class="j-container">
                <div class="j-footer__row">
                    <div class="j-footer__column">
                        &copy; <?php echo date('Y') ?> год. Магазин «Techno»
                    </div>
                    <div class="j-footer__column j-footer__phone">
                        <svg class="icon icon--phone"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--phone"></use></svg>
                        <a href="tel:+79649449421">8 (964) 944-94-21</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer - end -->

        <div class="j-to-top">Наверх</div>

        <?php layout('compare'); ?>

        <?php layout('widget'); ?>

    </body>
</html>