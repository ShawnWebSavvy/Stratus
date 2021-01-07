<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:10:23
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_header.search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf27f2a0e49_06757633',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c78b909c06469f880c29c5c9ad03a5d7af5f29e' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_header.search.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:global_ajax.search.tpl' => 1,
    'file:ajax.search.tpl' => 1,
  ),
),false)) {
function content_5feaf27f2a0e49_06757633 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="search-wrapper d-none d-md-block">
  <form class="header-search-form">
    <div class="search-input-icon">
      <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/Search2.svg" alt="search icon">
    </div>
    <input id="search-input" type="text" class="form-control"
      placeholder='<?php echo __("Search for Users, Tags, Places and More");?>
' autocomplete="off" />
    <div id="search-results" class="dropdown-menu dropdown-widget dropdown-search js_dropdown-keepopen">
      <div class="dropdown-widget-header">
        <span class="title"><?php echo __("Search Results");?>
</span>
      </div>
      <div class="dropdown-widget-body">
        <div class="loader loader_small ptb10"></div>
      </div>
      <?php if (($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-timeline' || $_smarty_tpl->tpl_vars['page']->value == 'global-profile/search' || $_smarty_tpl->tpl_vars['page']->value == 'global-profile/explore')) {?>
      <a class="dropdown-widget-footer" id="search-results-all"
        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/globalhub-search/"><?php echo __("See All Results");?>
</a>

      <?php } else { ?>

      <a class="dropdown-widget-footer" id="search-results-all" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/search/"><?php echo __("See All
        Results");?>
</a>
      <?php }?>

    </div>
    <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['user']->value->_data['search_log']) {?>
    <div id="search-history" class="dropdown-menu dropdown-widget dropdown-search js_dropdown-keepopen">
      <div class="dropdown-widget-header">
        <span class="text-link float-right js_clear-searches">
          <?php echo __("Clear");?>

        </span>
        <span class="title"><i class="fa fa-clock mr5"></i><?php echo __("Recent Searches");?>
</span>
      </div>
      <div class="dropdown-widget-body <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">
        <?php if (($_smarty_tpl->tpl_vars['page']->value == 'global-profile/global-profile-timeline' || $_smarty_tpl->tpl_vars['page']->value == 'global-profile/explore')) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:global_ajax.search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('results'=>$_smarty_tpl->tpl_vars['userGlobal']->value->_data['search_log']), 0, false);
?>
        <?php } else { ?>
        <?php $_smarty_tpl->_subTemplateRender('file:ajax.search.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('results'=>$_smarty_tpl->tpl_vars['user']->value->_data['search_log']), 0, false);
?>
        <?php }?>
      </div>
      <a class="dropdown-widget-footer" id="search-results-all" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/search/"><?php echo __("Advanced
        Search");?>
</a>
    </div>
    <?php }?>
  </form>
</div><?php }
}
