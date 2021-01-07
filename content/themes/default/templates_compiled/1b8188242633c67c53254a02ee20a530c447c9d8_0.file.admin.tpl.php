<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-04 09:11:37
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff2dbc9516c08_58772849',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b8188242633c67c53254a02ee20a530c447c9d8' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/admin.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:admin.".((string)$_smarty_tpl->tpl_vars[\'view\']->value).".tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_5ff2dbc9516c08_58772849 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php $_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="container mt20 offcanvas">
    <div class="row">
        <div class="offcanvas-sidebar sidebar-left-ant">
            <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
    <div class="row right-side-content-ant">

        <!-- left panel -->
        <div class="col-lg-3 left-offcanvas-sidebar-inner settingleftWrap">
            <div class="chat-conversations js_scroller" data-slimScroll-height="87vh">

                <!-- System -->
                <div class="card mb0">
                    <!-- <div class="card-header block-title">
                    <?php echo __("System");?>

                </div> -->
                    <div class="card-body with-nav side_manu_icon">
                        <ul class="side-nav">
                            <!-- Dashboard -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "dashboard") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
">
                                    <i class="fa fa-tachometer-alt fa-fw mr10" style="color: #3F51B5"></i><?php echo __("Dashboard");?>

                                </a>
                            </li>
                            <!-- Dashboard -->

                            <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                            <!-- Settings -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings") {?>class="active" <?php }?>>
                                <a href="#settings" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-cog fa-fw mr10" style="color: #3F51B5"></i>
                                    <!-- <div class="side_manu_img ">
                                        <img style="height: 20px;width: 20px;" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Cog.svg" class="blackicon">
                                    </div> -->
                                    <?php echo __("Settings");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings") {?>show<?php }?>' id="settings">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings">
                                                <i class="fa fa-cogs fa-fw mr10"></i><?php echo __("System Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "posts") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/posts">
                                                <i class="fa fa-comment-alt fa-fw mr10"></i><?php echo __("Posts Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "registration") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/registration">
                                                <i class="fa fa-sign-in-alt fa-fw mr10"></i><?php echo __("Registration Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "email") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/email">
                                                <i class="fa fa-envelope-open fa-fw mr10"></i><?php echo __("Email Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "sms") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/sms">
                                                <i class="fa fa-mobile fa-fw mr10"></i><?php echo __("SMS Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "notifications") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/notifications">
                                                <i class="fa fa-bell fa-fw mr10"></i><?php echo __("Notifications Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "chat") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/chat">
                                                <i class="fa fa-comments fa-fw mr10"></i><?php echo __("Chat Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "live") {?>class="active"<?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/live">
                                                <i class="fa fa-signal fa-fw mr10"></i><?php echo __("Live Stream Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "uploads") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/uploads">
                                                <i class="fa fa-upload fa-fw mr10"></i><?php echo __("Uploads Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "security") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/security">
                                                <i class="fa fa-shield-alt fa-fw mr10"></i><?php echo __("Security Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/payments">
                                                <i class="fa fa-credit-card fa-fw mr10"></i><?php echo __("Payments Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "limits") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/limits">
                                                <i class="fa fa-tachometer-alt fa-fw mr10"></i><?php echo __("Limits Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings" && $_smarty_tpl->tpl_vars['sub_view']->value == "analytics") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/analytics">
                                                <i class="fa fa-chart-pie fa-fw mr10"></i><?php echo __("Analytics Settings");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Settings -->

                            <!-- Themes -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "themes") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/themes">
                                    <i class="fa fa-desktop fa-fw mr10" style="color: #3F51B5"></i><?php echo __("Themes");?>

                                </a>
                            </li>
                            <!-- Themes -->

                            <!-- Design -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "design") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/design">
                                    <i class="fa fa-paint-brush fa-fw mr10" style="color: #3F51B5"></i><?php echo __("Design");?>

                                </a>
                            </li>
                            <!-- Design -->

                            <!-- Languages -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "languages") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/languages">
                                    <i class="fa fa-language fa-fw mr10" style="color: #3F51B5"></i><?php echo __("Languages");?>

                                </a>
                            </li>
                            <!-- Languages -->

                            <!-- Currencies -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "currencies") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/currencies">
                                    <i class="fa fa-money-bill-alt fa-fw mr10" style="color: #3F51B5"></i><?php echo __("Currencies");?>

                                </a>
                            </li>
                            <!-- Currencies -->
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <!-- System -->

                <!-- Modules -->
                <div class="card mb0">
                    <!-- <div class="card-header block-title">
                    <?php echo __("Modules");?>

                </div> -->
                    <div class="card-body with-nav">
                        <ul class="side-nav">

                            <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                            <!-- Users -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users") {?>class="active" <?php }?>>
                                <a href="#users" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "users") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-user fa-fw mr10" style="color: #F44336"></i><?php echo __("Users");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "users") {?>show<?php }?>' id="users">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users">
                                                <?php echo __("List Users");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == "admins") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/admins">
                                                <?php echo __("List Admins");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == "moderators") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/moderators">
                                                <?php echo __("List Moderators");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == "online") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/online">
                                                <?php echo __("List Online");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "users" && $_smarty_tpl->tpl_vars['sub_view']->value == "banned") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/banned">
                                                <?php echo __("List Banned");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Users -->
                            <?php }?>

                            <!-- Posts -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "posts") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/posts">
                                    <i class="fa fa-newspaper fa-fw mr10" style="color: #F44336"></i><?php echo __("Posts");?>

                                </a>
                            </li>
                            <!-- Posts -->

                            <!-- Pages -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pages") {?>class="active" <?php }?>>
                                <a href="#pages" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "pages") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-flag fa-fw mr10" style="color: #F44336"></i><?php echo __("Pages");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "pages") {?>show<?php }?>' id="pages">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pages" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/pages">
                                                <?php echo __("List Pages");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "pages" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/pages/categories">
                                                <?php echo __("List Categories");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Pages -->

                            <!-- Groups -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>class="active" <?php }?>>
                                <a href="#groups" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-users fa-fw mr10" style="color: #F44336"></i><?php echo __("Groups");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>show<?php }?>' id="groups">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/groups">
                                                <?php echo __("List Groups");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/groups/categories">
                                                <?php echo __("List Categories");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Groups -->

                            <!-- Events -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "events") {?>class="active" <?php }?>>
                                <a href="#events" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "events") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-calendar fa-fw mr10" style="color: #F44336"></i><?php echo __("Events");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "events") {?>show<?php }?>' id="events">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "events" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events">
                                                <?php echo __("List Events");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "events" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events/categories">
                                                <?php echo __("List Categories");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Events -->

                            <!-- Blogs -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs") {?>class="active" <?php }?>>
                                <a href="#blogs" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs") {?>aria-expanded="true" <?php }?>>
                                    <i class="fab fa-blogger-b fa-fw mr10" style="color: #F44336"></i><?php echo __("Blogs");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs") {?>show<?php }?>' id="blogs">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blogs">
                                                <?php echo __("List Articles");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blogs/categories">
                                                <?php echo __("List Categories");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Blogs -->

                            <!-- Market -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "market") {?>class="active" <?php }?>>
                                <a href="#market" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "market") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-shopping-bag fa-fw mr10" style="color: #F44336"></i><?php echo __("Marketplace");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "market") {?>show<?php }?>' id="market">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "market" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/market/categories">
                                                <?php echo __("List Categories");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Market -->

                            <!-- Forums -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums") {?>class="active" <?php }?>>
                                <a href="#forums" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-comments fa-fw mr10" style="color: #F44336"></i><?php echo __("Forums");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums") {?>show<?php }?>' id="forums">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums">
                                                <?php echo __("List Forums");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums" && $_smarty_tpl->tpl_vars['sub_view']->value == "threads") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums/threads">
                                                <?php echo __("List Threads");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "forums" && $_smarty_tpl->tpl_vars['sub_view']->value == "replies") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/forums/replies">
                                                <?php echo __("List Replies");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Forums -->

                            <!-- Movies -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "movies") {?>class="active" <?php }?>>
                                <a href="#movies" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "movies") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-film fa-fw mr10" style="color: #F44336"></i><?php echo __("Movies");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "movies") {?>show<?php }?>' id="movies">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "movies" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/movies">
                                                <?php echo __("List Movies");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "movies" && $_smarty_tpl->tpl_vars['sub_view']->value == "genres") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/movies/genres">
                                                <?php echo __("List Genres");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Movies -->

                            <!-- Games -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "games") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/games">
                                    <i class="fa fa-gamepad fa-fw mr10" style="color: #F44336"></i><?php echo __("Games");?>

                                </a>
                            </li>
                            <!-- Games -->

                        </ul>
                    </div>
                </div>
                <!-- Modules -->

                <!-- Money -->
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                <div class="card mb0">
                    <!-- <div class="card-header block-title">
                        <?php echo __("Money");?>

                    </div> -->
                    <div class="card-body with-nav">
                        <ul class="side-nav">

                            <!-- Ads -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads") {?>class="active" <?php }?>>
                                <a href="#ads" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-dollar-sign fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Ads");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads") {?>show<?php }?>' id="ads">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/ads">
                                                <?php echo __("Ads Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads" && $_smarty_tpl->tpl_vars['sub_view']->value == "system_ads") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/ads/system_ads">
                                                <?php echo __("List System Ads");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "ads" && $_smarty_tpl->tpl_vars['sub_view']->value == "users_ads") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/ads/users_ads">
                                                <?php echo __("List Users Ads");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Ads -->

                            <!-- Wallet -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "wallet") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/wallet">
                                    <i class="fa fa-wallet fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Wallet");?>

                                </a>
                            </li>
                            <!-- Wallet -->

                            <!-- Packages -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "packages") {?>class="active" <?php }?>>
                                <a href="#packages" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "packages") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-cubes fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Pro Packages");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "packages") {?>show<?php }?>' id="packages">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "packages" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/packages">
                                                <?php echo __("List Packages");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "packages" && $_smarty_tpl->tpl_vars['sub_view']->value == "subscribers") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/packages/subscribers">
                                                <?php echo __("List Subscribers");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "packages" && $_smarty_tpl->tpl_vars['sub_view']->value == "earnings") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/packages/earnings">
                                                <?php echo __("Earnings");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Packages -->

                            <!-- CoinPayments -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "coinpayments") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/coinpayments">
                                    <i class="fab fa-bitcoin fa-fw mr10" style="color: #4CAF50"></i><?php echo __("CoinPayments");?>

                                </a>
                            </li>
                            <!-- CoinPayments -->

                            <!-- Bank Receipts -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "bank") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/bank">
                                    <?php if ($_smarty_tpl->tpl_vars['bank_transfers_insights']->value) {?><span
                                        class="float-right badge badge-pill badge-danger"><?php echo $_smarty_tpl->tpl_vars['bank_transfers_insights']->value;?>
</span><?php }?>
                                    <i class="fa fa-university fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Bank
                                    Receipts");?>

                                </a>
                            </li>
                            <!-- Bank Receipts -->

                            <!-- Affiliates -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>class="active" <?php }?>>
                                <a href="#affiliates" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-exchange-alt fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Affiliates");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>show<?php }?>' id="affiliates">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/affiliates">
                                                <?php echo __("Affiliates Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/affiliates/payments">
                                                <?php if ($_smarty_tpl->tpl_vars['affiliates_payments_insights']->value) {?><span
                                                    class="float-right badge badge-pill badge-danger"><?php echo $_smarty_tpl->tpl_vars['affiliates_payments_insights']->value;?>
</span><?php }?>
                                                <?php echo __("Payment Requests");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Affiliates -->

                            <!-- Points -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>class="active" <?php }?>>
                                <a href="#points" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-piggy-bank fa-fw mr10" style="color: #4CAF50"></i><?php echo __("Points System");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>show<?php }?>' id="points">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/points">
                                                <?php echo __("Points Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/points/payments">
                                                <?php if ($_smarty_tpl->tpl_vars['points_payments_insights']->value) {?><span
                                                    class="float-right badge badge-pill badge-danger"><?php echo $_smarty_tpl->tpl_vars['points_payments_insights']->value;?>
</span><?php }?>
                                                <?php echo __("Payment Requests");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Points -->

                        </ul>
                    </div>
                </div>
                <?php }?>
                <!-- Money -->

                <!-- Developers -->
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                <div class="card mb0">
                    <!-- <div class="card-header block-title">
                        <?php echo __("Developers");?>

                    </div> -->
                    <div class="card-body with-nav">
                        <ul class="side-nav">

                            <!-- Developers -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers") {?>class="active" <?php }?>>
                                <a href="#developers" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-cubes fa-fw mr10" style="color: #ffc107"></i><?php echo __("Developers");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers") {?>show<?php }?>' id="developers">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/developers">
                                                <?php echo __("Developers Settings");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers" && $_smarty_tpl->tpl_vars['sub_view']->value == "apps") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/developers/apps">
                                                <?php echo __("List Apps");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "developers" && $_smarty_tpl->tpl_vars['sub_view']->value == "categories") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/developers/categories">
                                                <?php echo __("List Categories");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Developers -->

                        </ul>
                    </div>
                </div>
                <?php }?>
                <!-- Developers -->

                <!-- Tools -->
                <div class="card mb0">
                    <!-- <div class="card-header block-title">
                    <?php echo __("Tools");?>

                </div> -->
                    <div class="card-body with-nav">
                        <ul class="side-nav">

                            <!-- Reports -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "reports") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/reports">
                                    <?php if ($_smarty_tpl->tpl_vars['reports_insights']->value) {?><span
                                        class="float-right badge badge-pill badge-danger"><?php echo $_smarty_tpl->tpl_vars['reports_insights']->value;?>
</span><?php }?>
                                    <i class="fa fa-exclamation-triangle fa-fw mr10"
                                        style="color: #03A9F4"></i><?php echo __("Reports");?>

                                </a>
                            </li>
                            <!-- Reports -->

                            <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                            <!-- Blacklist -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blacklist") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blacklist">
                                    <i class="fa fa-minus-circle fa-fw mr10" style="color: #03A9F4"></i><?php echo __("Blacklist");?>

                                </a>
                            </li>
                            <!-- Blacklist -->
                            <?php }?>

                            <!-- Verification -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification") {?>class="active" <?php }?>>
                                <a href="#verification" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-check-circle fa-fw mr10" style="color: #03A9F4"></i><?php echo __("Verification");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification") {?>show<?php }?>' id="verification">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/verification">
                                                <?php if ($_smarty_tpl->tpl_vars['verification_requests_insights']->value) {?><span
                                                    class="float-right badge badge-pill badge-danger"><?php echo $_smarty_tpl->tpl_vars['verification_requests_insights']->value;?>
</span><?php }?>
                                                <?php echo __("List Requests");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification" && $_smarty_tpl->tpl_vars['sub_view']->value == "users") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/verification/users">
                                                <?php echo __("List Verified Users");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification" && $_smarty_tpl->tpl_vars['sub_view']->value == "pages") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/verification/pages">
                                                <?php echo __("List Verified Pages");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Verification -->

                            <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                            <!-- Tools -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools") {?>class="active" <?php }?>>
                                <a href="#tools" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools") {?>aria-expanded="true" <?php }?>>
                                    <i class="fa fa-toolbox fa-fw mr10" style="color: #03A9F4"></i><?php echo __("Tools");?>

                                </a>
                                <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools") {?>show<?php }?>' id="tools">
                                    <ul>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools" && $_smarty_tpl->tpl_vars['sub_view']->value == "faker") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/tools/faker">
                                                <?php echo __("Fake Users Generator");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools" && $_smarty_tpl->tpl_vars['sub_view']->value == "auto-connect") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/tools/auto-connect">
                                                <?php echo __("Auto Connect");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools" && $_smarty_tpl->tpl_vars['sub_view']->value == "garbage-collector") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/tools/garbage-collector">
                                                <?php echo __("Garbage Collector");?>

                                            </a>
                                        </li>
                                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "tools" && $_smarty_tpl->tpl_vars['sub_view']->value == "backups") {?>class="active" <?php }?>>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/tools/backups">
                                                <?php echo __("Backup Database & Files");?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Tools -->
                            <?php }?>

                        </ul>
                    </div>
                </div>
                <!-- Tools -->

                <!-- Customization -->
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                <div class="card mb0">
                    <!-- <div class="card-header block-title">
                        <?php echo __("Customization");?>

                    </div> -->
                    <div class="card-body with-nav">
                        <ul class="side-nav">

                            <!-- Custom Fields -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "custom_fields") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/custom_fields">
                                    <i class="fa fa-bars fa-fw mr10" style="color: #FF5722"></i><?php echo __("Custom Fields");?>

                                </a>
                            </li>
                            <!-- Custom Fields -->

                            <!-- Static Pages -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "static") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/static">
                                    <i class="fa fa-file fa-fw mr10" style="color: #FF5722"></i><?php echo __("Static Pages");?>

                                </a>
                            </li>
                            <!-- Static Pages -->

                            <!-- Colored Posts -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "colored_posts") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/colored_posts">
                                    <i class="fa fa-palette fa-fw mr10" style="color: #FF5722"></i><?php echo __("Colored Posts");?>

                                </a>
                            </li>
                            <!-- Colored Posts -->

                            <!-- Widgets -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "widgets") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/widgets">
                                    <i class="fa fa-puzzle-piece fa-fw mr10" style="color: #FF5722"></i><?php echo __("Widgets");?>

                                </a>
                            </li>
                            <!-- Widgets -->

                            <!-- Emojis -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "emojis") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/emojis">
                                    <i class="fa fa-smile fa-fw mr10" style="color: #FF5722"></i><?php echo __("Emojis");?>

                                </a>
                            </li>
                            <!-- Emojis -->

                            <!-- Stickers -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "stickers") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/stickers">
                                    <i class="fa fa-hand-peace fa-fw mr10" style="color: #FF5722"></i><?php echo __("Stickers");?>

                                </a>
                            </li>
                            <!-- Stickers -->

                            <!-- Gifts -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "gifts") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/gifts">
                                    <i class="fa fa-gift fa-fw mr10" style="color: #FF5722"></i><?php echo __("Gifts");?>

                                </a>
                            </li>
                            <!-- Gifts -->

                        </ul>
                    </div>
                </div>
                <?php }?>
                <!-- Customization -->

                <!-- Reach -->
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                <div class="card mb0">
                    <!-- <div class="card-header block-title">
                        <?php echo __("Reach");?>

                    </div> -->
                    <div class="card-body with-nav">
                        <ul class="side-nav">

                            <!-- Announcements -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "announcements") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/announcements">
                                    <i class="fa fa-bullhorn fa-fw mr10" style="color: #009688"></i><?php echo __("Announcements");?>

                                </a>
                            </li>
                            <!-- Announcements -->

                            <!-- Notifications -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "notifications") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/notifications">
                                    <i class="fa fa-bell fa-fw mr10" style="color: #009688"></i><?php echo __("Mass Notifications");?>

                                </a>
                            </li>
                            <!-- Notifications -->

                            <!-- Newsletter -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "newsletter") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/newsletter">
                                    <i class="fa fa-paper-plane fa-fw mr10" style="color: #009688"></i><?php echo __("Newsletter");?>

                                </a>
                            </li>
                            <!-- Newsletter -->

                        </ul>
                    </div>
                </div>
                <?php }?>
                <!-- Reach -->

                <!-- Stratus -->
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                <div class="card">
                    <!-- <div class="card-header block-title">
                        <?php echo __("Stratus");?>

                    </div> -->
                    <div class="card-body with-nav">
                        <ul class="side-nav">

                            <!-- Changelog -->
                            <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "changelog") {?>class="active" <?php }?>>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/changelog">
                                    <i class="fa fa-stopwatch fa-fw mr10" style="color: #795548"></i><?php echo __("Changelog");?>

                                </a>
                            </li>
                            <!-- Changelog -->

                            <!-- Build -->
                            <li>
                                <div class="static">
                                    <i class="fa fa-copyright fa-fw mr10" style="color: #795548"></i><?php echo __("Build");?>
 v<?php echo $_smarty_tpl->tpl_vars['system']->value['system_version'];?>

                                </div>
                            </li>
                            <!-- Build -->

                        </ul>
                    </div>
                </div>
                <?php }?>
                <!-- Stratus -->
            </div>
        </div>
        <!-- left panel -->

        <!-- right panel -->
        <div class="col-md-12 col-lg-9 offcanvas-mainbar">
            <?php $_smarty_tpl->_subTemplateRender("file:admin.".((string)$_smarty_tpl->tpl_vars['view']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        </div>
        <!-- right panel -->

    </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
