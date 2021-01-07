<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-06 10:41:53
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/_publisher_market.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff593f1742247_08927513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93ae90eb1bd78f5a0eae6cf868f101abb4e3526c' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/_publisher_market.tpl',
      1 => 1609929695,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:ajax.product.publisher.tpl' => 1,
  ),
),false)) {
function content_5ff593f1742247_08927513 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="publisher-overlay"></div>
<div class="custom_modal_style">
  <div class="x-form publisher add_product" data-handle="<?php echo $_smarty_tpl->tpl_vars['_handle']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['_id']->value) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_id']->value;?>
" <?php }?>>
    <div class="modal-content">
      <!-- publisher loader -->
      <div class="publisher-loader">
        <div class="loader loader_small"></div>
      </div>
      <!-- publisher loader -->

      <!-- publisher-message -->
      <div class="publisher-message" id="js_hide_div">
        <?php if ($_smarty_tpl->tpl_vars['_handle']->value == "page") {?>
        <img class="publisher-avatar" src="<?php echo $_smarty_tpl->tpl_vars['spage']->value['page_picture'];?>
" id="global-profile-publisher-avatar" />
        <?php } else { ?>
        <img class="publisher-avatar global-profile-publisher-avatar " src="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_picture'];?>
"
          id="global-profile-publisher-avatar" />
        <?php }?>

        <div class="addproductWrap">
          <div class="colored-text-wrapper">
            <textarea maxlength="260" id="post_text" dir="auto" class="js_autosize js_mention js_publisher-scraper"
              data-init-placeholder='<?php echo __("Add Product");?>
'
              placeholder='<?php echo __("Add Product");?>
'><?php if ($_smarty_tpl->tpl_vars['page']->value == "share" && $_smarty_tpl->tpl_vars['url']->value) {
echo $_smarty_tpl->tpl_vars['url']->value;
}?></textarea>
          </div>
          <div class="divAppendTextarea">
            <input type="hidden" value="1" id="inputTextareaId">
          </div>
        </div>

        <div class="wrapFooterDiv wrapFootershowHide wrapFooterDiv-old">
          <!-- <ul class="small-icons">
        <?php if ($_smarty_tpl->tpl_vars['system']->value['photos_enabled']) {?>
        <li class="">
          <div class="publisher-tools-tab attach js_publisher-tab" data-tab="photos">
            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/icons/Icon_image_message.png"
              class="js_x-uploader" data-handle="publisher" data-multiple="true" /><?php echo __("Photos");?>

          </div>
        </li>
        <?php }?>
        <li class="">
          <div class="publisher-tools-tab js_publisher-feelings">
            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/icons/Icon_add_messagebar.png" />
            <?php echo __("Feelings/Activity");?>

          </div>
        </li>
        <li class="">
          <div class="publisher-tools-tab js_publisher-tab" data-tab="album">
            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/icons/Icon_video_message.png" />
            <?php echo __("New Album");?>

          </div>
        </li>
      </ul> -->
          <button type="button"
            class="btn btn-sm btn-success ml5 js_publisher_productsBtn btn-antier-green btn-publisher js_publisher_post_ant">
            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/icons/btn_startIt.png"
              class="js_publisher_post_img">

          </button>
        </div>
        <div class="publisher-emojis">
          <!-- <div class="position-relative">
      <span class="js_emoji-menu-toggle" data-toggle="tooltip" data-placement="top" title='<?php echo __("Insert an emoji");?>
' >
        <i class="far fa-smile-wink fa-lg"></i>
      </span>
    </div> -->
          <div class="position-relative twitter-post-plus-div">
            <button type="button"
              class="btn-add-textarea btn btn-sm btn-success ml5 btn-antier-green btn-publisher twitter-post-plus-button">+</button>
          </div>
        </div>
        <button class="btn btn-sm btn-primary btn-block " style="width: 20%;">
          <?php echo __("Add Product");?>

        </button>
      </div>
      <!-- publisher-message -->

      <!-- publisher-slider -->
      <div class="popup_add_product">
        <!-- post attachments -->
        <div class="publisher-attachments attachments clearfix x-hidden"></div>
        <!-- post attachments -->
        <?php $_smarty_tpl->_subTemplateRender('file:ajax.product.publisher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"me",'_privacy'=>true), 0, false);
?>
        <!-- publisher-footer -->
        <div class="publisher-footer">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['anonymous_mode'] && $_smarty_tpl->tpl_vars['_handle']->value == "me") {?>
          <div class="float-left">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input js_publisher-anonymous-toggle" name="is_anonymous"
                id="is_anonymous" />
              <label class="custom-control-label" for="is_anonymous">
                <span class="publisher-anonymous-lable"><i class="fa fa-user-secret fa-fw mr5"></i><?php echo __("Post As
                  Anonymous");?>
</span>
              </label>
            </div>
          </div>
          <?php }?>
          <!-- publisher-buttons -->

          <!-- publisher-slider -->
        </div>
      </div>
    </div>
  </div>
</div><?php }
}
