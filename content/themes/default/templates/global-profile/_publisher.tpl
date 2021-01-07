<div class="publisher-overlay"></div>
<div class="custom_modal_style">
  <div class="x-form publisher globalpublishrmodalwidth" data-handle="{$_handle}" {if $_id}data-id="{$_id}" {/if}>
    <div class="modal-content">
      <!-- publisher loader -->
      <div class="publisher-loader">
        <div class="loader loader_small"></div>
      </div>
      <!-- publisher loader -->
      <div class="addpostHeadFocussed">
        <h2>Create Post</h2>
        <a class="addpost-closebtn" href="javascript:void(0)"><img
            src="{$system['system_url']}/content/themes/default/images/svg/svgImg/modelCross.svg"></a>
      </div>

      <!-- publisher-message -->
      <div class="publisher-message popup-publishBtn">
        <!-- <a class="addpost-closebtn" href="javascript:void(0)"><i class="fas fa-times-circle"></i></a> -->
        <div class="published_img_post">
          <div class="published_avatar-block">{if $_handle == "page"}
            <img class="publisher-avatar" src="{$page['page_picture']}" />
            {else}
            <img class="publisher-avatar sd" src="{$userGlobal->_data['global_user_picture']}" />
            {/if}
          </div>
          <div class="btn-popup-public" style="padding-left:10px;">
            <p>{$userGlobal->_data['user_firstname']} {$userGlobal->_data['user_lastname']}</p>
            <div class="btn-group js_publisher-privacy" data-toggle="tooltip" data-placement="top" data-value="public"
              title='{__("Shared with: Public")}' style="display:none;">
              <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown"
                data-display="static">
                <i class="btn-group-icon fa fa-globe mr10"></i><span class="btn-group-text">{__("Public")}</span>
              </button>

            </div>


          </div>

        </div>
        <input type="hidden" id="parent_post_id" name="parent_post_id" value="" />
        <div class="d-flex">
          <div class="globalPostFixes">
            <div class="colored-text-wrapper">
              <textarea maxlength="260" id="post_text" dir="auto" class="js_autosize js_mention js_publisher-scraper"
                data-init-placeholder='{__("What is your Stratus? @mention #hashtag")}'
                placeholder='{__("What is your Stratus? @mention #hashtag")}'>
{if $page == "share" && $url}{$url}{/if}</textarea>
            </div>
            <div class="divAppendTextarea">
              <input type="hidden" value="1" id="inputTextareaId" />
            </div>
          </div>
          <!-- <p class="postedinfo">134/290</p> -->
        </div>
        <div class="wrapFooterDiv wrapFootershowHide wrapFooterDiv-old">
          <ul class="small-icons">
            {if $system['photos_enabled']}
            <li class="">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="photos">
                <img alt="image" title="Upload Image"
                  src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/photo_message_icon.svg"
                  class="js_x-uploader" data-handle="publisher" data-multiple="true" />{__("Photos")}
              </div>
            </li>
            {/if}
            {if $system['videos_enabled']}
            <li class="uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="video">
                <img alt="video" title="Upload Video"
                  src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/add_video_icon.svg"
                  class="js_x-uploader" data-type="video" data-handle="publisher" data-multiple="true" />
              </div>
            </li>
            {/if}
            {if $system['polls_enabled']}
            <li class="uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="voice_notes">
                <img alt="voice_notes" title="Voice Notes"
                  src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/add_voice_notes.svg"
                  class="js_x-uploaders" data-handle="publisher" data-multiple="true" />
              </div>
            </li>
            {/if}
            {if $system['polls_enabled']}
            <li class="uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="poll">
                <img alt="poll" title="Poll Options"
                  src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/add_poll_icon.svg"
                  class="js_x-uploaders" data-handle="publisher" data-multiple="true" />
              </div>
            </li>
            {/if}
            <li class="add-message">
              <div class="s-more-function publisher-tools-tab js_publisher-tab" data-tab="s-more">
                <img
                  src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/add_message_icon.svg"
                  class="" data-handle="publisher" data-multiple="true" />
              </div>
            </li>
          </ul>
          <button type="button"
            class="btn btn-sm btn-success ml5 js_publisher btn-antier-green btn-publisher js_publisher_post_ant">
            <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/icons/btn_startIt.png"
              class="js_publisher_post_img" />
          </button>
        </div>
        <div class="publisher-emojis">
          <!-- <div class="position-relative">
      <span class="js_emoji-menu-toggle" data-toggle="tooltip" data-placement="top" title='{__("Insert an emoji")}' >
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
          {include file='__svg_icons.tpl' icon="album" width="16px" height="16px"}
          <input type="text" id="album_meta" placeholder='{__("Album title")}' />
        </div>
        <!-- post album -->

        <!-- post feelings -->
        <div class="publisher-meta" data-meta="feelings">
          <div id="feelings-menu-toggle" data-init-text='{__("What are you doing?")}'>
            {__("What are you doing?")}
          </div>
          <div id="feelings-data" style="display: none">
            <input type="text" class="no-icon" placeholder='{__("What are you doing?")}' />
            <span></span>
          </div>
          <div id="feelings-menu" class="dropdown-menu dropdown-widget">
            <div class="dropdown-widget-body ptb5">
              <div class="js_scroller">
                <ul class="feelings-list">
                  {foreach $feelings as $feeling}
                  <li class="feeling-item js_feelings-add" data-action="{$feeling['action']}"
                    data-placeholder="{__($feeling['placeholder'])}">
                    <div class="icon">
                      <i class="twa twa-3x twa-{$feeling['icon']}"></i>
                    </div>
                    <div class="data">{__($feeling['text'])}</div>
                  </li>
                  {/foreach}
                </ul>
              </div>
            </div>
          </div>
          <div id="feelings-types" class="dropdown-menu dropdown-widget">
            <div class="dropdown-widget-body ptb5">
              <div class="js_scroller">
                <ul class="feelings-list">
                  {foreach $feelings_types as $type}
                  <li class="feeling-item js_feelings-type" data-type="{$type['action']}" data-icon="{$type['icon']}">
                    <div class="icon">
                      <i class="twa twa-3x twa-{$type['icon']}"></i>
                    </div>
                    <div class="data">{__($type['text'])}</div>
                  </li>
                  {/foreach}
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- post feelings -->

        <!-- post location -->
        <div class="publisher-meta" data-meta="location">
          {include file='__svg_icons.tpl' icon="map" width="16px" height="16px"}
          <input class="js_geocomplete" type="text" placeholder='{__("Where are you?")}' />
        </div>
        <!-- post location -->

        <!-- post colored -->
        <div class="publisher-meta" data-meta="colored">
          {foreach $colored_patterns as $pattern} <div class="colored-pattern-item
    js_publisher-pattern" data-id="{$pattern['pattern_id']}" data-type="{$pattern['type']}"
            data-background-image="{$pattern['background_image']}"
            data-background-color-1="{$pattern['background_color_1']}"
            data-background-color-2="{$pattern['background_color_2']}" data-text-color="{$pattern['text_color']}" {if
            $pattern['type']=="color" } style="background-image: linear-gradient(45deg,
    {$pattern['background_color_1']}, {$pattern['background_color_2']});" {else} style="background-image:
    url({$system['system_uploads']}/{$pattern['background_image']})" {/if}>
          </div>
          {/foreach}
        </div>
        <!-- post colored -->

        <!-- post voice notes -->
        <div class="publisher-meta" data-meta="voice_notes">
          <div class="voice-recording-wrapper" data-handle="publisher">
            <!-- processing message -->
            <div class="x-hidden js_voice-processing-message">
              {include file='__svg_icons.tpl' icon="upload" class="static mr5"
              width="16px" height="16px"} {__("Processing")}<span class="loading-dots"></span>
            </div>
            <!-- processing message -->

            <!-- success message -->
            <div class="x-hidden js_voice-success-message">
              {include file='__svg_icons.tpl' icon="checkmark" class="static mr5"
              width="16px" height="16px"} {__("Voice note recorded successfully")}
              <div class="float-right">
                <button type="button" class="close js_voice-remove">
                  <span>&times;</span>
                </button>
              </div>
            </div>
            <!-- success message -->

            <!-- start recording -->
            <div class="btn-voice-start js_voice-start">
              <i class="fas fa-microphone mr5"></i>{__("Record")}
            </div>
            <!-- start recording -->

            <!-- stop recording -->
            <div class="btn-voice-stop js_voice-stop" style="display: none">
              <i class="far fa-stop-circle mr5"></i>{__("Recording")}
              <span class="js_voice-timer">00:00</span>
            </div>
            <!-- stop recording -->
          </div>
        </div>
        <!-- post voice notes -->

        <!-- post gif -->
        <div class="publisher-meta" data-meta="gif">
          {include file='__svg_icons.tpl' icon="gif" width="16px" height="16px"}
          <input class="js_publisher-gif-search" type="text" placeholder='{__("Search GIFs")}' />
        </div>
        <!-- post gif -->

        <!-- post poll -->
        <div class="publisher-meta" data-meta="poll">
          {include file='__svg_icons.tpl' icon="plus" width="16px" height="16px"}
          <input type="text" placeholder='{__("Add an option")}...' />
        </div>
        <div class="publisher-meta" data-meta="poll">
          {include file='__svg_icons.tpl' icon="plus" width="16px" height="16px"}
          <input type="text" placeholder='{__("Add an option")}...' />
        </div>
        <!-- post poll -->

        <!-- post video -->
        <div class="publisher-meta" data-meta="video">
          {include file='__svg_icons.tpl' icon="checkmark" class="static mr5"
          width="16px" height="16px"} {__("Video uploaded successfully")}
          <div class="float-right">
            <button type="button" class="close js_publisher-attachment-file-remover" data-type="video">
              <span>&times;</span>
            </button>
          </div>
        </div>
        <div class="publisher-custom-thumbnail">
          {__("Custom Video Thumbnail")}
          <div class="x-image">
            <button type="button" class="close x-hidden js_x-image-remover" title='{__("Remove")}'>
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
          {include file='__svg_icons.tpl' icon="checkmark" class="static mr5"
          width="16px" height="16px"} {__("Audio uploaded successfully")}
          <div class="float-right">
            <button type="button" class="close js_publisher-attachment-file-remover" data-type="audio">
              <span>&times;</span>
            </button>
          </div>
        </div>
        <!-- post audio -->

        <!-- post file -->
        <div class="publisher-meta" data-meta="file">
          {include file='__svg_icons.tpl' icon="checkmark" class="static mr5"
          width="16px" height="16px"} {__("File uploaded successfully")}
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
            {if $system['photos_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="photos">
                <img class="blackIcon" alt="image" title="Upload Image"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/photo_message_iconHover.svg"
                  class="js_x-uploader" data-handle="publisher" data-multiple="true">
                <img class="BlueIcon js_x-uploader" alt="image" title="Upload Image"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/photo_message_icon.svg"
                  class="js_x-uploader" data-handle="publisher" data-multiple="true">
                <span class="class-publisher-text">Add Photo</span>
              </div>
            </li>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="album">
                <img class="BlueIcon" alt="image" title="Add Album"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostAlbumHover.svg">
                <img class="blackIcon" alt="image" title="Add Album"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostAlbum.svg">
                <span class="class-publisher-text">Add Album</span>
              </div>
            </li>
            {/if} {if $system['activity_posts_enabled']}
            <li class="MainaddPostTabs uplodfileTags js_publisher-feelings">
              <div class="publisher-tools-tab ">
                <img class="BlueIcon" alt="image" title="Feelings/Activity"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/feelingsHover.svg">
                <img class="blackIcon" alt="image" title="Feelings/Activity"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/feelings.svg">
                <span class="class-publisher-text">Feelings/Activity</span>
              </div>
            </li>
            {/if} {if $system['colored_posts_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="colored">
                <img class="BlueIcon" alt="image" title="Colored Posts"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/coloredpostHover.svg">
                <img class="blackIcon" alt="image" title="Colored Posts"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/coloredpost.svg">
                <span class="class-publisher-text">Colored Posts</span>
              </div>

            </li>
            {/if}
          </ul>
          <ul
            class="row publisher-tools-tabs-ul MainaddPostTabsUl publisher-tools-tabs-ul-newDesign-stratus publisher-tools-tabs-ulDropDown">
            {if $system['photos_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="photos">
                <img class="blackIcon" alt="image" title="Upload Image"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/photo_message_iconHover.svg"
                  class="js_x-uploader" data-handle="publisher" data-multiple="true">
                <img class="BlueIcon js_x-uploader" alt="image" title="Upload Image"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/photo_message_icon.svg"
                  class="js_x-uploader" data-handle="publisher" data-multiple="true">
                <span class="class-publisher-text">Add Photo</span>
              </div>

            </li>
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="album">
                <img class="BlueIcon" alt="image" title="Album"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostAlbumHover.svg">
                <img class="blackIcon" alt="image" title="Album"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostAlbum.svg">
                <span class="class-publisher-text">Add Album</span>
              </div>

            </li>
            {/if} {if $system['colored_posts_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="colored">
                <img class="BlueIcon" alt="image" title="Colored Posts"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostProductsHover.svg">
                <img class="blackIcon" alt="image" title="Colored Posts"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostProducts.svg">
                <span class="class-publisher-text">Colored Posts</span>
              </div>

            </li>
            {/if}
            {if $system['geolocation_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="location">
                <img class="BlueIcon js_x-uploader" alt="Check In" title="Check In"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addpostLocationHover.svg">
                <img class="blackIcon" alt="Check In" title="Check In"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addpostLocation.svg">
                <span class="class-publisher-text">Check In</span>
              </div>

            </li>
            {/if} {if $system['voice_notes_posts_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="voice_notes">
                <img class="BlueIcon js_x-uploader" alt="Voice Notes" title="Voice Notes"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/voicenoteHover.svg">
                <img class="blackIcon" alt="Voice Notes" title="Voice Notes"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/voicenote.svg">
                <span class="class-publisher-text">Voice Notes</span>
              </div>

            </li>
            {/if} {if $system['gif_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab link js_publisher-tab" data-tab="product" data-toggle="modal"
                data-url="posts/product.php?do=create">
                <img class="BlueIcon" alt="Product" title="Product"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostProductsHover.svg">
                <img class="blackIcon" alt="Product" title="Product"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostProducts.svg">
                <span class="class-publisher-text">Product</span>
              </div>
            </li>
            {/if}
            <!-- {if $user->_data['can_sell_products'] && $_handle != "page" &&
        $_handle != "group" && $_handle != "event"}
        <li class="MainaddPostTabs">
          <div class="publisher-tools-tab link js_publisher-tab" data-tab="product" data-toggle="modal"
            data-url="posts/product.php?do=create">
            {include file='__svg_icons.tpl' icon="products" class="mr5" width="24px"
            height="24px"} {__("Sell Something")}
          </div>
        </li>
        {/if}
            {if $user->_data['can_write_articles'] && $_handle != "page" && $_handle !=
            "group" && $_handle != "event"}
            <li class="MainaddPostTabs uplodfileTags">
              <a class="publisher-tools-tab link js_publisher-tab" data-tab="article"
                href="{$system['system_url']}/blogs/new">
                <img class="BlueIcon js_x-uploader" alt="Blogs/News" title="Blogs/News"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/blogNewsHover.svg">
                <img class="blackIcon" alt="Blogs/News" title="Blogs/News"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/blogNews.svg">
              </a>
              <span class="class-publisher-text">Blogs/News</span>
            </li>
            {/if} -->
            {if $system['polls_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-tab" data-tab="poll">
                <img class="BlueIcon" alt="Poll" title="Poll"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostPollHover.svg">
                <img class="blackIcon" alt="Poll" title="Poll"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostPoll.svg">
                <span class="class-publisher-text">Poll</span>
              </div>

            </li>
            {/if} {if $system['activity_posts_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab js_publisher-feelings">
                <img class="BlueIcon" alt="image" title="Feelings/Activity"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/feelingsHover.svg">
                <img class="blackIcon" alt="image" title="Feelings/Activity"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/feelings.svg">
                <span class="class-publisher-text">Feelings/Activity</span>
              </div>

            </li>
            {/if} {if $system['videos_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="video">
                <img class="blackIcon" alt="video" title="Upload Video"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_video_iconHover.svg"
                  class="js_x-uploader" data-type="video" data-handle="publisher" data-multiple="true">
                <img class=" BlueIcon js_x-uploader" alt="video" title="Upload Video"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_video_icon.svg"
                  class="js_x-uploader" data-type="video" data-handle="publisher" data-multiple="true">
              </div>
              <span class="class-publisher-text">Video</span>
            </li>
            {/if} {if $system['audio_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="audio">
                <img class="blackIcon" alt="audio" title="Audio"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_voice_notesHover.svg"
                  class="js_x-uploader" data-handle="publisher" data-type="audio">
                <img class=" BlueIcon js_x-uploader" alt="audio" title="Audio"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/add_voice_notes.svg"
                  class="js_x-uploader" data-handle="publisher" data-type="audio">
              </div>
              <span class="class-publisher-text">Audio</span>
            </li>
            {/if} {if $system['file_enabled']}
            <li class="MainaddPostTabs uplodfileTags">
              <div class="publisher-tools-tab attach js_publisher-tab" data-tab="file">
                <img class="BlueIcon js_x-uploader" alt="file" title="file"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/fileUplodeHover.svg"
                  class="js_x-uploader" data-handle="publisher" data-type="file">
                <img class="blackIcon" alt="file" title="file"
                  src="{$system['system_url']}/content/themes/default/images/svg/svgImg/fileUplode.svg"
                  class="js_x-uploader" data-handle="publisher" data-type="file">
              </div>
              <span class="class-publisher-text">file</span>
            </li>
            {/if}
          </ul>
          <a class="s-more" href="javascript:void(0)" id="add_post_show">
            <img alt="audio" title="See More"
              src="{$system['system_url']}/content/themes/default/images/svg/svgImg/addPostMenu.svg" />
          </a>
        </div>
        <!-- publisher-tools-tabs -->

        <!-- publisher-footer -->
        <div class="publisher-footer">
          {if $system['anonymous_mode'] && $_handle == "me"}
          <div class="float-left">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input js_publisher-anonymous-toggle" name="is_anonymous"
                id="is_anonymous" />
              <label class="custom-control-label" for="is_anonymous">
                <span class="publisher-anonymous-lable"><i class="fa fa-user-secret fa-fw mr5"></i>{__("Post As
                  Anonymous")}</span>
              </label>
            </div>
          </div>
          {/if}
          <!-- publisher-buttons -->

          <button type="button"
            class="btn btn-sm btn-success ml5 js_publisher btn-antier-green btn-publisher btn-share-style">
            <!-- {__("Post")} -->
            Share
          </button>
          <!-- publisher-buttons -->
        </div>
        <!-- publisher-footer -->
      </div>
      <!-- publisher-slider -->
    </div>
  </div>
</div>