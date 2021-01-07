<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-30 11:45:33
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_conversation_group.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fec685de40e21_63376124',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5668c3d3586f9fa22ab1e7870ad5a617a44e29c0' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_conversation_group.tpl',
      1 => 1609248087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fec685de40e21_63376124 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['conversation']->value['group_recipients'] === 'show') {?>
<li class="feeds-item <?php if (!$_smarty_tpl->tpl_vars['conversation']->value['seen']) {?>unread<?php }?>" data-last-message="<?php echo $_smarty_tpl->tpl_vars['conversation']->value['last_message_id'];?>
">

    <a class="data-container js_chat_start" data-cid="<?php echo $_smarty_tpl->tpl_vars['conversation']->value['conversation_id'];?>
"
        data-name="<?php echo $_smarty_tpl->tpl_vars['conversation']->value['name'];?>
" data-name-list="<?php echo $_smarty_tpl->tpl_vars['conversation']->value['name_list'];?>
"
        data-link="<?php echo $_smarty_tpl->tpl_vars['conversation']->value['link'];?>
" data-multiple="true"
        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/messages/<?php echo $_smarty_tpl->tpl_vars['conversation']->value['conversation_id'];?>
">
        <div class="data-avatar">
            <div class="left-avatar" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['conversation']->value['picture_left'];?>
')"></div>
            <div class="right-avatar" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['conversation']->value['picture_right'];?>
')"></div>
        </div>
        <div class="data-content">
            <!-- <?php if ($_smarty_tpl->tpl_vars['conversation']->value['image'] != '') {?>
            <div class="float-right">
                <img class="data-img lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['conversation']->value['image'];?>
" alt="">
            </div>
            <?php }?> -->
            <div class="nameTimeWrap">
                <span class="name"><?php echo $_smarty_tpl->tpl_vars['conversation']->value['name'];?>
</span>
                <div class="time js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['conversation']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['conversation']->value['time'];?>
</div>
            </div>
            <div class="text">
                <?php if ($_smarty_tpl->tpl_vars['conversation']->value['message'] != '') {?>
                <?php echo $_smarty_tpl->tpl_vars['conversation']->value['message_orginal'];?>

                <?php } elseif ($_smarty_tpl->tpl_vars['conversation']->value['photo'] != '') {?>
                <i class="fa fa-file-image"></i> <?php echo __("Photo");?>

                <?php } elseif ($_smarty_tpl->tpl_vars['conversation']->value['voice_note'] != '') {?>
                <i class="fas fa-microphone"></i> <?php echo __("Voice Message");?>

                <?php }?>
            </div>
        </div>
    </a>
</li>
            <?php }
}
}
