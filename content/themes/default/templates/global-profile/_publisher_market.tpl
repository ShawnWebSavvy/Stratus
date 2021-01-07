<div class="publisher-overlay"></div>
<div class="custom_modal_style">
  <div class="x-form publisher add_product" data-handle="{$_handle}" {if $_id}data-id="{$_id}" {/if}>
    <div class="modal-content">
      <!-- publisher loader -->
      <div class="publisher-loader">
        <div class="loader loader_small"></div>
      </div>
      <!-- publisher loader -->

      <!-- publisher-message -->
      <div class="publisher-message" id="js_hide_div">
        {if $_handle == "page"}
        <img class="publisher-avatar" src="{$spage['page_picture']}" id="global-profile-publisher-avatar" />
        {else}
        <img class="publisher-avatar global-profile-publisher-avatar " src="{$user->_data['user_picture']}"
          id="global-profile-publisher-avatar" />
        {/if}

        <div class="addproductWrap">
          <div class="colored-text-wrapper">
            <textarea maxlength="260" id="post_text" dir="auto" class="js_autosize js_mention js_publisher-scraper"
              data-init-placeholder='{__("Add Product")}'
              placeholder=''>{if $page == "share" && $url}{$url}{/if}</textarea>
          </div>
          <div class="divAppendTextarea">
            <input type="hidden" value="1" id="inputTextareaId">
          </div>
        </div>

        <div class="wrapFooterDiv wrapFootershowHide wrapFooterDiv-old">
          <!-- <ul class="small-icons">
        {if $system['photos_enabled']}
        <li class="">
          <div class="publisher-tools-tab attach js_publisher-tab" data-tab="photos">
            <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/icons/Icon_image_message.png"
              class="js_x-uploader" data-handle="publisher" data-multiple="true" />{__("Photos")}
          </div>
        </li>
        {/if}
        <li class="">
          <div class="publisher-tools-tab js_publisher-feelings">
            <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/icons/Icon_add_messagebar.png" />
            {__("Feelings/Activity")}
          </div>
        </li>
        <li class="">
          <div class="publisher-tools-tab js_publisher-tab" data-tab="album">
            <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/icons/Icon_video_message.png" />
            {__("New Album")}
          </div>
        </li>
      </ul> -->
          <button type="button"
            class="btn btn-sm btn-success ml5 js_publisher_productsBtn btn-antier-green btn-publisher js_publisher_post_ant">
            <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/icons/btn_startIt.png"
              class="js_publisher_post_img">

          </button>
        </div>
        <div class="publisher-emojis">
          <!-- <div class="position-relative">
      <span class="js_emoji-menu-toggle" data-toggle="tooltip" data-placement="top" title='{__("Insert an emoji")}' >
        <i class="far fa-smile-wink fa-lg"></i>
      </span>
    </div> -->
          <div class="position-relative twitter-post-plus-div">
            <button type="button"
              class="btn-add-textarea btn btn-sm btn-success ml5 btn-antier-green btn-publisher twitter-post-plus-button">+</button>
          </div>
        </div>
        <button class="btn btn-sm btn-primary btn-block " style="width: 20%;">
          {__("Add Product")}
        </button>
      </div>
      <!-- publisher-message -->

      <!-- publisher-slider -->
      <div class="popup_add_product">
        <!-- post attachments -->
        <div class="publisher-attachments attachments clearfix x-hidden"></div>
        <!-- post attachments -->
        {include file='ajax.product.publisher.tpl' _handle="me" _privacy=true}
        <!-- publisher-footer -->
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
          <!-- publisher-buttons -->

          <!-- publisher-slider -->
        </div>
      </div>
    </div>
  </div>
</div>