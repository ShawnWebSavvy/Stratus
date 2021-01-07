<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 06:59:51
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff40e672e1839_38234470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ce65aeba90d0b3024226dc962212af90c2cef69' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile_footer.tpl',
      1 => 1609398318,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_ads.tpl' => 1,
    'file:global-profile/global-profile_js_files_aws.tpl' => 1,
    'file:global-profile/global-profile_js_files.tpl' => 1,
    'file:global-profile/global-profile_js_templates.tpl' => 1,
  ),
),false)) {
function content_5ff40e672e1839_38234470 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- ads -->
<?php $_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_ads'=>$_smarty_tpl->tpl_vars['ads_master']->value['footer'],'_master'=>true), 0, false);
?>
<!-- ads -->

<?php if ($_smarty_tpl->tpl_vars['page']->value != "index") {?>
<!-- include file='_footer.links.tpl'} -->
<?php }?>

</div>
<?php if ($_smarty_tpl->tpl_vars['userGlobal']->value->_logged_in) {?>
<!-- main wrapper -->
<?php echo '<script'; ?>
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
$_smarty_tpl->_subTemplateRender('file:global-profile/global-profile_js_files_aws.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
} else {
$_smarty_tpl->_subTemplateRender('file:global-profile/global-profile_js_files.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}?>
<!-- JS Files -->

<!-- JS Templates -->
<?php $_smarty_tpl->_subTemplateRender('file:global-profile/global-profile_js_templates.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
	<!-- sub of global-->
	<ul class="m-nav left-sidebar-<?php if (($_smarty_tpl->tpl_vars['page']->value != 'global-profile/global-profile-timeline')) {?>first <?php } else { ?>second<?php }?>-ul <?php if ($_smarty_tpl->tpl_vars['page']->value == "
		people" || $_smarty_tpl->tpl_vars['page']->value == "groups" || $_smarty_tpl->tpl_vars['page']->value == "ads" || $_smarty_tpl->tpl_vars['page']->value == "pages" || $_smarty_tpl->tpl_vars['page']->value == "events") {?> active<?php }?> <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">

		<li <?php if (($_smarty_tpl->tpl_vars['active_page']->value == 'GlobalHub')) {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile-timeline.php">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_globalHub-active.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_globalHub.svg"
						class="whiteicon">
				</div>
				<span class="navText">Global Hub</span>
			</a>
		</li>
		<li <?php if ($_smarty_tpl->tpl_vars['subactive_page']->value == 'globalhub_followers') {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
&view=followers">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/friendsIcon.svg"
						class="whiteicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/friendsIconHover.svg"
						class="blackicon">
				</div>
			</a>
		</li>

		<li class="sidebar mobileLogo">
			<a href="javascript:void(0)" class="leftSidebarButton">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/apps_icon.svg"
						class="whiteicon">
				</div>
			</a>
		</li>

		<li <?php if ($_smarty_tpl->tpl_vars['page']->value == "messages_global") {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/globalMessages">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_messages.svg"
						class=" whiteicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_messages_hover.svg"
						class="blackicon">
				</div>
			</a>
		</li>
		<li <?php if (($_smarty_tpl->tpl_vars['subactive_page']->value == 'globalhub_profile')) {?>class="active" <?php }?>>
			<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile.php?username=<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
">
				<div class="svg-container">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_friends-active.svg"
						class="blackicon">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_friends.svg"
						class="whiteicon">
				</div>
				<span class="navText">Profile</span>
			</a>
		</li>
	</ul>
	<!-- sub of global end -->
</div>
<?php }?>
</body>

</html><?php }
}
