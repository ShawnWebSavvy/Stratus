{include file='_head.tpl'} {include file='_header.tpl'}

<!-- page content -->
<div class="container mt20 offcanvas">

    <div class="row">
        <div class="offcanvas-sidebar sidebar-left-ant" id="sidebarHiddSwip">
            {include file='_sidebar.tpl'}
        </div>
    </div>

    <div class="row right-side-content-ant">
        <!-- content panel -->
        <div class="col-lg-12 offcanvas-mainbar">
            <div class="home-page-middel-block explore_cmn_style">
                <!-- tabs -->
                <div class="content-tabs custom-tabs clearfix">
                    <ul>
                        <li {if $view=="" }class="active" {/if}>
                            <a href="{$system['system_url']}/pages">{__("Discover")}</a>
                        </li>
                        <li {if $view=="liked" }class="active" {/if}>
                            <a href="{$system['system_url']}/pages/liked">{__("Liked Pages")}</a>
                        </li>
                        <li {if $view=="manage" }class="active" {/if}>
                            <a href="{$system['system_url']}/pages/manage">{__("My Pages")}</a>
                        </li>
                    </ul>
                    {if $user->_data['can_create_pages']}
                    <div class="mt10 float-right">
                        <button class="btn btn-sm btn-success d-none d-lg-block" data-toggle="modal" data-url="#create-page">
                            <i class="fa fa-plus-circle mr5"></i>{__("Create Page")}
                        </button>
                        <button class="btn btn-sm btn-icon btn-success d-block d-lg-none" data-toggle="modal" data-url="#create-page">
                            <i class="fa fa-plus-circle"></i>
                        </button>
                    </div>
                    {/if}
                    <button class="_toggle_btn" type="button"><i class="fas fa-ellipsis-v"></i> <i class="fas fa-times"></i></button>
                </div>
                <!-- tabs -->
                <!-- content -->
                <div>
                    {if $pages}
                    <ul class="row">
                        {foreach $pages as $_page} {include file='__feeds_page.tpl' _tpl='box'} {/foreach}
                    </ul>

                    <!-- see-more -->
                    {if count($pages) >= $system['max_results_even']}
                    <div class="alert alert-post see-more js_see-more" data-get="{$get}" data-uid="{$user->_data['user_id']}">
                        <span>{__("Load More")}</span>
                        <div class="loader loader_small x-hidden"></div>
                    </div>
                    {/if}
                    <!-- see-more -->
                    {else}
                     <div class="__no_data_contet__ text-center">
                    <p class="text-center text-muted __nodata-img___">
                    <img width="100%"
                                src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results4.png">
                       <p> {__("You don't have Page yet")}</p>
                    </p>
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-url="#create-page">Create Page
                        </button>
                    </div>
                    {/if}
                </div>
                <!-- content -->
            </div>
            <!-- right panel -->
            <div class="right-sidebar js_sticky-sidebar ">
                {include file='right-sidebar.tpl'}
            </div>
            <!-- right panel -->
        </div>
        <!-- content panel -->
    </div>
</div>
{include file='_footer.tpl'}