

<!-- page content -->
{if !$user->_logged_in}
{include file='_head_landing.tpl'}
{include file='_header.tpl'}
<!-- <div class="mainloginBlock"> -->
{include file='_landing_page_view.tpl'}
<!-- </div> -->
<!-- include file='_footer.links.tpl' -->
<!-- include file='_landing_footerlinks.tpl' -->
{else}
{include file='_head.tpl'}
{include file='_header.tpl'}
<div class="container mt20 offcanvas">
    <div class="row">

        <!-- side panel -->
        <div class="col-md-4 col-lg-3 offcanvas-sidebar js_sticky-sidebar" id="sidebarHiddSwip">
            {include file='_sidebar.tpl'}
        </div>
        <!-- side panel -->

        <!-- content panel -->
        <div class="col-md-8 col-lg-9 offcanvas-mainbar">
            <div class="row">
                <!-- center panel -->
                <div class="home-page-middel-block">

                    <!-- announcments -->
                    {include file='_announcements.tpl'}
                    <!-- announcments -->

                    {if $view == ""}

                    <!-- stories -->
                    {if $system['stories_enabled']}
                    <div class="card story-card">
                      
                        <div class="card-body stories-wrapper">
                            <div id="stories" data-system-url= "{$system['system_url']}" data-user-id="{$user->_data['user_id']}" data-json='{htmlspecialchars($stories["json"], ENT_QUOTES, 'UTF-8')}'>
                                <div class="add-story add-story-test" data-toggle="modal"
                                    data-url="posts/story.php?do=create">
                                    <div class="img" style="background-image:url({$user->_data['user_picture']});">
                                        <div class="addStroryPlusIcon">+</div>
                                        <p class="addStroryText">Add to Story</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {/if}
                    <!-- stories -->

                    <!-- publisher -->
                    {include file='_publisher.tpl' _handle="me" _privacy=true}
                    <!-- publisher -->

                    <!-- boosted post -->
                    {if $boosted_post}
                    {include file='_boosted_post.tpl' post=$boosted_post}
                    {/if}
                    <!-- boosted post -->

                    <!-- posts -->
                    {include file='_posts.tpl' _get="newsfeed"}
                    <!-- posts -->

                    {elseif $view == "popular"}
                    <!-- popular posts -->
                    {include file='_posts.tpl' _get="popular" _title=__("Popular Posts")}
                    <!-- popular posts -->

                    {elseif $view == "discover"}
                    <!-- discover posts -->
                    {include file='_posts.tpl' _get="discover" _title=__("Discover Posts")}
                    <!-- discover posts -->

                    {elseif $view == "saved"}
                    <!-- saved posts -->
                    {include file='_posts.tpl' _get="saved" _title=__("Saved Posts")}
                    <!-- saved posts -->

                    {elseif $view == "memories"}
                    <!-- page header -->
                    <!-- <div class="page-header mini rounded-top mb10">
                        <div class="crystal c03"></div>
                        <div class="circle-1"></div>
                        <div class="circle-2"></div>
                        <div class="inner">
                            <h2>{__("Memories")}</h2>
                            <p>{__("Enjoy looking back on your memories")}</p>
                        </div>
                    </div> -->
                    <!-- page header -->

                    <!-- memories posts -->
                    {include file='_posts.tpl' _get="memories" _title=__("ON THIS DAY") _filter="all"}
                    <!-- memories posts -->

                    {elseif $view == "articles"}
                    <!-- articles posts -->
                    {include file='_posts.tpl' _get="posts_profile" _id=$user->_data['user_id'] _filter="article"
                    _title=__("My Articles")}
                    <!-- articles posts -->

                    {elseif $view == "products"}
                    <!-- products posts -->
                    {include file='_posts.tpl' _get="posts_profile" _id=$user->_data['user_id'] _filter="product"
                    _title=__("My Products")}
                    <!-- products posts -->

                    {elseif $view == "boosted_posts"}
                    {if $user->_is_admin || $user->_data['user_subscribed']}
                    <!-- boosted posts -->
                    {include file='_posts.tpl' _get="boosted" _title=__("My Boosted Posts")}
                    <!-- boosted posts -->
                    {else}
                    <!-- upgrade -->
                    <div class="alert alert-warning">
                        <div class="icon">
                            <i class="fa fa-id-card fa-2x"></i>
                        </div>
                        <div class="text">
                            <strong>{__("Membership")}</strong><br>
                            {__("Choose the Plan That's Right for You")}, {__("Check the package from")} <a
                                href="{$system['system_url']}/packages">{__("Here")}</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{$system['system_url']}/packages" class="btn btn-primary"><i
                                class="fa fa-rocket mr5"></i>{__("Upgrade to Pro")}</a>
                    </div>
                    <!-- upgrade -->
                    {/if}

                    {elseif $view == "boosted_pages"}
                    {if $user->_is_admin || $user->_data['user_subscribed']}
                    <div class="card">
                        <div class="card-header">
                            <strong>{__("My Boosted Pages")}</strong>
                        </div>
                        <div class="card-body">
                            {if $boosted_pages}
                            <ul>
                                {foreach $boosted_pages as $_page}
                                {include file='__feeds_page.tpl' _tpl="list"}
                                {/foreach}
                            </ul>

                            {if count($boosted_pages) >= $system['max_results_even']}
                            <!-- see-more -->
                            <div class="alert alert-info see-more js_see-more" data-get="boosted_pages">
                                <span>{__("Load More")}</span>
                                <div class="loader loader_small x-hidden"></div>
                            </div>
                            <!-- see-more -->
                            {/if}
                            {else}
                             <p class="text-center text-muted mt10 no_dataimg_">
                         <img width="100%"
                                src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results13.png">
                           <p> {__("No pages to show")}</p>
                        </p>
                            {/if}
                        </div>
                    </div>
                    {else}
                    <!-- upgrade -->
                    <div class="alert alert-warning">
                        <div class="icon">
                            <i class="fa fa-id-card fa-2x"></i>
                        </div>
                        <div class="text">
                            <strong>{__("Membership")}</strong><br>
                            {__("Choose the Plan That's Right for You")}, {__("Check the package from")} <a
                                href="{$system['system_url']}/packages">{__("Here")}</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{$system['system_url']}/packages" class="btn btn-primary"><i
                                class="fa fa-rocket mr5"></i>{__("Upgrade to Pro")}</a>
                    </div>
                    <!-- upgrade -->
                    {/if}

                    {/if}
                </div>
                <!-- center panel -->

                <!-- right panel -->
                <div class="right-sidebar js_sticky-sidebar ">
                    {include file='right-sidebar.tpl'}
                </div>
                <!-- right panel -->
            </div>
        </div>
        <!-- content panel -->

    </div>
</div>
{include file='_footer.tpl'}
{/if}
<!-- page content -->
