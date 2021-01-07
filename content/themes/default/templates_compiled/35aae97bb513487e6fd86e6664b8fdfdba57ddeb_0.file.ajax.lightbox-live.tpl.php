<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-04 07:52:44
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.lightbox-live.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff2c94c3ad706_85464598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35aae97bb513487e6fd86e6664b8fdfdba57ddeb' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.lightbox-live.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_post_live.tpl' => 1,
  ),
),false)) {
function content_5ff2c94c3ad706_85464598 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="lightbox-post" data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
	<div class="js_scroller" data-slimScroll-height="100%">
        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post_live.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	</div>
</div><?php }
}
