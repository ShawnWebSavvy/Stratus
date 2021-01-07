<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:09:57
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_footer_landingpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf265b9ce62_26767093',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b5a1fdb0a94451c9f8939dc06f0f850f5d02c60' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_footer_landingpage.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_landing_footerlinks.tpl' => 1,
  ),
),false)) {
function content_5feaf265b9ce62_26767093 (Smarty_Internal_Template $_smarty_tpl) {
?><footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="logo">
          <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/landingPage/images/logo.png"
            alt="logo" />
        </div>
      </div>
      <div class="col-md-4 col-sm-12 col-12 order-1 order-sm-0">
        <div class="links">
          <ul>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/static/about">About us</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/contacts">Contacts</a></li>
            <!-- <li><a href="#">Our features</a></li> -->
          </ul>
          <p class="footer-copy-right desktop-view">
            © <?php echo date('Y');?>
 Apollo Fintech CDE. Apollo Fintech All Right Reserved.
          </p>
        </div>
      </div>
      <div class="col-md-4 col-sm-12 col-12 text-right order-0 order-sm-1">
        <div class="social-links">
          <ul>
            <li>
              <a href="#"><img
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/landingPage/images/fb.svg" /></a>
            </li>
            <li>
              <a href="#"><img
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/landingPage/images/twitter.svg" /></a>
            </li>
            <li>
              <a href="#"><img
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/landingPage/images/linkedin.svg" /></a>
            </li>
            <li>
              <a href="#"><img
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/landingPage/images/trello.svg" /></a>
            </li>
            <li>
              <a href="#"><img
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/landingPage/images/pintrest.svg" /></a>
            </li>
            <li>
              <a href="#"><img
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/landingPage/images/insta.svg" /></a>
            </li>
          </ul>
        </div>
        <p class="footer-copy-right mobile-view">
          © <?php echo date('Y');?>
 Apollo Fintech CDE. Apollo Fintech All Right Reserved.
        </p>

        <ul class="other-links">
          <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/static/privacy" target="_blank"><?php echo __("Privacy Policy");?>
</a>
          </li>
          <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/static/terms" target="_blank"><?php echo __("Terms and Condition");?>
</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<?php $_smarty_tpl->_subTemplateRender('file:_landing_footerlinks.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
