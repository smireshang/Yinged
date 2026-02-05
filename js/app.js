$(function () {
    const button = $('#to_top');

    $('body').addClass('page-ready');

    $('a[href]').on('click', function () {
        const href = $(this).attr('href');
        const isInternal = href && href.indexOf('#') !== 0 && href.indexOf('javascript:') !== 0 && !this.target && this.hostname === window.location.hostname;

        if (isInternal) {
            $('body').removeClass('page-ready').addClass('page-leaving');
        }
    });

    if (!button.length) {
        return;
    }

    const toggleButton = function () {
        if ($(window).scrollTop() > 200) {
            button.stop(true, true).fadeIn(200);
        } else {
            button.stop(true, true).fadeOut(200);
        }
    };

    button.hide();
    toggleButton();

    $(window).on('scroll', toggleButton);

    button.on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 500);
        return false;
    });
});
