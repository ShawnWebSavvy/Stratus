<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-06 09:13:58
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff57f56756a58_76208573',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3565bf52f83ac21febe10b24058b782d958cda04' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_user.tpl',
      1 => 1609919355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__reaction_emojis.tpl' => 1,
  ),
),false)) {
function content_5ff57f56756a58_76208573 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_tpl']->value == "box") {?>
<div class="col-md-6 col-lg-4 mb10">
    <div class="ui-box">
        <div class="img">
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
">
                <img alt="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_picture'];?>
" />
            </a>
        </div>
        <div class="mt10">
            <span class="js_user-popover" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <a class="h6" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
"
                    title="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>

                </a>
            </span> <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_verified']) {?>
            <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
'
                class="fa fa-check-circle fa-fw verified-badge"></i> <?php }?> <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_subscribed']) {?>
            <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Pro User");?>
'
                class="fa fa-bolt fa-fw pro-badge"></i> <?php }?>
        </div>
        <div class="mt10">
            <!-- buttons -->
            <?php if ($_smarty_tpl->tpl_vars['_connection']->value == "request") {?>
            <button type="button" class="btn  btn-primary js_friend-accept"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"> <span class="request_dlt">
                <img
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">
                    </span>
<span class="request_aspct"><img 
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/tick.svg">
                    </span>
<?php echo __("Confirm");?>


</button>
            <button type="button" class="btn  btn-danger js_friend-decline"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><span class="request_dlt">
                <img
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">
                    </span>
<?php echo __("Delete");?>

</button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "add") {?>
            <button type="button" class="btn  btn-success js_friend-add" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <!-- <i class="fa fa-plus mr5"></i> -->
                <img class="btn_image_"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                <img class="btn_image_hover"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                <?php if ($_smarty_tpl->tpl_vars['_small']->value) {
echo __("Add");
} else {
echo __("Add Friend ");
}?>
            </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "cancel") {?>
            <button type="button" class="btn btn-warning js_friend-cancel"
                style="display: flex;align-items: center;padding: 7px 11px;margin: 0 auto;"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <img class="btn_image_"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/tick.svg">
                Request Sent
            </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "remove") {?>
            <button type="button" class="btn  btn-success <?php if (!$_smarty_tpl->tpl_vars['_no_action']->value) {?>btn-delete<?php }?> js_friend-remove"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <img class="btn_image"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/plus_icon.svg">
                <img class="btn_image_hover"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">

                <span class="btn_image_"> <?php echo __("Friends");?>
 </span>
                <span class="btn_image_hover"> <?php echo __("Delete");?>
 </span>
            </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "follow") {?>
            <button type="button" class="btn  btn-info js_follow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-rss mr5"></i><?php echo __("Follow");?>

            </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "unfollow") {?>
            <button type="button" class="btn  btn-info js_unfollow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-check mr5"></i><?php echo __("Following");?>

            </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "blocked") {?>
            <button type="button" class="btn  btn-danger js_unblock-user" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-trash mr5"></i><?php echo __("Unblock");?>

            </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_invite") {?>
            <button type="button" class="btn js_page-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <img class="btn_image_"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                <img class="btn_image_hover"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                <?php echo __("Invite");?>

            </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_manage") {?>
            <button type="button" class="btn btn-danger js_page-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-trash mr5"></i>
            </button> <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
            <button type="button" class="btn btn-danger js_page-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <?php echo __("Remove Admin");?>

            </button> <?php } else { ?>
            <button type="button" class="btn btn-primary js_page-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <?php echo __("Make Admin");?>

            </button> <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_invite") {?>
            <button type="button" class="btn  btn-info js_group-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <span class="btns_img">
                    <img class="btn_image_"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                    <img class="btn_image_hover"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                </span>
                </i><?php echo __("Add");?>

            </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_request") {?>
            <button type="button" class="btn  btn-primary js_group-request-accept" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Approve");?>
</button>
            <button type="button" class="btn  btn-danger js_group-request-decline" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Decline");?>
</button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_manage") {?>
            <button type="button" class="btn  btn-danger js_group-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-trash mr5"></i>
            </button> <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
            <button type="button" class="btn  btn-danger js_group-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <?php echo __("Remove Admin");?>

            </button> <?php } else { ?>
            <button type="button" class="btn  btn-primary js_group-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <?php echo __("Make Admin");?>

            </button> <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "event_invite") {?>
            <button type="button" class="btn  btn-info js_event-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-user-plus mr5"></i> <?php echo __("Invite");?>

            </button> <?php }?>
            <!-- buttons -->
        </div>
    </div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['_tpl']->value == "list") {?>
<li class="feeds-item" <?php if ($_smarty_tpl->tpl_vars['_user']->value['id']) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['id'];?>
" <?php }?>>
    <div class="data-container searchSectionWrap">
        <div class="_user_detail_sec">
            <div class="user__imgs">
                <a class="data-avatar" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
                    <img class="lazyload dddd" data-src="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_picture'];?>
"
                        alt="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>
"> <?php if ($_smarty_tpl->tpl_vars['_reaction']->value) {?>
                    <div class="data-reaction">
                        <div class="inline-emoji no_animation">
                            <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['_reaction']->value), 0, false);
?>
                        </div>
                    </div>
                    <?php }?>
                </a>
            </div>
            <div class="userNameWrap _user_details">
                <div class="mt5">
                    <span class="name js_user-popover <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>

                            <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>
</a>
                    </span> <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_verified']) {?>
                    <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
'
                        class="fa fa-check-circle fa-fw verified-badge"></i> <?php }?> <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_subscribed']) {?>
                    <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Pro User");?>
'
                        class="fa fa-bolt fa-fw pro-badge"></i> <?php }?>
                </div>
                <div class="userlocation">
                    <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_country_name']) {?>
                    <span><?php echo $_smarty_tpl->tpl_vars['_user']->value['user_country_name'];?>
</span> <?php }?> <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_current_city']) {?>
                    <span><?php echo $_smarty_tpl->tpl_vars['_user']->value['user_current_city'];?>
</span> <?php }?>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['_connection']->value != "me" && $_smarty_tpl->tpl_vars['_user']->value['mutual_friends_count'] > 0) {?>
                <div>
                    <span class="text-underline" data-toggle="modal"
                        data-url="users/mutual_friends.php?uid=<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['_user']->value['mutual_friends_count'];?>

                        <?php echo __("mutual friends");?>
</span>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="data-content usernamesWrapBlock">

            <div class="float-right _user_action_">
                <!-- buttons -->
                <?php if ($_smarty_tpl->tpl_vars['_connection']->value == "request") {?>
                <button type="button" class="btn  btn-primary js_friend-accept"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"> <span class="request_aspct"><img 
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/tick.svg">
                    </span>
<?php echo __("Confirm");?>

</button>
                <button type="button" class="btn  btn-danger js_friend-decline"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><span class="request_dlt">
                <img
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">
                    </span>
<?php echo __("Delete");?>

</button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "add") {?>
                <button type="button" class="btn  btn-success js_friend-add" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <img class="btn_image_"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                    <img class="btn_image_hover"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                    <?php if (!$_smarty_tpl->tpl_vars['_small']->value) {?> <?php echo __("Add Friend");
}?>
                </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "cancel") {?>
                <button type="button" class="btn  btn-warning js_friend-cancel" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <img class="btn_image_"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/tick.svg"><?php echo __("Friend
                    Request Sent");?>

                </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "remove") {?>
                <button type="button" class="btn  btn-success <?php if (!$_smarty_tpl->tpl_vars['_no_action']->value) {?>btn-delete<?php }?> js_friend-remove"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <img class="btn_image"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/plus_icon.svg">
                    <img class="btn_image_hover"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">
                    <span class="btn_image_ <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"> <?php echo __("Friends");?>
 </span>
                    <span class="btn_image_hover"> <?php echo __("Delete");?>
 </span>
                </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "follow") {?>
                <button type="button" class="btn  btn-info js_follow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-rss mr5"></i><?php echo __("Follow");?>

                </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "unfollow") {?>
                <button type="button" class="btn  btn-info js_unfollow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-check mr5"></i><?php echo __("Following");?>

                </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "blocked") {?>
                <button type="button" class="btn  btn-danger js_unblock-user" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-trash mr5"></i><?php echo __("Unblock");?>

                </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_invite") {?>
                <button type="button" class="btn js_page-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <img class="btn_image_"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                    <img class="btn_image_hover"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                    <?php echo __("Invite");?>

                </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_manage") {?>
                <button type="button" class="btn btn-danger js_page-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-trash mr5"></i>
                </button> <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
                <button type="button" class="btn btn-danger js_page-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <?php echo __("Remove Admin");?>

                </button> <?php } else { ?>
                <button type="button" class="btn btn-primary js_page-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <?php echo __("Make Admin");?>

                </button> <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_invite") {?>
                <button type="button" class="btn  btn-info js_group-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <span class="btns_img">
                        <img class="btn_image_"
                            src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                        <img class="btn_image_hover"
                            src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                    </span>
                    <?php echo __("Add");?>

                </button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_request") {?>
                <button type="button" class="btn  btn-primary js_group-request-accept" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Approve");?>
</button>
                <button type="button" class="btn  btn-danger js_group-request-decline" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Decline");?>
</button> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_manage") {?>
                <button type="button" class="btn  btn-danger js_group-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-trash mr5"></i>
                </button> <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
                <button type="button" class="btn  btn-danger js_group-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <?php echo __("Remove Admin");?>

                </button> <?php } else { ?>
                <button type="button" class="btn  btn-primary js_group-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <?php echo __("Make Admin");?>

                </button> <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "event_invite") {?>
                <button type="button" class="btn  btn-info js_event-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <img
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                    <?php echo __("Invite");?>

                </button> <?php }?>
                <!-- buttons -->
            </div>
        </div>
    </div>
</li>
<?php }
}
}
