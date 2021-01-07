<div class="card bg-transparent _user__data _request_sec">
    {if $view == ""}
        <div class="card-header bg-transparent">
            <strong>{__("People You May Know")}</strong>
        </div>
        <div class="card-body">
            {if $people}
            <ul class="requstSectionwrap">
                {foreach $people as $_user} {include file='global-profile/__feeds_user.tpl' _tpl="list" _connection="follow"} {/foreach}
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
            {* <p class="text-center text-muted">
                {__("No people available")}
            </p> *}
            <div class="__no_data_contet__ text-center">
                <p class="text-center text-muted">
                    <img src="{$system['system_url']}/content/themes/default/images/no_results16.jpg" style="width: 100%;" alt="No friends">
                    <h2 class="text-center _heading1_"> No suggestion available</h2>
                        {* {__("No new requests")} *}
                </p>
            </div>
        {/if}
    </div>

{elseif $view == "find"}
<div class="card-header bg-transparent">
    <strong>{__("Search Results")}</strong>
</div>
<div class="card-body ">
    {if count($people) > 0}
    <ul class="requstSectionwrap">
        {foreach $people as $_user} {include file='__feeds_user.tpl' _tpl="list" _connection=$_user['connection']} {/foreach}
    </ul>
    {else}
    <p class="text-center text-muted">
        {__("No people available for your search")}
    </p>
    {/if}
</div>

{elseif $view == "friend_requests"}
<div class="card-header bg-transparent">
    <h3> <strong>{__("Friend Request")}
    {* <a href="#"> <span class="see_btn ">See all</span></a> *}
    </strong></h3>
</div>
<div class="card-body">
    {if $user->_data['friend_requests']}
    <ul class="requstSectionwrap">
        {foreach $user->_data['friend_requests'] as $_user} {include file='__feeds_user.tpl' _tpl="list" _connection="request"} {/foreach}
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
        {foreach $user->_data['friend_requests_sent'] as $_user} {include file='__feeds_user.tpl' _tpl="list" _connection="cancel"} {/foreach}
    </ul>
    {else}
    <p class="text-center text-muted">
        {__("No new requests")}
    </p>
    {/if}

    <!-- see-more -->
    {if count($user->_data['friend_requests_sent']) >= $system['max_results']}
    <div class="alert alert-info see-more js_see-more" data-get="friend_requests_sent">
        <span>{__("Load More")}</span>
        <div class="loader loader_small x-hidden"></div>
    </div>
    {/if}
    <!-- see-more -->
</div>

{/if}

</div>