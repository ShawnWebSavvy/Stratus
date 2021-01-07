<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:09:57
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/_js_templates.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf265eac941_42640153',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f244d7a24824a03e19bf89dbb7315ebf627e53f' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/_js_templates.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 10,
    'file:__custom_fields.tpl' => 3,
  ),
),false)) {
function content_5feaf265eac941_42640153 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modals --><div id="modal" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><div class="loader pt10 pb10"></div></div></div></div></div><?php echo '<script'; ?>
 id="modal-login" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Not Logged In");?>
</h6></div><div class="modal-body"><p><?php echo __("Please log in to continue");?>
</p></div><div class="modal-footer"><a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/signin"><?php echo __("Login");?>
</a></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="modal-message" type="text/template"><div class="modal-header"><h6 class="modal-title">{{title}}</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>{{message}}</p></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="modal-success" type="text/template"><div class="modal-body text-center"><!-- <div class="big-icon success"><i class="fa fa-thumbs-up fa-3x"></i></div> --><img width="40px" height="40px" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_localhub.svg"><h4>{{title}}</h4><p class="mt20">{{message}}</p></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="modal-error" type="text/template"><div class="modal-body text-center"><div class="big-icon error"><i class="fa fa-times fa-3x"></i></div><h4>{{title}}</h4><p class="mt20">{{message}}</p></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="modal-confirm" type="text/template"><div class="modal-header"><h6 class="modal-title">{{title}}</h6></div><div class="modal-body"><p>{{message}}</p></div><div class="modal-footer"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="button" class="btn btn-success btn-antier-green" id="modal-confirm-ok"><?php echo __("Confirm");?>
</button></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="modal-loading" type="text/template">
    <div class="modal-body text-center">
        <div class="spinner-border text-primary"></div>
    </div>
<?php echo '</script'; ?>
><!-- Modals --><!-- Translator --><?php echo '<script'; ?>
 id="translator" type="text/template"><div class="modal-header"><h6 class="modal-title"><i class="fas fa-globe-americas mr5"></i><?php echo __("Select Your Language");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body language_footer_div"><ul class="language_footer"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['system']->value['languages'], 'language');
$_smarty_tpl->tpl_vars['language']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->do_else = false;
?><li style="width: 18.7%; display: inline-block; text-align: center; margin: 30px 2px 5px;"><a style="display: table; text-decoration: none; font-weight: 700; font-size: 13px; width: 100%;" href="?lang=<?php echo $_smarty_tpl->tpl_vars['language']->value['code'];?>
"><?php echo $_smarty_tpl->tpl_vars['language']->value['title'];?>
<div style="display: table-caption; width: 50px; height: 50px; background: 0 0; margin: 0 auto 8px; box-shadow: 0 1px 3px rgba(0,0,0,.24); border-radius: 50%; transition: all .2s ease-in-out;"><img width="50" src="<?php echo $_smarty_tpl->tpl_vars['language']->value['flag'];?>
"></div></a></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div><?php echo '</script'; ?>
><!-- Translator --><!-- Search --><?php echo '<script'; ?>
 id="search-for" type="text/template"><div class="ptb10 plr10"><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/search/{{#hashtag}}hashtag/{{/hashtag}}{{query}}"><i class="fa fa-search pr5"></i> <?php echo __("Search for");?>
 {{#hashtag}}#{{/hashtag}}{{query}}</a></div><?php echo '</script'; ?>
><!-- Search --><!-- Lightbox --><?php echo '<script'; ?>
 id="lightbox" type="text/template"><div class="lightbox"><div class="container lightbox-container"><div class="lightbox-preview"><div class="lightbox-next js_lightbox-slider"><i class="fa fa-chevron-right fa-3x"></i></div><div class="lightbox-prev js_lightbox-slider"><i class="fa fa-chevron-left fa-3x"></i></div><img alt="" class="img-fluid" src="{{image}}"></div><div class="lightbox-data"><div class="clearfix"><div class="pt5 pr5 float-right"><button type="button" class="close lightbox-close js_lightbox-close"><span aria-hidden="true">&times;</span></button></div></div><div class="lightbox-post"><div class="js_scroller" data-slimScroll-height="100%"><div class="loader mtb10"></div></div></div></div></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="lightbox-nodata" type="text/template"><div class="lightbox"><div class="container lightbox-container"><div class="lightbox-preview nodata"><img alt="" class="img-fluid" src="{{image}}"></div></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="lightbox-live" type="text/template"><div class="lightbox" data-live-post-id="{{post_id}}"><div class="container lightbox-container"><div class="lightbox-preview with-live"><div class="live-stream-video" id="js_live-video"><div class="live-counter" id="js_live-counter"><span class="status offline" id=js_live-counter-status><?php echo __("Offline");?>
</span><span class="number"><i class="fas fa-eye mr5"></i><strong id="js_live-counter-number">0</strong></span></div><div class="live-status" id="js_live-status"><?php echo __("Loading");?>
<span class="spinner-grow spinner-grow-sm ml10"></span></div></div></div><div class="lightbox-data"><div class="clearfix"><div class="pt5 pr5 float-right"><button type="button" class="close lightbox-close js_lightbox-close"><span aria-hidden="true">&times;</span></button></div></div><div class="lightbox-post"><div class="js_scroller" data-slimScroll-height="100%"><div class="loader mtb10"></div></div></div></div></div></div><?php echo '</script'; ?>
><!-- Lightbox --><!-- commentModal --><?php echo '<script'; ?>
 id="commentModalbox" type="text/template">
    <div class="lightbox light-commentModal">
        <div class="container lightbox-container">
            <div class="lightbox-data">
                <div class="clearfix">
                    <div class="pt5 pr5 float-right">
                        <button type="button" class="close lightbox-close js_lightbox-close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="lightbox-post ">
                    <div class="js_scroller" data-slimScroll-height="100%">
                        <div class="loader mtb10"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo '</script'; ?>
><!-- commentModal --><?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?><!-- Forget Password --><?php echo '<script'; ?>
 id="forget-password-confirm" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Check Your Email");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms forget-password-confirm-form" data-url="core/forget_password_confirm.php"><div class="modal-body"><div class="mb20"><?php echo __("Check your email");?>
 - <?php echo __("We sent you an email with a six-digit confirmation code. Enter it below to continue to reset your password");?>
.</div><div class="row"><div class="col-md-6"><div class="form-group"><input name="reset_key" type="text" class="form-control" placeholder="######" required autofocus></div></div><div class="col-md-6"><label class="form-control-label mb5"><?php echo __("We sent your code to");?>
</label> <span class="badge badge-lg badge-warning">{{email}}</span></div></div><!-- error --><div class="alert alert-danger mb0 x-hidden"></div><!-- error --></div><div class="modal-footer"><input name="email" type="hidden" value="{{email}}"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="forget-password-reset" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Change Your Password!");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms forget-password-reset-form" data-url="core/forget_password_reset.php"><div class="modal-body"><div class="form-group"><label class="form-control-label" for="password"><?php echo __("New Password");?>
</label><input name="password" id="password" type="password" class="form-control" required autofocus></div><div class="form-group"><label class="form-control-label" for="confirm"><?php echo __("Confirm Password");?>
</label><input name="confirm" id="confirm" type="password" class="form-control" required></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><input name="email" type="hidden" value="{{email}}"><input name="reset_key" type="hidden" value="{{reset_key}}"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><!-- Forget Password --><!-- Two-Factor Authentication --><?php echo '<script'; ?>
 id="two-factor-authentication" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Two-factor authentication required");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms two-factor-authentication-form" data-url="core/two_factor_authentication.php"><div class="modal-body"><div class="mb20"><?php echo __("You've asked us to require a 6-digit login code when anyone tries to access your account from a new device or browser");?>
.</div><div class="mb20"><?php echo __("Enter the 6-digit code that we sent to your");?>
 <strong>{{method}}</strong></div><div class="form-group"><input name="two_factor_key" type="text" class="form-control" placeholder="######" required autofocus></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><input name="user_id" type="hidden" value="{{user_id}}">{{#remember}}<input name="remember" type="hidden" value="true">{{/remember}}<button type="submit" class="btn btn-success btn-antier-green"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><!-- Two-Factor Authentication --><?php } else { ?><!-- Email Activation --><?php echo '<script'; ?>
 id="activation-email-reset" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Change Email Address");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms activation-email-reset-forms" data-url="core/activation_email_reset.php"><div class="modal-body"><div class="form-group"><label class="form-control-label mb10"><?php echo __("Current Email");?>
</label><br><span class="badge badge-lg badge-info"><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_email'];?>
</span></div><div class="form-group"><label class="form-control-label" for="email"><?php echo __("New Email");?>
</label><input name="email" id="email" type="email" class="form-control" required autofocus></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><!-- Email Activation --><!-- Phone Activation --><?php echo '<script'; ?>
 id="activation-phone" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Enter the code from the SMS message");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms activation-phone-form" data-url="core/activation_phone_confirm.php"><div class="modal-body"><div class="mb20"><?php echo __("Let us know if this mobile number belongs to you. Enter the code in the SMS");?>
</div><div class="row"><div class="col-md-6"><div class="form-group"><input name="token" type="text" class="form-control" placeholder="######" required autofocus><?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_phone']) {?><span class="form-text"><span class="text-link" data-toggle="modal" data-url="core/activation_phone_resend.php"><?php echo __("Resend SMS");?>
</span></span><?php }?></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="col-md-6"><?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_phone']) {
echo __("We sent your code to");?>
 <strong><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_phone'];?>
</strong><?php }?></div></div></div><div class="modal-footer"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="activation-phone-reset" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Change Phone Number");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms activation-phone-reset-form" data-url="core/activation_phone_reset.php"><div class="modal-body"><?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_phone']) {?><div class="form-group"><label class="form-control-label"><?php echo __("Current Phone");?>
</label><p class="form-control-plaintext"><?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_phone'];?>
</p></div><?php }?><div class="form-group"><label class="form-control-label"><?php echo __("New Phone");?>
</label><input name="phone" type="text" class="form-control" required autofocus><span class="form-text"><?php echo __("For example");?>
: +12344567890</span></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green"><?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><!-- Phone Activation --><!-- x-uploader -->
<?php echo '<script'; ?>
 id="x-uploader" type="text/template">
        <form class="x-uploader" action="{{url}}" method="post" enctype="multipart/form-data">
            {{#multiple}}
                <input name="file[]" type="file" title="{{title}}" multiple="multiple" accept="{{accept}}">
            {{/multiple}}
            {{^multiple}}
                <input name="file" type="file" title="{{title}}" accept="{{accept}}">
            {{/multiple}}
            <input type="hidden" name="secret" value="{{secret}}">
        </form>
    <?php echo '</script'; ?>
>
<!-- x-uploader --><!-- Noty Notification --><?php if ($_smarty_tpl->tpl_vars['system']->value['noty_notifications_enabled']) {
echo '<script'; ?>
 id="noty-notification" type="text/template"><div class="data-container small"><div class="data-avatar"><img src="{{image}}"></div><div class="data-content">{{message}}</div></div><?php echo '</script'; ?>
><?php }?><!-- Noty Notification --><!-- Adblock Detector --><?php if ($_smarty_tpl->tpl_vars['system']->value['adblock_detector_enabled']) {
echo '<script'; ?>
 id="adblock-detector" type="text/template"><div class="adblock-detector"><?php echo __("Our website is made possible by displaying online advertisements to our visitors");?>
<br><?php echo __("Please consider supporting us by disabling your ad blocker");?>
.</div><?php echo '</script'; ?>
><?php }?><!-- Adblock Detector --><!-- Keyboard Shortcuts --><?php echo '<script'; ?>
 id="keyboard-shortcuts" type="text/template"><div class="modal-header"><h6 class="modal-title"><i class="fa fa-keyboard mr5"></i><?php echo __("Keyboard Shortcuts");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body text-readable"><div class="mb10"><kbd>J</kbd> <?php echo __("Scroll to the next post");?>
</div><div><kbd>K</kbd> <?php echo __("Scroll to the previous post");?>
</div></div><?php echo '</script'; ?>
><!-- Keyboard Shortcuts --><!-- Emoji Menu --><?php echo '<script'; ?>
 id="emoji-menu" type="text/template"><div class="emoji-menu"><div class="tab-content"><div class="tab-pane active" id="tab-emojis-{{id}}"><div class="js_scroller" data-slimScroll-height="180"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->get_emojis(), 'emoji');
$_smarty_tpl->tpl_vars['emoji']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['emoji']->value) {
$_smarty_tpl->tpl_vars['emoji']->do_else = false;
?><div class="item"><i data-emoji="<?php echo $_smarty_tpl->tpl_vars['emoji']->value['pattern'];?>
" class="js_emoji twa twa-2x twa-<?php echo $_smarty_tpl->tpl_vars['emoji']->value['class'];?>
"></i></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div><div class="tab-pane" id="tab-stickers-{{id}}"><div class="js_scroller" data-slimScroll-height="180"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->get_stickers(), 'sticker');
$_smarty_tpl->tpl_vars['sticker']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['sticker']->value) {
$_smarty_tpl->tpl_vars['sticker']->do_else = false;
?><div class="item"><img data-emoji=":STK-<?php echo $_smarty_tpl->tpl_vars['sticker']->value['sticker_id'];?>
:" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['sticker']->value['image'];?>
" class="js_emoji"></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div></div><ul class="nav nav-tabs custom-tabs"><li class="nav-item"><a class="nav-link active" href="#tab-emojis-{{id}}" data-toggle="tab"><i class="fa fa-smile fa-fw mr5"></i><?php echo __("Emojis");?>
</a></li><li class="nav-item"><a class="nav-link" href="#tab-stickers-{{id}}" data-toggle="tab"><i class="fa fa-hand-peace fa-fw mr5"></i><?php echo __("Stickers");?>
</a></li></ul></div><?php echo '</script'; ?>
><!-- Emoji Menu --><!-- Chat --><?php if ($_smarty_tpl->tpl_vars['system']->value['chat_enabled']) {?><!-- Chat Sidebar --><!--<div class="chat-sidebar <?php if (!$_smarty_tpl->tpl_vars['user']->value->_data['user_chat_enabled']) {?>disabled<?php }?>"><div class="chat-sidebar-header clickChatWindow"><div class="float-right"><a class="js_chat-new mr5" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/messages/new"><i class="fa fa-edit"></i></a><i class="fa fa-cog" data-toggle="dropdown" data-display="static"></i><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/blocking"><?php echo __("Manage Blocking");?>
</a><a class="dropdown-item" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/privacy"><?php echo __("Privacy Settings");?>
</a><div class="dropdown-divider"></div><?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_chat_enabled']) {?><div class="dropdown-item pointer js_chat-toggle" data-status="on"><?php echo __("Turn Off Chat");?>
</div><?php } else { ?><div class="dropdown-item pointer js_chat-toggle" data-status="off"><?php echo __("Turn On Chat");?>
</div><?php }?></div></div><strong><?php echo __("Chat");?>
</strong><span class="ml5 badge badge-pill badge-info js_chat-online-users"><?php echo $_smarty_tpl->tpl_vars['online_friends_count']->value;?>
</span></div><div class="chat-sidebar-content"><div class="js_scroller" data-slimScroll-height="100%"><ul><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sidebar_friends']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?><li class="feeds-item"><div class="data-container clickable small js_chat_start" data-uid="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_id'];?>
" data-name="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>
" data-link="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_name'];?>
"><div class="data-avatar"><img src="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>
"></div><div class="data-content"><div class="float-right"><i class="fa fa-circle <?php if ($_smarty_tpl->tpl_vars['_user']->value['user_is_online']) {?>online<?php } else { ?>offline<?php }?>"></i></div><div><strong><?php echo $_smarty_tpl->tpl_vars['_user']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['_user']->value['user_lastname'];?>
</strong><?php if ($_smarty_tpl->tpl_vars['system']->value['chat_status_enabled'] && !$_smarty_tpl->tpl_vars['_user']->value['user_is_online']) {?><br><small><?php ob_start();
echo __("Last Seen");
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
 <span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['_user']->value['user_last_seen'];?>
"><?php echo $_smarty_tpl->tpl_vars['_user']->value['user_last_seen'];?>
</span></small><?php }?></div></div></div></li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul></div></div><div class="chat-sidebar-footer"><input type="text" class="form-control form-control-sm js_chat-search" placeholder='<?php echo __("Search");?>
'></div></div> --><!-- Chat Sidebar --><?php }
echo '<script'; ?>
 id="chat-box-new" type="text/template"><div class="chat-widget chat-box opened fresh"><!-- head --><div class="chat-widget-head"><?php echo __("New Message");?>
<!-- buttons--><div class="float-right"><i class="fa fa-times-circle js_chat-box-close"></i></div><!-- buttons--></div><!-- head --><!-- content --><div class="chat-widget-content"><div class="chat-conversations js_scroller"></div><div class="chat-to clearfix js_autocomplete-tags"><div class="to"><?php echo __("To");?>
:</div><ul class="tags"></ul><div class="typeahead addSrcollUser"><input type="text" size="1" autofocus></div></div><div class="chat-voice-notes"><div class="voice-recording-wrapper" data-handle="chat"><!-- processing message --><div class="x-hidden js_voice-processing-message"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"upload",'class'=>"mr5",'width'=>"16px",'height'=>"16px"), 0, false);
echo __("Processing");?>
<span class="loading-dots"></span></div><!-- processing message --><!-- success message --><div class="x-hidden js_voice-success-message"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"mr5",'width'=>"16px",'height'=>"16px"), 0, true);
echo __("Voice note recorded successfully");?>
<div class="float-right"><button type="button" class="close js_voice-remove"><span>&times;</span></button></div></div><!-- success message --><!-- start recording --><div class="btn-voice-start js_voice-start"><i class="fas fa-microphone mr5"></i><?php echo __("Record");?>
</div><!-- start recording --><!-- stop recording --><div class="btn-voice-stop js_voice-stop" style="display: none"><i class="far fa-stop-circle mr5"></i><?php echo __("Recording");?>
 <span class="js_voice-timer">00:00</span></div><!-- stop recording --></div></div><div class="chat-attachments attachments clearfix x-hidden"><ul><li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li></ul></div><div class="x-form chat-form invisible"><div class="chat-form-message"><textarea class="js_autosize js_post-message" dir="auto" rows="1" placeholder='<?php echo __("Write a message");?>
'></textarea></div><ul class="x-form-tools clearfix"><?php if ($_smarty_tpl->tpl_vars['system']->value['chat_photos_enabled']) {?><li class="x-form-tools-attach"><i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="chat"></i></li><?php }
if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_chat_enabled']) {?><li class="x-form-tools-voice js_chat-voice-notes-toggle"><i class="fas fa-microphone fa-lg fa-fw"></i></li><?php }?><li class="x-form-tools-emoji js_emoji-menu-toggle"><i class="far fa-smile-wink fa-lg fa-fw"></i></li></ul></div></div><!-- content --></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-box" type="text/template"><div class="chat-widget chat-box opened" id="{{chat_key_value}}"{{#conversation_id}}data-cid="{{conversation_id}}"{{/conversation_id}}{{#user_id}}data-uid="{{user_id}}"{{/user_id}}><!-- head --><div class="chat-widget-head js_chat-color-me">{{^multiple}}<i class="fa fa-user-secret mr5 js_chat-box-status"></i><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/{{link}}" title="{{name_list}}">{{name}}</a>{{/multiple}}{{#multiple}}<a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/messages/{{link}}" title="{{name_list}}">{{name}}</a>{{/multiple}}<!-- label --><div class="chat-head-label"><span class="badge badge-pill badge-lg badge-danger js_chat-box-label"></span></div><!-- label --><!-- buttons--><div class="float-right"><!-- video/audio calls (not multiple) -->{{^multiple}}<?php if ($_smarty_tpl->tpl_vars['system']->value['video_call_enabled']) {?><i class="fa fa-video mr10 js_chat-call-start" data-type="video" data-uid="{{user_id}}" data-name="{{name_list}}"></i><?php }
if ($_smarty_tpl->tpl_vars['system']->value['audio_call_enabled']) {?><i class="fa fa-phone-alt mr10 js_chat-call-start" data-type="audio" data-uid="{{user_id}}" data-name="{{name_list}}"></i><?php }?>{{/multiple}}<!-- video/audio calls (not multiple) --><i class="fa fa-times-circle js_chat-box-close"></i></div><!-- buttons--></div><!-- head --><!-- content --><div class="chat-widget-content"><div class="chat-conversations js_scroller"><ul></ul></div><div class="chat-typing"><i class="far fa-comment-dots mr5"></i><span class="loading-dots"><span class="js_chat-typing-users"></span> <?php echo __("Typing");?>
</span></div><div class="chat-voice-notes"><div class="voice-recording-wrapper" data-handle="chat"><!-- processing message --><div class="x-hidden js_voice-processing-message"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"upload",'class'=>"mr5",'width'=>"16px",'height'=>"16px"), 0, true);
echo __("Processing");?>
<span class="loading-dots"></span></div><!-- processing message --><!-- success message --><div class="x-hidden js_voice-success-message"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"mr5",'width'=>"16px",'height'=>"16px"), 0, true);
echo __("Voice note recorded successfully");?>
<div class="float-right"><button type="button" class="close js_voice-remove"><span>&times;</span></button></div></div><!-- success message --><!-- start recording --><div class="btn-voice-start js_voice-start"><i class="fas fa-microphone mr5"></i><?php echo __("Record");?>
</div><!-- start recording --><!-- stop recording --><div class="btn-voice-stop js_voice-stop" style="display: none"><i class="far fa-stop-circle mr5"></i><?php echo __("Recording");?>
 <span class="js_voice-timer">00:00</span></div><!-- stop recording --></div></div><div class="chat-attachments attachments clearfix x-hidden"><ul><li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li></ul></div><div class="x-form chat-form"><div class="chat-form-message"><textarea class="js_autosize js_post-message" dir="auto" rows="1" placeholder='<?php echo __("Write a message");?>
'></textarea></div><ul class="x-form-tools clearfix"><?php if ($_smarty_tpl->tpl_vars['system']->value['chat_photos_enabled']) {?><li class="x-form-tools-attach"><i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="chat"></i></li><?php }
if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_chat_enabled']) {?><li class="x-form-tools-voice js_chat-voice-notes-toggle"><i class="fas fa-microphone fa-lg fa-fw"></i></li><?php }?><li class="x-form-tools-emoji js_emoji-menu-toggle"><i class="far fa-smile-wink fa-lg fa-fw"></i></li><!--li class="x-form-tools-colors js_chat-colors-menu-toggle js_chat-color-me {{^conversation_id}}x-hidden{{/conversation_id}}"><i class="fa fa-circle fa-lg fa-fw"></i></li--></ul></div></div><!-- content --></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-message" type="text/template"><li><div class="conversation clearfix right"><div class="conversation-body chat-message-user-section1"><div class="text js_chat-color-me" {{#color}}style="background-color: {{color}}"{{/color}}><div class="chat-message-user-section"><img src="{{senderUserImage}}"><p>{{name_list}}</p><div class="time js_moment" data-time="{{time}}">{{time}}</div></div><div class="chat-message-section">{{{message}}}{{#image}}</div><span class="text-link js_lightbox-nodata {{#message}}mt5{{/message}}" data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/{{image}}"><img alt="" class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/{{image}}"></span>{{/image}}{{#voice_note}}<audio class="js_audio" id="audio-{{id}}" controls preload="auto" style="width: 100%; min-width: 100px;"><source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/{{voice_note}}" type="audio/mpeg"><source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/{{voice_note}}" type="audio/mp3"><?php echo __("Your browser does not support HTML5 audio");?>
</audio>{{/voice_note}}</div></div></div></li><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-calling" type="text/template"><div class="modal-header border-0"><h6 class="modal-title  mx-auto">{{#is_video}}<i class="fa fa-video mr5"></i>{{/is_video}}{{#is_audio}}<i class="fa fa-phone-volume mr5"></i>{{/is_audio}}<?php echo __("Calling");?>
</h6></div><div class="modal-body text-center"><h3>{{name}}</h3><p class="text-lg js_chat-calling-message"><?php echo __("Connecting");?>
<span class="loading-dots"></span></p><div class="twilio-stream-wrapper"><div class="twilio-stream"></div><video class="twilio-stream-local" autoplay=""></video></div><div class="mt30"><button type="button" class="btn btn-light x-hidden js_chat-call-close" data-dismiss="modal"><?php echo __("Close");?>
</button><button type="button" class="btn btn-icon btn-rounded btn-danger x-hidden js_chat-call-cancel" data-type="{{type}}" data-dismiss="modal"><i class="fas fa-phone-slash fa-lg fa-fw"></i></button><button type="button" class="btn btn-icon btn-rounded btn-danger x-hidden js_chat-call-end" data-type="{{type}}" data-dismiss="modal"><i class="fas fa-phone-slash fa-lg fa-fw"></i></button></div></div><div class="modal-footer border-0"></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-ringing" type="text/template"><div class="modal-header border-0"><h6 class="modal-title mx-auto">{{#is_video}}<i class="fa fa-video mr5"></i><?php echo __("New Video Call");?>
{{/is_video}}{{#is_audio}}<i class="fa fa-phone-volume mr5"></i><?php echo __("New Audio Call");?>
{{/is_audio}}</h6></div><div class="modal-body text-center"><div class="position-relative mb10" style="height: 106px;"><div class="profile-avatar-wrapper static"><img src="{{image}}" alt="{{name}}" style="width: 98px; height: 98px;"></div></div><h3>{{name}}</h3>{{#is_video}}<p class="text-lg js_chat-ringing-message"><?php echo __("Wants to have video call with you");?>
</p>{{/is_video}}{{#is_audio}}<p class="text-lg js_chat-ringing-message"><?php echo __("Wants to have audio call with you");?>
</p>{{/is_audio}}<div class="twilio-stream-wrapper"><div class="twilio-stream"></div><video class="twilio-stream-local" autoplay=""></video></div><div class="mt30"><button type="submit" class="btn btn-icon btn-rounded btn-success mr10 js_chat-call-answer" data-type="{{type}}" data-id="{{id}}"><i class="fas fa-phone-alt fa-lg fa-fw"></i></button><button type="button" class="btn btn-icon btn-rounded btn-danger js_chat-call-decline" data-type="{{type}}" data-id="{{id}}" data-dismiss="modal"><i class="fas fa-phone-slash fa-lg fa-fw"></i></button><button type="button" class="btn btn-icon btn-rounded btn-danger x-hidden js_chat-call-end" data-type="{{type}}" data-id="{{id}}" data-dismiss="modal"><i class="fas fa-phone-slash fa-lg fa-fw"></i></button></div></div><div class="modal-footer border-0"></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-colors-menu" type="text/template">
        <div class="chat-colors-menu">
            <div class="js_scroller" data-slimScroll-height="180">
                <div class="item js_chat-color" data-color="#3367d6" style="color: #3367d6;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#0ba05d" style="color: #0ba05d;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#ed9e6a" style="color: #ed9e6a;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#a085e2" style="color: #a085e2;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#01a5a5" style="color: #01a5a5;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#2b87ce" style="color: #2b87ce;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#ff72d2" style="color: #ff72d2;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#c9605e" style="color: #c9605e;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#056bba" style="color: #056bba;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#fc9cde" style="color: #fc9cde;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#70a0e0" style="color: #70a0e0;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#f2812b" style="color: #f2812b;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#8ec96c" style="color: #8ec96c;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#f33d4c" style="color: #f33d4c;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#aa2294" style="color: #aa2294;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#0e71ea" style="color: #0e71ea;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#b582af" style="color: #b582af;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#a1ce79" style="color: #a1ce79;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#56c4c5" style="color: #56c4c5;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#f9a722" style="color: #f9a722;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#f9c270" style="color: #f9c270;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#609b41" style="color: #609b41;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#51bcbc" style="color: #51bcbc;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#008484" style="color: #008484;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
                <div class="item js_chat-color" data-color="#5462a5" style="color: #5462a5;">
                    <i class="fa fa-circle fa-2x"></i>
                </div>
            </div>
        </div>
    <?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="chat-attachments-item" type="text/template"><li class="item deletable" data-src="{{src}}"><img alt="" src="{{image_path}}"><button type="button" class="close js_chat-attachment-remover" title='<?php echo __("Remove");?>
'><span>&times;</span></button></li><?php echo '</script'; ?>
><!-- Chat --><!-- DayTime Messages --><?php if ($_smarty_tpl->tpl_vars['system']->value['daytime_msg_enabled'] && $_smarty_tpl->tpl_vars['page']->value == "index") {
echo '<script'; ?>
 id="message-morning" type="text/template"><div class="card daytime_message"><button type="button" class="close float-right js_daytime-remover"><span>&times;</span></button><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"sun",'width'=>"40px",'height'=>"40px",'class'=>"d-table-cell vertical-align-middle pr10"), 0, true);
?><div class="d-table-cell"><strong><?php echo __("Good Morning");?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_firstname'];?>
</strong><br><span><?php echo __("Write it on your heart that every day is the best day in the year");?>
</span></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="message-afternoon" type="text/template"><div class="card daytime_message"><button type="button" class="close float-right js_daytime-remover"><span>&times;</span></button><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"afternoon",'width'=>"40px",'height'=>"40px",'class'=>"d-table-cell vertical-align-middle pr10"), 0, true);
?><div class="d-table-cell"><strong><?php echo __("Good Afternoon");?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_firstname'];?>
</strong><br><span><?php echo __("May Your Good Afternoon Be Light, Blessed, Productive And Happy");?>
</span></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="message-evening" type="text/template"><div class="card daytime_message"><button type="button" class="close float-right js_daytime-remover"><span>&times;</span></button><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"night",'width'=>"40px",'height'=>"40px",'class'=>"d-table-cell vertical-align-middle pr10"), 0, true);
?><div class="d-table-cell"><strong><?php echo __("Good Evening");?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_firstname'];?>
</strong><br><span><?php echo __("We hope you are enjoying your evening");?>
</span></div></div><?php echo '</script'; ?>
><?php }?><!-- DayTime Messages --><!-- Gifts --><?php if ($_smarty_tpl->tpl_vars['system']->value['gifts_enabled'] && $_smarty_tpl->tpl_vars['page']->value == "profile") {
echo '<script'; ?>
 id="gifts" type="text/template"><div class="modal-header"><h6 class="modal-title"><i class="fa fa-gift mr5"></i><?php echo __("Gifts");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms gifts_enabled gifts_enabled-form" data-url="users/gifts.php?do=send&uid={{uid}}"><div class="modal-body"><div class="js_scroller" data-slimScroll-height="440"><div class="row no-gutters"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['gifts']->value, 'gift');
$_smarty_tpl->tpl_vars['gift']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['gift']->value) {
$_smarty_tpl->tpl_vars['gift']->do_else = false;
?><div class="col-12 col-sm-3 col-md-4 ptb5 plr5"><input class="x-hidden input-label" type="radio" name="gift" value="<?php echo $_smarty_tpl->tpl_vars['gift']->value['gift_id'];?>
" id="gift_<?php echo $_smarty_tpl->tpl_vars['gift']->value['gift_id'];?>
"/><label class="button-label-image" for="gift_<?php echo $_smarty_tpl->tpl_vars['gift']->value['gift_id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['gift']->value['image'];?>
"></label></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="submit" class="btn btn-success btn-antier-green"><?php echo __("Send");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="gift" type="text/template"><div class="modal-header"><h6 class="modal-title"><i class="fa fa-gift mr5"></i><?php echo $_smarty_tpl->tpl_vars['gift']->value['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['gift']->value['user_lastname'];?>
 <?php echo __("sent you a gift");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body text-center"><img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['gift']->value['image'];?>
"></div><?php echo '</script'; ?>
><?php }?><!-- Gifts --><!-- Posts [Publisher|Comments] --><?php if ($_smarty_tpl->tpl_vars['page']->value == "index" || $_smarty_tpl->tpl_vars['page']->value == "profile" || $_smarty_tpl->tpl_vars['page']->value == "page" || $_smarty_tpl->tpl_vars['page']->value == "group" || $_smarty_tpl->tpl_vars['page']->value == "event" || $_smarty_tpl->tpl_vars['page']->value == "post" || $_smarty_tpl->tpl_vars['page']->value == "photo" || $_smarty_tpl->tpl_vars['page']->value == "market" || $_smarty_tpl->tpl_vars['page']->value == "blogs" || $_smarty_tpl->tpl_vars['page']->value == "directory" || $_smarty_tpl->tpl_vars['page']->value == "search" || $_smarty_tpl->tpl_vars['page']->value == "share") {?><!-- Publisher --><?php echo '<script'; ?>
 id="publisher-attachments-image-item" type="text/template"><li class="item deletable" data-src="{{src}}"><img alt="" src="{{image_path}}"><button type="button" class="close {{#mini}}js_publisher-mini-attachment-image-remover{{/mini}}{{^mini}}js_publisher-attachment-image-remover{{/mini}}" title='<?php echo __("Remove");?>
'><span>&times;</span></button></li><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="publisher-attachments-video-item" type="text/template"><li class="item deletable" data-src="{{src}}"><div class="name">{{name}}</div><button type="button" class="close js_publisher-mini-attachment-video-remover" title='<?php echo __("Remove");?>
'><span>&times;</span></button></li><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="scraper-media" type="text/template"><div class="publisher-scraper-remover js_publisher-scraper-remover"><button type="button" class="close"><span>&times;</span></button></div><div class="post-media"><div class="post-media-embed-responsive">{{{html}}}</div><div class="post-media-meta"><a class="title mb5" href="{{url}}" target="_blank">{{title}}</a><div class="text mb5">{{text}}</div><div class="source">{{provider}}</div></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="scraper-photo" type="text/template"><div class="publisher-scraper-remover js_publisher-scraper-remover"><button type="button" class="close"><span>&times;</span></button></div><div class="post-media"><div class="post-media-image"><div class="image" style="background-image:url('{{url}}');"></div></div><div class="post-media-meta"><div class="source">{{provider}}</div></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="scraper-link" type="text/template"><div class="publisher-scraper-remover js_publisher-scraper-remover"><button type="button" class="close"><span>&times;</span></button></div><div class="post-media">{{#thumbnail}}<a class="post-media-image" href="{{url}}" target="_blank"><div class="image" style="background-image:url('{{thumbnail}}');"></div><div class="source">{{host}}</div></a>{{/thumbnail}}<div class="post-media-meta"><a class="title mb5" href="{{url}}" target="_blank">{{title}}</a><div class="text mb5">{{text}}</div></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="poll-option" type="text/template"><div class="publisher-meta" data-meta="poll"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"plus",'width'=>"16px",'height'=>"16px"), 0, true);
?><input type="text" placeholder='<?php echo __("Add an option");?>
...'></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="pubisher-gif" type="text/template"><div class="publisher-scraper-remover js_publisher-gif-remover"><button type="button" class="close"><span>&times;</span></button></div><div class="post-media"><div class="post-media-image"><div class="image" style="background-image:url('{{src}}');"></div></div></div><?php echo '</script'; ?>
><!-- Publisher --><!-- Comments --><?php echo '<script'; ?>
 id="comment-attachments-item" type="text/template"><li class="item deletable" data-src="{{src}}"><img alt="" src="{{image_path}}"><button type="button" class="close js_comment-attachment-remover" title='<?php echo __("Remove");?>
'><span>&times;</span></button></li><?php echo '</script'; ?>
><!-- Comments --><!-- Edit (Posts|Comments) --><?php echo '<script'; ?>
 id="edit-post" type="text/template"><div class="post-edit"><div class="x-form comment-form"><textarea rows="2" class="js_autosize js_mention js_update-post">{{text}}</textarea><ul class="x-form-tools clearfix"><li class="x-form-tools-post js_update-post"><i class="far fa-paper-plane fa-lg fa-fw"></i></li><li class="x-form-tools-emoji js_emoji-menu-toggle"><i class="far fa-smile-wink fa-lg fa-fw"></i></li></ul></div><div class="edit_btns"><span class="text-link cncl_btn js_unedit-post"><?php echo __("Cancel");?>
</span><button type="button" class="btn  js_publisher_updatebtn  btn-publisher btn-share-style"> Share </button></div></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="edit-comment" type="text/template"><div class="comment-edit"><div class="x-form comment-form"><textarea rows="1" class="js_autosize js_mention js_update-comment">{{text}}</textarea><ul class="x-form-tools clearfix"><li class="x-form-tools-attach"><i class="far fa-image fa-lg fa-fw js_x-uploader" data-handle="comment"></i></li><li class="x-form-tools-emoji js_emoji-menu-toggle"><i class="far fa-smile-wink fa-lg fa-fw"></i></li><li class="x-form-tools-post js_update-comment"><i class="far fa-paper-plane fa-lg fa-fw"></i></li></ul></div><div class="comment-attachments attachments clearfix x-hidden"><ul><li class="loading"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></li></ul></div><small class="text-link js_unedit-comment"><?php echo __("Cancel");?>
</small></div><?php echo '</script'; ?>
><!-- Edit (Posts|Comments) --><!-- Hidden (Posts|Authors) --><?php echo '<script'; ?>
 id="hidden-post" type="text/template"><div class="post flagged" data-id="{{id}}"><div class="text-semibold mb5"><?php echo __("Post Hidden");?>
</div><?php echo __("This post will no longer appear to you");?>
 <span class="text-link js_unhide-post"><?php echo __("Undo");?>
</span></div><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="hidden-author" type="text/template"><div class="post flagged" data-id="{{id}}"><?php echo __("You won't see posts from");?>
 {{name}} <?php echo __("in News Feed anymore");?>
. <span class="text-link js_unhide-author" data-author-id="{{uid}}" data-author-name="{{name}}"><?php echo __("Undo");?>
</span></div><?php echo '</script'; ?>
><!-- Hidden (Posts|Authors) --><?php }?><!-- Posts [Publisher|Comments] --><!-- Pages & Groups & Events --><?php if ($_smarty_tpl->tpl_vars['page']->value == "pages") {
echo '<script'; ?>
 id="create-page" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Create New Page");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms create-event-form" data-url="pages_groups_events/create.php?type=page&do=create"><div class="modal-body"><div class="form-group"><label class="form-control-label" for="title"><?php echo __("Name Your Page");?>
</label><input type="text" class="form-control" name="title" id="title" maxlength="30"></div><div class="form-group"><label class="form-control-label" for="username"><?php echo __("Web Address");?>
</label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text d-none d-sm-block"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/pages/</span></div><input type="text" class="form-control" name="username" id="username"></div><span class="form-text"><?php echo __("Can only contain alphanumeric characters (A–Z, 0–9) and periods ('.')");?>
</span></div><div class="form-group"><label class="form-control-label" for="category"><?php echo __("Category");?>
</label><select class="form-control" name="category" id="category"><option><?php echo __("Select Category");?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
"><?php echo __($_smarty_tpl->tpl_vars['category']->value['category_name']);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div><div class="form-group"><label class="form-control-label" for="description"><?php echo __("About");?>
</label><textarea class="form-control" name="description" name="description"></textarea></div><!-- custom fields --><?php if ($_smarty_tpl->tpl_vars['custom_fields']->value) {
$_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value,'_registration'=>true), 0, false);
}?><!-- custom fields --><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green"><?php echo __("Create");?>
</button></div></form><?php echo '</script'; ?>
><?php }
if ($_smarty_tpl->tpl_vars['page']->value == "groups") {
echo '<script'; ?>
 id="create-group" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Create New Group");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms create-event-form create-event-js-template" data-url="pages_groups_events/create.php?type=group&do=create"><div class="modal-body"><div class="form-group"><label class="form-control-label" for="title"><?php echo __("Name Your Group");?>
</label><input type="text" class="form-control" name="title" id="title"></div><div class="form-group"><label class="form-control-label" for="username"><?php echo __("Web Address");?>
</label><div class="input-group"><div class="input-group-prepend"><span class="input-group-text d-none d-sm-block"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/groups/</span></div><input type="text" class="form-control" name="username" id="username"></div><span class="form-text"><?php echo __("Can only contain alphanumeric characters (A–Z, 0–9) and periods ('.')");?>
</span></div><div class="form-group"><label class="form-control-label" for="privacy"><?php echo __("Select Privacy");?>
</label><select class="form-control selectpicker" name="privacy"><option value="public" data-content="<div class='option'><div class='icon'><i class='fa fa-globe fa-2x'></i></div><div class='text'><b><?php echo __("Public Group");?>
</b><br><?php echo __("Anyone can see the group, its members and their posts");?>
.</div></div>"><?php echo __("Public Group");?>
</option><option value="closed" data-content="<div class='option'><div class='icon'><i class='fa fa-unlock-alt fa-2x'></i></div><div class='text'><b><?php echo __("Closed Group");?>
</b><br><?php echo __("Only members can see posts");?>
.</div></div>"><?php echo __("Closed Group");?>
</option><option value="secret" data-content="<div class='option'><div class='icon'><i class='fa fa-lock fa-2x'></i></div><div class='text'><b><?php echo __("Secret Group");?>
</b><br><?php echo __("Only members can find the group and see posts");?>
.</div></div>"><?php echo __("Secret Group");?>
</option></select></div><div class="form-group"><label class="form-control-label" for="category"><?php echo __("Category");?>
</label><select class="form-control" name="category" id="category"><option><?php echo __("Select Category");?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
"><?php echo __($_smarty_tpl->tpl_vars['category']->value['category_name']);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div><div class="form-group"><label class="form-control-label" for="description"><?php echo __("About");?>
</label><textarea class="form-control" name="description"></textarea></div><!-- custom fields --><?php if ($_smarty_tpl->tpl_vars['custom_fields']->value) {
$_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value,'_registration'=>true), 0, true);
}?><!-- custom fields --><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green"><?php echo __("Create");?>
</button></div></form><?php echo '</script'; ?>
><?php }
if ($_smarty_tpl->tpl_vars['page']->value == "events") {
echo '<script'; ?>
 id="create-event" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Create New Event");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms create-event-form" data-url="pages_groups_events/create.php?type=event&do=create"><div class="modal-body"><div class="form-group"><label class="form-control-label" for="title"><?php echo __("Name Your Event");?>
</label><input type="text" class="form-control" name="title" id="title"></div><div class="form-group"><label class="form-control-label" for="location"><?php echo __("Location");?>
</label><input type="text" class="form-control js_geocomplete" name="location" id="location"></div><div class="form-group"><label class="form-control-label"><?php echo __("Start Date");?>
</label><div class="input-group date js_datetimepicker" id="start_date" data-target-input="nearest"><input type='text' class="form-control datetimepicker-input" data-target="#start_date" name="start_date" /><div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div></div></div><div class="form-group"><label class="form-control-label"><?php echo __("End Date");?>
</label><div class="input-group date js_datetimepicker" id="end_date" data-target-input="nearest"><input type='text' class="form-control datetimepicker-input" data-target="#end_date" name="end_date" /><div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div></div></div><div class="form-group"><label class="form-control-label" for="privacy"><?php echo __("Select Privacy");?>
</label><select class="form-control selectpicker" name="privacy"><option value="public" data-content="<div class='option'><div class='icon'><i class='fa fa-globe fa-2x'></i></div><div class='text'><b><?php echo __("Public Event");?>
</b><br><?php echo __("Anyone can see the event, its users and posts");?>
.</div></div>"><?php echo __("Public Event");?>
</option><option value="closed" data-content="<div class='option'><div class='icon'><i class='fa fa-unlock-alt fa-2x'></i></div><div class='text'><b><?php echo __("Closed Event");?>
</b><br><?php echo __("Only event users can see posts");?>
.</div></div>"><?php echo __("Closed Event");?>
</option><option value="secret" data-content="<div class='option'><div class='icon'><i class='fa fa-lock fa-2x'></i></div><div class='text'><b><?php echo __("Secret Event");?>
</b><br><?php echo __("Only invited users and event users can find the event");?>
.</div></div>"><?php echo __("Secret Event");?>
</option></select></div><div class="form-group"><label class="form-control-label" for="category"><?php echo __("Category");?>
</label><select class="form-control" name="category" id="category"><option><?php echo __("Select Category");?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
"><?php echo __($_smarty_tpl->tpl_vars['category']->value['category_name']);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div><div class="form-group"><label class="form-control-label" for="description"><?php echo __("About");?>
</label><textarea class="form-control" name="description"></textarea></div><!-- custom fields --><?php if ($_smarty_tpl->tpl_vars['custom_fields']->value) {
$_smarty_tpl->_subTemplateRender('file:__custom_fields.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_custom_fields'=>$_smarty_tpl->tpl_vars['custom_fields']->value,'_registration'=>true), 0, true);
}?><!-- custom fields --><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green"><?php echo __("Create");?>
</button></div></form><?php echo '</script'; ?>
><?php }?><!-- Pages & Groups & Events --><!-- Wallet --><?php if ($_smarty_tpl->tpl_vars['page']->value == "ads" || $_smarty_tpl->tpl_vars['page']->value == "settings") {
echo '<script'; ?>
 id="wallet-transfer" type="text/template"><div class="modal-header"><h6 class="modal-title"><img width="20px" class="mr20" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/sendMoney.svg"><?php echo __("Send Money");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms wallet-transfer-js-template-form" data-url="ads/wallet.php?do=wallet_transfer"><div class="modal-body"><div class="form-group"><!-- <label class="form-control-label"><?php echo __("Amount");?>
</label> --><div class="input-money"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount"></div></div><div class="form-group"><!-- <label class="form-control-label" for="send_to"><?php echo __("Send To");?>
</label> --><div class="position-relative js_autocomplete"><input type="text" class="form-control" placeholder="<?php echo __("Search for user name or email");?>
" name="send_to" id="send_to" autocomplete="off"><input type="hidden" name="send_to_id"></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light dltButton" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green walletSendButton"><i class="fas fa-check mr20"></i> <?php echo __("Send");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="wallet-replenish" type="text/template"><div class="modal-header"><h6 class="modal-title"><img width="20px" class="mr20" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/sendMoney.svg"> <?php echo __("Replenish Credit");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms wallet-replenish-js-template-form " data-url="ads/wallet.php?do=wallet_replenish"><div class="modal-body"><div class="form-group"><label class="form-control-label" for="amount"><?php echo __("Amount");?>
</label><div class="input-money"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount"></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light dltButton" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green walletSendButton"><i class="fas fa-check mr20"></i> <?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="wallet-withdraw-affiliates" type="text/template"><div class="modal-header"><h6 class="modal-title"><img width="20px" class="mr20" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/sendMoney.svg"> <?php echo __("Withdraw Affiliates Credit");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms wallet-withdraw-affiliates-js-template-form" data-url="ads/wallet.php?do=wallet_withdraw_affiliates"><div class="modal-body"><div class="form-group"><label class="form-control-label" for="amount"><?php echo __("Your Affiliates Credit");?>
</label><div class="text-lg"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];
echo number_format($_smarty_tpl->tpl_vars['user']->value->_data['user_affiliate_balance'],2);?>
</div></div><div class="form-group"><label class="form-control-label" for="amount"><?php echo __("Amount");?>
</label><div class="input-money"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount"></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light dltButton" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green walletSendButton"><i class="fas fa-check mr20"></i> <?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php echo '<script'; ?>
 id="wallet-withdraw-points" type="text/template"><div class="modal-header"><h6 class="modal-title"><img width="20px" class="mr20" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/sendMoney.svg"> <?php echo __("Withdraw Points Credit");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms wallet-withdraw-points-js-template-form" data-url="ads/wallet.php?do=wallet_withdraw_points"><div class="modal-body"><div class="form-group"><label class="form-control-label" for="amount"><?php echo __("Your Points Credit");?>
</label><div class="text-lg"><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];
echo number_format(((1/$_smarty_tpl->tpl_vars['system']->value['points_per_currency'])*$_smarty_tpl->tpl_vars['user']->value->_data['user_points']),2);?>
</div></div><div class="form-group"><label class="form-control-label" for="amount"><?php echo __("Amount");?>
</label><div class="input-money"><span><?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency_symbol'];?>
</span><input type="text" class="form-control" placeholder="0.00" min="1.00" max="1000" name="amount"></div></div><!-- error --><div class="alert alert-danger mb0 mt10 x-hidden"></div><!-- error --></div><div class="modal-footer"><button type="button" class="btn btn-light dltButton" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green walletSendButton"><i class="fas fa-check mr20"></i> <?php echo __("Continue");?>
</button></div></form><?php echo '</script'; ?>
><?php }?><!-- Wallet --><!-- Crop Profile Picture --><?php if ($_smarty_tpl->tpl_vars['page']->value == "started" || $_smarty_tpl->tpl_vars['page']->value == "profile" || $_smarty_tpl->tpl_vars['page']->value == "page" || $_smarty_tpl->tpl_vars['page']->value == "group") {
echo '<script'; ?>
 id="crop-profile-picture" type="text/template"><div class="modal-header"><h6 class="modal-title"><i class="fa fa-crop-alt mr5"></i><?php echo __("Crop Picture");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body text-center"><img id="cropped-profile-picture" src="{{image}}" style="max-width: 100%;"></div><div class="modal-footer"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="button" class="btn btn-success btn-antier-green js_crop-picture" data-handle="{{handle}}" data-id="{{id}}"><?php echo __("Save");?>
</button></div><?php echo '</script'; ?>
><?php }?><!-- Crop Profile Picture --><!-- Download Information --><?php if ($_smarty_tpl->tpl_vars['page']->value == "settings") {
echo '<script'; ?>
 id="download-information" type="text/template"><div class="modal-header"><h6 class="modal-title"><i class="fa fa-cloud-download-alt mr5"></i><?php echo __("Download Your Information");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="text-center"><img width="128px" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/headers/ready.png"><p><?php echo __("Your file is ready to download");?>
</p><a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/settings/download?hash=<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_name'];?>
-<?php echo $_smarty_tpl->tpl_vars['secret']->value;?>
" class="btn btn-md btn-primary bg-gradient-blue border-0 rounded-pill"><i class="fa fa-cloud-download-alt mr10"></i><?php echo __("Download");?>
</a></div></div><?php echo '</script'; ?>
><?php }?><!-- Download Information --><!-- Verification Documents --><?php if ($_smarty_tpl->tpl_vars['page']->value == "admin") {
echo '<script'; ?>
 id="verification-documents" type="text/template"><div class="modal-header"><h6 class="modal-title"><i class="fa fa-paperclip mr5"></i><?php echo __("Verification Documents");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="form-group form-row"><label class="col-md-3 form-control-label"><?php echo __("Documents");?>
</label><div class="col-sm-9"><div class="row"><div class="col-sm-6"><div class="section-title mb20"><i class="fas fa-passport mr10"></i><?php echo __("Personal Photo");?>
</div><a target="_blank" href="{{photo}}"><img class="img-fluid" src="{{photo}}"></a></div><div class="col-sm-6"><div class="section-title mb20"><i class="fas fa-passport mr10"></i><?php echo __("Passport or National ID");?>
</div><a target="_blank" href="{{passport}}"><img class="img-fluid" src="{{passport}}"></a></div></div></div></div><div class="form-group form-row"><label class="col-md-3 form-control-label"><?php echo __("Message");?>
</label><div class="col-sm-9"><p class="pt5 pb0">{{message}}</p></div></div></div><div class="modal-footer"><button class="btn btn-danger js_admin-unverify" data-id="{{request-id}}"><i class="fa fa-times mr5"></i><?php echo __("Decline");?>
</button><button class="btn btn-success js_admin-verify" data-handle="{{handle}}" data-id="{{node-id}}"><i class="fa fa-check mr5"></i><?php echo __("Verify");?>
</button></div><?php echo '</script'; ?>
><?php }?><!-- Verification Documents --><!-- Payments --><?php if ($_smarty_tpl->tpl_vars['page']->value == "packages" || $_smarty_tpl->tpl_vars['page']->value == "ads") {
echo '<script'; ?>
 id="payment" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php echo __("Select Your Payment Method");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body text-center"><div class="row justify-content-center" style="margin-left: -5px; margin-right: -5px;"><?php if ($_smarty_tpl->tpl_vars['system']->value['paypal_enabled']) {?><div class="col-12 col-sm-4 plr5"><button class="js_payment-paypal btn btn-block btn-payment plr20 mb10" data-handle="{{handle}}"{{#id}} data-id="{{id}}" {{/id}}{{#price}} data-price="{{price}}" {{/price}}{{#name}} data-name="{{name}}" {{/name}}{{#img}} data-img="{{img}}" {{/img}}><i class="fab fa-paypal fa-lg fa-fw mr5" style="color: #00186A;"></i><?php echo __("PayPal");?>
</button></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['creditcard_enabled']) {?><div class="col-12 col-sm-4 plr5"><button class="js_payment-stripe btn btn-block btn-payment plr20 mb10" data-handle="{{handle}}"{{#id}} data-id="{{id}}" {{/id}}{{#price}} data-price="{{price}}" {{/price}}{{#name}} data-name="{{name}}" {{/name}}{{#img}} data-img="{{img}}" {{/img}}data-method="credit"><i class="fa fa-credit-card fa-lg fa-fw mr5" style="color: #8798CC;"></i><?php echo __("Credit Card");?>
</button></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['alipay_enabled']) {?><div class="col-12 col-sm-4 plr5"><button class="js_payment-stripe btn btn-block btn-payment plr20 mb10" data-handle="{{handle}}"{{#id}} data-id="{{id}}" {{/id}}{{#price}} data-price="{{price}}" {{/price}}{{#name}} data-name="{{name}}" {{/name}}{{#img}} data-img="{{img}}" {{/img}}data-method="alipay"><i class="fab fa-alipay fa-lg fa-fw mr5" style="color: #5B9EDD;"></i><?php echo __("Alipay");?>
</button></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['coinpayments_enabled']) {?><div class="col-12 col-sm-4 plr5"><button class="js_payment-coinpayments btn btn-block btn-payment plr20 mb10" data-handle="{{handle}}"{{#id}} data-id="{{id}}" {{/id}}{{#price}} data-price="{{price}}" {{/price}}{{#name}} data-name="{{name}}" {{/name}}{{#img}} data-img="{{img}}" {{/img}}><i class="fab fa-bitcoin fa-lg fa-fw mr5" style="color: #FFC107;"></i><?php echo __("CoinPayments");?>
</button></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['2checkout_enabled']) {?><div class="col-12 col-sm-4 plr5"><button class="btn btn-block btn-payment plr20 mb10" data-toggle="modal" data-url="#twocheckout" data-options='{ "handle": "{{handle}}", "price": "{{price}}", "id": "{{id}}" }'><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"2co",'width'=>"20px",'height'=>"20px",'class'=>"mr5"), 0, true);
echo __("2Checkout");?>
</button></div><?php }
if ($_smarty_tpl->tpl_vars['system']->value['bank_transfers_enabled']) {?><div class="col-12 col-sm-4 plr5"><button class="btn btn-block btn-payment plr20 mb10" data-toggle="modal" data-url="#bank-transfer" data-options='{ "handle": "{{handle}}", "price": "{{price}}", "id": "{{id}}" }' data-size="large"><i class="fa fa-university fa-lg fa-fw mr5" style="color: #4CAF50;"></i><?php echo __("Bank Transfer");?>
</button></div><?php }
if ($_smarty_tpl->tpl_vars['page']->value == "packages" && $_smarty_tpl->tpl_vars['system']->value['ads_enabled'] && $_smarty_tpl->tpl_vars['system']->value['packages_wallet_payment_enabled']) {?><div class="col-12 col-sm-4 plr5"><button class="js_payment-wallet-package btn btn-block btn-payment plr20" data-id="{{id}}"><i class="fa fa-wallet fa-lg fa-fw mr5" style="color: #007bff;"></i><?php echo __("Wallet Credit");?>
</button></div><?php }?></div></div><?php echo '</script'; ?>
><!-- 2Checkout --><?php if ($_smarty_tpl->tpl_vars['system']->value['2checkout_enabled']) {
echo '<script'; ?>
 id="twocheckout" type="text/template"><div class="modal-header"><h6 class="modal-title"><?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"2co",'width'=>"20px",'height'=>"20px",'class'=>"mr5"), 0, true);
echo __("2Checkout");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form id="twocheckout_form"><div class="modal-body"><div class="heading-small mb20"><?php echo __("Card Info");?>
</div><div class="pl-md-4 pr-md-4"><div class="row"><div class="form-group col-md-12"><label class="form-control-label"><?php echo __("Card Number");?>
</label><input name="card_number" type="text" class="form-control" required autocomplete="off"></div><div class="form-group col-md-4"><label class="form-control-label"><?php echo __("Exp Month");?>
</label><select name="card_exp_month" class="form-control" required><?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 12+1 - (1) : 1-(12)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php if ($_smarty_tpl->tpl_vars['i']->value < 10) {?>0<?php }
echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['i']->value < 10) {?>0<?php }
echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }
}
?></select></div><div class="form-group col-md-4"><label class="form-control-label"><?php echo __("Exp Year");?>
</label><select name="card_exp_year" class="form-control" required><?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 2035+1 - (2020) : 2020-(2035)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 2020, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?><option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option><?php }
}
?></select></div><div class="form-group col-md-4"><label class="form-control-label"><?php echo __("CVC");?>
</label><input name="card_cvv" type="text" class="form-control" required autocomplete="off"></div></div></div><div class="heading-small mb20"><?php echo __("Billing Information");?>
</div><div class="pl-md-4 pr-md-4"><div class="row"><div class="form-group col-md-6"><label class="form-control-label"><?php echo __("Name");?>
</label><input name="billing_name" type="text" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_lastname'];?>
"></div><div class="form-group col-md-6"><label class="form-control-label"><?php echo __("Email");?>
</label><input name="billing_email" type="email" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_email'];?>
"></div><div class="form-group col-md-6"><label class="form-control-label"><?php echo __("Phone");?>
</label><input name="billing_phone" type="text" class="form-control" required value="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_phone'];?>
"></div><div class="form-group col-md-6"><label class="form-control-label"><?php echo __("Address");?>
</label><input name="billing_address" type="text" class="form-control required"></div><div class="form-group col-md-6"><label class="form-control-label"><?php echo __("City");?>
</label><input name="billing_city" type="text" class="form-control" required></div><div class="form-group col-md-6"><label class="form-control-label"><?php echo __("State");?>
</label><input name="billing_state" type="text" class="form-control" required></div><div class="form-group col-md-6"><label class="form-control-label"><?php echo __("Country");?>
</label><select name="billing_country" class="form-control" required><option value="none"><?php echo __("Select Country");?>
</option><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['countries']->value, 'country');
$_smarty_tpl->tpl_vars['country']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->do_else = false;
?><option <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['user_country'] == $_smarty_tpl->tpl_vars['country']->value['country_id']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['country']->value['country_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['country']->value['country_name'];?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select></div><div class="form-group col-md-6"><label class="form-control-label"><?php echo __("Zip Code");?>
</label><input name="billing_zip_code" type="text" class="form-control" required></div></div></div><!-- error --><div class="alert alert-danger mb0 x-hidden"></div><!-- error --></div><div class="modal-footer"><input type="hidden" name="token" value="" /><input type="hidden" name="handle" value="{{handle}}"><input type="hidden" name="package_id" value="{{id}}"><input type="hidden" name="price" value="{{price}}"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green"><i class="fa fa-check-circle mr10"></i><?php echo __("Pay");?>
</button></div></form><?php echo '</script'; ?>
><?php }?><!-- 2Checkout --><!-- Bank Transfer --><?php if ($_smarty_tpl->tpl_vars['system']->value['bank_transfers_enabled']) {
echo '<script'; ?>
 id="bank-transfer" type="text/template"><div class="modal-header"><h6 class="modal-title"><i class="fa fa-university mr5"></i><?php echo __("Bank Transfer");?>
</h6><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><form class="js_ajax-forms bank_transfers_enabled-js-template-form" data-url="payments/bank.php"><div class="modal-body"><div class="page-header rounded bank-transfer mb30"><div class="circle-1"></div><div class="circle-2"></div><div class="inner text-left"><h2 class="mb20"><i class="fa fa-university mr5"></i><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_name'];?>
</h2><div class="mb10"><div class="bank-info-meta"><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_number'];?>
</div><span class="bank-info-help"><?php echo __("Account Number / IBAN");?>
</span></div><div class="mb10"><div class="bank-info-meta"><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_name'];?>
</div><span class="bank-info-help"><?php echo __("Account Name");?>
</span></div><div class="row mb10"><div class="col-md-6"><div class="bank-info-meta"><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_routing'];?>
</div><span class="bank-info-help"><?php echo __("Routing Code");?>
</span></div><div class="col-md-6"><div class="bank-info-meta"><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_account_country'];?>
</div><span class="bank-info-help"><?php echo __("Country");?>
</span></div></div></div></div><div class="alert alert-warning"><div class="icon"><i class="fa fa-exclamation-triangle fa-2x"></i></div><div class="text"><?php echo $_smarty_tpl->tpl_vars['system']->value['bank_transfer_note'];?>
</div></div><div class="form-group form-row"><label class="col-md-3 form-control-label"><?php echo __("Bank Receipt");?>
</label><div class="col-md-9"><div class="x-image"><button type="button" class="close x-hidden js_x-image-remover" title='<?php echo __("Remove");?>
'><span>×</span></button><div class="x-image-loader"><div class="progress x-progress"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div></div><i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i><input type="hidden" class="js_x-image-input" name="bank_receipt" value=""></div><span class="form-text"><?php echo __("Please attach your bank receipt");?>
</span></div></div><!-- success --><div class="alert alert-success mb0 x-hidden"></div><!-- success --><!-- error --><div class="alert alert-danger mb0 x-hidden"></div><!-- error --></div><div class="modal-footer"><input type="hidden" name="handle" value="{{handle}}"><input type="hidden" name="package_id" value="{{id}}"><input type="hidden" name="price" value="{{price}}"><button type="button" class="btn btn-light" data-dismiss="modal"><?php echo __("Cancel");?>
</button><button type="submit" class="btn btn-success btn-antier-green"><i class="fa fa-check-circle mr10"></i><?php echo __("Send");?>
</button></div></form><?php echo '</script'; ?>
><?php }?><!-- Bank Transfer --><?php }?><!-- Payments --><?php }
}
}
