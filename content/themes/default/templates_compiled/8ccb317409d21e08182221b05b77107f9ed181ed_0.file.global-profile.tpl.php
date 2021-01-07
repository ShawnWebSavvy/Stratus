<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-07 06:55:27
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff6b05fa296d4_47299359',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ccb317409d21e08182221b05b77107f9ed181ed' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header_profile.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:global-profile/_publisher.tpl' => 2,
    'file:_pinned_post.tpl' => 1,
    'file:global-profile/global_posts.tpl' => 1,
    'file:global-profile/global-profile__feeds_user.tpl' => 2,
    'file:global-profile/global-profile__feeds_photo.tpl' => 1,
    'file:__feeds_album.tpl' => 1,
    'file:_album.tpl' => 1,
    'file:__feeds_video.tpl' => 1,
    'file:__feeds_page.tpl' => 1,
    'file:__feeds_group.tpl' => 1,
    'file:__feeds_event.tpl' => 1,
    'file:right-sidebar.tpl' => 1,
    'file:global-profile/global-profile_footer.tpl' => 1,
  ),
),false)) {
function content_5ff6b05fa296d4_47299359 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'Main Page'), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header_profile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'Main Page'), 0, false);
?>
<!-- page content -->
<div class="container mt20 offcanvas canvas-profile-mobile global-profile">
   <div class="row">
      <!-- side panel -->
      <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
      <div class="offcanvas-sidebar sidebar-left-ant">
         <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <?php }?>
      <!-- side panel -->
   </div>
   <div class="row right-side-content-ant profile-mobile-layout flex-wrap profile_psge">
      <div class="home-page-middel-block ">
         <div class="row">
            <section class="profile_top_sec globle_hub_profile col-12">
               <div class="profile-header custom_p_header">
                <button class="_toggle_btn" type="button"><i class="fas fa-ellipsis-v"></i> <i class="fas fa-times"></i></button>
                  <!-- profile-cover -->
                  <div class="profile-cover-wrapper">
                     <?php if ($_smarty_tpl->tpl_vars['profile']->value['global_user_cover_id']) {?>
                     <!-- full-cover -->
                     <img class="js_position-cover-full x-hidden" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['global_user_cover'];?>
">
                     <!-- full-cover -->
                     <!-- cropped-cover -->
                     <img class="js_position-cover-cropped <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['profile']->value['user_cover_lightbox']) {?>js_lightbox<?php }?>"
                        data-init-position="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_position'];?>
"
                        data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['global_user_cover_id'];?>
" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_full'];?>
"
                        data-context="album" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['global_user_cover'];?>
"
                        alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
">
                     <!-- cropped-cover -->
                     <?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
                     <!-- buttons -->
                     <div class="profile-cover-buttons">
                        <div class="profile-cover-change">
                           <i class="fa fa-camera js_x-uploader" data-handle="cover-user"></i>
                        </div>
                        <div class="profile-cover-position <?php if (!$_smarty_tpl->tpl_vars['profile']->value['global_user_cover']) {?>x-hidden<?php }?>">
                           <input class="js_position-picture-val" type="hidden" name="position-picture-val">
                           <i class="fa fa-crop-alt js_init-position-picture" data-handle="user"
                              data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"></i>
                        </div>
                        <div class="profile-cover-position-buttons">
                           <i class="fa fa-check fa-fw js_save-position-picture"></i>
                        </div>
                        <div class="profile-cover-position-buttons">
                           <i class="fa fa-times fa-fw js_cancel-position-picture"></i>
                        </div>
                        <div class="profile-cover-delete <?php if (!$_smarty_tpl->tpl_vars['profile']->value['global_user_cover']) {?>x-hidden<?php }?>">
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
                        <i class="fa fa-arrows-alt mr5"></i><?php echo __("Drag to reposition cover");?>

                     </div>
                     <!-- loaders -->
                     <?php }?>
                  </div>
                  <!-- profile-cover -->
                  <div class="d-flex profile_sec w-100 align-items-end">
                     <!-- profile-avatar -->
                     <div class="profile_avatar_img">
                        <div class="profile-avatar-wrapper">
                           <!--<img <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_picture_id']) {?> <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['profile']->value['user_picture_lightbox']) {?>class="js_lightbox"<?php }?> data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture_id'];?>
" data-context="album" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture_full'];?>
" <?php } elseif (!$_smarty_tpl->tpl_vars['profile']->value['user_picture_default']) {?> class="js_lightbox-nodata" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture'];?>
" <?php }?>  src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
"> -->
                           <img <?php if ($_smarty_tpl->tpl_vars['profile']->value['global_user_picture_id']) {?> <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['profile']->value['user_picture_lightbox']) {?>class="js_lightbox"<?php }?>
                           data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['global_user_picture_id'];?>
" data-context="album"
                           data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['global_user_picture'];?>
" <?php } elseif (!$_smarty_tpl->tpl_vars['profile']->value['user_picture_default']) {?>
                           class="js_lightbox-nodata" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture'];?>
" <?php }?>
                           src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['global_user_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>

                           <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
">
                           <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
                           <!-- buttons -->
                           <div class="profile-avatar-change">
                              <i class="fa fa-camera js_x-uploader" data-handle="picture-user"></i>
                           </div>
                           <div 
                              class="profile-avatar-crop <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_picture_default'] || !$_smarty_tpl->tpl_vars['profile']->value['user_picture_id']) {?>x-hidden<?php }?>">
                              <i class="fa fa-crop-alt js_init-crop-picture" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture'];?>
"
                                 data-handle="user" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"></i>
                           </div>
                           <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_picture_default']) {?>
                           <div class="profile-avatar-delete <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_picture_default'] || !$_smarty_tpl->tpl_vars['profile']->value['user_picture_id']) {?>x-hidden<?php }?>">
                              <i class="fa fa-trash js_delete-picture" data-handle="picture-user"></i>
                           </div>
                           <?php }?>
                           <!-- buttons -->
                           <!-- loaders -->
                           <div class="profile-avatar-change-loader">
                              <div class="progress x-progress">
                                 <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                              </div>
                           </div>
                           <!-- loaders -->
                           <?php }?>
                        </div>
                     </div>
                     <!-- profile-avatar -->
                     <!-- profile-name -->
                     <div class="profile-name-wrapper profile_name_sec global_User_Bio">
                        <div>
                           <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>

                           <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
</a>
                           <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_verified']) {?>
                           <span class="blue_tick verified-badge" data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
'>
                           <img class="" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/tick.svg">
                           </span> 
                           <?php }?>
                           <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_subscribed']) {?>
                           <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="badge badge-warning" data-toggle="tooltip"
                              data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['profile']->value['package_name'];?>
 <?php echo __('Member');?>
"><?php echo __("PRO");?>
</a>
                           <?php }?><br>
                           <span class="user_name_span">@<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
</span>
                        </div>
                        <!-- posts count -->
                        <div class="PostFollowerWrap bg-transparent">
                           <div class="PostCount">
                              <span class="ml5"><?php echo $_smarty_tpl->tpl_vars['posts_count']->value;?>
</span><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
"><?php echo __("Posts");?>
</a>
                           </div>
                           <div class="PostCount">
                              <span class="ml5"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followers_count'];?>
</span><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=followers"><?php echo __("Followers");?>
</a>
                           </div>
                           <!-- <div class="PostCount">
                              <span class="badge badge-pill badge-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followings_count'];?>
</span>
                              <a class="nav-link active"
                              href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=followings">
                              <?php echo __("Followings");?>
</a>
                              </div> -->
                        </div>
                        <!-- profile-buttons -->
                        <div class="button_action">
                           <div class="profile-buttons-wrapper profile-button-style">
                              <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                              <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] != $_smarty_tpl->tpl_vars['profile']->value['user_id']) {?>
                              <!-- add friend -->
                              <!-- <?php if ($_smarty_tpl->tpl_vars['profile']->value['we_friends']) {?>
                                 <button type="button" class="btn  btn-success btn-delete js_friend-remove"
                                     data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                                 <img class=" " src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/plus_icon.svg">
                                 <span class="btn_image_"> <?php echo __("Friends");?>
 </span>
                                 <span class="btn_image_hover"> <?php echo __("Delete");?>
 </span>
                                 </button>
                                 <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['he_request']) {?>
                                 <button type="button" class="btn  btn-primary js_friend-accept"
                                     data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo __("Confirm");?>
</button>
                                 <button type="button" class="btn  btn-danger js_friend-decline"
                                     data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo __("Delete");?>
</button>
                                 <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['i_request']) {?>
                                 <button type="button" class="btn  btn-warning js_friend-cancel" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                                 <img class="btn_image_" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/tick.svg"><?php echo __("Friend Request Sent");?>

                                 </button>
                                 <?php } elseif (!$_smarty_tpl->tpl_vars['profile']->value['friendship_declined']) {?>
                                 <button type="button" class="btn  btn-success js_friend-add" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                                 
                                     <img class="btn_image_" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                                 <img class="btn_image_hover" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                                     <?php echo __("Add Friend");?>

                                 </button>
                                 <?php }?>-->
                              <!-- add friend  -->
                              <!-- follow -->
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['i_follow']) {?>
                              <button type="button" class="btn  btn-info js_unfollow" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                              <i class="fa fa-check mr5"></i><?php echo __("Following");?>

                              </button>
                              <?php } else { ?>
                              <button type="button" class="btn  btn-info js_follow" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                              <i class="fa fa-rss mr5"></i><?php echo __("Follow");?>

                              </button>
                              <?php }?>
                              <!-- follow -->
                              <!-- message -->
                              <button type="button" class="  button-messages-profile js_chat_start"
                                 data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"
                                 data-name="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
"
                                 data-link="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
">
                              <span class="more_option">
                              <img class="" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/msg-icon.svg">
                              </span>
                              <span class="text-mobile-only">Message</span>
                              </button>
                              <!-- message -->
                              <!-- poke & report & block -->
                              <div class="d-inline-block dropdown button-profile-option desktop-only">
                                 <button type="button" class=" more_icon_img" data-toggle="dropdown" data-display="static">
                                 <span class="more_option">
                                 <img class="" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/more-icon.svg">
                                 </span>
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <!-- poke -->
                                    <!-- <?php if ($_smarty_tpl->tpl_vars['system']->value['pokes_enabled'] && !$_smarty_tpl->tpl_vars['profile']->value['i_poked']) {?>
                                       <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_poke'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_poke'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                                       <div class="dropdown-item pointer js_poke" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"
                                           data-name="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
">
                                           <i class="fa fa-hand-point-right fa-fw mr10"></i><?php echo __("Poke");?>

                                       </div>
                                       <?php }?>
                                       <?php }?> -->
                                    <!-- poke -->
                                    <!-- report -->
                                    <div class="dropdown-item pointer js_report" data-handle="user" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                                       <span class="more_option_img">
                                       <img class="" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Flag.svg">
                                       </span>
                                       <?php echo __("Report");?>

                                    </div>
                                    <!-- report -->
                                    <!-- block -->
                                    <div class="dropdown-item pointer js_block-user" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                                       <span class="more_option_img">
                                       <img class="" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/block_icon.svg">
                                       </span>
                                       <?php echo __("Block");?>

                                    </div>
                                    <!-- block -->
                                    <!-- manage -->
                                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item"
                                       href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/admincp/users/edit/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                                    <span class="more_option_img">
                                    <img class="" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Cog.svg">
                                    </span>
                                    <?php echo __("Edit in Admin Panel");?>

                                    </a>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['user']->value->_is_moderator) {?>
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/modcp/users/edit/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                                    <span class="more_option_img">
                                    <img class="" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/Cog.svg">
                                    </span>
                                    <?php echo __("Edit in Moderator Panel");?>

                                    </a>
                                    <?php }?>
                                    <!-- manage -->
                                 </div>
                              </div>
                              <!-- poke & report & block -->
                              <?php } else { ?>
                              <!-- edit -->
                              <div class="button-profile-option">
                                 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/global" class=" edit_profile_icon">
                                 <span class="edit_profile_img">
                                 <img class="" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/edit_icon_hover.svg">
                                 </span>
                                 </a>
                              </div>
                              <!-- edit -->
                              <?php }?>
                              <?php }?>
                           </div>
                        </div>
                     </div>
                  </div>
            </section>
            <!-- content panel -->
            <div class="col-lg-3 col-md-4 ">
            <div class="profileUpdatesDesign">
            <!-- profile-header -->
            
            <div class="globel-profile-about-sec about_content_sec">
            <div class="addBioGlobal">
            <h4>About</h4>
            </div>
            <div class="card" style="margin-bottom: 0px;">
            <div class="card-body" style="padding-top: 0px;">
            <?php if (!is_empty($_smarty_tpl->tpl_vars['profile']->value['user_biography'])) {?>
            <div class="about-bio">
            <div class="js_readmore overflow-hidden">
            <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_biography'];?>

            </div>
            </div>
            <?php } elseif (($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'])) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/global" class="btn addBio">
            <!-- <i class="fas fa-plus-circle mr5"></i> -->
            <?php echo __("Add your biography");?>

            </a>
            <?php } else { ?>
            <div class="about-bio">
            <div class="js_readmore overflow-hidden">
            <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_biography'];?>

            </div>
            </div>
            <?php }?>
            </div>
            <!-- profile-name -->
            <!-- friends -->
            <!-- <?php if ($_smarty_tpl->tpl_vars['profile']->value['friends_count'] > 0) {?>
               <div class="card">
                   <div class="card-header bg-transparent">
                       <i class="fa fa-users mr5"></i>
                       <strong><a
                               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends"><?php echo __("Friends");?>
</a></strong>
                       <span class="badge badge-pill badge-info ml5"><?php echo $_smarty_tpl->tpl_vars['profile']->value['friends_count'];?>
</span>
                       <?php if ($_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] && $_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] > 0 && $_smarty_tpl->tpl_vars['active_page']->value != "GlobalHub") {?>
                       <small>
                           (<span class="text-underline" data-toggle="modal"
                               data-url="users/mutual_friends.php?uid=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'];?>

                               <?php echo __("mutual friends");?>
</span>)
                       </small>
                       <?php }?>
                   </div>
                   <div class="card-body ptb10 plr10">
                       <div class="row no-gutters">
                           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['friends'], '_friend');
$_smarty_tpl->tpl_vars['_friend']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_friend']->value) {
$_smarty_tpl->tpl_vars['_friend']->do_else = false;
?>
                           <div class="col-3 col-sm-6 col-md-2 col-lg-4">
                               <div class="circled-user-box">
                                   <a class="user-box" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_friend']->value['user_name'];?>
">
                                       <img alt="<?php echo $_smarty_tpl->tpl_vars['_friend']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_friend']->value['user_lastname'];?>
"
                                           src="<?php echo $_smarty_tpl->tpl_vars['_friend']->value['user_picture'];?>
" />
                                       <div class="name"
                                           title="<?php echo $_smarty_tpl->tpl_vars['_friend']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_friend']->value['user_lastname'];?>
">
                                           <?php echo $_smarty_tpl->tpl_vars['_friend']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_friend']->value['user_lastname'];?>

                                       </div>
                                   </a>
                               </div>
                           </div>
                           <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                       </div>
                   </div>
               </div>
               <?php }?> -->
            <!-- friends -->
            <!-- Followers start-->
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['followers_count'] > 0) {?>
            <div class="card">
            <div class="card-body ptb10 plr10">
            <div class="row no-gutters">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['followers'], 'followeuser');
$_smarty_tpl->tpl_vars['followeuser']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['followeuser']->value) {
$_smarty_tpl->tpl_vars['followeuser']->do_else = false;
?>
            <div class="col-sm-4 col-md-4 col-lg-4">
            <div class="circled-user-box sds">
            <a class="user-box" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['followeuser']->value['user_name'];?>
">
            <img <?php echo $_smarty_tpl->tpl_vars['followeuser']->value['user_picture_full'];?>
 alt="<?php echo $_smarty_tpl->tpl_vars['followeuser']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['followeuser']->value['user_lastname'];?>
"
            src="<?php echo $_smarty_tpl->tpl_vars['followeuser']->value['user_picture'];?>
" />
            <div class="name"
               title="<?php echo $_smarty_tpl->tpl_vars['followeuser']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['followeuser']->value['user_lastname'];?>
">
            <?php echo $_smarty_tpl->tpl_vars['followeuser']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['followeuser']->value['user_lastname'];?>

            </div>
            </a>
            </div>
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
            </div>
            </div>
            <?php }?>
            <!-- Followers end -->
            </div>
            </div>
            </div>
            </div>
            <div class="col-lg-9 col-md-8 sec_cstm_w offcanvas-mainbar js_conversation-container">
            <!-- profile-tabs -->
            <div class="profile-header-tabs for-mobile custom-scrollbar">
            <ul class="mb20">
            <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
" <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active" <?php }?>><?php echo __("Timeline");?>

            </a>
            </li>
            <!-- <li>
               <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=friends"
                   <?php if ($_smarty_tpl->tpl_vars['view']->value == "friends" || $_smarty_tpl->tpl_vars['view']->value == "followers" || $_smarty_tpl->tpl_vars['view']->value == "followings") {?>class="active" <?php }?>><?php echo __("Friends");?>

               </a>
               </li> -->
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
            <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_enabled']) {?>
            <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/likes" <?php if ($_smarty_tpl->tpl_vars['view']->value == "likes") {?>class="active" <?php }?>>
            <?php echo __("Likes");?>

            </a>
            </li>
            <?php }?>
            </ul>
            </div>
            <!-- profile-tabs -->
            <!-- profile-content -->
            <div class="row">
            <!-- panel [mutual-friends] -->
            <!--  <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] != $_smarty_tpl->tpl_vars['profile']->value['user_id'] && !$_smarty_tpl->tpl_vars['profile']->value['we_friends'] && !$_smarty_tpl->tpl_vars['profile']->value['friendship_declined']) {?>
               <div class="col-sm-12">
                   <div class="card panel-mutual-friends">
                       <div class="card-header text-uppercase">
                           <?php echo __("Do you know");?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>

                       </div>
                       <div class="card-body">
                           <div>
                               <?php echo __("To see what");?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("shares with friends");?>
,
                               <span class="text-primary">
                                   <?php echo __("send a friend request");?>

                               </span>
                               <div class="float-right">
                                   <?php if ($_smarty_tpl->tpl_vars['profile']->value['he_request']) {?>
                                   <button class="btn btn-primary  js_friend-accept"
                                       data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo __("Confirm");?>
</button>
                                   <button class="btn btn-secondary  js_friend-decline"
                                       data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo __("Delete");?>
</button>
                                   <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['i_request']) {?>
                                   <button class="btn btn-secondary  js_friend-cancel"
                                       data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                                       <img class="btn_image_" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/tick.svg"><?php echo __("Friend Request Sent");?>

                                   </button>
                                   <?php } else { ?>
                                   <button type="button" class="btn btn-success  js_friend-add"
                                       data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                                   
                                       <img class="btn_image_" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                       <img class="btn_image_hover" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                                       <?php echo __("Add Friend");?>

                                   </button>
                                   <?php }?>
                               </div>
                           </div>
                           <?php if ($_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] && $_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] > 0 && $_smarty_tpl->tpl_vars['active_page']->value != "GlobalHub") {?>
                           <div class="mt10 clearfix">
                               <ul class="float-left mr20">
                                   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['mutual_friends'], 'mutual_friend');
$_smarty_tpl->tpl_vars['mutual_friend']->index = -1;
$_smarty_tpl->tpl_vars['mutual_friend']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mutual_friend']->value) {
$_smarty_tpl->tpl_vars['mutual_friend']->do_else = false;
$_smarty_tpl->tpl_vars['mutual_friend']->index++;
$__foreach_mutual_friend_2_saved = $_smarty_tpl->tpl_vars['mutual_friend'];
?>
                                   <li>
                                       <a data-toggle="tooltip" data-placement="top"
                                           title="<?php echo $_smarty_tpl->tpl_vars['mutual_friend']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['mutual_friend']->value['user_lastname'];?>
"
                                           class="post-avatar-picture"
                                           href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['mutual_friend']->value['user_name'];?>
"
                                           style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['mutual_friend']->value['user_picture'];?>
);">
                                       </a>
                                   </li>
                                   <?php if ($_smarty_tpl->tpl_vars['mutual_friend']->index > 3) {
break 1;
}?>
                                   <?php
$_smarty_tpl->tpl_vars['mutual_friend'] = $__foreach_mutual_friend_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                               </ul>
                               <div class="float-left mt10">
                                   <span class="text-underline" data-toggle="modal"
                                       data-url="users/mutual_friends.php?uid=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'];?>

                                       <?php echo __("Mutual Friends");?>
</span>
                               </div>
                           </div>
                           <?php }?>
                       </div>
                   </div>
               </div>
               <?php }?> -->
            <!-- panel [mutual-friends] -->
            <!-- view content -->
            <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>
            <!-- center panel -->
            <div class="col-lg-12 order-lg-2 content-middle-div">
            <!-- publisher -->
            <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['profile']->value['user_id']) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:global-profile/_publisher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"me",'_privacy'=>true), 0, false);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['system']->value['wall_posts_enabled'] && ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_wall'] == 'friends' && $_smarty_tpl->tpl_vars['profile']->value['we_friends'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_wall'] == 'public')) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:global-profile/_publisher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"user",'_id'=>$_smarty_tpl->tpl_vars['profile']->value['user_id'],'_privacy'=>true), 0, true);
?>
            <?php }?>
            <?php }?>
            <!-- publisher -->
            <!-- pinned post -->
            <?php if ($_smarty_tpl->tpl_vars['pinned_post']->value) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:_pinned_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('post'=>$_smarty_tpl->tpl_vars['pinned_post']->value), 0, false);
?>
            <?php }?>
            <!-- pinned post -->
            <!-- posts -->
            <?php $_smarty_tpl->_subTemplateRender('file:global-profile/global_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"posts_profile",'_id'=>$_smarty_tpl->tpl_vars['profile']->value['user_id']), 0, false);
?>
            <!-- posts -->
            </div>
            <!-- center panel -->
            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "friends") {?>
            <!-- friends -->
            <div class="col-12 cardBodyHeight">
            <div class="card">
            <div class="card-header with-icon with-nav custom-tabs">
            <!-- panel title -->
            <!-- <div class="mb20">
               <i class="fa fa-users mr10"></i><?php echo __("Friends");?>

               </div> -->
            <!-- panel title -->
            <!-- panel nav -->
            <ul class="nav nav-tabs ">
            <!-- <li class="nav-item">
               <a class="nav-link"
                   href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=friends">
                   <?php echo __("Friends");?>

                   <span class="badge badge-pill badge-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['friends_count'];?>
</span>
               </a>
               </li> -->
            <li class="nav-item">
            <a class="nav-link active"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=followers"><?php echo __("Followers");?>
</a>
            </li>
            <li class="nav-item">
            <a class="nav-link"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=followings"><?php echo __("Followings");?>
</a>
            </li>
            </ul>
            <!-- panel nav -->
            </div>
            </div>
            </div>
            <!-- friends -->
            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "followers") {?>
            <!-- followers -->
            <div class="col-12 cardBodyHeight">
            <div class="card">
            <div class="card-header with-icon with-nav custom-tabs">
            <!-- panel title -->
            <!-- <div class="mb20">
               <i class="fa fa-users mr10"></i><?php echo __("Followers");?>

               </div> -->
            <!-- panel title -->
            <!-- panel nav -->
            <ul class="nav nav-tabs ">
            <!-- <li class="nav-item">
               <a class="nav-link"
                   href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=friends"><?php echo __("Friends");?>
</a>
               </li> -->
            <li class="nav-item">
            <a class="nav-link active"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=followers">
            <?php echo __("Followers");?>

            <span class="badge badge-pill badge-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followers_count'];?>
</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=followings"><?php echo __("Followings");?>

            <span class="badge badge-pill badge-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followings_count'];?>
</span>
            </a>
            </li>
            </ul>
            <!-- panel nav -->
            </div>
            <div class="card-body pb0">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['followers_count'] > 0) {?>
            <ul class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['followers'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
            <?php $_smarty_tpl->_subTemplateRender('file:global-profile/global-profile__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"]), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            <?php if (count($_smarty_tpl->tpl_vars['profile']->value['followers']) >= $_smarty_tpl->tpl_vars['system']->value['min_results_even']) {?>
            <!-- see-more -->
            <div class="alert alert-info see-more mt0 mb20 js_see-more" data-get="followers"
               data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
            <span><?php echo __("Load More");?>
</span>
            <div class="loader loader_small x-hidden"></div>
            </div>
            <!-- see-more -->
            <?php }?>
            <?php } else { ?>
            <div class="text-center text-muted mt20 no_dataimg_ __no_data_contet__ ">
            <img width="100%"
               src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results16.jpg">
            <p class="text-center text-muted mt10">
            <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("doesn't have followers");?>

            </p>
            </div>
            <?php }?>
            </div>
            </div>
            </div>
            <!-- followers -->
            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "followings") {?>
            <!-- followings -->
            <div class="col-12 cardBodyHeight">
            <div class="card">
            <div class="card-header with-icon with-nav custom-tabs">
            <!-- panel title -->
            <!-- <div class="mb20">
               <i class="fa fa-users mr10"></i><?php echo __("Followers");?>

               </div> -->
            <!-- panel title -->
            <!-- panel nav -->
            <ul class="nav nav-tabs ">
            <!-- <li class="nav-item">
               <a class="nav-link"
                   href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=friends"><?php echo __("Friends");?>
</a>
               </li> -->
            <li class="nav-item">
            <a class="nav-link"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=followers">
            <strong class="pr5"><?php echo __("Followers");?>
</strong>
            <span class="badge badge-pill badge-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followers_count'];?>
</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link active"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=followings">
            <?php echo __("Followings");?>

            <span class="badge badge-pill badge-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followings_count'];?>
</span>
            </a>
            </li>
            </ul>
            <!-- panel nav -->
            </div>
            <div class="card-body pb0">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['followings_count'] > 0) {?>
            <ul class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['followings'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
            <?php $_smarty_tpl->_subTemplateRender('file:global-profile/global-profile__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"]), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            <?php if (count($_smarty_tpl->tpl_vars['profile']->value['followings']) >= $_smarty_tpl->tpl_vars['system']->value['min_results_even']) {?>
            <!-- see-more -->
            <div class="alert alert-info see-more mt0 mb20 js_see-more" data-get="followings"
               data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
            <span><?php echo __("Load More");?>
</span>
            <div class="loader loader_small x-hidden"></div>
            </div>
            <!-- see-more -->
            <?php }?>
            <?php } else { ?>
            <div class="text-center text-muted mt20 no_dataimg_ __no_data_contet__ ">
            <img width="100%"
               src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results16.jpg">
            <p class="text-center text-muted mt10">
            <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("doesn't have followings");?>

            </p>
            </div>
            <?php }?>
            </div>
            </div>
            </div>
            <!-- followings -->
            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "photos") {?>
            <!-- photos -->
            <div class="col-12 cardBodyHeight">
            <div class="card panel-photos">
            <div class="card-header with-icon with-nav custom-tabs">
            <!-- panel title -->
            <!-- <div class="mb20">
               <i class="fa fa-images mr10"></i><?php echo __("Photos");?>

               </div> -->
            <!-- panel title -->
            <!-- panel nav -->
            <ul class="nav nav-tabs ">
            <li class="nav-item">
            <a class="nav-link active"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=photos"><?php echo __("Photos");?>
</a>
            </li>
            <li class="nav-item">
            <a class="nav-link"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=albums"><?php echo __("Albums");?>
</a>
            </li>
            </ul>
            <!-- panel nav -->
            </div>
            <div class="card-body">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['photos']) {?>
            <ul class="row no-gutters ">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['photos'], 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
            <?php $_smarty_tpl->_subTemplateRender('file:global-profile/global-profile__feeds_photo.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_context'=>"photos"), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            <!-- see-more -->
            <div class="alert alert-info see-more mt20 js_see-more" data-get="photos"
               data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
" data-type='user'>
            <span><?php echo __("Load More");?>
</span>
            <div class="loader loader_small x-hidden"></div>
            </div>
            <!-- see-more -->
            <?php } else { ?>
            <p class="text-center text-muted mt10 no_dataimg_">
            <img width="100%"
               src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results4.png">
            <p><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("doesn't have Photos");?>
</p>
            </p>
            <?php }?>
            </div>
            </div>
            </div>
            <!-- photos -->
            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "albums") {?>
            <!-- albums -->
            <div class="col-12 cardBodyHeight">
            <div class="card">
            <div class="card-header with-icon with-nav custom-tabs">
            <!-- panel title -->
            <!-- <div class="mb20">
               <i class="fa fa-images mr10"></i><?php echo __("Photos");?>

               </div> -->
            <!-- panel title -->
            <!-- panel nav -->
            <ul class="nav nav-tabs ">
            <li class="nav-item">
            <a class="nav-link"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=photos"><?php echo __("Photos");?>
</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=albums"><?php echo __("Albums");?>
</a>
            </li>
            </ul>
            <!-- panel nav -->
            </div>
            <div class="card-body">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['albums']) {?>
            <ul class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['albums'], 'album');
$_smarty_tpl->tpl_vars['album']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['album']->value) {
$_smarty_tpl->tpl_vars['album']->do_else = false;
?>
            <?php $_smarty_tpl->_subTemplateRender('file:__feeds_album.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            <?php if (count($_smarty_tpl->tpl_vars['profile']->value['albums']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
            <!-- see-more -->
            <div class="alert alert-info see-more js_see-more" data-get="albums"
               data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
" data-type='user'>
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
/images/no_results4.png">
            <p> <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("doesn't have albums");?>
</p>
            </p>
            <?php }?>
            </div>
            </div>
            </div>
            <!-- albums -->
            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "album") {?>
            <!-- albums -->
            <div class="col-12 cardBodyHeight">
            <div class="card panel-photos">
            <div class="card-header with-icon with-nav custom-tabs">
            <!-- back to albums -->
            <div class="float-right">
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/albums"
               class="btn  btn-light">
            <i class="fa fa-arrow-circle-left mr5"></i><?php echo __("Back to Albums");?>

            </a>
            </div>
            <!-- back to albums -->
            <!-- panel title -->
            <!-- <div class="mb20">
               <i class="fa fa-images mr10"></i><?php echo __("Photos");?>

               </div> -->
            <!-- panel title -->
            <!-- panel nav -->
            <ul class="nav nav-tabs">
            <li class="nav-item">
            <a class="nav-link"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/photos"><?php echo __("Photos");?>
</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active"
               href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/albums"><?php echo __("Albums");?>
</a>
            </li>
            </ul>
            <!-- panel nav -->
            </div>
            <div class="card-body">
            <?php $_smarty_tpl->_subTemplateRender('file:_album.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
            </div>
            </div>
            <!-- albums -->
            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "videos") {?>
            <!-- videos -->
            <div class="col-12 cardBodyHeight">
            <div class="card panel-videos">
            <div class="card-header with-icon">
            <!-- panel title -->
            <!-- <div class="mb20">
               <i class="fa fa-video mr10"></i><?php echo __("Videos");?>

               </div> -->
            <!-- panel title -->
            </div>
            <div class="card-body">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['videos']) {?>
            <ul class="row no-gutters">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['videos'], 'video');
$_smarty_tpl->tpl_vars['video']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->do_else = false;
?>
            <?php $_smarty_tpl->_subTemplateRender('file:__feeds_video.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            <!-- see-more -->
            <div class="alert alert-info see-more js_see-more" data-get="videos"
               data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
" data-type='user'>
            <span><?php echo __("Load More");?>
</span>
            <div class="loader loader_small x-hidden"></div>
            </div>
            <!-- see-more -->
            <?php } else { ?>
            <div class="__no_data_contet__ text-center">
            <p class="text-center text-muted __nodata-img___">
            <img width="100%"
               src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results15.png">
            <p><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("doesn't have videos");?>
</p>
            </p>
            </div>
            <!-- <p class="text-center text-muted mt10 no_dataimg_">
               <img width="100%"
                       src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results15.png">
                   <p><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("doesn't have videos");?>
</p>
               </p> -->
            <?php }?>
            </div>
            </div>
            </div>
            <!-- videos -->
            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "likes") {?>
            <!-- likes -->
            <div class="col-12 cardBodyHeight">
            <div class="card">
            <div class="card-header with-icon">
            <!-- panel title -->
            <i class="fa fa-thumbs-up mr10"></i><?php echo __("Likes");?>

            <!-- panel title -->
            </div>
            <div class="card-body">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_pages'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_pages'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
            <?php if (count($_smarty_tpl->tpl_vars['profile']->value['pages']) > 0) {?>
            <ul class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['pages'], '_page');
$_smarty_tpl->tpl_vars['_page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
$_smarty_tpl->tpl_vars['_page']->do_else = false;
?>
            <?php $_smarty_tpl->_subTemplateRender('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box"), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            <?php if (count($_smarty_tpl->tpl_vars['profile']->value['pages']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
            <!-- see-more -->
            <div class="alert alert-info see-more js_see-more" data-get="profile_pages"
               data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
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
/images/no_results16.jpg">
            <p> <?php echo __("No pages to show");?>
</p>
            </p>
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
            </div>
            <!-- likes -->
            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "groups") {?>
            <!-- groups -->
            <div class="col-12 cardBodyHeight">
            <div class="card">
            <div class="card-header with-icon">
            <!-- panel title -->
            <i class="fa fa-users mr10"></i><?php echo __("Groups");?>

            <!-- panel title -->
            </div>
            <div class="card-body">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_groups'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_groups'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
            <?php if (count($_smarty_tpl->tpl_vars['profile']->value['groups']) > 0) {?>
            <ul class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['groups'], '_group');
$_smarty_tpl->tpl_vars['_group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_group']->value) {
$_smarty_tpl->tpl_vars['_group']->do_else = false;
?>
            <?php $_smarty_tpl->_subTemplateRender('file:__feeds_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box"), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            <?php if (count($_smarty_tpl->tpl_vars['profile']->value['groups']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
            <!-- see-more -->
            <div class="alert alert-info see-more js_see-more" data-get="profile_groups"
               data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
            <span><?php echo __("Load More");?>
</span>
            <div class="loader loader_small x-hidden"></div>
            </div>
            <!-- see-more -->
            <?php }?>
            <?php } else { ?>
            <div class="__no_data_contet__ text-center">
            <p class="text-center text-muted __nodata-img___">
            <img width="100%"
               src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results17.png">
            <p> <?php echo __("No groups to show");?>
 </p>
            </p>
            </div>
            <!-- <p class="text-center text-muted mt10 no_dataimg_">
               <img width="100%"
                       src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results17.png">
                   <p><?php echo __("No groups to show");?>
</p>
               </p> -->
            <?php }?>
            <?php } else { ?>
            <div class="__no_data_contet__ text-center">
            <p class="text-center text-muted __nodata-img___">
            <img width="100%"
               src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results17.png">
            <p> <?php echo __("No groups to show");?>
 </p>
            </p>
            </div>
            <!-- <p class="text-center text-muted mt10 no_dataimg_">
               <img width="100%"
                       src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results117.svg">
                   <p><?php echo __("No groups to show");?>
</p>
               </p> -->
            <?php }?>
            </div>
            </div>
            </div>
            <!-- groups -->
            <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "events") {?>
            <!-- events -->
            <div class="col-12 cardBodyHeight">
            <div class="card">
            <div class="card-header with-icon">
            <!-- panel title -->
            <i class="fa fa-calendar mr10"></i><?php echo __("Events");?>

            <!-- panel title -->
            </div>
            <div class="card-body">
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_events'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_events'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
            <?php if (count($_smarty_tpl->tpl_vars['profile']->value['events']) > 0) {?>
            <ul class="row">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['events'], '_event');
$_smarty_tpl->tpl_vars['_event']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_event']->value) {
$_smarty_tpl->tpl_vars['_event']->do_else = false;
?>
            <?php $_smarty_tpl->_subTemplateRender('file:__feeds_event.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box"), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
            <?php if (count($_smarty_tpl->tpl_vars['profile']->value['events']) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
            <!-- see-more -->
            <div class="alert alert-info see-more js_see-more" data-get="profile_events"
               data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
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
/images/no_results1.png">
            <p> <?php echo __("No events to show");?>
</p>
            </p>
            <?php }?>
            <?php } else { ?>
            <p class="text-center text-muted mt10 no_dataimg_">
            <img width="100%"
               src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results2.png">
            <p> <?php echo __("No events to show");?>
</p>
            </p>
            <?php }?>
            </div>
            </div>
            </div>
            <!-- events -->
            <?php }?>
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
            <?php $_smarty_tpl->_subTemplateRender('file:right-sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
         </div>
      </div>
   </div>
</div>
<!-- page content -->
<?php $_smarty_tpl->_subTemplateRender('file:global-profile/global-profile_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ($_smarty_tpl->tpl_vars['gift']->value) {
echo '<script'; ?>
>
   $(function () {
       modal('#gift');
   });
<?php echo '</script'; ?>
>
<?php }
}
}
