$(document).ready(function() {

    // Open modal
    $('a[href^="#j-modal"]').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $(id).addClass('j-modal--open');
    });

    // Close modal
    $('.j-modal').on('click', function() {
        $('.j-modal').removeClass('j-modal--open');
    });

    $('.j-modal__content').on('click', function(event) {
        event.stopPropagation();
    });

    $('.j-modal__cart__close').on('click', function() {
        $('.j-modal__cart').removeClass('j-modal__cart--open');
    });

});