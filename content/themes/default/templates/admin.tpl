{include file='_head.tpl'} {include file='_header.tpl'}

<!-- page content -->
<div class="container mt20 offcanvas">
    <div class="row">
        <div class="offcanvas-sidebar sidebar-left-ant" id="sidebarHiddSwip">
            {include file='_sidebar.tpl'}
        </div>
    </div>
    <div class="row right-side-content-ant">

        <!-- left panel -->
        <div class="col-lg-3 left-offcanvas-sidebar-inner adminBlockSideBar settingleftWrap">
            <div class="js_scroller showScrollBar" data-slimScroll-height="84vh">
                <!-- System -->
                <div class="card mb0">
                    <div class="card-body with-nav side_manu_icon">
                        <ul class="side-nav">
                            <!-- Dashboard -->
                            <li {if $view=="dashboard" }class="active" {/if}>
                                <a href="{$system['system_url']}/{$control_panel['url']}">
                                    <div class="svg-container">
                                        <img src="{$system['system_url']}/content/themes/default/images/svg/admin/apps_icon.svg" class="">
                                    </div>
                                    {__("Dashboard")}
                                </a>
                            </li>
                            <!-- Dashboard -->
                            {if $user->_is_admin || $user->_is_subAdmin}
                                <!-- Settings -->
                                <li {if $view=="settings" }class="active" {/if}>
                                    <a href="#settings" data-toggle="collapse" {if $view=="settings" }aria-expanded="true" {/if}>
                                        <div class="svg-container">
                                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/settings_icon_hover.svg" class="">
                                        </div>
                                        {__("Settings")}
                                    </a>
                                    <div class='collapse {if $view == "settings"}show{/if}' id="settings">
                                        <ul>
                                            <li {if $view=="settings" && $sub_view=="" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/settings">
                                                    <i class="fa fa-cogs fa-fw mr10"></i>{__("System Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="posts" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/settings/posts">
                                                    <i class="fa fa-comment-alt fa-fw mr10"></i>{__("Posts Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="registration" }class="active" {/if}>
                                                <a
                                                    href="{$system['system_url']}/{$control_panel['url']}/settings/registration">
                                                    <i
                                                        class="fa fa-sign-in-alt fa-fw mr10"></i>{__("Registration Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="email" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/settings/email">
                                                    <i class="fa fa-envelope-open fa-fw mr10"></i>{__("Email Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="sms" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/settings/sms">
                                                    <i class="fa fa-mobile fa-fw mr10"></i>{__("SMS Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="notifications" }class="active" {/if}>
                                                <a
                                                    href="{$system['system_url']}/{$control_panel['url']}/settings/notifications">
                                                    <i class="fa fa-bell fa-fw mr10"></i>{__("Notifications Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="chat" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/settings/chat">
                                                    <i class="fa fa-comments fa-fw mr10"></i>{__("Chat Settings")}
                                                </a>
                                            </li>
                                            <li {if $view == "settings" && $sub_view == "live"}class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/settings/live">
                                                    <i class="fa fa-signal fa-fw mr10"></i>{__("Live Stream Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="uploads" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/settings/uploads">
                                                    <i class="fa fa-upload fa-fw mr10"></i>{__("Uploads Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="security" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/settings/security">
                                                    <i class="fa fa-shield-alt fa-fw mr10"></i>{__("Security Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="payments" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/settings/payments">
                                                    <i class="fa fa-credit-card fa-fw mr10"></i>{__("Payments Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="limits" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/settings/limits">
                                                    <i class="fa fa-tachometer-alt fa-fw mr10"></i>{__("Limits Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="analytics" }class="active" {/if}>
                                                <a
                                                    href="{$system['system_url']}/{$control_panel['url']}/settings/analytics">
                                                    <i class="fa fa-chart-pie fa-fw mr10"></i>{__("Analytics Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="settings" && $sub_view=="investment" }class="active" {/if}>
                                                <a
                                                    href="{$system['system_url']}/{$control_panel['url']}/settings/investment">
                                                    <i class="fa fa-chart-pie fa-fw mr10"></i>{__("Investment Settings")}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- Settings -->
                                <li>
                                    <a href="#investment" data-toggle="collapse">
                                        <div class="svg-container">
                                            <img style="width: 25px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/curancy.svg" class="">
                                        </div>
                                        Investment
                                    </a>
                                    <div class="collapse  {if $view == "investment"}show{/if}" id="investment">
                                        <ul>
                                            <li {if $view=="investment" && ($sub_view=="exchanges" || $sub_view=="exchange") }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/investment/exchanges">
                                                    List Exchanges
                                                </a>
                                            </li>
                                            <li {if $view=="investment" && $sub_view=="transactions" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/investment/transactions">
                                                    List Transactions
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/custom-referrals">
                                                    Custom Referrals
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- Bank Withdrawl -->
                                <li {if $view=="bank-withdrawal" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/bank-withdrawal" style="display:none">
                                        <div class="svg-container">
                                            <img style="width: 20px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/theme.svg" class="">
                                        </div>
                                        {__("Bank Withdrawl")}
                                    </a>
                                </li>
                                <!-- Bank Withdrawl -->
                                <!-- Themes -->
                                <li {if $view=="themes" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/themes">
                                        <div class="svg-container">
                                            <img style="width: 20px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/theme.svg" class="">
                                        </div>
                                        {__("Themes")}
                                    </a>
                                </li>
                                <!-- Themes -->
                                <!-- Design -->
                                <li {if $view=="design" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/design">
                                        <div class="svg-container">
                                            <img style="width: 20px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/design.svg" class="">
                                        </div>
                                        {__("Design")}
                                    </a>
                                </li>
                                <!-- Design -->
                                <!-- Languages -->
                                <li {if $view=="languages" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/languages">
                                        <i class="fa fa-language fa-fw mr10" style="color: #3F51B5"></i>{__("Languages")}
                                    </a>
                                </li>
                                <!-- Languages -->
                                <!-- Currencies -->
                                <li {if $view=="currencies" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/currencies">
                                    <div class="svg-container">
                                            <img style="width: 20px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/newcoin1.svg" class="">
                                    </div>
                                        {__("Currencies")}
                                    </a>
                                </li>
                                <!-- Currencies -->
                            {/if}

                            {if $user->_is_admin || $user->_is_subAdmin}
                                <!-- Users -->
                                <li {if $view=="users" }class="active" {/if}>
                                    <a href="#users" data-toggle="collapse" {if $view=="users" }aria-expanded="true" {/if}>
                                        <div class="svg-container">
                                            <img style="width: 25px;" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/friend_iconN.svg" class="">
                                        </div>
                                        {__("Users")}
                                    </a>
                                    <div class='collapse {if $view == "users"}show{/if}' id="users">
                                        <ul>
                                            <li {if $view=="users" && $sub_view=="" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/users">
                                                    {__("List Users")}
                                                </a>
                                            </li>
                                            {if $user->_is_admin}
                                            <li {if $view=="users" && $sub_view=="admins" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/users/admins">
                                                    {__("List Admins")}
                                                </a>
                                            </li>
                                            <li {if $view=="users" && $sub_view=="admins" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/users/subadmins">
                                                    {__("List Sub Admins")}
                                                </a>
                                            </li>
                                            {/if}
                                            <li {if $view=="users" && $sub_view=="moderators" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/users/moderators">
                                                    {__("List Moderators")}
                                                </a>
                                            </li>
                                            <li {if $view=="users" && $sub_view=="online" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/users/online">
                                                    {__("List Online")}
                                                </a>
                                            </li>
                                            <li {if $view=="users" && $sub_view=="banned" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/users/banned">
                                                    {__("List Banned")}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- Users -->
                            {/if}
                            <!-- Posts -->
                            <li {if $view=="posts" }class="active" {/if}>
                                <a href="{$system['system_url']}/{$control_panel['url']}/posts">
                                    <div class="svg-container">
                                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/globle_hubN.svg" class="">
                                    </div>
                                    {__("Posts")}
                                </a>
                            </li>
                            <!-- Posts -->
                            <!-- Pages -->
                            <li {if $view=="pages" }class="active" {/if}>
                                <a href="#pages" data-toggle="collapse" {if $view=="pages" }aria-expanded="true" {/if}>
                                    <div class="svg-container">
                                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_adHub_active.svg" class="">
                                    </div>
                                    {__("Pages")}
                                </a>
                                <div class='collapse {if $view == "pages"}show{/if}' id="pages">
                                    <ul>
                                        <li {if $view=="pages" && $sub_view=="" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/pages">
                                                {__("List Pages")}
                                            </a>
                                        </li>
                                        <li {if $view=="pages" && $sub_view=="categories" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/pages/categories">
                                                {__("List Categories")}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Pages -->
                            <!-- Groups -->
                            <li {if $view=="groups" }class="active" {/if}>
                                <a href="#groups" data-toggle="collapse" {if $view=="groups" }aria-expanded="true" {/if}>
                                   <div class="svg-container">
                                        <img style="width: 22px;" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/group_icon.svg" class="">
                                    </div>
                                    {__("Groups")}
                                </a>
                                <div class='collapse {if $view == "groups"}show{/if}' id="groups">
                                    <ul>
                                        <li {if $view=="groups" && $sub_view=="" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/groups">
                                                {__("List Groups")}
                                            </a>
                                        </li>
                                        <li {if $view=="groups" && $sub_view=="categories" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/groups/categories">
                                                {__("List Categories")}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Groups -->
                            <!-- Events -->
                            <li {if $view=="events" }class="active" {/if}>
                                <a href="#events" data-toggle="collapse" {if $view=="events" }aria-expanded="true" {/if}>
                                    <div class="svg-container">
                                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/event_add_iconSidebar.svg" class="">
                                    </div>
                                    {__("Events")}
                                </a>
                                <div class='collapse {if $view == "events"}show{/if}' id="events">
                                    <ul>
                                        <li {if $view=="events" && $sub_view=="" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/events">
                                                {__("List Events")}
                                            </a>
                                        </li>
                                        <li {if $view=="events" && $sub_view=="categories" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/events/categories">
                                                {__("List Categories")}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Events -->
                            <!-- Blogs -->
                            <li {if $view=="blogs" }class="active" {/if}>
                                <a href="#blogs" data-toggle="collapse" {if $view=="blogs" }aria-expanded="true" {/if}>
                                    <div class="svg-container">
                                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/blog_hubN.svg" class="">
                                    </div>
                                    {__("Blogs")}
                                </a>
                                <div class='collapse {if $view == "blogs"}show{/if}' id="blogs">
                                    <ul>
                                        <li {if $view=="blogs" && $sub_view=="" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/blogs">
                                                {__("List Articles")}
                                            </a>
                                        </li>
                                        <li {if $view=="blogs" && $sub_view=="categories" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/blogs/categories">
                                                {__("List Categories")}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Blogs -->
                            <!-- Market -->
                            <li {if $view=="market" }class="active" {/if}>
                                <a href="#market" data-toggle="collapse" {if $view=="market" }aria-expanded="true" {/if}>
                                    <div class="svg-container">
                                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/market_hubN.svg" class="">
                                    </div>
                                    {__("Marketplace")}
                                </a>
                                <div class='collapse {if $view == "market"}show{/if}' id="market">
                                    <ul>
                                        <li {if $view=="market" && $sub_view=="categories" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/market/categories">
                                                {__("List Categories")}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Market -->
                            <!-- Forums -->
                            <li {if $view=="forums" }class="active" {/if}>
                                <a href="#forums" data-toggle="collapse" {if $view=="forums" }aria-expanded="true" {/if}>
                                    <div class="svg-container">
                                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/messages_iconN.svg" class="">
                                    </div>
                                    {__("Forums")}
                                </a>
                                <div class='collapse {if $view == "forums"}show{/if}' id="forums">
                                    <ul>
                                        <li {if $view=="forums" && $sub_view=="" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/forums">
                                                {__("List Forums")}
                                            </a>
                                        </li>
                                        <li {if $view=="forums" && $sub_view=="threads" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/forums/threads">
                                                {__("List Threads")}
                                            </a>
                                        </li>
                                        <li {if $view=="forums" && $sub_view=="replies" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/forums/replies">
                                                {__("List Replies")}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Forums -->
                            <!-- Movies -->
                            <li {if $view=="movies" }class="active" {/if}>
                                <a href="#movies" data-toggle="collapse" {if $view=="movies" }aria-expanded="true" {/if}>
                                    <div class="svg-container">
                                        <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_video_icon.svg" class="">
                                    </div>
                                    {__("Movies")}
                                </a>
                                <div class='collapse {if $view == "movies"}show{/if}' id="movies">
                                    <ul>
                                        <li {if $view=="movies" && $sub_view=="" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/movies">
                                                {__("List Movies")}
                                            </a>
                                        </li>
                                        <li {if $view=="movies" && $sub_view=="genres" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/movies/genres">
                                                {__("List Genres")}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Movies -->
                            <!-- Games -->
                            <li {if $view=="games" }class="active" {/if}>
                                <a href="{$system['system_url']}/{$control_panel['url']}/games">
                                    <div class="svg-container">
                                        <img style="width: 25px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/gameremote.svg" class="">
                                    </div>
                                    {__("Games")}
                                </a>
                            </li>
                            <!-- Games -->
                            <!-- Modules -->
                            <!-- Money -->
                            {if $user->_is_admin || $user->_is_subAdmin}
                                <!-- Ads -->
                                <li {if $view=="ads" }class="active" {/if}>
                                    <a href="#ads" data-toggle="collapse" {if $view=="ads" }aria-expanded="true" {/if}>
                                           <div class="svg-container">
                                                <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/ad_hubN.svg" class="">
                                            </div>
                                        {__("Ads")}
                                    </a>
                                    <div class='collapse {if $view == "ads"}show{/if}' id="ads">
                                        <ul>
                                            <li {if $view=="ads" && $sub_view=="" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/ads">
                                                    {__("Ads Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="ads" && $sub_view=="system_ads" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/ads/system_ads">
                                                    {__("List System Ads")}
                                                </a>
                                            </li>
                                            <li {if $view=="ads" && $sub_view=="users_ads" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/ads/users_ads">
                                                    {__("List Users Ads")}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- Ads -->
                                <!-- Wallet -->
                                <li {if $view=="wallet" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/wallet">
                                        <div class="svg-container">
                                            <img style="width: 20px;" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/walletHub.svg" class="">
                                        </div>
                                        {__("Wallet")}
                                    </a>
                                </li>
                                <!-- Wallet -->
                                <!-- Packages -->
                                <li {if $view=="packages" }class="active" {/if}>
                                    <a href="#packages" data-toggle="collapse" {if $view=="packages" }aria-expanded="true" {/if}>
                                        <div class="svg-container">
                                            <img style="width: 20px;" src="{$system['system_url']}/content/themes/default/images/svg/pro_packages.svg" class="">
                                        </div>
                                        {__("Pro Packages")}
                                    </a>
                                    <div class='collapse {if $view == "packages"}show{/if}' id="packages">
                                        <ul>
                                            <li {if $view=="packages" && $sub_view=="" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/packages">
                                                    {__("List Packages")}
                                                </a>
                                            </li>
                                            <li {if $view=="packages" && $sub_view=="subscribers" }class="active" {/if}>
                                                <a
                                                    href="{$system['system_url']}/{$control_panel['url']}/packages/subscribers">
                                                    {__("List Subscribers")}
                                                </a>
                                            </li>
                                            <li {if $view=="packages" && $sub_view=="earnings" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/packages/earnings">
                                                    {__("Earnings")}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- Packages -->
                                <!-- CoinPayments -->
                                <li {if $view=="coinpayments" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/coinpayments">
                                        <div class="svg-container">
                                            <img style="width: 20px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/Money_bag.svg" class="">
                                        </div>
                                        {__("CoinPayments")}
                                    </a>
                                </li>
                                <!-- CoinPayments -->
                                <!-- Bank Receipts -->
                                <li {if $view=="bank" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/bank">
                                        {if $bank_transfers_insights}<span
                                            class="float-right badge badge-pill badge-danger">{$bank_transfers_insights}</span>{/if}
                                        <div class="svg-container">
                                            <img style="width: 20px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/univsty.svg" class="">
                                        </div>
                                        {__("Bank Receipts")}
                                    </a>
                                </li>
                                <!-- Bank Receipts -->
                                <!-- Affiliates -->
                                <li {if $view=="affiliates" }class="active" {/if}>
                                    <a href="#affiliates" data-toggle="collapse"
                                        {if $view=="affiliates" }aria-expanded="true" {/if}>
                                        <div class="svg-container">
                                            <img style="width: 29px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/nav_icon_settings.svg" class="">
                                        </div>
                                            {__("Affiliates")}
                                    </a>
                                    <div class='collapse {if $view == "affiliates"}show{/if}' id="affiliates">
                                        <ul>
                                            <li {if $view=="affiliates" && $sub_view=="" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/affiliates">
                                                    {__("Affiliates Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="affiliates" && $sub_view=="payments" }class="active" {/if}>
                                                <a
                                                    href="{$system['system_url']}/{$control_panel['url']}/affiliates/payments">
                                                    {if $affiliates_payments_insights}<span
                                                        class="float-right badge badge-pill badge-danger">{$affiliates_payments_insights}</span>{/if}
                                                    {__("Payment Requests")}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- Affiliates -->
                                <!-- Points -->
                                <li {if $view=="points" }class="active" {/if}>
                                    <a href="#points" data-toggle="collapse" {if $view=="points" }aria-expanded="true"
                                        {/if}>
                                        <div class="svg-container">
                                            <img style="width: 23px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/Piggy.svg" class="">
                                        </div>
                                            {__("Points System")}
                                    </a>
                                    <div class='collapse {if $view == "points"}show{/if}' id="points">
                                        <ul>
                                            <li {if $view=="points" && $sub_view=="" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/points">
                                                    {__("Points Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="points" && $sub_view=="payments" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/points/payments">
                                                    {if $points_payments_insights}<span
                                                        class="float-right badge badge-pill badge-danger">{$points_payments_insights}</span>{/if}
                                                    {__("Payment Requests")}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- Points -->
                            {/if}
                            <!-- Money -->
                            <!-- Developers -->
                            {if $user->_is_admin || $user->_is_subAdmin}
                                <!-- Developers -->
                                <li {if $view=="developers" }class="active" {/if}>
                                    <a href="#developers" data-toggle="collapse"
                                        {if $view=="developers" }aria-expanded="true" {/if}>
                                        <div class="svg-container">
                                            <img style="width: 25px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/devloper.svg" class="">
                                        </div>
                                        {__("Developers")}
                                    </a>
                                    <div class='collapse {if $view == "developers"}show{/if}' id="developers">
                                        <ul>
                                            <li {if $view=="developers" && $sub_view=="" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/developers">
                                                    {__("Developers Settings")}
                                                </a>
                                            </li>
                                            <li {if $view=="developers" && $sub_view=="apps" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/developers/apps">
                                                    {__("List Apps")}
                                                </a>
                                            </li>
                                            <li {if $view=="developers" && $sub_view=="categories" }class="active" {/if}>
                                                <a
                                                    href="{$system['system_url']}/{$control_panel['url']}/developers/categories">
                                                    {__("List Categories")}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- Developers -->
                            {/if}
                            <!-- Developers -->
                            <!-- Tools -->
                            <!-- Reports -->
                            <li {if $view=="reports" }class="active" {/if}>
                                <a href="{$system['system_url']}/{$control_panel['url']}/reports">
                                    <div class="svg-container">
                                        <img style="width: 16px;" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Flag.svg" class="">
                                    </div>
                                    {__("Reports")}
                                    {if $reports_insights}
                                        <span class="float-right badge badge-pill badge-danger ml10">{$reports_insights}</span>
                                    {/if}
                                </a>
                            </li>
                            <!-- Reports -->
                            {if $user->_is_admin || $user->_is_subAdmin}
                                <!-- Blacklist -->
                                <li {if $view=="blacklist" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/blacklist">
                                        <i class="fa fa-minus-circle fa-fw mr10" style="color: #03A9F4"></i>{__("Blacklist")}
                                    </a>
                                </li>
                                <!-- Blacklist -->
                            {/if}
                            <!-- Verification -->
                            <li {if $view=="verification" }class="active" {/if}>
                                <a href="#verification" data-toggle="collapse" {if $view=="verification" }aria-expanded="true" {/if}>
                                    <div class="svg-container">
                                        <img style="width: 20px;" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/tick.svg" class="">
                                    </div>
                                    {__("Verification")}
                                    {if $verification_requests_insights}
                                    <span class="float-right badge badge-pill badge-danger ml10">{$verification_requests_insights}</span>{/if}
                                </a>
                                <div class='collapse {if $view == "verification"}show{/if}' id="verification">
                                    <ul>
                                        <li {if $view=="verification" && $sub_view=="" }class="active" {/if}>
                                            <a href="{$system['system_url']}/{$control_panel['url']}/verification">
                                                {__("List Requests")}
                                            </a>
                                        </li>
                                        <li {if $view=="verification" && $sub_view=="users" }class="active" {/if}>
                                            <a
                                                href="{$system['system_url']}/{$control_panel['url']}/verification/users">
                                                {__("List Verified Users")}
                                            </a>
                                        </li>
                                        <li {if $view=="verification" && $sub_view=="pages" }class="active" {/if}>
                                            <a
                                                href="{$system['system_url']}/{$control_panel['url']}/verification/pages">
                                                {__("List Verified Pages")}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Verification -->
                            {if $user->_is_admin || $user->_is_subAdmin}
                                <!-- Tools -->
                                <li {if $view=="tools" }class="active" {/if}>
                                    <a href="#tools" data-toggle="collapse" {if $view=="tools" }aria-expanded="true" {/if}>
                                        <div class="svg-container">
                                            <img style="width: 19px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/tools.svg" class="">
                                        </div>
                                        {__("Tools")}
                                    </a>
                                    <div class='collapse {if $view == "tools"}show{/if}' id="tools">
                                        <ul>
                                            <li {if $view=="tools" && $sub_view=="faker" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/tools/faker">
                                                    {__("Fake Users Generator")}
                                                </a>
                                            </li>
                                            <li {if $view=="tools" && $sub_view=="auto-connect" }class="active" {/if}>
                                                <a
                                                    href="{$system['system_url']}/{$control_panel['url']}/tools/auto-connect">
                                                    {__("Auto Connect")}
                                                </a>
                                            </li>
                                            <li {if $view=="tools" && $sub_view=="garbage-collector" }class="active" {/if}>
                                                <a
                                                    href="{$system['system_url']}/{$control_panel['url']}/tools/garbage-collector">
                                                    {__("Garbage Collector")}
                                                </a>
                                            </li>
                                            <li {if $view=="tools" && $sub_view=="backups" }class="active" {/if}>
                                                <a href="{$system['system_url']}/{$control_panel['url']}/tools/backups">
                                                    {__("Backup Database & Files")}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- Tools -->
                            {/if}
                            <!-- Tools -->
                            <!-- Customization -->
                            {if $user->_is_admin || $user->_is_subAdmin}
                                <!-- Custom Fields -->
                                <li {if $view=="custom_fields" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/custom_fields">
                                        <i class="fa fa-bars fa-fw mr10" style="color: #FF5722"></i>{__("Custom Fields")}
                                    </a>
                                </li>
                                <!-- Custom Fields -->
                                <!-- Static Pages -->
                                <li {if $view=="static" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/static">
                                        <div class="svg-container">
                                            <img style="width: 17px;" src="{$system['system_url']}/content/themes/default/images/svg/admin/staticPage.svg" class="">
                                        </div>
                                        {__("Static Pages")}
                                    </a>
                                </li>
                                <!-- Static Pages -->
                                <!-- Colored Posts -->
                                <li {if $view=="colored_posts" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/colored_posts">
                                        <div class="svg-container">
                                            <img style="width: 25px;" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostProductsHover.svg" class="">
                                        </div>
                                        {__("Colored Posts")}
                                    </a>
                                </li>
                                <!-- Colored Posts -->
                                <!-- Widgets -->
                                <li {if $view=="widgets" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/widgets">
                                        <i class="fa fa-puzzle-piece fa-fw mr10" style="color: #FF5722"></i>{__("Widgets")}
                                    </a>
                                </li>
                                <!-- Widgets -->
                                <!-- Emojis -->
                                <li {if $view=="emojis" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/emojis">
                                        <div class="svg-container">
                                            <img style="width: 22px;" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/feelingsHover.svg" class="">
                                        </div>
                                        {__("Emojis")}
                                    </a>
                                </li>
                                <!-- Emojis -->
                                <!-- Stickers -->
                                <li {if $view=="stickers" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/stickers">
                                        <i class="fa fa-hand-peace fa-fw mr10" style="color: #FF5722"></i>{__("Stickers")}
                                    </a>
                                </li>
                                <!-- Stickers -->
                                <!-- Gifts -->
                                <li {if $view=="gifts" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/gifts">
                                        <i class="fa fa-gift fa-fw mr10" style="color: #FF5722"></i>{__("Gifts")}
                                    </a>
                                </li>
                                <!-- Gifts -->
                            {/if}
                            <!-- Customization -->
                            <!-- Reach -->
                            {if $user->_is_admin || $user->_is_subAdmin}
                                <!-- Announcements -->
                                <li {if $view=="announcements" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/announcements">
                                        <i class="fa fa-bullhorn fa-fw mr10"
                                            style="color: #009688"></i>{__("Announcements")}
                                    </a>
                                </li>
                                <!-- Announcements -->
                                <!-- Notifications -->
                                <li {if $view=="notifications" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/notifications">
                                        <div class="svg-container">
                                            <img style="width: 30px;" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/notifications_icon_hover.svg" class="">
                                        </div>
                                        {__("Mass Notifications")}
                                    </a>
                                </li>
                                <!-- Notifications -->
                                <!-- Newsletter -->
                                <li {if $view=="newsletter" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/newsletter">
                                        <i class="fa fa-paper-plane fa-fw mr10"
                                            style="color: #009688"></i>{__("Newsletter")}
                                    </a>
                                </li>
                                <!-- Newsletter -->
                            {/if}
                            <!-- Reach -->
                            <!-- Stratus -->
                            {if $user->_is_admin || $user->_is_subAdmin}
                                <!-- Changelog -->
                                <li {if $view=="changelog" }class="active" {/if}>
                                    <a href="{$system['system_url']}/{$control_panel['url']}/changelog">
                                        <i class="fa fa-stopwatch fa-fw mr10" style="color: #795548"></i>{__("Changelog")}
                                    </a>
                                </li>
                                <!-- Changelog -->
                                <!-- Build -->
                                <li>
                                    <div class="static">
                                        <i class="fa fa-copyright fa-fw mr10" style="color: #795548"></i>{__("Build")}
                                        v{$system['system_version']}
                                    </div>
                                </li>
                                <!-- Build -->
                                 {/if}
                            </ul>
                        </div>
                    </div>
               
                <!-- Stratus -->
            </div>
        </div>
        <!-- left panel -->
        <!-- right panel -->
        <div class="col-md-12 col-lg-9 offcanvas-mainbar fixadmin">
            {include file="admin.$view.tpl"}
        </div>
        <!-- right panel -->
    </div>
</div>
<!-- page content -->
{include file='_footer.tpl'}