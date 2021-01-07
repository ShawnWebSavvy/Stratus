<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-06 10:18:45
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/market-search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff58e85ccdf46_04223522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f5780911f48e2f650e64da94a283d7b603ec927' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/market-search.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff58e85ccdf46_04223522 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="search-wrapper d-none d-md-block">
    <form class="js_search-form header-search-form" data-handle="market">
        <div class="input-group">
            <div class="search-input-icon"> <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/Search2.svg" alt="search icon"> </div>
            <input type="text" class="form-control" name="query" placeholder='<?php echo __("Search for products");?>
'>
            <div class="input-group-append">
                <button type="submit" class="btn btn-black"><?php echo __("Search");?>
</button>
            </div>
        </div>
    </form>
</div><?php }
}
