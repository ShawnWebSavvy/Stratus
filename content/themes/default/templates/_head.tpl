<!doctype html>

<html lang="{$system['language']['code']}" {if $system['language']['dir']=="RTL" } dir="RTL" {/if}>

<head>
    {assign var="cacheremove" value=$smarty.now|date_format:'%Y-%m-%d_%H:%M:%S'}
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="generator" content="{$page_title|truncate:70}">
    <meta name="version" content="{$system['system_version']}">

    <!-- Title -->
    <title>{$page_title|truncate:70}</title>
    <!-- Title -->

    <!-- Meta -->
    <meta name="description" content="{$page_description|truncate:300}">
    <meta name="keywords" content="{$system['system_keywords']}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Meta -->

    <!-- OG-Meta -->
    <meta property="og:title" content="{$page_title|truncate:70}" />
    <meta property="og:description" content="{$page_description|truncate:300}" />
    <meta property="og:site_name" content="{$system['system_title']}" />
    <meta property="og:image" content="{$page_image}" />
    <!-- OG-Meta -->

    <!-- Twitter-Meta -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{$page_title|truncate:70}" />
    <meta name="twitter:description" content="{$page_description|truncate:300}" />
    <meta name="twitter:image" content="{$page_image}" />
    <!-- Twitter-Meta -->

    <!-- Favicon -->
    {if $system['system_favicon_default']}
    <link rel="shortcut icon" href="{$system['system_uploads_assets']}/content/themes/default/images/clouds.ico " />
    {elseif $system['system_favicon']}
    <link rel="shortcut icon" href="{$system['system_uploads']}/{$system['system_favicon']}" />
    {/if}
    <!-- Favicon -->
    <!-- Fonts [Roboto|Font-Awesome] -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"> -->
    <!-- Fonts [Roboto|Font-Awesome] -->
    <!-- CSS -->
    {if $page =='sign'}
    <link rel="stylesheet" href="{$system['system_uploads_assets']}/content/themes/default/css/bootstrap.min.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/content/themes/default/css/login.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/content/themes/default/css/custom.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/content/themes/default/css/style-custom-light.css"  {if !$user->_logged_in}defer{/if}>
    {else}
    {if $system['language']['dir'] == "LTR"}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" href="{$system['system_uploads_assets']}/content/themes/default/css/bootstrap.min.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_url']}/content/themes/default/css/style.min.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/content/themes/default/css/custom.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/content/themes/default/css/setting_nav.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_url']}/content/themes/default/css/custom-style.css"  {if !$user->_logged_in}defer{/if}>
    {else}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
        integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/content/themes/default/css/style.rtl.min.css"  {if !$user->_logged_in}defer{/if}>
    {/if}
    <script src="https://cdn1.stratus.co/includes/assets/js/stratus/lazysizes.min.js"></script>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/content/themes/default/css/live_video_style.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_url']}/content/themes/default/css/style-responsive.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/content/themes/default/css/style-custom-light.css"  {if !$user->_logged_in}defer{/if}>
    <link rel="stylesheet" type='text/css'
        href="{$system['system_url']}/content/themes/default/css/custom_responsive_style.css">
    <!-- CSS -->
    <link rel="stylesheet" type='text/css'
            href="{$system['system_uploads_assets']}/content/themes/{$system['theme']}/css/investmentStyle.css">
    {/if}

    <!-- CSS -->
    <!-- CSS Customized -->
    {include file='_head.css.tpl'}
    <!-- CSS Customized -->

    <script src="{$system['system_uploads_assets']}/includes/assets/js/stratus/lazysizes.min.js"  {if !$user->_logged_in}defer{/if}></script>
    <!-- Header Custom JavaScript -->
    {if $system['custome_js_header']}
    <script>
        { html_entity_decode($system['custome_js_header'], ENT_QUOTES) }
    </script>
    {/if}
    <!-- Header Custom JavaScript -->
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/includes/assets/css/blurry-load.min.css" 
        {if !$user->_logged_in}defer{/if} >
    <script src="{$system['system_uploads_assets']}/includes/assets/js/stratus/blurry-load.min.js"  {if !$user->_logged_in}defer{/if}></script>

    <!-- Load jQuery now so we can lazy load components -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"  {if !$user->_logged_in}defer{/if}></script>
</head>
