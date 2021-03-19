{if !$standalone}<li class="feeds_post{if $post['childPostExists']==true}   parent-post-li{/if}"
    data-id="{$post['post_id']}" post-type="{$post['post_type']}">{/if}
    <!-- post -->
    {if $post['childPostExists']==false}
    <!-- <li class="child-post-first-li" data-id="{$post['post_id']}"> -->
    <div class="thrdshw">
        <div class="post{if $_get == ' posts_profile' && $user->_data['user_id'] == $post['author_id'] &&
        ($post['is_hidden'] || $post['is_anonymous'])}is_hidden{/if}{if $boosted}boosted{/if} {if ($post['in_group'] && !$post['group_approved']) OR ($post['in_event'] && !$post['event_approved'])}pending{/if}"
            data-id="{$post['post_id']}" data-userid="{$user->_data['user_id']}">

            {if ($post['in_group'] && !$post['group_approved']) OR ($post['in_event'] && !$post['event_approved'])}
            <div class="pending-icon" data-toggle="tooltip" title="{__(" Pending Post")}">
                <i class="fa fa-clock"></i>
            </div>
            {/if}

            {if $standalone && $pinned}
            <div class="pin-icon" data-toggle="tooltip" title="{__(" Pinned Post")}">
                <i class="fa fa-bookmark"></i>
            </div>
            {/if}

            {if $standalone && $boosted}
            <div class="boosted-icon" data-toggle="tooltip" title="{__(" Promoted")}">
                <img width="30px" height="30px"
                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/Featured.svg">
            </div>
            {/if}

            <!-- memory post -->
            {if $_get == "memories"}
            <div class="post-memory-header">
                <span class="js_moment" data-time="{$post['time']}">{$post['time']}</span>
            </div>
            {/if}
            <!-- memory post -->

            <!-- post body -->
            <div class="post-body">
                {if $post['retweetPost']}
                <span class="post-title-reposted">{$post['retweetPost']} Reposted</span>
                {/if}
                <!-- post top alert -->
                {if $_get == "posts_profile" && $user->_data['user_id'] == $post['author_id'] && ($post['is_hidden'] ||
                $post['is_anonymous'])}
                <div class="post-top-alert">{__("Only you can see this post")}</div>
                {/if}
                <!-- post top alert -->

                {include file='global-profile/global-profile__feeds_post.body.tpl' _post=$post _shared=false}

                <!-- post stats -->
                <div class="post-stats clearfix">


                    <!-- video views -->
                    {if $post['post_type'] == "video"}
                    <div style="display: inline-block;">
                        <span class="videoCountWrap">
                            <i class="fa fa-eye"></i> {$post['video']['views']}
                        </span>
                    </div>
                    {/if}
                    <!-- video views -->

                    <!-- audio views -->
                    {if $post['post_type'] == "audio"}
                    <div style="display: inline-block;">
                        <span class="videoCountWrap">
                            <i class="fa fa-eye"></i>{$post['audio']['views']}
                        </span>
                    </div>
                    {/if}
                    <!-- audio views -->

                    <!-- comments & shares -->
                    <span class="float-right">
                        <!-- shares -->
                        <span class="pointer ml10 {if $post['shares'] == 0}x-hidden{/if}" data-toggle="modal"
                            data-url="posts/global-profile/who_shares.php?post_id={$post['post_id']}">
                            <i class="fa fa-share"></i> {__("Shares")}
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
                    <!-- <div class="action-btn js_comment subPostAdd"> -->
                    <div class="action-btn js_comment post-comment-button-span-modal"
                        parent-data-id="{$post['post_id']}">
                        <div class="comment-btn-icon commentsButton " data-id="{$post['post_id']}">
                            <span class="commentsIcon"></span>
                        </div>
                        <!-- {include file='__svg_icons.tpl' icon="comment" width="16px" height="16px" class="mr5"} -->
                        <span class="post-comment-button-span-modal"
                            parent-data-id="{$post['post_id']}">{$post['comments']}</span>
                    </div>
                    <!-- comment -->

                    <!-- retweet -->
                    <div class="action-btn unselectable reactions-wrapper">
                        <!-- reaction-btn -->
                        <div class="reaction-btn">
                            <div class="dropdown globalDropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="retweet-btn-icon retweetButton">
                                        <span class="retweetIcon"></span>
                                    </div>
                                    <span id="retweetCount_{$post['post_id']}"
                                        class="reaction-counting">{$post['retweet']}</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    {if $post['retweetPost']}
                                    <a class="dropdown-item tweet-global" data-reaction="undoRetweet"
                                        id="tweetPost_{$post['post_id']}" data-id="{$post['post_id']}"
                                        href="javascript:void(0);">Undo Repost</a>
                                    {else}
                                    <a class="dropdown-item tweet-global" data-reaction="retweet"
                                        id="tweetPost_{$post['post_id']}" data-id="{$post['post_id']}"
                                        href="javascript:void(0);">Repost</a>
                                    {/if}
                                    <a class="dropdown-item" data-toggle="modal"
                                        data-url="posts/global-profile/share.php?do=create&amp;post_id={$post['post_id']}">Quote
                                        Post</a>
                                </div>
                            </div>
                        </div>
                        <!-- retweet-btn -->
                    </div>
                    <!-- retweet -->
                    <!-- reactions -->

                    <div class="action-btn unselectable reactions-wrappers {if $post['i_react']}js_unreact-post{/if} js_react-post"
                        data-reaction="{if !$post['reaction']}love{/if}" data-id="{$post['post_id']}">
                        <!-- reaction-btn -->
                        <div class="reaction-btn">
                            {if !$post['i_react']}
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
                            <span class="reaction-counting">{$post['reactions_total_count']}</span>
                        </div>
                        <!-- reaction-btn -->
                    </div>
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
                                    data-clipboard-text="{$system['system_url']}/global-profile-posts/{$post['post_id']}">Send
                                    via Direct Message</a>
                                <a class="dropdown-item js_bookmark-post" href="javascript:void(0);"
                                    data-id="{$post['post_id']}" data-userid="{$user->_data['user_id']}">Add Post to
                                    Bookmarks</a>
                                <a class="dropdown-item copy-btn" href="javascript:void(0);"
                                    data-clipboard-text="{$system['system_url']}/global-profile-posts/{$post['post_id']}">Copy
                                    link to Post</a>
                            </div>
                        </div>
                    </div>
                    {/if}
                    <!-- share -->
                </div>
                {/if}
                <!-- post actions -->

            </div>
            <!-- post body -->



            <!-- post approval -->
            {if ($post['in_group'] && $post['is_group_admin'] &&!$post['group_approved']) OR ($post['in_event'] &&
            $post['is_event_admin'] &&!$post['event_approved']) }
            <div class="post-approval">
                <button class="btn btn-success  mr5 js_approve-post"><i
                        class="fa fa-check mr5"></i>{__("Approve")}</button>
                <button class="btn btn-danger  js_delete-post"><i class="fa fa-times mr5"></i>{__("Decline")}</button>
            </div>
            {/if}
            <!-- post approval -->

        </div>
    </div>
    <!-- </li> -->
    {else}
    <!-- childPostExists else start -->
    <ul class="child-post-ul secoundPostHidd">
        <li class="child-post-first-li" data-id="{$post['post_id']}">
            <div class="post {if $_get == " posts_profile" && $user->_data['user_id'] == $post['author_id'] &&
                ($post['is_hidden'] || $post['is_anonymous'])}is_hidden{/if}
                {if $boosted}boosted{/if} {if ($post['in_group'] && !$post['group_approved']) OR ($post['in_event'] &&
                !$post['event_approved'])}pending{/if} " data-id="{$post['post_id']}">

                {if ($post['in_group'] && !$post['group_approved']) OR ($post['in_event'] && !$post['event_approved'])}
                <div class="pending-icon" data-toggle="tooltip" title="{__(" Pending Post")}">
                    <i class="fa fa-clock"></i>
                </div>
                {/if}
                {if $standalone && $pinned}
                <div class="pin-icon" data-toggle="tooltip" title="{__(" Pinned Post")}">
                    <i class="fa fa-bookmark"></i>
                </div>
                {/if}
                {if $standalone && $boosted}
                <div class="boosted-icon" data-toggle="tooltip" title="{__(" Promoted")}">
                    <img width="30px" height="30px"
                        src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/Featured.svg">
                </div>
                {/if}
                <!-- memory post -->
                {if $_get == "memories"}
                <div class="post-memory-header">
                    <span class="js_moment" data-time="{$post['time']}">{$post['time']}</span>
                </div>
                {/if}
                <!-- memory post -->
                <!-- post body -->
                <div class="post-body" style="padding-bottom: 0;">
                    {if $post['retweetPost']}
                    <span class="post-title-reposted">{$post['retweetPost']} Reposted</span>
                    {/if}
                    <!-- post top alert -->
                    {if $_get == "posts_profile" && $user->_data['user_id'] == $post['author_id'] && ($post['is_hidden']
                    || $post['is_anonymous'])}
                    <div class="post-top-alert">{__("Only you can see this post")}</div>
                    {/if}
                    <!-- post top alert -->

                    {include file='global-profile/global-profile__feeds_post.body.tpl' _post=$post _shared=false}

                    <!-- post stats -->
                    <div class="post-stats clearfix">
                        <!-- video views -->
                        {if $post['post_type'] == "video"}
                        <div style="display: inline-block;">
                            <span class="videoCountWrap">
                                <i class="fa fa-eye"></i> {$post['video']['views']}
                            </span>
                        </div>
                        {/if}
                        <!-- video views -->

                        <!-- audio views -->
                        {if $post['post_type'] == "audio"}
                        <div style="display: inline-block;">
                            <span class="videoCountWrap">
                                <i class="fa fa-eye"></i>{$post['audio']['views']}
                            </span>
                        </div>
                        {/if}
                        <!-- audio views -->

                        <!-- comments & shares -->
                        <span class="float-right">
                            <!-- shares -->
                            <span class="pointer ml10 {if $post['shares'] == 0}x-hidden{/if}" data-toggle="modal"
                                data-url="posts/global-profile/who_shares.php?post_id={$post['post_id']}">
                                <i class="fa fa-share"></i> {__("Shares")}
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
                        <!-- <div class="action-btn js_comment subPostAdd"> -->
                        <div class="action-btn js_comment post-comment-button-span-modal"
                            parent-data-id="{$post['post_id']}">
                            <div class="comment-btn-icon commentsButton " data-id="{$post['post_id']}">
                                <span class="commentsIcon"></span>
                            </div>
                            <!-- {include file='__svg_icons.tpl' icon="comment" width="16px" height="16px" class="mr5"} -->
                            <span class="post-comment-button-span-modal"
                                parent-data-id="{$post['post_id']}">{$post['comments']}</span>
                        </div>
                        <!-- comment -->

                        <!-- retweet -->
                        <div class="action-btn unselectable reactions-wrapper">
                            <!-- reaction-btn -->
                            <div class="reaction-btn">
                                <div class="dropdown globalDropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="retweet-btn-icon retweetButton">
                                            <span class="retweetIcon"></span>
                                        </div>
                                        <span id="retweetCount_{$post['post_id']}"
                                            class="reaction-counting">{$post['retweet']}</span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        {if $post['retweetPost']}
                                        <a class="dropdown-item tweet-global" data-reaction="undoRetweet"
                                            id="tweetPost_{$post['post_id']}" data-id="{$post['post_id']}"
                                            href="javascript:void(0);">Undo Repost</a>
                                        {else}
                                        <a class="dropdown-item tweet-global" data-reaction="retweet"
                                            id="tweetPost_{$post['post_id']}" data-id="{$post['post_id']}"
                                            href="javascript:void(0);">Repost</a>
                                        {/if}
                                        <a class="dropdown-item" data-toggle="modal"
                                            data-url="posts/global-profile/share.php?do=create&amp;post_id={$post['post_id']}">Quote
                                            Post</a>
                                    </div>
                                </div>
                            </div>
                            <!-- retweet-btn -->
                        </div>
                        <!-- retweet -->
                        <!-- reactions -->
                        <!-- reactions -->

                        <div class="action-btn unselectable reactions-wrappers {if $post['i_react']}js_unreact-post{/if} js_react-post"
                            data-reaction="{if !$post['reaction']}love{/if}" data-id="{$post['post_id']}">
                            <!-- reaction-btn -->
                            <div class="reaction-btn">
                                {if !$post['i_react']}
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
                                <span class="reaction-counting">{$post['reactions_total_count']}</span>
                            </div>
                            <!-- reaction-btn -->
                        </div>
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
                                        data-clipboard-text="{$system['system_url']}/global-profile-posts/{$post['post_id']}">Send
                                        via Direct Message</a>
                                    <a class="dropdown-item js_bookmark-post" href="javascript:void(0);"
                                        data-id="{$post['post_id']}" data-userid="{$user->_data['user_id']}">Add Post to
                                        Bookmarks</a>
                                    <a class="dropdown-item copy-btn" href="javascript:void(0);"
                                        data-clipboard-text="{$system['system_url']}/global-profile-posts/{$post['post_id']}">Copy
                                        link to Post</a>
                                </div>
                            </div>
                        </div>
                        {/if}
                        <!-- share -->
                    </div>
                    {/if}
                    <!-- post actions -->
                </div>
                <!-- post body -->
                <!-- post approval -->
                {if ($post['in_group'] && $post['is_group_admin'] &&!$post['group_approved']) OR ($post['in_event'] &&
                $post['is_event_admin'] &&!$post['event_approved']) }
                <div class="post-approval">
                    <button class="btn btn-success  mr5 js_approve-post"><i
                            class="fa fa-check mr5"></i>{__("Approve")}</button>
                    <button class="btn btn-danger  js_delete-post"><i
                            class="fa fa-times mr5"></i>{__("Decline")}</button>
                </div>
                {/if}
                <!-- post approval -->
            </div>
        </li>
        <!-- {foreach $post['childPostData'] as $post}
        <li class="child-post-first-l">
            <div class="post">
            </div>
        </li>
        {/foreach} -->

        {foreach $post['childPostData'] as $post}
        {include file='global-profile/global-profile__feeds_post.tpl' _get=$_get}
        {/foreach}
        <!-- post body button show thread -->
        {if ($page!="global-profile/global-profile-post") }
        <div class="post-body postThreadButton">
            {include file='global-profile/global-profile__feeds_post.body.tpl' _post=$post _shared=false}
            <div class="threadButtonPosition">
                <a href="{$system['system_url']}/global-profile-posts/{$post['post_id']}" class="btn">Show this
                    thread</a>
            </div>
        </div>
        {/if}
        <!-- post body -->
    </ul>

    {/if}
    <!-- post -->
    {if !$standalone}
</li>{/if}