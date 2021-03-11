var api = [];
function guid() {
    function e() {
        return Math.floor(65536 * (1 + Math.random()))
            .toString(16)
            .substring(1);
    }
    return e() + e() + "-" + e() + "-" + e() + "-" + e() + "-" + e() + e() + e();
}
function htmlEntities(e) {
    return String(e).replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;");
}
function is_empty(e) {
    return null == e.match(/\S/);
}
function get_parameter_by_name(e) {
    var t = window.location.href;
    e = e.replace(/[\[\]]/g, "\\$&");
    var a = new RegExp("[?&]" + e + "(=([^&#]*)|&|#|$)").exec(t);
    return a ? (a[2] ? decodeURIComponent(a[2].replace(/\+/g, " ")) : "") : null;
}
function initialize() {
    $("body").tooltip({ selector: '[data-toggle="tooltip"], [data-tooltip=tooltip]' }),
        $(".js_scroller").each(function () {
            var e = $(this),
                t = e.attr("data-slimScroll-height") || "280px",
                a = e.attr("data-slimScroll-start") || "top";
            e.parent().hasClass("custom-scrollbar") || (e.parent().addClass("custom-scrollbar"), e.css({ "overflow-y": "auto", height: t }), "bottom" == a && e.scrollTop(e.height()));
        }),
        $(".js_see-more-infinite").bind("inview", function (e, t) {
            1 == t && $(window).width() >= 970 && load_more($(this));
        }),
        $("audio.js_audio").on("play", function () {
            $("audio")
                .not(this)
                .each(function (e, t) {
                    t.pause();
                });
        }),
        $("video.js_fluidplayer").each(function () {
            if (0 == $(this).parents(".fluid_video_wrapper").length) {
                var e = $(this).attr("id");
                fluidPlayer($(this).attr("id"), { layoutControls: { primaryColor: "#3367d6", fillToContainer: !0 } }).on("playing", function () {
                    $("video.js_fluidplayer").each(function () {
                        e != $(this).attr("id") && $(this).get(0).pause();
                    });
                });
            }
        }),
        $("video.js_videojs").each(function (e) {
            0 == $(this).parents("div.video-js").length &&
                videojs($(this)[0], {}, function () {
                    this.on("play", function () {
                        $(".js_videojs").each(function (t) {
                            e !== t && this.player.pause();
                        });
                    });
                });
        }),
        $(".js_readmore").each(function () {
            var e = $(this),
                t = e.attr("data-height") || 110;
            void 0 === e.attr("data-readmore") &&
                ($(this).closest(".feeds_post").data("id"), window.location.origin, e.readmore({ collapsedHeight: t, moreLink: '<a href="#">' + __["Read more"] + "</a>", lessLink: '<a href="#">' + __["Read less"] + "</a>" }));
        }),
        $(".js_autosize").length > 0 && autosize($(".js_autosize")),
        $(".js_moment").each(function () {
            var e = $(this),
                t = e.data("time"),
                a = $("html").attr("lang") || "en-us",
                s = moment().utcOffset(),
                o = moment(t).add({ minutes: s }).locale(a);
            e.text(o.fromNow()).attr("title", o.format("dddd, MMMM D, YYYY h:m a"));
        });
}
function modal() {
    switch (
    (("#modal-login" != arguments[0] && "#chat-calling" != arguments[0] && "#chat-ringing" != arguments[0]) ||
        ($("#modal").data("bs.modal") ? ($("#modal").data("bs.modal").options = { backdrop: "static", keyboard: !1 }) : $("#modal").modal({ backdrop: "static", keyboard: !1 })),
        $("#modal").is(":visible") || $("#modal").modal("show"),
        $(".modal-dialog").removeClass("modal-sm"),
        $(".modal-dialog").removeClass("modal-lg"),
        $(".modal-dialog").removeClass("modal-xlg"),
        arguments[2])
    ) {
        case "small":
            $(".modal-dialog").addClass("modal-sm");
            break;
        case "large":
            $(".modal-dialog").addClass("modal-lg");
            break;
        case "extra-large":
            $(".modal-dialog").addClass("modal-xl");
    }
    $(".modal-content:last").html(render_template(arguments[0], arguments[1])), "function" == typeof initialize_modal && initialize_modal();
}
function confirm(e, t, a) {
    modal("#modal-confirm", { title: e, message: t }),
        $("#modal-confirm-ok").click(function () {
            button_status($(this), "loading"), a && a();
        });
}
function render_template(e, t) {
    var a = $(e).html();
    return Mustache.parse(a), Mustache.render(a, t);
}
function load_more(element) {
    if (!element.hasClass("done") && !element.hasClass("loading")) {
        var _this = element,
            loading = _this.find(".loader"),
            text = _this.find("span"),
            remove = _this.data("remove") || !1;
        if (void 0 !== _this.data("target-stream")) var stream = _this.parent().find("ul" + _this.data("target-stream"));
        else var stream = _this.parent().find("ul:first");
        var data = {};
        (data.get = _this.data("get")),
            void 0 !== _this.data("filter") && (data.filter = _this.data("filter")),
            void 0 !== _this.data("type") && (data.type = _this.data("type")),
            void 0 !== _this.data("uid") && (data.uid = _this.data("uid")),
            void 0 !== _this.data("id") && (data.id = _this.data("id")),
            (data.offset = _this.data("offset") || 1),
            _this.addClass("loading"),
            text.hide(),
            loading.removeClass("x-hidden"),
            data.page = _this.data("page")
        $.post(
            api["data/load"],
            data,
            function (response) {
                if ((_this.removeClass("loading"), text.show(), loading.addClass("x-hidden"), response.callback)) eval(response.callback);
                else if (response.data) {
                    data["offset"]++;
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
                        bricklayer.append(valuesPost)
                    }

                    if(!stream.hasClass('-list_items wq')){
                        if ((data.offset++, response.append ? stream.append(response.data) : stream.prepend(response.data), $(window).width() > 1024)) {
                            if ($("body #landing_feeds_post_ul").length > 0) var macyInstance = Macy({ container: ".feeds_post_ul", trueOrder: !0, columns: 2, waitForImages: !0 });
                            if ($("body #feeds_post_ul").length > 0) var macyInstance = Macy({ container: ".feeds_post_ul", trueOrder: !0, columns: 2, waitForImages: !0 }); //macyInstance.recalculate();
                        }
                    }
                    setTimeout(photo_grid(), 200), "messages" == data.get && ((chat_widget = _this.parents(".chat-widget, .panel-messages")), color_chat_box(chat_widget, chat_widget.data("color")));
                } else remove ? _this.remove() : (_this.addClass("done"), text.text(__["There is no more data to show"]));
                _this.data("offset", data.offset);
            },
            "json"
        ).fail(function () {
            _this.removeClass("loading"), text.show(), loading.addClass("x-hidden"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
        });
    }
}
function photo_grid() {
    $(".pg_2o3_in").each(function () {
        if ($(this).parents(".pg_3x").length > 0) var e = (height = 0.667 * $(this).parents(".pg_3x").width());
        $(this).parents(".pg_4x").length > 0 && (e = height = 0.749 * $(this).parents(".pg_4x").width()), $(this).width(e), $(this).height(height);
    }),
        $(".pg_1o3_in").each(function () {
            if ($(this).parents(".pg_3x").length > 0)
                var e = 0.332 * $(this).parents(".pg_3x").width(),
                    t = ($(this).parent(".pg_1o3").prev().height() - 1) / 2;
            $(this).parents(".pg_4x").length > 0 && ((e = 0.25 * $(this).parents(".pg_4x").width()), (t = ($(this).parent(".pg_1o3").prev().height() - 2) / 3)), $(this).width(e), $(this).height(t);
        });
    if ($("body #landing_feeds_post_ul").length > 0) var macyInstance = Macy({ container: ".feeds_post_ul", trueOrder: !0, columns: 2, waitForImages: !0 });

    $("body #profile_feeds_post_ul").length > 0 &&
        setTimeout(function () {
            Macy({ container: ".feeds_post_ul", trueOrder: !0, columns: 1, waitForImages: !0 });
        }, 1e3),
        $("#feeds_post_ul").length > 0 && Macy({ container: ".feeds_post_ul", trueOrder: !0, columns: 2, waitForImages: !0 });
}
function button_status(e, t) {
    "loading" == t ? (e.data("text", e.html()), e.prop("disabled", !0), e.html('<span class="spinner-grow spinner-grow-sm mr10"></span>' + __.Loading)) : (e.prop("disabled", !1), e.html(e.data("text")));
}
(api["core/theme"] = ajax_path + "core/theme.php"),
    (api["data/load"] = ajax_path + "data/load.php"),
    (api["data/search"] = ajax_path + "data/search.php"),
    (api["payments/paypal"] = ajax_path + "payments/paypal.php"),
    (api["payments/stripe"] = ajax_path + "payments/stripe.php"),
    (api["payments/coinpayments"] = ajax_path + "payments/coinpayments.php"),
    (api["payments/2checkout"] = ajax_path + "payments/2checkout.php"),
    (api["ads/click"] = ajax_path + "ads/click.php"),
    (api["ads/wallet"] = ajax_path + "ads/wallet.php"),
    (Audio.prototype.stop = function () {
        this.pause(), (this.currentTime = 0);
    }),
    $(function () {
        $("body").on("click", ".parent-element-li", function (e) {
            e.stopPropagation(), $(this).focus(), $(this).hasClass("parent-element-show") ? $(this).removeClass("parent-element-show") : $(this).addClass("parent-element-show");
        }),
            $("body").on("click", ".left-sidebar-second-ul", function (e) {
                e.stopPropagation(), $(".parent-element-li").removeClass("parent-element-show");
            });
    }),
    $(function () {
        initialize(),
            $(document).ajaxComplete(function () {
                initialize();
            });
        var _t = $("body").attr("data-hash-tok"),
            _p = $("body").attr("data-hash-pos");
        switch (_p) {
            case "1":
                var _l = "Z";
                break;
            case "2":
                var _l = "m";
                break;
            case "3":
                var _l = "B";
                break;
            case "4":
                var _l = "l";
                break;
            case "5":
                var _l = "K";
        }
        function _submitAJAXform(element) {
            var url = element.data("url"),
                submit = element.find('button[type="submit"]'),
                error = element.find(".alert.alert-danger"),
                success = element.find(".alert.alert-success");
            if (element.find(".js_hidden-section").length > 0 && !element.find(".js_hidden-section").is(":visible")) return element.find(".js_hidden-section").slideDown(), !1;
            button_status(submit, "loading"), "undefined" != typeof tinyMCE && tinyMCE.triggerSave();
            var data = element.hasClass("js_ajax-forms") ? element.serialize() : element.find("select, textarea, input").serialize();
            $.post(
                ajax_path + url,
                data,
                function (response) {
                    button_status(submit, "reset"),
                        response.error
                            ? (success.is(":visible") && success.hide(), error.html(response.message).slideDown())
                            : response.success
                                ? (error.is(":visible") && error.hide(), success.html(response.message).slideDown())
                                : eval(response.callback),
                        $(".spinner-grow").hide(),
                        $("#getInTouch").get(0).reset(),
                        // $(".learn-btn").text("Submit");
                        $(".cnt_btn").text("Submit");
                },
                "json"
            ).fail(function () {
                button_status(submit, "reset"), success.is(":visible") && success.hide(), error.html(__["There is something that went wrong!"]).slideDown();
            });
        }
        function twocheckout_token_request() {
            var e = $("#twocheckout_form"),
                t = e.find('button[type="submit"]'),
                a = e.find(".alert.alert-danger");
            if (
                (button_status(t, "loading"),
                    "" != e.find('input[name="card_number"]').val() &&
                    "" != e.find('input[select="card_exp_month"]').val() &&
                    "" != e.find('select[name="card_exp_year"]').val() &&
                    "" != e.find('input[name="card_cvv"]').val() &&
                    "" != e.find('input[name="billing_name"]').val() &&
                    "" != e.find('input[name="billing_email"]').val() &&
                    "" != e.find('input[name="billing_phone"]').val() &&
                    "" != e.find('input[name="billing_address"]').val() &&
                    "" != e.find('input[name="billing_city"]').val() &&
                    "" != e.find('input[name="billing_state"]').val() &&
                    "" != e.find('select[name="billing_country"]').val() &&
                    "" != e.find('input[name="billing_zip_code"]').val())
            ) {
                var s = {
                    sellerId: twocheckout_merchant_code,
                    publishableKey: twocheckout_publishable_key,
                    ccNo: e.find('input[name="card_number"]').val(),
                    cvv: e.find('input[name="card_cvv"]').val(),
                    expMonth: e.find('select[name="card_exp_month"]').val(),
                    expYear: e.find('select[name="card_exp_year"]').val(),
                };
                TCO.requestToken(twocheckout_success_callback, twocheckout_error_callback, s);
            } else button_status(t, "reset"), a.html(__["You must fill in all of the fields"]).slideDown();
        }
        function twocheckout_success_callback(data) {
            var form = $("#twocheckout_form"),
                submit = form.find('button[type="submit"]'),
                error = form.find(".alert.alert-danger");
            form.find('input[name="token"]').val(data.response.token.token),
                $.post(
                    api["payments/2checkout"],
                    form.serialize(),
                    function (response) {
                        button_status(submit, "reset"), response.error ? error.html(response.message).slideDown() : eval(response.callback);
                    },
                    "json"
                ).fail(function () {
                    button_status(submit, "reset"), error.html(__["There is something that went wrong!"]).slideDown();
                });
        }
        function twocheckout_error_callback(e) {
            var t = $("#twocheckout_form"),
                a = t.find('button[type="submit"]'),
                s = t.find(".alert.alert-danger");
            200 === e.errorCode ? twocheckout_token_request() : (button_status(a, "reset"), s.html(e.errorMsg).slideDown());
        }
        if (
            (6 != _p && _t[_t[0]] != _l && document.write("Your session hash has been broken, Please contact Stratus's support!"),
                $("[data-toggle=offcanvas]").click(function () {
                    $(".offcanvas").toggleClass("active"), $(".offcanvas").hasClass("active") ? $(".offcanvas").css("minHeight", $(".offcanvas-sidebar > .card").height()) : $(".offcanvas").css("minHeight", "unset");
                }),
                photo_grid(),
                $(window).on("resize", function () {
                    setTimeout(photo_grid(), 200);
                }),
                $("body").on("click", '[data-toggle="modal"]', function (e) {
                    if ((e.preventDefault(), $(e.target).hasClass("link") && $(e.target).hasClass("disabled"))) return !1;
                    var url = $(this).data("url"),
                        options = $(this).data("options"),
                        size = $(this).data("size") || "default";
                    0 == url.indexOf("#")
                        ? modal(url, options, size)
                        : (modal("#modal-loading"),
                            $.getJSON(ajax_path + url, function (response) {
                                response && response.callback && eval(response.callback);
                            }).fail(function () {
                                modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                            }));
                }),
                $("body").on("click", ".js_dropdown-keepopen", function (e) {
                    e.stopPropagation();
                }),
                $("body").on("click", ".btn-group .dropdown-item", function (e) {
                    e.preventDefault();
                    var t = $(this).parents(".btn-group");
                    t.find('input[type="hidden"]').val($(this).data("value")),
                        t.find(".btn-group-text").text($(this).text()),
                        t.find(".btn-group-icon").attr("class", $(this).find("i.fa").attr("class")).addClass("btn-group-icon"),
                        t.attr("data-original-title", $(this).data("title")),
                        t.attr("data-value", $(this).data("value")),
                        t.data("value", $(this).data("value")),
                        t.tooltip();
                }),
                $(".js_toggle-panel").click(function (e) {
                    e.preventDefault;
                    var t = $(this).parents(".js_panel");
                    return t.hide(), t.siblings().fadeIn(), !1;
                }),
                $("body").on("submit", ".js_ajax-forms", function (e) {
                    e.preventDefault(), _submitAJAXform($(this));
                }),
                $("body").on("click", '.js_ajax-forms-html button[type="submit"]', function () {
                    _submitAJAXform($(this).closest(".js_ajax-forms-html"));
                }),
                $("body").on("click", ".js_see-more", function () {
                    load_more($(this));
                }),
                $(".js_see-more-infinite").bind("inview", function (e, t) {
                    1 == t && (mobile_infinite_scroll || $(window).width() >= 970) && load_more($(this));
                }),
                $("body").on("keyup", "#search-input", function () {
                    var query = $(this).val();
                    if (!is_empty(query)) {
                        $("#search-history").hide(), $("#search-results").show();
                        var hashtags = query.match(/#(\w+)/gi);
                        if (null !== hashtags && hashtags.length > 0) {
                            var query = hashtags[0].replace("#", "");
                            $("#search-results .dropdown-widget-header").hide(), $("#search-results-all").hide(), $("#search-results .dropdown-widget-body").html(render_template("#search-for", { query: query, hashtag: !0 }));
                        } else
                            $.post(
                                api["data/search"],
                                { query: query },
                                function (response) {
                                    response.callback
                                        ? eval(response.callback)
                                        : response.results
                                            ? ($("#search-results .dropdown-widget-header").show(),
                                                $("#search-results-all").show(),
                                                $("#search-results .dropdown-widget-body").html(response.results),
                                                $("#search-results-all").attr("href", site_path + "/search/" + query))
                                            : ($("#search-results .dropdown-widget-header").hide(), $("#search-results-all").hide(), $("#search-results .dropdown-widget-body").html(render_template("#search-for", { query: query })));
                                },
                                "json"
                            );
                    }
                }),
                $("body").on("keydown", "#search-input", function (e) {
                    if (13 == e.keyCode) {
                        if ((e.preventDefault, !is_empty((a = $(this).val())))) {
                            var t = a.match(/#(\w+)/gi);
                            if (null !== t && t.length > 0) {
                                var a = t[0].replace("#", "");
                                window.location = site_path + "/search/hashtag/" + a;
                            } else window.location = site_path + "/search/" + a;
                        }
                        return !1;
                    }
                }),
                $("body").on("click", "#search-input", function () {
                    "" != $(this).val() ? $("#search-results").show() : $("#search-history").show();
                }),
                $("body").on("click", function (e) {
                    $(e.target).is("#search-input") || $("#search-results, #search-history").hide();
                }),
                $("body").on("submit", ".js_search-form", function (e) {
                    e.preventDefault;
                    var t = this.query.value,
                        a = $(this).data("handle");
                    if (!is_empty(t))
                        if (void 0 !== a) window.location = site_path + "/" + a + "/search/" + t;
                        else {
                            var s = t.match(/#(\w+)/gi);
                            null !== s && s.length > 0 ? ((t = s[0].replace("#", "")), (window.location = site_path + "/search/hashtag/" + t)) : (window.location = site_path + "/search/" + t);
                        }
                    return !1;
                }),
                $("body").on("click", ".youtube-player", function () {
                    if ($(this).hasClass("js_lightbox-live")) return !1;
                    $(this).html('<iframe src="https://www.youtube.com/embed/' + $(this).data("id") + '?autoplay=1" frameborder="0" allowfullscreen="1"></iframe>');
                }),
                $("body").on("click", ".js_payment-paypal", function () {
                    var _this = $(this),
                        data = {};
                    (data.handle = _this.data("handle")),
                        "packages" == data.handle && (data.package_id = _this.data("id")),
                        "wallet" == data.handle && (data.price = _this.data("price")),
                        button_status(_this, "loading"),
                        $.post(
                            api["payments/paypal"],
                            data,
                            function (response) {
                                button_status(_this, "reset"), response && response.callback && eval(response.callback);
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_payment-stripe", function () {
                    var _this = $(this),
                        method = _this.data("method"),
                        data = {};
                    (data.handle = _this.data("handle")), "packages" == data.handle && (data.package_id = _this.data("id")), "wallet" == data.handle && (data.price = _this.data("price")), button_status(_this, "loading");
                    var handler = StripeCheckout.configure({
                        key: stripe_key,
                        locale: "english",
                        image: _this.data("img") || "",
                        token: function (token) {
                            (data.token = token.id),
                                (data.email = token.email),
                                $.post(
                                    api["payments/stripe"],
                                    data,
                                    function (response) {
                                        button_status(_this, "reset"), response && response.callback && eval(response.callback);
                                    },
                                    "json"
                                ).fail(function () {
                                    button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                                });
                        },
                    });
                    handler.open({
                        name: site_title,
                        description: _this.data("name") || "",
                        amount: 100 * _this.data("price"),
                        currency: currency,
                        alipay: "alipay" == method,
                        opened: function () {
                            _this.button("reset"), $("#modal").modal("hide");
                        },
                    }),
                        $(window).on("popstate", function () {
                            handler.close();
                        });
                }),
                $("body").on("click", ".js_payment-coinpayments", function () {
                    var _this = $(this),
                        data = {};
                    (data.handle = _this.data("handle")),
                        "packages" == data.handle && (data.package_id = _this.data("id")),
                        "wallet" == data.handle && (data.price = _this.data("price")),
                        button_status(_this, "loading"),
                        $.post(
                            api["payments/coinpayments"],
                            data,
                            function (response) {
                                button_status(_this, "reset"), response.coinpayments_form && $(response.coinpayments_form).appendTo("body").submit(), response.callback && eval(response.callback);
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("submit", "#twocheckout_form", function (e) {
                    return (
                        e.preventDefault(),
                        TCO.loadPubKey("production", function () {
                            twocheckout_token_request();
                        }),
                        !1
                    );
                }),
                $("body").on("click", ".js_payment-wallet-package", function () {
                    var _this = $(this);
                    button_status(_this, "loading"),
                        $.post(
                            api["ads/wallet"],
                            { do: "wallet_package_payment", package_id: _this.data("id") },
                            function (response) {
                                button_status(_this, "reset"), response && response.callback && eval(response.callback);
                            },
                            "json"
                        ).fail(function () {
                            button_status(_this, "reset"), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                        });
                }),
                $("body").on("click", ".js_ads-click-campaign", function () {
                    var id = $(this).data("id");
                    $.post(
                        api["ads/click"],
                        { id: id },
                        function (response) {
                            response.callback && eval(response.callback);
                        },
                        "json"
                    ).fail(function () {
                        modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] });
                    });
                }),
                $(document).ready(function () {
                    $("body").click(function () { }),
                        $(".leftSidebarButton").click(function () {
                            $(".offcanvas-sidebar").toggleClass("showSidebar"), $(".footer_mobile").toggleClass("hideShow_footerNav");
                        }),
                        "block" == $(".footer_mobile:visible").css("display") && document.body.classList.add("footer_bar_show"),
                        $(".footer_mobile ul").hasClass("memories") && $(".addPost").remove(),
                        $("body").hasClass("messages-localhub") && ($(".footer_mobile").remove(), $("body").removeClass("footer_bar_show")),
                        $("body").hasClass("footer_bar_show") ? $("#stratus_hide_leftbutton").css("display", "none") : $("#stratus_hide_leftbutton").css("display", "block");
                }),
                "block" == $(".footer_mobile:visible").css("display"))
        ) {
            const e = window.location.search,
                t = new URLSearchParams(e),
                a = t.get("parm");
            a && "addpost" == a && initialize_scraper();
        }
        theme_mode_night && $(".table").addClass("table-dark"),
            $("body").on("click", ".js_theme-mode", function () {
                (_this = $(this)),
                    (mode = _this.data("mode")),
                    "night" == mode
                        ? ($("body").addClass("night-mode"),
                            $(".table").addClass("table-dark"),
                            _this.data("mode", "day"),
                            $(".js_theme-mode-text").text(__["Day Mode"]),
                            $(".js_theme-mode-icon").removeClass("fa-moon").addClass("fa-sun"),
                            $.post(api["core/theme"], { mode: mode }))
                        : ($("body").removeClass("night-mode"),
                            $(".table").removeClass("table-dark"),
                            _this.data("mode", "night"),
                            $(".js_theme-mode-text").text(__["Night Mode"]),
                            $(".js_theme-mode-icon").removeClass("fa-sun").addClass("fa-moon"),
                            $.post(api["core/theme"], { mode: mode }));
            }),
            $(".rightUserDetails").css("display", "none"),
            $(".blacksidebarclassadd").removeClass("rightBlackSidebar"),
            $(".blacksidebarclassadd").removeClass("hiddBar"),
            $("body").on("click", ".openRightBlackBar", function () {
                window.location.href.indexOf("landingpage") < 0 &&
                    ("block" == $(".rightUserDetails").css("display") ? $(".rightUserDetails").css("display", "none") : $(".rightUserDetails").css("display", "block"),
                        $(".blacksidebarclassadd").hasClass("rightBlackSidebar") ? $(".blacksidebarclassadd").removeClass("rightBlackSidebar") : $(".blacksidebarclassadd").addClass("rightBlackSidebar"));
            }),
            $(document).on("click", function (e) {
                $(e.target).closest(".rightSideBarScroll").length || $(e.target).closest(".openRightBlackBar").length || ($(".blacksidebarclassadd").removeClass("rightBlackSidebar"), $(".rightUserDetails").css("display", "none"));
            }),
            $(".addpost-closebtn").click(function (e) {
                if ($(window).width() < 991) {
                    var t = window.location.host,
                        a = window.location.origin,
                        s = window.location.href;
                    "localhost" == t ? s == a + "/sngine/?parm=addpost" && window.history.pushState({}, document.title, "/sngine") : s == a + "/?parm=addpost" && window.history.pushState({}, document.title, "/");
                }
                $("#ajax-sell-new-product").trigger("reset"),
                    $("#js_hide_div").show(),
                    e.stopPropagation(),
                    $("body").removeClass("publisher-focus"),
                    $(".publisher-meta #feelings-data span").html(""),
                    $(".js_publisher-tab").each(function () {
                        $(this).hasClass("disabled") && ($(this).removeClass("disabled"), $(this).removeClass("active")), $(this).hasClass("active") && ($(this).removeClass("activated"), $(this).removeClass("active"));
                    }),
                    $(".js_publisher-pattern").each(function () {
                        $(this).removeClass("active");
                    }),
                    $(".publisher-meta").each(function () {
                        $(this).css("display", "none");
                    }),
                    $(".publisher-slider").slideUp(),
                    $(".twitter-post-plus-button").hide(),
                    $(".publisher-message .colored-text-wrapper").css({ "background-image": "" }),
                    $(".publisher-message .colored-text-wrapper").removeClass("colored"),
                    $(".colored-text-wrapper textarea#post_text").css({ color: "" }),
                    $(".colored-text-wrapper textarea#post_text").val(""),
                    $(".divAppendTextarea").hide(),
                    $(".wrapFootershowHide").css("display", "flex"),
                    $("div").remove(".postTextAreaDiv"),
                    $(this).parents("body").removeClass("publisher-focus"),
                    $(".publisher-slider").hide(),
                    $(".wrapFooterDiv-old").show();
            });
        const urlParams = new URLSearchParams(window.location.search),
            myParam = urlParams.get("parm");
        myParam && $(".openRightBlackBar").click(),
            $(function () {
                $("body").hasClass("messages-localhub") && ($(".footer_mobile").remove(), $("body").removeClass("footer_bar_show")),
                    $(".publisher-tools-tabs-ul-newDesign-stratus").hide(),
                    $("a.s-more").click(function () {
                        $(".publisher-tools-tabs-ul-newDesign-stratus").is(":visible")
                            ? ($(".publisher-tools-tabs-ul-newDesign-stratus").hide(), $(".publisher-tools-tabs-ul-newDesign").show())
                            : ($(".publisher-tools-tabs-ul-newDesign-stratus").show(), $(".publisher-tools-tabs-ul-newDesign").hide());
                    }),
                    $("._toggle_btn").click(function () {
                        $("body").toggleClass("_toggle_");
                    }),
                    // $("body").click(function () {
                    //     $(".__overlay__").hasClass("clr_overlay_") && $(".__overlay__").removeClass("clr_overlay_");
                    //     $(this).removeClass('body-scroll-disabled');
                    // }),
                    // $('.dropdown-toggle-share').on('click',function () {
                    //     if(!$(this).closest('.dropdown').hasClass('show')){
                    //        $('body').addClass('body-scroll-disabled');
                    //     }
                    //     $("#__overlay__").hasClass("clr_overlay_") ? $("#__overlay__").removeClass("clr_overlay_") : $("#__overlay__").addClass("clr_overlay_");
                    // }),

                    // $('.dropdown-toggle.post_custm_option').on('click',function () {
                    //     if(!$(this).closest('.dropdown').hasClass('show')){
                    //         $('body').addClass('body-scroll-disabled');
                    //      }
                    //  }),




                    $("input[type=radio][name=share_to]").on("change", function () {
                        switch ($(this).val()) {
                            case "timeline":
                                $("#js_share-to-page").hide(), $("#js_share-to-group").hide();
                                break;
                            case "page":
                                $("#js_share-to-page").fadeIn(), $("#js_share-to-group").hide();
                                break;
                            case "group":
                                $("#js_share-to-page").hide(), $("#js_share-to-group").fadeIn();
                        }
                    }),
                    $("._share-dropdown_").click(function () { });
            });
    }),


    $(document).off("mouseup", ".dropdown-toggle-share").on("mouseup", ".dropdown-toggle-share", function () {

        if ($(this).closest('.dropdown').hasClass('show')) {
            $('body').removeClass('body-scroll-disabled');
            $("#__overlay__").removeClass("clr_overlay_");
        } else {
            setTimeout(function () {
                if (!$(this).closest('.dropdown').hasClass('show')) {
                    // alert('start 2');
                    $('body').addClass('body-scroll-disabled');
                }

                $("#__overlay__").hasClass("clr_overlay_") ? $("#__overlay__").removeClass("clr_overlay_") : $("#__overlay__").addClass("clr_overlay_")
            }, 0);
        }
    }),


    //  $(document).off('mouseup','.dropdown-toggle.post_custm_option').on('mouseup','.dropdown-toggle.post_custm_option',function () {
    //     if($(this).closest('.dropdown').hasClass('show')){
    //         $('body').removeClass('body-scroll-disabled');
    //     } else {
    //         setTimeout( function () {         
    //             if(!$(this).closest('.dropdown').hasClass('show')){
    //                  $('body').addClass('body-scroll-disabled');
    //                } else {
    //                  $('body').removeClass('body-scroll-disabled');
    //                }
    //         }, 0 );
    //     }
    //  }),
    //  $(document).off('mouseup','.js_posts-filter').on('mouseup','.js_posts-filter',function () {
    //     if($(this).hasClass('show')){
    //         $('body').removeClass('body-scroll-disabled');
    //     } else {
    //         setTimeout( function () {
    //              if(!$(this).hasClass('show')){
    //                 $('body').addClass('body-scroll-disabled');
    //              } else {
    //                 $('body').removeClass('body-scroll-disabled');
    //              }
    //         }, 0 );
    //     }
    //  }), 

    $("body").click(function () {
        $(".__overlay__").hasClass("clr_overlay_") && $(".__overlay__").removeClass("clr_overlay_");
        $(this).removeClass('body-scroll-disabled');
    }),

    $(document).on('click', '.stratus_local_share', function () {
        var this_id = $(this).attr('id');
        var show_id = this_id + '_enable';

        setTimeout(function () {
            $("#" + this_id).attr('checked', true);
            if (this_id == "share_timeline") {
                setTimeout(function () {
                    $("#modal #share_timeline_enable #share_to_timeline").attr('checked', 'checked');
                    //$('#modal').css("display","none");
                    $("#__overlay__").removeClass("clr_overlay_");
                }, 100);
            }
            if (show_id == "share_social_media_enable") {
                $(".modal-footer").addClass("x-hidden");
            } else {
                $(".modal-footer").removeClass("x-hidden");
            }
            $('#modal').find('.sharing_stratus').each(function () {
                var compare_id = $(this).attr('id');
                if (show_id === "share_post_enable") {
                    $("#modal #share_timeline_enable #share_to_timeline").prop('required', true);
                    $("#modal #share_timeline_enable #share_to_timeline").attr('checked', 'checked');
                }
                if (show_id == compare_id) {
                    $("#modal #" + compare_id + " .x-hidden").prop('required', true);
                    $(this).removeClass("x-hidden");
                } else {
                    if (!$(this).hasClass("x-hidden")) {
                        $(this).addClass("x-hidden");
                    }
                }
                jQuery("body #stratus-sharebutton").removeClass("x-hidden");
            });
        }, 1300);
    });
    $(document).on("click", "#add_post_show", function () {
        if ($(this).hasClass("lessMore")) {
          $(this).removeClass('lessMore');
        } else {
          $(this).addClass('lessMore');
        }
      });