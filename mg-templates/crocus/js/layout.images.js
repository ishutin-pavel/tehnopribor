$(document).ready(function() {


    // big image
    // -----------------------------------------------------------
    $('.main-product-slide').bxSlider({
        pagerCustom: '.slides-inner',
        controls: false,
        mode: 'fade',
        useCSS: false
    });


    // change big image
    // ------------------------------------------------------------
    var $that = '';

    $(".mg-peview-foto").on('click', function() {

        var that = this;

        $(".main-product-slide").hide(0, function() {

            $(this).attr("src", $(that).attr("src")).attr("data-large", $(that).attr("data-large")).show(0);

        });

    });


    // slideset
    // -----------------------------------------------------------
    $('.j-images__slider').owlCarousel({
        navigationText: [
            '<div class="j-carousel__button j-carousel__button__left"><svg class="icon icon--arrow-left"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-left"></use></svg></div>',
            '<div class="j-carousel__button j-carousel__button__right"><svg class="icon icon--arrow-right"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-right"></use></svg></div>'
        ],
        items: 3,
        itemsTablet: [800, 3],
        itemsMobile: [700, 2],
        navigation: true,
        pagination: false,
        addClassActive: true

    });


    // add active class in slideset
    // -----------------------------------------------------------
    $('.slides-inner a').click(function() {
        $(this).each(function() {
            $('.slides-inner a').removeClass('active');
            $(this).addClass('active');
        });
    });


    // magnify
    // ------------------------------------------------------------
    try {
        $('.main-product-slide .mg-product-image').each(function() {

            $(this).magnify({

                lensLeft: 310,

                lensTop: -5,

            });

        });

    } catch (err) {}


    // fancybox
    // ------------------------------------------------------------
    $('.fancy-modal').fancybox({
        'overlayShow': false,
        tpl: {
            next: '<a title="Вперед" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
            prev: '<a title="Назад" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
        }
    });


    // fancybox open
    // ------------------------------------------------------------
    $('body').on('click', '.tracker', function() {

        $('.product-details-image').each(function() {

            if ($(this).css('display') == 'block' || $(this).css('display') == 'list-item') {

                $(this).find('.fancy-modal').click();

            }

        });

    });

});