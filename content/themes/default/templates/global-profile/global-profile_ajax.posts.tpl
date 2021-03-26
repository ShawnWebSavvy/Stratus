{if $_get}
	{if $posts}
		<ul class="global-profile-ul-post feeds_post_ul">
			{foreach $posts as $post}
			{include file='global-profile/global-profile__feeds_post.tpl'}
			{/foreach}
		</ul>

		<!-- see-more -->
		<div class="alert alert-post see-more js_see-more {if $user->_logged_in}js_see-more-infinite{/if}" data-get="{$_get}" data-filter="{$_filter}" {if $_id}data-id="{$_id}"{/if}>
			<span>{__("More Stories")}</span>
			<div class="loader loader_small x-hidden"></div>
		</div>
		<!-- see-more -->
	{else}
		<div class="text-center text-muted">
			<div class="text-center text-muted no_data_img_ __no_data_contet__">
					<img width="50%" src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results5.png">
					<p class="mb10"><strong>{__("No posts to show")}</strong></p>
				</div>
		</div>
	{/if}
{else}
	{foreach $posts as $post}
	{include file='global-profile/global-profile__feeds_post.tpl'}
	{/foreach}
{/if}