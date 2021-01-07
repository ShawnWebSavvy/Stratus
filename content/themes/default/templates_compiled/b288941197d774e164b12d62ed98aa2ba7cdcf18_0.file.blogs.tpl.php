<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:10:50
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/blogs.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf29a35a799_48210533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b288941197d774e164b12d62ed98aa2ba7cdcf18' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/blogs.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:blog-after-login.tpl' => 1,
    'file:right-sidebar.tpl' => 1,
    'file:blog-before-login.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_5feaf29a35a799_48210533 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
    <div class="container mt20 offcanvas">
        <div class="row">
            <!-- side panel -->
            <div class="col-md-4 col-lg-3 offcanvas-sidebar js_sticky-sidebar">
                <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
            <!-- side panel -->
           
             <?php $_smarty_tpl->_subTemplateRender('file:blog-after-login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
    <!-- right panel -->
        <div class="right-sidebar js_sticky-sidebar open-side-bar">
          <?php $_smarty_tpl->_subTemplateRender('file:right-sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    <!-- right panel -->
<?php } else { ?>
   <?php $_smarty_tpl->_subTemplateRender('file:blog-before-login.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

 <?php }
$_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
