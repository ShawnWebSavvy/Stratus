var count = parseInt($('.unread').length) ? parseInt($('.unread').length) : "";
if (count != "") {
    $(".js_live-notifications").find("span.counterlive").text(count).show();
}
function initialize_modal() {
    $(".js_scroller").each(function () {
        var e = $(this),
            t = e.attr("data-slimScroll-height") || "280px",
            s = e.attr("data-slimScroll-start") || "top";
        e.parent().hasClass("custom-scrollbar"), e.parent().addClass("custom-scrollbar"), e.css({ "overflow-y": "auto", height: t }), "bottom" == s && e.scrollTop(e.height());
    }),
        geolocation_enabled && $(".js_geocomplete").geocomplete(),
        $(".selectpicker").length > 0 && $(".selectpicker").selectpicker({ style: "btn-outline-light" }),
        $(".js_datetimepicker").length > 0 && $(".js_datetimepicker").datetimepicker({ format: system_datetime_format, locale: $("html").attr("lang").split("_", 1).toString() || "en" }),
        initialize_uploader();
}
function initialize_uploader() {
    $(".js_x-uploader").each(function (e) {
        if (!($(this).parents("form.x-uploader").length > 0)) {
            var t = "Image",
                s = void 0 !== $(this).data("multiple");
            if ("video" == $(this).data("type")) {
                var a = accpeted_video_extensions;
                t = "Video";
            } else "audio" == $(this).data("type") ? ((a = accpeted_audio_extensions), (t = "Audio")) : "file" == $(this).data("type") ? ((a = accpeted_file_extensions), (t = "File")) : ((a = ".png, .gif, .jpeg, .jpg"), (t = "Image"));
            $(this).before(render_template("#x-uploader", { url: api["data/upload"], secret: secret, multiple: s, accept: a, title: "Upload " + t })), $(this).prev().append($(this));
        }
    });
}
function browser_notification(e, t, s, a) {
    if ("Notification" in window)
        if ("granted" !== Notification.permission) Notification.requestPermission();
        else {
            var i = new Notification(site_title, { icon: e, body: t, tag: a });
            i.onclick = function () {
                window.open(s), i.close();
            };
        }
}
function update_location(e) {
    if (!e) return !1;
    $.post(api["users/location"], { latitude: e.coords.latitude, longitude: e.coords.longitude });
}
function noty_notification(e, t, s) {
    new Noty({
        type: "info",
        layout: "bottomLeft",
        progressBar: "true",
        closeWith: ["click", "button"],
        timeout: "5000",
        text: render_template("#noty-notification", { image: e, message: t }),
        callbacks: {
            onClick: function () {
                window.location.href = s;
            },
        },
    }).show();
}
function notification_highlighter() {
    try {
        var e = new URLSearchParams(window.location.search).get("notify_id");
    } catch (t) {
        e = get_parameter_by_name("notify_id");
    }
    if (e) {
        var t = $("#" + e);
        t.length > 0 &&
            ($("html, body").animate({ scrollTop: t.offset().top }, 1e3),
                t.find(".js_notifier-flasher:first").addClass("x-notifier"),
                setTimeout(function () {
                    t.find(".js_notifier-flasher:first").removeClass("x-notifier");
                }, "2500"));
    }
}
function data_heartbeat() {
    var data = {};
    data["last_request"] =
        $(".js_live-requests").find(".js_scroller li:first").data("id") || 0;
    data["last_message"] =
        $(".js_live-messages").find(".js_scroller li:first").data("last-message") ||
        0;
    data["last_notification"] =
        $(".js_live-notifications").find(".js_scroller li:first").data("id") || 0;
    /* newsfeed check */
    var posts_stream = $("body .js_posts_stream");
    /* "popular" && "saved" & "memories" excluded as not ordered by id */
    if (
        posts_stream.length > 0 &&
        posts_stream.data("get") != "popular" &&
        posts_stream.data("get") != "saved" &&
        posts_stream.data("get") != "memories" &&
        posts_stream.data("loading") === undefined
    ) {
        data["last_post"] = posts_stream.find('.non_promoted').first().data("id") || 0;
        data["get"] = posts_stream.data("get");
        data["filter"] = posts_stream.data("filter");
        data["id"] = posts_stream.data("id");
        if (data["get"] === "newsfeed") {
            data["custom_boosted"] = "custom_boosted";
            data["last_post_boosted"] = posts_stream.find('.boosted').first().data("id") || 0;
        }

        if (data["get"] === "posts_profile") {
            data["custom_pinned"] = "custom_pinned";
            data["last_post_boosted"] = posts_stream.find(".unpinned_post").first().data("id") || 0;

            let last_id_column = document.getElementsByClassName('bricklayer-column')[0];
            if (last_id_column) {
                data["last_post"] = last_id_column.getElementsByClassName('carsds')[0].dataset.id || 0;
            } else {
                data["last_post"] = 0;
            }

            data["last_post_pinned"] = posts_stream.find('.pinned_post').first().data("id") || 0;
            // console.log("data[last_post]",data["last_post"]);
        }
        if (data["get"] === "newsfeed" && data['filter'] == "article") {
            data["custom_boosted"] = "custom_boosted";
            data["last_post_boosted"] = posts_stream.find('.unpinned_post').first().data("id") || 0;
        }
        if (data["get"] === "posts_profile" && data["filter"] == "product") {
            data['last_post'] = posts_stream.find(".non_promoted").first().data("id") || 0;
            data['custom_pinned'] = "custom_pinned";
            data['last_post_pinned'] = posts_stream.find(".pinned_post").first().data("id") || 0;
        }
    }
    // console.log(data)
    //var cechkPost = posts_stream.find(".non_promoted").first().data("id");
    //(data.get = cechkPost && cechkPost > 0) && (data.last_post = cechkPost),
    $.post(
        api["data/live"],
        data,
        function (response) {
            if (response.callback) eval(response.callback);
            else {
                if (response.requests) {
                    $(".js_live-requests").find(".js_scroller ul").length > 1
                        ? $(".js_live-requests").find(".js_scroller ul:first").prepend(response.requests)
                        : $(".js_live-requests")
                            .find(".js_scroller p:first")
                            .replaceWith("<ul>" + response.requests + "</ul>");
                    var requests = parseInt(response.requests_count);
                    $(".js_live-requests").find("span.counter").text(requests).show(), notifications_sound;
                }
                if (
                    (response.conversations &&
                        ($(".js_live-messages")
                            .find(".js_scroller")
                            .html("<ul>" + response.conversations + "</ul>"),
                            -1 != window.location.pathname.indexOf("messages") &&
                            ($(".js_live-messages-alt").find(".js_scroller ul").length > 0
                                ? $(".js_live-messages-alt").find(".js_scroller ul").html(response.conversations)
                                : $(".js_live-messages-alt")
                                    .find(".js_scroller")
                                    .html("<ul>" + response.conversations + "</ul>")),
                            $(".js_live-messages")
                                .find(".js_scrollerGroup")
                                .html("<ul>" + response.conversations_group + "</ul>"),
                            -1 != window.location.pathname.indexOf("messages") &&
                            ($(".js_live-messages-alt").find(".js_scrollerGroup ul").length > 0
                                ? $(".js_live-messages-alt").find(".js_scrollerGroup ul").html(response.conversations_group)
                                : $(".js_live-messages-alt")
                                    .find(".js_scrollerGroup")
                                    .html("<ul>" + response.conversations_group + "</ul>")),
                            response.conversations_count > 0
                                ? ($(".js_live-messages").find("span.counter").text(response.conversations_count).show(), chat_sound)
                                : $(".js_live-messages").find("span.counter").text(response.conversations_count)),
                        response.notifications)
                ) {
                    $.each(response.notifications_json, function (e, t) {
                        browser_notifications_enabled, noty_notifications_enabled;
                    }),
                        $(".js_live-notifications").find(".js_scroller ul").length > 0
                            ? $(".js_live-notifications").find(".js_scroller ul").prepend(response.notifications)
                            : $(".js_live-notifications")
                                .find(".js_scroller")
                                .html("<ul>" + response.notifications + "</ul>");
                    // var notifications = parseInt(response.notifications_count);
                    // $(".js_live-notifications").find("span.counterlive").text(notifications).show(), notifications_sound;
                    var notifications = (parseInt($(".js_live-notifications").find("span.counterlive").text())?parseInt($(".js_live-notifications").find("span.counterlive").text()):0)+ response.notifications_count;
                    $(".js_live-notifications").find("span.counterlive").text(notifications).show();notifications_sound
                }
                if (response.posts && response.posts != null) {
                    //console.log("response.posts->>>>>>>", response.posts);
                    var datatta = response.posts;
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
                        bricklayer.prepend(valuesPost)
                        bricklayer.redraw();
                    }
                }
                response.posts && (posts_stream.find("ul:first").prepend(), setTimeout(photo_grid(), 200)), setTimeout("data_heartbeat();", min_data_heartbeat);
            }
        },
        "json"
    );
}
// initialize picture crop
function init_picture_crop(node) {

    setTimeout(function () {
       $("#cropped-profile-picture").rcrop({
            minSize: [200, 200],
            preserveAspectRatio: true,
            grid: true,
        });
    }, 200);    
   
    var image_node = node.data("image");
    var system_url = node.data("systemUrl") ;
    
    modal("#crop-profile-picture", {
        image: `${system_url}/includes/wallet-api/get-picture-api.php?picture=${image_node}&pictureFull=&type_url=1`,
        handle: node.data("handle"),
        id: node.data("id"),
    });

  
}

function init_picture_position() {
    $(".profile-cover-change").hide(),
        $(".profile-cover-position").hide(),
        $(".profile-cover-delete").hide(),
        $(".profile-buttons-wrapper").hide(),
        $(".js_position-cover-cropped").hide(),
        $(".profile-cover-position-loader").show(),
        $(".profile-cover-position-buttons").show(),
        $(".js_position-cover-full").show();
    var e = $(".js_position-cover-cropped").data("init-position");
    $(".profile-cover-wrapper").imagedrag({ position: e, input: ".js_position-picture-val" });
}
(api["data/live"] = ajax_path + "data/live.php"),
    (api["data/upload"] = ajax_path + "data/upload.php"),
    (api["data/reset"] = ajax_path + "data/reset.php"),
    (api["data/report"] = ajax_path + "data/report.php"),
    (api["users/image_delete"] = ajax_path + "users/image_delete.php"),
    (api["users/image_crop"] = ajax_path + "users/image_crop.php"),
    (api["users/image_position"] = ajax_path + "users/image_position.php"),
    (api["users/connect"] = ajax_path + "users/connect.php"),
    (api["users/delete"] = ajax_path + "users/delete.php"),
    (api["users/session"] = ajax_path + "users/session.php"),
    (api["users/location"] = ajax_path + "users/location.php"),
    (api["users/notifications"] = ajax_path + "users/push_notifications.php"),
    (api["users/popover"] = ajax_path + "users/popover.php"),
    (api["users/mention"] = ajax_path + "users/mention.php"),
    (api["users/settings"] = ajax_path + "users/settings.php"),
    (api["users/autocomplete"] = ajax_path + "users/autocomplete.php"),
    (api["pages_groups_events/delete"] = ajax_path + "pages_groups_events/delete.php"),
    (api["ads/campaign"] = ajax_path + "ads/campaign.php"),
    (api["developers/app"] = ajax_path + "developers/app.php"),
    $("body").on("click", ".backBtn", function (e) {
        $(window).width() < 991 &&
            window.location.href.indexOf("settings") > -1 &&
            ($(".custom_antier_class").hasClass(".rightSidebarCustom") || $(".settingDetailBlock").toggleClass("hidd"), $(".custom_antier_class").toggleClass("rightSidebarCustom"));
    }),
    $(function () {
        if ($(window).width() < 991) {
            var pathname = window.location.pathname;
            window.location.href.indexOf("settings") > -1 && $(".custom_antier_class").addClass("rightSidebarCustom");
        }
        if (
            ($(".js_slick").length > 0 &&
                $(".js_slick").slick({
                    rtl: theme_dir_rtl,
                    centerMode: !0,
                    centerPadding: "0",
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: !0,
                    autoplaySpeed: 2e3,
                    arrows: !1,
                    speed: 900,
                    responsive: [
                        { breakpoint: 1200, settings: { slidesToShow: 3 } },
                        { breakpoint: 992, settings: { slidesToShow: 5 } },
                        { breakpoint: 768, settings: { slidesToShow: 5 } },
                        { breakpoint: 520, settings: { slidesToShow: 5 } },
                        { breakpoint: 420, settings: { slidesToShow: 3 } },
                        { breakpoint: 340, settings: { slidesToShow: 3 } },
                    ],
                }),
                $(".js_dataTable").length > 0 &&
                $(".js_dataTable").DataTable({
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
                        paginate: { first: __.First, previous: __.Previous, next: __.Next, last: __.Last },
                        aria: { sortAscending: __[": activate to sort column ascending"], sortDescending: __[": activate to sort column descending"] },
                    },
                }),
                geolocation_enabled && $(".js_geocomplete").geocomplete(),
                $(".js_datetimepicker").length > 0 && $(".js_datetimepicker").datetimepicker({ format: system_datetime_format, locale: $("html").attr("lang").split("_", 1).toString() || "en" }),
                $(".selectpicker").length > 0 && $(".selectpicker").selectpicker({ style: "btn-outline-light" }),
                $(".js_wysiwyg").length > 0 &&
                (tinymce_photos_enabled
                    ? tinymce.init({
                        selector: ".js_wysiwyg",
                        directionality: system_langauge_dir,
                        language: system_langauge_code,
                        branding: !1,
                        height: 300,
                        relative_urls: !1,
                        convert_urls: !0,
                        remove_script_host: !1,
                        toolbar:
                            "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image  uploadImages |  preview media fullpage | forecolor backcolor | ltr rtl",
                        plugins: [
                            "advlist autolink link image  lists charmap  preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table directionality template paste",
                        ],
                        image_advtab: !0,
                        paste_data_images: !0,
                        images_upload_handler: function (e, t, s) {
                            var a, i;
                            ((a = new XMLHttpRequest()).withCredentials = !0),
                                a.open("POST", api["data/upload"]),
                                a.setRequestHeader("X-Requested-With", "XMLHttpRequest"),
                                (a.onload = function () {
                                    var e;
                                    200 == a.status ? ((e = JSON.parse(a.responseText)) && "string" != typeof e.error ? t(uploads_path + "/" + e.file) : s(e.error)) : s("HTTP Error: " + a.status);
                                }),
                                (i = new FormData()).append("handle", "tinymce"),
                                i.append("type", "photos"),
                                i.append("multiple", "false"),
                                i.append("secret", secret),
                                i.append("file", e.blob(), e.filename()),
                                a.send(i);
                        },
                    })
                    : tinymce.init({
                        selector: ".js_wysiwyg",
                        directionality: system_langauge_dir,
                        language: system_langauge_code,
                        branding: !1,
                        height: 300,
                        relative_urls: !1,
                        convert_urls: !0,
                        remove_script_host: !1,
                        toolbar:
                            "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image  uploadImages |  preview media fullpage | forecolor backcolor | ltr rtl",
                        plugins: [
                            "advlist autolink link image  lists charmap  preview hr anchor pagebreak spellchecker",
                            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                            "save table directionality template paste",
                        ],
                    })),
                $(".js_wysiwyg-advanced").length > 0 &&
                tinymce.init({
                    selector: ".js_wysiwyg-advanced",
                    directionality: system_langauge_dir,
                    language: system_langauge_code,
                    branding: !1,
                    height: 300,
                    relative_urls: !1,
                    convert_urls: !0,
                    remove_script_host: !1,
                    toolbar:
                        "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image  uploadImages |  preview media fullpage | forecolor backcolor | ltr rtl",
                    plugins: [
                        "advlist autolink link image  lists charmap  preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table directionality template paste",
                    ],
                    extended_valid_elements: "script[src|async|defer|type|charset]",
                    image_advtab: !0,
                    paste_data_images: !0,
                    images_upload_handler: function (e, t, s) {
                        var a, i;
                        ((a = new XMLHttpRequest()).withCredentials = !0),
                            a.open("POST", api["data/upload"]),
                            a.setRequestHeader("X-Requested-With", "XMLHttpRequest"),
                            (a.onload = function () {
                                var e;
                                200 == a.status ? ((e = JSON.parse(a.responseText)) && "string" != typeof e.error ? t(uploads_path + "/" + e.file) : s(e.error)) : s("HTTP Error: " + a.status);
                            }),
                            (i = new FormData()).append("handle", "tinymce"),
                            i.append("type", "photos"),
                            i.append("multiple", "false"),
                            i.append("secret", secret),
                            i.append("file", e.blob(), e.filename()),
                            a.send(i);
                    },
                }),
                browser_notifications_enabled,
                navigator.geolocation && navigator.geolocation.getCurrentPosition(update_location),
                notification_highlighter(),
                data_heartbeat(),
                $("body").on("click", ".js_autocomplete", function () {
                    $(this).find("input").focus();
                }),
                $("body").on("keyup", ".js_autocomplete input", function () {
                    var _this = $(this),
                        query = _this.val(),
                        parent = _this.parents(".js_autocomplete");
                    if ("" != query) {
                        if (0 == _this.next(".dropdown-menu").length) {
                            var offset = _this.offset(),
                                posX = offset.left - $(window).scrollLeft();
                            $(window).width() - posX < 180 ? _this.after('<div class="dropdown-menu auto-complete tl"></div>') : _this.after('<div class="dropdown-menu auto-complete"></div>');
                        }
                        $.post(
                            api["users/autocomplete"],
                            { type: "single", query: query },
                            function (response) {
                                response.callback ? eval(response.callback) : response.autocomplete && _this.next(".dropdown-menu").show().html(response.autocomplete);
                            },
                            "json"
                        );
                    } else _this.next(".dropdown-menu").length > 0 && _this.next(".dropdown-menu").hide();
                }),
                $("body").on("click focus", ".js_autocomplete input", function () {
                    "" != $(this).val() && $(this).next(".dropdown-menu").find("li").length > 0 && $(this).next(".dropdown-menu").show();
                }),
                $("body").on("click", function (e) {
                    $(e.target).is(".js_autocomplete") || $(".js_autocomplete .dropdown-menu").hide();
                }),
                $("body").on("click", ".js_autocomplete-add", function () {
                    var e = $(this).data("uid"),
                        t = $(this).data("name"),
                        s = $(this).parents(".js_autocomplete");
                    s.find("input").val(t).data("uid", e), s.find('input[type="hidden"]').val(e);
                }),
                $("body").on("click", ".js_autocomplete-tags", function () {
                    $(this).find("input").focus();
                }),
                $("body").on("keyup", ".js_autocomplete-tags input", function () {
                    var _this = $(this),
                        query = _this.val(),
                        parent = _this.parents(".js_autocomplete-tags");
                    if (
                        ((prev_length = _this.data("length") || 0),
                            (new_length = query.length),
                            new_length > prev_length && _this.width() < 250 ? _this.width(_this.width() + 6) : new_length < prev_length && _this.width(_this.width() - 6),
                            _this.data("length", query.length),
                            !(parent.find("ul.tags li").length > 9))
                    )
                        if ("" != query) {
                            if (0 == _this.next(".dropdown-menu").length) {
                                var offset = _this.offset(),
                                    posX = offset.left - $(window).scrollLeft();
                                $(window).width() - posX < 180 ? _this.after('<div class="dropdown-menu auto-complete tl"></div>') : _this.after('<div class="dropdown-menu auto-complete"></div>');
                            }
                            var skipped_ids = [];
                            $.each(parent.find("ul.tags li"), function (e, t) {
                                skipped_ids.push($(t).data("uid"));
                            }),
                                $.post(
                                    api["users/autocomplete"],
                                    { type: "tags", query: query, skipped_ids: JSON.stringify(skipped_ids) },
                                    function (response) {
                                        response.callback ? eval(response.callback) : response.autocomplete && _this.next(".dropdown-menu").show().html(response.autocomplete);
                                    },
                                    "json"
                                );
                        } else _this.next(".dropdown-menu").length > 0 && _this.next(".dropdown-menu").hide();
                }),
                $("body").on("click focus", ".js_autocomplete-tags input", function () {
                    $(this).parents(".js_autocomplete-tags").find("ul.tags li").length > 9 || ("" != $(this).val() && $(this).next(".dropdown-menu").find("li").length > 0 && $(this).next(".dropdown-menu").show());
                }),
                $("body").on("click", function (e) {
                    $(e.target).is(".js_autocomplete-tags") || $(".js_autocomplete-tags .dropdown-menu").hide();
                }),
                $("body").on("click", ".js_tag-add", function () {
                    var e = $(this).data("uid"),
                        t = $(this).data("name"),
                        s = $(this).parents(".js_autocomplete-tags"),
                        a = '<li data-uid="' + e + '">' + t + '<button type="button" class="close js_tag-remove" title="' + __.Remove + '"><span>&times;</span></button></li>';
                    s.find(".tags").append(a),
                        s.find("input").val("").focus(),
                        s.siblings(".chat-form").length > 0 &&
                        (0 == s.find("ul.tags li").length ? s.siblings(".chat-form").hasClass("invisible") || s.siblings(".chat-form").addClass("invisible") : s.siblings(".chat-form").removeClass("invisible"));
                }),
                $("body").on("click", ".js_tag-remove", function () {
                    var e = $(this).parents("li"),
                        t = $(this).parents(".js_autocomplete-tags");
                    return (
                        e.remove(),
                        t.siblings(".chat-form").length > 0 &&
                        (0 == t.find("ul.tags li").length ? t.siblings(".chat-form").hasClass("invisible") || t.siblings(".chat-form").addClass("invisible") : t.siblings(".chat-form").removeClass("invisible")),
                        !1
                    );
                }),
                $("body").on("focus", ".js_mention", function () {
                    $(this).triggeredAutocomplete({ hidden: "#hidden_inputbox", source: api["users/mention"], trigger: "@", maxLength: 20 });
                }),
                $("body").on("mouseenter", ".js_user-popover", function () {
                    if (!($(window).width() < 751)) {
                        var _this = $(this),
                            uid = _this.data("uid"),
                            type = _this.data("type") || "user",
                            _timeout = setTimeout(function () {
                                var offset = _this.offset(),
                                    posY = offset.top - $(window).scrollTop() + _this.height(),
                                    posX = offset.left - $(window).scrollLeft();
                                if ("RTL" == $("html").attr("dir")) {
                                    var available = posX + _this.width();
                                    if (available < 400)
                                        $("body").append(
                                            '<div class="user-popover-wrapper tl" style="position: fixed; top: ' +
                                            posY +
                                            "px; left:" +
                                            posX +
                                            'px"><div class="user-popover-content ptb10 plr10"><div class="loader loader_small"></div></div></div>'
                                        );
                                    else {
                                        var right = $(window).width() - available;
                                        $("body").append(
                                            '<div class="user-popover-wrapper tr" style="position: fixed; top: ' +
                                            posY +
                                            "px; right:" +
                                            right +
                                            'px"><div class="user-popover-content ptb10 plr10"><div class="loader loader_small"></div></div></div>'
                                        );
                                    }
                                } else {
                                    var available = $(window).width() - posX;
                                    if (available < 400) {
                                        var right = available - _this.width();
                                        $("body").append(
                                            '<div class="user-popover-wrapper tl" style="position: fixed; top: ' +
                                            posY +
                                            "px; right:" +
                                            right +
                                            'px"><div class="user-popover-content ptb10 plr10"><div class="loader loader_small"></div></div></div>'
                                        );
                                    } else
                                        $("body").append(
                                            '<div class="user-popover-wrapper tr" style="position: fixed; top: ' +
                                            posY +
                                            "px; left:" +
                                            posX +
                                            'px"><div class="user-popover-content ptb10 plr10"><div class="loader loader_small"></div></div></div>'
                                        );
                                }
                                $.getJSON(api["users/popover"], { type: type, uid: uid }, function (response) {
                                    response.callback ? eval(response.callback) : response.popover && $(".user-popover-wrapper").html(response.popover);
                                });
                            }, 1e3);
                        _this.data("timeout", _timeout);
                    }
                }),
                $("body").on("mouseleave", ".js_user-popover", function (e) {
                    var t = e.toElement || e.relatedTarget;
                    $(t).is(".user-popover-wrapper") || (clearTimeout($(this).data("timeout")), $(".user-popover-wrapper").remove());
                }),
                $("body").on("mouseleave", ".user-popover-wrapper", function () {
                    $(".user-popover-wrapper").remove();
                }),
                initialize_uploader(),
                $(document).ajaxComplete(function () {
                    initialize_uploader();
                }),
                $("body").on("change", '.x-uploader input[type="file"]', function () {
                    $(this).parent(".x-uploader").submit();
                }),
                $("body").on("submit", ".x-uploader", function (e) {
                    e.preventDefault, $("body .js_publisher").prop("disabled", !0);
                    var options = { dataType: "json", uploadProgress: _handle_progress, success: _handle_success, error: _handle_error, resetForm: !0, data: {} },
                        uploader = $(this).find('input[type="file"]'),
                        type = $(this).find(".js_x-uploader").data("type") || "photos";
                    options.data.type = type;
                    var handle = $(this).find(".js_x-uploader").data("handle");
                    if (void 0 === handle) return !1;
                    options.data.handle = handle;
                    var multiple = void 0 !== $(this).find(".js_x-uploader").data("multiple");
                    options.data.multiple = multiple;
                    var id = $(this).find(".js_x-uploader").data("id");
                    if ((void 0 !== id && (options.data.id = id), "photos" == type)) {
                        if ("cover-user" == handle || "cover-page" == handle || "cover-group" == handle || "cover-event" == handle) {
                            var loader = $(".profile-cover-change-loader");
                            loader.show();
                        } else if ("picture-user" == handle || "picture-page" == handle || "picture-group" == handle) {
                            var loader = $(".profile-avatar-change-loader");
                            loader.show();
                        } else if ("publisher" == handle) {
                            var publisher = $(this).parents(".publisher"),
                                publisher_button = publisher.find(".js_publisher-btn"),
                                files_num = uploader.get(0).files.length;
                            if (publisher.data("scrabing") || publisher.data("video") || publisher.data("audio") || publisher.data("file")) return !1;
                            publisher.data("photos") || publisher.data("photos", {});
                            var attachments = publisher.find(".attachments"),
                                loader = $("<ul></ul>").appendTo(attachments);
                            attachments.show();
                            for (var i = 0; i < files_num; ++i)
                                $('<li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li>').appendTo(loader).show();
                            jQuery.isEmptyObject(publisher.data("photos")) && publisher_tab(publisher, type), button_status(publisher_button, "loading");
                        } else if ("publisher-mini" == handle) {
                            $(".ajax-story-publisher-form").addClass("stratus_story_popup");
                            var publisher = $(this).parents(".publisher-mini"),
                                publisher_button = publisher.find(".js_publisher-btn"),
                                files_num = uploader.get(0).files.length;
                            publisher.data("photos") || publisher.data("photos", {});
                            for (var attachments = publisher.find('.attachments[data-type="photos"]'), loader = $("<ul></ul>").appendTo(attachments), i = 0; i < files_num; ++i)
                                $('<li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li>').appendTo(loader).show();
                            button_status(publisher_button, "loading");
                        } else if ("comment" == handle) {
                            var comment = $(this).parents(".comment");
                            if (comment.data("photos")) return !1;
                            var attachments = comment.find(".comment-attachments"),
                                loader = attachments.find("li.loading");
                            attachments.show(), loader.show(), comment.find(".x-form-tools-attach").hide(), comment.find(".x-form-tools-voice").hide();
                        } else if ("chat" == handle) {
                            var chat_widget = $(this).parents(".chat-widget, .panel-messages");
                            if (chat_widget.data("photo")) return !1;
                            var attachments = chat_widget.find(".chat-attachments"),
                                loader = attachments.find("li.loading");
                            attachments.show(), loader.show(), chat_widget.find(".x-form-tools-attach").hide(), chat_widget.find(".x-form-tools-voice").hide();
                        } else if ("x-image" == handle) {
                            var parent = $(this).parents(".x-image"),
                                loader = parent.find(".x-image-loader");
                            loader.show();
                        }
                    } else if ("video" == type) {
                        if ("publisher" == handle) {
                            var publisher = $(this).parents(".publisher"),
                                publisher_button = publisher.find(".js_publisher-btn");
                            if (publisher.data("scrabing") || publisher.data("photos") || publisher.data("video") || publisher.data("audio") || publisher.data("file")) return !1;
                            publisher.data(type, {});
                            var attachments = publisher.find(".attachments"),
                                loader = $("<ul></ul>").appendTo(attachments);
                            attachments.show(),
                                $('<li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li>').appendTo(loader).show(),
                                publisher_tab(publisher, type),
                                button_status(publisher_button, "loading");
                        } else if ("publisher-mini" == handle) {
                            $(".ajax-story-publisher-form").addClass("stratus_story_popup");
                            var publisher = $(this).parents(".publisher-mini"),
                                publisher_button = publisher.find(".js_publisher-btn"),
                                files_num = uploader.get(0).files.length;
                            publisher.data(type) || publisher.data(type, {});
                            for (var attachments = publisher.find('.attachments[data-type="videos"]'), loader = $("<ul></ul>").appendTo(attachments), files_names = [], i = 0; i < files_num; ++i)
                                (files_names[i] = uploader.get(0).files[i].name),
                                    $('<li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li>').appendTo(loader).show();
                            button_status(publisher_button, "loading");
                        } else if ("x-video" == handle) {
                            var parent = $(this).parents(".x-image"),
                                loader = parent.find(".x-image-loader");
                            loader.show();
                        }
                    } else if (("audio" == type || "file" == type) && "publisher" == handle) {
                        var publisher = $(this).parents(".publisher"),
                            publisher_button = publisher.find(".js_publisher-btn");
                        if (publisher.data("scrabing") || publisher.data("photos") || publisher.data("video") || publisher.data("audio") || publisher.data("file")) return !1;
                        publisher.data(type, {});
                        var attachments = publisher.find(".attachments"),
                            loader = $("<ul></ul>").appendTo(attachments);
                        attachments.show(),
                            $('<li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li>').appendTo(loader).show(),
                            publisher_tab(publisher, type),
                            button_status(publisher_button, "loading");
                    }
                    function _handle_progress(e) {
                        uploader.prop("disabled", !0);
                        var t = parseInt((e.loaded / e.total) * 100);
                        loader &&
                            loader
                                .find(".progress-bar")
                                .css("width", t + "%")
                                .attr("aria-valuenow", t);
                    }
                    function _handle_success(response) {
                        if ((uploader.prop("disabled", !1), loader && loader.hide(), response.callback))
                            "publisher" == handle
                                ? ((("photos" == type && jQuery.isEmptyObject(publisher.data("photos"))) || "photos" != type) && (attachments.hide(), publisher.removeData(type), publisher_tab(publisher, type)),
                                    loader && loader.remove(),
                                    button_status(publisher_button, "reset"))
                                : "publisher-mini" == handle && button_status(publisher_button, "reset"),
                                eval(response.callback);
                        else if ("photos" == type) {
                            if ("cover-user" == handle || "cover-page" == handle || "cover-group" == handle || "cover-event" == handle) {
                                var image_path = uploads_path + "/" + response.file,
                                    cover_image = $(".profile-cover-wrapper img");
                                0 == cover_image.length
                                    ? ($(".profile-cover-wrapper").prepend("<img class='js_position-cover-cropped' data-init-position='0px' src='" + image_path + "' />"),
                                        $(".profile-cover-wrapper").prepend("<img class='js_position-cover-full x-hidden' src='" + image_path + "' />"))
                                    : (cover_image.attr("src", image_path), cover_image.removeClass("js_lightbox").removeAttr("data-id").removeAttr("data-image").removeAttr("data-context")),
                                    setTimeout(function () {
                                        init_picture_position();
                                    }, 1e3);
                            } else if ("picture-user" == handle || "picture-page" == handle || "picture-group" == handle) {
                                /* update (user|page|group) picture */
                                var image_path = uploads_path + "/" + response.file;
                                $(".profile-avatar-wrapper img").attr("src", image_path);
                                /* update crop image source */
                                $(".js_init-crop-picture").data("image", image_path);
                                init_picture_crop($(".js_init-crop-picture"));

                            } else if ("publisher" == handle) {
                                loader && loader.remove();
                                var files = publisher.data("photos");
                                for (var i in (0 == attachments.find("ul").length && attachments.append("<ul></ul>"), response.files)) {
                                    files[response.files[i].source] = response.files[i];
                                    var image_path = uploads_path + "/" + response.files[i].source;
                                    attachments.find("ul").append(render_template("#publisher-attachments-image-item", { src: response.files[i].source, image_path: image_path }));
                                }
                                publisher.data("photos", files), publisher.find('.js_publisher-tab[data-tab="' + type + '"]').addClass("activated"), button_status(publisher_button, "reset"), $("body .js_publisher").prop("disabled", !1);
                            } else if ("publisher-mini" == handle) {
                                loader && loader.remove();
                                var files = publisher.data("photos");
                                for (var i in (0 == attachments.find("ul").length && attachments.append("<ul></ul>"), response.files)) {
                                    files[response.files[i].source] = response.files[i];
                                    var image_path = uploads_path + "/" + response.files[i].source;
                                    attachments.find("ul").append(render_template("#publisher-attachments-image-item", { src: response.files[i].source, image_path: image_path, mini: !0 }));
                                }
                                publisher.data("photos", files), button_status(publisher_button, "reset"), $("body .js_publisher").prop("disabled", !1);
                            } else if ("comment" == handle) {
                                comment.data("photos", response.file), comment.find(".x-form-tools-attach").hide(), comment.find(".x-form-tools-voice").hide();
                                var image_path = uploads_path + "/" + response.file;
                                attachments.find("ul").append(render_template("#comment-attachments-item", { src: response.file, image_path: image_path }));
                            } else if ("chat" == handle) {
                                chat_widget.data("photo", response.file), chat_widget.find(".x-form-tools-attach").hide(), chat_widget.find(".x-form-tools-voice").hide();
                                var image_path = uploads_path + "/" + response.file;
                                attachments.find("ul").append(render_template("#chat-attachments-item", { src: response.file, image_path: image_path }));
                            } else if ("x-image" == handle) {
                                var image_path = uploads_path + "/" + response.file;
                                parent.css("background-image", "url(" + image_path + ")"), parent.find(".js_x-image-input").val(response.file).change(), parent.find("button").show();
                                $("body .js_publisher").prop("disabled", !1);
                            }
                        } else if ("video" == type)
                            if ("publisher" == handle) {
                                attachments.hide(), loader && loader.remove(), $('.publisher-meta[data-meta="' + type + '"]').show(), $(".publisher-custom-thumbnail").show();
                                var object = publisher.data(type);
                                (object.source = response.files[0]),
                                    publisher.data(type, object),
                                    publisher.find('.js_publisher-tab[data-tab="' + type + '"]').addClass("activated"),
                                    button_status(publisher_button, "reset"),
                                    $("body .js_publisher").prop("disabled", !1);
                            } else if ("publisher-mini" == handle) {
                                loader && loader.remove();
                                var files = publisher.data(type);
                                for (var i in (0 == attachments.find("ul").length && attachments.append("<ul></ul>"), response.files))
                                    (files[response.files[i]] = response.files[i]), attachments.find("ul").append(render_template("#publisher-attachments-video-item", { src: response.files[i], name: files_names[i] }));
                                publisher.data(type, files), button_status(publisher_button, "reset"), $("body .js_publisher").prop("disabled", !1);
                            } else "x-video" == handle && (parent.find(".x-image-success").show(), parent.find(".js_x-image-input").val(response.file), parent.find("button").show());
                        else if (("audio" == type || "file" == type) && "publisher" == handle) {
                            attachments.hide(), loader && loader.remove(), $('.publisher-meta[data-meta="' + type + '"]').show();
                            var object = publisher.data(type);
                            (object.source = response.file),
                                publisher.data(type, object),
                                publisher.find('.js_publisher-tab[data-tab="' + type + '"]').addClass("activated"),
                                button_status(publisher_button, "reset"),
                                $("body .js_publisher").prop("disabled", !1);
                        }
                    }
                    function _handle_error() {
                        uploader.prop("disabled", !1),
                            loader && loader.hide(),
                            "publisher" == handle
                                ? ((("photos" == type && jQuery.isEmptyObject(publisher.data("photos"))) || "photos" != type) && (attachments.hide(), publisher.removeData(type), publisher_tab(publisher, type)),
                                    loader && loader.remove(),
                                    button_status(publisher_button, "reset"))
                                : "publisher-mini" == handle && button_status(publisher_button, "reset"),
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    }
                    return $(this).ajaxSubmit(options), !1;
                }),
                $("body").on("click", ".js_delete-cover, .js_delete-picture", function (e) {
                    e.stopPropagation();
                    var id = $(this).data("id"),
                        handle = $(this).data("handle"),
                        remove = $(this).hasClass("js_delete-cover") ? "cover" : "picture";
                    if ("cover" == remove)
                        var wrapper = $(".profile-cover-wrapper"),
                            _title = __["Delete Cover"],
                            _message = __["Are you sure you want to remove your cover photo?"];
                    else
                        var wrapper = $(".profile-avatar-wrapper"),
                            _title = __["Delete Picture"],
                            _message = __["Are you sure you want to remove your profile picture?"];
                    confirm(_title, _message, function () {
                        $.post(
                            api["users/image_delete"],
                            { handle: handle, id: id },
                            function (response) {
                                response.callback
                                    ? eval(response.callback)
                                    : ("cover" == remove
                                        ? (wrapper.find(".profile-cover-delete").hide(), wrapper.find(".profile-cover-position").hide(), wrapper.find("img").remove())
                                        : (wrapper.find(".profile-avatar-delete").hide(),
                                            wrapper.find(".profile-avatar-crop").hide(),
                                            wrapper.find("img").removeClass("js_lightbox").removeAttr("data-id").removeAttr("data-image").removeAttr("data-context"),
                                            wrapper.find("img").attr("src", response.file)),
                                        $("#modal").modal("hide"));
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                    });
                }),
                $("body").on("click", ".js_x-image-remover", function () {
                    var e = $(this),
                        t = e.parents(".x-image");
                    confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                        t.attr("style", ""), t.find(".js_x-image-input").val("").change(), e.hide(), t.find(".x-image-success").attr("style", ""), $("#modal").modal("hide");
                    });
                }),
                $("body").on("click", ".js_init-crop-picture", function () {
                    init_picture_crop($(this));
                }),
                $("body").on("click", ".js_crop-picture", function () {
                    var id = $(this).data("id"),
                        handle = $(this).data("handle"),
                        values = $("#cropped-profile-picture").rcrop("getValues");
                    $.post(
                        api["users/image_crop"],
                        { handle: handle, id: id, x: values.x, y: values.y, height: values.height, width: values.width },
                        function (response) {
                            response.callback ? eval(response.callback) : ($("#modal").modal("hide"), window.location.reload());
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    });
                }),
                $("body").on("click", ".js_init-position-picture", function () {
                    init_picture_position();
                }),
                $("body").on("click", ".js_save-position-picture", function () {
                    var handle = $(".js_init-position-picture").data("handle"),
                        id = $(".js_init-position-picture").data("id"),
                        position = $(".js_position-picture-val").val();
                    $.post(
                        api["users/image_position"],
                        { handle: handle, id: id, position: position },
                        function (response) {
                            response.callback ? eval(response.callback) : ($("#modal").modal("hide"), window.location.reload());
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    });
                }),
                $("body").on("click", ".js_cancel-position-picture", function () {
                    $(".profile-cover-wrapper img").removeAttr("style").draggable("destroy"),
                        $(".profile-cover-change").show(),
                        $(".profile-cover-position").show(),
                        $(".profile-cover-delete").show(),
                        $(".profile-buttons-wrapper").show(),
                        $(".js_position-cover-cropped").show(),
                        $(".profile-cover-position-loader").hide(),
                        $(".profile-cover-position-buttons").hide();
                }),
                $("body").on("click", ".js_clear-searches", function () {
                    confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                        $.get(
                            api["users/settings"],
                            { edit: "clear_search_log" },
                            function (response) {
                                response.callback ? eval(response.callback) : window.location.reload();
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                    });
                }),
                $("body").on("show.bs.dropdown", ".js_live-requests, .js_live-messages, .js_live-notifications", function () {
                    var _this = $(this),
                        counter = parseInt(_this.find("span.counter").text()) || 0;
                    if (counter > 0) {
                        if ((_this.find("span.counter").text("0").hide(), _this.hasClass("js_live-requests"))) var data = { reset: "friend_requests", page: "LocalHub" };
                        else if (_this.hasClass("js_live-messages")) var data = { reset: "messages", page: "LocalHub" };
                        else if (_this.hasClass("js_live-notifications")) var data = { reset: "notifications", page: "LocalHub" };
                        $.post(
                            api["data/reset"],
                            data,
                            function (response) {
                                response && response.callback && eval(response.callback);
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                    }
                }),
                $("body").on("click", ".js_notifications-sound-toggle", function () {
                    (notifications_sound = $(this).is(":checked")),
                        $.get(
                            api["users/settings"],
                            { edit: "notifications_sound", notifications_sound: notifications_sound ? 1 : 0 },
                            function (response) {
                                response && response.callback && eval(response.callback);
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                
                $("body").on("click", ".js_friend-accept, .js_friend-decline", function () {

                    var id = $(this).data("uid"),
                        _this = $(this),
                        parent = $(this).parent(),
                        accept = parent.find(".js_friend-accept"),
                        decline = parent.find(".js_friend-decline"),
                        _do = $(this).hasClass("js_friend-accept") ? "friend-accept" : "friend-decline";
                    accept.hide(),
                        decline.hide(),
                        parent.append('<div class="loader loader_medium pr10"></div>'),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id },
                            function (response) {
                                var originVar = window.location.host,
                                locationPage = "";
                                (locationPage = "localhost" == originVar ? window.location.origin + "/stratus" : window.location.origin);
                                if (response.callback) {
                                    parent.find(".loader").remove();
                                    accept.show();
                                    decline.show();
                                    eval(response.callback);
                                } else {
                                    if (_do == "friend-accept") {
                                        _this.after(
                                            // '<button type="button" class="btn btn-success btn-delete js_friend-remove" data-uid="' + id + '"><i class="fa fa-check mr5"></i>' + __["Friends"] + "</button>"

                                            '<button type="button" class="btn btn-success btn-delete js_friend-remove" data-id="' + id + '"><img class="btn_image" src="' + locationPage + '/content/themes/default/images/svg/svgImg/newchecked1.svg"><img class="btn_image_hover" src="' + locationPage + '/content/themes/default/images/svg/svgImg/delete_icon.svg">' + '<span class="btn_image_">' + __.Friends + '</span><span class="btn_image_hover">' + __.Delete + '</span>' + "</button>"
                                        );
                                        !isNaN(parseInt($('.friendsCount').text())) ? $('.friendsCount').html(parseInt($('.friendsCount').text()) + 1) : 0;
                                    }

                                    if (_do == "friend-decline") {
                                        _this.closest('.feeds-item').remove();
                                    }


                                    accept.remove();
                                    decline.remove();
                                    parent.find(".loader").remove();
                                }

                              
                            },
                            "json"
                        ).fail(function () {
                            parent.find(".loader").remove(), accept.show(), decline.show(), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_friend-add, .js_friend-cancel, .js_friend-remove", function () {
                    var _this = $(this),
                        id = _this.data("uid");
                    if (_this.hasClass("js_friend-add")) var _do = "friend-add";
                    else if (_this.hasClass("js_friend-cancel")) var _do = "friend-cancel";
                    else var _do = "friend-remove";
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id },
                            function (response) {
                                var originVar = window.location.host,
                                    locationPage = "";
                                (locationPage = "localhost" == originVar ? window.location.origin + "/stratus" : window.location.origin),
                                    response.callback
                                        ? (button_status(_this, "reset"), eval(response.callback))
                                        : (button_status(_this, "reset"),
                                            "friend-add" == _do
                                                ? _this.after(
                                                    '<button type="button" class="btn btn-warning js_friend-cancel" data-uid="' +
                                                    id +
                                                    '"><img class="btn_image_" src="' +
                                                    locationPage +
                                                    '/content/themes/default/images/svg/svgImg/tick.svg">' +
                                                    __["Friend Request Sent"] +
                                                    "</button>"
                                                )
                                                : _this.after(
                                                    '<button type"button" class="btn btn-success js_friend-add" data-uid="' +
                                                    id +
                                                    '"><img class="btn_image_" src="' +
                                                    locationPage +
                                                    '/content/themes/default/images/svg/svgImg/add_friend_icon.svg"><img class="btn_image_hover" src="' +
                                                    locationPage +
                                                    '/content/themes/default/images/svg/svgImg/add_friend-hover.svg">' +
                                                    __["Add Friend"] +
                                                    "</button>"
                                                ),
                                            _this.remove());
                                          
                                            if (_do == "friend-remove") {
                                                !isNaN(parseInt($('.friendsCount').text())) ? $('.friendsCount').html(parseInt($('.friendsCount').text()) - 1) : 0;
                                            }
    
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_follow, .js_unfollow", function () {
                    var _this = $(this),
                        id = _this.data("uid"),
                        _do = _this.hasClass("js_follow") ? "follow" : "unfollow";
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id },
                            function (response) {
                                response.callback
                                    ? (button_status(_this, "reset"), eval(response.callback))
                                    : "follow" == _do
                                        ? _this.replaceWith('<button type="button" class="btn  btn-info js_unfollow" data-uid="' + id + '"><i class="fa fa-check mr5"></i>' + __.Following + "</button>")
                                        : _this.replaceWith('<button type="button" class="btn  btn-info js_follow" data-uid="' + id + '"><i class="fa fa-rss mr5"></i>' + __.Follow + "</button>");
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_block-user", function (e) {
                    e.preventDefault();
                    var id = $(this).data("uid");
                    confirm(__["Block User"], __["Are you sure you want to block this user?"], function () {
                        $.post(
                            api["users/connect"],
                            { do: "block", id: id },
                            function (response) {
                                response.callback ? eval(response.callback) : (window.location = site_path);
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                    });
                }),
                $("body").on("click", ".js_unblock-user", function (e) {
                    e.preventDefault();
                    var id = $(this).data("uid");
                    confirm(__["Unblock User"], __["Are you sure you want to unblock this user?"], function () {
                        $.post(
                            api["users/connect"],
                            { do: "unblock", id: id },
                            function (response) {
                                response.callback ? eval(response.callback) : window.location.reload();
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                    });
                }),
                $("body").on("click", ".js_delete-user", function (e) {
                    e.preventDefault(),
                        confirm(__.Delete, __["Are you sure you want to delete your account?"], function () {
                            $.post(
                                api["users/delete"],
                                function (response) {
                                    response.callback ? eval(response.callback) : (window.location = site_path);
                                },
                                "json"
                            ).fail(function () {
                                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                            });
                        });
                }),
                $("body").on("click", ".js_poke", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        name = _this.data("name");
                    $.post(
                        api["users/connect"],
                        { do: "poke", id: id },
                        function (response) {
                            _this.remove(), response.callback ? eval(response.callback) : modal("#modal-message", { title: __.Message, message: __["You haved poked"] + " " + name });
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    });
                }),
                $("body").on("click", ".js_like-page, .js_unlike-page", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        _do = _this.hasClass("js_like-page") ? "page-like" : "page-unlike";
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id },
                            function (response) {
                                var originVar = window.location.host,
                                    locationPage = "";
                                (locationPage = "localhost" == originVar ? window.location.origin + "/stratus" : window.location.origin),
                                    response.callback
                                        ? (button_status(_this, "reset"), eval(response.callback))
                                        : "page-like" == _do
                                            ? _this.replaceWith(
                                                '<button type="button" class="btn js_unlike-page" data-id="' + id + '"><img class="" src="' + locationPage + '/content/themes/default/images/svg/svgImg/local_hubN.svg">' + __.Unlike + "</button>"
                                            )
                                            : _this.replaceWith(
                                                '<button type="button" class="btn js_like-page" data-id="' + id + '"><img class="" src="' + locationPage + '/content/themes/default/images/svg/svgImg/local_hubN.svg">' + __.Like + "</button>"
                                            );
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_boost-page, .js_unboost-page", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        _do = _this.hasClass("js_boost-page") ? "page-boost" : "page-unboost";
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id },
                            function (response) {
                                response.callback
                                    ? (button_status(_this, "reset"), eval(response.callback))
                                    : "page-boost" == _do
                                        ? _this.replaceWith('<button type="button" class="btn btn-sm btn-danger js_unboost-page" data-id="' + id + '"><i class="fa fa-bolt mr5"></i>' + __.Unboost + "</button>")
                                        : _this.replaceWith('<button type="button" class="btn btn-sm btn-danger js_boost-page" data-id="' + id + '"><i class="fa fa-bolt mr5"></i>' + __.Boost + "</button>");
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_page-admin-addation, .js_page-admin-remove", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        uid = _this.data("uid") || 0,
                        _do = _this.hasClass("js_page-admin-addation") ? "page-admin-addation" : "page-admin-remove";
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id, uid: uid },
                            function (response) {
                                response.callback
                                    ? (button_status(_this, "reset"), eval(response.callback))
                                    : _this.hasClass("js_page-admin-addation")
                                        ? _this.replaceWith('<button type="button" class="btn btn-sm btn-danger js_page-admin-remove" data-id="' + id + '" data-uid="' + uid + '"><i class="fa fa-trash mr5"></i>' + __["Remove Admin"] + "</button>")
                                        : _this.replaceWith('<button type="button" class="btn btn-sm btn-primary js_page-admin-addation" data-id="' + id + '" data-uid="' + uid + '"><i class="fa fa-check mr5"></i>' + __["Make Admin"] + "</button>");
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_page-member-remove", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        uid = _this.data("uid") || 0;
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: "page-member-remove", id: id, uid: uid },
                            function (response) {
                                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : _this.closest(".feeds-item").slideUp();
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_join-group, .js_leave-group", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        privacy = _this.data("privacy"),
                        _do = _this.hasClass("js_join-group") ? "group-join" : "group-leave";
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id },
                            function (response) {
                                var originVar = window.location.host,
                                    locationPage = "";
                                (locationPage = "localhost" == originVar ? window.location.origin + "/stratus" : window.location.origin),
                                    response.callback
                                        ? (button_status(_this, "reset"), eval(response.callback))
                                        : _this.hasClass("js_join-group")
                                            ? "public" == privacy
                                                ? _this.replaceWith(
                                                    '<button type="button" class="btn btn-success btn-delete js_leave-group" data-id="' + id + '" data-privacy="' + privacy + '"><i class="fa fa-check mr5"></i>' + __.Joined + "</button>"
                                                )
                                                : _this.replaceWith('<button type="button" class="btn btn-warning js_leave-group" data-id="' + id + '" data-privacy="' + privacy + '"><i class="fa fa-clock mr5"></i>' + __.Pending + "</button>")
                                            : _this.replaceWith(
                                                '<button type="button" class="btn btn-success js_join-group" data-id="' +
                                                id +
                                                '" data-privacy="' +
                                                privacy +
                                                '"><img class="btn_image_" src="' +
                                                locationPage +
                                                '/content/themes/default/images/svg/svgImg/add_friend_icon.svg"><img class="btn_image_hover" src="' +
                                                locationPage +
                                                '/content/themes/default/images/svg/svgImg/add_friend-hover.svg">' +
                                                __.Join +
                                                "</button>"
                                            );
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_group-request-accept, .js_group-request-decline", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        uid = _this.data("uid") || 0,
                        _do = _this.hasClass("js_group-request-accept") ? "group-accept" : "group-decline";
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id, uid: uid },
                            function (response) {
                                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : _this.closest(".feeds-item").slideUp();
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_group-admin-addation, .js_group-admin-remove", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        uid = _this.data("uid") || 0,
                        _do = _this.hasClass("js_group-admin-addation") ? "group-admin-addation" : "group-admin-remove";
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id, uid: uid },
                            function (response) {
                                response.callback
                                    ? (button_status(_this, "reset"), eval(response.callback))
                                    : _this.hasClass("js_group-admin-addation")
                                        ? _this.replaceWith('<button type="button" class="btn btn-sm btn-danger js_group-admin-remove" data-id="' + id + '" data-uid="' + uid + '"><i class="fa fa-trash mr5"></i>' + __["Remove Admin"] + "</button>")
                                        : _this.replaceWith(
                                            '<button type="button" class="btn btn-sm btn-primary js_group-admin-addation" data-id="' + id + '" data-uid="' + uid + '"><i class="fa fa-check mr5"></i>' + __["Make Admin"] + "</button>"
                                        );
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_group-member-remove", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        uid = _this.data("uid") || 0;
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: "group-member-remove", id: id, uid: uid },
                            function (response) {
                                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : _this.closest(".feeds-item").slideUp();
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_go-event, .js_ungo-event", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        _do = _this.hasClass("js_go-event") ? "event-go" : "event-ungo";
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id },
                            function (response) {
                                var originVar = window.location.host,
                                    locationPage = "";
                                (locationPage = "localhost" == originVar ? window.location.origin + "/stratus" : window.location.origin),
                                    response.callback
                                        ? (button_status(_this, "reset"), eval(response.callback))
                                        : "event-go" == _do
                                            ? _this.replaceWith(
                                                '<button type="button" class="btn js_ungo-event" data-id="' + id + '"><img src="' + locationPage + '/content/themes/default/images/svg/svgImg/icon_active_state.svg">' + __.Going + "</button>"
                                            )
                                            : _this.replaceWith(
                                                '<button type="button" class="btn js_go-event" data-id="' + id + '"><img class="blackicon" src="' + locationPage + '/content/themes/default/images/svg/calendar.svg">' + __.Going + "</button>"
                                            );
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_interest-event, .js_uninterest-event", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        _do = _this.hasClass("js_interest-event") ? "event-interest" : "event-uninterest";
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id },
                            function (response) {
                                var originVar = window.location.host,
                                    locationPage = "";
                                (locationPage = "localhost" == originVar ? window.location.origin + "/stratus" : window.location.origin),
                                    response.callback
                                        ? (button_status(_this, "reset"), eval(response.callback))
                                        : "event-interest" == _do
                                            ? _this.replaceWith(
                                                '<button type="button" class="btn js_uninterest-event" data-id="' +
                                                id +
                                                '"><img class="blackicon" src="' +
                                                locationPage +
                                                '/content/themes/default/images/svg/svgImg/icon_active_state.svg">' +
                                                __.Interested +
                                                "</button>"
                                            )
                                            : _this.replaceWith(
                                                '<button type="button" class="btn js_interest-event" data-id="' +
                                                id +
                                                '"><div class="svg-container"><img class="blackicon" src="' +
                                                locationPage +
                                                '/content/themes/default/images/svg/svgImg/event.svg"><img class="whiteicon" src="' +
                                                locationPage +
                                                '/content/themes/default/images/svg/svgImg/eventHover.svg"></div>' +
                                                __.Interested +
                                                "</button>"
                                            );
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_page-invite, .js_group-invite, .js_event-invite", function () {
                    var _this = $(this),
                        id = _this.data("id"),
                        uid = _this.data("uid") || 0,
                        _do = "event-invite";
                    if (_this.hasClass("js_page-invite")) var _do = "page-invite";
                    else if (_this.hasClass("js_group-invite")) var _do = "group-invite";
                    else var _do = "event-invite";
                    button_status(_this, "loading"),
                        $.post(
                            api["users/connect"],
                            { do: _do, id: id, uid: uid },
                            function (response) {
                                response.callback ? (button_status(_this, "reset"), eval(response.callback)) : _this.remove();
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_delete-page, .js_delete-group, .js_delete-event", function (e) {
                    e.preventDefault();
                    var id = $(this).data("id");
                    if ($(this).hasClass("js_delete-page")) var handle = "page";
                    else if ($(this).hasClass("js_delete-group")) var handle = "group";
                    else if ($(this).hasClass("js_delete-event")) var handle = "event";
                    confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                        $.post(
                            api["pages_groups_events/delete"],
                            { handle: handle, id: id },
                            function (response) {
                                response.callback ? eval(response.callback) : (window.location = site_path);
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                    });
                }),
                $("body").on("click", ".js_report", function (e) {
                    e.preventDefault;
                    var id = $(this).data("id"),
                        handle = $(this).data("handle");
                    return (
                        confirm(__.Report, __["Are you sure you want to report this?"], function () {
                            $.post(
                                api["data/report"],
                                { handle: handle, id: id },
                                function (response) {
                                    response.callback && eval(response.callback);
                                },
                                "json"
                            ).fail(function () {
                                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                            });
                        }),
                        !1
                    );
                }),
                $("body").on("click", ".js_session-deleter", function () {
                    var id = $(this).data("id");
                    confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                        $.post(
                            api["users/session"],
                            { handle: "session", id: id },
                            function (response) {
                                response.callback ? eval(response.callback) : window.location.reload();
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                    });
                }),
                $("body").on("click", ".js_session-delete-all", function () {
                    var id = $(this).data("id");
                    confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                        $.post(
                            api["users/session"],
                            { handle: "sessions" },
                            function (response) {
                                response.callback ? eval(response.callback) : window.location.reload();
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                    });
                }),
                $("body").on("click", ".js_ads-delete-campaign", function () {
                    var id = $(this).data("id");
                    confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                        $.post(
                            api["ads/campaign"],
                            { do: "delete", id: id },
                            function (response) {
                                response.callback ? eval(response.callback) : window.location.reload();
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                    });
                }),
                $("body").on("click", ".js_ads-stop-campaign, .js_ads-resume-campaign", function () {
                    var id = $(this).data("id"),
                        _do = $(this).hasClass("js_ads-stop-campaign") ? "stop" : "resume";
                    confirm(__.Delete, __["Are you sure you want to do this?"], function () {
                        $.post(
                            api["ads/campaign"],
                            { do: _do, id: id },
                            function (response) {
                                response.callback ? eval(response.callback) : window.location.reload();
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                    });
                }),
                $("#js_ads-audience-countries, #js_ads-audience-gender, #js_ads-audience-relationship").on("change", function () {
                    var countries = $("#js_ads-audience-countries").val(),
                        gender = $("#js_ads-audience-gender").val(),
                        relationship = $("#js_ads-audience-relationship").val();
                    $("#js_ads-potential-reach-loader").show(),
                        $.post(
                            api["ads/campaign"],
                            { do: "potential_reach", countries: countries, gender: gender, relationship: relationship },
                            function (response) {
                                response.callback ? eval(response.callback) : $("#js_ads-potential-reach").text(response), $("#js_ads-potential-reach-loader").hide();
                            },
                            "json"
                        ).fail(function () {
                            modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("#js_campaign-type").on("change", function () {
                    "url" == $(this).val() && ($("#js_campaign-type-url").fadeIn(), $("#js_campaign-type-page").hide(), $("#js_campaign-type-group").hide(), $("#js_campaign-type-event").hide()),
                        "page" == $(this).val() && ($("#js_campaign-type-url").hide(), $("#js_campaign-type-page").fadeIn(), $("#js_campaign-type-group").hide(), $("#js_campaign-type-event").hide()),
                        "group" == $(this).val() && ($("#js_campaign-type-url").hide(), $("#js_campaign-type-page").hide(), $("#js_campaign-type-group").fadeIn(), $("#js_campaign-type-event").hide()),
                        "event" == $(this).val() && ($("#js_campaign-type-url").hide(), $("#js_campaign-type-page").hide(), $("#js_campaign-type-group").hide(), $("#js_campaign-type-event").fadeIn());
                }),
                void 0 === window.canRunAds)
        ) {
            if ($(".adblock-warning-message").length > 0) return void $(".adblock-warning-message").slideDown();
            adblock_detector && $(render_template("#adblock-detector")).appendTo("body").show();
        }
        $("body").on("click", ".js_developers-oauth-app", function () {
            var id = $(this).data("id");
            $.post(
                api["developers/app"],
                { do: "oauth", id: id },
                function (response) {
                    response.callback ? eval(response.callback) : (window.location = response.redirect_url);
                },
                "json"
            ).fail(function () {
                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
            });
        }),
            $("body").on("click", ".js_developers-delete-app", function () {
                var id = $(this).data("id");
                confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                    $.post(
                        api["developers/app"],
                        { do: "delete", id: id },
                        function (response) {
                            response.callback ? eval(response.callback) : window.location.reload();
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    });
                });
            }),
            $("body").on("click", ".js_delete-user-app", function () {
                var id = $(this).data("id");
                confirm(__.Delete, __["Are you sure you want to delete this?"], function () {
                    $.post(
                        api["users/connect"],
                        { do: "delete-app", id: id },
                        function (response) {
                            response.callback ? eval(response.callback) : window.location.reload();
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    });
                });
            }),
            $(document).ready(function () {
                $(".multiple-recipients-image").length && ($(".gcDiv a").click(), $(".forgroup li:first-child a").click()),
                    $(window).width() < 991 && $("body").hasClass("messages") && $("body").hasClass("new") && ($(".leftSideChatBar").css("display", "none"), $(".js_conversation-container").css("display", "block"));
            }),
            $(".dmDiv").click(function () {
                $(".dmDiv").addClass("active"), $(".gcDiv").removeClass("active"), $(".forsingle li:first-child a").click();
            }),
            $(".gcDiv").click(function () {
                $(".gcDiv").addClass("active"), $(".dmDiv").removeClass("active"), $(".forgroup li:first-child a").click();
            }),
            $("body").on("click", ".backBtn", function (e) {
                $(window).width() < 991 && $("body").hasClass("messages") && $("body").hasClass("new") && ($(".leftSideChatBar").css("display", "block"), $(".js_conversation-container").css("display", "none"));
            });
    });
