<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-30 11:45:25
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fec6855299814_28620741',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '361599bc7965dd1df31bdb21bc13e3cd944c409e' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_page.tpl',
      1 => 1609248087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fec6855299814_28620741 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_tpl']->value == "box") {?>
<li class="col-md-6  col-lg-4 col-xl-3 explore_page_lists">
    <div class="ui-box uiBoxPosition">
        <div class="img">
            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
                <img class="lazyload" alt="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_title'];?>
" data-src="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_picture'];?>
" />
            </a>
        </div>
        <div class="mt10">
            <span class="js_user-popover" data-uid="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_id'];?>
" data-type="page">
                <a class="h6"
                    href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_page']->value['page_title'];?>
</a>
            </span>
            <?php if ($_smarty_tpl->tpl_vars['_page']->value['page_verified']) {?>
            <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified Page");?>
'
                class="fa fa-check-circle fa-fw verified-badge"></i>
            <?php }?>
            <div><?php echo $_smarty_tpl->tpl_vars['_page']->value['page_likes'];?>
 <?php echo __("Likes");?>
</div>
        </div>
        <div class="mt10">
            <?php if ($_smarty_tpl->tpl_vars['_page']->value['i_like']) {?>
            <button type="button" class="btn js_unlike-page unlike-button-stratus" data-id="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_id'];?>
">
                <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/local_hubN.svg"
                    class="whiteicon"><?php echo __("Unlike");?>

            </button>
            <?php } else { ?>
            <button type="button" class="btn js_like-page like-button-stratus" data-id="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_id'];?>
">
                <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/local_hubN.svg"
                    class="whiteicon">
                <?php echo __("Like");?>

            </button>
            <?php }?>
        </div>
    </div>
</li>
<?php } elseif ($_smarty_tpl->tpl_vars['_tpl']->value == "list") {?>
<li class="feeds-item">
    <div class="data-container <?php if ($_smarty_tpl->tpl_vars['_small']->value) {?>small<?php }?>">
        <a class="data-avatar" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>">
            <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_title'];?>
">
        </a>
        <div class="data-content">
            <div class="float-right">
                <?php if ($_smarty_tpl->tpl_vars['_page']->value['i_like']) {?>
                <button type="button" class="btn js_unlike-page unlike-button-stratus" data-id="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_id'];?>
">
                    <img  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/local_hubN.svg"
                        class="whiteicon"><?php echo __("Unlike");?>

                </button>
                <?php } else { ?>
                <button type="button" class="btn js_like-page like-button-stratus" data-id="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_id'];?>
">
                    <img class="lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/content/themes/default/images/svg/svgImg/local_hubN.svg"
                        class="whiteicon">
                    <?php echo __("Like");?>

                </button>
                <?php }?>
            </div>
            <div>
                <span class="name js_user-popover" data-uid="<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_id'];?>
" data-type="page">
                    <a
                        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['_page']->value['page_name'];
if ($_smarty_tpl->tpl_vars['_search']->value) {?>?ref=qs<?php }?>"><?php echo $_smarty_tpl->tpl_vars['_page']->value['page_title'];?>
</a>
                </span>
                <?php if ($_smarty_tpl->tpl_vars['_page']->value['page_verified']) {?>
                <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified Page");?>
'
                    class="fa fa-check-circle fa-fw verified-badge"></i>
                <?php }?>
                <div><?php echo $_smarty_tpl->tpl_vars['_page']->value['page_likes'];?>
 <?php echo __("Likes");?>
</div>
            </div>
        </div>
    </div>
</li>
<?php }
}
}
