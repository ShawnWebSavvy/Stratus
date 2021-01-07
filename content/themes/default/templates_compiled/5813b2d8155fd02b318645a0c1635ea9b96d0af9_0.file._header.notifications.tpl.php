<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-30 11:45:24
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_header.notifications.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fec6854db7cd8_70346959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5813b2d8155fd02b318645a0c1635ea9b96d0af9' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_header.notifications.tpl',
      1 => 1609248087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_notification.tpl' => 1,
  ),
),false)) {
function content_5fec6854db7cd8_70346959 (Smarty_Internal_Template $_smarty_tpl) {
?><li class="dropdown js_live-notifications bell-icon-mobile mob_resposive_">
    <a href="#" data-toggle="dropdown" data-display="static">
        <div class="img-wrap-style">
            <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/notifications-icon.svg"
                class="blackicon">
            <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/notifications_icon_hover.svg"
                class="whiteicon">
        </div>
        <span
            class="counter counterlive shadow-sm <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_live_notifications_counter'] == 0) {?>x-hidden<?php }?>"
            style="color: rgba(255, 255, 255, 1);background-color: rgb(18, 105, 255);">
            <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_live_notifications_counter'];?>

        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-widget with-arrow js_dropdown-keepopen">
        <div class="dropdown-widget-header notifications_soundWrap">
            <span class="title"><?php echo __("Notifications");?>
</span>
            <label class="switch sm float-right" for="notifications_sound">
                <input type="checkbox" class="js_notifications-sound-toggle" name="notifications_sound"
                    id="notifications_sound" <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['notifications_sound']) {?>checked<?php }?>>
                <span class="slider round"></span>
            </label>
            <div class="float-right mr5">
                <?php echo __("Alert Sound");?>

            </div>
        </div>
        <div class="dropdown-widget-body notificationWrapSectionMain">
            <div class="js_scroller">
                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['notifications']) {?>
                <ul>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['notifications'], 'notification');
$_smarty_tpl->tpl_vars['notification']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['notification']->value) {
$_smarty_tpl->tpl_vars['notification']->do_else = false;
?>
                    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_notification.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
                <?php } else { ?>
                <p class="text-center text-muted mt10">
                    <?php echo __("No notifications");?>

                </p>
                <?php }?>
            </div>
        </div>
        <a class="dropdown-widget-footer" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/notifications"><?php echo __("See All");?>
</a>
    </div>
</li><?php }
}
