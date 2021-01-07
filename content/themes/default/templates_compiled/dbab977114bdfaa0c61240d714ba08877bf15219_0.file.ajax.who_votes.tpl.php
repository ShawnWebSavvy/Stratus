<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-04 11:26:55
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.who_votes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff2fb7fe46fa6_14324001',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dbab977114bdfaa0c61240d714ba08877bf15219' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/ajax.who_votes.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_user.tpl' => 1,
  ),
),false)) {
function content_5ff2fb7fe46fa6_14324001 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal-header">
    <h6 class="modal-title"><?php echo __("People who voted for this option");?>
</h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <?php if ($_smarty_tpl->tpl_vars['users']->value) {?>
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
            <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value["connection"]), 0, true);
?>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>

        <?php if (count($_smarty_tpl->tpl_vars['users']->value) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
            <!-- see-more -->
            <div class="alert alert-info see-more js_see-more" data-get="voters" data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                <span><?php echo __("Load More");?>
</span>
                <div class="loader loader_small x-hidden"></div>
            </div>
            <!-- see-more -->
        <?php }?>
    <?php } else { ?>
        <p class="text-center text-muted">
            <?php echo __("No people voted for this");?>

        </p>
    <?php }?>
</div>
<?php }
}
