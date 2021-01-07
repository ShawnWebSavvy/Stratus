<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 12:36:30
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile-post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff45d4e972f80_73427482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7298f9fa3c1fa96da295514c9ca584cd67e0fb60' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile-post.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:global-profile/global-profile__feeds_post.tpl' => 1,
    'file:right-sidebar.tpl' => 1,
    'file:global-profile/global-profile_footer.tpl' => 1,
  ),
),false)) {
function content_5ff45d4e972f80_73427482 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php $_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="container mt20 <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>offcanvas<?php }?>">
      <div class="row">
         <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
        <div class="col-md-12 offcanvas-sidebar js_sticky-sidebar">
          <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <?php }?>
      </div>
       
      <!-- content panel -->
      <div class="row right-side-content-ant">
        <div class="col-lg-12 offcanvas-mainbar">
          <div class="row">
            <div class="home-page-middel-block">
              <?php $_smarty_tpl->_subTemplateRender('file:global-profile/global-profile__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('standalone'=>true), 0, false);
?>
            </div>
            <!-- right panel -->
              <div class="right-sidebar js_sticky-sidebar ">
                <?php $_smarty_tpl->_subTemplateRender('file:right-sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
              </div>
            <!-- right panel -->
          </div>
        </div>
      </div>
      <!-- content panel -->
</div>
<!-- page content -->


<?php $_smarty_tpl->_subTemplateRender('file:global-profile/global-profile_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
