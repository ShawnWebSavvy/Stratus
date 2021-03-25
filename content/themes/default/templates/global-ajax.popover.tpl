{if $type == "user"}
    <!-- user popover -->
    <div class="user-popover-content">
        <div class="user-card">
                <div class="user-card-avatar">
                    <img src="{$profile['user_picture']}" alt="{$profile['user_firstname']} {$profile['user_lastname']}">
                </div>
                <div class="user-card-info">
                    <a class="name" href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}">{$profile['user_firstname']} {$profile['user_lastname']}</a>
                    {if $profile['user_verified']}
                        <i data-toggle="tooltip" data-placement="top" title='{__("Verified User")}' class="fa fa-check-circle fa-fw verified-badge"></i>
                    {/if}
                    <div class="info">
                        <a href="{$system['system_url']}/global-profile.php?{$profile['user_name']}&view=followers">{$profile['followers_count']} {__("followers")}</a>
                    </div>
                </div>
        </div>
        <div class="buttonWrapPopOver">
            {if $user->_data['user_id'] != $profile['user_id']}
                <!-- follow -->
                {if $profile['i_follow']}
                    <button type="button" title="Unfollow" class="btn btn-sm btn-info js_unfollow" data-uid="{$profile['user_id']}">
                        <i class="fa fa-check mr5"></i>{__("Following")}
                    </button>
                {else}
                    <button type="button" title="Follow" class="btn btn-sm btn-info js_follow" data-uid="{$profile['user_id']}">
                        <i class="fa fa-rss mr5"></i>{__("Follow")}
                    </button>
                {/if}
                <!-- follow -->
                <!-- message -->
                <button type="button" class="btn btn-sm btn-primary mlr5 js_chat_start" data-uid="{$profile['user_id']}" data-name="{$profile['user_firstname']} {$profile['user_lastname']}" data-link="{$profile['user_name']}">
                    <i class="fa fa-comments mr5"></i>{__("Message")}
                </button>
                <!-- message -->
            {else}
                <!-- edit -->
                <a href="{$system['system_url']}/settings/profile/global" class="btn btn-sm btn-light">
                    <i class="fa fa-pencil-alt mr5"></i>{__("Update Info")}
                </a>
                <!-- edit -->
            {/if}
        </div>
    <!-- user popover -->
{else}
    <!-- page popover -->
        <div class="user-card">
            <div class="user-card-cover" ></div>
            <div class="user-card-avatar">
                <img class="img-fluid" src="{$profile['page_picture']}" alt="{$profile['page_title']}">
            </div>
            <div class="user-card-info">
                <a class="name" href="{$system['system_url']}/pages/{$profile['page_name']}">{$profile['page_title']}</a>
                {if $profile['page_verified']}
                    <i data-toggle="tooltip" data-placement="top" title='{__("Verified User")}' class="fa fa-check-circle fa-fw verified-badge"></i>
                {/if}
                <div class="info">{$profile['page_likes']} {__("Likes")}</div>
            </div>
        </div>
        <div class="buttonWrapPopOver">
            <!-- like -->
            {if $profile['i_like']}
                <button type="button" class="btn js_unlike-page unlike-button-stratus" data-id="{$profile['page_id']}">
                    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/local_hubN.svg"class="whiteicon">
                    {__("Unlike")}
                </button>
            {else}
                <button type="button" class="btn js_like-page like-button-stratus" data-id="{$profile['page_id']}">
                    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/local_hubN.svg"class="whiteicon">
                    {__("Like")}
                </button>
            {/if}
            <!-- like -->
        </div>
    </div>
    <!-- page popover -->
{/if}