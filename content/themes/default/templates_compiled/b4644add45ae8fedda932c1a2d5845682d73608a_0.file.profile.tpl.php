<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-07 05:08:47
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff6975f482ed9_04721033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4644add45ae8fedda932c1a2d5845682d73608a' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/profile.tpl',
      1 => 1609938409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header_profile.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:_publisher.tpl' => 2,
    'file:_pinned_post.tpl' => 1,
    'file:_posts.tpl' => 1,
    'file:__feeds_user.tpl' => 3,
    'file:__feeds_album.tpl' => 1,
    'file:_album.tpl' => 1,
    'file:__feeds_video.tpl' => 1,
    'file:__feeds_page.tpl' => 1,
    'file:__feeds_group.tpl' => 1,
    'file:__feeds_event.tpl' => 1,
    'file:right-sidebar.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_5ff6975f482ed9_04721033 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/sngine/includes/libs/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>


<?php $_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header_profile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- page content -->
<div class="container mt20 offcanvas canvas-profile-mobile">
   <div class="__overlay__" id="__overlay__"></div>
   <div class="row">
      <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
      <div class="offcanvas-sidebar sidebar-left-ant">
         <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      </div>
      <?php }?>
   </div>
   <div class="row right-side-content-ant profile-mobile-layout flex-wrap profile_psge">
      <div class="home-page-middel-block ">
         <div class="row">
            <section class="profile_top_sec local_hub_profile col-12">
               <!-- profile-header -->
               <div class="profile-header custom_p_header">
                  
               <button class="_toggle_btn" type="button"><i class="fas fa-ellipsis-v"></i> <i class="fas fa-times"></i></button>
                  <!-- profile-cover -->
                  <div class="profile-cover-wrapper">
                     <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_cover_id']) {?>
                     <img class="js_position-cover-full x-hidden" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_full'];?>
">
                     <img class="js_position-cover-cropped <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['profile']->value['user_cover_lightbox']) {?>js_lightbox<?php }?>"
                        data-init-position="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_position'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_id'];?>
"
                        data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover_full'];?>
" data-context="album" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_cover'];?>
"
                        alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
">
                     <?php }?>
                     <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
                     <div class="profile-cover-buttons">
                        <div class="profile-cover-change">
                           <i class="fa fa-camera js_x-uploader" data-handle="cover-user"></i>
                        </div>
                        <div class="profile-cover-position <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_cover']) {?>x-hidden<?php }?>">
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
                        <div class="profile-cover-delete <?php if (!$_smarty_tpl->tpl_vars['profile']->value['user_cover']) {?>x-hidden<?php }?>">
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
                        <i class="fa fa-arrows-alt mr5"></i><?php echo __("Drag to reposition cover");?>

                     </div>
                     <?php }?>
                  </div>
                  <!-- profile-cover  -->
                  <div class="d-flex profile_sec w-100 align-items-end">
                     <div class="profile_avatar_img">
                        <!-- profile-avatar -->
                        <div class="profile-avatar-wrapper">
                           <img <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_picture_id']) {?> <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['profile']->value['user_picture_lightbox']) {?>class="js_lightbox"<?php }?> data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture_id'];?>
"
                           data-context="album" data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture_full'];?>
" <?php } elseif (!$_smarty_tpl->tpl_vars['profile']->value['user_picture_default']) {?> class="js_lightbox-nodata"
                           data-image="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture'];?>
" <?php }?> <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_picture_default']) {?> src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture'];?>
" <?php } else { ?> src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture'];?>
" <?php }?>
                           alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
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
                           <div class="profile-avatar-delete <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_picture_default']) {?>x-hidden<?php }?>">
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
                        <!-- profile-avatar -->
                     </div>
                     <div class="profile_name_sec">
                        <!-- profile-name -->
                        <div class="profile-name-wrapper">
                           <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>

                           <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
</a>
                           <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_verified']) {?>
                           <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
'
                              class="fa fa-check-circle fa-fw verified-badge"></i>
                           <?php }?>
                           <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_subscribed']) {?>
                           <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="badge  badge-warning" data-toggle="tooltip"
                              data-placement="top" title="<?php echo $_smarty_tpl->tpl_vars['profile']->value['package_name'];?>
 <?php echo __('Member');?>
"><?php echo __("PRO");?>
</a>
                           <?php }?>
                        </div>
                        <!-- profile-buttons -->
                        <div class="button_action">
                           <div class="profile-buttons-wrapper profile-button-style">
                              <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                              <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] != $_smarty_tpl->tpl_vars['profile']->value['user_id']) {?>
                              <!-- add friend -->
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['we_friends']) {?>
                              <button type="button" class="btn btn-success btn-delete js_friend-remove"
                                 data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                              <img class="btn_image" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/plus_icon.svg">
                              <img class="btn_image_hover" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">
                              <span class="btn_image_"> <?php echo __("Friends");?>
 </span>
                              <span class="btn_image_hover"> <?php echo __("Delete");?>
 </span>
                              </button>
                              <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['he_request']) {?>
                              <button type="button" class="btn btn-primary js_friend-accept"
                                 data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"> <span class="request_aspct"><img 
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/tick.svg">
                    </span>
<?php echo __("Confirm");?>

</button>
                              <button type="button" class="btn btn-danger js_friend-decline"
                                 data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><span class="request_dlt">
                <img
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">
                    </span>
<?php echo __("Delete");?>

</button>
                              <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['i_request']) {?>
                              <button type="button" class="btn btn-warning js_friend-cancel"
                                 data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                              <img class="btn_image_" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/tick.svg">
                              Request Sent
                              </button>
                              <?php } elseif (!$_smarty_tpl->tpl_vars['profile']->value['friendship_declined']) {?>
                              <button type="button" class="btn btn-success js_friend-add" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                              <img class="btn_image_" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                              <img class="btn_image_hover" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                              <?php echo __("Add Friend ");?>

                              </button>
                              <?php }?>
                              <!-- add friend -->
                              <!-- follow -->
                              <!-- <?php if ($_smarty_tpl->tpl_vars['profile']->value['i_follow']) {?>
                                 <button type="button" class="btn  btn-info js_unfollow" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                                     <i class="fa fa-check mr5"></i><?php echo __("Following");?>

                                 </button>
                                 <?php } else { ?>
                                 <button type="button" class="btn  btn-info js_follow" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                                     <i class="fa fa-rss mr5"></i><?php echo __("Follow");?>

                                 </button>
                                 <?php }?> -->
                              <!-- follow -->
                              <!-- message -->
                              <button type="button" class="js_chat_start button-messages-profile"
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
                                 <button type="button" class=" more_icon_img" data-toggle="dropdown" data-display="static" style="width:unset;">
                                 <span class="more_option">
                                 <img class="" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/more-icon.svg">
                                 </span>
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
                                       <span class="more_option_img">
                                       <img class="" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/poke.svg">
                                       </span>
                                       <?php echo __("Poke");?>

                                    </div>
                                    <?php }?>
                                    <?php }?>
                                    <!-- poke -->
                                    <!-- report -->
                                    <div class="dropdown-item pointer js_report" data-handle="user"
                                       data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
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
                                    <a class="dropdown-item"
                                       href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
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
/settings/profile"  class=" edit_profile_icon">
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
                        <!-- profile-buttons -->
                        <!-- profile-name -->
                     </div>
                  </div>
               </div>
               <!-- profile-header -->   
            </section>
            <div class="col-lg-3">
               <div class="profileUpdatesDesign">
                  <!-- panel [mutual-friends] -->
                  <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] != $_smarty_tpl->tpl_vars['profile']->value['user_id'] && !$_smarty_tpl->tpl_vars['profile']->value['we_friends'] && !$_smarty_tpl->tpl_vars['profile']->value['friendship_declined']) {?>
                  <div class="card panel-mutual-friends" style="display:none;">
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
                              <!-- add friend -->
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['he_request']) {?>
                              <button class="btn btn-primary  js_friend-accept"
                                 data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"> <span class="request_dlt">
                <img
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">
                    </span>
<?php echo __("Confirm");?>

</button>
                              <button class="btn btn-secondary  js_friend-decline"
                                 data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
"><span class="request_dlt">
                <img
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">
                    </span>
<?php echo __("Delete");?>

</button>
                              <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['i_request']) {?>
                              <button class="btn btn-secondary  js_friend-cancel"
                                 data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                              <img class="btn_image_" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/tick.svg">Request Sent
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
                              <!-- add friend -->
                           </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] && $_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] > 0) {?>
                        <div class="mt10 clearfix">
                           <ul class="float-left mr20">
                              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['mutual_friends'], 'mutual_friend');
$_smarty_tpl->tpl_vars['mutual_friend']->index = -1;
$_smarty_tpl->tpl_vars['mutual_friend']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mutual_friend']->value) {
$_smarty_tpl->tpl_vars['mutual_friend']->do_else = false;
$_smarty_tpl->tpl_vars['mutual_friend']->index++;
$__foreach_mutual_friend_0_saved = $_smarty_tpl->tpl_vars['mutual_friend'];
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
$_smarty_tpl->tpl_vars['mutual_friend'] = $__foreach_mutual_friend_0_saved;
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
                  <?php }?>
                  <!-- panel [mutual-friends] -->
                  <div class="about_content_sec">
                     <div class="addBioGlobal">
                        <h4>About</h4>
                     </div>
                     <!-- panel [about] -->
                     <div class="card" style="margin-bottom: 0px;">
                        <div class="card-body" style="padding-top: 0px;">
                           <?php if (!is_empty($_smarty_tpl->tpl_vars['profile']->value['user_biography'])) {?>
                           <div class="about-bio">
                              <div class="js_readmore overflow-hidden">
                                 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_biography'];?>

                              </div>
                           </div>
                           <?php }?>
                           <ul class="about-list">
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_subscribed']) {?>
                              <li class="package" <?php if ($_smarty_tpl->tpl_vars['profile']->value['package_color']) {?> style="background: <?php echo $_smarty_tpl->tpl_vars['profile']->value['package_color'];?>
" <?php }?>>
                              <i class="fa fa-bolt fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['profile']->value['package_name'];?>
 <?php echo __("Member");?>

                              </li>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_work_title']) {?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_work'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_work'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" " src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/work_icon.svg">
                                    </div>
                                    <div class="about_list_text">
                                       <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_work_title'];?>

                                       <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_work_place']) {?>
                                       <?php echo __("at");?>

                                       <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_work_url']) {?>
                                       <a target="_blank"
                                          href="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_work_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_work_place'];?>
</a>
                                       <?php } else { ?>
                                       <span><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_work_place'];?>
</span>
                                       <?php }?>
                                       <?php }?>
                                    </div>
                                 </div>
                              </li>
                              <?php }?>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_edu_major']) {?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_education'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_education'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" " src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/univsty.svg">
                                    </div>
                                    <div class="about_list_text">
                                       <?php echo __("Studied");?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_edu_major'];?>

                                       <?php echo __("at");?>
 <span class="text-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_edu_school'];?>
</span>
                                       <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_edu_class']) {?>
                                       <div class="details">
                                          <?php echo __("Class of");?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_edu_class'];?>

                                       </div>
                                       <?php }?>
                                    </div>
                                 </div>
                              </li>
                              <?php }?>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_current_city']) {?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_location'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_location'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" " src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/home-icb.svg">
                                    </div>
                                    <div class="about_list_text">
                                       <?php echo __("Lives in");?>
 <span class="text-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_current_city'];?>
</span>
                                    </div>
                                 </div>
                              </li>
                              <?php }?>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_hometown']) {?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_location'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_location'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" " src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/location_icon.svg">
                                    </div>
                                    <div class="about_list_text">
                                       <?php echo __("From");?>
 <span class="text-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_hometown'];?>
</span>
                                    </div>
                                 </div>
                              </li>
                              <?php }?>
                              <?php }?>
                              <li>
                                 <div class="about-list-item d-flex">
                                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_gender'] == "male") {?>
                                    <div class="about_list_img">
                                       <img class=" " src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_friends.svg">
                                    </div>
                                    <div class="about_list_text">
                                       <?php echo __("Male");?>

                                    </div>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['user_gender'] == "female") {?>
                                    <div class="about_list_img">
                                       <img class=" " src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/user_defoult_img.jpg">
                                    </div>
                                    <div class="about_list_text"> 
                                       <?php echo __("Female");?>

                                    </div>
                                    <?php } else { ?>
                                    <div class="about_list_img">
                                       <img class="" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/user_defoult_img.jpg">
                                    </div>
                                    <div class="about_list_text"> 
                                       <?php echo __("Other");?>

                                    </div>
                                    <?php }?>
                                 </div>
                              </li>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_relationship']) {?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_relationship'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_relationship'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" " src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/reletion-icon.svg">
                                    </div>
                                    <div class="about_list_text"> 
                                       <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_relationship'] == "relationship") {?>
                                       <?php echo __("In a relationship");?>

                                       <?php } elseif ($_smarty_tpl->tpl_vars['profile']->value['user_relationship'] == "complicated") {?>
                                       <?php echo __("It's complicated");?>

                                       <?php } else { ?>
                                       <?php echo __(ucfirst($_smarty_tpl->tpl_vars['profile']->value['user_relationship']));?>

                                       <?php }?>
                                    </div>
                                 </div>
                              </li>
                              <?php }?>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_birthdate'] != null) {?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_birthdate'] == "public" || ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_birthdate'] == "friends" && $_smarty_tpl->tpl_vars['profile']->value['we_friends'])) {?>
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" " src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/dob_icon.svg">
                                    </div>
                                    <div class="about_list_text"> 
                                       <?php if ($_smarty_tpl->tpl_vars['system']->value['system_datetime_format'] == "d/m/Y H:i") {?>
                                       <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['profile']->value['user_birthdate'],"%d/%m/%Y");?>

                                       <?php } else { ?>
                                       <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['profile']->value['user_birthdate'],"%m/%d/%Y");?>

                                       <?php }?>
                                    </div>
                                 </div>
                              </li>
                              <?php }?>
                              <?php }?>
                              <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_website']) {?>
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" " src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg">
                                    </div>
                                    <div class="about_list_text"> 
                                       <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_website'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_website'];?>
</a>
                                    </div>
                                 </div>
                              </li>
                              <?php }?>
                              <li>
                                 <div class="about-list-item d-flex">
                                    <div class="about_list_img">
                                       <img class=" " src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/eye_icon.svg">
                                    </div>
                                    <div class="about_list_text">
                                       <?php echo __("Followed by");?>

                                       <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followers" class="friendsCount">
                                          <?php echo $_smarty_tpl->tpl_vars['profile']->value['followers_count'];?>
 <?php echo __("people");?>
</a>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <!-- panel [about] -->
                     <!-- friends -->
                     <?php if ($_smarty_tpl->tpl_vars['profile']->value['friends_count'] > 0) {?>
                     <div class="card" style="margin-bottom: 0px;">
                        <div class="card-header bg-transparent subHeadingGlobal">
                           <!-- <i class="fa fa-users mr5"></i> -->
                           <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends"><?php echo __("Friends");?>
</a>
                           <span><?php echo $_smarty_tpl->tpl_vars['profile']->value['friends_count'];?>
</span>
                           <?php if ($_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] && $_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'] > 0) {?>
                           <span class="text-underline" data-toggle="modal"
                              data-url="users/mutual_friends.php?uid=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">(<?php echo $_smarty_tpl->tpl_vars['profile']->value['mutual_friends_count'];?>

                           <?php echo __("mutual friends");?>
)</span>
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
                              <div class="col-3 col-sm-4 col-md-4 col-lg-3">
                                 <div class="circled-user-box safa">
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
                     <?php }?>
                     <!-- friends -->
                  </div>
               </div>
            </div>
            <!-- content panel -->
            <div class="col-lg-9 js_conversation-container sec_cstm_w offcanvas-mainbar">
               <!-- profile-tabs -->
               <div class="profile-header-tabs for-mobile">
                  <ul>
                     <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
" <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>class="active"
                        <?php }?>>
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
/likes" <?php if ($_smarty_tpl->tpl_vars['view']->value == "likes") {?>class="active" <?php }?>>
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
               <!-- profile-content -->
               <div class="row">
                  <!-- view content -->
                  <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>
                  <!-- left panel -->
                  
                  <!-- left panel -->
                  <!-- center panel -->
                  <div class="col-lg-12">
                     <!-- publisher -->
                     <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                     <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['profile']->value['user_id']) {?>
                     <?php $_smarty_tpl->_subTemplateRender('file:_publisher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"me",'_privacy'=>true), 0, false);
?>
                     <?php } elseif ($_smarty_tpl->tpl_vars['system']->value['wall_posts_enabled'] && ($_smarty_tpl->tpl_vars['profile']->value['user_privacy_wall'] == 'friends' && $_smarty_tpl->tpl_vars['profile']->value['we_friends'] || $_smarty_tpl->tpl_vars['profile']->value['user_privacy_wall'] == 'public')) {?>
                     <?php $_smarty_tpl->_subTemplateRender('file:_publisher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"user",'_id'=>$_smarty_tpl->tpl_vars['profile']->value['user_id'],'_privacy'=>true), 0, true);
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
                     <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"posts_profile",'_id'=>$_smarty_tpl->tpl_vars['profile']->value['user_id']), 0, false);
?>
                     <!-- posts -->
                  </div>
                  <!-- center panel -->
                  <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "friends") {?>
                  <!-- friends -->
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
                              <i class="fa fa-users mr10"></i><?php echo __("Friends");?>

                              </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs">
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends">
                                 <?php echo __("Friends");?>

                                 <span class="badge badge-pill badge-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['friends_count'];?>
</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followers"><?php echo __("Followers");?>
</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followings"><?php echo __("Followings");?>
</a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body pb0">
                           <?php if ($_smarty_tpl->tpl_vars['profile']->value['friends_count'] > 0) {?>
                           <ul class="row">
                              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['profile']->value['friends'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                              <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"]), 0, true);
?>
                              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                           </ul>
                           <?php if (count($_smarty_tpl->tpl_vars['profile']->value['friends']) >= $_smarty_tpl->tpl_vars['system']->value['min_results_even']) {?>
                           <!-- see-more -->
                           <div class="alert alert-info see-more mt0 mb20 js_see-more" data-get="friends"
                              data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                              <span><?php echo __("Load More");?>
</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           <?php }?>
                           <?php } else { ?>
                           <div class="text-center text-muted mt20 no_dataimg_  __no_data_contet__ ">
                              <img width="100%"
                                 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results16.jpg">
                              <p class="text-center text-muted mt10">
                                 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("try adding new friends.");?>

                              </p>
                           </div>
                           <?php }?>
                        </div>
                     </div>
                  </div>
                  <!-- friends -->
                  <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "followers") {?>
                  <!-- followers -->
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
                              <i class="fa fa-users mr10"></i><?php echo __("Friends");?>

                              </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs">
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends"><?php echo __("Friends");?>
</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followers">
                                 <?php echo __("Followers");?>

                                 <span class="badge badge-pill badge-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followers_count'];?>
</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followings"><?php echo __("Followings");?>
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
                              <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"]), 0, true);
?>
                              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                           </ul>
                           <?php if (count($_smarty_tpl->tpl_vars['profile']->value['followers']) >= $_smarty_tpl->tpl_vars['system']->value['min_results_even']) {?>
                           <!-- see-more -->
                           <div class="alert alert-info see-more mt0 mb20 js_see-more" data-get="followers" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                              <span><?php echo __("See More");?>
</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           <?php }?>
                           <?php } else { ?>
                           <div class="text-center text-muted mt20 no_dataimg_ __no_data_contet__  ">
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
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
                           <!-- panel title -->
                           <!-- <div class="mb20">
                              <i class="fa fa-users mr10"></i><?php echo __("Friends");?>

                              </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs">
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/friends"><?php echo __("Friends");?>
</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followers">
                                 <strong class="pr5"><?php echo __("Followers");?>
</strong>
                                 <span class="badge badge-pill badge-info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followers_count'];?>
</span>
                                 </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/followings">
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
                              <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"box",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"]), 0, true);
?>
                              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                           </ul>
                           <?php if (count($_smarty_tpl->tpl_vars['profile']->value['followings']) >= $_smarty_tpl->tpl_vars['system']->value['min_results_even']) {?>
                           <!-- see-more -->
                           <div class="alert alert-info see-more mt0 mb20 js_see-more" data-get="followings" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                              <span><?php echo __("See More");?>
</span>
                              <div class="loader loader_small x-hidden"></div>
                           </div>
                           <!-- see-more -->
                           <?php }?>
                           <?php } else { ?>
                           <div class="text-center text-muted mt20 no_dataimg_ __no_data_contet__  ">
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
                  <!-- added on 7sep end-->
                  <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "photos") {?>
                  <!-- photos -->
                  <div class="col-12">
                     <div class="card panel-photos">
                        <div class="card-header with-icon with-nav custom-tabs ">
                           <!-- panel title -->
                           <!-- <div class="mb20">
                              <i class="fa fa-images mr10"></i><?php echo __("Photos");?>

                              </div> -->
                           <!-- panel title -->
                           <!-- panel nav -->
                           <ul class="nav nav-tabs">
                              <li class="nav-item">
                                 <a class="nav-link active"
                                    href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/photos"><?php echo __("Photos");?>
</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link"
                                    href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
/albums"><?php echo __("Albums");?>
</a>
                              </li>
                           </ul>
                           <!-- panel nav -->
                        </div>
                        <div class="card-body">
                           <?php if ($_smarty_tpl->tpl_vars['profile']->value['photos']) {?>
                           <ul class="row no-gutters">
                              
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
                           <div class="__no_data_contet__ text-center">
                              <p class="text-center text-muted __nodata-img___">
                                 <img width="100%"
                                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results4.png">
                              <p><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("doesn't have Photos");?>
</p>
                              </p>
                           </div>
                           <?php }?>
                        </div>
                     </div>
                  </div>
                  <!-- photos -->
                  <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "albums") {?>
                  <!-- albums -->
                  <div class="col-12">
                     <div class="card">
                        <div class="card-header with-icon with-nav custom-tabs">
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
                           <div class="__no_data_contet__ text-center">
                              <p class="text-center text-muted __nodata-img___">
                                 <img width="100%"
                                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results4.png">
                              <p> <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("doesn't have albums");?>
 </p>
                              </p>
                           </div>
                           <!-- <p class="text-center text-muted mt10">
                              <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("doesn't have albums");?>

                              </p> -->
                           <?php }?>
                        </div>
                     </div>
                  </div>
                  <!-- albums -->
                  <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "album") {?>
                  <!-- albums -->
                  <div class="col-12">
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
                  <div class="col-12">
                     <div class="card panel-videos">
                        <!-- <div class="card-header with-icon"> -->
                        <!-- panel title -->
                        <!-- <div class="mb20">
                           <i class="fa fa-video mr10"></i><?php echo __("Videos");?>

                           </div> -->
                        <!-- panel title -->
                        <!-- </div> -->
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
                              <p>  <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("doesn't have videos");?>
 </p>
                              </p>
                           </div>
                           <!-- <p class="text-center text-muted mt10">
                              <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo __("doesn't have videos");?>

                              </p> -->
                           <?php }?>
                        </div>
                     </div>
                  </div>
                  <!-- videos -->
                  <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "likes") {?>
                  <!-- likes -->
                  <div class="col-12">
                     <div class="card">
                        <!-- <div class="card-header with-icon"> -->
                        <!-- panel title -->
                        <!-- <i class="fa fa-thumbs-up mr10"></i><?php echo __("Likes");?>
 -->
                        <!-- panel title -->
                        <!-- </div> -->
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
/images/no_results13.png">
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
                  <div class="col-12">
                     <div class="card">
                        <!-- <div class="card-header with-icon"> -->
                        <!-- panel title -->
                        <!-- <i class="fa fa-users mr10"></i><?php echo __("Groups");?>
 -->
                        <!-- panel title -->
                        <!-- </div> -->
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
                           <!-- <p class="text-center text-muted mt10">
                              <?php echo __("No groups to show");?>

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
                           <!-- <p class="text-center text-muted mt10">
                              <?php echo __("No groups to Show");?>

                              </p> -->
                           <?php }?>
                        </div>
                     </div>
                  </div>
                  <!-- groups -->
                  <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "events") {?>
                  <!-- events -->
                  <div class="col-12">
                     <div class="card">
                        <!-- <div class="card-header with-icon"> -->
                        <!-- panel title -->
                        <!-- <i class="fa fa-calendar mr10"></i><?php echo __("Events");?>
 -->
                        <!-- panel title -->
                        <!-- </div> -->
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
                           <p class="text-center text-muted mt10">
                              <?php echo __("No events to show");?>

                           </p>
                           <?php }?>
                           <?php } else { ?>
                           <p class="text-center text-muted mt10">
                              <?php echo __("No events to show");?>

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
         </div>
      </div>
      <div class=" ">
         <div class="right-sidebar js_sticky-sidebar">
            <?php $_smarty_tpl->_subTemplateRender('file:right-sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
         </div>
      </div>
      <!-- content panel -->
   </div>
</div>
<!-- page content -->
<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ($_smarty_tpl->tpl_vars['gift']->value) {
echo '<script'; ?>
>
   $(function () {
       modal('#gift');
   });
<?php echo '</script'; ?>
>
<?php }?>

<?php }
}
