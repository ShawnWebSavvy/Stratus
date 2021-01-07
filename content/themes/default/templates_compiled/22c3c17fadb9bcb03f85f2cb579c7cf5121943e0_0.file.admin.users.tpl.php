<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-07 06:51:37
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/admin.users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff6af79c41cf2_72374299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '22c3c17fadb9bcb03f85f2cb579c7cf5121943e0' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/admin.users.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__custom_fields.tpl' => 5,
  ),
),false)) {
function content_5ff6af79c41cf2_72374299 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/sngine/includes/libs/Smarty/plugins/modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),1=>array('file'=>'/opt/lampp/htdocs/sngine/includes/libs/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="card">
    <div class="card-header with-icon">
        <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "banned") {?>
            <div class="float-right">
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/blacklist" class="btn btn-sm btn-danger">
                    <i class="fa fa-minus-circle"></i><span class="ml5 d-none d-lg-inline-block"><?php echo __("Manage Banned IPs");?>
</span>
                </a>
            </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "find") {?>
            <div class="float-right">
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users" class="btn btn-sm btn-light">
                    <i class="fa fa-arrow-circle-left mr5"></i><?php echo __("Go Back");?>

                </a>
            </div>
        <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?>
            <div class="float-right">
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users" class="btn btn-sm btn-light">
                    <i class="fa fa-arrow-circle-left"></i><span class="ml5 d-none d-lg-inline-block"><?php echo __("Go Back");?>
</span>
                </a>
                <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['user_name'];?>
" class="btn btn-sm btn-info">
                        <img  width="30px" height="30px" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/eye-icon.svg"/>
                    <span class="ml5 d-none d-lg-inline-block"><?php echo __("View Profile");?>
</span>
                </a>
                <button type="button" class="btn btn-sm btn-danger js_admin-deleter" data-handle="user_posts" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
">
                    <i class="fa fa-trash-alt"></i><span class="ml5 d-none d-lg-inline-block"><?php echo __("Delete All Posts");?>
</span>
                </button>
            </div>
        <?php }?>
        <i class="fa fa-user mr10"></i><?php echo __("Users");?>

        <?php if ($_smarty_tpl->tpl_vars['sub_view']->value != '' && $_smarty_tpl->tpl_vars['sub_view']->value != "edit") {?> &rsaquo; <?php echo __(smarty_modifier_capitalize($_smarty_tpl->tpl_vars['sub_view']->value));
}?>
        <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?> &rsaquo; <?php echo $_smarty_tpl->tpl_vars['data']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['user_lastname'];
}?>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '' || $_smarty_tpl->tpl_vars['sub_view']->value == "admins" || $_smarty_tpl->tpl_vars['sub_view']->value == "moderators" || $_smarty_tpl->tpl_vars['sub_view']->value == "online" || $_smarty_tpl->tpl_vars['sub_view']->value == "banned" || $_smarty_tpl->tpl_vars['sub_view']->value == "find") {?>
        
        <div class="card-body">

            <?php if ($_smarty_tpl->tpl_vars['sub_view']->value == '') {?>
                <div class="form-row">
                    <div class="col-sm-4">
                        <div class="stat-panel bg-gradient-primary">
                            <div class="stat-cell">
                                <i class="fa fa-users bg-icon"></i>
                                <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['users'];?>
</span><br>
                                <span class="text-lg"><?php echo __("Users");?>
</span><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stat-panel bg-gradient-red">
                            <div class="stat-cell">
                                <i class="fa fa-minus-circle bg-icon"></i>
                                <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['banned'];?>
</span><br>
                                <span class="text-lg"><?php echo __("Banned");?>
</span><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stat-panel bg-gradient-warning">
                            <div class="stat-cell">
                                <i class="fa fa-envelope bg-icon"></i>
                                <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['not_activated'];?>
</span><br>
                                <span class="text-lg"><?php echo __("Not Activated");?>
</span><br>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>

            <!-- search form -->
            <div class="mb20">
                <form class="form-inline" action="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/find" method="get">
                    <div class="form-group mb0">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search mr5"></i><?php echo __("Search");?>
</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="form-text small">
                    <?php echo __('Search by Username, First Name, Last Name, Email or Phone');?>

                </div>
            </div>
            <!-- search form -->

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
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
                            <th><?php echo __("Activated");?>
</th>
                            <th><?php echo __("Actions");?>
</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($_smarty_tpl->tpl_vars['rows']->value) {?>
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
                                        <?php if ($_smarty_tpl->tpl_vars['row']->value['user_activated']) {?>
                                            <span class="badge badge-pill badge-lg badge-success"><?php echo __("Yes");?>
</span>
                                        <?php } else { ?>
                                            <span class="badge badge-pill badge-lg badge-danger"><?php echo __("No");?>
</span>
                                        <?php }?>
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
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" class="text-center">
                                    <?php echo __("No data to show");?>

                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

        </div>

    <?php } elseif ($_smarty_tpl->tpl_vars['sub_view']->value == "edit") {?>
        
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-2 text-center mb20">
                    <img class="img-fluid img-thumbnail rounded-circle" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_picture'];?>
">
                </div>
                <div class="col-12 col-md-5 mb20">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="float-right badge badge-lg badge-pill badge-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
</span>
                            <?php echo __("User ID");?>

                        </li>
                        <li class="list-group-item">
                            <span class="float-right badge badge-lg badge-pill badge-secondary"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['user_registered'],"%e %B %Y");?>
</span>
                            <?php echo __("Joined");?>

                        </li>
                        <li class="list-group-item">
                            <span class="float-right badge badge-lg badge-pill badge-secondary"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['user_last_seen'],"%e %B %Y");?>
</span>
                            <?php echo __("Last Login");?>

                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-5 mb20">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="float-right badge badge-lg badge-pill badge-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['friends'];?>
</span>
                            <?php echo __("Friends");?>

                        </li>
                        <li class="list-group-item">
                            <span class="float-right badge badge-lg badge-pill badge-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['followings'];?>
</span>
                            <?php echo __("Followings");?>

                        </li>
                        <li class="list-group-item">
                            <span class="float-right badge badge-lg badge-pill badge-secondary"><?php echo $_smarty_tpl->tpl_vars['data']->value['followers'];?>
</span>
                            <?php echo __("Followers");?>

                        </li>
                    </ul>
                </div>
            </div>

            <!-- tabs nav -->
            <ul class="nav nav-tabs custom-tabs mb20">
                <li class="nav-item">
                    <a class="nav-link active" href="#account" data-toggle="tab">
                        <i class="fa fa-cog fa-fw mr5"></i><strong class="mr5"><?php echo __("Account");?>
</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profile" data-toggle="tab">
                        <i class="fa fa-user fa-fw mr5"></i><strong class="mr5"><?php echo __("Profile");?>
</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#privacy" data-toggle="tab">
                        <i class="fa fa-lock fa-fw mr5"></i><strong class="mr5"><?php echo __("Privacy");?>
</strong>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#security" data-toggle="tab">
                        <i class="fa fa-shield-alt fa-fw mr5"></i><strong class="mr5"><?php echo __("Security");?>
</strong>
                    </a>
                </li>
                <?php if ($_smarty_tpl->tpl_vars['system']->value['packages_enabled']) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="#membership" data-toggle="tab">
                            <i class="fa fa-id-card fa-fw mr5"></i><strong class="mr5"><?php echo __("Membership");?>
</strong>
                        </a>
                    </li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['system']->value['wallet_enabled'] || $_smarty_tpl->tpl_vars['system']->value['points_enabled']) {?>
                    <li class="nav-item">
                        <a class="nav-link" href="#extra" data-toggle="tab">
                            <i class="fa fa-cubes fa-fw mr5"></i><strong class="mr5"><?php echo __("Extra");?>
</strong>
                        </a>
                    </li>
                <?php }?>
            </ul>
            <!-- tabs nav -->

            <!-- tabs content -->
            <div class="tab-content">
                <!-- account tab -->
                <div class="tab-pane active" id="account">
                    <form class="js_ajax-forms " data-url="admin/users.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&do=edit_account">
                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                <?php echo __("Verified User");?>

                            </label>
                            <div class="col-md-9">
                                <label class="switch" for="user_verified">
                                    <input type="checkbox" name="user_verified" id="user_verified" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_verified']) {?>checked<?php }?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                <?php echo __("Banned");?>

                            </label>
                            <div class="col-md-9">
                                <label class="switch" for="user_banned">
                                    <input type="checkbox" name="user_banned" id="user_banned" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_banned']) {?>checked<?php }?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                <?php echo __("Account Activated");?>

                            </label>
                            <div class="col-md-9">
                                <label class="switch" for="user_activated">
                                    <input type="checkbox" name="user_activated" id="user_activated" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_activated']) {?>checked<?php }?>>
                                    <span class="slider round"></span>
                                </label>
                                <span class="form-text">
                                    <?php if (!$_smarty_tpl->tpl_vars['system']->value['activation_enabled']) {?>
                                        <?php echo __("Account activation disabled from your system");?>
 <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/settings/registration"><?php ob_start();
echo __("Registration Settings");
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</a>
                                    <?php } else { ?>
                                        <?php if ($_smarty_tpl->tpl_vars['system']->value['activation_type'] == "email") {?>
                                            <?php echo __("Account activation enabled from your system settings by");?>
 <?php echo __("Email");?>

                                        <?php } else { ?>
                                            <?php echo __("Account activation enabled from your system settings by");?>
 <?php echo __("SMS");?>

                                        <?php }?>
                                    <?php }?>
                                </span>
                            </div>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['system']->value['two_factor_enabled'] && $_smarty_tpl->tpl_vars['data']->value['user_two_factor_enabled']) {?>
                            <div class="form-group form-row">
                                <label class="col-md-3 form-control-label">
                                    <?php echo __("Two-Factor Authentication");?>

                                </label>
                                <div class="col-md-9">
                                    <label class="switch" for="user_two_factor_enabled">
                                        <input type="checkbox" name="user_two_factor_enabled" id="user_two_factor_enabled" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_two_factor_enabled']) {?>checked<?php }?>>
                                        <span class="slider round"></span>
                                    </label>
                                    <span class="form-text">
                                    </span>
                                </div>
                            </div>
                        <?php }?>

                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                <?php echo __("User Group");?>

                            </label>
                            <div class="col-md-9">
                                <select class="form-control" name="user_group">
                                    <option value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_group'] == '1') {?>selected<?php }?>>
                                        <?php echo __("Administrators");?>

                                    </option>
                                    <option value="2" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_group'] == '2') {?>selected<?php }?>>
                                        <?php echo __("Moderators");?>

                                    </option>
                                    <option value="3" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_group'] == '3') {?>selected<?php }?>>
                                        <?php echo __("Users");?>

                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                <?php echo __("Username");?>

                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text d-none d-sm-block"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/</span>
                                    </div>
                                    <input type="text" class="form-control" name="user_name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_name'];?>
">
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                <?php echo __("Email Address");?>

                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="user_email" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_email'];?>
">
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                <?php echo __("Email Verified");?>

                            </label>
                            <div class="col-md-9">
                                <label class="switch" for="user_email_verified">
                                    <input type="checkbox" name="user_email_verified" id="user_email_verified" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_email_verified']) {?>checked<?php }?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        <?php if (($_smarty_tpl->tpl_vars['system']->value['activation_enabled'] && $_smarty_tpl->tpl_vars['system']->value['activation_type'] == "sms") || ($_smarty_tpl->tpl_vars['system']->value['two_factor_enabled'] && $_smarty_tpl->tpl_vars['system']->value['two_factor_type'] == "sms")) {?>
                            <div class="form-group form-row">
                                <label class="col-md-3 form-control-label">
                                    <?php echo __("Phone Number");?>

                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="user_phone" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_phone'];?>
">
                                    <span class="form-text">
                                        <?php echo __("Phone number (eg. +905...)");?>

                                    </span>
                                </div>
                            </div>

                            <div class="form-group form-row">
                                <label class="col-md-3 form-control-label">
                                    <?php echo __("Phone Verified");?>

                                </label>
                                <div class="col-md-9">
                                    <label class="switch" for="user_phone_verified">
                                        <input type="checkbox" name="user_phone_verified" id="user_phone_verified" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_phone_verified']) {?>checked<?php }?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        <?php }?>

                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                <?php echo __("Password");?>

                            </label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="user_password">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary"><?php echo __("Save Changes");?>
</button>
                                <button type="button" class="btn btn-danger js_admin-deleter" data-handle="user" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
" data-redirect="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users">
                                    <i class="fa fa-trash-alt mr5"></i><?php echo __("Delete User");?>

                                </button>
                            </div>
                        </div>

                        <!-- success -->
                        <div class="alert alert-success mb0 mt20 x-hidden"></div>
                        <!-- success -->

                        <!-- error -->
                        <div class="alert alert-danger mb0 mt20 x-hidden"></div>
                        <!-- error -->
                    </form>
                </div>
                <!-- account tab -->

                <!-- profile tab -->
                <div class="tab-pane" id="profile">
                    <form class="js_ajax-forms " data-url="admin/users.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&do=edit_profile">

                        <div class="heading-small mb20">
                            <?php echo __("Basic");?>

                        </div>
                        <div class="pl-md-4">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("First Name");?>
</label>
                                    <input class="form-control" name="user_firstname" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_firstname'];?>
">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Last Name");?>
</label>
                                    <input class="form-control" name="user_lastname" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_lastname'];?>
">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("I am");?>
</label>
                                    <select class="form-control" name="user_gender">
                                        <option value="none"><?php echo __("Select Sex");?>
:</option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_gender'] == "male") {?>selected<?php }?> value="male"><?php echo __("Male");?>
</option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_gender'] == "female") {?>selected<?php }?> value="female"><?php echo __("Female");?>
</option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_gender'] == "other") {?>selected<?php }?> value="other"><?php echo __("Other");?>
</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Relationship Status");?>
</label>
                                    <select name="user_relationship" class="form-control">
                                        <option value="none"><?php echo __("Select Relationship");?>
</option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "single") {?>selected<?php }?> value="single"><?php echo __("Single");?>
</option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "relationship") {?>selected<?php }?> value="relationship"><?php echo __("In a relationship");?>
</option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "married") {?>selected<?php }?> value="married"><?php echo __("Married");?>
</option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "complicated") {?>selected<?php }?> value="complicated"><?php echo __("It's complicated");?>
</option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "separated") {?>selected<?php }?> value="separated"><?php echo __("Separated");?>
</option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "divorced") {?>selected<?php }?> value="divorced"><?php echo __("Divorced");?>
</option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_relationship'] == "widowed") {?>selected<?php }?> value="widowed"><?php echo __("Widowed");?>
</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Country");?>
</label>
                                    <select class="form-control" name="user_country">
                                        <option value="none"><?php echo __("Select Country");?>
</option>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_country'] == $_smarty_tpl->tpl_vars['country']->value['country_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['country']->value['country_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['country']->value['country_name'];?>
</option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Website");?>
</label>
                                    <input type="text" class="form-control" name="user_website" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_website'];?>
">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label"><?php echo __("Birthdate");?>
</label>
                                <div class="form-row">
                                    <div class="col">
                                        <select class="form-control" name="birth_month">
                                            <option value="none"><?php echo __("Select Month");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '1') {?>selected<?php }?> value="1"><?php echo __("Jan");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '2') {?>selected<?php }?> value="2"><?php echo __("Feb");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '3') {?>selected<?php }?> value="3"><?php echo __("Mar");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '4') {?>selected<?php }?> value="4"><?php echo __("Apr");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '5') {?>selected<?php }?> value="5"><?php echo __("May");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '6') {?>selected<?php }?> value="6"><?php echo __("Jun");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '7') {?>selected<?php }?> value="7"><?php echo __("Jul");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '8') {?>selected<?php }?> value="8"><?php echo __("Aug");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '9') {?>selected<?php }?> value="9"><?php echo __("Sep");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '10') {?>selected<?php }?> value="10"><?php echo __("Oct");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '11') {?>selected<?php }?> value="11"><?php echo __("Nov");?>
</option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['month'] == '12') {?>selected<?php }?> value="12"><?php echo __("Dec");?>
</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="birth_day">
                                            <option value="none"><?php echo __("Select Day");?>
</option>
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 31+1 - (1) : 1-(31)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                                <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['day'] == $_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                                            <?php }
}
?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="birth_year">
                                            <option value="none"><?php echo __("Select Year");?>
</option>
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 2015+1 - (1905) : 1905-(2015)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1905, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
                                                <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_birthdate_parsed']['year'] == $_smarty_tpl->tpl_vars['i']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
                                            <?php }
}
?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label"><?php echo __("About Me");?>
</label>
                                <textarea class="form-control" name="user_biography"><?php echo $_smarty_tpl->tpl_vars['data']->value['user_biography'];?>
</textarea>
                            </div>

                            <!-- custom fields -->
                            <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['basic']) {?>
                            <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['basic'],'_registration'=>false), 0, false);
?>
                            <?php }?>
                            <!-- custom fields -->
                        </div>

                        <div class="divider"></div>

                        <div class="heading-small mb20">
                            <?php echo __("Work");?>

                        </div>
                        <div class="pl-md-4">
                            <div class="form-group">
                                <label class="form-control-label"><?php echo __("Work Title");?>
</label>
                                <input type="text" class="form-control" name="user_work_title" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_work_title'];?>
">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Work Place");?>
</label>
                                    <input type="text" class="form-control" name="user_work_place" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_work_place'];?>
">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Work Website");?>
</label>
                                    <input type="text" class="form-control" name="user_work_url" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_work_url'];?>
">
                                </div>
                            </div>

                            <!-- custom fields -->
                            <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['work']) {?>
                            <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['work'],'_registration'=>false), 0, true);
?>
                            <?php }?>
                            <!-- custom fields -->
                        </div>

                        <div class="divider"></div>

                        <div class="heading-small mb20">
                            <?php echo __("Location");?>

                        </div>
                        <div class="pl-md-4">
                            <div class="form-group">
                                <label class="form-control-label"><?php echo __("Current City");?>
</label>
                                <input type="text" class="form-control" name="user_current_city" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_current_city'];?>
">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label"><?php echo __("Hometown");?>
</label>
                                <input type="text" class="form-control" name="user_hometown" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_hometown'];?>
">
                            </div>

                            <!-- custom fields -->
                            <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['location']) {?>
                            <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['location'],'_registration'=>false), 0, true);
?>
                            <?php }?>
                            <!-- custom fields -->
                        </div>

                        <div class="divider"></div>

                        <div class="heading-small mb20">
                            <?php echo __("Education");?>

                        </div>
                        <div class="pl-md-4">
                            <div class="form-group">
                                <label class="form-control-label"><?php echo __("School");?>
</label>
                                <input type="text" class="form-control" name="user_edu_school" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_edu_school'];?>
">
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Major");?>
</label>
                                    <input type="text" class="form-control" name="user_edu_major" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_edu_major'];?>
">
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Class");?>
</label>
                                    <input type="text" class="form-control" name="user_edu_class" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_edu_class'];?>
">
                                </div>
                            </div>

                            <!-- custom fields -->
                            <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['education']) {?>
                            <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['education'],'_registration'=>false), 0, true);
?>
                            <?php }?>
                            <!-- custom fields -->
                        </div>

                        <div class="divider"></div>

                        <div class="heading-small mb20">
                            <?php echo __("Social Links");?>

                        </div>
                        <div class="pl-md-4">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Facebook Profile URL");?>
</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent">
                                             <img class="BlueIcon" alt="image" title="Feelings/Activity" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/fbIcons_black.svg">
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="facebook" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_facebook'];?>
" placeholder="<?php echo __("Facebook Profile URL");?>
">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Twitter Profile URL");?>
</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent">
                                                <img class="BlueIcon" alt="image" title="Feelings/Activity" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/twittericon_black.svg">
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="twitter" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_twitter'];?>
" placeholder="<?php echo __("Twitter Profile URL");?>
">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("YouTube Profile URL");?>
</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent">
                                                <img class="BlueIcon" alt="image" title="Feelings/Activity" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_video_icon-black.svg">    
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="youtube" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_youtube'];?>
" placeholder="<?php echo __("YouTube Profile URL");?>
">
                                    </div>
                                </div>
                            
                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Instagram Profile URL");?>
</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent">
                                                <img class="BlueIcon" alt="image" title="Feelings/Activity" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/instaIcon-black.svg">    
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="instagram" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_instagram'];?>
" placeholder="<?php echo __("Instagram Profile URL");?>
">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("LinkedIn Profile URL");?>
</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent">
                                                <img class="BlueIcon" alt="image" title="Feelings/Activity" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/inIcon-icon.svg">    
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="linkedin" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_linkedin'];?>
" placeholder="<?php echo __("LinkedIn Profile URL");?>
">
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Vkontakte Profile URL");?>
</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent">
                                                <img class="BlueIcon" alt="image" title="Feelings/Activity" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/vkIcon_black.svg">    
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="vkontakte" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_social_vkontakte'];?>
" placeholder="<?php echo __("Vkontakte Profile URL");?>
">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['other']) {?>
                            <div class="divider"></div>
                            <div class="heading-small mb20">
                                <?php echo __("Other");?>

                            </div>
                            <div class="pl-md-4">
                                <!-- custom fields -->
                                <?php if ($_smarty_tpl->tpl_vars['custom_fields']->value['other']) {?>
                                <?php $_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value['other'],'_registration'=>false), 0, true);
?>
                                <?php }?>
                                <!-- custom fields -->
                            </div>
                        <?php }?>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button type="reset" class="btn btn-md btn-block btn-light"><?php echo __("Reset");?>
</button>
                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-md btn-block btn-primary"><?php echo __("Save Changes");?>
</button>
                            </div>
                        </div>

                        <!-- success -->
                        <div class="alert alert-success x-hidden"></div>
                        <!-- success -->

                        <!-- error -->
                        <div class="alert alert-danger x-hidden"></div>
                        <!-- error -->
                    </form>
                </div>
                <!-- profile tab -->

                <!-- privacy tab -->
                <div class="tab-pane" id="privacy">
                    <form class="js_ajax-forms " data-url="admin/users.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&do=edit_privacy">
                        <div class="form-table-row">
                            <div>
                                <div class="form-control-label h6"><?php echo __("Chat Enabled");?>
</div>
                                <div class="form-text d-none d-sm-block"><?php echo __("If chat disabled you will appear offline and will not see who is online too");?>
</div>
                            </div>
                            <div class="text-right">
                                <label class="switch" for="privacy_chat">
                                    <input type="checkbox" name="privacy_chat" id="privacy_chat" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_chat_enabled']) {?>checked<?php }?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-table-row">
                            <div>
                                <div class="form-control-label h6"><?php echo __("Email you with our newsletter");?>
</div>
                                <div class="form-text d-none d-sm-block"><?php echo __("From time to time we send newsletter email to all of our members");?>
</div>
                            </div>
                            <div class="text-right">
                                <label class="switch" for="privacy_newsletter">
                                    <input type="checkbox" name="privacy_newsletter" id="privacy_newsletter" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_newsletter']) {?>checked<?php }?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <?php if ($_smarty_tpl->tpl_vars['system']->value['pokes_enabled']) {?>
                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Who can poke you");?>
</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-hand-point-right"></i></span>
                                        </div>
                                        <select class="form-control" name="privacy_poke">
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_poke'] == "public") {?>selected<?php }?> value="public">
                                                <?php echo __("Everyone");?>

                                            </option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_poke'] == "friends") {?>selected<?php }?> value="friends">
                                                <?php echo __("Friends");?>

                                            </option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_poke'] == "me") {?>selected<?php }?> value="me">
                                                <?php echo __("No One");?>

                                            </option>
                                        </select>
                                    </div>
                                </div>
                            <?php }?>

                            <?php if ($_smarty_tpl->tpl_vars['system']->value['gifts_enabled']) {?>
                                <div class="form-group col-md-6">
                                    <label class="form-control-label"><?php echo __("Who can send you gifts");?>
</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-gift"></i></span>
                                        </div>
                                        <select class="form-control" name="privacy_gifts">
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_gifts'] == "public") {?>selected<?php }?> value="public">
                                                <?php echo __("Everyone");?>

                                            </option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_gifts'] == "friends") {?>selected<?php }?> value="friends">
                                                <?php echo __("Friends");?>

                                            </option>
                                            <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_gifts'] == "me") {?>selected<?php }?> value="me">
                                                <?php echo __("No One");?>

                                            </option>
                                        </select>
                                    </div>
                                </div>
                            <?php }?>
                            
                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can post on your wall");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-newspaper"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_wall" id="privacy_wall">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_wall'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_wall'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_wall'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("birthdate");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_birthdate" id="privacy_birthdate">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_birthdate'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_birthdate'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_birthdate'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("relationship");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-heart"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_relationship" id="privacy_relationship">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_relationship'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_relationship'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_relationship'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("basic info");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_basic" id="privacy_basic">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_basic'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_basic'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_basic'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("work info");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_work" id="privacy_work">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_work'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_work'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_work'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("location info");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_location" id="privacy_location">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_location'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_location'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_location'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("education info");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_education" id="privacy_education">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_education'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_education'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_education'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("other info");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-folder-plus"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_other" id="privacy_other">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_other'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_other'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_other'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("friends");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_friends" id="privacy_friends">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_friends'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_friends'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_friends'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("photos");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-images"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_photos" id="privacy_photos">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_photos'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_photos'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_photos'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("liked pages");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_pages" id="privacy_pages">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_pages'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_pages'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_pages'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("joined groups");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_groups" id="privacy_groups">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_groups'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_groups'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_groups'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="form-control-label"><?php echo __("Who can see your");?>
 <?php echo __("joined events");?>
</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                    <select class="form-control" name="privacy_events" id="privacy_events">
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_events'] == "public") {?>selected<?php }?> value="public">
                                            <?php echo __("Everyone");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_events'] == "friends") {?>selected<?php }?> value="friends">
                                            <?php echo __("Friends");?>

                                        </option>
                                        <option <?php if ($_smarty_tpl->tpl_vars['data']->value['user_privacy_events'] == "me") {?>selected<?php }?> value="me">
                                            <?php echo __("Just Me");?>

                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <button type="reset" class="btn btn-md btn-block btn-light"><?php echo __("Reset");?>
</button>
                            </div>

                            <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-md btn-block btn-primary"><?php echo __("Save Changes");?>
</button>
                            </div>
                        </div>

                        <!-- success -->
                        <div class="alert alert-success x-hidden"></div>
                        <!-- success -->

                        <!-- error -->
                        <div class="alert alert-danger x-hidden"></div>
                        <!-- error -->
                    </form>
                </div>
                <!-- privacy tab -->

                <!-- security tab -->
                <div class="tab-pane" id="security">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover js_dataTable">
                            <thead>
                                <tr>
                                    <th><?php echo __("ID");?>
</th>
                                    <th><?php echo __("Browser");?>
</th>
                                    <th><?php echo __("OS");?>
</th>
                                    <th><?php echo __("Date");?>
</th>
                                    <th><?php echo __("IP");?>
</th>
                                    <th><?php echo __("Actions");?>
</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['sessions'], 'session');
$_smarty_tpl->tpl_vars['session']->iteration = 0;
$_smarty_tpl->tpl_vars['session']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['session']->value) {
$_smarty_tpl->tpl_vars['session']->do_else = false;
$_smarty_tpl->tpl_vars['session']->iteration++;
$__foreach_session_2_saved = $_smarty_tpl->tpl_vars['session'];
?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['session']->iteration;?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['session']->value['user_browser'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['session']->value['user_os'];?>
</td>
                                        <td>
                                            <span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['session']->value['session_date'];?>
"><?php echo $_smarty_tpl->tpl_vars['session']->value['session_date'];?>
</span>
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['session']->value['user_ip'];?>
</td>
                                        <td>
                                            <button data-toggle="tooltip" data-placement="top" title='<?php echo __("End Session");?>
' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="session" data-id="<?php echo $_smarty_tpl->tpl_vars['session']->value['session_id'];?>
">
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php
$_smarty_tpl->tpl_vars['session'] = $__foreach_session_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- security tab -->

                <!-- membership tab -->
                <div class="tab-pane" id="membership">
                    <form class="js_ajax-forms " data-url="admin/users.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&do=edit_membership">
                        <?php if ($_smarty_tpl->tpl_vars['data']->value['user_subscribed']) {?>
                            <div class="heading-small mb20">
                                <?php echo __("Package Details");?>

                            </div>
                            <div class="pl-md-4">
                                <div class="form-group form-row">
                                    <label class="col-md-3 form-control-label">
                                        <?php echo __("Package");?>

                                    </label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext">
                                            <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];
echo $_smarty_tpl->tpl_vars['data']->value['price'];?>
 
                                            <?php if ($_smarty_tpl->tpl_vars['data']->value['period'] == "life") {
echo __("Life Time");
} else {
echo __("per");?>
 <?php if ($_smarty_tpl->tpl_vars['data']->value['period_num'] != '1') {
echo $_smarty_tpl->tpl_vars['data']->value['period_num'];
}?> <?php echo __(ucfirst($_smarty_tpl->tpl_vars['data']->value['period']));
}?>)
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="col-md-3 form-control-label">
                                        <?php echo __("Subscription Date");?>

                                    </label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext">
                                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['user_subscription_date'],"%e %B %Y");?>

                                        </p>
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="col-md-3 form-control-label">
                                        <?php echo __("Expiration Date");?>

                                    </label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext">
                                            <?php if ($_smarty_tpl->tpl_vars['data']->value['period'] == "life") {?>
                                                <?php echo __("Life Time");?>

                                            <?php } else { ?>
                                                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['subscription_end'],"%e %B %Y");?>
 (<?php if ($_smarty_tpl->tpl_vars['data']->value['subscription_timeleft'] > 0) {
echo __("Remaining");?>
 <?php echo $_smarty_tpl->tpl_vars['data']->value['subscription_timeleft'];?>
 <?php echo __("Days");
} else {
echo __("Expired");
}?>)
                                            <?php }?>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="col-md-3 form-control-label">
                                        <?php echo __("Boosted Posts");?>

                                    </label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext">
                                            <?php echo $_smarty_tpl->tpl_vars['data']->value['user_boosted_posts'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['boost_posts'];?>

                                        </p>
                                        
                                        <div class="progress mb5">
                                            <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="<?php echo ($_smarty_tpl->tpl_vars['data']->value['user_boosted_posts']/$_smarty_tpl->tpl_vars['data']->value['boost_pages'])*100;?>
" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($_smarty_tpl->tpl_vars['data']->value['user_boosted_posts']/$_smarty_tpl->tpl_vars['data']->value['boost_pages'])*100;?>
%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="col-md-3 form-control-label">
                                        <?php echo __("Boosted Pages");?>

                                    </label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext">
                                            <?php echo $_smarty_tpl->tpl_vars['data']->value['user_boosted_pages'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['boost_pages'];?>

                                        </p>
                                        
                                        <div class="progress mb5">
                                            <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="<?php echo ($_smarty_tpl->tpl_vars['data']->value['user_boosted_pages']/$_smarty_tpl->tpl_vars['data']->value['boost_pages'])*100;?>
" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($_smarty_tpl->tpl_vars['data']->value['user_boosted_pages']/$_smarty_tpl->tpl_vars['data']->value['boost_pages'])*100;?>
%"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-9 offset-md-3">
                                        <?php if ($_smarty_tpl->tpl_vars['data']->value['user_subscribed']) {?>
                                            <button type="button" class="btn btn-danger js_admin-deleter" data-handle="user_package" data-id="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
">
                                                <i class="fa fa-trash-alt mr10"></i><?php echo __("Remove Package");?>

                                            </button>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>
                        <?php }?>

                        <div class="heading-small mb20">
                            <?php echo __("Upgrade Package");?>

                        </div>
                        <div class="pl-md-4">
                            <div class="form-group form-row">
                                <label class="col-md-3 form-control-label">
                                    <?php echo __("Select Package");?>

                                </label>
                                <div class="col-md-9">
                                    <select class="form-control" name="package">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['packages']->value, 'package');
$_smarty_tpl->tpl_vars['package']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['package']->value) {
$_smarty_tpl->tpl_vars['package']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['package']->value['package_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['user_package'] == $_smarty_tpl->tpl_vars['package']->value['package_id']) {?>selected<?php }?>>
                                                <?php echo $_smarty_tpl->tpl_vars['package']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];
echo $_smarty_tpl->tpl_vars['package']->value['price'];?>
 
                                                <?php if ($_smarty_tpl->tpl_vars['package']->value['period'] == "life") {
echo __("Life Time");
} else {
echo __("per");?>
 <?php if ($_smarty_tpl->tpl_vars['package']->value['period_num'] != '1') {
echo $_smarty_tpl->tpl_vars['package']->value['period_num'];
}?> <?php echo __(ucfirst($_smarty_tpl->tpl_vars['package']->value['period']));
}?>)
                                            </option>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-primary"><?php echo __("Save Changes");?>
</button>
                                </div>
                            </div>

                            <!-- success -->
                            <div class="alert alert-success mb0 mt20 x-hidden"></div>
                            <!-- success -->

                            <!-- error -->
                            <div class="alert alert-danger mb0 mt20 x-hidden"></div>
                            <!-- error -->
                        </div>
                    </form>
                </div>
                <!-- membership tab -->

                <!-- extra tab -->
                <div class="tab-pane" id="extra">
                    <?php if ($_smarty_tpl->tpl_vars['system']->value['wallet_enabled']) {?>
                        <div class="heading-small mb20">
                            <?php echo __("Wallet");?>

                        </div>
                        <div class="pl-md-4">
                            <form class="js_ajax-forms " data-url="admin/users.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&do=edit_wallet">
                                <div class="form-group form-row">
                                    <label class="col-md-3 form-control-label">
                                        <?php echo __("Wallet Balance");?>

                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="user_wallet_balance" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_wallet_balance'];?>
">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-9 offset-md-3">
                                        <button type="submit" class="btn btn-primary"><?php echo __("Save Changes");?>
</button>
                                    </div>
                                </div>

                                <!-- success -->
                                <div class="alert alert-success mb0 mt20 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 mt20 x-hidden"></div>
                                <!-- error -->
                            </form>
                        </div>

                        <div class="divider"></div>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['system']->value['points_enabled']) {?>
                        <div class="heading-small mb20">
                            <?php echo __("Points");?>

                        </div>
                        <div class="pl-md-4">
                            <form class="js_ajax-forms " data-url="admin/users.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['user_id'];?>
&do=edit_points">
                                <div class="form-group form-row">
                                    <label class="col-md-3 form-control-label">
                                        <?php echo __("Points Balance");?>

                                    </label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-piggy-bank"></i></span>
                                            </div>
                                            <input class="form-control" name="user_points" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['user_points'];?>
">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-9 offset-md-3">
                                        <button type="submit" class="btn btn-primary"><?php echo __("Save Changes");?>
</button>
                                    </div>
                                </div>

                                <!-- success -->
                                <div class="alert alert-success mb0 mt20 x-hidden"></div>
                                <!-- success -->

                                <!-- error -->
                                <div class="alert alert-danger mb0 mt20 x-hidden"></div>
                                <!-- error -->
                            </form>
                        </div>
                    <?php }?>
                </div>
                <!-- extra tab -->
            </div>
            <!-- tabs content -->
        </div>

    <?php }?>
</div><?php }
}
