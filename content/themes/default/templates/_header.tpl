{if !$user->_logged_in}

<body data-hash-tok="{$session_hash['token']}" data-hash-pos="{$session_hash['position']}" class="global-profile-landingpage-localhub login-index-body {if ($page=='index'
|| $page=='reset')} header_footer_hide {/if} {if
$system['theme_mode_night']}night-mode{/if} visitor n_chat {if $page == 'index'
|| $page == 'sign'}index-body{/if}" {if ($page=='index' || $page=='sign' ) && !$system['system_wallpaper_default'] &&
   $system['system_wallpaper']} style="background-image:
url('{$system['system_uploads']}/{$system['system_wallpaper']}');
background-size: cover;" {/if} {if $page=='profile' && $system['system_profile_background_enabled'] &&
   $profile['user_profile_background']}style="background:
url({$profile['user_profile_background']}) fixed !important; background-size:
100% auto;" {/if}> {else}

   <body data-hash-tok="{$session_hash['token']}" data-hash-pos="{$session_hash['position']}"
      data-chat-enabled="{$user->_data['user_chat_enabled']}" class="{if
$page=='global-profile/landingpage'}landingpage-localhub {elseif
$page=='global-profile/global-profile-timeline'}global-profile-timeline-localhub
index-localhub {elseif
$page=='global-profile/global-profile-post'}global-profile-post-localhub{elseif
$page=='global-profile/global-profile-photo'}global-profile-photo-localhub{elseif
$page=='global-profile/global-profile'} global-profile-localhub{elseif
$page=='global-profile/global-profile-bookmarks'} {$page} global-profile-localhub{elseif
$view=='wallet' && $page=='ads'}{$view}-localhub {elseif $page=='ads'}
{$page}-localhub{elseif $page=='blogs'} index-localhub {$page}-localhub {elseif
$page=='notifications'} index-localhub {$page}-localhub {elseif $page=='market'}
index-localhub {$page}-localhub {elseif $page=='global-profile/search'}
search-localhub global-search-localhub  {elseif $page == 'events' || $page == 'developers' || $page == 'forums' || $page == 'pages' || $page == 'groups' } explore_page_cmn {$page}-localhub {elseif $view=='products'} {$page}-localhub products_page {elseif $page=='messages'} {$page}-localhub {$view}  {elseif $page=='messages_global'} {$page}-localhub {$view} {else} {$page}-localhub {if $page =='people'} {$page}-friends-page {/if} {/if} {if
$system['theme_mode_night']}night-mode{/if} {if
!$system['chat_enabled']}n_chat{/if}{if $system['activation_enabled'] &&
!$user->_data['user_activated']} n_activated{/if}{if !$system['system_live']}
n_live{/if} {if $page == 'index' || $page == 'pages' || $page ==
'global-profile' || $page == 'messages' || $page == 'events' || $page ==
'groups' || $page == 'people' || $page == 'settings'|| $page == 'admin' }
{/if} {if $page=='started'}body-started{/if} " {if $page=='profile' && $system['system_profile_background_enabled'] &&
      $profile['user_profile_background']} style="background:
url({$profile['user_profile_background']}) fixed !important; background-size:
100% auto;" {/if} {if $page=="share" && $url}onload="initialize_scraper()" {/if}> {/if}
      {assign var="last_dir" value="/"|explode:$smarty.server.REQUEST_URI}
      {assign var="last_key" value=$last_dir|count}
      {assign var="first_var" value=$last_dir[$last_key-1]}
      {assign var="final_dir" value=$last_dir[$last_key-2]}
      {assign var="last_url" value="/"|explode:$smarty.server.REQUEST_URI}
      {assign var="last_key_url" value=$last_url|count}
      {assign var="first_url" value=$last_url[$last_key_url-1]}
      {assign var="sec_url" value=$last_url[$last_key_url-2]}
      {assign var="third_url" value=$last_url[$last_key_url-3]}
      <!-- main wrapper -->

      <div class="main-wrapper">
         {if $user->_logged_in && $system['activation_enabled'] &&
         !$user->_data['user_activated']}
         <!-- top-bar -->
         <div class="top-bar">
            <div class="container">
               <div class="row">
                  <!-- <div class="col-sm-7 d-none d-sm-block">
            {if $system['activation_type'] == "email"} {__("Please go to")}
            <span class="text-primary">{$user->_data['user_email']}</span> {__("to
            complete the activation process")}. {else} {__("Please check the SMS
            on your phone")} <strong>{$user->_data['user_phone']}</strong> {__("to
            complete the activation process")}. {/if}
          </div> -->
                  <div class="col-sm-12">
                     {if $system['activation_type'] == "email"}
                     <span class="text-link" data-toggle="modal" data-url="core/activation_email_resend.php">
                        {__("Resend Verification Email")}
                     </span>
                     -
                     <span class="text-link" data-toggle="modal" data-url="#activation-email-reset">
                        {__("Change Email")}
                     </span>
                     {else}
                     <span class="btn btn-info btn-sm mr10" data-toggle="modal" data-url="#activation-phone">{__("Enter
                        Code")}</span>
                     {if $user->_data['user_phone']}
                     <span class="text-link" data-toggle="modal" data-url="core/activation_phone_resend.php">
                        {__("Resend SMS")}
                     </span>
                     - {/if}
                     <span class="text-link" data-toggle="modal" data-url="#activation-phone-reset">
                        {__("Change Phone Number")}
                     </span>
                     {/if}
                  </div>
               </div>
            </div>
         </div>
         <!-- top-bar -->
         {/if} {if !$system['system_live']}
         <!-- top-bar alert-->
         <div class="top-bar danger">
            <div class="container">
               <i class="fa fa-exclamation-triangle fa-lg pr5"></i>
               <span class="d-none d-sm-inline">{__("The system has been shutted down")}.</span>
               <span>{__("Turn it on from")}</span>
               <a href="{$system['system_url']}/admincp/settings">{__("Admin Panel")}</a>
            </div>
         </div>
         <!-- top-bar alert-->
         {/if}
         <!-- main-header -->
         <div class="main-header">
            <div class="container">
               <div class="row">
                  {if $user->_logged_in}
                  <div class="col-6 col-lg-2 mobileLogo">
                     <div class="__mob-icons_">
                        <button class="btn leftSidebarButton buttonSidebar" style="display:none;"
                           id="stratus_hide_leftbutton">
                           <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                              width="256" height="256" viewBox="0 0 256 256">
                              <metadata>
                                 <?xpacket begin="﻿" id="W5M0MpCehiHzreSzNTczkc9d"?>
                                 <x:xmpmeta xmlns:x="adobe:ns:meta/"
                                    x:xmptk="Adobe XMP Core 5.6-c138 79.159824, 2016/09/14-01:09:01">
                                    <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
                                       <rdf:Description rdf:about="" />
                                    </rdf:RDF>
                                 </x:xmpmeta>
                                 <?xpacket end="w"?>
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
                        <ul {$page} {$active_page}>
                           <li class="addPost mob_show_">
                              {if $active_page =="GlobalHub"}
                              <a href="javascript:initialize_scraper()" id="openPost">
                                 <div class="svg-container">
                                    <img
                                       src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Icon.svg"
                                       class="blackicon">
                                 </div>
                              </a>
                              {/if}
                              {if $active_page =="LocalHub" && $page != "pages"}
                              <a href="javascript:initialize_scraper()" id="openPost">
                                 <div class="svg-container">
                                    <img
                                       src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Icon.svg"
                                       class="blackicon">
                                 </div>
                              </a>
                              {/if}
                              {if $active_page =="MarketHub"}
                              <a href="javascript:void(0);" data-toggle="modal" data-url="posts/product.php?do=create">
                                 <div class="svg-container">
                                    <img
                                       src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Icon.svg"
                                       class="blackicon">
                                 </div>
                              </a>
                              {/if}
                              {if $active_page =="profile_header_page"}
                              <a href="javascript:void(0);" data-toggle="modal" data-url="posts/product.php?do=create">
                                 <div class="svg-container">
                                    <img
                                       src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Icon.svg"
                                       class="blackicon">
                                 </div>
                              </a>
                              {/if}
                           </li>
                        </ul>
                     </div>
                     <!-- logo-wrapper -->
                     <div class="logo-wrapper desk_logo">
                        <!-- logo -->
                        {if $system['system_logo']}
                        <a href="{$system['system_url']}" class="logo {$page}">
                           <img class="img-fluid" src="{$system['system_uploads']}/{$system['system_logo']}"
                              alt="{$system['system_title']}" title="{$system['system_title']}" />
                        </a>
                        {else} {if $page == "index" && !$user->_logged_in}
                        <a href="{$system['system_url']}" class="logo {$page}">
                           <img class="img-fluid"
                              src="{$system['system_uploads_assets']}/content/themes/default/images/logo.png" />
                        </a>
                        {elseif (($page == "index" || $page == "profile" || $page == "pages" || $page == "people") &&
                        $active_page != "MarketHub" &&
                        $view
                        !="articles" && $user->_logged_in ) || $page == "messages" || $active_page == "LocalHub" ||
                        $page
                        == "groups" || $page == "events" || $page == "forums" || $page == "developers" &&
                        $user->_logged_in}
                        <a href="{$system['system_url']}" class="logo {$page}">
                           <img class="img-fluid"
                              src="{$system['system_uploads_assets']}/content/themes/default/images/logo_localHub.png" />
                        </a>
                        {elseif ($page == "global-profile/global-profile" || $page == "global-profile/search" || $page
                        =="global-profile/global-profile-photo" || $page
                        =="global-profile/global-profile-timeline" || $page
                        =="global-profile/global-profile-post" || $page == "global-profile/explore-localhub" ||
                        $first_var =='global' && $final_dir =='profile' ||
                        $page=="global-profile/global-profile-bookmarks" || $page=="messages_global" ||
                        $active_page=='GlobalHub') &&
                        $user->_logged_in}
                        <a href="{$system['system_url']}/global-profile-timeline" class="logo {$page}">
                           <img class="img-fluid"
                              src="{$system['system_uploads_assets']}/content/themes/default/images/logo_globalHub.png" />
                        </a>
                        {elseif ($page == "ads" && $view != "wallet") && $user->_logged_in}
                        <a href="{$system['system_url']}/ads" class="logo {$page}">
                           <img class="img-fluid"
                              src="{$system['system_uploads_assets']}/content/themes/default/images/logo_addHub.png" />
                        </a>
                        {elseif ($view == "wallet") && $user->_logged_in}
                        <a href="{$system['system_url']}/ads" class="logo {$page}">
                           <img class="img-fluid"
                              src="{$system['system_uploads_assets']}/content/themes/default/images/logo_wallet.png" />
                        </a>
                        {elseif ($page == "blogs" || $view =='articles') &&
                        $user->_logged_in}
                        <a href="{$system['system_url']}/blogs" class="logo {$page}">
                           <img class="img-fluid"
                              src="{$system['system_uploads_assets']}/content/themes/default/images/logo_blog.png" />
                        </a>
                        {elseif ($page == "market" || $active_page == "MarketHub") && $user->_logged_in || $actPage}
                        <a href="{$system['system_url']}/market" class="logo {$page}">
                           <img class="img-fluid"
                              src="{$system['system_uploads_assets']}/content/themes/default/images/logo_marketHub.png" />
                        </a>
                        {elseif $page == "investment/activity" || $page == "investment/buy_sell" || $page ==
                        "investment/index" && $user->_logged_in}
                        <a href="{$system['system_url']}/investments" class="logo {$page}">
                           <img class="img-fluid"
                              src="{$system['system_uploads_assets']}/content/themes/default/images/investment/Investment-Hub.png" />
                        </a>
                        {else}
                        <a href="{$system['system_url']}" class="logo {$page}">
                           <img class="img-fluid"
                              src="{$system['system_uploads_assets']}/content/themes/default/images/logo.png" />
                        </a>
                        {/if}
                        <!--{$system['system_title']}-->
                        {/if}
                        <!-- logo -->
                        <!-- {if $user->_logged_in}
                     <a href="{$system['system_url']}" class="home-icon">
                       <i class="fa fa-home fa-lg"></i>
                     </a>
                     {/if} -->
                     </div>
                     <!-- logo-wrapper -->
                  </div>
                  <div class="col-6 col-lg-10 usersectionHeaderMobile">
                     <div class="row">
                        <div class="searchSection {$active_page}">
                           <div style="display: flex;align-items: center;width: 100%;">
                              {if $page=='events'}
                              <a href="{$system['system_url']}/events" class="btn {$page} headerBackButtonGlobal"><i
                                    class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              {else if $page=='pages'}
                              <a href="{$system['system_url']}/pages" class="btn {$page} headerBackButtonGlobal"><i
                                    class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              {else if $page=='groups'}
                              <a href="{$system['system_url']}/groups" class="btn {$page} headerBackButtonGlobal"><i
                                    class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              {else if $page=='forums'}
                              <a href="{$system['system_url']}/forums" class="btn {$page} headerBackButtonGlobal"><i
                                    class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              {else if $page=='developers'}
                              <a href="{$system['system_url']}/developers"
                                 class=" btn {$page} headerBackButtonGlobal"><i class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              {else}
                              <a href="javascript:window.history.back()" class="btn {$page} headerBackButtonGlobal"><i
                                    class="fas fa-chevron-left"></i>
                                 <span>Back</span></a>
                              {/if}
                              <!-- search-wrapper -->
                              {if $page =="market"}
                              {include file='market-search.tpl'}
                              {else}
                              {include file='_header.search.tpl'}
                              {/if}
                              <!-- search-wrapper -->
                           </div>
                           <div class="addWalletPlusIcon">
                              <div class="navbar-wrapper">
                                 <ul class="clearfix">
                                    {if $system['ads_enabled']}
                                    <li class="dropdown js_live-notificationstest walletButton"
                                       style="margin-left: auto;">
                                       <a class="dropdown-item" href="{$system['system_url']}/wallet">
                                          <div class="svg-container ">
                                             <span class="img-wrap-style">
                                                <img
                                                   src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Wallet_icon_header.svg"
                                                   class="blackicon">
                                                <img
                                                   src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Wallet_icon_header_active.svg"
                                                   class="whiteicon">
                                             </span>
                                          </div>
                                          <!-- {__("Wallet")}: -->
                                          <span class="counter shadow-sm user_live_notifications_counter"
                                             style="color: rgba(255, 255, 255, 1);background-color: rgb(18, 105, 255);">
                                             {$system['system_currency_symbol']}{$user->_data['user_wallet_balance']|number_format:2}
                                          </span>
                                       </a>
                                    </li>
                                    {/if}
                                    <!-- <li class="dropdown js_live-notifications walletButton">
                                 <a class=" dropdown-item" href="#">
                                   <div class="svg-container " style="padding: 5px;">
                                     <span class="img-wrap-style">
                                       <img src="{$system['system_url']}/content/themes/default/images/headerplusblack.png" alt="plucicon" class="whiteicon">
                                       <img src="{$system['system_url']}/content/themes/default/images/headerplusblue.png" alt="plucicon" class="blackicon">
                                     </span>
                                   </div>
                                 </a>
                                 </li> -->
                                 </ul>
                              </div>
                           </div>
                        </div>
                        {if $user->_logged_in}
                        <div class="nameSection">
                           <!-- navbar-wrapper -->
                           <div class="navbar-wrapper">
                              <ul class="clearfix">
                                 <!-- user-menu -->
                                 <li class="profileFor_desktop {$active_page}">
                                    <!-- <a href="#" class="user-menu" data-toggle="dropdown" data-display="static"> -->
                                    {if $active_page=='GlobalHub'}
                                    <a href="javascript:void();" id="currentUsername"
                                       class="rightuser-menu usernameOnHoverbtn openRightBlackBar">
                                       <!-- <span class="usernameOnHover">{$userGlobal->_data['user_firstname']}</span> -->
                                       <img class="lazyload" data-src="{$userGlobal->_data['global_user_picture']}" />
                                       <span class="">{$userGlobal->_data['user_firstname']}</span>
                                    </a>
                                    {else}
                                    <a href="javascript:void();" id="currentUsername" page='{$page}'
                                       class="rightuser-menu usernameOnHoverbtn openRightBlackBar">
                                       <!-- <span class="usernameOnHover">{$user->_data['user_firstname']}</span> -->
                                       <img class="lazyload" data-src="{$user->_data['user_picture']}" />
                                       <span class="">{$user->_data['user_firstname']}</span>
                                    </a>
                                    {/if}
                                 </li>

                                 {if $system['ads_enabled']}
                                 <!-- search button start-->
                                 <li class="dropdown js_live-notifications walletButton searchBtnMobile"
                                    style="margin-left: auto !important;">
                                    {if $active_page=='LocalHub'}
                                    <a class="dropdown-item" href="{$system['system_url']}/search">
                                       {else}
                                       <a class="dropdown-item" href="{$system['system_url']}/globalhub-search">
                                          {/if}
                                          <div class="svg-container " style="width:24px; height:24px; ">
                                             <i class="fa fa-search"></i>
                                          </div>
                                       </a>
                                 </li>
                                 <!-- back button start -->
                                 <li class="backBtnMobile">
                                    {if $first_url=='global' && $third_url=='settings'}
                                    <a class="btn btn-success" onclick="window.history.back();" data-toggle="tooltip"
                                       title="Back" data-placement="bottom">
                                       <i class="fas fa-chevron-left"></i>
                                    </a>
                                    {else if $first_url=='settings' || $sec_url=='settings' || $third_url=='settings'}
                                    <a class="btn btn-success backBtn" data-toggle="tooltip" title="Back to Menus"
                                       data-placement="bottom">
                                       <i class="fas fa-chevron-left"></i>
                                    </a>
                                    {elseif $page=='messages_global'}
                                    <a class="btn btn-success msgGlobal" data-toggle="tooltip" title="Back to Friends"
                                       data-placement="bottom">
                                       <i class="fas fa-chevron-left"></i>
                                    </a>
                                    {elseif $page=='messages'}
                                    <a class="btn btn-success msgLocal" data-toggle="tooltip" title="Back to Friends"
                                       data-placement="bottom">
                                       <i class="fas fa-chevron-left"></i>
                                    </a>
                                    {else}
                                    <a class="btn btn-success" onclick="window.history.back();" data-toggle="tooltip"
                                       title="back" data-placement="bottom">
                                       <i class="fas fa-chevron-left"></i>
                                    </a>
                                    {/if}
                                 </li>
                                 <!-- back button end -->
                                 <!-- search button-->
                                 {/if}
                                 {include file='_header.notifications.tpl'}
                              </ul>
                           </div>
                           <!-- navbar-wrapper -->
                        </div>
                        {/if}
                     </div>
                  </div>
                  {/if}
               </div>
            </div>
         </div>
         <!-- main-header -->
         <!-- ads -->
         {include file='_ads.tpl' _ads=$ads_master['header'] _master=true}
         <!-- ads -->
         <!-- <div class="right-sidebar headerTopBarSetting js_sticky-sidebar ">
            include file='right-sidebarblack.tpl'
         </div> -->
      </div>