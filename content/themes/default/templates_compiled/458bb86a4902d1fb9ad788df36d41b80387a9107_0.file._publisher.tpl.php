<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 10:15:48
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/_publisher.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff43c547a1f85_25549712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '458bb86a4902d1fb9ad788df36d41b80387a9107' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/_publisher.tpl',
      1 => 1609841694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__svg_icons.tpl' => 11,
  ),
),false)) {
function content_5ff43c547a1f85_25549712 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="publisher-overlay"></div>
<div class="custom_modal_style">
  <div class="x-form publisher globalpublishrmodalwidth" data-handle="<?php echo $_smarty_tpl->tpl_vars['_handle']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['_id']->value) {?>data-id="<?php echo $_smarty_tpl->tpl_vars['_id']->value;?>
" <?php }?>>
    <div class="modal-content">
      <!-- publisher loader -->
      <div class="publisher-loader">
        <div class="loader loader_small"></div>
      </div>
      <!-- publisher loader -->
      <div class="addpostHeadFocussed">
        <h2>Create Post</h2>
        <a class="addpost-closebtn" href="javascript:void(0)"><img
            src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/modelCross.svg"></a>
      </div>

      <!-- publisher-message -->
      <div class="publisher-message popup-publishBtn">
        <!-- <a class="addpost-closebtn" href="javascript:void(0)"><i class="fas fa-times-circle"></i></a> -->
        <div class="published_img_post">
          <div class="published_avatar-block"><?php if ($_smarty_tpl->tpl_vars['_handle']->value == "page") {?>
            <img class="publisher-avatar" src="<?php echo $_smarty_tpl->tpl_vars['page']->value['page_picture'];?>
" />
            <?php } else { ?>
            <img class="publisher-avatar sd" src="<?php echo $_smarty_tpl->tpl_vars['userGlobal']->value->_data['global_user_picture'];?>
" />
            <?php }?>
          </div>
          <div class="btn-popup-public" style="padding-left:10px;">
            <p><?php echo $_smarty_tpl->tpl_vars['userGlobal']->value->_data['user_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['userGlobal']->value->_data['user_lastname'];?>
</p>
            <div class="btn-group js_publisher-privacy" data-toggle="tooltip" data-placement="top" data-value="public"
              title='<?php echo __("Shared with: Public");?>
' style="display:none;">
              <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown"
                data-display="static">
                <i class="btn-group-icon fa fa-globe mr10"></i><span class="btn-group-text"><?php echo __("Public");?>
</span>
              </button>

            </div>


          </div>

        </div>
        <input type="hidden" id="parent_post_id" name="parent_post_id" value="" />
        <div class="d-flex">
          <div class="globalPostFixes">
            <div class="colored-text-wrapper">
              <textarea maxlength="260" id="post_text" dir="auto" class="js_autosize js_mention js_publisher-scraper"
                data-init-placeholder='<?php echo __("What is your Stratus? @mention #hashtag");?>
'
                placeholder='<?php echo __("What is your Stratus? @mention #hashtag");?>
'>
<?php if ($_smarty_tpl->tpl_vars['page']->value == "share" && $_smarty_tpl->tpl_vars['url']->value) {
echo $_smarty_tpl->tpl_vars['url']->value;
}?></textarea>
            </div>
            <div class="divAppendTextarea">
              <input type="hidden" value="1" id="inputTextareaId" />
            </div>
          </div>
          <!-- <p class="postedinfo">134/290</p> -->
        </div>
        <div class="wrapFooterDiv wrapFootershowHide wrapFooterDiv-old">
          <ul class="small-icons">
            <?php if ($_smarty_tpl->tpl_vars['system']->value['photos_enabled']) {?>
            <li class="">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="photos">
                <img alt="image" title="Upload Image"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/photo_message_icon.svg"
                  class="js_x-uploader" data-handle="publisher" data-multiple="true" /><?php echo __("Photos");?>

              </div>
            </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['videos_enabled']) {?>
            <li class="uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="video">
                <img alt="video" title="Upload Video"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/add_video_icon.svg"
                  class="js_x-uploader" data-type="video" data-handle="publisher" data-multiple="true" />
              </div>
            </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['polls_enabled']) {?>
            <li class="uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="voice_notes">
                <img alt="voice_notes" title="Voice Notes"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/add_voice_notes.svg"
                  class="js_x-uploaders" data-handle="publisher" data-multiple="true" />
              </div>
            </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['polls_enabled']) {?>
            <li class="uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="poll">
                <img alt="poll" title="Poll Options"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/add_poll_icon.svg"
                  class="js_x-uploaders" data-handle="publisher" data-multiple="true" />
              </div>
            </li>
            <?php }?>
            <li class="add-message">
              <div class="s-more-function publisher-tools-tab js_publisher-tab" data-tab="s-more">
                <img
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/add_message_icon.svg"
                  class="" data-handle="publisher" data-multiple="true" />
              </div>
            </li>
          </ul>
          <button type="button"
            class="btn btn-sm btn-success ml5 js_publisher btn-antier-green btn-publisher js_publisher_post_ant">
            <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/icons/btn_startIt.png"
              class="js_publisher_post_img" />
          </button>
        </div>
        <div class="publisher-emojis">
          <!-- <div class="position-relative">
      <span class="js_emoji-menu-toggle" data-toggle="tooltip" data-placement="top" title='<?php echo __("Insert an emoji");?>
' >
        <i class="far fa-smile-wink fa-lg"></i>
      </span>
    </div> -->
          <div class="position-relative twitter-post-plus-div">
            <button type="button"
              class="btn-add-textarea btn btn-sm btn-success ml5 btn-antier-green btn-publisher twitter-post-plus-button">
              +
            </button>
          </div>
        </div>
      </div>
      <!-- publisher-message -->

      <!-- publisher-slider -->
      <div class="publisher-slider">
        <!-- post attachments -->
        <div class="publisher-attachments attachments clearfix x-hidden"></div>
        <!-- post attachments -->

        <!-- post album -->
        <div class="publisher-meta" id="album-publisher" data-meta="album">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"album",'width'=>"16px",'height'=>"16px"), 0, false);
?>
          <input type="text" id="album_meta" placeholder='<?php echo __("Album title");?>
' />
        </div>
        <!-- post album -->

        <!-- post feelings -->
        <div class="publisher-meta" data-meta="feelings">
          <div id="feelings-menu-toggle" data-init-text='<?php echo __("What are you doing?");?>
'>
            <?php echo __("What are you doing?");?>

          </div>
          <div id="feelings-data" style="display: none">
            <input type="text" class="no-icon" placeholder='<?php echo __("What are you doing?");?>
' />
            <span></span>
          </div>
          <div id="feelings-menu" class="dropdown-menu dropdown-widget">
            <div class="dropdown-widget-body ptb5">
              <div class="js_scroller">
                <ul class="feelings-list">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['feelings']->value, 'feeling');
$_smarty_tpl->tpl_vars['feeling']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['feeling']->value) {
$_smarty_tpl->tpl_vars['feeling']->do_else = false;
?>
                  <li class="feeling-item js_feelings-add" data-action="<?php echo $_smarty_tpl->tpl_vars['feeling']->value['action'];?>
"
                    data-placeholder="<?php echo __($_smarty_tpl->tpl_vars['feeling']->value['placeholder']);?>
">
                    <div class="icon">
                      <i class="twa twa-3x twa-<?php echo $_smarty_tpl->tpl_vars['feeling']->value['icon'];?>
"></i>
                    </div>
                    <div class="data"><?php echo __($_smarty_tpl->tpl_vars['feeling']->value['text']);?>
</div>
                  </li>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
              </div>
            </div>
          </div>
          <div id="feelings-types" class="dropdown-menu dropdown-widget">
            <div class="dropdown-widget-body ptb5">
              <div class="js_scroller">
                <ul class="feelings-list">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['feelings_types']->value, 'type');
$_smarty_tpl->tpl_vars['type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->do_else = false;
?>
                  <li class="feeling-item js_feelings-type" data-type="<?php echo $_smarty_tpl->tpl_vars['type']->value['action'];?>
" data-icon="<?php echo $_smarty_tpl->tpl_vars['type']->value['icon'];?>
">
                    <div class="icon">
                      <i class="twa twa-3x twa-<?php echo $_smarty_tpl->tpl_vars['type']->value['icon'];?>
"></i>
                    </div>
                    <div class="data"><?php echo __($_smarty_tpl->tpl_vars['type']->value['text']);?>
</div>
                  </li>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- post feelings -->

        <!-- post location -->
        <div class="publisher-meta" data-meta="location">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"map",'width'=>"16px",'height'=>"16px"), 0, true);
?>
          <input class="js_geocomplete" type="text" placeholder='<?php echo __("Where are you?");?>
' />
        </div>
        <!-- post location -->

        <!-- post colored -->
        <div class="publisher-meta" data-meta="colored">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['colored_patterns']->value, 'pattern');
$_smarty_tpl->tpl_vars['pattern']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pattern']->value) {
$_smarty_tpl->tpl_vars['pattern']->do_else = false;
?> <div class="colored-pattern-item
    js_publisher-pattern" data-id="<?php echo $_smarty_tpl->tpl_vars['pattern']->value['pattern_id'];?>
" data-type="<?php echo $_smarty_tpl->tpl_vars['pattern']->value['type'];?>
"
            data-background-image="<?php echo $_smarty_tpl->tpl_vars['pattern']->value['background_image'];?>
"
            data-background-color-1="<?php echo $_smarty_tpl->tpl_vars['pattern']->value['background_color_1'];?>
"
            data-background-color-2="<?php echo $_smarty_tpl->tpl_vars['pattern']->value['background_color_2'];?>
" data-text-color="<?php echo $_smarty_tpl->tpl_vars['pattern']->value['text_color'];?>
" <?php if ($_smarty_tpl->tpl_vars['pattern']->value['type'] == "color") {?> style="background-image: linear-gradient(45deg,
    <?php echo $_smarty_tpl->tpl_vars['pattern']->value['background_color_1'];?>
, <?php echo $_smarty_tpl->tpl_vars['pattern']->value['background_color_2'];?>
);" <?php } else { ?> style="background-image:
    url(<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['pattern']->value['background_image'];?>
)" <?php }?>>
          </div>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <!-- post colored -->

        <!-- post voice notes -->
        <div class="publisher-meta" data-meta="voice_notes">
          <div class="voice-recording-wrapper" data-handle="publisher">
            <!-- processing message -->
            <div class="x-hidden js_voice-processing-message">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"upload",'class'=>"static mr5",'width'=>"16px",'height'=>"16px"), 0, true);
?> <?php echo __("Processing");?>
<span class="loading-dots"></span>
            </div>
            <!-- processing message -->

            <!-- success message -->
            <div class="x-hidden js_voice-success-message">
              <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"static mr5",'width'=>"16px",'height'=>"16px"), 0, true);
?> <?php echo __("Voice note recorded successfully");?>

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
        <!-- post voice notes -->

        <!-- post gif -->
        <div class="publisher-meta" data-meta="gif">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"gif",'width'=>"16px",'height'=>"16px"), 0, true);
?>
          <input class="js_publisher-gif-search" type="text" placeholder='<?php echo __("Search GIFs");?>
' />
        </div>
        <!-- post gif -->

        <!-- post poll -->
        <div class="publisher-meta" data-meta="poll">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"plus",'width'=>"16px",'height'=>"16px"), 0, true);
?>
          <input type="text" placeholder='<?php echo __("Add an option");?>
...' />
        </div>
        <div class="publisher-meta" data-meta="poll">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"plus",'width'=>"16px",'height'=>"16px"), 0, true);
?>
          <input type="text" placeholder='<?php echo __("Add an option");?>
...' />
        </div>
        <!-- post poll -->

        <!-- post video -->
        <div class="publisher-meta" data-meta="video">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"static mr5",'width'=>"16px",'height'=>"16px"), 0, true);
?> <?php echo __("Video uploaded successfully");?>

          <div class="float-right">
            <button type="button" class="close js_publisher-attachment-file-remover" data-type="video">
              <span>&times;</span>
            </button>
          </div>
        </div>
        <div class="publisher-custom-thumbnail">
          <?php echo __("Custom Video Thumbnail");?>

          <div class="x-image">
            <button type="button" class="close x-hidden js_x-image-remover" title='<?php echo __("Remove");?>
'>
              <span>×</span>
            </button>
            <div class="x-image-loader">
              <div class="progress x-progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
            </div>
            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
            <input type="hidden" class="js_x-image-input" name="video_thumbnail" value="" />
          </div>
        </div>
        <!-- post video -->

        <!-- post audio -->
        <div class="publisher-meta" data-meta="audio">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"static mr5",'width'=>"16px",'height'=>"16px"), 0, true);
?> <?php echo __("Audio uploaded successfully");?>

          <div class="float-right">
            <button type="button" class="close js_publisher-attachment-file-remover" data-type="audio">
              <span>&times;</span>
            </button>
          </div>
        </div>
        <!-- post audio -->

        <!-- post file -->
        <div class="publisher-meta" data-meta="file">
          <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"checkmark",'class'=>"static mr5",'width'=>"16px",'height'=>"16px"), 0, true);
?> <?php echo __("File uploaded successfully");?>

          <div class="float-right">
            <button type="button" class="close js_publisher-attachment-file-remover" data-type="file">
              <span>&times;</span>
            </button>
          </div>
        </div>
        <!-- post file -->

        <!-- publisher scraper -->
        <!-- <div class="publisher-scraper"></div> -->
        <!-- publisher scraper -->

        <!-- publisher-tools-tabs -->
        <div class="publisher-tools-tabs" style="position: relative;">
          <span class="addPostText">Add to Your Post</span>
          <ul class="row publisher-tools-tabs-ul MainaddPostTabsUl publisher-tools-tabs-ul-newDesign">
            <?php if ($_smarty_tpl->tpl_vars['system']->value['photos_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="photos">
                <img class="blackIcon" alt="image" title="Upload Image"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/photo_message_iconHover.svg"
                  class="js_x-uploader" data-handle="publisher" data-multiple="true">
                <img class="BlueIcon js_x-uploader" alt="image" title="Upload Image"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/photo_message_icon.svg"
                  class="js_x-uploader" data-handle="publisher" data-multiple="true">
                <span class="class-publisher-text">Add Photo</span>
              </div>
            </li>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="album">
                <img class="BlueIcon" alt="image" title="Add Album"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addPostAlbumHover.svg">
                <img class="blackIcon" alt="image" title="Add Album"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addPostAlbum.svg">
                <span class="class-publisher-text">Add Album</span>
              </div>
            </li>
            <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['activity_posts_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags js_publisher-feelings">
              <div class="publisher-tools-tab ">
                <img class="BlueIcon" alt="image" title="Feelings/Activity"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/feelingsHover.svg">
                <img class="blackIcon" alt="image" title="Feelings/Activity"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/feelings.svg">
                <span class="class-publisher-text">Feelings/Activity</span>
              </div>
            </li>
            <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['colored_posts_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="colored">
                <img class="BlueIcon" alt="image" title="Colored Posts"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/coloredpostHover.svg">
                <img class="blackIcon" alt="image" title="Colored Posts"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/coloredpost.svg">
                <span class="class-publisher-text">Colored Posts</span>
              </div>

            </li>
            <?php }?>
          </ul>
          <ul
            class="row publisher-tools-tabs-ul MainaddPostTabsUl publisher-tools-tabs-ul-newDesign-stratus publisher-tools-tabs-ulDropDown">
            <?php if ($_smarty_tpl->tpl_vars['system']->value['photos_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="photos">
                <img class="blackIcon" alt="image" title="Upload Image"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/photo_message_iconHover.svg"
                  class="js_x-uploader" data-handle="publisher" data-multiple="true">
                <img class="BlueIcon js_x-uploader" alt="image" title="Upload Image"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/photo_message_icon.svg"
                  class="js_x-uploader" data-handle="publisher" data-multiple="true">
                <span class="class-publisher-text">Add Photo</span>
              </div>

            </li>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="album">
                <img class="BlueIcon" alt="image" title="Album"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addPostAlbumHover.svg">
                <img class="blackIcon" alt="image" title="Album"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addPostAlbum.svg">
                <span class="class-publisher-text">Add Album</span>
              </div>

            </li>
            <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['colored_posts_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="colored">
                <img class="BlueIcon" alt="image" title="Colored Posts"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addPostProductsHover.svg">
                <img class="blackIcon" alt="image" title="Colored Posts"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addPostProducts.svg">
                <span class="class-publisher-text">Colored Posts</span>
              </div>

            </li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['system']->value['geolocation_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="location">
                <img class="BlueIcon js_x-uploader" alt="Check In" title="Check In"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addpostLocationHover.svg">
                <img class="blackIcon" alt="Check In" title="Check In"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addpostLocation.svg">
                <span class="class-publisher-text">Check In</span>
              </div>

            </li>
            <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['voice_notes_posts_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="voice_notes">
                <img class="BlueIcon js_x-uploader" alt="Voice Notes" title="Voice Notes"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/voicenoteHover.svg">
                <img class="blackIcon" alt="Voice Notes" title="Voice Notes"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/voicenote.svg">
                <span class="class-publisher-text">Voice Notes</span>
              </div>

            </li>
            <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['gif_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab link js_publisher-tab" data-tab="product" data-toggle="modal"
                data-url="posts/product.php?do=create">
                <img class="BlueIcon" alt="Product" title="Product"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addPostProductsHover.svg">
                <img class="blackIcon" alt="Product" title="Product"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addPostProducts.svg">
                <span class="class-publisher-text">Product</span>
              </div>
            </li>
            <?php }?>
            <!-- <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_sell_products'] && $_smarty_tpl->tpl_vars['_handle']->value != "page" && $_smarty_tpl->tpl_vars['_handle']->value != "group" && $_smarty_tpl->tpl_vars['_handle']->value != "event") {?>
        <li class="MainaddPostTabs">
          <div class="publisher-tools-tab link js_publisher-tab" data-tab="product" data-toggle="modal"
            data-url="posts/product.php?do=create">
            <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"products",'class'=>"mr5",'width'=>"24px",'height'=>"24px"), 0, true);
?> <?php echo __("Sell Something");?>

          </div>
        </li>
        <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_write_articles'] && $_smarty_tpl->tpl_vars['_handle']->value != "page" && $_smarty_tpl->tpl_vars['_handle']->value != "group" && $_smarty_tpl->tpl_vars['_handle']->value != "event") {?>
            <li class="MainaddPostTabs uplodfileTags">
              <a class="publisher-tools-tab link js_publisher-tab" data-tab="article"
                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/new">
                <img class="BlueIcon js_x-uploader" alt="Blogs/News" title="Blogs/News"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/blogNewsHover.svg">
                <img class="blackIcon" alt="Blogs/News" title="Blogs/News"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/blogNews.svg">
              </a>
              <span class="class-publisher-text">Blogs/News</span>
            </li>
            <?php }?> -->
            <?php if ($_smarty_tpl->tpl_vars['system']->value['polls_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="poll">
                <img class="BlueIcon" alt="Poll" title="Poll"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addPostPollHover.svg">
                <img class="blackIcon" alt="Poll" title="Poll"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addPostPoll.svg">
                <span class="class-publisher-text">Poll</span>
              </div>

            </li>
            <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['activity_posts_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-feelings">
                <img class="BlueIcon" alt="image" title="Feelings/Activity"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/feelingsHover.svg">
                <img class="blackIcon" alt="image" title="Feelings/Activity"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/feelings.svg">
                <span class="class-publisher-text">Feelings/Activity</span>
              </div>

            </li>
            <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['videos_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="video">
                <img class="blackIcon" alt="video" title="Upload Video"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_video_iconHover.svg"
                  class="js_x-uploader" data-type="video" data-handle="publisher" data-multiple="true">
                <img class=" BlueIcon js_x-uploader" alt="video" title="Upload Video"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_video_icon.svg"
                  class="js_x-uploader" data-type="video" data-handle="publisher" data-multiple="true">
              </div>
              <span class="class-publisher-text">Video</span>
            </li>
            <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['audio_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="audio">
                <img class="blackIcon" alt="audio" title="Audio"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_voice_notesHover.svg"
                  class="js_x-uploader" data-handle="publisher" data-type="audio">
                <img class=" BlueIcon js_x-uploader" alt="audio" title="Audio"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/add_voice_notes.svg"
                  class="js_x-uploader" data-handle="publisher" data-type="audio">
              </div>
              <span class="class-publisher-text">Audio</span>
            </li>
            <?php }?> <?php if ($_smarty_tpl->tpl_vars['system']->value['file_enabled']) {?>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="file">
                <img class="BlueIcon js_x-uploader" alt="file" title="file"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/fileUplodeHover.svg"
                  class="js_x-uploader" data-handle="publisher" data-type="file">
                <img class="blackIcon" alt="file" title="file"
                  src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/fileUplode.svg"
                  class="js_x-uploader" data-handle="publisher" data-type="file">
              </div>
              <span class="class-publisher-text">file</span>
            </li>
            <?php }?>
          </ul>
          <a class="s-more" href="javascript:void(0)" id="add_post_show">
            <img alt="audio" title="See More"
              src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/addPostMenu.svg" />
          </a>
        </div>
        <!-- publisher-tools-tabs -->

        <!-- publisher-footer -->
        <div class="publisher-footer">
          <?php if ($_smarty_tpl->tpl_vars['system']->value['anonymous_mode'] && $_smarty_tpl->tpl_vars['_handle']->value == "me") {?>
          <div class="float-left">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input js_publisher-anonymous-toggle" name="is_anonymous"
                id="is_anonymous" />
              <label class="custom-control-label" for="is_anonymous">
                <span class="publisher-anonymous-lable"><i class="fa fa-user-secret fa-fw mr5"></i><?php echo __("Post As
                  Anonymous");?>
</span>
              </label>
            </div>
          </div>
          <?php }?>
          <!-- publisher-buttons -->

          <button type="button"
            class="btn btn-sm btn-success ml5 js_publisher btn-antier-green btn-publisher btn-share-style">
            <!-- <?php echo __("Post");?>
 -->
            Share
          </button>
          <!-- publisher-buttons -->
        </div>
        <!-- publisher-footer -->
      </div>
      <!-- publisher-slider -->
    </div>
  </div>
</div><?php }
}
