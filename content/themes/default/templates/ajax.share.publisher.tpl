<div class="modal-header">
    <h6 class="modal-title">
        <i class="shareiconBtn mr5"></i>{__("Share")}
    </h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div> 
<form class="js_ajax-forms ajax-share-publisher" data-url="posts/share.php?do=publish&post_id={$post['post_id']}">
    <div class="modal-body">
        {if $system['social_share_enabled']}
            <div class="post-social-share sharing_stratus x-hidden" id="share_social_media_enable">
                <a href="http://www.facebook.com/sharer.php?u={$system['system_url']}/posts/{$post['post_id']}" class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                    <img width="20px" height="20px" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/fbIcons.svg">
                </a>
                <a href="https://twitter.com/intent/tweet?url={$system['system_url']}/posts/{$post['post_id']}" class="btn btn-sm btn-rounded btn-social-icon btn-rounded " target="_blank">
                    <!-- <i class="fab fa-twitter"></i> -->
                    <img width="20px" height="20px" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/twittericon.svg">
                </a>
                <a href="https://vk.com/share.php?url={$system['system_url']}/posts/{$post['post_id']}" class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                    <!-- <i class="fab fa-vk"></i> -->
                    <img width="20px" height="20px" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/vkIcon.svg">
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={$system['system_url']}/posts/{$post['post_id']}" class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                    <!-- <i class="fab fa-linkedin"></i> -->
                    <img width="20px" height="20px" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/inIcon.svg">
                </a>
                <a href="https://api.whatsapp.com/send?text={$system['system_url']}/posts/{$post['post_id']}" class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                    <!-- <i class="fab fa-whatsapp"></i> -->
                    <img width="20px" height="20px" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/watsapIcon.svg">
                </a>
                <a href="https://reddit.com/submit?url={$system['system_url']}/posts/{$post['post_id']}" class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                    <!-- <i class="fab fa-reddit"></i> -->
                    <img width="20px" height="20px" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/catIcon.svg">
                </a>
                <a href="https://pinterest.com/pin/create/button/?url={$system['system_url']}/posts/{$post['post_id']}" class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                    <!-- <i class="fab fa-pinterest"></i> -->
                    <img width="20px" height="20px" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/pintIcon.svg">
                </a>
            </div>
        {/if}

        <!-- <div class="h5 text-center">
           {* {__("Share the post to")} *}
        </div> -->

        <!-- share to options -->
        <div class=" text-center">
            <div id="share_timeline_enable" class="sharing_stratus x-hidden">
                <input class="x-hidden input-label" type="radio" name="share_to" id="share_to_timeline" value="timeline"/>
                <label class="button-label" for="share_to_timeline">
                    <div class="icon">
                        <!-- {include file='__svg_icons.tpl' icon="newsfeed" width="32px" height="32px"} -->
                        <img width="20px" height="20px" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/local_hubN.svg">
                    </div>
                    <div class="title">{__("Timeline")}</div>
                </label>
            </div>
            {if $system['pages_enabled'] && $pages}
                <div id="share_page_enable" class="sharing_stratus x-hidden">
                    <input class="x-hidden input-label" type="radio" name="share_to" id="share_to_page" value="page"/>
                    <label class="button-label" for="share_to_page">
                        <div class="icon">
                            <!-- {include file='__svg_icons.tpl' icon="pages" width="32px" height="32px"} -->
                            <img width="20px" height="20px" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/reading1.svg">
                        </div>
                        <div class="title">{__("Page")}</div>
                    </label>
                </div>
            {/if}
            {if $system['groups_enabled'] && $groups}
                <div id="share_group_enable" class="sharing_stratus x-hidden">
                    <input class="x-hidden input-label" type="radio" name="share_to" id="share_to_group" value="group"/>
                    <label class="button-label" for="share_to_group">
                        <div class="icon">
                            <!-- {include file='__svg_icons.tpl' icon="groups" width="32px" height="32px"} -->
                            <img width="20px" height="20px" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/newgroupIcon1.svg">
                        </div>
                        <div class="title">{__("Group")}</div>
                    </label>
                </div>
            {/if}
           
        </div>
        <!-- share to options -->

        <div id="js_share-to-page" class="sharing_stratus x-hidden">
            <div class="form-group">
                <label class="form-control-label">{__("Select Page")}</label>
                <select name="page" class="form-control">
                    {foreach $pages as $page}
                        <option value="{$page['page_id']}">{$page['page_title']}</option>
                    {/foreach}
                </select>
            </div>
        </div>
            
        <div id="js_share-to-group" class="sharing_stratus x-hidden">
            <div class="form-group">
                <label class="form-control-label">{__("Select Groups")}</label>
                <select name="group" class="form-control">
                    {foreach $groups as $group}
                        <option value="{$group['group_id']}">{$group['group_title']}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        <div id="share_post_enable" class="sharing_stratus x-hidden">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label">{__("Message")}</label>
                        <textarea name="message" rows="3" dir="auto" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <!-- error -->
        <div class="alert alert-danger mb0 x-hidden"></div>
        <!-- error -->
    </div>
    <div class="modal-footer">
        <button type="submit" id="stratus-sharebutton" class="btn btn-success js_publisher-btn js_publisher-product  btn-antier-green x-hidden">{__("Share")}</button>
    </div>
</form>

<script>
    /* share post */
    $('input[type=radio][name=share_to]').on('change', function() {
        switch ($(this).val()) {
            case 'timeline':
                $('#js_share-to-page').hide();
                $('#js_share-to-group').hide();
                break;
            case 'page':
                $('#js_share-to-page').fadeIn();
                $('#js_share-to-group').hide();
                break;
            case 'group':
                $('#js_share-to-page').hide();
                $('#js_share-to-group').fadeIn();
                break;
          }
    });
</script>