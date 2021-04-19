let video_index = 1;

function onimgTagclick(e) {
    // const t = "body #" + $(e).attr("id"),
        s = $(e).attr("data-video"),
        a = $(e).attr("data-vid");
    $(e).after(
        `<video class="js_fluidplayer stratus-customvideo thumb_crsp_video_tag" id="video-${a}-${video_index}" onplay="update_media_views(event,'video',${a})" controls  preload="auto" style="width:100%;height:100%;" width="100%" height="100%">
            <source src="${s}" type="video/mp4">
            <source src="${s}" type="video/webm">
        </video>`
    ),
        //$("#hide_play_img" + a).hide(),
        $(e).closest('div').find(".play_video_icon").hide();
        $(e).hide();
        
        video_index++;
}
$(document).ready(function () {
    $(window).scroll(function () {
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

    $('#copy_button').click(function () {
        var _this = $(this);
        navigator.clipboard.writeText(_this.data('clipboard-text')).then(function () {
            $('.copy-feedback').show();
            setTimeout(function () {
                $('.copy-feedback').hide();
            }, 1000);
            
          });
    })
})
