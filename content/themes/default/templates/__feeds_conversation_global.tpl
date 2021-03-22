{if $conversation['group_recipients'] != 'show'}
<li class="feeds-item {if !$conversation['seen']}unread{/if}" data-last-message="{$conversation['last_message_id']}">
    
    <a class="data-container js_chat_start" data-cid="{$conversation['conversation_id']}"
        data-uid="{$conversation['user_id']}" data-name="{$conversation['name']}"
        data-name-list="{$conversation['name_list']}" data-link="{$conversation['link']}"
        href="{$system['system_url']}/globalMessages/{$conversation['conversation_id']}">
        <div class="data-avatar">
            <img class="lazyloaded" src="{$conversation['picture']}" alt="{$conversation['name']}">
        <i class="fa fa-circle {if $conversation['user_is_online'] }online{else}offline{/if}"></i>
        </div>
        <div class="data-content">
            <!-- {if $conversation['image'] != ''}
            <div class="float-right">
                <img class="data-img lazyload" data-src="{$system['system_uploads']}/{$conversation['image']}" alt="">
            </div>
            {/if} -->
      
            <div class="nameTimeWrap">
            {if empty( {$conversation['name']} )}  
                <span class="name">{$conversation['user_firstname']}</span>

            {else}
                <span class="name">{$conversation['name']}</span>                
            {/if}
               
                <div class="time js_moment" data-time="{$conversation['time']}">{$conversation['time']}</div>
            </div>
            <div class="text">
                {if $conversation['message'] != ''}
                {$conversation['message_orginal']}
                {elseif $conversation['photo'] != ''}
                <i class="fa fa-file-image"></i> {__("Photo")}
                {elseif $conversation['voice_note'] != ''}
                <i class="fas fa-microphone"></i> {__("Voice Message")}
                {/if}
            </div>

        </div>
    </a>
  
</li>
            {/if}