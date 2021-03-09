{include file='_head.tpl' title='Main Page'}
{include file='_header_profile.tpl' title='Main Page'}
<!-- page content -->
<div class="container mt20 offcanvas canvas-profile-mobile global-profile">
   <div class="row">
      <!-- side panel -->
      {if $user->_logged_in}
      <div class="offcanvas-sidebar sidebar-left-ant" id="sidebarHiddSwip">
         {include file='_sidebar.tpl'}
      </div>
      {/if}
      <!-- side panel -->
   </div>
   <div class="row right-side-content-ant profile-mobile-layout flex-wrap profile_psge">
      <div class="home-page-middel-block ">
         <div class="row">
            <section class="profile_top_sec globle_hub_profile col-12">
               <div class="profile-header custom_p_header">
                  <button class="_toggle_btn" type="button"><i class="fas fa-ellipsis-v"></i> <i
                        class="fas fa-times"></i></button>
                  <!-- profile-cover -->
                  <div class="profile-cover-wrapper">
                     {if $profile['global_user_cover_id']}
                     <!-- full-cover -->
                     <img class="js_position-cover-full x-hidden" src="{$profile['global_user_cover']}">
                     <!-- full-cover -->
                     <!-- cropped-cover -->
                     <img
                        class="js_position-cover-cropped {if $user->_logged_in && $profile['user_cover_lightbox']}js_lightbox{/if}"
                        data-init-position="{$profile['user_cover_position']}"
                        data-id="{$profile['global_user_cover_id']}" data-image="{$profile['user_cover_full']}"
                        data-context="album" src="{$profile['global_user_cover']}"
                        alt="{$profile['user_firstname']} {$profile['user_lastname']}">
                     <!-- cropped-cover -->
                     {/if}
                     {if $profile['user_id'] == $user->_data['user_id']}
                     <!-- buttons -->
                     <div class="profile-cover-buttons">
                        <div class="profile-cover-change">
                           <i class="fa fa-camera js_x-uploader" data-handle="cover-user"></i>
                        </div>
                        <div class="profile-cover-position {if !$profile['global_user_cover']}x-hidden{/if}">
                           <input class="js_position-picture-val" type="hidden" name="position-picture-val">
                           <i class="fa fa-crop-alt js_init-position-picture" data-handle="user"
                              data-id="{$profile['user_id']}"></i>
                        </div>
                        <div class="profile-cover-position-buttons">
                           <i class="fa fa-check fa-fw js_save-position-picture"></i>
                        </div>
                        <div class="profile-cover-position-buttons">
                           <i class="fa fa-times fa-fw js_cancel-position-picture"></i>
                        </div>
                        <div class="profile-cover-delete {if !$profile['global_user_cover']}x-hidden{/if}">
                           <i class="fa fa-trash js_delete-cover" data-handle="cover-user"></i>
                        </div>
                     </div>
                     <!-- buttons -->
                     <!-- loaders -->
                     <div class="profile-cover-change-loader">
                        <div class="progress x-progress">
                           <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                              aria-valuemax="100"></div>
                        </div>
                     </div>
                     <div class="profile-cover-position-loader">
                        <i class="fa fa-arrows-alt mr5"></i>{__("Drag to reposition cover")}
                     </div>
                     <!-- loaders -->
                     {/if}
                  </div>
                  <!-- profile-cover -->
                  <div class="d-flex profile_sec w-100 align-items-end">
                     <!-- profile-avatar -->
                     <div class="profile_avatar_img">
                        <div class="profile-avatar-wrapper">
                           <!--<img {if $profile['user_picture_id']} {if $user->_logged_in && $profile['user_picture_lightbox']}class="js_lightbox"{/if} data-id="{$profile['user_picture_id']}" data-context="album" data-image="{$profile['user_picture_full']}" {elseif !$profile['user_picture_default']} class="js_lightbox-nodata" data-image="{$profile['user_picture']}" {/if}  src="{$profile['user_picture']}" alt="{$profile['user_firstname']} {$profile['user_lastname']}"> -->
                              <img {if $profile['global_user_picture_id']} {if $user->_logged_in &&
                           $profile['user_picture_lightbox']}class="js_lightbox"{/if}
                           data-id="{$profile['global_user_picture_id']}" data-context="album"
                           data-image="{$profile['global_user_picture']}" {elseif !$profile['user_picture_default']}
                           class="js_lightbox-nodata" data-image="{$profile['user_picture']}" {/if}
                           src="{$profile['global_user_picture']}" alt="{$profile['user_firstname']}
                           {$profile['user_lastname']}">
                           {if $profile['user_id'] == $user->_data['user_id']}
                           <!-- buttons -->
                           <div class="profile-avatar-change">
                              <i class="fa fa-camera js_x-uploader" data-handle="picture-user"></i>
                           </div>
                           <div
                              class="profile-avatar-crop {if $profile['user_picture_default'] || !$profile['user_picture_id']}x-hidden{/if}">
                              <i class="fa fa-crop-alt js_init-crop-picture" data-image="{$profile['user_picture']}"
                                 data-handle="user" data-system-url="{$system['system_url']}" data-id="{$profile['user_id']}"></i>
                           </div>
                           {if !$profile['user_picture_default']}
                           <div
                              class="profile-avatar-delete {if $profile['user_picture_default']  || !$profile['user_picture_id']}x-hidden{/if}">
                              <i class="fa fa-trash js_delete-picture" data-handle="picture-user"></i>
                           </div>
                           {/if}
                           <!-- buttons -->
                           <!-- loaders -->
                           <div class="profile-avatar-change-loader">
                              <div class="progress x-progress">
                                 <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                              </div>
                           </div>
                           <!-- loaders -->
                           {/if}
                        </div>
                     </div>
                     <!-- profile-avatar -->
                     <!-- profile-name -->
                     <div class="profile-name-wrapper profile_name_sec global_User_Bio">
                        <div>
                           <a href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}">{$profile['user_firstname']}
                              {$profile['user_lastname']}</a>
                           {if $profile['user_verified']}
                           <span class="blue_tick verified-badge" data-toggle="tooltip" data-placement="top"
                              title='{__("Verified User")}'>
                              <img class=""
                                 src="{$system['system_url']}/content/themes/default/images/svg/svgImg/tick.svg">
                           </span>
                           {/if}
                           {if $profile['user_subscribed']}
                           <a href="{$system['system_url']}/packages" class="badge badge-warning" data-toggle="tooltip"
                              data-placement="top" title="{$profile['package_name']} {__('Member')}">{__("PRO")}</a>
                           {/if}<br>
                           <span class="user_name_span">@{$profile['user_name']}</span>
                        </div>
                        <!-- posts count -->
                        <div class="PostFollowerWrap bg-transparent">
                           <div class="PostCount">
                              <span class="ml5">{$posts_count}</span><a
                                 href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}">{__("Posts")}</a>
                           </div>
                           <div class="PostCount">
                              <span class="ml5">{$profile['followers_count']}</span><a
                                 href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=followers">{__("Followers")}</a>
                           </div>
                           <!-- <div class="PostCount">
                              <span class="badge badge-pill badge-info">{$profile['followings_count']}</span>
                              <a class="nav-link active"
                              href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=followings">
                              {__("Followings")}</a>
                              </div> -->
                        </div>
                        <!-- profile-buttons -->
                        <div class="button_action">
                           <div class="profile-buttons-wrapper profile-button-style">
                              {if $user->_logged_in}
                              {if $user->_data['user_id'] != $profile['user_id']}
                              <!-- add friend -->
                              <!-- {if $profile['we_friends']}
                                 <button type="button" class="btn  btn-success btn-delete js_friend-remove"
                                     data-uid="{$profile['user_id']}">
                                 <img class=" " src="{$system['system_url']}/content/themes/default/images/svg/svgImg/plus_icon.svg">
                                 <span class="btn_image_"> {__("Friends")} </span>
                                 <span class="btn_image_hover"> {__("Delete")} </span>
                                 </button>
                                 {elseif $profile['he_request']}
                                 <button type="button" class="btn  btn-primary js_friend-accept"
                                     data-uid="{$profile['user_id']}">{__("Confirm")}</button>
                                 <button type="button" class="btn  btn-danger js_friend-decline"
                                     data-uid="{$profile['user_id']}">{__("Delete")}</button>
                                 {elseif $profile['i_request']}
                                 <button type="button" class="btn  btn-warning js_friend-cancel" data-uid="{$profile['user_id']}">
                                 <img class="btn_image_" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/tick.svg">{__("Friend Request Sent")}
                                 </button>
                                 {elseif !$profile['friendship_declined']}
                                 <button type="button" class="btn  btn-success js_friend-add" data-uid="{$profile['user_id']}">
                                 
                                     <img class="btn_image_" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                                 <img class="btn_image_hover" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                                     {__("Add Friend")}
                                 </button>
                                 {/if}-->
                              <!-- add friend  -->
                              <!-- follow -->
                              {if $profile['i_follow']}
                              <button type="button" class="btn  btn-info js_unfollow" data-uid="{$profile['user_id']}">
                                 <i class="fa fa-check mr5"></i>{__("Following")}
                              </button>
                              {else}
                              <button type="button" class="btn  btn-info js_follow" data-uid="{$profile['user_id']}">
                                 <i class="fa fa-rss mr5"></i>{__("Follow")}
                              </button>
                              {/if}
                              <!-- follow -->
                              <!-- message -->
                              <button type="button" class="  button-messages-profile js_chat_start"
                                 data-uid="{$profile['user_id']}"
                                 data-name="{$profile['user_firstname']} {$profile['user_lastname']}"
                                 data-link="{$profile['user_name']}">
                                 <span class="more_option">
                                    <img class=""
                                       src="{$system['system_url']}/content/themes/default/images/svg/svgImg/msg-icon.svg">
                                 </span>
                                 {* <span class="text-mobile-only">Message</span> *}
                              </button>
                              <!-- message -->
                              <!-- poke & report & block -->
                              <div class="d-inline-block dropdown button-profile-option desktop-only">
                                 <button type="button" class=" more_icon_img" data-toggle="dropdown"
                                    data-display="static">
                                    <span class="more_option">
                                       <img class=""
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/more-icon.svg">
                                    </span>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <!-- poke -->
                                    <!-- {if $system['pokes_enabled'] && !$profile['i_poked']}
                                       {if $profile['user_privacy_poke'] == "public" || ($profile['user_privacy_poke'] == "friends"
                                       && $profile['we_friends'])}
                                       <div class="dropdown-item pointer js_poke" data-id="{$profile['user_id']}"
                                           data-name="{$profile['user_firstname']} {$profile['user_lastname']}">
                                           <i class="fa fa-hand-point-right fa-fw mr10"></i>{__("Poke")}
                                       </div>
                                       {/if}
                                       {/if} -->
                                    <!-- poke -->
                                    <!-- report -->
                                    <div class="dropdown-item pointer js_report" data-handle="user"
                                       data-id="{$profile['user_id']}">
                                       <span class="more_option_img">
                                          <img class=""
                                             src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Flag.svg">
                                       </span>
                                       {__("Report")}
                                    </div>
                                    <!-- report -->
                                    <!-- block -->
                                    <div class="dropdown-item pointer js_block-user" data-uid="{$profile['user_id']}">
                                       <span class="more_option_img">
                                          <img class=""
                                             src="{$system['system_url']}/content/themes/default/images/svg/svgImg/block_icon.svg">
                                       </span>
                                       {__("Block")}
                                    </div>
                                    <!-- block -->
                                    <!-- manage -->
                                    {if $user->_is_admin}
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item"
                                       href="{$system['system_url']}/admincp/users/edit/{$profile['user_id']}">
                                       <span class="more_option_img">
                                          <img class=""
                                             src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Cog.svg">
                                       </span>
                                       {__("Edit in Admin Panel")}
                                    </a>
                                    {elseif $user->_is_moderator}
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item"
                                       href="{$system['system_url']}/modcp/users/edit/{$profile['user_id']}">
                                       <span class="more_option_img">
                                          <img class=""
                                             src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Cog.svg">
                                       </span>
                                       {__("Edit in Moderator Panel")}
                                    </a>
                                    {/if}
                                    <!-- manage -->
                                 </div>
                              </div>
                              <!-- poke & report & block -->
                              {else}
                              <!-- edit -->
                              <div class="button-profile-option">
                                 <a href="{$system['system_url']}/settings/profile/global" class=" edit_profile_icon">
                                    <span class="edit_profile_img">
                                       <img class=""
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/edit_icon_hover.svg">
                                    </span>
                                 </a>
                              </div>
                              <!-- edit -->
                              {/if}
                              {/if}
                           </div>
                        </div>
                     </div>
                  </div>
            </section>
            <!-- content panel -->
            <div class="col-md-12 col-xl-3 col-lg-4 about_sec">
               <div class="profileUpdatesDesign">
                  <!-- profile-header -->

                  <div class="globel-profile-about-sec about_content_sec">
                     <div class="addBioGlobal">
                        <h4>About</h4>
                     </div>
                     <div class="card" style="margin-bottom: 0px;">
                        <div class="card-body" style="padding-top: 0px;">
                           {if !is_empty($profile['user_biography'])}
                           <div class="about-bio">
                              <div class="js_readmore overflow-hidden">
                                 {$profile['user_biography']}
                              </div>
                           </div>
                           {else if ($profile['user_id'] == $user->_data['user_id'])}
                           <a href="{$system['system_url']}/settings/profile/global" class="btn addBio">
                              <!-- <i class="fas fa-plus-circle mr5"></i> -->
                              {__("Add your biography")}
                           </a>
                           {else}
                           <div class="about-bio">
                              <div class="js_readmore overflow-hidden">
                                 {$profile['user_biography']}
                              </div>
                           </div>
                           {/if}
                        </div>
                        <!-- profile-name -->
                        <!-- friends -->
                        <!-- {if $profile['friends_count'] > 0}
               <div class="card">
                   <div class="card-header bg-transparent">
                       <i class="fa fa-users mr5"></i>
                       <strong><a
                               href="{$system['system_url']}/{$profile['user_name']}/friends">{__("Friends")}</a></strong>
                       <span class="badge badge-pill badge-info ml5">{$profile['friends_count']}</span>
                       {if $profile['mutual_friends_count'] && $profile['mutual_friends_count'] > 0 && $active_page !="GlobalHub"}
                       <small>
                           (<span class="text-underline" data-toggle="modal"
                               data-url="users/mutual_friends.php?uid={$profile['user_id']}">{$profile['mutual_friends_count']}
                               {__("mutual friends")}</span>)
                       </small>
                       {/if}
                   </div>
                   <div class="card-body ptb10 plr10">
                       <div class="row no-gutters">
                           {foreach $profile['friends'] as $_friend}
                           <div class="col-3 col-sm-6 col-md-2 col-lg-4">
                               <div class="circled-user-box">
                                   <a class="user-box" href="{$system['system_url']}/{$_friend['user_name']}">
                                       <img alt="{$_friend['user_firstname']} {$_friend['user_lastname']}"
                                           src="{$_friend['user_picture']}" />
                                       <div class="name"
                                           title="{$_friend['user_firstname']} {$_friend['user_lastname']}">
                                           {$_friend['user_firstname']} {$_friend['user_lastname']}
                                       </div>
                                   </a>
                               </div>
                           </div>
                           {/foreach}
                       </div>
                   </div>
               </div>
               {/if} -->
                        <!-- friends -->
                        <!-- Followers start-->
                        {if $profile['followers_count'] > 0}
                        <div class="card">
                           <div class="card-body ptb10 plr10">
                              <div class="row no-gutters">
                                 {foreach $profile['followers'] as $followeuser}
                                 <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="circled-user-box sds">
                                       <a class="user-box"
                                          href="{$system['system_url']}/global-profile.php?username={$followeuser['user_name']}">
                                          <img {$followeuser['user_picture_full']}
                                             alt="{$followeuser['user_firstname']} {$followeuser['user_lastname']}"
                                             src="{$followeuser['user_picture']}" />
                                          <div class="name"
                                             title="{$followeuser['user_firstname']} {$followeuser['user_lastname']}">
                                             {$followeuser['user_firstname']} {$followeuser['user_lastname']}
                                          </div>
                                       </a>
                                    </div>
                                 </div>
                                 {/foreach}
                              </div>
                           </div>
                        </div>
                        {/if}
                        <!-- Followers end -->
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-12 col-xl-9 col-lg-8 js_conversation-container">
               <!-- profile-tabs -->
               <div class="profile-header-tabs custom-tabs for-mobile custom-scrollbar">
                  <ul class="mb20">
                     <li>
                        <a href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}" {if
                           $view=="" }class="active" {/if}>{__("Timeline")}
                        </a>
                     </li>
                     <!-- <li>
               <a href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=friends"
                   {if $view=="friends" || $view=="followers" || $view=="followings" }class="active" {/if}>{__("Friends")}
               </a>
               </li> -->
                     <li>
                        <a href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=followers"
                           {if $view=="followers" || $view=="followings" }class="active" {/if}>{__("Followers")}
                        </a>
                     </li>
                     <li>
                        <a href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=photos"
                           {if $view=="photos" || $view=="albums" || $view=="album" }class="active" {/if}>
                           {__("Photos")}
                        </a>
                     </li>
                     <li>
                        <a href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=videos"
                           {if $view=="videos" }class="active" {/if}>
                           {__("Videos")}
                        </a>
                     </li>
                     {if $system['pages_enabled']}
                     <li>
                        <a href="{$system['system_url']}/{$profile['user_name']}/likes" {if $view=="likes"
                           }class="active" {/if}>
                           {__("Likes")}
                        </a>
                     </li>
                     {/if}
                  </ul>
               </div>
               <!-- profile-tabs -->
               <!-- profile-content -->
               <div class="row">
                  <!-- panel [mutual-friends] -->
                  <!--  {if $user->_logged_in && $user->_data['user_id'] != $profile['user_id'] && !$profile['we_friends'] && !$profile['friendship_declined']}
               <div class="col-sm-12">
                   <div class="card panel-mutual-friends">
                       <div class="card-header text-uppercase">
                           {__("Do you know")} {$profile['user_firstname']}
                       </div>
                       <div class="card-body">
                           <div>
                               {__("To see what")} {$profile['user_firstname']} {__("shares with friends")},
                               <span class="text-primary">
                                   {__("send a friend request")}
                               </span>
                               <div class="float-right">
                                   {if $profile['he_request']}
                                   <button class="btn btn-primary  js_friend-accept"
                                       data-uid="{$profile['user_id']}">{__("Confirm")}</button>
                                   <button class="btn btn-secondary  js_friend-decline"
                                       data-uid="{$profile['user_id']}">{__("Delete")}</button>
                                   {elseif $profile['i_request']}
                                   <button class="btn btn-secondary  js_friend-cancel"
                                       data-uid="{$profile['user_id']}">
                                       <img class="btn_image_" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/tick.svg">{__("Friend Request Sent")}
                                   </button>
                                   {else}
                                   <button type="button" class="btn btn-success  js_friend-add"
                                       data-uid="{$profile['user_id']}">
                                   
                                       <img class="btn_image_" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                       <img class="btn_image_hover" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                                       {__("Add Friend")}
                                   </button>
                                   {/if}
                               </div>
                           </div>
                           {if $profile['mutual_friends_count'] && $profile['mutual_friends_count'] > 0 && $active_page !="GlobalHub"}
                           <div class="mt10 clearfix">
                               <ul class="float-left mr20">
                                   {foreach $profile['mutual_friends'] as $mutual_friend}
                                   <li>
                                       <a data-toggle="tooltip" data-placement="top"
                                           title="{$mutual_friend['user_firstname']} {$mutual_friend['user_lastname']}"
                                           class="post-avatar-picture"
                                           href="{$system['system_url']}/{$mutual_friend['user_name']}"
                                           style="background-image:url({$mutual_friend['user_picture']});">
                                       </a>
                                   </li>
                                   {if $mutual_friend@index > 3}{break}{/if}
                                   {/foreach}
                               </ul>
                               <div class="float-left mt10">
                                   <span class="text-underline" data-toggle="modal"
                                       data-url="users/mutual_friends.php?uid={$profile['user_id']}">{$profile['mutual_friends_count']}
                                       {__("Mutual Friends")}</span>
                               </div>
                           </div>
                           {/if}
                       </div>
                   </div>
               </div>
               {/if} -->
                  <!-- panel [mutual-friends] -->
                  <!-- view content -->
                  {if $view == ""}
                  <!-- center panel -->
                  <div class="col-lg-12 order-lg-2 content-middle-div">
                     <!-- publisher -->
                     {if $user->_logged_in}
                     {if $user->_data['user_id'] == $profile['user_id']}
                     {include file='global-profile/_publisher.tpl' _handle="me" _privacy=true}
                     {elseif $system['wall_posts_enabled'] && ( $profile['user_privacy_wall'] == 'friends' &&
                     $profile['we_friends'] || $profile['user_privacy_wall'] == 'public' )}
                     {include file='global-profile/_publisher.tpl' _handle="user" _id=$profile['user_id'] _privacy=true}
                     {/if}
                     {/if}
                     <!-- publisher -->
                     <!-- pinned post -->
                     {if $pinned_post}
                     {include file='_pinned_post.tpl' post=$pinned_post}
                     {/if}
                     <!-- pinned post -->
                     <!-- posts -->
                     {include file='global-profile/global_posts.tpl' _get="posts_profile" _id=$profile['user_id']}
                     <!-- posts -->
                  </div>
                  <!-- center panel -->
                  {elseif $view == "friends"}
                  <!-- friends -->
                  <div class="col-12 cardBodyHeight">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
               <i class="fa fa-users mr10"></i>{__("Friends")}
               </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs ">
                              <!-- <li class="nav-item">
               <a class="nav-link"
                   href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=friends">
                   {__("Friends")}
                   <span class="badge badge-pill badge-info">{$profile['friends_count']}</span>
               </a>
               </li> -->
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=followers">{__("Followers")}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=followings">{__("Followings")}</a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                     </div>
                  </div>
                  <!-- friends -->
                  {elseif $view == "followers"}
                  <!-- followers -->
                  <div class="col-12 cardBodyHeight">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
               <i class="fa fa-users mr10"></i>{__("Followers")}
               </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs ">
                              <!-- <li class="nav-item">
               <a class="nav-link"
                   href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=friends">{__("Friends")}</a>
               </li> -->
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=followers">
                                    {__("Followers")}
                                    <span class="badge badge-pill badge-info">{$profile['followers_count']}</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=followings">{__("Followings")}
                                    <span class="badge badge-pill badge-info">{$profile['followings_count']}</span>
                                 </a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body pb0">
                           {if $profile['followers_count'] > 0}
                           <ul class="row">
                              {foreach $profile['followers'] as $_user}
                              {include file='global-profile/global-profile__feeds_user.tpl' _tpl="box"
                              _connection=$_user["connection"]}
                              {/foreach}
                           </ul>
                           {if count($profile['followers']) >= $system['min_results_even']}
                           <!-- see-more -->
                           <div class="alert alert-info see-more mt0 mb20 js_see-more" data-get="followers"
                              data-uid="{$profile['user_id']}">
                              <span>{__("Load More")}</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           {/if}
                           {else}
                           <div class="text-center text-muted mt20 no_dataimg_ __no_data_contet__ ">
                              <img width="100%"
                                 src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results16.jpg">
                              <p class="text-center text-muted mt10">
                                 {$profile['user_firstname']} {__("doesn't have followers")}
                              </p>
                           </div>
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- followers -->
                  {elseif $view == "followings"}
                  <!-- followings -->
                  <div class="col-12 cardBodyHeight">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
               <i class="fa fa-users mr10"></i>{__("Followers")}
               </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs ">
                              <!-- <li class="nav-item">
               <a class="nav-link"
                   href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=friends">{__("Friends")}</a>
               </li> -->
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=followers">
                                    <strong class="pr5">{__("Followers")}</strong>
                                    <span class="badge badge-pill badge-info">{$profile['followers_count']}</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=followings">
                                    {__("Followings")}
                                    <span class="badge badge-pill badge-info">{$profile['followings_count']}</span>
                                 </a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body pb0">
                           {if $profile['followings_count'] > 0}
                           <ul class="row">
                              {foreach $profile['followings'] as $_user}
                              {include file='global-profile/global-profile__feeds_user.tpl' _tpl="box"
                              _connection=$_user["connection"]}
                              {/foreach}
                           </ul>
                           {if count($profile['followings']) >= $system['min_results_even']}
                           <!-- see-more -->
                           <div class="alert alert-info see-more mt0 mb20 js_see-more" data-get="followings"
                              data-uid="{$profile['user_id']}">
                              <span>{__("Load More")}</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           {/if}
                           {else}
                           <div class="text-center text-muted mt20 no_dataimg_ __no_data_contet__ ">
                              <img width="100%"
                                 src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results16.jpg">
                              <p class="text-center text-muted mt10">
                                 {$profile['user_firstname']} {__("doesn't have followings")}
                              </p>
                           </div>
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- followings -->
                  {elseif $view == "photos"}
                  <!-- photos -->
                  <div class="col-12 cardBodyHeight">
                     <div class="card panel-photos">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
               <i class="fa fa-images mr10"></i>{__("Photos")}
               </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs ">
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=photos">{__("Photos")}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=albums">{__("Albums")}</a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body">
                           {if $profile['photos']}
                           <ul class="row no-gutters">
                              {foreach $profile['photos'] as $photo}
                              {include file='global-profile/global-profile__feeds_photo.tpl' _context="photos"}
                              {/foreach}
                           </ul>
                           <!-- see-more -->
                           <div class="alert alert-info see-more mt20 js_see-more" data-get="photos"
                              data-id="{$profile['user_id']}" data-type='user'>
                              <span>{__("Load More")}</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           {else}
                           <p class="text-center text-muted mt10 no_dataimg_">
                              <img width="100%"
                                 src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results4.png">
                           <p>{$profile['user_firstname']} {__("doesn't have Photos")}</p>
                           </p>
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- photos -->
                  {elseif $view == "albums"}
                  <!-- albums -->
                  <div class="col-12 cardBodyHeight">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
               <i class="fa fa-images mr10"></i>{__("Photos")}
               </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs ">
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=photos">{__("Photos")}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/global-profile.php?username={$profile['user_name']}&view=albums">{__("Albums")}</a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body">
                           {if $profile['albums']}
                           <ul class="row">
                              {foreach $profile['albums'] as $album}
                              {{include file='global-profile/global-profile__feeds_album.tpl'}}
                              {/foreach}
                           </ul>
                           {if count($profile['albums']) >= $system['max_results_even']}
                           <!-- see-more -->
                           <div class="alert alert-info see-more js_see-more" data-get="albums"
                              data-id="{$profile['user_id']}" data-type='user'>
                              <span>{__("Load More")}</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           {/if}
                           {else}
                           <p class="text-center text-muted mt10 no_dataimg_">
                              <img width="100%"
                                 src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results4.png">
                           <p> {$profile['user_firstname']} {__("doesn't have albums")}</p>
                           </p>
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- albums -->
                  {elseif $view == "album"}
                  <!-- albums -->
                  <div class="col-12 cardBodyHeight">
                     <div class="card panel-photos">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- back to albums -->
                           <div class="float-right">
                              <a href="{$system['system_url']}/global-profile/{$profile['user_name']}/albums"
                                 class="btn  btn-light">
                                 <i class="fa fa-arrow-circle-left mr5"></i>{__("Back to Albums")}
                              </a>
                           </div>
                           <!-- back to albums -->
                           <!-- panel title -->
                           <!-- <div class="mb20">
               <i class="fa fa-images mr10"></i>{__("Photos")}
               </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs">
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/global-profile/{$profile['user_name']}/photos">{__("Photos")}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/global-profile/{$profile['user_name']}/albums">{__("Albums")}</a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body">
                           {include file='global-profile/global_album.tpl'}
                        </div>
                     </div>
                  </div>
                  <!-- albums -->
                  {elseif $view == "videos"}
                  <!-- videos -->
                  <div class="col-12 cardBodyHeight">
                     <div class="card panel-videos">
                        <div class="card-header with-icon">
                           <!-- panel title -->
                           <!-- <div class="mb20">
               <i class="fa fa-video mr10"></i>{__("Videos")}
               </div> -->
                           <!-- panel title -->
                        </div>
                        <div class="card-body">
                           {if $profile['videos']}
                           <ul class="row no-gutters">
                              {foreach $profile['videos'] as $video}
                              {include file='__feeds_video.tpl'}
                              {/foreach}
                           </ul>
                           <!-- see-more -->
                           <div class="alert alert-info see-more js_see-more" data-get="videos"
                              data-id="{$profile['user_id']}" data-type='user'>
                              <span>{__("Load More")}</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           {else}
                           <div class="__no_data_contet__ text-center">
                              <p class="text-center text-muted __nodata-img___">
                                 <img width="100%"
                                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results15.png">
                              <p>{$profile['user_firstname']} {__("doesn't have videos")}</p>
                              </p>
                           </div>
                           <!-- <p class="text-center text-muted mt10 no_dataimg_">
               <img width="100%"
                       src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results15.png">
                   <p>{$profile['user_firstname']} {__("doesn't have videos")}</p>
               </p> -->
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- videos -->
                  {elseif $view == "likes"}
                  <!-- likes -->
                  <div class="col-12 cardBodyHeight">
                     <div class="card">
                        <div class="card-header with-icon">
                           <!-- panel title -->
                           <i class="fa fa-thumbs-up mr10"></i>{__("Likes")}
                           <!-- panel title -->
                        </div>
                        <div class="card-body">
                           {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_pages'] ==
                           "public"
                           || ($profile['user_privacy_pages'] == "friends" && $profile['we_friends'])}
                           {if count($profile['pages']) > 0}
                           <ul class="row">
                              {foreach $profile['pages'] as $_page}
                              {include file='__feeds_page.tpl' _tpl="box"}
                              {/foreach}
                           </ul>
                           {if count($profile['pages']) >= $system['max_results_even']}
                           <!-- see-more -->
                           <div class="alert alert-info see-more js_see-more" data-get="profile_pages"
                              data-uid="{$profile['user_id']}">
                              <span>{__("Load More")}</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           {/if}
                           {else}
                           <p class="text-center text-muted mt10 no_dataimg_">
                              <img width="100%"
                                 src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results16.jpg">
                           <p> {__("No pages to show")}</p>
                           </p>
                           {/if}
                           {else}
                           <p class="text-center text-muted mt10 no_dataimg_">
                              <img width="100%"
                                 src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results13.png">
                           <p> {__("No pages to show")}</p>
                           </p>
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- likes -->
                  {elseif $view == "groups"}
                  <!-- groups -->
                  <div class="col-12 cardBodyHeight">
                     <div class="card">
                        <div class="card-header with-icon">
                           <!-- panel title -->
                           <i class="fa fa-users mr10"></i>{__("Groups")}
                           <!-- panel title -->
                        </div>
                        <div class="card-body">
                           {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_groups'] ==
                           "public" || ($profile['user_privacy_groups'] == "friends" && $profile['we_friends'])}
                           {if count($profile['groups']) > 0}
                           <ul class="row">
                              {foreach $profile['groups'] as $_group}
                              {include file='__feeds_group.tpl' _tpl="box"}
                              {/foreach}
                           </ul>
                           {if count($profile['groups']) >= $system['max_results_even']}
                           <!-- see-more -->
                           <div class="alert alert-info see-more js_see-more" data-get="profile_groups"
                              data-uid="{$profile['user_id']}">
                              <span>{__("Load More")}</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           {/if}
                           {else}
                           <div class="__no_data_contet__ text-center">
                              <p class="text-center text-muted __nodata-img___">
                                 <img width="100%"
                                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results17.png">
                              <p> {__("No groups to show")} </p>
                              </p>
                           </div>
                           <!-- <p class="text-center text-muted mt10 no_dataimg_">
               <img width="100%"
                       src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results17.png">
                   <p>{__("No groups to show")}</p>
               </p> -->
                           {/if}
                           {else}
                           <div class="__no_data_contet__ text-center">
                              <p class="text-center text-muted __nodata-img___">
                                 <img width="100%"
                                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results17.png">
                              <p> {__("No groups to show")} </p>
                              </p>
                           </div>
                           <!-- <p class="text-center text-muted mt10 no_dataimg_">
               <img width="100%"
                       src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results117.svg">
                   <p>{__("No groups to show")}</p>
               </p> -->
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- groups -->
                  {elseif $view == "events"}
                  <!-- events -->
                  <div class="col-12 cardBodyHeight">
                     <div class="card">
                        <div class="card-header with-icon">
                           <!-- panel title -->
                           <i class="fa fa-calendar mr10"></i>{__("Events")}
                           <!-- panel title -->
                        </div>
                        <div class="card-body">
                           {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_events'] ==
                           "public" || ($profile['user_privacy_events'] == "friends" && $profile['we_friends'])}
                           {if count($profile['events']) > 0}
                           <ul class="row">
                              {foreach $profile['events'] as $_event}
                              {include file='__feeds_event.tpl' _tpl="box"}
                              {/foreach}
                           </ul>
                           {if count($profile['events']) >= $system['max_results_even']}
                           <!-- see-more -->
                           <div class="alert alert-info see-more js_see-more" data-get="profile_events"
                              data-uid="{$profile['user_id']}">
                              <span>{__("Load More")}</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           {/if}
                           {else}
                           <p class="text-center text-muted mt10 no_dataimg_">
                              <img width="100%"
                                 src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results1.png">
                           <p> {__("No events to show")}</p>
                           </p>
                           {/if}
                           {else}
                           <p class="text-center text-muted mt10 no_dataimg_">
                              <img width="100%"
                                 src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results2.png">
                           <p> {__("No events to show")}</p>
                           </p>
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- events -->
                  {/if}
                  <!-- view content -->
               </div>
               <!-- profile-content -->
            </div>
            <!-- profile-header -->
         </div>
      </div>
      <!-- content panel -->
      <div class="">
         <div class="right-sidebar js_sticky-sidebar">
            {include file='right-sidebar.tpl'}
         </div>
      </div>
   </div>
</div>
<!-- page content -->
{include file='global-profile/global-profile_footer.tpl'}
{if $gift}
<script>
   $(function () {
      modal('#gift');
   });
</script>
{/if}