<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 12:38:53
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__global_feeds_post.text.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff45dddc0baa0_89065801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19c13324cdf5e1276282b8f94204554b61d736aa' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__global_feeds_post.text.tpl',
      1 => 1609850324,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff45dddc0baa0_89065801 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="post-replace">
	<?php if ($_smarty_tpl->tpl_vars['post']->value['colored_pattern']) {?>
	<div class="post-colored" <?php if ($_smarty_tpl->tpl_vars['post']->value['colored_pattern']['type'] == "color") {?>
		style="background-image: linear-gradient(45deg, <?php echo $_smarty_tpl->tpl_vars['post']->value['colored_pattern']['background_color_1'];?>
, <?php echo $_smarty_tpl->tpl_vars['post']->value['colored_pattern']['background_color_2'];?>
);"
		<?php } else { ?> style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['post']->value['colored_pattern']['background_image'];?>
)"
		<?php }?>>
		<div class="post-colored-text-wrapper js_scroller" data-slimScroll-height="240">
			<div class="post-text" dir="auto" style="color: <?php echo $_smarty_tpl->tpl_vars['post']->value['colored_pattern']['text_color'];?>
;">
				<?php echo $_smarty_tpl->tpl_vars['post']->value['text'];?>

			</div>
		</div>
	</div>
	<?php } else { ?>
	<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile-posts/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" title="Show this thread">
		<div class="post-text js_readmore sss" dir="auto"><?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['post']->value['text'], ENT_QUOTES);?>
</div>
	</a>
	<?php }?>
	<div class="post-text-translation x-hidden" dir="auto"></div>
	<div class="post-text-plain x-hidden"><?php echo $_smarty_tpl->tpl_vars['post']->value['text_plain'];?>
</div>
</div><?php }
}
