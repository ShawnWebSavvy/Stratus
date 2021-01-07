<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 05:16:03
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_message.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feabb936b0ee1_22404747',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31217aa17cdc3740420bc7882380808a3fa78208' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_message.tpl',
      1 => 1609217579,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5feabb936b0ee1_22404747 (Smarty_Internal_Template $_smarty_tpl) {
?><li class="feed-message">
  <div class="conversation clearfix <?php if ($_smarty_tpl->tpl_vars['message']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>right<?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['message']->value['message_id'];?>
">
    
    <div class="conversation-body">
      <!-- message text -->
      <div class="text <?php if ($_smarty_tpl->tpl_vars['message']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>js_chat-color-me<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['message']->value['user_id'] == $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
        <div class="chat-message-user-section">
          <img src="<?php echo $_smarty_tpl->tpl_vars['message']->value['user_picture'];?>
" />
          <p><?php echo $_smarty_tpl->tpl_vars['message']->value['user_firstname'];?>
</p>
          <!-- message time -->
          <div class="time js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['message']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['message']->value['time'];?>
</div>
          <!-- message time -->
        </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['message']->value['user_id'] != $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
    <div class="conversation-user feed-message-userName line-4">
    
    <?php if (($_smarty_tpl->tpl_vars['page']->value == 'messages_global')) {?>
      <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['message']->value['user_name'];?>
">
    <?php } else { ?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['message']->value['user_name'];?>
">
    <?php }?>
        <span class="chat-message-user-section">
          <img src="<?php echo $_smarty_tpl->tpl_vars['message']->value['user_picture'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['message']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['message']->value['user_lastname'];?>
"
          alt="<?php echo $_smarty_tpl->tpl_vars['message']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['message']->value['user_lastname'];?>
" />
          <p><?php echo $_smarty_tpl->tpl_vars['message']->value['user_firstname'];?>
</p>
          <!-- message time -->
          <div class="time js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['message']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['message']->value['time'];?>
</div>
          <!-- message time -->
        </span>
      </a>
    </div>
    <?php }?>
        <div class="chat-message-section">
          <?php echo $_smarty_tpl->tpl_vars['message']->value['message'];?>
 <?php if ($_smarty_tpl->tpl_vars['message']->value['image']) {?>
          <span class="text-link js_lightbox-nodata <?php if ($_smarty_tpl->tpl_vars['message']->value['message'] != '') {?>mt5<?php }?>" data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['message']->value['image'];?>
">
            <img alt="" class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['message']->value['image'];?>
" />
          </span>
          <?php }?> <?php if ($_smarty_tpl->tpl_vars['message']->value['voice_note']) {?>
          <audio class="js_audio" id="audio-<?php echo $_smarty_tpl->tpl_vars['message']->value['message_id'];?>
" controls preload="auto" style="width: 100%; min-width: 120px;">
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['message']->value['voice_note'];?>
" type="audio/mpeg"/>
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['message']->value['voice_note'];?>
" type="audio/mp3"/>
            <?php echo __("Your browser does not support HTML5 audio");?>

          </audio>
          <?php }?>
        </div>
      </div>
      <!-- message text -->
      <!-- seen status -->
      <?php if ($_smarty_tpl->tpl_vars['last_seen_message_id']->value == $_smarty_tpl->tpl_vars['message']->value['message_id']) {?>
      <div class="seen"><?php echo __("Seen by");?>
 <?php echo $_smarty_tpl->tpl_vars['conversation']->value['seen_name_list'];?>
</div>
      <?php }?>
      <!-- seen status -->
    </div>
  </div>
</li>
<?php }
}
