<div class="modal-header">
    <h6 class="modal-title">
        <i class="fa fa-images mr5" style="width: 25px;height: 25px;"></i>{__("Create New Story ")}
    </h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="publisher-mini ajax-story-publisher-form">
    <div class="modal-body _add_story_popup">
        <div class="row justify-content-around">
            <div class="custom_upload_stratus">
                <div class="form-group">
                    <label class="form-control-label">{__("Photos")}</label>
                    <div class="attachments clearfix imageUplodeLodingTime" data-type="photos">
                        <ul>
                            <li class="add">
                                <img class="js_x-uploader" data-handle="publisher-mini" data-multiple="true"
                                    src="{$system['system_url']}/content/themes/default/images/camera.svg">
                                <!-- <i class="fa fa-camera js_x-uploader" data-handle="publisher-mini" data-multiple="true"></i> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <label class="form-control-label">{__("Videos")}</label>
                    <div class="attachments clearfix imageUplodeLodingTime" data-type="videos">
                        <ul>
                            <li class="add">
                                <img class=" js_x-uploader" data-type="video" data-handle="publisher-mini"
                                    data-multiple="true"
                                    src="{$system['system_url']}/content/themes/default/images/video.svg">
                                <!-- <i class="fa fa-video js_x-uploader" data-type="video" data-handle="publisher-mini" data-multiple="true"></i> --->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-label">{__("Message")}</label>
                    <textarea name="message" maxlength="150" rows="5" dir="auto" class="form-control"></textarea>
                </div>
            </div>
        </div>



        <!-- error -->
        <div class="alert alert-danger mb0 x-hidden"></div>
        <!-- error -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success js_publisher-btn js_publisher-story">{__("Publish")}</button>
    </div>
</form>