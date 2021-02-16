$(document).ready(function () {
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 100) {
            $("body").addClass("scrolled");
        } else {
            $("body").removeClass("scrolled");
        }
    });

    $(".navbar-toggler").click(function () {
        $('body').toggleClass('toggler_show');
    });
})
