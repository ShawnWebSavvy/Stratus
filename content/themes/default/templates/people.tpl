{include file='_head.tpl'} {include file='_header.tpl'}

<!-- page content -->
<div class="container mt20 offcanvas">
    <div class="row">
        <div class="sidebar-left-ant offcanvas-sidebar js_sticky-sidebar" id="sidebarHiddSwip">
            {include file='_sidebar.tpl'}
        </div>
    </div>

    <div class="row right-side-content-ant">
        <!-- content panel -->
        <div class="col-lg-12 offcanvas-mainbar">
            <!-- tabs -->
            <!-- <div class="content-tabs custom-tabs clearfix">
                <ul>
                    <li {if $view=="" || $view=="find" }class="active" {/if}>
                        <a href="{$system['system_url']}/people">{__("Discover")}</a>
                    </li>`  
                    <li {if $view=="friend_requests" }class="active" {/if}>
                        <a href="{$system['system_url']}/people/friend_requests">
                            {__("Friend Requests")}
                            {if $user->_data['friend_requests']}
                            <span class="badge badge-lg badge-info ml5">{count($user->_data['friend_requests'])}</span>
                            {/if}
                        </a>
                    </li>
                    <li {if $view=="sent_requests" }class="active" {/if}>
                        <a href="{$system['system_url']}/people/sent_requests">
                            {__("Sent Requests")}
                            {if $user->_data['friend_requests_sent']}
                            <span
                                class="badge badge-lg badge-warning ml5">{count($user->_data['friend_requests_sent'])}</span>
                            {/if}
                        </a>
                    </li>
                </ul>
            </div> -->
            <!-- tabs -->

            <!-- content -->
            <div class="row">


                <!-- right panel -->
                <div class="col-lg-9 col-md-8 people-friend-list-section __user_action_panel _frnd_rqst_sec">
                    <div class="page_topbar d-flex align-item-center justify-content-between position-relative">
                        <div class="_search_sec">
                            <form>
                                <div class="form-group d-flex align-items-center m-0 ">
                                    <label class="">Friends</label>
                                    {* <input type="search" class="form-control-plaintext" placeholder="Search..."> *}
                                </div>
                            </form>
                        </div>
                        {* <div class="sort_by">
                            <div class="sorted_list d-flex align-items-center justify-content-center">
                                <span class="sort_text">Sort by:</span>
                                <div class="_select_box">
                                    <select class="form-control">
                                        <option>Popular</option>
                                        <option>Popular</option>
                                        <option>Popular</option>
                                    </select>
                                </div>
                            </div>
                        </div> *}
                        <button class="_toggle_btn" type="button"><i class="fas fa-ellipsis-v"></i> <i class="fas fa-times"></i></button>
                    </div>
                    <div class="row{if $view == 'find'} _findfriendsdiv_{/if}">
                        <div class="col-lg-6 col-xl-4">
                            <div class="row">
                                <div class="card bg-transparent _user__data _request_sec">
                                    {if $view == ""}
                                    <div class="card-header bg-transparent">
                                        <strong>{__("People You May Know")}</strong>
                                    </div>
                                    <div class="card-body">
                                        {if $people}
                                        <ul class="requstSectionwrap mainFullWidthWrap">
                                            {foreach $people as $_user} {include file='__feeds_user.tpl' _tpl="list"
                                            _connection="add"} {/foreach}
                                        </ul>
                                        <!-- see-more -->
                                        {if count($people) >= $system['min_results']}
                                        <div class="alert alert-info see-more js_see-more" data-get="new_people">
                                            <span>{__("Load More")}</span>
                                            <div class="loader loader_small x-hidden"></div>
                                        </div>
                                        {/if}
                                        <!-- see-more -->
                                        {else}
                                        <p class="text-center text-muted">{__("No people available")}</p>
                                        {/if}
                                    </div>

                                    {elseif $view == "find"}
                                    <div class="card-header bg-transparent">
                                        <strong>{__("Search Results")}</strong>
                                    </div>
                                    <div class="card-body ">
                                        {if count($people) > 0}
                                        <ul class="requstSectionwrap mainWrapSectionFullWidth">
                                            {foreach $people as $_user} {include file='__feeds_user.tpl' _tpl="list"
                                            _connection=$_user['connection']} {/foreach}
                                        </ul>
                                        {else}
                                        <p class="text-center text-muted">
                                            {__("No people available for your search")}
                                        </p>
                                        {/if}
                                    </div>
                                    {elseif $view == "friend_requests"}
                                    <div class="card-header bg-transparent">
                                        <h3>
                                            <strong>
                                            {__("Friend Request")}
                                            {* <a href="#"> <span class="see_btn ">See all</span></a> *}
                                            </strong>
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        {if $user->_data['friend_requests']}
                                        <ul class="requstSectionwrap">
                                            {foreach $user->_data['friend_requests'] as $_user} {include
                                            file='__feeds_user.tpl' _tpl="list" _connection="request"} {/foreach}
                                        </ul>
                                        {else}
                                        <p class="text-center text-muted">
                                            {__("No new requests")}
                                        </p>
                                        {/if}

                                        <!-- see-more -->
                                        {if count($user->_data['friend_requests']) >= $system['max_results']}
                                        <div class="alert alert-info see-more js_see-more" data-get="friend_requests">
                                            <span>{__("Load More")}</span>
                                            <div class="loader loader_small x-hidden"></div>
                                        </div>
                                        {/if}
                                        <!-- see-more -->
                                    </div>

                                    {elseif $view == "sent_requests"}
                                    <div class="card-header bg-transparent">
                                        <strong>{__("Friend Requests Sent")}</strong>
                                    </div>
                                    <div class="card-body">
                                        {if $user->_data['friend_requests_sent']}
                                        <ul class="requstSectionwrap">
                                            {foreach $user->_data['friend_requests_sent'] as $_user} {include
                                            file='__feeds_user.tpl' _tpl="list" _connection="cancel"} {/foreach}
                                        </ul>
                                        {else}
                                        <p class="text-center text-muted">
                                            {__("No new requests")}
                                        </p>
                                        {/if}

                                        <!-- see-more -->
                                        {if count($user->_data['friend_requests_sent']) >= $system['max_results']}
                                        <div class="alert alert-info see-more js_see-more"
                                            data-get="friend_requests_sent">
                                            <span>{__("Load More")}</span>
                                            <div class="loader loader_small x-hidden"></div>
                                        </div>
                                        {/if}
                                        <!-- see-more -->
                                    </div>

                                    {/if}

                                </div>
                            </div>
                        </div>
                        {* {if ($page !='people' || $view!='find')} *}
                        <div class="col-lg-6 col-xl-8 frndz_list_data">
                            <div class="card bg-transparent _user__data friend_list_panel">
                                <div class="card-header bg-transparent">
                                    <h3> <strong>{__("Friend List")}
                                            {* <a href="#"> <span class="see_btn ">See all</span></a> *}
                                        </strong></h3>
                                </div>
                            </div>
                            <div class="_friend_list_items _user__data">
                                {if $user->_data['friends']}
                                <ul class="d-flex">
                                    {foreach $user->_data['friends'] as $_user}
                                    {include file='__feeds_user.tpl' _tpl="list" _connection="remove"} {/foreach}
                                </ul>
                                <!-- see-more -->

                                <div class="alert alert-info see-more js_see-more" data-uid="{$user->_data['user_id']}"
                                    data-get="friends" data-page="people">
                                    <span>{__("Load More")}</span>
                                    <div class="loader loader_small x-hidden"></div>
                                </div>

                                <!-- see-more -->
                                {else}
                                <div class="__no_data_contet__ text-center">
                                    <p class="text-center text-muted">
                                        <img src="{$system['system_url']}/content/themes/default/images/no_results16.jpg"
                                            style="width: 100%;" alt="No friends">
                                    <h2 class="text-center _heading1_"> You don't have any friends yet</h2>
                                    <!-- {* {__("No new requests")} *} -->
                                    </p>
                                </div>
                                {/if}
                                {* <ul class="d-flex">
                                    <li class="feeds-item col-xl-6 col-lg-12 col-md-6">
                                        <div class="data-container ">
                                            <div class="_user_detail_sec">
                                                <div class="user__imgs">
                                                    <a class="data-avatar" href="{$system['system_url']}/manny"> <img
                                                            src="{$system['system_url']}/content/themes/default/images/user_defoult_img.jpg"
                                                            alt="Bob Mccullah"> </a>
                                                </div>
                                                <div class="userNameWrap _user_details">
                                                    <div class="mt5"> <span class="name js_user-popover" data-uid="52">
                                                            <a href="{$system['system_url']}/manny">Bob
                                                                Mccullah</a> </span> </div>
                                                    <div class="userlocation"> </div>
                                                    <div> <span class="text-underline" data-toggle="modal"
                                                            data-url="users/mutual_friends.php?uid=52">1
                                                            mutual friends</span> </div>
                                                </div>
                                            </div>
                                            <div class="data-content usernamesWrapBlock">
                                                <div class="float-right _user_action_">
                                                    <button type="button" class="btn  btn-danger frndz_btns"
                                                        data-uid="52">Friend</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="feeds-item col-xl-6 col-lg-12 col-md-6">
                                        <div class="data-container ">
                                            <div class="_user_detail_sec">
                                                <div class="user__imgs">
                                                    <a class="data-avatar" href="{$system['system_url']}/manny"> <img
                                                            src="{$system['system_url']}/content/themes/default/images/user_defoult_img.jpg"
                                                            alt="Bob Mccullah"> </a>
                                                </div>
                                                <div class="userNameWrap _user_details">
                                                    <div class="mt5"> <span class="name js_user-popover" data-uid="52">
                                                            <a href="{$system['system_url']}/manny">Bob
                                                                Mccullah</a> </span> </div>
                                                    <div class="userlocation"> </div>
                                                    <div> <span class="text-underline" data-toggle="modal"
                                                            data-url="users/mutual_friends.php?uid=52">1
                                                            mutual friends</span> </div>
                                                </div>
                                            </div>
                                            <div class="data-content usernamesWrapBlock">
                                                <div class="float-right _user_action_">
                                                    <button type="button" class="btn  btn-danger frndz_btns"
                                                        data-uid="52">Friend</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="feeds-item col-xl-6 col-lg-12 col-md-6">
                                        <div class="data-container ">
                                            <div class="_user_detail_sec">
                                                <div class="user__imgs">
                                                    <a class="data-avatar" href="{$system['system_url']}/manny"> <img
                                                            src="{$system['system_url']}/content/themes/default/images/user_defoult_img.jpg"
                                                            alt="Bob Mccullah"> </a>
                                                </div>
                                                <div class="userNameWrap _user_details">
                                                    <div class="mt5"> <span class="name js_user-popover" data-uid="52">
                                                            <a href="{$system['system_url']}/manny">Bob
                                                                Mccullah</a> </span> </div>
                                                    <div class="userlocation"> </div>
                                                    <div> <span class="text-underline" data-toggle="modal"
                                                            data-url="users/mutual_friends.php?uid=52">1
                                                            mutual friends</span> </div>
                                                </div>
                                            </div>
                                            <div class="data-content usernamesWrapBlock">
                                                <div class="float-right _user_action_">
                                                    <button type="button" class="btn  btn-danger frndz_btns"
                                                        data-uid="52">Friend</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="feeds-item col-xl-6 col-lg-12 col-md-6">
                                        <div class="data-container ">
                                            <div class="_user_detail_sec">
                                                <div class="user__imgs">
                                                    <a class="data-avatar" href="{$system['system_url']}/manny"> <img
                                                            src="{$system['system_url']}/content/themes/default/images/user_defoult_img.jpg"
                                                            alt="Bob Mccullah"> </a>
                                                </div>
                                                <div class="userNameWrap _user_details">
                                                    <div class="mt5"> <span class="name js_user-popover" data-uid="52">
                                                            <a href="{$system['system_url']}/manny">Bob
                                                                Mccullah</a> </span> </div>
                                                    <div class="userlocation"> </div>
                                                    <div> <span class="text-underline" data-toggle="modal"
                                                            data-url="users/mutual_friends.php?uid=52">1
                                                            mutual friends</span> </div>
                                                </div>
                                            </div>
                                            <div class="data-content usernamesWrapBlock">
                                                <div class="float-right _user_action_">
                                                    <button type="button" class="btn  btn-danger frndz_btns"
                                                        data-uid="52">Friend</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul> *}
                            </div>
                        </div>
                        {* {/if} *}
                    </div>
                </div>
                <!-- right panel -->

                <!-- left panel -->
                <div class="col-lg-3 col-md-4 people-form-section discover_sec">
                    <!-- search panel -->
                    <div class="card">
                        <div class="close_icons"><i class="fas fa-times"></i></div>
                        <div class="card-header sec-heading bg-transparent">
                            <strong>Discover</strong>
                            <!-- <i class="fa fa-search mr5"></i>{__("Search")} -->
                        </div>
                        <div class="card-body">
                            <form action="{$system['system_url']}/people/find" method="post">
                                <div class="form-group" {$system['system_distance']}>
                                    <label>{__("Distance")}</label>
                                    <div>
                                        <input type="range" class="custom-range" min="1" max="5000"
                                            value="{$distance_value}" name="distance_slider"
                                            oninput="this.form.distance_value.value=this.value">
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
                                <button type="submit" class="btn friendsSearchbtn cmn_btn " name="submit"><span
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
                <!-- left panel -->
            </div>
            <!-- content -->

        </div>
        <!-- content panel -->

    </div>
</div>
<!-- page content -->

{include file='_footer.tpl'}