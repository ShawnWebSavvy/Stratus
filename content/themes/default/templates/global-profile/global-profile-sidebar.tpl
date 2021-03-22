<div class="card main-side-nav-card">
    <div class="card-body with-nav">
        <div class="chat-conversations js_scroller" data-slimScroll-height="87vh">
            <ul class="main-side-nav main-left-side-nav left-sidebar-first-ul ">
                <li>

                    <!--<a href="{$system['system_url']}/global-profile-timeline" class="{$page}">
                    include file='__svg_icons.tpl' icon="homepage" class="" width="24px" height="24px"
                   
                </a>-->
                    <a href="{$system['system_url']}/landingpage" class="{$page}">
                        {include file='__svg_icons.tpl' icon="homepage" class="" width="24px" height="24px"}
                        {__("Favorites")}
                    </a>
                </li>
            </ul>
            <ul class="main-side-nav main-left-side-nav left-sidebar-second-ul {if $page== " people" || $page=="groups"
                || $page=="ads" || $page=="pages" || $page=="events" } active{/if} {$page}">
                <!-- basic -->
                <li>
                    <a href="{$system['system_url']}">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/landingpagelocalhub.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/landingpagelocalhub-whiteicon.svg"
                                class="whiteicon">
                        </div>
                        Local Hub
                    </a>
                </li>
            </ul>
            <ul class="main-side-nav main-left-side-nav left-sidebar-second-ul {if $page== " people" || $page=="groups"
                || $page=="ads" || $page=="pages" || $page=="events" } active{/if} {$page}">
                <!-- basic -->

                <!--<li>
                    <a href="{$system['system_url']}/global-profile-timeline">
                        {include file='__svg_icons.tpl' icon="GlobalHub" class="" width="24px" height="24px"}
                        Global Hub</a>
                </li>-->
                <li>
                    <!--<a href="{$system['system_url']}/people/friend_requests">-->
                    <a
                        href="{$system['system_url']}/global-profile.php?username={$user->_data['user_name']}&view=friends">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/adduserblack.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addUser.svg"
                                class="whiteicon">
                        </div>Friends
                        <span class="counter blue {if count($user->_data['friend_requests']) == 0}x-hidden{/if}">
                            {count($user->_data['friend_requests'])}
                        </span>
                    </a>
                </li>
                <!--<li>
                <a href="{$system['system_url']}/global-profile.php?username={$user->_data['user_name']}">
                        <img class="rounded-circle" src="{$user->_data.user_picture}" alt="{$user->_data['user_firstname']} {$user->_data['user_lastname']}">
                        <span>{$user->_data['user_firstname']} {$user->_data['user_lastname']}</span>
                    </a>
                    
            </li>-->

                {if $system['wallet_enabled']}
                <li {if $page=="ads" && $view=="wallet" }class="active" {/if}>
                    <a href="{$system['system_url']}/wallet">
                        {include file='__svg_icons.tpl' icon="wallet" class="" width="24px" height="24px"}
                        {__("Wallet")}
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

                <li>
                    <a href="{$system['system_url']}/messages" class="{$page}">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/message.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/messagewhite.svg"
                                class="whiteicon">
                        </div>
                        <!--  con="chat"  -->
                        {__("Messages")}
                    </a>
                </li>





            </ul>
            <!--<ul class="main-side-nav main-left-side-nav left-sidebar-four-ul">
                <li>
                    <a href="#" target="_blank">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/videoHub.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/videohub-whiteicon.svg"
                                class="whiteicon">
                        </div>
                        Video Hub
                    </a>
                </li>
            </ul>-->
            <!--<ul class="main-side-nav main-left-side-nav left-sidebar-four-ul">
                <li>
                    <a href="http://svgImgeinsta.stage-apollo.xyz/loginapi.php?token={$user->_data['globalToken']}"
                        target="_blank">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/instagram-hub.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/instagram-hub-whiteicon.svg"
                                class="whiteicon">
                        </div>
                        include file='__svg_icons.tpl' icon="instagram-hub" class="" width="24px" height="24px" 
                        Photo Hub
                    </a>
                </li>
            </ul>-->
            {if $system['blogs_enabled']}
            <ul class="main-side-nav main-left-side-nav left-sidebar-four-ul">
                <li>
                    <a href="{$system['system_url']}/blogs">
                        {include file='__svg_icons.tpl' icon="blogs" class="" width="24px" height="24px"}
                        {__("Blog Hub")}
                    </a>
                </li>
            </ul>
            {/if}
            <ul class="main-side-nav main-left-side-nav left-sidebar-four-ul">
                <!-- explore -->
                <li class="parent-element-li">
                    <a href="#">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/landingpageExplore.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/landingpageExplore-whiteicon.svg"
                                class="whiteicon">
                        </div>
                        <span>{__("Explore Hub")}</span>
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
                            <a
                                href="{$system['system_url']}/developers{if !$system['developers_apps_enabled']}/share{/if}">
                                {include file='__svg_icons.tpl' icon="developers" class="" width="24px" height="24px"}
                                {__("Developers")}
                            </a>
                        </li>
                        {/if}
                    </ul>
                </li>
            </ul>
            {if $system['ads_enabled']}
            <ul class="main-side-nav main-left-side-nav left-sidebar-four-ul">
                <li {if $page=="ads" && $view !="wallet" }class="active" {/if}>
                    <a href="{$system['system_url']}/ads">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/landingpageAdsGub.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/landingpageAdshub-whiteicon.svg"
                                class="whiteicon">
                        </div>
                        {__("Ads Hub")}
                    </a>
                </li>
            </ul>
            {/if}
            <ul class="main-side-nav main-left-side-nav left-sidebar-five-ul">
                <li>
                    <a class="dropdown-item" href="{$system['system_url']}/signout">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/logout.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/logoutwhite.svg"
                                class="whiteicon">
                        </div>
                        {__("Log Out")}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>