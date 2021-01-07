<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-04 09:11:37
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/admin.dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff2dbc95a26c8_23004318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ef4ded71e8138dfd1d9d6855eb24a0f12459965' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/admin.dashboard.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff2dbc95a26c8_23004318 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="card">
    <div class="card-header with-icon">
        <i class="fa fa-tachometer-alt mr10"></i><?php echo __("Dashboard");?>

    </div>
    <div class="card-body">
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
            <div id="admin-chart-dashboard" class="admin-chart mb20"></div>
            <div class="form-row">
                <div class="col-sm-3">
                    <div class="stat-panel bg-gradient-primary">
                        <div class="stat-cell">
                            <i class="fa fa-users bg-icon"></i>
                            <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['users'];?>
</span><br>
                            <span class="text-lg"><?php echo __("Users");?>
</span><br>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users"><?php echo __("Manage Users");?>
</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="stat-panel bg-gradient-indigo">
                        <div class="stat-cell">
                            <i class="fa fa-male bg-icon"></i>
                            <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['users_males'];?>
</span><br>
                            <span><?php echo $_smarty_tpl->tpl_vars['insights']->value['users_males_percent'];?>
%</span><br>
                            <span class="text-lg"><?php echo __("Males");?>
</span><br>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="stat-panel bg-gradient-pink">
                        <div class="stat-cell">
                            <i class="fa fa-female bg-icon"></i>
                            <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['users_females'];?>
</span><br>
                            <span><?php echo $_smarty_tpl->tpl_vars['insights']->value['users_females_percent'];?>
%</span><br>
                            <span class="text-lg"><?php echo __("Females");?>
</span><br>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="stat-panel bg-gradient-purple">
                        <div class="stat-cell">
                            <i class="fa fa-user bg-icon"></i>
                            <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['users_others'];?>
</span><br>
                            <span><?php echo $_smarty_tpl->tpl_vars['insights']->value['users_others_percent'];?>
%</span><br>
                            <span class="text-lg"><?php echo __("Others");?>
</span><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="stat-panel bg-gradient-red">
                        <div class="stat-cell">
                            <i class="fa fa-minus-circle bg-icon"></i>
                            <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['banned'];?>
</span><br>
                            <span class="text-lg"><?php echo __("Banned");?>
</span><br>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/banned"><?php echo __("Manage Banned");?>
</a>
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
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users"><?php echo __("Manage Users");?>
</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="stat-panel bg-gradient-teal">
                        <div class="stat-cell">
                            <i class="fa fa-clock bg-icon"></i>
                            <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['online'];?>
</span><br>
                            <span class="text-lg"><?php echo __("Online");?>
</span><br>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/users/online"><?php echo __("Manage Online");?>
</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
        <div class="form-row">
            <div class="col-sm-6">
                <div class="stat-panel bg-gradient-success">
                    <div class="stat-cell">
                        <i class="fa fa-newspaper bg-icon"></i>
                        <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['posts'];?>
</span><br>
                        <span class="text-lg"><?php echo __("Posts");?>
</span><br>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/posts"><?php echo __("Manage Posts");?>
</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="stat-panel bg-gradient-success">
                    <div class="stat-cell">
                        <i class="fa fa-comments bg-icon"></i>
                        <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['comments'];?>
</span><br>
                        <span class="text-lg"><?php echo __("Comments");?>
</span><br>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/reports"><?php echo __("Manage Reports");?>
</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-4">
                <div class="stat-panel bg-gradient-primary">
                    <div class="stat-cell">
                        <i class="fa fa-flag bg-icon"></i>
                        <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['pages'];?>
</span><br>
                        <span class="text-lg"><?php echo __("Pages");?>
</span><br>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/pages"><?php echo __("Manage Pages");?>
</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="stat-panel bg-gradient-primary">
                    <div class="stat-cell">
                        <i class="fa fa-users bg-icon"></i>
                        <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['groups'];?>
</span><br>
                        <span class="text-lg"><?php echo __("Groups");?>
</span><br>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/groups"><?php echo __("Manage Groups");?>
</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="stat-panel bg-gradient-primary">
                    <div class="stat-cell">
                        <i class="fa fa-calendar bg-icon"></i>
                        <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['events'];?>
</span><br>
                        <span class="text-lg"><?php echo __("Events");?>
</span><br>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/<?php echo $_smarty_tpl->tpl_vars['control_panel']->value['url'];?>
/events"><?php echo __("Manage Events");?>
</a>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['user']->value->_is_admin) {?>
            <div class="form-row">
                <div class="col-sm-6">
                    <div class="stat-panel bg-gradient-info">
                        <div class="stat-cell">
                            <i class="fa fa-comments bg-icon"></i>
                            <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['messages'];?>
</span><br>
                            <span class="text-lg"><?php echo __("Messages");?>
</span><br>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="stat-panel bg-gradient-cyan">
                        <div class="stat-cell">
                            <i class="fa fa-globe bg-icon"></i>
                            <span class="text-xlg"><?php echo $_smarty_tpl->tpl_vars['insights']->value['notifications'];?>
</span><br>
                            <span class="text-lg"><?php echo __("Notifications");?>
</span><br>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div><?php }
}
