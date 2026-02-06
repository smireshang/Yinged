$(function () {
    const body = $('body');
    const button = $('#to_top');
    const searchToggle = $('#header-search-toggle');
    const searchForm = $('#header-search-form');
    const searchInput = $('#header-search-input');
    const lazyPlaceholder = 'https://pic1.imgdb.cn/item/69854565312b01a291a840cd.gif';
    const loadingMask = $('.content-loading-mask');

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

    const syncLoadingMask = function () {
        if (!loadingMask.length) {
            return;
        }

        const nav = $('.header-nav');
        const footer = $('.footer').first();
        if (!nav.length) {
            return;
        }

        const navBottom = nav.position().top + nav.outerHeight(true);
        let maskHeight = 0;

        if (footer.length) {
            const footerTop = footer.position().top;
            maskHeight = Math.max(footerTop - navBottom, 0);
        } else {
            const container = $('.container');
            maskHeight = Math.max(container.innerHeight() - navBottom, 0);
        }

        loadingMask.css({
            top: navBottom + 'px',
            height: maskHeight + 'px'
        });
    };

    const animatePageEnter = function () {
        const targets = $('.header-nav').nextAll(':not(script):not(style):not(.content-loading-mask)');

        targets.each(function (index) {
            $(this)
                .addClass('page-enter-item')
                .css('animation-delay', (index * 0.05) + 's');
        });
    };

    const setupLazyImages = function () {
        const images = $('.post-content img');

        if (!images.length) {
            return;
        }

        images.each(function () {
            const image = $(this);
            const src = image.attr('src');

            if (!src || src === lazyPlaceholder) {
                return;
            }

            image.attr('data-src', src);
            image.attr('src', lazyPlaceholder);
            image.attr('loading', 'lazy');
            image.addClass('lazy-image');
        });

        if (!('IntersectionObserver' in window)) {
            images.each(function () {
                const image = $(this);
                const source = image.attr('data-src');
                if (source) {
                    image.attr('src', source).removeAttr('data-src').addClass('is-loaded');
                }
            });
            return;
        }

        const observer = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }

                const image = $(entry.target);
                const source = image.attr('data-src');

                if (source) {
                    image.attr('src', source);
                    image.removeAttr('data-src');
                    image.on('load', function () {
                        image.addClass('is-loaded');
                    });
                }

                obs.unobserve(entry.target);
            });
        }, { rootMargin: '80px 0px' });

        images.each(function () {
            observer.observe(this);
        });
    };

    const setupPostImageEnhance = function () {
        const isPostDetail = $('.meta').length > 0 && $('.post-content').length > 0;
        if (!isPostDetail) {
            return;
        }

        const postImages = $('.post-content img');

        postImages.each(function () {
            const image = $(this);
            image.addClass('post-lightbox-image');

            const title = image.attr('title');
            if (title && !image.next('.image-title').length) {
                $('<div class="image-title"></div>').text(title).insertAfter(image);
            }
        });

        postImages.on('click', function () {
            const src = $(this).attr('data-src') || $(this).attr('src');
            const title = $(this).attr('title') || $(this).attr('alt') || '';
            if (!src) {
                return;
            }

            const overlay = $([
                '<div class="image-lightbox" role="dialog" aria-modal="true">',
                '  <button type="button" class="image-lightbox-close" aria-label="关闭">×</button>',
                '  <img src="' + src + '" alt="' + title.replace(/"/g, '&quot;') + '">',
                '</div>'
            ].join(''));

            $('body').append(overlay).addClass('lightbox-open');

            overlay.on('click', function (event) {
                if ($(event.target).is('.image-lightbox, .image-lightbox-close')) {
                    overlay.remove();
                    $('body').removeClass('lightbox-open');
                }
            });
        });

        $(document).on('keydown', function (event) {
            if (event.key === 'Escape') {
                $('.image-lightbox').remove();
                $('body').removeClass('lightbox-open');
            }
        });
    };

    syncLoadingMask();
    animatePageEnter();
    setupLazyImages();
    setupPostImageEnhance();

    $(window).on('resize', syncLoadingMask);

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
