$(function () {
    const body = $('body');
    const button = $('#to_top');
    const searchToggle = $('#header-search-toggle');
    const searchForm = $('#header-search-form');
    const searchInput = $('#header-search-input');

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

    if (searchToggle.length && searchForm.length) {
        searchToggle.on('click', function () {
            const expanded = $(this).attr('aria-expanded') === 'true';
            $(this).attr('aria-expanded', expanded ? 'false' : 'true');
            searchForm.toggleClass('is-open', !expanded);

            if (!expanded && searchInput.length) {
                window.setTimeout(function () {
                    searchInput.trigger('focus');
                }, 120);
            }
        });

        $(document).on('click', function (event) {
            if (!$(event.target).closest('.header-search').length) {
                searchForm.removeClass('is-open');
                searchToggle.attr('aria-expanded', 'false');
            }
        });
    }

    const animatePageEnter = function () {
        const targets = $('.container').children(':not(script):not(style)');

        targets.each(function (index) {
            $(this)
                .addClass('page-enter-item')
                .css('animation-delay', (index * 0.05) + 's');
        });
    };

    animatePageEnter();

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
