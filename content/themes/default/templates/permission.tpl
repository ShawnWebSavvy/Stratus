{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="container mt20 {if $user->_logged_in}offcanvas{/if}">
	<div class="row">

		<!-- side panel -->
        {if $user->_logged_in}
            <div class="col-12  offcanvas-sidebar" id="sidebarHiddSwip">
                {include file='_sidebar.tpl'}
            </div>
        {/if}
        <!-- side panel -->

        <!-- content panel -->
	    <div class="col-12 {if $user->_logged_in}offcanvas-mainbar{/if}">
    		<div class="notfound-wrapper">
				<div class="notfound">
					<div class="notfound-circle">
						<i class="far fa-frown"></i>
					</div>
					<h1>{__("Oops!")}</h1>
					<h2>{__("Permission Needed")}</h2>
					<p class="mt10">{$message}</p>
					<a class="btn btn-primary rounded-pill" href="{$system['system_url']}">{__("Back to homepage")}</a>
				</div>
			</div>
	    </div>
	    <!-- content panel -->
		
	</div>
</div>
<!-- page content -->

{include file='_footer.tpl'}