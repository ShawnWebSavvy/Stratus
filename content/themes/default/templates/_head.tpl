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
    <link rel="shortcut icon" href="{$system['system_url']}/content/themes/default/images/clouds.ico " />
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
    <link rel="stylesheet" href="https://cdn1.stratus.co/content/themes/default/css/bootstrap.min.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/login.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/custom.css">
    <link rel="stylesheet" type='text/css'
        href="https://cdn1.stratus.co/content/themes/default/css/style-custom-light.css">
    {else}
    {if $system['language']['dir'] == "LTR"}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="https://cdn1.stratus.co/content/themes/default/css/bootstrap.min.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/style.min.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/custom.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/setting_nav.css">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/custom-style.css">
    {else}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
        integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" type='text/css' href="https://cdn1.stratus.co/content/themes/default/css/style.rtl.min.css">
    {/if}

    <link rel="stylesheet" type='text/css'
        href="https://cdn1.stratus.co/content/themes/default/css/live_video_style.css">
    <link rel="stylesheet" type='text/css'
        href="https://cdn1.stratus.co/content/themes/default/css/style-responsive.css">
    <link rel="stylesheet" type='text/css'
        href="https://cdn1.stratus.co/content/themes/default/css/style-custom-light.css">
    <link rel="stylesheet" type='text/css'
        href="https://cdn1.stratus.co/content/themes/default/css/custom_responsive_style.css">
    <!-- CSS -->

    {/if}

    <!-- CSS -->
    <!-- CSS Customized -->
    {include file='_head.css.tpl'}
    <!-- CSS Customized -->
    {if $userGlobal->_logged_in || $user->_logged_in}
    <!-- Emoji Animation Script -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <!-- Emoji Animation Script -->
    {/if}
    <script src="https://cdn1.stratus.co/includes/assets/js/stratus/lazysizes.min.js"></script>
    <!-- Header Custom JavaScript -->
    {if $system['custome_js_header']}
    <script>
        { html_entity_decode($system['custome_js_header'], ENT_QUOTES) }
    </script>
    {/if}
    <!-- Header Custom JavaScript -->

</head>