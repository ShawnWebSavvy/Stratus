<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:09:57
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_navbar_landingpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf265b85033_28709712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d80b1b42e34189835195be3d36b2e509f200145' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_navbar_landingpage.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5feaf265b85033_28709712 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
  <nav
    class="navbar navbar-expand-lg navbar-light fixed-top nav-bg navigation-bar"
  >
    <div class="container">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
        <span class="close"> <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/landingPage/images/ic_close.svg" /></span>
      </button>

      <a class="navbar-brand landing-logo" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
">
        <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/landingPage/images/logo.png" alt="logo"/>
    </a>
      <div class="mobile-signup">
          
          <!-- <a href ="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signup" class="signupBtnLanding" >
            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/landingPage/images/signup.svg" alt="signup" />
          </a> -->

          <a href ="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signin" >
            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/landingPage/images/signup.svg" alt="signup" />
        </a>

      </div>
      <div class="collapse navbar-collapse landing-menu" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/static/about">About us <span class="sr-only">(current)</span></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Our features</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/monetization">Contact Us</a>
          </li>
        </ul>

        <!-- <button
          class="btn my-2 my-sm-0 mr-4 signup-btn d-md-none d-lg-block d-sm-none"
          type="button">
          Sign up
        </button> -->
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signup"
            class="btn my-2 my-sm-0 mr-4 signup-btn d-md-none d-lg-block d-sm-none"><?php echo __("Sign up");?>
</a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signin"
          class="btn my-2 my-sm-0 signup-btn d-md-none d-lg-block d-sm-none">
          Login
        </a>
      </div>
    </div>
  </nav>
</header>
<?php }
}
