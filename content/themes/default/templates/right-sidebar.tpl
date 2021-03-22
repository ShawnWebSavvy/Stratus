<div class="right-sidebar-inner-ant usersectionHeaderMobile nonBlackSidebarShowHidd  custom-scrollbar {$view}">
    <div class="chat-conversations js_scroller rightSideBarScroll" data-slimScroll-height="90vh">

        <div class="explorerSidebarWrap">
            {include file='_explore_sidebar.tpl'}
        </div>

        <!-- settingBar -->
        <div class="col-12 left-offcanvas-sidebar-inner settingleftWrap leftSettingHiddClose">
            <div class="card">
                <div class="card-body with-nav">
                    <ul class="side-nav">
                        {if $view == "profile"}
                        {if $sub_view == "global"}
                        <li {if $view=="profile" }class="active" {/if}>
                            <a href="#info-settings" data-toggle="collapse" {if $view=="profile" }aria-expanded="true"
                                {/if}>
                                <i class="fa fa-user fa-fw mr10" style="color: #2b53a4;"></i>{__("Edit Profile")}
                            </a>
                            <div class='collapse {if $view == "profile"}show{/if}' id="info-settings">
                                <ul>
                                    <li {if $view=="profile" && $sub_view=="global" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/profile/global">
                                            {__("Basic")}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {/if}
                        {/if}

                        {if $sub_view != "global"}
                        <li {if $view=="" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings">
                                <i class="icon icon-accountSetting"></i>{__("Account Settings")}
                            </a>
                        </li>
                        <li {if $view=="profile" }class="active" {/if}>
                            <a href="#info-settings" data-toggle="collapse" {if $view=="profile" }aria-expanded="true"
                                {/if}>
                                <i class="icon icon-editProfile"></i>{__("Edit Profile")}
                            </a>
                            <div class='collapse {if $view == "profile"}show{/if}' id="info-settings">
                                <ul>
                                    <li {if $view=="profile" && $sub_view=="" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/profile">
                                            {__("Basic")}
                                        </a>
                                    </li>
                                    <li {if $view=="profile" && $sub_view=="work" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/profile/work">
                                            {__("Work")}
                                        </a>
                                    </li>
                                    <li {if $view=="profile" && $sub_view=="location" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/profile/location">
                                            {__("Location")}
                                        </a>
                                    </li>
                                    <li {if $view=="profile" && $sub_view=="education" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/profile/education">
                                            {__("Education")}
                                        </a>
                                    </li>
                                    {if $custom_fields['other']}
                                    <li {if $view=="profile" && $sub_view=="other" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/profile/other">
                                            {__("Other")}
                                        </a>
                                    </li>
                                    {/if}
                                    <li {if $view=="profile" && $sub_view=="social" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/profile/social">
                                            {__("Social Links")}
                                        </a>
                                    </li>
                                    {if $system['system_profile_background_enabled']}
                                    <li {if $view=="profile" && $sub_view=="design" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/profile/design">
                                            {__("Design")}
                                        </a>
                                    </li>
                                    {/if}
                                </ul>
                            </div>
                        </li>
                        <li {if $view=="security" }class="active" {/if}>
                            <a href="#security-settings" data-toggle="collapse" {if $view=="security"
                                }aria-expanded="true" {/if}>
                                <i class="icon icon-securitySetting"></i>{__("Security
                                Settings")}
                            </a>
                            <div class='collapse {if $view == "security"}show{/if}' id="security-settings">
                                <ul>
                                    <li {if $view=="security" && $sub_view=="password" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/security/password">
                                            {__("Password")}
                                        </a>
                                    </li>
                                    <li {if $view=="security" && $sub_view=="sessions" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/security/sessions">
                                            {__("Manage Sessions")}
                                        </a>
                                    </li>
                                    {if $system['two_factor_enabled']}
                                    <li {if $view=="security" && $sub_view=="two-factor" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/security/two-factor">
                                            {__("Two-Factor Authentication")}
                                        </a>
                                    </li>
                                    {/if}
                                </ul>
                            </div>
                        </li>
                        <li {if $view=="privacy" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings/privacy">
                                <i class="icon icon-privacy"></i>{__("Privacy")}
                            </a>
                        </li>
                        <li {if $view=="notifications" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings/notifications">
                                <i class="icon icon-notifications"></i>{__("Notifications")}
                            </a>
                        </li>
                        {if $system['social_login_enabled']}
                        {if $system['facebook_login_enabled'] || $system['google_login_enabled'] ||
                        $system['twitter_login_enabled'] || $system['instagram_login_enabled'] ||
                        $system['linkedin_login_enabled'] || $system['vkontakte_login_enabled']}
                        <li {if $view=="linked" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings/linked">
                                <i class="icon icon-linkedAccounts"></i>{__("Linked
                                Accounts")}
                            </a>
                        </li>
                        {/if}
                        {/if}
                        {if $system['packages_enabled']}
                        <li {if $view=="membership" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings/membership">
                                <i class="icon icon-membership"></i>{__("Membership")}
                            </a>
                        </li>
                        {/if}
                        {if $system['affiliates_enabled']}
                        <li {if $view=="affiliates" }class="active" {/if}>
                            <a href="#affiliates-settings" data-toggle="collapse" {if $view=="affiliates"
                                }aria-expanded="true" {/if}>
                                <i class="icon icon-affiliates"></i>{__("Affiliates")}
                            </a>
                            <div class='collapse {if $view == "affiliates"}show{/if}' id="affiliates-settings">
                                <ul>
                                    <li {if $view=="affiliates" && $sub_view=="" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/affiliates">
                                            {__("My Affiliates")}
                                        </a>
                                    </li>
                                    {if $system['affiliates_money_withdraw_enabled']}
                                    <li {if $view=="affiliates" && $sub_view=="payments" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/affiliates/payments">
                                            {__("Payments")}
                                        </a>
                                    </li>
                                    {/if}
                                </ul>
                            </div>
                        </li>
                        {/if}
                        {if $system['points_enabled']}
                        <li {if $view=="points" }class="active" {/if}>
                            <a href="#points-settings" data-toggle="collapse" {if $view=="points" }aria-expanded="true"
                                {/if}>
                                <i class="icon icon-points"></i>{__("Points")}
                            </a>
                            <div class='collapse {if $view == "points"}show{/if}' id="points-settings">
                                <ul>
                                    <li {if $view=="points" && $sub_view=="" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/points">
                                            {__("My Points")}
                                        </a>
                                    </li>
                                    {if $system['points_money_withdraw_enabled']}
                                    <li {if $view=="points" && $sub_view=="payments" }class="active" {/if}>
                                        <a href="{$system['system_url']}/settings/points/payments">
                                            {__("Payments")}
                                        </a>
                                    </li>
                                    {/if}
                                </ul>
                            </div>
                        </li>
                        {/if}
                        {if $system['coinpayments_enabled']}
                        <li {if $view=="coinpayments" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings/coinpayments">
                                <i class="icon icon-coinPayments"></i>{__("CoinPayments")}
                            </a>
                        </li>
                        {/if}
                        {if $system['bank_transfers_enabled']}
                        <li {if $view=="bank" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings/bank">
                                <i class="icon icon-BankTransfers"></i>{__("Bank
                                Transfers")}
                            </a>
                        </li>
                        {/if}
                        {if $system['verification_requests']}
                        <li {if $view=="verification" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings/verification">
                                <i class="icon icon-Verification"></i>{__("Verification")}
                            </a>
                        </li>
                        {/if}
                        <li {if $view=="blocking" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings/blocking">
                                <i class="icon icon-Blocking"></i>{__("Blocking")}
                            </a>
                        </li>
                        {if $system['download_info_enabled']}
                        <li {if $view=="information" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings/information">
                                <i class="icon icon-YourInformation"></i>{__("Your
                                Information")}
                            </a>
                        </li>
                        {/if}
                        {if $system['developers_apps_enabled']}
                        <li {if $view=="apps" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings/apps">
                                <i class="icon icon-Apps"></i>{__("Apps")}
                            </a>
                        </li>
                        {/if}
                        {if $system['delete_accounts_enabled']}
                        <li {if $view=="delete" }class="active" {/if}>
                            <a href="{$system['system_url']}/settings/delete">
                                <i class="icon icon-deleteAccount"></i>{__("Delete Account")}
                            </a>
                        </li>
                        {/if}
                        {/if}
                    </ul>
                </div>
            </div>
        </div>

        <!-- settingBar -->

        <!-- pro users -->
        {if $pro_members}
        <div class="card hashtagChange border-0">
            <div class="card-header bg-transparent border-bottom-0">
                {if $system['packages_enabled'] && !$user->_data['user_subscribed']}
                <div class="float-right">
                    <a class="text-white text-underline see_btn"
                        href="{$system['system_url']}/packages">{__("Upgrade")}</a>
                </div>
                {/if}
                <img width="30px" height="30px"
                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Featured.svg" /> {__("Pro
                Users")}
            </div>
            <div class="card-body pt0">
                <div class="pro-box-wrapper {if count($pro_members) > 3}js_slick{else}full-opacity{/if}">
                    {foreach $pro_members as $_member}
                    <a class="user-box text-white" href="{$system['system_url']}/{$_member['user_name']}">
                        <img alt="{$_member['user_firstname']} {$_member['user_lastname']}"
                            src="{$_member['user_picture']}" />
                        <div class="name" title="{$_member['user_firstname']} {$_member['user_lastname']}">
                            {$_member['user_firstname']} {$_member['user_lastname']}
                        </div>
                    </a>
                    {/foreach}
                </div>
            </div>
        </div>
        {/if}
        <!-- pro users -->

        <!-- pro pages -->
        {if $promoted_pages}
        <div class="card bg-gradient-teal border-0">
            <div class="card-header ptb20 bg-transparent border-bottom-0">
                {if $system['packages_enabled'] && !$user->_data['user_subscribed']}
                <div class="float-right">
                    <a class="text-white text-underline see_btn"
                        href="{$system['system_url']}/packages">{__("Upgrade")}</a>
                </div>
                {/if}
                <h6 class="pb0"><i class="fa fa-flag-checkered mr5"></i> {__("Pro Pages")}</h6>
            </div>
            <div class="card-body pt0 plr5">
                <div class="pro-box-wrapper {if count($promoted_pages) > 3}js_slick{else}full-opacity{/if}">
                    {foreach $promoted_pages as $_page}
                    <a class="user-box text-white" href="{$system['system_url']}/pages/{$_page['page_name']}">
                        <img alt="{$_page['page_title']}" src="{$_page['page_picture']}" />
                        <div class="name" title="{$_page['page_title']}">
                            {$_page['page_title']}
                        </div>
                    </a>
                    {/foreach}
                </div>
            </div>
        </div>
        {/if}
        <!-- pro pages -->
        {if $page==='blogs' || $view==='articles'}
        {include file='blog-right-sibebar.tpl'}
        {else}
        <!-- trending -->
        {if $trending_hashtags}
        <div class="card hashtagChange border-0 {$subactive_page}">
            <div class="card-header bg-transparent">
                <img width="30px" height="30px"
                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Featured.svg" /> Trending
                Hashtags
            </div>
            <div class="card-body pt0">
                {foreach $trending_hashtags as $hashtag}
                {if $hashtag['postHubType'] !='GlobalHub'}
                <a class="trending-item" href="{$system['system_url']}/search/hashtag/{$hashtag['hashtag']}">
                    {else}
                    <a class="trending-item"
                        href="{$system['system_url']}/globalhub-search/hashtag/{$hashtag['hashtag']}">
                        {/if}
                        <span class="hash">
                            #{$hashtag['hashtag']}
                        </span>
                        <!-- <span class="frequency">
                                {$hashtag['frequency']} {__("Posts")}
                            </span> -->
                    </a>
                    {/foreach}
            </div>
        </div>
        {/if}
        <!-- trending -->

        {* {include file='_ads_campaigns.tpl'}
        {include file='_ads.tpl'}
        {include file='_widget.tpl'}
        *}
        <!-- friend suggestions -->
        {if $new_people}
        <div class="card {$active_page}">
            <div class="card-header bg-transparent">
                <div class="float-right">
                    {if $active_page == "GlobalHub"}
                    <a class="see_btn" href="{$system['system_url']}/people-global">{__("See All")}</a>
                    {else}
                    <a class="see_btn" href="{$system['system_url']}/people">{__("See All")}</a>
                    {/if}
                </div>
                {__("{if $active_page == "GlobalHub"}Follow{else}Friend{/if} Suggestions")}
            </div>
            <div class="card-body with-list">
                <ul>
                    {foreach $new_people as $_user}
                    {if $_user['user_firstname'] !="" && $_user['user_lastname'] !=""}
                    {if $active_page =="GlobalHub"}
                    {include file='global-profile/global-profile__feeds_user.tpl' _tpl="list" _connection="follow"
                    _small=true}
                    {else}
                    {include file='__feeds_user.tpl' _tpl="list" _connection="add" _small=true}
                    {/if}
                    {/if}
                    {/foreach}
                </ul>
            </div>
        </div>
        {/if}
        <!-- friend suggestions -->
        {if $active_page != "GlobalHub" }
        <!-- suggested pages -->
        {if $new_pages}
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="float-right">
                    <a class="see_btn" href="{$system['system_url']}/pages">{__("See All")}</a>
                </div>
                {__("Suggested Pages")}
            </div>
            <div class="card-body with-list">
                <ul>
                    {foreach $new_pages as $_page}
                    {include file='__feeds_page.tpl' _tpl="list"}
                    {/foreach}
                </ul>
            </div>
        </div>
        {/if}
        <!-- suggested pages -->

        <!-- suggested groups -->
        {if $new_groups}
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="float-right">
                    <a class="see_btn" href="{$system['system_url']}/groups">{__("See All")}</a>
                </div>
                {__("Suggested Groups")}
            </div>
            <div class="card-body with-list">
                <ul>
                    {foreach $new_groups as $_group}
                    {include file='__feeds_group.tpl' _tpl="list"}
                    {/foreach}
                </ul>
            </div>
        </div>
        {/if}
        <!-- suggested groups -->

        <!-- suggested events -->
        {if $new_events}
        <div class="card">
            <div class="card-header bg-transparent">
                <div class="float-right">
                    <a class="see_btn" href="{$system['system_url']}/events">{__("See All")}</a>
                </div>
                {__("Suggested Events")}
            </div>
            <div class="card-body with-list">
                <ul>
                    {foreach $new_events as $_event}
                    {include file='__feeds_event.tpl' _tpl="list" _small=true}
                    {/foreach}
                </ul>
            </div>
        </div>
        {/if}
        <!-- suggested events -->
        {/if}
        {/if}

        <!-- mini footer -->
        <div class="mini-footer plr10">
            <div class="copyrights">
                &copy; {'Y'|date} {$system['system_title']} <span class="text-link" data-toggle="modal"
                    data-url="#translator"><i
                        class="fas fa-globe-americas mr5"></i>{$system['language']['title']}</span>
            </div>
            <ul class="links">
                {if $static_pages}
                {foreach $static_pages as $static_page}
                <li>
                    <a href="{$system['system_url']}/static/{$static_page['page_url']}">
                        {$static_page['page_title']}
                    </a>
                </li>
                {/foreach}
                {/if}
                {if $system['contact_enabled']}
                <li>
                    <a href="{$system['system_url']}/contacts">
                        {__("Contact Us")}
                    </a>
                </li>

                {/if}
                {if $system['directory_enabled']}
                <li>
                    <a href="{$system['system_url']}/directory">
                        {__("Directory")}
                    </a>
                </li>
                {/if}
            </ul>
        </div>
        <!-- mini footer -->

    </div>
</div>