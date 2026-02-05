$(function () {
    const button = $('#to_top');

    if (!button.length) {
        return;
    }

    const toggleButton = function () {
        if ($(window).scrollTop() > 30) {
            button.stop(true, true).fadeIn(150);
        } else {
            button.stop(true, true).fadeOut(150);
        }
    };

    button.hide();
    toggleButton();

    $(window).on('scroll', toggleButton);

    button.on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });
});
