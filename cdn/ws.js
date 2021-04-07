/*
 * jQuery Web Sockets Plugin v0.0.1
 * http://code.google.com/p/jquery-websocket/
 *
 * This document is licensed as free software under the terms of the
 * MIT License: http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright (c) 2010 by shootaroo (Shotaro Tsubouchi).
 */
(function($){
$.extend({
	websocketSettings: {
		open: function(){alert();},
		close: function(){},
		message: function(){},
		options: {},
		events: {}
	},
	websocket: function(url, s) {
		var ws = WebSocket ? new WebSocket( url ) : {
			send: function(m){ return false },
			close: function(){}
		};
		$.websocketSettings = $.extend($.websocketSettings, s);
		$(ws).bind('open', $.websocketSettings.open)
			.bind('close', $.websocketSettings.close)
			.bind('message', $.websocketSettings.message)
			.bind('message', function(e){
				var m = $.parseJSON(e.originalEvent.data);
				var h = $.websocketSettings.events[m.type];
				if (h) h.call(this, m);
			});
			
		ws._send = ws.send;
		ws.send = function(type, data) {
			this.waitForConnection(function () {
				var m = {type: type};
				m = $.extend(true, m, $.extend(true, {}, $.websocketSettings.options, m));
				if (data) m['data'] = data;
				// this._send(JSON.stringify(m));
				//ws.send(message);
				if (typeof callback !== 'undefined') {
				  callback();
				}
			}, 1000);
		
		}
		this.waitForConnection = function (callback, interval) {
			if (ws.readyState === 1) {
				callback();
			} else {
				var that = this;
				// optional: implement backoff for interval here
				setTimeout(function () {
					that.waitForConnection(callback, interval);
				}, interval);
			}
		};
		$(window).unload(function(){ ws.close(); ws = null });
		return ws;
	}
});
})(jQuery);