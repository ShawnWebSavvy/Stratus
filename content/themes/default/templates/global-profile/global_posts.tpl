<!-- posts-filter -->
<div class="posts-filter col-12">
    <span>{if $_title}{$_title}{else}{__("Recent Updates")}{/if}</span>
    {if !$_filter}
	    <div class="float-right">
	        <div class="btn-group btn-group-sm js_posts-filter" data-value="all" title='{__("All")}'>
	            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-display="static">
	                <i class="btn-group-icon fa fa-bars fa-fw"></i> <span class="btn-group-text">{__("All")}</span>
	            </button>
	            <div class="dropdown-menu dropdown-menu-right fillterPopChange">
	                <div class="dropdown-item pointer" data-title='{__("All")}' data-value="all">	<div class="imgHover">
						<img alt="All" title="All" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/FillterAll.svg">
						<img alt="All" class="hoverIcon" title="All" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/FillterAllHover.svg">
					</div>
					{__("All")}</div>
	                <div class="dropdown-item pointer" data-title='{__("Text")}' data-value="">	<div class="imgHover">
						<img alt="Text" title="Text" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_messages.svg">
						<img alt="Text" class="hoverIcon" title="Text" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_messages_hover.svg">
					</div>{__("Text")}</div>
	                <div class="dropdown-item pointer" data-title='{__("Links")}' data-value="link"><div class="imgHover">
						<img alt="Links" title="Links" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/at_icon.svg">
						<img alt="Links" class="hoverIcon" title="Links" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/at_icon_hover.svg">
					</div>{__("Links")}</div>
	                <div class="dropdown-item pointer" data-title='{__("Media")}' data-value="media"><div class="imgHover">
						<img alt="Media" title="Media" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/FillterMedia.svg">
						<img alt="Media" class="hoverIcon" title="Media" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/FillterMediaHover.svg">
					</div>{__("Media")}</div>
	                <div class="dropdown-item pointer" data-title='{__("Photos")}' data-value="photos"><div class="imgHover">
						<img alt="Photos" title="Photos" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/photo_message_iconHover.svg">
						<img alt="Photos" class="hoverIcon" title="Photos" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/photo_message_icon.svg">
					</div>{__("Photos")}</div>
	                {if $system['geolocation_enabled']}
	                	<div class="dropdown-item pointer" data-title='{__("Maps")}' data-value="map"><div class="imgHover">
							<img alt="Maps" title="Maps" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addpostLocation.svg">
							<img alt="Maps" class="hoverIcon" title="Maps" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addpostLocationHover.svg">
						</div>{__("Maps")}</div>
	                {/if}
	                {if $system['market_enabled'] && $_get != "posts_page" && $_get != "posts_group" && $_get != "posts_event"}
	                	<div class="dropdown-item pointer" data-title='{__("Products")}' data-value="product"><div class="imgHover">
							<img alt="Products" title="Products" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_marketHub.svg">
							<img alt="Products" class="hoverIcon" title="Products" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_marketHub_active.svg">
						</div>{__("Products")}</div>
	                {/if}
	                {if $system['blogs_enabled'] && $_get != "posts_page" && $_get != "posts_group" && $_get != "posts_event"}
	                	<div class="dropdown-item pointer" data-title='{__("Articles")}' data-value="article"><div class="imgHover">
							<img alt="Articles" title="Articles" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/coloredpost.svg">
							<img alt="Articles" class="hoverIcon" title="Articles" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/coloredpostHover.svg">
						</div>{__("Articles")}</div>
	                {/if}
	                {if $system['polls_enabled']} 
	                	<div class="dropdown-item pointer" data-title='{__("Polls")}' data-value="poll"><div class="imgHover">
							<img alt="Polls" title="Polls" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/FillterPoll.svg">
							<img alt="Polls" class="hoverIcon" title="Polls" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/FillterPollHover.svg">
						</div>{__("Polls")}</div>
	                {/if}
	                {if $system['videos_enabled']}
	                	<div class="dropdown-item pointer" data-title='{__("Videos")}' data-value="video"><div class="imgHover">
							<img alt="Videos" title="Videos" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_video_iconHover.svg">
							<img alt="Videos" class="hoverIcon" title="Videos" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_video_icon.svg">
						</div>{__("Videos")}</div>
	                {/if}
	                {if $system['audio_enabled']}
	                	<div class="dropdown-item pointer" data-title='{__("Audios")}' data-value="audio"><div class="imgHover">
							<img alt="Audio" title="Audio" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_voice_notesHover.svg">
							<img alt="Audio" class="hoverIcon" title="Audio" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_voice_notes.svg">
						</div>{__("Audio")}</div>
	                {/if}
	                {if $system['file_enabled']}
	                	<div class="dropdown-item pointer" data-title='{__("Files")}' data-value="file"><div class="imgHover">
							<img alt="Files" title="Files" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/FillterFile.svg">
							<img alt="Files" class="hoverIcon" title="Files" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/FillterFileHover.svg">
						</div>{__("Files")}</div>
	                {/if}
	            </div>
	        </div>
	    </div>
    {elseif $_filter == "article"}
    	{if $user->_data['can_write_articles']}
	    	<div class="float-right">
	    		<a href="{$system['system_url']}/blogs/new" class="btn btn-sm _cmn_btn post-tpl">
					<img src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/filePlusIcon.svg">
					{__("Add New Article")}
	            </a>
	    	</div>
    	{/if}
    {elseif $_filter == "product"}
    	{if $user->_data['can_sell_products']}
	        <div class="float-right">
	            <button type="button" class="btn btn-sm _cmn_btn post-tpl" data-toggle="modal" data-url="posts/product.php?do=create">
	                <i class="fa fa-plus-circle mr5"></i>{__("Add New Product")}
	            </button>
	    	</div>
    	{/if}
    {/if}
</div>
<!-- posts-filter -->

<!-- posts-loader -->
<div class="post x-hidden js_posts_loader">
	<div class="post-body">
		<div class="panel-effect">
			<div class="fake-effect fe-0"></div>
			<div class="fake-effect fe-1"></div>
			<div class="fake-effect fe-2"></div>
			<div class="fake-effect fe-3"></div>
			<div class="fake-effect fe-4"></div>
			<div class="fake-effect fe-5"></div>
			<div class="fake-effect fe-6"></div>
			<div class="fake-effect fe-7"></div>
			<div class="fake-effect fe-8"></div>
			<div class="fake-effect fe-9"></div>
			<div class="fake-effect fe-10"></div>
			<div class="fake-effect fe-11"></div>
		</div>
	</div>
</div>
<!-- posts-loader -->

<div class="js_posts_stream" data-get="{$_get}" data-filter="{if $_filter}{$_filter}{else}all{/if}" {if $_id}data-id="{$_id}"{/if}>
	{if $posts}
		<ul class="global-profile-ul-post feeds_post_ul asfasfasfasfasfasf" id="{if $_get === "newsfeed"}timeline_profile{else}global_profile_posts{/if}">
			<!-- posts -->
			{foreach $posts as $post}
				{include file='global-profile/global-profile__feeds_post.tpl' _get=$_get}
			{/foreach}
			<!-- posts -->
		</ul>

		<!-- see-more -->
		<div class="alert alert-post see-more js_see-more {if $user->_logged_in}js_see-more-infinite{/if}" data-get="{$_get}" data-filter="{if $_filter}{$_filter}{else}all{/if}" {if $_id}data-id="{$_id}"{/if}>
			<span>{__("More Stories")}</span>
			<div class="loader loader_small x-hidden"></div>
		</div>
		<!-- see-more -->
	{else}
		<div class="" data-get="{$_get}" data-filter="{if $_filter}{$_filter}{else}all{/if}" {if $_id}data-id="{$_id}"{/if}>
			<ul class="global-profile-ul-post __nodataimg__ __no_data_contet__">
				<!-- no posts -->
				<div class="text-center no_data_img_">
					<img width="100%" src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results3.png">
					<p class="mb10"><strong>{__("No posts to show")}</strong></p>
				</div>
				<!-- no posts -->
			</ul>
		</div>
	{/if}
</div>

		
