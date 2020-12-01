$(document).ready(function() {

    // window resize
    // ------------------------------------------------------------
    // $(window).on('resize', function() {

    //     location.reload();

    // });



    // body fade
    // ------------------------------------------------------------
    $('body').fadeTo(200, 1);



    // add class
    // ------------------------------------------------------------
    $('.addToCart, .product-info, .refreshFilter, .filter-btn').addClass('j-button');



    // add active link
    // ------------------------------------------------------------
    $('nav').find('ul').parent('li').addClass('j-parent');

    $('nav a').each(function() {

        var location = window.location.href;

        var link = this.href;

        if (location == link) {

            $(this).addClass('active');

            $(this).parent('.j-leftmenu__li').addClass('j-leftmenu__li--active');
        }

    });



    // radio
    // ------------------------------------------------------------
    $('[type="radio"]').closest('label').addClass('j-radio');



    // checkbox
    // ------------------------------------------------------------
    $('[type="checkbox"]').closest('label').addClass('j-checkbox');

    $('[type="checkbox"]:not(.property-form [type="checkbox"])').on('click', function() {

        var $this = $(this);

        $($this).closest('label').toggleClass('active');

    });



    // filter
    // ------------------------------------------------------------
    $('link[href*="filter.css"]').prop('disabled', true);

    $('.mg-filter-item h4').on('click', function() {

        var $this = $(this);

        $($this).parent('.mg-filter-item').toggleClass('mg-filter-item--active').siblings().removeClass('mg-filter-item--active');

    });

    $('.j-main').on('click', function() {

        $('.mg-filter-item').removeClass('mg-filter-item--active');

    });

    $('.mg-filter-item ul, .mg-filter-item h4').on('click', function(e) {

        e.stopPropagation();

    });

    // show/hide selected items
    $('.disabled-prop').removeClass('j-checkbox').closest('.mg-filter-item').addClass('mg-filter-item--hidden');

    $('.j-checkbox').closest('.mg-filter-item').addClass('mg-filter-item--visible');

    // mobile filter
    $('.j-filter-mobile').on('click', function() {

        $(this).toggleClass('j-filter-mobile--open');

        $('.filter-form').toggleClass('filter-form--open');

    });



    // no click to tel
    // ------------------------------------------------------------
    if ($(window).width() > 1024) {

        $('a[href^="tel"]').on('click', function(e) {

            e.preventDefault();

        });

    }



    // modal
    // ------------------------------------------------------------
    $('a[href^="#j-modal"]').on('click', function(e) {

        e.preventDefault();

        var id = $(this).attr('href');

        $(id).addClass('j-modal--open');

    });

    $('.j-modal:not(.j-modal__cart)').on('click', function() {

        $('.j-modal').removeClass('j-modal--open');

    });

    $('.j-modal__content:not(.j-modal__cart__content)').on('click', function(e) {

        e.stopPropagation();

    });



    // tabs
    // ------------------------------------------------------------
    $('.j-tab__nav__a').on('click', function(e) {

        e.preventDefault();

        var $this = $(this);

        $this.addClass('active');

        $this.siblings().removeClass('active');

        var tab = $(this).attr('href');

        $this.closest('.j-tab__nav').siblings('.j-tab__content').not(tab).hide();

        $(tab).fadeIn();

    });



    // contact
    // ------------------------------------------------------------
    $('.j-contact__click').on('click', function() {

        $(this).hide();

    });



    // offcanvas
    // ------------------------------------------------------------
    $('a[href^="#j-offcanvas"]').on('click', function(e) {

        e.preventDefault();

        var id = $(this).attr('href');

        $(id).addClass('j-offcanvas--open');

    });

    $('.j-offcanvas').on('click', function() {

        $('.j-offcanvas').removeClass('j-offcanvas--open');
    });

    $('.j-offcanvas__content').on('click', function(e) {

        e.stopPropagation();

    });



    // accordion offcanvas menu
    // ------------------------------------------------------------
    if ($(window).width() <= 1024) {

        $('.j-offcanvas__a').each(function() {

            var location = window.location.href;

            var link = this.href;

            if (location == link) {

                $(this).parents('.j-offcanvas__li').children('.j-offcanvas__ul').show();

                $(this).parents('.j-offcanvas__li').addClass('j-offcanvas__li--open');

            }

        });

        $('.j-offcanvas__ul').siblings('.j-offcanvas__a:not(.j-topmenu__a)').addClass('j-offcanvas__a--inactive');

        $('.j-offcanvas__a--inactive').on('click', function(e) {

            var AccordionMenu = $(this).parent('.j-offcanvas__li');

            if (AccordionMenu.hasClass('j-offcanvas__li--open')) {

                AccordionMenu.removeClass('j-offcanvas__li--open');

                AccordionMenu.children().find('.j-offcanvas__li').removeClass('j-offcanvas__li--open');

                AccordionMenu.find('.j-offcanvas__ul').slideUp();

            } else {

                AccordionMenu.addClass('j-offcanvas__li--open');

                AccordionMenu.children('.j-offcanvas__ul').slideDown();

                AccordionMenu.siblings('.j-offcanvas__li').children('.j-offcanvas__ul').slideUp();

                AccordionMenu.siblings('.j-offcanvas__li').removeClass('j-offcanvas__li--open');

                AccordionMenu.siblings('.j-offcanvas__li').find('.j-offcanvas__li').removeClass('j-offcanvas__li--open');

                AccordionMenu.siblings('.j-offcanvas__li').find('.j-offcanvas__ul').slideUp();
            }

            e.preventDefault();
        });

    }



    // carousel
    // ------------------------------------------------------------
    $('.j-carousel__slideset').owlCarousel({
        navigationText: [
            '<div class="j-carousel__button j-carousel__button__left"><svg class="icon icon--arrow-left"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-left"></use></svg></div>',
            '<div class="j-carousel__button j-carousel__button__right"><svg class="icon icon--arrow-right"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-right"></use></svg></div>'
        ],
        items: 4,
        itemsTablet: [800, 3],
        navigation: true,
        pagination: false,
        addClassActive: true

    });



    // slider
    // ------------------------------------------------------------
    $('.j-carousel__slider').owlCarousel({
        navigationText: [
            '<div class="j-carousel__button j-carousel__button__left"><svg class="icon icon--arrow-left"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-left"></use></svg></div>',
            '<div class="j-carousel__button j-carousel__button__right"><svg class="icon icon--arrow-right"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--arrow-right"></use></svg></div>'
        ],
        singleItem: true,
        navigation: true,
        pagination: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        // autoPlay: true,
        transitionStyle: "fadeUp"

    });


    // switcher grid/list
    // ------------------------------------------------------------
    function rememberView() {
        var className = localStorage['class'];
        //localStorage.clear();

        $('.j-switcher__item[data-type="' + className + '"]').addClass('j-switcher__item--active').siblings().removeClass('j-switcher__item--active');

        $('.j-goods__catalog').addClass(className);

        $('.j-switcher__item').on('click', function() {

            var currentView = $(this).data('type');

            var product = $('.j-goods__catalog');

            product.removeClass('j-goods__grid j-goods__list');

            product.addClass(currentView);

            $('.j-switcher__item').removeClass('j-switcher__item--active');

            $(this).addClass('j-switcher__item--active');

            localStorage.setItem('class', $(this).data('type'));

            return false;
        });
    }

    rememberView();



    // select
    // ------------------------------------------------------------
    $('.j-variant__selected').on('click', function() {

        var $this = $(this).closest('.j-variant');

        $($this).toggleClass('j-variant--toggle');

        $($this).closest('.j-goods__item').siblings().find('.j-variant').removeClass('j-variant--toggle');

    });
    $('.j-variant__row').on('click', function() {

        var $this = $(this);

        var text = $(this).find('.j-variant__text').text();

        var selected = $(this).closest('.j-variant').find('.j-variant__selected__text');

        $(selected).empty();

        $(selected).text(text);

        $($this).closest('.j-variant').removeClass('j-variant--toggle');

        $($this).addClass('j-variant__row--active').siblings().removeClass('j-variant__row--active');

    });



    // if no variant
    // ------------------------------------------------------------
    $('.j-variant__row').on('click', function() {

        var $this = $(this).closest('.j-variant').siblings('.buy-container');

        if ($(this).hasClass('j-variant__none')) {

            $($this).hide();

            $('.j-product__message').show();

        } else {

            $($this).show();

            $('.j-product__message').hide();

        }
    });



    // in-stock & out-stock
    // ------------------------------------------------------------
    $('.j-variant tr:not(.j-variant__none)').on('click', function() {
        $('.j-product__stock--out').addClass('j-product__stock--in').removeClass('j-product__stock--out').text('Есть в наличии');
    });

    $('.j-variant tr.j-variant__none').on('click', function() {
        $('.j-product__stock--in').addClass('j-product__stock--out').removeClass('j-product__stock--in').text('Нет в наличии');
    });



    // disabled compare.css
    // ------------------------------------------------------------
    $('link[href*="compare.css"]').prop('disabled', true);



    // add class to compare
    // ------------------------------------------------------------
    if ($('.j-compare__item').length > 0) {

        $('.j-compare').addClass('j-compare--added');

    } else {

        $('.j-compare').removeClass('j-compare--added');

        $('.j-compare__top').hide();

    }



    // check
    // ------------------------------------------------------------
    if ($('.j-goods__item').length == 0) {
        $('.j-view, .j-filter-mobile, .j-seo').hide();
        $('.j-goods__catalog').append('<div class="j-no-data"><svg class="icon icon--no-data"><use class="symbol" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon--no-data"></use></svg> <div class="j-no-data__text">Нет товаров</div></div>');
    }

    if ($('.mg-filter-item').length == 0) {
        $('.filter-form').hide();
    }



    // accordion
    // ------------------------------------------------------------
    /*$('.accordion__header').on('click', function() {

        $(this).parent().toggleClass('active');

        $(this).siblings('.accordion__content').slideToggle();

    });*/



    // to top
    // ------------------------------------------------------------
    $(window).scroll(function() {

        var a = $(window).scrollTop();

        a >= 120 ? $('.j-to-top').addClass('j-to-top--show') : $('.j-to-top').removeClass('j-to-top--show');

    });

    $('.j-to-top').on('click', function() {

        $('html, body').animate({

            scrollTop: 0

        }, 500, 'swing');

    });


}); // end ready