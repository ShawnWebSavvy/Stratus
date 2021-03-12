<!-- post body -->
<div class="post-body {if $_lightbox}pt0{/if}">

    <!-- post header -->
    <div class="post-header">
        <!-- post picture -->
        <div class="post-avatar">
            {if $post['is_anonymous']}
            {include file='__svg_icons.tpl' icon="spy" class="rounded-circle" width="40px" height="40px"}
            {else}
            <a class="post-avatar-picture" href="{$post['post_author_url']}"
                style="background-image:url({$post['post_author_picture']});">
            </a>
            {if $post['post_author_online']}<i class="fa fa-circle online-dot"></i>{/if}
            {/if}
        </div>
        <!-- post picture -->

        <!-- post meta -->
        <div class="post-meta">
            <!-- post author -->
            {if $post['is_anonymous']}
            <span class="post-author">{__("Anonymous")}</span>
            {else}
            <span class="js_user-popover" data-type="{$post['user_type']}" data-uid="{$post['user_id']}">
                <a class="post-author" href="{$post['post_author_url']}">{$post['post_author_name']}</a>
            </span>
            {if $post['post_author_verified']}
            {if $post['user_type'] == "user"}
            <i data-toggle="tooltip" data-placement="top" title='{__("Verified User")}'
                class="fa fa-check-circle fa-fw verified-badge"></i>
            {else}
            <i data-toggle="tooltip" data-placement="top" title='{__("Verified Page")}'
                class="fa fa-check-circle fa-fw verified-badge"></i>
            {/if}
            {/if}
            {if $post['user_subscribed']}
            <i data-toggle="tooltip" data-placement="top" title='{__("Pro User")}'
                class="fa fa-bolt fa-fw pro-badge"></i>
            {/if}
            {/if}
            <!-- post author -->

            <!-- post time & location & privacy -->
            <div class="post-time">
                <a href="{$system['system_url']}/posts/{$post['post_id']}" class="js_moment"
                    data-time="{$post['time']}">{$post['time']}</a>

                {if $post['location']}
                ·
                <i class="fa fa-map-marker"></i> <span>{$post['location']}</span>
                {/if}

                -
                {if $post['privacy'] == "me"}
                <i class="fa fa-lock" data-toggle="tooltip" data-placement="top"
                    title='{__("Shared with")} {__("Only Me")}'></i>
                {elseif $post['privacy'] == "friends"}
                <!-- <i class="fa fa-users" data-toggle="tooltip" data-placement="top" title='{__("Shared with")} {__("Friends")}'></i> -->
                <span class="share_sign_img" data-toggle="tooltip" data-placement="top"
                    title='{__("Shared with")} {__("Friends")}'> <img class="lazyload"
                        data-src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/friendsIcon.svg"
                        class="blackicon"> </span>
                {elseif $post['privacy'] == "public"}
                <!-- <i class="fa fa-globe" data-toggle="tooltip" data-placement="top" title='{__("Shared with")} {__("Public")}'></i> -->
                <span class="share_sign_img" data-toggle="tooltip" data-placement="top"
                    title='{__("Shared with")}: {__("Public")}'> <img class="lazyload"
                        data-src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
                        class="blackicon"> </span>
                {elseif $post['privacy'] == "custom"}
                <i class="fa fa-cog" data-toggle="tooltip" data-placement="top"
                    title='{__("Shared with")} {__("Custom People")}'></i>
                {/if}
            </div>
            <!-- post time & location & privacy -->
        </div>
        <!-- post meta -->
    </div>
    <!-- post header -->

    <!-- photo -->
    {if !$_lightbox}
    <div class="mt10 clearfix d">
        <div class="pg_wrapper">
            <div class="pg_1x {$user->_data['user_id']} {if $photo['blur']}x-blured{/if}">
                <a href="{$system['system_url']}/photos/{$photo['photo_id']}" class="js_lightbox"
                    data-id="{$photo['photo_id']}" data-image="{$system['system_uploads']}/{$photo['source']}"
                    data-context="{if $photo['is_single']}album{else}post{/if}">
                    <img class="lazyload" data-src="{$system['system_uploads']}/{$photo['source']}">
                </a>
            </div>
        </div>
    </div>
    {/if}
    <!-- photo -->

    <!-- post stats -->
    <div class="post-stats clearfix">
        <!-- reactions stats -->
        {if $photo['reactions_total_count'] > 0}
        <div class="float-left" data-toggle="modal"
            data-url="posts/who_reacts.php?{if $photo['is_single']}post_id={$post['post_id']}{else}photo_id={$photo['photo_id']}{/if}">
            <div class="reactions-stats">
                {foreach $photo['reactions'] as $reaction_type => $reaction_count}
                {if $reaction_count > 0}
                <div class="reactions-stats-item">
                    <div class="inline-emoji no_animation">
                        {include file='__reaction_emojis.tpl' _reaction=$reaction_type}
                    </div>
                </div>
                {/if}
                {/foreach}
                <!-- reactions count -->
                <span>
                    {$photo['reactions_total_count']}
                </span>
                <!-- reactions count -->
            </div>
        </div>
        {/if}
        <!-- reactions stats -->

        <!-- comments & shares -->
        <span class="float-right">
            <!-- comments -->
            <span class="pointer js_comments-toggle stratus_localhub_{$post['post_id']}"
                id="stratus_localhub_{$post['post_id']}">
                <i class="fa fa-comments"></i> {$post['comments']} {__("Comments")}
            </span>
            <!-- comments -->

            <!-- shares -->
            <span class="pointer ml10 {if $post['shares'] == 0}x-hidden{/if}" data-toggle="modal"
                data-url="posts/who_shares.php?post_id={$post['post_id']}">
                {$post['shares']} {__("Shares")}
            </span>
            <!-- shares -->
        </span>
        <!-- comments & shares -->
    </div>
    <!-- post stats -->

    <!-- post actions -->
    {if $user->_logged_in}
    <div class="post-actions clearfix">
        <!-- reactions -->
        <div class="action-btn unselectable dgsdgsdg reactions-wrapper {if $photo['i_react']}js_unreact-{if $photo['is_single']}post{else}photo{/if}{/if}"
            data-reaction="{$photo['i_reaction']}">
            <!-- reaction-btn -->
            <div class="reaction-btn">
                {if !$photo['i_react']}
                <div class="reaction-btn-icon">
                    <i class="icon-post icon_like"></i>
                </div>
                <span class="reaction-btn-name">{__("Like")}</span>
                {else}
                <div class="reaction-btn-icon">
                    <div class="inline-emoji no_animation">
                        {include file='__reaction_emojis.tpl' _reaction=$photo['i_reaction']}
                    </div>
                </div>
                <span
                    class="reaction-btn-name {$photo['i_reaction_details']['color']}">{$photo['i_reaction_details']['title']}</span>
                {/if}
            </div>
            <!-- reaction-btn -->

            <!-- reactions-container -->
            <div class="reactions-container">
                {foreach $reactions as $reaction}
                <div class="reactions_item duration-{$reaction@iteration} js_react-{if $photo['is_single']}post{else}photo{/if}"
                    data-reaction="{$reaction['reaction']}" data-reaction-color="{$reaction['color']}"
                    data-title="{$reaction['title']}">
                    {include file='__reaction_emojis.tpl' _reaction=$reaction['reaction']}
                </div>
                {/foreach}
            </div>
            <!-- reactions-container -->
        </div>
        <!-- reactions -->

        <!-- comment -->
        <span class="action-btn  {if $post['comments_disabled']}x-hidden{/if}">
            <i class="icon-post icon_comment"></i> <span>{__("Comment")}</span>
        </span>
        <!-- comment -->

        <!-- share -->
        {if $post['privacy'] == "public"}

        <div class="_share_post_ dropdown">
            <div class="action-btn dropdown-toggle dropdown-toggle-share" id="stratus_post_{$post['post_id']}"
                parent-data-id="{$post['post_id']}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                data-url="posts/share.php?do=create&post_id={$post['post_id']}">
                <!--include file='__svg_icons.tpl' icon="share" width="16px" height="16px" class="mr5" -->
                <!-- <img src="{$system['system_url']}/content/themes/default/images/share-icon.svg"> -->
                <i class="icon-post icon_share"></i>
                <span>{__("Share")}</span>
            </div>
            <div class="_share-dropdown_ dropdown-menu fade" aria-labelledby="stratus_post_{$post['post_id']}"
                data-toggle="modal" data-url="posts/share.php?do=create&post_id={$post['post_id']}">
                <div class="share_icon_list">
                    <ul class="-list_items">
                        <li class="stratus_local_share" id="share_timeline"><label for="share_to_timeline"><span
                                    class="__list_icon"><img class="lazyload"
                                        data-src="{$system['system_uploads_assets']}/content/themes/default/images/share-timeline.svg"></span><span>Share
                                    to Timeline</span></label>
                        </li>

                        {if $system['groups_enabled'] && !empty($groups) && count($groups) > 0}
                        <li class="stratus_local_share" id="share_group"><label for="share_to_group"><span
                                    class="__list_icon"> <img class="lazyload"
                                        data-src="{$system['system_uploads_assets']}/content/themes/default/images/share_grp.svg"></span><span>Share
                                    to Group</span></label>
                        </li>
                        {/if}
                        {if $system['pages_enabled'] && !empty($pages) && count($pages) > 0}
                        <li class="stratus_local_share" id="share_page"><label for="share_to_page"><span
                                    class="__list_icon"> <img class="lazyload"
                                        data-src="{$system['system_uploads_assets']}/content/themes/default/images/share-page.svg"></span><span>Share
                                    to a Page </span></label>
                        </li>
                        {/if}
                        <li class="stratus_local_share" id="share_post"><label for="write_post"><span
                                    class="__list_icon"> <img class="lazyload"
                                        data-src="{$system['system_uploads_assets']}/content/themes/default/images/write-post.svg"></span><span>Write
                                    post</span></label>
                        </li>
                        {if $system['social_share_enabled']}
                        <li class="stratus_local_share" id="share_social_media"><label for="share_to_sm"><span
                                    class="__list_icon"><img class="lazyload"
                                        data-src="{$system['system_uploads_assets']}/content/themes/default/images/share-sm.svg"></span><span>Share
                                    to Social Media</span></label>
                        </li>
                        {/if}
                    </ul>
                </div>
            </div>
        </div>

        {/if}
        <!-- share -->
    </div>
    {/if}
    <!-- post actions -->
</div>

<!-- post footer -->
<div class="post-footer">
    <!-- comments -->
    {include file='__feeds_post.comments.tpl' _is_photo=(!$photo['is_single'])?true:false}
    <!-- comments -->
</div>
<!-- post footer -->