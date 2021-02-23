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
    <link rel="shortcut icon"
        href="{$system['system_url']}/content/themes/{$system['theme']}/images/clouds.ico?{$cacheremove}" />
    {elseif $system['system_favicon']}
    <link rel="shortcut icon" href="{$system['system_uploads']}/{$system['system_favicon']}" />
    {/if}
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/content/themes/default/css/live_video_style.css">
    <link rel="stylesheet" href="{$system['system_uploads_assets']}/content/themes/default/css/bootstrap.min.css">
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/content/themes/default/css/landingcss.css">
    <link rel="stylesheet" type='text/css'
        href="{$system['system_uploads_assets']}/content/themes/default/css/landingCustom.css">
    <script src="{$system['system_url']}/includes/assets/js/stratus/lazysizes.min.js"></script>
    <link rel="stylesheet" type='text/css'
            href="{$system['system_url']}/content/themes/{$system['theme']}/css/investmentStyle.css">

</head>