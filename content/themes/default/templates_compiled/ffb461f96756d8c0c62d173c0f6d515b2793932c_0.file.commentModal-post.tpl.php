<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 11:39:39
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/commentModal-post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff44ffb1ea331_56564793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffb461f96756d8c0c62d173c0f6d515b2793932c' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/commentModal-post.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:global-profile/commentModal-post__feeds_post.tpl' => 1,
    'file:_ads_campaigns.tpl' => 1,
    'file:_ads.tpl' => 1,
    'file:_widget.tpl' => 1,
  ),
),false)) {
function content_5ff44ffb1ea331_56564793 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- page content -->		
		<!-- content panel -->
        <div class="col-12 ">
        	<div class="row" style="justify-content: center;">
        		<!-- left panel -->
				<div class="col-lg-12 ">
				<?php $_smarty_tpl->_subTemplateRender('file:global-profile/commentModal-post__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('addCommentModalClass'=>1,'standalone'=>true), 0, false);
?>
				</div>
				<!-- left panel -->

				<!-- right panel -->
				<!--<div class="col-md-4 col-lg-3 empty-display-none"><?php $_smarty_tpl->_subTemplateRender('file:_ads_campaigns.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_widget.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>-->
				<!-- right panel -->
        	</div>
        </div>
        <!-- content panel -->


<!-- page content -->

<?php }
}
