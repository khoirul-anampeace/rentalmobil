$(function () {
    var shrinkHeader = 100;
    $(window).scroll(function () {
        var scroll = getCurrentScroll();
        if (scroll >= shrinkHeader) {
            $('.navsmooth').addClass('shrink');
            $('#scrolltop').addClass('show-scroll');
            $('.link-white').addClass('link-black');
            $('.link-black').removeClass('link-white');
            $('.navbutton-white').addClass('navbutton-blue')
            $('.navbutton-blue').removeClass('navbutton-white')
            console.info('Bisa')
        } else {
            $('.navsmooth').removeClass('shrink');
            $('#scrolltop').removeClass('show-scroll');
            $('.link-black').addClass('link-white');
            $('.link-white').removeClass('link-black');
            $('.navbutton-blue').addClass('navbutton-white')
            $('.navbutton-white').removeClass('navbutton-blue')
            console.info('gak Bisa')
        }
    });

    function getCurrentScroll() {
        return window.pageYOffset;
    }
});

// rupiah