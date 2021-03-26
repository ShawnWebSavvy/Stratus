<li class="feed-message">
  <div class="conversation clearfix {if $message['user_id'] == $user->_data['user_id']}right{/if}" id="{$message['message_id']}">
    
    <div class="conversation-body">
      <!-- message text -->
      <div class="text {if $message['user_id'] == $user->_data['user_id']}js_chat-color-me{/if}">
        {if $message['user_id'] == $user->_data['user_id']}
        <div class="chat-message-user-section">
          <img src="{$message['user_picture']}" />
          <p>{$message['user_firstname']}</p>
          <!-- message time -->
          <div class="time js_moment" data-time="{$message['time']}">{$message['time']}</div>
          <!-- message time -->
        </div>
        {/if}
        {if $message['user_id'] != $user->_data['user_id']}
    <div class="conversation-user feed-message-userName line-4">
    
    {if ($page == 'messages_global')}
      <a href="{$system['system_url']}/global-profile.php?username={$message['user_name']}">
    {else}
 <a href="{$system['system_url']}/{$message['user_name']}">
    {/if}
        <span class="chat-message-user-section">
          <img src="{$message['user_picture']}" title="{$message['user_firstname']} {$message['user_lastname']}"
          alt="{$message['user_firstname']} {$message['user_lastname']}" />
          <p>{$message['user_firstname']}</p>
          <!-- message time -->
          <div class="time js_moment" data-time="{$message['time']}">{$message['time']}</div>
          <!-- message time -->
        </span>
      </a>
    </div>
    {/if}
        <div class="chat-message-section">
          {$message['message']} {if $message['image']}
          <span class="text-link js_lightbox-nodata {if $message['message'] != ''}mt5{/if}" data-image="{$system['system_uploads']}/{$message['image']}">
            <img alt="" class="img-fluid" src="{$system['system_uploads']}/{$message['image']}" />
          </span>
          {/if} {if $message['voice_note']}
          <audio class="js_audio" id="audio-{$message['message_id']}" controls preload="auto" style="width: 100%; min-width: 120px;">
            <source src="{$system['system_uploads']}/{$message['voice_note']}" type="audio/mpeg"/>
            <source src="{$system['system_uploads']}/{$message['voice_note']}" type="audio/mp3"/>
            {__("Your browser does not support HTML5 audio")}
          </audio>
          {/if}
        </div>
      </div>
      <!-- message text -->
      <!-- seen status -->
      {if $last_seen_message_id == $message['message_id']}
      <div class="seen">{__("Seen by")} {$conversation['seen_name_list']}</div>
      {/if}
      <!-- seen status -->
    </div>
  </div>
</li>
