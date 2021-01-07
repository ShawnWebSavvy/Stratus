{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="container mt20 offcanvas">
    <div class="row">
        <div class="col-md-4 col-lg-3  offcanvas-sidebar sidebar-left-ant">
            {include file='_sidebar.tpl'}
        </div>
    </div>

    <div class="row right-side-content-ant">
        {if $view == "profile"}
        {if $sub_view == "global"}
        <!-- right panel -->
        <div class="col-lg-12 offcanvas-mainbar">
            <div class="row">
                <div class="home-page-middel-block">
                    <div class="card">
                        <div class="card-header with-icon">{__("Basic")}
                            <div class="float-right">
                                <a href="{$system['system_url']}/global-profile.php?username={$user->_data['user_name']}"
                                    class="btn btn-sm viewProfileButton">
                                    <img width="30px" height="30px"
                                        src="{$system['system_upload_assets']}/content/themes/default/images/svg/svgImg/eye-icon.svg" />
                                    <span class="ml5 d-none d-lg-inline-block">{__("View Profile")}</span>
                                </a>
                            </div>
                        </div>
                        <form class="js_ajax-forms setting-basic-form " data-url="users/settings.php?edit=basicglobal">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("First Name")}</label>
                                        <input type="text" maxlength="20" class="form-control" name="firstname"
                                            value="{$userGlobal->_data1['user_firstname']}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Last Name")}</label>
                                        <input type="text" maxlength="20" class="form-control" name="lastname"
                                            value="{$userGlobal->_data1['user_lastname']}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("I am")}</label>
                                        <select name="gender" class="form-control">
                                            <option value="none">{__("Select Sex")}</option>
                                            <option {if $userGlobal->_data1['user_gender'] == "male"}selected{/if}
                                                value="male">{__("Male")}</option>
                                            <option {if $userGlobal->_data1['user_gender'] == "female"}selected{/if}
                                                value="female">{__("Female")}</option>
                                            <option {if $userGlobal->_data1['user_gender'] == "other"}selected{/if}
                                                value="other">{__("Other")}</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Relationship Status")}</label>
                                        <select name="relationship" class="form-control">
                                            <option value="none">{__("Select Relationship")}</option>
                                            <option {if $userGlobal->_data1['user_relationship'] ==
                                                "single"}selected{/if}
                                                value="single">{__("Single")}</option>
                                            <option {if $userGlobal->_data1['user_relationship'] ==
                                                "relationship"}selected{/if}
                                                value="relationship">{__("In a relationship")}</option>
                                            <option {if $userGlobal->_data1['user_relationship'] ==
                                                "married"}selected{/if}
                                                value="married">{__("Married")}</option>
                                            <option {if $userGlobal->_data1['user_relationship'] ==
                                                "complicated"}selected{/if}
                                                value="complicated">{__("It's complicated")}</option>
                                            <option {if $userGlobal->_data1['user_relationship'] ==
                                                "separated"}selected{/if}
                                                value="separated">{__("Separated")}</option>
                                            <option {if $userGlobal->_data1['user_relationship'] ==
                                                "divorced"}selected{/if}
                                                value="divorced">{__("Divorced")}</option>
                                            <option {if $userGlobal->_data1['user_relationship'] ==
                                                "widowed"}selected{/if}
                                                value="widowed">{__("Widowed")}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Country")}</label>
                                        <select name="country" class="form-control">
                                            <option value="none">{__("Select Country")}</option>
                                            {foreach $countries as $country}
                                            <option {if $userGlobal->_data1['user_country'] ==
                                                $country['country_id']}selected{/if}
                                                value="{$country['country_id']}">{$country['country_name']}</option>
                                            {/foreach}
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Website")}</label>
                                        <input type="text" class="form-control" name="website"
                                            value="{$userGlobal->_data1['user_website']}">
                                        <span class="form-text">
                                            {__("Website link must start with http:// or https://")}
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">{__("Birthdate")}</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <select class=" afasf form-control" name="birth_month">
                                                <option value="none">{__("Select Month")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '1'}selected{/if} value="1">{__("Jan")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '2'}selected{/if} value="2">{__("Feb")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '3'}selected{/if} value="3">{__("Mar")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '4'}selected{/if} value="4">{__("Apr")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '5'}selected{/if} value="5">{__("May")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '6'}selected{/if} value="6">{__("Jun")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '7'}selected{/if} value="7">{__("Jul")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '8'}selected{/if} value="8">{__("Aug")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '9'}selected{/if} value="9">{__("Sep")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '10'}selected{/if} value="10">{__("Oct")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '11'}selected{/if} value="11">{__("Nov")}</option>
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['month'] ==
                                                    '12'}selected{/if} value="12">{__("Dec")}</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="birth_day">
                                                <option value="none">{__("Select Day")}</option>
                                                {for $i=1 to 31}
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['day'] ==
                                                    $i}selected{/if}
                                                    value="{$i}">{$i}</option>
                                                {/for}
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="birth_year">
                                                <option value="none">{__("Select Year")}</option>
                                                {for $i=1905 to 2015}
                                                <option {if $userGlobal->_data['user_birthdate_parsed']['year'] ==
                                                    $i}selected{/if}
                                                    value="{$i}">{$i}</option>
                                                {/for}
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">{__("About Me")}</label>
                                    <textarea class="form-control"
                                        name="biography">{$userGlobal->_data1['user_biography']}</textarea>
                                </div>

                                <!-- custom fields -->
                                {if $custom_fields['basic']}
                                {include file='__custom_fields.tpl' _custom_fields=$custom_fields['basic']
                                _registration=false}
                                {/if}
                                <!-- custom fields -->

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- right panel -->
                <div class="right-sidebar js_sticky-sidebar">
                    {include file='right-sidebar.tpl'}
                </div>
                <!-- right panel -->
            </div>
        </div>
        <!--right panel for global end-->
        {/if}
        {/if}

        <!-- right panel -->
        {if $sub_view != "global"}
        <div class="col-lg-12 offcanvas-mainbar">
            <div class="row">
                <div class="home-page-middel-block">
                    <div class="right_side_bar_settings settingNavHidd">
                        <div class="left-offcanvas-sidebar-inner settingleftWrap">
                            <div class="card">
                                <div class="card-body with-nav custom_antier_class" id="setting-visibility">
                                    <ul class="side-nav">
                                        {if $view == "profile"}
                                        {if $sub_view == "global"}
                                        <li {if $view=="profile" }class="active" {/if}>
                                            <a href="#info-settings" data-toggle="collapse" {if $view=="profile"
                                                }aria-expanded="true" {/if}>
                                                <i class="fa fa-user fa-fw mr10" style="color: #2b53a4;"></i>{__("Edit
                                                Profile")}
                                            </a>
                                            <div class='collapse {if $view == "profile"}show{/if}' id="info-settings">
                                                <ul>
                                                    <li {if $view=="profile" && $sub_view=="global" }class="active"
                                                        {/if}>
                                                        <a href="{$system['system_url']}/settings/profile">
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
                                            <a href="{$system['system_url']}/settings"><i
                                                    class="icon icon-accountSetting"></i> {__("Account Settings")}</a>
                                        </li>
                                        <li {if $view=="profile" }class="active" {/if}>
                                            <a href="#info-settings" data-toggle="collapse" {if $view=="profile"
                                                }aria-expanded="true" {/if}>
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
                                                    <li {if $view=="profile" && $sub_view=="location" }class="active"
                                                        {/if}>
                                                        <a href="{$system['system_url']}/settings/profile/location">
                                                            {__("Location")}
                                                        </a>
                                                    </li>
                                                    <li {if $view=="profile" && $sub_view=="education" }class="active"
                                                        {/if}>
                                                        <a href="{$system['system_url']}/settings/profile/education">
                                                            {__("Education")}
                                                        </a>
                                                    </li>
                                                    {if $custom_fields['other']}
                                                    <li {if $view=="profile" && $sub_view=="other" }class="active"
                                                        {/if}>
                                                        <a href="{$system['system_url']}/settings/profile/other">
                                                            {__("Other")}
                                                        </a>
                                                    </li>
                                                    {/if}
                                                    <li {if $view=="profile" && $sub_view=="social" }class="active"
                                                        {/if}>
                                                        <a href="{$system['system_url']}/settings/profile/social">
                                                            {__("Social Links")}
                                                        </a>
                                                    </li>
                                                    {if $system['system_profile_background_enabled']}
                                                    <li {if $view=="profile" && $sub_view=="design" }class="active"
                                                        {/if}>
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
                                            <div class='collapse {if $view == "security"}show{/if}'
                                                id="security-settings">
                                                <ul>
                                                    <li {if $view=="security" && $sub_view=="password" }class="active"
                                                        {/if}>
                                                        <a href="{$system['system_url']}/settings/security/password">
                                                            {__("Password")}
                                                        </a>
                                                    </li>
                                                    <li {if $view=="security" && $sub_view=="sessions" }class="active"
                                                        {/if}>
                                                        <a href="{$system['system_url']}/settings/security/sessions">
                                                            {__("Manage Sessions")}
                                                        </a>
                                                    </li>
                                                    {if $system['two_factor_enabled']}
                                                    <li {if $view=="security" && $sub_view=="two-factor" }class="active"
                                                        {/if}>
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
                                            <a href="#affiliates-settings" data-toggle="collapse" {if
                                                $view=="affiliates" }aria-expanded="true" {/if}>
                                                <i class="icon icon-affiliates"></i>{__("Affiliates")}
                                            </a>
                                            <div class='collapse {if $view == "affiliates"}show{/if}'
                                                id="affiliates-settings">
                                                <ul>
                                                    <li {if $view=="affiliates" && $sub_view=="" }class="active" {/if}>
                                                        <a href="{$system['system_url']}/settings/affiliates">
                                                            {__("My Affiliates")}
                                                        </a>
                                                    </li>
                                                    {if $system['affiliates_money_withdraw_enabled']}
                                                    <li {if $view=="affiliates" && $sub_view=="payments" }class="active"
                                                        {/if}>
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
                                            <a href="#points-settings" data-toggle="collapse" {if $view=="points"
                                                }aria-expanded="true" {/if}>
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
                                                    <li {if $view=="points" && $sub_view=="payments" }class="active"
                                                        {/if}>
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
                    </div>
                    <div class="card setingHeadingSize settingDetailBlock">

                        {if $view == ""}
                        <div class="card">
                            <div class="card-header with-icon">{__("Account Settings")}</div>
                            <form class="js_ajax-forms social-link-form" data-url="users/settings.php?edit=account">
                                <div class="card-body">
                                    <!-- <div class="heading-small mb20">
                                    {__("Email Address")}
                                </div> -->
                                    {if !$user->_data['user_email_verified']}
                                    <div class="alert alert-danger">
                                        <div class="icon">
                                            <i class="fa fa-exclamation-circle fa-2x"></i>
                                        </div>
                                        <div class="text">
                                            <strong>{__("Email Verification Required")}</strong><br>
                                            {__("Check your email inbox")} {__("to complete the verification process")}
                                            <button class="btn btn-sm btn-success ml10" data-toggle="modal"
                                                data-url="core/activation_email_resend.php">{__("Resend Verification
                                                Email")}</button>
                                        </div>
                                    </div>
                                    {/if}
                                    <div class="iconsRightWrap mb20">
                                        <img width="30px" height="30px"
                                            src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_friends.svg" />
                                        <p>Account Information</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            {__("Email Address")}
                                        </label>
                                        <div class="input-group">
                                            <!-- <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div> -->
                                            <input type="email" class="form-control" name="email"
                                                value="{$user->_data['user_email']}" disabled="disabled">
                                        </div>
                                    </div>

                                    {if ($system['activation_enabled'] && $system['activation_type'] == "sms") ||
                                    ($system['two_factor_enabled'] && $system['two_factor_type'] == "sms")}
                                    <!-- <div class="divider"></div> -->

                                    <!-- <div class="heading-small mb20">
                                    {__("Phone Number")}
                                </div> -->
                                    <div class="">
                                        {if $user->_data['user_phone'] && !$user->_data['user_phone_verified']}
                                        <div class="alert alert-danger">
                                            <div class="icon">
                                                <i class="fa fa-exclamation-circle fa-2x"></i>
                                            </div>
                                            <div class="text">
                                                <strong>{__("Phone Verification Required")}</strong><br>
                                                {__("Check your phone SMS")} {__("to complete phone verification
                                                process")}
                                                <button class="btn btn-sm btn-success ml10" data-toggle="modal"
                                                    data-url="#activation-phone">{__("Enter Code")}</button>
                                            </div>
                                        </div>
                                        {/if}

                                        <div class="form-group">
                                            <label class="form-control-label">
                                                {__("Phone Number")}
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-globe-americas"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{$user->_data['user_phone']}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                            </div>
                                            <span class="form-text">
                                                {__("Your phone number i.e +1234567890")}
                                            </span>
                                        </div>
                                    </div>
                                    {/if}

                                    <!-- <div class="divider"></div> -->

                                    <!-- <div class="heading-small mb20">
                                    {__("Username")}
                                </div> -->
                                    <div class="">
                                        <div class="form-group ">
                                            <label class=" form-control-label">
                                                {__("Username")}
                                            </label>
                                            <div class="">
                                                <div class="input-group">
                                                    <span
                                                        class="form-control d-none mr10 d-sm-block">{$system['system_url']}/</span>
                                                    <input type="text" class="form-control" name="username"
                                                        value="{$user->_data['user_name']}">
                                                </div>
                                                <span class="form-text">
                                                    {__("Can only contain alphanumeric characters (A–Z, 0–9) and periods
                                                    ('.')")}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- success -->
                                    <!-- <div class="alert alert-success mb0 x-hidden"></div> -->
                                    <!-- success -->

                                    <!-- error -->
                                    <!-- <div class="alert alert-danger mb0 x-hidden"></div> -->
                                    <!-- error -->
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                        Changes")}</button>
                                </div>
                            </form>
                        </div>

                        {elseif $view == "profile"}
                        {if $sub_view == ""}
                        <div class="card-header with-icon">{__("Basic")}
                            <div class="float-right">
                                <a href="{$system['system_url']}/{$user->_data['user_name']}"
                                    class="btn btn-sm viewProfileButton">
                                    <img width="30px" height="30px"
                                        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/eye-icon.svg" />
                                    <span class="ml5 d-none d-lg-inline-block">{__("View Profile")}</span>
                                </a>
                            </div>
                        </div>
                        <form class="js_ajax-forms setting-basic-form " data-url="users/settings.php?edit=basic">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("First Name")}</label>
                                        <input type="text" maxlength="20" class="form-control" name="firstname"
                                            value="{$user->_data['user_firstname']}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Last Name")}</label>
                                        <input type="text" maxlength="20" class="form-control" name="lastname"
                                            value="{$user->_data['user_lastname']}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("I am")}</label>
                                        <select name="gender" class="form-control">
                                            <option value="none">{__("Select Sex")}</option>
                                            <option {if $user->_data['user_gender'] == "male"}selected{/if}
                                                value="male">{__("Male")}</option>
                                            <option {if $user->_data['user_gender'] == "female"}selected{/if}
                                                value="female">{__("Female")}</option>
                                            <option {if $user->_data['user_gender'] == "other"}selected{/if}
                                                value="other">{__("Other")}</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Relationship Status")}</label>
                                        <select name="relationship" class="form-control">
                                            <option value="none">{__("Select Relationship")}</option>
                                            <option {if $user->_data['user_relationship'] == "single"}selected{/if}
                                                value="single">{__("Single")}</option>
                                            <option {if $user->_data['user_relationship'] ==
                                                "relationship"}selected{/if}
                                                value="relationship">{__("In a relationship")}</option>
                                            <option {if $user->_data['user_relationship'] == "married"}selected{/if}
                                                value="married">{__("Married")}</option>
                                            <option {if $user->_data['user_relationship'] == "complicated"}selected{/if}
                                                value="complicated">{__("It's complicated")}</option>
                                            <option {if $user->_data['user_relationship'] == "separated"}selected{/if}
                                                value="separated">{__("Separated")}</option>
                                            <option {if $user->_data['user_relationship'] == "divorced"}selected{/if}
                                                value="divorced">{__("Divorced")}</option>
                                            <option {if $user->_data['user_relationship'] == "widowed"}selected{/if}
                                                value="widowed">{__("Widowed")}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Country")}</label>
                                        <select name="country" class="form-control">
                                            <option value="none">{__("Select Country")}</option>
                                            {foreach $countries as $country}
                                            <option {if $user->_data['user_country'] ==
                                                $country['country_id']}selected{/if}
                                                value="{$country['country_id']}">{$country['country_name']}</option>
                                            {/foreach}
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Website")}</label>
                                        <input type="text" class="form-control" name="website"
                                            value="{$user->_data['user_website']}">
                                        <span class="form-text">
                                            {__("Website link must start with http:// or https://")}
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">{__("Birthdate")}</label>
                                    <div class="form-row">
                                        <div class="col">
                                            <select class="form-control" name="birth_month">
                                                <option value="none">{__("Select Month")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '1'}selected{/if}
                                                    value="1">{__("Jan")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '2'}selected{/if}
                                                    value="2">{__("Feb")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '3'}selected{/if}
                                                    value="3">{__("Mar")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '4'}selected{/if}
                                                    value="4">{__("Apr")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '5'}selected{/if}
                                                    value="5">{__("May")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '6'}selected{/if}
                                                    value="6">{__("Jun")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '7'}selected{/if}
                                                    value="7">{__("Jul")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '8'}selected{/if}
                                                    value="8">{__("Aug")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '9'}selected{/if}
                                                    value="9">{__("Sep")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '10'}selected{/if}
                                                    value="10">{__("Oct")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '11'}selected{/if}
                                                    value="11">{__("Nov")}</option>
                                                <option {if $user->_data['user_birthdate_parsed']['month'] ==
                                                    '12'}selected{/if}
                                                    value="12">{__("Dec")}</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="birth_day">
                                                <option value="none">{__("Select Day")}</option>
                                                {for $i=1 to 31}
                                                <option {if $user->_data['user_birthdate_parsed']['day'] ==
                                                    $i}selected{/if}
                                                    value="{$i}">{$i}</option>
                                                {/for}
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="birth_year">
                                                <option value="none">{__("Select Year")}</option>
                                                {for $i=1905 to 2015}
                                                <option {if $user->_data['user_birthdate_parsed']['year'] ==
                                                    $i}selected{/if}
                                                    value="{$i}">{$i}</option>
                                                {/for}
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">{__("About Me")}</label>
                                    <textarea class="form-control"
                                        name="biography">{$user->_data['user_biography']}</textarea>
                                </div>

                                <!-- custom fields -->
                                {if $custom_fields['basic']}
                                {include file='__custom_fields.tpl' _custom_fields=$custom_fields['basic']
                                _registration=false}
                                {/if}
                                <!-- custom fields -->

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>
                        {elseif $sub_view == "work"}
                        <div class="card-header with-icon">{__("Work")}
                            <div class="float-right">
                                <a href="{$system['system_url']}/{$user->_data['user_name']}"
                                    class="btn btn-sm viewProfileButton">
                                    <img width="30px" height="30px"
                                        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/eye-icon.svg" />
                                    <span class="ml5 d-none d-lg-inline-block">{__("View Profile")}</span>
                                </a>
                            </div>
                        </div>
                        <form class="js_ajax-forms setting-work-form " data-url="users/settings.php?edit=work">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-control-label">{__("Work Title")}</label>
                                    <input type="text" class="form-control" name="work_title"
                                        value="{$user->_data['user_work_title']}">
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Work Place")}</label>
                                        <input type="text" class="form-control" name="work_place"
                                            value="{$user->_data['user_work_place']}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Work Website")}</label>
                                        <input type="text" class="form-control" name="work_url"
                                            value="{$user->_data['user_work_url']}">
                                        <span class="form-text">
                                            {__("Website link must start with http:// or https://")}
                                        </span>
                                    </div>
                                </div>

                                <!-- custom fields -->
                                {if $custom_fields['work']}
                                {include file='__custom_fields.tpl' _custom_fields=$custom_fields['work']
                                _registration=false}
                                {/if}
                                <!-- custom fields -->

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>
                        {elseif $sub_view == "location"}
                        <div class="card-header with-icon">{__("Location")}
                            <div class="float-right">
                                <a href="{$system['system_url']}/{$user->_data['user_name']}"
                                    class="btn btn-sm viewProfileButton">
                                    <img width="30px" height="30px"
                                        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/eye-icon.svg" />
                                    <span class="ml5 d-none d-lg-inline-block">{__("View Profile")}</span>
                                </a>
                            </div>
                        </div>
                        <form class="js_ajax-forms setting-location-form " data-url="users/settings.php?edit=location">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-control-label">{__("Current City")}</label>
                                    <input type="text" class="form-control js_geocomplete" name="city"
                                        value="{$user->_data['user_current_city']}">
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">{__("Hometown")}</label>
                                    <input type="text" class="form-control js_geocomplete" name="hometown"
                                        value="{$user->_data['user_hometown']}">
                                </div>

                                <!-- custom fields -->
                                {if $custom_fields['location']}
                                {include file='__custom_fields.tpl' _custom_fields=$custom_fields['location']
                                _registration=false}
                                {/if}
                                <!-- custom fields -->

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>
                        {elseif $sub_view == "education"}
                        <div class="card-header with-icon">
                            {__("Education")}
                            <div class="float-right">
                                <a href="{$system['system_url']}/{$user->_data['user_name']}"
                                    class="btn btn-sm viewProfileButton">
                                    <img width="30px" height="30px"
                                        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/eye-icon.svg" />
                                    <span class="ml5 d-none d-lg-inline-block">{__("View Profile")}</span>
                                </a>
                            </div>
                        </div>
                        <form class="js_ajax-forms setting-education-form "
                            data-url="users/settings.php?edit=education">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-control-label">{__("School")}</label>
                                    <input type="text" class="form-control" name="edu_school"
                                        value="{$user->_data['user_edu_school']}">
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Major")}</label>
                                        <input type="text" class="form-control" name="edu_major"
                                            value="{$user->_data['user_edu_major']}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Class")}</label>
                                        <input type="text" class="form-control" name="edu_class"
                                            value="{$user->_data['user_edu_class']}">
                                    </div>
                                </div>

                                <!-- custom fields -->
                                {if $custom_fields['education']}
                                {include file='__custom_fields.tpl' _custom_fields=$custom_fields['education']
                                _registration=false}
                                {/if}
                                <!-- custom fields -->

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>
                        {elseif $sub_view == "other"}
                        <div class="card-header with-icon">{__("Other")}
                            <div class="float-right">
                                <a href="{$system['system_url']}/{$user->_data['user_name']}"
                                    class="btn btn-sm viewProfileButton">
                                    <img width="30px" height="30px"
                                        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/eye-icon.svg" />
                                    <span class="ml5 d-none d-lg-inline-block">{__("View Profile")}</span>
                                </a>
                            </div>
                        </div>
                        <form class="js_ajax-forms setting-other-form " data-url="users/settings.php?edit=other">
                            <div class="card-body">
                                <!-- custom fields -->
                                {if $custom_fields['other']}
                                {include file='__custom_fields.tpl' _custom_fields=$custom_fields['other']
                                _registration=false}
                                {/if}
                                <!-- custom fields -->

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>
                        {elseif $sub_view == "social"}
                        <div class="card-header with-icon">{__("Social Links")}
                            <div class="float-right">
                                <a href="{$system['system_url']}/{$user->_data['user_name']}"
                                    class="btn btn-sm viewProfileButton">
                                    <img width="30px" height="30px"
                                        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/eye-icon.svg" />
                                    <span class="ml5 d-none d-lg-inline-block">{__("View Profile")}</span>
                                </a>
                            </div>
                        </div>
                        <form class="js_ajax-forms setting-social-form" data-url="users/settings.php?edit=social">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img class="BlueIcon" alt="image" title="Feelings/Activity"
                                                src="{$system['system_url']}/content/themes/default/images/svg/svgImg/fbIcons_black.svg">
                                            <label class="form-control-label">{__("Facebook Profile URL")}</label>
                                        </span>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="facebook"
                                                value="{$user->_data['user_social_facebook']}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img class="BlueIcon" alt="image" title="Feelings/Activity"
                                                src="{$system['system_url']}/content/themes/default/images/svg/svgImg/twittericon_black.svg">
                                            <label class="form-control-label">{__("Twitter Profile URL")}</label>
                                        </span>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="twitter"
                                                value="{$user->_data['user_social_twitter']}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img class="BlueIcon" alt="image" title="Feelings/Activity"
                                                src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_video_icon-black.svg">
                                            <label class="form-control-label">{__("YouTube Profile URL")}</label>
                                        </span>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="youtube"
                                                value="{$user->_data['user_social_youtube']}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img class="BlueIcon" alt="image" title="Feelings/Activity"
                                                src="{$system['system_url']}/content/themes/default/images/svg/svgImg/instaIcon-black.svg">
                                            <label class="form-control-label">{__("Instagram Profile URL")}</label>
                                        </span>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="instagram"
                                                value="{$user->_data['user_social_instagram']}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img class="BlueIcon" alt="image" title="Feelings/Activity"
                                                src="{$system['system_url']}/content/themes/default/images/svg/svgImg/inIcon-icon.svg">
                                            <label class="form-control-label">{__("LinkedIn Profile URL")}</label>
                                        </span>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="linkedin"
                                                value="{$user->_data['user_social_linkedin']}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img class="BlueIcon" alt="image" title="Feelings/Activity"
                                                src="{$system['system_url']}/content/themes/default/images/svg/svgImg/vkIcon_black.svg">
                                            <label class="form-control-label">{__("Vkontakte Profile URL")}</label>
                                        </span>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="vkontakte"
                                                value="{$user->_data['user_social_vkontakte']}">
                                        </div>
                                    </div>
                                </div>

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>
                        {elseif $sub_view == "design"}
                        <div class="card-header with-icon">{__("Design")}
                            <div class="float-right">
                                <a href="{$system['system_url']}/{$user->_data['user_name']}"
                                    class="btn btn-sm viewProfileButton">
                                    <img width="30px" height="30px"
                                        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/eye-icon.svg" />
                                    <span class="ml5 d-none d-lg-inline-block">{__("View Profile")}</span>
                                </a>
                            </div>
                        </div>
                        <form class="js_ajax-forms setting-design-form " data-url="users/settings.php?edit=design">
                            <div class="card-body">
                                <div class="form-group form-row">
                                    <label class="col-md-3 form-control-label">
                                        {__("Profile Background")}
                                    </label>
                                    <div class="col-md-9">
                                        {if $user->_data['user_profile_background'] == ''}
                                        <div class="x-image">
                                            <button type="button" class="close x-hidden js_x-image-remover"
                                                title='{__("Remove")}'>
                                                <span>×</span>
                                            </button>
                                            <div class="x-image-loader">
                                                <div class="progress x-progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                                            <input type="hidden" class="js_x-image-input" name="user_profile_background"
                                                value="">
                                        </div>
                                        {else}
                                        <div class="x-image"
                                            style="background-image: url('{$system['system_uploads']}/{$user->_data['user_profile_background']}')">
                                            <button type="button" class="close js_x-image-remover"
                                                title='{__("Remove")}'>
                                                <span>×</span>
                                            </button>
                                            <div class="x-image-loader">
                                                <div class="progress x-progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                                            <input type="hidden" class="js_x-image-input" name="user_profile_background"
                                                value="{$user->_data['user_profile_background']}">
                                        </div>
                                        {/if}
                                    </div>
                                </div>

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>
                        {/if}

                        {elseif $view == "security"}
                        {if $sub_view == "password"}
                        <div class="card-header with-icon">{__("Change Password")}
                        </div>
                        <form class="js_ajax-forms setting-security-form " data-url="users/settings.php?edit=password">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-control-label">{__("Confirm Current Password")}</label>
                                    <input type="password" class="form-control" name="current">
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Your New Password")}</label>
                                        <input type="password" class="form-control" name="new">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{__("Confirm New Password")}</label>
                                        <input type="password" class="form-control" name="confirm">
                                    </div>
                                </div>

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>
                        {elseif $sub_view == "sessions"}
                        <div class="card-header with-icon">
                            <div class="float-right">
                                <button class="btn btn-sm btn-danger js_session-delete-all">
                                    <span class="ml5 ">{__("Log Out All")}</span>
                                </button>
                            </div>
                            {__("Manage Sessions")}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>{__("ID")}</th>
                                            <th>{__("Browser")}</th>
                                            <th>{__("OS")}</th>
                                            <th>{__("Date")}</th>
                                            <th>{__("IP")}</th>
                                            <th>{__("Actions")}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach $sessions as $session}
                                        <tr>
                                            <td>{$session@iteration}</td>
                                            <td>
                                                {$session['user_browser']} {if $session['session_id'] ==
                                                $user->_data['active_session_id']}<span
                                                    class="badge badge-pill badge-lg badge-success">{__("Active
                                                    Session")}</span>{/if}
                                            </td>
                                            <td>{$session['user_os']}</td>
                                            <td>
                                                <span class="js_moment"
                                                    data-time="{$session['session_date']}">{$session['session_date']}</span>
                                            </td>
                                            <td>{$session['user_ip']}</td>
                                            <td>
                                                <button data-toggle="tooltip" data-placement="top"
                                                    title='{__("End Session")}'
                                                    class="btn btn-sm btn-icon btn-rounded btn-danger js_session-deleter"
                                                    data-id="{$session['session_id']}">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {elseif $sub_view == "two-factor"}
                        <div class="card-header with-icon">{__("Two-Factor Authentication")}
                        </div>
                        <form class="js_ajax-forms setting-two-factor-form"
                            data-url="users/settings.php?edit=two-factor">
                            <div class="card-body">
                                <div class="alert ">
                                    <div class="icon">
                                        <i class="fa fa-shield-alt fa-2x"></i>
                                    </div>
                                    <div class="text">
                                        <strong>{__("Two-Factor Authentication")}</strong><br>
                                        {__("Log in with a code from your")}
                                        {if $system['two_factor_type'] == "email"}{__("email")}{/if}
                                        {if $system['two_factor_type'] == "sms"}{__("phone")}{/if}
                                        {if $system['two_factor_type'] == "google"}{__("Google Authenticator App")}{/if}
                                        {__("as well as a password")}
                                    </div>
                                </div>
                                {if !$user->_data['user_two_factor_enabled'] && $system['two_factor_type'] == "google"}
                                <div class="heading-small mb20">
                                    {__("Configuring your authenticator")}
                                </div>
                                <div class="pl-md-4">
                                    <ol class="mtb20">
                                        <li class="mb5">
                                            {__("You need to download Google Authenticator app for")} <a target="_blank"
                                                href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en">{__("Android")}</a>
                                            {__("or")} <a target="_blank"
                                                href="https://itunes.apple.com/eg/app/google-authenticator/id388497605?mt=8">{__("IOS")}</a>
                                        </li>
                                        <li>
                                            {__("In your app, add a new account using the details below")}:
                                        </li>
                                    </ol>

                                    <div class="row text-center">
                                        <div class="form-group col-md-6">
                                            <h6>{__("Scanning the QR code")}</h6>
                                            <img src="{$two_factor_QR}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6>{__("Manually by entering this token")}</h6>
                                            <h3>
                                                <span
                                                    class="badge badge-warning pt10 plr20">{$two_factor_gsecret}</span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="heading-small mb20">
                                    {__("Activate your authenticator")}
                                </div>
                                <div class="pl-md-4">
                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Verification Code")}
                                        </label>
                                        <div class="col-md-9">
                                            <input name="gcode" type="text" class="form-control" placeholder="######"
                                                required autofocus>
                                            <span class="form-text">
                                                {__("Enter the code shown on your app")}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- success -->
                                    <div class="alert alert-success mb0 x-hidden"></div>
                                    <!-- success -->

                                    <!-- error -->
                                    <div class="alert alert-danger mb0 x-hidden"></div>
                                    <!-- error -->
                                </div>
                                {else}
                                <div class="form-table-row">
                                    <div>
                                        <div class="form-control-label h6">{__("Two-Factor Authentication")}</div>
                                        <div class="form-text d-none d-sm-block">{__("Enable two-factor authentication
                                            to log in
                                            with a code from your email/phone as well as a password")}</div>
                                    </div>
                                    <div class="text-right">
                                        <label class="switch" for="two_factor_enabled">
                                            <input type="checkbox" name="two_factor_enabled" id="two_factor_enabled" {if
                                                $user->_data['user_two_factor_enabled']}checked{/if}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                                {/if}
                            </div>
                            <div class="card-footer text-right">
                                <input type="hidden" name="type" value="{$system['two_factor_type']}">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>
                        {/if}

                        {elseif $view == "privacy"}
                        <div class="card-header with-icon">{__("Privacy")}
                        </div>
                        <form class="js_ajax-forms setting-privacy-form privacy-form-section"
                            data-url="users/settings.php?edit=privacy">
                            <div class="card-body">
                                {if $system['chat_enabled']}
                                <div class="form-table-row">
                                    <div class="avatar">
                                        <img width="50px" height="50px"
                                            src="{$system['system_url']}/content/themes/default/images/svg/settingChaticon.svg" />
                                    </div>
                                    <div>
                                        <div class="form-control-label chatSetting">{__("Chat Enabled")}</div>
                                        <div class="form-text d-none d-sm-block" style="color:rgb(167, 180, 203);">
                                            {__("If chat disabled you will appear offline and will not see who is online
                                            too")}</div>
                                    </div>
                                    <div class="text-right">
                                        <label class="switch" for="privacy_chat">
                                            <input type="checkbox" name="privacy_chat" id="privacy_chat" {if
                                                $user->_data['user_chat_enabled']}checked{/if}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                {/if}

                                <div class="form-table-row">
                                    <div class="avatar">
                                        <img width="50px" height="50px"
                                            src="{$system['system_url']}/content/themes/default/images/svg/settingEmailicon.svg" />
                                    </div>
                                    <div>
                                        <div class="form-control-label chatSetting">{__("Email you with our
                                            newsletter")}</div>
                                        <div class="form-text d-none d-sm-block">{__("From time to time we send
                                            newsletter email
                                            to all of our members")}</div>
                                    </div>
                                    <div class="text-right">
                                        <label class="switch" for="privacy_newsletter">
                                            <input type="checkbox" name="privacy_newsletter" id="privacy_newsletter" {if
                                                $user->_data['user_privacy_newsletter']}checked{/if}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    {if $system['pokes_enabled']}
                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/svgImg/local_hubN.svg" />
                                            <label class="form-control-label">{__("Who can poke you")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_poke">
                                                <option {if $user->_data['user_privacy_poke'] == "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_poke'] == "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_poke'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("No One")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    {/if}

                                    {if $system['gifts_enabled']}
                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <i class="fas fa-gift"></i>
                                            <label class="form-control-label">{__("Who can send you gifts")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_gifts">
                                                <option {if $user->_data['user_privacy_gifts'] == "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_gifts'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_gifts'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("No One")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    {/if}

                                    <div class="form-group col-md-6 {if !$system['wall_posts_enabled']}x-hidden{/if}">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/screenSetting.svg" />
                                            <label class="form-control-label">{__("Who can post on your wall")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_wall">
                                                <option {if $user->_data['user_privacy_wall'] == "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_wall'] == "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_wall'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/giftSetting.svg" />
                                            <label class="form-control-label">{__("Who can see your")}
                                                {__("birthdate")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_birthdate">
                                                <option {if $user->_data['user_privacy_birthdate'] ==
                                                    "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_birthdate'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_birthdate'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/heartSetting.svg" />
                                            <label class="form-control-label">{__("Who can see your")}
                                                {__("relationship")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_relationship">
                                                <option {if $user->_data['user_privacy_relationship'] ==
                                                    "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_relationship'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_relationship'] ==
                                                    "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/heartSetting.svg" />
                                            <label class="form-control-label">{__("Who can see your")} {__("basic
                                                info")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_basic" id="privacy_basic">
                                                <option {if $user->_data['user_privacy_basic'] == "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_basic'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_basic'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/bag.svg" />
                                            <label class="form-control-label">{__("Who can see your")} {__("work
                                                info")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_work" id="privacy_work">
                                                <option {if $user->_data['user_privacy_work'] == "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_work'] == "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_work'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/locationSetting.png" />
                                            <label class="form-control-label">{__("Who can see your")} {__("location
                                                info")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_location" id="privacy_location">
                                                <option {if $user->_data['user_privacy_location'] ==
                                                    "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_location'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_location'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/homeSetting.svg" />
                                            <label class="form-control-label">{__("Who can see your")} {__("education
                                                info")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_education"
                                                id="privacy_education">
                                                <option {if $user->_data['user_privacy_education'] ==
                                                    "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_education'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_education'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/plusSetting.svg" />
                                            <label class="form-control-label">{__("Who can see your")} {__("other
                                                info")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_other" id="privacy_other">
                                                <option {if $user->_data['user_privacy_other'] == "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_other'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_other'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/peopleSetting.svg" />
                                            <label class="form-control-label">{__("Who can see your")}
                                                {__("friends")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_friends" id="privacy_friends">
                                                <option {if $user->_data['user_privacy_friends'] ==
                                                    "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_friends'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_friends'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/cameraSetting.svg" />
                                            <label class="form-control-label">{__("Who can see your")}
                                                {__("photos")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_photos" id="privacy_photos">
                                                <option {if $user->_data['user_privacy_photos'] ==
                                                    "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_photos'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_photos'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/flag3.svg" />
                                            <label class="form-control-label">{__("Who can see your")} {__("liked
                                                pages")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_pages" id="privacy_pages">
                                                <option {if $user->_data['user_privacy_pages'] == "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_pages'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_pages'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/peopleSetting.svg" />
                                            <label class="form-control-label">{__("Who can see your")} {__("joined
                                                groups")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_groups" id="privacy_groups">
                                                <option {if $user->_data['user_privacy_groups'] ==
                                                    "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_groups'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_groups'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <span class="iconLabel">
                                            <img
                                                src="{$system['system_url']}/content/themes/default/images/svg/screenSetting.svg" />
                                            <label class="form-control-label">{__("Who can see your")} {__("joined
                                                events")}</label>
                                        </span>
                                        <div class="input-group">
                                            <select class="form-control" name="privacy_events" id="privacy_events">
                                                <option {if $user->_data['user_privacy_events'] ==
                                                    "public"}selected{/if}
                                                    value="public">
                                                    {__("Everyone")}
                                                </option>
                                                <option {if $user->_data['user_privacy_events'] ==
                                                    "friends"}selected{/if}
                                                    value="friends">
                                                    {__("Friends")}
                                                </option>
                                                <option {if $user->_data['user_privacy_events'] == "me"}selected{/if}
                                                    value="me">
                                                    {__("Just Me")}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>

                        {elseif $view == "notifications"}
                        <div class="card-header with-icon">{__("Notifications")}
                        </div>
                        <form class="js_ajax-forms setting-notification-form"
                            data-url="users/settings.php?edit=notifications">
                            <div class="card-body">
                                <!-- System Notifications -->
                                <div class="heading-small mb20">
                                    {__("System Notifications")}
                                </div>
                                <div class="pl-md-4">
                                    <div class="form-table-row">
                                        <div class="avatar">
                                            <span class="avtar_img">
                                                <img class="BlueIcon" alt="image" title="Feelings/Activity"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/notifications_icon_hover.svg">
                                            </span>
                                        </div>
                                        <div>
                                            <div class="form-control-label h6">{__("Chat Message Sound")}</div>
                                            <div class="form-text d-none d-sm-block">{__("A sound will be played each
                                                time you
                                                receive a new message on an inactive chat window")}</div>
                                        </div>
                                        <div class="text-right">
                                            <label class="switch" for="chat_sound_settings">
                                                <input type="checkbox" name="chat_sound" id="chat_sound_settings" {if
                                                    $user->_data['chat_sound']}checked{/if}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-table-row">
                                        <div class="avatar">
                                            <span class="avtar_img">
                                                <img class="BlueIcon" alt="image" title="Feelings/Activity"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/notifications_icon_hover.svg">
                                            </span>
                                        </div>
                                        <div>
                                            <div class="form-control-label h6">{__("Notifications Sound")}</div>
                                            <div class="form-text d-none d-sm-block">{__("A sound will be played each
                                                time you
                                                receive a new activity notification")}</div>
                                        </div>
                                        <div class="text-right">
                                            <label class="switch" for="notifications_sound_settings">
                                                <input type="checkbox" name="notifications_sound"
                                                    id="notifications_sound_settings" {if
                                                    $user->_data['notifications_sound']}checked{/if}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- System Notifications -->

                                <!-- Email Notifications -->
                                {if $email_notifications_enabled}
                                <div class="divider"></div>
                                <div class="heading-small mb20">
                                    {__("Email Notifications")}
                                </div>
                                <div class="pl-md-4">
                                    <div class="form-group form-row">
                                        <label class="col-md-2 form-control-label">{__("Email Me When")}</label>
                                        <div class="col-md-10">
                                            {if $system['email_post_likes']}
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="email_post_likes" id="email_post_likes" {if
                                                    $user->_data['email_post_likes']}checked{/if}>
                                                <label class="custom-control-label" for="email_post_likes">{__("Someone
                                                    liked my
                                                    post")}</label>
                                            </div>
                                            {/if}
                                            {if $system['email_post_comments']}
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="email_post_comments" id="email_post_comments" {if
                                                    $user->_data['email_post_comments']}checked{/if}>
                                                <label class="custom-control-label"
                                                    for="email_post_comments">{__("Someone
                                                    commented on my post")}</label>
                                            </div>
                                            {/if}
                                            {if $system['email_post_shares']}
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="email_post_shares" id="email_post_shares" {if
                                                    $user->_data['email_post_shares']}checked{/if}>
                                                <label class="custom-control-label" for="email_post_shares">{__("Someone
                                                    shared
                                                    my post")}</label>
                                            </div>
                                            {/if}
                                            {if $system['email_wall_posts']}
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="email_wall_posts" id="email_wall_posts" {if
                                                    $user->_data['email_wall_posts']}checked{/if}>
                                                <label class="custom-control-label" for="email_wall_posts">{__("Someone
                                                    posted
                                                    on my timeline")}</label>
                                            </div>
                                            {/if}
                                            {if $system['email_mentions']}
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="email_mentions" id="email_mentions" {if
                                                    $user->_data['email_mentions']}checked{/if}>
                                                <label class="custom-control-label" for="email_mentions">{__("Someone
                                                    mentioned
                                                    me")}</label>
                                            </div>
                                            {/if}
                                            {if $system['email_profile_visits']}
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="email_profile_visits" id="email_profile_visits" {if
                                                    $user->_data['email_profile_visits']}checked{/if}>
                                                <label class="custom-control-label"
                                                    for="email_profile_visits">{__("Someone
                                                    visited my profile")}</label>
                                            </div>
                                            {/if}
                                            {if $system['email_friend_requests']}
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="email_friend_requests" id="email_friend_requests" {if
                                                    $user->_data['email_friend_requests']}checked{/if}>
                                                <label class="custom-control-label"
                                                    for="email_friend_requests">{__("Someone
                                                    sent me/accepted my friend requset")}</label>
                                            </div>
                                            {/if}
                                        </div>
                                    </div>
                                </div>
                                {/if}
                                <!-- Email Notifications -->

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Save
                                    Changes")}</button>
                            </div>
                        </form>

                        {elseif $view == "linked"}
                        <div class="card-header with-icon">{__("Linked Accounts")}
                        </div>
                        <div class="card-body">
                            {if $system['facebook_login_enabled']}
                            <div class="form-table-row">
                                <div class="avatar">
                                    <i class="fab fa-facebook-square fa-3x" style="color: #3B579D"></i>
                                </div>
                                <div>
                                    <div class="form-control-label h6 mb5">{__("Facebook")}</div>
                                    <div class="form-text d-none d-sm-block">
                                        {if $user->_data['facebook_connected']}
                                        {__("Your account is connected to")} {__("Facebook")}
                                        {else}
                                        {__("Connect your account to")} {__("Facebook")}
                                        {/if}
                                    </div>
                                </div>
                                <div class="text-right">
                                    {if $user->_data['facebook_connected']}
                                    <a class="btn btn-sm btn-danger"
                                        href="{$system['system_url']}/revoke/facebook">{__("Disconnect")}</a>
                                    {else}
                                    <a class="btn btn-sm btn-primary"
                                        href="{$system['system_url']}/connect/facebook">{__("Connect")}</a>
                                    {/if}
                                </div>
                            </div>
                            {/if}

                            {if $system['google_login_enabled']}
                            <div class="form-table-row">
                                <div class="avatar">
                                    <i class="fab fa-google fa-3x" style="color: #DC4A38"></i>
                                </div>
                                <div>
                                    <div class="form-control-label h6 mb5">{__("Google")}</div>
                                    <div class="form-text d-none d-sm-block">
                                        {if $user->_data['google_connected']}
                                        {__("Your account is connected to")} {__("Google")}
                                        {else}
                                        {__("Connect your account to")} {__("Google")}
                                        {/if}
                                    </div>
                                </div>
                                <div class="text-right">
                                    {if $user->_data['google_connected']}
                                    <a class="btn btn-sm btn-danger"
                                        href="{$system['system_url']}/revoke/google">{__("Disconnect")}</a>
                                    {else}
                                    <a class="btn btn-sm btn-primary"
                                        href="{$system['system_url']}/connect/google">{__("Connect")}</a>
                                    {/if}
                                </div>
                            </div>
                            {/if}

                            {if $system['twitter_login_enabled']}
                            <div class="form-table-row">
                                <div class="avatar">
                                    <i class="fab fa-twitter-square fa-3x" style="color: #55ACEE"></i>
                                </div>
                                <div>
                                    <div class="form-control-label h6 mb5">{__("Twitter")}</div>
                                    <div class="form-text d-none d-sm-block">
                                        {if $user->_data['twitter_connected']}
                                        {__("Your account is connected to")} {__("Twitter")}
                                        {else}
                                        {__("Connect your account to")} {__("Twitter")}
                                        {/if}
                                    </div>
                                </div>
                                <div class="text-right">
                                    {if $user->_data['twitter_connected']}
                                    <a class="btn btn-sm btn-danger"
                                        href="{$system['system_url']}/revoke/twitter">{__("Disconnect")}</a>
                                    {else}
                                    <a class="btn btn-sm btn-primary"
                                        href="{$system['system_url']}/connect/twitter">{__("Connect")}</a>
                                    {/if}
                                </div>
                            </div>
                            {/if}

                            {if $system['instagram_login_enabled']}
                            <div class="form-table-row">
                                <div class="avatar">
                                    <i class="fab fa-instagram fa-3x" style="color: #3f729b"></i>
                                </div>
                                <div>
                                    <div class="form-control-label h6 mb5">{__("Instagram")}</div>
                                    <div class="form-text d-none d-sm-block">
                                        {if $user->_data['instagram_connected']}
                                        {__("Your account is connected to")} {__("Instagram")}
                                        {else}
                                        {__("Connect your account to")} {__("Instagram")}
                                        {/if}
                                    </div>
                                </div>
                                <div class="text-right">
                                    {if $user->_data['instagram_connected']}
                                    <a class="btn btn-sm btn-danger"
                                        href="{$system['system_url']}/revoke/instagram">{__("Disconnect")}</a>
                                    {else}
                                    <a class="btn btn-sm btn-primary"
                                        href="{$system['system_url']}/connect/instagram">{__("Connect")}</a>
                                    {/if}
                                </div>
                            </div>
                            {/if}

                            {if $system['linkedin_login_enabled']}
                            <div class="form-table-row">
                                <div class="avatar">
                                    <i class="fab fa-linkedin fa-3x" style="color: #1A84BC"></i>
                                </div>
                                <div>
                                    <div class="form-control-label h6 mb5">{__("Linkedin")}</div>
                                    <div class="form-text d-none d-sm-block">
                                        {if $user->_data['linkedin_connected']}
                                        {__("Your account is connected to")} {__("Linkedin")}
                                        {else}
                                        {__("Connect your account to")} {__("Linkedin")}
                                        {/if}
                                    </div>
                                </div>
                                <div class="text-right">
                                    {if $user->_data['linkedin_connected']}
                                    <a class="btn btn-sm btn-danger"
                                        href="{$system['system_url']}/revoke/linkedin">{__("Disconnect")}</a>
                                    {else}
                                    <a class="btn btn-sm btn-primary"
                                        href="{$system['system_url']}/connect/linkedin">{__("Connect")}</a>
                                    {/if}
                                </div>
                            </div>
                            {/if}

                            {if $system['vkontakte_login_enabled']}
                            <div class="form-table-row">
                                <div class="avatar">
                                    <i class="fab fa-vk fa-3x" style="color: #527498"></i>
                                </div>
                                <div>
                                    <div class="form-control-label h6 mb5">{__("Vkontakte")}</div>
                                    <div class="form-text d-none d-sm-block">
                                        {if $user->_data['vkontakte_connected']}
                                        {__("Your account is connected to")} {__("Vkontakte")}
                                        {else}
                                        {__("Connect your account to")} {__("Vkontakte")}
                                        {/if}
                                    </div>
                                </div>
                                <div class="text-right">
                                    {if $user->_data['vkontakte_connected']}
                                    <a class="btn btn-sm btn-danger"
                                        href="{$system['system_url']}/revoke/vkontakte">{__("Disconnect")}</a>
                                    {else}
                                    <a class="btn btn-sm btn-primary"
                                        href="{$system['system_url']}/connect/vkontakte">{__("Connect")}</a>
                                    {/if}
                                </div>
                            </div>
                            {/if}
                        </div>

                        {elseif $view == "membership"}
                        <div class="card-header with-icon">{__("Membership")}
                        </div>
                        <div class="card-body">
                            <div class="alert ">
                                <div class="icon">
                                    <i class="fa fa-id-card fa-2x"></i>
                                </div>
                                <div class="text">
                                    <strong>{__("Membership")}</strong><br>
                                    {__("Choose the Plan That's Right for You")}, {__("Check the package from")} <a
                                        class="alert-link" href="{$system['system_url']}/packages">{__("Here")}</a>
                                </div>
                            </div>

                            <form>
                                {if $user->_data['user_subscribed']}
                                <div class="heading-small mb20">
                                    {__("Package Details")}
                                </div>
                                <div class="pl-md-4">
                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Package")}
                                        </label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext">
                                                {$user->_data['name']}
                                                ({$system['system_currency_symbol']}{$user->_data['price']}
                                                {if $user->_data['period'] == "life"}{__("Life Time")}{else}{__("per")}
                                                {if
                                                $user->_data['period_num'] != '1'}{$user->_data['period_num']}{/if}
                                                {__($user->_data['period']|ucfirst)}{/if})
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Subscription Date")}
                                        </label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext">
                                                {$user->_data['user_subscription_date']|date_format:"%e %B %Y"}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Expiration Date")}
                                        </label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext">
                                                {if $user->_data['period'] == "life"}
                                                {__("Life Time")}
                                                {else}
                                                {$user->_data['subscription_end']|date_format:"%e %B %Y"} ({if
                                                $user->_data['subscription_timeleft'] > 0}{__("Remaining")}
                                                {$user->_data['subscription_timeleft']}
                                                {__("Days")}{else}{__("Expired")}{/if})
                                                {/if}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Boosted Posts")}
                                        </label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext">
                                                {$user->_data['user_boosted_posts']}/{$user->_data['boost_posts']} (<a
                                                    href="{$system['system_url']}/boosted/posts">{__("Manage")}</a>)
                                            </p>

                                            <div class="progress mb5">
                                                <div class="progress-bar progress-bar-info progress-bar-striped"
                                                    role="progressbar"
                                                    aria-valuenow="{($user->_data['user_boosted_posts']/$user->_data['boost_pages'])*100}"
                                                    aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {($user->_data['user_boosted_posts']/$user->_data['boost_pages'])*100}%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Boosted Pages")}
                                        </label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext">
                                                {$user->_data['user_boosted_pages']}/{$user->_data['boost_pages']} (<a
                                                    href="{$system['system_url']}/boosted/pages">{__("Manage")}</a>)
                                            </p>

                                            <div class="progress mb5">
                                                <div class="progress-bar progress-bar-warning progress-bar-striped"
                                                    role="progressbar"
                                                    aria-valuenow="{($user->_data['user_boosted_pages']/$user->_data['boost_pages'])*100}"
                                                    aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {($user->_data['user_boosted_pages']/$user->_data['boost_pages'])*100}%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="heading-small mb20">
                                    {__("Upgrade Package")}
                                </div>
                                <div class="pl-md-4">
                                    <div class="text-center">
                                        <a href="{$system['system_url']}/packages" class="btn btn-md btn-success"><i
                                                class="fa fa-rocket mr10"></i>{__("Upgrade Package")}</a>
                                    </div>
                                </div>
                                {else}
                                <div class="text-center">
                                    <a href="{$system['system_url']}/packages" class="btn btn-md btn-success"><i
                                            class="fa fa-rocket mr10"></i>{__("Upgrade to Pro")}</a>
                                </div>
                                {/if}
                            </form>
                        </div>

                        {elseif $view == "affiliates"}
                        <div>
                            <div class="card-header with-icon">{__("Affiliates")}</div>
                            <!-- <button class="_toggle_btn" type="button"><i class="fas fa-ellipsis-v"></i><i class="fas fa-times"></i></button> -->
                        </div>
                        <div class="card-body">
                            {if $sub_view == ""}
                            <div class="mainWrapDivideSection">
                                <div class="affiliateMainWrap">
                                    <div class="iconWrap">
                                        <img width="20px" height="20px" class="mr10"
                                            src="{$system['system_url']}/content/themes/default/images/svg/affiliates.svg" />
                                        <strong style="font-size: 16px;">{__("Affiliates System")}</strong>
                                    </div>
                                    <div class="BlueBaseText">
                                        {__("Earn up to")}
                                        {if $system['affiliate_type'] == "registration"}
                                        {$system['system_currency_symbol']}{$system['affiliates_per_user']|number_format:2}
                                        {__("For
                                        each user you will refer")}.
                                        {__("You will be paid when")} {__("new user registered")}
                                        {else}
                                        {if $system['affiliate_payment_type'] == "fixed"}
                                        {$system['system_currency_symbol']}{$system['affiliates_per_user']|number_format:2}
                                        {__("For
                                        each user you will refer")}.
                                        {else}
                                        {$system['affiliates_percentage']}% {__("From the package price of your refered
                                        user")}.
                                        {/if}
                                        {__("You will be paid when")} {__("new user registered & bought a package")}
                                        {/if}
                                        {if $system['affiliates_money_withdraw_enabled']}
                                        {__("You can withdraw your money")}
                                        {/if}
                                        {if $system['affiliates_money_transfer_enabled']}
                                        {if $system['affiliates_money_withdraw_enabled']}{__("or")} {/if}
                                        {__("You can transfer your money to your")}
                                        {__("wallet")}
                                        {/if}
                                    </div>
                                    <div class="mt20">
                                        <!-- <div class="iconWrap">
                                            <img  width="30px" height="30px" class="mr10" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/at_icon.svg"/>
                                            <strong style="font-size: 16px;">{__("Your affiliate link is")}</strong>
                                        </div>
                                        <div class="text-left linkMainRefrel">
                                            <a href="{$system['system_url']}/?ref={$user->_data['user_name']}">
                                                {$system['system_url']}/?ref={$user->_data['user_name']}
                                            </a>
                                        </div> -->
                                        <div class="text-left text-readable mb20">
                                            {__("Share")}<br>
                                            <a href="http://www.facebook.com/sharer.php?u={$system['system_url']}/?ref={$user->_data['user_name']}"
                                                class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                                                <img width="20px" height="20px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/fbIcons.svg">
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?url={$system['system_url']}/?ref={$user->_data['user_name']}"
                                                class="btn btn-sm btn-rounded btn-social-icon btn-rounded "
                                                target="_blank">
                                                <img width="20px" height="20px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/twittericon.svg">
                                            </a>
                                            <a href="https://vk.com/share.php?url={$system['system_url']}/?ref={$user->_data['user_name']}"
                                                class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                                                <img width="20px" height="20px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/vkIcon.svg">
                                            </a>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={$system['system_url']}/?ref%3D{$user->_data['user_name']}"
                                                class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                                                <img width="20px" height="20px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/inIcon.svg">
                                            </a>
                                            <a href="https://api.whatsapp.com/send?text={$system['system_url']}/?ref%3D{$user->_data['user_name']}"
                                                class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                                                <img width="20px" height="20px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/watsapIcon.svg">
                                            </a>
                                            <a href="https://reddit.com/submit?url={$system['system_url']}/?ref={$user->_data['user_name']}"
                                                class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                                                <img width="20px" height="20px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/catIcon.svg">
                                            </a>
                                            <a href="https://pinterest.com/pin/create/button/?url={$system['system_url']}/?ref={$user->_data['user_name']}"
                                                class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                                                <img width="20px" height="20px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/pintIcon.svg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="walletIconSectionAffiliate">
                                    <!-- money balance -->

                                    <div class="card adsWalletSidebar" style="padding-top: 0px;">
                                        <div class="iconWrap">
                                            <img width="30px" height="30px" class="mr10"
                                                src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Wallet_icon_header.svg" />
                                            <strong style="font-size: 16px;">{__("Your Money Balance")}</strong>
                                        </div>
                                        <!-- <p>Your current wallet credit is: $0.00 <br>You need to Replenish your wallet credit</p> -->
                                        <div class="stat-panel walletIconMoneyText">
                                            <div class="walletIconMoneyAmount">
                                                {$system['system_currency_symbol']}{$user->_data['user_affiliate_balance']|number_format:2}
                                            </div>
                                        </div>
                                        <div class="btnSectionWallet">
                                            <button class="btn btn-block mb20" style="width: auto;padding: 13px 20px;"
                                                data-toggle="modal" data-url="#wallet-replenish">
                                                <i class="fa fa-plus mr20" style="color: rgb(18, 105, 255);"></i>
                                                Add Credits
                                            </button>
                                        </div>
                                    </div>
                                    <!-- money balance -->
                                </div>
                            </div>
                            <div class="divider"></div>

                            {if count($affiliates) > 0}
                            <ul>
                                {foreach $affiliates as $_user}
                                {include file='__feeds_user.tpl' _tpl="list" _connection=$_user["connection"]}
                                {/foreach}
                            </ul>
                            {else}
                            <p class="text-center text-muted">
                                {__("No affiliates")}
                            </p>
                            {/if}

                            <!-- see-more -->
                            {if count($affiliates) >= $system['max_results']}
                            <div class="alert alert-info see-more js_see-more" data-uid="{$user->_data['user_id']}"
                                data-get="affiliates">
                                <span>{__("Load More")}</span>
                                <div class="loader loader_small x-hidden"></div>
                            </div>
                            {/if}
                            <!-- see-more -->
                            {elseif $sub_view == "payments"}
                            <div class="heading-small mb20">
                                {__("Withdrawal Request")}
                            </div>
                            <div class="pl-md-4">
                                <form class="js_ajax-forms " data-url="users/withdraw.php?type=affiliates">
                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Your Balance")}
                                        </label>
                                        <div class="col-md-9">
                                            <h6>
                                                <span class="badge badge-lg badge-info">
                                                    {$system['system_currency_symbol']}{$user->_data['user_affiliate_balance']|number_format:2}
                                                </span>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Amount")} ({$system['system_currency']})
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="amount">
                                            <span class="form-text">
                                                {__("The minimum withdrawal request amount is")}
                                                {$system['system_currency_symbol']}{$system['affiliates_min_withdrawal']}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Payment Method")}
                                        </label>
                                        <div class="col-md-9">
                                            {if in_array("paypal", $system['affiliate_payment_method_array'])}
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="method" id="method_paypal" value="paypal"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="method_paypal">{__("PayPal")}</label>
                                            </div>
                                            {/if}
                                            {if in_array("skrill", $system['affiliate_payment_method_array'])}
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="method" id="method_skrill" value="skrill"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="method_skrill">{__("Skrill")}</label>
                                            </div>
                                            {/if}
                                            {if in_array("bank", $system['affiliate_payment_method_array'])}
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="method" id="method_bank" value="bank"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="method_bank">{__("Bank
                                                    Transfer")}</label>
                                            </div>
                                            {/if}
                                            {if in_array("custom", $system['affiliate_payment_method_array'])}
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="method" id="method_custom" value="custom"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="method_custom">{__($system['affiliate_payment_method_custom'])}</label>
                                            </div>
                                            {/if}
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Transfer To")}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="method_value">
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <div class="col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-success btn-antier-green">{__("Make a
                                                withdrawal")}</button>
                                        </div>
                                    </div>

                                    <!-- success -->
                                    <div class="alert alert-success mb0 x-hidden"></div>
                                    <!-- success -->

                                    <!-- error -->
                                    <div class="alert alert-danger mb0 x-hidden"></div>
                                    <!-- error -->
                                </form>
                            </div>

                            <div class="divider"></div>

                            <div class="heading-small mb20">
                                {__("Withdrawal History")}
                            </div>
                            <div class="pl-md-4">
                                {if $payments}
                                <div class="table-responsive mt20">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>{__("ID")}</th>
                                                <th>{__("Amount")}</th>
                                                <th>{__("Method")}</th>
                                                <th>{__("Transfer To")}</th>
                                                <th>{__("Time")}</th>
                                                <th>{__("Status")}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach $payments as $payment}
                                            <tr>
                                                <td>{$payment@iteration}</td>
                                                <td>{$system['system_currency_symbol']}{$payment['amount']|number_format:2}
                                                </td>
                                                <td>
                                                    {if $payment['method'] == "custom"}
                                                    {$system['affiliate_payment_method_custom']}
                                                    {else}
                                                    {$payment['method']|ucfirst}
                                                    {/if}
                                                </td>
                                                <td>{$payment['method_value']}</td>
                                                <td>
                                                    <span class="js_moment"
                                                        data-time="{$payment['time']}">{$payment['time']}</span>
                                                </td>
                                                <td>
                                                    {if $payment['status'] == '0'}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-warning">{__("Pending")}</span>
                                                    {elseif $payment['status'] == '1'}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-success">{__("Approved")}</span>
                                                    {else}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-danger">{__("Declined")}</span>
                                                    {/if}
                                                </td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                </div>
                                {else}
                                <p class="text-center text-muted">
                                    {__("No withdrawal history")}
                                </p>
                                {/if}
                            </div>
                            {/if}
                        </div>

                        {elseif $view == "points"}
                        <div class="card-header with-icon">{__("Points")}
                        </div>
                        <div class="card-body">
                            {if $sub_view == ""}
                            <div class="alert pointsWrap">
                                <div class="icon">
                                    <i class="fa fa-piggy-bank fa-2x"></i>
                                </div>
                                <div class="text">
                                    <strong>{__("Points System")}</strong><br>
                                    {__("Each")} <strong>{$system['points_per_currency']}</strong> {__("points equal")}
                                    <strong>{$system['system_currency_symbol']}1</strong>.
                                    <br>
                                    {__("Your daily points limit is")} <strong><span
                                            class="badge badge-pill badge-warning">{if
                                            $system['packages_enabled'] &&
                                            $user->_data['user_subscribed']}{$system['points_limit_pro']}{else}{$system['points_limit_user']}{/if}</span></strong>
                                    {__("Points")}, {__("You have")} <strong><span
                                            class="badge badge-pill badge-danger">{$remaining_points}</span></strong>
                                    {__("remaining points")}
                                    <br>
                                    {__("Your daily points limit will be reset after 24 hours from your last valid
                                    earned action
                                    (post, comment, reaction)")}
                                    <br>
                                    {if $system['points_money_withdraw_enabled']}
                                    {__("You can withdraw your money")}
                                    {/if}
                                    {if $system['points_money_transfer_enabled']}
                                    {if $system['points_money_withdraw_enabled']}{__("or")} {/if}
                                    {__("You can transfer your money to your")} <a class="alert-link"
                                        href="{$system['system_url']}/wallet"><i class="fa fa-wallet"></i>
                                        {__("wallet")}</a>
                                    {/if}
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-sm-4">
                                    <div class="stat-panel border">
                                        <div class="stat-cell">
                                            <i class="fa fa-newspaper icon "></i>
                                            <span class="text-xlg">{$system['points_per_post']}</span><br>
                                            <span class="text-lg">{__("Points")}</span><br>
                                            <span>{__("For creating a new post")}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="stat-panel border">
                                        <div class="stat-cell">
                                            <i class="fa fa-comments icon "></i>
                                            <span class="text-xlg">{$system['points_per_comment']}</span><br>
                                            <span class="text-lg">{__("Points")}</span><br>
                                            <span>{__("For commenting any post")}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="stat-panel border">
                                        <div class="stat-cell">
                                            <i class="fa fa-thumbs-up icon "></i>
                                            <span class="text-xlg">{$system['points_per_reaction']}</span><br>
                                            <span class="text-lg">{__("Points")}</span><br>
                                            <span>{__("For reacting on any post")}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- points balance -->
                                <div class="col-sm-6">
                                    <div class="section-title mb20" style="text-align:left;">
                                        <i class="fa fa-coins mr10"></i>{__("Your Points Balance")}
                                    </div>
                                    <div class="stat-panel bg-gradient-info">
                                        <div class="stat-cell">
                                            <!-- <i class="fa fa-coins bg-icon"></i> -->
                                            <div class="h3 mtb10">
                                                {$user->_data['user_points']} {__("Points")}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- points balance -->

                                <!-- money balance -->
                                <div class="col-sm-6">
                                    <div class="section-title mb20" style="text-align: left;">
                                        <i class="fas fa-donate mr10"></i>{__("Your Money Balance")}
                                    </div>
                                    <div class="stat-panel bg-gradient-info">
                                        <div class="stat-cell">
                                            <!-- <i class="fa fas fa-donate bg-icon"></i> -->
                                            <div class="h3 mtb10">
                                                {$system['system_currency_symbol']}{((1/$system['points_per_currency'])*$user->_data['user_points'])|number_format:2}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- money balance -->
                            </div>
                            {elseif $sub_view == "payments"}
                            <div class="heading-small mb20">
                                {__("Withdrawal Request")}
                            </div>
                            <div class="pl-md-4">
                                <form class="js_ajax-forms " data-url="users/withdraw.php?type=points">
                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Your Balance")}
                                        </label>
                                        <div class="col-md-9">
                                            <h6>
                                                <span class="badge badge-lg badge-info">
                                                    {$system['system_currency_symbol']}{((1/$system['points_per_currency'])*$user->_data['user_points'])|number_format:2}
                                                </span>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Amount")} ({$system['system_currency']})
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="amount">
                                            <span class="form-text">
                                                {__("The minimum withdrawal request amount is")}
                                                {$system['system_currency_symbol']}{$system['points_min_withdrawal']}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Payment Method")}
                                        </label>
                                        <div class="col-md-9">
                                            {if in_array("paypal", $system['points_payment_method_array'])}
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="method" id="method_paypal" value="paypal"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="method_paypal">{__("PayPal")}</label>
                                            </div>
                                            {/if}
                                            {if in_array("skrill", $system['points_payment_method_array'])}
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="method" id="method_skrill" value="skrill"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="method_skrill">{__("Skrill")}</label>
                                            </div>
                                            {/if}
                                            {if in_array("bank", $system['points_payment_method_array'])}
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="method" id="method_bank" value="bank"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="method_bank">{__("Bank
                                                    Transfer")}</label>
                                            </div>
                                            {/if}
                                            {if in_array("custom", $system['points_payment_method_array'])}
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="method" id="method_custom" value="custom"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="method_custom">{__($system['points_payment_method_custom'])}</label>
                                            </div>
                                            {/if}
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <label class="col-md-3 form-control-label">
                                            {__("Transfer To")}
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="method_value">
                                        </div>
                                    </div>

                                    <div class="form-group form-row">
                                        <div class="col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-success btn-antier-green">{__("Make a
                                                withdrawal")}</button>
                                        </div>
                                    </div>

                                    <!-- success -->
                                    <div class="alert alert-success mb0 x-hidden"></div>
                                    <!-- success -->

                                    <!-- error -->
                                    <div class="alert alert-danger mb0 x-hidden"></div>
                                    <!-- error -->
                                </form>
                            </div>

                            <div class="divider"></div>

                            <div class="heading-small mb20">
                                {__("Withdrawal History")}
                            </div>
                            <div class="pl-md-4">
                                {if $payments}
                                <div class="table-responsive mt20">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>{__("ID")}</th>
                                                <th>{__("Amount")}</th>
                                                <th>{__("Method")}</th>
                                                <th>{__("Transfer To")}</th>
                                                <th>{__("Time")}</th>
                                                <th>{__("Status")}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach $payments as $payment}
                                            <tr>
                                                <td>{$payment@iteration}</td>
                                                <td>{$system['system_currency_symbol']}{$payment['amount']|number_format:2}
                                                </td>
                                                <td>
                                                    {if $payment['method'] == "custom"}
                                                    {$system['points_payment_method_custom']}
                                                    {else}
                                                    {$payment['method']|ucfirst}
                                                    {/if}
                                                </td>
                                                <td>{$payment['method_value']}</td>
                                                <td>
                                                    <span class="js_moment"
                                                        data-time="{$payment['time']}">{$payment['time']}</span>
                                                </td>
                                                <td>
                                                    {if $payment['status'] == '0'}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-warning">{__("Pending")}</span>
                                                    {elseif $payment['status'] == '1'}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-success">{__("Approved")}</span>
                                                    {else}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-danger">{__("Declined")}</span>
                                                    {/if}
                                                </td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                </div>
                                {else}
                                <p class="text-center text-muted">
                                    {__("No withdrawal history")}
                                </p>
                                {/if}
                            </div>
                            {/if}
                        </div>

                        {elseif $view == "coinpayments"}
                        <div class="card-header with-icon">{__("CoinPayments Transactions")}
                        </div>
                        <div class="card-body">
                            <div class="heading-small mb20">
                                {__("Transactions History")}
                            </div>
                            <div class="pl-md-4">
                                {if $coinpayments_transactions}
                                <div class="table-responsive mt20">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>{__("ID")}</th>
                                                <th>{__("Product")}</th>
                                                <th>{__("Amount")}</th>
                                                <th>{__("Created")}</th>
                                                <th>{__("Updated")}</th>
                                                <th>{__("Status")}</th>
                                                <th>{__("Status Message")}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach $coinpayments_transactions as $transaction}
                                            <tr>
                                                <td>{$transaction@iteration}</td>
                                                <td>{$transaction['product']}</td>
                                                <td>{$system['system_currency_symbol']}{$transaction['amount']}</td>
                                                <td>
                                                    <span class="js_moment"
                                                        data-time="{$transaction['created_at']}">{$transaction['created_at']}</span>
                                                </td>
                                                <td>
                                                    <span class="js_moment"
                                                        data-time="{$transaction['last_update']}">{$transaction['last_update']}</span>
                                                </td>
                                                <td>
                                                    {if $transaction['status'] == '-1'}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-danger">{__("Error")}</span>
                                                    {elseif $transaction['status'] == '0'}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-info">{__("Processing")}</span>
                                                    {elseif $transaction['status'] == '1'}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-warning">{__("Pending")}</span>
                                                    {elseif $transaction['status'] == '2'}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-success">{__("Complete")}</span>
                                                    {/if}
                                                </td>
                                                <td>
                                                    {if $transaction['status'] == '-1'}
                                                    {__("Error while processing your payment")}
                                                    {else}
                                                    {$transaction['status_message']}
                                                    {/if}
                                                </td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                </div>
                                {else}
                                <p class="text-center text-muted">
                                    {__("No transactions history")}
                                </p>
                                {/if}
                            </div>
                        </div>

                        {elseif $view == "bank"}
                        <div class="card-header with-icon">{__("Bank Transfers")}
                        </div>
                        <div class="card-body">
                            <div class="heading-small mb20">
                                {__("Transfers History")}
                            </div>
                            <div class="pl-md-4">
                                {if $transfers}
                                <div class="table-responsive mt20">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>{__("ID")}</th>
                                                <th>{__("Type")}</th>
                                                <th>{__("Time")}</th>
                                                <th>{__("Status")}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach $transfers as $transfer}
                                            <tr>
                                                <td>{$transfer@iteration}</td>
                                                <td>
                                                    {if $transfer['handle'] == "wallet"}
                                                    {__("Add Wallet Balance")} =
                                                    <strong>{$system['system_currency_symbol']}{$transfer['price']}</strong>
                                                    {elseif $transfer['handle'] == "packages"}
                                                    {$transfer['package_name']} {__("Package")} =
                                                    <strong>{$system['system_currency_symbol']}{$transfer['package_price']}</strong>
                                                    {/if}
                                                </td>
                                                <td>
                                                    <span class="js_moment"
                                                        data-time="{$transfer['time']}">{$transfer['time']}</span>
                                                </td>
                                                <td>
                                                    {if $transfer['status'] == '0'}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-warning">{__("Pending")}</span>
                                                    {elseif $transfer['status'] == '1'}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-success">{__("Approved")}</span>
                                                    {else}
                                                    <span
                                                        class="badge badge-pill badge-lg badge-danger">{__("Declined")}</span>
                                                    {/if}
                                                </td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                </div>
                                {else}
                                <p class="text-center text-muted">
                                    {__("No transfers history")}
                                </p>
                                {/if}
                            </div>
                        </div>

                        {elseif $view == "verification"}
                        <div class="card-header with-icon">{__("Verification")}
                        </div>
                        {if $case == "verified"}
                        <div class="card-body">
                            <div class="text-center">
                                <!-- <div class="big-icon success">
                                    <i class="fa fa-thumbs-up fa-3x"></i>
                                </div> -->
                                <img width="40px" height="40px"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_localhub.svg">
                                <h4>{__("Congratulations")}</h4>
                                <p class="mt20">{__("This account is verified")}</p>
                            </div>
                        </div>
                        {elseif $case == "request"}
                        <form class="js_ajax-forms " data-url="users/verify.php?node=user">
                            <div class="card-body">
                                <div class="form-group form-row">
                                    <div class="col-md-12">
                                        <label class="form-control-label">
                                            {__("Verification Documents")}
                                        </label>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="section-title mb20"
                                                    style="background-color: transparent;display: flex;align-items: center;">
                                                    <img alt="image" title="Upload Image" class="mr5"
                                                        src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/photo_message_icon.svg" />{__("Your
                                                    Photo")}
                                                </div>
                                                <div class="x-image full">
                                                    <button type="button" class="close x-hidden js_x-image-remover"
                                                        title='{__("Remove")}'>
                                                        <span>×</span>
                                                    </button>
                                                    <div class="x-image-loader">
                                                        <div class="progress x-progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img alt="image" data-handle="x-image" class="mr5 js_x-uploader"
                                                        src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/photo_message_iconHover.svg" />
                                                    <input type="hidden" class="js_x-image-input" name="photo" value="">
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="section-title mb20"
                                                    style="background-color: transparent;display: flex;align-items: center;">
                                                    <img alt="image" title="Upload Id Image" class="mr5"
                                                        src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/coloredpostHover.svg" />{__("Passport
                                                    or National ID")}
                                                </div>
                                                <div class="x-image full">
                                                    <button type="button" class="close x-hidden js_x-image-remover"
                                                        title='{__("Remove")}'>
                                                        <span>×</span>
                                                    </button>
                                                    <div class="x-image-loader">
                                                        <div class="progress x-progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img alt="image" data-handle="x-image" class="mr5 js_x-uploader"
                                                        src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/photo_message_iconHover.svg" />
                                                    <!-- <i class="fa fa-camera fa-2x " ></i> -->
                                                    <input type="hidden" class="js_x-image-input" name="passport"
                                                        value="">
                                                </div>
                                            </div>
                                        </div>
                                        <span class="form-text">
                                            {__("Please attach your photo and your Passport or National ID")}
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group form-row">

                                    <div class="col-md-12">
                                        <label class="form-control-label">
                                            {__("Additional Information")}
                                        </label>
                                        <textarea class="form-control" name="message"></textarea>
                                        <span class="form-text">
                                            {__("Please share why your account should be verified")}
                                        </span>
                                    </div>
                                </div>

                                <!-- success -->
                                <div class="alert alert-success mb0 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-left">
                                <button type="submit" class="btn btn-success settingBlackButton">
                                    <!-- <i class="fa fa-check-circle mr10"></i> -->
                                    {__("Send Verification Request")}
                                </button>
                            </div>
                        </form>
                        {elseif $case == "pending"}
                        <div class="card-body">
                            <div class="text-center">
                                <img width="40px" height="40px" class="mb20"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/ClockWaiting.svg">
                                <h4>{__("Pending")}</h4>
                                <p class="mt20">{__("Your verification request is still awaiting admin approval")}</p>
                            </div>
                        </div>
                        {elseif $case == "declined"}
                        <div class="card-body">
                            <div class="text-center">
                                <img width="40px" height="40px" class="mb20"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/modelCross.svg">
                                <h4>{__("Sorry")}</h4>
                                <p class="mt20">{__("Your verification request has been declined by the admin")}</p>
                            </div>
                        </div>
                        {/if}

                        {elseif $view == "blocking"}
                        <div class="card-header with-icon">{__("Manage Blocking")}
                        </div>
                        <div class="card-body">
                            <div class="alert ">
                                <div class="icon">
                                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                                </div>
                                <div class="text pt5">
                                    {__("Once you block someone, that person can no longer see things you post on your
                                    timeline")}
                                </div>
                            </div>
                            {if $blocks}
                            <ul>
                                {foreach $blocks as $_user}
                                {include file='__feeds_user.tpl' _tpl="list" _connection="blocked"}
                                {/foreach}
                            </ul>

                            {if count($blocks) >= $system['max_results']}
                            <!-- see-more -->
                            <div class="alert alert-info see-more js_see-more" data-get="blocks">
                                <span>{__("Load More")}</span>
                                <div class="loader loader_small x-hidden"></div>
                            </div>
                            <!-- see-more -->
                            {/if}
                            {else}
                            <p class="text-center text-muted">
                                {__("No blocked users")}
                            </p>
                            {/if}
                        </div>

                        {elseif $view == "information"}
                        <div class="card-header with-icon">{__("Download Your Information")}</div>
                        <form class="js_ajax-forms" data-url="users/information.php">
                            <div class="card-body">
                                <div style="padding-bottom: 30px;">
                                    <div style="display: flex;align-items: flex-start;">
                                        <img width="20px" height="20px" class="mr10"
                                            src="{$system['system_url']}/content/themes/default/images/svg/Download.svg" />
                                        <div class="text">
                                            <strong style="font-size:16px">{__("Download Your
                                                Information")}</strong><br>
                                            <p style="color: rgb(167, 180, 203);">{__("You can download all of it at
                                                once, or you can select only the types of information
                                                you want")}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb20" style="font-size: 16px;">
                                    <strong>{__("Select which information you would like to download")}</strong>
                                </div>
                                <!-- download options -->
                                <div class="text-center">
                                    <!-- Information -->
                                    <!-- <input class="x-hidden input-label" type="checkbox" name="download_information"/> -->
                                    <label class="informationMainWrap" for="download_information">
                                        <div class="InformationIconName">
                                            <span class="settingInfoImageHover">
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/infoIcon.svg" />
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/infoIconHover.svg" />
                                            </span>
                                            <div class="title">{__("Info")}</div>
                                        </div>
                                        <div class="settingToggleButtonInfo">
                                            <label class="switch" for="download_information">
                                                <input type="checkbox" name="download_information"
                                                    id="download_information" {if
                                                    $user->_data['download_information']}checked{/if}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </label>
                                    <!-- Information -->
                                    <!-- Friends -->
                                    <!-- <input class="x-hidden input-label" type="checkbox" name="download_friends"id="download_friends" /> -->
                                    <label class="informationMainWrap" for="download_friends">
                                        <div class="InformationIconName">
                                            <span class="settingInfoImageHover">
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/friendsIcon.svg" />
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/friendsIconHover.svg" />
                                            </span>
                                            <div class="title">{__("Friends")}</div>
                                        </div>
                                        <div class="settingToggleButtonInfo">
                                            <label class="switch" for="download_friends">
                                                <input type="checkbox" name="download_friends" id="download_friends" {if
                                                    $user->_data['download_friends']}checked{/if}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </label>
                                    <!-- Friends -->
                                    <!-- Followings -->
                                    <!-- <input class="x-hidden input-label" type="checkbox" name="download_followings"id="download_followings" /> -->
                                    <label class="informationMainWrap" for="download_followings">
                                        <div class="InformationIconName">
                                            <span class="settingInfoImageHover">
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg" />
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend_iconHover.svg" />
                                            </span>
                                            <div class="title">{__("Followings")}</div>
                                        </div>
                                        <div class="settingToggleButtonInfo">
                                            <label class="switch" for="download_followings">
                                                <input type="checkbox" name="download_followings"
                                                    id="download_followings" {if
                                                    $user->_data['download_followings']}checked{/if}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </label>
                                    <!-- Followings -->
                                    <!-- Followers -->
                                    <!-- <input class="x-hidden input-label" type="checkbox" name="download_followers"id="download_followers" /> -->
                                    <label class="informationMainWrap" for="download_followers">
                                        <div class="InformationIconName">
                                            <span class="settingInfoImageHover">
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/friendsIcon.svg" />
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/friendsIconHover.svg" />
                                            </span>
                                            <div class="title">{__("Followers")}</div>
                                        </div>
                                        <div class="settingToggleButtonInfo">
                                            <label class="switch" for="download_followers">
                                                <input type="checkbox" name="download_followers" id="download_followers"
                                                    {if $user->_data['download_followers']}checked{/if}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </label>
                                    <!-- Followers -->
                                    <!-- Pages -->
                                    <!-- <input class="x-hidden input-label" type="checkbox" name="download_pages"id="download_pages" /> -->
                                    <label class="informationMainWrap" for="download_pages">
                                        <div class="InformationIconName">
                                            <span class="settingInfoImageHover">
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/apps_icon.svg" />
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/apps_icon_hover.svg" />
                                            </span>
                                            <div class="title">{__("Pages")}</div>
                                        </div>
                                        <div class="settingToggleButtonInfo">
                                            <label class="switch" for="download_pages">
                                                <input type="checkbox" name="download_pages" id="download_pages" {if
                                                    $user->_data['download_pages']}checked{/if}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </label>
                                    <!-- Pages -->
                                    <!-- Groups -->
                                    <!-- <input class="x-hidden input-label" type="checkbox" name="download_groups"id="download_groups" /> -->
                                    <label class="informationMainWrap" for="download_groups">
                                        <div class="InformationIconName">
                                            <span class="settingInfoImageHover">
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_adHub.svg" />
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_adHub_active.svg" />
                                            </span>
                                            <div class="title">{__("Groups")}</div>
                                        </div>
                                        <div class="settingToggleButtonInfo">
                                            <label class="switch" for="download_groups">
                                                <input type="checkbox" name="download_groups" id="download_groups" {if
                                                    $user->_data['download_groups']}checked{/if}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </label>
                                    <!-- Groups -->
                                    <!-- Events -->
                                    <!-- <input class="x-hidden input-label" type="checkbox" name="download_events"id="download_events" /> -->
                                    <label class="informationMainWrap" for="download_events">
                                        <div class="InformationIconName">
                                            <span class="settingInfoImageHover">
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/calendar.svg" />
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/svg/calendarHover.svg" />
                                            </span>
                                            <div class="title">{__("Events")}</div>
                                        </div>
                                        <div class="settingToggleButtonInfo">
                                            <label class="switch" for="download_events">
                                                <input type="checkbox" name="download_events" id="download_events" {if
                                                    $user->_data['download_events']}checked{/if}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </label>
                                    <!-- Events -->
                                    <!-- Posts -->
                                    <!-- <input class="x-hidden input-label" type="checkbox" name="download_posts" id="download_posts" /> -->
                                    <label class="informationMainWrap" for="download_posts">
                                        <div class="InformationIconName">
                                            <span class="settingInfoImageHover">
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/headerplusblack.png" />
                                                <img width="25px" height="25px"
                                                    src="{$system['system_url']}/content/themes/default/images/headerplusblue.png" />
                                            </span>
                                            <div class="title">{__("Posts")}</div>
                                        </div>

                                        <div class="settingToggleButtonInfo">
                                            <label class="switch" for="download_posts">
                                                <input type="checkbox" name="download_posts" id="download_posts" {if
                                                    $user->_data['download_posts']}checked{/if}>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </label>
                                    <!-- Posts -->
                                </div>
                                <!-- download options -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 mt20 x-hidden"></div>
                                <!-- error -->

                            </div>
                            <div class="card-footer text-left">
                                <button type="submit" class="btn btn-success settingBlackButton">{__("Create
                                    File")}</button>
                            </div>
                        </form>

                        {elseif $view == "apps"}
                        <div class="card-header with-icon">{__("Apps")}
                        </div>
                        <div class="card-body">
                            <div class="alert ">
                                <div class="icon">
                                    <i class="fa fa-cubes fa-2x"></i>
                                </div>
                                <div class="text">
                                    <strong>{__("Apps")}</strong><br>
                                    {__("These are apps you've used to log into. They can receive information you chose
                                    to share
                                    with them.")}
                                </div>
                            </div>

                            {if $apps}
                            {foreach $apps as $app}
                            <div class="form-table-row {if $app@last}mb0{/if}">
                                <div class="avatar">
                                    <img class="tbl-image app-icon"
                                        src="{$system['system_uploads']}/{$app['app_icon']}">
                                </div>
                                <div>
                                    <div class="form-control-label h6 mb5">{$app['app_name']}</div>
                                    <div class="form-text d-none d-sm-block">{$app['app_description']}</div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-sm btn-danger js_delete-user-app"
                                        data-id="{$app['app_auth_id']}">
                                        <i class="fas fa-trash mr5"></i>{__("Remove")}
                                    </button>
                                </div>
                            </div>
                            {/foreach}
                            {else}
                            <p class="text-center text-muted">
                                {__("No apps available")}
                            </p>
                            {/if}
                        </div>

                        {elseif $view == "delete"}
                        <div class="card-header with-icon">{__("Delete Account")}
                        </div>
                        <div class="card-body">
                            <div class="alert deleteAccountChanges"
                                style=" display: flex;flex-direction: column;align-items: center;justify-content: center;">
                                <img class="mb20" style="margin: 0 auto;" height="50%"
                                    src="{$system['system_url']}/content/themes/default/images/svg/svgImg/deletePage.png" />
                                <div style="color: #1E1F20;font-size: 20px;font-weight: 600;">
                                    {__("Once you delete your account you will no longer can access it again")}
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-md btn-danger js_delete-user" style="background-color: #FF4E4E;">
                                    <i class="fa fa-trash mr10"></i>{__("Delete My Account")}
                                </button>
                            </div>
                        </div>

                        {/if}

                    </div>
                </div>
                <!-- right panel -->
                <div class="right-sidebar js_sticky-sidebar ">
                    {include file='right-sidebar.tpl'}
                </div>
                <!-- right panel -->
            </div>
        </div>
        {/if}
        <!-- right panel -->

    </div>
</div>
<!-- page content -->

{include file='_footer.tpl'}