api["chat/live"] = ajax_path + "chat/live.php", api["chat/settings"] = ajax_path + "users/settings.php?edit=chat", api["chat/call"] = ajax_path + "chat/call.php", api["chat/reaction"] = ajax_path + "chat/reaction.php", api["chat/post"] = ajax_path + "chat/post.php", api["chat/messages"] = ajax_path + "chat/messages.php", api["conversation/check"] = ajax_path + "chat/conversation.php?do=check", api["conversation/get"] = ajax_path + "chat/conversation.php?do=get"; var chatbox_closing_process = !1, chat_calling_process = !1, chat_audiocall_ringing_process = !1, chat_videocall_ringing_process = !1, chat_incall_process = !1; function reconstruct_chat_widgets() { $(window).width() < 970 || $(".chat-widget").each(function (e) { $(this).attr("style", ""), e += 1, offset = 210 * e + 10 * e, $(this).prevAll(".chat-box").length > 0 && (offset += 50 * $(this).prevAll(".chat-box").length), "RTL" == $("html").attr("dir") ? $(this).css("left", offset) : $(this).css("right", offset) }) } function chat_box(user_id, conversation_id, name, name_list, multiple, link) { var chat_key_value = "chat_"; chat_key_value += conversation_id || "u_" + user_id; var chat_key = "#" + chat_key_value, chat_box = $(chat_key); if (0 == chat_box.length) { if (0 == conversation_id) { var data = { user_id: user_id }; if ($('.chat-box[data-uid="' + user_id + '"]').length > 0) return chat_box = $('.chat-box[data-uid="' + user_id + '"]'), void (chat_box.hasClass("opened") || chat_box.addClass("opened").find(".chat-widget-content").slideToggle(200)); $("body").append(render_template("#chat-box", { chat_key_value: chat_key_value, user_id: user_id, conversation_id: conversation_id, name: name.substring(0, 28), name_list: name_list, multiple: multiple, link: link })), chat_box = $(chat_key), chat_box.find(".chat-widget-content").show(), chat_box.find("textarea").focus(), initialize(), reconstruct_chat_widgets() } else { var data = { conversation_id: conversation_id }; $("body").append(render_template("#chat-box", { chat_key_value: chat_key_value, user_id: user_id, conversation_id: conversation_id, name: name.substring(0, 28), name_list: name_list, multiple: multiple, link: link })), chat_box = $(chat_key), chat_box.find(".chat-widget-content").show(), chat_box.find("textarea").focus(), initialize(), reconstruct_chat_widgets() } $.getJSON(api["chat/messages"], data, function (response) { if (response) if (response.callback) eval(response.callback), chat_box.remove(); else { if (response.conversation_id) { if ($("#chat_" + response.conversation_id).length > 0) return chat_box.remove(), chat_box = $("#chat_" + response.conversation_id), chat_box.hasClass("opened") || chat_box.addClass("opened").find(".chat-widget-content").slideToggle(200), void chat_box.find("textarea").focus(); chat_box.attr("id", "chat_" + response.conversation_id), chat_box.attr("data-cid", response.conversation_id), chat_box.find(".x-form-tools-colors").show() } void 0 !== response.user_online && response.user_online && chat_box.find(".js_chat-box-status").removeClass("fa-user-secret").addClass("fa-circle"), response.messages && chat_box.find(".js_scroller:first").html(response.messages).scrollTop(chat_box.find(".js_scroller:first")[0].scrollHeight), response.color && (chat_box.attr("data-color", response.color), color_chat_box(chat_box, response.color)) } }).fail(function () { chat_box.remove(), modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }) } else chat_box.hasClass("opened") || chat_box.addClass("opened").find(".chat-widget-content").slideToggle(200), chat_box.find("textarea").focus(), reconstruct_chat_widgets() } function color_chat_box(e, a) { e.data("color", a), e.find(".js_chat-color-me").each(function () { $(this).hasClass("js_chat-colors-menu-toggle") ? $(this).css("color", a) : $(this).css("background-color", a) }) } function chat_heartbeat() { if (chatbox_closing_process) setTimeout("chat_heartbeat()", min_chat_heartbeat); else if (chat_enabled || -1 != window.location.pathname.indexOf("messages")) { var chat_boxes_opened_client = {}; if ($.each($(".chat-box:not(.fresh)"), function (e, a) { $(a).data("sending") || (chat_boxes_opened_client[$(a).data("cid")] = $(a).find(".conversation:last").attr("id")) }), -1 != window.location.pathname.indexOf("messages") && void 0 !== $(".panel-messages").data("cid")) { var opened_thread = {}; $(".panel-messages").data("sending") || (opened_thread.conversation_id = $(".panel-messages").data("cid"), opened_thread.last_message_id = $(".panel-messages").find(".conversation:last").attr("id")); var data = { chat_enabled: $("body").data("chat-enabled"), chat_boxes_opened_client: JSON.stringify(chat_boxes_opened_client), opened_thread: JSON.stringify(opened_thread) } } else var data = { chat_enabled: $("body").data("chat-enabled"), chat_boxes_opened_client: JSON.stringify(chat_boxes_opened_client) }; $.post(api["chat/live"], data, function (response) { if (response.callback) eval(response.callback); else { var updated_seen_conversations = []; if (response.master && ($("body").attr("data-chat-enabled", response.master.chat_enabled), $(".js_chat-online-users").text(response.master.online_friends_count), $(".chat-sidebar-content").find(".js_scroller").html(response.master.sidebar), $(".chat-sidebar-filter").keyup()), -1 == window.location.pathname.indexOf("messages") && (void 0 !== response.chat_boxes_closed && ($.each(response.chat_boxes_closed, function (e, a) { $("#chat_" + a).remove() }), reconstruct_chat_widgets()), response.chat_boxes_opened && $.each(response.chat_boxes_opened, function (e, a) { chat_box(a.user_id, a.conversation_id, a.name, a.name_list, a.multiple_recipients, a.link) }), response.chat_boxes_updated && $.each(response.chat_boxes_updated, function (e, a) { var s = $("#chat_" + a.conversation_id); if (a.messages && (s.find(".js_scroller:first ul").append(a.messages), s.find(".js_scroller:first").scrollTop(s.find(".js_scroller:first")[0].scrollHeight), a.is_me || (s.hasClass("opened") ? chat_seen_enabled && updated_seen_conversations.push(a.conversation_id) : s.addClass("new").find(".js_chat-box-label").text(a.messages_count), chat_sound && $("#chat-sound")[0].play())), a.typing_name_list ? (s.find(".js_chat-typing-users").text(a.typing_name_list), s.find(".chat-typing").show()) : s.find(".chat-typing").hide(), a.seen_name_list) { var t = s.find(".js_scroller:first li:last .conversation.right"); t.length > 0 && (0 == t.find(".seen").length ? (t.find(".time").after("<div class='seen'>" + __["Seen by"] + " " + a.seen_name_list + "<div>"), s.find(".js_scroller:first").scrollTop(s.find(".js_scroller:first")[0].scrollHeight)) : t.find(".seen").replaceWith("<div class='seen'>" + __["Seen by"] + " " + a.seen_name_list + "<div>")) } a.multiple_recipients || (a.user_online ? s.find(".js_chat-box-status").removeClass("fa-user-secret").addClass("fa-circle") : s.find(".js_chat-box-status").removeClass("fa-circle").addClass("fa-user-secret")), color_chat_box(s, a.color) }), response.chat_boxes_new && $.each(response.chat_boxes_new, function (e, a) { chat_box(a.user_id, a.conversation_id, a.name, a.name_list, a.multiple_recipients, a.link), chat_sound && $("#chat-sound")[0].play() })), response.thread_updated && -1 != window.location.pathname.indexOf("messages")) { var converstaion_widget = $('.panel-messages[data-cid="' + response.thread_updated.conversation_id + '"]'); if (converstaion_widget.length > 0) { if (response.thread_updated.messages && (converstaion_widget.find(".js_scroller:first ul").append(response.thread_updated.messages), converstaion_widget.find(".js_scroller:first").scrollTop(converstaion_widget.find(".js_scroller:first")[0].scrollHeight), response.thread_updated.is_me || (chat_seen_enabled && updated_seen_conversations.push(response.thread_updated.conversation_id), chat_sound && $("#chat-sound")[0].play())), response.thread_updated.typing_name_list ? (converstaion_widget.find(".js_chat-typing-users").text(response.thread_updated.typing_name_list), converstaion_widget.find(".chat-typing").show()) : converstaion_widget.find(".chat-typing").hide(), response.thread_updated.seen_name_list) { var last_message_box = converstaion_widget.find(".js_scroller:first li:last .conversation.right"); last_message_box.length > 0 && (0 == last_message_box.find(".seen").length ? (last_message_box.find(".time").after("<div class='seen'>" + __["Seen by"] + " " + response.thread_updated.seen_name_list + "<div>"), converstaion_widget.find(".js_scroller:first").scrollTop(converstaion_widget.find(".js_scroller:first")[0].scrollHeight)) : last_message_box.find(".seen").replaceWith("<div class='seen'>" + __["Seen by"] + " " + response.thread_updated.seen_name_list + "<div>")) } color_chat_box(converstaion_widget, response.thread_updated.color) } } 1 == response.has_audiocall ? 0 == chat_incall_process && 0 == chat_audiocall_ringing_process && (chat_audiocall_ringing_process = !0, modal("#chat-ringing", { type: "audio", is_video: !1, is_audio: !0, id: response.audiocall.call_id, name: response.audiocall.caller_name, image: response.audiocall.caller_picture }), $("#chat-ringing-sound")[0].play()) : 0 == chat_incall_process && 1 == chat_audiocall_ringing_process && (chat_audiocall_ringing_process = !1, $("#modal").hasClass("show") && $("#modal").find(".js_chat-call-answer").length > 0 && $("#modal").modal("hide"), $("#chat-ringing-sound")[0].stop()), 1 == response.has_videocall ? 0 == chat_incall_process && 0 == chat_videocall_ringing_process && (chat_videocall_ringing_process = !0, modal("#chat-ringing", { type: "video", is_video: !0, is_audio: !1, id: response.videocall.call_id, name: response.videocall.caller_name, image: response.videocall.caller_picture }, "large"), $("#chat-ringing-sound")[0].play()) : 0 == chat_incall_process && 1 == chat_videocall_ringing_process && (chat_videocall_ringing_process = !1, $("#modal").hasClass("show") && $("#modal").find(".js_chat-call-answer").length > 0 && $("#modal").modal("hide"), $("#chat-ringing-sound")[0].stop()), chat_seen_enabled && updated_seen_conversations.length > 0 && $.post(api["chat/reaction"], { do: "seen", ids: updated_seen_conversations }, function (response) { response.callback && eval(response.callback) }, "json") } setTimeout("chat_heartbeat()", min_chat_heartbeat) }, "json") } } function chat_incall_heartbeat(e, a) { 0 != chat_incall_process && (setTimeout(function () { chat_incall_heartbeat(e, a) }, min_chat_heartbeat), $.post(api["chat/call"], { do: "update_call", type: e, id: a }, "json")) } function init_Twilio(e, a, s, t) { var o = "video" == e; function i(a) { const s = document.createElement("div"); s.id = a.sid, a.on("trackAdded", e => c(s, e)), a.tracks.forEach(e => c(s, e)), a.on("trackRemoved", l), $(".twilio-stream").html(s), "video" == e && navigator.getUserMedia && (navigator.mediaDevices.getUserMedia({ audio: !1, video: !0 }).then(e => { $(".twilio-stream-local")[0].srcObject = e }), $(".twilio-stream-local").show()) } function n(a) { a.tracks.forEach(l), document.getElementById(a.sid).remove(), $.post(api["chat/call"], { do: "decline_call", type: e, id: t }, "json"), alert(__["Connection has been lost"]), window.location.reload() } function c(e, a) { e.appendChild(a.attach()) } function l(e) { e.detach().forEach(e => e.remove()) } navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia, navigator.getUserMedia || alert("Sorry, WebRTC is not available in your browser"), Twilio.Video.connect(a, { name: s, audio: !0, video: o }).then(e => { e.participants.forEach(i), e.on("participantConnected", i), e.on("participantDisconnected", n), e.once("disconnected", a => e.participants.forEach(n)), $(document).on("click", ".js_chat-call-end", function () { e.disconnect() }) }) } $(function () { $("body").on("click", ".clickChatWindow", function (e) { $(this).parent().hasClass("showchatWindow") ? $("div.chat-sidebar").removeClass("showchatWindow") : $("div.chat-sidebar").addClass("showchatWindow") }) }), $(function () { function _post_message(element) { var _this = $(element), widget = _this.parents(".chat-widget, .panel-messages"), textarea = widget.find("textarea.js_post-message"), message = textarea.val(), conversation_id = widget.data("cid"), sendUserImage = $("body").find(".usernameOnHoverbtn").find("img").attr("src"), nameSender = $("body").find("#currentUsername").find("span").text(), attachments = widget.find(".chat-attachments"), attachments_voice_notes = widget.find(".chat-voice-notes"), photo = widget.data("photo"), voice_note = widget.data("voice_notes"); if (!is_empty(message) || photo || voice_note) { if (widget.hasClass("fresh")) { if (0 == widget.find(".tags li").length) return; var recipients = []; $.each(widget.find(".tags li"), function (e, a) { recipients.push($(a).data("uid")) }); var data = { message: message, photo: JSON.stringify(photo), voice_note: JSON.stringify(voice_note), recipients: JSON.stringify(recipients) } } else if (void 0 === conversation_id) { var recipients = []; recipients.push(widget.data("uid")); var data = { message: message, photo: JSON.stringify(photo), voice_note: JSON.stringify(voice_note), recipients: JSON.stringify(recipients) } } else var data = { message: message, photo: JSON.stringify(photo), voice_note: JSON.stringify(voice_note), conversation_id: conversation_id }; if (widget.hasClass("fresh") || void 0 !== photo || void 0 !== voice_note) { if (widget.data("sending")) return !1 } else { textarea.focus().val("").height(textarea.css("line-height")); var _guid = guid(); widget.find(".js_scroller:first ul").append(render_template("#chat-message", { message: htmlEntities(message), id: _guid, senderUserImage: sendUserImage, name_list: nameSender, time: moment.utc().format("YYYY-MM-DD H:mm:ss") })), widget.find(".js_scroller:first .seen").remove(), widget.find(".js_scroller:first").scrollTop(widget.find(".js_scroller:first")[0].scrollHeight) } widget.data("sending", !0), $.post(api["chat/post"], data, function (response) { response && (response.callback ? eval(response.callback) : widget.hasClass("fresh") ? -1 != window.location.pathname.indexOf("messages") ? window.location.replace(site_path + "/messages/" + response.conversation_id) : (widget.remove(), chat_box(response.user_id, response.conversation_id, response.name, response.name_list, response.multiple_recipients, response.link)) : (void 0 === conversation_id && (widget.attr("id", "chat_" + response.conversation_id), widget.attr("data-cid", response.conversation_id), widget.find(".x-form-tools-colors").show()), void 0 === photo && void 0 === voice_note ? widget.find(".js_scroller:first ul").find("#" + _guid).replaceWith(render_template("#chat-message", { message: response.message, image: response.image, voice_note: response.voice_note, id: response.last_message_id, time: moment.utc().format("YYYY-MM-DD H:mm:ss"), color: widget.data("color") })) : (textarea.focus().val("").height(textarea.css("line-height")), widget.find(".js_scroller:first ul").append(render_template("#chat-message", { message: response.message, image: response.image, voice_note: response.voice_note, id: response.last_message_id, time: moment.utc().format("YYYY-MM-DD H:mm:ss"), color: widget.data("color") })), widget.find(".js_scroller:first .seen").remove(), widget.find(".js_scroller:first").scrollTop(widget.find(".js_scroller:first")[0].scrollHeight), attachments.hide(), attachments.find("li.item").remove(), widget.removeData("photo"), widget.find(".x-form-tools-attach").show(), widget.removeData("voice_notes"), widget.find(".x-form-tools-voice").show(), attachments_voice_notes.hide(), attachments_voice_notes.find(".js_voice-success-message").hide(), attachments_voice_notes.find(".js_voice-start").show()), widget.removeData("sending"))) }, "json").fail(function () { modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }) } } var chat_typing_timer; function check_calling_response(type, call_id) { 0 != chat_calling_process && $.post(api["chat/call"], { do: "check_calling_response", type: type, id: call_id }, function (response) { if (response.callback) eval(response.callback); else switch (response.call) { case "no_answer": setTimeout(function () { check_calling_response(type, call_id) }, 2e3); break; case "declined": chat_calling_process = !1, $(".js_chat-call-close").show(), $(".js_chat-call-cancel").hide(), $(".js_chat-calling-message").html(__["The recipient declined the call"]), $("#chat-calling-sound")[0].stop(), clearTimeout(end_call); break; default: chat_calling_process = !1, chat_incall_process = !0, $(".js_chat-call-cancel").hide(), $(".js_chat-call-end").data("id", response.call.call_id), $(".js_chat-call-end").show(); var timer = new easytimer.Timer; timer.start(), timer.addEventListener("secondsUpdated", function (e) { $(".js_chat-calling-message").html("<span style='color: red'>" + timer.getTimeValues().toString() + "</span>") }), $("#chat-calling-sound")[0].stop(), clearTimeout(end_call), init_Twilio(type, response.call.from_user_token, response.call.room, response.call.call_id) } }, "json").fail(function () { modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }) } setTimeout("chat_heartbeat()", 1e3), $("body").on("click", ".js_chat-toggle", function (e) { e.preventDefault; var status = $(this).data("status"); return "on" == status ? ($(".chat-sidebar").addClass("disabled"), $(this).data("status", "off"), $(this).text(__["Turn On Chat"])) : ($(this).data("status", "on"), $(this).text(__["Turn Off Chat"]), $(".chat-sidebar").removeClass("disabled")), $.get(api["chat/settings"], { privacy_chat: "on" == status ? 0 : 1 }, function (response) { response && response.callback && eval(response.callback) }, "json").fail(function () { modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }), !1 }), $("body").on("keyup", ".js_chat-search", function (e) { var a = $(this).val().toLowerCase(); $(".chat-sidebar-content ul > li").each(function () { -1 != $(this).text().toLowerCase().indexOf(a) ? $(this).show() : $(this).hide() }) }), $("body").on("click", ".js_chat-new", function (e) { !chat_enabled || $(window).width() < 970 || (e.preventDefault(), 0 == $(".chat-box.fresh").length ? ($("body").append(render_template("#chat-box-new")), $(".chat-box.fresh").find(".chat-widget-content").show(), initialize(), reconstruct_chat_widgets()) : $(".chat-box.fresh").hasClass("opened") || ($(".chat-box.fresh").addClass("opened"), $(".chat-box.fresh").find(".chat-widget-content").slideToggle(200))) }), $("body").on("click", ".backBtn", function (e) { $(window).width() < 768 && $(".mobileMessageWrap").addClass("users").removeClass("chatbox") }), $("body").on("click", ".js_chat_start", function (e) { $(window).width() < 768 && ($(".mobileMessageWrap").addClass("chatbox").removeClass("users"), $("body.messages-localhub").hasClass("_toggle_") && $("body.messages-localhub").removeClass("_toggle_")); var user_id = $(this).data("uid") || !1, conversation_id = $(this).data("cid") || !1, name = $(this).data("name"), name_list = $(this).data("name-list") || name, multiple = !!$(this).data("multiple"), link = $(this).data("link"); if (-1 != window.location.pathname.indexOf("messages") && conversation_id) e.preventDefault(), $(".js_conversation-container").html('<div class="loader loader_medium pr10"></div>'), $.getJSON(api["conversation/get"], { conversation_id: conversation_id }, function (response) { response.callback ? eval(response.callback) : ($(".js_conversation-container").html(response.conversation_html), $(".panel-messages").attr("data-color", response.conversation.color), color_chat_box($(".panel-messages"), response.conversation.color)) }).fail(function () { modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }); else if (!chat_enabled || $(window).width() < 970) { if (conversation_id) return; e.preventDefault(), $.getJSON(api["conversation/check"], { uid: user_id }, function (response) { response && (response.callback ? eval(response.callback) : response.conversation_id ? window.location = site_path + "/messages/" + response.conversation_id : window.location = site_path + "/messages/new?uid=" + user_id) }).fail(function () { modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }) } else e.preventDefault(), chat_box(user_id, conversation_id, name, name_list, multiple, link) }), $("body").on("keydown", "textarea.js_post-message", function (e) { $(window).width() >= 970 && 13 == e.keyCode && 0 == e.shiftKey && (e.preventDefault(), _post_message(this)) }), $("body").on("click", "li.js_post-message", function (e) { $(window).width() < 970 && _post_message(this) }), $("body").on("click", ".js_chat-attachment-remover", function () { var e = $(this).parents(".chat-widget, .panel-messages"), a = e.find(".chat-attachments"), s = $(this).parents("li.item"); e.removeData("photo"), s.remove(), a.hide(), e.find(".x-form-tools-attach").show(), e.find(".x-form-tools-voice").show() }), $("body").on("keyup paste change input propertychange", "textarea.js_post-message", function () { if (chat_typing_enabled) { var _this = $(this), widget = _this.parents(".chat-widget, .panel-messages"), conversation_id = widget.data("cid") || !1, is_typing = _this.val() ? 1 : 0; conversation_id && (clearTimeout(chat_typing_timer), widget.data("sending") || (chat_typing_timer = setTimeout(function () { $.post(api["chat/reaction"], { do: "typing", is_typing: is_typing, conversation_id: conversation_id }, function (response) { response.callback && eval(response.callback) }, "json") }, 500))) } }), $("body").on("click", ".chat-widget-head", function (e) { if (!$(e.target).hasClass("js_chat-call-start")) { var widget = $(this).parents(".chat-widget"), conversation_id = widget.data("cid") || !1; widget.toggleClass("opened"), widget.find(".chat-widget-content").slideToggle(200), widget.hasClass("new") && (widget.find(".js_scroller:first").scrollTop(widget.find(".js_scroller:first")[0].scrollHeight), widget.removeClass("new"), chat_seen_enabled && conversation_id && $.post(api["chat/reaction"], { do: "seen", ids: conversation_id }, function (response) { response.callback && eval(response.callback) }, "json")) } }), $("body").on("click", ".js_chat-box-close", function () { var widget = $(this).parents(".chat-widget"); widget.remove(), reconstruct_chat_widgets(), chatbox_closing_process = !0, void 0 !== widget.data("cid") && $.post(api["chat/reaction"], { do: "close", conversation_id: widget.data("cid") }, function (response) { response.callback && eval(response.callback), chatbox_closing_process = !1 }, "json").fail(function () { modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }) }), $(window).bind("resize", function () { reconstruct_chat_widgets() }), $("body").on("click", ".js_delete-conversation", function () { confirm(__["Delete Conversation"], __["Are you sure you want to delete this conversation?"], function () { $.post(api["chat/reaction"], { do: "delete", conversation_id: $(".panel-messages").data("cid") }, function (response) { response.callback && eval(response.callback) }, "json").fail(function () { modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }) }) }), -1 != window.location.pathname.indexOf("messages") && void 0 !== $(".panel-messages").data("cid") && color_chat_box($(".panel-messages"), $(".panel-messages").attr("data-color")), $("body").on("click", ".js_chat-colors-menu-toggle", function () { 0 == $(this).parent().find(".chat-colors-menu").length && $(this).after(render_template("#chat-colors-menu")), $(this).parent().find(".chat-colors-menu").toggle() }), $("body").on("click", function (e) { $(e.target).hasClass("js_chat-colors-menu-toggle") || $(e.target).parents(".js_chat-colors-menu-toggle").length > 0 || $(e.target).hasClass("chat-colors-menu") || $(e.target).parents(".chat-colors-menu").length > 0 || $(".chat-colors-menu").hide() }), $("body").on("click", ".js_chat-color", function () { var chat_widget = $(this).parents(".chat-widget, .panel-messages"), conversation_id = chat_widget.data("cid"), color = $(this).data("color"); color_chat_box(chat_widget, color), $(".chat-colors-menu").hide(), $.post(api["chat/reaction"], { do: "color", conversation_id: conversation_id, color: color }, function (response) { response.callback && eval(response.callback) }, "json").fail(function () { modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }) }), $("body").on("click", ".js_chat-call-start", function () { var type = $(this).data("type"), is_video = "video" == type, is_audio = "audio" == type, name = $(this).data("name"), user_id = $(this).data("uid"); modal("#chat-calling", { type: type, is_video: is_video, is_audio: is_audio, name: name }, is_video ? "large" : "default"), $.post(api["chat/call"], { do: "create_call", type: type, user_id: user_id }, function (response) { response.callback ? eval(response.callback) : 0 == response.call_id ? ($(".js_chat-call-close").show(), $(".js_chat-calling-message").html(__["You can not connect to this user"])) : "recipient_offline" == response.call_id ? ($(".js_chat-call-close").show(), $(".js_chat-calling-message").html("<span style='color: red'>" + __["is Offline"] + "</span>")) : "recipient_busy" == response.call_id ? ($(".js_chat-call-close").show(), $(".js_chat-calling-message").html("<span style='color: red'>" + __["is Busy"] + "</span>")) : "caller_busy" == response.call_id ? ($(".js_chat-call-close").show(), $(".js_chat-calling-message").html("<span style='color: red'>" + __["You have an active call already"] + "</span>")) : (chat_calling_process = !0, $(".js_chat-call-cancel").data("id", response.call_id), $(".js_chat-call-cancel").show(), $(".js_chat-calling-message").html(__.Ringing + '<span class="loading-dots"></span>'), $("#chat-calling-sound")[0].play(), calling_response = setTimeout(function () { check_calling_response(type, response.call_id) }, 2e3), end_call = setTimeout(function () { chat_calling_process = !1, $(".js_chat-call-cancel").hide(), $(".js_chat-call-close").show(), $(".js_chat-calling-message").html("<span style='color: red'>" + __["No Answer"] + "</span>"), $("#chat-calling-sound")[0].stop(), $.post(api["chat/call"], { do: "decline_call", type: type, id: response.call_id }, "json") }, 42e3)) }, "json").fail(function () { modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }) }), $("body").on("click", ".js_chat-call-cancel, .js_chat-call-decline, .js_chat-call-end", function () { var type = $(this).data("type"), id = $(this).data("id"), reload = !1; $(this).hasClass("js_chat-call-cancel") && (chat_calling_process = !1, $("#chat-calling-sound")[0].stop(), clearTimeout(end_call)), $(this).hasClass("js_chat-call-decline") && $("#chat-ringing-sound")[0].stop(), $(this).hasClass("js_chat-call-end") && (reload = !0), $.post(api["chat/call"], { do: "decline_call", type: type, id: id }, function (response) { response.callback && eval(response.callback), reload && (window.location.href = site_path) }, "json").fail(function () { modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }) }), $("body").on("click", ".js_chat-call-answer", function () { var type = $(this).data("type"), id = $(this).data("id"); $.post(api["chat/call"], { do: "answer_call", type: type, id: id }, function (response) { if (response.callback) eval(response.callback); else { "audio" == type && (chat_audiocall_ringing_process = !1), "video" == type && (chat_videocall_ringing_process = !1), chat_incall_process = !0, chat_incall_heartbeat(type, id), $(".js_chat-call-answer").hide(), $(".js_chat-call-decline").hide(), $(".js_chat-call-end").show(); var timer = new easytimer.Timer; timer.start(), timer.addEventListener("secondsUpdated", function (e) { $(".js_chat-ringing-message").html("<span style='color: red'>" + timer.getTimeValues().toString() + "</span>") }), $("#chat-ringing-sound")[0].stop(), init_Twilio(type, response.call.to_user_token, response.call.room, response.call.call_id) } }, "json").fail(function () { modal("#modal-message", { title: __.Error, message: __["There is something that went wrong!"] }) }) }) }), $("body").on("click", ".msgLocal", function (e) { $(window).width() < 768 && ($(".mobileMessageWrap").addClass("chatbox").removeClass("users"), $("body.messages-localhub").addClass("_toggle_")) });