{include file='_head.tpl'}
{include file='_header.tpl'}


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
                            <a href="{$system['system_url']}/groups">{__("Discover")}</a>
                        </li>
                        <li {if $view=="joined" }class="active" {/if}>
                            <a href="{$system['system_url']}/groups/joined">{__("Joined Groups")}</a>
                        </li>
                        <li {if $view=="manage" }class="active" {/if}>
                            <a href="{$system['system_url']}/groups/manage">{__("My Groups")}</a>
                        </li>
                    </ul>
                    {if $user->_data['can_create_groups']}
                    <div class="mt10 float-right">
                        <button class="btn btn-sm btn-success d-none d-lg-block" data-toggle="modal"
                            data-url="#create-group">
                            <i class="fa fa-plus-circle mr5"></i>{__("Create Group")}
                        </button>
                        <button class="btn btn-sm btn-icon btn-success d-block d-lg-none" data-toggle="modal"
                            data-url="#create-group">
                            <i class="fa fa-plus-circle"></i>
                        </button>
                    </div>
                    {/if}
                    <button class="_toggle_btn" type="button"><i class="fas fa-ellipsis-v"></i> <i class="fas fa-times"></i></button>
                </div>
                <!-- tabs -->

                <!-- content -->
                <div>
                    {if $groups}
                    <ul class="row">
                        {foreach $groups as $_group}
                        {include file='__feeds_group.tpl' _tpl='box'}
                        {/foreach}
                    </ul>

                    <!-- see-more -->
                    {if count($groups) >= $system['max_results_even']}
                    <div class="alert alert-post see-more js_see-more" data-get="{$get}"
                        data-uid="{$user->_data['user_id']}">
                        <span>{__("Load More")}</span>
                        <div class="loader loader_small x-hidden"></div>
                    </div>
                    {/if}
                    <!-- see-more -->
                    {else}
                    <div class="__no_data_contet__ text-center">
                    <p class="text-center text-muted __nodata-img___">
                    <img width="100%"
                                src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results17.png">
                       <p class="noMsgHeading"> {__("You don't have Group yet")}</p>
                       
                    </p>
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-url="#create-group"> Create Group
                        </button>
                        </div>
                    {/if}
                </div>
                <!-- content -->

            </div>
            <!-- right panel -->
            <div class="right-sidebar js_sticky-sidebar groupsRightBar">
                {include file='right-sidebar.tpl'}
            </div>
            <!-- right panel -->
        </div>
    </div>
</div>
<!-- page content -->
{include file='_footer.tpl'}