<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-30 11:45:25
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_comment.text.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fec685515ab17_50044821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '183054638c3435c07cbbbc00e95015b05f9f9e76' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__feeds_comment.text.tpl',
      1 => 1609248087,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fec685515ab17_50044821 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="comment-replace 4334344343">
    <?php if ($_smarty_tpl->tpl_vars['_comment']->value['comment_post_id'] > 0) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/global-profile-posts/<?php echo $_smarty_tpl->tpl_vars['_comment']->value['comment_post_id'];?>
">
            <div class="comment-text js_readmore" dir="auto"><?php echo $_smarty_tpl->tpl_vars['_comment']->value['text'];?>
</div>
        </a>
    <?php } else { ?>
        <div class="comment-text js_readmore" dir="auto"><?php echo $_smarty_tpl->tpl_vars['_comment']->value['text'];?>
</div>
    <?php }?>
    <div class="comment-text-plain x-hidden"><?php echo $_smarty_tpl->tpl_vars['_comment']->value['text_plain'];?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['_comment']->value['image'] != '') {?>
        <span class="text-link js_lightbox-nodata" data-image="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_comment']->value['image'];?>
">
            <img alt="" class="img-fluid lazyload" data-src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_comment']->value['image'];?>
">
        </span>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['_comment']->value['voice_note'] != '') {?>
        <audio class="js_audio" id="audio-<?php echo $_smarty_tpl->tpl_vars['_comment']->value['comment_id'];?>
" controls preload="auto" style="width: 100%; min-width: 200px;">
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_comment']->value['voice_note'];?>
" type="audio/mpeg">
            <source src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/<?php echo $_smarty_tpl->tpl_vars['_comment']->value['voice_note'];?>
" type="audio/mp3">
            <?php echo __("Your browser does not support HTML5 audio");?>

        </audio>
    <?php }?>
</div>
<?php }
}
