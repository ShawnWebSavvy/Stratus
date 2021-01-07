<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 05:16:03
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/messages.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feabb9360a568_36972395',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdafd3bca0d98cdd5e0ea337102c512596594bdf' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/messages.tpl',
      1 => 1609217579,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:__feeds_conversation.tpl' => 1,
    'file:__feeds_conversation_group.tpl' => 1,
    'file:__svg_icons.tpl' => 2,
    'file:ajax.chat.conversation.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_5feabb9360a568_36972395 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="container mt20 offcanvas">
    <div class="row">
        <div class="offcanvas-sidebar sidebar-left-ant">
            <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
    <div class="row right-side-content-ant mobileMessageWrap users">
        <!-- chatbox -->
        <!-- threads -->
        <div class="col-md-4 col-xl-3 leftSideChatBar">
            <div class="card">
                <div class="card-header" style="margin-bottom: 0;">
                    <p class="indexHeading"><?php echo __("Inbox");?>
</p>
                    <a class="js_chat-new" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/messages/new">
                        <i class="fa fa-edit fa-lg"></i>
                    </a>
                </div>
                <div class="card-body plr0 js_live-messages-alt">
                    <!--- new tabs code -->
                    <div class="custom-tabs">
                        <ul class="nav nav-tabs messageTabs">
                            <li class="active dmDiv"><a class="active" data-toggle="tab" href="#directMessages">Direct
                                    Messages</a></li>
                            <li class="gcDiv"><a data-toggle="tab" href="#menu1">Group Chat</a></li>
                                                    </ul>

                        <div class="tab-content">
                            <div id="directMessages" class="tab-pane fade in active show">
                                <div class="js_scroller" data-slimScroll-height="calc(100vh - 275px)">
                                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['conversations']) {?>
                                    <ul class="forsingle">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['conversations'], '_conversation');
$_smarty_tpl->tpl_vars['_conversation']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_conversation']->value) {
$_smarty_tpl->tpl_vars['_conversation']->do_else = false;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['conversation']->value['group_recipients'] === 'not_show') {?>
                                        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_conversation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('conversation'=>$_smarty_tpl->tpl_vars['_conversation']->value), 0, true);
?>
                                        <?php }?>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>
                                    <?php if (count($_smarty_tpl->tpl_vars['user']->value->_data['conversations']) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
                                    <!-- see-more -->
                                    <div class="alert alert-post see-more small mlr5 js_see-more"
                                        data-get="conversations">
                                        <span><?php echo __("Load Older Threads");?>
</span>
                                        <div class="loader loader_small x-hidden"></div>
                                    </div>
                                    <!-- see-more -->
                                    <?php }?>
                                    <?php }?>
                                </div>

                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="js_scrollerGroup" data-slimScroll-height="calc(100vh - 275px)">
                                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['conversations']) {?>
                                    <ul class="forgroup">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['conversations'], '_conversations');
$_smarty_tpl->tpl_vars['_conversations']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_conversations']->value) {
$_smarty_tpl->tpl_vars['_conversations']->do_else = false;
?>
                                        <?php if ($_smarty_tpl->tpl_vars['_conversations']->value['group_recipients'] === 'show') {?>
                                        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_conversation_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('conversation'=>$_smarty_tpl->tpl_vars['_conversations']->value), 0, true);
?>
                                        <?php }?>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>
                                    <?php if (count($_smarty_tpl->tpl_vars['user']->value->_data['conversations']) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
                                    <!-- see-more -->
                                    <div class="alert alert-post see-more small mlr5 js_see-more"
                                        data-get="conversations">
                                        <span><?php echo __("Load Older Threads");?>
</span>
                                        <div class="loader loader_small x-hidden"></div>
                                    </div>
                                    <!-- see-more -->
                                    <?php }?>
                                    <?php }?>
                                </div>
                            </div>
                                                    </div>
                    </div>
                    <!-- new tabs end -->



                    
                    
                </div>
            </div>
        </div>
        <!-- threads -->

        <!-- conversation -->
        <div class="col-md-8 col-xl-9 offcanvas-mainbar chatBoxBlock js_conversation-container">
            <?php if ($_smarty_tpl->tpl_vars['view']->value == "new") {?>
            <div class="card panel-messages fresh">
                <div class="card-header with-icon bg-transparent">
                    <?php echo __("New Message");?>

                </div>
                <div class="card-body">
                    <div class="chat-conversations js_scroller" data-slimScroll-height="calc(100vh - 310px)"></div>
                    <div class="chat-to clearfix js_autocomplete-tags">
                        <div class="to"><?php echo __("To");?>
:</div>
                        <ul class="tags">
                            <?php if ($_smarty_tpl->tpl_vars['recipient']->value) {?>
                            <li data-uid="<?php echo $_smarty_tpl->tpl_vars['recipient']->value['user_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['recipient']->value['user_fullname'];?>

                                <button type="button" class="close js_tag-remove" title="<?php echo __(" Remove");?>
">
                                    <span>×</span>
                                </button>
                            </li>
                            <?php }?>
                        </ul>
                        <div class="typeahead newUserSearchMessage">
                            <input type="text" size="1" autofocus>
                        </div>
                    </div>
                    <div class="chat-message-add-new">
                        <div class="chat-voice-notes">
                            <div class="voice-recording-wrapper" data-handle="chat">
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
 <span
                                        class="js_voice-timer">00:00</span>
                                </div>
                                <!-- stop recording -->
                            </div>
                        </div>
                        <div class="chat-attachments attachments clearfix x-hidden">
                            <ul>
                                <li class="loading">
                                    <div class="progress x-progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="x-form chat-form">
                            <div class="chat-form-message">
                                <textarea class="js_autosize js_post-message" dir="auto" rows="1"
                                    placeholder='<?php echo __("Write a message");?>
'></textarea>
                            </div>
                            <ul class="x-form-tools clearfix">
                                <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_photos_enabled']) {?>
                                <li class="x-form-tools-attach">
                                    <i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="chat"></i>
                                </li>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_chat_enabled']) {?>
                                <li class="x-form-tools-voice js_chat-voice-notes-toggle">
                                    <i class="fas fa-microphone fa-lg fa-fw"></i>
                                </li>
                                <?php }?>
                                <li class="x-form-tools-emoji js_emoji-menu-toggle">
                                    <i class="far fa-smile-wink fa-lg fa-fw"></i>
                                </li>
                                <li class="x-form-tools-post js_post-message">
                                    <i class="far fa-paper-plane fa-lg fa-fw"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['conversation']->value) {?>
            <?php $_smarty_tpl->_subTemplateRender('file:ajax.chat.conversation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <?php } else { ?>
            <div class="card card-messages" style="padding-top: 60px;">
                <div class="card-body text-center text-muted" style="min-height: 510px;">
                    <div class="noMessageChanges">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results8.png">
                        <p class="noMsgHeading">It's nice to chat with someone</p>
                        <p class="noMsgLines">Pick a person from left menu and start your conversation</p>
                        <!-- <p class="mt10 mb0"><strong><?php echo __("No Conversation Selected");?>
</strong></p> -->
                        <a class="btn btn-sm btn-primary js_chat-new"
                            href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/messages/new"><?php echo __("New Message");?>
</a>
                    </div>
                </div>
            </div>
            <?php }?>
            <?php }?>
        </div>
        <!-- conversation -->

    </div>
</div>
<!-- page content -->
<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
