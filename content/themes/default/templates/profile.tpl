{include file='_head.tpl'}
{include file='_header_profile.tpl'}
<!-- page content -->
<div class="container mt20 offcanvas canvas-profile-mobile">
   <div class="__overlay__" id="__overlay__"></div>
   <div class="row">
      {if $user->_logged_in}
      <div class="offcanvas-sidebar sidebar-left-ant" id="sidebarHiddSwip">
         {include file='_sidebar.tpl'}
      </div>
      {/if}
   </div>
   <div class="row right-side-content-ant profile-mobile-layout flex-wrap profile_psge">
      <div class="home-page-middel-block ">
         <div class="row">
            <section class="profile_top_sec local_hub_profile col-12">
               <!-- profile-header -->
               <div class="profile-header custom_p_header">

                  <button class="_toggle_btn" type="button"><i class="fas fa-ellipsis-v"></i> <i
                        class="fas fa-times"></i></button>
                  <!-- profile-cover -->
                  <div class="profile-cover-wrapper">
                     {if $profile['user_cover_id']}
                     <img class="js_position-cover-full x-hidden" src="{$profile['user_cover_full']}">
                     <img
                        class="js_position-cover-cropped {if $user->_logged_in && $profile['user_cover_lightbox']}js_lightbox{/if}"
                        data-init-position="{$profile['user_cover_position']}" data-id="{$profile['user_cover_id']}"
                        data-image="{$profile['user_cover_full']}" data-context="album" src="{$profile['user_cover']}"
                        alt="{$profile['user_firstname']} {$profile['user_lastname']}">
                     {/if}
                     {if $profile['user_id'] == $user->_data['user_id']}
                     <div class="profile-cover-buttons">
                        <div class="profile-cover-change">
                           <i class="fa fa-camera js_x-uploader" data-handle="cover-user"></i>
                        </div>
                        <div class="profile-cover-position {if !$profile['user_cover']}x-hidden{/if}">
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
                        <div class="profile-cover-delete {if !$profile['user_cover']}x-hidden{/if}">
                           <i class="fa fa-trash js_delete-cover" data-handle="cover-user"></i>
                        </div>
                     </div>
                     <div class="profile-cover-change-loader">
                        <div class="progress x-progress">
                           <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                              aria-valuemax="100"></div>
                        </div>
                     </div>
                     <div class="profile-cover-position-loader">
                        <i class="fa fa-arrows-alt mr5"></i>{__("Drag to reposition cover")}
                     </div>
                     {/if}
                  </div>
                  <!-- profile-cover  -->
                  <div class="d-flex profile_sec w-100 align-items-end">
                     <div class="profile_avatar_img">
                        <!-- profile-avatar -->
                        <div class="profile-avatar-wrapper">
                           <img {if $profile['user_picture_id']} {if $user->_logged_in &&
                           $profile['user_picture_lightbox']}class="js_lightbox"{/if}
                           data-id="{$profile['user_picture_id']}"
                           data-context="album" data-image="{$profile['user_picture']}" {elseif
                           !$profile['user_picture_default']} class="js_lightbox-nodata"
                           data-image="{$profile['user_picture']}" {/if} {if
                           $profile['user_picture_default']} src="{$profile['user_picture']}" {else}
                           src="{$profile['user_picture']}" {/if}
                           alt="{$profile['user_firstname']} {$profile['user_lastname']}">
                           {if $profile['user_id'] == $user->_data['user_id']}
                           <!-- buttons -->
                           <div class="profile-avatar-change">
                              <i class="fa fa-camera js_x-uploader" data-handle="picture-user"></i>
                           </div>
                           <div
                              class="profile-avatar-crop {if $profile['user_picture_default'] || !$profile['user_picture_id']}x-hidden{/if}">
                              <i class="fa fa-crop-alt js_init-crop-picture" data-image="{$profile['user_picture']}"  data-system-url="{$system['system_url']}"
                                 data-handle="user" data-id="{$profile['user_id']}"></i>
                           </div>
                           {if !$profile['user_picture_default']}
                           <div class="profile-avatar-delete {if $profile['user_picture_default']}x-hidden{/if}">
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
                        <!-- profile-avatar -->
                     </div>
                     <div class="profile_name_sec">
                        <!-- profile-name -->
                        <div class="profile-name-wrapper">
                           <a href="{$system['system_url']}/{$profile['user_name']}">{$profile['user_firstname']}
                              {$profile['user_lastname']}</a>
                           {if $profile['user_verified']}
                           <i data-toggle="tooltip" data-placement="top" title='{__("Verified User")}'
                              class="fa fa-check-circle fa-fw verified-badge"></i>
                           {/if}
                           {if $profile['user_subscribed']}
                           <a href="{$system['system_url']}/packages" class="badge  badge-warning" data-toggle="tooltip"
                              data-placement="top" title="{$profile['package_name']} {__('Member')}">{__("PRO")}</a>
                           {/if}
                        </div>
                        <!-- profile-buttons -->
                        <div class="button_action">
                           <div class="profile-buttons-wrapper profile-button-style">
                              {if $user->_logged_in}
                              {if $user->_data['user_id'] != $profile['user_id']}
                              <!-- add friend -->
                              {if $profile['we_friends']}
                              <button type="button" class="btn btn-success btn-delete js_friend-remove"
                                 data-uid="{$profile['user_id']}">
                                 <img class="btn_image"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/newchecked1.svg">
                                 <img class="btn_image_hover"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/delete_icon.svg">
                                 <span class="btn_image_"> {__("Friends")} </span>
                                 <span class="btn_image_hover"> {__("Delete")} </span>
                              </button>
                              {elseif $profile['he_request']}
                              <button type="button" class="btn btn-primary js_friend-accept"
                                 data-uid="{$profile['user_id']}"> <span class="request_aspct"><img
                                       src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/tick.svg">
                                 </span>
                                 {__("Confirm")}
                              </button>
                              <button type="button" class="btn btn-danger js_friend-decline"
                                 data-uid="{$profile['user_id']}"><span class="request_dlt">
                                    <img
                                       src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/delete_icon.svg">
                                 </span>
                                 {__("Delete")}
                              </button>
                              {elseif $profile['i_request']}
                              <button type="button" class="btn btn-warning js_friend-cancel"
                                 data-uid="{$profile['user_id']}">
                                 <img class="btn_image_"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/tick.svg">
                                 Request Sent
                              </button>
                              {elseif !$profile['friendship_declined']}
                              <button type="button" class="btn btn-success js_friend-add"
                                 data-uid="{$profile['user_id']}">
                                 <img class="btn_image_"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                                 <img class="btn_image_hover"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                                 {__("Add Friend ")}
                              </button>
                              {/if}
                              <!-- add friend -->
                              <!-- follow -->
                              <!-- {if $profile['i_follow']}
                                 <button type="button" class="btn  btn-info js_unfollow" data-uid="{$profile['user_id']}">
                                     <i class="fa fa-check mr5"></i>{__("Following")}
                                 </button>
                                 {else}
                                 <button type="button" class="btn  btn-info js_follow" data-uid="{$profile['user_id']}">
                                     <i class="fa fa-rss mr5"></i>{__("Follow")}
                                 </button>
                                 {/if} -->
                              <!-- follow -->
                              <!-- message -->
                              <button type="button" class="js_chat_start button-messages-profile"
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
                                    data-display="static" style="width:unset;">
                                    <span class="more_option">
                                       <img class=""
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/more-icon.svg">
                                    </span>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <!-- poke -->
                                    {if $system['pokes_enabled'] && !$profile['i_poked']}
                                    {if $profile['user_privacy_poke'] == "public" || ($profile['user_privacy_poke'] ==
                                    "friends"
                                    && $profile['we_friends'])}
                                    <div class="dropdown-item pointer js_poke" data-id="{$profile['user_id']}"
                                       data-name="{$profile['user_firstname']} {$profile['user_lastname']}">
                                       <span class="more_option_img">
                                          <img class=""
                                             src="{$system['system_url']}/content/themes/default/images/svg/svgImg/poke.svg">
                                       </span>
                                       {__("Poke")}
                                    </div>
                                    {/if}
                                    {/if}
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
                                             src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Cog.svg">
                                       </span>
                                       {__("Edit in Admin Panel")}
                                    </a>
                                    {elseif $user->_is_moderator}
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item"
                                       href="{$system['system_url']}/modcp/users/edit/{$profile['user_id']}">
                                       <span class="more_option_img">
                                          <img class=""
                                             src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Cog.svg">
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
                                 <a href="{$system['system_url']}/settings/profile" class=" edit_profile_icon">
                                    <span class="edit_profile_img">
                                       <img class=""
                                          src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/edit_icon_hover.svg">
                                    </span>
                                 </a>
                              </div>
                              <!-- edit -->
                              {/if}
                              {/if}
                           </div>
                        </div>
                        <!-- profile-buttons -->
                        <!-- profile-name -->
                     </div>
                  </div>
               </div>
               <!-- profile-header -->
            </section>
            <div class="col-md-12 col-xl-3 col-lg-4 about_sec">
               <div class="profileUpdatesDesign">
                  <!-- panel [mutual-friends] -->
                  {if $user->_logged_in && $user->_data['user_id'] != $profile['user_id'] && !$profile['we_friends'] &&
                  !$profile['friendship_declined']}
                  <div class="card panel-mutual-friends" style="display:none;">
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
                              <!-- add friend -->
                              {if $profile['he_request']}
                              <button class="btn btn-primary  js_friend-accept" data-uid="{$profile['user_id']}"> <span
                                    class="request_dlt">
                                    <img
                                       src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/delete_icon.svg">
                                 </span>
                                 {__("Confirm")}
                              </button>
                              <button class="btn btn-secondary  js_friend-decline"
                                 data-uid="{$profile['user_id']}"><span class="request_dlt">
                                    <img
                                       src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/delete_icon.svg">
                                 </span>
                                 {__("Delete")}
                              </button>
                              {elseif $profile['i_request']}
                              <button class="btn btn-secondary  js_friend-cancel" data-uid="{$profile['user_id']}">
                                 <img class="btn_image_"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/tick.svg">Request
                                 Sent
                              </button>
                              {else}
                              <button type="button" class="btn btn-success  js_friend-add"
                                 data-uid="{$profile['user_id']}">
                                 <img class="btn_image_"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                                 <img class="btn_image_hover"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                                 {__("Add Friend")}
                              </button>
                              {/if}
                              <!-- add friend -->
                           </div>
                        </div>
                        {if $profile['mutual_friends_count'] && $profile['mutual_friends_count'] > 0}
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
                  {/if}
                  <!-- panel [mutual-friends] -->
                  <div class="about_content_sec">
                     <div class="addBioGlobal">
                        <h4>About</h4>
                     </div>
                     <!-- panel [about] -->
                     <div class="card" style="margin-bottom: 0px;">
                        <div class="card-body" style="padding-top: 0px;">
                           {if !is_empty($profile['user_biography'])}
                           <div class="about-bio">
                              <div class="js_readmore overflow-hidden">
                                 {$profile['user_biography']}
                              </div>
                           </div>
                           {/if}
                           <ul class="about-list">
                              {if $profile['user_subscribed']}
                              <li class="package" {if $profile['package_color']}
                                 style="background: {$profile['package_color']}" {/if}>
                                 <i class="fa fa-bolt fa-fw"></i> {$profile['package_name']} {__("Member")}
                              </li>
                              {/if}
                              {if $profile['user_work_title']}
                              {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_work'] ==
                              "public" || ($profile['user_privacy_work'] == "friends" && $profile['we_friends'])}
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" "
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/work_icon.svg">
                                    </div>
                                    <div class="about_list_text">
                                       {$profile['user_work_title']}
                                       {if $profile['user_work_place']}
                                       {__("at")}
                                       {if $profile['user_work_url']}
                                       <a target="_blank"
                                          href="{$profile['user_work_url']}">{$profile['user_work_place']}</a>
                                       {else}
                                       <span>{$profile['user_work_place']}</span>
                                       {/if}
                                       {/if}
                                    </div>
                                 </div>
                              </li>
                              {/if}
                              {/if}
                              {if $profile['user_edu_major']}
                              {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_education']
                              ==
                              "public" || ($profile['user_privacy_education'] == "friends" && $profile['we_friends'])}
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" "
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/univsty.svg">
                                    </div>
                                    <div class="about_list_text">
                                       {__("Studied")} {$profile['user_edu_major']}
                                       {__("at")} <span class="text-info">{$profile['user_edu_school']}</span>
                                       {if $profile['user_edu_class']}
                                       <div class="details">
                                          {__("Class of")} {$profile['user_edu_class']}
                                       </div>
                                       {/if}
                                    </div>
                                 </div>
                              </li>
                              {/if}
                              {/if}
                              {if $profile['user_current_city']}
                              {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_location'] ==
                              "public" || ($profile['user_privacy_location'] == "friends" && $profile['we_friends'])}
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" "
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/home-icb.svg">
                                    </div>
                                    <div class="about_list_text">
                                       {__("Lives in")} <span class="text-info">{$profile['user_current_city']}</span>
                                    </div>
                                 </div>
                              </li>
                              {/if}
                              {/if}
                              {if $profile['user_hometown']}
                              {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_location'] ==
                              "public" || ($profile['user_privacy_location'] == "friends" && $profile['we_friends'])}
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" "
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/location_icon.svg">
                                    </div>
                                    <div class="about_list_text">
                                       {__("From")} <span class="text-info">{$profile['user_hometown']}</span>
                                    </div>
                                 </div>
                              </li>
                              {/if}
                              {/if}
                              <li>
                                 <div class="about-list-item d-flex">
                                    {if $profile['user_gender'] == "male"}
                                    <div class="about_list_img">
                                       <img class=" "
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_friends.svg">
                                    </div>
                                    <div class="about_list_text">
                                       {__("Male")}
                                    </div>
                                    {elseif $profile['user_gender'] == "female"}
                                    <div class="about_list_img">
                                       <img class=" "
                                          src="{$system['system_url']}/content/themes/default/images/user_defoult_img.jpg">
                                    </div>
                                    <div class="about_list_text">
                                       {__("Female")}
                                    </div>
                                    {else}
                                    <div class="about_list_img">
                                       <img class=""
                                          src="{$system['system_url']}/content/themes/default/images/user_defoult_img.jpg">
                                    </div>
                                    <div class="about_list_text">
                                       {__("Other")}
                                    </div>
                                    {/if}
                                 </div>
                              </li>
                              {if $profile['user_relationship']}
                              {if $profile['user_id'] == $user->_data['user_id'] ||
                              $profile['user_privacy_relationship']
                              == "public" || ($profile['user_privacy_relationship'] == "friends" &&
                              $profile['we_friends'])}
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" "
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/reletion-icon.svg">
                                    </div>
                                    <div class="about_list_text">
                                       {if $profile['user_relationship'] == "relationship"}
                                       {__("In a relationship")}
                                       {elseif $profile['user_relationship'] == "complicated"}
                                       {__("It's complicated")}
                                       {else}
                                       {__($profile['user_relationship']|ucfirst)}
                                       {/if}
                                    </div>
                                 </div>
                              </li>
                              {/if}
                              {/if}
                              {if $profile['user_birthdate'] != null}
                              {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_birthdate']
                              ==
                              "public" || ($profile['user_privacy_birthdate'] == "friends" && $profile['we_friends'])}
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" "
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/dob_icon.svg">
                                    </div>
                                    <div class="about_list_text">
                                       {if $system['system_datetime_format'] == "d/m/Y H:i"}
                                       {$profile['user_birthdate']|date_format:"%d/%m/%Y"}
                                       {else}
                                       {$profile['user_birthdate']|date_format:"%m/%d/%Y"}
                                       {/if}
                                    </div>
                                 </div>
                              </li>
                              {/if}
                              {/if}
                              {if $profile['user_website']}
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" "
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg">
                                    </div>
                                    <div class="about_list_text">
                                       <a target="_blank"
                                          href="{$profile['user_website']}">{$profile['user_website']}</a>
                                    </div>
                                 </div>
                              </li>
                              {/if}
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" "
                                          src="{$system['system_url']}/content/themes/default/images/svg/svgImg/eye_icon.svg">
                                    </div>
                                    <div class="about_list_text">
                                       {__("Followed by")}
                                       <a href="{$system['system_url']}/{$profile['user_name']}/followers"
                                          class="friendsCount">
                                          {$profile['followers_count']} {__("people")}</a>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <!-- panel [about] -->
                     <!-- friends -->
                     {if $profile['friends_count'] > 0}
                     <div class="card" style="margin-bottom: 0px;">
                        <div class="card-header bg-transparent subHeadingGlobal">
                           <!-- <i class="fa fa-users mr5"></i> -->
                           <a href="{$system['system_url']}/{$profile['user_name']}/friends">{__("Friends")}</a>
                           <span>{$profile['friends_count']}</span>
                           {if $profile['mutual_friends_count'] && $profile['mutual_friends_count'] > 0}
                           <span class="text-underline" data-toggle="modal"
                              data-url="users/mutual_friends.php?uid={$profile['user_id']}">({$profile['mutual_friends_count']}
                              {__("mutual friends")})</span>
                           {/if}
                        </div>
                        <div class="card-body ptb10 plr10">
                           <div class="row no-gutters">
                              {foreach $profile['friends'] as $_friend}
                              <div class="col-3 col-sm-4 col-md-4 col-lg-3">
                                 <div class="circled-user-box safa">
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
                     {/if}
                     <!-- friends -->
                  </div>
               </div>
            </div>
            <!-- content panel -->
            <div class="col-md-12 col-xl-9 col-lg-8 js_conversation-container">
               <!-- profile-tabs -->
               <div class="profile-header-tabs custom-tabs for-mobile">
                  <ul>
                     <li>
                        <a href="{$system['system_url']}/{$profile['user_name']}" {if $view=="" }class="active" {/if}>
                           {__("Timeline")}
                        </a>
                     </li>
                     <li>
                        <a href="{$system['system_url']}/{$profile['user_name']}/friends" {if $view=="friends" ||
                           $view=="followers" || $view=="followings" }class="active" {/if}>
                           {__("Friends")}
                        </a>
                     </li>
                     <li>
                        <a href="{$system['system_url']}/{$profile['user_name']}/photos" {if $view=="photos" ||
                           $view=="albums" || $view=="album" }class="active" {/if}>
                           {__("Photos")}
                        </a>
                     </li>
                     <li>
                        <a href="{$system['system_url']}/{$profile['user_name']}/videos" {if $view=="videos"
                           }class="active" {/if}>
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
                     {if $system['groups_enabled']}
                     <li>
                        <a href="{$system['system_url']}/{$profile['user_name']}/groups" {if $view=="groups"
                           }class="active" {/if}>
                           {__("Groups")}
                        </a>
                     </li>
                     {/if}
                     {if $system['events_enabled']}
                     <li>
                        <a href="{$system['system_url']}/{$profile['user_name']}/events" {if $view=="events"
                           }class="active" {/if}>
                           {__("Events")}
                        </a>
                     </li>
                     {/if}
                  </ul>
               </div>
               <!-- profile-tabs -->
               <!-- profile-content -->
               <div class="row">
                  <!-- view content -->
                  {if $view == ""}
                  <!-- left panel -->

                  <!-- left panel -->
                  <!-- center panel -->
                  <div class="col-lg-12">
                     <!-- publisher -->
                     {if $user->_logged_in}
                     {if $user->_data['user_id'] == $profile['user_id']}
                     {include file='_publisher.tpl' _handle="me" _privacy=true}
                     {elseif $system['wall_posts_enabled'] && ( $profile['user_privacy_wall'] == 'friends' &&
                     $profile['we_friends'] || $profile['user_privacy_wall'] == 'public' )}
                     {include file='_publisher.tpl' _handle="user" _id=$profile['user_id'] _privacy=true}
                     {/if}
                     {/if}

                     <!-- publisher -->
                     <!-- pinned post -->
                     {if $pinned_post}
                     {include file='_pinned_post.tpl' post=$pinned_post}
                     {/if}
                     <!-- pinned post -->
                     <!-- posts -->
                     {include file='_posts.tpl' _get="posts_profile" _id=$profile['user_id']}
                     <!-- posts -->
                  </div>
                  <!-- center panel -->
                  {elseif $view == "friends"}
                  <!-- friends -->
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
                              <i class="fa fa-users mr10"></i>{__("Friends")}
                              </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs">
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/{$profile['user_name']}/friends">
                                    {__("Friends")}
                                    <span class="badge badge-pill badge-info">{$profile['friends_count']}</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/{$profile['user_name']}/followers">{__("Followers")}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/{$profile['user_name']}/followings">{__("Followings")}</a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body pb0">
                           {if $profile['friends_count'] > 0}
                           <ul class="row wrverv">
                              {foreach $profile['friends'] as $_user}
                              {include file='__feeds_user.tpl' _tpl="box" _connection=$_user["connection"]}
                              {/foreach}
                           </ul>
                           {if count($profile['friends']) >= $system['min_results_even']}
                           <!-- see-more -->
                           <div class="alert alert-info see-more mt0 mb20 js_see-more" data-get="friends"
                              data-page="profile" data-uid="{$profile['user_id']}">
                              <span>{__("Load More")}</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           {/if}
                           {else}
                           <div class="text-center text-muted mt20 no_dataimg_  __no_data_contet__ ">
                              <img width="100%"
                                 src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results16.jpg">
                              <p class="text-center text-muted mt10">
                                 {$profile['user_firstname']} {__("try adding new friends.")}
                              </p>
                           </div>
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- friends -->
                  {elseif $view == "followers"}
                  <!-- followers -->
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
                              <i class="fa fa-users mr10"></i>{__("Friends")}
                              </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs">
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/{$profile['user_name']}/friends">{__("Friends")}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/{$profile['user_name']}/followers">
                                    {__("Followers")}
                                    <span class="badge badge-pill badge-info">{$profile['followers_count']}</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/{$profile['user_name']}/followings">{__("Followings")}</a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body pb0">
                           {if $profile['followers_count'] > 0}
                           <ul class="row">
                              {foreach $profile['followers'] as $_user}
                              {include file='__feeds_user.tpl' _tpl="box" _connection=$_user["connection"]}
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
                           <div class="text-center text-muted mt20 no_dataimg_ __no_data_contet__  ">
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
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
                              <i class="fa fa-users mr10"></i>{__("Friends")}
                              </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs">
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/{$profile['user_name']}/friends">{__("Friends")}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="{$system['system_url']}/{$profile['user_name']}/followers">
                                    <strong class="pr5">{__("Followers")}</strong>
                                    <span class="badge badge-pill badge-info">{$profile['followers_count']}</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/{$profile['user_name']}/followings">
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
                              {include file='__feeds_user.tpl' _tpl="box" _connection=$_user["connection"]}
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
                           <div class="text-center text-muted mt20 no_dataimg_ __no_data_contet__  ">
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
                  <!-- added on 7sep end-->
                  {elseif $view == "photos"}
                  <!-- photos -->
                  <div class="col-12">
                     <div class="card panel-photos">
                        <div class="card-header with-icon with-nav custom-tabs ">
                           <!-- panel title -->
                           <!-- <div class="mb20">
                              <i class="fa fa-images mr10"></i>{__("Photos")}
                              </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs">
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/{$profile['user_name']}/photos">{__("Photos")}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/{$profile['user_name']}/albums">{__("Albums")}</a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body">
                           {if $profile['photos']}
                           <ul class="row no-gutters">

                           </ul>
                           <!-- see-more -->
                           <div class="alert alert-info see-more mt20 js_see-more" data-get="photos"
                              data-id="{$profile['user_id']}" data-type='user'>
                              <span>{__("Load More")}</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           {else}
                           <div class="__no_data_contet__ text-center">
                              <p class="text-center text-muted __nodata-img___">
                                 <img width="100%"
                                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results4.png">
                              <p>{$profile['user_firstname']} {__("doesn't have Photos")}</p>
                              </p>
                           </div>
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- photos -->
                  {elseif $view == "albums"}
                  <!-- albums -->
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
                              <i class="fa fa-images mr10"></i>{__("Photos")}
                              </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs">
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="{$system['system_url']}/{$profile['user_name']}/photos">{__("Photos")}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/{$profile['user_name']}/albums">{__("Albums")}</a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body">
                           {if $profile['albums']}
                           <ul class="row">
                              {foreach $profile['albums'] as $album}
                              {include file='__feeds_album.tpl'}
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
                           <div class="__no_data_contet__ text-center">
                              <p class="text-center text-muted __nodata-img___">
                                 <img width="100%"
                                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results4.png">
                              <p> {$profile['user_firstname']} {__("doesn't have albums")} </p>
                              </p>
                           </div>
                           <!-- <p class="text-center text-muted mt10">
                              {$profile['user_firstname']} {__("doesn't have albums")}
                              </p> -->
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- albums -->
                  {elseif $view == "album"}
                  <!-- albums -->
                  <div class="col-12">
                     <div class="card panel-photos">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- back to albums -->
                           <div class="float-right">
                              <a href="{$system['system_url']}/{$profile['user_name']}/albums" class="btn  btn-light">
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
                                    href="{$system['system_url']}/{$profile['user_name']}/photos">{__("Photos")}</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="{$system['system_url']}/{$profile['user_name']}/albums">{__("Albums")}</a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body">
                           {include file='_album.tpl'}
                        </div>
                     </div>
                  </div>
                  <!-- albums -->
                  {elseif $view == "videos"}
                  <!-- videos -->
                  <div class="col-12">
                     <div class="card panel-videos">
                        <!-- <div class="card-header with-icon"> -->
                        <!-- panel title -->
                        <!-- <div class="mb20">
                           <i class="fa fa-video mr10"></i>{__("Videos")}
                           </div> -->
                        <!-- panel title -->
                        <!-- </div> -->
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
                              <p> {$profile['user_firstname']} {__("doesn't have videos")} </p>
                              </p>
                           </div>
                           <!-- <p class="text-center text-muted mt10">
                              {$profile['user_firstname']} {__("doesn't have videos")}
                              </p> -->
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- videos -->
                  {elseif $view == "likes"}
                  <!-- likes -->
                  <div class="col-12">
                     <div class="card">
                        <!-- <div class="card-header with-icon"> -->
                        <!-- panel title -->
                        <!-- <i class="fa fa-thumbs-up mr10"></i>{__("Likes")} -->
                        <!-- panel title -->
                        <!-- </div> -->
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
                                 src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results13.png">
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
                  <div class="col-12">
                     <div class="card">
                        <!-- <div class="card-header with-icon"> -->
                        <!-- panel title -->
                        <!-- <i class="fa fa-users mr10"></i>{__("Groups")} -->
                        <!-- panel title -->
                        <!-- </div> -->
                        <div class="card-body">
                           {if $profile['user_id'] == $user->_data['user_id'] || $profile['user_privacy_groups'] ==
                           "public" || ($profile['user_privacy_groups'] == "friends" && $profile['we_friends'])}
                           {if count($profile['groups']) > 0}
                           <ul class="row profileGroupWrap">
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
                           <!-- <p class="text-center text-muted mt10">
                              {__("No groups to show")}
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
                           <!-- <p class="text-center text-muted mt10">
                              {__("No groups to Show")}
                              </p> -->
                           {/if}
                        </div>
                     </div>
                  </div>
                  <!-- groups -->
                  {elseif $view == "events"}
                  <!-- events -->
                  <div class="col-12">
                     <div class="card">
                        <!-- <div class="card-header with-icon"> -->
                        <!-- panel title -->
                        <!-- <i class="fa fa-calendar mr10"></i>{__("Events")} -->
                        <!-- panel title -->
                        <!-- </div> -->
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
                           <p class="text-center text-muted mt10">
                              {__("No events to show")}
                           </p>
                           {/if}
                           {else}
                           <p class="text-center text-muted mt10">
                              {__("No events to show")}
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
         </div>
      </div>
      <div class=" ">
         <div class="right-sidebar js_sticky-sidebar">
            {include file='right-sidebar.tpl'}
         </div>
      </div>
      <!-- content panel -->
   </div>
</div>
<!-- page content -->
{include file='_footer.tpl'}
{if $gift}
<>
   $(function () {
   modal('#gift');
   });
</>
{/if}