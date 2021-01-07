<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:10:50
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/blog-right-sibebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf29a5117d8_34781330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b84c9b9606ae65566d73a82ca6c4d0b0744b94d' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/blog-right-sibebar.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5feaf29a5117d8_34781330 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="right-sidebar-inner-ant usersectionHeaderMobile">
    <div class="market-categories-section-right-side ">
        <!-- categories -->
        <div class="card">
            <div class="card-body with-nav">
                <ul class="side-nav">
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == '' || $_smarty_tpl->tpl_vars['view']->value == "search") {?>class="active" <?php }?>>
                        <span class="countNumber">#1</span>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs">
                            <?php echo __("All");?>

                        </a>
                    </li>
                    <?php $_smarty_tpl->_assignInScope('incrementVal', 1);?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_blogs_categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "blogs" && $_smarty_tpl->tpl_vars['category_id']->value == $_smarty_tpl->tpl_vars['category']->value['category_id']) {?>class="active" <?php }?>>

                        <?php $_smarty_tpl->_assignInScope('incrementVal', $_smarty_tpl->tpl_vars['incrementVal']->value+1);?>

                        <span class="countNumber">#<?php echo $_smarty_tpl->tpl_vars['incrementVal']->value;?>
</span>
                        <a
                            href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
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
