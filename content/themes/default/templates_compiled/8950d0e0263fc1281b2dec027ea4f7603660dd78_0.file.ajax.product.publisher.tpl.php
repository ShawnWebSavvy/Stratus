<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 09:19:51
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.product.publisher.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff42f37ce80b4_19942482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8950d0e0263fc1281b2dec027ea4f7603660dd78' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.product.publisher.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff42f37ce80b4_19942482 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-header">
    <h6 class="modal-title"><?php echo __("Sell New Product");?>
</h6>
    <button type="button" class="addpost-closebtn close" href="javascript:void(0)" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<form class="publisher-mini ajax-sell-new-product" id="ajax-sell-new-product">
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-control-label"><?php echo __("Product Name");?>
</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label class="form-control-label"><?php echo __("Category");?>
</label>
                <select name="category" class="form-control">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['market_categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
"><?php echo __($_smarty_tpl->tpl_vars['category']->value['category_name']);?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </div>
           
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-control-label"><?php echo __("Price");?>
</label>
                <input name="price" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label class="form-control-label"><?php echo __("Status");?>
</label>
                <select name="status" class="form-control">
                    <option value="new"><?php echo __("New");?>
</option>
                    <option value="old"><?php echo __("Used");?>
</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="form-control-label"><?php echo __("Description");?>
</label>
            <textarea name="message" rows="5" dir="auto" class="form-control"><?php echo $_smarty_tpl->tpl_vars['post']->value['text_plain'];?>
</textarea>
        </div>
        <div class="form-group">
            <label class="form-control-label"><?php echo __("Location");?>
</label>
            <input name="location" type="text" value="<?php echo $_smarty_tpl->tpl_vars['post']->value['product']['location'];?>
" class="form-control js_geocomplete">
        </div>

        <div class="form-group">
            <label class="form-control-label"><?php echo __("Photos");?>
</label>
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
        <button type="button" class="btn btn-success js_publisher-btn js_publisher-product  btn-antier-green"><?php echo __("Publish");?>
</button>
    </div>
</form><?php }
}
