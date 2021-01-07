<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:10:24
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/right-sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf28000dd54_51668152',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9eb04448f83ab4a30a5de904849b4ed169b9cdcc' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/right-sidebar.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_explore_sidebar.tpl' => 1,
    'file:blog-right-sibebar.tpl' => 1,
    'file:global-profile/global-profile__feeds_user.tpl' => 1,
    'file:__feeds_user.tpl' => 1,
    'file:__feeds_page.tpl' => 1,
    'file:__feeds_group.tpl' => 1,
    'file:__feeds_event.tpl' => 1,
  ),
),false)) {
function content_5feaf28000dd54_51668152 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="right-sidebar-inner-ant usersectionHeaderMobile nonBlackSidebarShowHidd  custom-scrollbar <?php echo $_smarty_tpl->tpl_vars['view']->value;?>
">
    <div class="chat-conversations js_scroller rightSideBarScroll" data-slimScroll-height="90vh">

        <div class="explorerSidebarWrap">
            <?php $_smarty_tpl->_subTemplateRender('file:_explore_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>

        <!-- settingBar -->
        <div class="col-12 left-offcanvas-sidebar-inner settingleftWrap leftSettingHiddClose">
            <div class="card">
                <div class="card-body with-nav">
                    <ul class="side-nav">
                        <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>
                        <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "global") {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>class="active" <?php }?>>
                            <a href="#info-settings" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>aria-expanded="true"
                                <?php }?>>
                                <i class="fa fa-user fa-fw mr10" style="color: #2b53a4;"></i><?php echo __("Edit Profile");?>

                            </a>
                            <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>show<?php }?>' id="info-settings">
                                <ul>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "global") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/global">
                                            <?php echo __("Basic");?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <?php }?>
                        <?php }?>

                        <?php if ($_smarty_tpl->tpl_vars['sub_view']->value != "global") {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings">
                                <i class="icon icon-accountSetting"></i><?php echo __("Account Settings");?>

                            </a>
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>class="active" <?php }?>>
                            <a href="#info-settings" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>aria-expanded="true"
                                <?php }?>>
                                <i class="icon icon-editProfile"></i><?php echo __("Edit Profile");?>

                            </a>
                            <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile") {?>show<?php }?>' id="info-settings">
                                <ul>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile">
                                            <?php echo __("Basic");?>

                                        </a>
                                    </li>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "work") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/work">
                                            <?php echo __("Work");?>

                                        </a>
                                    </li>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "location") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/location">
                                            <?php echo __("Location");?>

                                        </a>
                                    </li>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "education") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/education">
                                            <?php echo __("Education");?>

                                        </a>
                                    </li>
                                    <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['other']) {?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "other") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/other">
                                            <?php echo __("Other");?>

                                        </a>
                                    </li>
                                    <?php }?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "social") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/social">
                                            <?php echo __("Social Links");?>

                                        </a>
                                    </li>
                                    <?php if ($_smarty_tpl->tpl_vars['system']->value['system_profile_background_enabled']) {?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "profile" && $_smarty_tpl->tpl_vars['sub_view']->value == "design") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/design">
                                            <?php echo __("Design");?>

                                        </a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "security") {?>class="active" <?php }?>>
                            <a href="#security-settings" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "security") {?>aria-expanded="true" <?php }?>>
                                <i class="icon icon-securitySetting"></i><?php echo __("Security
                                Settings");?>

                            </a>
                            <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "security") {?>show<?php }?>' id="security-settings">
                                <ul>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "security" && $_smarty_tpl->tpl_vars['sub_view']->value == "password") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/security/password">
                                            <?php echo __("Password");?>

                                        </a>
                                    </li>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "security" && $_smarty_tpl->tpl_vars['sub_view']->value == "sessions") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/security/sessions">
                                            <?php echo __("Manage Sessions");?>

                                        </a>
                                    </li>
                                    <?php if ($_smarty_tpl->tpl_vars['system']->value['two_factor_enabled']) {?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "security" && $_smarty_tpl->tpl_vars['sub_view']->value == "two-factor") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/security/two-factor">
                                            <?php echo __("Two-Factor Authentication");?>

                                        </a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "privacy") {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/privacy">
                                <i class="icon icon-privacy"></i><?php echo __("Privacy");?>

                            </a>
                        </li>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "notifications") {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/notifications">
                                <i class="icon icon-notifications"></i><?php echo __("Notifications");?>

                            </a>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['social_login_enabled']) {?>
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['facebook_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['google_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['twitter_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['instagram_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['linkedin_login_enabled'] || $_smarty_tpl->tpl_vars['system']->value['vkontakte_login_enabled']) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "linked") {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/linked">
                                <i class="icon icon-linkedAccounts"></i><?php echo __("Linked
                                Accounts");?>

                            </a>
                        </li>
                        <?php }?>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled']) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "membership") {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/membership">
                                <i class="icon icon-membership"></i><?php echo __("Membership");?>

                            </a>
                        </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['affiliates_enabled']) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>class="active" <?php }?>>
                            <a href="#affiliates-settings" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>aria-expanded="true" <?php }?>>
                                <i class="icon icon-affiliates"></i><?php echo __("Affiliates");?>

                            </a>
                            <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates") {?>show<?php }?>' id="affiliates-settings">
                                <ul>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/affiliates">
                                            <?php echo __("My Affiliates");?>

                                        </a>
                                    </li>
                                    <?php if ($_smarty_tpl->tpl_vars['system']->value['affiliates_money_withdraw_enabled']) {?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "affiliates" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/affiliates/payments">
                                            <?php echo __("Payments");?>

                                        </a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['points_enabled']) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>class="active" <?php }?>>
                            <a href="#points-settings" data-toggle="collapse" <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>aria-expanded="true"
                                <?php }?>>
                                <i class="icon icon-points"></i><?php echo __("Points");?>

                            </a>
                            <div class='collapse <?php if ($_smarty_tpl->tpl_vars['view']->value == "points") {?>show<?php }?>' id="points-settings">
                                <ul>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points" && $_smarty_tpl->tpl_vars['sub_view']->value == '') {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/points">
                                            <?php echo __("My Points");?>

                                        </a>
                                    </li>
                                    <?php if ($_smarty_tpl->tpl_vars['system']->value['points_money_withdraw_enabled']) {?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "points" && $_smarty_tpl->tpl_vars['sub_view']->value == "payments") {?>class="active" <?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/points/payments">
                                            <?php echo __("Payments");?>

                                        </a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['coinpayments_enabled']) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "coinpayments") {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/coinpayments">
                                <i class="icon icon-coinPayments"></i><?php echo __("CoinPayments");?>

                            </a>
                        </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['bank_transfers_enabled']) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "bank") {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/bank">
                                <i class="icon icon-BankTransfers"></i><?php echo __("Bank
                                Transfers");?>

                            </a>
                        </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['verification_requests']) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "verification") {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/verification">
                                <i class="icon icon-Verification"></i><?php echo __("Verification");?>

                            </a>
                        </li>
                        <?php }?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blocking") {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/blocking">
                                <i class="icon icon-Blocking"></i><?php echo __("Blocking");?>

                            </a>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['download_info_enabled']) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "information") {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/information">
                                <i class="icon icon-YourInformation"></i><?php echo __("Your
                                Information");?>

                            </a>
                        </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['developers_apps_enabled']) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "apps") {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/apps">
                                <i class="icon icon-Apps"></i><?php echo __("Apps");?>

                            </a>
                        </li>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['delete_accounts_enabled']) {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "delete") {?>class="active" <?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/delete">
                                <i class="icon icon-deleteAccount"></i><?php echo __("Delete Account");?>

                            </a>
                        </li>
                        <?php }?>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- settingBar -->

        <!-- pro users -->
        <?php if ($_smarty_tpl->tpl_vars['pro_members']->value) {?>
        <div class="card hashtagChange border-0">
            <div class="card-header bg-transparent border-bottom-0">
                <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
                <div class="float-right">
                    <a class="text-white text-underline see_btn"
                        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages"><?php echo __("Upgrade");?>
</a>
                </div>
                <?php }?>
                <img width="30px" height="30px"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Featured.svg" /> <?php echo __("Pro
                Users");?>

            </div>
            <div class="card-body pt0">
                <div class="pro-box-wrapper <?php if (count($_smarty_tpl->tpl_vars['pro_members']->value) > 3) {?>js_slick<?php } else { ?>full-opacity<?php }?>">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pro_members']->value, '_member');
$_smarty_tpl->tpl_vars['_member']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_member']->value) {
$_smarty_tpl->tpl_vars['_member']->do_else = false;
?>
                    <a class="user-box text-white" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_member']->value['user_name'];?>
">
                        <img alt="<?php echo $_smarty_tpl->tpl_vars['_member']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_member']->value['user_lastname'];?>
"
                            src="<?php echo $_smarty_tpl->tpl_vars['_member']->value['user_picture'];?>
" />
                        <div class="name" title="<?php echo $_smarty_tpl->tpl_vars['_member']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_member']->value['user_lastname'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['_member']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_member']->value['user_lastname'];?>

                        </div>
                    </a>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
        <?php }?>
        <!-- pro users -->

        <!-- pro pages -->
        <?php if ($_smarty_tpl->tpl_vars['promoted_pages']->value) {?>
        <div class="card bg-gradient-teal border-0">
            <div class="card-header ptb20 bg-transparent border-bottom-0">
                <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
                <div class="float-right">
                    <a class="text-white text-underline see_btn"
                        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages"><?php echo __("Upgrade");?>
</a>
                </div>
                <?php }?>
                <h6 class="pb0"><i class="fa fa-flag-checkered mr5"></i> <?php echo __("Pro Pages");?>
</h6>
            </div>
            <div class="card-body pt0 plr5">
                <div class="pro-box-wrapper <?php if (count($_smarty_tpl->tpl_vars['promoted_pages']->value) > 3) {?>js_slick<?php } else { ?>full-opacity<?php }?>">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['promoted_pages']->value, '_page');
$_smarty_tpl->tpl_vars['_page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
$_smarty_tpl->tpl_vars['_page']->do_else = false;
?>
                    <a class="user-box text-white" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_name'];?>
">
                        <img alt="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_title'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_picture'];?>
" />
                        <div class="name" title="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_title'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['_page']->value['page_title'];?>

                        </div>
                    </a>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
        </div>
        <?php }?>
        <!-- pro pages -->
        <?php if ($_smarty_tpl->tpl_vars['page']->value === 'blogs' || $_smarty_tpl->tpl_vars['view']->value === 'articles') {?>
        <?php $_smarty_tpl->_subTemplateRender('file:blog-right-sibebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } else { ?>
        <!-- trending -->
        <?php if ($_smarty_tpl->tpl_vars['trending_hashtags']->value) {?>
        <div class="card hashtagChange border-0 <?php echo $_smarty_tpl->tpl_vars['subactive_page']->value;?>
">
            <div class="card-header bg-transparent">
                <img width="30px" height="30px"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Featured.svg" /> Trending
                Hashtags
            </div>
            <div class="card-body pt0">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['trending_hashtags']->value, 'hashtag');
$_smarty_tpl->tpl_vars['hashtag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['hashtag']->value) {
$_smarty_tpl->tpl_vars['hashtag']->do_else = false;
?>
                <?php if ($_smarty_tpl->tpl_vars['hashtag']->value['postHubType'] != 'GlobalHub') {?>
                <a class="trending-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/search/hashtag/<?php echo $_smarty_tpl->tpl_vars['hashtag']->value['hashtag'];?>
">
                    <?php } else { ?>
                    <a class="trending-item"
                        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/globalhub-search/hashtag/<?php echo $_smarty_tpl->tpl_vars['hashtag']->value['hashtag'];?>
">
                        <?php }?>
                        <span class="hash">
                            #<?php echo $_smarty_tpl->tpl_vars['hashtag']->value['hashtag'];?>

                        </span>
                        <!-- <span class="frequency">
                                <?php echo $_smarty_tpl->tpl_vars['hashtag']->value['frequency'];?>
 <?php echo __("Posts");?>

                            </span> -->
                    </a>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
        <?php }?>
        <!-- trending -->

                <!-- friend suggestions -->
        <?php if ($_smarty_tpl->tpl_vars['new_people']->value) {?>
        <div class="card <?php echo $_smarty_tpl->tpl_vars['active_page']->value;?>
">
            <div class="card-header bg-transparent">
                <div class="float-right">
                    <?php if ($_smarty_tpl->tpl_vars['active_page']->value == "GlobalHub") {?>
                    <a class="see_btn" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people-global"><?php echo __("See All");?>
</a>
                    <?php } else { ?>
                    <a class="see_btn" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people"><?php echo __("See All");?>
</a>
                    <?php }?>
                </div>
                <?php ob_start();
if ($_smarty_tpl->tpl_vars['active_page']->value == "GlobalHub") {
echo "Follow";
} else {
echo "Friend";
}
$_prefixVariable2=ob_get_clean();
echo __($_prefixVariable2." Suggestions");?>

            </div>
            <div class="card-body with-list">
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_people']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_firstname'] != '' && $_smarty_tpl->tpl_vars['_user']->value['user_lastname'] != '') {?>
                    <?php if ($_smarty_tpl->tpl_vars['active_page']->value == "GlobalHub") {?>
                    <?php $_smarty_tpl->_subTemplateRender('file:global-profile/global-profile__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"follow",'_small'=>true), 0, true);
?>
                    <?php } else { ?>
                    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"add",'_small'=>true), 0, true);
?>
                    <?php }?>
                    <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
        </div>
        <?php }?>
        <!-- friend suggestions -->
        <?php if ($_smarty_tpl->tpl_vars['active_page']->value != "GlobalHub") {?>
        <!-- suggested pages -->
        <?php if ($_smarty_tpl->tpl_vars['new_pages']->value) {?>
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="float-right">
                    <a class="see_btn" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages"><?php echo __("See All");?>
</a>
                </div>
                <?php echo __("Suggested Pages");?>

            </div>
            <div class="card-body with-list">
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_pages']->value, '_page');
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
            </div>
        </div>
        <?php }?>
        <!-- suggested pages -->

        <!-- suggested groups -->
        <?php if ($_smarty_tpl->tpl_vars['new_groups']->value) {?>
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="float-right">
                    <a class="see_btn" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups"><?php echo __("See All");?>
</a>
                </div>
                <?php echo __("Suggested Groups");?>

            </div>
            <div class="card-body with-list">
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_groups']->value, '_group');
$_smarty_tpl->tpl_vars['_group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_group']->value) {
$_smarty_tpl->tpl_vars['_group']->do_else = false;
?>
                    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list"), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
        </div>
        <?php }?>
        <!-- suggested groups -->

        <!-- suggested events -->
        <?php if ($_smarty_tpl->tpl_vars['new_events']->value) {?>
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="float-right">
                    <a class="see_btn" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events"><?php echo __("See All");?>
</a>
                </div>
                <?php echo __("Suggested Events");?>

            </div>
            <div class="card-body with-list">
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['new_events']->value, '_event');
$_smarty_tpl->tpl_vars['_event']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_event']->value) {
$_smarty_tpl->tpl_vars['_event']->do_else = false;
?>
                    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_event.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_small'=>true), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
        </div>
        <?php }?>
        <!-- suggested events -->
        <?php }?>
        <?php }?>

        <!-- mini footer -->
        <div class="mini-footer plr10">
            <div class="copyrights">
                &copy; <?php echo date('Y');?>
 <?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
 <span class="text-link" data-toggle="modal"
                    data-url="#translator"><i
                        class="fas fa-globe-americas mr5"></i><?php echo $_smarty_tpl->tpl_vars['system']->value['language']['title'];?>
</span>
            </div>
            <ul class="links">
                <?php if ($_smarty_tpl->tpl_vars['static_pages']->value) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['static_pages']->value, 'static_page');
$_smarty_tpl->tpl_vars['static_page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['static_page']->value) {
$_smarty_tpl->tpl_vars['static_page']->do_else = false;
?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/static/<?php echo $_smarty_tpl->tpl_vars['static_page']->value['page_url'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['static_page']->value['page_title'];?>

                    </a>
                </li>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['system']->value['contact_enabled']) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/contacts">
                        <?php echo __("Contact Us");?>

                    </a>
                </li>

                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['system']->value['directory_enabled']) {?>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/directory">
                        <?php echo __("Directory");?>

                    </a>
                </li>
                <?php }?>
            </ul>
        </div>
        <!-- mini footer -->

    </div>
</div><?php }
}
