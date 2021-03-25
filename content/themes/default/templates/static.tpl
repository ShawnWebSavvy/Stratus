{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="container staticPageBg {if $user->_logged_in}offcanvas{/if}">
	<div class="staticPageTitle">{$static['page_title']}</div>
    <div class="row">
	    <!-- content panel -->
	    <div class="col-12 {if $user->_logged_in}offcanvas-mainbar{/if}" style="padding: 0 7%;padding-bottom: 27px;">
    		<div class="card staticPageWrap">
    			<div class="card-body page-content text-readable text-with-list">
			        {$static['page_text']}
    			</div>
    		</div>
	    </div>
	    <!-- content panel -->
	</div>
</div>
<!-- page content -->
<div class="staticPageFooter">
	{include file='_footer.tpl'}
</div>