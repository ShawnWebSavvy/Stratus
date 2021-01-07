<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 06:59:51
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile__feeds_user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff40e672add59_52059308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c8337d70e9277a9a1d67d86d4b825f7fff1ccb57' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile__feeds_user.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__reaction_emojis.tpl' => 1,
  ),
),false)) {
function content_5ff40e672add59_52059308 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_tpl']->value == "box") {?>
<div class="col-md-6 col-lg-4 mb20">
    <div class="ui-box">
        <div class="img">
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
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
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
"
                    title="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>

                    <br><span class="search_username"
                        style="color:#a7b4cb;font-size:12px;letter-spacing:0;line-height:20px;"><?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
</span>
                </a>
            </span>
            <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_verified']) {?>
            <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
'
                class="fa fa-check-circle fa-fw verified-badge"></i>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_subscribed']) {?>
            <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Pro User");?>
'
                class="fa fa-bolt fa-fw pro-badge"></i>
            <?php }?>
        </div>
        <span class="user_name_span">@<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
</span>
        <div class="mt10">
            <!-- buttons -->
            <?php if ($_smarty_tpl->tpl_vars['_connection']->value == "request") {?>
            <!-- <button type="button" class="btn  btn-primary js_friend-accept" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Confirm");?>
</button>
                    <button type="button" class="btn  btn-danger js_friend-decline" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Delete");?>
</button>

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "add") {?>
                    <button type="button" class="btn  btn-success js_friend-add" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                      <!--  <i class="fa fa-plus mr5"></i> -->
            <img class="btn_image_"
                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
            <img class="btn_image_hover"
                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
            <?php if ($_smarty_tpl->tpl_vars['_small']->value) {
echo __("Add");
} else {
echo __("Add Friend");
}?>
            </button>

            <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "cancel") {?>
            <button type="button" class="btn  btn-warning js_friend-cancel" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <img class="btn_image_"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/tick.svg"><?php echo __("Friend Request
                Sent");?>

            </button>

            <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "remove") {?>
            <button type="button" class="btn  btn-success <?php if (!$_smarty_tpl->tpl_vars['_no_action']->value) {?>btn-delete<?php }?> js_friend-remove"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <img class="btn_image"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/plus_icon.svg">
                <img class="btn_image_hover"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">
                <span class="btn_image_"> <?php echo __("Friends");?>
 </span>
                <span class="btn_image_hover"> <?php echo __("Delete");?>
 </span>
            </button>-->

            <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "follow") {?>
            <button type="button" class="btn  btn-info js_follow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-rss mr5"></i><?php echo __("Follow");?>

            </button>

            <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "unfollow") {?>
            <button type="button" class="btn  btn-info js_unfollow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-check mr5"></i><?php echo __("Following");?>

            </button>

            <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "blocked") {?>
            <button type="button" class="btn  btn-danger js_unblock-user" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-trash mr5"></i><?php echo __("Unblock");?>

            </button>

            <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_invite") {?>
            <button type="button" class="btn js_page-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <img class="btn_image_"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                <img class="btn_image_hover"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                <?php echo __("Invite");?>

            </button>

            <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_manage") {?>
            <button type="button" class="btn btn-danger js_page-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-trash mr5"></i><?php echo __("Remove");?>

            </button>
            <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
            <button type="button" class="btn btn-danger js_page-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-trash mr5"></i><?php echo __("Remove Admin");?>

            </button>
            <?php } else { ?>
            <button type="button" class="btn btn-primary js_page-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-check mr5"></i><?php echo __("Make Admin");?>

            </button>
            <?php }?>

            <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_invite") {?>
            <button type="button" class="btn  btn-info js_group-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <span class="btns_img">
                    <img class="btn_image_"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                    <img class="btn_image_hover"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                </span>
                <?php echo __("Add");?>

            </button>

            <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_request") {?>
            <button type="button" class="btn  btn-primary js_group-request-accept" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Approve");?>
</button>
            <button type="button" class="btn  btn-danger js_group-request-decline" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Decline");?>
</button>

            <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_manage") {?>
            <button type="button" class="btn  btn-danger js_group-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-trash mr5"></i><?php echo __("Remove");?>

            </button>
            <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
            <button type="button" class="btn  btn-danger js_group-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-trash mr5"></i><?php echo __("Remove Admin");?>

            </button>
            <?php } else { ?>
            <button type="button" class="btn  btn-primary js_group-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-check mr5"></i><?php echo __("Make Admin");?>

            </button>
            <?php }?>

            <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "event_invite") {?>
            <button type="button" class="btn  btn-info js_event-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                <i class="fa fa-user-plus mr5"></i> <?php echo __("Invite");?>

            </button>

            <?php }?>
            <!-- buttons -->
        </div>
    </div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['_tpl']->value == "list") {
if (!empty($_smarty_tpl->tpl_vars['_user']->value['user_firstname'])) {?>

<li class="feeds-item customFollow" <?php if ($_smarty_tpl->tpl_vars['_user']->value['id']) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['id'];?>
" <?php }?>>
    <div class="data-container <?php if ($_smarty_tpl->tpl_vars['_small']->value) {?>small<?php }?>">
        <a class="data-avatar <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"
            href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
">
            <img src="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>
">
            <?php if ($_smarty_tpl->tpl_vars['_reaction']->value) {?>
            <div class="data-reaction">
                <div class="inline-emoji no_animation">
                    <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['_reaction']->value), 0, false);
?>
                </div>
            </div>
            <?php }?>
        </a>
        <div class="data-content">
            <div class="float-right">
                <!-- buttons -->
                <?php if ($_smarty_tpl->tpl_vars['_connection']->value == "request") {?>
                <!--   <button type="button" class="btn  btn-primary js_friend-accept" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Confirm");?>
</button>
                        <button type="button" class="btn  btn-danger js_friend-decline" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Delete");?>
</button>

                    <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "add") {?>
                        <button type="button" class="btn  btn-success js_friend-add" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                            <!--<i class="fa fa-plus mr5"></i> -->
                <img class="btn_image_"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                <img class="btn_image_hover"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                <?php if ($_smarty_tpl->tpl_vars['_small']->value) {
echo __("Add");
} else {
echo __("Add Friend");
}?>
                </button>

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "cancel") {?>
                <button type="button" class="btn  btn-warning js_friend-cancel" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <img class="btn_image_"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/tick.svg"><?php echo __("Friend
                    Request Sent");?>

                </button>

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "remove") {?>
                <button type="button" class="btn  btn-success <?php if (!$_smarty_tpl->tpl_vars['_no_action']->value) {?>btn-delete<?php }?> js_friend-remove"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <img class="btn_image"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/plus_icon.svg">
                    <img class="btn_image_hover"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">
                    <span class="btn_image_"> <?php echo __("Friends");?>
 </span>
                    <span class="btn_image_hover"> <?php echo __("Delete");?>
 </span>
                </button>-->

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "follow") {?>
                <button type="button" title="Follow" class="btn  btn-info js_follow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-rss mr5"></i><?php echo __("Follow");?>

                </button>

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "unfollow") {?>
                <button type="button" title="Unfollow" class="btn  btn-info js_unfollow" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-check mr5"></i><?php echo __("Following");?>

                </button>

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "blocked") {?>
                <button type="button" class="btn  btn-danger js_unblock-user" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-trash mr5"></i><?php echo __("Unblock");?>

                </button>

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_invite") {?>
                <button type="button" class="btn js_page-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <img class="btn_image_"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                    <img class="btn_image_hover"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                    <?php echo __("Invite");?>

                </button>

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "page_manage") {?>
                <button type="button" class="btn btn-danger js_page-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-trash mr5"></i><?php echo __("Remove");?>

                </button>
                <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
                <button type="button" class="btn btn-danger js_page-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-trash mr5"></i><?php echo __("Remove Admin");?>

                </button>
                <?php } else { ?>
                <button type="button" class="btn btn-primary js_page-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-check mr5"></i><?php echo __("Make Admin");?>

                </button>
                <?php }?>

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_invite") {?>
                <button type="button" class="btn  btn-info js_group-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <span class="btns_img">
                        <img class="btn_image_"
                            src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                        <img class="btn_image_hover"
                            src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                    </span>
                    <?php echo __("Add");?>

                </button>

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_request") {?>
                <button type="button" class="btn  btn-primary js_group-request-accept" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Approve");?>
</button>
                <button type="button" class="btn  btn-danger js_group-request-decline" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
"><?php echo __("Decline");?>
</button>

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "group_manage") {?>
                <button type="button" class="btn  btn-danger js_group-member-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-trash mr5"></i><?php echo __("Remove");?>

                </button>
                <?php if ($_smarty_tpl->tpl_vars['_user']->value['i_admin']) {?>
                <button type="button" class="btn  btn-danger js_group-admin-remove" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-trash mr5"></i><?php echo __("Remove Admin");?>

                </button>
                <?php } else { ?>
                <button type="button" class="btn  btn-primary js_group-admin-addation" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-check mr5"></i><?php echo __("Make Admin");?>

                </button>
                <?php }?>

                <?php } elseif ($_smarty_tpl->tpl_vars['_connection']->value == "event_invite") {?>
                <button type="button" class="btn  btn-info js_event-invite" data-id="<?php echo $_smarty_tpl->tpl_vars['_user']->value['node_id'];?>
"
                    data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <i class="fa fa-user-plus mr5"></i> <?php echo __("Invite");?>

                </button>

                <?php }?>
                <!-- buttons -->
            </div>
            <div>
                <span class="name js_user-popover" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
">
                        <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>

                        <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_verified']) {?>
                        <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
'
                            class="fa fa-check-circle fa-fw verified-badge"></i>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_subscribed']) {?>
                        <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Pro User");?>
'
                            class="fa fa-bolt fa-fw pro-badge"></i>
                        <?php }?></a>
                </span>
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
">
                    <span class="search_username"
                        style="color:#a7b4cb;font-size:12px;">@<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
</span></a>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['_connection']->value != "me" && $_smarty_tpl->tpl_vars['_user']->value['mutual_friends_count'] > 0 && $_smarty_tpl->tpl_vars['active_page']->value != "GlobalHub") {?>
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
</li>
<?php }
}
}
}
