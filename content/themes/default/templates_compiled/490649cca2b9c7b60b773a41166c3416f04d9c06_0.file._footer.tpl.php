<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 12:49:27
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff4605756ff65_55072543',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '490649cca2b9c7b60b773a41166c3416f04d9c06' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_footer.tpl',
      1 => 1609850942,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_ads.tpl' => 1,
    'file:_footer.links.tpl' => 1,
    'file:_js_files_aws.tpl' => 1,
    'file:_js_files.tpl' => 1,
    'file:_js_templates.tpl' => 1,
    'file:__svg_icons.tpl' => 3,
  ),
),false)) {
function content_5ff4605756ff65_55072543 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- ads -->
<?php $_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_ads'=>$_smarty_tpl->tpl_vars['ads_master']->value['footer'],'_master'=>true), 0, false);
?>
<!-- ads -->

<?php if ($_smarty_tpl->tpl_vars['page']->value == "static") {
$_smarty_tpl->_subTemplateRender('file:_footer.links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>

</div>
<!-- main wrapper -->
<?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {
echo '<script'; ?>
 src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/macy@2"><?php echo '</script'; ?>
>

<!-- Dependencies CSS [Twemoji-Awesome] -->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/css/twemoji-awesome/twemoji-awesome.min.css">
<!-- Dependencies CSS [Twemoji-Awesome] -->
<?php }?>
<!-- JS Files -->
<?php if ($_smarty_tpl->tpl_vars['system']->value['s3_enabled']) {
$_smarty_tpl->_subTemplateRender('file:_js_files_aws.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else {
$_smarty_tpl->_subTemplateRender('file:_js_files.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>
<!-- JS Files -->

<!-- JS Templates -->
<?php $_smarty_tpl->_subTemplateRender('file:_js_templates.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<!-- JS Templates -->

<!-- Footer Custom JavaScript -->
<?php if ($_smarty_tpl->tpl_vars['system']->value['custome_js_footer']) {
echo '<script'; ?>
>
	{ html_entity_decode($system['custome_js_footer'], ENT_QUOTES) }
<?php echo '</script'; ?>
>
<?php }?>
<!-- Footer Custom JavaScript -->

<!-- Analytics Code -->
<?php if ($_smarty_tpl->tpl_vars['system']->value['analytics_code']) {
echo html_entity_decode($_smarty_tpl->tpl_vars['system']->value['analytics_code'],ENT_QUOTES);
}?>
<!-- Analytics Code -->

<!-- Sounds -->
<?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
<!-- Notification -->
<!-- Notification -->
<!-- Chat -->
<audio id="chat-sound" preload="auto">
	<source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/sounds/chat.mp3" type="audio/mpeg">
</audio>
<!-- Chat -->
<!-- Call -->
<audio id="chat-calling-sound" preload="auto" loop="true">
	<source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/sounds/calling.mp3" type="audio/mpeg">
</audio>
<!-- Call -->
<!-- Video -->
<audio id="chat-ringing-sound" preload="auto" loop="true">
	<source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/sounds/ringing.mp3" type="audio/mpeg">
</audio>
<!-- Video -->
<?php }?>
<!-- Sounds -->
<?php if (($_smarty_tpl->tpl_vars['page']->value != "global-profile/landingpage")) {?>
<div class="footer_mobile">
	<ul class="m-nav left-sidebar-<?php if (($_smarty_tpl->tpl_vars['page']->value != 'global-profile/global-profile-timeline' && $_smarty_tpl->tpl_vars['page']->value != 'market' && $_smarty_tpl->tpl_vars['page']->value != 'ads' && $_smarty_tpl->tpl_vars['page']->value != 'blogs')) {?>second<?php } else { ?>first<?php }?>-ul <?php if ($_smarty_tpl->tpl_vars['page']->value == "
		people" || $_smarty_tpl->tpl_vars['page']->value == "groups" || $_smarty_tpl->tpl_vars['page']->value == "ads" || $_smarty_tpl->tpl_vars['page']->value == "pages" || $_smarty_tpl->tpl_vars['page']->value == "events") {?> active<?php }?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['view']->value;?>
">

		<?php if (($_smarty_tpl->tpl_vars['page']->value != "global-profile/global-profile-timeline" && $_smarty_tpl->tpl_vars['page']->value != "market" && $_smarty_tpl->tpl_vars['page']->value != "ads" && $_smarty_tpl->tpl_vars['page']->value != "blogs" && $_smarty_tpl->tpl_vars['view']->value != "articles" && $_smarty_tpl->tpl_vars['active_page']->value != "MarketHub")) {?>

		<li dsg <?php if (($_smarty_tpl->tpl_vars['page']->value == 'localhub' || $_smarty_tpl->tpl_vars['page']->value == 'index')) {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/nav_icon_localhub-active.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/nav_icon_localhub.svg"
						class="whiteicon">
				</div>
				<!-- <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"memories"), 0, false);
?> -->
				<span class="navText"><?php echo __("Local Hub");?>
</span>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "people" && $_smarty_tpl->tpl_vars['page']->value != 'global-profile/landingpage') {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/friend_requests">
				<!-- <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"settings",'class'=>''), 0, true);
?> -->
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/friendsIcon.svg"
						class="whiteicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/friendsIconHover.svg"
						class="blackicon">
				</div>
				<span class="navText">friend</span>
				<span class="counter blue <?php if (count($_smarty_tpl->tpl_vars['user']->value->_data['all_friends']) == 0) {?>x-hidden<?php }?>">
					<?php echo count($_smarty_tpl->tpl_vars['user']->value->_data['all_friends']);?>

				</span>
			</a>
		</li>
		<?php if ($_smarty_tpl->tpl_vars['system']->value['memories_enabled']) {?>
		<!-- <li class="<?php if (($_smarty_tpl->tpl_vars['page']->value == 'memories')) {?>active<?php }?>">
	<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/memories">
		<div class="svg-container">
			<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/mmenu/mo_Icon_calender_black.svg"
				class="blackicon">
			<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/mmenu/mo_Icon_calender.svg"
				class="whiteicon">
		</div>
		 <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"memories"), 0, true);
?>
		<span class="navText"><?php echo __("Memories");?>
</span>
	</a>
</li> -->
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "messages") {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/messages" class="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Comment2.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Comment.svg"
						class="whiteicon">
				</div>
				<!--  con="chat"  -->
				<span class="navText"><?php echo __("Messages");?>
</span>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "profile") {?>class="active" <?php }?>>
			<a page="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/User2.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/User.svg"
						class="whiteicon">
				</div><span class="navText">Profile</span>
			</a>
		</li>
		<?php }?>

		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['page']->value == 'blogs') {?>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "blogs") {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/nav_icon_blogHub_active.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/nav_icon_blogHub.svg"
						class="whiteicon">
				</div>
				<span class="navText"> <?php echo __("Blog Hub");?>
</span>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "blogs") {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/articles">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/blogNews.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/blogNewsHover.svg"
						class="whiteicon">
				</div>
				<span class="navText">articles</span>
			</a>
		</li>
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "blogs" && $_smarty_tpl->tpl_vars['view']->value == "new") {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/new">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/filePlusIcon_active.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/filePlusIcon.svg"
						class="whiteicon">
				</div>
				<span class="navText">Add New Article</span>
			</a>
		</li>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['active_page']->value == "MarketHub") {?>
		<li <?php if ($_smarty_tpl->tpl_vars['active_page']->value == "MarketHub") {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/market">
				<div class="svg-container <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/nav_icon_marketHub.svg"
						class="whiteicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/nav_icon_marketHub_active.svg"
						class="blackicon">
				</div>
				<span class="navText"><?php echo __("Market Hub");?>
</span>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "market") {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/products">
				<div class="svg-container <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/coloredpost.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/coloredpostHover.svg"
						class="whiteicon">
				</div>
				<span class="navText"><?php echo __("Market Hub");?>
</span>
			</a>
		</li>
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "market") {?>class="active" <?php }?>>
			<a data-toggle="modal" data-url="posts/product.php?do=create">
				<div class="svg-container <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="whiteicon">
				</div>
				<span class="navText"><?php echo __("Market Hub");?>
</span>
			</a>
		</li>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page']->value == 'ads' && $_smarty_tpl->tpl_vars['view']->value != 'wallet') {?>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "ads" && $_smarty_tpl->tpl_vars['view']->value != "wallet") {?>class="active" <?php }?>>
			<a href=" <?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/ads">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/nav_icon_adHub.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/nav_icon_adHub_active.svg"
						class="whiteicon">
				</div>
				<span class="navText"><?php echo __("Ads Hub");?>
</span>
			</a>
		</li>
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "ads" && $_smarty_tpl->tpl_vars['view']->value != "wallet") {?>class="active" <?php }?>>
			<a href=" <?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/ads/new">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="whiteicon">
				</div>
				<span class="navText"><?php echo __("Ads Hub");?>
</span>
			</a>
		</li>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page']->value == 'ads' && $_smarty_tpl->tpl_vars['view']->value == 'wallet') {?>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "ads" && $_smarty_tpl->tpl_vars['view']->value == "wallet") {?>class="active" <?php }?>>
			<a href=" <?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/wallet">
				<div class="svg-container ">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/Wallet.svg"
						class="whiteicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/Wallet-active.svg"
						class="blackicon">
				</div>
				<span class="navText"><?php echo __("Wallet");?>
</span>
			</a>
		</li>
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "ads" && $_smarty_tpl->tpl_vars['view']->value == "wallet") {?>class="active" <?php }?>>
			<a href=" <?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/ads/new">
				<div class="svg-container ">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Icon.svg"
						class="whiteicon">
				</div>
				<span class="navText"><?php echo __("Wallet");?>
</span>
			</a>
		</li>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['view']->value == "articles" && $_smarty_tpl->tpl_vars['page']->value == "index") {?>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "blogs") {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/nav_icon_blogHub.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/nav_icon_blogHub_active.svg"
						class="whiteicon">
				</div>
				<span class="navText"> <?php echo __("Blog Hub");?>
</span>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "blogs") {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/articles">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/blogNews.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/blogNewsHover.svg"
						class="whiteicon">
				</div>
				<span class="navText">Articles</span>
			</a>
		</li>
		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/footer-icon/Apps.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "blogs") {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/new">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/filePlusIcon_active.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/filePlusIcon.svg"
						class="whiteicon">
				</div>
				<span class="navText">Add New Article</span>
			</a>
		</li>
		<?php }?>

	</ul>
</div>
<?php }?>

</body>

</html><?php }
}
