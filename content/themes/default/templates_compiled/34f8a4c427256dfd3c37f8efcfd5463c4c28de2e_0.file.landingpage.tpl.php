<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-07 10:03:28
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/landingpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff6dc709daa39_39087073',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34f8a4c427256dfd3c37f8efcfd5463c4c28de2e' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/landingpage.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sign_form.tpl' => 1,
    'file:_footer.links.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:_posts.tpl' => 7,
    'file:__feeds_page.tpl' => 1,
    'file:right-sidebar.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_5ff6dc709daa39_39087073 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/sngine/includes/libs/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>



<div class="mainloginBlock">
    <?php $_smarty_tpl->_subTemplateRender('file:_sign_form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:_footer.links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php } else { ?>

<div class="container mt20 offcanvas">
    <div class="row">

        <!-- side panel -->
        <div class="col-md-4 col-lg-3 offcanvas-sidebar js_sticky-sidebar">
            <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <!-- side panel -->

        <!-- content panel -->
        <div class="col-md-8 col-lg-9 offcanvas-mainbar">
            <div class="row">
                <!-- center panel -->
                <div class="home-page-middel-block">
                    <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>
                    <div class="post-section-new">

                        <?php if ($_smarty_tpl->tpl_vars['postsNew']->value) {?>
                        <ul class="feeds_post_ul" id="landing_feeds_post_ul">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['postsNew']->value, 'postsItem');
$_smarty_tpl->tpl_vars['postsItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['postsItem']->value) {
$_smarty_tpl->tpl_vars['postsItem']->do_else = false;
?>
                            <li class="feeds_post" data-id="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['post_id'];?>
" post-type="">
                                <div class="post" data-id="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['post_id'];?>
">
                                    <div class="post-body">
                                        <div class="post-header">
                                            <div class="post-avatar">
                                                <a class="post-avatar-picture global-post-avatar-picture"
                                                    href="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['post_author_url'];?>
"
                                                    style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['post_author_picture'];?>
);">
                                                </a> <?php if ($_smarty_tpl->tpl_vars['postsItem']->value['post_author_online']) {?><i
                                                    class="fa fa-circle online-dot"></i><?php }?>
                                            </div>
                                            <div class="post-meta">
                                                <span class="js_user-popover" data-type="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['user_type'];?>
"
                                                    data-uid="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['user_id'];?>
"> <a class="post-author"
                                                        href="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['post_author_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['postsItem']->value['post_author_name'];?>
</a>
                                                </span>
                                                <i data-toggle="tooltip" data-placement="top" title="Verified User"
                                                    class="fa fa-check-circle fa-fw verified-badge"></i>
                                                <!-- feeling action -->
                                                <!-- post feeling -->
                                                <?php if ($_smarty_tpl->tpl_vars['postsItem']->value['feeling_action']) {?>
                                                <span class="post-title">
                                                    <?php if ($_smarty_tpl->tpl_vars['postsItem']->value['post_type'] != '' && $_smarty_tpl->tpl_vars['postsItem']->value['post_type'] != "map") {?> & <?php }
echo __("is");?>
 <?php echo __($_smarty_tpl->tpl_vars['postsItem']->value["feeling_action"]);?>

                                                    <?php echo __($_smarty_tpl->tpl_vars['postsItem']->value["feeling_value"]);?>
 <i
                                                        class="twa twa-lg twa-<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['feeling_icon'];?>
"></i>
                                                </span>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['_get']->value != 'posts_group' && $_smarty_tpl->tpl_vars['postsItem']->value['in_group']) {?>
                                                <i class="fa fa-caret-right ml5 mr5"></i>
                                                <!--<i class="fa fa-users ml5 mr5"></i> -->
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/newgroupIcon1.svg"
                                                    class="ml5 mr5">
                                                <a
                                                    href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['group_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['postsItem']->value['group_title'];?>
</a>

                                                <?php } elseif ($_smarty_tpl->tpl_vars['_get']->value != 'posts_event' && $_smarty_tpl->tpl_vars['postsItem']->value['in_event']) {?>
                                                <i class="fa fa-caret-right ml5 mr5"></i><i
                                                    class="fa fa-calendar ml5 mr5"></i><a
                                                    href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['event_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['postsItem']->value['event_title'];?>
</a>

                                                <?php } elseif ($_smarty_tpl->tpl_vars['postsItem']->value['in_wall']) {?>
                                                <i class="fa fa-caret-right ml5 mr5"></i>
                                                <span class="js_user-popover" data-type="user"
                                                    data-uid="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['wall_id'];?>
">
                                                    <a
                                                        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['wall_username'];?>
"><?php echo $_smarty_tpl->tpl_vars['postsItem']->value['wall_fullname'];?>
</a>
                                                </span>
                                                <?php }?>
                                                <div class="post-time">
                                                    <!--<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['post_id'];?>
" class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['time'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['time'];?>
">a few seconds ago</a> -->
                                                    <a href="#" class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['time'];?>
"
                                                        title="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['time'];?>
" style="cursor:default;">a few
                                                        seconds ago</a>
                                                    <?php if (($_smarty_tpl->tpl_vars['postsItem']->value['post_hub'] == "LocalHub")) {?>
                                                    -

                                                    <?php if (!$_smarty_tpl->tpl_vars['postsItem']->value['is_anonymous'] && !$_smarty_tpl->tpl_vars['_shared']->value && $_smarty_tpl->tpl_vars['postsItem']->value['manage_post'] && $_smarty_tpl->tpl_vars['postsItem']->value['user_type'] == 'user' && !$_smarty_tpl->tpl_vars['postsItem']->value['in_group'] && !$_smarty_tpl->tpl_vars['postsItem']->value['in_event'] && $_smarty_tpl->tpl_vars['postsItem']->value['post_type'] != "product" && $_smarty_tpl->tpl_vars['postsItem']->value['post_type'] != "article") {?>
                                                    <!-- privacy -->
                                                    <?php if ($_smarty_tpl->tpl_vars['postsItem']->value['privacy'] == "me") {?>
                                                    <div class="btn-group" data-toggle="tooltip" data-placement="top"
                                                        data-value="me" title='<?php echo __("Shared with: Only Me");?>
'>
                                                        <button type="button" class="btn dropdown-toggle"
                                                            data-toggle="dropdown" data-display="static">
                                                            <span class="share_sign_img">
                                                                <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Hide_form.svg"
                                                                    class="blackicon">
                                                            </span>
                                                        </button>
                                                        <?php } elseif ($_smarty_tpl->tpl_vars['postsItem']->value['privacy'] == "friends") {?>
                                                        <div class="btn-group" data-toggle="tooltip"
                                                            data-placement="top" data-value="friends"
                                                            title='<?php echo __("Shared with: Friends");?>
'>
                                                            <button type="button" class="btn dropdown-toggle"
                                                                data-toggle="dropdown" data-display="static">
                                                                <span class="share_sign_img">
                                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/friendsIcon.svg"
                                                                        class="blackicon">
                                                                </span>
                                                            </button>
                                                            <?php } elseif ($_smarty_tpl->tpl_vars['postsItem']->value['privacy'] == "public") {?>
                                                            <div class="btn-group" data-toggle="tooltip"
                                                                data-placement="top" data-value="public"
                                                                title='<?php echo __("Shared with:Public");?>
'>
                                                                <button type="button" class="btn dropdown-toggle"
                                                                    data-toggle="dropdown" data-display="static">
                                                                    <span class="share_sign_img">
                                                                        <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
                                                                            class="blackicon">
                                                                    </span>
                                                                </button>
                                                                <?php }?>
                                                                <!-- <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo __("Shared with:Public");?>
' data-value="public">
                                <i class="fa fa-globe"></i> <?php echo __("Public");?>

                            </div>
                            <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo __("Shared with:Friends");?>
' data-value="friends">
                                <i class="fa fa-users"></i> <?php echo __("Friends");?>

                            </div>
                            <div class="dropdown-item pointer js_edit-privacy" data-title='<?php echo __("Shared with:Only Me");?>
' data-value="me">
                                <i class="fa fa-lock"></i> <?php echo __("Only Me");?>

                            </div>
                        </div> -->

                                                                <div
                                                                    class="dropdown-menu dropdown-menu-right _postshare__">
                                                                    <div class="dropdown-item pointer js_edit-privacy"
                                                                        data-title='<?php echo __("Shared with: Public");?>
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
                                                                    <div class="dropdown-item pointer js_edit-privacy"
                                                                        data-title='<?php echo __("Shared with: Friends");?>
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
                                                                    <div class="dropdown-item pointer js_edit-privacy"
                                                                        data-title='<?php echo __("Shared with: Only Me");?>
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
                                                            <?php if ($_smarty_tpl->tpl_vars['postsItem']->value['privacy'] == "me") {?>
                                                            <i class="fa fa-lock" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title='<?php echo __("Shared with");?>
 <?php echo __("Only Me");?>
'></i>
                                                            <?php } elseif ($_smarty_tpl->tpl_vars['postsItem']->value['privacy'] == "friends") {?>
                                                            <i class="fa fa-users" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title='<?php echo __("Shared with");?>
 <?php echo __("Friends");?>
'></i>
                                                            <?php } elseif ($_smarty_tpl->tpl_vars['postsItem']->value['privacy'] == "public") {?>
                                                            <i class="fa fa-globe" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title='<?php echo __("Shared with");?>
 <?php echo __("Public");?>
'></i>
                                                            <?php } elseif ($_smarty_tpl->tpl_vars['postsItem']->value['privacy'] == "custom") {?>
                                                            <i class="fa fa-cog" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title='<?php echo __("Shared with");?>
 <?php echo __("Custom People");?>
'></i>
                                                            <?php }?>
                                                            <?php }
}?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-replace">
                                                    <div class="post-text js_readmore" dir="auto"
                                                        style="max-height:none;">
                                                    </div>
                                                    <div class="post-text-translation x-hidden" dir="auto"></div>
                                                    <?php if ($_smarty_tpl->tpl_vars['postsItem']->value['colored_pattern']) {?>
                                                    <div class="post-colored" <?php if ($_smarty_tpl->tpl_vars['postsItem']->value['colored_pattern']['type'] == "color") {?>
                                                        style="background-image:linear-gradient(45deg, <?php echo $_smarty_tpl->tpl_vars['postsItem']->value['colored_pattern']['background_color_1'];?>
, <?php echo $_smarty_tpl->tpl_vars['postsItem']->value['colored_pattern']['background_color_2'];?>
);"
                                                        <?php } else { ?>
                                                        style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['colored_pattern']['background_image'];?>
)"
                                                        <?php }?>>
                                                        <div class="post-colored-text-wrapper js_scroller"
                                                            data-slimScroll-height="240">
                                                            <div class="post-text" dir="auto"
                                                                style="color:<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['colored_pattern']['text_color'];?>
;">
                                                                <?php echo $_smarty_tpl->tpl_vars['postsItem']->value['text'];?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } elseif ($_smarty_tpl->tpl_vars['postsItem']->value['post_type'] == "article" && $_smarty_tpl->tpl_vars['postsItem']->value['article']) {?>
                                                    <div class="mt10">
                                                        <div class="post-media">
                                                            <?php if ($_smarty_tpl->tpl_vars['postsItem']->value['article']['cover']) {?>
                                                            <a class="post-media-image"
                                                                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['_post']->value['article']['title_url'];?>
">
                                                                <div
                                                                    style="padding-top:50%; background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['article']['cover'];?>
');">
                                                                </div>
                                                            </a>
                                                            <?php }?>
                                                            <div class="post-media-meta">
                                                                <a class="title mb5"
                                                                    href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['article']['title_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['postsItem']->value['article']['title'];?>
</a>
                                                                <div class="text mb5">
                                                                    <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['postsItem']->value['article']['text_snippet'],400);?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="post-text js_readmore" dir="auto"><?php echo $_smarty_tpl->tpl_vars['postsItem']->value['text'];?>

                                                    </div>
                                                    <?php }?>


                                                    <?php if ($_smarty_tpl->tpl_vars['postsItem']->value['photos_num'] > 0) {?>
                                                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/photos/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['photos'][0]['photo_id'];?>
"
                                                        class="js_lightbox"
                                                        data-id="<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['photos'][0]['photo_id'];?>
"
                                                        data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['photos'][0]['source'];?>
"
                                                        data-context="<?php if ($_smarty_tpl->tpl_vars['postsItem']->value['post_type'] == 'product') {?>post<?php } else { ?>album<?php }?>">
                                                        <div class="image"><img
                                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['photos'][0]['source'];?>
">
                                                        </div>
                                                    </a>
                                                    <?php }?>
                                                    <?php if ($_smarty_tpl->tpl_vars['postsItem']->value['origin']['photos_num'] > 0) {?>
                                                    <div class="image"><img
                                                            src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['origin']['photos'][0]['source'];?>
">
                                                    </div>
                                                    <?php }?>
                                                    <?php if ($_smarty_tpl->tpl_vars['postsItem']->value['post_type'] == "video") {?>
                                                    <div class="video">

                                                        <video width="100%" height="315" controls>
                                                            <source
                                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['postsItem']->value['video']['source'];?>
">

                                                        </video>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                            </li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </ul>

                        <?php } else { ?>
                        <div class="text-center text-muted no-post-to-show no_data_img_ __no_data_contet__">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/no_results3.png"
                                width="100%">
                            <p class="mb10"><strong>No Record Found</strong></p>
                        </div>
                        <!--- <li class="<?php echo $_smarty_tpl->tpl_vars['postsNew']->value['post_id'];?>
 no_data_img_"><img width="100%"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results3.png"><p>No Record Found</p></li> --->
                        <?php }?>

                    </div>

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "popular") {?>
                    <!-- popular posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"popular",'_title'=>__("Popular Posts")), 0, false);
?>
                    <!-- popular posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "discover") {?>
                    <!-- discover posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"discover",'_title'=>__("Discover Posts")), 0, true);
?>
                    <!-- discover posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "saved") {?>
                    <!-- saved posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"saved",'_title'=>__("Saved Posts")), 0, true);
?>
                    <!-- saved posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "memories") {?>
                    <!-- page header -->
                    <div class="page-header mini rounded-top mb10">
                        <div class="crystal c03"></div>
                        <div class="circle-1"></div>
                        <div class="circle-2"></div>
                        <div class="inner">
                            <h2><?php echo __("Memories");?>
</h2>
                            <p><?php echo __("Enjoy looking back on your memories");?>
</p>
                        </div>
                    </div>
                    <!-- page header -->

                    <!-- memories posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"memories",'_title'=>__("ON THIS DAY"),'_filter'=>"all"), 0, true);
?>
                    <!-- memories posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "articles") {?>
                    <!-- articles posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"posts_profile",'_id'=>$_smarty_tpl->tpl_vars['user']->value->_data['user_id'],'_filter'=>"article",'_title'=>__("My Articles")), 0, true);
?>
                    <!-- articles posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "products") {?>
                    <!-- products posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"posts_profile",'_id'=>$_smarty_tpl->tpl_vars['user']->value->_data['user_id'],'_filter'=>"product",'_title'=>__("My Products")), 0, true);
?>
                    <!-- products posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "boosted_posts") {?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin || $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
                    <!-- boosted posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"boosted",'_title'=>__("My Boosted Posts")), 0, true);
?>
                    <!-- boosted posts -->
                    <?php } else { ?>
                    <!-- upgrade -->
                    <div class="alert alert-warning">
                        <div class="icon">
                            <i class="fa fa-id-card fa-2x"></i>
                        </div>
                        <div class="text">
                            <strong><?php echo __("Membership");?>
</strong><br>
                            <?php echo __("Choose the Plan That's Right for You");?>
, <?php echo __("Check the package from");?>
 <a
                                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages"><?php echo __("Here");?>
</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="btn btn-primary"><i
                                class="fa fa-rocket mr5"></i><?php echo __("Upgrade to Pro");?>
</a>
                    </div>
                    <!-- upgrade -->
                    <?php }?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "boosted_pages") {?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin || $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
                    <div class="card">
                        <div class="card-header">
                            <strong><?php echo __("My Boosted Pages");?>
</strong>
                        </div>
                        <div class="card-body">
                            <?php if ($_smarty_tpl->tpl_vars['boosted_pages']->value) {?>
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['boosted_pages']->value, '_page');
$_smarty_tpl->tpl_vars['_page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
$_smarty_tpl->tpl_vars['_page']->do_else = false;
?>
                                <?php $_smarty_tpl->_subTemplateRender('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list"), 0, true);
?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>

                            <?php if (count($_smarty_tpl->tpl_vars['boosted_pages']->value) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
                            <!-- see-more -->
                            <div class="alert alert-info see-more js_see-more" data-get="boosted_pages">
                                <span><?php echo __("Load More");?>
</span>
                                <div class="loader loader_small x-hidden"></div>
                            </div>
                            <!-- see-more -->
                            <?php }?>
                            <?php } else { ?>
                            <p class="text-center text-muted mt10 no_dataimg_">
                                <img width="100%"
                                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results13.png">
                            <p> <?php echo __("No pages to show");?>
</p>
                            </p>
                            <?php }?>
                        </div>
                    </div>
                    <?php } else { ?>
                    <!-- upgrade -->
                    <div class="alert alert-warning">
                        <div class="icon">
                            <i class="fa fa-id-card fa-2x"></i>
                        </div>
                        <div class="text">
                            <strong><?php echo __("Membership");?>
</strong><br>
                            <?php echo __("Choose the Plan That's Right for You");?>
, <?php echo __("Check the package from");?>
 <a
                                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages"><?php echo __("Here");?>
</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="btn btn-primary"><i
                                class="fa fa-rocket mr5"></i><?php echo __("Upgrade to Pro");?>
</a>
                    </div>
                    <!-- upgrade -->
                    <?php }?>

                    <?php }?>
                </div>
                <!-- center panel -->
                <!-- right panel -->
                <div class="right-sidebar js_sticky-sidebar">
                    <?php $_smarty_tpl->_subTemplateRender('file:right-sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>
                <!-- right panel -->
            </div>
        </div>
        <!-- content panel -->

    </div>
</div>

<?php }?>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
