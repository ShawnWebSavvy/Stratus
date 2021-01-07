<div class="comment-replace 4334344343">
    {if $_comment['comment_post_id'] > 0}
        <a href="{$system['system_url']}/global-profile-posts/{$_comment['comment_post_id']}">
            <div class="comment-text js_readmore" dir="auto">{$_comment['text']}</div>
        </a>
    {else}
        <div class="comment-text js_readmore" dir="auto">{$_comment['text']}</div>
    {/if}
    <div class="comment-text-plain x-hidden">{$_comment['text_plain']}</div>
    {if $_comment['image'] != ""}
        <span class="text-link js_lightbox-nodata" data-image="{$system['system_uploads']}/{$_comment['image']}">
            <img alt="" class="img-fluid lazyload" data-src="{$system['system_uploads']}/{$_comment['image']}">
        </span>
    {/if}
    {if $_comment['voice_note'] != ""}
        <audio class="js_audio" id="audio-{$_comment['comment_id']}" controls preload="auto" style="width: 100%; min-width: 200px;">
            <source src="{$system['system_uploads']}/{$_comment['voice_note']}" type="audio/mpeg">
            <source src="{$system['system_uploads']}/{$_comment['voice_note']}" type="audio/mp3">
            {__("Your browser does not support HTML5 audio")}
        </audio>
    {/if}
</div>
