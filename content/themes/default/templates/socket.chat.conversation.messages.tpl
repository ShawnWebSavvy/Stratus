{if $conversation['total_messages'] >= $system['max_results']}
	<!-- see-more -->
	<div class="alert alert-chat see-more small js_see-more" data-id={$conversation['conversation_id']}  data-get="messages">
	    <span>{__("Loading Older Messages")}</span>
	    <div class="loader loader_small x-hidden"></div>
	</div>
	<!-- see-more -->
{/if}

<ul id="global-js-hide">
    {include file='socket.chat.messages.tpl' messages=$conversation['messages']}
</ul>