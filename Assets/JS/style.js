(function ($) {
    'use strict';

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();

        const scrollTopBtn = $('<button/>', {
            class: 'btn btn-success position-fixed rounded-circle shadow back-to-top',
            html: '<i class="fa fa-arrow-up"></i>'
        }).css({
            bottom: '1.5rem',
            right: '1.5rem',
            display: 'none',
            width: '3rem',
            height: '3rem',
            'z-index': 1030
        }).appendTo('body');

        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 300) {
                scrollTopBtn.fadeIn();
            } else {
                scrollTopBtn.fadeOut();
            }
        });

        scrollTopBtn.on('click', function () {
            $('html, body').animate({ scrollTop: 0 }, 600);
        });
    });
})(jQuery);
