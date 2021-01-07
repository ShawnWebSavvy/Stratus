<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 05:16:03
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.chat.conversation.messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feabb936784e9_06383684',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de8bc2bc16bf16a5d97b7133cc650e001b8546b8' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.chat.conversation.messages.tpl',
      1 => 1609217579,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:ajax.chat.messages.tpl' => 1,
  ),
),false)) {
function content_5feabb936784e9_06383684 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['conversation']->value['total_messages'] >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
	<!-- see-more -->
	<div class="alert alert-chat see-more small js_see-more" data-id=<?php echo $_smarty_tpl->tpl_vars['conversation']->value['conversation_id'];?>
  data-get="messages">
	    <span><?php echo __("Loading Older Messages");?>
</span>
	    <div class="loader loader_small x-hidden"></div>
	</div>
	<!-- see-more -->
<?php }?>

<ul id="global-js-hide">
    <?php $_smarty_tpl->_subTemplateRender('file:ajax.chat.messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('messages'=>$_smarty_tpl->tpl_vars['conversation']->value['messages']), 0, false);
?>
</ul><?php }
}
