<!-- ads -->
{include file='_ads.tpl' _ads=$ads_master['footer'] _master=true}
<!-- ads -->

{if $page == "static"}
{include file='_footer.links.tpl'}
{/if}

</div>
<!-- main wrapper -->
{if $user->_logged_in}
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/macy@2"></script>

<!-- Dependencies CSS [Twemoji-Awesome] -->
<link rel="stylesheet" href="{$system['system_url']}/includes/assets/css/twemoji-awesome/twemoji-awesome.min.css">
<!-- Dependencies CSS [Twemoji-Awesome] -->
{/if}
<!-- JS Files -->
{if $system['s3_enabled']}
{include file='_js_files_aws.tpl'}
{else}
{include file='_js_files.tpl'}
{/if}
<!-- JS Files -->

<!-- JS Templates -->
{include file='_js_templates.tpl'}
<!-- JS Templates -->

<!-- Footer Custom JavaScript -->
{if $system['custome_js_footer']}
<script>
	{ html_entity_decode($system['custome_js_footer'], ENT_QUOTES) }
</script>
{/if}
<!-- Footer Custom JavaScript -->

<!-- Analytics Code -->
{if $system['analytics_code']}{html_entity_decode($system['analytics_code'], ENT_QUOTES)}{/if}
<!-- Analytics Code -->


</body>

</html>