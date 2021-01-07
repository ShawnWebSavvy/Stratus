<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-06 07:38:06
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_header_profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff568de204897_24798438',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5377849f9470897d9b287657a14f28d9332bcbe' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_header_profile.tpl',
      1 => 1609248087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_header.notifications.tpl' => 1,
    'file:_ads.tpl' => 1,
    'file:right-sidebarblack.tpl' => 1,
  ),
),false)) {
function content_5ff568de204897_24798438 (Smarty_Internal_Template $_smarty_tpl) {
if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>

<body data-hash-tok="<?php echo $_smarty_tpl->tpl_vars['session_hash']->value['token'];?>
" data-hash-pos="<?php echo $_smarty_tpl->tpl_vars['session_hash']->value['position'];?>
"
  class="global-profile-landingpage-localhub  login-index-body <?php if (($_smarty_tpl->tpl_vars['page']->value == 'index' || $_smarty_tpl->tpl_vars['page']->value == 'reset')) {?> header_footer_hide  <?php }?>  <?php if ($_smarty_tpl->tpl_vars['system']->value['theme_mode_night']) {?>night-mode<?php }?> visitor n_chat <?php if ($_smarty_tpl->tpl_vars['page']->value == 'index' || $_smarty_tpl->tpl_vars['page']->value == 'sign') {?>index-body<?php }?>"
  <?php if (($_smarty_tpl->tpl_vars['page']->value == 'index' || $_smarty_tpl->tpl_vars['page']->value == 'sign') && !$_smarty_tpl->tpl_vars['system']->value['system_wallpaper_default'] && $_smarty_tpl->tpl_vars['system']->value['system_wallpaper']) {?>
  style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_wallpaper'];?>
');background-size:cover;" <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['page']->value == 'profile' && $_smarty_tpl->tpl_vars['system']->value['system_profile_background_enabled'] && $_smarty_tpl->tpl_vars['profile']->value['user_profile_background']) {?>style="background:url(<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_profile_background'];?>
) fixed !important; background-size:100% auto;"
  <?php }?>>
  <?php } else { ?>

  <body data-hash-tok="<?php echo $_smarty_tpl->tpl_vars['session_hash']->value['token'];?>
" data-hash-pos="<?php echo $_smarty_tpl->tpl_vars['session_hash']->value['position'];?>
"
    data-chat-enabled="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_chat_enabled'];?>
"
    class="<?php if ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/landingpage') {?>landingpage-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-timeline') {?>global-profile-timeline-localhub index-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-post') {?>global-profile-post-localhub<?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-photo') {?>global-profile-photo-localhub<?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile') {?> global-profile-localhub<?php } elseif ($_smarty_tpl->tpl_vars['view']->value == 'wallet' && $_smarty_tpl->tpl_vars['page']->value == 'ads') {
echo $_smarty_tpl->tpl_vars['view']->value;?>
-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'ads') {?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub<?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'blogs') {?> index-localhub <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'notifications') {?> index-localhub <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'market') {?> index-localhub <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'global-profile/search') {?> search-localhub global-search-localhub <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'events' || $_smarty_tpl->tpl_vars['page']->value == 'developers' || $_smarty_tpl->tpl_vars['page']->value == 'forums' || $_smarty_tpl->tpl_vars['page']->value == 'pages' || $_smarty_tpl->tpl_vars['page']->value == 'groups') {?> explore_page_cmn <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
-localhub group-localhub <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['theme_mode_night']) {?>night-mode<?php }?> <?php if (!$_smarty_tpl->tpl_vars['system']->value['chat_enabled']) {?>n_chat<?php }
if ($_smarty_tpl->tpl_vars['system']->value['activation_enabled'] && !$_smarty_tpl->tpl_vars['user']->value->_data['user_activated']) {?> n_activated<?php }
if (!$_smarty_tpl->tpl_vars['system']->value['system_live']) {?> n_live<?php }?> <?php if ($_smarty_tpl->tpl_vars['page']->value == 'index' || $_smarty_tpl->tpl_vars['page']->value == 'pages' || $_smarty_tpl->tpl_vars['page']->value == 'global-profile' || $_smarty_tpl->tpl_vars['page']->value == 'messages' || $_smarty_tpl->tpl_vars['page']->value == 'events' || $_smarty_tpl->tpl_vars['page']->value == 'groups' || $_smarty_tpl->tpl_vars['page']->value == 'people' || $_smarty_tpl->tpl_vars['page']->value == 'settings' || $_smarty_tpl->tpl_vars['page']->value == 'admin') {?> lgtBg <?php echo $_smarty_tpl->tpl_vars['page']->value;
}?> <?php if ($_smarty_tpl->tpl_vars['page']->value == 'started') {?>body-started<?php }?> "
    <?php if ($_smarty_tpl->tpl_vars['page']->value == 'profile' && $_smarty_tpl->tpl_vars['system']->value['system_profile_background_enabled'] && $_smarty_tpl->tpl_vars['profile']->value['user_profile_background']) {?>
    style="background:url(<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_profile_background'];?>
) fixed !important; background-size:100% auto;" <?php }?> <?php if ($_smarty_tpl->tpl_vars['page']->value == "share" && $_smarty_tpl->tpl_vars['url']->value) {?>onload="initialize_scraper()" <?php }?>>
    <?php }?>

    <!-- main wrapper -->
    <div class="main-wrapper <?php echo $_smarty_tpl->tpl_vars['user']->value->_logged_in;?>
">
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
            <div class="col-sm-5">
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
            <div class=" col-6 col-lg-2 mobileLogo">
              <!-- logo-wrapper -->
              <ul <?php echo $_smarty_tpl->tpl_vars['active_page']->value;?>
 profile_header_page>
                <li class="addPost mob_show_ __mob-icons_">
                  <button class="btn leftSidebarButton buttonSidebar" style=" " id="stratus_hide_leftbutton">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="256"
                      height="256" viewBox="0 0 256 256">
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
                  <?php if ($_smarty_tpl->tpl_vars['active_page']->value == "GlobalHub") {?>

                  <a href="javascript:initialize_scraper()" id="openPost"></a>
                  <div class="svg-container">
                    <img data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
                      class="blackicon lazyload">
                  </div>
                  </a>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['active_page']->value == "LocalHub") {?>
                  <a href="javascript:initialize_scraper()" id="openPost">
                    <div class="svg-container">
                      <img data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
                        class="blackicon lazyload">
                    </div>
                  </a>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['active_page']->value === "MarketHub") {?>
                  <a href="javascript:void(0);" data-toggle="modal" data-url="posts/product.php?do=create">
                    <div class="svg-container">
                      <img data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
                        class="blackicon lazyload">
                    </div>
                  </a>
                  <?php }?>
                </li>
              </ul>
              <div class="logo-wrapper for_desktop">
                <!-- logo -->

                <?php if ($_smarty_tpl->tpl_vars['system']->value['system_logo']) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                  <img class="img-fluid lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_logo'];?>
"
                    alt="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
" />
                </a>
                <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['page']->value == "index" && !$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                  <img class="img-fluid lazyload"   data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/logo.png" />
                </a>
                <?php } elseif ((($_smarty_tpl->tpl_vars['page']->value == "index" || $_smarty_tpl->tpl_vars['page']->value == "profile") && $_smarty_tpl->tpl_vars['view']->value != "articles" && $_smarty_tpl->tpl_vars['user']->value->_logged_in) || $_smarty_tpl->tpl_vars['page']->value == "messages" || $_smarty_tpl->tpl_vars['page']->value == "group" || $_smarty_tpl->tpl_vars['page']->value == "groups" && $_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                  <img class="img-fluid lazyload"
                      data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/logo_localHub.png" />
                </a>
                <?php } elseif (($_smarty_tpl->tpl_vars['page']->value == "global-profile/global-profile" || $_smarty_tpl->tpl_vars['page']->value == "global-profile/global-profile-photo" || $_smarty_tpl->tpl_vars['page']->value == "global-profile/global-profile-timeline") && $_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile-timeline.php" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                  <img class="img-fluid lazyload"
                      data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/logo_globalHub.png" />
                </a>
                <?php } elseif (($_smarty_tpl->tpl_vars['page']->value == "ads" && $_smarty_tpl->tpl_vars['view']->value != "wallet") && $_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/ads" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                  <img class="img-fluid lazyload"   data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/logo_addHub.png" />
                </a>
                <?php } elseif (($_smarty_tpl->tpl_vars['view']->value == "wallet") && $_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/ads" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                  <img class="img-fluid lazyload"   data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/logo_wallet.png" />
                </a>
                <?php } elseif (($_smarty_tpl->tpl_vars['page']->value == "blogs" || $_smarty_tpl->tpl_vars['view']->value == 'articles') && $_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                  <img class="img-fluid lazyload"   data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/logo_blog.png" />
                </a>
                <?php } elseif (($_smarty_tpl->tpl_vars['page']->value == "market") && $_smarty_tpl->tpl_vars['user']->value->_logged_in || $_smarty_tpl->tpl_vars['actPage']->value) {?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/market" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                  <img class="img-fluid lazyload"
                      data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/logo_marketHub.png" />
                </a>
                <?php } else { ?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
" class="logo <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
                  <img class="img-fluid lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
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

            <div class=" col-6 col-lg-10 usersectionHeaderMobile">
              <div class="row">
                <!-- profile-tabs -->
                <div class="profile-header-tabs desktop_only">
                  <a href="javascript:window.history.back()" class="back_btn_profile btn  headerBackButtonGlobal"><i
                      class="fas fa-chevron-left"></i> <span>Back</span></a>

                  <ul class="eventsProfileTabs">
                    <?php if ($_smarty_tpl->tpl_vars['event']->value['event_privacy'] == "public" || $_smarty_tpl->tpl_vars['event']->value['i_joined'] || $_smarty_tpl->tpl_vars['event']->value['i_admin']) {?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['event']->value['event_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active" <?php }?>>
                        <?php echo __("Timeline");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['event']->value['event_id'];?>
/photos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "photos" || $_smarty_tpl->tpl_vars['view']->value == "albums" || $_smarty_tpl->tpl_vars['view']->value == "album") {?>class="active" <?php }?>>
                        <?php echo __("Photos");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['event']->value['event_id'];?>
/videos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "videos") {?>class="active" <?php }?>>
                        <?php echo __("Videos");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['event']->value['event_id'];?>
/going" <?php if ($_smarty_tpl->tpl_vars['view']->value == "going" || $_smarty_tpl->tpl_vars['view']->value == "interested" || $_smarty_tpl->tpl_vars['view']->value == "invited" || $_smarty_tpl->tpl_vars['view']->value == "invites") {?>class="active" <?php }?>>
                        <?php echo __("Members");?>

                      </a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['event']->value['i_admin']) {?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['event']->value['event_id'];?>
/settings" <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings") {?>class="active" <?php }?>>
                        <?php echo __("Settings");?>

                      </a>
                    </li>
                    <?php }?>
                    <?php } else { ?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['event']->value['event_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['view']->value == "about") {?>class="active"
                        <?php }?>>
                        <?php echo __("About");?>

                      </a>
                    </li>
                    <?php }?>
                  </ul>
                  <ul class="pageProfileTabs">
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['spage']->value['page_name'];?>
" <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active" <?php }?>>
                        <?php echo __("Timeline");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['spage']->value['page_name'];?>
/photos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "photos" || $_smarty_tpl->tpl_vars['view']->value == "albums" || $_smarty_tpl->tpl_vars['view']->value == "album") {?>class="active" <?php }?>>
                        <?php echo __("Photos");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['spage']->value['page_name'];?>
/videos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "videos") {?>class="active" <?php }?>>
                        <?php echo __("Videos");?>

                      </a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['spage']->value['i_like']) {?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['spage']->value['page_name'];?>
/invites" <?php if ($_smarty_tpl->tpl_vars['view']->value == "invites") {?>class="active" <?php }?>>
                        <?php echo __("Invite Friends");?>

                      </a>
                    </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['spage']->value['i_admin']) {?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['spage']->value['page_name'];?>
/settings" <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings") {?>class="active" <?php }?>>
                        <?php echo __("Settings");?>

                      </a>
                    </li>
                    <?php }?>
                  </ul>
                  <ul class="groupProfileHeaderTabs">
                    <?php if ($_smarty_tpl->tpl_vars['group']->value['group_privacy'] == "closed" && $_smarty_tpl->tpl_vars['group']->value['i_joined'] != "approved" && !$_smarty_tpl->tpl_vars['group']->value['i_admin']) {?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['group']->value['group_name'];?>
">
                        <?php echo __("About");?>

                      </a>
                    </li>
                    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == 'profile') {?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
" <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active"
                        <?php }?>><?php echo __("Timeline");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/photos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "photos" || $_smarty_tpl->tpl_vars['view']->value == "albums" || $_smarty_tpl->tpl_vars['view']->value == "album") {?>class="active" <?php }?>>
                        <?php echo __("Photos");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/videos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "videos") {?>class="active" <?php }?>>
                        <?php echo __("Videos");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/groups" <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>class="active" <?php }?>>
                        <?php echo __("Groups");?>

                      </a>
                    </li>
                    <?php } else { ?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['group']->value['group_name'];?>
" <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active"
                        <?php }?>>
                        <?php echo __("Timeline");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['group']->value['group_name'];?>
/photos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "photos" || $_smarty_tpl->tpl_vars['view']->value == "albums" || $_smarty_tpl->tpl_vars['view']->value == "album") {?>class="active" <?php }?>>
                        <?php echo __("Photos");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['group']->value['group_name'];?>
/videos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "videos") {?>class="active" <?php }?>>
                        <?php echo __("Videos");?>

                      </a>
                    </li>
                    <?php if (!$_smarty_tpl->tpl_vars['group']->value['i_admin']) {?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['group']->value['group_name'];?>
/members" <?php if ($_smarty_tpl->tpl_vars['view']->value == "members" || $_smarty_tpl->tpl_vars['view']->value == "invites") {?>class="active" <?php }?>>
                        <?php echo __("Members");?>

                      </a>
                    </li>
                    <?php } else { ?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['group']->value['group_name'];?>
/settings" <?php if ($_smarty_tpl->tpl_vars['view']->value == "settings") {?>class="active" <?php }?>>
                        <?php echo __("Settings");?>

                      </a>
                    </li>
                    <?php }?>
                    <?php }?>
                  </ul>
                  <ul class="globalProfileHeaderTabs">
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
" <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active" <?php }?>><?php echo __("Timeline");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=followers"
                        <?php if ($_smarty_tpl->tpl_vars['view']->value == "followers" || $_smarty_tpl->tpl_vars['view']->value == "followings") {?>class="active" <?php }?>><?php echo __("Followers");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=photos"
                        <?php if ($_smarty_tpl->tpl_vars['view']->value == "photos" || $_smarty_tpl->tpl_vars['view']->value == "albums" || $_smarty_tpl->tpl_vars['view']->value == "album") {?>class="active" <?php }?>>
                        <?php echo __("Photos");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=videos"
                        <?php if ($_smarty_tpl->tpl_vars['view']->value == "videos") {?>class="active" <?php }?>>
                        <?php echo __("Videos");?>

                      </a>
                    </li>
                    <!-- <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_enabled']) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/likes" <?php if ($_smarty_tpl->tpl_vars['view']->value == "likes") {?>class="active" <?php }?>>
                          <?php echo __("Likes");?>

                        </a>
                    </li>
                    <?php }?> -->
                  </ul>
                  <ul class="localProfileHeaderTabs">
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
" <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active" <?php }?>>
                        <?php echo __("Timeline");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends" <?php if ($_smarty_tpl->tpl_vars['view']->value == "friends" || $_smarty_tpl->tpl_vars['view']->value == "followers" || $_smarty_tpl->tpl_vars['view']->value == "followings") {?>class="active" <?php }?>>
                        <?php echo __("Friends");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/photos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "photos" || $_smarty_tpl->tpl_vars['view']->value == "albums" || $_smarty_tpl->tpl_vars['view']->value == "album") {?>class="active" <?php }?>>
                        <?php echo __("Photos");?>

                      </a>
                    </li>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/videos" <?php if ($_smarty_tpl->tpl_vars['view']->value == "videos") {?>class="active" <?php }?>>
                        <?php echo __("Videos");?>

                      </a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_enabled']) {?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/likes" <?php if ($_smarty_tpl->tpl_vars['view']->value == "likes") {?>class="active"
                        <?php }?>>
                        <?php echo __("Likes");?>

                      </a>
                    </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['groups_enabled']) {?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/groups" <?php if ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>class="active" <?php }?>>
                        <?php echo __("Groups");?>

                      </a>
                    </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['events_enabled']) {?>
                    <li>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/events" <?php if ($_smarty_tpl->tpl_vars['view']->value == "events") {?>class="active" <?php }?>>
                        <?php echo __("Events");?>

                      </a>
                    </li>
                    <?php }?>
                  </ul>
                </div>

                <!-- profile-tabs -->
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                <div class="nameSection">
                  <!-- navbar-wrapper -->
                  <div class="navbar-wrapper">
                    <ul class="clearfix">
                      <!-- user-menu -->
                      <li class="profileFor_desktop <?php echo $_smarty_tpl->tpl_vars['active_page']->value;?>
">
                        <!-- <a href="#" class="user-menu" data-toggle="dropdown" data-display="static"> -->
                        <?php if ($_smarty_tpl->tpl_vars['active_page']->value == 'GlobalHub') {?>
                        <a href="javascript:void();" id="currentUsername"
                          class="rightuser-menu usernameOnHoverbtn openRightBlackBar">
                          <!-- <span class="usernameOnHover"><?php echo $_smarty_tpl->tpl_vars['userGlobal']->value->_data['user_firstname'];?>
</span> -->
                          <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['userGlobal']->value->_data['global_user_picture'];?>
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
                          <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_picture'];?>
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

                      <!-- </li> -->
                      <?php $_smarty_tpl->_assignInScope('last_url', explode("/",$_SERVER['REQUEST_URI']));?>
                      <?php $_smarty_tpl->_assignInScope('last_key_url', count($_smarty_tpl->tpl_vars['last_url']->value));?>
                      <?php $_smarty_tpl->_assignInScope('first_url', $_smarty_tpl->tpl_vars['last_url']->value[$_smarty_tpl->tpl_vars['last_key_url']->value-1]);?>
                      <?php $_smarty_tpl->_assignInScope('third_url', $_smarty_tpl->tpl_vars['last_url']->value[$_smarty_tpl->tpl_vars['last_key_url']->value-3]);?>
                      <!-- back button start -->

                      <li class="backBtnMobile">
                        <?php if ($_smarty_tpl->tpl_vars['first_url']->value == 'global' && $_smarty_tpl->tpl_vars['third_url']->value == 'settings') {?>
                        <a class="btn btn-success backBtn" onclick="window.history.back();" data-toggle="tooltip"
                          title="Back" data-placement="bottom">
                          <i class="fas fa-chevron-left"></i>
                        </a>
                        <?php } elseif ($_smarty_tpl->tpl_vars['third_url']->value == 'settings') {?>
                        <a class="btn btn-success <?php echo $_smarty_tpl->tpl_vars['view']->value;?>
 backBtn" data-toggle="tooltip" title="Back to Menus"
                          data-placement="bottom">
                          <i class="fas fa-chevron-left"></i>
                        </a>

                        <?php } else { ?>
                        <a class="btn btn-success <?php echo $_smarty_tpl->tpl_vars['third_url']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['first_url']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['_second']->value;?>
" onclick="window.history.back();"
                          data-toggle="tooltip" title="back" data-placement="bottom">
                          <i class="fas fa-chevron-left"></i>
                        </a>
                        <?php }?>
                      </li>
                      <!-- back button end -->
                      <!-- search button-->
                      <?php }?>
                      <?php $_smarty_tpl->_subTemplateRender('file:_header.notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                      <!-- <li> -->
                      <!-- poke & report & block -->
                      <?php if (($_smarty_tpl->tpl_vars['profile']->value['user_id'] != $_smarty_tpl->tpl_vars['user']->value->_data['user_id'])) {?>
                      <li class="dropdown button-profile-option for_mobile">
                        <button type="button" class="btn btn-icon btn-light" data-toggle="dropdown"
                          data-display="static">
                          <i class="fa fa-ellipsis-v fa-fw"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <!-- poke -->
                          <?php if ($_smarty_tpl->tpl_vars['system']->value['pokes_enabled'] && !$_smarty_tpl->tpl_vars['profile']->value['i_poked']) {?>
                          <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_poke'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_poke'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                          <div class="dropdown-item pointer js_poke" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"
                            data-name="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
">
                            <i class="fa fa-hand-point-right fa-fw mr10"></i><?php echo __("Poke");?>

                          </div>
                          <?php }?>
                          <?php }?>
                          <!-- poke -->
                          <!-- report -->
                          <div class="dropdown-item pointer js_report" data-handle="user"
                            data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                            <i class="fa fa-flag fa-fw mr10"></i><?php echo __("Report");?>

                          </div>
                          <!-- report -->
                          <!-- block -->
                          <div class="dropdown-item pointer js_block-user" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                            <i class="fa fa-minus-circle fa-fw mr10"></i><?php echo __("Block");?>

                          </div>
                          <!-- block -->
                          <!-- manage -->
                          <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item"
                            href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/admincp/users/edit/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                            <i class="fa fa-cog fa-fw mr10"></i><?php echo __("Edit in Admin Panel");?>

                          </a>
                          <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->_is_moderator) {?>
                          <!-- <div class="dropdown-divider"></div> -->
                          <a class="dropdown-item"
                            href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/modcp/users/edit/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                            <i class="fa fa-cog fa-fw mr10"></i><?php echo __("Edit in Moderator Panel");?>

                          </a>
                          <?php }?>
                          <!-- manage -->
                        </div>
                      </li>
                      <?php }?>
                      <!-- poke & report & block -->
                      <!-- </li> -->
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
      <div class="right-sidebar headerTopBarSetting js_sticky-sidebar ">
        <?php $_smarty_tpl->_subTemplateRender('file:right-sidebarblack.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
    </div><?php }
}
