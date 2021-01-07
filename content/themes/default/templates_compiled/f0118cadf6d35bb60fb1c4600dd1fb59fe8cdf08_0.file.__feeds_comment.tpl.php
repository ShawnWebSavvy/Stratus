<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:10:23
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_comment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf27fcfa197_91129200',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0118cadf6d35bb60fb1c4600dd1fb59fe8cdf08' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_comment.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_comment.text.tpl' => 1,
    'file:__reaction_emojis.tpl' => 3,
    'file:__feeds_comment.tpl' => 2,
    'file:__svg_icons.tpl' => 2,
  ),
),false)) {
function content_5feaf27fcfa197_91129200 (Smarty_Internal_Template $_smarty_tpl) {
?><li>
    <div class="comment <?php if ($_smarty_tpl->tpl_vars['_is_reply']->value) {?>reply<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['comment_id'];?>
" id="comment_<?php echo $_smarty_tpl->tpl_vars['_comment']->value['comment_id'];?>
">
        <!-- comment avatar -->
        <div class="comment-avatar">
            <a class="comment-avatar-picture" href="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['author_url'];?>
" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['_comment']->value['author_picture'];?>
);">
            </a>
        </div>
        <!-- comment avatar -->

        <!-- comment body -->
        <div class="comment-data">
            <div class="commentDataActionWrap">
                <!-- comment author & text  -->
                <div class="comment-inner-wrapper">
                    <div class="comment-inner js_notifier-flasher">
                        <!-- author -->
                        <div class="comment-author">
                            <span class="js_user-popover" data-type="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['user_type'];?>
" data-uid="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['user_id'];?>
">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['author_url'];?>
" ><?php echo $_smarty_tpl->tpl_vars['_comment']->value['author_name'];?>
</a>
                            </span>
                            <?php if ($_smarty_tpl->tpl_vars['_comment']->value['author_verified']) {?>
                            <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
' class="fa fa-check-circle fa-fw verified-badge"></i>
                            <?php }?>
                        </div>
                        <!-- author -->
                        <!-- text -->
                        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_comment.text.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                        <!-- text -->
                    </div>
                </div>
                <!-- comment author & text  -->
                    <!-- comment menu -->
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                    <?php if (!$_smarty_tpl->tpl_vars['_comment']->value['edit_comment'] && !$_smarty_tpl->tpl_vars['_comment']->value['delete_comment']) {?>
                        <div class="comment-btn">
                            <button type="button" class="close js_report" data-handle="comment" data-id="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['comment_id'];?>
"  data-toggle="tooltip" data-placement="top" title='<?php echo __("Report");?>
'>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } elseif (!$_smarty_tpl->tpl_vars['_comment']->value['edit_comment'] && $_smarty_tpl->tpl_vars['_comment']->value['delete_comment']) {?>
                        <div class="comment-btn">
                            <button type="button" class="close js_delete-comment" data-toggle="tooltip" data-placement="top" title='<?php echo __("Delete");?>
'>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } else { ?>
                        <div class="comment-btn dropdown">
                            <button type="button" class="close" data-toggle="dropdown" data-display="static" data-tooltip="tooltip" data-placement="top" title='<?php echo __("Edit or Delete");?>
'>
                                <span aria-hidden="true"><i class="fas fa-ellipsis-h"></i></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-item pointer js_edit-comment"><?php echo __("Edit Comment");?>
</div>
                                <div class="dropdown-item pointer js_delete-comment"><?php echo __("Delete Comment");?>
</div>
                            </div>
                        </div>
                    <?php }?>
                <?php }?>
                <!-- comment menu -->
            </div>


     

            <!-- comment actions & time  -->
            <ul class="comment-actions clearfix">
                <!-- reactions -->
                <li>
                    <div class="pointer unselectable sss reactions-wrapper <?php if ($_smarty_tpl->tpl_vars['_comment']->value['i_react']) {?>js_unreact-comment<?php }?>" data-reaction="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['i_reaction'];?>
">
                        <!-- reaction-btn -->
                        <div class="reaction-btn">
                            <?php if (!$_smarty_tpl->tpl_vars['_comment']->value['i_react']) {?>
                                <div class="reaction-btn-icon d-none">
                                    <i class="icon-post icon_like"></i>
                                </div>
                                <span class="reaction-btn-name text-link"><?php echo __("Like");?>
</span>
                            <?php } else { ?>
                                <div class="reaction-btn-icon d-none">
                                    <div class="inline-emoji no_animation">
                                        <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['_comment']->value['i_reaction']), 0, false);
?>
                                    </div>
                                </div>
                                <span class="reaction-btn-name text-link <?php echo $_smarty_tpl->tpl_vars['_comment']->value['i_reaction_details']['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['_comment']->value['i_reaction_details']['title'];?>
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
$__foreach_reaction_12_saved = $_smarty_tpl->tpl_vars['reaction'];
?>
                                <div class="reactions_item duration-<?php echo $_smarty_tpl->tpl_vars['reaction']->iteration;?>
 js_react-comment" data-reaction="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['reaction'];?>
" data-reaction-color="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['color'];?>
" data-title="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['title'];?>
">
                                    <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['reaction']->value['reaction']), 0, true);
?>
                                </div>
                            <?php
$_smarty_tpl->tpl_vars['reaction'] = $__foreach_reaction_12_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                        <!-- reactions-container -->
                    </div>
                </li>
                <!-- reactions -->

                <!-- comment -->
                <li>
                    <span class="text-link js_reply <?php if ($_smarty_tpl->tpl_vars['_comment']->value['comments_disabled']) {?>x-hidden<?php }?>" data-username="<?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_name'] != $_smarty_tpl->tpl_vars['_comment']->value['author_user_name']) {
echo $_smarty_tpl->tpl_vars['_comment']->value['author_user_name'];
}?>">
                        <?php echo __("Reply");?>

                    </span>
                </li>
                <!-- comment -->

                <!-- time  -->
                <li>
                    <small class="text-muted js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['_comment']->value['time'];?>
</small>
                </li>
                <!-- time  -->

                <!-- reactions stats -->
                <?php if ($_smarty_tpl->tpl_vars['_comment']->value['reactions_total_count'] > 0) {?>
                    <li class="ml5">
                        <div data-toggle="modal" data-url="posts/who_reacts.php?comment_id=<?php echo $_smarty_tpl->tpl_vars['_comment']->value['comment_id'];?>
">
                            <div class="reactions-stats">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_comment']->value['reactions'], 'reaction_count', false, 'reaction_type');
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
                                    <?php echo $_smarty_tpl->tpl_vars['_comment']->value['reactions_total_count'];?>

                                </span>
                                <!-- reactions count -->
                            </div>
                        </div>
                    </li>
                <?php }?>
                <!-- reactions stats -->
            </ul>
            <!-- comment actions & time  -->

            <!-- comment replies  -->
            <?php if (!$_smarty_tpl->tpl_vars['_is_reply']->value) {?>
                <?php if (!$_smarty_tpl->tpl_vars['standalone']->value && $_smarty_tpl->tpl_vars['_comment']->value['replies'] > 0) {?>
                    <div class="ptb10 plr10 js_replies-toggle">
                        <span class="text-link">
                            <i class="fa fa-comments"></i>
                            <?php echo $_smarty_tpl->tpl_vars['_comment']->value['replies'];?>
 <?php echo __("Replies");?>

                        </span>
                    </div>
                <?php }?>
                <div class="comment-replies <?php if (!$_smarty_tpl->tpl_vars['standalone']->value) {?>x-hidden<?php }?>">
                    <!-- previous replies -->
                    <?php if ($_smarty_tpl->tpl_vars['_comment']->value['replies'] >= $_smarty_tpl->tpl_vars['system']->value['min_results']) {?>
                        <div class="pb10 text-center js_see-more" data-get="comment_replies" data-id="<?php echo $_smarty_tpl->tpl_vars['_comment']->value['comment_id'];?>
" data-remove="true">
                            <span class="text-link">
                                <i class="fa fa-comment"></i>
                                <?php echo __("View previous replies");?>

                            </span>
                            <div class="loader loader_small x-hidden"></div>
                        </div>
                    <?php }?>
                    <!-- previous replies -->

                    <!-- replies -->
                    <ul class="js_replies">
                        <?php if ($_smarty_tpl->tpl_vars['_comment']->value['replies'] > 0) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_comment']->value['comment_replies'], 'reply');
$_smarty_tpl->tpl_vars['reply']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['reply']->value) {
$_smarty_tpl->tpl_vars['reply']->do_else = false;
?>
                            <?php $_smarty_tpl->_subTemplateRender('file:__feeds_comment.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_comment'=>$_smarty_tpl->tpl_vars['reply']->value,'_is_reply'=>true), 0, true);
?>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                    </ul>
                    <!-- replies -->

                    <!-- post a reply -->
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                        <div class="x-hidden js_reply-form">
                            <div class="x-form comment-form commentFormChanges">
                                <textarea maxlength="260" dir="auto" class="js_autosize js_mention js_post-reply" rows="1" placeholder='<?php echo __("Write a Reply");?>
'></textarea>
                                <ul class="x-form-tools clearfix">
                                   
                                    <?php if ($_smarty_tpl->tpl_vars['system']->value['comments_photos_enabled']) {?>
                                        <li class="x-form-tools-attach">
                                            <i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="comment"></i>
                                        </li>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_comments_enabled']) {?>
                                        <li class="x-form-tools-voice js_comment-voice-notes-toggle">
                                            <i class="fas fa-microphone fa-lg fa-fw"></i>
                                        </li>
                                    <?php }?>
                                    <li class="x-form-tools-emoji js_emoji-menu-toggle">
                                        <i class="far fa-smile-wink fa-lg fa-fw"></i>
                                    </li>
                                    <li class="x-form-tools-post js_post-reply">
                                        <i class="far fa-paper-plane fa-lg fa-fw"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="comment-voice-notes">
                                <div class="voice-recording-wrapper" data-handle="comment">
                                    <!-- processing message -->
                                    <div class="x-hidden js_voice-processing-message">
                                        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"upload",'class'=>"mr5",'width'=>"16px",'height'=>"16px"), 0, false);
?>
                                        <?php echo __("Processing");?>
<span class="loading-dots"></span>
                                    </div>
                                    <!-- processing message -->

                                    <!-- success message -->
                                    <div class="x-hidden js_voice-success-message">
                                        <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"mr5",'width'=>"16px",'height'=>"16px"), 0, true);
?>
                                        <?php echo __("Voice note recorded successfully");?>

                                        <div class="float-right">
                                            <button type="button" class="close js_voice-remove">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- success message -->

                                    <!-- start recording -->
                                    <div class="btn-voice-start js_voice-start">
                                        <i class="fas fa-microphone mr5"></i><?php echo __("Record");?>

                                    </div>
                                    <!-- start recording -->

                                    <!-- stop recording -->
                                    <div class="btn-voice-stop js_voice-stop" style="display: none">
                                        <i class="far fa-stop-circle mr5"></i><?php echo __("Recording");?>
 <span class="js_voice-timer">00:00</span>
                                    </div>
                                    <!-- stop recording -->
                                </div>
                            </div>
                            <div class="comment-attachments attachments clearfix x-hidden">
                                <ul>
                                    <li class="loading">
                                        <div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php }?>
                    <!-- post a reply -->
                </div>
            <?php }?>
            <!-- comment replies  -->
        </div>
        <!-- comment body -->
    </div>
</li><?php }
}
