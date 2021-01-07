<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 09:29:35
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/market-right-sibebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff4317f3559d4_49625300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '632f47068c98100c9693a90a2112f967d7a48259' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/market-right-sibebar.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff4317f3559d4_49625300 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="markit_page_rhs right-sidebar-inner-ant usersectionHeaderMobile">
    <div class="market-categories-section-right-side forScroll">
        <!-- categories -->
        <div class="card">
            <div class="card-body with-nav">
                <ul class="side-nav">
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == '' || $_smarty_tpl->tpl_vars['view']->value == "search") {?>class="active " <?php }?>>
                        <span class="countNumber">#1</span>
                        <a class="all" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/market">
                            <?php echo __("All");?>

                        </a>
                    </li>
                    <?php $_smarty_tpl->_assignInScope('incrementVal', 1);?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['market_categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "category" && $_smarty_tpl->tpl_vars['category_id']->value == $_smarty_tpl->tpl_vars['category']->value['category_id']) {?>class="active" <?php }?>>

                        <?php $_smarty_tpl->_assignInScope('incrementVal', $_smarty_tpl->tpl_vars['incrementVal']->value+1);?>

                        <span class="countNumber">#<?php echo $_smarty_tpl->tpl_vars['incrementVal']->value;?>
</span>
                        <a class="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_url'];?>
"
                            href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/market/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['category_url'];?>
">
                            <?php echo __($_smarty_tpl->tpl_vars['category']->value['category_name']);?>

                        </a>

                    </li>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
        </div>
        <!-- categories -->
    </div>
</div><?php }
}
