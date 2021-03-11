{include file='_head.tpl'} {include file='_header.tpl'}

<!-- page content -->
<div class="container mt20 offcanvas">
    <div class="row">
        <div class="offcanvas-sidebar sidebar-left-ant" id="sidebarHiddSwip">
            {include file='_sidebar.tpl'}
        </div>
    </div>
    <div class="row right-side-content-ant ">
        <!-- content panel -->
        <div class="col-lg-12 offcanvas-mainbar">
            <div class="home-page-middel-block explore_cmn_style">
                <!-- tabs -->
                <div class="content-tabs custom-tabs  clearfix">
                    <ul>
                        <li {if $view=="" }class="active" {/if}>
                            <a href="{$system['system_url']}/events">{__("Discover")}</a>
                        </li>
                        <li {if $view=="going" }class="active" {/if}>
                            <a href="{$system['system_url']}/events/going">{__("Going")}</a>
                        </li>
                        <li {if $view=="interested" }class="active" {/if}>
                            <a href="{$system['system_url']}/events/interested">{__("Interested")}</a>
                        </li>
                        <li {if $view=="invited" }class="active" {/if}>
                            <a href="{$system['system_url']}/events/invited">{__("Invited")}</a>
                        </li>
                        <li {if $view=="manage" }class="active" {/if}>
                            <a href="{$system['system_url']}/events/manage">{__("My Events")}</a>
                        </li>
                    </ul>
                    {if $user->_data['can_create_events']}
                    <div class="mt10 float-right">
                        <button class="btn btn-sm btn-success d-none d-lg-block" data-toggle="modal" data-url="#create-event">
                            <i class="fa fa-plus-circle mr5"></i>{__("Create Event")}
                        </button>
                        <button class="btn btn-sm btn-icon btn-success d-block d-lg-none" data-toggle="modal" data-url="#create-event">
                            <i class="fa fa-plus-circle"></i>
                        </button>
                    </div>
                    {/if}
                    <button class="_toggle_btn" type="button"><i class="fas fa-ellipsis-v"></i> <i class="fas fa-times"></i></button>
                </div>
                <!-- tabs -->

                <!-- content -->
                <div>
                    {if $events}
                    <ul class="row">
                        {foreach $events as $_event} {include file='__feeds_event.tpl' _tpl='box'} {/foreach}
                    </ul>

                    <!-- see-more -->
                    {if count($events) >= $system['max_results_even']}
                    <div class="alert alert-post see-more js_see-more" data-get="{$get}">
                        <span>{__("Load More")}</span>
                        <div class="loader loader_small x-hidden"></div>
                    </div>
                    {/if}
                    <!-- see-more -->
                    {else}
                     <div class="__no_data_contet__ no_data_img_ text-center">
                    <p class="text-center text-muted __nodata-img___">
                    <img width="100%"
                                src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results11.png">
                      <p>  {__("You don't have Events yet")}</p>
                    </p>
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-url="#create-event"> Create Event
                        </button>
                    </div>
                    {/if}
                </div>
            </div>
            <!-- right panel -->
            <div class="right-sidebar js_sticky-sidebar ">
                {include file='right-sidebar.tpl'}
            </div>
            <!-- right panel -->
        </div>
    </div>
</div>
{include file='_footer.tpl'}