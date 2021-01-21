<div class="card main-side-nav-card">
    <div class="card-body with-nav landingpage-sidebar">
        <div class="chat-conversations js_scroller" data-slimScroll-height="87vh">
            <ul
                class="main-side-nav main-left-side-nav left-sidebar-{if ($page == 'global-profile/landingpage')}first{else}second{/if}-ul ">
                <li {if ($page=='global-profile/landingpage' )}class="active" {/if}>

                    <a href="{$system['system_url']}/landingpage" class="{$page}">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_favourite.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_favourits_active.svg"
                                class="whiteicon">
                        </div>
                        <span class="nav-text">{__("Favorites")}</span>
                    </a>
                </li>

                <li>
                    <a href="{$system['system_url']}">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_localhub.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_localhub-active.svg"
                                class="whiteicon">
                        </div>
                        <span class="nav-text">Local Hub</span>
                    </a>
                </li>

                <li>
                    <a href="{$system['system_url']}/global-profile-timeline">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub-active.svg"
                                class="whiteicon">
                        </div>
                        <span class="nav-text">Global Hub</span>
                    </a>
                </li>

                <!--<li>
                <a href="#" target="_blank">
                 <div class="svg-container">
                    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/videoHub.svg" class="blackicon">
                    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/videohub-whiteicon.svg" class="whiteicon">
                </div>
                Video Hub</a>
            </li>

            <li>
              <a href="http://svgImgeinsta.stage-apollo.xyz/loginapi.php?token={$user->_data['globalToken']}" target="_blank"> 
                <div class="svg-container">
                    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/instagram-hub.svg" class="blackicon">
                    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/instagram-hub-whiteicon.svg" class="whiteicon">
                </div>
                 include file='__svg_icons.tpl' icon="instagram-hub" class="" width="24px" height="24px"  -
                Photo Hub
              </a>
            </li>-->

                {if $system['blogs_enabled']}
                <li>
                    <a href="{$system['system_url']}/blogs">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_blogHub.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_blogHub_active.svg"
                                class="whiteicon">
                        </div>
                        <span class="nav-text">{__("Blog Hub")}</span>
                    </a>
                </li>
                {/if}

                <!-- explore -->
                <!--<li class="parent-element-li" >
                <a href="#">
                    <div class="svg-container">
                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/landingpageExplore.svg" class="blackicon">
                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/landingpageExplore-whiteicon.svg" class="whiteicon">
                    </div>                            
                    <span>{__("Explore Hub")}</span> 
                </a>
                    
                   
                <ul class="explore-child-menu">
                    <li {if $page== "people"}class="active"{/if}>
                        <a href="{$system['system_url']}/people">
                        {include file='__svg_icons.tpl' icon="find_people" class="" width="24px" height="24px"}
                        {__("People")}
                        </a>
                    </li>

                    {if $system['pages_enabled']}
                        <li {if $page== "pages"}class="active"{/if}>
                            <a href="{$system['system_url']}/pages">
                            {include file='__svg_icons.tpl' icon="pages" class="" width="24px" height="24px"}
                            {__("Pages")}
                            </a>
                        </li>
                    {/if}

                    {if $system['groups_enabled']}
                        <li {if $page== "groups"}class="active"{/if}>
                            <a href="{$system['system_url']}/groups">
                            {include file='__svg_icons.tpl' icon="groups" class="" width="24px" height="24px"}
                            {__("Groups")}
                            </a>
                        </li>
                    {/if}

                    {if $system['events_enabled']}
                        <li {if $page== "events"}class="active"{/if}>
                            <a href="{$system['system_url']}/events">
                            {include file='__svg_icons.tpl' icon="events" class="" width="24px" height="24px"}
                            {__("Events")}
                            </a>
                        </li>
                    {/if}

                    {if $system['blogs_enabled']}
                        <li>
                            <a href="{$system['system_url']}/blogs">
                            {include file='__svg_icons.tpl' icon="blogs" class="" width="24px" height="24px"}
                            {__("Blogs")}
                            </a>
                        </li>
                    {/if}

                    {if $system['market_enabled']}
                        <li>
                            <a href="{$system['system_url']}/market">
                            {include file='__svg_icons.tpl' icon="market" class="" width="24px" height="24px"}
                            {__("Marketplace")}
                            </a>
                        </li>
                    {/if}

                    {if $system['forums_enabled']}
                        <li>
                            <a href="{$system['system_url']}/forums">
                            {include file='__svg_icons.tpl' icon="forums" class="" width="24px" height="24px"}
                            {__("Forums")}
                            </a>
                        </li>
                    {/if}

                    {if $system['movies_enabled']}
                        <li {if $page== "movies"}class="active"{/if}>
                            <a href="{$system['system_url']}/movies">
                            {include file='__svg_icons.tpl' icon="movies" class="" width="24px" height="24px"}
                            {__("Movies")}
                            </a>
                        </li>
                    {/if}

                    {if $system['games_enabled']}
                        <li {if $page== "games"}class="active"{/if}>
                            <a href="{$system['system_url']}/games">
                            {include file='__svg_icons.tpl' icon="games" class="" width="24px" height="24px"}
                            {__("Games")}
                            </a>
                        </li>
                    {/if}

                    {if $system['developers_apps_enabled'] || $system['developers_share_enabled']}
                        <li {if $page== "developers"}class="active"{/if}>
                            <a href="{$system['system_url']}/developers{if !$system['developers_apps_enabled']}/share{/if}">
                            {include file='__svg_icons.tpl' icon="developers" class="" width="24px" height="24px"}
                            {__("Developers")}
                            </a>
                        </li>
                    {/if}
                </ul>
            </li> -->


                {if $system['ads_enabled']}
                <li {if $page=="ads" && $view !="wallet" }class="active" {/if}>
                    <a href="{$system['system_url']}/ads">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_adHub.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_adHub_active.svg"
                                class="whiteicon">
                        </div>
                        <span class="nav-text">{__("Ads Hub")}</span>
                    </a>
                </li>
                {/if}

                {if $system['market_enabled']}
                <li>
                    <a href="{$system['system_url']}/market">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_marketHub.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_marketHub_active.svg"
                                class="whiteicon">
                        </div>
                        <span class="nav-text">{__("Marketplace")}</span>
                    </a>
                </li>
                {/if}
            </ul>
            <!-- explore hub starts -->
            <ul class="main-side-nav main-left-side-nav left-sidebar-first-ul {if $page== " people" || $page=="groups"
                || $page=="pages" || $page=="events" } active{/if} {$page}" ">
<li class=" parent-element-li">
                <a href="#">
                    <div class="svg-container">
                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_exploreHub.svg"
                            class="blackicon">
                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_exploreHub_active.svg"
                            class="whiteicon">
                    </div>
                    <span class="nav-text">{__("Explore Hub")}</span>
                </a>
                <!--<small class="text-muted">{__("explore")|upper}</small>-->

                <ul class="explore-child-menu">
                    <li {if $page=="people" }class="active" {/if}>
                        <a href="{$system['system_url']}/people">
                            {include file='__svg_icons.tpl' icon="find_people" class="" width="24px" height="24px"}
                            {__("People")}
                        </a>
                    </li>

                    {if $system['pages_enabled']}
                    <li {if $page=="pages" }class="active" {/if}>
                        <a href="{$system['system_url']}/pages">
                            {include file='__svg_icons.tpl' icon="pages" class="" width="24px" height="24px"}
                            {__("Pages")}
                        </a>
                    </li>
                    {/if}

                    {if $system['groups_enabled']}
                    <li {if $page=="groups" }class="active" {/if}>
                        <a href="{$system['system_url']}/groups">
                            {include file='__svg_icons.tpl' icon="groups" class="" width="24px" height="24px"}
                            {__("Groups")}
                        </a>
                    </li>
                    {/if}

                    {if $system['events_enabled']}
                    <li {if $page=="events" }class="active" {/if}>
                        <a href="{$system['system_url']}/events">
                            {include file='__svg_icons.tpl' icon="events" class="" width="24px" height="24px"}
                            {__("Events")}
                        </a>
                    </li>
                    {/if}

                    {if $system['blogs_enabled']}
                    <li>
                        <a href="{$system['system_url']}/blogs">
                            {include file='__svg_icons.tpl' icon="blogs" class="" width="24px" height="24px"}
                            {__("Blogs")}
                        </a>
                    </li>
                    {/if}

                    {if $system['market_enabled']}
                    <li>
                        <a href="{$system['system_url']}/market">
                            {include file='__svg_icons.tpl' icon="market" class="" width="24px" height="24px"}
                            {__("Marketplace")}
                        </a>
                    </li>
                    {/if}

                    {if $system['forums_enabled']}
                    <li>
                        <a href="{$system['system_url']}/forums">
                            {include file='__svg_icons.tpl' icon="forums" class="" width="24px" height="24px"}
                            {__("Forums")}
                        </a>
                    </li>
                    {/if}

                    {if $system['movies_enabled']}
                    <li {if $page=="movies" }class="active" {/if}>
                        <a href="{$system['system_url']}/movies">
                            {include file='__svg_icons.tpl' icon="movies" class="" width="24px" height="24px"}
                            {__("Movies")}
                        </a>
                    </li>
                    {/if}

                    {if $system['games_enabled']}
                    <li {if $page=="games" }class="active" {/if}>
                        <a href="{$system['system_url']}/games">
                            {include file='__svg_icons.tpl' icon="games" class="" width="24px" height="24px"}
                            {__("Games")}
                        </a>
                    </li>
                    {/if}

                    {if $system['developers_apps_enabled'] || $system['developers_share_enabled']}
                    <li {if $page=="developers" }class="active" {/if}>
                        <a href="{$system['system_url']}/developers{if !$system['developers_apps_enabled']}/share{/if}">
                            {include file='__svg_icons.tpl' icon="developers" class="" width="24px" height="24px"}
                            {__("Developers")}
                        </a>
                    </li>
                    {/if}
                </ul>
                </li>
            </ul>
            <!-- explore end here-->
            <ul class="main-side-nav main-left-side-nav left-sidebar-five-ul">
                <li>
                    <a class="dropdown-item" href="{$system['system_url']}/signout">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/logOutNew.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/logOut_activeNew.svg"
                                class="whiteicon">
                        </div>
                        <span class="nav-text">{__("Log Out")}</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>