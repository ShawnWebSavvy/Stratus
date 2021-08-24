{include file='_head.tpl'}
{include file='_header.tpl'}



<div class="container mt20  {if $user->_logged_in}offcanvas{/if}">
	<div class="row">
		<!-- side panel -->
		{if $user->_logged_in}
		<div class="col-md-4 col-lg-3 offcanvas-sidebar js_sticky-sidebar" id="sidebarHiddSwip">
			{include file='_sidebar.tpl'}
		</div>
		{/if}
		<!-- side panel -->
		<!-- page content -->
		<div class="col-md-8 col-lg-9 offcanvas-mainbar">
			<div class="row">
				<div class="home-page-middel-block">
					<!--<div class="container">
					<h2>{$system['system_title']} {__("Marketplace")}</h2>
					<div class="row mt20">
						<div class="col-sm-9 col-lg-6 mx-sm-auto">
							<form class="js_search-form" data-handle="market">
								<div class="input-group">
									<input type="text" class="form-control" name="query" placeholder='{__("Search for products")}'>
									<div class="input-group-append">
									    <button type="submit" class="btn btn-danger">{__("Search")}</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>-->
					<div class="add-new-product-section">
						<!-- add new product -->
						<!-- {if $user->_data['can_sell_products']}
						<div class="mb10">
							<button type="button" class="btn btn-sm btn-primary btn-block "
								data-toggle="modal" data-url="posts/product.php?do=create">
								<i class="fa fa-cart-plus mr10"></i>{__("Add New Product")}
							</button>
						</div> -->
						<!-- publisher -->
						{include file='global-profile/_publisher_market.tpl' _handle="me" _privacy=true}
						<!-- publisher -->
						<!-- {/if} -->

						<!-- <a href="{$system['system_url']}/products" class="btn btn-sm btn-primary btn-block ">
							{__("My Product")}
						</a> -->

						<!-- add new product -->
					</div>
					{include file='_ads.tpl'}

					{if $view == "search"}
					<div class="bs-callout bs-callout-info mt0">
						<!-- results counter -->
						<span class="badge badge-pill badge-lg badge-light">{$total}</span> {__("results were found for
						the search for")} "<strong class="text-primary">{htmlentities($query, ENT_QUOTES,
							'utf-8')}</strong>"
						<!-- results counter -->
					</div>
					{/if}
					{if $view == "" && $promoted_products}
					<div class="articles-widget-header">
						<div class="articles-widget-title">{__("Promoted Products")}</div>
					</div>
					<div class="row mb20">
						{foreach $promoted_products as $post}
						<div class="desk_chg col-md-4 col-sm-6">
							<div class="card product boosted">
								<div class="boosted-icon" data-toggle="tooltip" title="{__(" Promoted")}">
									<img width="30px" height="30px" src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/Featured.svg">
								</div>
								<div class="product-image">
									{if $post['photos_num'] > 0}
									<img src="{$system['system_uploads']}/{$post['photos'][0]['source']}">
									{else}
									<img
										src="{$system['system_url']}/content/themes/{$system['theme']}/images/blank_product.jpg">
									{/if}
									<div class="product-overlay">
									 <div>
										<a class="btn btn-sm btn-outline-secondary "
											href="{$system['system_url']}/posts/{$post['post_id']}">
											{__("More")}
										</a>
										</div>
										{if $post['author_id'] != $user->_data['user_id'] }
										<button type="button" class="saller_btn btn btn-sm btn-info  js_chat_start"
											data-uid="{$post['author_id']}" data-name="{$post['post_author_name']}"><i
												class="fa fa-comments mr5"></i>{__("Contact Seller")}</button>
										{/if}
									</div>
								</div>
								<div class="product-info">

									<div class="product-meta title">
										<a href="{$system['system_url']}/posts/{$post['post_id']}"
											class="title">{$post['product']['name']}</a>
									</div>
									<div class="product-meta">
										<i class="fa fa-tag fa-fw mr5" style="color: #1f9cff;"></i>{__("Type")}:
										{if $post['product']['status'] == "new"}{__("New")}{else}{__("Used")}{/if}
									</div>
									<div class="product-meta">
										<i class="fa fa-map-marker fa-fw"></i> {if
										$post['product']['location']}{$post['product']['location']}{else}{__("N/A")}{/if}
									</div>
									<div class="product-price">
										{if $post['product']['price'] > 0}
										{$system['system_currency_symbol']}{$post['product']['price']}
										{else}
										{__("Free")}
										{/if}
									</div>
								</div>
							</div>
						</div>
						{/foreach}
					</div>
					{/if}
					{if $rows}
					<div class="row">
						{foreach $rows as $post}
						<div class="desk_chg  col-md-4 col-sm-6">
							<div class="card product marketBlk">
								<div class="product-image">

									{if $post['photos_num'] > 0}
									<img src="{$system['system_uploads']}/{$post['photos'][0]['source']}">
									{else}
									<img
										src="{$system['system_url']}/content/themes/{$system['theme']}/images/blank_product.jpg">
									{/if}
									<div class="product-overlay">
									<div>
										<a class="btn btn-sm btn-outline-secondary "
											href="{$system['system_url']}/posts/{$post['post_id']}">
											{__("More")}
										</a>
										</div>
										{if $post['author_id'] != $user->_data['user_id'] }
										<button type="button" class="saller_btn btn btn-sm btn-info  js_chat_start"
											data-uid="{$post['author_id']}" data-name="{$post['post_author_name']}"><i
												class="fa fa-comments mr5"></i>{__("Contact Seller")}</button>
										{/if}
									</div>
								</div>
								<div class="product-info">
									<div class="product-meta  product_name_section">
										<a href="{$system['system_url']}/posts/{$post['post_id']}"
											class="title">{$post['product']['name']}</a>
									</div>

									<div class="product-meta product_type_section">
										<i class="fa fa-tag fa-fw mr5" style="color: #1f9cff;"></i>{__("Type")}:
										{if $post['product']['status'] == "new"}{__("New")}{else}{__("Used")}{/if}
									</div>
									<div class="product-meta title">
										<i class="fa fa-map-marker fa-fw"></i> {if
										$post['product']['location']}{$post['product']['location']}{else}{__("N/A")}{/if}
									</div>
									<div class="product-price">
										{if $post['product']['price'] > 0}
										{$system['system_currency_symbol']}{$post['product']['price']}
										{else}
										{__("Free")}
										{/if}
									</div>
								</div>
							</div>
						</div>
						{/foreach}
					</div>
					{$pager}
					{else}
					<div class="text-center text-muted no_dataimg_ __no_data_contet__ ">
						 <img width="100%"
                                src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results3.png">
						<p class="mt10"><strong>{__("No products to show")}</strong></p>
					</div>
					{/if}
				</div>
				<!-- right panel -->
				<div class="right-sidebar js_sticky-sidebar ">
					{include file='market-right-sibebar.tpl'}
				</div>
				<!-- right panel -->
			</div>
		</div>
	</div>
</div>
{include file='_footer.tpl'}