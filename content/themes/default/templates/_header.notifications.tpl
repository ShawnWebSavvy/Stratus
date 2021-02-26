<li class="dropdown js_live-notifications bell-icon-mobile mob_resposive_">
    <a href="#" data-toggle="dropdown" data-display="static">
        <div class="img-wrap-style" style="width:30px;height:30px;">
            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/notifications-icon.svg"
                class="blackicon">
            <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/notifications_icon_hover.svg"
                class="whiteicon">
        </div>
        <span
            class="counter counterlive shadow-sm {if $user->_data['user_live_notifications_counter'] == 0}x-hidden{/if}"
            style="color: rgba(255, 255, 255, 1);background-color: rgb(18, 105, 255);">
            {$user->_data['user_live_notifications_counter']}
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-widget with-arrow js_dropdown-keepopen">
        <div class="dropdown-widget-header notifications_soundWrap">
            <span class="title">{__("Notifications")}</span>
            <label class="switch sm float-right" for="notifications_sound">
                <input type="checkbox" class="js_notifications-sound-toggle" name="notifications_sound"
                    id="notifications_sound" {if $user->_data['notifications_sound']}checked{/if}>
                <span class="slider round"></span>
            </label>
            <div class="float-right mr5">
                {__("Alert Sound")}
            </div>
        </div>
        <div class="dropdown-widget-body notificationWrapSectionMain">
            <div class="js_scroller">
                {if $user->_data['notifications']}
                <ul>
                    {foreach $user->_data['notifications'] as $notification}
                    {include file='__feeds_notification.tpl'}
                    {/foreach}
                </ul>
                {else}
                <p class="text-center text-muted mt10">
                    {__("No notifications")}
                </p>
                {/if}
            </div>
        </div>
        <a class="dropdown-widget-footer" href="{$system['system_url']}/notifications">{__("See All")}</a>
    </div>
</li>