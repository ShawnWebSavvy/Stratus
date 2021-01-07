<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-06 05:08:17
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_post.body.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff545c16d1cc1_48806617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3d695d5fe21bc8cc934a93ad318aeeb09b0e4ec' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_post.body.tpl',
      1 => 1609909131,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 1,
    'file:__feeds_post.text.tpl' => 2,
    'file:__feeds_post.body.tpl' => 2,
  ),
),false)) {
function content_5ff545c16d1cc1_48806617 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/sngine/includes/libs/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<!-- post header -->
<div class="post-header">
    <!-- post picture -->
    <div class="post-avatar">
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['is_anonymous']) {?>
        <div class="post-avatar-anonymous">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"spy",'width'=>"30px",'height'=>"30px"), 0, false);
?>
        </div>
        <?php } else { ?>
        <a class="post-avatar-picture <?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_online'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_url'];?>
"
            style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_picture'];?>
);">
        </a>
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_author_online']) {?><i class="fa fa-circle online-dot"></i><?php }?>
        <?php }?>
    </div>
    <!-- post picture -->

    <!-- post meta -->
    <div class="post-meta">
        <!-- post menu -->
        <?php if (!$_smarty_tpl->tpl_vars['_shared']->value && $_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['_get']->value != "posts_information") {?>
        <div class="float-right dropdown">
            <span class=" dropdown-toggle post_custm_option" data-toggle="dropdown" data-display="static"><i
                    class="fas fa-ellipsis-h"></i></span>
            <div class="dropdown-menu dropdown-menu-right post-dropdown-menu cmn_drpdwn_style">
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['manage_post'] && $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "product") {?>
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['available']) {?>
                <div class="dropdown-item pointer js_sold-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/blogNewsWhite.svg"
                                class="blackicon">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/blogNewsHover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Mark as Sold");?>
</span>
                    </div>
                </div>
                <?php } else { ?>
                <div class="dropdown-item pointer js_unsold-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/blogNewsWhite.svg"
                                class="blackicon">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/blogNewsHover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Mark as Available");?>
</span>
                    </div>
                </div>
                <?php }?>
                <!-- <div class="dropdown-divider"></div> -->
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['i_save']) {?>
                <div href="#" class="dropdown-item pointer js_unsave-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/bookMark.svg"
                                class="blackicon">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/bookMarkHover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Unsave Post");?>
</span>
                    </div>
                </div>
                <?php } else { ?>
                <div class="dropdown-item pointer js_save-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/bookMark.svg"
                                class="blackicon">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/bookMarkHover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Save Post");?>
</span>
                    </div>
                </div>
                <?php }?>
                <!-- <div class="dropdown-divider"></div> -->
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['manage_post']) {?>
                <!-- Boost -->
                <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['_post']->value['in_group'] && !$_smarty_tpl->tpl_vars['_post']->value['in_event']) {?>
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['boosted']) {?>
                <div class="dropdown-item pointer js_unboost-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Boost_Post.svg"
                                class="blackicon">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Boost_Post-hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Unboost Post");?>
</span>
                    </div>
                </div>
                <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_boost_posts']) {?>
                <div class="dropdown-item pointer js_boost-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Boost_Post.svg"
                                class="blackicon">
                            <img style="height:20px;width:20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Boost_Post-hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Boost Post");?>
</span>
                    </div>
                </div>
                <?php } else { ?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="dropdown-item">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img style="height: 20px;width: 20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Boost_Post.svg"
                                class="blackicon">
                            <img style="height: 20px;width: 20px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Boost_Post-hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Boost Post");?>
</span>
                    </div>
                </a>
                <?php }?>
                <?php }?>
                <?php }?>
                <!-- Boost -->
                <!-- Pin -->
                <?php if (!$_smarty_tpl->tpl_vars['_post']->value['is_anonymous']) {?>
                <?php if ((!$_smarty_tpl->tpl_vars['_post']->value['in_group'] && !$_smarty_tpl->tpl_vars['_post']->value['in_event']) || ($_smarty_tpl->tpl_vars['_post']->value['in_group'] && $_smarty_tpl->tpl_vars['_post']->value['is_group_admin']) || ($_smarty_tpl->tpl_vars['_post']->value['in_event'] && $_smarty_tpl->tpl_vars['_post']->value['is_event_admin'])) {?>
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['pinned']) {?>
                <div class="dropdown-item pointer js_unpin-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/pin_Post.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/pin_Post-hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Unpin Post");?>
</span>
                    </div>
                </div>
                <?php } else { ?>
                <div class="dropdown-item pointer js_pin-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/pin_Post.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/pin_Post-hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Pin Post");?>
</span>
                    </div>
                </div>
                <?php }?>
                <?php }?>
                <?php }?>
                <!-- Pin -->
                <!-- Edit -->
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "product") {?>
                <div class="dropdown-item pointer" data-toggle="modal"
                    data-url="posts/product.php?do=edit&post_id=<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/edit_icon.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/edit_icon_hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Edit Product");?>
</span>
                    </div>
                </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "article") {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/edit/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" class="dropdown-item pointer">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/edit_icon.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/edit_icon_hover.svg"
                                class="whiteicon">
                        </div>
                        <span> <?php echo __("Edit Article");?>
</span>
                    </div>
                </a>
                <?php } else { ?>
                <div class="dropdown-item pointer js_edit-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/edit_icon.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/edit_icon_hover.svg"
                                class="whiteicon">
                        </div>
                        <span> <?php echo __("Edit Post");?>
</span>
                    </div>
                </div>
                <?php }?>
                <!-- Edit -->

                <!-- Hide -->
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['user_type'] == "user" && !$_smarty_tpl->tpl_vars['_post']->value['in_group'] && !$_smarty_tpl->tpl_vars['_post']->value['in_event'] && !$_smarty_tpl->tpl_vars['_post']->value['is_anonymous']) {?>
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['is_hidden']) {?>
                <div class="dropdown-item pointer js_allow-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Hide_form.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Hide_form-hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Allow on Timeline");?>
</span>
                    </div>
                </div>
                <?php } else { ?>
                <div class="dropdown-item pointer js_disallow-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Hide_form.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Hide_form-hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Hide from Timeline");?>
</span>
                    </div>
                </div>
                <?php }?>
                <?php }?>
                <!-- Hide -->
                <!-- Disable Comments -->
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['comments_disabled']) {?>
                <div class="dropdown-item pointer js_enable-post-comments">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/timelineOff.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/timelineOff-hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Turn on Commenting");?>
</span>
                    </div>
                </div>
                <?php } else { ?>
                <div class="dropdown-item pointer js_disable-post-comments">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/modelCross.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/modelCross_hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Turn off Commenting");?>
</span>
                    </div>
                </div>
                <?php }?>
                <!-- Disable Comments -->
                <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['user_type'] == "user" && !$_smarty_tpl->tpl_vars['_post']->value['is_anonymous']) {?>
                <div class="dropdown-item pointer js_hide-author" data-author-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['user_id'];?>
"
                    data-author-name="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_name'];?>
">
                    <div class="action ">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/modelCross.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/modelCross_hover.svg"
                                class="whiteicon">
                        </div>
                        <?php echo __("Unfollow");?>
 <?php echo $_smarty_tpl->tpl_vars['_post']->value['user_firstname'];?>

                    </div>
                    <div class="action-desc"><?php echo __("Stop seeing posts but stay friends");?>
</div>
                </div>
                <?php }?>
                <div class="dropdown-item pointer js_hide-post">
                    <div class="action">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Hide_form.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Hide_form-hover.svg"
                                class="whiteicon">
                        </div>
                        <?php echo __("Hide this post");?>

                    </div>
                    <div class="action-desc"><?php echo __("See fewer posts like this");?>
</div>
                </div>
                <div class="dropdown-item pointer js_report" data-handle="post" data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_adHub.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_adHub_active.svg"
                                class="whiteicon">
                        </div>
                        <?php echo __("Report post");?>

                    </div>
                </div>
                <?php }?>
                <!-- <div class="dropdown-divider"></div> -->
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" target="_blank"
                    class="dropdown-item openInNewTab">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/linking-img.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/linking-img-hover.svg"
                                class="whiteicon">
                        </div>
                        <span> <?php echo __("Open post in new tab");?>
</span>
                    </div>
                </a>
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['is_anonymous'] && ($_smarty_tpl->tpl_vars['user']->value->_is_admin || $_smarty_tpl->tpl_vars['user']->value->_is_moderator)) {?>
                <!-- <div class="dropdown-divider"></div>  -->
                <a href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_url'];?>
" class="dropdown-item">
                    <div class="action no-desc">
                        <span><?php echo __("Open Author Profile");?>
</span>
                    </div>
                </a>
                <?php }?>

                <!-- Delete -->
                <?php if (($_smarty_tpl->tpl_vars['_post']->value['user_type']) == "page") {?>
                <?php if (($_smarty_tpl->tpl_vars['_post']->value['page_admin'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'])) {?>
                <div class="dropdown-item pointer js_delete-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/delete_icon_hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Delete Post");?>
</span>
                    </div>
                </div>
                <!-- Delete -->
                <?php }?>
                <?php }?>

                <?php if (($_smarty_tpl->tpl_vars['_post']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'])) {?>
                <div class="dropdown-item pointer js_delete-post">
                    <div class="action no-desc">
                        <div class="post_images__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/delete_icon_hover.svg"
                                class="whiteicon">
                        </div>
                        <span><?php echo __("Delete Post");?>
</span>
                    </div>
                </div>
                <!-- Delete -->
                <?php }?>

            </div>
        </div>
        <?php }?>
        <!-- post menu -->

        <!-- post author -->
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['is_anonymous']) {?>
        <span class="post-author"><?php echo __("Anonymous");?>
</span>
        <?php } else { ?>
        <span class="js_user-popover" data-type="<?php echo $_smarty_tpl->tpl_vars['_post']->value['user_type'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_post']->value['user_id'];?>
">
            <a class="post-author" href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_name'];?>
</a>
        </span>
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_author_verified']) {?>
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['user_type'] == "user") {?>
        <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
'
            class="fa fa-check-circle fa-fw verified-badge"></i>
        <?php } else { ?>
        <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified Page");?>
'
            class="fa fa-check-circle fa-fw verified-badge"></i>
        <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['user_subscribed']) {?>
        <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Pro User");?>
' class="fa fa-bolt fa-fw pro-badge"></i>
        <?php }?>
        <?php }?>

        <!-- post author -->

        <!-- post-title -->
        <span class="post-title">
            <?php if (!$_smarty_tpl->tpl_vars['_shared']->value && $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "shared") {?>
            <?php echo __("shared");?>

            <span class="js_user-popover" data-type="<?php echo $_smarty_tpl->tpl_vars['_post']->value['origin']['user_type'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_post']->value['origin']['user_id'];?>
">
                <a href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['origin']['post_author_url'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['_post']->value['origin']['post_author_name'];?>

                </a><?php echo __("'s");?>

            </span>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['_post']->value['origin']['post_id'];?>
">
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'photos') {?>
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['origin']['photos_num'] > 1) {
echo __("photos");
} else {
echo __("photo");
}?>
                <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'media') {?>
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['origin']['media']['media_type'] != "soundcloud") {?>
                <?php echo __("video");?>

                <?php } else { ?>
                <?php echo __("song");?>

                <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'link') {?>
                <?php echo __("link");?>

                <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'poll') {?>
                <?php echo __("poll");?>

                <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'album') {?>
                <?php echo __("album");?>

                <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'video') {?>
                <?php echo __("video");?>

                <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'audio') {?>
                <?php echo __("audio");?>

                <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['origin']['post_type'] == 'file') {?>
                <?php echo __("file");?>

                <?php } else { ?>
                <?php echo __("post");?>

                <?php }?>
            </a>
            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "live") {?>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['live']['live_ended']) {?>
            <?php echo __("was live");?>

            <?php } else { ?>
            <?php echo __("is live now");?>

            <?php }?>
            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "link") {?>
            <?php echo __("shared a link");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "album") {?>
            <?php echo __("added");?>
 <?php echo $_smarty_tpl->tpl_vars['_post']->value['photos_num'];?>
 <?php echo __("photos to the album");?>
: <a
                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['album']['path'];?>
/album/<?php echo $_smarty_tpl->tpl_vars['_post']->value['album']['album_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['album']['title'];?>
</a>

            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "poll") {?>
            <?php echo __("created a poll");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "product") {?>
            <?php echo __("added new product for sale");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "article") {?>
            <?php echo __("added new article");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "video") {?>
            <?php echo __("added a video");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "audio") {?>
            <?php echo __("added an audio");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "file") {?>
            <?php echo __("added a file");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "photos") {?>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos_num'] == 1) {?>
            <?php echo __("added a photo");?>

            <?php } else { ?>
            <?php echo __("added");?>
 <?php echo $_smarty_tpl->tpl_vars['_post']->value['photos_num'];?>
 <?php echo __("photos");?>

            <?php }?>

            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "profile_picture") {?>
            <?php echo __("updated the profile picture");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "profile_cover") {?>
            <?php echo __("updated the cover photo");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "page_picture") {?>
            <?php echo __("updated page picture");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "page_cover") {?>
            <?php echo __("updated cover photo");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "group_picture") {?>
            <?php echo __("updated group picture");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "group_cover") {?>
            <?php echo __("updated group cover");?>


            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "event_cover") {?>
            <?php echo __("updated event cover");?>


            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['_get']->value != 'posts_group' && $_smarty_tpl->tpl_vars['_post']->value['in_group']) {?>
            <i class="fa fa-caret-right ml5 mr5"></i>
            <!-- <i class="fa fa-users ml5 mr5"></i> -->
            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/newgroupIcon1.svg"
                class="ml5 mr5">
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['_post']->value['group_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['group_title'];?>
</a>

            <?php } elseif ($_smarty_tpl->tpl_vars['_get']->value != 'posts_event' && $_smarty_tpl->tpl_vars['_post']->value['in_event']) {?>
            <i class="fa fa-caret-right ml5 mr5"></i><i class="fa fa-calendar ml5 mr5"></i><a
                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['_post']->value['event_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['event_title'];?>
</a>

            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['in_wall']) {?>
            <i class="fa fa-caret-right ml5 mr5"></i>
            <span class="js_user-popover" data-type="user" data-uid="<?php echo $_smarty_tpl->tpl_vars['_post']->value['wall_id'];?>
">
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['wall_username'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['wall_fullname'];?>
</a>
            </span>
            <?php }?>
        </span>
        <!-- post-title -->

        <!-- post feeling -->
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['feeling_action']) {?>
        <span class="post-title">
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] != '' && $_smarty_tpl->tpl_vars['_post']->value['post_type'] != "map") {?> & <?php }
echo __("is");?>

            <?php echo __($_smarty_tpl->tpl_vars['_post']->value["feeling_action"]);?>
 <?php echo __($_smarty_tpl->tpl_vars['_post']->value["feeling_value"]);?>
 <i
                class="twa twa-lg twa-<?php echo $_smarty_tpl->tpl_vars['_post']->value['feeling_icon'];?>
"></i>
        </span>
        <?php }?>
        <!-- post feeling -->

        <!-- post time & location & privacy -->
        <div class="post-time">
            <!-- <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['_post']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['time'];?>
</a> -->
            <a href="javascript:void(0);" class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['_post']->value['time'];?>
"
                style="cursor:default;"><?php echo $_smarty_tpl->tpl_vars['_post']->value['time'];?>
</a>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['location']) {?>
            - <i class="fa fa-map-marker"></i> <span><?php echo $_smarty_tpl->tpl_vars['_post']->value['location'];?>
</span>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['post_translation_enabled']) {?>
            - <span class="text-link js_translator"><?php echo __("Translate");?>
</span>
            <?php }?>
            -
            <?php if (!$_smarty_tpl->tpl_vars['_post']->value['is_anonymous'] && !$_smarty_tpl->tpl_vars['_shared']->value && $_smarty_tpl->tpl_vars['_post']->value['manage_post'] && $_smarty_tpl->tpl_vars['_post']->value['user_type'] == 'user' && !$_smarty_tpl->tpl_vars['_post']->value['in_group'] && !$_smarty_tpl->tpl_vars['_post']->value['in_event'] && $_smarty_tpl->tpl_vars['_post']->value['post_type'] != "product" && $_smarty_tpl->tpl_vars['_post']->value['post_type'] != "article") {?>
            <!-- privacy -->
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "me") {?>
            <div class="btn-group" data-toggle="tooltip" data-placement="top" data-value="me"
                title='<?php echo __("Shared with: Only Me");?>
'>
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-display="static">
                    <span class="share_sign_img" id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Hide_form.svg"
                            class="blackicon">
                    </span>
                </button>
                <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "friends") {?>
                <div class="btn-group" data-toggle="tooltip" data-placement="top" data-value="friends"
                    title='<?php echo __("Shared with: Friends");?>
'>
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-display="static">
                        <span class="share_sign_img" id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/friendsIcon.svg"
                                class="blackicon">
                        </span>
                    </button>
                    <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "public") {?>
                    <div class="btn-group" data-toggle="tooltip" data-placement="top" data-value="public"
                        title='<?php echo __("Shared with: Public");?>
'>
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-display="static">
                            <span class="share_sign_img" id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
                                    class="blackicon">
                            </span>
                        </button>
                        <?php }?>
                        <div class="dropdown-menu dropdown-menu-right _postshare__">
                            <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo __("Shared with: Public");?>
'
                                data-value="public">
                                <div class="post_images__">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
                                        class="blackicon">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_globalHub-active.svg"
                                        class="whiteicon">
                                </div>
                                <span> <?php echo __("Public");?>
</span>
                            </div>
                            <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo __("Shared with: Friends");?>
'
                                data-value="friends">
                                <div class="post_images__">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/friendsIcon.svg"
                                        class="blackicon">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/friendsIconHover.svg"
                                        class="whiteicon">
                                </div>
                                <span><?php echo __("Friends");?>
</span>
                            </div>
                            <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo __("Shared with: Only Me");?>
'
                                data-value="me">
                                <div class="post_images__">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Hide_form.svg"
                                        class="blackicon">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Hide_form-hover.svg"
                                        class="whiteicon">
                                </div>
                                <span> <?php echo __("Only Me");?>
 </span>
                            </div>
                        </div>
                    </div>
                    <!-- privacy -->
                    <?php } else { ?>
                    <?php if ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "me") {?>
                    <i class="fa fa-lock" data-toggle="tooltip" data-placement="top"
                        title='<?php echo __("Shared with");?>
 <?php echo __("Only Me");?>
'></i>
                    <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "friends") {?>
                    <!-- <i class="fa fa-users" data-toggle="tooltip" data-placement="top" title='<?php echo __("Shared with");?>
 <?php echo __("Friends");?>
'></i> -->
                    <span class="share_sign_img" data-toggle="tooltip" data-placement="top"
                        title='<?php echo __("Shared with");?>
 <?php echo __("Friends");?>
'> <img
                            src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/friendsIcon.svg"
                            class="blackicon"> </span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "public") {?>
                    <!-- <i class="fa fa-globe" data-toggle="tooltip" data-placement="top" title='<?php echo __("Shared with");?>
 <?php echo __("Public");?>
'></i> -->
                    <span class="share_sign_img" data-toggle="tooltip" data-placement="top"
                        title='<?php echo __("Shared with");?>
: <?php echo __("Public");?>
'> <img
                            src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
                            class="blackicon"> </span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['privacy'] == "custom") {?>
                    <i class="fa fa-cog" data-toggle="tooltip" data-placement="top"
                        title='<?php echo __("Shared with");?>
 <?php echo __("Custom People");?>
'></i>
                    <?php }?>
                    <?php }?>
                </div>
                <!-- post time & location & privacy -->
            </div>
            <!-- post meta -->
        </div>
        <!-- post header -->

        <!-- post text -->
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] != "product") {?>
        <?php if (!$_smarty_tpl->tpl_vars['_shared']->value) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.text.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['colored_pattern']) {?>
        <div class="post-colored" <?php if ($_smarty_tpl->tpl_vars['_post']->value['colored_pattern']['type'] == "color") {?>
            style="background-image: linear-gradient(45deg, <?php echo $_smarty_tpl->tpl_vars['_post']->value['colored_pattern']['background_color_1'];?>
, <?php echo $_smarty_tpl->tpl_vars['_post']->value['colored_pattern']['background_color_2'];?>
);"
            <?php } else { ?>
            style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['colored_pattern']['background_image'];?>
)"
            <?php }?>>
            <div class="post-colored-text-wrapper js_scroller" data-slimScroll-height="240">
                <div class="post-text" dir="auto" style="color: <?php echo $_smarty_tpl->tpl_vars['_post']->value['colored_pattern']['text_color'];?>
;">
                    <?php echo $_smarty_tpl->tpl_vars['_post']->value['text'];?>

                </div>
            </div>
        </div>
        <?php } else { ?>
        <div class="post-text js_readmores" dir="auto"><?php echo $_smarty_tpl->tpl_vars['_post']->value['text'];?>
</div>
        <?php }?>
        <div class="post-text-translation x-hidden" dir="auto"></div>
        <?php }?>
        <?php }?>
        <!-- post text -->

        <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "album" || ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "product" && $_smarty_tpl->tpl_vars['_post']->value['photos_num'] > 0) || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "photos" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "profile_picture" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "profile_cover" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "page_picture" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "page_cover" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "group_picture" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "group_cover" || $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "event_cover") {?>
        <div class="mt10 clearfix">
            <div class="pg_wrapper">
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos_num'] == 1) {?>
                <div class="pg_1x<?php if ($_smarty_tpl->tpl_vars['_post']->value['photos'][0]['blur']) {?> x-blured<?php }?>">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/photos/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['photo_id'];?>
" class="js_lightbox"
                        data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['photo_id'];?>
"
                        data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['source'];?>
"
                        data-context="<?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == 'product') {?>post<?php } else { ?>album<?php }?>">
                        <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['source'];?>
">
                    </a>
                </div>
                <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['photos_num'] == 2) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_post']->value['photos'], 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
                <div class="pg_2x <?php if ($_smarty_tpl->tpl_vars['photo']->value['blur']) {?>x-blured<?php }?>">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/photos/<?php echo $_smarty_tpl->tpl_vars['photo']->value['photo_id'];?>
" class="js_lightbox"
                        data-id="<?php echo $_smarty_tpl->tpl_vars['photo']->value['photo_id'];?>
" data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value['source'];?>
"
                        data-context="post"
                        style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['photo']->value['source'];?>
');"></a>
                </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['photos_num'] == 3) {?>
                <div class="pg_3x">
                    <div class="pg_2o3">
                        <div class="pg_2o3_in <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos'][0]['blur']) {?>x-blured<?php }?>">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/photos/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['photo_id'];?>
"
                                class="js_lightbox" data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['photo_id'];?>
"
                                data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['source'];?>
"
                                data-context="post"
                                style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['source'];?>
');"></a>
                        </div>
                    </div>
                    <div class="pg_1o3">
                        <div class="pg_1o3_in <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos'][1]['blur']) {?>x-blured<?php }?>">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/photos/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][1]['photo_id'];?>
"
                                class="js_lightbox" data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][1]['photo_id'];?>
"
                                data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][1]['source'];?>
"
                                data-context="post"
                                style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][1]['source'];?>
');"></a>
                        </div>
                        <div class="pg_1o3_in <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos'][2]['blur']) {?>x-blured<?php }?>">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/photos/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][2]['photo_id'];?>
"
                                class="js_lightbox" data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][2]['photo_id'];?>
"
                                data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][2]['source'];?>
"
                                data-context="post"
                                style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][2]['source'];?>
');"></a>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                <div class="pg_4x">
                    <div class="pg_2o3">
                        <div class="pg_2o3_in <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos'][0]['blur']) {?>x-blured<?php }?>">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/photos/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['photo_id'];?>
"
                                class="js_lightbox" data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['photo_id'];?>
"
                                data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['source'];?>
"
                                data-context="post"
                                style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][0]['source'];?>
');"></a>
                        </div>
                    </div>
                    <div class="pg_1o3">
                        <div class="pg_1o3_in <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos'][1]['blur']) {?>x-blured<?php }?>">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/photos/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][1]['photo_id'];?>
"
                                class="js_lightbox" data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][1]['photo_id'];?>
"
                                data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][1]['source'];?>
"
                                data-context="post"
                                style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][1]['source'];?>
');"></a>
                        </div>
                        <div class="pg_1o3_in <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos'][2]['blur']) {?>x-blured<?php }?>">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/photos/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][2]['photo_id'];?>
"
                                class="js_lightbox" data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][2]['photo_id'];?>
"
                                data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][2]['source'];?>
"
                                data-context="post"
                                style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][2]['source'];?>
');"></a>
                        </div>
                        <div class="pg_1o3_in <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos'][3]['blur']) {?>x-blured<?php }?>">
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/photos/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][3]['photo_id'];?>
"
                                class="js_lightbox" data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][3]['photo_id'];?>
"
                                data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][3]['source'];?>
"
                                data-context="post"
                                style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos'][3]['source'];?>
');">
                                <?php if ($_smarty_tpl->tpl_vars['_post']->value['photos_num'] > 4) {?>
                                <span class="more">+<?php echo $_smarty_tpl->tpl_vars['_post']->value['photos_num']-4;?>
</span>
                                <?php }?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "media" && $_smarty_tpl->tpl_vars['_post']->value['media']) {?>
        <div class="mt10">
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['media']['source_type'] == "photo") {?>
            <div class="post-media">
                <div class="post-media-image">
                    <div class="image" style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_url'];?>
');"></div>
                </div>
                <div class="post-media-meta">
                    <div class="source"><a
                            href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_provider'];?>
</a></div>
                </div>
            </div>
            <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['media']['source_provider'] == "YouTube") {?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['smart_yt_player']) {?>
            <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['_post']) ? $_smarty_tpl->tpl_vars['_post']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['media']['vidoe_id'] = get_youtube_id($_smarty_tpl->tpl_vars['_post']->value['media']['source_html']);
$_smarty_tpl->_assignInScope('_post', $_tmp_array);?>
            <div class="youtube-player" data-id="<?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['vidoe_id'];?>
">
                <img src="https://i.ytimg.com/vi/<?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['vidoe_id'];?>
/hqdefault.jpg">
                <div class="play"></div>
            </div>
            <?php } else { ?>
            <div class="post-media">
                <div class="embed-responsive embed-responsive-16by9">
                    <?php echo html_entity_decode($_smarty_tpl->tpl_vars['_post']->value['media']['source_html'],ENT_QUOTES);?>

                </div>
            </div>
            <div class="post-media-meta">
                <a class="title mb5" href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_title'];?>
</a>
                <div class="text mb5"><?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_text'];?>
</div>
                <div class="source"><?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_provider'];?>
</div>
            </div>
            <?php }?>

            <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['media']['source_provider'] == "Vimeo" || $_smarty_tpl->tpl_vars['_post']->value['media']['source_provider'] == "SoundCloud" || $_smarty_tpl->tpl_vars['_post']->value['media']['source_provider'] == "Vine") {?>
            <div class="post-media">
                <div class="embed-responsive embed-responsive-16by9">
                    <?php echo html_entity_decode($_smarty_tpl->tpl_vars['_post']->value['media']['source_html'],ENT_QUOTES);?>

                </div>
            </div>
            <div class="post-media-meta">
                <a class="title mb5" href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_title'];?>
</a>
                <div class="text mb5"><?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_text'];?>
</div>
                <div class="source"><?php echo $_smarty_tpl->tpl_vars['_post']->value['media']['source_provider'];?>
</div>
            </div>
            <?php } else { ?>
            <div class="embed-ifram-wrapper">
                <?php echo html_entity_decode($_smarty_tpl->tpl_vars['_post']->value['media']['source_html'],ENT_QUOTES);?>

            </div>
            <?php }?>
            <?php }?>
        </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "link" && $_smarty_tpl->tpl_vars['_post']->value['link']) {?>
        <div class="mt10">
            <div class="post-media">
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['link']['source_thumbnail']) {?>
                <a class="post-media-image" href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['link']['source_url'];?>
">
                    <div class="image" style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['_post']->value['link']['source_thumbnail'];?>
');"></div>
                    <div class="source"><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['_post']->value['link']['source_host'], 'UTF-8');?>
</div>
                </a>
                <?php }?>
                <div class="post-media-meta">
                    <a class="title mb5" href="<?php echo $_smarty_tpl->tpl_vars['_post']->value['link']['source_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['link']['source_title'];?>
</a>
                    <div class="text mb5"><?php echo $_smarty_tpl->tpl_vars['_post']->value['link']['source_text'];?>
</div>
                </div>
            </div>
        </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "poll" && $_smarty_tpl->tpl_vars['_post']->value['poll']) {?>
        <div class="poll-options mt10" data-poll-votes="<?php echo $_smarty_tpl->tpl_vars['_post']->value['poll']['votes'];?>
">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_post']->value['poll']['options'], 'option');
$_smarty_tpl->tpl_vars['option']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->do_else = false;
?>
            <div class="mb5">
                <div class="poll-option js_poll-vote" data-id="<?php echo $_smarty_tpl->tpl_vars['option']->value['option_id'];?>
"
                    data-option-votes="<?php echo $_smarty_tpl->tpl_vars['option']->value['votes'];?>
">
                    <div class="percentage-bg" <?php if ($_smarty_tpl->tpl_vars['_post']->value['poll']['votes'] > 0) {?>
                        style="width:
                        <?php echo ($_smarty_tpl->tpl_vars['option']->value['votes']/$_smarty_tpl->tpl_vars['_post']->value['poll']['votes'])*100;?>
%" <?php }?>>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="poll_<?php echo $_smarty_tpl->tpl_vars['_post']->value['poll']['poll_id'];?>
" id="option_<?php echo $_smarty_tpl->tpl_vars['option']->value['option_id'];?>
"
                            class="custom-control-input" <?php if ($_smarty_tpl->tpl_vars['option']->value['checked']) {?>checked<?php }?>>
                        <label class="custom-control-label"
                            for="option_<?php echo $_smarty_tpl->tpl_vars['option']->value['option_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value['text'];?>
</label>
                    </div>
                </div>
                <div class="poll-voters">
                    <div class="more" data-toggle="modal"
                        data-url="posts/who_votes.php?option_id=<?php echo $_smarty_tpl->tpl_vars['option']->value['option_id'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['option']->value['votes'];?>

                    </div>
                </div>
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "article" && $_smarty_tpl->tpl_vars['_post']->value['article']) {?>
        <div class="mt10">
            <div class="post-media">
                <?php if ($_smarty_tpl->tpl_vars['_post']->value['article']['cover']) {?>
                <a class="post-media-image"
                    href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['article']['title_url'];?>
">
                    <div
                        style="padding-top: 50%; background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['article']['cover'];?>
');">
                    </div>
                </a>
                <?php }?>
                <div class="post-media-meta">
                    <a class="title mb5"
                        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['article']['title_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['_post']->value['article']['title'];?>
</a>
                    <div class="text mb5"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_post']->value['article']['text_snippet'],400);?>
</div>
                </div>
            </div>
        </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "video" && $_smarty_tpl->tpl_vars['_post']->value['video']) {?>
        <div>
            <!-- show thumbnail -->
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['video']['thumbnail']) {?>
            <img onclick="onimgTagclick(this)" id="thumb_src_tag_<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" data-vid="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
"
                data-video="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source'];?>
"
                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['thumbnail'];?>
" alt="" style="width:100%">
            <img id="hide_play_img<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];?>
" src="https://www.myaccelerate.io/images/play-btn.png"
                alt="play_btn"
                style="width: 17%; position: absolute; right: 0px; left: 39%; top: 42%; pointer-events: none;">
            <!-- <video style="display:none;" class="js_fluidplayer thumb_crsp_video_tag" id="video-<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['video_id'];
if ($_smarty_tpl->tpl_vars['pinned']->value || $_smarty_tpl->tpl_vars['boosted']->value) {?>-<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];
}?>" <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>onplay="update_media_views('video', <?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['video_id'];?>
)"<?php }?> <?php if ($_smarty_tpl->tpl_vars['_post']->value['video']['thumbnail']) {?>poster="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['thumbnail'];?>
"<?php }?> controls preload="auto" style="width:100%;height:100%;" width="100%" height="100%">
          <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source'];?>
" type="video/mp4">
          <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source'];?>
" type="video/webm">
      </video> -->

            <?php } else { ?>
            <video class="js_fluidplayer"
                id="video-<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['video_id'];
if ($_smarty_tpl->tpl_vars['pinned']->value || $_smarty_tpl->tpl_vars['boosted']->value) {?>-<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];
}?>" <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>onplay="update_media_views('video', <?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['video_id'];?>
)" <?php }?> <?php if ($_smarty_tpl->tpl_vars['_post']->value['video']['thumbnail']) {?>poster="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['thumbnail'];?>
" <?php }?>
                controls preload="auto" style="width:100%;height:100%;" width="100%" height="100%">
                <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source'];?>
" type="video/mp4">
                <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['video']['source'];?>
" type="video/webm">
            </video>
            <?php }?>
        </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "audio" && $_smarty_tpl->tpl_vars['_post']->value['audio']) {?>
        <div class="plr10">
            <audio class="js_audio" id="audio-<?php echo $_smarty_tpl->tpl_vars['_post']->value['audio']['audio_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>onplay="update_media_views('audio', <?php echo $_smarty_tpl->tpl_vars['_post']->value['audio']['audio_id'];?>
)" <?php }?> controls
                preload="auto" style="width: 100%;">
                <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['audio']['source'];?>
" type="audio/mpeg">
                <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['audio']['source'];?>
" type="audio/mp3">
                <?php echo __("Your browser does not support HTML5 audio");?>

            </audio>
        </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "file" && $_smarty_tpl->tpl_vars['_post']->value['file']) {?>
        <div class="post-downloader">
            <div class="icon">
                <i class="fa fa-file-alt fa-2x"></i>
            </div>
            <div class="info">
                <strong><?php echo __("File Type");?>
</strong>: <?php ob_start();
echo $_smarty_tpl->tpl_vars['_post']->value['file']['source'];
$_prefixVariable1 = ob_get_clean();
echo get_extension($_prefixVariable1);?>

                <div class="mt10">
                    <a class="btn btn-primary "
                        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['file']['source'];?>
"><?php echo __("Download");?>
</a>
                </div>
            </div>
        </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "live" && $_smarty_tpl->tpl_vars['_post']->value['live']) {?>
              <?php if ($_smarty_tpl->tpl_vars['system']->value['save_live_enabled'] && $_smarty_tpl->tpl_vars['_post']->value['live']['live_ended'] && $_smarty_tpl->tpl_vars['_post']->value['live']['live_recorded']) {?>
                  <div class="overflow-hidden">
                      <div>
                          <video class="js_fluidplayer"
                              id="video-<?php echo $_smarty_tpl->tpl_vars['_post']->value['live']['live_id'];
if ($_smarty_tpl->tpl_vars['pinned']->value || $_smarty_tpl->tpl_vars['boosted']->value) {?>-<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_id'];
}?>"
                              <?php if ($_smarty_tpl->tpl_vars['_post']->value['live']['video_thumbnail']) {?>poster="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['live']['video_thumbnail'];?>
" <?php }?> controls preload="auto" controls preload="auto"
                          style="width:100%;height:100%;" width="100%" height="100%">
                          <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_agora_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['live']['agora_file'];?>
"
                              type="application/x-mpegURL">
                      </video>
                  </div>
              </div>
              <?php } else { ?>

              <div class="youtube-player with-live js_lightbox-live">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['live']['video_thumbnail'];?>
">
                  <div class="fluid_initial_play play live_video_play"
                      style="background-color:#3367d6;width:60px;height:60px;background-image:unset;">
                      <div class="fluid_initial_play_button">
                      </div>
                  </div>
              </div>
              <?php }?>
        <?php } elseif ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "map") {?>
        <div class="post-map">
            <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $_smarty_tpl->tpl_vars['_post']->value['location'];?>
&amp;zoom=13&amp;size=600x250&amp;maptype=roadmap&amp;markers=color:red%7C<?php echo $_smarty_tpl->tpl_vars['_post']->value['location'];?>
&amp;key=<?php echo $_smarty_tpl->tpl_vars['system']->value['geolocation_key'];?>
"
                width="100%">
        </div>
        <?php } elseif (!$_smarty_tpl->tpl_vars['_shared']->value && $_smarty_tpl->tpl_vars['_post']->value['post_type'] == "shared" && $_smarty_tpl->tpl_vars['_post']->value['origin']) {?>
        <?php if ($_smarty_tpl->tpl_vars['_snippet']->value) {?>
        <span class="text-link js_show-attachments"><?php echo __("Show Attachments");?>
</span>
        <?php }?>
        <div class="mt10 <?php if ($_smarty_tpl->tpl_vars['_snippet']->value) {?>x-hidden<?php }?>">
            <div class="post-media">
                <div class="post-media-meta">
                    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.body.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_post'=>$_smarty_tpl->tpl_vars['_post']->value['origin'],'_shared'=>true), 0, true);
?>
                </div>
            </div>
        </div>
        <?php }?>

        <!-- product -->
        <?php if ($_smarty_tpl->tpl_vars['_post']->value['post_type'] == "product") {?>
        <div class="post-product-container">
            <div class="mtb10 text-lg">
                <strong style="word-break: break-word;"><?php echo $_smarty_tpl->tpl_vars['_post']->value['product']['name'];?>
</strong>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['location']) {?>
            <div class="mb10 text-muted">
                <span class="pages_icons">
                    <img class="blackIcon" alt="Check In" title="Check In"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addpostLocationHover.svg">
                </span>
                <span> <?php echo $_smarty_tpl->tpl_vars['_post']->value['product']['location'];?>
 </span>
            </div>
            <?php }?>
            <!-- post text -->
            <?php if (!$_smarty_tpl->tpl_vars['_shared']->value) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.text.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php } else { ?>
            <div class="post-text js_readmore text-muted" dir="auto"><?php echo $_smarty_tpl->tpl_vars['_post']->value['text'];?>
</div>
            <div class="post-text-translation x-hidden" dir="auto"></div>
            <?php }?>
            <!-- post text -->
            <div class="post-product-wrapper mt10">
                <div class="post-product-details">
                    <div class="title">
                        <span class="pages_icons">
                            <img class="blackIcon" alt="Check In" title="Check In"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/blogNewsHover.svg">
                        </span>
                        <span> <?php echo __("Type");?>
 </span>
                    </div>
                    <div class="description">
                        <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['status'] == "new") {?>
                        <?php echo __("New");?>

                        <?php } else { ?>
                        <?php echo __("Used");?>

                        <?php }?>
                    </div>
                </div>
                <div class="post-product-details">
                    <div class="title">
                        <i class="fa fa-money-bill-alt fa-fw mr5" style="color: #2bb431;"></i><?php echo __("Price");?>

                    </div>
                    <div class="description">
                        <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['price'] > 0) {?>
                        <?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];
echo $_smarty_tpl->tpl_vars['_post']->value['product']['price'];?>
 (<?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency'];?>
)
                        <?php } else { ?>
                        <?php echo __("Free");?>

                        <?php }?>
                    </div>
                </div>
                <div class="post-product-details">
                    <div class="title">
                        <i class="fa fa-box fa-fw mr5" style="color: #a038b2;"></i><?php echo __("Status");?>

                    </div>
                    <div class="description">
                        <?php if ($_smarty_tpl->tpl_vars['_post']->value['product']['available']) {?>
                        <?php echo __("In stock");?>

                        <?php } else { ?>
                        <?php echo __("SOLD");?>

                        <?php }?>
                    </div>
                </div>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['_post']->value['author_id'] != $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
            <div class="mt10 clearfix">
                <button type="button" class="btn  btn-primary float-right js_chat_start"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_post']->value['author_id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['_post']->value['post_author_name'];?>
">
                    <i class="fa fa-comments mr5"></i><?php echo __("Contact Seller");?>

                </button>
            </div>
            <?php }?>
        </div>
        <?php }?>
        <!-- product --><?php }
}
