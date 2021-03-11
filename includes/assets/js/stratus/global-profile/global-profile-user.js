function initialize_modal() {
    $(".js_scroller").each(function() {
        var e = $(this),
            t = e.attr("data-slimScroll-height") || "280px",
            s = e.attr("data-slimScroll-start") || "top";
        e.parent().hasClass("custom-scrollbar"), e.parent().addClass("custom-scrollbar"), e.css({
            "overflow-y": "auto",
            height: t
        }), "bottom" == s && e.scrollTop(e.height())
    }), geolocation_enabled && $(".js_geocomplete").geocomplete(), $(".selectpicker").length > 0 && $(".selectpicker").selectpicker({
        style: "btn-outline-light"
    }), $(".js_datetimepicker").length > 0 && $(".js_datetimepicker").datetimepicker({
        format: system_datetime_format,
        locale: $("html").attr("lang").split("_", 1).toString() || "en"
    }), initialize_uploader()
}

function initialize_uploader() {
    $(".js_x-uploader").each(function(e) {
        if (!($(this).parents("form.x-uploader").length > 0)) {
            var t = "Image",
                s = void 0 !== $(this).data("multiple");
            if ("video" == $(this).data("type")) {
                var a = accpeted_video_extensions;
                t = "Video"
            } else "audio" == $(this).data("type") ? (a = accpeted_audio_extensions, t = "Audio") : "file" == $(this).data("type") ? (a = accpeted_file_extensions, t = "File") : (a = ".png, .gif, .jpeg, .jpg", t = "Image");
            $(this).before(render_template("#x-uploader", {
                url: api["data/upload"],
                secret: secret,
                multiple: s,
                accept: a,
                title: "Upload " + t
            })), $(this).prev().append($(this))
        }
    })
}

function browser_notification(e, t, s, a) {
    if ("Notification" in window)
        if ("granted" !== Notification.permission) Notification.requestPermission();
        else {
            var i = new Notification(site_title, {
                icon: e,
                body: t,
                tag: a
            });
            i.onclick = function() {
                window.open(s), i.close()
            }
        }
}

function update_location(e) {
    if (!e) return !1;
    $.post(api["users/location"], {
        latitude: e.coords.latitude,
        longitude: e.coords.longitude
    })
}

function noty_notification(e, t, s) {
    new Noty({
        type: "info",
        layout: "bottomLeft",
        progressBar: "true",
        closeWith: ["click", "button"],
        timeout: "5000",
        text: render_template("#noty-notification", {
            image: e,
            message: t
        }),
        callbacks: {
            onClick: function() {
                window.location.href = s
            }
        }
    }).show()
}

function notification_highlighter() {
    try {
        var e = new URLSearchParams(window.location.search).get("notify_id")
    } catch (t) {
        e = get_parameter_by_name("notify_id")
    }
    if (e) {
        var t = $("#" + e);
        t.length > 0 && ($("html, body").animate({
            scrollTop: t.offset().top
        }, 1e3), t.find(".js_notifier-flasher:first").addClass("x-notifier"), setTimeout(function() {
            t.find(".js_notifier-flasher:first").removeClass("x-notifier")
        }, "2500"))
    }
}

function data_heartbeat() {
    var data = {};
    data.last_request = $(".js_live-requests").find(".js_scroller li:first").data("id") || 0, data.last_message = $(".js_live-messages").find(".js_scroller li:first").data("last-message") || 0, data.last_notification = $(".js_live-notifications").find(".js_scroller li:first").data("id") || 0;
    var posts_stream = $(".js_posts_stream");
    posts_stream.length > 0 && "popular" != posts_stream.data("get") && "saved" != posts_stream.data("get") && "memories" != posts_stream.data("get") && void 0 === posts_stream.data("loading") && (data.last_post = posts_stream.find("li:first .post").data("id") || 0,
        data.get = posts_stream.data("get"),
         data.filter = posts_stream.data("filter"),
        data.id = posts_stream.data("id")),
        $.post(api["data/live"], data, function (response) {
        if (response.callback) eval(response.callback);
        else {
            if (response.requests) {
                $(".js_live-requests").find(".js_scroller ul").length > 1 ? $(".js_live-requests").find(".js_scroller ul:first").prepend(response.requests) : $(".js_live-requests").find(".js_scroller p:first").replaceWith("<ul>" + response.requests + "</ul>");
                var requests = parseInt($(".js_live-requests").find("span.counter").text()) + response.requests_count;
                $(".js_live-requests").find("span.counter").text(requests).show(), notifications_sound
            }
            if (response.conversations && ($(".js_live-messages").find(".js_scroller").html("<ul>" + response.conversations + "</ul>"), -1 != window.location.pathname.indexOf("globalMessages") && ($(".js_live-messages-alt").find(".js_scroller ul").length > 0 ? $(".js_live-messages-alt").find(".js_scroller ul").html(response.conversations) : $(".js_live-messages-alt").find(".js_scroller").html("<ul>" + response.conversations + "</ul>")), response.conversations_count > 0 ? ($(".js_live-messages").find("span.counter").text(response.conversations_count).show(), chat_sound) : $(".js_live-messages").find("span.counter").text(response.conversations_count)), response.notifications) {
                $.each(response.notifications_json, function(e, t) {
                    browser_notifications_enabled && browser_notification(t.user_picture, t.full_message, t.url, t.notification_id), noty_notifications_enabled
                }), $(".js_live-notifications").find(".js_scroller ul").length > 0 ? $(".js_live-notifications").find(".js_scroller ul").prepend(response.notifications) : $(".js_live-notifications").find(".js_scroller").html("<ul>" + response.notifications + "</ul>");
                var notifications = parseInt($(".js_live-notifications").find("span.counter").text()) + response.notifications_count;
                $(".js_live-notifications").find("span.counter").text(notifications).show(), notifications_sound
            }
            response.posts && (posts_stream.find("ul:first").prepend(response.posts), setTimeout(photo_grid(), 200)), setTimeout("data_heartbeat();", 500)
        }
    }, "json")
}

function init_picture_crop(e) {
    setTimeout(function() {
        $("#cropped-profile-picture").rcrop({
            minSize: [200, 200],
            preserveAspectRatio: !0,
            grid: !0
        })
    }, 200);

    var image_node = e.data("image");
    var system_url = e.data("systemUrl");

    modal("#crop-profile-picture", {
        image: `${system_url}/includes/wallet-api/get-picture-api.php?picture=${image_node}&pictureFull=&type_url=1`,
        handle: e.data("handle"),
        id: e.data("id")
    })
}

function init_picture_position() {
    $(".profile-cover-change").hide(), $(".profile-cover-position").hide(), $(".profile-cover-delete").hide(), $(".profile-buttons-wrapper").hide(), $(".js_position-cover-cropped").hide(), $(".profile-cover-position-loader").show(), $(".profile-cover-position-buttons").show(), $(".js_position-cover-full").show();
    var e = $(".js_position-cover-cropped").data("init-position");
    $(".profile-cover-wrapper").imagedrag({
        position: e,
        input: ".js_position-picture-val"
    })
}
api["data/live"] = ajax_path + "data/global-profile/global-profile-live.php", api["data/upload"] = ajax_path + "data/global-profile/global-profile-upload.php", api["data/reset"] = ajax_path + "data/reset.php", api["data/report"] = ajax_path + "data/report.php", api["users/image_delete"] = ajax_path + "users/global-profile/image_delete.php", api["users/image_crop"] = ajax_path + "users/global-profile/image_crop.php", api["users/image_position"] = ajax_path + "users/global-profile/image_position.php", api["users/connect"] = ajax_path + "users/global-connect.php", api["users/delete"] = ajax_path + "users/delete.php", api["users/session"] = ajax_path + "users/session.php", api["users/location"] = ajax_path + "users/location.php", api["users/notifications"] = ajax_path + "users/push_notifications.php", api["users/popover"] = ajax_path + "users/global-popover.php", api["users/mention"] = ajax_path + "users/mention.php", api["users/settings"] = ajax_path + "users/settings.php", api["users/autocomplete"] = ajax_path + "users/global-profile/autocomplete.php", api["pages_groups_events/delete"] = ajax_path + "pages_groups_events/delete.php", api["ads/campaign"] = ajax_path + "ads/campaign.php", api["developers/app"] = ajax_path + "developers/app.php", $(function() {
    $(".js_slick").length > 0 && $(".js_slick").slick({
        rtl: theme_dir_rtl,
        centerMode: !0,
        centerPadding: "0",
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: !0,
        autoplaySpeed: 2e3,
        arrows: !1,
        speed: 900,
        responsive: [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 5
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 5
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 5
            }
        }, {
            breakpoint: 420,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 340,
            settings: {
                slidesToShow: 3
            }
        }]
    }), $(".js_dataTable").length > 0 && $(".js_dataTable").DataTable({
        language: {
            processing: __["Processing..."],
            search: __["Search:"],
            lengthMenu: __["Show _MENU_ entries"],
            info: __["Showing _START_ to _END_ of _TOTAL_ entries"],
            infoEmpty: __["Showing 0 to 0 of 0 entries"],
            infoFiltered: __["(filtered from _MAX_ total entries)"],
            infoPostFix: "",
            loadingRecords: __["Loading..."],
            zeroRecords: __["No matching records found"],
            emptyTable: __["No data available in table"],
            paginate: {
                first: __.First,
                previous: __.Previous,
                next: __.Next,
                last: __.Last
            },
            aria: {
                sortAscending: __[": activate to sort column ascending"],
                sortDescending: __[": activate to sort column descending"]
            }
        }
    }), geolocation_enabled && $(".js_geocomplete").geocomplete(), $(".js_datetimepicker").length > 0 && $(".js_datetimepicker").datetimepicker({
        format: system_datetime_format,
        locale: $("html").attr("lang").split("_", 1).toString() || "en"
    }), $(".selectpicker").length > 0 && $(".selectpicker").selectpicker({
        style: "btn-outline-light"
    }), $(".js_wysiwyg").length > 0 && (tinymce_photos_enabled ? tinymce.init({
        selector: ".js_wysiwyg",
        directionality: system_langauge_dir,
        language: system_langauge_code,
        branding: !1,
        height: 300,
        relative_urls: !1,
        convert_urls: !0,
        remove_script_host: !1,
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image  uploadImages |  preview media fullpage | forecolor backcolor | ltr rtl",
        plugins: ["advlist autolink link image  lists charmap  preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table directionality template paste"],
        image_advtab: !0,
        paste_data_images: !0,
        images_upload_handler: function(e, t, s) {
            var a, i;
            (a = new XMLHttpRequest).withCredentials = !0, a.open("POST", api["data/upload"]), a.setRequestHeader("X-Requested-With", "XMLHttpRequest"), a.onload = function() {
                var e;
                200 == a.status ? (e = JSON.parse(a.responseText)) && "string" != typeof e.error ? t(uploads_path + "/" + e.file) : s(e.error) : s("HTTP Error: " + a.status)
            }, (i = new FormData).append("handle", "tinymce"), i.append("type", "photos"), i.append("multiple", "false"), i.append("secret", secret), i.append("file", e.blob(), e.filename()), a.send(i)
        }
    }) : tinymce.init({
        selector: ".js_wysiwyg",
        directionality: system_langauge_dir,
        language: system_langauge_code,
        branding: !1,
        height: 300,
        relative_urls: !1,
        convert_urls: !0,
        remove_script_host: !1,
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image  uploadImages |  preview media fullpage | forecolor backcolor | ltr rtl",
        plugins: ["advlist autolink link image  lists charmap  preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table directionality template paste"]
    })), $(".js_wysiwyg-advanced").length > 0 && tinymce.init({
        selector: ".js_wysiwyg-advanced",
        directionality: system_langauge_dir,
        language: system_langauge_code,
        branding: !1,
        height: 300,
        relative_urls: !1,
        convert_urls: !0,
        remove_script_host: !1,
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image  uploadImages |  preview media fullpage | forecolor backcolor | ltr rtl",
        plugins: ["advlist autolink link image  lists charmap  preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table directionality template paste"],
        extended_valid_elements: "script[src|async|defer|type|charset]",
        image_advtab: !0,
        paste_data_images: !0,
        images_upload_handler: function(e, t, s) {
            var a, i;
            (a = new XMLHttpRequest).withCredentials = !0, a.open("POST", api["data/upload"]), a.setRequestHeader("X-Requested-With", "XMLHttpRequest"), a.onload = function() {
                var e;
                200 == a.status ? (e = JSON.parse(a.responseText)) && "string" != typeof e.error ? t(uploads_path + "/" + e.file) : s(e.error) : s("HTTP Error: " + a.status)
            }, (i = new FormData).append("handle", "tinymce"), i.append("type", "photos"), i.append("multiple", "false"), i.append("secret", secret), i.append("file", e.blob(), e.filename()), a.send(i)
        }
    }), browser_notifications_enabled && "Notification" in window && "granted" !== Notification.permission && Notification.requestPermission(), navigator.geolocation && navigator.geolocation.getCurrentPosition(update_location), notification_highlighter(), data_heartbeat(), $("body").on("click", ".js_autocomplete", function() {
        $(this).find("input").focus()
    }), $("body").on("keyup", ".js_autocomplete input", function() {
        var _this = $(this),
            query = _this.val(),
            parent = _this.parents(".js_autocomplete");
        if ("" != query) {
            if (0 == _this.next(".dropdown-menu").length) {
                var offset = _this.offset(),
                    posX = offset.left - $(window).scrollLeft();
                $(window).width() - posX < 180 ? _this.after('<div class="dropdown-menu auto-complete tl"></div>') : _this.after('<div class="dropdown-menu auto-complete"></div>')
            }
            $.post(api["users/autocomplete"], {
                type: "single",
                query: query
            }, function(response) {
                response.callback ? eval(response.callback) : response.autocomplete && _this.next(".dropdown-menu").show().html(response.autocomplete)
            }, "json")
        } else _this.next(".dropdown-menu").length > 0 && _this.next(".dropdown-menu").hide()
    }), $("body").on("click focus", ".js_autocomplete input", function() {
        "" != $(this).val() && $(this).next(".dropdown-menu").find("li").length > 0 && $(this).next(".dropdown-menu").show()
    }), $("body").on("click", function(e) {
        $(e.target).is(".js_autocomplete") || $(".js_autocomplete .dropdown-menu").hide()
    }), $("body").on("click", ".js_autocomplete-add", function() {
        var e = $(this).data("uid"),
            t = $(this).data("name"),
            s = $(this).parents(".js_autocomplete");
        s.find("input").val(t).data("uid", e), s.find('input[type="hidden"]').val(e)
    }), $("body").on("click", ".js_autocomplete-tags", function() {
        $(this).find("input").focus()
    }), $("body").on("keyup", ".js_autocomplete-tags input", function() {
        var _this = $(this),
            query = _this.val(),
            parent = _this.parents(".js_autocomplete-tags");
        if (prev_length = _this.data("length") || 0, new_length = query.length, new_length > prev_length && _this.width() < 250 ? _this.width(_this.width() + 6) : new_length < prev_length && _this.width(_this.width() - 6), _this.data("length", query.length), !(parent.find("ul.tags li").length > 9))
            if ("" != query) {
                if (0 == _this.next(".dropdown-menu").length) {
                    var offset = _this.offset(),
                        posX = offset.left - $(window).scrollLeft();
                    $(window).width() - posX < 180 ? _this.after('<div class="dropdown-menu auto-complete tl"></div>') : _this.after('<div class="dropdown-menu auto-complete"></div>')
                }
                var skipped_ids = [];
                $.each(parent.find("ul.tags li"), function(e, t) {
                    skipped_ids.push($(t).data("uid"))
                }), $.post(api["users/autocomplete"], {
                    type: "tags",
                    query: query,
                    skipped_ids: JSON.stringify(skipped_ids)
                }, function(response) {
                    response.callback ? eval(response.callback) : response.autocomplete && _this.next(".dropdown-menu").show().html(response.autocomplete)
                }, "json")
            } else _this.next(".dropdown-menu").length > 0 && _this.next(".dropdown-menu").hide()
    }), $("body").on("click focus", ".js_autocomplete-tags input", function() {
        $(this).parents(".js_autocomplete-tags").find("ul.tags li").length > 9 || "" != $(this).val() && $(this).next(".dropdown-menu").find("li").length > 0 && $(this).next(".dropdown-menu").show()
    }), $("body").on("click", function(e) {
        $(e.target).is(".js_autocomplete-tags") || $(".js_autocomplete-tags .dropdown-menu").hide()
    }), $("body").on("click", ".js_tag-add", function() {
        var e = $(this).data("uid"),
            t = $(this).data("name"),
            s = $(this).parents(".js_autocomplete-tags"),
            a = '<li data-uid="' + e + '">' + t + '<button type="button" class="close js_tag-remove" title="' + __.Remove + '"><span>&times;</span></button></li>';
        s.find(".tags").append(a), s.find("input").val("").focus(), s.siblings(".chat-form").length > 0 && (0 == s.find("ul.tags li").length ? s.siblings(".chat-form").hasClass("invisible") || s.siblings(".chat-form").addClass("invisible") : s.siblings(".chat-form").removeClass("invisible"))
    }), $("body").on("click", ".js_tag-remove", function() {
        var e = $(this).parents("li"),
            t = $(this).parents(".js_autocomplete-tags");
        return e.remove(), t.siblings(".chat-form").length > 0 && (0 == t.find("ul.tags li").length ? t.siblings(".chat-form").hasClass("invisible") || t.siblings(".chat-form").addClass("invisible") : t.siblings(".chat-form").removeClass("invisible")), !1
    }), $("body").on("focus", ".js_mention", function() {
        $(this).triggeredAutocomplete({
            hidden: "#hidden_inputbox",
            source: api["users/mention"],
            trigger: "@",
            maxLength: 20
        })
    }), $("body").on("mouseenter", ".js_user-popover", function() {
        if (!($(window).width() < 751)) {
            var _this = $(this),
                uid = _this.data("uid"),
                type = _this.data("type") || "user",
                _timeout = setTimeout(function() {
                    var offset = _this.offset(),
                        posY = offset.top - $(window).scrollTop() + _this.height(),
                        posX = offset.left - $(window).scrollLeft();
                    if ("RTL" == $("html").attr("dir")) {
                        var available = posX + _this.width();
                        if (available < 400) $("body").append('<div class="user-popover-wrapper tl" style="position: fixed; top: ' + posY + "px; left:" + posX + 'px"><div class="user-popover-content ptb10 plr10"><div class="loader loader_small"></div></div></div>');
                        else {
                            var right = $(window).width() - available;
                            $("body").append('<div class="user-popover-wrapper tr" style="position: fixed; top: ' + posY + "px; right:" + right + 'px"><div class="user-popover-content ptb10 plr10"><div class="loader loader_small"></div></div></div>')
                        }
                    } else {
                        var available = $(window).width() - posX;
                        if (available < 400) {
                            var right = available - _this.width();
                            $("body").append('<div class="user-popover-wrapper tl" style="position: fixed; top: ' + posY + "px; right:" + right + 'px"><div class="user-popover-content ptb10 plr10"><div class="loader loader_small"></div></div></div>')
                        } else $("body").append('<div class="user-popover-wrapper tr" style="position: fixed; top: ' + posY + "px; left:" + posX + 'px"><div class="user-popover-content ptb10 plr10"><div class="loader loader_small"></div></div></div>')
                    }
                    $.getJSON(api["users/popover"], {
                        type: type,
                        uid: uid
                    }, function(response) {
                        response.callback ? eval(response.callback) : response.popover && $(".user-popover-wrapper").html(response.popover)
                    })
                }, 1e3);
            _this.data("timeout", _timeout)
        }
    }), $("body").on("mouseleave", ".js_user-popover", function(e) {
        var t = e.toElement || e.relatedTarget;
        $(t).is(".user-popover-wrapper") || (clearTimeout($(this).data("timeout")), $(".user-popover-wrapper").remove())
    }), $("body").on("mouseleave", ".user-popover-wrapper", function() {
        $(".user-popover-wrapper").remove()
    }), initialize_uploader(), $(document).ajaxComplete(function() {
        initialize_uploader()
    }), $("body").on("change", '.x-uploader input[type="file"]', function() {
        $(this).parent(".x-uploader").submit()
    }), $("body").on("submit", ".x-uploader", function(e) {
        $("body .js_publisher").prop("disabled", !0), e.preventDefault;
        var t = {
                dataType: "json",
                uploadProgress: function(e) {
                    s.prop("disabled", !0);
                    var t = parseInt(e.loaded / e.total * 100);
                    p && p.find(".progress-bar").css("width", t + "%").attr("aria-valuenow", t)
                },
                success: function(e) {
                    if (s.prop("disabled", !1), p && p.hide(), e.callback) "publisher" == i ? (("photos" == a && jQuery.isEmptyObject(f.data("photos")) || "photos" != a) && (d.hide(), f.removeData(a), publisher_tab(f, a)), p && p.remove(), button_status(r, "reset")) : "publisher-mini" == i && button_status(r, "reset");
                    else if ("photos" == a) {
                        if ("cover-user" == i || "cover-page" == i || "cover-group" == i || "cover-event" == i) {
                            var t = uploads_path + "/" + e.file,
                                o = $(".profile-cover-wrapper img");
                            0 == o.length ? ($(".profile-cover-wrapper").prepend("<img class='js_position-cover-cropped' data-init-position='0px' src='" + t + "' />"), $(".profile-cover-wrapper").prepend("<img class='js_position-cover-full x-hidden' src='" + t + "' />")) : (o.attr("src", t), o.removeClass("js_lightbox").removeAttr("data-id").removeAttr("data-image").removeAttr("data-context")), setTimeout(function() {
                                init_picture_position()
                            }, 1e3)
                        } else if ("picture-user" == i || "picture-page" == i || "picture-group" == i) {
                            t = uploads_path + "/" + e.file;
                            $(".profile-avatar-wrapper img").attr("src", t), $(".js_init-crop-picture").data("image", t), init_picture_crop($(".js_init-crop-picture"))
                        } else if ("publisher" == i) {
                            p && p.remove();
                            var n = f.data("photos");
                            for (var l in 0 == d.find("ul").length && d.append("<ul></ul>"), e.files) {
                                n[e.files[l].source] = e.files[l];
                                t = uploads_path + "/" + e.files[l].source;
                                d.find("ul").append(render_template("#publisher-attachments-image-item", {
                                    src: e.files[l].source,
                                    image_path: t
                                }))
                            }
                            f.data("photos", n), f.find('.js_publisher-tab[data-tab="' + a + '"]').addClass("activated"), button_status(r, "reset"), $("body .js_publisher").prop("disabled", !1), "" != $("body #album_meta").val() && ($("body .publisher-slider #album-publisher").removeAttr("style"), $("body .publisher-slider #album-publisher").css("display", "block"))
                        } else if ("publisher-mini" == i) {
                            $(".ajax-story-publisher-form").addClass("stratus_story_popup"), p && p.remove();
                            n = f.data("photos");
                            for (var l in 0 == d.find("ul").length && d.append("<ul></ul>"), e.files) {
                                n[e.files[l].source] = e.files[l];
                                t = uploads_path + "/" + e.files[l].source;
                                d.find("ul").append(render_template("#publisher-attachments-image-item", {
                                    src: e.files[l].source,
                                    image_path: t,
                                    mini: !0
                                }))
                            }
                            f.data("photos", n), button_status(r, "reset"), $("body .js_publisher").prop("disabled", !1), "" != $("body #album_meta").val() && ($("body .publisher-slider #album-publisher").removeAttr("style"), $("body .publisher-slider #album-publisher").css("display", "block"))
                        } else if ("comment" == i) {
                            u.data("photos", e.file), u.find(".x-form-tools-attach").hide(), u.find(".x-form-tools-voice").hide();
                            t = uploads_path + "/" + e.file;
                            d.find("ul").append(render_template("#comment-attachments-item", {
                                src: e.file,
                                image_path: t
                            }))
                        } else if ("chat" == i) {
                            _.data("photo", e.file), _.find(".x-form-tools-attach").hide(), _.find(".x-form-tools-voice").hide();
                            t = uploads_path + "/" + e.file;
                            d.find("ul").append(render_template("#chat-attachments-item", {
                                src: e.file,
                                image_path: t
                            }))
                        } else if ("x-image" == i) {
                            t = uploads_path + "/" + e.file;
                            h.css("background-image", "url(" + t + ")"), h.find(".js_x-image-input").val(e.file).change(), h.find("button").show()
                        }
                    } else if ("video" == a)
                        if ("publisher" == i) {
                            d.hide(), p && p.remove(), $('.publisher-meta[data-meta="' + a + '"]').show(), $(".publisher-custom-thumbnail").show(), (c = f.data(a)).source = e.files[0], console.log("########## ", c.source), f.data(a, c), f.find('.js_publisher-tab[data-tab="' + a + '"]').addClass("activated"), button_status(r, "reset"), $("body .js_publisher").prop("disabled", !1), "" != $("body #album_meta").val() && ($("body .publisher-slider #album-publisher").removeAttr("style"), $("body .publisher-slider #album-publisher").css("display", "block"))
                        } else if ("publisher-mini" == i) {
                        $(".ajax-story-publisher-form").addClass("stratus_story_popup"), p && p.remove();
                        n = f.data(a);
                        for (var l in 0 == d.find("ul").length && d.append("<ul></ul>"), e.files) n[e.files[l]] = e.files[l], d.find("ul").append(render_template("#publisher-attachments-video-item", {
                            src: e.files[l],
                            name: m[l]
                        }));
                        f.data(a, n), button_status(r, "reset"), $("body .js_publisher").prop("disabled", !1), "" != $("body #album_meta").val() && ($("body .publisher-slider #album-publisher").removeAttr("style"), $("body .publisher-slider #album-publisher").css("display", "block"))
                    } else "x-video" == i && (h.find(".x-image-success").show(), h.find(".js_x-image-input").val(e.file), h.find("button").show());
                    else if (("audio" == a || "file" == a) && "publisher" == i) {
                        var c;
                        d.hide(), p && p.remove(), $('.publisher-meta[data-meta="' + a + '"]').show(), (c = f.data(a)).source = e.file, f.data(a, c), f.find('.js_publisher-tab[data-tab="' + a + '"]').addClass("activated"), button_status(r, "reset"), $("body .js_publisher").prop("disabled", !1), "" != $("body #album_meta").val() && ($("body .publisher-slider #album-publisher").removeAttr("style"), $("body .publisher-slider #album-publisher").css("display", "block"))
                    }
                },
                error: function() {
                    s.prop("disabled", !1), p && p.hide(), "publisher" == i ? (("photos" == a && jQuery.isEmptyObject(f.data("photos")) || "photos" != a) && (d.hide(), f.removeData(a), publisher_tab(f, a)), p && p.remove(), button_status(r, "reset")) : "publisher-mini" == i && button_status(r, "reset"), modal("#modal-message", {
                        title: __.Error,
                        message: __["There is something that went wrong!"]
                    })
                },
                resetForm: !0,
                data: {}
            },
            s = $(this).find('input[type="file"]'),
            a = $(this).find(".js_x-uploader").data("type") || "photos";
        t.data.type = a;
        var i = $(this).find(".js_x-uploader").data("handle");
        if (void 0 === i) return !1;
        t.data.handle = i;
        var o = void 0 !== $(this).find(".js_x-uploader").data("multiple");
        t.data.multiple = o;
        var n = $(this).find(".js_x-uploader").data("id");
        if (void 0 !== n && (t.data.id = n), "photos" == a) {
            if ("cover-user" == i || "cover-page" == i || "cover-group" == i || "cover-event" == i)(p = $(".profile-cover-change-loader")).show();
            else if ("picture-user" == i || "picture-page" == i || "picture-group" == i)(p = $(".profile-avatar-change-loader")).show();
            else if ("publisher" == i) {
                var r = (f = $(this).parents(".publisher")).find(".js_publisher-btn"),
                    l = s.get(0).files.length;
                if (f.data("scrabing") || f.data("video") || f.data("audio") || f.data("file")) return !1;
                f.data("photos") || f.data("photos", {});
                var d = f.find(".attachments"),
                    p = $("<ul></ul>").appendTo(d);
                d.show();
                for (var c = 0; c < l; ++c) $('<li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li>').appendTo(p).show();
                jQuery.isEmptyObject(f.data("photos")) && publisher_tab(f, a), button_status(r, "loading")
            } else if ("publisher-mini" == i) {
                for (r = (f = $(this).parents(".publisher-mini")).find(".js_publisher-btn"), l = s.get(0).files.length, f.data("photos") || f.data("photos", {}), d = f.find('.attachments[data-type="photos"]'), p = $("<ul></ul>").appendTo(d), c = 0; c < l; ++c) $('<li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li>').appendTo(p).show();
                button_status(r, "loading")
            } else if ("comment" == i) {
                var u = $(this).parents(".comment");
                if (u.data("photos")) return !1;
                p = (d = u.find(".comment-attachments")).find("li.loading"), d.show(), p.show(), u.find(".x-form-tools-attach").hide(), u.find(".x-form-tools-voice").hide()
            } else if ("chat" == i) {
                var _ = $(this).parents(".chat-widget, .panel-messages");
                if (_.data("photo")) return !1;
                p = (d = _.find(".chat-attachments")).find("li.loading"), d.show(), p.show(), _.find(".x-form-tools-attach").hide(), _.find(".x-form-tools-voice").hide()
            } else if ("x-image" == i) {
                var h = $(this).parents(".x-image");
                (p = h.find(".x-image-loader")).show()
            }
        } else if ("video" == a)
            if ("publisher" == i) {
                if (r = (f = $(this).parents(".publisher")).find(".js_publisher-btn"), f.data("scrabing") || f.data("photos") || f.data("video") || f.data("audio") || f.data("file")) return !1;
                f.data(a, {}), d = f.find(".attachments"), p = $("<ul></ul>").appendTo(d), d.show(), $('<li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li>').appendTo(p).show(), publisher_tab(f, a), button_status(r, "loading")
            } else if ("publisher-mini" == i) {
            r = (f = $(this).parents(".publisher-mini")).find(".js_publisher-btn"), l = s.get(0).files.length, f.data(a) || f.data(a, {}), d = f.find('.attachments[data-type="videos"]'), p = $("<ul></ul>").appendTo(d);
            var m = [];
            for (c = 0; c < l; ++c) m[c] = s.get(0).files[c].name, $('<li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li>').appendTo(p).show();
            button_status(r, "loading")
        } else "x-video" == i && (h = $(this).parents(".x-image"), (p = h.find(".x-image-loader")).show());
        else if ("audio" == a || "file" == a) {
            if ("publisher" == i) {
                var f;
                if (r = (f = $(this).parents(".publisher")).find(".js_publisher-btn"), f.data("scrabing") || f.data("photos") || f.data("video") || f.data("audio") || f.data("file")) return !1;
                f.data(a, {}), d = f.find(".attachments"), p = $("<ul></ul>").appendTo(d), d.show(), $('<li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li>').appendTo(p).show(), publisher_tab(f, a), button_status(r, "loading")
            }
            $("body .js_publisher").prop("disabled", !1), "" != $("body #album_meta").val() && ($("body .publisher-slider #album-publisher").removeAttr("style"), $("body .publisher-slider #album-publisher").css("display", "block"))
        }
        return $(this).ajaxSubmit(t), !1
    }), $("body").on("click", ".js_delete-cover, .js_delete-picture", function(e) {
        e.stopPropagation();
        var id = $(this).data("id"),
            handle = $(this).data("handle"),
            remove = $(this).hasClass("js_delete-cover") ? "cover" : "picture";
        if ("cover" == remove) var wrapper = $(".profile-cover-wrapper"),
            _title = __["Delete Cover"],
            _message = __["Are you sure you want to remove your cover photo?"];
        else var wrapper = $(".profile-avatar-wrapper"),
            _title = __["Delete Picture"],
            _message = __["Are you sure you want to remove your profile picture?"];
        confirm(_title, _message, function() {
            $.post(api["users/image_delete"], {
                handle: handle,
                id: id
            }, function(response) {
                response.callback ? eval(response.callback) : ("cover" == remove ? (wrapper.find(".profile-cover-delete").hide(), wrapper.find(".profile-cover-position").hide(), wrapper.find("img").remove()) : (wrapper.find(".profile-avatar-delete").hide(), wrapper.find(".profile-avatar-crop").hide(), wrapper.find("img").removeClass("js_lightbox").removeAttr("data-id").removeAttr("data-image").removeAttr("data-context"), wrapper.find("img").attr("src", response.file)), $("#modal").modal("hide"))
            }, "json").fail(function() {
                modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        })
    }), $("body").on("click", ".js_x-image-remover", function() {
        var e = $(this),
            t = e.parents(".x-image");
        confirm(__.Delete, __["Are you sure you want to delete this?"], function() {
            t.attr("style", ""), t.find(".js_x-image-input").val("").change(), e.hide(), t.find(".x-image-success").attr("style", ""), $("#modal").modal("hide")
        })
    }), $("body").on("click", ".js_init-crop-picture", function() {
        init_picture_crop($(this))
    }), $("body").on("click", ".js_crop-picture", function() {
        var id = $(this).data("id"),
            handle = $(this).data("handle"),
            values = $("#cropped-profile-picture").rcrop("getValues");
        $.post(api["users/image_crop"], {
            handle: handle,
            id: id,
            x: values.x,
            y: values.y,
            height: values.height,
            width: values.width
        }, function(response) {
            response.callback ? eval(response.callback) : ($("#modal").modal("hide"), window.location.reload())
        }, "json").fail(function() {
            modal("#modal-message", {
                title: __.Error,
                message: __["There is something that went wrong!"]
            })
        })
    }), $("body").on("click", ".js_init-position-picture", function() {
        init_picture_position()
    }), $("body").on("click", ".js_save-position-picture", function() {
        var handle = $(".js_init-position-picture").data("handle"),
            id = $(".js_init-position-picture").data("id"),
            position = $(".js_position-picture-val").val();
        $.post(api["users/image_position"], {
            handle: handle,
            id: id,
            position: position
        }, function(response) {
            response.callback ? eval(response.callback) : ($("#modal").modal("hide"), window.location.reload())
        }, "json").fail(function() {
            modal("#modal-message", {
                title: __.Error,
                message: __["There is something that went wrong!"]
            })
        })
    })
}), $("body").on("click", ".js_friend-add, .js_friend-cancel, .js_friend-remove", function() {
    var _this = $(this),
        id = _this.data("uid"),
        _do = "";
    if (_this.hasClass("js_unfollow")) var _do = "follow";
    else if (_this.hasClass("js_follow")) var _do = "unfollow";
    else var _do = "unfollow";
    button_status(_this, "loading"), $.post(api["users/connect"], {
        do: _do,
        id: id
    }, function(response) {
        response.callback ? (button_status(_this, "reset"), eval(response.callback)) : (button_status(_this, "reset"), "follow" == _do ? _this.after('<button type="button" class="btn  btn-warning js_unfollow" data-uid="' + id + '"><i class="fa fa-rss mr5"></i>' + __.Unfollow + "</button>") : _this.after('<button type"button" class="btn  btn-success js_follow" data-uid="' + id + '"><i class="fa fa-check mr5"></i>' + __.Follow + "</button>"), _this.remove())
    }, "json").fail(function() {
        button_status(_this, "reset"), modal("#modal-message", {
            title: __.Error,
            message: __["There is something that went wrong!"]
        })
    })
}), $("body").on("click", ".js_follow, .js_unfollow", function() {
    var _this = $(this),
        id = _this.data("uid"),
        _do = _this.hasClass("js_follow") ? "follow" : "unfollow";
    if (button_status(_this, "loading"), $.post(api["users/connect"], {
            do: _do,
            id: id
        }, function(response) {
            response.callback ? (button_status(_this, "reset"), eval(response.callback)) : "follow" == _do ? _this.replaceWith('<button type="button" title="Follow"  class="btn  btn-info js_unfollow" data-uid="' + id + '"><i class="fa fa-check mr5"></i>' + __.Following + "</button>") : _this.replaceWith('<button type="button" title="Unfollow"  class="btn  btn-info js_follow" data-uid="' + id + '"><i class="fa fa-rss mr5"></i>' + __.Follow + "</button>")
        }, "json").fail(function() {
            button_status(_this, "reset"), modal("#modal-message", {
                title: __.Error,
                message: __["There is something that went wrong!"]
            })
        }), $("body").on("show.bs.dropdown", ".js_live-requests, .js_live-messages, .js_live-notifications", function() {
            var _this = $(this),
                counter = parseInt(_this.find("span.counter").text()) || 0;
            if (counter > 0) {
                if (_this.find("span.counter").text("0").hide(), _this.hasClass("js_live-requests")) var data = {
                    reset: "friend_requests"
                };
                else if (_this.hasClass("js_live-messages")) var data = {
                    reset: "messages"
                };
                else if (_this.hasClass("js_live-notifications")) var data = {
                    reset: "notifications"
                };
                $.post(api["data/reset"], data, function(response) {
                    response && response.callback && eval(response.callback)
                }, "json").fail(function() {
                    modal("#modal-message", {
                        title: __.Error,
                        message: __["There is something that went wrong!"]
                    })
                })
            }
        }), $("body").on("click", ".js_notifications-sound-toggle", function() {
            notifications_sound = $(this).is(":checked"), $.get(api["users/settings"], {
                edit: "notifications_sound"
            }, function(response) {
                response && response.callback && eval(response.callback)
            }, "json").fail(function() {
                modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_friend-accept, .js_friend-decline", function() {
            var id = $(this).data("uid"),
                parent = $(this).parent(),
                accept = parent.find(".js_friend-accept"),
                decline = parent.find(".js_friend-decline"),
                _do = $(this).hasClass("js_friend-accept") ? "friend-accept" : "friend-decline";
            accept.hide(), decline.hide(), parent.append('<div class="loader loader_medium pr10"></div>'), $.post(api["users/connect"], {
                do: _do,
                id: id
            }, function(response) {
                response.callback ? (parent.find(".loader").remove(), accept.show(), decline.show(), eval(response.callback)) : (parent.find(".loader").remove(), accept.remove(), decline.remove(), "friend-accept" == _do && parent.append('<button type="button" class="btn  btn-success btn-delete js_friend-remove" data-uid="' + id + '"><i class="fa fa-check mr5"></i>' + __.Friends + "</button>"))
            }, "json").fail(function() {
                parent.find(".loader").remove(), accept.show(), decline.show(), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_friend-add, .js_friend-cancel, .js_friend-remove", function() {
            var _this = $(this),
                id = _this.data("uid"),
                _do = "";
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: _do,
                id: id
            }, function(response) {
                var originVar = window.location.host,
                    locationPage = "";
                locationPage = "localhost" == originVar ? window.location.origin + "/sngine" : window.location.origin, response.callback && (button_status(_this, "reset"), eval(response.callback))
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_follow, .js_unfollow", function() {
            var _this = $(this),
                id = _this.data("uid"),
                _do = _this.hasClass("js_follow") ? "follow" : "unfollow";
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: _do,
                id: id
            }, function(response) {
                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : "follow" == _do ? _this.replaceWith('<button type="button" title="Follow"  class="btn  btn-info js_unfollow" data-uid="' + id + '"><i class="fa fa-check mr5"></i>' + __.Following + "</button>") : _this.replaceWith('<button type="button" title="Unfollow"  class="btn  btn-info js_follow" data-uid="' + id + '"><i class="fa fa-rss mr5"></i>' + __.Follow + "</button>")
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_block-user", function(e) {
            e.preventDefault();
            var id = $(this).data("uid");
            confirm(__["Block User"], __["Are you sure you want to block this user?"], function() {
                $.post(api["users/connect"], {
                    do: "block",
                    id: id
                }, function(response) {
                    response.callback ? eval(response.callback) : window.location = site_path
                }, "json").fail(function() {
                    modal("#modal-message", {
                        title: __.Error,
                        message: __["There is something that went wrong!"]
                    })
                })
            })
        }), $("body").on("click", ".js_unblock-user", function(e) {
            e.preventDefault();
            var id = $(this).data("uid");
            confirm(__["Unblock User"], __["Are you sure you want to unblock this user?"], function() {
                $.post(api["users/connect"], {
                    do: "unblock",
                    id: id
                }, function(response) {
                    response.callback ? eval(response.callback) : window.location.reload()
                }, "json").fail(function() {
                    modal("#modal-message", {
                        title: __.Error,
                        message: __["There is something that went wrong!"]
                    })
                })
            })
        }), $("body").on("click", ".js_delete-user", function(e) {
            e.preventDefault(), confirm(__.Delete, __["Are you sure you want to delete your account?"], function() {
                $.post(api["users/delete"], function(response) {
                    response.callback ? eval(response.callback) : window.location = site_path
                }, "json").fail(function() {
                    modal("#modal-message", {
                        title: __.Error,
                        message: __["There is something that went wrong!"]
                    })
                })
            })
        }), $("body").on("click", ".js_poke", function() {
            var _this = $(this),
                id = _this.data("id"),
                name = _this.data("name");
            $.post(api["users/connect"], {
                do: "poke",
                id: id
            }, function(response) {
                _this.remove(), response.callback ? eval(response.callback) : modal("#modal-message", {
                    title: __.Message,
                    message: __["You haved poked"] + " " + name
                })
            }, "json").fail(function() {
                modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_like-page, .js_unlike-page", function() {
            var _this = $(this),
                id = _this.data("id"),
                _do = _this.hasClass("js_like-page") ? "page-like" : "page-unlike";
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: _do,
                id: id
            }, function(response) {
                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : "page-like" == _do ? _this.replaceWith('<button type="button" class="btn js_unlike-page" data-id="' + id + '"><i class="fa fa-thumbs-up mr5"></i>' + __.Unlike + "</button>") : _this.replaceWith('<button type="button" class="btn js_like-page" data-id="' + id + '"><i class="fa fa-thumbs-up mr5"></i>' + __.Like + "</button>")
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_boost-page, .js_unboost-page", function() {
            var _this = $(this),
                id = _this.data("id"),
                _do = _this.hasClass("js_boost-page") ? "page-boost" : "page-unboost";
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: _do,
                id: id
            }, function(response) {
                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : "page-boost" == _do ? _this.replaceWith('<button type="button" class="btn btn-sm btn-danger js_unboost-page" data-id="' + id + '"><i class="fa fa-bolt mr5"></i>' + __.Unboost + "</button>") : _this.replaceWith('<button type="button" class="btn btn-sm btn-danger js_boost-page" data-id="' + id + '"><i class="fa fa-bolt mr5"></i>' + __.Boost + "</button>")
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_page-admin-addation, .js_page-admin-remove", function() {
            var _this = $(this),
                id = _this.data("id"),
                uid = _this.data("uid") || 0,
                _do = _this.hasClass("js_page-admin-addation") ? "page-admin-addation" : "page-admin-remove";
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: _do,
                id: id,
                uid: uid
            }, function(response) {
                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : _this.hasClass("js_page-admin-addation") ? _this.replaceWith('<button type="button" class="btn btn-sm btn-danger js_page-admin-remove" data-id="' + id + '" data-uid="' + uid + '"><i class="fa fa-trash mr5"></i>' + __["Remove Admin"] + "</button>") : _this.replaceWith('<button type="button" class="btn btn-sm btn-primary js_page-admin-addation" data-id="' + id + '" data-uid="' + uid + '"><i class="fa fa-check mr5"></i>' + __["Make Admin"] + "</button>")
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_page-member-remove", function() {
            var _this = $(this),
                id = _this.data("id"),
                uid = _this.data("uid") || 0;
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: "page-member-remove",
                id: id,
                uid: uid
            }, function(response) {
                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : _this.closest(".feeds-item").slideUp()
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_join-group, .js_leave-group", function() {
            var _this = $(this),
                id = _this.data("id"),
                privacy = _this.data("privacy"),
                _do = _this.hasClass("js_join-group") ? "group-join" : "group-leave";
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: _do,
                id: id
            }, function(response) {
                var originVar = window.location.host,
                    locationPage = "";
                locationPage = "localhost" == originVar ? window.location.origin + "/sngine" : window.location.origin, response.callback ? (button_status(_this, "reset"), eval(response.callback)) : _this.hasClass("js_join-group") ? "public" == privacy ? _this.replaceWith('<button type="button" class="btn btn-success btn-delete js_leave-group" data-id="' + id + '" data-privacy="' + privacy + '"><i class="fa fa-check mr5"></i>' + __.Joined + "</button>") : _this.replaceWith('<button type="button" class="btn btn-warning js_leave-group" data-id="' + id + '" data-privacy="' + privacy + '"><i class="fa fa-clock mr5"></i>' + __.Pending + "</button>") : _this.replaceWith('<button type="button" class="btn btn-success js_join-group" data-id="' + id + '" data-privacy="' + privacy + '"><img class="btn_image_" src="' + locationPage + '/content/themes/default/images/svg/svgImg/add_friend_icon.svg"><img class="btn_image_hover" src="' + locationPage + '/content/themes/default/images/svg/svgImg/add_friend-hover.svg">' + __.Join + "</button>")
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_group-request-accept, .js_group-request-decline", function() {
            var _this = $(this),
                id = _this.data("id"),
                uid = _this.data("uid") || 0,
                _do = _this.hasClass("js_group-request-accept") ? "group-accept" : "group-decline";
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: _do,
                id: id,
                uid: uid
            }, function(response) {
                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : _this.closest(".feeds-item").slideUp()
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_group-admin-addation, .js_group-admin-remove", function() {
            var _this = $(this),
                id = _this.data("id"),
                uid = _this.data("uid") || 0,
                _do = _this.hasClass("js_group-admin-addation") ? "group-admin-addation" : "group-admin-remove";
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: _do,
                id: id,
                uid: uid
            }, function(response) {
                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : _this.hasClass("js_group-admin-addation") ? _this.replaceWith('<button type="button" class="btn btn-sm btn-danger js_group-admin-remove" data-id="' + id + '" data-uid="' + uid + '"><i class="fa fa-trash mr5"></i>' + __["Remove Admin"] + "</button>") : _this.replaceWith('<button type="button" class="btn btn-sm btn-primary js_group-admin-addation" data-id="' + id + '" data-uid="' + uid + '"><i class="fa fa-check mr5"></i>' + __["Make Admin"] + "</button>")
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_group-member-remove", function() {
            var _this = $(this),
                id = _this.data("id"),
                uid = _this.data("uid") || 0;
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: "group-member-remove",
                id: id,
                uid: uid
            }, function(response) {
                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : _this.closest(".feeds-item").slideUp()
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_go-event, .js_ungo-event", function() {
            var _this = $(this),
                id = _this.data("id"),
                _do = _this.hasClass("js_go-event") ? "event-go" : "event-ungo";
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: _do,
                id: id
            }, function(response) {
                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : "event-go" == _do ? _this.replaceWith('<button type="button" class="btn js_ungo-event" data-id="' + id + '"><i class="fa fa-check mr5"></i>' + __.Going + "</button>") : _this.replaceWith('<button type="button" class="btn js_go-event" data-id="' + id + '"><i class="fa fa-calendar-check mr5"></i>' + __.Going + "</button>")
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_interest-event, .js_uninterest-event", function() {
            var _this = $(this),
                id = _this.data("id"),
                _do = _this.hasClass("js_interest-event") ? "event-interest" : "event-uninterest";
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: _do,
                id: id
            }, function(response) {
                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : "event-interest" == _do ? _this.replaceWith('<button type="button" class="btn js_uninterest-event" data-id="' + id + '"><i class="fa fa-check mr5"></i>' + __.Interested + "</button>") : _this.replaceWith('<button type="button" class="btn js_interest-event" data-id="' + id + '"><i class="fa fa-star mr5"></i>' + __.Interested + "</button>")
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_page-invite, .js_group-invite, .js_event-invite", function() {
            var _this = $(this),
                id = _this.data("id"),
                uid = _this.data("uid") || 0,
                _do = "event-invite";
            if (_this.hasClass("js_page-invite")) var _do = "page-invite";
            else if (_this.hasClass("js_group-invite")) var _do = "group-invite";
            else var _do = "event-invite";
            button_status(_this, "loading"), $.post(api["users/connect"], {
                do: _do,
                id: id,
                uid: uid
            }, function(response) {
                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : _this.remove()
            }, "json").fail(function() {
                button_status(_this, "reset"), modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("body").on("click", ".js_delete-page, .js_delete-group, .js_delete-event", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            if ($(this).hasClass("js_delete-page")) var handle = "page";
            else if ($(this).hasClass("js_delete-group")) var handle = "group";
            else if ($(this).hasClass("js_delete-event")) var handle = "event";
            confirm(__.Delete, __["Are you sure you want to delete this?"], function() {
                $.post(api["pages_groups_events/delete"], {
                    handle: handle,
                    id: id
                }, function(response) {
                    response.callback ? eval(response.callback) : window.location = site_path
                }, "json").fail(function() {
                    modal("#modal-message", {
                        title: __.Error,
                        message: __["There is something that went wrong!"]
                    })
                })
            })
        }), $("body").on("click", ".js_report", function(e) {
            e.preventDefault;
            var id = $(this).data("id"),
                handle = $(this).data("handle");
            return confirm(__.Report, __["Are you sure you want to report this?"], function() {
                $.post(api["data/report"], {
                    handle: handle,
                    id: id
                }, function(response) {
                    response.callback && eval(response.callback)
                }, "json").fail(function() {
                    modal("#modal-message", {
                        title: __.Error,
                        message: __["There is something that went wrong!"]
                    })
                })
            }), !1
        }), $("body").on("click", ".js_session-deleter", function() {
            var id = $(this).data("id");
            confirm(__.Delete, __["Are you sure you want to delete this?"], function() {
                $.post(api["users/session"], {
                    handle: "session",
                    id: id
                }, function(response) {
                    response.callback ? eval(response.callback) : window.location.reload()
                }, "json").fail(function() {
                    modal("#modal-message", {
                        title: __.Error,
                        message: __["There is something that went wrong!"]
                    })
                })
            })
        }), $("body").on("click", ".js_session-delete-all", function() {
            var id = $(this).data("id");
            confirm(__.Delete, __["Are you sure you want to delete this?"], function() {
                $.post(api["users/session"], {
                    handle: "sessions"
                }, function(response) {
                    response.callback ? eval(response.callback) : window.location.reload()
                }, "json").fail(function() {
                    modal("#modal-message", {
                        title: __.Error,
                        message: __["There is something that went wrong!"]
                    })
                })
            })
        }), $("body").on("click", ".js_ads-delete-campaign", function() {
            var id = $(this).data("id");
            confirm(__.Delete, __["Are you sure you want to delete this?"], function() {
                $.post(api["ads/campaign"], {
                    do: "delete",
                    id: id
                }, function(response) {
                    response.callback ? eval(response.callback) : window.location.reload()
                }, "json").fail(function() {
                    modal("#modal-message", {
                        title: __.Error,
                        message: __["There is something that went wrong!"]
                    })
                })
            })
        }), $("body").on("click", ".js_ads-stop-campaign, .js_ads-resume-campaign", function() {
            var id = $(this).data("id"),
                _do = $(this).hasClass("js_ads-stop-campaign") ? "stop" : "resume";
            confirm(__.Delete, __["Are you sure you want to do this?"], function() {
                $.post(api["ads/campaign"], {
                    do: _do,
                    id: id
                }, function(response) {
                    response.callback ? eval(response.callback) : window.location.reload()
                }, "json").fail(function() {
                    modal("#modal-message", {
                        title: __.Error,
                        message: __["There is something that went wrong!"]
                    })
                })
            })
        }), $("#js_ads-audience-countries, #js_ads-audience-gender, #js_ads-audience-relationship").on("change", function() {
            var countries = $("#js_ads-audience-countries").val(),
                gender = $("#js_ads-audience-gender").val(),
                relationship = $("#js_ads-audience-relationship").val();
            $("#js_ads-potential-reach-loader").show(), $.post(api["ads/campaign"], {
                do: "potential_reach",
                countries: countries,
                gender: gender,
                relationship: relationship
            }, function(response) {
                response.callback ? eval(response.callback) : $("#js_ads-potential-reach").text(response), $("#js_ads-potential-reach-loader").hide()
            }, "json").fail(function() {
                modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        }), $("#js_campaign-type").on("change", function() {
            "url" == $(this).val() && ($("#js_campaign-type-url").fadeIn(), $("#js_campaign-type-page").hide(), $("#js_campaign-type-group").hide(), $("#js_campaign-type-event").hide()), "page" == $(this).val() && ($("#js_campaign-type-url").hide(), $("#js_campaign-type-page").fadeIn(), $("#js_campaign-type-group").hide(), $("#js_campaign-type-event").hide()), "group" == $(this).val() && ($("#js_campaign-type-url").hide(), $("#js_campaign-type-page").hide(), $("#js_campaign-type-group").fadeIn(), $("#js_campaign-type-event").hide()), "event" == $(this).val() && ($("#js_campaign-type-url").hide(), $("#js_campaign-type-page").hide(), $("#js_campaign-type-group").hide(), $("#js_campaign-type-event").fadeIn())
        }), void 0 === window.canRunAds) {
        if ($(".adblock-warning-message").length > 0) return void $(".adblock-warning-message").slideDown();
        adblock_detector && $(render_template("#adblock-detector")).appendTo("body").show()
    }
    $("body").on("click", ".js_developers-oauth-app", function() {
        var id = $(this).data("id");
        $.post(api["developers/app"], {
            do: "oauth",
            id: id
        }, function(response) {
            response.callback ? eval(response.callback) : window.location = response.redirect_url
        }, "json").fail(function() {
            modal("#modal-message", {
                title: __.Error,
                message: __["There is something that went wrong!"]
            })
        })
    }), $("body").on("click", ".js_developers-delete-app", function() {
        var id = $(this).data("id");
        confirm(__.Delete, __["Are you sure you want to delete this?"], function() {
            $.post(api["developers/app"], {
                do: "delete",
                id: id
            }, function(response) {
                response.callback ? eval(response.callback) : window.location.reload()
            }, "json").fail(function() {
                modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        })
    }), $("body").on("click", ".js_delete-user-app", function() {
        var id = $(this).data("id");
        confirm(__.Delete, __["Are you sure you want to delete this?"], function() {
            $.post(api["users/connect"], {
                do: "delete-app",
                id: id
            }, function(response) {
                response.callback ? eval(response.callback) : window.location.reload()
            }, "json").fail(function() {
                modal("#modal-message", {
                    title: __.Error,
                    message: __["There is something that went wrong!"]
                })
            })
        })
    })
}), $(document).ready(function() {
    $(".multiple-recipients-image").length && ($(".gcDiv a").click(), $(".forgroup li:first-child a").click()), $(window).width() < 991 && $("body").hasClass("messages_global") && $("body").hasClass("new") && ($(".leftSideChatBar").css("display", "none"), $(".js_conversation-container").css("display", "block")), $("body").on("click", ".backBtn", function(e) {
        $(window).width() < 991 && $("body").hasClass("messages_global") && $("body").hasClass("new") && ($(".leftSideChatBar").css("display", "block"), $(".js_conversation-container").css("display", "none"))
    })
}), $(".dmDiv").click(function() {
    $(".dmDiv").addClass("active"), $(".gcDiv").removeClass("active"), $(".forsingle li:first-child a").click()
}), $(".gcDiv").click(function() {
    $(".gcDiv").addClass("active"), $(".dmDiv").removeClass("active"), $(".forgroup li:first-child a").trigger("click")
});