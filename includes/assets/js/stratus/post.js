(api["comments/filter"] = ajax_path + "posts/filter.php?handle=comments"),
    (api["live/reaction"] = ajax_path + "live/reaction.php"),
    (api["posts/filter"] = ajax_path + "posts/filter.php?handle=posts"),
    (api["posts/post"] = ajax_path + "posts/post.php"),
    (api["posts/scraper"] = ajax_path + "posts/scraper.php"),
    (api["posts/lightbox"] = ajax_path + "posts/lightbox.php"),
    (api["posts/commentModal"] = ajax_path + "posts/commentModal.php"),
    (api["posts/comment"] = ajax_path + "posts/comment.php"),
    (api["posts/reaction"] = ajax_path + "posts/reaction.php"),
    (api["posts/edit"] = ajax_path + "posts/edit.php"),
    (api["posts/product"] = ajax_path + "posts/product.php"),
    (api["posts/story"] = ajax_path + "posts/story.php"),
    (api["albums/action"] = ajax_path + "albums/action.php"),
    (api["forums/delete"] = ajax_path + "forums/delete.php");
var voice_recording_process = !1,
    voice_recording_timer,
    voice_recording_object,
    voice_recording_stream,
    live_post_realtime_thread,
    live_post_realtime_process = !1,
    live_post_streaming_process = !1;
function end_live_post() {
    if (live_post_streaming_process) {
        live_post_streaming_process = !1;
        var e = $(".lightbox").data("live-post-id");
        $.post(api["live/reaction"], { do: "leave", post_id: e }, "json"), clearInterval(live_post_realtime_thread), (live_post_realtime_process = !1), $(window).off("beforeunload");
    }
}
function publisher_tab(e, t) {
    switch (
    ($(".publisher-meta").each(function () {
        $(this).data("meta") !== t && $(this).css("display", "none");
    }),
        "s-more" === t && $(".publisher .publisher-tools-tabs .s-more").click(),
        e.find('.js_publisher-tab[data-tab="' + t + '"]').toggleClass("active"),
        t)
    ) {
        case "photos":
            e.find('.js_publisher-tab[data-tab="album"]').hasClass("active") ||
                (e.find('.js_publisher-tab[data-tab="colored"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="voice_notes"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="gif"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="product"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="article"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="poll"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="video"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="audio"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="file"]').toggleClass("disabled"));
            break;
        case "album":
            e.find('.publisher-meta[data-meta="album"]').slideToggle("fast").find("input").focus(),
                e.find('.js_publisher-tab[data-tab="photos"]').hasClass("active") ||
                (e.find('.js_publisher-tab[data-tab="colored"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="voice_notes"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="gif"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="product"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="article"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="poll"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="video"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="audio"]').toggleClass("disabled"),
                    e.find('.js_publisher-tab[data-tab="file"]').toggleClass("disabled"));
            break;
        case "location":
            e.find('.publisher-meta[data-meta="location"]').slideToggle("fast").find("input").focus();
            break;
        case "colored":
            e.find('.publisher-meta[data-meta="colored"]').slideToggle("fast").find("input").focus(),
                e.find('.js_publisher-tab[data-tab="photos"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="album"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="voice_notes"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="gif"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="product"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="article"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="poll"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="video"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="audio"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="file"]').toggleClass("disabled");
            break;
        case "voice_notes":
            e.find('.publisher-meta[data-meta="voice_notes"]').slideToggle("fast"),
                e.find('.js_publisher-tab[data-tab="photos"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="album"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="colored"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="gif"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="product"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="article"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="poll"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="video"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="audio"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="file"]').toggleClass("disabled");
            break;
        case "gif":
            e.find('.publisher-meta[data-meta="gif"]').slideToggle("fast").find("input").focus(),
                e.find('.js_publisher-tab[data-tab="photos"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="album"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="colored"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="voice_notes"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="product"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="article"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="poll"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="video"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="audio"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="file"]').toggleClass("disabled");
            break;
        case "poll":
            e.find('.publisher-meta[data-meta="poll"]').slideToggle("fast"),
                e.find('.js_publisher-tab[data-tab="poll"]').hasClass("active")
                    ? e
                        .find("textarea")
                        .attr("placeholder", __["Ask something"] + "...")
                        .focus()
                    : e.find("textarea").attr("placeholder", e.find("textarea").data("init-placeholder")).focus(),
                e.find('.js_publisher-tab[data-tab="photos"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="album"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="colored"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="voice_notes"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="gif"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="product"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="article"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="video"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="audio"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="file"]').toggleClass("disabled");
            break;
        case "video":
            e.find('.js_publisher-tab[data-tab="photos"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="album"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="colored"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="voice_notes"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="gif"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="product"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="article"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="poll"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="audio"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="file"]').toggleClass("disabled");
            break;
        case "audio":
            e.find('.js_publisher-tab[data-tab="photos"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="album"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="colored"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="voice_notes"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="gif"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="product"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="article"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="poll"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="video"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="file"]').toggleClass("disabled");
            break;
        case "file":
            e.find('.js_publisher-tab[data-tab="photos"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="album"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="colored"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="voice_notes"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="gif"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="product"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="article"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="poll"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="video"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="audio"]').toggleClass("disabled");
            break;
        case "scraper":
            e.find('.js_publisher-tab[data-tab="photos"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="album"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="colored"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="voice_notes"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="gif"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="product"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="article"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="poll"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="video"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="audio"]').toggleClass("disabled"),
                e.find('.js_publisher-tab[data-tab="file"]').toggleClass("disabled");
            break;
        case "anonymous":
            e.find('.js_publisher-tab[data-tab="album"]').toggleClass("disabled"), e.find('.js_publisher-tab[data-tab="product"]').toggleClass("disabled"), e.find('.js_publisher-tab[data-tab="article"]').toggleClass("disabled");
    }
}
function update_media_views(media_type, media_id) {
    var _do = "video" == media_type ? "update_video_views" : "update_audio_views";
    setTimeout(function () {
        $.post(
            api["posts/reaction"],
            { do: _do, id: media_id },
            function (response) {
                response.callback ? eval(response.callback) : $("#" + media_type + "-" + media_id).removeAttr("onplay");
            },
            "json"
        );
    }, 5e3);
}
function initialize_scraper() {
    $(".js_publisher-scraper").trigger("keyup"), $("body").addClass("publisher-focus"), $(".publisher-slider").slideDown(), $(".publisher-emojis").fadeIn();
}
$(function () {
    if (($("body").on("click", ".add-story", function () { }), $("#stories").length > 0))
        var stories = new Zuck("stories", { skin: "Stratus", avatars: !0, list: !1, backNative: !0, previousTap: !0, autoFullScreen: !1, localStorage: !1, stories: $("#stories").data("json") });
    if (
        ($("body").on("focus", ".js_story-deleter", function (event) {
            event.stopPropagation(); 
            event.stopImmediatePropagation();

            var id = $(this).data("id");
            confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                $.post(
                    api["posts/story"],
                    { do: "delete" },
                    function (response) {
                        response.callback ? eval(response.callback) : window.location.reload();
                    },
                    "json"
                ).fail(function () {
                    modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                });
            });
        }),
            "index" == current_page && daytime_msg_enabled && $(".publisher").length > 0)
    ) {
        var now = new Date(),
            hours = now.getHours();
        hours >= 0 && hours < 12
            ? $(render_template("#message-morning")).insertAfter(".publisher").fadeIn()
            : hours >= 12 && hours < 18
                ? $(render_template("#message-afternoon")).insertAfter(".publisher").fadeIn()
                : (hours >= 18 || hours <= 24) && $(render_template("#message-evening")).insertAfter(".publisher").fadeIn();
    }
    var typing_timer;
    function _update_post(element) {
        var _this = $(element),
            post = _this.parents(".post"),
            id = post.data("id"),
            textarea = post.find("textarea.js_update-post"),
            message = textarea.val();
        is_empty(message) ||
            $.post(
                api["posts/edit"],
                { handle: "post", id: id, message: message },
                function (response) {
                    response.callback ? eval(response.callback) : (post.find(".post-edit").remove(), post.find(".post-replace").replaceWith(response.post).show());
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
    }
    function _comment(element) {
        var _this = $(element),
            comment = _this.parents(".comment"),
            commentarea = _this.parents(".comment-form"),
            stream = _this.parents(".post-comments").find(".js_comments"),
            handle = comment.data("handle"),
            id = comment.data("id"),
            textarea = comment.find("textarea.js_post-comment"),
            textareacomemnt = commentarea.find("textarea.js_post-comment"),
            message = textarea.val(),
            attachments = comment.find(".comment-attachments"),
            attachments_voice_notes = comment.find(".comment-voice-notes");
        if (comment.data("sending")) return !1;
        if (stream.data("filtering")) return !1;
        var photo = comment.data("photos"),
            voice_note = comment.data("voice_notes");
        (!is_empty(message) || photo || voice_note) &&
            (comment.data("sending", !0),
                $.post(
                    api["posts/comment"],
                    { handle: handle, id: id, message: message, photo: JSON.stringify(photo), voice_note: JSON.stringify(voice_note) },
                    function (response) {
                        if ((response.comment, response.callback)) eval(response.callback);
                        else {
                            var totalComments = response.comment_count.total_comment;
                            $(".lightbox #stratus_localhub_" + id).html('<i class="fa fa-comments"></i> ' + totalComments + " Comments"),
                                $("#stratus_localhub_" + id).html('<i class="fa fa-comments"></i> ' + totalComments + " Comments"),
                                textareacomemnt.val(""),
                                textarea.val(""),
                                textarea.attr("style", ""),
                                attachments.hide(),
                                attachments.find("li.item").remove(),
                                comment.removeData("photos"),
                                comment.find(".x-form-tools-attach").show(),
                                comment.removeData("voice_notes"),
                                comment.find(".x-form-tools-voice").show(),
                                attachments_voice_notes.hide(),
                                attachments_voice_notes.find(".js_voice-success-message").hide(),
                                attachments_voice_notes.find(".js_voice-start").show(),
                                stream.prepend(response.comment),
                                comment.removeData("sending");
                        }
                    },
                    "json"
                ).fail(function () {
                    modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                }));
    }
    async function _reply(element) {
        var today = Math.round((new Date()).getTime() / 1000);
        await new Promise(r => setTimeout(r, 100));
        var _this = $(element);
        var comment = _this.parents(".comment");
        var stream = comment.find(".js_replies");
        var handle = "comment";
        var id = comment.data("id");
        var textarea = comment.find("textarea.js_post-reply");
        comment.find("textarea.js_post-reply").val();
        var message = textarea.val();
        var attachments = comment.find(".comment-attachments");
        var attachments_voice_notes = comment.find(".comment-voice-notes");
        if (comment.data("sending")) return !1;
        /* get photo from comment data */
        var photo = comment.data("photos");
        /* get voice note from comment data */
        var voice_note = comment.data("voice_notes");
        /* check if message is empty */
        if (is_empty(message) && !photo && !voice_note) {
            return;
        }

        (!is_empty(message) || photo || voice_note) && (comment.data("sending", !0)),

            $.post(
                api["posts/comment"],
                {
                    handle: handle,
                    id: id,
                    message: message,
                    photo: JSON.stringify(photo),
                    voice_note: JSON.stringify(voice_note),
                },
                function (response) {
                    /* check if there is a callback */
                    if (response.callback) {
                        eval(response.callback);
                    } else {
                        textarea.val("");
                        textarea.attr("style", "");
                        attachments.hide();
                        attachments.find("li.item").remove();
                        comment.removeData("photos");
                        comment.find(".x-form-tools-attach").show();
                        comment.removeData("voice_notes");
                        comment.find(".x-form-tools-voice").show();
                        attachments_voice_notes.hide();
                        attachments_voice_notes.find(".js_voice-success-message").hide();
                        attachments_voice_notes.find(".js_voice-start").show();
                        stream.append(response.comment);
                        comment.removeData("sending");
                        _this.closest('.js_reply-form').hide();
                    }
                },
                "json"
            ).fail(function () {
                modal("#modal-message", {
                    title: __["Error"],
                    message: __["There is something that went wrong!"],
                });
            });
    }
    function _update_comment(element) {
        var _this = $(element),
            comment = _this.closest(".comment"),
            id = comment.data("id"),
            idchange = "comment_edit_" + id,
            textarea = comment.find("textarea.js_update-comment"),
            message = textarea.val(),
            photo = comment.data("photos");
        (is_empty(message) && !photo) ||
            $.post(
                api["posts/edit"],
                { handle: "comment", id: id, message: message, photo: JSON.stringify(photo) },
                function (response) {
                    var myEle = document.getElementById(idchange);
                    if (response.callback) {
                        eval(response.callback);
                    } else {
                        comment.find(".comment-edit").remove();
                        if (myEle) {
                            comment.find("#" + idchange + " .comment-replace").html(response.comment);
                        } else {
                            comment.find(".comment-replace").html(response.comment);
                        }
                        comment.find(".comment-data").show();
                    }
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
    }
    function _show_reactions(e) {
        var t = $(e),
            s = t.find(".reactions-container"),
            a = t.offset(),
            o = $(window).width() < 480 ? 144 : 48,
            i = a.top - $(window).scrollTop() - o,
            n = a.left - $(window).scrollLeft();
        if ("RTL" == $("html").attr("dir")) {
            var l = $(window).width() - n - t.width();
            s.css({ top: i + "px", right: l + "px" });
        } else s.css({ top: i + "px", left: n + "px" });
        s.show();
    }
    function _hide_reactions(e) {
        $(e).find(".reactions-container:first").removeAttr("style").hide();
    }
    $("body").on("click", function (e) {
        if ($(".publisher:not(.mini)").length > 0)
            if (
                $(e.target).parents(".publisher:not(.mini)").length > 0 ||
                $(e.target).parents(".js_publisher-attachment-image-remover").length > 0 ||
                $(e.target).parents(".js_publisher-gif-remover").length > 0 ||
                $(e.target).parents(".js_publisher-scraper-remover").length > 0
            ) {
                if (
                    ($("#js_hide_div").hide(),
                        $("body").addClass("publisher-focus"),
                        $(".publisher-slider").slideDown(),
                        $(".publisher-emojis").fadeIn(),
                        $(".wrapFootershowHide").css("display", "none"),
                        $('.js_publisher-tab[data-tab="colored"]').hasClass("activated"))
                ) {
                    var t = (o = $(".publisher").find(".publisher-message")).find(".colored-text-wrapper");
                    o.removeClass("colored"), o.css("backgroundImage", "");
                    var s = t.find("textarea");
                    if (!t.hasClass("colored")) {
                        var a = $(".colored-pattern-item.active");
                        t.addClass("colored"),
                            "color" == a.data("type")
                                ? t.css("backgroundImage", "linear-gradient(45deg, " + a.data("background-color-1") + ", " + a.data("background-color-2") + ")")
                                : t.css("backgroundImage", "url(" + uploads_path + "/" + a.data("background-image") + ")"),
                            s.css("color", a.data("text-color")),
                            autosize.update(s);
                    }
                }
            } else if (
                ($("#js_hide_div").show(),
                    $("body").removeClass("publisher-focus"),
                    $(".js_publisher-tab").each(function () {
                        $(this).hasClass("disabled") && ($(this).removeClass("disabled"), $(this).removeClass("active"));
                    }),
                    $(".publisher-meta").each(function () {
                        $(this).css("display", "none");
                    }),
                    $(".publisher-slider").slideUp(),
                    $(".wrapFootershowHide").css("display", "flex"),
                    $("div.publisher-message-old-design").addClass("publisher-message-js"),
                    $(".publisher-emojis").fadeOut(),
                    $('.js_publisher-tab[data-tab="colored"]').hasClass("activated"))
            ) {
                var o;
                (t = (o = $(".publisher").find(".publisher-message")).find(".colored-text-wrapper")), (s = o.find("textarea")), t.removeClass("colored"), t.css("backgroundImage", ""), s.css("color", ""), autosize.update(s);
            }
    }),
        $("body").on("click", ".js_publisher-tab", function () {
            var e = $(this),
                t = e.parents(".publisher"),
                s = e.data("tab");
            if (e.hasClass("link") && e.hasClass("disabled")) return !1;
            e.hasClass("activated") || e.hasClass("disabled") || ("location" != s && t.data("scraping")) || e.hasClass("attach") || e.hasClass("link") || publisher_tab(t, s);
        }),
        $("body").on("keyup paste input propertychange", ".js_publisher-scraper", function () {
            var _this = $(this),
                publisher = _this.parents(".publisher"),
                loader = publisher.find(".publisher-loader"),
                button = publisher.find(".js_publisher");
            clearTimeout(typing_timer),
                _this.val() &&
                (typing_timer = setTimeout(function () {
                    if (
                        !(
                            publisher.data("photos") ||
                            publisher.data("scraping") ||
                            publisher.data("video") ||
                            publisher.data("audio") ||
                            publisher.data("file") ||
                            publisher.find('.js_publisher-tab.active[data-tab!="location"]').length > 0
                        )
                    ) {
                        var raw_query = _this.val().match(/((?:https?:|www\.)[^\s]+)/gi);
                        if (null !== raw_query && 0 != raw_query.length) {
                            var query = raw_query[0];
                            loader.show(),
                                button_status(button, "loading"),
                                publisher_tab(publisher, "scraper"),
                                $.post(
                                    api["posts/scraper"],
                                    { query: query },
                                    function (response) {
                                        if ((loader.hide(), button_status(button, "reset"), response.callback)) eval(response.callback);
                                        else if (response.link) {
                                            if ((publisher.data("scraping", response.link), $(".js_publisher-photos").hide(), "link" == response.link.source_type))
                                                var template = render_template("#scraper-link", {
                                                    thumbnail: response.link.source_thumbnail,
                                                    host: response.link.source_host,
                                                    url: response.link.source_url,
                                                    title: response.link.source_title,
                                                    text: response.link.source_text,
                                                });
                                            else if ("photo" == response.link.source_type) var template = render_template("#scraper-photo", { url: response.link.source_url, provider: response.link.source_provider });
                                            else
                                                var template = render_template("#scraper-media", {
                                                    url: response.link.source_url,
                                                    title: response.link.source_title,
                                                    text: response.link.source_text,
                                                    html: response.link.source_html,
                                                    provider: response.link.source_provider,
                                                });
                                            publisher.find(".btn-share-style").html("Share"), publisher.find(".publisher-scraper").html(template).fadeIn();
                                        }
                                        publisher.find(".btn-share-style").html("Share"), publisher.find(".publisher-scraper").html(template).fadeIn();
                                    },
                                    "json"
                                );
                        }
                    }
                }, 500));
        }),
        $("body").on("click", ".js_publisher-scraper-remover", function () {
            var e = $(this).parents(".publisher");
            e.removeData("scraping"), e.find(".publisher-scraper").html("").fadeOut(), publisher_tab(e, "scraper");
        }),
        $("body").on("keyup", '.publisher-meta[data-meta="album"] input', function () {
            "" == $(this).val() ? $('.js_publisher-tab[data-tab="album"]').removeClass("activated") : $('.js_publisher-tab[data-tab="album"]').addClass("activated");
        }),
        $("body").on("keyup", '.publisher-meta[data-meta="location"] input', function () {
            "" == $(this).val() ? $('.js_publisher-tab[data-tab="location"]').removeClass("activated") : $('.js_publisher-tab[data-tab="location"]').addClass("activated");
        }),
        $("body").on("click", ".js_publisher-feelings", function () {
            $(this).toggleClass("active"), $('.publisher-meta[data-meta="feelings"]').slideToggle("fast"), $("#feelings-menu:hidden").slideDown("fast");
        }),
        $("body").on("keyup", '.publisher-meta[data-meta="feelings"] input', function () {
            "" == $(this).val() ? $(".js_publisher-feelings").removeClass("activated") : $(".js_publisher-feelings").addClass("activated");
        }),
        $("body").on("click", "#feelings-menu-toggle", function () {
            $("#feelings-menu").slideToggle("fast"),
                $("#feelings-types:visible").hide(),
                $(this).removeClass("active").text($(this).data("init-text")),
                $("#feelings-data").hide(),
                $("#feelings-data input").show().attr("placeholder", $(this).data("init-text")).removeData("action").val(""),
                $("#feelings-data span").html("").hide(),
                $(".js_publisher-feelings").removeClass("activated");
        }),
        $("body").on("click", ".js_feelings-add", function () {
            $("#feelings-menu").hide(),
                $("#feelings-menu-toggle").addClass("active").text($(this).find(".data").text()),
                $("#feelings-data").show(),
                "Feeling" == $(this).data("action")
                    ? ($("#feelings-data input").hide().attr("placeholder", $(this).data("placeholder")).data("action", $(this).data("action")),
                        $("#feelings-data span").html($(this).data("placeholder")).show(),
                        $("#feelings-types").slideToggle("fast"))
                    : ($("#feelings-data input").show().attr("placeholder", $(this).data("placeholder")).data("action", $(this).data("action")).val("").focus(),
                        $("#feelings-data span").html("").hide(),
                        $(".js_publisher-feelings").removeClass("activated"));
        }),
        $("body").on("click", ".js_feelings-type", function () {
            $("#feelings-types").hide(),
                $("#feelings-data input").hide().val($(this).data("type")),
                $("#feelings-data span").html('<i class="twa twa-lg twa-' + $(this).data("icon") + '"></i>' + $(this).find(".data").text()),
                $(".js_publisher-feelings").addClass("activated");
        }),
        $("body").on("click", ".js_publisher-pattern", function () {
            var e = $(this),
                t = e.parents(".publisher"),
                s = t.find(".publisher-message"),
                a = t.find(".colored-text-wrapper"),
                o = s.find("textarea");
            $(".colored-pattern-item.active").not(this).removeClass("active"),
                e.toggleClass("active"),
                e.hasClass("active")
                    ? (s.addClass("colored"),
                        "color" == e.data("type")
                            ? a.css("backgroundImage", "linear-gradient(45deg, " + e.data("background-color-1") + ", " + e.data("background-color-2") + ")")
                            : a.css("backgroundImage", "url(" + uploads_path + "/" + e.data("background-image") + ")"),
                        o.css("color", e.data("text-color")),
                        autosize.update(o),
                        $('.js_publisher-tab[data-tab="colored"]').addClass("activated"),
                        t.data("colored_pattern", e.data("id")))
                    : (s.removeClass("colored"), s.css("backgroundImage", ""), o.css("color", ""), autosize.update(o), $('.js_publisher-tab[data-tab="colored"]').removeClass("activated"), t.removeData("colored_pattern"));
        }),
        $("body").on("keyup", ".js_publisher-gif-search", function () {
            var e = $(this),
                t = e.val();
            is_empty(t)
                ? e.next(".dropdown-menu").length > 0 && e.next(".dropdown-menu").hide()
                : (0 == e.next(".dropdown-menu").length && e.after('<div class="dropdown-menu gif-search"></div>'),
                    e.next(".dropdown-menu").show().html('<div class="loader loader_small ptb10"></div>'),
                    $.get(
                        "https://api.giphy.com/v1/gifs/search?",
                        { q: t, api_key: giphy_key, limit: 20 },
                        function (t) {
                            if (200 == t.meta.status && t.data.length > 0) {
                                e.next(".dropdown-menu").show().html("<div class='js_scroller' data-slimScroll-height='180'><div>");
                                for (var s = 0; s < t.data.length; s++)
                                    e.next(".dropdown-menu")
                                        .find(".js_scroller")
                                        .append($('<div class="item"><img class="js_publisher-gif-add" src="' + t.data[s].images.fixed_height_small.url + '" data-gif="' + t.data[s].images.fixed_height.url + '" autoplay loop></div>'));
                            } else
                                e.next(".dropdown-menu")
                                    .show()
                                    .html('<div class="ptb5 plr10">' + __["No result found"] + "</div>");
                        },
                        "json"
                    ));
        }),
        $("body").on("click focus", ".js_publisher-gif-search", function () {
            var e = $(this).val();
            is_empty(e) || $(this).next(".dropdown-menu").show();
        }),
        $("body").on("click", function (e) {
            $(e.target).is(".js_publisher-gif-search") || $(".js_publisher-gif-search").next(".dropdown-menu").hide();
        }),
        $("body").on("click", ".js_publisher-gif-add", function () {
            var e = $(this),
                t = e.parents(".publisher"),
                s = { source_html: "null", source_provider: "giphy", source_text: "null" };
            (s.source_title = e.data("gif")), (s.source_type = "photo"), (s.source_url = e.data("gif")), t.data("scraping", s);
            var a = render_template("#pubisher-gif", { src: s.source_url });
            t.find(".publisher-scraper").html(a).fadeIn(), $('.js_publisher-tab[data-tab="gif"]').addClass("activated");
        }),
        $("body").on("click", ".js_publisher-gif-remover", function () {
            var e = $(this).parents(".publisher");
            e.removeData("scraping"), e.find(".publisher-scraper").html("").fadeOut(), publisher_tab(e, "gif"), e.find('.js_publisher-tab[data-tab="gif"]').removeClass("activated"), e.find(".js_publisher-gif-search").val("");
        }),
        $("body").on("keyup", '.publisher-meta[data-meta="poll"] input', function () {
            $('.publisher-meta[data-meta="poll"] input').filter(function () {
                return "" === $.trim(this.value);
            }).length == $('.publisher-meta[data-meta="poll"] input').length
                ? $('.js_publisher-tab[data-tab="poll"]').removeClass("activated")
                : $('.js_publisher-tab[data-tab="poll"]').addClass("activated");
        }),
        $("body").on("focus", '.publisher-meta[data-meta="poll"] input:last', function () {
            $(render_template("#poll-option")).insertAfter($(this).parent()).fadeIn();
        }),
        $("body").on("click", ".js_publisher-attachment-image-remover, .js_publisher-mini-attachment-image-remover", function () {
            var e = !!$(this).hasClass("js_publisher-mini-attachment-image-remover"),
                t = $(this).parents("li.item"),
                s = t.data("src"),
                a = e ? $(this).parents(".publisher-mini") : $(this).parents(".publisher"),
                o = a.data("photos");
            delete o[s],
                Object.keys(o).length > 0 ? a.data("photos", o) : (a.removeData("photos"), e || (a.find(".attachments").hide(), publisher_tab(a, "photos"), a.find('.js_publisher-tab[data-tab="photos"]').removeClass("activated"))),
                t.remove();
        }),
        $("body").on("click", ".js_publisher-mini-attachment-video-remover", function () {
            var e = $(this).parents("li.item"),
                t = e.data("src"),
                s = $(this).parents(".publisher-mini"),
                a = s.data("video");
            delete a[t], Object.keys(a).length > 0 ? s.data("video", a) : s.removeData("video"), e.remove();
        }),
        $("body").on("click", ".js_publisher-attachment-file-remover", function () {
            var e = $(this),
                t = e.data("type"),
                s = e.parents(".publisher");
            if ((s.removeData(t), s.find('.publisher-meta[data-meta="' + t + '"]').hide(), "video" == t)) {
                var a = s.find(".publisher-custom-thumbnail");
                a.find(".x-image").removeAttr("style"), a.find("input.js_x-image-input").val(""), a.hide();
            }
            publisher_tab(s, t), s.find('.js_publisher-tab[data-tab="' + t + '"]').removeClass("activated");
        }),
        $("body").on("click", ".js_publisher", function () {
            var _this = $(this),
                posts_stream = $(".js_posts_stream"),
                publisher = _this.parents(".publisher"),
                handle = publisher.data("handle"),
                id = publisher.data("id"),
                textarea = publisher.find("textarea"),
                link = publisher.data("scraping"),
                attachments = publisher.find(".attachments"),
                photos = publisher.data("photos"),
                album_meta = publisher.find('.publisher-meta[data-meta="album"]'),
                album = album_meta.find("input"),
                feeling_meta = publisher.find('.publisher-meta[data-meta="feelings"]'),
                feeling = feeling_meta.find("input"),
                location_meta = publisher.find('.publisher-meta[data-meta="location"]'),
                location = location_meta.find("input"),
                colored_pattern_meta = publisher.find('.publisher-meta[data-meta="colored"]'),
                attachments_voice_notes = publisher.find('.publisher-meta[data-meta="voice_notes"]'),
                voice_notes = publisher.data("voice_notes"),
                gif_meta = publisher.find('.publisher-meta[data-meta="gif"]'),
                gif = gif_meta.find("input"),
                poll_options = [];
            publisher.find('.publisher-meta[data-meta="poll"] input').each(function (e) {
                "" != $(this).val() && (poll_options[e] = $(this).val());
            }),
                (poll_options = poll_options.length > 0 ? poll_options : void 0);
            var attachments_video = publisher.find('.publisher-meta[data-meta="video"]'),
                video = publisher.data("video"),
                attachments_video_thumbnail = publisher.find(".publisher-custom-thumbnail"),
                video_thumbnail = attachments_video_thumbnail.find("input.js_x-image-input").val(),
                attachments_audio = publisher.find('.publisher-meta[data-meta="audio"]'),
                audio = publisher.data("audio"),
                attachments_file = publisher.find('.publisher-meta[data-meta="file"]'),
                file = publisher.data("file"),
                privacy = publisher.find(".btn-group").data("value"),
                is_anonymous = publisher.find(".js_publisher-anonymous-toggle").is(":checked");
            (is_empty(textarea.val()) && void 0 === link && void 0 === photos && "" == feeling.val() && "" == location.val() && void 0 === voice_notes && void 0 === poll_options && void 0 === video && void 0 === audio && void 0 === file) ||
                (button_status(_this, "loading"),
                    posts_stream.data("loading", !0),
                    $.post(
                        api["posts/post"],
                        {
                            handle: handle,
                            id: id,
                            message: textarea.val(),
                            link: JSON.stringify(link),
                            photos: JSON.stringify(photos),
                            album: album.val(),
                            feeling_action: feeling.data("action"),
                            feeling_value: feeling.val(),
                            location: location.val(),
                            colored_pattern: publisher.data("colored_pattern"),
                            voice_notes: JSON.stringify(voice_notes),
                            poll_options: JSON.stringify(poll_options),
                            video: JSON.stringify(video),
                            video_thumbnail: video_thumbnail,
                            audio: JSON.stringify(audio),
                            file: JSON.stringify(file),
                            privacy: privacy,
                            is_anonymous: is_anonymous,
                        },
                        function (response) {
                            $(".no-post-to-show").css("display", "none");
                            $(".wrapFooterDiv-old").show();
                            if (response.callback) {
                                /* button reset */
                                button_status(_this, "reset");
                                eval(response.callback);
                            } else {
                                /* button reset */
                                button_status(_this, "reset");
                                /* prepare publisher */
                                /* remove (active|activated|disabled) from all tabs */
                                publisher
                                    .find(".js_publisher-tab")
                                    .removeClass("active activated disabled");
                                textarea.val("").removeAttr("style");
                                textarea.attr("placeholder", textarea.data("init-placeholder"));
                                /* hide & empty album */
                                album.val("");
                                album_meta.hide();
                                /* hide & empty feelings */
                                feeling_meta.hide();
                                $("#feelings-menu-toggle")
                                    .removeClass("active")
                                    .text($("#feelings-menu-toggle").data("init-text"));
                                $("#feelings-data").hide();
                                $("#feelings-data input")
                                    .show()
                                    .attr("placeholder", $("#feelings-menu-toggle").data("init-text"))
                                    .removeData("action")
                                    .val("");
                                $("#feelings-data span").html("");
                                $(".js_publisher-feelings").removeClass("activated active");
                                /* hide & empty location */
                                location.val("");
                                location_meta.hide();
                                /* hide & empty colored patterns */
                                publisher.removeData("colored_pattern");
                                publisher
                                    .find(".colored-text-wrapper")
                                    .removeAttr("style")
                                    .removeClass("colored");
                                colored_pattern_meta.hide();
                                /* hide & empty voice notes */
                                attachments_voice_notes.hide();
                                attachments_voice_notes.find(".js_voice-success-message").hide();
                                attachments_voice_notes.find(".js_voice-start").show();
                                publisher.removeData("voice_notes");
                                /* hide & empty gif */
                                gif.val("");
                                gif_meta.hide();
                                /* hide & remove poll meta */
                                $('.publisher-meta[data-meta="poll"]').hide().find("input").val("");
                                /* hide & empty attachments */
                                attachments.hide();
                                attachments.find("li.item").remove();
                                publisher.removeData("photos");
                                attachments_video.hide();
                                publisher.removeData("video");
                                attachments_audio.hide();
                                publisher.removeData("audio");
                                attachments_file.hide();
                                publisher.removeData("file");
                                /* hide & empty video custom thumbnail */
                                attachments_video_thumbnail.find(".x-image").removeAttr("style");
                                attachments_video_thumbnail.find("input.js_x-image-input").val("");
                                attachments_video_thumbnail.hide();
                                /* hide & empty scraper */
                                $(".publisher-scraper").hide().html("");
                                publisher.removeData("scraping");
                                /* collapse the publisher */
                                $("body").removeClass("publisher-focus");
                                publisher.find(".publisher-slider").slideUp();
                                publisher.find(".publisher-emojis").fadeOut();
                                /* attache the new post */
                                $(".js_posts_stream").find("ul:first").prepend();
                                /* release the loading status */
                                posts_stream.removeData("loading");
                                /* rerun photo grid */
                                photo_grid();
                                /* close the window if share plugin */
                                if (current_page == "share") {
                                    window.close();
                                }
                            }
                        },

                        "json"
                    ).fail(function () {
                        button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    }));
        }),
        $("body").on("click", ".js_publisher-anonymous-toggle", function () {
            var e = $(this).parents(".publisher");
            publisher_tab(e, "anonymous"), e.find(".btn-group").toggle(), e.find(".js_publisher-privacy-public").toggle();
        }),
        $("body").on("click", ".js_publisher-story", function () {
            var _this = $(this),
                publisher = _this.parents(".publisher-mini"),
                textarea = publisher.find("textarea"),
                photos = publisher.data("photos"),
                videos = publisher.data("video");
            (void 0 === photos && void 0 === videos) ||
                (button_status(_this, "loading"),
                    $.post(
                        api["posts/story"],
                        { do: "publish", message: textarea.val(), photos: JSON.stringify(photos), videos: JSON.stringify(videos) },
                        function (response) {
                            response.callback && (button_status(_this, "reset"), eval(response.callback));
                        },
                        "json"
                    ).fail(function () {
                        button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    }));
        }),
        $("body").on("click", ".js_publisher-product", function () {
            var _this = $(this),
                publisher = _this.parents(".publisher-mini"),
                product = {};
            if (
                (publisher.find("input").each(function (e) {
                    "" != $(this).val() && (product[$(this).attr("name")] = $(this).val());
                }),
                    !$.isEmptyObject(product))
            ) {
                (product.category = publisher.find('select[name="category"]').val()), (product.status = publisher.find('select[name="status"]').val());
                var textarea = publisher.find("textarea"),
                    photos = publisher.data("photos");
                // button_status(_this, "loading"),
                $.post(
                    api["posts/product"],
                    { do: "publish", product: JSON.stringify(product), message: textarea.val(), photos: JSON.stringify(photos) },
                    function (response) {
                        // button_status(_this, "reset"),
                        response.error
                            ? publisher.find(".alert.alert-danger").html(response.message).slideDown()
                            : response.callback && (eval(response.callback))
                        // $(".no-post-to-show").css("display", "none"), $("#modal").modal("toggle"));
                    },
                    "json"
                ).fail(function () {
                    button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                });
            }
        }),
        $('#add_product').on('click', function () {
            // alert('enter');
            $('#ajax-sell-new-product').trigger('reset');
        });
    $("body").on("click", ".js_publisher-album", function () {
        var _this = $(this),
            publisher = _this.parents(".publisher"),
            id = publisher.data("id"),
            textarea = publisher.find("textarea"),
            attachments = publisher.find(".attachments"),
            photos = publisher.data("photos"),
            location_meta = publisher.find('.publisher-meta[data-meta="location"]'),
            location = location_meta.find("input"),
            feeling_meta = publisher.find('.publisher-meta[data-meta="feelings"]'),
            feeling = feeling_meta.find("input"),
            privacy = publisher.find(".btn-group").data("value");
        void 0 !== photos &&
            (button_status(_this, "loading"),
                $.post(
                    api["albums/action"],
                    { do: "add_photos", id: id, message: textarea.val(), photos: JSON.stringify(photos), feeling_action: feeling.data("action"), feeling_value: feeling.val(), location: location.val(), privacy: privacy },
                    function (response) {
                        response.callback && (button_status(_this, "reset"), eval(response.callback));
                    },
                    "json"
                ).fail(function () {
                    button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                }));
    }),
        (window.AudioContext = window.AudioContext || window.webkitAudioContext),
        (navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia),
        $("body").on("click", ".js_voice-start", function () {
            if (voice_recording_process);
            else {
                var e = $(this),
                    t = e.parents(".voice-recording-wrapper"),
                    s = e,
                    a = t.find(".js_voice-stop"),
                    o = t.find(".js_voice-timer"),
                    i = t.data("handle");
                s.hide(),
                    a.show(),
                    (voice_recording_timer = new easytimer.Timer()).addEventListener("secondsUpdated", function (e) {
                        o.html(voice_recording_timer.getTimeValues().toString(["minutes", "seconds"]));
                    }),
                    voice_recording_timer.addEventListener("started", function (e) {
                        o.html(voice_recording_timer.getTimeValues().toString(["minutes", "seconds"]));
                    }),
                    voice_recording_timer.addEventListener("reset", function (e) {
                        o.html(voice_recording_timer.getTimeValues().toString(["minutes", "seconds"]));
                    }),
                    navigator.mediaDevices
                        .getUserMedia({ audio: !0, video: !1 })
                        .then(function (t) {
                            var s = new AudioContext();
                            if (((voice_recording_stream = t), (voice_recording_object = new Recorder(s.createMediaStreamSource(t))).record(), voice_recording_timer.start(), (voice_recording_process = !0), "publisher" == i)) {
                                var a = e.parents(".publisher").find(".js_publisher-btn");
                                button_status(a, "loading");
                            } else if ("comment" == i) {
                                var o = e.parents(".comment");
                                o.find(".x-form-tools-attach").hide(), o.find(".x-form-tools-voice").hide();
                            } else if ("chat" == i) {
                                var n = e.parents(".chat-widget, .panel-messages");
                                n.find(".x-form-tools-attach").hide(), n.find(".x-form-tools-voice").hide();
                            }
                        })
                        .catch(function (e) {
                            modal("#modal-message", { title: __.Error, message: e });
                        });
            }
        }),
        $("body").on("click", ".js_voice-stop", function () {
            var _this = $(this),
                _parent = _this.parents(".voice-recording-wrapper"),
                voice_stop_button = _this,
                voice_start_button = _parent.find(".js_voice-start"),
                voice_processing_message = _parent.find(".js_voice-processing-message"),
                voice_success_message = _parent.find(".js_voice-success-message"),
                handle = _parent.data("handle"),
                handle_type = "voice_notes";
            voice_stop_button.hide(),
                voice_recording_timer.reset(),
                voice_recording_timer.stop(),
                (voice_recording_process = !1),
                voice_processing_message.show(),
                voice_recording_object.stop(),
                voice_recording_stream.getAudioTracks()[0].stop(),
                voice_recording_object.exportWAV(function (blob) {
                    var formData = new FormData();
                    formData.append("handle", "voice_notes"),
                        formData.append("file", blob, guid() + ".wav"),
                        formData.append("type", "audio"),
                        formData.append("multiple", "false"),
                        formData.append("secret", secret),
                        $.ajax({
                            url: api["data/upload"],
                            type: "POST",
                            data: formData,
                            contentType: !1,
                            processData: !1,
                            success: function (response) {
                                if (response.callback) {
                                    if ("publisher" == handle) {
                                        var publisher = _this.parents(".publisher"),
                                            publisher_button = publisher.find(".js_publisher-btn");
                                        button_status(publisher_button, "reset");
                                    }
                                    eval(response.callback);
                                } else if ((voice_processing_message.hide(), voice_success_message.show(), "publisher" == handle)) {
                                    var publisher = _this.parents(".publisher"),
                                        publisher_button = publisher.find(".js_publisher-btn");
                                    publisher.data(handle_type, { source: response.file }), publisher.find('.js_publisher-tab[data-tab="' + handle_type + '"]').addClass("activated"), button_status(publisher_button, "reset");
                                } else if ("comment" == handle) {
                                    var comment = _this.parents(".comment");
                                    comment.data(handle_type, response.file), comment.find(".x-form-tools-attach").hide(), comment.find(".x-form-tools-voice").hide();
                                } else if ("chat" == handle) {
                                    var chat_widget = _this.parents(".chat-widget, .panel-messages");
                                    chat_widget.data(handle_type, response.file), chat_widget.find(".x-form-tools-attach").hide(), chat_widget.find(".x-form-tools-voice").hide();
                                }
                            },
                            error: function () {
                                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                            },
                        });
                });
        }),
        $("body").on("click", ".js_voice-remove", function () {
            var e = $(this),
                t = e.parents(".voice-recording-wrapper"),
                s = t.find(".js_voice-start"),
                a = t.find(".js_voice-success-message"),
                o = t.data("handle");
            if ((a.hide(), s.show(), "publisher" == o)) {
                var i = e.parents(".publisher");
                i.removeData("voice_notes"), publisher_tab(i, "voice_notes"), i.find('.js_publisher-tab[data-tab="voice_notes"]').removeClass("activated");
            } else if ("comment" == o) {
                var n = e.parents(".comment");
                n.removeData("voice_notes"), n.find(".x-form-tools-attach").show(), n.find(".x-form-tools-voice").show();
            } else if ("chat" == o) {
                var l = e.parents(".chat-widget, .panel-messages");
                l.removeData("voice_notes"), l.find(".x-form-tools-attach").show(), l.find(".x-form-tools-voice").show();
            }
        }),
        $("body").on("click", ".js_comment-voice-notes-toggle", function () {
            $(this).closest(".comment").find(".comment-voice-notes").slideToggle();
        }),
        $("body").on("click", ".js_chat-voice-notes-toggle", function () {
            $(this).parents(".chat-widget, .panel-messages").find(".chat-voice-notes").slideToggle();
        }),
        $("body").on("click", ".js_posts-filter .dropdown-item", function () {
            var posts_stream = $(".js_posts_stream"),
                posts_loader = $(".js_posts_loader"),
                data = {};
            (data.get = posts_stream.data("get")),
                (data.filter = $(this).data("value")),
                void 0 !== posts_stream.data("id") && (data.id = posts_stream.data("id")),
                posts_stream.data("loading", !0),
                posts_stream.data("filter", data.filter),
                posts_stream.html(""),
                posts_loader.show(),
                $.post(
                    api["posts/filter"],
                    data,
                    function (response) {
                        var datatta = response.data;
                        var ArrayVal = datatta.split('<div class="carsds"');
                        var loopArray = [];
                        if (ArrayVal.length > 0) {
                            for (var i = 1; i < ArrayVal.length; i++) {
                                loopArray.push('<div class="carsds"' + ArrayVal[i])
                            }
                        }

                        for (var ik = 0; ik < loopArray.length; ik++) {
                            var values = loopArray[ik];
                            var d = document.createElement('div');
                            d.innerHTML = values;
                            var valuesPost = d.firstChild;
                            bricklayer.append(valuesPost);
                            // bricklayer.redraw();
                        }

                        if ((data.offset++, response.append ? posts_stream.append(response.data) : posts_stream.prepend(response.data), $(window).width() > 1024)) {
                            // if ($("body #landing_feeds_post_ul").length > 0) var macyInstance = Macy({ container: ".feeds_post_ul", trueOrder: !0, columns: 2, waitForImages: !0 });
                            // if ($("body #feeds_post_ul").length > 0)
                                // var macyInstance = Macy({ container: ".feeds_post_ul", trueOrder: !0, columns: 2, waitForImages: !0 });
                        }
                        posts_loader.hide(), posts_stream.removeData("loading"), posts_stream.html(response.posts), setTimeout(photo_grid(), 200),posts_stream.data("filter", data.filter)
                        // response.callback ? eval(response.callback) : response.posts && ();
                    },
                    "json"
                );
        }),
        $("body").on("click", ".js_lightbox", function (e) {
            e.preventDefault();
            var id = $(this).data("id"),
                image = $(this).data("image"),
                context = $(this).data("context"),
                lightbox = $(render_template("#lightbox", { image: image })),
                next = lightbox.find(".lightbox-next"),
                prev = lightbox.find(".lightbox-prev");
            $("body").addClass("lightbox-open").append(lightbox.fadeIn("fast")),
                $.post(
                    api["posts/lightbox"],
                    { id: id, context: context },
                    function (response) {
                        response.callback
                            ? ($("body").removeClass("lightbox-open"), $(".lightbox").remove(), eval(response.callback))
                            : (null != response.next
                                ? (next.show(), next.data("id", response.next.photo_id), next.data("source", response.next.source), next.data("context", context))
                                : (next.hide(), next.data("id", ""), next.data("source", ""), next.data("context", "")),
                                null != response.prev
                                    ? (prev.show(), prev.data("id", response.prev.photo_id), prev.data("source", response.prev.source), prev.data("context", context))
                                    : (prev.hide(), prev.data("id", ""), prev.data("source", ""), prev.data("context", "")),
                                lightbox.find(".lightbox-post").replaceWith(response.lightbox));
                    },
                    "json"
                );
        }),
        $("body").on("click", ".js_lightbox-slider", function (e) {
            var id = $(this).data("id"),
                image = $(this).data("source"),
                context = $(this).data("context"),
                lightbox = $(this).parents(".lightbox"),
                next = lightbox.find(".lightbox-next"),
                prev = lightbox.find(".lightbox-prev");
            next.hide(),
                prev.hide(),
                lightbox.find(".lightbox-post").html('<div class="loader mtb10"></div>'),
                lightbox.find(".lightbox-preview img").attr("src", uploads_path + "/" + image),
                $.post(
                    api["posts/lightbox"],
                    { id: id, context: context },
                    function (response) {
                        response.callback
                            ? ($("body").removeClass("lightbox-open"), lightbox.remove(), eval(response.callback))
                            : (null != response.next
                                ? (next.show(), next.data("id", response.next.photo_id), next.data("source", response.next.source), next.data("context", context))
                                : (next.hide(), next.data("id", ""), next.data("source", ""), next.data("context", "")),
                                null != response.prev
                                    ? (prev.show(), prev.data("id", response.prev.photo_id), prev.data("source", response.prev.source), prev.data("context", context))
                                    : (prev.hide(), prev.data("id", ""), prev.data("source", ""), prev.data("context", "")),
                                lightbox.find(".lightbox-post").replaceWith(response.lightbox));
                    },
                    "json"
                );
        }),
        $("body").on("click", ".js_lightbox-nodata", function (e) {
            e.preventDefault();
            var t = $(this).data("image"),
                s = $(render_template("#lightbox-nodata", { image: t }));
            $("body").addClass("lightbox-open").append(s.fadeIn("fast"));
        }),
        $("body").on("click", ".lightbox", function (e) {
            $(e.target).is(".lightbox") && (end_live_post(), $("body").removeClass("lightbox-open"), $(".lightbox").remove());
        }),
        $("body").on("click", ".js_lightbox-close", function () {
            end_live_post(), $("body").removeClass("lightbox-open"), $(".lightbox").remove();
        }),
        $("body").on("keydown", function (e) {
            27 === e.keyCode && $(".lightbox").length > 0 && (end_live_post(), $("body").removeClass("lightbox-open"), $(".lightbox").remove());
        }),
        $("body").on("click", ".js_lightbox-live", function () {
            var _this = $(this),
                live_post_id = _this.parents(".post").data("id"),
                lightbox = $(render_template("#lightbox-live", { post_id: live_post_id })),
                live_video = $('#js_live-video');
                
            
            $("body").addClass("lightbox-open").append(lightbox.fadeIn("fast"));
           
            var client = AgoraRTC.createClient({ mode: "live", codec: "vp8" });
            AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.NONE),
                $.post(
                    api["live/reaction"],
                    { do: "join", post_id: live_post_id },
                    function (response) {
                        if(response.callback) {
                            $('body').removeClass('lightbox-open');
                            $('.lightbox').remove();
                            eval(response.callback);
                        } else if (response.live_ended == "live_ended") {
                            lightbox.find('.lightbox-preview').replaceWith(response.live_data);
                            lightbox.find('.lightbox-post').replaceWith(response.lightbox);
                        } else {
                            lightbox.find('#js_live-video').show();
                            lightbox.find('.lightbox-post').replaceWith(response.lightbox);
                            if(response.live_ended) {
                                /* show live status */
                                $('#js_live-status').html('<i class="fas fa-exclamation-circle mr5"></i>' + __['Live Ended']).addClass("error");
                            } else {
                                /* init agora client */
                                client.init(agora_app_id, function () {
                                    client.setClientRole('audience');
                                    client.join(response.agora_audience_token, response.agora_channel_name, response.agora_audience_uid, function(uid) {}, function(err) {
                                        /* show live status */
                                        $('#js_live-status').html('<i class="fas fa-exclamation-circle mr5"></i>' + __['Joining live stream failed']).addClass("error");
                                    });
                                });
                            }
                        }
                    },
                    "json"
                ),
                client.on("stream-added", function (e) {
                    var t = e.stream;
                    client.subscribe(t, function (e) {
                        $("#js_live-status")
                            .html('<i class="fas fa-exclamation-circle mr5"></i>' + __["Joining live stream failed"])
                            .addClass("error");
                    });
                }),
                client.on("stream-subscribed", function (e) {
                    $("#js_live-status").html("").hide(),
                        e.stream.play("js_live-video"),
                        $("#js_live-counter-status").html(__.Online).removeClass("offline"),
                        $("#js_live-counter-number").html(1),
                        (live_post_streaming_process = !0),
                        (live_post_realtime_thread = setInterval(function () {
                            if (!live_post_realtime_process) {
                                live_post_realtime_process = !0;
                                var e = lightbox.find("ul.js_live-comments .comment:first").data("id") || 0;
                                $.post(
                                    api["live/reaction"],
                                    { do: "stats", post_id: live_post_id, last_comment_id: e },
                                    function (e) {
                                        $("#js_live-counter-number").html(e.live_count), e.comments && lightbox.find("ul.js_live-comments").prepend(e.comments), (live_post_realtime_process = !1);
                                    },
                                    "json"
                                );
                            }
                        }, 500)),
                        $(window).on("beforeunload", function () {
                            return end_live_post(), !0;
                        });
                }),
                client.on("stream-removed", function (e) {
                    $("#js_live-status")
                        .html('<i class="fas fa-exclamation-circle mr5"></i>' + __["Live Ended"])
                        .addClass("error")
                        .show(),
                        e.stream,
                        e.stream.stop(),
                        (live_post_streaming_process = !1),
                        clearInterval(live_post_realtime_thread),
                        $("#js_live-counter-status").html(__.Offline).addClass("offline"),
                        $("#js_live-counter-number").html(0),
                        $(window).off("beforeunload");
                });
        }),
        $("body").on("click", ".js_emoji-menu-toggle", function () {
            0 == $(this).parent().find(".emoji-menu").length && ($(this).after(render_template("#emoji-menu", { id: guid() })), initialize()), $(this).parent().find(".emoji-menu").toggle();
        }),
        $("body").on("click", function (e) {
            $(e.target).hasClass("js_emoji-menu-toggle") || $(e.target).parents(".js_emoji-menu-toggle").length > 0 || $(e.target).hasClass("emoji-menu") || $(e.target).parents(".emoji-menu").length > 0 || $(".emoji-menu").hide();
        }),
        $("body").on("click", ".js_emoji", function () {
            var e = $(this).data("emoji"),
                t = $(this).parents(".x-form").find("textarea"),
                s = "" == t.val() || /\s+$/.test(t.val()) ? "" : " ";
            t.val(t.val() + s + e + " ")
                .change()
                .focus();
        }),
        $("body").on("click", ".js_edit-post", function () {
            var post = $(this).parents(".post");
            if (post.find(".post-edit").length > 0) {
                return;
            }
            post.find(".post-replace").hide().after(
                render_template("#edit-post", {
                    text: post.find(".post-text-plain").text(),
                })
            );
            autosize(post.find(".post-edit textarea"));
        });
    $("body").on("click", ".js_unedit-post", function () {
        var e = $(this).parents(".post");
        e.find(".post-edit").remove(), e.find(".post-replace").show();
    }),
        $("body").on("keydown", "textarea.js_update-post", function (event) {
            if (
                $(window).width() >= 970 &&
                event.keyCode == 13 &&
                event.shiftKey == 0
            ) {
                // event.preventDefault();
                // _update_post(this);
            }
        });
    $("body").on("click", "li.js_update-post", function () {
        if ($(window).width() < 970) {
            _update_post(this);
        }
    });

    $("body").on("click", ".js_publisher_updatebtn", function () {
        _update_post(this);
    }),
        $("body").on("click", ".js_edit-privacy", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                id = post.data("id"),
                privacy = _this.data("value");
            $.post(
                api["posts/edit"],
                { handle: "privacy", id: id, privacy: privacy },
                function (response) {
                    "friends" == privacy && $("#" + id + ">img").attr("src", "https://cdn1.stratus.co/content/themes/default/images/svg/svgImg/friendsIcon.svg"),
                        "public" == privacy && $("#" + id + ">img").attr("src", "https://cdn1.stratus.co/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"),
                        "me" == privacy && $("#" + id + ">img").attr("src", "https://cdn1.stratus.co/content/themes/default/images/svg/svgImg/Hide_form.svg"),
                        response.callback && eval(response.callback);
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_delete-post", function (e) {
            e.preventDefault();
            var post = $(this).parents(".post"),
                id = post.data("id");
            confirm(__["Delete Post"], __["Are you sure you want to delete this post?"], function () {
                post.hide(),
                    $.post(
                        api["posts/reaction"],
                        { do: "delete_post", id: id },
                        function (response) {
                            $("#modal").modal("hide");
                            bricklayer.redraw();
                            // !response.refresh || ("profile" != current_page && "page" != current_page && "index" != current_page && "group" != current_page && "event" != current_page)
                            //     ? response.callback && eval(response.callback)
                            //     : location.reload();
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    });
            });
        }),
        $("body").on("click", ".js_approve-post", function (e) {
            e.preventDefault();
            var _this = $(this),
                post = _this.parents(".post"),
                id = post.data("id");
            button_status(_this, "loading"),
                $.post(
                    api["posts/reaction"],
                    { do: "approve_post", id: id },
                    function (response) {
                        button_status(_this, "reset"), response.callback ? eval(response.callback) : post.hide();
                    },
                    "json"
                ).fail(function () {
                    button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                });
        }),
        $("body").on("click", ".js_delete-article", function (e) {
            e.preventDefault();
            var id = $(this).data("id");
            confirm(__["Delete Post"], __["Are you sure you want to delete this post?"], function () {
                $.post(
                    api["posts/reaction"],
                    { do: "delete_post", id: id },
                    function (response) {
                        $("#modal").modal("hide"), response.callback && eval(response.callback), (window.location = site_path + "/articles");
                    },
                    "json"
                ).fail(function () {
                    modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                });
            });
        }),
        $("body").on("click", ".js_sold-post", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                id = post.data("id");
            $.post(
                api["posts/reaction"],
                { do: "sold_post", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : _this.removeClass("js_sold-post").addClass("js_unsold-post").find("span").text(__["Mark as Available"]);
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_unsold-post", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                id = post.data("id");
            $.post(
                api["posts/reaction"],
                { do: "unsold_post", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : _this.removeClass("js_unsold-post").addClass("js_sold-post").find("span").text(__["Mark as Sold"]);
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_save-post", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                id = post.data("id");
            $.post(
                api["posts/reaction"],
                { do: "save_post", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : _this.removeClass("js_save-post").addClass("js_unsave-post").find("span").text(__["Unsave Post"]);
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_unsave-post", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                id = post.data("id");
            $.post(
                api["posts/reaction"],
                { do: "unsave_post", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : _this.removeClass("js_unsave-post").addClass("js_save-post").find("span").text(__["Save Post"]);
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_boost-post", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                id = post.data("id");
            $.post(
                api["posts/reaction"],
                { do: "boost_post", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : _this.removeClass("js_boost-post").addClass("js_unboost-post").find("span").text(__["Unboost Post"]),
                        setTimeout(function () {
                            location.reload();
                        }, 2500);
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_unboost-post", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                id = post.data("id");
            $.post(
                api["posts/reaction"],
                { do: "unboost_post", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : _this.removeClass("js_unboost-post").addClass("js_boost-post").find("span").text(__["Boost Post"]),
                        setTimeout(function () {
                            location.reload();
                        }, 2500);
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_pin-post", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                id = post.data("id");
            $.post(
                api["posts/reaction"],
                { do: "pin_post", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : _this.removeClass("js_pin-post").addClass("js_unpin-post").find("span").text(__["Unpin Post"]),
                        setTimeout(function () {
                            location.reload();
                        }, 2500);
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_unpin-post", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                id = post.data("id");
            $.post(
                api["posts/reaction"],
                { do: "unpin_post", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : _this.removeClass("js_unpin-post").addClass("js_pin-post").find("span").text(__["Pin Post"]),
                        setTimeout(function () {
                            location.reload();
                        }, 2500);
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_hide-post", function () {
            var post = $(this).parents(".post"),
                id = post.data("id");
            $.post(
                api["posts/reaction"],
                { do: "hide_post", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : (post.hide(), post.after(render_template("#hidden-post", { id: id })));
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_unhide-post", function () {
            var post = $(this).parents(".post"),
                id = post.data("id");
            $.post(
                api["posts/reaction"],
                { do: "unhide_post", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : (post.prev().show(), post.remove());
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_hide-author", function () {
            var post = $(this).parents(".post"),
                author_id = $(this).data("author-id"),
                author_name = $(this).data("author-name"),
                id = post.data("id");
            $.post(
                api["users/connect"],
                { do: "unfollow", id: author_id },
                function (response) {
                    response.callback ? eval(response.callback) : (post.hide(), post.after(render_template("#hidden-author", { id: id, name: author_name, uid: author_id })));
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_unhide-author", function () {
            var post = $(this).parents(".post"),
                author_id = $(this).data("author-id"),
                author_name = $(this).data("author-name"),
                id = post.data("id");
            $.post(
                api["users/connect"],
                { do: "follow", id: author_id },
                function (response) {
                    response.callback ? eval(response.callback) : (post.prev().show(), post.remove());
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_disable-post-comments", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                comment_form = post.find(".comment:last"),
                id = post.data("id");
            _this.removeClass("js_disable-post-comments").addClass("js_enable-post-comments").find("span").text(__["Turn on Commenting"]),
                post.find(".js_comment, .js_reply, .js_reply-form").hide(),
                post.find(".js_comment-form").hide(),
                post.find(".js_comment-disabled-msg").show(),
                $.post(
                    api["posts/reaction"],
                    { do: "disable_comments", id: id },
                    function (response) {
                        response.callback && eval(response.callback);
                    },
                    "json"
                ).fail(function () {
                    modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                });
        }),
        $("body").on("click", ".js_enable-post-comments", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                comment_form = post.find(".comment:last"),
                id = post.data("id");
            _this.removeClass("js_enable-post-comments").addClass("js_disable-post-comments").find("span").text(__["Turn off Commenting"]),
                post.find(".js_comment, .js_reply").show(),
                post.find(".js_comment-form").show(),
                post.find(".js_comment-disabled-msg").hide(),
                $.post(
                    api["posts/reaction"],
                    { do: "enable_comments", id: id },
                    function (response) {
                        response.callback && eval(response.callback);
                    },
                    "json"
                ).fail(function () {
                    modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                });
        }),
        $("body").on("click", ".js_disallow-post", function () {
            var _this = $(this),
                post = $(this).parents(".post"),
                id = post.data("id");
            confirm(__["Hide from Timeline"], __["Are you sure you want to hide this post from your profile timeline? It may still appear in other places like newsfeed and search results"], function () {
                $.post(
                    api["posts/reaction"],
                    { do: "disallow_post", id: id },
                    function (response) {
                        $("#modal").modal("hide"), response.callback ? eval(response.callback) : (post.addClass("is_hidden"), _this.removeClass("js_disallow-post").addClass("js_allow-post").find("span").text(__["Allow on Timeline"]));
                    },
                    "json"
                ).fail(function () {
                    modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                });
            });
        }),
        $("body").on("click", ".js_allow-post", function () {
            var _this = $(this),
                post = _this.parents(".post"),
                id = post.data("id");
            $.post(
                api["posts/reaction"],
                { do: "allow_post", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : (post.removeClass("is_hidden"), _this.removeClass("js_allow-post").addClass("js_disallow-post").find("span").text(__["Hide from Timeline"]));
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
        $("body").on("click", ".js_show-attachments", function () {
            $(this).next().toggle();
        }),
        $("body").on("click", ".js_poll-vote", function (event) {
            if ($(event.target).is('input[type="radio"]')) return !1;
            var _this = $(this),
                id = _this.data("id"),
                radio = _this.find('input[type="radio"]'),
                parent = _this.parents(".poll-options"),
                poll_votes = parent.data("poll-votes"),
                checked_id = parent.find('input[type="radio"]:checked').parents(".poll-option").data("id");
            if (void 0 === checked_id) var _do = "add_vote";
            else if (checked_id == id) var _do = "delete_vote";
            else var _do = "change_vote";
            "add_vote" == _do
                ? ((poll_votes += 1),
                    parent.data("poll-votes", poll_votes),
                    parent.find(".poll-option").each(function () {
                        var e = $(this).data("option-votes");
                        $(this).data("id") == id && ((e += 1), $(this).data("option-votes", e));
                        var t = (e / poll_votes) * 100;
                        $(this)
                            .find(".percentage-bg")
                            .width(t + "%"),
                            $(this).next(".poll-voters").find(".more").html(e);
                    }),
                    parent.find('input[type="radio"]').removeAttr("checked").prop("checked", !1),
                    radio.attr("checked", "checked").prop("checked", !0))
                : "delete_vote" == _do
                    ? ((poll_votes -= 1),
                        parent.data("poll-votes", poll_votes),
                        parent.find(".poll-option").each(function () {
                            var e = $(this).data("option-votes");
                            $(this).data("id") == id && ((e -= 1), $(this).data("option-votes", e));
                            var t = 0 == poll_votes ? 0 : (e / poll_votes) * 100;
                            $(this)
                                .find(".percentage-bg")
                                .width(t + "%"),
                                $(this).next(".poll-voters").find(".more").html(e);
                        }),
                        parent.find('input[type="radio"]').removeAttr("checked").prop("checked", !1))
                    : ((poll_votes = poll_votes),
                        parent.find(".poll-option").each(function () {
                            var e = $(this).data("option-votes");
                            $(this).data("id") == id && ((e += 1), $(this).data("option-votes", e)), $(this).data("id") == checked_id && ((e -= 1), $(this).data("option-votes", e));
                            var t = (e / poll_votes) * 100;
                            $(this)
                                .find(".percentage-bg")
                                .width(t + "%"),
                                $(this).next(".poll-voters").find(".more").html(e);
                        }),
                        parent.find('input[type="radio"]').removeAttr("checked").prop("checked", !1),
                        radio.attr("checked", "checked").prop("checked", !0)),
                $.post(
                    api["posts/reaction"],
                    { do: _do, id: id, checked_id: checked_id },
                    function (response) {
                        response.callback && eval(response.callback);
                    },
                    "json"
                ).fail(function () {
                    modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                });
        }),
        $("body").on("mouseup", ".js_poll-vote input", function (e) {
            return e.stopPropagation(), e.preventDefault(), $(this).parents(".js_poll-vote").trigger("click"), !1;
        }),
        $("body").on("click", ".js_comment", function () { }),
        $("body").on("click", ".post-comment-button-span-modal, .js_comment, .js_comments-toggle", function (event) {
            event.stopPropagation();
            var footer = $(this).parents(".post, .lightbox-post, .article").find(".post-footer"),
                parentDataId = $(this).attr("parent-data-id");
            if (!$("div").hasClass("light-commentModal")) {
                var lightbox = $(render_template("#commentModalbox", {}));
                $("body").addClass("lightbox-open").append(lightbox.fadeIn("fast")),
                    $.post(
                        api["posts/commentModal"],
                        { id: parentDataId },
                        function (response) {
                            response.callback ? ($("body").removeClass("lightbox-open"), $(".lightbox").remove(), eval(response.callback)) : (response.next, response.prev, lightbox.find(".lightbox-post").replaceWith(response.lightbox));
                        },
                        "json"
                    );
            }
        }),
        $("body").on("click", ".js_comment-attachment-remover", function () {
            var e = $(this).parents(".comment"),
                t = e.find(".comment-attachments"),
                s = $(this).parents("li.item");
            e.removeData("photos"), s.remove(), t.hide(), e.find(".x-form-tools-attach").show(), e.find(".x-form-tools-voice").show();
        }),
        $("body").on("click", "li.js_post-comment", function () {
            _comment(this);
        }),
        $("body").on("click", ".js_replies-toggle", function () {
            $(this).parents(".comment").find(".comment-replies").show(), $(this).remove();
        }),
        $("body").on("click", ".js_reply", function () {
            var e = $(this).parents(".comment"),
                t = e.find(".js_reply-form"),
                s = t.find("textarea:first"),
                a = $(this).data("username") || "";
            e.find(".js_replies-toggle").remove(), e.find(".comment-replies").show(), t.show(), "" == a ? s.val("") : s.val("[" + a + "] "), s.focus();
        }),
        $("body").on("click", "li.js_post-reply", function () {
            _reply(this), $(window).width() < 970 && _reply(this);
        }),
        $("body").on("click", ".js_delete-comment", function (e) {
            e.preventDefault();
            var comment = $(this).closest(".comment"),
                id = comment.data("id");
            confirm(__["Delete Comment"], __["Are you sure you want to delete this comment?"], function () {
                comment.hide(),
                    $.post(
                        api["posts/reaction"],
                        { do: "delete_comment", id: id },
                        function (response) {
                            response.callback ? eval(response.callback) : $("#modal").modal("hide");
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    });
            });
        }),
        $("body").on("click", ".js_edit-comment", function (e) {
            e.preventDefault();
            var t = $(this).closest(".comment");
            t
                .find(".comment-data:first")
                .hide()
                .after(render_template("#edit-comment", { text: t.find(".comment-text-plain:first").text() })),
                autosize(t.find(".comment-edit textarea"));
        }),
        $("body").on("click", ".js_unedit-comment", function () {
            var e = $(this).closest(".comment");
            e.find(".comment-edit").remove(), e.find(".comment-data").show();
        }),
        $("body").on("keydown", "textarea.js_update-comment", function (e) { }),
        $("body").on("click", "li.js_update-comment", function (e) {
            _update_comment(this);
        }),
        $("body").on("click", ".js_comments-filter .dropdown-item", function () {
            var _this = $(this),
                _parent = _this.parents(".post-comments"),
                comments_stream = _parent.find(".js_comments"),
                comments_loader = _parent.find(".js_comments-filter-loader"),
                comments_see_more = _parent.find(".js_see-more"),
                data = {};
            (data.get = _this.data("value")),
                (data.id = _this.data("id")),
                comments_see_more.data("get", data.get),
                comments_see_more.removeData("offset"),
                comments_stream.data("filtering", !0),
                comments_stream.html(""),
                comments_loader.show(),
                comments_see_more.hide(),
                $.post(
                    api["comments/filter"],
                    data,
                    function (response) {
                        response.callback ? eval(response.callback) : (comments_loader.hide(), comments_see_more.show(), comments_stream.removeData("filtering"), comments_stream.html(response.comments));
                    },
                    "json"
                );
        }),
        $("body").on("mouseenter", ".reactions-wrapper", function () {
            $(window).width() >= 970 && _show_reactions(this);
        }),
        $("body").on("mouseenter", ".reactions-wrapper", function () {
            $(window).width() >= 970 && _show_reactions(this);
        }),
        $("body").on("mouseleave", ".reactions-wrapper", function () {
            $(window).width() >= 970 && _hide_reactions(this);
        }),
        $("body").on("click", ".reactions-wrapper", function () {
            if ($(window).width() < 970) $(this).find(".reactions-container:first").is(":visible") ? _hide_reactions(this) : ($(".reactions-container").removeAttr("style").hide(), _show_reactions(this));
            else {
                var _this = $(this),
                    old_reaction = _this.data("reaction");
                if (old_reaction) {
                    if (_this.hasClass("js_unreact-post"))
                        var _undo = "unreact_post",
                            handle = "post",
                            _parent = _this.closest(".post, .lightbox-post, .article");
                    else if (_this.hasClass("js_unreact-photo"))
                        var _undo = "unreact_photo",
                            handle = "photo",
                            _parent = _this.closest(".post, .lightbox-post");
                    else if (_this.hasClass("js_unreact-comment"))
                        var _undo = "unreact_comment",
                            handle = "comment",
                            _parent = _this.closest(".comment");
                    var id = _parent.data("id"),
                        reactions_wrapper = _parent.find(".reactions-wrapper:first");
                    reactions_wrapper.removeClass("js_unreact-" + handle),
                        reactions_wrapper.data("reaction", ""),
                        _parent.find(".reaction-btn-name:first").text(__.Like).removeClass("blue red yellow orange"),
                        _parent.find(".reaction-btn-icon:first").html('<i class="icon-post icon_like"></i>'),
                        _parent.find(".reactions-container:visible").removeAttr("style").hide(),
                        $.post(
                            api["posts/reaction"],
                            { do: _undo, reaction: old_reaction, id: id },
                            function (response) {
                                response.callback && eval(response.callback);
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }
            }
        }),
        $("body").on("click", function (e) {
            $(e.target).hasClass("reactions-wrapper") || $(e.target).parents(".reactions-wrapper").length > 0 || $(".reactions-container").removeAttr("style").hide();
        });
    var prevTop = 0;
    $(window).scroll(function (e) {
        var t = $(this).scrollTop();
        prevTop !== t && ((prevTop = t), $(".reactions-container").removeAttr("style").hide());
    }),
        $("body").on("click", ".js_react-post, .js_react-photo, .js_react-comment", function (e) {
            e.stopPropagation();
            var _this = $(this),
                reaction = _this.data("reaction"),
                reaction_color = _this.data("reaction-color"),
                reaction_title = _this.data("title"),
                reaction_html = _this.html();
            if (_this.hasClass("js_react-post"))
                var _do = "react_post",
                    _undo = "unreact_post",
                    handle = "post",
                    _parent = _this.closest(".post, .lightbox-post, .article");
            else if (_this.hasClass("js_react-photo"))
                var _do = "react_photo",
                    _undo = "unreact_photo",
                    handle = "photo",
                    _parent = _this.closest(".post, .lightbox-post");
            else if (_this.hasClass("js_react-comment"))
                var _do = "react_comment",
                    _undo = "unreact_comment",
                    handle = "comment",
                    _parent = _this.closest(".comment");
            var id = _parent.data("id"),
                reactions_wrapper = _parent.find(".reactions-wrapper:first"),
                old_reaction = reactions_wrapper.data("reaction");
            reactions_wrapper.hasClass("js_unreact-" + handle) && old_reaction == reaction
                ? (reactions_wrapper.removeClass("js_unreact-" + handle),
                    reactions_wrapper.data("reaction", ""),
                    _parent.find(".reaction-btn-name:first").text(__.Like).removeClass("blue red yellow orange"),
                    _parent.find(".reaction-btn-icon:first").html('<i class="icon-post icon_like"></i>'),
                    _parent.find(".reactions-container:visible").removeAttr("style").hide(),
                    $.post(
                        api["posts/reaction"],
                        { do: _undo, reaction: old_reaction, id: id },
                        function (response) {
                            response.callback && eval(response.callback);
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    }))
                : (reactions_wrapper.hasClass("js_unreact-" + handle) || reactions_wrapper.addClass("js_unreact-" + handle),
                    reactions_wrapper.data("reaction", reaction),
                    _parent.find(".reaction-btn-name:first").text(reaction_title).removeClass("blue red yellow orange").addClass(reaction_color),
                    _parent.find(".reaction-btn-icon:first").html('<div class="inline-emoji no_animation">' + reaction_html + "</div>"),
                    _parent.find(".reactions-container:visible").removeAttr("style").hide(),
                    $.post(
                        api["posts/reaction"],
                        { do: _do, reaction: reaction, id: id },
                        function (response) {
                            response.callback && eval(response.callback);
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    }));
        }),
        $("body").on("click", ".js_translator", function () {
            if (post_translation_enabled) {
                var e = $(this),
                    t = e.closest(".post, .lightbox-post, .post-media"),
                    s = t.find(".post-text:first").text(),
                    a = $("html").attr("lang").substring(0, 2);
                is_empty(s)
                    ? e.removeClass("text-link js_translator").text(__.Translated)
                    : $.get(
                        "https://translate.yandex.net/api/v1.5/tr.json/detect",
                        { key: yandex_key, text: s },
                        function (o) {
                            a !== o.lang
                                ? $.getJSON(
                                    "https://translate.yandex.net/api/v1.5/tr.json/translate",
                                    { key: yandex_key, text: s, lang: a },
                                    function (s) {
                                        e.removeClass("text-link js_translator").text(__.Translated),
                                            t.find(".post-text-translation:first").text(s.text).show().addClass("x-notifier"),
                                            setTimeout(function () {
                                                t.find(".post-text-translation:first").removeClass("x-notifier");
                                            }, "2500");
                                    },
                                    "json"
                                ).fail(function () {
                                    modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                                })
                                : e.removeClass("text-link js_translator").text(__.Translated);
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    });
            }
        }),
        $("body").on("click", ".js_delete-album", function () {
            var id = $(this).data("id");
            confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                $.post(
                    api["albums/action"],
                    { do: "delete_album", id: id },
                    function (response) {
                        response.callback && eval(response.callback);
                    },
                    "json"
                ).fail(function () {
                    modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                });
            });
        }),
        $("body").on("click", ".js_delete-photo", function (e) {
            e.stopPropagation(), e.preventDefault();
            var _this = $(this),
                id = $(this).data("id");
            confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                $.post(
                    api["albums/action"],
                    { do: "delete_photo", id: id },
                    function (response) {
                        response.callback
                            ? eval(response.callback)
                            : (_this
                                .parents(".pg_photo")
                                .parent()
                                .fadeOut(300, function () {
                                    $(this).remove();
                                }),
                                $("#modal").modal("hide"));
                    },
                    "json"
                ).fail(function () {
                    modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                });
            });
        }),
        $("body").on("click", ".js_announcment-remover", function () {
            var announcment = $(this).parents(".alert"),
                id = announcment.data("id");
            confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                announcment.fadeOut(),
                    $.post(
                        api["posts/reaction"],
                        { do: "hide_announcement", id: id },
                        function (response) {
                            response.callback && eval(response.callback);
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    }),
                    $("#modal").modal("hide");
            });
        }),
        $("body").on("click", ".js_daytime-remover", function () {
            var daytime_message = $(this).parents(".panel");
            confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                daytime_message.fadeOut(),
                    $.post(
                        api["posts/reaction"],
                        { do: "hide_daytime_message", id: "1" },
                        function (response) {
                            response.callback && eval(response.callback), $(".daytime_message").hide();
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    }),
                    $("#modal").modal("hide");
            });
        }),
        $("body").on("click", ".js_forum-toggle", function () {
            $(this).parents(".forum-category").next(".js_forum-toggle-wrapper").slideToggle();
        }),
        $("body").on("click", ".js_delete-forum", function () {
            var id = $(this).data("id"),
                handle = $(this).data("handle");
            confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                $.post(
                    api["forums/delete"],
                    { id: id, handle: handle },
                    function (response) {
                        response.callback && eval(response.callback);
                    },
                    "json"
                ).fail(function () {
                    modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                });
            });
        }),
        (highlighted_post = 0),
        $("body").on("keypress", function (e) {
            var t = e.target.tagName.toLowerCase(),
                s = parseInt(e.which, 10);
            if (highlighted_post >= 0)
                if (106 == s && "input" != t && "textarea" != t)
                    (a = $(".js_posts_stream .post").eq(highlighted_post)).length &&
                        (a.addClass("highlighted"),
                            $("html, body").animate({ scrollTop: parseInt(a.offset().top - 41) }, 600),
                            setTimeout(function () {
                                a.removeClass("highlighted");
                            }, 500)),
                        highlighted_post++;
                else if (107 == s && "input" != t && "textarea" != t) {
                    if (0 == highlighted_post) return;
                    var a;
                    highlighted_post--,
                        (a = $(".js_posts_stream .post").eq(highlighted_post)).length &&
                        (a.addClass("highlighted"),
                            $("html, body").animate({ scrollTop: parseInt(a.offset().top - 41) }, 600),
                            setTimeout(function () {
                                a.removeClass("highlighted");
                            }, 500));
                }
        });
});