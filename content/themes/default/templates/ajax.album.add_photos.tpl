<div class="modal-body plr0 ptb0 custom_modal_style customModalAddPhoto">
    <div class="x-form publisher mini" data-id="{$album['album_id']}">
        <!-- publisher loader -->
        <div class="publisher-loader">
            <div class="loader loader_small"></div>
        </div>
        <!-- publisher loader -->
        <div class="addpostHeadFocussed">
            <h2>Add Photos</h2>
            <a class="addpost-closebtn" role="button" href="javascript:void(0)" data-dismiss="modal" aria-hidden="true">
                <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/modelCross.svg"/>
            </a>
        </div>
        <!-- publisher close -->
        <!-- <div class="publisher-close">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div> -->
        <!-- publisher close -->
        <!-- publisher-message -->
        <div class="publisher-message popup-publishBtn">
            <div class="published_img_post">
                <div class="published_avatar-block">
                    {if $_handle == "page"}
                    <img class="publisher-avatar lazyload" src="{$spage['page_picture']}" />
                    {else}
                    <img class="publisher-avatar lazyload {$user->_data['user_id']}"
                        src="{$user->_data['user_picture']}" />
                    {/if}
                </div>
                <div class="btn-popup-public" style="padding-left: 10px">
                    <p>{$user->_data['user_firstname']} {$user->_data['user_lastname']}</p>
                    {if $album['user_type'] == 'user' && !$album['in_group'] && !$album['in_event']}
                    <!-- privacy -->
                    <div class="btn-group" data-toggle="tooltip" data-placement="top" data-value="friends"
                        title='{__("Shared with: Friends")}'>
                        <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" data-display="static">
                            <span class="share_sign_img">
                                <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/friendsIcon.svg"
                                    class="blackicon" /> </span><span
                                class="btn-group-text">{__("Friends")}</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right _postshare__">
                            <div class="dropdown-item pointer" data-title='{__("Shared with: Public")}' data-value="public">
                                <div class="post_images__">
                                    <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
                                        class="blackicon">
                                    <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub-active.svg"
                                        class="whiteicon">
                                </div>
                                <span> {__("Public")} </span>
                            </div>
                            <div class="dropdown-item pointer" data-title='{__("Shared with: Friends")}' data-value="friends">
                                <div class="post_images__">
                                    <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/friendsIcon.svg"
                                        class="blackicon">
                                    <img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/friendsIconHover.svg"
                                        class="whiteicon">
                                </div>
                                <span> {__("Friends")} </span>
                            </div>
                            <div class="dropdown-item pointer" data-title='{__("Shared with: Only Me")}' data-value="me">
                                <div class="post_images__">
                                    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Hide_form.svg"
                                        class="blackicon">
                                    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Hide_form-hover.svg"
                                        class="whiteicon">
                                </div>
                                <span> {__("Only Me")} </span>
                            </div>
                        </div>
                    </div>
                    <!-- privacy -->
                    {else}
                    <!-- privacy -->
                    {if $album['privacy'] == "custom"}
                    <div class="btn-group" data-toggle="tooltip" data-placement="top" data-value="custom"
                        title='{__("Shared with")} {__("Custom People")}'>
                        <button type="button" class="btn btn-sm btn-info">
                            <i class="btn-group-icon fa fa-cog mr10"></i> <span class="btn-group-text">{__("Custom")}</span>
                        </button>
                    </div>
                    {elseif $album['privacy'] == "public"}
                    <div class="btn-group" data-toggle="tooltip" data-placement="top" data-value="public"
                        title='{__("Shared with: Public")}'>
                        <button type="button" class="btn btn-sm btn-info">
                            <i class="btn-group-icon fa fa-users mr10"></i> <span class="btn-group-text">{__("Public")}</span>
                        </button>
                    </div>
                    {/if}
                    <!-- privacy -->
                    {/if}
                </div>
            </div>
            <!-- <img class="publisher-avatar" src="{$user->_data['user_picture']}">
            <textarea dir="auto" class="js_autosize js_mention"
                placeholder='{__("What is your Stratus? @mention #hashtag")}'></textarea> -->
            <div class="publisher-emojis" style="display: block;">
                <div class="position-relative">
                    <span class="js_emoji-menu-toggle" data-toggle="tooltip" data-placement="top"
                        title='{__("Insert an emoji")}'>
                        <i class="far fa-smile-wink fa-lg"></i>
                    </span>
                </div>
            </div>
        </div>
        <!-- publisher-message -->
        <!-- post attachments -->
        <div class="publisher-attachments attachments clearfix x-hidden"></div>
        <!-- post attachments -->
        <!-- post location -->
        <div class="publisher-meta" data-meta="location">
            <i class="fa fa-map-marker fa-fw"></i>
            <input class="js_geocomplete" type="text" placeholder='{__("Where are you?")}'>
        </div>
        <!-- post location -->
        <!-- post feelings -->
        <div class="publisher-meta feelings" data-meta="feelings">
            <div id="feelings-menu-toggle" data-init-text='{__("What are you doing?")}'>{__("What are you doing?")}
            </div>
            <div id="feelings-data" style="display: none">
                <input type="text" placeholder='{__("What are you doing?")}'>
                <span></span>
            </div>
            <div id="feelings-menu" class="dropdown-menu dropdown-widget">
                <div class="dropdown-widget-body ptb5">
                    <div class="js_scroller">
                        <ul class="feelings-list">
                            {foreach $feelings as $feeling}
                            <li class="feeling-item js_feelings-add" data-action="{$feeling['action']}"
                                data-placeholder="{__($feeling['placeholder'])}">
                                <div class="icon">
                                    <i class="twa twa-3x twa-{$feeling['icon']}"></i>
                                </div>
                                <div class="data">
                                    {__($feeling['text'])}
                                </div>
                            </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            </div>
            <div id="feelings-types" class="dropdown-menu dropdown-widget">
                <div class="dropdown-widget-body ptb5">
                    <div class="js_scroller">
                        <ul class="feelings-list">
                            {foreach $feelings_types as $type}
                            <li class="feeling-item js_feelings-type" data-type="{$type['action']}"
                                data-icon="{$type['icon']}">
                                <div class="icon">
                                    <i class="twa twa-3x twa-{$type['icon']}"></i>
                                </div>
                                <div class="data">
                                    {__($type['text'])}
                                </div>
                            </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- post feelings -->
        <div class="publisher-tools-tabs" style="position: relative">
            <span class="addPostText">Add to Your Post</span>
            <ul class="row publisher-tools-tabs-ul publisher-tools-tabs-ul-newDesign">
                {if $system['photos_enabled']}
                <li class="uplodfileTags">
                    <div class="publisher-tools-tab  js_publisher-tab" data-tab="photos">
                        <!-- attach -->
                        <div class="addPhotoButton js_x-uploader" data-handle="publisher" data-multiple="true" >
                            <img class="blackIcon" alt="image" title="Upload Image"
                            src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/photo_message_iconHover.svg"/>
                            <img class="BlueIcon" alt="image" title="Upload Image"
                            src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/photo_message_icon.svg"/>
                            <span class="class-publisher-text">Add Photo</span>
                        </div>
                    </div>
                </li>
                {/if}
                {if $system['activity_posts_enabled']}
                <li class="uplodfileTags">
                    <div class="publisher-tools-tab js_publisher-feelings">
                        <img class="BlueIcon" alt="image" title="Feelings/Activity"
                            src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/feelingsHover.svg" />
                        <img class="blackIcon" alt="image" title="Feelings/Activity"
                            src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/feelings.svg" />
                        <span class="class-publisher-text">Feelings/Activity</span>
                    </div>
                </li>
                {/if} {if $system['geolocation_enabled']}
                <li class="uplodfileTags">
                    <div class="publisher-tools-tab js_publisher-tab" data-tab="location">
                    <div class="addPhotoButton js_x-uploader" data-handle="publisher" data-multiple="true" >
                        <img class="BlueIcon" alt="Check In" title="Check In"
                            src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/addpostLocationHover.svg" />
                        <img class="blackIcon" alt="Check In" title="Check In"
                            src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/addpostLocation.svg" />
                        <span class="class-publisher-text">Check In</span>
                    </div>
                    </div>
                </li>
                {/if}
            </ul>
        </div>
        <!-- publisher-tools-tabs -->
        <!-- <div class="publisher-tools-tabs">
            <ul class="row">
                {if $system['photos_enabled']}
                <li class="col-md-6">
                    <div class="publisher-tools-tab attach js_publisher-tab" data-tab="photos">
                        <i class="fa fa-camera fa-fw js_x-uploader" data-handle="publisher" data-multiple="true"></i>
                        {__("Upload Photos")}
                    </div>
                </li>
                {/if}
                {if $system['geolocation_enabled']}
                <li class="col-md-6">
                    <div class="publisher-tools-tab js_publisher-tab" data-tab="location">
                        <i class="fa fa-map-marker fa-fw"></i> {__("Check In")}
                    </div>
                </li>
                {/if}
                <li class="col-md-6">
                    <div class="publisher-tools-tab js_publisher-feelings">
                        <i class="fa fa-grin-beam fa-fw"></i> {__("Feelings/Activity")}
                    </div>
                </li>
            </ul>
        </div> -->
        <!-- publisher-tools-tabs -->

        <!-- publisher-footer -->
        <div class="publisher-footer">
            <!-- publisher-buttons -->
            <!-- <button type="button"
                class="btn btn-sm btn-primary mr5 js_publisher-btn js_publisher-album">{__("Post")}</button> -->
                <button type="button"
                class="btn btn-sm btn-success ml5 js_publisher-btn js_publisher-album btn-share-style">
                <!-- {__("Post")} -->
                Share
            </button>
            <!-- publisher-buttons -->
        </div>
        <!-- publisher-footer -->
    </div>
</div>