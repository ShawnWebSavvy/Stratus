{if $_tpl == "box"}
<div class="col-md-6 col-lg-4 mb10 {$_user['connection']}">
    <div class="ui-box">
        <div class="img">
            <a href="{$system['system_url']}/{$_user['user_name']}">
                <img alt="{$_user['user_firstname']} {$_user['user_lastname']}" src="{$_user['user_picture']}" />
            </a>
        </div>
        <div class="mt10">
            <span class="js_user-popover" data-uid="{$_user['user_id']}">
                <a class="h6" href="{$system['system_url']}/{$_user['user_name']}"
                    title="{$_user['user_firstname']} {$_user['user_lastname']}">
                    {$_user['user_firstname']} {$_user['user_lastname']}
                </a>
            </span> {if $_user['user_verified']}
            <i data-toggle="tooltip" data-placement="top" title='{__("Verified User")}'
                class="fa fa-check-circle fa-fw verified-badge"></i> {/if} {if $_user['user_subscribed']}
            <i data-toggle="tooltip" data-placement="top" title='{__("Pro User")}'
                class="fa fa-bolt fa-fw pro-badge"></i> {/if}
        </div>
        <div class="mt10">
            <!-- buttons -->
            {if $_connection == "request"}
            <button type="button" class="btn  btn-primary js_friend-accept" data-uid="{$_user['user_id']}"> <span
                    class="request_dlt">
                    <img
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/delete_icon.svg">
                </span>
                <span class="request_aspct"><img
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/tick.svg">
                </span>
                {__("Confirm")}

            </button>
            <button type="button" class="btn  btn-danger js_friend-decline" data-uid="{$_user['user_id']}"><span
                    class="request_dlt">
                    <img
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/delete_icon.svg">
                </span>
                {__("Delete")}
            </button> {elseif $_connection == "add"}
            <button type="button" class="btn  btn-success js_friend-add" data-uid="{$_user['user_id']}">
                <!-- <i class="fa fa-plus mr5"></i> -->
                <img class="btn_image_"
                    src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                <img class="btn_image_hover"
                    src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                {if $_small}{__("Add")}{else}{__("Add Friend ")}{/if}
            </button> {elseif $_connection == "cancel"}
            <button type="button" class="btn btn-warning js_friend-cancel"
                style="display: flex;align-items: center;padding: 7px 11px;margin: 0 auto;"
                data-uid="{$_user['user_id']}">
                <img class="btn_image_"
                    src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/tick.svg">
                Request Sent
            </button> {elseif $_connection == "remove"}
            <button type="button" class="btn  btn-success {if !$_no_action}btn-delete{/if} js_friend-remove"
                data-uid="{$_user['user_id']}">
                <img class="btn_image"
                    src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/newchecked1.svg">
                <img class="btn_image_hover"
                    src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/delete_icon.svg">

                <span class="btn_image_"> {__("Friends")} </span>
                <span class="btn_image_hover"> {__("Delete")} </span>
            </button> {elseif $_connection == "follow"}
            <button type="button" class="btn  btn-info js_follow" data-uid="{$_user['user_id']}">
                <i class="fa fa-rss mr5"></i>{__("Follow")}
            </button> {elseif $_connection == "unfollow"}
            <button type="button" class="btn  btn-info js_unfollow" data-uid="{$_user['user_id']}">
                <i class="fa fa-check mr5"></i>{__("Following")}
            </button> {elseif $_connection == "blocked"}
            <button type="button" class="btn  btn-danger js_unblock-user" data-uid="{$_user['user_id']}">
                <i class="fa fa-trash mr5"></i>{__("Unblock")}
            </button> {elseif $_connection == "page_invite"}
            <button type="button" class="btn js_page-invite" data-id="{$_user['node_id']}"
                data-uid="{$_user['user_id']}">
                <img class="btn_image_"
                    src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                <img class="btn_image_hover"
                    src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                {__("Invite")}
            </button> {elseif $_connection == "page_manage"}
            <button type="button" class="btn btn-danger js_page-member-remove" data-id="{$_user['node_id']}"
                data-uid="{$_user['user_id']}">
                <i class="fa fa-trash mr5"></i>
            </button> {if $_user['i_admin']}
            <button type="button" class="btn btn-danger js_page-admin-remove" data-id="{$_user['node_id']}"
                data-uid="{$_user['user_id']}">
                {__("Remove Admin")}
            </button> {else}
            <button type="button" class="btn btn-primary js_page-admin-addation" data-id="{$_user['node_id']}"
                data-uid="{$_user['user_id']}">
                {__("Make Admin")}
            </button> {/if} {elseif $_connection == "group_invite"}
            <button type="button" class="btn  btn-info js_group-invite" data-id="{$_user['node_id']}"
                data-uid="{$_user['user_id']}">
                <span class="btns_img">
                    <img class="btn_image_"
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                    <img class="btn_image_hover"
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                </span>
                </i>{__("Add")}
            </button> {elseif $_connection == "group_request"}
            <button type="button" class="btn  btn-primary js_group-request-accept" data-id="{$_user['node_id']}"
                data-uid="{$_user['user_id']}">{__("Approve")}</button>
            <button type="button" class="btn  btn-danger js_group-request-decline" data-id="{$_user['node_id']}"
                data-uid="{$_user['user_id']}">{__("Decline")}</button> {elseif $_connection == "group_manage"}
            <button type="button" class="btn  btn-danger js_group-member-remove" data-id="{$_user['node_id']}"
                data-uid="{$_user['user_id']}">
                <i class="fa fa-trash mr5"></i>
            </button> {if $_user['i_admin']}
            <button type="button" class="btn  btn-danger js_group-admin-remove" data-id="{$_user['node_id']}"
                data-uid="{$_user['user_id']}">
                {__("Remove Admin")}
            </button> {else}
            <button type="button" class="btn  btn-primary js_group-admin-addation" data-id="{$_user['node_id']}"
                data-uid="{$_user['user_id']}">
                {__("Make Admin")}
            </button> {/if} {elseif $_connection == "event_invite"}
            <button type="button" class="btn  btn-info js_event-invite" data-id="{$_user['node_id']}"
                data-uid="{$_user['user_id']}">
                <i class="fa fa-user-plus mr5"></i> {__("Invite")}
            </button> {/if}
            <!-- buttons -->
        </div>
    </div>
</div>
{elseif $_tpl == "list"}
{if $_user['user_id'] > 0}
<li class="feeds-item" {if $_user['id']}data-id="{$_user['id']}" {/if}>
    <div class="data-container searchSectionWrap ssdssd">
        <div class="_user_detail_sec hmmm">
            <div class="user__imgs">
                <a class="data-avatar" href="{$system['system_url']}/{$_user['user_name']}{if $_search}?ref=qs{/if}">
                    <img class="lazyload" data-src="{$_user['user_picture']}"
                        alt="{$_user['user_firstname']} {$_user['user_lastname']}"> {if
                    $_reaction}
                    <div class="data-reaction">
                        <div class="inline-emoji no_animation">
                            {include file='__reaction_emojis.tpl' _reaction=$_reaction}
                        </div>
                    </div>
                    {/if}
                </a>
            </div>
            <div class="userNameWrap _user_details" style="width:100%;">
                <div class="mt5">
                    <span class="name js_user-popover {$_user['user_lastname']}" data-uid="{$_user['user_id']}">
                        <a href="{$system['system_url']}/{$_user['user_name']}{if $_search}?ref=qs{/if}">{$_user['user_firstname']}
                            {$_user['user_lastname']}</a>
                    </span> {if $_user['user_verified']}
                    <i data-toggle="tooltip" data-placement="top" title='{__("Verified User")}'
                        class="fa fa-check-circle fa-fw verified-badge"></i> {/if} {if $_user['user_subscribed']}
                    <i data-toggle="tooltip" data-placement="top" title='{__("Pro User")}'
                        class="fa fa-bolt fa-fw pro-badge"></i> {/if}
                </div>
                <div class="userlocation">
                    {if $_user['user_country_name']}
                    <span>{$_user['user_country_name']}</span> {/if} {if $_user['user_current_city']}
                    <span>{$_user['user_current_city']}</span> {/if}
                </div>
                {if $_connection != "me" && $_user['mutual_friends_count'] > 0}
                <div>
                    <span class="text-underline" data-toggle="modal"
                        data-url="users/mutual_friends.php?uid={$_user['user_id']}">{$_user['mutual_friends_count']}
                        {__("mutual friends")}</span>
                </div>
                {/if}
            </div>
        </div>
        <div class="data-content usernamesWrapBlock">
            <div class="float-right _user_action_">
                <!-- buttons -->
                {if $_connection == "request"}
                <button type="button" class="btn  btn-primary js_friend-accept" data-uid="{$_user['user_id']}"> <span
                        class="request_aspct"><img
                            src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/tick.svg">
                    </span>
                    {__("Confirm")}
                </button>
                <button type="button" class="btn  btn-danger js_friend-decline" data-uid="{$_user['user_id']}"><span
                        class="request_dlt">
                        <img
                            src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/delete_icon.svg">
                    </span>
                    {__("Delete")}
                </button> {elseif $_connection == "add"}
                <button type="button" class="btn  btn-success js_friend-add" data-uid="{$_user['user_id']}">
                    <img class="btn_image_"
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                    <img class="btn_image_hover"
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                    {if !$_small} {__("Add Friend")}{/if}
                </button> {elseif $_connection == "cancel"}
                <button type="button" class="btn  btn-warning js_friend-cancel" data-uid="{$_user['user_id']}">
                    <img class="btn_image_"
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/tick.svg">{__("Friend
                    Request Sent")}
                </button> {elseif $_connection == "remove"}
                <button type="button" class="btn  btn-success {if !$_no_action}btn-delete{/if} js_friend-remove"
                    data-uid="{$_user['user_id']}">
                    <img class="btn_image"
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/newchecked1.svg">
                    <img class="btn_image_hover"
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/delete_icon.svg">
                    <span class="btn_image_ {$page}"> {__("Friends")} </span>
                    <span class="btn_image_hover"> {__("Delete")} </span>
                </button> {elseif $_connection == "follow"}
                <button type="button" class="btn  btn-info js_follow" data-uid="{$_user['user_id']}">
                    <i class="fa fa-rss mr5"></i>{__("Follow")}
                </button> {elseif $_connection == "unfollow"}
                <button type="button" class="btn  btn-info js_unfollow" data-uid="{$_user['user_id']}">
                    <i class="fa fa-check mr5"></i>{__("Following")}
                </button> {elseif $_connection == "blocked"}
                <button type="button" class="btn  btn-danger js_unblock-user" data-uid="{$_user['user_id']}">
                    <i class="fa fa-trash mr5"></i>{__("Unblock")}
                </button> {elseif $_connection == "page_invite"}
                <button type="button" class="btn js_page-invite" data-id="{$_user['node_id']}"
                    data-uid="{$_user['user_id']}">
                    <img class="btn_image_"
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                    <img class="btn_image_hover"
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                    {__("Invite")}
                </button> {elseif $_connection == "page_manage"}
                <button type="button" class="btn btn-danger js_page-member-remove" data-id="{$_user['node_id']}"
                    data-uid="{$_user['user_id']}">
                    <i class="fa fa-trash mr5"></i>
                </button> {if $_user['i_admin']}
                <button type="button" class="btn btn-danger js_page-admin-remove" data-id="{$_user['node_id']}"
                    data-uid="{$_user['user_id']}">
                    {__("Remove Admin")}
                </button> {else}
                <button type="button" class="btn btn-primary js_page-admin-addation" data-id="{$_user['node_id']}"
                    data-uid="{$_user['user_id']}">
                    {__("Make Admin")}
                </button> {/if} {elseif $_connection == "group_invite"}
                <button type="button" class="btn  btn-info js_group-invite" data-id="{$_user['node_id']}"
                    data-uid="{$_user['user_id']}">
                    <span class="btns_img">
                        <img class="btn_image_"
                            src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                        <img class="btn_image_hover"
                            src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg">
                    </span>
                    {__("Add")}
                </button> {elseif $_connection == "group_request"}
                <button type="button" class="btn  btn-primary js_group-request-accept" data-id="{$_user['node_id']}"
                    data-uid="{$_user['user_id']}">{__("Approve")}</button>
                <button type="button" class="btn  btn-danger js_group-request-decline" data-id="{$_user['node_id']}"
                    data-uid="{$_user['user_id']}">{__("Decline")}</button> {elseif $_connection == "group_manage"}
                <button type="button" class="btn  btn-danger js_group-member-remove" data-id="{$_user['node_id']}"
                    data-uid="{$_user['user_id']}">
                    <i class="fa fa-trash mr5"></i>
                </button> {if $_user['i_admin']}
                <button type="button" class="btn  btn-danger js_group-admin-remove" data-id="{$_user['node_id']}"
                    data-uid="{$_user['user_id']}">
                    {__("Remove Admin")}
                </button> {else}
                <button type="button" class="btn  btn-primary js_group-admin-addation" data-id="{$_user['node_id']}"
                    data-uid="{$_user['user_id']}">
                    {__("Make Admin")}
                </button> {/if} {elseif $_connection == "event_invite"}
                <button type="button" class="btn  btn-info js_event-invite" data-id="{$_user['node_id']}"
                    data-uid="{$_user['user_id']}">
                    <img
                        src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg">
                    {__("Invite")}
                </button> {/if}
                <!-- buttons -->
            </div>
        </div>
    </div>
</li>
{/if}
{/if}