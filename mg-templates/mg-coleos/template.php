<?php
/**
 * Файл template.php является каркасом шаблона, содержит основную верстку шаблона.
 *
 * В этом файле доступны следующие данные:
 * <code>
 *   $data['cartCount'] => Количество товаров в корзине.
 *   $data['cartPrice'] => Общая стоимость товаров в корзине.
 *   $data['currency'] => Валюта магазина.
 *   $data['cartData'] => Содержание корзины.
 *   $data['categoryList'] => Список категорий.
 *   $data['content']  => Содержание страницы.
 *   $data['menu'] => Ггоризонтальное меню.
 *   $data['thisUser'] => Информация об авторизованном пользователе.
 * </code>
 *
 *   Получить подробную информацию о каждом элементе массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <php viewData($data['cartData']); ?>
 *   </code>
 *
 *   Вывести содержание элементов массива $data, можно вставив следующую строку кода в верстку файла.
 *   <code>
 *    <php echo $data['cartData']; ?>
 *   </code>
 *
 *   Также доступны вставки, для вывода верстки из папки layout
 *   <code>
 *      <?php layout('cart'); ?>      // корзина
 *      <?php layout('auth'); ?>      // личный кабинет
 *      <?php layout('widget'); ?>    // виджиеы и коды счетчиков
 *      <?php layout('compare'); ?>   // информер товаров для сравнения
 *      <?php layout('content'); ?>   // содержание открытой страницы
 *      <?php layout('leftmenu'); ?>  // левое меню с категориями
 *      <?php layout('topmenu'); ?>   // верхнее горизонтаьное меню
 *      <?php layout('contacts'); ?>  // контакты в шапке
 *      <?php layout('search'); ?>    // форма для поиска
 *   </code>
 * @author Авдеев Марк <mark-avdeev@mail.ru>
 * @package moguta.cms
 * @subpackage Views
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <?php mgMeta(); ?>
    <link href="<?php echo PATH_SITE_TEMPLATE ?>/css/mobile.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="<?php echo PATH_SITE_TEMPLATE ?>/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo PATH_SITE_TEMPLATE ?>/js/script.js"></script>

</head>
<body <?php backgroundSite(); ?>>
<div class="wrapper<?php echo isIndex() ? ' main-page' : ''; ?>">

    <!-- плагин "прокрутка страницы вверх" -->
    <?php if (class_exists('ScrollTop')): ?>
        [scroll-top]
    <?php endif; ?>
    <!-- плагин "прокрутка страницы вверх" -->

    <!--Вывод авторизации-->
    <div class="top-auth-block">
        <div class="main-row">
            <?php layout('auth'); ?>
        </div>
    </div>
    <!--Вывод авторизации-->

    <div class="main-row">
        <!--Шапка сайта-->
        <div class="header">
            <div class="main-row">

                <!--Вывод логотипа сайта-->
                <div class="logo-block">
                    <a href="<?php echo SITE ?>">
                        <?php echo mgLogo(); ?>
                    </a>
                </div>
                <!--Вывод логотипа сайта-->

                <!--Вывод корзины-->
                <?php layout('cart'); ?>
                <!--Вывод корзины-->

                <!--Вывод реквизитов сайта-->
                <?php layout('contacts'); ?>
                <!--Вывод реквизитов сайта-->

                <ul class="hit-menu">
                    <li><a href="<?php echo SITE ?>/group?type=latest"><i class="icon-star-full"></i> Новинки</a></li>
                    <li><a href="<?php echo SITE ?>/group?type=recommend"><i class="icon-bookmarks"></i> Рекомендуемые</a></li>
                    <li><a href="<?php echo SITE ?>/group?type=sale"><i class="icon-price-tags"></i> Распродажа</a></li>
                </ul>
                <div class="clear">&nbsp;</div>
            </div>
            <!--Вывод верхнего меню-->
            <div class="top-menu">
                <div class="main-row">
                    <?php layout('topmenu'); ?>
                    <!--Вывод аякс поиска-->
                    <?php layout('search'); ?>
                    <!--Вывод аякс поиска-->
                </div>
            </div>
            <!--Вывод верхнего меню-->
            <?php if (MG::getSetting('horizontMenu') == "true") : ?>
                <?php layout('horizontmenu'); ?>
            <?php endif; ?>
        </div>
        <!--Шапка сайта-->

        <!--Панель для мобильных устройств-->
        <div class="mobile-top-panel">
            <a href="javascript:void(0);" class="show-menu-toggle"></a>

            <div class="mobile-top-menu">
                <?php layout('topmenu'); ?>
            </div>
            <div class="mobile-cart">
                <a href="<?php echo SITE ?>/cart">
                    <div class="cart small-cart-icon">
                        <div class="cart-inner">
                            <ul class="cart-list">
                                <li class="cart-qty">
                                        <span class="countsht">
                                            <?php echo $data['cartCount'] ? $data['cartCount'] : 0 ?>
                                        </span> шт.
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!--Панель для мобильных устройств-->

        <!--Категории для мобильных устройств-->
        <div class="mobile-categories">
            <h2>Категории товаров <span class="mobile-white-arrow"></span></h2>
            <?php layout('leftmenu'); ?>
        </div>
        <!--Категории для мобильных устройств-->

        <div class="container">
            <!--Вывод горизонтального меню-->
            <?php if (MG::getSetting('horizontMenu') == "true") : ?>
                <?php if (MG::get('controller') == "controllers_catalog"): ?>
                    <div class="no-menu">
                        <?php filterCatalog(); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

<!--            --><?php //if (isCatalog()) : ?>
            <?php if (isCatalog() && !isSearch()) : ?>
            <!--/Вывод левого меню-->
            <div class="left-block">
                <div class="menu-block">
                    <h2 class="cat-title">Категории</h2>
                    <!-- Вывод левого меню-->
                    <?php layout('leftmenu'); ?>
                    <!--/Вывод левого меню-->
                </div>
                <?php filterCatalog(); ?>
                <?php if (class_exists('PluginNews')): ?>
                    [news-anons count="3"]
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!--Центральная часть сайта-->
            <div class="center">
                <?php if (URL::isSection(null)) : ?>
                    <?php if (class_exists('SliderAction')): ?>
                        [slider-action]
                    <?php endif; ?>
                <?php endif; ?>
                <?php layout('content'); ?>
            </div>
            <!--Центральная часть сайта-->
            <!--Подвал сайта-->
            <div class="footer">
                <div class="footer-top">
                    <div class="centered">
                        <div class="col">
                            <h2>Сайт</h2>
                            <?php echo MG::get('pages')->getFooterPagesUl(); ?>
                        </div>
                        <div class="col">
                            <h2>Продукция</h2>
                            <ul>
                                <?php echo MG::get('category')->getCategoryListUl(0, 'public', false); ?>
                            </ul>
                        </div>
                        <div class="col">
                            <h2>Мы принимаем оплату</h2>
                            <img src="<?php echo PATH_SITE_TEMPLATE ?>/images/payments.png"
                                 title="Мы принимаем оплату"
                                 alt="Мы принимаем оплату"/>
                        </div>
                        <div class="col">
                            <h2>Мы в соцсетях</h2>
                            <ul class="social-media">
                                <li><a href="javascript:void(0);" class="vk-icon" title="Vkontakte"><span></span></a></li>
                                <li><a href="javascript:void(0);" class="gplus-icon" title="Google+"><span></span></a></li>
                                <li><a href="javascript:void(0);" class="fb-icon" title="Facebook"><span></span></a></li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="centered">
                        <?php copyrightMoguta(); ?>
                        <div class="copyright"> <?php echo date('Y') ?> год. Все права защищены.</div>
                        <div class="widget">
                            <!--Коды счетчиков-->
                            <?php layout('widget'); ?>
                            <!--/Коды счетчиков-->
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <!--Подвал сайта-->
        </div>
    </div>

    <!--Индикатор сравнения товаров-->
    <?php layout('compare'); ?>
    <!--Индикатор сравнения товаров-->
</div>
</body>
</html>