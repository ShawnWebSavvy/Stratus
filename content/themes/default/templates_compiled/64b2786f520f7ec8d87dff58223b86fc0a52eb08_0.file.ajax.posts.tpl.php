<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-31 06:05:43
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.posts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fed6a37552953_90935282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64b2786f520f7ec8d87dff58223b86fc0a52eb08' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.posts.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_post.tpl' => 2,
  ),
),false)) {
function content_5fed6a37552953_90935282 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_get']->value) {?>
	<?php if ($_smarty_tpl->tpl_vars['posts']->value) {?>
		<ul class="feeds_post_ul" id="feeds_post_ul">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
			<?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>

		<!-- see-more -->
		<div class="alert alert-post see-more mb20 js_see-more <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>js_see-more-infinite<?php }?>" data-get="<?php echo $_smarty_tpl->tpl_vars['_get']->value;?>
" data-filter="<?php echo $_smarty_tpl->tpl_vars['_filter']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['_id']->value) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_id']->value;?>
"<?php }?>>
			<span><?php echo __("More Stories");?>
</span>
			<div class="loader loader_small x-hidden"></div>
		</div>
		<!-- see-more -->
	<?php } else { ?>
		<div class="text-center text-muted">
			<div class="text-center text-muted no_data_img_ __no_data_contet__">
					<img width="50%"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results5.png">
					<p class="mb10"><strong><?php echo __("No posts to show");?>
</strong></p>
				</div>
		</div>
	<?php }
} else { ?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
	<?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
