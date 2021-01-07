<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-06 05:16:02
  from '/opt/lampp/htdocs/sngine/content/themes/default/templates/people.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff5479266bad9_48688474',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5294564f1a9018b63715ccfdbb765791283af9b' => 
    array (
      0 => '/opt/lampp/htdocs/sngine/content/themes/default/templates/people.tpl',
      1 => 1609222533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_head.tpl' => 1,
    'file:_header.tpl' => 1,
    'file:_sidebar.tpl' => 1,
    'file:__feeds_user.tpl' => 5,
    'file:_ads_campaigns.tpl' => 1,
    'file:_ads.tpl' => 1,
    'file:_widget.tpl' => 1,
    'file:_footer.tpl' => 1,
  ),
),false)) {
function content_5ff5479266bad9_48688474 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:_head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php $_smarty_tpl->_subTemplateRender('file:_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- page content -->
<div class="container mt20 offcanvas">
    <div class="row">
        <div class="sidebar-left-ant offcanvas-sidebar js_sticky-sidebar">
            <?php $_smarty_tpl->_subTemplateRender('file:_sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>

    <div class="row right-side-content-ant">
        <!-- content panel -->
        <div class="col-lg-12 offcanvas-mainbar">
            <!-- tabs -->
            <!-- <div class="content-tabs custom-tabs clearfix">
                <ul>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == '' || $_smarty_tpl->tpl_vars['view']->value == "find") {?>class="active" <?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people"><?php echo __("Discover");?>
</a>
                    </li>`  
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "friend_requests") {?>class="active" <?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/friend_requests">
                            <?php echo __("Friend Requests");?>

                            <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']) {?>
                            <span class="badge badge-lg badge-info ml5"><?php echo count($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']);?>
</span>
                            <?php }?>
                        </a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['view']->value == "sent_requests") {?>class="active" <?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/sent_requests">
                            <?php echo __("Sent Requests");?>

                            <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent']) {?>
                            <span
                                class="badge badge-lg badge-warning ml5"><?php echo count($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent']);?>
</span>
                            <?php }?>
                        </a>
                    </li>
                </ul>
            </div> -->
            <!-- tabs -->

            <!-- content -->
            <div class="row">


                <!-- right panel -->
                <div class="col-lg-9 col-md-8 people-friend-list-section __user_action_panel _frnd_rqst_sec">
                    <div class="page_topbar d-flex align-item-center justify-content-between position-relative">
                        <div class="_search_sec">
                            <form>
                                <div class="form-group d-flex align-items-center m-0 ">
                                    <label class="">Friends</label>
                                                                    </div>
                            </form>
                        </div>
                                                <button class="_toggle_btn" type="button"><i class="fas fa-ellipsis-v"></i> <i
                                class="fas fa-times"></i></button>
                    </div>
                    <div class="row<?php if ($_smarty_tpl->tpl_vars['view']->value == 'find') {?> _findfriendsdiv_<?php }?>">
                        <div class="col-lg-6 col-xl-4">
                            <div class="row">
                                <div class="card bg-transparent _user__data _request_sec">

                                    <?php if ($_smarty_tpl->tpl_vars['view']->value == '') {?>
                                    <div class="card-header bg-transparent">
                                        <strong><?php echo __("People You May Know");?>
</strong>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($_smarty_tpl->tpl_vars['people']->value) {?>
                                        <ul class="requstSectionwrap mainFullWidthWrap">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?> <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"add"), 0, true);
?> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </ul>

                                        <!-- see-more -->
                                        <?php if (count($_smarty_tpl->tpl_vars['people']->value) >= $_smarty_tpl->tpl_vars['system']->value['min_results']) {?>
                                        <div class="alert alert-info see-more js_see-more" data-get="new_people">
                                            <span><?php echo __("Load More");?>
</span>
                                            <div class="loader loader_small x-hidden"></div>
                                        </div>
                                        <?php }?>
                                        <!-- see-more -->
                                        <?php } else { ?>
                                        <p class="text-center text-muted">
                                            <?php echo __("No people available");?>

                                        </p>
                                        <?php }?>
                                    </div>

                                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "find") {?>
                                    <div class="card-header bg-transparent">
                                        <strong><?php echo __("Search Results");?>
</strong>
                                    </div>
                                    <div class="card-body ">
                                        <?php if (count($_smarty_tpl->tpl_vars['people']->value) > 0) {?>
                                        <ul class="requstSectionwrap mainWrapSectionFullWidth">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?> <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>$_smarty_tpl->tpl_vars['_user']->value['connection']), 0, true);
?> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </ul>
                                        <?php } else { ?>
                                        <p class="text-center text-muted">
                                            <?php echo __("No people available for your search");?>

                                        </p>
                                        <?php }?>
                                    </div>

                                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "friend_requests") {?>
                                    <div class="card-header bg-transparent">
                                        <h3> <strong><?php echo __("Friend Request");?>

                                                                                            </strong></h3>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']) {?>
                                        <ul class="requstSectionwrap">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['friend_requests'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?> <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"request"), 0, true);
?> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </ul>
                                        <?php } else { ?>
                                        <p class="text-center text-muted">
                                            <?php echo __("No new requests");?>

                                        </p>
                                        <?php }?>

                                        <!-- see-more -->
                                        <?php if (count($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests']) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
                                        <div class="alert alert-info see-more js_see-more" data-get="friend_requests">
                                            <span><?php echo __("Load More");?>
</span>
                                            <div class="loader loader_small x-hidden"></div>
                                        </div>
                                        <?php }?>
                                        <!-- see-more -->
                                    </div>

                                    <?php } elseif ($_smarty_tpl->tpl_vars['view']->value == "sent_requests") {?>
                                    <div class="card-header bg-transparent">
                                        <strong><?php echo __("Friend Requests Sent");?>
</strong>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent']) {?>
                                        <ul class="requstSectionwrap">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?> <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"cancel"), 0, true);
?> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </ul>
                                        <?php } else { ?>
                                        <p class="text-center text-muted">
                                            <?php echo __("No new requests");?>

                                        </p>
                                        <?php }?>

                                        <!-- see-more -->
                                        <?php if (count($_smarty_tpl->tpl_vars['user']->value->_data['friend_requests_sent']) >= $_smarty_tpl->tpl_vars['system']->value['max_results']) {?>
                                        <div class="alert alert-info see-more js_see-more"
                                            data-get="friend_requests_sent">
                                            <span><?php echo __("Load More");?>
</span>
                                            <div class="loader loader_small x-hidden"></div>
                                        </div>
                                        <?php }?>
                                        <!-- see-more -->
                                    </div>

                                    <?php }?>

                                </div>
                            </div>
                        </div>
                                                <div class="col-lg-6 col-xl-8 frndz_list_data">
                            <div class="card bg-transparent _user__data friend_list_panel">
                                <div class="card-header bg-transparent">
                                    <h3> <strong><?php echo __("Friend List");?>

                                                                                    </strong></h3>
                                </div>
                            </div>
                            <div class="_friend_list_items _user__data">
                                <?php if ($_smarty_tpl->tpl_vars['user']->value->_data['friends']) {?>
                                <ul class="d-flex">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['user']->value->_data['friends'], '_user');
$_smarty_tpl->tpl_vars['_user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['_user']->value) {
$_smarty_tpl->tpl_vars['_user']->do_else = false;
?>
                                    <?php $_smarty_tpl->_subTemplateRender('file:__feeds_user.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('_tpl'=>"list",'_connection'=>"remove"), 0, true);
?> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </ul>
                                <!-- see-more -->

                                <div class="alert alert-info see-more js_see-more" data-uid="<?php echo $_smarty_tpl->tpl_vars['user']->value->_data['user_id'];?>
"
                                    data-get="friends">
                                    <span><?php echo __("Load More");?>
</span>
                                    <div class="loader loader_small x-hidden"></div>
                                </div>

                                <!-- see-more -->
                                <?php } else { ?>
                                <div class="__no_data_contet__ text-center">
                                    <p class="text-center text-muted">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/no_results16.jpg"
                                            style="width: 100%;" alt="No friends">
                                    <h2 class="text-center _heading1_"> You don't have any friends yet</h2>
                                    <!--  -->
                                    </p>
                                </div>
                                <?php }?>
                                                            </div>
                        </div>
                                            </div>
                </div>
                <!-- right panel -->

                <!-- left panel -->
                <div class="col-lg-3 col-md-4 people-form-section discover_sec">
                    <!-- search panel -->
                    <div class="card">
                        <div class="close_icons"><i class="fas fa-times"></i></div>
                        <div class="card-header sec-heading bg-transparent">
                            <strong>Discover</strong>
                            <!-- <i class="fa fa-search mr5"></i><?php echo __("Search");?>
 -->
                        </div>
                        <div class="card-body">
                            <form action="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/people/find" method="post">
                                <div class="form-group" <?php echo $_smarty_tpl->tpl_vars['system']->value['system_distance'];?>
>
                                    <label><?php echo __("Distance");?>
</label>
                                    <div>
                                        <input type="range" class="custom-range" min="1" max="5000"
                                            value="<?php echo $_smarty_tpl->tpl_vars['distance_value']->value;?>
" name="distance_slider"
                                            oninput="this.form.distance_value.value=this.value">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><?php if ($_smarty_tpl->tpl_vars['system']->value['system_distance'] == "mile") {
echo __("MI");
} else {
echo __("KM");
}?></span>
                                            </div>
                                            <input type="number" class="form-control" min="1" max="5000"
                                                value="<?php echo $_smarty_tpl->tpl_vars['distance_value']->value;?>
" name="distance_value"
                                                oninput="this.form.distance_slider.value=this.value">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo __("Keyword");?>
</label>
                                    <input type="text" class="form-control" name="query" value="<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
">
                                </div>
                                <div class="form-group">
                                    <label><?php echo __("Gender");?>
</label>
                                    <select class="form-control" name="gender">
                                        <option value="any"><?php echo __("Any");?>
</option>
                                        <option value="male"><?php echo __("Male");?>
</option>
                                        <option value="female"><?php echo __("Female");?>
</option>
                                        <option value="other"><?php echo __("Other");?>
</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?php echo __("Relationship");?>
</label>
                                    <select class="form-control" name="relationship">
                                        <option value="any" <?php if ($_smarty_tpl->tpl_vars['relationship']->value == 'any') {?>selected<?php }?>><?php echo __("Any");?>
</option>
                                        <option value="single" <?php if ($_smarty_tpl->tpl_vars['relationship']->value == 'single') {?>selected<?php }?>><?php echo __("Single");?>

                                        </option>
                                        <option value="relationship" <?php if ($_smarty_tpl->tpl_vars['relationship']->value == 'relationship') {?>selected<?php }?>>
                                            <?php echo __("In a relationship");?>
</option>
                                        <option value="married" <?php if ($_smarty_tpl->tpl_vars['relationship']->value == 'married') {?>selected<?php }?>>
                                            <?php echo __("Married");?>
</option>
                                        <option value="complicated" <?php if ($_smarty_tpl->tpl_vars['relationship']->value == 'complicated') {?>selected<?php }?>>
                                            <?php echo __("It's complicated");?>
</option>
                                        <option value="separated" <?php if ($_smarty_tpl->tpl_vars['relationship']->value == 'separated') {?>selected<?php }?>>
                                            <?php echo __("Separated");?>
</option>
                                        <option value="divorced" <?php if ($_smarty_tpl->tpl_vars['relationship']->value == 'divorced') {?>selected<?php }?>>
                                            <?php echo __("Divorced");?>
</option>
                                        <option value="widowed" <?php if ($_smarty_tpl->tpl_vars['relationship']->value == 'widowed') {?>selected<?php }?>>
                                            <?php echo __("Widowed");?>
</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><?php echo __("Online Status");?>
</label>
                                    <select class="form-control" name="status">
                                        <option value="any"><?php echo __("Any");?>
</option>
                                        <option value="online"><?php echo __("Online");?>
</option>
                                        <option value="offline"><?php echo __("Offline");?>
</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn friendsSearchbtn _cmn_btn " name="submit"><span
                                        class="search-input-icon"> <img
                                            src="<?php echo $_smarty_tpl->tpl_vars['system']->value['system_url'];?>
/content/themes/default/images/Search2.svg"
                                            alt="search icon">
                                    </span><?php echo __("Search");?>
</button>
                            </form>
                        </div>

                    </div>
                    <!-- search panel -->

                    <?php $_smarty_tpl->_subTemplateRender('file:_ads_campaigns.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php $_smarty_tpl->_subTemplateRender('file:_ads.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php $_smarty_tpl->_subTemplateRender('file:_widget.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>
                <!-- left panel -->
            </div>
            <!-- content -->

        </div>
        <!-- content panel -->

    </div>
</div>
<!-- page content -->

<?php $_smarty_tpl->_subTemplateRender('file:_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
