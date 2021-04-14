{if $type == "user"}
<!-- user popover -->
<div class="user-popover-content">
  <div class="user-card">
    <div class="user-card-cover"></div>
    <div class="user-card-avatar">
      <img
        src="{$profile['user_picture']}"
        alt="{$profile['user_firstname']} {$profile['user_lastname']}"
      />
    </div>
    <div class="user-card-info">
      <a class="name" href="{$system['system_url']}/{$profile['user_name']}"
        >{$profile['user_firstname']} {$profile['user_lastname']}</a
      >
      {if $profile['user_verified']}
      <i
        data-toggle="tooltip"
        data-placement="top"
        title='{__("Verified User")}'
        class="fa fa-check-circle fa-fw verified-badge"
      ></i>
      {/if}
      <div class="info">
        <a href="{$system['system_url']}/{$profile['user_name']}/followers"
          >{$profile['followers_count']} {__("followers")}</a
        >
      </div>
    </div>
  </div>
  <div class="user-card-meta">
    <!-- mutual friends -->
    {if $profile['mutual_friends_count'] && $profile['mutual_friends_count'] >
    0}
    <div class="mb10">
      <i class="fa fa-users fa-fw mr5"></i>
      <span
        class="text-underline"
        data-toggle="modal"
        data-url="users/mutual_friends.php?uid={$profile['user_id']}"
        >{$profile['mutual_friends_count']} {__("mutual friends")}</span
      >
    </div>
    {/if}
    <!-- mutual friends -->
    <!-- work -->
    {if !is_empty($profile['user_work_title'])} {if $profile['user_id'] ==
    $user->_data['user_id'] || $profile['user_privacy_work'] == "public" ||
    $profile['we_friends']}
    <div class="mb10">
      <i class="fa fa-briefcase fa-fw mr5"></i>
      {$profile['user_work_title']} {__("at")}
      <span class="text-primary">{$profile['user_work_place']}</span>
    </div>
    {/if} {/if}
    <!-- work -->
    <!-- hometown -->
    {if !is_empty($profile['user_hometown'])} {if $profile['user_id'] ==
    $user->_data['user_id'] || $profile['user_privacy_location'] == "public" ||
    $profile['we_friends']}
    <div class="mb10">
      <i class="fa fa-map-marker fa-fw mr5"></i>
      {__("From")} <span class="text-primary">{$profile['user_hometown']}</span>
    </div>
    {/if} {/if}
    <!-- hometown -->
  </div>
  <div class="buttonWrapPopOver">
    {if $user->_data['user_id'] != $profile['user_id']}
    <!-- add friend -->
    {if $profile['we_friends']}
    <button
      type="button"
      class="btn btn-sm btn-success btn-delete js_friend-remove"
      data-uid="{$profile['user_id']}"
    >
      <img
        class="btn_image"
        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/plus_icon.svg"
      />
      <img
        class="btn_image_hover"
        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/delete_icon.svg"
      />
      <span class="btn_image_"> {__("Friends")} </span>
      <span class="btn_image_hover"> {__("Delete")} </span>
    </button>
    {elseif $profile['he_request']}
    <button
      type="button"
      class="btn btn-sm btn-primary js_friend-accept"
      data-uid="{$profile['user_id']}"
    >
<span class="request_aspct"><img 
                    src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/tick.svg">
                    </span>
{__("Confirm")}

    </button>
    <button
      type="button"
      class="btn btn-sm btn-danger js_friend-decline"
      data-uid="{$profile['user_id']}"
    >
      <span class="request_dlt">
                <img
                    src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/delete_icon.svg">
                    </span>
{__("Delete")}

    </button>
    {elseif $profile['i_request']}
    <button
      type="button"
      class="btn btn-sm btn-warning js_friend-cancel"
      data-uid="{$profile['user_id']}"
    >
      <img
        class="btn_image_"
        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/tick.svg"
      />
      {__("Friend Request Sent")}
    </button>
    {else}
    <button
      type="button"
      class="btn btn-sm btn-success js_friend-add"
      data-uid="{$profile['user_id']}"
    >
      <!-- <i class="fa fa-plus mr5"></i> -->
      <img
        class="btn_image_"
        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg"
      />
      <img
        class="btn_image_hover"
        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg"
      />
      {__("Add Friend")}
    </button>
    {/if}
    <!-- add friend -->

    <!-- follow -->
    {if $profile['i_follow']}
    <button
      type="button"
      class="btn btn-sm btn-info js_unfollow"
      data-uid="{$profile['user_id']}"
    >
      <i class="fa fa-check mr5"></i>{__("Following")}
    </button>
    {else}
    <button
      type="button"
      class="btn btn-sm btn-info js_follow"
      data-uid="{$profile['user_id']}"
    >
      <i class="fa fa-rss mr5"></i>{__("Follow")}
    </button>
    {/if}
    <!-- follow -->

    <!-- message -->
    <button
      type="button"
      class="btn btn-sm btn-primary mlr5 js_chat_start hoverClass"
      data-uid="{$profile['user_id']}"
      data-name="{$profile['user_firstname']} {$profile['user_lastname']}"
      data-link="{$profile['user_name']}"
    >
      <i class="fa fa-comments mr5"></i>{__("Message")}
    </button>
    <!-- message -->
    {else}
    <!-- edit -->
    <a href="{$system['system_url']}/settings/profile" class="btn btn-sm cmn_btn" style="margin: 0 auto;">
      <i class="fa fa-pencil-alt mr5"></i>{__("Update Info")}
    </a>
    <!-- edit -->
    {/if}
  </div>
</div>
<!-- user popover -->
{elseif $type == 'groups'}
<!-- group popover -->
<div class="user-popover-content">
  <div class="user-card">
    <div class="user-card-cover"></div>
    <div class="user-card-avatar">
      <img class="img-fluid" src="{$profile['group_picture']}" alt="{$profile['group_title']}" />
    </div>
    <div class="user-card-info">
      <a class="name" href="{$system['system_url']}/groups/{$profile['group_name']}">{$profile['group_title']}</a>
      <div class="info">{$profile['group_members']} {__("Members")}</div>
    </div>
  </div>
  <div class="buttonWrapPopOver" style="justify-content: center;">
    <!-- like -->
    {if $profile['i_like']}
    <button type="button" class="btn btn-success btn-delete js_leave-group" data-id="{$profile['group_id']}" data-privacy="{$profile['group_privacy']}">
      <i class="fa fa-check mr5"></i>Joined
    </button>
    {else}
    <button type="button" class="btn btn-success js_join-group" data-id="{$profile['group_id']}" data-privacy="{$profile['group_privacy']}">
      <img class="btn_image_" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend_icon.svg" />
      <img class="btn_image_hover" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_friend-hover.svg" />
    Join
    </button>
    
    {/if}
    <!-- like -->
  </div>
</div>
{elseif $type == 'events'}
<!-- event popover -->
<div class="user-popover-content">
  <div class="user-card">
    <div class="user-card-cover"></div>
    <div class="user-card-avatar">
      <img class="img-fluid" src="{$profile['event_picture']}" alt="{$profile['event_title']}" />
    </div>
    <div class="user-card-info">
      <a class="name" href="{$system['system_url']}/events/{$profile['event_id']}">{$profile['event_title']}</a>
      <div class="info">{$profile['event_interested']} {__("Interested")}</div>
    </div>
  </div>
  <div class="buttonWrapPopOver">
    <!-- like -->
    {if $profile['event_privacy'] == "public" || $profile['i_joined'] || $profile['i_admin']} {if
      $profile['i_joined']['is_going']}
      <button type="button" class="btn js_ungo-event" data-id="{$profile['event_id']}">
          <img
              src="{$system['system_url']}/content/themes/default/images/svg/svgImg/icon_active_state.svg">
          {__("Going")}
      </button> {else}
      <button type="button" class="btn js_go-event" data-id="{$profile['event_id']}">
          <img src="{$system['system_url']}/content/themes/default/images/svg/calendar.svg"
              class="blackicon">
          {__("Going")}
      </button> {/if} {if $profile['i_joined']['is_interested']}
      <button type="button" class="btn js_uninterest-event" data-id="{$profile['event_id']}">
          <img
              src="{$system['system_url']}/content/themes/default/images/svg/svgImg/icon_active_state.svg">
          {__("Interested")}
      </button> {else}
      <button type="button" class="btn js_interest-event" data-id="{$profile['event_id']}">
          <div class="svg-container">
              <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/event.svg"
                  class="blackicon">
              <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/eventHover.svg"
                  class="whiteicon">
          </div>
          {__("Interested")}
      </button> {/if} {/if} 
    <!-- like -->
  </div>
</div>

{else}
<!-- page popover -->
<div class="user-popover-content">
  <div class="user-card">
    <div class="user-card-cover"></div>
    <div class="user-card-avatar">
      <img
        class="img-fluid"
        src="{$profile['page_picture']}"
        alt="{$profile['page_title']}"
      />
    </div>
    <div class="user-card-info">
      <a
        class="name"
        href="{$system['system_url']}/pages/{$profile['page_name']}"
        >{$profile['page_title']}</a
      >
      {if $profile['page_verified']}
      <i
        data-toggle="tooltip"
        data-placement="top"
        title='{__("Verified User")}'
        class="fa fa-check-circle fa-fw verified-badge"
      ></i>
      {/if}
      <div class="info">{$profile['page_likes']} {__("Likes")}</div>
    </div>
  </div>
  <div class="buttonWrapPopOver" style="justify-content: center;">
    <!-- like -->
    {if $profile['i_like']}
    <button
      type="button"
      class="btn js_unlike-page unlike-button-stratus"
      data-id="{$profile['page_id']}"
    >
      <img
        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/local_hubN.svg"
        class="whiteicon"
      />
      {__("Unlike")}
    </button>
    {else}
    <button
      type="button"
      class="btn js_like-page like-button-stratus"
      data-id="{$profile['page_id']}"
    >
      <img
        src="{$system['system_url']}/content/themes/default/images/svg/svgImg/local_hubN.svg"
        class="whiteicon"
      />
      {__("Like")}
    </button>
    {/if}
    <!-- like -->
  </div>
</div>
<!-- page popover -->
{/if}
