{include file='_head.tpl'}
{include file='_header.tpl'}
<!-- page content -->

	<script>  
	function showMessage(messageHTML) {
		$('#chat-box').append(messageHTML);
	}
    
	$(document).ready(function(){
        function isOpen(ws) { return ws.readyState === ws.OPEN }

		var websocket = new WebSocket("ws://10.1.2.10:9050/php-socket.php"); 
		websocket.onopen = function(event) { 
            console.log('Connection is established');
			showMessage("<div class='chat-connection-ack'>Connection is established!</div>");		
		}
		
		
		websocket.onerror = function(event){
            console.log('error');
			showMessage("<div class='error'>Problem due to some Error</div>");
		};
		websocket.onclose = function(event){
            console.log('Connection closed');
			showMessage("<div class='chat-connection-ack'>Connection Closed</div>");
		}; 
        $("body").on("click", "li.js_chat-message", function (e)	
        {
            e.preventDefault();
            var _this = $(this);
            var widget = _this.parents(".chat-widget, .panel-messages");
            var textarea = widget.find("textarea.js_post-message");
            var message = textarea.val();
            var user_id = widget.data("uid");
            var conversation_id = widget.data("cid");
            var photo = widget.data("photo");
            var voice_note = widget.data("voice_notes");
              
          var recipients = [];
          recipients.push(widget.data("uid"));
          var messageJSON = {
            chat_user: $('#currentUsername span').html(),
			chat_message: message,
            conversation_id:conversation_id,
            user_id:user_id,
            photo: JSON.stringify(photo),
            voice_note: JSON.stringify(voice_note),
            recipients: JSON.stringify(recipients),
          };
        
        
          textarea.focus().val("").height(textarea.css("line-height"));
          var _guid = guid();
          widget.find(".js_scroller:first .seen").remove(),
            widget
              .find(".js_scroller:first")
              .scrollTop(widget.find(".js_scroller:first")[0].scrollHeight);
                    console.log(messageJSON);
            if (!isOpen(websocket)) return;
			        websocket.send(JSON.stringify(messageJSON));
              websocket.onmessage = function(event) {
			          var Data = JSON.parse(event.data);
                console.log(Data);
			          $('.chatBoxBlock .chat-conversations').html(Data.messages);
              };
     });
        
	});




	</script>
<div class="container mt20 offcanvas">
    <div class="row">
        <div class="offcanvas-sidebar sidebar-left-ant" id="sidebarHiddSwip">
            {include file='_sidebar.tpl'}
        </div>
    </div>
    <div class="row right-side-content-ant mobileMessageWrap users">
        <!-- chatbox -->
        <!-- threads -->
        <div class="col-md-4 col-xl-3 leftSideChatBar">
            <div class="card">
                <div class="card-header" style="margin-bottom: 0;">
                    <p class="indexHeading">{__("Inbox")}</p>
                    <a class="js_chat-new" href="{$system['system_url']}/messages/new">
                        <i class="fa fa-edit fa-lg"></i>
                    </a>
                </div>
                <div class="card-body plr0 js_live-messages-alt">
                    <!--- new tabs code -->
                    <div class="custom-tabs">
                        <ul class="nav nav-tabs messageTabs">
                            <li class="active dmDiv"><a class="active" data-toggle="tab" href="#directMessages">Direct
                                    Messages</a></li>
                            <li class="gcDiv"><a data-toggle="tab" href="#menu1">Group Chat</a></li>
                            {* <li><a data-toggle="tab" href="#menu2">Archived</a></li> *}
                        </ul>

                        <div class="tab-content">
                            <div id="directMessages" class="tab-pane fade in active show">
                                <div class="js_scroller" data-slimScroll-height="calc(100vh - 275px)">
                                    {if $user->_data['conversations']}
                                    <ul class="forsingle">
                                        {foreach $user->_data['conversations'] as $_conversation}
                                        {if $conversation['group_recipients'] === 'not_show'}
                                        {include file='__feeds_conversation.tpl' conversation=$_conversation}
                                        {/if}
                                        {/foreach}
                                    </ul>
                                    {if count($user->_data['conversations']) >= $system['max_results']}
                                    <!-- see-more -->
                                    <div class="alert alert-post see-more small mlr5 js_see-more"
                                        data-get="conversations">
                                        <span>{__("Load Older Threads")}</span>
                                        <div class="loader loader_small x-hidden"></div>
                                    </div>
                                    <!-- see-more -->
                                    {/if}
                                    {/if}
                                </div>

                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="js_scrollerGroup" data-slimScroll-height="calc(100vh - 275px)">
                                    {if $user->_data['conversations']}
                                    <ul class="forgroup">
                                        {foreach $user->_data['conversations'] as $_conversations}
                                        {if $_conversations['group_recipients'] === 'show'}
                                        {include file='__feeds_conversation_group.tpl' conversation=$_conversations}
                                        {/if}
                                        {/foreach}
                                    </ul>
                                    {if count($user->_data['conversations']) >= $system['max_results']}
                                    <!-- see-more -->
                                    <div class="alert alert-post see-more small mlr5 js_see-more"
                                        data-get="conversations">
                                        <span>{__("Load Older Threads")}</span>
                                        <div class="loader loader_small x-hidden"></div>
                                    </div>
                                    <!-- see-more -->
                                    {/if}
                                    {/if}
                                </div>
                            </div>
                            {* <div id="menu2" class="tab-pane fade">
                                <h3>Menu 2</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.</p>
                            </div> *}
                        </div>
                    </div>
                    <!-- new tabs end -->



                    {* <div class="js_scroller" data-slimScroll-height="calc(100vh - 275px)">
                        {if $user->_data['conversations']}
                        <table>
                            <tr>
                                <td> Direct Messages
                                    <ul class="forsingle">
                                        {foreach $user->_data['conversations'] as $_conversation}
                                        {if $conversation['group_recipients'] === 'not_show'}
                                        {include file='__feeds_conversation.tpl' conversation=$_conversation}
                                        {/if}
                                        {/foreach}
                                    </ul>
                                </td>
                            </tr>
                        </table>
                        {if count($user->_data['conversations']) >= $system['max_results']}
                        <!-- see-more -->
                        <div class="alert alert-post see-more small mlr5 js_see-more" data-get="conversations">
                            <span>{__("Load Older Threads")}</span>
                            <div class="loader loader_small x-hidden"></div>
                        </div>
                        <!-- see-more -->
                        {/if}
                        {/if}
                    </div> *}

                    {* <div class="js_scrollerGroup" data-slimScroll-height="calc(100vh - 275px)">
                        {if $user->_data['conversations']}
                        <table>
                            <tr>
                                <td>Groups
                                    <ul class="forgroup">
                                        {foreach $user->_data['conversations'] as $_conversation}
                                        {if $conversation['group_recipients'] === 'show'}
                                        {include file='__feeds_conversation_group.tpl' conversation=$_conversation}
                                        {/if}
                                        {/foreach}
                                    </ul>
                                </td>
                            </tr>
                        </table>
                        {if count($user->_data['conversations']) >= $system['max_results']}
                        <!-- see-more -->
                        <div class="alert alert-post see-more small mlr5 js_see-more" data-get="conversations">
                            <span>{__("Load Older Threads")}</span>
                            <div class="loader loader_small x-hidden"></div>
                        </div>
                        <!-- see-more -->
                        {/if}
                        {/if}
                    </div> *}

                </div>
            </div>
        </div>
        <!-- threads -->

        <!-- conversation -->
        <div class="col-md-8 col-xl-9 offcanvas-mainbar chatBoxBlock js_conversation-container">
            {if $view == "new"}
            <div class="card panel-messages fresh">
                <div class="card-header with-icon bg-transparent">
                    {__("New Message")}
                </div>
                <div class="card-body">
                    <div class="chat-conversations js_scroller" data-slimScroll-height="calc(100vh - 310px)"></div>
                    <div class="chat-to clearfix js_autocomplete-tags">
                        <div class="to">{__("To")}:</div>
                        <ul class="tags">
                            {if $recipient}
                            <li data-uid="{$recipient['user_id']}">{$recipient['user_fullname']}
                                <button type="button" class="close js_tag-remove" title="{__(" Remove")}">
                                    <span>×</span>
                                </button>
                            </li>
                            {/if}
                        </ul>
                        <div class="typeahead newUserSearchMessage">
                            <input type="text" size="1" autofocus>
                        </div>
                    </div>
                    <div class="chat-message-add-new">
                        <div class="chat-voice-notes">
                            <div class="voice-recording-wrapper" data-handle="chat">
                                <!-- processing message -->
                                <div class="x-hidden js_voice-processing-message">
                                    {include file='__svg_icons.tpl' icon="upload" class="mr5" width="16px" height="16px"}
                                    {__("Processing")}<span class="loading-dots"></span>
                                </div>
                                <!-- processing message -->
    
                                <!-- success message -->
                                <div class="x-hidden js_voice-success-message">
                                    {include file='__svg_icons.tpl' icon="checkmark" class="mr5" width="16px" height="16px"}
                                    {__("Voice note recorded successfully")}
                                    <div class="float-right">
                                        <button type="button" class="close js_voice-remove">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- success message -->
    
                                <!-- start recording -->
                                <div class="btn-voice-start js_voice-start">
                                    <i class="fas fa-microphone mr5"></i>{__("Record")}
                                </div>
                                <!-- start recording -->
    
                                <!-- stop recording -->
                                <div class="btn-voice-stop js_voice-stop" >
                                    <i class="far fa-stop-circle mr5"></i>{__("Recording")} <span
                                        class="js_voice-timer">00:00</span>
                                </div>
                                <!-- stop recording -->
                            </div>
                        </div>
                        <div class="chat-attachments attachments clearfix x-hidden">
                            <ul>
                                <li class="loading">
                                    <div class="progress x-progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="x-form chat-form">
                            <div class="chat-form-message">
                                <textarea class="js_autosize js_post-message" dir="auto" rows="1"
                                    placeholder='{__("Write a message")}'></textarea>
                            </div>
                            <ul class="x-form-tools clearfix">
                                {if $system['chat_photos_enabled']}
                                <li class="x-form-tools-attach">
                                    <i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="chat"></i>
                                </li>
                                {/if}
                                {if $system['voice_notes_chat_enabled']}
                                <li class="x-form-tools-voice js_chat-voice-notes-toggle">
                                    <i class="fas fa-microphone fa-lg fa-fw"></i>
                                </li>
                                {/if}
                                <li class="x-form-tools-emoji js_emoji-menu-toggle">
                                    <i class="far fa-smile-wink fa-lg fa-fw"></i>
                                </li>
                                <li class="x-form-tools-post js_chat-message">
                                    <i class="far fa-paper-plane fa-lg fa-fw"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {else}
            {if $conversation}
            {include file='socket.chat.conversation.tpl'}
            {else}
            <div class="card card-messages" style="padding-top: 60px;">
                <div class="card-body text-center text-muted" style="min-height: 510px;">
                    <div class="noMessageChanges">
                        <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results8.png">
                        <p class="noMsgHeading">It's nice to chat with someone</p>
                        <p class="noMsgLines">Pick a person from left menu and start your conversation</p>
                        <!-- <p class="mt10 mb0"><strong>{__("No Conversation Selected")}</strong></p> -->
                        <a class="btn btn-sm btn-primary js_chat-new"
                            href="{$system['system_url']}/messages/new">{__("New Message")}</a>
                    </div>
                </div>
            </div>
            {/if}
            {/if}
        </div>
        <!-- conversation -->

    </div>
</div>


<!-- page content -->
{include file='_footer.tpl'}