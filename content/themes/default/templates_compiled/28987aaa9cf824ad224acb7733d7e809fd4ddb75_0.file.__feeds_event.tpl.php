<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-30 11:45:25
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_event.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fec68552f6e35_18807804',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28987aaa9cf824ad224acb7733d7e809fd4ddb75' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_event.tpl',
      1 => 1609248087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fec68552f6e35_18807804 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_tpl']->value == "box") {?>
<li class="col-md-6 col-lg-4 col-xl-3 explore_page_lists">
    <div class="ui-box uiBoxPosition">
        <div class="img">
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
                <img class="lazyload" alt="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
" data-src="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_picture'];?>
" />
            </a>
        </div>
        <div class="mt10">
            <a class="h6"
                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
</a>
            <div><?php echo $_smarty_tpl->tpl_vars['_event']->value['event_interested'];?>
 <?php echo __("Interested");?>
</div>
        </div>
        <div class="mt10">
            <?php if ($_smarty_tpl->tpl_vars['_event']->value['i_joined']['is_interested']) {?>
            <button type="button" class="btn js_uninterest-event" data-id="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];?>
">
                <img class="lazyload"
                    data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/icon_active_state.svg">
                <?php echo __("Interested");?>

            </button>
            <?php } else { ?>
            <button type="button" class="btn js_interest-event" data-id="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];?>
">
                <div class="svg-container">
                    <img class="lazyload blackicon" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/event.svg">
                    <img class="lazyload whiteicon" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/eventHover.svg">
                </div>
                <?php echo __("Interested");?>

            </button>
            <?php }?>
        </div>
    </div>
</li>
<?php } elseif ($_smarty_tpl->tpl_vars['_tpl']->value == "list") {?>
<li class="feeds-item">
    <div class="data-container <?php if ($_smarty_tpl->tpl_vars['_small']->value) {?>small<?php }?>">
        <a class="data-avatar" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
            <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
">
        </a>
        <div class="data-content">
            <div class="float-right">
                <?php if ($_smarty_tpl->tpl_vars['_event']->value['i_joined']['is_interested']) {?>
                <button type="button" class="btn js_uninterest-event" data-id="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];?>
">
                    <img class="lazyload"
                        data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/icon_active_state.svg">
                    <?php echo __("Interested");?>

                </button>
                <?php } else { ?>
                <button type="button" class="btn js_interest-event" data-id="<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];?>
">
                    <div class="svg-container">
                        <img class="lazyload blackicon" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/event.svg">
                        <img class="lazyload whiteicon" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/eventHover.svg">
                    </div>
                    <?php echo __("Interested");?>

                </button>
                <?php }?>
            </div>
            <div>
                <span class="name">
                    <a
                        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/events/<?php echo $_smarty_tpl->tpl_vars['_event']->value['event_id'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_event']->value['event_title'];?>
</a>
                </span>
                <div><?php echo $_smarty_tpl->tpl_vars['_event']->value['event_interested'];?>
 <?php echo __("Interested");?>
</div>
            </div>
        </div>
    </div>
</li>
<?php }
}
}
