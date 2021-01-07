<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-29 09:10:50
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/blog-after-login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5feaf29a4beb24_97588662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fca50bf4be2c3ab7d57d79d3c2b626e27c7326f3' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/blog-after-login.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:__feeds_article.tpl' => 4,
    'file:_ads.tpl' => 2,
    'file:_widget.tpl' => 2,
    'file:__reaction_emojis.tpl' => 3,
    'file:__feeds_post.comments.tpl' => 1,
  ),
),false)) {
function content_5feaf29a4beb24_97588662 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>offcanvas<?php }?>">

    <div class="row <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>  <?php }?>">

        <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>
        <!-- content panel -->
        <div class="col-12 <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>offcanvas-mainbar<?php }?>">
            <div class="blogs-wrapper blogAftrLogin home-page-middel-block">
                <!-- add new article and My Article buttons-->
                <div class="add-new-product-section blogaddNewProduct">
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['can_write_articles']) {?>
                    <div class="float-right">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/new" class="btn btn-sm _cmn_btn btn-block post-tpl">
                            <img
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/filePlusIcon.svg">
                            <?php echo __("Add New Article");?>

                        </a>
                    </div>
                    <?php }?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/articles" class="btn btn-sm _cmn_btn btn-block ">
                        <img
                            src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/blogNews.svg">
                        <?php echo __("My Articles");?>

                    </a>
                </div>
                <!-- add new article and My Article buttons end-->

                <?php if ($_smarty_tpl->tpl_vars['articles']->value) {?>
                <ul class="row">
                    <!-- articles -->
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
$_smarty_tpl->tpl_vars['article']->iteration = 0;
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
$_smarty_tpl->tpl_vars['article']->iteration++;
$__foreach_article_0_saved = $_smarty_tpl->tpl_vars['article'];
?>
                    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_article.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"featured",'_iteration'=>$_smarty_tpl->tpl_vars['article']->iteration), 0, true);
?>
                    <?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <!-- articles -->
                </ul>

                <!-- see-more -->
                <div class="alert alert-post see-more js_see-more" data-get="articles">
                    <span><?php echo __("More Articles");?>
</span>
                    <div class="loader loader_small x-hidden"></div>
                </div>
                <!-- see-more -->
                <?php } else { ?>
                <!-- no articles -->
                <div class="text-center no_dataimg_ ">
                    <img width="100%"
                        src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results4.png">
                    <p class="mb10"><strong><?php echo __("No articles to show");?>
</strong></p>
                </div>
                <!-- no articles -->
                <?php }?>
            </div>
        </div>
        <!-- content panel -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "category") {?>
        <!-- content panel -->
        <div class="col-12 <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>offcanvas-mainbar<?php }?>">
            <div class="row">
                <!-- left panel -->
                <div class="home-page-middel-block mb20">
                    <?php if ($_smarty_tpl->tpl_vars['articles']->value) {?>
                    <ul>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
$_smarty_tpl->tpl_vars['article']->iteration = 0;
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
$_smarty_tpl->tpl_vars['article']->iteration++;
$__foreach_article_1_saved = $_smarty_tpl->tpl_vars['article'];
?>
                        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_article.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                        <?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>

                    <!-- see-more -->
                    <div class="alert alert-post see-more js_see-more" data-get="category_articles"
                        data-id="<?php echo $_smarty_tpl->tpl_vars['category_id']->value;?>
">
                        <span><?php echo __("More Articles");?>
</span>
                        <div class="loader loader_small x-hidden"></div>
                    </div>
                    <!-- see-more -->
                    <?php } else { ?>
                    <!-- no articles -->
                    <div class="text-center no_dataimg_ ">
                        <img width="100%"
                            src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/no_results4.png">
                        <p class="mb10"><strong><?php echo __("No articles to show");?>
</strong></p>
                    </div>
                    <!-- no articles -->
                    <?php }?>
                </div>
                <!-- left panel -->

                <!-- right panel -->
                <div class="home-page-middel-block">
                    <!-- add new article -->
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['user']->value->_data['can_write_articles']) {?>
                    <div class="mb10 d-none d-sm-block">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/new" class="btn btn-sm _cmn_btn btn-block">
                            <img
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/filePlusIcon.svg">
                            <?php echo __("Write New Article");?>

                        </a>
                    </div>
                    <?php }?>
                    <!-- add new article -->

                    <?php $_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                    <?php $_smarty_tpl->_subTemplateRender('file:_widget.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <!-- blogs categoris -->
                    <div class="articles-widget-header">
                        <div class="articles-widget-title"><?php echo __("Categories");?>
</div>
                    </div>

                    <ul class="article-categories clearfix">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['blogs_categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                        <li>
                            <a class="article-category"
                                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['category_url'];?>
">
                                <?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>

                            </a>
                        </li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <li>
                            <a class="article-category" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/category/0/Uncategorized">
                                <?php echo __("Uncategorized");?>

                            </a>
                        </li>
                    </ul>
                    <!-- blogs categoris -->

                    <!-- read more -->
                    <div class="articles-widget-header">
                        <div class="articles-widget-title"><?php echo __("Read More");?>
</div>
                    </div>

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['latest_articles']->value, 'article');
$_smarty_tpl->tpl_vars['article']->iteration = 0;
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
$_smarty_tpl->tpl_vars['article']->iteration++;
$__foreach_article_3_saved = $_smarty_tpl->tpl_vars['article'];
?>
                    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_article.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_small'=>true), 0, true);
?>
                    <?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_3_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <!-- read more -->
                </div>
                <!-- right panel -->
            </div>
        </div>
        <!-- content panel -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "article") {?>
        <!-- content panel -->
        <div class="col-12 <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>offcanvas-mainbar<?php }?>">
            <div class="row">
                <!-- left panel -->
                <div class="home-page-middel-block mb20">
                    <div class="article" data-id="<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
">
                        <div class="article-wrapper <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>pb10<?php }?>">
                            <!-- article category -->
                            <div class="mb10">
                                <a class="article-category"
                                    href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/category/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['category_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['category_url'];?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['article']->value['article']['category_name'];?>

                                </a>
                            </div>
                            <!-- article category -->

                            <!-- article title -->
                            <h3 style="word-break:break-word;"><?php echo $_smarty_tpl->tpl_vars['article']->value['article']['title'];?>
</h3>
                            <!-- article title -->

                            <!-- article meta -->
                            <div class="mb20 ctm_action_btn">
                                <div class="float-right">
                                    <?php if ($_smarty_tpl->tpl_vars['article']->value['manage_post']) {?>
                                    <a class="article-meta-counter unselectable"
                                        href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/edit/<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
">
                                        <div class="cmn_icn_styles">
                                            <img class="blackicon"
                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/edit_icon.svg">
                                            <img class="whiteicon"
                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/edit_icon_hover.svg">
                                        </div>
                                        <span> <?php echo __("Edit");?>
</span>
                                    </a>
                                    <a class="article-meta-counter unselectable js_delete-article" href="#"
                                        data-id="<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
">
                                        <div class="cmn_icn_styles">
                                            <img class="blackicon"
                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/delete_icon.svg">
                                            <img class="whiteicon"
                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/delete_icon_hover.svg">
                                        </div>
                                    </a>
                                    <?php }?>
                                    <a class="article-meta-counter unselectable" href="#article-comments">
                                        <div class="cmn_icn_styles">
                                            <img class="blackicon"
                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_messages.svg">
                                            <img class="whiteicon"
                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/nav_icon_nav_icon_messages_hover.svg">
                                        </div>
                                        <span> <?php echo $_smarty_tpl->tpl_vars['article']->value['comments'];?>
</span>
                                    </a>
                                    <div class="article-meta-counter unselectable">
                                        <div class="cmn_icn_styles">
                                            <img class="blackicon"
                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/eye-icon.svg">
                                            <img class="whiteicon"
                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/eye-icon_hover.svg">
                                        </div>
                                        <span> <?php echo $_smarty_tpl->tpl_vars['article']->value['article']['views'];?>
 </span>
                                    </div>
                                </div>

                                <div class="post-avatar">
                                    <a class="post-avatar-picture" href="<?php echo $_smarty_tpl->tpl_vars['article']->value['post_author_url'];?>
"
                                        style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['article']->value['post_author_picture'];?>
);">
                                    </a>
                                </div>
                                <div class="post-meta">
                                    <div>
                                        <!-- post author name -->
                                        <span class="js_user-popover" data-type="<?php echo $_smarty_tpl->tpl_vars['article']->value['user_type'];?>
"
                                            data-uid="<?php echo $_smarty_tpl->tpl_vars['article']->value['user_id'];?>
">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['article']->value['post_author_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['post_author_name'];?>
</a>
                                        </span>
                                        <?php if ($_smarty_tpl->tpl_vars['article']->value['post_author_verified']) {?>
                                        <?php if ($_smarty_tpl->tpl_vars['article']->value['user_type'] == "user") {?>
                                        <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified User");?>
'
                                            class="fa fa-check-circle fa-fw verified-badge"></i>
                                        <?php } else { ?>
                                        <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Verified Page");?>
'
                                            class="fa fa-check-circle fa-fw verified-badge"></i>
                                        <?php }?>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['article']->value['user_subscribed']) {?>
                                        <i data-toggle="tooltip" data-placement="top" title='<?php echo __("Pro User");?>
'
                                            class="fa fa-bolt fa-fw pro-badge"></i>
                                        <?php }?>
                                        <!-- post author name -->
                                    </div>
                                    <div class="post-time">
                                        <?php echo __("Posted");?>
 <span class="js_moment"
                                            data-time="<?php echo $_smarty_tpl->tpl_vars['article']->value['time'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['time'];?>
</span>
                                    </div>
                                </div>
                            </div>
                            <!-- article meta -->

                            <!-- social share -->
                            <div class="mb20">
                                <a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['title_url'];?>
"
                                    class="btn btn-sm btn-rounded btn-social-icon" target="_blank">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/fbIcons.svg"
                                        width="20px" height="20px">
                                </a>
                                <a href="https://twitter.com/intent/tweet?url=<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['title_url'];?>
"
                                    class="btn btn-sm btn-rounded btn-social-icon btn-rounded " target="_blank">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/twittericon.svg"
                                        width="20px" height="20px">
                                </a>
                                <a href="https://vk.com/share.php?url=<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['title_url'];?>
"
                                    class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/vkIcon.svg"
                                        width="20px" height="20px">
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['title_url'];?>
"
                                    class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/inIcon.svg"
                                        width="20px" height="20px">
                                </a>
                                <a href="https://api.whatsapp.com/send?text=<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['title_url'];?>
"
                                    class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/watsapIcon.svg"
                                        width="20px" height="20px">
                                </a>
                                <a href="https://reddit.com/submit?url=<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['title_url'];?>
"
                                    class="btn btn-sm btn-rounded btn-social-icon  " target="_blank">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/catIcon.svg"
                                        width="20px" height="20px">
                                </a>
                                <a href="https://pinterest.com/pin/create/button/?url=<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['title_url'];?>
"
                                    class="btn btn-sm btn-rounded btn-social-icon " target="_blank">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/svg/svgImg/pintIcon.svg"
                                        width="20px" height="20px">
                                </a>
                            </div>
                            <!-- social share -->

                            <!-- article cover -->
                            <?php if ($_smarty_tpl->tpl_vars['article']->value['article']['cover']) {?>
                            <div class="mb20">
                                <img class="img-fluid"
                                    src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['parsed_cover'];?>
">
                            </div>
                            <?php }?>
                            <!-- article cover -->

                            <!-- article text -->
                            <div class="article-text text-with-list" dir="auto">
                                <?php echo $_smarty_tpl->tpl_vars['article']->value['article']['parsed_text'];?>

                            </div>
                            <!-- article text -->

                            <!-- article tags -->
                            <?php if ($_smarty_tpl->tpl_vars['article']->value['article']['parsed_tags']) {?>
                            <div class="article-tags">
                                <ul>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value['article']['parsed_tags'], 'tag');
$_smarty_tpl->tpl_vars['tag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->do_else = false;
?>
                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/search/hashtag/<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
"
                                            class="blog-after-login"><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
</a>
                                    </li>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                            </div>
                            <?php }?>
                            <!-- article tags -->

                            <!-- post stats -->
                            <div class="post-stats clearfix">
                                <!-- reactions stats -->
                                <?php if ($_smarty_tpl->tpl_vars['article']->value['reactions_total_count'] > 0) {?>
                                <div class="float-left mr10" data-toggle="modal"
                                    data-url="posts/who_reacts.php?post_id=<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
">
                                    <div class="reactions-stats">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['article']->value['reactions'], 'reaction_count', false, 'reaction_type');
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
                                            <?php echo $_smarty_tpl->tpl_vars['article']->value['reactions_total_count'];?>

                                        </span>
                                        <!-- reactions count -->
                                    </div>
                                </div>
                                <?php }?>
                                <!-- reactions stats -->
                            </div>
                            <!-- post stats -->

                            <!-- post actions -->
                            <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in) {?>
                            <div class="post-actions clearfix">
                                <!-- reactions -->
                                <div class="action-btn unselectable reactions-wrapper <?php if ($_smarty_tpl->tpl_vars['article']->value['i_react']) {?>js_unreact-post<?php }?>"
                                    data-reaction="<?php echo $_smarty_tpl->tpl_vars['article']->value['i_reaction'];?>
">
                                    <!-- reaction-btn -->
                                    <div class="reaction-btn">
                                        <?php if (!$_smarty_tpl->tpl_vars['article']->value['i_react']) {?>
                                        <div class="reaction-btn-icon">
                                            <i class="icon-post icon_like"></i>
                                        </div>
                                        <span class="reaction-btn-name"><?php echo __("Like");?>
</span>
                                        <?php } else { ?>
                                        <div class="reaction-btn-icon">
                                            <div class="inline-emoji no_animation">
                                                <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['article']->value['i_reaction']), 0, true);
?>
                                            </div>
                                        </div>
                                        <span
                                            class="reaction-btn-name <?php echo $_smarty_tpl->tpl_vars['article']->value['i_reaction_details']['color'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['i_reaction_details']['title'];?>
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
$__foreach_reaction_6_saved = $_smarty_tpl->tpl_vars['reaction'];
?>
                                        <div class="reactions_item duration-<?php echo $_smarty_tpl->tpl_vars['reaction']->iteration;?>
 js_react-post"
                                            data-reaction="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['reaction'];?>
"
                                            data-reaction-color="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['color'];?>
"
                                            data-title="<?php echo $_smarty_tpl->tpl_vars['reaction']->value['title'];?>
">
                                            <?php $_smarty_tpl->_subTemplateRender('file:__reaction_emojis.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_reaction'=>$_smarty_tpl->tpl_vars['reaction']->value['reaction']), 0, true);
?>
                                        </div>
                                        <?php
$_smarty_tpl->tpl_vars['reaction'] = $__foreach_reaction_6_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </div>
                                    <!-- reactions-container -->
                                </div>
                                <!-- reactions -->

                                <!-- comment -->
                                <div class="action-btn js_comment <?php if ($_smarty_tpl->tpl_vars['article']->value['comments_disabled']) {?>x-hidden<?php }?>"
                                    parent-data-id="<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
">
                                    <i class="icon-post icon_comment"></i><span><?php echo __("Comment");?>
</span>
                                </div>
                                <!-- comment -->

                                <!-- share -->
                                <?php if ($_smarty_tpl->tpl_vars['article']->value['privacy'] == "public") {?>
                                                                <div class="_share_post_ dropdown">
                                    <div class="action-btn dropdown-toggle dropdown-toggle-share"
                                        id="stratus_post_<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
" parent-data-id="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_id'];?>
"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        data-url="posts/share.php?do=create&post_id=<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
">
                                        <i class="icon-post icon_share"></i>
                                        <span><?php echo __("Share");?>
</span>
                                    </div>
                                    <div class="_share-dropdown_ dropdown-menu fade"
                                        aria-labelledby="stratus_post_<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
" data-toggle="modal"
                                        data-url="posts/share.php?do=create&post_id=<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
">
                                        <div class="share_icon_list">
                                            <ul class="-list_items">
                                                <li class="stratus_local_share" id="share_timeline"><label
                                                        for="share_to_timeline"><span class="__list_icon"><img
                                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/share-timeline.svg"></span><span>Share
                                                            to Timeline</span></label>
                                                </li>

                                                <?php if ($_smarty_tpl->tpl_vars['system']->value['groups_enabled'] && count($_smarty_tpl->tpl_vars['groups']->value) > 0) {?>
                                                <li class="stratus_local_share" id="share_group"><label
                                                        for="share_to_group"><span class="__list_icon"> <img
                                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/share_grp.svg"></span><span>Share
                                                            to Group</span></label>
                                                </li>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['system']->value['pages_enabled'] && count($_smarty_tpl->tpl_vars['pages']->value) > 0) {?>
                                                <li class="stratus_local_share" id="share_page"><label
                                                        for="share_to_page"><span class="__list_icon"> <img
                                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/share-page.svg"></span><span>Share
                                                            to a Page </span></label>
                                                </li>
                                                <?php }?>
                                                <li class="stratus_local_share" id="share_post"><label
                                                        for="write_post"><span class="__list_icon"> <img
                                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/write-post.svg"></span><span>Write
                                                            post</span></label>
                                                </li>
                                                <?php if ($_smarty_tpl->tpl_vars['system']->value['social_share_enabled']) {?>
                                                <li class="stratus_local_share" id="share_social_media"><label
                                                        for="share_to_sm"><span class="__list_icon"><img
                                                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/share-sm.svg"></span><span>Share
                                                            to Social Media</span></label>
                                                </li>
                                                <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <?php }?>
                                <!-- share -->
                            </div>
                            <?php }?>
                            <!-- post actions -->
                        </div>

                        <!-- post footer -->
                        <div class="post-footer" id="article-comments">
                            <!-- comments -->
                            <?php $_smarty_tpl->_subTemplateRender('file:__feeds_post.comments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('post'=>$_smarty_tpl->tpl_vars['article']->value), 0, false);
?>
                            <!-- comments -->
                        </div>
                        <!-- post footer -->
                    </div>
                </div>
                <!-- left panel -->

                <!-- right panel -->
                <div class="home-page-middel-block">
                    <!-- add new article -->
                    <?php if ($_smarty_tpl->tpl_vars['user']->value->_logged_in && $_smarty_tpl->tpl_vars['user']->value->_data['can_write_articles']) {?>
                    <div class="mb10 d-none d-sm-block">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/new" class="btn btn-sm _cmn_btn btn-block">
                            <img
                                src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/<?php echo $_smarty_tpl->tpl_vars['system']->value['theme'];?>
/images/svg/svgImg/filePlusIcon.svg">
                            <?php echo __("Write New Article");?>

                        </a>
                    </div>
                    <?php }?>
                    <!-- add new article -->

                    <?php $_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                    <?php $_smarty_tpl->_subTemplateRender('file:_widget.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                    <!-- blogs categoris -->
                    <div class="articles-widget-header">
                        <div class="articles-widget-title"><?php echo __("Categories");?>
</div>
                    </div>
                    <ul class="article-categories clearfix">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['blogs_categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                        <li>
                            <a class="article-category"
                                href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['category']->value['category_url'];?>
">
                                <?php echo $_smarty_tpl->tpl_vars['category']->value['category_name'];?>

                            </a>
                        </li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <li>
                            <a class="article-category" href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/category/0/Uncategorized">
                                <?php echo __("Uncategorized");?>

                            </a>
                        </li>
                    </ul>
                    <!-- blogs categoris -->

                    <!-- read more -->
                    <div class="articles-widget-header">
                        <div class="articles-widget-title"><?php echo __("Read More");?>
</div>
                    </div>

                    <div class="blogPostSection">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['latest_articles']->value, 'article');
$_smarty_tpl->tpl_vars['article']->iteration = 0;
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
$_smarty_tpl->tpl_vars['article']->iteration++;
$__foreach_article_8_saved = $_smarty_tpl->tpl_vars['article'];
?>
                        <?php $_smarty_tpl->_subTemplateRender('file:__feeds_article.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_small'=>true), 0, true);
?>
                        <?php
$_smarty_tpl->tpl_vars['article'] = $__foreach_article_8_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>

                    <!-- read more -->
                </div>
                <!-- right panel -->
            </div>
        </div>
        <!-- content panel -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "edit") {?>



        <!-- content panel -->
        <div class="col-md-12 offcanvas-mainbar">
            <div class="row">
                <div class="home-page-middel-block">
                    <!-- content -->
                    <div class="card">
                        <div class="card-header with-icon">
                            <i class="fa fa-edit mr10"></i><?php echo __("Edit Article");?>

                            <div class="float-right">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/blogs/<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['title_url'];?>
"
                                    class="btn btn-sm btn-light">
                                    <i class="fa fa-arrow-circle-left mr5"></i><?php echo __("Go Back");?>

                                </a>
                            </div>
                        </div>
                        <div class="js_ajax-forms-html " data-url="posts/article.php?do=edit&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
">
                            <div class="card-body">
                                <div class="form-group form-row">
                                    <label class="col-md-2 form-control-label">
                                        <?php echo __("Cover");?>

                                    </label>
                                    <div class="col-md-10">
                                        <?php if ($_smarty_tpl->tpl_vars['article']->value['article']['cover'] == '') {?>
                                        <div class="x-image">
                                            <button type="button" class="close x-hidden js_x-image-remover"
                                                title='<?php echo __("Remove");?>
'>
                                                <span>×</span>
                                            </button>
                                            <div class="x-image-loader">
                                                <div class="progress x-progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                                            <input type="hidden" class="js_x-image-input" name="cover" value="">
                                        </div>
                                        <?php } else { ?>
                                        <div class="x-image"
                                            style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['cover'];?>
')">
                                            <button type="button" class="close js_x-image-remover"
                                                title='<?php echo __("Remove");?>
'>
                                                <span>×</span>
                                            </button>
                                            <div class="x-image-loader">
                                                <div class="progress x-progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                                            <input type="hidden" class="js_x-image-input" name="cover"
                                                value="<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['cover'];?>
">
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="col-md-2 form-control-label">
                                        <?php echo __("Category");?>

                                    </label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="category">
                                            <option><?php echo __("Select Category");?>
</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['blogs_categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['article']->value['article']['category_id'] == $_smarty_tpl->tpl_vars['category']->value['category_id']) {?>selected<?php }?>>
                                                <?php echo __($_smarty_tpl->tpl_vars['category']->value['category_name']);?>
</option>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="col-md-2 form-control-label">
                                        <?php echo __("Title");?>

                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="title" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['title'];?>
">
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="col-md-2 form-control-label">
                                        <?php echo __("Content");?>

                                    </label>
                                    <div class="col-md-10">
                                        <textarea name="text"
                                            class="form-control js_wysiwyg"><?php echo $_smarty_tpl->tpl_vars['article']->value['article']['text'];?>
</textarea>
                                    </div>
                                </div>

                                <div class="form-group form-row">
                                    <label class="col-md-2 form-control-label">
                                        <?php echo __("Tags");?>

                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="tags" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['article']['tags'];?>
">
                                    </div>
                                </div>

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" class="btn btn-danger js_delete-article"
                                    data-id="<?php echo $_smarty_tpl->tpl_vars['article']->value['post_id'];?>
">
                                    <i class="fa fa-trash mr5"></i><?php echo __("Delete Article");?>

                                </button>
                                <button type="submit" class="btn btn-primary publishBtn"><?php echo __("Publish");?>
</button>
                            </div>
                        </div>
                    </div>
                    <!-- content -->
                </div>
            </div>
        </div>
        <!-- content panel -->

        <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "new") {?>



        <!-- content panel -->
        <div class="col-md-12 offcanvas-mainbar">

            <div class="row">
                <div class="home-page-middel-block">
                    <!-- content -->
                    <div class="card">
                        <div class="card-header with-icon">
                            <i class="fa fa-edit mr10"></i>
                            <?php echo __("Write New Article");?>

                        </div>
                        <div class="js_ajax-forms-html" data-url="posts/article.php?do=create">
                            <div class="card-body">

                                <div class="form-group form-row">

                                    <div class="col-md-12">
                                        <label class="form-control-label">
                                            <?php echo __("Cover");?>

                                        </label>
                                        <div class="x-image">
                                            <button type="button" class="close x-hidden js_x-image-remover"
                                                title='<?php echo __("Remove");?>
'>
                                                <span>×</span>
                                            </button>
                                            <div class="x-image-loader">
                                                <div class="progress x-progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <i class="fa fa-camera fa-lg js_x-uploader" data-handle="x-image"></i>
                                            <input type="hidden" class="js_x-image-input" name="cover">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-row">

                                    <div class="col-12">
                                        <label class="form-control-label">
                                            <?php echo __("Category");?>

                                        </label>
                                        <select class="form-control" name="category">
                                            <option><?php echo __("Select Category");?>
</option>
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['blogs_categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['category_id'];?>
"><?php echo __($_smarty_tpl->tpl_vars['category']->value['category_name']);?>

                                            </option>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-row">

                                    <div class="col-md-12">
                                        <label class="form-control-label">
                                            <?php echo __("Title");?>

                                        </label>
                                        <input class="form-control" name="title">
                                    </div>
                                </div>

                                <div class="form-group form-row">

                                    <div class="col-md-12">
                                        <label class="form-control-label">
                                            <?php echo __("Content");?>

                                        </label>
                                        <textarea name="text" class="form-control js_wysiwyg"></textarea>
                                    </div>
                                </div>

                                <div class="form-group form-row">

                                    <div class="col-md-12">
                                        <label class=" form-control-label">
                                            <?php echo __("Tags");?>

                                        </label>
                                        <input class="form-control" name="tags">
                                    </div>
                                </div>

                                <!-- error -->
                                <div class="alert alert-danger mb0 x-hidden"></div>
                                <!-- error -->
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary publishBtn"><?php echo __("Publish");?>
</button>
                            </div>
                        </div>
                    </div>
                    <!-- content -->
                </div>
            </div>
        </div>
        <!-- content panel -->

        <?php }?>
    </div>
</div><?php }
}
