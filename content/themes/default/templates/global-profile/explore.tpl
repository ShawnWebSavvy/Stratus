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
            <div class="explore_cmn_style">
                <!-- tabs -->
                <div class="content-tabs custom-tabs clearfix">
                    <ul>
                        <li {if $view=="foryou" }class="active" {/if}>
                            <a href="{$system['system_url']}/global/explore">{__("For You")}</a>
                        </li>
                        <li {if $view=="users" }class="active" {/if}>
                            <a href="{$system['system_url']}/global/explore/users">{__("Explore Users")}</a>
                        </li>
                        {if $system['trending_hashtags_enabled']}
                        <li {if $view=="trending" }class="active" {/if}>
                            <a href="{$system['system_url']}/global/explore/trending">{__("Trending")}</a>
                        </li>
                        {/if}
                        {foreach $trending_hashtags as $tags}
                        {if $tags@iteration < 4} <li {if $view=="{$tags['hashtag']}" }class="active" {/if}>
                            <a
                                href="{$system['system_url']}/global/explore/hashtag/{$tags['hashtag']}">#{$tags['hashtag']}</a>
                            </li>
                            {/if}
                            {/foreach}
                    </ul>
                </div>

            <!-- {include file='_header.search.tpl'} -->
                <!-- tabs -->
                <!-- content -->
                <div>
                    <div class="tab-pane active" id="posts">
                        {if $trendingPosts}
                        {if $trendingPosts && count($trendingPosts) > 0}
                        <ul class="global-profile-ul-post feeds_post_ul">
                            {foreach $trendingPosts as $post} {include
                            file='global-profile/global-profile__feeds_post.tpl'} {/foreach}
                        </ul>
                        {else}
                        <ul class="global-profile-ul-post noDataWrapImage">
                            <!-- no posts -->
                            <div class="text-center text-muted no_data_img_ __no_data_contet__">
                                <img width="100%"
                                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results3.png">
                                <p class="mb10"><strong>{__("No posts to show")}</strong></p>
                            </div>
                            <!-- no posts -->
                        </ul>
                        {/if}
                        <!-- see-more -->
		                <div class="alert alert-post see-more js_see-more {if $user->_logged_in}js_see-more-infinite{/if}" data-get="explore" data-filter="{if $_filter}{$_filter}{else}all{/if}" {if $_id}data-id="{$_id}"{/if}>
		                	<span>{__("More Stories")}</span>
		                	<div class="loader loader_small x-hidden"></div>
		                </div>
		                <!-- see-more -->
                        {/if}
                        {if $people}
                        {include file='global-profile/global-explore-friends.tpl' people=$people view=""}
                        {/if}

                        {if $noFriends} <div class="__no_data_contet__ text-center">
                            <p class="text-center text-muted">
                                <img src="{$system['system_url']}/content/themes/default/images/no_results16.jpg" width="100%"
                                    alt="No friends">
                            <h2 class="text-center _heading1_"> No suggestion available</h2>
                            </p>
                        </div>
                        {/if}
                    </div>
                </div>
            </div>
        
        </div>
        {if $showExplore == "users"}
        <!-- content -->
        <div class="col-lg-3 col-md-4 people-form-section discover_sec">
            <!-- search panel -->
            <div class="card">
                <div class="close_icons"><i class="fas fa-times"></i></div>
                <div class="card-header sec-heading bg-transparent">
                    <strong>Discover</strong>
                    <!-- <i class="fa fa-search mr5"></i>{__("Search")} -->
                </div>
                <div class="card-body">
                    <form action="{$system['system_url']}/global-people/search" method="post">
                        <div class="form-group" {$system['system_distance']}>
                            <label>{__("Distance")}</label>
                            <div>
                                <input type="range" class="custom-range" min="1" max="5000" value="{$distance_value}"
                                    name="distance_slider" oninput="this.form.distance_value.value=this.value">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">{if
                                            $system['system_distance'] ==
                                            "mile"}{__("MI")}{else}{__("KM")}{/if}</span>
                                    </div>
                                    <input type="number" class="form-control" min="1" max="5000"
                                        value="{$distance_value}" name="distance_value"
                                        oninput="this.form.distance_slider.value=this.value">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{__("Keyword")}</label>
                            <input type="text" class="form-control" name="query" value="{$keyword}">
                        </div>
                        <div class="form-group">
                            <label>{__("Gender")}</label>
                            <select class="form-control" name="gender">
                                <option value="any">{__("Any")}</option>
                                <option value="male">{__("Male")}</option>
                                <option value="female">{__("Female")}</option>
                                <option value="other">{__("Other")}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{__("Relationship")}</label>
                            <select class="form-control" name="relationship">
                                <option value="any" {if $relationship=='any' }selected{/if}>{__("Any")}</option>
                                <option value="single" {if $relationship=='single' }selected{/if}>{__("Single")}
                                </option>
                                <option value="relationship" {if $relationship=='relationship' }selected{/if}>
                                    {__("In a relationship")}</option>
                                <option value="married" {if $relationship=='married' }selected{/if}>
                                    {__("Married")}</option>
                                <option value="complicated" {if $relationship=='complicated' }selected{/if}>
                                    {__("It's complicated")}</option>
                                <option value="separated" {if $relationship=='separated' }selected{/if}>
                                    {__("Separated")}</option>
                                <option value="divorced" {if $relationship=='divorced' }selected{/if}>
                                    {__("Divorced")}</option>
                                <option value="widowed" {if $relationship=='widowed' }selected{/if}>
                                    {__("Widowed")}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{__("Online Status")}</label>
                            <select class="form-control" name="status">
                                <option value="any">{__("Any")}</option>
                                <option value="online">{__("Online")}</option>
                                <option value="offline">{__("Offline")}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary _cmn_btn" name="submit"><span
                                class="search-input-icon"> <img
                                    src="{$system['system_url']}/content/themes/default/images/Search2.svg"
                                    alt="search icon">
                            </span>{__("Search")}</button>
                    </form>
                </div>
            </div>
            <!-- search panel -->
            {include file='_ads_campaigns.tpl'} {include file='_ads.tpl'} {include file='_widget.tpl'}
        </div>
        {/if}
    </div>
    <!-- content panel -->
</div>
</div>
{include file='global-profile/global-profile_footer.tpl'}