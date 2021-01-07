<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-04 09:11:56
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/admin.verification.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff2dbdcb09bb9_75917712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7a37c5d14cc1e286a3071db6e65b4b9838d053a' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/admin.verification.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff2dbdcb09bb9_75917712 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/sngine/includes/libs/Smarty/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),1=>array('file'=>'/opt/lampp/htdocs/sngine/includes/libs/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="card">
    <div class="card-header with-icon">
        <i class="fa fa-check-circle mr10"></i><?php echo __("Verification");?>

        <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?> &rsaquo; <?php echo __("Requests");
}?>
        <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "users") {?> &rsaquo; <?php echo __("Verified Users");
}?>
        <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "pages") {?> &rsaquo; <?php echo __("Verified Pages");
}?>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover js_dataTable">
                    <thead>
                        <tr>
                            <th><?php echo __("ID");?>
</th>
                            <th><?php echo __("User/Page");?>
</th>
                            <th><?php echo __("Type");?>
</th>
                            <th><?php echo __("Time");?>
</th>
                            <th><?php echo __("Actions");?>
</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['request_id'];?>
</td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['row']->value['node_type'] == "user") {?>
                                        <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
">
                                            <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['user_picture'];?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['row']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['user_lastname'];?>

                                        </a>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['row']->value['node_type'] == "page") {?>
                                        <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['row']->value['page_name'];?>
">
                                            <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['page_picture'];?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['row']->value['page_title'];?>

                                        </a>
                                    <?php }?>
                                </td>
                                <td>
                                    <span class="label label-<?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['row']->value['node_type']);?>
</span>
                                </td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['time'],"%e %B %Y");?>
</td>
                                <td>
                                    <button data-toggle="tooltip" data-placement="top" title='<?php echo __("View Verification Documents");?>
' class="btn btn-sm btn-icon btn-rounded btn-info js_admin-verification-documents" data-photo="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" data-passport="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['passport'];?>
" data-message="<?php echo $_smarty_tpl->tpl_vars['row']->value['message'];?>
" data-handle="<?php echo $_smarty_tpl->tpl_vars['row']->value['node_type'];?>
" data-node-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['node_id'];?>
" data-request-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['request_id'];?>
">
                                        <i class="fa fa-paperclip"></i>
                                    </button>
                                    <button data-toggle="tooltip" data-placement="top" title='<?php echo __("Verify");?>
' class="btn btn-sm btn-icon btn-rounded btn-success js_admin-verify" data-handle="<?php echo $_smarty_tpl->tpl_vars['row']->value['node_type'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['node_id'];?>
">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <button data-toggle="tooltip" data-placement="top" title='<?php echo __("Decline");?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-unverify" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['request_id'];?>
">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "users") {?>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover js_dataTable">
                    <thead>
                        <tr>
                            <th><?php echo __("ID");?>
</th>
                            <th><?php echo __("Name");?>
</th>
                            <th><?php echo __("Username");?>
</th>
                            <th><?php echo __("Joined");?>
</th>
                            <th><?php echo __("Actions");?>
</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                            <tr>
                                <td><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
</a></td>
                                <td>
                                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
">
                                        <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['user_picture'];?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['row']->value['user_lastname'];?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>
" target="_blank">
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value['user_name'];?>

                                    </a>
                                </td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['user_registered'],"%e %B %Y");?>
</td>
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title='<?php echo __("Edit");?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
" class="btn btn-sm btn-icon btn-rounded btn-primary">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <button data-toggle="tooltip" data-placement="top" title='<?php echo __("Delete");?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="user" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['user_id'];?>
">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "pages") {?>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover js_dataTable">
                    <thead>
                        <tr>
                            <th><?php echo __("ID");?>
</th>
                            <th><?php echo __("Page");?>
</th>
                            <th><?php echo __("Likes");?>
</th>
                            <th><?php echo __("Actions");?>
</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
                            <tr>
                                <td>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['row']->value['page_name'];?>
" target="_blank">
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value['page_id'];?>

                                    </a>
                                </td>
                                <td>
                                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/<?php echo $_smarty_tpl->tpl_vars['row']->value['page_name'];?>
">
                                        <img class="tbl-image" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['page_picture'];?>
">
                                        <?php echo $_smarty_tpl->tpl_vars['row']->value['page_title'];?>

                                    </a>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['page_likes'];?>
</td>
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title='<?php echo __("Edit");?>
' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/pages/edit_page/<?php echo $_smarty_tpl->tpl_vars['row']->value['page_id'];?>
" class="btn btn-sm btn-icon btn-rounded btn-primary">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <button data-toggle="tooltip" data-placement="top" title='<?php echo __("Delete");?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="page" data-id="<?php echo $_smarty_tpl->tpl_vars['row']->value['page_id'];?>
">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php }?>
</div><?php }
}
