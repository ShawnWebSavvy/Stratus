<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-07 07:27:36
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-ajax.popover.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff6b7e82bd616_73278854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1797ead65296f14b3c9557bc353f80e609f10c2f' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-ajax.popover.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff6b7e82bd616_73278854 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['type']->value == "user") {?>
    <!-- user popover -->
    <div class="user-popover-content">
        <div class="user-card">
                <div class="user-card-avatar">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
">
                </div>
                <div class="user-card-info">
                    <a class="name" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['profile']->value['user_verified']) {?>
                        <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
' class="fa fa-check-circle fa-fw verified-badge"></i>
                    <?php }?>
                    <div class="info">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
&view=followers"><?php echo $_smarty_tpl->tpl_vars['profile']->value['followers_count'];?>
 <?php echo __("followers");?>
</a>
                    </div>
                </div>
        </div>
        <div class="buttonWrapPopOver">
            <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_id'] != $_smarty_tpl->tpl_vars['profile']->value['user_id']) {?>
                <!-- follow -->
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['i_follow']) {?>
                    <button type="button" title="Unfollow" class="btn btn-sm btn-info js_unfollow" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                        <i class="fa fa-check mr5"></i><?php echo __("Following");?>

                    </button>
                <?php } else { ?>
                    <button type="button" title="Follow" class="btn btn-sm btn-info js_follow" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
">
                        <i class="fa fa-rss mr5"></i><?php echo __("Follow");?>

                    </button>
                <?php }?>
                <!-- follow -->
                <!-- message -->
                <button type="button" class="btn btn-sm btn-primary mlr5 js_chat_start" data-uid="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['profile']->value['user_lastname'];?>
" data-link="<?php echo $_smarty_tpl->tpl_vars['profile']->value['user_name'];?>
">
                    <i class="fa fa-comments mr5"></i><?php echo __("Message");?>

                </button>
                <!-- message -->
            <?php } else { ?>
                <!-- edit -->
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/profile/global" class="btn btn-sm btn-light">
                    <i class="fa fa-pencil-alt mr5"></i><?php echo __("Update Info");?>

                </a>
                <!-- edit -->
            <?php }?>
        </div>
    <!-- user popover -->
<?php } else { ?>
    <!-- page popover -->
        <div class="user-card">
            <div class="user-card-cover" ></div>
            <div class="user-card-avatar">
                <img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['profile']->value['page_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['profile']->value['page_title'];?>
">
            </div>
            <div class="user-card-info">
                <a class="name" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['profile']->value['page_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['profile']->value['page_title'];?>
</a>
                <?php if ($_smarty_tpl->tpl_vars['profile']->value['page_verified']) {?>
                    <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
' class="fa fa-check-circle fa-fw verified-badge"></i>
                <?php }?>
                <div class="info"><?php echo $_smarty_tpl->tpl_vars['profile']->value['page_likes'];?>
 <?php echo __("Likes");?>
</div>
            </div>
        </div>
        <div class="buttonWrapPopOver">
            <!-- like -->
            <?php if ($_smarty_tpl->tpl_vars['profile']->value['i_like']) {?>
                <button type="button" class="btn js_unlike-page unlike-button-stratus" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['page_id'];?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/local_hubN.svg"class="whiteicon">
                    <?php echo __("Unlike");?>

                </button>
            <?php } else { ?>
                <button type="button" class="btn js_like-page like-button-stratus" data-id="<?php echo $_smarty_tpl->tpl_vars['profile']->value['page_id'];?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/local_hubN.svg"class="whiteicon">
                    <?php echo __("Like");?>

                </button>
            <?php }?>
            <!-- like -->
        </div>
    </div>
    <!-- page popover -->
<?php }
}
}
