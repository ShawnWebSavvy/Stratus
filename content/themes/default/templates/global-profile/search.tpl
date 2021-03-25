{include file='_head.tpl'}
{include file='_header.tpl'}


<div class="container mt20 offcanvas">
    <div class="row">
        <!-- side panel -->
        {if $user->_logged_in}
        <div class="offcanvas-sidebar sidebar-left-ant" id="sidebarHiddSwip">
            {include file='_sidebar.tpl'}
        </div>
        {/if}
        <!-- side panel -->
    </div>
    <div class="row right-side-content-ant">
        <!-- content panel -->
        <div class="col-md-12 {if $user->_logged_in}offcanvas-mainbar{/if}">
            <div class="row">
                <div class="home-page-middel-block">
                    <!-- search form -->
                    <form class="js_search-form">
                        <div class="form-group">
                            <div class="input-group searchPageBar">
                                <input type="text" class="form-control" name="query" placeholder='{__("Search")}'>
                                <div class="input-group-append">
                                    <button type="submit" name="submit" class="btn btn-success btn-antier-green"><i
                                            class="fas fa-search mr10"></i>{__("Search")}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- search form -->
                    <!-- left panel -->
                    <div class="col-lg-12">
                        <div class="row custom-tabs">
                            <!-- panel nav -->
                            <ul class="nav nav-tabs mb10">
                                <li class="nav-item">
                                    <a class="nav-link rounded-pill{if $results['users'] || count($results['users']) < 1} active{/if}"
                                        href="#posts" data-toggle="tab">{__("Posts")}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-pill{if $results['users'] && count($results['users']) > 0} active{/if}"
                                        href="#users" data-toggle="tab">{__("Users")}</a>
                                </li>
                                <!-- {if $system['blogs_enabled']}
                          
                                {/if} -->
                            </ul>
                            <!-- panel nav -->

                            <div class="tab-content" style="width: 100%">

                                <!-- posts -->
                                <div class="tab-pane{if $results['users'] || count($results['users']) < 1} active{/if}"
                                    id="posts">
                                    {if $results['posts'] && count($results['posts']) > 0}
                                    <ul>
                                        {foreach $results['posts'] as $post}
                                        {include file='global-profile/global-profile__feeds_post.tpl'}
                                        {/foreach}
                                    </ul>
                                    {else}
                                    <div class="text-center text-muted mtb10 no_results_Wrap">
                                        <img width="100%"
                                            src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results3.png">
                                        <!-- <p class="mt10 mb10"><strong>{__("No results to show")}</strong></p> -->
                                    </div>
                                    {/if}
                                </div>
                                <!-- posts -->

                                <!-- blogd -->
                                {if $system['blogs_enabled']}
                                <div class="tab-pane" id="articles">
                                    {if $results['articles'] && count($results['articles']) > 0}
                                    <ul>
                                        {foreach $results['articles'] as $post}
                                        {include file='global-profile/global-profile__feeds_post.tpl'}
                                        {/foreach}
                                    </ul>
                                    {else}
                                    <div class="text-center text-muted mtb10 no_results_Wrap">
                                        <img width="100%"
                                            src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results8.png">
                                        <!-- <p class="mt10 mb10"><strong>{__("No results to show")}</strong></p> -->
                                    </div>
                                    {/if}
                                </div>
                                {/if}
                                <!-- blogs -->

                                <!-- users -->
                                <div class="tab-pane {if $results['users'] && count($results['users']) > 0}active{/if}"
                                    id="users">
                                    {if $results['users'] && count($results['users']) > 0}
                                    <ul>
                                        {foreach $results['users'] as $_user}
                                        {include file='__feeds_user.tpl' _tpl="list" _connection=$_user['connection']}
                                        {/foreach}
                                    </ul>
                                    {else}
                                    <div class="text-center text-muted mtb10 no_results_Wrap">
                                        <img width="100%"
                                            src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results9.png">
                                        <!-- <p class="mt10 mb10"><strong>{__("No results to show")}</strong></p> -->
                                    </div>
                                    {/if}
                                </div>
                                <!-- users -->

                                <!-- pages -->
                                <div class="tab-pane" id="pages">
                                    {if $results['pages'] && count($results['pages']) > 0}
                                    <ul>
                                        {foreach $results['pages'] as $_page}
                                        {include file='__feeds_page.tpl' _tpl="list"}
                                        {/foreach}
                                    </ul>
                                    {else}
                                    <div class="text-center text-muted mtb10 no_results_Wrap">
                                        <img width="100%"
                                            src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results10.png">
                                        <!-- <p class="mt10 mb10"><strong>{__("No results to show")}</strong></p> -->
                                    </div>
                                    {/if}
                                </div>
                                <!-- pages -->

                                <!-- groups -->
                                <div class="tab-pane" id="groups">
                                    {if $results['groups'] && count($results['groups']) > 0}
                                    <ul>
                                        {foreach $results['groups'] as $_group}
                                        {include file='__feeds_group.tpl' _tpl="list"}
                                        {/foreach}
                                    </ul>
                                    {else}
                                    <div class="text-center text-muted mtb10 no_results_Wrap">
                                        <img width="100%"
                                            src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results11.png">
                                        <!-- <p class="mt10 mb10"><strong>{__("No results to show")}</strong></p> -->
                                    </div>
                                    {/if}
                                </div>
                                <!-- groups -->

                                <!-- events -->
                                <div class="tab-pane" id="events">
                                    {if $results['events'] && count($results['events']) > 0}
                                    <ul>
                                        {foreach $results['events'] as $_event}
                                        {include file='__feeds_event.tpl' _tpl="list"}
                                        {/foreach}
                                    </ul>
                                    {else}
                                    <div class="text-center text-muted mtb10 no_results_Wrap">
                                        <img width="100%"
                                            src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results12.png">
                                        <!-- <p class="mt10 mb10"><strong>{__("No results to show")}</strong></p> -->
                                    </div>
                                    {/if}
                                </div>
                                <!-- events -->

                            </div>
                        </div>
                    </div>
                    <!-- left panel -->

                    <!-- right panel -->
                    <!-- <div class="col-lg-4">
                        {include file='_ads_campaigns.tpl'}
                        {include file='_ads.tpl'}
                        {include file='_widget.tpl'}
                    </div> -->
                    <!-- right panel -->

                </div>
                <!-- right panel -->
                <div class="right-sidebar js_sticky-sidebar">
                    {include file='right-sidebar.tpl'}
                </div>
                <!-- right panel -->
            </div>
        </div>
        <!-- content panel -->
    </div>
</div>
<!-- page content -->


{include file='global-profile/global-profile_footer.tpl'}