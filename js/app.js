$(function () {
    const body = $('body');
    const button = $('#to_top');
    $('a[href]').on('click', function (event) {
        const href = $(this).attr('href');
        const isHash = !href || href.indexOf('#') === 0;
        const isJs = href && href.indexOf('javascript:') === 0;
        const isDownload = $(this).attr('download') !== undefined;
        const isModifiedClick = event.metaKey || event.ctrlKey || event.shiftKey || event.altKey || event.which === 2;
        const isExternal = this.hostname && this.hostname !== window.location.hostname;

        if (isHash || isJs || isDownload || isModifiedClick || this.target || isExternal) {
            return;
        }

        event.preventDefault();
        body.addClass('page-loading');
        window.setTimeout(function () {
            window.location.href = href;
        }, 180);
    });

    $('a[href]').on('click', function (event) {
        const href = $(this).attr('href');
        const isHash = !href || href.indexOf('#') === 0;
        const isJs = href && href.indexOf('javascript:') === 0;
        const isDownload = $(this).attr('download') !== undefined;
        const isModifiedClick = event.metaKey || event.ctrlKey || event.shiftKey || event.altKey || event.which === 2;
        const isExternal = this.hostname && this.hostname !== window.location.hostname;

        if (isHash || isJs || isDownload || isModifiedClick || this.target || isExternal) {
            return;
        }

        event.preventDefault();
        body.addClass('page-loading');
        window.setTimeout(function () {
            window.location.href = href;
        }, 180);
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
