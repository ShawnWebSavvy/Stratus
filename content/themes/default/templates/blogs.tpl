{include file='_head.tpl'}
{include file='_header.tpl'}
{if $user->_logged_in}
    <div class="container mt20 offcanvas">
        <div class="row">
            <!-- side panel -->
            <div class="col-md-4 col-lg-3 offcanvas-sidebar js_sticky-sidebar"  id="sidebarHiddSwip">
                {include file='_sidebar.tpl'}
            </div>
            <!-- side panel -->
           
             {include file='blog-after-login.tpl'}
        </div>
    </div>
    <!-- right panel -->
        <div class="right-sidebar js_sticky-sidebar open-side-bar">
          {include file='right-sidebar.tpl'}
        </div>
    <!-- right panel -->
{else}
   {include file='blog-before-login.tpl'}

 {/if}
{include file='_footer.tpl'}