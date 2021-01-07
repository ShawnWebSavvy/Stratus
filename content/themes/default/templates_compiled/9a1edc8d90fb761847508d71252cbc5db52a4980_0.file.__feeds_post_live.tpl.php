<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-04 07:52:44
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_post_live.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff2c94c405a04_40107201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a1edc8d90fb761847508d71252cbc5db52a4980' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_post_live.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 3,
    'file:__reaction_emojis.tpl' => 3,
    'file:__feeds_post.comments.tpl' => 1,
  ),
),false)) {
function content_5ff2c94c405a04_40107201 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- post body -->
<div class="post-body pt0">

    <!-- post header -->
    <div class="post-header">
        <!-- post picture -->
        <div class="post-avatar">
            <?php if ($_smarty_tpl->tpl_vars['post']->value['is_anonymous']) {?>
                <div class="post-avatar-anonymous">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"spy",'width'=>"30px",'height'=>"30px"), 0, false);
?>
                </div>
            <?php } else { ?>
                <a class="post-avatar-picture" href="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_author_url'];?>
" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['post']->value['post_author_picture'];?>
);">
                </a>
                <?php if ($_smarty_tpl->tpl_vars['post']->value['post_author_online']) {?><i class="fa fa-circle online-dot"></i><?php }?>
            <?php }?>
        </div>
        <!-- post picture -->

        <!-- post meta -->
        <div class="post-meta">
            <!-- post author -->
            <?php if ($_smarty_tpl->tpl_vars['post']->value['is_anonymous']) {?>
                <span class="post-author"><?php echo __("Anonymous");?>
</span>
            <?php } else { ?>
                <span class="js_user-popover" data-type="<?php echo $_smarty_tpl->tpl_vars['post']->value['user_type'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['post']->value['user_id'];?>
">
                    <a class="post-author" href="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_author_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['post_author_name'];?>
</a>
                </span>
                <?php if ($_smarty_tpl->tpl_vars['post']->value['post_author_verified']) {?>
                    <?php if ($_smarty_tpl->tpl_vars['post']->value['user_type'] == "user") {?>
                        <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
' class="fa fa-check-circle fa-fw verified-badge"></i>
                    <?php } else { ?>
                        <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified Page");?>
' class="fa fa-check-circle fa-fw verified-badge"></i>
                    <?php }?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['post']->value['user_subscribed']) {?>
                    <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Pro User");?>
' class="fa fa-bolt fa-fw pro-badge"></i>
                <?php }?>
            <?php }?>
            <!-- post author -->

            <!-- post time & location & privacy -->
            <div class="post-time">
                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/posts/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['post']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['time'];?>
</a>
                
                <?php if ($_smarty_tpl->tpl_vars['post']->value['privacy'] == "me") {?>
                    <i class="fa fa-lock" data-toggle="tooltip" data-placement="top" title='<?php echo __("Shared with");?>
 <?php echo __("Only Me");?>
'></i>
                <?php } elseif ($_smarty_tpl->tpl_vars['post']->value['privacy'] == "friends") {?>
                    <i class="fa fa-users" data-toggle="tooltip" data-placement="top" title='<?php echo __("Shared with");?>
 <?php echo __("Friends");?>
'></i>
                <?php } elseif ($_smarty_tpl->tpl_vars['post']->value['privacy'] == "public") {?>
                    <i class="fa fa-globe" data-toggle="tooltip" data-placement="top" title='<?php echo __("Shared with");?>
 <?php echo __("Public");?>
'></i>
                <?php } elseif ($_smarty_tpl->tpl_vars['post']->value['privacy'] == "custom") {?>
                    <i class="fa fa-cog" data-toggle="tooltip" data-placement="top" title='<?php echo __("Shared with");?>
 <?php echo __("Custom People");?>
'></i>
                <?php }?>
            </div>
            <!-- post time & location & privacy -->
        </div>
        <!-- post meta -->
    </div>
    <!-- post header -->

    <!-- post stats -->
    <div class="post-stats clearfix">
        <!-- reactions stats -->
        <?php if ($_smarty_tpl->tpl_vars['post']->value['reactions_total_count'] > 0) {?>
            <div class="float-left mr10" data-toggle="modal" data-url="posts/who_reacts.php?post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                <div class="reactions-stats">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value['reactions'], 'reaction_count', false, 'reaction_type');
$_smarty_tpl->tpl_vars['reaction_count']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['reaction_type']->value => $_smarty_tpl->tpl_vars['reaction_count']->value) {
$_smarty_tpl->tpl_vars['reaction_count']->do_else = false;
?>
                        <?php if ($_smarty_tpl->tpl_vars['reaction_count']->value > 0) {?>
                            <div class="reactions-stats-item">
                                <div class="inline-emoji no_animation">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['reaction_type']->value), 0, true);
?>
                                </div>
                            </div>
                        <?php }?>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <!-- reactions count -->
                    <span>
                        <?php echo $_smarty_tpl->tpl_vars['post']->value['reactions_total_count'];?>

                    </span>
                    <!-- reactions count -->
                </div>
            </div>
        <?php }?>
        <!-- reactions stats -->

        <!-- comments & shares -->
        <span class="float-right">
            <!-- comments -->
            <span class="pointer js_comments-toggle">
                <i class="fa fa-comments"></i> <?php echo $_smarty_tpl->tpl_vars['post']->value['comments'];?>
 <?php echo __("Comments");?>

            </span>
            <!-- comments -->

            <!-- shares -->
            <span class="pointer ml10 <?php if ($_smarty_tpl->tpl_vars['post']->value['shares'] == 0) {?>x-hidden<?php }?>" data-toggle="modal" data-url="posts/who_shares.php?post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                <i class="fa fa-share"></i> <?php echo $_smarty_tpl->tpl_vars['post']->value['shares'];?>
 <?php echo __("Shares");?>

            </span>
            <!-- shares -->
        </span>
        <!-- comments & shares -->
    </div>
    <!-- post stats -->

    <!-- post actions -->
    <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
        <div class="post-actions clearfix">
            <!-- reactions -->
            <div class="action-btn unselectable reactions-wrapper <?php if ($_smarty_tpl->tpl_vars['post']->value['i_react']) {?>js_unreact-post<?php }?>" data-reaction="<?php echo $_smarty_tpl->tpl_vars['post']->value['i_reaction'];?>
">
                <!-- reaction-btn -->
                <div class="reaction-btn">
                    <?php if (!$_smarty_tpl->tpl_vars['post']->value['i_react']) {?>
                        <div class="reaction-btn-icon">
                            <i class="far fa-thumbs-up fa-fw"></i>
                        </div>
                        <span class="reaction-btn-name"><?php echo __("Like");?>
</span>
                    <?php } else { ?>
                        <div class="reaction-btn-icon">
                            <div class="inline-emoji no_animation">
                                <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['post']->value['i_reaction']), 0, true);
?>
                            </div>
                        </div>
                        <span class="reaction-btn-name <?php echo $_smarty_tpl->tpl_vars['post']->value['i_reaction_details']['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['i_reaction_details']['title'];?>
</span>
                    <?php }?>
                </div>
                <!-- reaction-btn -->

                <!-- reactions-container -->
                <div class="reactions-container">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reactions']->value, 'reaction');
$_smarty_tpl->tpl_vars['reaction']->iteration = 0;
$_smarty_tpl->tpl_vars['reaction']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['reaction']->value) {
$_smarty_tpl->tpl_vars['reaction']->do_else = false;
$_smarty_tpl->tpl_vars['reaction']->iteration++;
$__foreach_reaction_1_saved = $_smarty_tpl->tpl_vars['reaction'];
?>
                        <div class="reactions_item duration-<?php echo $_smarty_tpl->tpl_vars['reaction']->iteration;?>
 js_react-post" data-reaction="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['reaction'];?>
" data-reaction-color="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['color'];?>
" data-title="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['title'];?>
">
                            <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['reaction']->value['reaction']), 0, true);
?>
                        </div>
                    <?php
$_smarty_tpl->tpl_vars['reaction'] = $__foreach_reaction_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <!-- reactions-container -->
            </div>
            <!-- reactions -->

            <!-- comment -->
            <div class="action-btn js_comment <?php if ($_smarty_tpl->tpl_vars['post']->value['comments_disabled']) {?>x-hidden<?php }?>">
                <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"comment",'width'=>"16px",'height'=>"16px",'class'=>"mr5"), 0, true);
?>
                <span><?php echo __("Comment");?>
</span>
            </div>
            <!-- comment -->

            <!-- share -->
            <?php if ($_smarty_tpl->tpl_vars['post']->value['privacy'] == "public") {?>
                <div class="action-btn" data-toggle="modal" data-url="posts/share.php?do=create&post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                    <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"share",'width'=>"16px",'height'=>"16px",'class'=>"mr5"), 0, true);
?>
                    <span><?php echo __("Share");?>
</span>
                </div>
            <?php }?>
            <!-- share -->
        </div>
    <?php }?>
    <!-- post actions -->
</div>

<!-- post footer -->
<div class="post-footer">
    <!-- comments -->
    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.comments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_live_comments'=>true), 0, false);
?>
    <!-- comments -->
</div>
<!-- post footer --><?php }
}
