<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-07 04:56:17
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff69471af97d4_73963422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f24dde1fc111221414d85f2b57f4ad2e5c5f4418' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_header.tpl',
      1 => 1609938408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:market-search.tpl' => 1,
    'file:_header.search.tpl' => 1,
    'file:_header.notifications.tpl' => 1,
    'file:_ads.tpl' => 1,
  ),
),false)) {
function content_5ff69471af97d4_73963422 (Smarty_Internal_Template $_smarty_tpl) {
if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>

<body data-hash-tok="<?php echo $_smarty_tpl->tpl_vars['session_hash']->value['token'];?>
" data-hash-pos="<?php echo $_smarty_tpl->tpl_vars['session_hash']->value['position'];?>
" class="global-profile-landingpage-localhub login-index-body <?php if (($_smarty_tpl->tpl_vars['page']->value == 'index' || $_smarty_tpl->tpl_vars['page']->value == 'reset')) {?> header_footer_hide <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['theme_mode_night']) {?>night-mode<?php }?> visitor n_chat <?php if ($_smarty_tpl->tpl_vars['page']->value == 'index' || $_smarty_tpl->tpl_vars['page']->value == 'sign') {?>index-body<?php }?>" <?php if (($_smarty_tpl->tpl_vars['page']->value == 'index' || $_smarty_tpl->tpl_vars['page']->value == 'sign') && !$_smarty_tpl->tpl_vars['system']->value['system_wallpaper_default'] && $_smarty_tpl->tpl_vars['system']->value['system_wallpaper']) {?> style="background-image:
url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_wallpaper'];?>
');
background-size: cover;" <?php }?> <?php if ($_smarty_tpl->tpl_vars['page']->value == 'profile' && $_smarty_tpl->tpl_vars['system']->value['system_profile_background_enabled'] && $_smarty_tpl->tpl_vars['profile']->value['user_profile_background']) {?>style="background:
url(<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_profile_background'];?>
) fixed !important; background-size:
100% auto;" <?php }?>> <?php } else { ?>

   <body data-hash-tok="<?php echo $_smarty_tpl->tpl_vars['session_hash']->value['token'];?>
" data-hash-pos="<?php echo $_smarty_tpl->tpl_vars['session_hash']->value['position'];?>
"
      data-chat-enabled="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_chat_enabled'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/landingpage') {?>landingpage-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-timeline') {?>global-profile-timeline-localhub
index-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-post') {?>global-profile-post-localhub<?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-photo') {?>global-profile-photo-localhub<?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile') {?> global-profile-localhub<?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-bookmarks') {?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 global-profile-localhub<?php } elseif ($_smarty_tpl->tpl_vars['view']->value == 'wallet' && $_smarty_tpl->tpl_vars['page']->value == 'ads') {
echo $_smarty_tpl->tpl_vars['view']->value;?>
-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'ads') {
echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub<?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'blogs') {?> index-localhub <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'notifications') {?> index-localhub <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'market') {?>
index-localhub <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/search') {?>
search-localhub global-search-localhub  <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'events' || $_smarty_tpl->tpl_vars['page']->value == 'developers' || $_smarty_tpl->tpl_vars['page']->value == 'forums' || $_smarty_tpl->tpl_vars['page']->value == 'pages' || $_smarty_tpl->tpl_vars['page']->value == 'groups') {?> explore_page_cmn <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == 'products') {?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub products_page <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'messages') {?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub <?php echo $_smarty_tpl->tpl_vars['view']->value;?>
  <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'messages_global') {?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub <?php echo $_smarty_tpl->tpl_vars['view']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub <?php if ($_smarty_tpl->tpl_vars['page']->value == 'people') {?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-friends-page <?php }?> <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['theme_mode_night']) {?>night-mode<?php }?> <?php if (!$_smarty_tpl->tpl_vars['system']->value['chat_enabled']) {?>n_chat<?php }
if ($_smarty_tpl->tpl_vars['system']->value['activation_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_activated']) {?> n_activated<?php }
if (!$_smarty_tpl->tpl_vars['system']->value['system_live']) {?>
n_live<?php }?> <?php if ($_smarty_tpl->tpl_vars['page']->value == 'index' || $_smarty_tpl->tpl_vars['page']->value == 'pages' || $_smarty_tpl->tpl_vars['page']->value == 'global-profile' || $_smarty_tpl->tpl_vars['page']->value == 'messages' || $_smarty_tpl->tpl_vars['page']->value == 'events' || $_smarty_tpl->tpl_vars['page']->value == 'groups' || $_smarty_tpl->tpl_vars['page']->value == 'people' || $_smarty_tpl->tpl_vars['page']->value == 'settings' || $_smarty_tpl->tpl_vars['page']->value == 'admin') {
}?> <?php if ($_smarty_tpl->tpl_vars['page']->value == 'started') {?>body-started<?php }?> " <?php if ($_smarty_tpl->tpl_vars['page']->value == 'profile' && $_smarty_tpl->tpl_vars['system']->value['system_profile_background_enabled'] && $_smarty_tpl->tpl_vars['profile']->value['user_profile_background']) {?> style="background:
url(<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_profile_background'];?>
) fixed !important; background-size:
100% auto;" <?php }?> <?php if ($_smarty_tpl->tpl_vars['page']->value == "share" && $_smarty_tpl->tpl_vars['url']->value) {?>onload="initialize_scraper()" <?php }?>> <?php }?>
      <?php $_smarty_tpl->_assignInScope('last_dir', explode("/",$_SERVER['REQUEST_URI']));?>
      <?php $_smarty_tpl->_assignInScope('last_key', count($_smarty_tpl->tpl_vars['last_dir']->value));?>
      <?php $_smarty_tpl->_assignInScope('first_var', $_smarty_tpl->tpl_vars['last_dir']->value[$_smarty_tpl->tpl_vars['last_key']->value-1]);?>
      <?php $_smarty_tpl->_assignInScope('final_dir', $_smarty_tpl->tpl_vars['last_dir']->value[$_smarty_tpl->tpl_vars['last_key']->value-2]);?>
      <?php $_smarty_tpl->_assignInScope('last_url', explode("/",$_SERVER['REQUEST_URI']));?>
      <?php $_smarty_tpl->_assignInScope('last_key_url', count($_smarty_tpl->tpl_vars['last_url']->value));?>
      <?php $_smarty_tpl->_assignInScope('first_url', $_smarty_tpl->tpl_vars['last_url']->value[$_smarty_tpl->tpl_vars['last_key_url']->value-1]);?>
      <?php $_smarty_tpl->_assignInScope('sec_url', $_smarty_tpl->tpl_vars['last_url']->value[$_smarty_tpl->tpl_vars['last_key_url']->value-2]);?>
      <?php $_smarty_tpl->_assignInScope('third_url', $_smarty_tpl->tpl_vars['last_url']->value[$_smarty_tpl->tpl_vars['last_key_url']->value-3]);?>
      <!-- main wrapper -->

      <div class="main-wrapper">
         <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['system']->value['activation_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_activated']) {?>
         <!-- top-bar -->
         <div class="top-bar">
            <div class="container">
               <div class="row">
                  <!-- <div class="col-sm-7 d-none d-sm-block">
            <?php if ($_smarty_tpl->tpl_vars['system']->value['activation_type'] == "email") {?> <?php echo __("Please go to");?>

            <span class="text-primary"><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_email'];?>
</span> <?php echo __("to
            complete the activation process");?>
. <?php } else { ?> <?php echo __("Please check the SMS
            on your phone");?>
 <strong><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_phone'];?>
</strong> <?php echo __("to
            complete the activation process");?>
. <?php }?>
          </div> -->
                  <div class="col-sm-12">
                     <?php if ($_smarty_tpl->tpl_vars['system']->value['activation_type'] == "email") {?>
                     <span class="text-link" data-toggle="modal" data-url="core/activation_email_resend.php">
                        <?php echo __("Resend Verification Email");?>

                     </span>
                     -
                     <span class="text-link" data-toggle="modal" data-url="#activation-email-reset">
                        <?php echo __("Change Email");?>

                     </span>
                     <?php } else { ?>
                     <span class="btn btn-info btn-sm mr10" data-toggle="modal" data-url="#activation-phone"><?php echo __("Enter
                        Code");?>
</span>
                     <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_phone']) {?>
                     <span class="text-link" data-toggle="modal" data-url="core/activation_phone_resend.php">
                        <?php echo __("Resend SMS");?>

                     </span>
                     - <?php }?>
                     <span class="text-link" data-toggle="modal" data-url="#activation-phone-reset">
                        <?php echo __("Change Phone Number");?>

                     </span>
                     <?php }?>
                  </div>
               </div>
            </div>
         </div>
         <!-- top-bar -->
         <?php }?> <?php if (!$_smarty_tpl->tpl_vars['system']->value['system_live']) {?>
         <!-- top-bar alert-->
         <div class="top-bar danger">
            <div class="container">
               <i class="fa fa-exclamation-triangle fa-lg pr5"></i>
               <span class="d-none d-sm-inline"><?php echo __("The system has been shutted down");?>
.</span>
               <span><?php echo __("Turn it on from");?>
</span>
               <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/admincp/settings"><?php echo __("Admin Panel");?>
</a>
            </div>
         </div>
         <!-- top-bar alert-->
         <?php }?>
         <!-- main-header -->
         <div class="main-header">
            <div class="container">
               <div class="row">
                  <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                  <div class="col-6 col-lg-2 mobileLogo">
                     <div class="__mob-icons_">
                        <button class="btn leftSidebarButton buttonSidebar" style="display:none;"
                           id="stratus_hide_leftbutton">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                              width="256" height="256" viewBox="0 0 256 256">
                              <metadata>
                                 <?php echo '<?'; ?>
xpacket begin="﻿" id="W5M0MpCehiHzreSzNTczkc9d"<?php echo '?>';?>

                                 <x:xmpmeta xmlns:x="adobe:ns:meta/"
                                    x:xmptk="Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01">
                                    <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                                       <rdf:Description rdf:about="" />
                                    </rdf:RDF>
                                 </x:xmpmeta>
                                 <?php echo '<?'; ?>
xpacket end="w"<?php echo '?>';?>

                              </metadata>
                              <image id="L1_copy" data-name="L1 copy" width="256" height="256"
                                 xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAAEACAQAAAD2e2DtAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAAB2IAAAdiATh6mdsAAAAHdElNRQfkCxoLMCTmZUgdAAAEJUlEQVR42u3dy2tcZRiA8ed8Y2rUtLZqmU1JKxMXVYj1QkHUbqpN02iLtDS4cONCEAUvWET/AUW7cOVO60LQ2IVN0ZqoEcFbL1aaZlGthoDEtlErjebWaBIX4zQmVnCRnFdmnt9s5pyZxQPfewaG78ABSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSdL/VDbvuMRmShSpiw7TgvudIfrpov/fvrCZL5nxVfWvI7TMLnrlF+AKXmNH9IgqN2/xIKNQGYAV9HBTdJNy9RUbOQcJKPC6y19zbqaDS6AAPM6j0TUKUOJnDmcso59rolsU4idKiftc/pq1km2Je6MrFGhrojm6QYGaM36jIbpCYUYSM9ENCjSdOB3doEA/JI5HNyhQX2J/dIMCdWYspZ+V0R0K8SOlApNM0BpdohBP81kGFOikLbpFueumjanydvByPnI/sMYcZSPD5e1gOMed7I0uUo7eZAPDUBkAGGUnLRyO7lIODrGJ+xkrH8y/KfRaWilRZEl0pRbcJGfop4uB6BBJkiRJkiRJkiRJkiRJkiRJkiRJkiRJkiRJkiRJkiRJkiRJkiRJkiRJkiRJkqrZ3IdHL6eNVtZQvPBUcVWPaYYY4D0OcG725OwANLCLJ2mIrtSiG2E3uxktH1QGoIn9rI0uU26+ZStfQ2UA1vIpV0U3KVdnuZ1vygOwgsM0RfcodydZz3ABeI4t0S0KcDV1vJ+xiu+4NLpFISYoJXa4/DWrnu2JtugKBboncV10gwI1ZYxTH12hMOOJsegGBRpNnIpuUKBTiS+iGxTo80RndIMC7c8o0MsN0R0KcYLmxBTPRHcoyFP8UQBOsozboluUuxd5GQoA9LCaddE9ytUeHmOmMgAz7ONX7mBJdJVyMcIunmUGKgMAcJA91NHI0ug6LarTvEo7PZXDbN7HiXWsYRWXRXdqwY0zyADHyle+JEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJGnRZBc5lyj67OAqNM4Q0/NPzh2ADbTTSuPfnimuajLF9xygg09mT80OwPW8xN3RhcpFN09wovy2MgBbeINl0V3KzQgPsA8qA9DCu/7s15hptvFOeQCaOOrVX4OGuYX+BLzg8tekK3keMpo5dtE/g6p+MzQndrj8NStje+Ku6AoF2pRYHd2gQI0Z51kSXaEw5xO/RDco0NnEYHSDAg0meqIbFOjDxNvRDQq0L3GID6IrFKSLIxlwIwepj25R7iZYT18CenkoukUBHqGPvzaBj3OGFjeEa8gkD/MKcGHRj/Ixt1KM7lIuemkv3w4y957AxE7a2cTl0X1aNGN008He2ZtD/7kTWKBIkRRdqgU3zRBDTEVnSJIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZL+oz8BLkedNfIIF1wAAAAASUVORK5CYII=" />
                           </svg>

                        </button>
                        <!-- toggle-btn -->
                        <!-- <button class="btn _toggle_btn">
                       <i class="fas fa-bars"></i>
                       </button>  -->
                        <!--  -->
                        <ul <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['active_page']->value;?>
>
                           <li class="addPost mob_show_">
                              <?php if ($_smarty_tpl->tpl_vars['active_page']->value == "GlobalHub") {?>
                              <a href="javascript:initialize_scraper()" id="openPost">
                                 <div class="svg-container">
                                    <img
                                       src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
                                       class="blackicon">
                                 </div>
                              </a>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['active_page']->value == "LocalHub" && $_smarty_tpl->tpl_vars['page']->value != "pages") {?>
                              <a href="javascript:initialize_scraper()" id="openPost">
                                 <div class="svg-container">
                                    <img
                                       src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
                                       class="blackicon">
                                 </div>
                              </a>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['active_page']->value == "MarketHub") {?>
                              <a href="javascript:void(0);" data-toggle="modal" data-url="posts/product.php?do=create">
                                 <div class="svg-container">
                                    <img
                                       src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
                                       class="blackicon">
                                 </div>
                              </a>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['active_page']->value == "profile_header_page") {?>
                              <a href="javascript:void(0);" data-toggle="modal" data-url="posts/product.php?do=create">
                                 <div class="svg-container">
                                    <img
                                       src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
                                       class="blackicon">
                                 </div>
                              </a>
                              <?php }?>
                           </li>
                        </ul>
                     </div>
                     <!-- logo-wrapper -->
                     <div class="logo-wrapper desk_logo">
                        <!-- logo -->
                        <?php if ($_smarty_tpl->tpl_vars['system']->value['system_logo']) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                           <img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_logo'];?>
"
                              alt="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
" />
                        </a>
                        <?php } else { ?> <?php if ($_smarty_tpl->tpl_vars['page']->value == "index" && !$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                           <img class="img-fluid"
                              src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/logo.png" />
                        </a>
                        <?php } elseif ((($_smarty_tpl->tpl_vars['page']->value == "index" || $_smarty_tpl->tpl_vars['page']->value == "profile" || $_smarty_tpl->tpl_vars['page']->value == "pages" || $_smarty_tpl->tpl_vars['page']->value == "people") && $_smarty_tpl->tpl_vars['active_page']->value != "MarketHub" && $_smarty_tpl->tpl_vars['view']->value != "articles" && $_smarty_tpl->tpl_vars['user']->value->_logged_in) || $_smarty_tpl->tpl_vars['page']->value == "messages" || $_smarty_tpl->tpl_vars['active_page']->value == "LocalHub" || $_smarty_tpl->tpl_vars['page']->value == "groups" || $_smarty_tpl->tpl_vars['page']->value == "events" || $_smarty_tpl->tpl_vars['page']->value == "forums" || $_smarty_tpl->tpl_vars['page']->value == "developers" && $_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                           <img class="img-fluid"
                              src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/logo_localHub.png" />
                        </a>
                        <?php } elseif (($_smarty_tpl->tpl_vars['page']->value == "global-profile/global-profile" || $_smarty_tpl->tpl_vars['page']->value == "global-profile/search" || $_smarty_tpl->tpl_vars['page']->value == "global-profile/global-profile-photo" || $_smarty_tpl->tpl_vars['page']->value == "global-profile/global-profile-timeline" || $_smarty_tpl->tpl_vars['page']->value == "global-profile/global-profile-post" || $_smarty_tpl->tpl_vars['page']->value == "global-profile/explore-localhub" || $_smarty_tpl->tpl_vars['first_var']->value == 'global' && $_smarty_tpl->tpl_vars['final_dir']->value == 'profile' || $_smarty_tpl->tpl_vars['page']->value == "global-profile/global-profile-bookmarks" || $_smarty_tpl->tpl_vars['page']->value == "messages_global" || $_smarty_tpl->tpl_vars['active_page']->value == 'GlobalHub') && $_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile-timeline.php" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                           <img class="img-fluid"
                              src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/logo_globalHub.png" />
                        </a>
                        <?php } elseif (($_smarty_tpl->tpl_vars['page']->value == "ads" && $_smarty_tpl->tpl_vars['view']->value != "wallet") && $_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/ads" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                           <img class="img-fluid"
                              src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/logo_addHub.png" />
                        </a>
                        <?php } elseif (($_smarty_tpl->tpl_vars['view']->value == "wallet") && $_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/ads" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                           <img class="img-fluid"
                              src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/logo_wallet.png" />
                        </a>
                        <?php } elseif (($_smarty_tpl->tpl_vars['page']->value == "blogs" || $_smarty_tpl->tpl_vars['view']->value == 'articles') && $_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                           <img class="img-fluid"
                              src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/logo_blog.png" />
                        </a>
                        <?php } elseif (($_smarty_tpl->tpl_vars['page']->value == "market" || $_smarty_tpl->tpl_vars['active_page']->value == "MarketHub") && $_smarty_tpl->tpl_vars['user']->value->_logged_in || $_smarty_tpl->tpl_vars['actPage']->value) {?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/market" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                           <img class="img-fluid"
                              src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/logo_marketHub.png" />
                        </a>
                        <?php } else { ?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                           <img class="img-fluid"
                              src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/logo.png" />
                        </a>
                        <?php }?>
                        <!--<?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
-->
                        <?php }?>
                        <!-- logo -->
                        <!-- <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                     <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="home-icon">
                       <i class="fa fa-home fa-lg"></i>
                     </a>
                     <?php }?> -->
                     </div>
                     <!-- logo-wrapper -->
                  </div>
                  <div class="col-6 col-lg-10 usersectionHeaderMobile">
                     <div class="row">
                        <div class="searchSection <?php echo $_smarty_tpl->tpl_vars['active_page']->value;?>
">
                           <div style="display: flex;align-items: center;width: 100%;">
                              <?php if ($_smarty_tpl->tpl_vars['page']->value == 'events') {?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events" class="btn <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 headerBackButtonGlobal"><i
                                    class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'pages') {?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages" class="btn <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 headerBackButtonGlobal"><i
                                    class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'groups') {?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups" class="btn <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 headerBackButtonGlobal"><i
                                    class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'forums') {?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/forums" class="btn <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 headerBackButtonGlobal"><i
                                    class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'developers') {?>
                              <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/developers"
                                 class=" btn <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 headerBackButtonGlobal"><i class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              <?php } else { ?>
                              <a href="javascript:window.history.back()" class="btn <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 headerBackButtonGlobal"><i
                                    class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              <?php }?>
                              <!-- search-wrapper -->
                              <?php if ($_smarty_tpl->tpl_vars['page']->value == "market") {?>
                              <?php $_smarty_tpl->_subTemplateRender('file:market-search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                              <?php } else { ?>
                              <?php $_smarty_tpl->_subTemplateRender('file:_header.search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                              <?php }?>
                              <!-- search-wrapper -->
                           </div>
                           <div class="addWalletPlusIcon">
                              <div class="navbar-wrapper">
                                 <ul class="clearfix">
                                    <?php if ($_smarty_tpl->tpl_vars['system']->value['ads_enabled']) {?>
                                    <li class="dropdown js_live-notificationstest walletButton"
                                       style="margin-left: auto;">
                                       <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/wallet">
                                          <div class="svg-container ">
                                             <span class="img-wrap-style">
                                                <img
                                                   src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/Wallet_icon_header.svg"
                                                   class="blackicon">
                                                <img
                                                   src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/Wallet_icon_header_active.svg"
                                                   class="whiteicon">
                                             </span>
                                          </div>
                                          <!-- <?php echo __("Wallet");?>
: -->
                                          <span class="counter shadow-sm user_live_notifications_counter"
                                             style="color: rgba(255, 255, 255, 1);background-color: rgb(18, 105, 255);">
                                             <?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];
echo number_format($_smarty_tpl->tpl_vars['user']->value->_data['user_wallet_balance'],2);?>

                                          </span>
                                       </a>
                                    </li>
                                    <?php }?>
                                    <!-- <li class="dropdown js_live-notifications walletButton">
                                 <a class=" dropdown-item" href="#">
                                   <div class="svg-container " style="padding: 5px;">
                                     <span class="img-wrap-style">
                                       <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/headerplusblack.png" alt="plucicon" class="whiteicon">
                                       <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/headerplusblue.png" alt="plucicon" class="blackicon">
                                     </span>
                                   </div>
                                 </a>
                                 </li> -->
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                        <div class="nameSection">
                           <!-- navbar-wrapper -->
                           <div class="navbar-wrapper">
                              <ul class="clearfix">
                                 <!-- user-menu -->
                                 <li class="profileFor_desktop sss <?php echo $_smarty_tpl->tpl_vars['active_page']->value;?>
">
                                    <!-- <a href="#" class="user-menu" data-toggle="dropdown" data-display="static"> -->
                                    <?php if ($_smarty_tpl->tpl_vars['active_page']->value == 'GlobalHub') {?>
                                    <a href="javascript:void();" id="currentUsername"
                                       class="rightuser-menu usernameOnHoverbtn openRightBlackBar">
                                       <!-- <span class="usernameOnHover"><?php echo $_smarty_tpl->tpl_vars['userGlobal']->value->_data['user_firstname'];?>
</span> -->
                                       <img src="<?php echo $_smarty_tpl->tpl_vars['userGlobal']->value->_data['user_picture'];?>
" />
                                       <span class=""><?php echo $_smarty_tpl->tpl_vars['userGlobal']->value->_data['user_firstname'];?>
</span>
                                    </a>
                                    <?php } else { ?>
                                    <a href="javascript:void();" id="currentUsername" page='<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
'
                                       class="rightuser-menu usernameOnHoverbtn openRightBlackBar">
                                       <!-- <span class="usernameOnHover"><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_firstname'];?>
</span> -->
                                       <img src="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_picture'];?>
" />
                                       <span class=""><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_firstname'];?>
</span>
                                    </a>
                                    <?php }?>
                                 </li>
                                 <?php if ($_smarty_tpl->tpl_vars['system']->value['ads_enabled']) {?>
                                 <!-- search button start-->
                                 <li class="dropdown js_live-notifications walletButton searchBtnMobile"
                                    style="margin-left: auto !important;">
                                    <?php if ($_smarty_tpl->tpl_vars['active_page']->value == 'LocalHub') {?>
                                    <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/search">
                                       <?php } else { ?>
                                       <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/globalhub-search">
                                          <?php }?>
                                          <div class="svg-container " style="width:24px; height:24px; ">
                                             <i class="fa fa-search"></i>
                                          </div>
                                       </a>
                                 </li>
                                 <!-- back button start -->
                                 <li class="backBtnMobile">
                                    <?php if ($_smarty_tpl->tpl_vars['first_url']->value == 'global' && $_smarty_tpl->tpl_vars['third_url']->value == 'settings') {?>
                                    <a class="btn btn-success" onclick="window.history.back();" data-toggle="tooltip"
                                       title="Back" data-placement="bottom">
                                       <i class="fas fa-chevron-left"></i>
                                    </a>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['first_url']->value == 'settings' || $_smarty_tpl->tpl_vars['sec_url']->value == 'settings' || $_smarty_tpl->tpl_vars['third_url']->value == 'settings') {?>
                                    <a class="btn btn-success backBtn" data-toggle="tooltip" title="Back to Menus"
                                       data-placement="bottom">
                                       <i class="fas fa-chevron-left"></i>
                                    </a>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'messages_global') {?>
                                    <a class="btn btn-success msgGlobal" data-toggle="tooltip" title="Back to Friends"
                                       data-placement="bottom">
                                       <i class="fas fa-chevron-left"></i>
                                    </a>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'messages') {?>
                                    <a class="btn btn-success msgLocal" data-toggle="tooltip" title="Back to Friends"
                                       data-placement="bottom">
                                       <i class="fas fa-chevron-left"></i>
                                    </a>
                                    <?php } else { ?>
                                    <a class="btn btn-success" onclick="window.history.back();" data-toggle="tooltip"
                                       title="back" data-placement="bottom">
                                       <i class="fas fa-chevron-left"></i>
                                    </a>
                                    <?php }?>
                                 </li>
                                 <!-- back button end -->
                                 <!-- search button-->
                                 <?php }?>
                                 <?php $_smarty_tpl->_subTemplateRender('file:_header.notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                              </ul>
                           </div>
                           <!-- navbar-wrapper -->
                        </div>
                        <?php }?>
                     </div>
                  </div>
                  <?php }?>
               </div>
            </div>
         </div>
         <!-- main-header -->
         <!-- ads -->
         <?php $_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_ads'=>$_smarty_tpl->tpl_vars['ads_master']->value['header'],'_master'=>true), 0, false);
?>
         <!-- ads -->
         <!-- <div class="right-sidebar headerTopBarSetting js_sticky-sidebar ">
            include file='right-sidebarblack.tpl'
         </div> -->
      </div><?php }
}
