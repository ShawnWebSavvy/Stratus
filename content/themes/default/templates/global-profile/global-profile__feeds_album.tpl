<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="album-cards">
        {if $album['cover']['blur']}<div class="x-blured">{/if}
            <a class="album-cover"
                href="{$system['system_url']}/global-profile/{$album['path']}/album/{$album['album_id']}"
                style="background-image:url({$album['cover']['source']});">
            </a>
            {if $album['cover']['blur']}
        </div>{/if}
        <div class="album-details">
            <a
                href="{$system['system_url']}/global-profile/{$album['path']}/album/{$album['album_id']}">{__($album['title'])}</a>
            <div>
                {$album['photos_count']} {__("photos")}
                <div class="float-right">
                    {if $album['privacy'] == "me"}
                    <i class="fa fa-lock" data-toggle="tooltip" data-placement="top"
                        title='{__("Shared with")}: {__("Only Me")}'></i>
                    {elseif $album['privacy'] == "friends"}
                    <i class="fa fa-users" data-toggle="tooltip" data-placement="top"
                        title='{__("Shared with")}: {__("Friends")}'></i>
                    {elseif $album['privacy'] == "public"}
                    <!-- <i class="fa fa-globe" data-toggle="tooltip" data-placement="top" title='{__("Shared with")}: {__("Public")}'></i> -->
                    <span class="share_sign_img" data-toggle="tooltip" data-placement="top"
                        title='{__("Shared with")}: {__("Public")}'> <img
                            data-src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
                            class="blackicon lazyload"> </span>
                    {elseif $album['privacy'] == "custom"}
                    <i class="fa fa-cog" data-toggle="tooltip" data-placement="top"
                        title='{__("Shared with")} {__("Custom People")}'></i>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>