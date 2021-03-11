<div class="publisher-overlay"></div>
<div class="add-new-product-section blogaddNewProduct marketpublicerButtons">
  <button type="button" class="btn btn-sm cmn_btn post-tpl" data-toggle="modal"
    data-url="posts/product.php?do=create">
    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/filePlusIcon.svg">Add New Product
  </button>

  <a href="{$system['system_url']}/products" class="btn btn-sm cmn_btn ">
    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/blogNews.svg">
    My Product
  </a>
</div>
<!-- <div class="custom_modal_style">
  <div class="x-form publisher add_product" data-handle="{$_handle}" {if $_id}data-id="{$_id}" {/if}>
    <div class="modal-content">
      <div class="publisher-loader">
        <div class="loader loader_small"></div>
      </div>

    <div class="popup_add_product">
        <div class="publisher-attachments attachments clearfix x-hidden"></div>
        {*{include file='ajax.product.publisher.tpl' _handle="me" _privacy=true}*}
        <div class="publisher-footer">
          {if $system['anonymous_mode'] && $_handle == "me"}
          <div class="float-left">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input js_publisher-anonymous-toggle" name="is_anonymous"
                id="is_anonymous" />
              <label class="custom-control-label" for="is_anonymous">
                <span class="publisher-anonymous-lable"><i class="fa fa-user-secret fa-fw mr5"></i>{__("Post As
                  Anonymous")}</span>
              </label>
            </div>
          </div>
          {/if}
        </div>
      </div>
      
    </div>
  </div>
</div> -->