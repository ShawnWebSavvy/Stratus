<div class="modal-header">
    <h6 class="modal-title">
        <i class="fa fa-share mr5"></i>{__("Quote Post")}
    </h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form class="js_ajax-forms global_ajax-share-publisher" data-url="posts/global-profile/share.php?do=publish&post_id={$post['post_id']}">
    <div class="modal-body">

       <input class="x-hidden input-label" type="radio" name="share_to" id="share_to_timeline" value="timeline"/>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-control-label">{__("Message")}</label>
                    <textarea name="message" rows="3" placeholder="Add a Comment" dir="auto" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <!-- error -->
        <div class="alert alert-danger mb0 x-hidden"></div>
        <!-- error -->
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success js_publisher-btn js_publisher-product  btn-antier-green">{__("Repost")}</button>
    </div>
</form>

<script>
    /* share post */
    $('input[type=radio][name=share_to]').on('change', function() {
        switch ($(this).val()) {
            case 'timeline':
                $('#js_share-to-page').hide();
                $('#js_share-to-group').hide();
                break;
            case 'page':
                $('#js_share-to-page').fadeIn();
                $('#js_share-to-group').hide();
                break;
            case 'group':
                $('#js_share-to-page').hide();
                $('#js_share-to-group').fadeIn();
                break;
          }
    });
</script>