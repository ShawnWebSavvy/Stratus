{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
{if !$user->_logged_in}

<div class="mainloginBlock">
    {include file='_sign_form.tpl'}
</div>

{include file='_footer.links.tpl'}

{else}
<link rel="stylesheet" href="{$system['system_uploads_assets']}/content/themes/default/css/bricklayer.css">
<link rel="stylesheet" href="{$system['system_uploads_assets']}/content/themes/default/css/bricklayer-custom.css">
<style>
    @media screen and (min-width: 700px) {
        .bricklayer-column-sizer {
            /* If page is greater than 700px, columns will be 5% wide. That means there will be lots of columns */
            width: 50%;
        }
    }
</style>
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
                    {if $view == ""}
                    <div class="post-section-new">

                        {if $postsNew}
                        <div class="bricklayer" id="landing_feeds_post_uls">
                            {foreach $postsNew as $postsItem}
                            <div class="feeds_post" data-id="{$postsItem['post_id']}"
                                post-type="{$postsItem['post_type']}">
                                <div class="post" data-id="{$postsItem['post_id']}">
                                    <div class="post-body">
                                        <div class="post-header">
                                            <div class="post-avatar">
                                                <a class="post-avatar-picture global-post-avatar-picture"
                                                    href="{$postsItem['post_author_url']}"
                                                    style="background-image:url({$postsItem['post_author_picture']});">
                                                </a> {if $postsItem['post_author_online']}<i
                                                    class="fa fa-circle online-dot"></i>{/if}
                                            </div>
                                            <div class="post-meta">
                                                <span class="js_user-popover" data-type="{$postsItem['user_type']}"
                                                    data-uid="{$postsItem['user_id']}"> <a class="post-author"
                                                        href="{$postsItem['post_author_url']}">{$postsItem['post_author_name']}</a>
                                                </span>
                                                {if $postsItem['user_verified']==1}
                                                <i data-toggle="tooltip" data-placement="top" title="Verified User"
                                                    class="fa fa-check-circle fa-fw verified-badge"></i>
                                                {/if}
                                                <!-- feeling action -->
                                                <!-- post feeling -->
                                                {if $postsItem['feeling_action']}

                                                <a {$postsItem['posthub']}
                                                    href="{$system['system_url']}/{if $postsItem['posthub'] == 'GlobalHub'}global-profile-posts{else}posts{/if}/{$postsItem['post_id']}"
                                                    class="" data-id="{$postsItem['post_id']}">
                                                    <span class="post-title">
                                                        {if $postsItem['post_type'] != "" && $postsItem['post_type'] !=
                                                        "map"} & {/if}{__("is")} {__($postsItem["feeling_action"])}
                                                        {__($postsItem["feeling_value"])} <i
                                                            class="twa twa-lg twa-{$postsItem['feeling_icon']}"></i>
                                                    </span>
                                                </a>

                                                {/if}
                                                {if $_get != 'posts_group' && $postsItem['in_group']}
                                                <i class="fa fa-caret-right ml5 mr5"></i>
                                                <!--<i class="fa fa-users ml5 mr5"></i> -->
                                                <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/newgroupIcon1.svg"
                                                    class="ml5 mr5">
                                                <a
                                                    href="{$system['system_url']}/groups/{$postsItem['group_name']}">{$postsItem['group_title']}</a>

                                                {elseif $_get != 'posts_event' && $postsItem['in_event']}
                                                <i class="fa fa-caret-right ml5 mr5"></i><i
                                                    class="fa fa-calendar ml5 mr5"></i><a
                                                    href="{$system['system_url']}/events/{$postsItem['event_id']}">{$postsItem['event_title']}</a>

                                                {elseif $postsItem['in_wall']}
                                                <i class="fa fa-caret-right ml5 mr5"></i>
                                                <span class="js_user-popover" data-type="user"
                                                    data-uid="{$postsItem['wall_id']}">
                                                    <a
                                                        href="{$system['system_url']}/{$postsItem['wall_username']}">{$postsItem['wall_fullname']}</a>
                                                </span>
                                                {/if}
                                                <div class="post-time">
                                                    <!--<a href="{$system['system_url']}/posts/{$postsItem['post_id']}" class="js_moment" data-time="{$postsItem['time']}" title="{$postsItem['time']}">a few seconds ago</a> -->
                                                    <a href="#" class="js_moment" data-time="{$postsItem['time']}"
                                                        title="{$postsItem['time']}" style="cursor:default;">a few
                                                        seconds ago</a>
                                                    {if ($postsItem['post_hub'] == "LocalHub") }
                                                    -

                                                    {if !$postsItem['is_anonymous'] && !$_shared &&
                                                    $postsItem['manage_post'] && $postsItem['user_type'] == 'user' &&
                                                    !$postsItem['in_group'] && !$postsItem['in_event'] &&
                                                    $postsItem['post_type'] != "product" && $postsItem['post_type'] !=
                                                    "article"}
                                                    <!-- privacy -->
                                                    {if $postsItem['privacy'] == "me"}
                                                    <div class="btn-group" data-toggle="tooltip" data-placement="top"
                                                        data-value="me" title='{__("Shared with: Only Me")}'>
                                                        <button type="button" class="btn dropdown-toggle"
                                                            data-toggle="dropdown" data-display="static">
                                                            <span class="share_sign_img">
                                                                <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Hide_form.svg"
                                                                    class="blackicon">
                                                            </span>
                                                        </button>
                                                        {elseif $postsItem['privacy'] == "friends"}
                                                        <div class="btn-group" data-toggle="tooltip"
                                                            data-placement="top" data-value="friends"
                                                            title='{__("Shared with: Friends")}'>
                                                            <button type="button" class="btn dropdown-toggle"
                                                                data-toggle="dropdown" data-display="static">
                                                                <span class="share_sign_img">
                                                                    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/friendsIcon.svg"
                                                                        class="blackicon">
                                                                </span>
                                                            </button>
                                                            {elseif $postsItem['privacy'] == "public"}
                                                            <div class="btn-group" data-toggle="tooltip"
                                                                data-placement="top" data-value="public"
                                                                title='{__("Shared with:Public")}'>
                                                                <button type="button" class="btn dropdown-toggle"
                                                                    data-toggle="dropdown" data-display="static">
                                                                    <span class="share_sign_img">
                                                                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
                                                                            class="blackicon">
                                                                    </span>
                                                                </button>
                                                                {/if}
                                                                <!-- <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item pointer js_edit-privacy" data-title='{__("Shared with:Public")}' data-value="public">
                                <i class="fa fa-globe"></i> {__("Public")}
                            </div>
                            <div class="dropdown-item pointer js_edit-privacy" data-title='{__("Shared with:Friends")}' data-value="friends">
                                <i class="fa fa-users"></i> {__("Friends")}
                            </div>
                            <div class="dropdown-item pointer js_edit-privacy" data-title='{__("Shared with:Only Me")}' data-value="me">
                                <i class="fa fa-lock"></i> {__("Only Me")}
                            </div>
                        </div> -->

                                                                <div
                                                                    class="dropdown-menu dropdown-menu-right _postshare__">
                                                                    <div class="dropdown-item pointer js_edit-privacy"
                                                                        data-title='{__("Shared with: Public")}'
                                                                        data-value="public">
                                                                        <div class="post_images__">
                                                                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
                                                                                class="blackicon">
                                                                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub-active.svg"
                                                                                class="whiteicon">
                                                                        </div>
                                                                        <span> {__("Public")}</span>
                                                                    </div>
                                                                    <div class="dropdown-item pointer js_edit-privacy"
                                                                        data-title='{__("Shared with: Friends")}'
                                                                        data-value="friends">
                                                                        <div class="post_images__">
                                                                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/friendsIcon.svg"
                                                                                class="blackicon">
                                                                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/friendsIconHover.svg"
                                                                                class="whiteicon">
                                                                        </div>
                                                                        <span>{__("Friends")}</span>
                                                                    </div>
                                                                    <div class="dropdown-item pointer js_edit-privacy"
                                                                        data-title='{__("Shared with: Only Me")}'
                                                                        data-value="me">
                                                                        <div class="post_images__">
                                                                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Hide_form.svg"
                                                                                class="blackicon">
                                                                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Hide_form-hover.svg"
                                                                                class="whiteicon">
                                                                        </div>
                                                                        <span> {__("Only Me")} </span>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <!-- privacy -->
                                                            {else}
                                                            {if $postsItem['privacy'] == "me"}
                                                            <i class="fa fa-lock" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title='{__("Shared with")} {__("Only Me")}'></i>
                                                            {elseif $postsItem['privacy'] == "friends"}
                                                            <i class="fa fa-users" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title='{__("Shared with")} {__("Friends")}'></i>
                                                            {elseif $postsItem['privacy'] == "public"}
                                                            <i class="fa fa-globe" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title='{__("Shared with")} {__("Public")}'></i>
                                                            {elseif $postsItem['privacy'] == "custom"}
                                                            <i class="fa fa-cog" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title='{__("Shared with")} {__("Custom People")}'></i>
                                                            {/if}
                                                            {/if}{/if}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-replace">
                                                    <div class="post-text js_readmore" dir="auto"
                                                        style="max-height:none;">
                                                    </div>
                                                    <div class="post-text-translation x-hidden" dir="auto"></div>
                                                    {if $postsItem['post_type'] == "shared"}
                                                    <div class="mt10 {if $_snippet}x-hidden{/if}">
                                                        <div class="post-media">
                                                            <div class="post-media-meta">
                                                                {include file='__feeds_post.body.tpl'
                                                                _post=$postsItem['origin'] _shared=true}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {/if}
                                                    {if $postsItem['colored_pattern']}
                                                    <div class="post-colored" {if
                                                        $postsItem['colored_pattern']['type']=="color" }
                                                        style="background-image:linear-gradient(45deg, {$postsItem['colored_pattern']['background_color_1']}, {$postsItem['colored_pattern']['background_color_2']});"
                                                        {else}
                                                        style="background-image:url({$system['system_uploads']}/{$postsItem['colored_pattern']['background_image']})"
                                                        {/if}>
                                                        <div class="post-colored-text-wrapper js_scroller"
                                                            data-slimScroll-height="240">
                                                            <div class="post-text" dir="auto"
                                                                style="color:{$postsItem['colored_pattern']['text_color']};">
                                                                {$postsItem['text']}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {elseif $postsItem['post_type'] == "article" &&
                                                    $postsItem['article']}
                                                    <div class="mt10">
                                                        <div class="post-media">
                                                            {if $postsItem['article']['cover']}
                                                            <a class="post-media-image"
                                                                href="{$system['system_url']}/blogs/{$postsItem['post_id']}/{$postsItem['article']['title_url']}">
                                                                <div
                                                                    style="padding-top:50%; background-image:url('{$system['system_uploads']}/{$postsItem['article']['cover']}');">
                                                                </div>
                                                            </a>
                                                            {/if}
                                                            <div class="post-media-meta">
                                                                <a class="title mb5"
                                                                    href="{$system['system_url']}/blogs/{$postsItem['post_id']}/{$postsItem['article']['title_url']}">{$postsItem['article']['title']}</a>
                                                                <div class="text mb5">
                                                                    {$postsItem['article']['text_snippet']|truncate:400}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {else}
                                                    <a {$postsItem['posthub']}
                                                        href="{$system['system_url']}/{if $postsItem['posthub'] == 'GlobalHub'}global-profile-posts{else}posts{/if}/{$postsItem['post_id']}"
                                                        class="js_lightbox_custom" data-id="{$postsItem['post_id']}">
                                                        <div class="post-text js_readmore" dir="auto">
                                                            {$postsItem['text']}
                                                        </div>
                                                    </a>
                                                    {/if}


                                                    {if $postsItem['photos_num']>0 }
                                                    <a {$postsItem['posthub']}
                                                        href="{$system['system_url']}/{if $postsItem['posthub'] == 'GlobalHub'}global-profile-photo{else}photos{/if}/{$postsItem['photos'][0]['photo_id']}"
                                                        class="js_lightbox_custom"
                                                        data-id="{$postsItem['photos'][0]['photo_id']}"
                                                        data-image="{$system['system_uploads']}/{$postsItem['photos'][0]['source']}"
                                                        data-context="{if $postsItem['post_type'] == 'product'}post{else}album{/if}">
                                                        <div class="image sdds"><img
                                                                src="{$system['system_uploads']}/{$postsItem['photos'][0]['source']}">
                                                        </div>
                                                    </a>
                                                    {/if}
                                                    {if $postsItem['origin']['photos_num']>0 }
                                                    <div class="image"><img
                                                            src="{$system['system_uploads']}/{$postsItem['origin']['photos'][0]['source']}">
                                                    </div>

                                                    {/if}
                                                    {if $postsItem['post_type']=="video" }
                                                    <div class="video">

                                                        <video width="100%" height="315" controls>
                                                            <source
                                                                src="{$system['system_uploads']}/{$postsItem['video']['source']}">

                                                        </video>
                                                    </div>
                                                    {/if}
                                                    {if $postsItem['origin']['post_type']=="video" }
                                                    <div class="video">
                                                        <video width="100%" height="315" controls>
                                                            <source
                                                                src="{$system['system_uploads']}/{$postsItem['origin']['video']['source']}">
                                                        </video>
                                                    </div>
                                                    {/if}

                                                    {if $postsItem['post_type'] == "audio" && $postsItem['audio']}
                                                    <div class="plr10">
                                                        <audio class="js_audio"
                                                            id="audio-{$postsItem['audio']['audio_id']}" {if
                                                            $user->_logged_in}onplay="update_media_views('audio',
                                                            {$postsItem['audio']['audio_id']})" {/if} controls
                                                            preload="auto" style="width: 100%;">
                                                            <source
                                                                src="{$system['system_uploads']}/{$postsItem['audio']['source']}"
                                                                type="audio/mpeg">
                                                            <source
                                                                src="{$system['system_uploads']}/{$postsItem['audio']['source']}"
                                                                type="audio/mp3">
                                                            {__("Your browser does not support HTML5 audio")}
                                                        </audio>
                                                    </div>
                                                    {/if}


                                                    {if $postsItem['origin']['post_type'] == "audio" &&
                                                    $postsItem['origin']['audio']}
                                                    <div class="plr10">
                                                        <audio class="js_audio"
                                                            id="audio-{$postsItem['origin']['audio']['audio_id']}" {if
                                                            $user->_logged_in}onplay="update_media_views('audio',
                                                            {$postsItem['origin']['audio']['audio_id']})" {/if} controls
                                                            preload="auto" style="width: 100%;">
                                                            <source
                                                                src="{$system['system_uploads']}/{$postsItem['origin']['audio']['source']}"
                                                                type="audio/mpeg">
                                                            <source
                                                                src="{$system['system_uploads']}/{$postsItem['origin']['audio']['source']}"
                                                                type="audio/mp3">
                                                            {__("Your browser does not support HTML5 audio")}
                                                        </audio>
                                                    </div>
                                                    {/if}


                                                    {if $postsItem['post_type']=="file" }
                                                    <div class="post-downloader">
                                                        <div class="icon">
                                                            <i class="fa fa-file-alt fa-2x"></i>
                                                        </div>
                                                        <div class="info">
                                                            <strong>{__("File Type")}</strong>:
                                                            {get_extension({$postsItem['file']['source']})}
                                                            <div class="mt10">
                                                                <a class="btn btn-primary "
                                                                    href="{$system['system_uploads']}/{$postsItem['file']['source']}">{__("Download")}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {/if}


                                                    {if $postsItem['origin']['post_type']=="file" }
                                                    <div class="post-downloader">
                                                        <div class="icon">
                                                            <i class="fa fa-file-alt fa-2x"></i>
                                                        </div>
                                                        <div class="info">
                                                            <strong>{__("File Type")}</strong>:
                                                            {get_extension({$postsItem['origin']['file']['source']})}
                                                            <div class="mt10">
                                                                <a class="btn btn-primary "
                                                                    href="{$system['system_uploads']}/{$postsItem['origin']['file']['source']}">{__("Download")}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {/if}







                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {/foreach}
                                </div>

                                {else}
                                <div class="text-center text-muted no-post-to-show no_data_img_ __no_data_contet__">
                                    <img src="{$system['system_url']}/content/themes/default/images/no_results3.png"
                                        width="100%">
                                    <p class="mb10"><strong>No Record Found</strong></p>
                                </div>
                                <!--- <li class="{$postsNew['post_id']} no_data_img_"><img width="100%"
                                src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results3.png"><p>No Record Found</p></li> --->
                                {/if}

                            </div>

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
                            <div class="page-header mini rounded-top mb10">
                                <div class="crystal c03"></div>
                                <div class="circle-1"></div>
                                <div class="circle-2"></div>
                                <div class="inner">
                                    <h2>{__("Memories")}</h2>
                                    <p>{__("Enjoy looking back on your memories")}</p>
                                </div>
                            </div>
                            <!-- page header -->

                            <!-- memories posts -->
                            {include file='_posts.tpl' _get="memories" _title=__("ON THIS DAY") _filter="all"}
                            <!-- memories posts -->

                            {elseif $view == "articles"}
                            <!-- articles posts -->
                            {include file='_posts.tpl' _get="posts_profile" _id=$user->_data['user_id']
                            _filter="article"
                            _title=__("My Articles")}
                            <!-- articles posts -->

                            {elseif $view == "products"}
                            <!-- products posts -->
                            {include file='_posts.tpl' _get="posts_profile" _id=$user->_data['user_id']
                            _filter="product"
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
                        <div class="right-sidebar js_sticky-sidebar">
                            {include file='right-sidebar.tpl'}
                        </div>
                        <!-- right panel -->
                    </div>
                </div>
                <!-- content panel -->

            </div>
        </div>

        {/if}
        <!-- page content -->
        <script src="{$system['system_uploads_assets']}/content/themes/default/js/bricklayer.min.js"></script>
        <script src="{$system['system_uploads_assets']}/content/themes/default/js/bricklayer-custom.js"></script>
        {include file='_footer.tpl'}