<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 06:59:50
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile-timeline.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff40e66d3cee6_48117588',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a828e2bc8602dc0613668dd375cf42aa3706cb1b' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile-timeline.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sign_form.tpl' => 1,
    'file:_footer.links.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:_announcements.tpl' => 1,
    'file:global-profile/_publisher.tpl' => 1,
    'file:_boosted_post.tpl' => 1,
    'file:global-profile/global_posts.tpl' => 1,
    'file:_posts.tpl' => 7,
    'file:__feeds_page.tpl' => 1,
    'file:right-sidebar.tpl' => 1,
    'file:global-profile/global-profile_footer.tpl' => 1,
  ),
),false)) {
function content_5ff40e66d3cee6_48117588 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>

<div class="mainloginBlock">
    <?php $_smarty_tpl->_subTemplateRender('file:_sign_form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:_footer.links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php } else { ?>

<div class="container mt20 offcanvas">
    <div class="row">
        <!-- side panel -->
        <div class="col-md-4 col-lg-3 offcanvas-sidebar js_sticky-sidebar">
            <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <!-- side panel -->
        <!-- content panel -->
        <div class="col-md-8 col-lg-9 offcanvas-mainbar">
            <div class="row">
                <!-- center panel -->
                <div class="home-page-middel-block">

                    <!-- announcments -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_announcements.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <!-- announcments -->

                    <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>

                    <!-- stories -->
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['stories_enabled']) {?>
                    <div class="card story-card">
                        <?php if ($_smarty_tpl->tpl_vars['has_story']->value) {?>
                        <button data-toggle="tooltip" data-placement="top" title='<?php echo __("Delete Your Story");?>
'
                            class="btn btn-sm btn-icon btn-rounded js_story-deleter">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/modelCross.svg"
                                class="blackicon">
                        </button>
                        <?php }?>
                        <div class="card-body stories-wrapper">
                            <div id="stories" data-json='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stories']->value["json"],ENT_QUOTES,"UTF-8");?>
'>
                                <div class="add-story add-story-test" data-toggle="modal"
                                    data-url="posts/story.php?do=create">

                                    <div class="img"
                                        style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['userGlobal']->value->_data['global_user_picture'];?>
);">
                                        <div class="addStroryPlusIcon">+</div>
                                        <p class="addStroryText">Add to Story</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <!-- stories -->

                    <!-- publisher -->
                    <?php $_smarty_tpl->_subTemplateRender('file:global-profile/_publisher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_handle'=>"me",'_privacy'=>true), 0, false);
?>
                    <!-- publisher -->

                    <!-- boosted post -->
                    <?php if ($_smarty_tpl->tpl_vars['boosted_post']->value) {?>
                    <?php $_smarty_tpl->_subTemplateRender('file:_boosted_post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('post'=>$_smarty_tpl->tpl_vars['boosted_post']->value), 0, false);
?>
                    <?php }?>
                    <!-- boosted post -->

                    <!-- posts -->
                    <!--include file='_posts.tpl' _get="newsfeed" -->
                    <?php $_smarty_tpl->_subTemplateRender('file:global-profile/global_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"newsfeed"), 0, false);
?>
                    <!-- posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "popular") {?>
                    <!-- popular posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"popular",'_title'=>__("Popular Posts")), 0, false);
?>
                    <!-- popular posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "discover") {?>
                    <!-- discover posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"discover",'_title'=>__("Discover Posts")), 0, true);
?>
                    <!-- discover posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "saved") {?>
                    <!-- saved posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"saved",'_title'=>__("Saved Posts")), 0, true);
?>
                    <!-- saved posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "memories") {?>
                    <!-- page header -->
                    <div class="page-header mini rounded-top mb10">
                        <div class="crystal c03"></div>
                        <div class="circle-1"></div>
                        <div class="circle-2"></div>
                        <div class="inner">
                            <h2><?php echo __("Memories");?>
</h2>
                            <p><?php echo __("Enjoy looking back on your memories");?>
</p>
                        </div>
                    </div>
                    <!-- page header -->

                    <!-- memories posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"memories",'_title'=>__("ON THIS DAY"),'_filter'=>"all"), 0, true);
?>
                    <!-- memories posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "articles") {?>
                    <!-- articles posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"posts_profile",'_id'=>$_smarty_tpl->tpl_vars['user']->value->_data['user_id'],'_filter'=>"article",'_title'=>__("My Articles")), 0, true);
?>
                    <!-- articles posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "products") {?>
                    <!-- products posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"posts_profile",'_id'=>$_smarty_tpl->tpl_vars['user']->value->_data['user_id'],'_filter'=>"product",'_title'=>__("My Products")), 0, true);
?>
                    <!-- products posts -->

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "boosted_posts") {?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin || $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
                    <!-- boosted posts -->
                    <?php $_smarty_tpl->_subTemplateRender('file:_posts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_get'=>"boosted",'_title'=>__("My Boosted Posts")), 0, true);
?>
                    <!-- boosted posts -->
                    <?php } else { ?>
                    <!-- upgrade -->
                    <div class="alert alert-warning">
                        <div class="icon">
                            <i class="fa fa-id-card fa-2x"></i>
                        </div>
                        <div class="text">
                            <strong><?php echo __("Membership");?>
</strong><br>
                            <?php echo __("Choose the Plan That's Right for You");?>
, <?php echo __("Check the package from");?>
 <a
                                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages"><?php echo __("Here");?>
</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="btn btn-primary"><i
                                class="fa fa-rocket mr5"></i><?php echo __("Upgrade to Pro");?>
</a>
                    </div>
                    <!-- upgrade -->
                    <?php }?>

                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "boosted_pages") {?>
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin || $_smarty_tpl->tpl_vars['user']->value->_data['user_subscribed']) {?>
                    <div class="card">
                        <div class="card-header">
                            <strong><?php echo __("My Boosted Pages");?>
</strong>
                        </div>
                        <div class="card-body">
                            <?php if ($_smarty_tpl->tpl_vars['boosted_pages']->value) {?>
                            <ul>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['boosted_pages']->value, '_page');
$_smarty_tpl->tpl_vars['_page']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_page']->value) {
$_smarty_tpl->tpl_vars['_page']->do_else = false;
?>
                                <?php $_smarty_tpl->_subTemplateRender('file:__feeds_page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list"), 0, true);
?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>

                            <?php if (count($_smarty_tpl->tpl_vars['boosted_pages']->value) >= $_smarty_tpl->tpl_vars['system']->value['max_results_even']) {?>
                            <!-- see-more -->
                            <div class="alert alert-info see-more js_see-more" data-get="boosted_pages">
                                <span><?php echo __("Load More");?>
</span>
                                <div class="loader loader_small x-hidden"></div>
                            </div>
                            <!-- see-more -->
                            <?php }?>
                            <?php } else { ?>
                            <p class="text-center text-muted mt10 no_dataimg_">
                                <img width="100%"
                                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results13.png">
                            <p> <?php echo __("No pages to show");?>
</p>
                            </p>
                            <?php }?>
                        </div>
                    </div>
                    <?php } else { ?>
                    <!-- upgrade -->
                    <div class="alert alert-warning">
                        <div class="icon">
                            <i class="fa fa-id-card fa-2x"></i>
                        </div>
                        <div class="text">
                            <strong><?php echo __("Membership");?>
</strong><br>
                            <?php echo __("Choose the Plan That's Right for You");?>
, <?php echo __("Check the package from");?>
 <a
                                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages"><?php echo __("Here");?>
</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/packages" class="btn btn-primary"><i
                                class="fa fa-rocket mr5"></i><?php echo __("Upgrade to Pro");?>
</a>
                    </div>
                    <!-- upgrade -->
                    <?php }?>

                    <?php }?>
                </div>
                <!-- center panel -->
                <!-- right panel -->
                <div class="right-sidebar js_sticky-sidebar">
                    <?php $_smarty_tpl->_subTemplateRender('file:right-sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>
                <!-- right panel -->
            </div>
        </div>
        <!-- content panel -->

    </div>
</div>


<?php }?>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:global-profile/global-profile_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
