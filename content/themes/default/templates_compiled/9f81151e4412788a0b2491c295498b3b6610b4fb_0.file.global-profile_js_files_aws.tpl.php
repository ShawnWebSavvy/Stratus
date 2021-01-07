<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 06:59:51
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile_js_files_aws.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff40e673dc4e6_78747499',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f81151e4412788a0b2491c295498b3b6610b4fb' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/global-profile_js_files_aws.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff40e673dc4e6_78747499 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/sngine/includes/libs/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->_assignInScope('cacheremove', smarty_modifier_date_format(time(),'%Y-%m-%d_%H:%M:%S'));?><!-- Initialize --><?php echo '<script'; ?>
>/* initialize vars */var site_title = "<?php echo $_smarty_tpl->tpl_vars['system']->value['system_title'];?>
";var site_path = "<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
";var ajax_path = site_path+"/includes/ajax/";var uploads_path = "<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
";var current_page = "<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
";/* language */var system_langauge_dir = "<?php echo strtolower($_smarty_tpl->tpl_vars['system']->value['language']['dir']);?>
";var system_langauge_code = "<?php echo substr($_smarty_tpl->tpl_vars['system']->value['language']['code'],0,-3);?>
";/* datetime */var system_datetime_format = <?php if ($_smarty_tpl->tpl_vars['system']->value['system_datetime_format'] == "m/d/Y H:i") {?>'MM/DD/YYYY HH:mm'<?php } else { ?>'DD/MM/YYYY HH:mm'<?php }?>;/* theme */var theme_mode_night = <?php if ($_smarty_tpl->tpl_vars['system']->value['theme_mode_night']) {?>true<?php } else { ?>false<?php }?>;var theme_dir_rtl = <?php if ($_smarty_tpl->tpl_vars['system']->value['language']['dir'] == "LTR") {?>false<?php } else { ?>true<?php }?>;/* ajax */var min_data_heartbeat = "<?php echo $_smarty_tpl->tpl_vars['system']->value['data_heartbeat']*1000;?>
";var min_chat_heartbeat = "<?php echo $_smarty_tpl->tpl_vars['system']->value['chat_heartbeat']*1000;?>
";/* uploads */var secret = "<?php echo $_smarty_tpl->tpl_vars['secret']->value;?>
";var accpeted_video_extensions = "<?php echo $_smarty_tpl->tpl_vars['system']->value['accpeted_video_extensions'];?>
";var accpeted_audio_extensions = "<?php echo $_smarty_tpl->tpl_vars['system']->value['accpeted_audio_extensions'];?>
";var accpeted_file_extensions = "<?php echo $_smarty_tpl->tpl_vars['system']->value['accpeted_file_extensions'];?>
";var tinymce_photos_enabled = <?php if ($_smarty_tpl->tpl_vars['system']->value['tinymce_photos_enabled']) {?>true<?php } else { ?>false<?php }?>;/* chat */var chat_enabled = <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_enabled']) {?>true<?php } else { ?>false<?php }?>;var chat_typing_enabled = <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_typing_enabled']) {?>true<?php } else { ?>false<?php }?>;var chat_seen_enabled = <?php if ($_smarty_tpl->tpl_vars['system']->value['chat_seen_enabled']) {?>true<?php } else { ?>false<?php }?>;var chat_sound = <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['chat_sound']) {?>true<?php } else { ?>false<?php }?>;/* notifications */var notifications_sound = false;var noty_notifications_enabled = <?php if ($_smarty_tpl->tpl_vars['system']->value['noty_notifications_enabled']) {?>true<?php } else { ?>false<?php }?>;var browser_notifications_enabled = <?php if ($_smarty_tpl->tpl_vars['system']->value['browser_notifications_enabled']) {?>true<?php } else { ?>false<?php }?>;/* posts */var daytime_msg_enabled = <?php if ($_smarty_tpl->tpl_vars['daytime_msg_enabled']->value) {?>true<?php } else { ?>false<?php }?>;var giphy_key = "<?php echo $_smarty_tpl->tpl_vars['system']->value['giphy_key'];?>
";var geolocation_enabled = <?php if ($_smarty_tpl->tpl_vars['system']->value['geolocation_enabled']) {?>true<?php } else { ?>false<?php }?>;var yandex_key = "<?php echo $_smarty_tpl->tpl_vars['system']->value['yandex_key'];?>
";var post_translation_enabled = <?php if ($_smarty_tpl->tpl_vars['system']->value['post_translation_enabled']) {?>true<?php } else { ?>false<?php }?>;var mobile_infinite_scroll = <?php if ($_smarty_tpl->tpl_vars['system']->value['mobile_infinite_scroll']) {?>true<?php } else { ?>false<?php }?>;/* payments */var currency = "<?php echo $_smarty_tpl->tpl_vars['system']->value['system_currency'];?>
";var stripe_key = <?php if ($_smarty_tpl->tpl_vars['system']->value['stripe_mode'] == "live") {?>"<?php echo $_smarty_tpl->tpl_vars['system']->value['stripe_live_publishable'];?>
"<?php } else { ?>"<?php echo $_smarty_tpl->tpl_vars['system']->value['stripe_test_publishable'];?>
"<?php }?>;var twocheckout_merchant_code = "<?php echo $_smarty_tpl->tpl_vars['system']->value['2checkout_merchant_code'];?>
";var twocheckout_publishable_key = "<?php echo $_smarty_tpl->tpl_vars['system']->value['2checkout_publishable_key'];?>
";/* features */var adblock_detector = <?php if (!$_smarty_tpl->tpl_vars['user']->value->_is_admin && $_smarty_tpl->tpl_vars['system']->value['adblock_detector_enabled']) {?>true<?php } else { ?>false<?php }?>;<?php echo '</script'; ?>
><?php echo '<script'; ?>
>/* i18n for JS */var __ = [];__['Ask something'] = "<?php echo __('Ask something');?>
";__['Add Friend'] = "<?php echo __('Add Friend');?>
";__['Friends'] = "<?php echo __('Friends');?>
";__['Friend Request Sent'] = "<?php echo __('Request Sent');?>
";__['Following'] = "<?php echo __('Following');?>
";__['Follow'] = "<?php echo __('Follow');?>
";__['Pending'] = "<?php echo __('Pending');?>
";__['Remove'] = "<?php echo __('Remove');?>
";__['Error'] = "<?php echo __('Error');?>
";__['Success'] = "<?php echo __('Success');?>
";__['Loading'] = "<?php echo __('Loading');?>
";__['Like'] = "<?php echo __('Like');?>
";__['Unlike'] = "<?php echo __('Unlike');?>
";__['Joined'] = "<?php echo __('Joined');?>
";__['Join'] = "<?php echo __('Join');?>
";__['Remove Admin'] = "<?php echo __('Remove Admin');?>
";__['Make Admin'] = "<?php echo __('Make Admin');?>
";__['Going'] = "<?php echo __('Going');?>
";__['Interested'] = "<?php echo __('Interested');?>
";__['Delete'] = "<?php echo __('Delete');?>
";__['Delete Cover'] = "<?php echo __('Delete Cover');?>
";__['Delete Picture'] = "<?php echo __('Delete Picture');?>
";__['Delete Post'] = "<?php echo __('Delete Post');?>
";__['Delete Comment'] = "<?php echo __('Delete Comment');?>
";__['Delete Conversation'] = "<?php echo __('Delete Conversation');?>
";__['Report'] = "<?php echo __('Report');?>
";__['Block User'] = "<?php echo __('Block User');?>
";__['Unblock User'] = "<?php echo __('Unblock User');?>
";__['Mark as Available'] = "<?php echo __('Mark as Available');?>
";__['Mark as Sold'] = "<?php echo __('Mark as Sold');?>
";__['Save Post'] = "<?php echo __('Save Post');?>
";__['Unsave Post'] = "<?php echo __('Unsave Post');?>
";__['Boost Post'] = "<?php echo __('Boost Post');?>
";__['Unboost Post'] = "<?php echo __('Unboost Post');?>
";__['Pin Post'] = "<?php echo __('Pin Post');?>
";__['Unpin Post'] = "<?php echo __('Unpin Post');?>
";__['Verify'] = "<?php echo __('Verify');?>
";__['Decline'] = "<?php echo __('Decline');?>
";__['Boost'] = "<?php echo __('Boost');?>
";__['Unboost'] = "<?php echo __('Unboost');?>
";__['Mark as Paid'] = "<?php echo __('Mark as Paid');?>
";__['Read more'] = "<?php echo __('Read more');?>
";__['Read less'] = "<?php echo __('Read less');?>
";__['Turn On Chat'] = "<?php echo __('Turn On Chat');?>
";__['Turn Off Chat'] = "<?php echo __('Turn Off Chat');?>
";__['Monthly Average'] = "<?php echo __('Monthly Average');?>
";__['Jan'] = "<?php echo __('Jan');?>
";__['Feb'] = "<?php echo __('Feb');?>
";__['Mar'] = "<?php echo __('Mar');?>
";__['Apr'] = "<?php echo __('Apr');?>
";__['May'] = "<?php echo __('May');?>
";__['Jun'] = "<?php echo __('Jun');?>
";__['Jul'] = "<?php echo __('Jul');?>
";__['Aug'] = "<?php echo __('Aug');?>
";__['Sep'] = "<?php echo __('Sep');?>
";__['Oct'] = "<?php echo __('Oct');?>
";__['Nov'] = "<?php echo __('Nov');?>
";__['Dec'] = "<?php echo __('Dec');?>
";__['Users'] = "<?php echo __('Users');?>
";__['Pages'] = "<?php echo __('Pages');?>
";__['Groups'] = "<?php echo __('Groups');?>
";__['Events'] = "<?php echo __('Events');?>
";__['Posts'] = "<?php echo __('Posts');?>
";__['Translated'] = "<?php echo __('Translated');?>
";__['Are you sure you want to delete this?'] = "<?php echo __('Are you sure you want to delete this?');?>
";__['Are you sure you want to remove your cover photo?'] = "<?php echo __('Are you sure you want to remove your cover photo?');?>
";__['Are you sure you want to remove your profile picture?'] = "<?php echo __('Are you sure you want to remove your profile picture?');?>
";__['Are you sure you want to delete this post?'] = "<?php echo __('Are you sure you want to delete this post?');?>
";__['Are you sure you want to delete this comment?'] = "<?php echo __('Are you sure you want to delete this comment?');?>
";__['Are you sure you want to delete this conversation?'] = "<?php echo __('Are you sure you want to delete this conversation?');?>
";__['Are you sure you want to report this?'] = "<?php echo __('Are you sure you want to report this?');?>
";__['Are you sure you want to block this user?'] = "<?php echo __('Are you sure you want to block this user?');?>
";__['Are you sure you want to unblock this user?'] = "<?php echo __('Are you sure you want to unblock this user?');?>
";__['Are you sure you want to delete your account?'] = "<?php echo __('Are you sure you want to delete your account?');?>
";__['Are you sure you want to verify this request?'] = "<?php echo __('Are you sure you want to verify this request?');?>
";__['Are you sure you want to decline this request?'] = "<?php echo __('Are you sure you want to decline this request?');?>
";__['Are you sure you want to approve this request?'] = "<?php echo __('Are you sure you want to approve this request?');?>
";__['Are you sure you want to do this?'] = "<?php echo __('Are you sure you want to do this?');?>
";__['There is something that went wrong!'] = "<?php echo __('There is something that went wrong!');?>
";__['There is no more data to show'] = "<?php echo __('There is no more data to show');?>
";__['This website uses cookies to ensure you get the best experience on our website'] = "<?php echo __('This website uses cookies to ensure you get the best experience on our website');?>
";__['Got It!'] = "<?php echo __('Got It!');?>
";__['Learn More'] = "<?php echo __('Learn More');?>
";__['No result found'] = "<?php echo __('No result found');?>
";__['Turn on Commenting'] = "<?php echo __('Turn on Commenting');?>
";__['Turn off Commenting'] = "<?php echo __('Turn off Commenting');?>
";__['Day Mode'] = "<?php echo __('Day Mode');?>
";__['Night Mode'] = "<?php echo __('Night Mode');?>
";__['Message'] = "<?php echo __('Message');?>
";__['You haved poked'] = "<?php echo __('You haved poked');?>
";__['Touch to unmute'] = "<?php echo __('Touch to unmute');?>
";__['Press space to see next'] = "<?php echo __('Press space to see next');?>
";__['Visit link'] = "<?php echo __('Visit link');?>
";__['ago'] = "<?php echo __('ago');?>
";__['hour ago'] = "<?php echo __('hour ago');?>
";__['hours ago'] = "<?php echo __('hours ago');?>
";__['minute ago'] = "<?php echo __('minute ago');?>
";__['minutes ago'] = "<?php echo __('minutes ago');?>
";__['from now'] = "<?php echo __('from now');?>
";__['seconds ago'] = "<?php echo __('seconds ago');?>
";__['yesterday'] = "<?php echo __('yesterday');?>
";__['tomorrow'] = "<?php echo __('tomorrow');?>
";__['days ago'] = "<?php echo __('days ago');?>
";__['Nothing selected'] = "<?php echo __('Nothing selected');?>
";__['Seen by'] = "<?php echo __('Seen by');?>
";__['Ringing'] = "<?php echo __('Ringing');?>
";__['is Offline'] = "<?php echo __('is Offline');?>
";__['is Busy'] = "<?php echo __('is Busy');?>
";__['No Answer'] = "<?php echo __('No Answer');?>
";__['You can not connect to this user'] = "<?php echo __('You can not connect to this user');?>
";__['You have an active call already'] = "<?php echo __('You have an active call already');?>
";__['The recipient declined the call'] = "<?php echo __('The recipient declined the call');?>
";__['Connection has been lost'] = "<?php echo __('Connection has been lost');?>
";__['You must fill in all of the fields'] = "<?php echo __('You must fill in all of the fields');?>
";__['Hide from Timeline'] = "<?php echo __('Hide from Timeline');?>
";__['Allow on Timeline'] = "<?php echo __('Allow on Timeline');?>
";__['Are you sure you want to hide this post from your profile timeline? It may still appear in other places like newsfeed and search results'] = "<?php echo __('Are you sure you want to hide this post from your profile timeline? It may still appear in other places like newsfeed and search results');?>
";__['Select All'] = "<?php echo __('Select All');?>
";__['Deselect All'] = "<?php echo __('Deselect All');?>
";__['Total'] = "<?php echo __('Total');?>
";/* i18n for DataTables */__['Processing...'] = "<?php echo __('Processing...');?>
";__['Search:'] = "<?php echo __('Search:');?>
";__['Show _MENU_ entries'] = "<?php echo __('Show _MENU_ entries');?>
";__['Showing _START_ to _END_ of _TOTAL_ entries'] = "<?php echo __('Showing _START_ to _END_ of _TOTAL_ entries');?>
";__['Showing 0 to 0 of 0 entries'] = "<?php echo __('Showing 0 to 0 of 0 entries');?>
";__['(filtered from _MAX_ total entries)'] = "<?php echo __('(filtered from _MAX_ total entries)');?>
";__['Loading...'] = "<?php echo __('Loading...');?>
";__['No matching records found'] = "<?php echo __('No matching records found');?>
";__['No data available in table'] = "<?php echo __('No data available in table');?>
";__['First'] = "<?php echo __('First');?>
";__['Previous'] = "<?php echo __('Previous');?>
";__['Next'] = "<?php echo __('Next');?>
";__['Last'] = "<?php echo __('Last');?>
";__[': activate to sort column ascending'] = "<?php echo __(': activate to sort column ascending');?>
";__[': activate to sort column descending'] = "<?php echo __(': activate to sort column descending');?>
";/* i18n for OneSignal */__['Subscribe to notifications'] = "<?php echo __('Subscribe to notifications');?>
";__['You are subscribed to notifications'] = "<?php echo __('You are subscribed to notifications');?>
";__['You have blocked notifications'] = "<?php echo __('You have blocked notifications');?>
";__['Click to subscribe to notifications'] = "<?php echo __('Click to subscribe to notifications');?>
";__['Thanks for subscribing!'] = "<?php echo __('Thanks for subscribing!');?>
";__['You are subscribed to notifications'] = "<?php echo __('You are subscribed to notifications');?>
";__['You will not receive notifications again'] = "<?php echo __('You will not receive notifications again');?>
";__['Manage Site Notifications'] = "<?php echo __('Manage Site Notifications');?>
";__['SUBSCRIBE'] = "<?php echo __('SUBSCRIBE');?>
";__['UNSUBSCRIBE'] = "<?php echo __('UNSUBSCRIBE');?>
";__['Unblock Notifications'] = "<?php echo __('Unblock Notifications');?>
";__['Follow these instructions to allow notifications:'] = "<?php echo __('Follow these instructions to allow notifications:');?>
";<?php echo '</script'; ?>
><!-- Initialize --><!-- Dependencies Libs [jQuery|Bootstrap] --><?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><?php if ($_smarty_tpl->tpl_vars['system']->value['language']['dir'] == "LTR") {
echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><?php } else {
echo '<script'; ?>
 src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><?php }?><!-- Dependencies Libs [jQuery|Bootstrap] --><!-- Dependencies Plugins --><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/mustache/mustache.min.js" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/jquery.form/jquery.form.min.js" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/jquery.inview/jquery.inview.min.js" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/autosize/autosize.min.js" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/readmore/readmore.min.js" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/moment/moment-with-locales.min.js" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.js" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><link rel="stylesheet" href="https://cdn.fluidplayer.com/v2/current/fluidplayer.min.css" type="text/css"/><?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?><!-- jQuery-UI --><?php echo '<script'; ?>
>var _tooltip = jQuery.fn.tooltip;<?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"><?php echo '</script'; ?>
><?php echo '<script'; ?>
>jQuery.fn.tooltip = _tooltip;<?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/jquery-ui.triggeredAutocomplete/jquery-ui.triggeredAutocomplete.js"><?php echo '</script'; ?>
><!-- jQuery-UI --><!-- Sticky Sidebar --><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/plugins/sticky-sidebar/theia-sticky-sidebar.min.js"><?php echo '</script'; ?>
><!-- Sticky Sidebar --><!-- Google Geocomplete --><?php if ($_smarty_tpl->tpl_vars['system']->value['geolocation_enabled']) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/jquery.geocomplete/jquery.geocomplete.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?libraries=places&key=<?php echo $_smarty_tpl->tpl_vars['system']->value['geolocation_key'];?>
"><?php echo '</script'; ?>
><?php }?><!-- Google Geocomplete --><!-- Noty Notifications --><?php if ($_smarty_tpl->tpl_vars['system']->value['noty_notifications_enabled']) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/noty/noty.min.js"><?php echo '</script'; ?>
><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/noty/noty.css"><?php }?><!-- Noty Notifications --><!-- Crop Profile Picture & Reposition Cover Photo --><?php if ($_smarty_tpl->tpl_vars['page']->value == "started" || $_smarty_tpl->tpl_vars['page']->value == "global-profile/global-profile" || $_smarty_tpl->tpl_vars['page']->value == "profile" || $_smarty_tpl->tpl_vars['page']->value == "page" || $_smarty_tpl->tpl_vars['page']->value == "group" || $_smarty_tpl->tpl_vars['page']->value == "event") {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/jquery-ui.touch-punch/jquery-ui.touch-punch.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/jquery.imagedrag/jquery.imagedrag.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/rcrop/rcrop.min.js"><?php echo '</script'; ?>
><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/rcrop/rcrop.min.css"><?php }?><!-- Crop Profile Picture & Reposition Cover Photo --><!-- Stories --><?php if ($_smarty_tpl->tpl_vars['page']->value == "global-profile/global-profile-timeline" && $_smarty_tpl->tpl_vars['view']->value == '') {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/zuck/zuck.js?<?php echo $_smarty_tpl->tpl_vars['cacheremove']->value;?>
"><?php echo '</script'; ?>
><?php if ($_smarty_tpl->tpl_vars['system']->value['language']['dir'] == "LTR") {?><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/zuck/zuck.css?<?php echo $_smarty_tpl->tpl_vars['cacheremove']->value;?>
"><?php } else { ?><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/zuck/zuck.rtl.css?<?php echo $_smarty_tpl->tpl_vars['cacheremove']->value;?>
"><?php }
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/slick/slick.min.js"><?php echo '</script'; ?>
><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/slick/slick.css"><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/slick/slick-theme.css"><?php }?><!-- Stories --><!-- Voice Notes --><?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_posts_enabled'] || $_smarty_tpl->tpl_vars['system']->value['voice_notes_comments_enabled'] || $_smarty_tpl->tpl_vars['system']->value['voice_notes_chat_enabled']) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/recorder/recorder.js"><?php echo '</script'; ?>
><?php }?><!-- Voice Notes --><!-- Slick Slider --><?php if ($_smarty_tpl->tpl_vars['page']->value == "global-profile/global-profile-timeline") {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/slick/slick.min.js"><?php echo '</script'; ?>
><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/slick/slick.css"><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/slick/slick-theme.css"><?php }?><!-- Slick Slider --><!-- TinyMCE --><?php if ($_smarty_tpl->tpl_vars['page']->value == "admin" || $_smarty_tpl->tpl_vars['page']->value == "blogs" || $_smarty_tpl->tpl_vars['page']->value == "forums") {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/tinymce/tinymce.min.js"><?php echo '</script'; ?>
><?php }?><!-- TinyMCE --><!-- Bootstrap selectpicker & datetimepicker --><?php if ($_smarty_tpl->tpl_vars['page']->value == "admin" || $_smarty_tpl->tpl_vars['page']->value == "groups" || $_smarty_tpl->tpl_vars['page']->value == "group" || $_smarty_tpl->tpl_vars['page']->value == "events" || $_smarty_tpl->tpl_vars['page']->value == "event" || $_smarty_tpl->tpl_vars['page']->value == "ads") {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/bootstrap.select/bootstrap-select.min.js"><?php echo '</script'; ?>
><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/bootstrap.select/bootstrap-select.min.css"><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/bootstrap.datetimepicker/bootstrap-datetimepicker.min.js"><?php echo '</script'; ?>
><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/bootstrap.datetimepicker/bootstrap-datetimepicker.min.css"><?php }?><!-- Bootstrap selectpicker & datetimepicker --><!-- Stripe & 2Checkout --><?php if ($_smarty_tpl->tpl_vars['page']->value == "packages" || $_smarty_tpl->tpl_vars['page']->value == "ads") {
if ($_smarty_tpl->tpl_vars['system']->value['creditcard_enabled'] || $_smarty_tpl->tpl_vars['system']->value['alipay_enabled']) {
echo '<script'; ?>
 src="https://checkout.stripe.com/checkout.js"><?php echo '</script'; ?>
><?php }
if ($_smarty_tpl->tpl_vars['system']->value['2checkout_enabled']) {
echo '<script'; ?>
 src="https://www.2checkout.com/checkout/api/2co.min.js"><?php echo '</script'; ?>
><?php }
}?><!-- Stripe & 2Checkout --><!-- Twilio --><?php if ($_smarty_tpl->tpl_vars['system']->value['audio_call_enabled'] || $_smarty_tpl->tpl_vars['system']->value['video_call_enabled']) {
echo '<script'; ?>
 src="https://media.twiliocdn.com/sdk/js/video/releases/1.20.0/twilio-video.min.js"><?php echo '</script'; ?>
><?php }?><!-- Twilio --><!-- Easytimer --><?php if ($_smarty_tpl->tpl_vars['system']->value['audio_call_enabled'] || $_smarty_tpl->tpl_vars['system']->value['video_call_enabled'] || $_smarty_tpl->tpl_vars['system']->value['voice_notes_posts_enabled'] || $_smarty_tpl->tpl_vars['system']->value['voice_notes_comments_enabled'] || $_smarty_tpl->tpl_vars['system']->value['voice_notes_chat_enabled']) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/easytimer/easytimer.min.js"><?php echo '</script'; ?>
><?php }?><!-- Easytimer --><!-- Datatables --><?php if ($_smarty_tpl->tpl_vars['page']->value == "admin" || $_smarty_tpl->tpl_vars['page']->value == "ads" || $_smarty_tpl->tpl_vars['page']->value == "developers") {?><link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/><?php echo '<script'; ?>
 src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"><?php echo '</script'; ?>
><?php }?><!-- Datatables --><?php }?><!-- Dependencies Plugins --><?php $_smarty_tpl->_assignInScope('cacheremovejs', smarty_modifier_date_format(time(),'%Y-%m-%d_%H:%M:%S'));?><!-- Stratus [JS] --><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/stratus/global-profile/global-profile-core.js?<?php echo $_smarty_tpl->tpl_vars['cacheremovejs']->value;?>
" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/stratus/global-profile/global-profile-user.js?<?php echo $_smarty_tpl->tpl_vars['cacheremovejs']->value;?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/stratus/global-profile/global-profile-post.js?<?php echo $_smarty_tpl->tpl_vars['cacheremovejs']->value;?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/stratus/global-profile/global-profile-chat.js?<?php echo $_smarty_tpl->tpl_vars['cacheremovejs']->value;?>
"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/stratus/showads.js?<?php echo $_smarty_tpl->tpl_vars['cacheremovejs']->value;?>
"><?php echo '</script'; ?>
><?php }?><!-- Stratus [JS] --><?php if ($_smarty_tpl->tpl_vars['page']->value == "admin") {?><!-- Dependencies Plugins --><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/bootstrap.colorpicker/bootstrap-colorpicker.min.js"><?php echo '</script'; ?>
><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/bootstrap.colorpicker/bootstrap-colorpicker.min.css"><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/jquery.treegrid/jquery.treegrid.min.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/jquery.treegrid/jquery.treegrid.fontawesome.js"><?php echo '</script'; ?>
><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/jquery.treegrid/jquery.treegrid.css"><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/codemirror/lib/codemirror.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/codemirror/mode/css/css.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/codemirror/mode/javascript/javascript.js"><?php echo '</script'; ?>
><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/codemirror/lib/codemirror.css"><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/tagify/jquery.tagify.min.js"><?php echo '</script'; ?>
><link rel="stylesheet" type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads_assets'];?>
/includes/assets/js/plugins/tagify/tagify.css"><!-- Dependencies Plugins [JS] --><!-- Stratus [JS] --><?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/includes/assets/js/stratus/admin.js?<?php echo $_smarty_tpl->tpl_vars['cacheremovejs']->value;?>
"><?php echo '</script'; ?>
><!-- Stratus [JS] --><!-- Admin Charts --><?php echo '<script'; ?>
 src="https://code.highcharts.com/highcharts.js"><?php echo '</script'; ?>
><?php echo '<script'; ?>
 src="https://code.highcharts.com/modules/exporting.js"><?php echo '</script'; ?>
><?php if ($_smarty_tpl->tpl_vars['view']->value == "dashboard") {
echo '<script'; ?>
>$(function () {$('#admin-chart-dashboard').highcharts({chart: {type: 'column',backgroundColor: 'transparent',},title: {text: __['Monthly Average']},xAxis: {categories: [__['Jan'],__['Feb'],__['Mar'],__['Apr'],__['May'],__['Jun'],__['Jul'],__['Aug'],__['Sep'],__['Oct'],__['Nov'],__['Dec']],crosshair: true},yAxis: {min: 0,title: {text: __['Total']}},tooltip: {headerFormat: '<span style="font-size:10px">{point.key}</span><table>',pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +'<td style="padding:0"><b>{point.y}</b></td></tr>',footerFormat: '</table>',shared: true,useHTML: true},plotOptions: {column: {pointPadding: 0.2,borderWidth: 0}},series: [{name: __['Users'],data: [<?php echo implode(',',$_smarty_tpl->tpl_vars['chart']->value['users']);?>
]}, {name: __['Pages'],data: [<?php echo implode(',',$_smarty_tpl->tpl_vars['chart']->value['pages']);?>
]}, {name: __['Groups'],data: [<?php echo implode(',',$_smarty_tpl->tpl_vars['chart']->value['groups']);?>
]}, {name: __['Events'],data: [<?php echo implode(',',$_smarty_tpl->tpl_vars['chart']->value['events']);?>
]}, {name: __['Posts'],data: [<?php echo implode(',',$_smarty_tpl->tpl_vars['chart']->value['posts']);?>
]}]});});<?php echo '</script'; ?>
><?php }
if ($_smarty_tpl->tpl_vars['view']->value == "packages" && $_smarty_tpl->tpl_vars['sub_view']->value == "earnings") {
echo '<script'; ?>
>$(function () {$('#admin-chart-earnings').highcharts({chart: {type: 'column',backgroundColor: 'transparent',},title: {text: __['Monthly Average']},xAxis: {categories: [__['Jan'],__['Feb'],__['Mar'],__['Apr'],__['May'],__['Jun'],__['Jul'],__['Aug'],__['Sep'],__['Oct'],__['Nov'],__['Dec']],crosshair: true},yAxis: {min: 0,title: {text: __['Total']}},tooltip: {headerFormat: '<span style="font-size:10px">{point.key}</span><table>',pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +'<td style="padding:0"><b>{point.y}</b></td></tr>',footerFormat: '</table>',shared: true,useHTML: true},plotOptions: {column: {pointPadding: 0.2,borderWidth: 0}},series: [<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>{name: "<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
",data: [<?php echo implode(',',$_smarty_tpl->tpl_vars['value']->value['months_sales']);?>
]},<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>]});});<?php echo '</script'; ?>
><?php }?><!-- Admin Charts --><!-- Admin Code Editor --><?php if ($_smarty_tpl->tpl_vars['view']->value == "design") {
echo '<script'; ?>
>
            $(function () {
                CodeMirror.fromTextArea(document.getElementById('custome_js_header'), {
                    mode: "javascript",
                    lineNumbers: true,
                    readOnly: false
                });

                CodeMirror.fromTextArea(document.getElementById('custome_js_footer'), {
                    mode: "javascript",
                    lineNumbers: true,
                    readOnly: false
                });

                CodeMirror.fromTextArea(document.getElementById('custom-css'), {
                    mode: "css",
                    lineNumbers: true,
                    readOnly: false
                });
            });
        <?php echo '</script'; ?>
><?php }?><!-- Admin Code Editor --><?php }?><!-- Cookies Policy --><?php if ($_smarty_tpl->tpl_vars['system']->value['cookie_consent_enabled']) {
echo '<script'; ?>
 src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js" <?php if (!$_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>defer<?php }?>><?php echo '</script'; ?>
><link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" /><?php echo '<script'; ?>
>window.addEventListener("load", function(){window.cookieconsent.initialise({"palette": {"popup": {"background": "#1e2321","text": "#fff"},"button": {"background": "#3367d6"}},"theme": "edgeless","position": <?php if ($_smarty_tpl->tpl_vars['system']->value['language']['dir'] == 'LTR') {?>"bottom-left"<?php } else { ?>"bottom-right"<?php }?>,"content": {"message": __['This website uses cookies to ensure you get the best experience on our website'],"dismiss": __['Got It!'],"link": __['Learn More'],"href": site_path+"/static/privacy"}})});<?php echo '</script'; ?>
><?php }?><!-- Cookies Policy --><!-- OneSignal Notifications --><?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['system']->value['onesignal_notification_enabled']) {
echo '<script'; ?>
 src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""><?php echo '</script'; ?>
><?php echo '<script'; ?>
>var onesignal_app_id = "<?php echo $_smarty_tpl->tpl_vars['system']->value['onesignal_app_id'];?>
";var onesignal_user_id = "<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['onesignal_user_id'];?>
";var onesignal_push_id = "";var OneSignal = window.OneSignal || [];OneSignal.push(function() {OneSignal.init({appId: onesignal_app_id,autoResubscribe: false,notifyButton: {enable: true, /* Required to use the Subscription Bell */size: 'medium', /* One of 'small', 'medium', or 'large' */theme: 'default', /* One of 'default' (red-white) or 'inverse" (white-red) */position: (theme_dir_rtl)? 'bottom-left' : 'bottom-right', /* Either 'bottom-left' or 'bottom-right' */offset: {bottom: '20px',left: '20px', /* Only applied if bottom-left */right: '20px' /* Only applied if bottom-right */},prenotify: true, /* Show an icon with 1 unread message for first-time site visitors */showCredit: false, /* Hide the OneSignal logo */text: {'tip.state.unsubscribed': __['Subscribe to notifications'],'tip.state.subscribed': __['You are subscribed to notifications'],'tip.state.blocked': __['You have blocked notifications'],'message.prenotify': __['Click to subscribe to notifications'],'message.action.subscribed': __['Thanks for subscribing!'],'message.action.resubscribed': __['You are subscribed to notifications'],'message.action.unsubscribed': __['You will not receive notifications again'],'dialog.main.title': __['Manage Site Notifications'],'dialog.main.button.subscribe': __['SUBSCRIBE'],'dialog.main.button.unsubscribe': __['UNSUBSCRIBE'],'dialog.blocked.title': __['Unblock Notifications'],'dialog.blocked.message': __['Follow these instructions to allow notifications:']},colors: {'circle.background': 'rgb(84,110,123)','circle.foreground': 'white','badge.background': 'rgb(84,110,123)','badge.foreground': 'white','badge.bordercolor': 'white','pulse.color': 'white','dialog.button.background.hovering': 'rgb(77, 101, 113)','dialog.button.background.active': 'rgb(70, 92, 103)','dialog.button.background': 'rgb(84,110,123)','dialog.button.foreground': 'white'},},allowLocalhostAsSecureOrigin: true,});OneSignal.getUserId(function(userId) {onesignal_push_id = userId;if (userId != onesignal_user_id) {$.post(api['users/notifications'], { handle: 'update', id: onesignal_push_id });}});OneSignal.on('subscriptionChange', function (isSubscribed) {if (isSubscribed == false) {$.post(api['users/notifications'], { handle: 'delete' });} else {$.post(api['users/notifications'], { handle: 'update', id: onesignal_push_id });}});});<?php echo '</script'; ?>
><?php }?><!-- OneSignal Notifications --><?php }
}
