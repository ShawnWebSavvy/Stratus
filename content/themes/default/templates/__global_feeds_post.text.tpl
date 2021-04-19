{if !$show_all }
<div class="post-replace">
	{if $post['colored_pattern']}
	<div class="post-colored customColorPost" {if $post['colored_pattern']['type']=="color" }
		style="background-image: linear-gradient(45deg, {$post['colored_pattern']['background_color_1']}, {$post['colored_pattern']['background_color_2']});"
		{else} style="background-image: url({$system['system_uploads']}/{$post['colored_pattern']['background_image']})"
		{/if}>
		<div class="post-colored-text-wrapper">
			<div class="post-text" dir="auto" style="color: {$post['colored_pattern']['text_color']};">
				{if $page !== 'post'}
					{if $post['text_plain']|count_characters:true < 101}
						{$post['slice_text']}
					{else}
						{$post['slice_text']}... <a class="readMoreCustom" href="{$system['system_url']}/global-profile-posts/{$post['post_id']}"> Read More</a>
					{/if}
				{else}
					{$post['text']}
				{/if}
			</div>
		</div>
	</div>
	{else}
	<div class="post-text js_readmore" dir="auto">{$post['text']}</div>
	{/if}
	<div class="post-text-translation x-hidden" dir="auto"></div>
	<div class="post-text-plain x-hidden">{$post['text_plain']}</div>
</div>
{else}

<div class="post-replace">
	{if $post['colored_pattern']}
	<div class="post-colored customColorPost" {if $post['colored_pattern']['type']=="color" }
		style="background-image: linear-gradient(45deg, {$post['colored_pattern']['background_color_1']}, {$post['colored_pattern']['background_color_2']});"
		{else} style="background-image: url({$system['system_uploads']}/{$post['colored_pattern']['background_image']})"
		{/if}>
		<div class="post-colored-text-wrapper">
			<div class="post-text" dir="auto" style="color: {$post['colored_pattern']['text_color']};">
				{* {$post['text']} *}

				{if $page !== 'post'}
					{if $post['text']|count_characters:true < 101}
						{$post['text']}
					{else}
						{$post['text']|truncate:100}<a class="readMoreCustom" href="{$system['system_url']}/global-profile-posts/{$post['post_id']}"> Read More</a>
					{/if}
				{else}
					{$post['text']}
				{/if}
			</div>
		</div>
	</div>
	{else}
	<a href="{$system['system_url']}/global-profile-posts/{$post['post_id']}" title="Show this thread">
		<div class="post-text js_readmore sss" dir="auto">{$post['text']|unescape:'html'}</div>
	</a>
	{/if}
	<div class="post-text-translation x-hidden" dir="auto"></div>
	<div class="post-text-plain x-hidden">{$post['text_plain']}</div>
</div>

{/if}