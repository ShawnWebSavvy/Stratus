<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-06 10:18:45
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/market.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff58e85c7f168_96905081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a85cf41cc49de3997c20faa7363355b36b1761a4' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/market.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:global-profile/_publisher_market.tpl' => 1,
    'file:_ads.tpl' => 1,
    'file:market-right-sibebar.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_5ff58e85c7f168_96905081 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div class="container mt20  <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>offcanvas<?php }?>">
	<div class="row">
		<!-- side panel -->
		<?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
		<div class="col-md-4 col-lg-3 offcanvas-sidebar js_sticky-sidebar">
			<?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>
		<?php }?>
		<!-- side panel -->
		<!-- page content -->
		<div class="col-md-8 col-lg-9 offcanvas-mainbar">
			<div class="row">
				<div class="home-page-middel-block">
					<!--<div class="container">
					<h2><?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
 <?php echo __("Marketplace");?>
</h2>
					<div class="row mt20">
						<div class="col-sm-9 col-lg-6 mx-sm-auto">
							<form class="js_search-form" data-handle="market">
								<div class="input-group">
									<input type="text" class="form-control" name="query" placeholder='<?php echo __("Search for products");?>
'>
									<div class="input-group-append">
									    <button type="submit" class="btn btn-danger"><?php echo __("Search");?>
</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>-->
					<div class="add-new-product-section">
						<!-- add new product -->
						<!-- <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_sell_products']) {?>
						<div class="mb10">
							<button type="button" class="btn btn-sm btn-primary btn-block "
								data-toggle="modal" data-url="posts/product.php?do=create">
								<i class="fa fa-cart-plus mr10"></i><?php echo __("Add New Product");?>

							</button>
						</div> -->
						<!-- publisher -->
						<?php $_smarty_tpl->_subTemplateRender('file:global-profile/_publisher_market.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"me",'_privacy'=>true), 0, false);
?>
						<!-- publisher -->
						<!-- <?php }?> -->

						<!-- <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/products" class="btn btn-sm btn-primary btn-block ">
							<?php echo __("My Product");?>

						</a> -->

						<!-- add new product -->
					</div>
					<?php $_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

					<?php if ($_smarty_tpl->tpl_vars['view']->value == "search") {?>
					<div class="bs-callout bs-callout-info mt0">
						<!-- results counter -->
						<span class="badge badge-pill badge-lg badge-light"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span> <?php echo __("results were found for
						the search for");?>
 "<strong class="text-primary"><?php echo htmlentities($_smarty_tpl->tpl_vars['query']->value,ENT_QUOTES,'utf-8');?>
</strong>"
						<!-- results counter -->
					</div>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['view']->value == '' && $_smarty_tpl->tpl_vars['promoted_products']->value) {?>
					<div class="articles-widget-header">
						<div class="articles-widget-title"><?php echo __("Promoted Products");?>
</div>
					</div>
					<div class="row mb20">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['promoted_products']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
						<div class="desk_chg col-md-4 col-sm-6">
							<div class="card product boosted">
								<div class="boosted-icon" data-toggle="tooltip" title="<?php echo __(" Promoted");?>
">
									<img width="30px" height="30px" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/Featured.svg">
								</div>
								<div class="product-image">
									<?php if ($_smarty_tpl->tpl_vars['post']->value['photos_num'] > 0) {?>
									<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['post']->value['photos'][0]['source'];?>
">
									<?php } else { ?>
									<img
										src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/blank_product.jpg">
									<?php }?>
									<div class="product-overlay">
									 <div>
										<a class="btn btn-sm btn-outline-secondary "
											href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
											<?php echo __("More");?>

										</a>
										</div>
										<?php if ($_smarty_tpl->tpl_vars['post']->value['author_id'] != $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
										<button type="button" class="saller_btn btn btn-sm btn-info  js_chat_start"
											data-uid="<?php echo $_smarty_tpl->tpl_vars['post']->value['author_id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_author_name'];?>
"><i
												class="fa fa-comments mr5"></i><?php echo __("Contact Seller");?>
</button>
										<?php }?>
									</div>
								</div>
								<div class="product-info">

									<div class="product-meta title">
										<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
"
											class="title"><?php echo $_smarty_tpl->tpl_vars['post']->value['product']['name'];?>
</a>
									</div>
									<div class="product-meta">
										<i class="fa fa-tag fa-fw mr5" style="color: #1f9cff;"></i><?php echo __("Type");?>
:
										<?php if ($_smarty_tpl->tpl_vars['post']->value['product']['status'] == "new") {
echo __("New");
} else {
echo __("Used");
}?>
									</div>
									<div class="product-meta">
										<i class="fa fa-map-marker fa-fw"></i> <?php if ($_smarty_tpl->tpl_vars['post']->value['product']['location']) {
echo $_smarty_tpl->tpl_vars['post']->value['product']['location'];
} else {
echo __("N/A");
}?>
									</div>
									<div class="product-price">
										<?php if ($_smarty_tpl->tpl_vars['post']->value['product']['price'] > 0) {?>
										<?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];
echo $_smarty_tpl->tpl_vars['post']->value['product']['price'];?>

										<?php } else { ?>
										<?php echo __("Free");?>

										<?php }?>
									</div>
								</div>
							</div>
						</div>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</div>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
					<div class="row">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
						<div class="desk_chg  col-md-4 col-sm-6">
							<div class="card product marketBlk">
								<div class="product-image">

									<?php if ($_smarty_tpl->tpl_vars['post']->value['photos_num'] > 0) {?>
									<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['post']->value['photos'][0]['source'];?>
">
									<?php } else { ?>
									<img
										src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/blank_product.jpg">
									<?php }?>
									<div class="product-overlay">
									<div>
										<a class="btn btn-sm btn-outline-secondary "
											href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
											<?php echo __("More");?>

										</a>
										</div>
										<?php if ($_smarty_tpl->tpl_vars['post']->value['author_id'] != $_smarty_tpl->tpl_vars['user']->value->_data['user_id']) {?>
										<button type="button" class="saller_btn btn btn-sm btn-info  js_chat_start"
											data-uid="<?php echo $_smarty_tpl->tpl_vars['post']->value['author_id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_author_name'];?>
"><i
												class="fa fa-comments mr5"></i><?php echo __("Contact Seller");?>
</button>
										<?php }?>
									</div>
								</div>
								<div class="product-info">
									<div class="product-meta  product_name_section">
										<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
"
											class="title"><?php echo $_smarty_tpl->tpl_vars['post']->value['product']['name'];?>
</a>
									</div>

									<div class="product-meta product_type_section">
										<i class="fa fa-tag fa-fw mr5" style="color: #1f9cff;"></i><?php echo __("Type");?>
:
										<?php if ($_smarty_tpl->tpl_vars['post']->value['product']['status'] == "new") {
echo __("New");
} else {
echo __("Used");
}?>
									</div>
									<div class="product-meta title">
										<i class="fa fa-map-marker fa-fw"></i> <?php if ($_smarty_tpl->tpl_vars['post']->value['product']['location']) {
echo $_smarty_tpl->tpl_vars['post']->value['product']['location'];
} else {
echo __("N/A");
}?>
									</div>
									<div class="product-price">
										<?php if ($_smarty_tpl->tpl_vars['post']->value['product']['price'] > 0) {?>
										<?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];
echo $_smarty_tpl->tpl_vars['post']->value['product']['price'];?>

										<?php } else { ?>
										<?php echo __("Free");?>

										<?php }?>
									</div>
								</div>
							</div>
						</div>
						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</div>
					<?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

					<?php } else { ?>
					<div class="text-center text-muted no_dataimg_ __no_data_contet__ ">
						 <img width="100%"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results3.png">
						<p class="mt10"><strong><?php echo __("No products to show");?>
</strong></p>
					</div>
					<?php }?>
				</div>
				<!-- right panel -->
				<div class="right-sidebar js_sticky-sidebar ">
					<?php $_smarty_tpl->_subTemplateRender('file:market-right-sibebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
				</div>
				<!-- right panel -->
			</div>
		</div>
	</div>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
