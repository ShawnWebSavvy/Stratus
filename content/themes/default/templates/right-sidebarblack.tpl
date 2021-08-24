<div
    class="right-sidebar-inner-ant usersectionHeaderMobile blacksidebarclassadd hiddBar rightBlackSidebar custom-scrollbar">
    <!-- <div class="rightSideBarScroll"> -->
    <div class="rightUserDetails">
        <div class="headingModal bg-transparent">Settings</div>
        <div class="with-list sectionBody">
            {assign var="last_dir" value="/"|explode:$smarty.server.REQUEST_URI}
            {assign var="last_key" value=$last_dir|count}
            {assign var="first_var" value=$last_dir[$last_key-1]}
            {assign var="final_dir" value=$last_dir[$last_key-2]}
            <ul>
                <li {if $page=='global-profile' || $page=='profile' }class="active" {/if}>
                    {if $page=='global-profile/global-profile-timeline' || $page=='settings/profile/global' ||
                    $page=='global-profile/global-profile' ||
                    $page== 'global-profile/global-profile-photo' || $page=='global-profile/global-profile-photo' ||
                    $page=='messages_global'}
                    <a href="{$system['system_url']}/global-profile.php?username={$user->_data['user_name']}"
                        class="rightuser-menu usernameOnHoverbtn">
                        <div class="settingsIcons">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/footer-icon/User.svg"
                                class="whiteicon" />
                            <img src="{$system['system_url']}/content/themes/default/images/svg/footer-icon/User2.svg"
                                class="blackicon" />
                        </div>
                        My Account
                    </a>
                    {elseif $first_var =='global' && $final_dir =='profile' }
                    <a href="{$system['system_url']}/global-profile.php?username={$user->_data['user_name']}"
                        class="rightuser-menu usernameOnHoverbtn">
                        <div class="settingsIcons">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/footer-icon/User.svg"
                                class="whiteicon" />
                            <img src="{$system['system_url']}/content/themes/default/images/svg/footer-icon/User2.svg"
                                class="blackicon" />
                        </div>
                        My Account
                    </a>
                    {else if $smarty.server.REQUEST_URI|strstr:'global-profile'}
                    <a href="{$system['system_url']}/global-profile.php?username={$user->_data['user_name']}"
                        class="rightuser-menu usernameOnHoverbtn">
                        <div class="settingsIcons">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/footer-icon/User.svg"
                                class="whiteicon" />
                            <img src="{$system['system_url']}/content/themes/default/images/svg/footer-icon/User2.svg"
                                class="blackicon" />
                        </div>
                        My Account
                    </a>
                    {else}
                    <a href="{if ($page!='global-profile/landingpage')}{$system['system_url']}/{$user->_data['user_name']}{else}#{/if}"
                        page='{$page}' class="rightuser-menu usernameOnHoverbtn">
                        <div class="settingsIcons">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/footer-icon/User.svg"
                                class="whiteicon" />
                            <img src="{$system['system_url']}/content/themes/default/images/svg/footer-icon/User2.svg"
                                class="blackicon" />
                        </div>
                        My Account
                    </a>
                    {/if}
                </li>
                <li {if $page=='notifications' }class="active" {/if}>
                    <a href="{$system['system_url']}/notifications?parm=nf">
                        <div class="settingsIcons">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/notifications-icon.svg"
                                class="whiteicon" />
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/notifications_icon_hover.svg"
                                class="blackicon" />
                        </div>
                        Notifications
                    </a>
                </li>
                <li {if $page=='wallet' }class="active" {/if}>
                    <a href="{$system['system_url']}/wallet">
                        <div class="settingsIcons">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Wallet_icon_header.svg"
                                class="whiteicon" />
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Wallet_icon_header_active.svg"
                                class="blackicon" />
                        </div>
                        Billing and Payment
                    </a>
                </li>
                <li {if $page=='settings' }class="active" {/if}>
                    <a href="{$system['system_url']}/settings/privacy">
                        <div class="settingsIcons">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/lock_iconb.svg"
                                class="whiteicon" />
                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/lock_iconb_hover.svg"
                                class="blackicon" />
                        </div>
                        Security & Privacy
                    </a>
                </li>
                <!-- <li {if $page=='settings' }class="active" {/if}>
                    <a href="{$system['system_url']}/settings/information">
                        <div class="settingsIcons">
                            <img src="{$system['system_url']}/content/themes/default/images/svg/help.svg"
                                style="width: 25px;height: 25px;" class="whiteicon" />
                            <img src="{$system['system_url']}/content/themes/default/images/svg/helpBlue.svg"
                                style="width: 25px;height: 25px;" class="blackicon" />
                        </div>
                        Help
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</div>