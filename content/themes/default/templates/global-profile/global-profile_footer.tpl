<!-- ads -->
{include file='_ads.tpl' _ads=$ads_master['footer'] _master=true}
<!-- ads -->

{if $page != "index"}
<!-- include file='_footer.links.tpl'} -->
{/if}

</div>
{if $userGlobal->_logged_in}
<!-- main wrapper -->
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/macy@2"></script>

<!-- Dependencies CSS [Twemoji-Awesome] -->
<link rel="stylesheet" href="{$system['system_url']}/includes/assets/css/twemoji-awesome/twemoji-awesome.min.css">
<!-- Dependencies CSS [Twemoji-Awesome] -->
{/if}
<!-- JS Files -->
{if $system['s3_enabled']}
{include file='global-profile/global-profile_js_files_aws.tpl'}
{else}
{include file='global-profile/global-profile_js_files.tpl'}
{/if}
<!-- JS Files -->

<!-- JS Templates -->
{include file='global-profile/global-profile_js_templates.tpl'}
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
	<!-- sub of global-->
	<ul class="m-nav left-sidebar-{if ($page!='global-profile/global-profile-timeline')}first {else}second{/if}-ul {if $page== "
		people" || $page=="groups" || $page=="ads" || $page=="pages" || $page=="events" } active{/if} {$page}">

		<li {if ($active_page=='GlobalHub' )}class="active" {/if}>
			<a href="{$system['system_url']}/global-profile-timeline">
				<div class="svg-container">
					<img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub-active.svg"
						class="blackicon">
					<img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
						class="whiteicon">
				</div>
				<span class="navText">Global Hub</span>
			</a>
		</li>
		<li {if $subactive_page=='globalhub_followers' }class="active" {/if}>
			<a href="{$system['system_url']}/global-profile.php?username={$user->_data['user_name']}&view=followers">
				<div class="svg-container">
					<img src="{$system['system_url']}/content/themes/default/images/svg/friendsIcon.svg"
						class="whiteicon">
					<img src="{$system['system_url']}/content/themes/default/images/svg/friendsIconHover.svg"
						class="blackicon">
				</div>
			</a>
		</li>

		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="blackicon">
					<img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>

		<li {if $page=="messages_global" }class="active" {/if}>
			<a href="{$system['system_url']}/globalMessages">
				<div class="svg-container">
					<img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_messages.svg"
						class=" whiteicon">
					<img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_messages_hover.svg"
						class="blackicon">
				</div>
			</a>
		</li>
		<li {if ($subactive_page=='globalhub_profile' )}class="active" {/if}>
			<a href="{$system['system_url']}/global-profile.php?username={$user->_data['user_name']}">
				<div class="svg-container">
					<img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_friends-active.svg"
						class="blackicon">
					<img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/nav_icon_friends.svg"
						class="whiteicon">
				</div>
				<span class="navText">Profile</span>
			</a>
		</li>
	</ul>
	<!-- sub of global end -->
</div>
{/if}
</body>

</html>