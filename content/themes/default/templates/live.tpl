{include file='_head.tpl'}
{include file='_header.tpl'}
<link rel="stylesheet" type="text/css" href="{$system['system_url']}/content/themes/default/css/live_video_style.css" />
<!-- page content -->
<div class="container mt20 offcanvas">
    <div class="row">

        <!-- side panel -->
        <div class="col-12 d-block d-md-none offcanvas-sidebar" id="sidebarHiddSwip">
            {include file='_sidebar.tpl'}
        </div>
        <!-- side panel -->

        <!-- content panel -->
        <div class="col-12 offcanvas-mainbar">
            
            <div class="live-stream-wrapper">

                <!-- live stream title -->
                <div class="live-stream-title clearfix">
                    <img
                    alt="image"
                    title="Upload Image"
                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/live.svg"
                    class=""
                    data-handle="publisher"
                    data-multiple="true"
                    icon="live" width="40px" height="40px">
                    {__("Live Video")}
                    <div class="float-right">
                        <div class="btn btn-danger rounded-pill x-hidden" id="js_live-end"><i class="fas fa-power-off mr5"></i>{__("End")}</div>
                        <div class="btn btn-primary rounded-pill x-hidden" id="js_live-start"><i class="fas fa-play mr5"></i>{__("Go Live")}</div>
                    </div>
                </div>
                <!-- live stream title -->

                <!-- live stream video -->
                <div class="live-stream-video">

                    <!-- live counter -->
                    <div class="live-counter">
                        <span class="status offline" id=js_live-counter-status>{__("Offline")}</span>
                        <span class="number">
                            <i class="fas fa-eye mr5"></i><strong id="js_live-counter-number">0</strong>    
                        </span>
                    </div>
                    <!-- live counter -->

                    <!-- live recording -->
                    {if $system['save_live_enabled']}
                        <div class="live-recording" id="js_live-recording">
                            <span>
                                <i class="fas fa-record-vinyl mr5"></i><span>{__("Recording")}</span>
                            </span>
                        </div>
                    {/if}
                    <!-- live recording -->

                    <!-- live status -->
                    <div class="live-status" id="js_live-status">
                        <div class="mb5"><i class="fas fa-camera fa-2x"></i></div>
                        {__("Getting the Camera and Mic permissions")}<span class="spinner-grow spinner-grow-sm ml10"></span>
                    </div>
                    <!-- live status -->

                    <!-- live comments -->
                    <div class="live-comments" id="live-comments">
                        <ul class="js_scroller" data-slimScroll-height="100%"></ul>
                    </div>
                    <!-- live comments -->

                    <!-- live video -->
                    <video id="js_live-video" muted autoplay style="width: 100%;height: 100%;"></video>
                    <!-- live video -->
                </div>
                <!-- live stream video -->

                <!-- live stream buttons -->
                <div class="live-stream-buttons" id="js_live-stream-buttons">
                    <button class="btn btn-icon btn-rounded btn-secondary mr10 js_mute-mic" id="mic-btn" disabled>
                        <i class="fas fa-microphone fa-fw"></i>
                    </button>
                    <button class="btn btn-icon btn-rounded btn-secondary mr10 js_mute-cam" id="cam-btn" disabled>
                        <i class="fas fa-video fa-fw"></i>
                    </button>
                    <button class="btn btn-icon btn-rounded btn-secondary mr10 js_mute-comments" id="comments-btn" disabled>
                        <i class="fas fa-comments fa-fw"></i>
                    </button>
                    <span class="dropdown dropup d-md-inline mr10">
                        <button class="btn btn-icon btn-rounded btn-secondary" data-toggle="dropdown">
                            <i class="fas fa-cog fa-fw"></i>
                        </button>
                        <div class="dropdown-menu">
                            <h6 class="dropdown-header"><i class="fas fa-microphone fa-fw mr5"></i>{__("Change Mic")}</h6>
                            <div id="mic-list"></div>
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header"><i class="fas fa-video fa-fw mr5"></i>{__("Change Cam")}</h6>
                            <div id="camera-list"></div>
                        </div>
                    </span>
                </div>
                <!-- live stream buttons -->

                

            </div>

        </div>
        <!-- content panel -->

    </div>
</div>
<!-- page content -->

{include file='_footer.tpl'}