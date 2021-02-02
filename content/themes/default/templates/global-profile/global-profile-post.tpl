{include file='_head.tpl'} {include file='_header.tpl'}

<!-- page content -->
<div class="container mt20 {if $user->_logged_in}offcanvas{/if}">
      <div class="row">
         {if $user->_logged_in}
        <div class="col-md-12 offcanvas-sidebar js_sticky-sidebar" id="sidebarHiddSwip">
          {include file='_sidebar.tpl'}
        </div>
        {/if}
      </div>
       
      <!-- content panel -->
      <div class="row right-side-content-ant">
        <div class="col-lg-12 offcanvas-mainbar">
          <div class="row">
            <div class="home-page-middel-block">
              {include file='global-profile/global-profile__feeds_post.tpl'
              standalone=true}
            </div>
            <!-- right panel -->
              <div class="right-sidebar js_sticky-sidebar ">
                {include file='right-sidebar.tpl'}
              </div>
            <!-- right panel -->
          </div>
        </div>
      </div>
      <!-- content panel -->
</div>
<!-- page content -->


{include file='global-profile/global-profile_footer.tpl'}
