<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:10:32
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.live.conversations_group.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf2888c4cf0_55728172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '906124b38efeb09b7c6b6bfd102c34da79ba2c4a' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.live.conversations_group.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_conversation_group.tpl' => 1,
  ),
),false)) {
function content_5feaf2888c4cf0_55728172 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['conversations']->value, 'conversation');
$_smarty_tpl->tpl_vars['conversation']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['conversation']->value) {
$_smarty_tpl->tpl_vars['conversation']->do_else = false;
$_smarty_tpl->_subTemplateRender('file:__feeds_conversation_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
