{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="container mt20 {if $user->_logged_in}offcanvas{/if}">
	<div class="row">

		<!-- side panel -->
		{if $user->_logged_in}
		<div class="col-md-4 col-lg-3 offcanvas-sidebar js_sticky-sidebar" id="sidebarHiddSwip">
			{include file='_sidebar.tpl'}
		</div>
		{/if}
		<!-- side panel -->
		<!-- content panel -->
		<div class="col-12 {if $user->_logged_in}offcanvas-mainbar{/if}">
			<div class="row">
				<div class="home-page-middel-block">
					<!-- left panel -->
					<div class="col-md-12">
						{include file='__feeds_post.tpl' standalone=true}
					</div>
					<!-- left panel -->
				</div>
				<!-- right panel -->
				<div class="right-sidebar js_sticky-sidebar">
				{if ($actPage == "product") }
					{include file='market-right-sibebar.tpl'}
				{else}
					{include file='right-sidebar.tpl'}
				{/if}
				</div>
				<!-- right panel -->
			</div>
		</div>
		<!-- content panel -->
	</div>
</div>
<!-- page content -->
{include file='_footer.tpl'}