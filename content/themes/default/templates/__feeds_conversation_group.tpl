{if $conversation['group_recipients'] === 'show'}
<li class="feeds-item {if !$conversation['seen']}unread{/if}" data-last-message="{$conversation['last_message_id']}">

    <a class="data-container js_chat_start" data-cid="{$conversation['conversation_id']}"
        data-name="{$conversation['name']}" data-name-list="{$conversation['name_list']}"
        data-link="{$conversation['link']}" data-multiple="true"
        href="{$system['system_url']}/messages/{$conversation['conversation_id']}">
        <div class="data-avatar">
            <div class="left-avatar" style="background-image: url('{$conversation['picture_left']}')"></div>
            <div class="right-avatar" style="background-image: url('{$conversation['picture_right']}')"></div>
        </div>
        <div class="data-content">
            <!-- {if $conversation['image'] != ''}
            <div class="float-right">
                <img class="data-img lazyload" data-src="{$system['system_uploads']}/{$conversation['image']}" alt="">
            </div>
            {/if} -->
            <div class="nameTimeWrap">
                <span class="name">{$conversation['name']}</span>
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