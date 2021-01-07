<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 06:59:50
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global_ajax.search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff40e66d76eb3_06724725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '767a2bff94116f59e518b524dbfb3f9496cae55a' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global_ajax.search.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:global-profile/global-profile__feeds_user.tpl' => 1,
  ),
),false)) {
function content_5ff40e66d76eb3_06724725 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="js_scroller">
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['results']->value, 'result');
$_smarty_tpl->tpl_vars['result']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
$_smarty_tpl->tpl_vars['result']->do_else = false;
?>

        
            <?php if ($_smarty_tpl->tpl_vars['result']->value['type'] == "user") {?>
                <?php $_smarty_tpl->_subTemplateRender('file:global-profile/global-profile__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_user'=>$_smarty_tpl->tpl_vars['result']->value,'_tpl'=>"list",'_connection'=>$_smarty_tpl->tpl_vars['result']->value['connection'],'_search'=>true), 0, true);
?>
            <?php }?>

            
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
</div><?php }
}
