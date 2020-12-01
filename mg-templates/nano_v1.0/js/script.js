function filterLabelChecked() {
    // Filter. Label:checked
    if ($('.mg-filter-prop-checkbox').is(':checked')) {

        $('.mg-filter-prop-checkbox:checked').parent().addClass('j-active');

    }
}

$(document).ready(function() {

    // Body FadeIn
    $('body').fadeTo(200, 1);



    // Filter. Disabled css
    $('link[href*="filter.css"]').prop('disabled', true);
    // Filter. Add class .active for filter label
    $('.mg-filter-item label').on('click', function() {
        $(this).toggleClass('j-active');
    });



    // Filter. Label:checked
    filterLabelChecked();
    AJAX_CALLBACK_FILTER = [{
        callback: 'filterLabelChecked',
        param: null
    }, ]



    // Add active link
    $('nav').find('ul').parent('li').addClass('parent');
    $('nav a').each(function() {
        var location = window.location.href;
        var link = this.href;
        if (location == link) {
            $(this).parent('li').addClass('active');
        }
    });



    // Owl-Carousel
    $('#j-carousel-1, #j-carousel-2, #j-carousel-3').owlCarousel({
        items: 4,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [1024, 3],
        itemsTablet: [800, 2],
        itemsMobile: [480, 1],
        navigation: true,
        navigationText: false,
        pagination: false
    });



    // Tabs
    $('.j-tabs__nav a').click(function(event) {
        event.preventDefault();

        var parent = $(this).parent();
        parent.addClass('current');
        parent.siblings().removeClass('current');

        var tab = $(this).attr("href");
        $('.j-tabs__content').not(tab).hide();
        $(tab).show();

    });



    // Scroll to Top
    $('.j-to-top').on('click', function() {

        $('html, body').animate({
            scrollTop: 0
        }, 500, 'swing');

    });



    // If no .j-product
    if ($('.catalog .j-product').length == 0) {
        $('.j-catalog__header, .filter-form').hide();
        $('body').removeClass('j-accordion-menu--hidden');
        $('.catalog').append('<div class="j-alert__default">Нет товаров</div>');
    }



    // Switcher grid/list
    function rememberView() {
        var className = localStorage['class'];
        //localStorage.clear();

        $('.j-switcher button[data-type="' + className + '"]').addClass('active');
        $('.products-wrapper.catalog').addClass(className);

        $('.j-switcher button').on('click', function(e) {
            e.preventDefault();
            var currentView = $(this).data('type');
            var product = $('.products-wrapper.catalog');
            product.removeClass('list grid');
            product.addClass(currentView);
            $('.j-switcher button').removeClass('active');
            $(this).addClass('active');
            localStorage.setItem('class', $(this).data('type'));
            return false;
        });
    }
    rememberView();


	
	// in-stock & out-stock
	$('.j-variant tr:not(.j-variant__none)').click(function(event) {
		$('.j-product__out-stock').addClass('j-product__in-stock').removeClass('j-product__out-stock').text('Есть в наличии');
	});

	$('.j-variant tr.j-variant__none').click(function(event) {	
		$('.j-product__in-stock').addClass('j-product__out-stock').removeClass('j-product__in-stock').text('Нет в наличии');
	});


}); // end ready