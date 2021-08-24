<!-- page content -->


        <!-- side panel -->
        {* {if $user->_logged_in}
            <div class="col-12 d-block d-md-none offcanvas-sidebar mt20" id="sidebarHiddSwip">
                {include file='_sidebar.tpl'}
            </div>
        {/if} *}
        <!-- side panel -->
		
		<!-- content panel -->
        <div class="col-12 ">
        	<div class="row" style="justify-content: center;">
        		<!-- left panel -->
				<div class="col-lg-12 ">
				{include file='global-profile/commentModal-post__feeds_post-global.tpl' addCommentModalClass=1 standalone=true}
				</div>
				<!-- left panel -->
        	</div>
        </div>
        <!-- content panel -->
<!-- page content -->

