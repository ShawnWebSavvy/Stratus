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

<!-- Sounds -->
{if $user->_logged_in}
<!-- Notification -->
{* <audio id="notification-sound" preload="auto">
	<source src="{$system['system_uploads_assets']}/includes/assets/sounds/notification.mp3" type="audio/mpeg">
</audio> *}
<!-- Notification -->
<!-- Chat -->
<audio id="chat-sound" preload="auto">
	<source src="{$system['system_uploads_assets']}/includes/assets/sounds/chat.mp3" type="audio/mpeg">
</audio>
<!-- Chat -->
<!-- Call -->
<audio id="chat-calling-sound" preload="auto" loop="true">
	<source src="{$system['system_uploads_assets']}/includes/assets/sounds/calling.mp3" type="audio/mpeg">
</audio>
<!-- Call -->
<!-- Video -->
<audio id="chat-ringing-sound" preload="auto" loop="true">
	<source src="{$system['system_uploads_assets']}/includes/assets/sounds/ringing.mp3" type="audio/mpeg">
</audio>
<!-- Video -->
{/if}
<!-- Sounds -->
{if ($page!="global-profile/landingpage")}
<div class="footer_mobile">
	<ul class="m-nav left-sidebar-{if ($page!='global-profile/global-profile-timeline' && $page!='market' && $page!='ads' && $page!='blogs')}second{else}first{/if}-ul {if $page== "
		people" || $page=="groups" || $page=="ads" || $page=="pages" || $page=="events" } active{/if} {$page} {$view}">

		{if ($page!="global-profile/global-profile-timeline" && $page!="market" && $page!="ads" && $page!="blogs" &&
		$view !="articles" && $active_page!="MarketHub")}

		<li dsg {if ($page=='localhub' || $page=='index' )}class="active" {/if}>
			<a href="{$system['system_url']}">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_localhub-active.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_localhub.svg"
						class="whiteicon">
				</div>
				<!-- {include file='__svg_icons.tpl' icon="memories"} -->
				<span class="navText">{__("Local Hub")}</span>
			</a>
		</li>
		<li {if $page=="people" && $page!='global-profile/landingpage' }class="active" {/if}>
			<a href="{$system['system_url']}/people/friend_requests">
				<!-- {include file='__svg_icons.tpl' icon="settings" class=""} -->
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/friendsIcon.svg"
						class="whiteicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/friendsIconHover.svg"
						class="blackicon">
				</div>
				<span class="navText">friend</span>
				<span class="counter blue {if count($user->_data['all_friends']) == 0}x-hidden{/if}">
					{count($user->_data['all_friends'])}
				</span>
			</a>
		</li>
		{if $system['memories_enabled']}
		<!-- <li class="{if ($page=='memories')}active{/if}">
	<a href="{$system['system_url']}/memories">
		<div class="svg-container">
			<img src="{$system['system_url']}/content/themes/default/images/mmenu/mo_Icon_calender_black.svg"
				class="blackicon">
			<img src="{$system['system_url']}/content/themes/default/images/mmenu/mo_Icon_calender.svg"
				class="whiteicon">
		</div>
		 {include file='__svg_icons.tpl' icon="memories"}
		<span class="navText">{__("Memories")}</span>
	</a>
</li> -->
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li {if $page=="messages" }class="active" {/if}>
			<a href="{$system['system_url']}/messages" class="{$page}">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Comment2.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Comment.svg"
						class="whiteicon">
				</div>
				<!--  con="chat"  -->
				<span class="navText">{__("Messages")}</span>
			</a>
		</li>
		<li {if $page=="profile" }class="active" {/if}>
			<a page="{$page}" href="{$system['system_url']}/{$user->_data['user_name']}">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/User2.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/User.svg"
						class="whiteicon">
				</div><span class="navText">Profile</span>
			</a>
		</li>
		{/if}

		{/if}
		{if $page =='blogs'}
		<li {if $page=="blogs" }class="active" {/if}>
			<a href="{$system['system_url']}/blogs">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_blogHub_active.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_blogHub.svg"
						class="whiteicon">
				</div>
				<span class="navText"> {__("Blog Hub")}</span>
			</a>
		</li>
		<li {if $page=="blogs" }class="active" {/if}>
			<a href="{$system['system_url']}/articles">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/blogNews.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/blogNewsHover.svg"
						class="whiteicon">
				</div>
				<span class="navText">articles</span>
			</a>
		</li>
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li {if $page=="blogs" && $view=="new" }class="active" {/if}>
			<a href="{$system['system_url']}/blogs/new">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/filePlusIcon_active.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/filePlusIcon.svg"
						class="whiteicon">
				</div>
				<span class="navText">Add New Article</span>
			</a>
		</li>
		{/if}

		{if $active_page=="MarketHub"}
		<li {if $active_page=="MarketHub" }class="active" {/if}>
			<a href="{$system['system_url']}/market">
				<div class="svg-container {$page}">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_marketHub.svg"
						class="whiteicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_marketHub_active.svg"
						class="blackicon">
				</div>
				<span class="navText">{__("Market Hub")}</span>
			</a>
		</li>
		<li {if $page=="market" }class="active" {/if}>
			<a href="{$system['system_url']}/products">
				<div class="svg-container {$page}">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/coloredpost.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/coloredpostHover.svg"
						class="whiteicon">
				</div>
				<span class="navText">{__("Market Hub")}</span>
			</a>
		</li>
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li {if $page=="market" }class="active" {/if}>
			<a data-toggle="modal" data-url="posts/product.php?do=create">
				<div class="svg-container {$page}">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="whiteicon">
				</div>
				<span class="navText">{__("Market Hub")}</span>
			</a>
		</li>
		{/if}

		{if $page =='ads' && $view !='wallet'}
		<li {if $page=="ads" && $view!="wallet" }class="active" {/if}>
			<a href=" {$system['system_url']}/ads">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_adHub.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_adHub_active.svg"
						class="whiteicon">
				</div>
				<span class="navText">{__("Ads Hub")}</span>
			</a>
		</li>
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li {if $page=="ads" && $view!="wallet" }class="active" {/if}>
			<a href=" {$system['system_url']}/ads/new">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="whiteicon">
				</div>
				<span class="navText">{__("Ads Hub")}</span>
			</a>
		</li>
		{/if}

		{if $page =='ads' && $view =='wallet'}
		<li {if $page=="ads" && $view=="wallet" }class="active" {/if}>
			<a href=" {$system['system_url']}/wallet">
				<div class="svg-container ">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Wallet.svg"
						class="whiteicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/Wallet-active.svg"
						class="blackicon">
				</div>
				<span class="navText">{__("Wallet")}</span>
			</a>
		</li>
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li {if $page=="ads" && $view=="wallet" }class="active" {/if}>
			<a href=" {$system['system_url']}/ads/new">
				<div class="svg-container ">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="whiteicon">
				</div>
				<span class="navText">{__("Wallet")}</span>
			</a>
		</li>
		{/if}

		{if $view =="articles" && $page =="index"}
		<li {if $page=="blogs" }class="active" {/if}>
			<a href="{$system['system_url']}/blogs">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_blogHub.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/nav_icon_blogHub_active.svg"
						class="whiteicon">
				</div>
				<span class="navText"> {__("Blog Hub")}</span>
			</a>
		</li>
		<li {if $page=="blogs" }class="active" {/if}>
			<a href="{$system['system_url']}/articles">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/blogNews.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/blogNewsHover.svg"
						class="whiteicon">
				</div>
				<span class="navText">Articles</span>
			</a>
		</li>
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li {if $page=="blogs" }class="active" {/if}>
			<a href="{$system['system_url']}/blogs/new">
				<div class="svg-container">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/filePlusIcon_active.svg"
						class="blackicon">
					<img src="{$system['system_uploads_assets']}/content/themes/default/images/svg/svgImg/filePlusIcon.svg"
						class="whiteicon">
				</div>
				<span class="navText">Add New Article</span>
			</a>
		</li>
		{/if}

	</ul>
</div>
{/if}

</body>

</html>