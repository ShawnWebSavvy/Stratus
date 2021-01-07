<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 06:59:50
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global_posts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff40e66ea0270_10376978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e73e87fcddf6020bc1418909fa2f6c26a0dc20ba' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global_posts.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:global-profile/global-profile__feeds_post.tpl' => 1,
  ),
),false)) {
function content_5ff40e66ea0270_10376978 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- posts-filter -->
<div class="posts-filter col-12">
    <span><?php if ($_smarty_tpl->tpl_vars['_title']->value) {
echo $_smarty_tpl->tpl_vars['_title']->value;
} else {
echo __("Recent Updates");
}?></span>
    <?php if (!$_smarty_tpl->tpl_vars['_filter']->value) {?>
	    <div class="float-right">
	        <div class="btn-group btn-group-sm js_posts-filter" data-value="all" title='<?php echo __("All");?>
'>
	            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-display="static">
	                <i class="btn-group-icon fa fa-bars fa-fw"></i> <span class="btn-group-text"><?php echo __("All");?>
</span>
	            </button>
	            <div class="dropdown-menu dropdown-menu-right fillterPopChange">
	                <div class="dropdown-item pointer" data-title='<?php echo __("All");?>
' data-value="all">	<div class="imgHover">
						<img alt="All" title="All" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/FillterAll.svg">
						<img alt="All" class="hoverIcon" title="All" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/FillterAllHover.svg">
					</div>
					<?php echo __("All");?>
</div>
	                <div class="dropdown-item pointer" data-title='<?php echo __("Text");?>
' data-value="">	<div class="imgHover">
						<img alt="Text" title="Text" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_messages.svg">
						<img alt="Text" class="hoverIcon" title="Text" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_messages_hover.svg">
					</div><?php echo __("Text");?>
</div>
	                <div class="dropdown-item pointer" data-title='<?php echo __("Links");?>
' data-value="link"><div class="imgHover">
						<img alt="Links" title="Links" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/at_icon.svg">
						<img alt="Links" class="hoverIcon" title="Links" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/at_icon_hover.svg">
					</div><?php echo __("Links");?>
</div>
	                <div class="dropdown-item pointer" data-title='<?php echo __("Media");?>
' data-value="media"><div class="imgHover">
						<img alt="Media" title="Media" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/FillterMedia.svg">
						<img alt="Media" class="hoverIcon" title="Media" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/FillterMediaHover.svg">
					</div><?php echo __("Media");?>
</div>
	                <div class="dropdown-item pointer" data-title='<?php echo __("Photos");?>
' data-value="photos"><div class="imgHover">
						<img alt="Photos" title="Photos" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/photo_message_iconHover.svg">
						<img alt="Photos" class="hoverIcon" title="Photos" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/photo_message_icon.svg">
					</div><?php echo __("Photos");?>
</div>
	                <?php if ($_smarty_tpl->tpl_vars['system']->value['geolocation_enabled']) {?>
	                	<div class="dropdown-item pointer" data-title='<?php echo __("Maps");?>
' data-value="map"><div class="imgHover">
							<img alt="Maps" title="Maps" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addpostLocation.svg">
							<img alt="Maps" class="hoverIcon" title="Maps" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addpostLocationHover.svg">
						</div><?php echo __("Maps");?>
</div>
	                <?php }?>
	                <?php if ($_smarty_tpl->tpl_vars['system']->value['market_enabled'] && $_smarty_tpl->tpl_vars['_get']->value != "posts_page" && $_smarty_tpl->tpl_vars['_get']->value != "posts_group" && $_smarty_tpl->tpl_vars['_get']->value != "posts_event") {?>
	                	<div class="dropdown-item pointer" data-title='<?php echo __("Products");?>
' data-value="product"><div class="imgHover">
							<img alt="Products" title="Products" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_marketHub.svg">
							<img alt="Products" class="hoverIcon" title="Products" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_marketHub_active.svg">
						</div><?php echo __("Products");?>
</div>
	                <?php }?>
	                <?php if ($_smarty_tpl->tpl_vars['system']->value['blogs_enabled'] && $_smarty_tpl->tpl_vars['_get']->value != "posts_page" && $_smarty_tpl->tpl_vars['_get']->value != "posts_group" && $_smarty_tpl->tpl_vars['_get']->value != "posts_event") {?>
	                	<div class="dropdown-item pointer" data-title='<?php echo __("Articles");?>
' data-value="article"><div class="imgHover">
							<img alt="Articles" title="Articles" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/coloredpost.svg">
							<img alt="Articles" class="hoverIcon" title="Articles" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/coloredpostHover.svg">
						</div><?php echo __("Articles");?>
</div>
	                <?php }?>
	                <?php if ($_smarty_tpl->tpl_vars['system']->value['polls_enabled']) {?> 
	                	<div class="dropdown-item pointer" data-title='<?php echo __("Polls");?>
' data-value="poll"><div class="imgHover">
							<img alt="Polls" title="Polls" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/FillterPoll.svg">
							<img alt="Polls" class="hoverIcon" title="Polls" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/FillterPollHover.svg">
						</div><?php echo __("Polls");?>
</div>
	                <?php }?>
	                <?php if ($_smarty_tpl->tpl_vars['system']->value['videos_enabled']) {?>
	                	<div class="dropdown-item pointer" data-title='<?php echo __("Videos");?>
' data-value="video"><div class="imgHover">
							<img alt="Videos" title="Videos" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_video_iconHover.svg">
							<img alt="Videos" class="hoverIcon" title="Videos" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_video_icon.svg">
						</div><?php echo __("Videos");?>
</div>
	                <?php }?>
	                <?php if ($_smarty_tpl->tpl_vars['system']->value['audio_enabled']) {?>
	                	<div class="dropdown-item pointer" data-title='<?php echo __("Audios");?>
' data-value="audio"><div class="imgHover">
							<img alt="Audio" title="Audio" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_voice_notesHover.svg">
							<img alt="Audio" class="hoverIcon" title="Audio" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_voice_notes.svg">
						</div><?php echo __("Audio");?>
</div>
	                <?php }?>
	                <?php if ($_smarty_tpl->tpl_vars['system']->value['file_enabled']) {?>
	                	<div class="dropdown-item pointer" data-title='<?php echo __("Files");?>
' data-value="file"><div class="imgHover">
							<img alt="Files" title="Files" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/FillterFile.svg">
							<img alt="Files" class="hoverIcon" title="Files" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/FillterFileHover.svg">
						</div><?php echo __("Files");?>
</div>
	                <?php }?>
	            </div>
	        </div>
	    </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['_filter']->value == "article") {?>
    	<?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_write_articles']) {?>
	    	<div class="float-right">
	    		<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/new" class="btn btn-sm _cmn_btn post-tpl">
					<img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/filePlusIcon.svg">
					<?php echo __("Add New Article");?>

	            </a>
	    	</div>
    	<?php }?>
    <?php } elseif ($_smarty_tpl->tpl_vars['_filter']->value == "product") {?>
    	<?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_sell_products']) {?>
	        <div class="float-right">
	            <button type="button" class="btn btn-sm _cmn_btn post-tpl" data-toggle="modal" data-url="posts/product.php?do=create">
	                <i class="fa fa-plus-circle mr5"></i><?php echo __("Add New Product");?>

	            </button>
	    	</div>
    	<?php }?>
    <?php }?>
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

<div class="js_posts_stream" data-get="<?php echo $_smarty_tpl->tpl_vars['_get']->value;?>
" data-filter="<?php if ($_smarty_tpl->tpl_vars['_filter']->value) {
echo $_smarty_tpl->tpl_vars['_filter']->value;
} else { ?>all<?php }?>" <?php if ($_smarty_tpl->tpl_vars['_id']->value) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_id']->value;?>
"<?php }?>>
	<?php if ($_smarty_tpl->tpl_vars['posts']->value) {?>
		<ul class="global-profile-ul-post feeds_post_ul asfasfasfasfasfasf" id="<?php if ($_smarty_tpl->tpl_vars['_get']->value === "newsfeed") {?>timeline_profile<?php } else { ?>global_profile_posts<?php }?>">
			<!-- posts -->
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
$_smarty_tpl->tpl_vars['post']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->do_else = false;
?>
				<?php $_smarty_tpl->_subTemplateRender('file:global-profile/global-profile__feeds_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>$_smarty_tpl->tpl_vars['_get']->value), 0, true);
?>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<!-- posts -->
		</ul>

		<!-- see-more -->
		<div class="alert alert-post see-more mb20 js_see-more <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>js_see-more-infinite<?php }?>" data-get="<?php echo $_smarty_tpl->tpl_vars['_get']->value;?>
" data-filter="<?php if ($_smarty_tpl->tpl_vars['_filter']->value) {
echo $_smarty_tpl->tpl_vars['_filter']->value;
} else { ?>all<?php }?>" <?php if ($_smarty_tpl->tpl_vars['_id']->value) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_id']->value;?>
"<?php }?>>
			<span><?php echo __("More Stories");?>
</span>
			<div class="loader loader_small x-hidden"></div>
		</div>
		<!-- see-more -->
	<?php } else { ?>
		<div class="" data-get="<?php echo $_smarty_tpl->tpl_vars['_get']->value;?>
" data-filter="<?php if ($_smarty_tpl->tpl_vars['_filter']->value) {
echo $_smarty_tpl->tpl_vars['_filter']->value;
} else { ?>all<?php }?>" <?php if ($_smarty_tpl->tpl_vars['_id']->value) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_id']->value;?>
"<?php }?>>
			<ul class="global-profile-ul-post __nodataimg__ __no_data_contet__">
				<!-- no posts -->
				<div class="text-center no_data_img_">
					<img width="100%" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results3.png">
					<p class="mb10"><strong><?php echo __("No posts to show");?>
</strong></p>
				</div>
				<!-- no posts -->
			</ul>
		</div>
	<?php }?>
</div>

		
<?php }
}
