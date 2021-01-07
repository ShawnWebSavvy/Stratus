<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-07 07:53:37
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/__reaction_emojis.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff6be0120c1f4_10324558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a82054630169a1f6658db27c703a4aedbbe5f91e' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/__reaction_emojis.tpl',
      1 => 1610006001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff6be0120c1f4_10324558 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['_reaction']->value == "like") {?>

<!-- like -->
<div class="emoji emoji--like">
    <div class="emoji__hand">
        <div class="emoji__thumb"></div>
    </div>
</div>
<!-- like -->

<?php } elseif ($_smarty_tpl->tpl_vars['_reaction']->value == "love") {
if ($_smarty_tpl->tpl_vars['notification']->value['hub'] === "GlobalHub") {?>
<!-- love -->
<div class="reaction-btn">
    <div class="reaction-btn-icon likeButton">
        <span class="likeIcon"></span>
    </div>
</div>
<!-- love -->
<?php } else { ?>
<!-- love -->
<div class="emoji emoji--love">
    <lottie-player src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/emojis-icon/Heart_Eyes/JSON Files/Heart Eyes_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- love -->
<?php }?>

<?php } elseif ($_smarty_tpl->tpl_vars['_reaction']->value == "haha") {?>

<!-- haha -->
<div class="emoji emoji--haha">
    <lottie-player src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/emojis-icon/Laughing/JSON Files/Laughing_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- haha -->

<?php } elseif ($_smarty_tpl->tpl_vars['_reaction']->value == "yay") {?>

<!-- yay -->
<div class="emoji emoji--yay">
    <lottie-player src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/emojis-icon/Blushing/JSON Files/Blushing_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- yay -->

<?php } elseif ($_smarty_tpl->tpl_vars['_reaction']->value == "wow") {?>

<!-- wow -->
<div class="emoji emoji--wow">
    <lottie-player src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/emojis-icon/Shocked/JSON Files/Shocked_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- wow -->

<?php } elseif ($_smarty_tpl->tpl_vars['_reaction']->value == "sad") {?>

<!-- sad -->
<div class="emoji emoji--sad">
    <lottie-player src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/emojis-icon/Sad_Tear/JSON Files/Sad Tear_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- sad -->

<?php } elseif ($_smarty_tpl->tpl_vars['_reaction']->value == "angry") {?>

<!-- angry -->
<div class="emoji emoji--angry">
    <lottie-player src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_uploads'];?>
/emojis-icon/Angry/JSON Files/Angry_Shaded.json"
        background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
</div>
<!-- angry -->

<?php }
}
}
