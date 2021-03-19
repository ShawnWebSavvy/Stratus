{if $post['post_type'] == "live" && $post['live']}
    {if $system['save_live_enabled'] && $post['live']['live_ended'] && $post['live']['live_recorded']}
        <div class="overflow-hidden">
            <div>
                <video class="js_fluidplayer"
                    id="video-{$post['live']['live_id']}{if $pinned || $boosted}-{$post['post_id']}{/if}"
                    {if $post['live']['video_thumbnail']}poster="{$system['system_uploads']}/{$post['live']['video_thumbnail']}" {/if} controls preload="auto"
                controls preload="auto" style="width:100%;height:100%;" width="100%" height="100%">
                <source src="{$system['system_agora_uploads']}/{$post['live']['agora_file']}"
                    type="application/x-mpegURL">
            </video>
        </div>
    </div>
    {/if}
{/if}