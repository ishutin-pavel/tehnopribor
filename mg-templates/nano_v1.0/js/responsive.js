$(document).ready(function() {


    // Catalog menu
    $('#j-catalog__button').on('click', function() {
        $('#j-catalog__nav.j-offcanvas').addClass('j-offcanvas--open');
    });


    // Page menu
    $('#j-page__button').on('click', function() {
        $('#j-page__nav.j-offcanvas').addClass('j-offcanvas--open');
    });
    $('#j-page__nav .level-1.parent > a').on('click', function(event) {
        event.preventDefault();
    });

    /*if ($(window).width() <= 1024) {
        $('#j-page__nav .level-1.parent > a').on('click', function(event) {
            event.preventDefault();
        });
    }*/


    // No click to tel
    if ($(window).width() > 1024) {
        $('a[href^="tel"]').on('click', function(event) {
            event.preventDefault();
        });
    }


    // Hidden offcanvas
    $('.j-offcanvas').on('click', function() {
        $('.j-offcanvas').removeClass('j-offcanvas--open');
    });
    $('.j-offcanvas__menu').on('click', function(event) {
        event.stopPropagation();
    });

});