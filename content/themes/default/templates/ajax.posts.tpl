{if $posts}
<div class="bricklayer">
	{foreach $posts as $post}
	{include file='__feeds_posts.tpl' _get=$_get}
	{/foreach}
	<!-- posts -->
</div>

<!-- see-more -->
<div class="alert alert-post see-more js_see-more {if $user->_logged_in}js_see-more-infinite{/if}"
	data-get="{$_get}" data-filter="{if $_filter}{$_filter}{else}all{/if}" {if $_id}data-id="{$_id}" {/if}>
	<span>{__("More Stories")}</span>
	<div class="loader loader_small x-hidden"></div>
</div>
<!-- see-more -->
{else}
<div class="js_posts_stream no-data-main no_data_img_ __no_data_contet__" data-get="{$_get}"
	data-filter="{if $_filter}{$_filter}{else}all{/if}" {if $_id}data-id="{$_id}" {/if}>
	<!-- no posts -->
	<div class="text-center text-muted no-post-to-show">
		<img width="100%"
			src="{$system['system_uploads_assets']}/content/themes/{$system['theme']}/images/no_results3.png">
		<p class="mb10"><strong>{__("No posts to show")}</strong></p>
	</div>
	<!-- no posts -->
</div>
{/if}
<script src="{$system['system_uploads_assets']}/content/themes/default/js/bricklayer.min.js"  {if !$user->_logged_in}defer{/if}></script>
<script src="{$system['system_uploads_assets']}/content/themes/default/js/bricklayer-custom.js"  {if !$user->_logged_in}defer{/if}></script>