<div class="modal-header">
    <h6 class="modal-title">{__("Sell New Product")}</h6>
    <button type="button" class="addpost-closebtn close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<form class="publisher-mini ajax-sell-new-product" id="ajax-sell-new-product">
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-control-label">{__("Product Name")}</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label class="form-control-label">{__("Category")}</label>
                <select name="category" class="form-control">
                    {foreach $market_categories as $category}
                        <option value="{$category['category_id']}">{__($category['category_name'])}</option>
                    {/foreach}
                </select>
            </div>
           
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-control-label">{__("Price")}</label>
                <input name="price" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label class="form-control-label">{__("Status")}</label>
                <select name="status" class="form-control">
                    <option value="new">{__("New")}</option>
                    <option value="old">{__("Used")}</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-control-label">{__("Description")}</label>
            <textarea name="message" rows="5" dir="auto" class="form-control">{$post['text_plain']}</textarea>
        </div>
        <div class="form-group">
            <label class="form-control-label">{__("Location")}</label>
            <input name="location" type="text" value="{$post['product']['location']}" class="form-control js_geocomplete">
        </div>

        <div class="form-group">
            <label class="form-control-label">{__("Photos")}</label>
            <div class="attachments clearfix" data-type="photos">
                <ul>
                    <li class="add">
                        <i class="fa fa-camera js_x-uploader" data-handle="publisher-mini" data-multiple="true"></i>
                    </li>
                </ul>
            </div>
        </div>
        <!-- error -->
        <div class="alert alert-danger mb0 x-hidden"></div>
        <!-- error -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success js_publisher-btn js_publisher-product  btn-antier-green">{__("Publish")}</button>
    </div>
</form>