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
                <a href="{$system['system_url']}/global-profile-posts/{$post['post_id']}" class="js_moment"
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
                    title='{__("Shared with")} {__("Friends")}'> <img
                        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/friendsIcon.svg"
                        class="blackicon"> </span>
                {elseif $post['privacy'] == "public"}
                <!-- <i class="fa fa-globe" data-toggle="tooltip" data-placement="top" title='{__("Shared with")} {__("Public")}'></i> -->
                <span class="share_sign_img" data-toggle="tooltip" data-placement="top"
                    title='{__("Shared with")}: {__("Public")}'> <img
                        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
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
    <div class="mt10 clearfix">
        <div class="pg_wrapper">
            <div class="pg_1x {if $photo['blur']}x-blured{/if}">
                <a href="{$system['system_url']}/global-profile-photo/{$photo['photo_id']}"
                    class="js_lightboxs global-profile-photo" data-id="{$photo['photo_id']}"
                    data-image="{$system['system_uploads']}/{$photo['source']}"
                    data-context="{if $photo['is_single']}album{else}post{/if}">
                    <img src="{$system['system_uploads']}/{$photo['source']}">
                </a>
            </div>
        </div>
    </div>
    {/if}
    <!-- photo -->

    <!-- post stats -->
    <div class="post-stats clearfix">
        <!-- reactions stats -->

        <!-- reactions stats -->

        <!-- comments & shares -->
        <span class="float-right">
            <!-- comments -->
            <span class="pointer js_comments-toggle new" id="stratus_globalhub_{$post['post_id']}">
                <i class="fa fa-comments"></i> {$post['comments']} {__("Comments")}
            </span>
            <!-- comments -->

            <!-- shares -->
            <span class="pointer ml10 {if $post['shares'] == 0}x-hidden{/if}" data-toggle="modal"
                data-url="posts/global-profile/who_shares.php?post_id={$post['post_id']}">
                {$post['shares']} {__("Shares")}
            </span>
            <!-- shares -->
        </span>
        <!-- comments & shares -->
    </div>
    <!-- post stats -->

    <!-- post actions -->
    {if $user->_logged_in && $_get != "posts_information"}
    <div class="post-actions globalPostActions clearfix">
        <!-- comment -->
        <div class="action-btn js_comment post-comment-button-span-modal" parent-data-id="{$post['post_id']}">
            <!-- <div class="action-btn js_comment subPostAdd"> -->
            <div class="comment-btn-icon commentsButton " data-id="{$post['post_id']}">
                <!-- <div class="comment-btn-icon commentsButton " data-id="{$post['post_id']}" data-post="{$post['text']}" data-img="{$post['post_author_picture']}" > -->
                <span class="commentsIcon"></span>
            </div>
            <!-- {include file='__svg_icons.tpl' icon="comment" width="16px" height="16px" class="mr5"} -->
            <span class="post-comment-button-span-modal" parent-data-id="{$post['post_id']}">{$post['comments']}</span>
        </div>
        <!-- comment -->

        <!-- retweet -->
        <div class="action-btn unselectable reactions-wrapper">
            <!-- reaction-btn -->
            <div class="reaction-btn">
                <div class="dropdown globalDropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="retweet-btn-icon retweetButton ">
                            <span class="retweetIcon"></span>
                        </div>
                        <span id="retweetCount_{$post['post_id']}" class="reaction-counting">{$post['retweet']}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Repost</a>
                        <a class="dropdown-item" href="#">Quote Post</a>
                    </div>
                </div>
            </div>
            <!-- retweet-btn -->
        </div>
        <!-- retweet -->
        <!-- reactions -->
        <!-- reactions -->


        <div class="action-btn unselectable reactions-wrappers {if $photo['i_react']}js_unreact-post{/if} js_react-post"
            data-reaction="{if !$post['reaction']}love{/if}" data-type="photos" data-id="{$post['post_id']}">
            <!-- reaction-btn -->
            <div class="reaction-btn">
                {if !$photo['i_react']}
                <div class="reaction-btn-icon unLikeButton">
                    <!-- unLikeButton -->
                    <span class="unLikeIcon"></span>
                </div>
                {else}
                <div class="reaction-btn-icon likeButton">
                    <!-- likeButton -->
                    <span class="likeIcon"></span>
                </div>
                {/if}

                <span class="reaction-counting">{$photo['reactions_total_count']}</span>

            </div>
            <!-- reaction-btn -->
        </div>
        <!-- reactions -->
        <!-- reactions -->

        <!-- share -->
        {if $post['privacy'] == "public"}
        <!-- <div class="action-btn global-profile-share" data-toggle="modal"
             data-url="posts/global-profile/share.php?do=create&post_id={$post['post_id']}"> -->
        <div class="action-btn global-profile-share">

            <div class="dropdown globalDropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="share-btn-icon sharesButton ">
                        <span class="sharesIcon"></span>
                    </div>
                    <span>{$post['shares']} </span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" id="js_send_direct_message" href="javascript:void(0);"
                        data-id="{$post['post_id']}" data-userid="{$user->_data['user_id']}"
                        data-clipboard-text="{$system['system_url']}/global-profile-posts/{$post['post_id']}">Send via
                        Direct Message</a>
                    <a class="dropdown-item js_bookmark-post" href="javascript:void(0);" data-id="{$post['post_id']}"
                        data-userid="{$user->_data['user_id']}">Add Post to Bookmarks</a>
                    <a class="dropdown-item copy-btn" href="javascript:void(0);"
                        data-clipboard-text="{$system['system_url']}/global-profile-posts/{$post['post_id']}">Copy link
                        to Post</a>
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

    <!-- comments -->
</div>
<!-- post footer -->