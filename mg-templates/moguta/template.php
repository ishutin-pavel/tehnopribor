<!DOCTYPE html>
<html lang="ru">
    <head>
        <!--[if lte IE 9]>
        <link  rel="stylesheet" type="text/css" href="<?php echo PATH_SITE_TEMPLATE ?>/css/reject/reject.css" />
        <link  rel="stylesheet" type="text/css" href="<?php echo PATH_SITE_TEMPLATE ?>/css/style-ie9.css" />
        <script  src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
        <![endif]-->
      <meta name="yandex-verification" content="d48f86c3be80cfe5" />
  <link rel="icon" href="https://техно-прибор.рф/favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="https://техно-прибор.рф/favicon.ico" type="image/x-icon">
		<?php mgMeta("meta","css","jquery"); ?>		
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php mgAddMeta('<script src="'.PATH_SITE_TEMPLATE.'/js/owl.carousel.min.js"></script>'); ?>
        <?php mgAddMeta('<script src="'.PATH_SITE_TEMPLATE.'/js/jquery.hoverIntent.js"></script>'); ?>
        <?php mgAddMeta('<script src="'.PATH_SITE_TEMPLATE.'/js/script.js"></script>'); ?>

    </head>
    <body class="l-body <?php MG::addBodyClass('l-'); ?>" <?php backgroundSite(); ?>>
      <script type="text/javascript" src="https://formdesigner.ru/js/widgets/popup.js"></script>
<script type="text/javascript">
FDPopup.init(118963, {
    hideCloseBtn: false,
    disableOnMobileDevice: false,
    host: "formdesigner.ru",
    overlay: {
        background: "#000000",
        opacity: 0.5
    },
    async: true,
    disableAfterSubmit: {
        enabled: true,
        expires: 86400
    },
    expires: -100
});
</script>
      <script type="text/javascript" src="https://formdesigner.ru/js/widgets/popup.js"></script>
<script type="text/javascript">
FDPopup.init(117399, {
    hideCloseBtn: false,
    disableOnMobileDevice: false,
    host: "formdesigner.ru",
    overlay: {
        background: "#000000",
        opacity: 0.6
    },
    type: "unload",
    async: true,
    expires: 0
});
</script>
      <script src="//code.jivosite.com/widget.js" data-jv-id="N0DmOQLoeq" async></script>
      <script type="text/javascript">
var _FDFeedBack = {
    formId: 117399,
    text: "Подбор конвектора",
    background: "#ff0505",
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
      
      
      
        <?php layout('icons'); ?> <!-- svg иконки -->		
		<?php layout('ie9'); ?>
        <header class="l-header">
            <div class="l-header__top">
                <div class="l-container">
                    <div class="l-row">
                        <div class="l-col min-0--3 min-1025--6">
                            <div class="l-header__block">
                                <?php layout('topmenu'); ?> <!-- меню страниц -->
                            </div>
                        </div>
                        <div class="lcg l-col min-0--9 min-1025--6">
                            <?php layout('language_select'); ?> <!-- блок выбора языка -->
                            <?php layout('currency_select'); ?> <!-- блок выбора валюты -->
                            <div class="l-header__block group">
                             <!--  <?php layout('group'); ?>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="l-header__middle">
                <div class="l-container">
                    <div class="l-row min-0--align-center">
                        <div class="l-col min-0--12 min-768--3">
                            <a  itemprop="logo" class="c-logo" href="<?php echo SITE ?>"><?php echo mgLogo(); ?></a> <!-- логотип -->
                        </div>
                        <div class="l-col min-0--12 min-768--9">
                            <div class="min-0--flex min-0--justify-center min-768--justify-end">
                                <div class="l-header__block">
                                    <?php layout('contacts'); ?> <!-- контакты -->
                                </div>

                                <?php if (MG::getSetting('printCompareButton') == 'true') { ?>
                                    <div class="l-header__block max-767--hide">
                                        <?php layout('compare'); ?> <!-- сравнение товаров -->
                                    </div>
                                <?php } ?>

                                <div class="l-header__block">
                                    <?php layout('auth'); ?> <!-- авторизация на сайте -->
                                </div>
                                <div class="l-header__block">
                                    <?php layout('cart'); ?> <!-- корзина -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="l-header__bottom">
                <div class="l-container">
                    <div class="l-row">
                        <div class="l-col min-0--5 min-768--3">
                            <div class="l-header__block">
                                <?php layout('leftmenu'); ?> <!-- меню каталога -->
                            </div>
                        </div>
                        <div class="l-col min-0--7 min-768--9">
                            <div class="l-header__block">
                                <?php layout('search'); ?> <!-- поиск -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>     <Br>
    <?php if (URL::isSection(null)): ?>    
    <?php if (class_exists('SliderAction')): ?>
            [slider-action]
    <?php endif; ?>
    <?php endif ?>
        <main class="l-main">
            <div class="l-container">
                <div class="l-row">
                    <div class="l-col min-12--hide min-1025--3 l-main__left">
                    <?php if (class_exists('dailyProduct')): ?>
                        <div class="daily-wrapper">
                                [daily-product]
                        </div>
                    <?php endif; ?>    
                        <div class="c-filter" id="c-filter" onClick="">
                            <div class="c-filter__content">
                                <?php filterCatalogMoguta(); ?> <!-- фильтр -->
                            </div>
                        </div>
                        <?php if (function_exists(sliderProducts)): ?>
                        <div class="mg-advise">
                                <div class="mg-advise__title"><?php echo lang('recommend'); ?></div>
                                    [slider-products countProduct="4" countPrint="1"]
                                 <!-- cлайдер товаров -->
                            </div>  
                        <?php endif ?>                     
                        <?php if (class_exists('PluginNews')): ?>
                        [news-anons count="3"]
                        <?php endif; ?>  
                    </div>
                    <div class="l-col min-0--12 min-1025--9 l-main__right">
                        <div class="l-row">
                            <div class="l-col min-0--12">
                                <?php if (class_exists('BreadCrumbs')&&MG::get('controller')=="controllers_catalog"): ?>[brcr]<?php endif; ?>
                                <?php layout('content'); ?> <!-- содержимое страниц -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="l-footer">
            <div class="l-container">
                <div class="l-row">
                    <div class="l-col min-0--12 min-768--5">
                        <div class="c-copyright">2018 год. Все права защищены.</div> <!-- копирайт -->
                    </div>
                    <div class="l-col min-0--12 min-768--2 min-0--flex min-0--align-center min-0--justify-center max-767--order-end">
                        <div class="c-widget">
                            <?php layout('widget'); ?> <!-- счетчик -->
                        </div>
                    </div>
                    <div class="l-col min-0--12 min-768--5">
                        <div class="c-copyright c-copyright__moguta"><?php copyrightMoguta(); ?>ИП Верхова Анастасия Дмитриевна, ИНН 245727395295, ОГРНИН 317237500056512</div> <!-- копирайт -->
                    </div>
                </div>
            </div>
        </footer>
		
        <?php if (class_exists('BackRing')): ?>[back-ring]<?php endif; ?> <!-- обратный звонок -->		

		<?php mgMeta("js"); ?>
    </body>
</html>