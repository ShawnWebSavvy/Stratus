{if !$standalone}<li class="feeds_post" data-id="{$post['post_id']}" post-type="{$post['post_type']}">{/if}
    <!-- post -->
    {if $subactive_page === "profile"}
    <div class="post{if $_get == " posts_profile" && $user->_data['user_id'] == $post['author_id'] &&
        ($post['is_hidden'] || $post['is_anonymous'])} is_hidden{/if}{if ($post['in_group'] && !$post['group_approved'])
        OR ($post['in_event'] && !$post['event_approved'])}pending{/if} {$post['status_post']}"
        data-id="{$post['post_id']}">
        {else}
        <div class="post{if $_get == " posts_profile" && $user->_data['user_id'] == $post['author_id'] &&
            ($post['is_hidden'] || $post['is_anonymous'])} is_hidden{/if}{if $post['boosted'] == "1"} boosted{/if}{if
            $post['boosted'] == "0"} non_promoted{/if}{if ($post['in_group'] && !$post['group_approved']) OR
            ($post['in_event'] && !$post['event_approved'])}pending{/if} {$post['status_post']}"
            data-id="{$post['post_id']}">
            {/if}
            {if ($post['in_group'] && !$post['group_approved']) OR ($post['in_event'] && !$post['event_approved'])}
            <div class="pending-icon" data-toggle="tooltip" title="{__(" Pending Post")}">
                <i class="fa fa-clock"></i>
            </div>
            {/if}

            {if $standalone && $pinned || $post['status_post'] == "pinned_post"}
            <div class="pin-icon" data-toggle="tooltip" title="{__(" Pinned Post")}">
                <i class="fa fa-bookmark"></i>
            </div>
            {/if}

            {if $standalone && $boosted || $post['boosted'] == "1"}
            <div class="boosted-icon" data-toggle="tooltip" title="{__(" Promoted")}">
                <img width="30px" height="30px"
                    src="{$system['system_uploads_assets']}/content/themes/{$system['theme']}/images/svg/svgImg/Featured.svg">
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

                <!-- post top alert -->
                {if $_get == "posts_profile" && $user->_data['user_id'] == $post['author_id'] && ($post['is_hidden'] ||
                $post['is_anonymous'])}
                <div class="post-top-alert">{__("Only you can see this post")}</div>
                {/if}
                <!-- post top alert -->

                {include file='__feeds_post.body.tpl' _post=$post _shared=false}

                <!-- post stats -->
                <div class="post-stats clearfix">
                    <!-- reactions stats -->
                    {if $post['reactions_total_count'] > 0}
                    <div class="float-left mr10" data-toggle="modal"
                        data-url="posts/who_reacts.php?post_id={$post['post_id']}">
                        <div class="reactions-stats">
                            {foreach $post['reactions'] as $reaction_type => $reaction_count}
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
                                {$post['reactions_total_count']}
                            </span>
                            <!-- reactions count -->
                        </div>
                    </div>
                    {/if}
                    <!-- reactions stats -->

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
                    <span style="display: flex;align-items: center;">
                        <i class="fa fa-eye"></i> {$post['audio']['views']}
                    </span>
                    {/if}
                    <!-- audio views -->

                    <!-- comments & shares -->
                    <span class="float-right">
                        <!-- comments -->
                        <span class="pointer js_comments-toggle stratus_localhub_{$post['post_id']}"
                            id="stratus_localhub_{$post['post_id']}" parent-data-id="{$post['post_id']}">
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
                {if $user->_logged_in && $_get != "posts_information"}
                <div class="post-actions clearfix">
                    <!-- reactions -->
                    <div class="action-btn unselectable reactions-wrapper {if $post['i_react']}js_unreact-post{/if}"
                        data-reaction="{$post['i_reaction']}">
                        <!-- reaction-btn -->
                        <div class="reaction-btn">
                            {if !$post['i_react']}
                            <div class="reaction-btn-icon">
                                <i class="icon-post icon_like"></i>
                            </div>
                            <span class="reaction-btn-name">{__("Like")}</span>
                            {else}
                            <div class="reaction-btn-icon">
                                <div class="inline-emoji no_animation">
                                    {include file='__reaction_emojis.tpl' _reaction=$post['i_reaction']}
                                </div>
                            </div>
                            <span
                                class="reaction-btn-name {$post['i_reaction_details']['color']}">{$post['i_reaction_details']['title']}</span>
                            {/if}
                        </div>
                        <!-- reaction-btn -->

                        <!-- reactions-container -->
                        <div class="reactions-container">
                            {foreach $reactions as $reaction}
                            <div class="reactions_item duration-{$reaction@iteration} js_react-post"
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
                    <div class="action-btn js_comment post-comment-button-div {if $post['comments_disabled']}x-hidden{/if}"
                        parent-data-id="{$post['post_id']}">
                        <!--include file='__svg_icons.tpl' icon="comment" width="16px" height="16px" class="mr5"-->
                        <i class="icon-post icon_comment"></i>
                        <span class="post-comment-button-span-modal"
                            parent-data-id="{$post['post_id']}">{__("Comment")}</span>
                    </div>
                    <!-- comment -->

                    <!-- share -->
                    {if $post['privacy'] == "public"}

                    <div class="_share_post_ dropdown">
                        <div class="action-btn dropdown-toggle dropdown-toggle-share"
                            id="stratus_post_{$post['post_id']}" parent-data-id="{$post['post_id']}"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            data-url="posts/share.php?do=create&post_id={$post['post_id']}">
                            <!--include file='__svg_icons.tpl' icon="share" width="16px" height="16px" class="mr5" -->
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/share-icon.svg"> -->
                            <i class="icon-post icon_share"></i>
                            <span>{__("Share")}</span>
                        </div>
                        <div class="_share-dropdown_ dropdown-menu fade _share_btn_element"
                            aria-labelledby="stratus_post_{$post['post_id']}" data-toggle="modal"
                            data-url="posts/share.php?do=create&post_id={$post['post_id']}">
                            <div class="share_icon_list">
                                <ul class="-list_items">
                                    <li class="stratus_local_share" id="share_timeline"><label
                                            for="share_to_timeline"><span class="__list_icon"><img
                                                    src="{$system['system_uploads_assets']}/content/themes/default/images/share-timeline.svg"></span><span>Share
                                                to Timeline</span></label>
                                    </li>

                                    {if $system['groups_enabled'] && !empty($groups) && count($groups) > 0}
                                    <li class="stratus_local_share" id="share_group"><label for="share_to_group"><span
                                                class="__list_icon"> <img
                                                    src="{$system['system_uploads_assets']}/content/themes/default/images/share_grp.svg"></span><span>Share
                                                to Group</span></label>
                                    </li>
                                    {/if}
                                    {if $system['pages_enabled'] && !empty($pages) && count($pages) > 0}
                                    <li class="stratus_local_share" id="share_page"><label for="share_to_page"><span
                                                class="__list_icon"> <img
                                                    src="{$system['system_uploads_assets']}/content/themes/default/images/share-page.svg"></span><span>Share
                                                to a Page </span></label>
                                    </li>
                                    {/if}
                                    <li class="stratus_local_share" id="share_post"><label for="write_post"><span
                                                class="__list_icon"> <img
                                                    src="{$system['system_uploads_assets']}/content/themes/default/images/write-post.svg"></span><span>Write
                                                post</span></label>
                                    </li>
                                    {if $system['social_share_enabled']}
                                    <li class="stratus_local_share" id="share_social_media"><label
                                            for="share_to_sm"><span class="__list_icon"><img
                                                    src="{$system['system_uploads_assets']}/content/themes/default/images/share-sm.svg"></span><span>Share
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
            <!-- post body -->

            <!-- post footer -->
            <div class="post-footer post-comment-content-div{if !$standalone || $post['boosted'] == '1'} x-hidden{/if}">
                <!-- comments -->
                {include file='__feeds_post.comments.tpl'}
                <!-- comments -->
            </div>
            <!-- post footer -->

            <!-- post approval -->
            {if ($post['in_group'] && $post['is_group_admin'] && !$post['group_approved']) OR ($post['in_event'] &&
            $post['is_event_admin'] &&!$post['event_approved']) }
            <div class="post-approval">
                <button class="btn btn-success  mr5 js_approve-post"><i
                        class="fa fa-check mr5"></i>{__("Approve")}</button>
                <button class="btn btn-danger  js_delete-post"><i class="fa fa-times mr5"></i>{__("Decline")}</button>
            </div>
            {/if}
            <!-- post approval -->

        </div>
        <!-- post -->
        {if !$standalone}
</li>{/if}