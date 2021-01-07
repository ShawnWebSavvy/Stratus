<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-06 05:08:17
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff545c13d81f4_91187916',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3889988a5adae3a2cfb36ace3f3265f576a37d06' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_post.tpl',
      1 => 1609852364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_post.body.tpl' => 1,
    'file:__reaction_emojis.tpl' => 3,
    'file:__feeds_post.comments.tpl' => 1,
  ),
),false)) {
function content_5ff545c13d81f4_91187916 (Smarty_Internal_Template $_smarty_tpl) {
if (!$_smarty_tpl->tpl_vars['standalone']->value) {?><li class="feeds_post" data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" post-type="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_type'];?>
"><?php }?>
    <!-- post -->
    <?php if ($_smarty_tpl->tpl_vars['subactive_page']->value === "profile") {?>
    <div class="post<?php if ($_smarty_tpl->tpl_vars['_get']->value == " posts_profile" && $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['post']->value['author_id'] && ($_smarty_tpl->tpl_vars['post']->value['is_hidden'] || $_smarty_tpl->tpl_vars['post']->value['is_anonymous'])) {?> is_hidden<?php }
if (($_smarty_tpl->tpl_vars['post']->value['in_group'] && !$_smarty_tpl->tpl_vars['post']->value['group_approved']) || ($_smarty_tpl->tpl_vars['post']->value['in_event'] && !$_smarty_tpl->tpl_vars['post']->value['event_approved'])) {?>pending<?php }?> <?php echo $_smarty_tpl->tpl_vars['post']->value['status_post'];?>
"
        data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
        <?php } else { ?>
        <div class="post<?php if ($_smarty_tpl->tpl_vars['_get']->value == " posts_profile" && $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['post']->value['author_id'] && ($_smarty_tpl->tpl_vars['post']->value['is_hidden'] || $_smarty_tpl->tpl_vars['post']->value['is_anonymous'])) {?> is_hidden<?php }
if ($_smarty_tpl->tpl_vars['post']->value['boosted'] == "1") {?> boosted<?php }
if ($_smarty_tpl->tpl_vars['post']->value['boosted'] == "0") {?> non_promoted<?php }
if (($_smarty_tpl->tpl_vars['post']->value['in_group'] && !$_smarty_tpl->tpl_vars['post']->value['group_approved']) || ($_smarty_tpl->tpl_vars['post']->value['in_event'] && !$_smarty_tpl->tpl_vars['post']->value['event_approved'])) {?>pending<?php }?> <?php echo $_smarty_tpl->tpl_vars['post']->value['status_post'];?>
"
            data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
            <?php }?>
            <?php if (($_smarty_tpl->tpl_vars['post']->value['in_group'] && !$_smarty_tpl->tpl_vars['post']->value['group_approved']) || ($_smarty_tpl->tpl_vars['post']->value['in_event'] && !$_smarty_tpl->tpl_vars['post']->value['event_approved'])) {?>
            <div class="pending-icon" data-toggle="tooltip" title="<?php echo __(" Pending Post");?>
">
                <i class="fa fa-clock"></i>
            </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['standalone']->value && $_smarty_tpl->tpl_vars['pinned']->value || $_smarty_tpl->tpl_vars['post']->value['status_post'] == "pinned_post") {?>
            <div class="pin-icon" data-toggle="tooltip" title="<?php echo __(" Pinned Post");?>
">
                <i class="fa fa-bookmark"></i>
            </div>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['standalone']->value && $_smarty_tpl->tpl_vars['boosted']->value || $_smarty_tpl->tpl_vars['post']->value['boosted'] == "1") {?>
            <div class="boosted-icon" data-toggle="tooltip" title="<?php echo __(" Promoted");?>
">
                <img width="30px" height="30px"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/Featured.svg">
            </div>
            <?php }?>

            <!-- memory post -->
            <?php if ($_smarty_tpl->tpl_vars['_get']->value == "memories") {?>
            <div class="post-memory-header">
                <span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['post']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['time'];?>
</span>
            </div>
            <?php }?>
            <!-- memory post -->

            <!-- post body -->
            <div class="post-body">

                <!-- post top alert -->
                <?php if ($_smarty_tpl->tpl_vars['_get']->value == "posts_profile" && $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['post']->value['author_id'] && ($_smarty_tpl->tpl_vars['post']->value['is_hidden'] || $_smarty_tpl->tpl_vars['post']->value['is_anonymous'])) {?>
                <div class="post-top-alert"><?php echo __("Only you can see this post");?>
</div>
                <?php }?>
                <!-- post top alert -->

                <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.body.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_post'=>$_smarty_tpl->tpl_vars['post']->value,'_shared'=>false), 0, false);
?>

                <!-- post stats -->
                <div class="post-stats clearfix">
                    <!-- reactions stats -->
                    <?php if ($_smarty_tpl->tpl_vars['post']->value['reactions_total_count'] > 0) {?>
                    <div class="float-left mr10" data-toggle="modal"
                        data-url="posts/who_reacts.php?post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                        <div class="reactions-stats">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value['reactions'], 'reaction_count', false, 'reaction_type');
$_smarty_tpl->tpl_vars['reaction_count']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['reaction_type']->value => $_smarty_tpl->tpl_vars['reaction_count']->value) {
$_smarty_tpl->tpl_vars['reaction_count']->do_else = false;
?>
                            <?php if ($_smarty_tpl->tpl_vars['reaction_count']->value > 0) {?>
                            <div class="reactions-stats-item">
                                <div class="inline-emoji no_animation">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['reaction_type']->value), 0, true);
?>
                                </div>
                            </div>
                            <?php }?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <!-- reactions count -->
                            <span>
                                <?php echo $_smarty_tpl->tpl_vars['post']->value['reactions_total_count'];?>

                            </span>
                            <!-- reactions count -->
                        </div>
                    </div>
                    <?php }?>
                    <!-- reactions stats -->

                    <!-- video views -->
                    <?php if ($_smarty_tpl->tpl_vars['post']->value['post_type'] == "video") {?>
                    <div style="display: inline-block;">
                        <span class="videoCountWrap">
                            <i class="fa fa-eye"></i> <?php echo $_smarty_tpl->tpl_vars['post']->value['video']['views'];?>

                        </span>
                    </div>
                    <?php }?>
                    <!-- video views -->

                    <!-- audio views -->
                    <?php if ($_smarty_tpl->tpl_vars['post']->value['post_type'] == "audio") {?>
                    <span>
                        <i class="fa fa-eye"></i> <?php echo $_smarty_tpl->tpl_vars['post']->value['audio']['views'];?>

                    </span>
                    <?php }?>
                    <!-- audio views -->

                    <!-- comments & shares -->
                    <span class="float-right">
                        <!-- comments -->
                        <span class="pointer js_comments-toggle stratus_localhub_<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" id="stratus_localhub_<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
"
                            parent-data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                            <i class="fa fa-comments"></i> <?php echo $_smarty_tpl->tpl_vars['post']->value['comments'];?>
 <?php echo __("Comments");?>

                        </span>
                        <!-- comments -->

                        <!-- shares -->
                        <span class="pointer ml10 <?php if ($_smarty_tpl->tpl_vars['post']->value['shares'] == 0) {?>x-hidden<?php }?>" data-toggle="modal"
                            data-url="posts/who_shares.php?post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['post']->value['shares'];?>
 <?php echo __("Shares");?>

                        </span>
                        <!-- shares -->
                    </span>
                    <!-- comments & shares -->
                </div>
                <!-- post stats -->

                <!-- post actions -->
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['_get']->value != "posts_information") {?>
                <div class="post-actions clearfix">
                    <!-- reactions -->
                    <div class="action-btn unselectable reactions-wrapper <?php if ($_smarty_tpl->tpl_vars['post']->value['i_react']) {?>js_unreact-post<?php }?>"
                        data-reaction="<?php echo $_smarty_tpl->tpl_vars['post']->value['i_reaction'];?>
">
                        <!-- reaction-btn -->
                        <div class="reaction-btn">
                            <?php if (!$_smarty_tpl->tpl_vars['post']->value['i_react']) {?>
                            <div class="reaction-btn-icon">
                                <i class="icon-post icon_like"></i>
                            </div>
                            <span class="reaction-btn-name"><?php echo __("Like");?>
</span>
                            <?php } else { ?>
                            <div class="reaction-btn-icon">
                                <div class="inline-emoji no_animation">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['post']->value['i_reaction']), 0, true);
?>
                                </div>
                            </div>
                            <span
                                class="reaction-btn-name <?php echo $_smarty_tpl->tpl_vars['post']->value['i_reaction_details']['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['i_reaction_details']['title'];?>
</span>
                            <?php }?>
                        </div>
                        <!-- reaction-btn -->

                        <!-- reactions-container -->
                        <div class="reactions-container">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reactions']->value, 'reaction');
$_smarty_tpl->tpl_vars['reaction']->iteration = 0;
$_smarty_tpl->tpl_vars['reaction']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['reaction']->value) {
$_smarty_tpl->tpl_vars['reaction']->do_else = false;
$_smarty_tpl->tpl_vars['reaction']->iteration++;
$__foreach_reaction_1_saved = $_smarty_tpl->tpl_vars['reaction'];
?>
                            <div class="reactions_item duration-<?php echo $_smarty_tpl->tpl_vars['reaction']->iteration;?>
 js_react-post"
                                data-reaction="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['reaction'];?>
" data-reaction-color="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['color'];?>
"
                                data-title="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['title'];?>
">
                                <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['reaction']->value['reaction']), 0, true);
?>
                            </div>
                            <?php
$_smarty_tpl->tpl_vars['reaction'] = $__foreach_reaction_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                        <!-- reactions-container -->
                    </div>
                    <!-- reactions -->

                    <!-- comment -->
                    <div class="action-btn js_comment post-comment-button-div <?php if ($_smarty_tpl->tpl_vars['post']->value['comments_disabled']) {?>x-hidden<?php }?>"
                        parent-data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                        <!--include file='__svg_icons.tpl' icon="comment" width="16px" height="16px" class="mr5"-->
                        <i class="icon-post icon_comment"></i>
                        <span class="post-comment-button-span-modal"
                            parent-data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
"><?php echo __("Comment");?>
</span>
                    </div>
                    <!-- comment -->

                    <!-- share -->
                    <?php if ($_smarty_tpl->tpl_vars['post']->value['privacy'] == "public") {?>

                    <div class="_share_post_ dropdown">
                        <div class="action-btn dropdown-toggle dropdown-toggle-share"
                            id="stratus_post_<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" parent-data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            data-url="posts/share.php?do=create&post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                            <!--include file='__svg_icons.tpl' icon="share" width="16px" height="16px" class="mr5" -->
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/share-icon.svg"> -->
                            <i class="icon-post icon_share"></i>
                            <span><?php echo __("Share");?>
</span>
                        </div>
                        <div class="_share-dropdown_ dropdown-menu fade"
                            aria-labelledby="stratus_post_<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" data-toggle="modal"
                            data-url="posts/share.php?do=create&post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                            <div class="share_icon_list">
                                <ul class="-list_items">
                                    <li class="stratus_local_share" id="share_timeline"><label
                                            for="share_to_timeline"><span class="__list_icon"><img
                                                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/share-timeline.svg"></span><span>Share
                                                to Timeline</span></label>
                                    </li>

                                    <?php if ($_smarty_tpl->tpl_vars['system']->value['groups_enabled'] && count($_smarty_tpl->tpl_vars['groups']->value) > 0) {?>
                                    <li class="stratus_local_share" id="share_group"><label for="share_to_group"><span
                                                class="__list_icon"> <img
                                                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/share_grp.svg"></span><span>Share
                                                to Group</span></label>
                                    </li>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_enabled'] && count($_smarty_tpl->tpl_vars['pages']->value) > 0) {?>
                                    <li class="stratus_local_share" id="share_page"><label for="share_to_page"><span
                                                class="__list_icon"> <img
                                                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/share-page.svg"></span><span>Share
                                                to a Page </span></label>
                                    </li>
                                    <?php }?>
                                    <li class="stratus_local_share" id="share_post"><label for="write_post"><span
                                                class="__list_icon"> <img
                                                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/write-post.svg"></span><span>Write
                                                post</span></label>
                                    </li>
                                    <?php if ($_smarty_tpl->tpl_vars['system']->value['social_share_enabled']) {?>
                                    <li class="stratus_local_share" id="share_social_media"><label
                                            for="share_to_sm"><span class="__list_icon"><img
                                                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/share-sm.svg"></span><span>Share
                                                to Social Media</span></label>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php }?>
                    <!-- share -->
                </div>
                <?php }?>
                <!-- post actions -->

            </div>
            <!-- post body -->

            <!-- post footer -->
            <div class="post-footer post-comment-content-div<?php if (!$_smarty_tpl->tpl_vars['standalone']->value || $_smarty_tpl->tpl_vars['post']->value['boosted'] == '1') {?> x-hidden<?php }?>">
                <!-- comments -->
                <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.comments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <!-- comments -->
            </div>
            <!-- post footer -->

            <!-- post approval -->
            <?php if (($_smarty_tpl->tpl_vars['post']->value['in_group'] && $_smarty_tpl->tpl_vars['post']->value['is_group_admin'] && !$_smarty_tpl->tpl_vars['post']->value['group_approved']) || ($_smarty_tpl->tpl_vars['post']->value['in_event'] && $_smarty_tpl->tpl_vars['post']->value['is_event_admin'] && !$_smarty_tpl->tpl_vars['post']->value['event_approved'])) {?>
            <div class="post-approval">
                <button class="btn btn-success  mr5 js_approve-post"><i
                        class="fa fa-check mr5"></i><?php echo __("Approve");?>
</button>
                <button class="btn btn-danger  js_delete-post"><i class="fa fa-times mr5"></i><?php echo __("Decline");?>
</button>
            </div>
            <?php }?>
            <!-- post approval -->

        </div>
        <!-- post -->
        <?php if (!$_smarty_tpl->tpl_vars['standalone']->value) {?>
</li><?php }
}
}
