{if $_tpl == "box"}
<li class="col-md-6 col-lg-4 col-xl-3 explore_page_lists">
    <div class="ui-box uiBoxPosition">
        <div class="img">
            <a href="{$system['system_url']}/events/{$_event['event_id']}{if $_search}?ref=qs{/if}">
                <img class="lazyload" alt="{$_event['event_title']}" data-src="{$_event['event_picture']}" />
            </a>
        </div>
        <div class="mt10">
            <a class="h6"
                href="{$system['system_url']}/events/{$_event['event_id']}{if $_search}?ref=qs{/if}">{$_event['event_title']}</a>
            <div>{$_event['event_interested']} {__("Interested")}</div>
        </div>
        <div class="mt10">
            {if $_event['i_joined']['is_interested']}
            <button type="button" class="btn js_uninterest-event" data-id="{$_event['event_id']}">
                <img class="lazyload"
                    data-src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/icon_active_state.svg">
                {__("Interested")}
            </button>
            {else}
            <button type="button" class="btn js_interest-event" data-id="{$_event['event_id']}">
                <div class="svg-container">
                    <img class="lazyload blackicon" data-src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/event.svg">
                    <img class="lazyload whiteicon" data-src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/eventHover.svg">
                </div>
                {__("Interested")}
            </button>
            {/if}
        </div>
    </div>
</li>
{elseif $_tpl == "list"}
<li class="feeds-item">
    <div class="data-container {if $_small}small{/if}">
        <a class="data-avatar" href="{$system['system_url']}/events/{$_event['event_id']}{if $_search}?ref=qs{/if}">
            <img class="lazyload" data-src="{$_event['event_picture']}" alt="{$_event['event_title']}">
        </a>
        <div class="data-content">
            <div class="float-right">
                {if $_event['i_joined']['is_interested']}
                <button type="button" class="btn js_uninterest-event" data-id="{$_event['event_id']}">
                    <img class="lazyload"
                        data-src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/icon_active_state.svg">
                    {__("Interested")}
                </button>
                {else}
                <button type="button" class="btn js_interest-event" data-id="{$_event['event_id']}">
                    <div class="svg-container">
                        <img class="lazyload blackicon" data-src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/event.svg">
                        <img class="lazyload whiteicon" data-src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/eventHover.svg">
                    </div>
                    {__("Interested")}
                </button>
                {/if}
            </div>
            <div>
                <span class="name">
                    <a
                        href="{$system['system_url']}/events/{$_event['event_id']}{if $_search}?ref=qs{/if}">{$_event['event_title']}</a>
                </span>
                <div>{$_event['event_interested']} {__("Interested")}</div>
            </div>
        </div>
    </div>
</li>
{/if}