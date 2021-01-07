<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-30 11:45:24
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fec6854e48e02_55956069',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3273f0e5972bc7e4be7e6968038b8c1a96e1b86' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_sidebar.tpl',
      1 => 1609326510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 2,
  ),
),false)) {
function content_5fec6854e48e02_55956069 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('last_dir', explode("/",$_SERVER['REQUEST_URI']));
$_smarty_tpl->_assignInScope('last_key', count($_smarty_tpl->tpl_vars['last_dir']->value));
$_smarty_tpl->_assignInScope('first_var', $_smarty_tpl->tpl_vars['last_dir']->value[$_smarty_tpl->tpl_vars['last_key']->value-1]);
$_smarty_tpl->_assignInScope('final_dir', $_smarty_tpl->tpl_vars['last_dir']->value[$_smarty_tpl->tpl_vars['last_key']->value-2]);?>
<div class="card main-side-nav-card">
    <div class="card-body with-nav">
        <div class="chat-conversations js_scroller left_sidebar_" data-slimScroll-height="87vh">
            <ul
                class="main-side-nav main-left-side-nav left-sidebar-<?php if (($_smarty_tpl->tpl_vars['page']->value == 'global-profile/landingpage')) {?>second-ul active <?php } else { ?>first-ul<?php }?>">
                <li <?php if (($_smarty_tpl->tpl_vars['page']->value == 'global-profile/landingpage')) {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/landingpage.php" class="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/favoritesN.svg"
                                class="">
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_favourite.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_favourits_active.svg"
                                class="whiteicon"> -->
                        </div>
                        <span class="nav-text"><?php echo __("Latest Posts");?>
</span>
                    </a>
                </li>
            </ul>

            <!-- local hub sub menu starts -->
            <ul
                class="main-side-nav main-left-side-nav left-sidebar-<?php if (($_smarty_tpl->tpl_vars['active_page']->value == 'LocalHub')) {?>second-ul active <?php } else { ?>first-ul<?php }?>">
                <li <?php if ($_smarty_tpl->tpl_vars['active_page']->value == 'LocalHub') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/local_hubN.svg"
                                class="">
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_localhub.svg" class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_localhub_active.svg"
                                class="whiteicon"> -->
                        </div>
                        <span class="nav-text">Circle</span>
                    </a>

                </li>

                <?php if (($_smarty_tpl->tpl_vars['active_page']->value == 'LocalHub')) {?>
                <li <?php if ($_smarty_tpl->tpl_vars['subactive_page']->value == "profile") {?>class="active" <?php }?>>
                    <a page="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/profile_iconN.svg"
                                class="">
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_friends.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_friends-active.svg"
                                class="whiteicon"> -->
                        </div>
                        <span class="nav-text">Profile</span>
                    </a>
                </li>
                <li <?php if ($_smarty_tpl->tpl_vars['subactive_page']->value == "friends") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/friend_requests">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/friend_iconN.svg"
                                class="">
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/friendsIcon.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/friendsIconHover.svg"
                                class="whiteicon"> -->
                        </div><span class="nav-text">Friends</span>
                        <span
                            class="counter friendsCount blue <?php if (count($_smarty_tpl->tpl_vars['user']->value->_data['all_friends']) == 0) {?>x-hidden<?php }?>">
                            <?php echo count($_smarty_tpl->tpl_vars['user']->value->_data['all_friends']);?>

                        </span>
                    </a>
                </li>
                <li <?php if ($_smarty_tpl->tpl_vars['subactive_page']->value == "messages") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/messages" class="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/messages_iconN.svg"
                                class="">
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_messages.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_messages_hover.svg"
                                class="whiteicon"> -->
                        </div>
                        <!--  con="chat"  -->
                        <span class="nav-text"><?php echo __("Messages");?>
</span>
                    </a>
                </li>

                <li <?php if ($_smarty_tpl->tpl_vars['subactive_page']->value == "settings") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/setting_iconN.svg"
                                class="">
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_settings.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_settings_hover.svg"
                                class="whiteicon"> -->
                        </div>
                        <span class="nav-text"><?php echo __("Settings");?>
</span>
                    </a>
                </li>

                <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                <li class="<?php if (($_smarty_tpl->tpl_vars['page']->value == 'admin')) {?>active<?php }?>">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/admincp">
                        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"dashboard",'class'=>'','width'=>"24px",'height'=>"24px"), 0, false);
?>
                        <span class="nav-text"><?php echo __("Admin Panel");?>
</span>
                    </a>
                </li>
                <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->_is_moderator) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/modcp">
                        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"dashboard",'class'=>'','width'=>"24px",'height'=>"24px"), 0, true);
?>
                        <span class="nav-text">__("Moderator Panel")}</span>
                    </a>
                </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['system']->value['memories_enabled']) {?>
                <li <?php if ($_smarty_tpl->tpl_vars['subactive_page']->value == "memories") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/memories">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/memories_iconN.svg"
                                class="">
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_memories.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_memories_hover.svg"
                                class="whiteicon"> -->
                        </div>
                        <span class="nav-text"><?php echo __("Memories");?>
</span>
                    </a>
                </li>

                <?php }?>

                <li <?php if ($_smarty_tpl->tpl_vars['subactive_page']->value == "pages") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_adHub_active.svg"
                                class="">
                        </div>
                        <span class="nav-text"><?php echo __("Pages");?>
</span>
                    </a>
                </li>
                <li <?php if ($_smarty_tpl->tpl_vars['subactive_page']->value == "groups") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups">
                        <div class="svg-container">
                            <img style="width: 25px;"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/group_icon.svg"
                                class="">
                        </div>
                        <span class="nav-text"><?php echo __("Groups");?>
</span>
                    </a>
                </li>
                <li <?php if ($_smarty_tpl->tpl_vars['subactive_page']->value == "events") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/event_add_icon.svg"
                                class="">
                        </div>
                        <span class="nav-text"><?php echo __("Events");?>
</span>
                    </a>
                </li>

                <!-- explore Hub-->
                <li <?php if ($_smarty_tpl->tpl_vars['subactive_page']->value == "pages") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/explore_iconN.svg"
                                class="">
                        </div>
                        <span class="nav-text"><?php echo __("Explore Circle");?>
</span>
                    </a>
                </li>
                <!--Explore hub end-->
                <?php }?>
            </ul>
            <!--local hub sub menu end -->

            <!-- Global Hub starts -->

            <ul
                class="main-side-nav main-left-side-nav left-sidebar-<?php if (($_smarty_tpl->tpl_vars['active_page']->value == 'GlobalHub')) {?>second-ul active <?php } else { ?>first-ul<?php }?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                <li <?php if (($_smarty_tpl->tpl_vars['active_page']->value == 'GlobalHub')) {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile-timeline.php">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/globle_hubN.svg"
                                class="">
                        </div>
                        <span class="nav-text">Atrium</span>
                    </a>
                </li>
                <?php if (($_smarty_tpl->tpl_vars['active_page']->value == 'GlobalHub')) {?>
                <li <?php if (($_smarty_tpl->tpl_vars['subactive_page']->value == 'globalhub_profile')) {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/profile_iconN.svg"
                                class="">
                        </div>
                        <span class="nav-text">Profile</span>
                    </a>
                </li>
                <li <?php if (($_smarty_tpl->tpl_vars['subactive_page']->value == 'globalhub_followers')) {?>class="active" <?php }?>>
                    <!--<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/friend_requests">-->
                    <a
                        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
&view=followers">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/friend_iconN.svg"
                                class="">
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/friendsIcon.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/friendsIconHover.svg"
                                class="whiteicon"> -->
                        </div><span class="nav-text">Followers</span>
                        <span class="counter blue <?php if (count($_smarty_tpl->tpl_vars['user']->value->_data['followers']) == 0) {?>x-hidden<?php }?>">
                            <!-- <?php echo count($_smarty_tpl->tpl_vars['user']->value->_data['followers']);?>
 -->
                        </span>
                    </a>
                </li>
                <li <?php if (($_smarty_tpl->tpl_vars['subactive_page']->value == 'globalhub_messages')) {?>class="active" <?php }?>>
                    <!--<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/friend_requests">-->
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/globalMessages">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/messages_iconN.svg"
                                class="">
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_messages.svg"
                        class="blackicon">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_messages_hover.svg"class="whiteicon"> -->
                        </div>
                        <span class="nav-text">Messages</span>
                    </a>
                </li>
                <li <?php if (($_smarty_tpl->tpl_vars['subactive_page']->value == 'globalhub_bookmarks')) {?>class="active" <?php }?>>
                    <!--<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/friend_requests">-->
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile-bookmarks.php">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/bookmark_iconN.svg"
                                class="">
                        </div>
                        <span class="nav-text">Bookmarks</span>
                                            </a>
                </li>
                <li <?php if (($_smarty_tpl->tpl_vars['subactive_page']->value == 'explore')) {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global/explore">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/explore_iconN.svg"
                                class="">
                        </div><span class="nav-text">Explore Atrium</span>
                    </a>
                </li>
                <?php }?>
            </ul>
            <!-- sub of global end -->
            <!-- Global Hub End here -->


            <!-- Blog Hub starts-->

            <?php if ($_smarty_tpl->tpl_vars['system']->value['blogs_enabled']) {?>
            <ul
                class="main-side-nav main-left-side-nav left-sidebar-<?php if (($_smarty_tpl->tpl_vars['active_page']->value == 'BlogHub')) {?>second-ul active <?php } else { ?>first-ul<?php }?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                <!-- <ul class=" main-side-nav main-left-side-nav left-sidebar-four-ul"> -->
                <li <?php if ($_smarty_tpl->tpl_vars['active_page']->value == 'BlogHub') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/blog_hubN.svg"
                                class="">
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_blogHub.svg" class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_blogHub_active.svg" class="whiteicon"> -->
                        </div>
                        <span class="nav-text"> <?php echo __("Blog Hub");?>
</span>
                    </a>
                </li>
                <!-- </ul> -->
            </ul>
            <?php }?>
            <!-- Blog hub ends here -->

            <!-- Ads HUB Starts -->
            <ul class="main-side-nav main-left-side-nav left-sidebar-first-ul <?php if ($_smarty_tpl->tpl_vars['page']->value == " people" || $_smarty_tpl->tpl_vars['page']->value == "ads" && $_smarty_tpl->tpl_vars['view']->value != "wallet") {?> active<?php }?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" ">
                <li <?php if ($_smarty_tpl->tpl_vars['page']->value == " ads" && $_smarty_tpl->tpl_vars['view']->value != "wallet") {?>class="active" <?php }?>>
                <a href=" <?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/ads">
                    <div class="svg-container">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/ad_hubN.svg"
                            class="">
                        <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_adHub.svg" class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_adHub_active.svg" class="whiteicon"> -->
                    </div>
                    <span class="nav-text"><?php echo __("Ads Hub");?>
</span>
                </a>
                </li>
            </ul>
            <!-- ADS Hub end -->

            <!-- Market HUB Starts -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['market_enabled']) {?>
            <ul
                class="main-side-nav main-left-side-nav left-sidebar-first-ul <?php if (($_smarty_tpl->tpl_vars['active_page']->value == 'MarketHub')) {?>second-ul active <?php } else { ?>first-ul<?php }?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                <li <?php if ($_smarty_tpl->tpl_vars['active_page']->value == "MarketHub") {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/market">
                        <div class="svg-container <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/market_hubN.svg"
                                class="">
                            <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_marketHub.svg" class="blackicon">
                              <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_marketHub_active.svg" class="whiteicon"> -->
                        </div>
                        <span class="nav-text"><?php echo __("Market Hub");?>
</span>
                    </a>
                </li>
            </ul>
            <?php }?>
            <!-- Market hub END -->

            <!-- wallet seprate -->
            <ul class="main-side-nav main-left-side-nav left-sidebar-<?php if (($_smarty_tpl->tpl_vars['page']->value == " ads" && $_smarty_tpl->tpl_vars['view']->value == "wallet")) {?>second-ul
                active<?php } else { ?>first-ul<?php }?>">
                <li <?php if ($_smarty_tpl->tpl_vars['page']->value == "ads" && $_smarty_tpl->tpl_vars['view']->value == "wallet") {?>class="active" <?php }?>>
                    <a href=" <?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/wallet">
                        <div class="svg-container ">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Wallet.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Wallet-active.svg"
                                class="whiteicon">

                        </div>
                        <span class="nav-text"><?php echo __("Wallet");?>
</span>
                    </a>

                </li>
            </ul>
            <!-- wallet seprate end -->


            <!-- Logiut starts -->
            <ul class="main-side-nav main-left-side-nav left-sidebar-five-ul">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signout">
                        <div class="svg-container">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/logOutNew.svg"
                                class="blackicon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/logOut_activeNew.svg"
                                class="whiteicon">
                        </div>
                        <span class="nav-text"><?php echo __("Log Out");?>
</span>
                    </a>
                </li>
            </ul>
            <!-- Logout end-->


        </div>
    </div>
</div><?php }
}
