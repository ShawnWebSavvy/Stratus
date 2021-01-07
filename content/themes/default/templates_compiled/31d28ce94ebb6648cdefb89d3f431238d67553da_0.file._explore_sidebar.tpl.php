<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-30 11:45:25
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_explore_sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fec68551ac263_48940272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31d28ce94ebb6648cdefb89d3f431238d67553da' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_explore_sidebar.tpl',
      1 => 1609248087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 10,
  ),
),false)) {
function content_5fec68551ac263_48940272 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- left panel -->
<div class="col-lg-12 left-offcanvas-sidebar-inner settingleftWrap">
    <div class="card">
        <div class="card-body with-nav">
            <ul class="side-nav fixessf">
                <!-- <li <?php if ($_smarty_tpl->tpl_vars['page']->value == "people") {?>class="active" <?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people">
                            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"find_people",'class'=>''), 0, false);
?>
                            <?php echo __("People");?>

                        </a>
                    </li> -->

                <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_enabled']) {?>
                <li class="<?php if ($_smarty_tpl->tpl_vars['page']->value == " pages") {?> active<?php }?> cmnm_btn_styles">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages">
                        <!-- <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"pages",'class'=>''), 0, true);
?> -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon lazyload" alt="reading1"
                                data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/reading1.svg">
                        </div>
                        <span> <?php echo __("Pages");?>
 </span>
                    </a>
                </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['system']->value['groups_enabled']) {?>
                <li class="<?php if ($_smarty_tpl->tpl_vars['page']->value == " groups") {?> active<?php }?> cmnm_btn_styles">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups">
                        <!-- <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"groups",'class'=>''), 0, true);
?> -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon lazyload" alt="newgroupIcon1"
                                data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/newgroupIcon1.svg">
                        </div>
                        <span> <?php echo __("Groups");?>
 </span>
                    </a>
                </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['system']->value['events_enabled']) {?>
                <li class=" <?php if ($_smarty_tpl->tpl_vars['page']->value == " events") {?> active <?php }?> cmnm_btn_styles">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events">
                        <!-- <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"events",'class'=>''), 0, true);
?> -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon" alt="calendar"
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/calendar.svg">
                        </div>
                        <span> <?php echo __("Events");?>
 </span>
                    </a>
                </li>
                <?php }?>

                <!-- <?php if ($_smarty_tpl->tpl_vars['system']->value['blogs_enabled']) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs">
                            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"blogs",'class'=>''), 0, true);
?>
                            <?php echo __("Blogs");?>

                        </a>
                    </li>
                    <?php }?> -->

                <!-- <?php if ($_smarty_tpl->tpl_vars['system']->value['market_enabled']) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/market">
                            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"market",'class'=>''), 0, true);
?>
                            <?php echo __("Marketplace");?>

                        </a>
                    </li>
                    <?php }?> -->

                <?php if ($_smarty_tpl->tpl_vars['system']->value['forums_enabled']) {?>
                <li class="<?php if ($_smarty_tpl->tpl_vars['page']->value == " forums") {?>active <?php }?> cmnm_btn_styles">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/forums">
                        <!-- <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"forums",'class'=>''), 0, true);
?> -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon" alt=" "
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/coloredpost.svg">
                        </div>
                        <?php echo __("Forums");?>

                    </a>
                </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['system']->value['movies_enabled']) {?>
                <li class="<?php if ($_smarty_tpl->tpl_vars['page']->value == " movies") {?> active <?php }?> cmnm_btn_styles">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/movies">
                        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"movies",'class'=>''), 0, true);
?>
                        <?php echo __("Movies");?>

                    </a>
                </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['system']->value['games_enabled']) {?>
                <li class="<?php if ($_smarty_tpl->tpl_vars['page']->value == " games") {?>active<?php }?> cmnm_btn_styles">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/games">
                        <!-- <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"games",'class'=>''), 0, true);
?> -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon" alt=" "
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/games.svg">
                        </div>
                        <?php echo __("Games");?>

                    </a>
                </li>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['system']->value['developers_apps_enabled'] || $_smarty_tpl->tpl_vars['system']->value['developers_share_enabled']) {?>
                <li class=" <?php if ($_smarty_tpl->tpl_vars['page']->value == " developers") {?> active <?php }?> cmnm_btn_styles">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/developers<?php if (!$_smarty_tpl->tpl_vars['system']->value['developers_apps_enabled']) {?>/share<?php }?>">
                        <!-- <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"developers",'class'=>''), 0, true);
?> -->
                        <div class="cmnm_btn_styles_img">
                            <img class="blackIcon" alt=" "
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/Code.svg">
                        </div>
                        <?php echo __("Developers");?>

                    </a>
                </li>
                <?php }?>


            </ul>
        </div>
    </div>
</div>
<!-- left panel --><?php }
}
