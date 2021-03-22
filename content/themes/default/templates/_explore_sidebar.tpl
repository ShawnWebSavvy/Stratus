<!-- left panel -->
<div class="col-lg-12 left-offcanvas-sidebar-inner settingleftWrap">
    <div class="card">
        <div class="card-body with-nav">
            <ul class="side-nav fixessf">
                <!-- <li {if $page=="people" }class="active" {/if}>
                        <a href="{$system['system_url']}/people">
                            {include file='__svg_icons.tpl' icon="find_people" class="" }
                            {__("People")}
                        </a>
                    </li> -->

                {if $system['pages_enabled']}
                <li class="{if $page==" pages" } active{/if} cmnm_btn_styles">
                    <a href="{$system['system_url']}/pages">
                        <!-- {include file='__svg_icons.tpl' icon="pages" class="" } -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon lazyload" alt="reading1"
                                data-src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/reading1.svg">
                        </div>
                        <span> {__("Pages")} </span>
                    </a>
                </li>
                {/if}

                {if $system['groups_enabled']}
                <li class="{if $page==" groups" } active{/if} cmnm_btn_styles">
                    <a href="{$system['system_url']}/groups">
                        <!-- {include file='__svg_icons.tpl' icon="groups" class="" } -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon lazyload" alt="newgroupIcon1"
                                data-src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/newgroupIcon1.svg">
                        </div>
                        <span> {__("Groups")} </span>
                    </a>
                </li>
                {/if}

                {if $system['events_enabled']}
                <li class=" {if $page==" events" } active {/if} cmnm_btn_styles">
                    <a href="{$system['system_url']}/events">
                        <!-- {include file='__svg_icons.tpl' icon="events" class="" } -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon" alt="calendar"
                                src="{$system['system_uploads_assets']}/content/themes/default/images/svg/calendar.svg">
                        </div>
                        <span> {__("Events")} </span>
                    </a>
                </li>
                {/if}

                <!-- {if $system['blogs_enabled']}
                    <li>
                        <a href="{$system['system_url']}/blogs">
                            {include file='__svg_icons.tpl' icon="blogs" class="" }
                            {__("Blogs")}
                        </a>
                    </li>
                    {/if} -->

                <!-- {if $system['market_enabled']}
                    <li>
                        <a href="{$system['system_url']}/market">
                            {include file='__svg_icons.tpl' icon="market" class="" }
                            {__("Marketplace")}
                        </a>
                    </li>
                    {/if} -->

                {if $system['forums_enabled']}
                <li class="{if $page==" forums" }active {/if} cmnm_btn_styles">
                    <a href="{$system['system_url']}/forums">
                        <!-- {include file='__svg_icons.tpl' icon="forums" class="" } -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon" alt=" "
                                src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/coloredpost.svg">
                        </div>
                        {__("Forums")}
                    </a>
                </li>
                {/if}

                {if $system['movies_enabled']}
                <li class="{if $page==" movies" } active {/if} cmnm_btn_styles">
                    <a href="{$system['system_url']}/movies">
                        {include file='__svg_icons.tpl' icon="movies" class="" }
                        {__("Movies")}
                    </a>
                </li>
                {/if}

                {if $system['games_enabled']}
                <li class="{if $page==" games" }active{/if} cmnm_btn_styles">
                    <a href="{$system['system_url']}/games">
                        <!-- {include file='__svg_icons.tpl' icon="games" class="" } -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon" alt=" "
                                src="{$system['system_uploads_assets']}/content/themes/default/images/svg/games.svg">
                        </div>
                        {__("Games")}
                    </a>
                </li>
                {/if}

                {if $system['developers_apps_enabled'] || $system['developers_share_enabled']}
                <li class=" {if $page==" developers" } active {/if} cmnm_btn_styles">
                    <a href="{$system['system_url']}/developers{if !$system['developers_apps_enabled']}/share{/if}">
                        <!-- {include file='__svg_icons.tpl' icon="developers" class="" } -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon" alt=" "
                                src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Code.svg">
                        </div>
                        {__("Developers")}
                    </a>
                </li>
                {/if}


            </ul>
        </div>
    </div>
</div>
<!-- left panel -->