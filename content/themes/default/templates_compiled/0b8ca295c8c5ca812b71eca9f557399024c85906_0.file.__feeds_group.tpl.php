<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-30 11:45:25
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_group.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fec68552d2062_57193234',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b8ca295c8c5ca812b71eca9f557399024c85906' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_group.tpl',
      1 => 1609248087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fec68552d2062_57193234 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_tpl']->value == "box") {?>
<li class="col-md-6  col-lg-4 col-xl-3 explore_page_lists">
    <div class="ui-box uiBoxPosition">
        <div class="img">
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
                <img class="lazyload" alt="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
" data-src="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_picture'];?>
" />
            </a>
        </div>
        <div class="mt10">
            <a class="h6"
                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
</a>
            <div><?php echo $_smarty_tpl->tpl_vars['_group']->value['group_members'];?>
 <?php echo __("Members");?>
</div>
        </div>
        <div class="mt10">
            <?php if ($_smarty_tpl->tpl_vars['_group']->value['i_joined'] == "approved") {?>
            <button type="button" class="btn btn-success <?php if (!$_smarty_tpl->tpl_vars['_no_action']->value) {?>btn-delete<?php }?> js_leave-group"
                data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];?>
">
                <i class="fa fa-check mr5"></i><?php echo __("Joined");?>

            </button>
            <?php } elseif ($_smarty_tpl->tpl_vars['_group']->value['i_joined'] == "pending") {?>
            <button type="button" class="btn btn-warning js_leave-group" data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
"
                data-privacy="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];?>
">
                <i class="fa fa-clock mr5"></i><?php echo __("Pending");?>

            </button>
            <?php } else { ?>
            <button type="button" class="btn  btn-success js_join-group" data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
"
                data-privacy="<?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['_group']->value['group_admin']) {?>public<?php } else {
echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];
}?>">
                <!-- <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg"> -->
                <img class="btn_image_"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                <img class="btn_image_hover"
                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                <?php echo __("Join");?>

            </button>
            <?php }?>
        </div>
    </div>
</li>
<?php } elseif ($_smarty_tpl->tpl_vars['_tpl']->value == "list") {?>
<li class="feeds-item">
    <div class="data-container <?php if ($_smarty_tpl->tpl_vars['_small']->value) {?>small<?php }?>">
        <a class="data-avatar" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
            <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
">
        </a>
        <div class="data-content">
            <div class="float-right">
                <?php if ($_smarty_tpl->tpl_vars['_group']->value['i_joined'] == "approved") {?>
                <button type="button" class="btn btn-success <?php if (!$_smarty_tpl->tpl_vars['_no_action']->value) {?>btn-delete<?php }?> js_leave-group"
                    data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
" data-privacy="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];?>
">
                    <i class="fa fa-check mr5"></i><?php echo __("Joined");?>

                </button>
                <?php } elseif ($_smarty_tpl->tpl_vars['_group']->value['i_joined'] == "pending") {?>
                <button type="button" class="btn btn-warning js_leave-group" data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
"
                    data-privacy="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];?>
">
                    <i class="fa fa-clock mr5"></i><?php echo __("Pending");?>

                </button>
                <?php } else { ?>
                <button type="button" class="btn  btn-success js_join-group" data-id="<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_id'];?>
"
                    data-privacy="<?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['_group']->value['group_admin']) {?>public<?php } else {
echo $_smarty_tpl->tpl_vars['_group']->value['group_privacy'];
}?>">
                    <!-- <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg"> -->
                    <img class="btn_image_ lazyload"
                        data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                    <img class="btn_image_hover "
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                    <?php echo __("Join");?>

                </button>
                <?php }?>
            </div>
            <div>
                <span class="name">
                    <a
                        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/<?php echo $_smarty_tpl->tpl_vars['_group']->value['group_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_group']->value['group_title'];?>
</a>
                </span>
                <div><?php echo $_smarty_tpl->tpl_vars['_group']->value['group_members'];?>
 <?php echo __("Members");?>
 </div>
            </div>
        </div>
    </div>
</li>
<?php }
}
}
