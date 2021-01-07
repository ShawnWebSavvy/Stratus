<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-07 09:36:17
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff6d6110f5fe0_60991431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9bdbb882fd435212b66712d0c5de8d6ec4daea6' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_head.tpl',
      1 => 1610006444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.css.tpl' => 1,
  ),
),false)) {
function content_5ff6d6110f5fe0_60991431 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/sngine/includes/libs/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'/opt/lampp/htdocs/sngine/includes/libs/Smarty/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<!doctype html>

<html lang="<?php echo $_smarty_tpl->tpl_vars['system']->value['language']['code'];?>
" <?php if ($_smarty_tpl->tpl_vars['system']->value['language']['dir'] == "RTL") {?> dir="RTL" <?php }?>>

<head>
    <?php $_smarty_tpl->_assignInScope('cacheremove', smarty_modifier_date_format(time(),'%Y-%m-%d_%H:%M:%S'));?>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="generator" content="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_title']->value,70);?>
">
    <meta name="version" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_version'];?>
">

    <!-- Title -->
    <title><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_title']->value,70);?>
</title>
    <!-- Title -->

    <!-- Meta -->
    <meta name="description" content="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_description']->value,300);?>
">
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_keywords'];?>
">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Meta -->

    <!-- OG-Meta -->
    <meta property="og:title" content="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_title']->value,70);?>
" />
    <meta property="og:description" content="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_description']->value,300);?>
" />
    <meta property="og:site_name" content="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
" />
    <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['page_image']->value;?>
" />
    <!-- OG-Meta -->

    <!-- Twitter-Meta -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_title']->value,70);?>
" />
    <meta name="twitter:description" content="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['page_description']->value,300);?>
" />
    <meta name="twitter:image" content="<?php echo $_smarty_tpl->tpl_vars['page_image']->value;?>
" />
    <!-- Twitter-Meta -->

    <!-- Favicon -->
    <?php if ($_smarty_tpl->tpl_vars['system']->value['system_favicon_default']) {?>
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/clouds.ico " />
    <?php } elseif ($_smarty_tpl->tpl_vars['system']->value['system_favicon']) {?>
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['system']->value['system_favicon'];?>
" />
    <?php }?>
    <!-- Favicon -->
    <!-- Fonts [Roboto|Font-Awesome] -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"> -->
    <!-- Fonts [Roboto|Font-Awesome] -->
    <!-- CSS -->
    <?php if ($_smarty_tpl->tpl_vars['page']->value == 'sign') {?>
    <link rel="stylesheet" href="https://cdn1.stratus.co/content/themes/default/css/bootstrap.min.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/login.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/custom.css">
    <link rel="stylesheet" type='text/css'
        href="https://cdn1.stratus.co/content/themes/default/css/style-custom-light.css">
    <?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['system']->value['language']['dir'] == "LTR") {?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="https://cdn1.stratus.co/content/themes/default/css/bootstrap.min.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/style.min.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/custom.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/setting_nav.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/custom-style.css">
    <?php } else { ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
        integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/style.rtl.min.css">
    <?php }?>

    <link rel="stylesheet" type='text/css'
        href="https://cdn1.stratus.co/content/themes/default/css/live_video_style.css">
    <link rel="stylesheet" type='text/css'
        href="https://cdn1.stratus.co/content/themes/default/css/style-responsive.css">
    <link rel="stylesheet" type='text/css'
        href="https://cdn1.stratus.co/content/themes/default/css/style-custom-light.css">
    <link rel="stylesheet" type='text/css'
        href="https://cdn1.stratus.co/content/themes/default/css/custom_responsive_style.css">
    <!-- CSS -->

    <?php }?>

    <!-- CSS -->
    <!-- CSS Customized -->
    <?php $_smarty_tpl->_subTemplateRender('file:_head.css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <!-- CSS Customized -->
    <?php if ($_smarty_tpl->tpl_vars['userGlobal']->value->_logged_in || $_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
    <!-- Emoji Animation Script -->
    <?php echo '<script'; ?>
 src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"><?php echo '</script'; ?>
>

    <!-- Emoji Animation Script -->
    <?php }?>
    <?php echo '<script'; ?>
 src="https://cdn1.stratus.co/includes/assets/js/stratus/lazysizes.min.js"><?php echo '</script'; ?>
>
    <!-- Header Custom JavaScript -->
    <?php if ($_smarty_tpl->tpl_vars['system']->value['custome_js_header']) {?>
    <?php echo '<script'; ?>
>
        { html_entity_decode($system['custome_js_header'], ENT_QUOTES) }
    <?php echo '</script'; ?>
>
    <?php }?>
    <!-- Header Custom JavaScript -->

</head><?php }
}
