<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 09:29:35
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff4317f30d536_81603119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0cdb130d8a901858ead37fffc97a7224a677f47' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/post.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:__feeds_post.tpl' => 1,
    'file:market-right-sibebar.tpl' => 1,
    'file:right-sidebar.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_5ff4317f30d536_81603119 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="container mt20 <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>offcanvas<?php }?>">
	<div class="row">

		<!-- side panel -->
		<?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
		<div class="col-md-4 col-lg-3 offcanvas-sidebar js_sticky-sidebar">
			<?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>
		<?php }?>
		<!-- side panel -->
		<!-- content panel -->
		<div class="col-12 <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>offcanvas-mainbar<?php }?>">
			<div class="row">
				<div class="home-page-middel-block">
					<!-- left panel -->
					<div class="col-md-12">
						<?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('standalone'=>true), 0, false);
?>
					</div>
					<!-- left panel -->
				</div>
				<!-- right panel -->
				<div class="right-sidebar js_sticky-sidebar">
				<?php if (($_smarty_tpl->tpl_vars['actPage']->value == "product")) {?>
					<?php $_smarty_tpl->_subTemplateRender('file:market-right-sibebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
				<?php } else { ?>
					<?php $_smarty_tpl->_subTemplateRender('file:right-sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
				<?php }?>
				</div>
				<!-- right panel -->
			</div>
		</div>
		<!-- content panel -->
	</div>
</div>
<!-- page content -->
<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
