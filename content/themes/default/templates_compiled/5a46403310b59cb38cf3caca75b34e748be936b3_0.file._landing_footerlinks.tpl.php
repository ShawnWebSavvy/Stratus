<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:09:57
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_landing_footerlinks.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf265bb01b7_62689937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a46403310b59cb38cf3caca75b34e748be936b3' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_landing_footerlinks.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_ads.tpl' => 1,
    'file:_footer.links.tpl' => 1,
    'file:_js_files_aws.tpl' => 1,
    'file:_js_files.tpl' => 1,
    'file:_js_templates.tpl' => 1,
  ),
),false)) {
function content_5feaf265bb01b7_62689937 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- ads -->
<?php $_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_ads'=>$_smarty_tpl->tpl_vars['ads_master']->value['footer'],'_master'=>true), 0, false);
?>
<!-- ads -->

<?php if ($_smarty_tpl->tpl_vars['page']->value == "static") {
$_smarty_tpl->_subTemplateRender('file:_footer.links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>

</div>
<!-- main wrapper -->
<?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {
echo '<script'; ?>
 src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/macy@2"><?php echo '</script'; ?>
>

<!-- Dependencies CSS [Twemoji-Awesome] -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/css/twemoji-awesome/twemoji-awesome.min.css">
<!-- Dependencies CSS [Twemoji-Awesome] -->
<?php }?>
<!-- JS Files -->
<?php if ($_smarty_tpl->tpl_vars['system']->value['s3_enabled']) {
$_smarty_tpl->_subTemplateRender('file:_js_files_aws.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else {
$_smarty_tpl->_subTemplateRender('file:_js_files.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>
<!-- JS Files -->

<!-- JS Templates -->
<?php $_smarty_tpl->_subTemplateRender('file:_js_templates.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- JS Templates -->

<!-- Footer Custom JavaScript -->
<?php if ($_smarty_tpl->tpl_vars['system']->value['custome_js_footer']) {
echo '<script'; ?>
>
	{ html_entity_decode($system['custome_js_footer'], ENT_QUOTES) }
<?php echo '</script'; ?>
>
<?php }?>
<!-- Footer Custom JavaScript -->

<!-- Analytics Code -->
<?php if ($_smarty_tpl->tpl_vars['system']->value['analytics_code']) {
echo html_entity_decode($_smarty_tpl->tpl_vars['system']->value['analytics_code'],ENT_QUOTES);
}?>
<!-- Analytics Code -->


</body>

</html><?php }
}
