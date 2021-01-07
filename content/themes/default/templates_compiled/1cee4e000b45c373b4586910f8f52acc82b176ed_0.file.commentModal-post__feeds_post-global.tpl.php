<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 12:36:04
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/commentModal-post__feeds_post-global.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff45d34aad618_57906964',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cee4e000b45c373b4586910f8f52acc82b176ed' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/global-profile/commentModal-post__feeds_post-global.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:global-profile/commentModal-post__feeds_post.body.tpl' => 1,
    'file:__svg_icons.tpl' => 1,
    'file:global-profile/__feeds_post.comments.tpl' => 1,
  ),
),false)) {
function content_5ff45d34aad618_57906964 (Smarty_Internal_Template $_smarty_tpl) {
if (!$_smarty_tpl->tpl_vars['standalone']->value) {?><li class="feeds_post fsf" data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" post-type="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_type'];?>
"><?php }?>
    <!-- post -->
    <div class="post <?php if ($_smarty_tpl->tpl_vars['_get']->value == "posts_profile" && $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['post']->value['author_id'] && ($_smarty_tpl->tpl_vars['post']->value['is_hidden'] || $_smarty_tpl->tpl_vars['post']->value['is_anonymous'])) {?>is_hidden<?php }?> <?php if ($_smarty_tpl->tpl_vars['boosted']->value) {?>boosted<?php }?> <?php if (($_smarty_tpl->tpl_vars['post']->value['in_group'] && !$_smarty_tpl->tpl_vars['post']->value['group_approved']) || ($_smarty_tpl->tpl_vars['post']->value['in_event'] && !$_smarty_tpl->tpl_vars['post']->value['event_approved'])) {?>pending<?php }?> " data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">

        <?php if (($_smarty_tpl->tpl_vars['post']->value['in_group'] && !$_smarty_tpl->tpl_vars['post']->value['group_approved']) || ($_smarty_tpl->tpl_vars['post']->value['in_event'] && !$_smarty_tpl->tpl_vars['post']->value['event_approved'])) {?>
            <div class="pending-icon" data-toggle="tooltip" title="<?php echo __("Pending Post");?>
">
                <i class="fa fa-clock"></i>
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['standalone']->value && $_smarty_tpl->tpl_vars['pinned']->value) {?>
            <div class="pin-icon" data-toggle="tooltip" title="<?php echo __("Pinned Post");?>
">
                <i class="fa fa-bookmark"></i>
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['standalone']->value && $_smarty_tpl->tpl_vars['boosted']->value) {?>
            <div class="boosted-icon" data-toggle="tooltip" title="<?php echo __("Promoted");?>
">
                <img width="30px" height="30px" src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/Featured.svg">
            </div>
        <?php }?>

        <!-- memory post -->
        <?php if ($_smarty_tpl->tpl_vars['_get']->value == "memories") {?>
            <div class="post-memory-header">
                <span class="js_moment" data-time="<?php echo $_smarty_tpl->tpl_vars['post']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['time'];?>
</span>
            </div>
        <?php }?>
        <!-- memory post -->

        <!-- post body -->
        <div class="post-body">

            <!-- post top alert -->
            <?php if ($_smarty_tpl->tpl_vars['_get']->value == "posts_profile" && $_smarty_tpl->tpl_vars['user']->value->_data['user_id'] == $_smarty_tpl->tpl_vars['post']->value['author_id'] && ($_smarty_tpl->tpl_vars['post']->value['is_hidden'] || $_smarty_tpl->tpl_vars['post']->value['is_anonymous'])) {?>
                <div class="post-top-alert"><?php echo __("Only you can see this post");?>
</div>
            <?php }?>
            <!-- post top alert -->

            <?php $_smarty_tpl->_subTemplateRender('file:global-profile/commentModal-post__feeds_post.body.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_post'=>$_smarty_tpl->tpl_vars['post']->value,'_shared'=>false), 0, false);
?>

            <!-- post stats -->
            <div class="post-stats clearfix">

                <!-- video views -->
                <?php if ($_smarty_tpl->tpl_vars['post']->value['post_type'] == "video") {?>
                    <div style="display: inline-block;">
                        <span class="videoCountWrap">
                            <i class="fa fa-eye"></i> <?php echo $_smarty_tpl->tpl_vars['post']->value['video']['views'];?>

                        </span>
                    </div>
                <?php }?>
                <!-- video views -->

                <!-- audio views -->
                <?php if ($_smarty_tpl->tpl_vars['post']->value['post_type'] == "audio") {?>
                    <div style="display: inline-block;">
                        <span class="videoCountWrap">
                            <i class="fa fa-eye"></i> <?php echo $_smarty_tpl->tpl_vars['post']->value['audio']['views'];?>

                        </span>
                    </div>
                <?php }?>
                <!-- audio views -->

                <!-- comments & shares -->
                <span class="float-right">

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
     <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['_get']->value != "posts_information") {?>
     <div class="post-actions globalPostActions clearfix">
         <!-- comment -->
         <div class="action-btn js_comment post-comment-button-span-modal" parent-data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
             <!-- <div class="action-btn js_comment subPostAdd"> -->
            <div class="comment-btn-icon commentsButton " data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
                <!-- <div class="comment-btn-icon commentsButton " data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" data-post="<?php echo $_smarty_tpl->tpl_vars['post']->value['text'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_author_picture'];?>
" > -->
                 <span class="commentsIcon"></span>
             </div>
             <!-- <?php $_smarty_tpl->_subTemplateRender('file:__svg_icons.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('icon'=>"comment",'width'=>"16px",'height'=>"16px",'class'=>"mr5"), 0, false);
?> -->
             <span class="post-comment-button-span-modal" parent-data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['comments'];?>
</span>
         </div>
         <!-- comment -->

         <!-- retweet -->
         <div class="action-btn unselectable reactions-wrapper">
             <!-- reaction-btn -->
             <div class="reaction-btn">
             <div class="dropdown globalDropdown">
                 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <div class="retweet-btn-icon retweetButton ">
                         <span class="retweetIcon"></span>
                     </div>
                     <span id="retweetCount_<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" class="reaction-counting"><?php echo $_smarty_tpl->tpl_vars['post']->value['retweet'];?>
</span>
                 </button>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 <a class="dropdown-item" href="#">Repost</a>
                 <a class="dropdown-item" href="#">Quote Post</a>
                 </div>
             </div>
             </div>
             <!-- retweet-btn -->
         </div>
         <!-- retweet -->
         <!-- reactions -->
         <!-- reactions -->

                
         <div class="action-btn unselectable reactions-wrappers <?php if ($_smarty_tpl->tpl_vars['post']->value['i_react']) {?>js_unreact-post<?php }?> js_react-post"
         data-reaction="<?php if (!$_smarty_tpl->tpl_vars['post']->value['reaction']) {?>love<?php }?>" data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">
             <!-- reaction-btn -->
             <div class="reaction-btn">
                 <?php if (!$_smarty_tpl->tpl_vars['post']->value['i_react']) {?>
                 <div class="reaction-btn-icon unLikeButton">
                   <!-- unLikeButton -->
                   <span class="unLikeIcon"></span>
                 </div>
                 <?php } else { ?>
                 <div class="reaction-btn-icon likeButton">
                   <!-- likeButton -->
                   <span class="likeIcon"></span>
                 </div>
                 <?php }?>

                 <span class="reaction-counting"><?php echo $_smarty_tpl->tpl_vars['post']->value['reactions_total_count'];?>
</span>
                 
             </div>
             <!-- reaction-btn -->
         </div>
         <!-- reactions -->
         <!-- reactions -->

         <!-- share -->
         <?php if ($_smarty_tpl->tpl_vars['post']->value['privacy'] == "public") {?>
         <!-- <div class="action-btn global-profile-share" data-toggle="modal"
             data-url="posts/global-profile/share.php?do=create&post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
"> -->
         <div class="action-btn global-profile-share">
             
             <div class="dropdown globalDropdown">
                 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <div class="share-btn-icon sharesButton ">
                         <span class="sharesIcon"></span>
                     </div>
                     <span><?php echo $_smarty_tpl->tpl_vars['post']->value['shares'];?>
 </span>
                 </button>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                   <a class="dropdown-item" id="js_send_direct_message" href="javascript:void(0);" data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" data-userid="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_id'];?>
" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile-posts/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">Send via Direct Message</a>
                   <a class="dropdown-item js_bookmark-post" href="javascript:void(0);" data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
" data-userid="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_id'];?>
">Add Post to Bookmarks</a>
                         <a class="dropdown-item copy-btn" href="javascript:void(0);" data-clipboard-text="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile-posts/<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
">Copy link to Post</a>
                 </div>
               </div>
         </div>
         <?php }?>
         <!-- share -->
     </div>
     <?php }?>
     <!-- post actions -->

        </div>
        <!-- post body -->

        <!-- post footer -->
        <div class="post-footer 4343434 post-comment-content-div <?php if (!$_smarty_tpl->tpl_vars['standalone']->value) {?>x-hidden<?php }?>">
            <!-- comments -->
            <?php $_smarty_tpl->_subTemplateRender('file:global-profile/__feeds_post.comments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <!-- comments -->
        </div>
        <!-- post footer -->

        <!-- post approval -->
        <?php if (($_smarty_tpl->tpl_vars['post']->value['in_group'] && $_smarty_tpl->tpl_vars['post']->value['is_group_admin'] && !$_smarty_tpl->tpl_vars['post']->value['group_approved']) || ($_smarty_tpl->tpl_vars['post']->value['in_event'] && $_smarty_tpl->tpl_vars['post']->value['is_event_admin'] && !$_smarty_tpl->tpl_vars['post']->value['event_approved'])) {?>
            <div class="post-approval">
                <button class="btn btn-success btn-sm mr5 js_approve-post"><i class="fa fa-check mr5"></i><?php echo __("Approve");?>
</button>
                <button class="btn btn-danger btn-sm js_delete-post"><i class="fa fa-times mr5"></i><?php echo __("Decline");?>
</button>
            </div>
        <?php }?>
        <!-- post approval -->

    </div>
    <!-- post -->
<?php if (!$_smarty_tpl->tpl_vars['standalone']->value) {?></li><?php }
}
}
