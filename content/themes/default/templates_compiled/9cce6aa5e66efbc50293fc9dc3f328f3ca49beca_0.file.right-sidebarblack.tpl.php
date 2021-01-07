<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-06 07:38:06
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/right-sidebarblack.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff568de23e242_94171343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cce6aa5e66efbc50293fc9dc3f328f3ca49beca' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/right-sidebarblack.tpl',
      1 => 1609326510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff568de23e242_94171343 (Smarty_Internal_Template $_smarty_tpl) {
?><div
    class="right-sidebar-inner-ant usersectionHeaderMobile blacksidebarclassadd hiddBar rightBlackSidebar custom-scrollbar">
    <!-- <div class="rightSideBarScroll"> -->
    <div class="rightUserDetails">
        <div class="headingModal bg-transparent">Settings</div>
        <div class="with-list sectionBody">
            <?php $_smarty_tpl->_assignInScope('last_dir', explode("/",$_SERVER['REQUEST_URI']));?>
            <?php $_smarty_tpl->_assignInScope('last_key', count($_smarty_tpl->tpl_vars['last_dir']->value));?>
            <?php $_smarty_tpl->_assignInScope('first_var', $_smarty_tpl->tpl_vars['last_dir']->value[$_smarty_tpl->tpl_vars['last_key']->value-1]);?>
            <?php $_smarty_tpl->_assignInScope('final_dir', $_smarty_tpl->tpl_vars['last_dir']->value[$_smarty_tpl->tpl_vars['last_key']->value-2]);?>
            <ul>
                <li <?php if ($_smarty_tpl->tpl_vars['page']->value == 'global-profile' || $_smarty_tpl->tpl_vars['page']->value == 'profile') {?>class="active" <?php }?>>
                    <?php if ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-timeline' || $_smarty_tpl->tpl_vars['page']->value == 'settings/profile/global' || $_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile' || $_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-photo' || $_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-photo' || $_smarty_tpl->tpl_vars['page']->value == 'messages_global') {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
"
                        class="rightuser-menu usernameOnHoverbtn">
                        <div class="settingsIcons">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/footer-icon/User.svg"
                                class="whiteicon" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/footer-icon/User2.svg"
                                class="blackicon" />
                        </div>
                        My Account
                    </a>
                    <?php } elseif ($_smarty_tpl->tpl_vars['first_var']->value == 'global' && $_smarty_tpl->tpl_vars['final_dir']->value == 'profile') {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
"
                        class="rightuser-menu usernameOnHoverbtn">
                        <div class="settingsIcons">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/footer-icon/User.svg"
                                class="whiteicon" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/footer-icon/User2.svg"
                                class="blackicon" />
                        </div>
                        My Account
                    </a>
                    <?php } elseif (strstr($_SERVER['REQUEST_URI'],'global-profile')) {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
"
                        class="rightuser-menu usernameOnHoverbtn">
                        <div class="settingsIcons">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/footer-icon/User.svg"
                                class="whiteicon" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/footer-icon/User2.svg"
                                class="blackicon" />
                        </div>
                        My Account
                    </a>
                    <?php } else { ?>
                    <a href="<?php if (($_smarty_tpl->tpl_vars['page']->value != 'global-profile/landingpage')) {
echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];
} else { ?>#<?php }?>"
                        page='<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
' class="rightuser-menu usernameOnHoverbtn">
                        <div class="settingsIcons">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/footer-icon/User.svg"
                                class="whiteicon" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/footer-icon/User2.svg"
                                class="blackicon" />
                        </div>
                        My Account
                    </a>
                    <?php }?>
                </li>
                <li <?php if ($_smarty_tpl->tpl_vars['page']->value == 'notifications') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/notifications?parm=nf">
                        <div class="settingsIcons">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/notifications-icon.svg"
                                class="whiteicon" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/notifications_icon_hover.svg"
                                class="blackicon" />
                        </div>
                        Notifications
                    </a>
                </li>
                <li <?php if ($_smarty_tpl->tpl_vars['page']->value == 'wallet') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/wallet">
                        <div class="settingsIcons">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Wallet_icon_header.svg"
                                class="whiteicon" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Wallet_icon_header_active.svg"
                                class="blackicon" />
                        </div>
                        Billing and Payment
                    </a>
                </li>
                <li <?php if ($_smarty_tpl->tpl_vars['page']->value == 'settings') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/privacy">
                        <div class="settingsIcons">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/lock_iconb.svg"
                                class="whiteicon" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/lock_iconb_hover.svg"
                                class="blackicon" />
                        </div>
                        Security & Privacy
                    </a>
                </li>
                <li <?php if ($_smarty_tpl->tpl_vars['page']->value == 'settings') {?>class="active" <?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/information">
                        <div class="settingsIcons">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/help.svg"
                                style="width: 25px;height: 25px;" class="whiteicon" />
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/helpBlue.svg"
                                style="width: 25px;height: 25px;" class="blackicon" />
                        </div>
                        Help
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div><?php }
}
