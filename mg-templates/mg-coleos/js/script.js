$(document).ready(function () {
    function rememberView(){
        var className = localStorage["class"];
        //localStorage.clear();

        if(className === undefined){
            $(".btn-group .view-btn:first-child").addClass("active");
            localStorage.setItem('class', 'grid');
        }

        else{
            $('.btn-group .view-btn[data-type="' + className + '"]').addClass("active");
            $('.products-wrapper.catalog').addClass(className);
        }

        $(".btn-group .view-btn").on("click", function(e){
            e.preventDefault();
            var currentView = $(this).data('type');
            var product = $('.products-wrapper.catalog');
            product.removeClass("list grid");
            product.addClass(currentView);
            $('.btn-group .view-btn').removeClass("active");
            $(this).addClass("active");
            localStorage.setItem('class', $(this).data('type'));
            return false;
        });
    }

    rememberView();

    $(".products-wrapper .product-wrapper").each(function(){
        $(this).find(".addToCompare").clone().appendTo($(this).find(".product-image"));
        $(this).find(".buy-container .addToCompare").remove();
    });

    $('.mg-filter-item h4').on("click", function(){
        $(this).parents(".mg-filter-item").toggleClass("closed");
    });

    $(".addToCompare").on("click", function(){
        $(this).addClass("active").html("&#10004; В сравнении");
    });

    function tabs(containers, tabs, tabsItems) {
        var tabContainers = $(containers);
        tabContainers.hide().filter(':first').show();

        $(tabs).click(function (e) {
            e.preventDefault();
            tabContainers.hide();
            tabContainers.filter(this.hash).fadeIn("fast");
            $(tabsItems).removeClass('active');
            $(this).parent().addClass('active');
            return false;
        }).filter(':first').click();
    }

    tabs('.product-tabs-container > div', '.product-tabs li a', '.product-tabs li');

    var owlView = $(".mg-recently-viewed-slider, .recent-products, .m-p-products-slider-start");

    owlView.owlCarousel({
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [800, 3], // betweem 900px and 601px
        itemsTablet: [650, 2], //2 items between 600 and 0
        itemsMobile: [500, 1],
        navigation: true,
        mouseDrag: false
    });

    /*Mobile menu*/
    $(".mobile-categories h2").on("click", function () {
        $(this).toggleClass("open-menu");
        $(this).next(".cat-list").slideToggle("fast");
    });

    $(".cat-list li .slider_btn, .mobile-top-panel .top-menu-list li .slider_btn").on("click", function () {
        $(this).toggleClass("opened");
        $(this).parent().find(".sub_menu:first").slideToggle("fast");
    });

    $(".show-menu-toggle").on("click", function () {
        var effect = 'slide';

        // Set the options for the effect type chosen
        var options = {direction: 'left'};

        // Set the duration (default: 400 milliseconds)
        var duration = 'fast';

        $("body").toggleClass("open-menu");
        $('.mobile-top-menu').toggle(effect, options, duration);
    });

    /*Fix mobile top menu position if login admin*/
    if ($("body").hasClass("admin-on-site")) {
        $("body").find(".mobile-top-panel").addClass("position-fix");
    }

});