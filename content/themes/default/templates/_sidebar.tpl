{assign var="last_dir" value="/"|explode:$smarty.server.REQUEST_URI}
{assign var="last_key" value=$last_dir|count}
{assign var="first_var" value=$last_dir[$last_key-1]}
{assign var="final_dir" value=$last_dir[$last_key-2]}
<div class="card main-side-nav-card">
    <div class="card-body with-nav">
        <div class="chat-conversations js_scroller left_sidebar_" data-slimScroll-height="87vh">
            <ul
                class="main-side-nav main-left-side-nav left-sidebar-{if ($page == 'global-profile/landingpage')}second-ul active {else}first-ul{/if}">
                <li {if ($page=='global-profile/landingpage' )}class="active" {/if}>
                    <a href="{$system['system_url']}/landingpage" class="{$page}">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/favoritesN.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_favourite.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_favourits_active.svg"
                                class="whiteicon"> -->
                        </div>
                        <span class="nav-text">{__("Latest Posts")}</span>
                    </a>
                </li>
            </ul>

            <!-- local hub sub menu starts -->
            <ul
                class="main-side-nav main-left-side-nav left-sidebar-{if ($active_page=='LocalHub')}second-ul active {else}first-ul{/if}">
                <li {if $active_page=='LocalHub' }class="active" {/if}>
                    <a href="{$system['system_url']}">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/local_hubN.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_localhub.svg" class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_localhub_active.svg"
                                class="whiteicon"> -->
                        </div>
                        <span class="nav-text">Circle</span>
                    </a>

                </li>

                {if ($active_page=='LocalHub')}
                <li {if $subactive_page=="profile" }class="active" {/if}>
                    <a page="{$page}" href="{$system['system_url']}/{$user->_data['user_name']}">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/profile_iconN.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_friends.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_friends-active.svg"
                                class="whiteicon"> -->
                        </div>
                        <span class="nav-text">Profile</span>
                    </a>
                </li>
                <li {if $subactive_page=="friends" }class="active" {/if}>
                    <a href="{$system['system_url']}/people/friend_requests">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/friend_iconN.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/friendsIcon.svg"
                                class="blackicon">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/friendsIconHover.svg"
                                class="whiteicon"> -->
                        </div><span class="nav-text">Friends</span>
                        <span
                            class="counter friendsCount blue {if count($user->_data['all_friends']) == 0}x-hidden{/if}">
                            {count($user->_data['all_friends'])}
                        </span>
                    </a>
                </li>
                <li {if $subactive_page=="messages" }class="active" {/if}>
                    <a href="{$system['system_url']}/messages" class="{$page}">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/messages_iconN.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_messages.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_messages_hover.svg"
                                class="whiteicon"> -->
                        </div>
                        <!--  con="chat"  -->
                        <span class="nav-text">{__("Messages")}</span>
                    </a>
                </li>

                <li {if $subactive_page=="settings" }class="active" {/if}>
                    <a href="{$system['system_url']}/settings">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/setting_iconN.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_settings.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_settings_hover.svg"
                                class="whiteicon"> -->
                        </div>
                        <span class="nav-text">{__("Settings")}</span>
                    </a>
                </li>

                {if $user->_is_admin}
                <li class="{if ($page=='admin')}active{/if}">
                    <a href="{$system['system_url']}/admincp">
                        {include file='__svg_icons.tpl' icon="dashboard" class="" width="24px" height="24px"}
                        <span class="nav-text">{__("Admin Panel")}</span>
                    </a>
                </li>
                {elseif $user->_is_moderator}
                <li>
                    <a href="{$system['system_url']}/modcp">
                        {include file='__svg_icons.tpl' icon="dashboard" class="" width="24px" height="24px"}
                        <span class="nav-text">__("Moderator Panel")}</span>
                    </a>
                </li>
                {/if}

                {if $system['memories_enabled']}
                <li {if $subactive_page=="memories" }class="active" {/if}>
                    <a href="{$system['system_url']}/memories">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/memories_iconN.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_memories.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_memories_hover.svg"
                                class="whiteicon"> -->
                        </div>
                        <span class="nav-text">{__("Memories")}</span>
                    </a>
                </li>

                {/if}

                <li {if $subactive_page=="pages" }class="active" {/if}>
                    <a href="{$system['system_url']}/pages">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_adHub_active.svg"
                                class="">
                        </div>
                        <span class="nav-text">{__("Pages")}</span>
                    </a>
                </li>
                <li {if $subactive_page=="groups" }class="active" {/if}>
                    <a href="{$system['system_url']}/groups">
                        <div class="svg-container">
                            <img style="width: 25px;"
                                src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/group_icon.svg"
                                class="">
                        </div>
                        <span class="nav-text">{__("Groups")}</span>
                    </a>
                </li>
                <li {if $subactive_page=="events" }class="active" {/if}>
                    <a href="{$system['system_url']}/events">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/event_add_iconSidebar.svg"
                                class="">
                        </div>
                        <span class="nav-text">{__("Events")}</span>
                    </a>
                </li>

                <!-- explore Hub-->
                <li {if $subactive_page=="pages" }class="active" {/if}>
                    <a href="{$system['system_url']}/pages">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/explore_iconN.svg"
                                class="">
                        </div>
                        <span class="nav-text">{__("Explore Circle")}</span>
                    </a>
                </li>
                <!--Explore hub end-->
                {/if}
            </ul>
            <!--local hub sub menu end -->

            <!-- Global Hub starts -->

            <ul
                class="main-side-nav main-left-side-nav left-sidebar-{if ($active_page=='GlobalHub')}second-ul active {else}first-ul{/if} {$page}">
                <li {if ($active_page=='GlobalHub' )}class="active" {/if}>
                    <a href="{$system['system_url']}/global-profile-timeline">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/globle_hubN.svg"
                                class="">
                        </div>
                        <span class="nav-text">Atrium</span>
                    </a>
                </li>
                {if ($active_page=='GlobalHub')}
                <li {if ($subactive_page=='globalhub_profile' )}class="active" {/if}>
                    <a href="{$system['system_url']}/global-profile.php?username={$user->_data['user_name']}">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/profile_iconN.svg"
                                class="">
                        </div>
                        <span class="nav-text">Profile</span>
                    </a>
                </li>
                <li {if ($subactive_page=='globalhub_followers' )}class="active" {/if}>
                    <!--<a href="{$system['system_url']}/people/friend_requests">-->
                    <a
                        href="{$system['system_url']}/global-profile.php?username={$user->_data['user_name']}&view=followers">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/friend_iconN.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/friendsIcon.svg"
                                class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/friendsIconHover.svg"
                                class="whiteicon"> -->
                        </div><span class="nav-text">Followers</span>
                        <span class="counter blue {if count($user->_data['followers']) == 0}x-hidden{/if}">
                            <!-- {count($user->_data['followers'])} -->
                        </span>
                    </a>
                </li>
                <li {if ($subactive_page=='globalhub_messages' )}class="active" {/if}>
                    <!--<a href="{$system['system_url']}/people/friend_requests">-->
                    <a href="{$system['system_url']}/globalMessages">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/messages_iconN.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_messages.svg"
                        class="blackicon">
                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_messages_hover.svg"class="whiteicon"> -->
                        </div>
                        <span class="nav-text">Messages</span>
                    </a>
                </li>
                <li {if ($subactive_page=='globalhub_bookmarks' )}class="active" {/if}>
                    <!--<a href="{$system['system_url']}/people/friend_requests">-->
                    <a href="{$system['system_url']}/global-profile-bookmarks.php">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/bookmark_iconN.svg"
                                class="">
                        </div>
                        <span class="nav-text">Bookmarks</span>
                        {* <span class="counter blue {if count($user->_data['followers']) == 0}x-hidden{/if}">
                            <!-- {count($user->_data['followers'])} -->
                        </span> *}
                    </a>
                </li>
                <li {if ($subactive_page=='explore' )}class="active" {/if}>
                    <a href="{$system['system_url']}/global/explore">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/explore_iconN.svg"
                                class="">
                        </div><span class="nav-text">Explore Atrium</span>
                    </a>
                </li>
                {/if}
            </ul>
            <!-- sub of global end -->
            <!-- Global Hub End here -->
                <!-- sub of global end -->
            <!-- Global Hub End here -->
            <!-- playtube -->
            {* <ul class="main-side-nav main-left-side-nav left-sidebar first-ul">
                <li>
                    <a href="{PLY_URL}?dtl={$encodedUserDetails}" class="{$page}">
                        <div class="svg-container">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/video_hub_icon.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_favourite.svg"
                            class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_favourits_active.svg"
                            class="whiteicon"> -->
                        </div>
                        <span class="nav-text">{__("Video Hub")}</span>
                    </a>
                </li>
            </ul> *}
            <!-- playtube -->

            <!-- Blog Hub starts-->

            {if $system['blogs_enabled']}
            <ul
                class="main-side-nav main-left-side-nav left-sidebar-{if ($active_page=='BlogHub')}second-ul active {else}first-ul{/if} {$page}">
                <!-- <ul class=" main-side-nav main-left-side-nav left-sidebar-four-ul"> -->
                <li {if $active_page=='BlogHub' }class="active" {/if}>
                    <a href="{$system['system_url']}/blogs">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/blog_hubN.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_blogHub.svg" class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_blogHub_active.svg" class="whiteicon"> -->
                        </div>
                        <span class="nav-text"> {__("Blog Hub")}</span>
                    </a>
                </li>
                <!-- </ul> -->
            </ul>
            {/if}
            <!-- Blog hub ends here -->

            <!-- Ads HUB Starts -->
            <ul class="main-side-nav main-left-side-nav left-sidebar-first-ul {if $page== " people" || $page=="ads" &&
                $view!="wallet" } active{/if} {$page}" ">
                <li {if $page==" ads" && $view!="wallet" }class="active" {/if}>
                <a href=" {$system['system_url']}/ads">
                    <div class="svg-container">
                        <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/ad_hubN.svg"
                            class="">
                        <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_adHub.svg" class="blackicon">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_adHub_active.svg" class="whiteicon"> -->
                    </div>
                    <span class="nav-text">{__("Ads Hub")}</span>
                </a>
                </li>
            </ul>

            {if $system['investment_module_status']}
            <ul class="main-side-nav main-left-side-nav left-sidebar-{if ($active_page==" Investment" )}second-ul
                active{else}first-ul {/if}">
                <li {if $active_page=="Investment" }class="active" {/if}>
                    <a href=" {$system['system_url']}/investments">
                        <div class="svg-container ">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Wallet.svg"
                                class="blackicon">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Wallet-active.svg"
                                class="whiteicon">

                        </div>
                        <span class="nav-text">Investment</span>
                    </a>

                </li>
            </ul>
            {/if}
            <!-- ADS Hub end -->

            <!-- Market HUB Starts -->
            {if $system['market_enabled']}
            <ul
                class="main-side-nav main-left-side-nav left-sidebar-first-ul {if ($active_page=='MarketHub')}second-ul active {else}first-ul{/if} {$page}">
                <li {if $active_page=="MarketHub" }class="active" {/if}>
                    <a href="{$system['system_url']}/market">
                        <div class="svg-container {$page}">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/market_hubN.svg"
                                class="">
                            <!-- <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_marketHub.svg" class="blackicon">
                              <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_marketHub_active.svg" class="whiteicon"> -->
                        </div>
                        <span class="nav-text">{__("Market Hub")}</span>
                    </a>
                </li>
            </ul>
            {/if}
            <!-- Market hub END -->

            <!-- wallet seprate -->
            <ul class="main-side-nav main-left-side-nav left-sidebar-{if ($page==" ads" && $view=="wallet" )}second-ul
                active{else}first-ul{/if}">
                <li {if $page=="ads" && $view=="wallet" }class="active" {/if}>
                    <a href=" {$system['system_url']}/wallet">
                        <div class="svg-container ">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Wallet.svg"
                                class="blackicon">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Wallet-active.svg"
                                class="whiteicon">

                        </div>
                        <span class="nav-text">{__("Wallet")}</span>
                    </a>

                </li>
            </ul>
            <!-- wallet seprate end -->


            <!-- Logiut starts -->
            <ul class="main-side-nav main-left-side-nav left-sidebar-five-ul">
                <li>
                    <a href="{$system['system_url']}/signout">
                        <div class="svg-container">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/logOutNew.svg"
                                class="blackicon">
                            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/logOut_activeNew.svg"
                                class="whiteicon">
                        </div>
                        <span class="nav-text">{__("Log Out")}</span>
                    </a>
                </li>
            </ul>
            <!-- Logout end-->


        </div>
    </div>
</div>