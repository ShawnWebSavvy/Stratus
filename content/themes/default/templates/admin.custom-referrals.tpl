
<div class="card">
    <div class="card-header with-icon">
        <i class="fa fa-user mr10"></i>Custom Referrals
        {if $sub_view == ""}
            <div class="card-header with-icon">
            <div class="float-right"> 
                <a href="{$system['system_url']}/{$control_panel['url']}/custom-referrals/add" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i><span class="ml5 d-none d-lg-inline-block">Add New Custom Referral</span>
                </a> 
            </div>                    
        </div>
        {/if}

        {if $sub_view == "edit"} &rsaquo; Edit{/if}
    </div>

    {if $sub_view == ""}
        
        <div class="card-body">
            <div class="mb20">
                <form class="form-inline" action="{$system['system_url']}/{$control_panel['url']}/custom-referrals/find" method="get">
                    <div class="form-group mb0">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search mr5"></i>{__("Search")}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="form-text small">
                    {__('Search by Username, Email')}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{__("ID")}</th>
                            <th>{__("Username")}</th>
                            <th>{__("Email")}</th>
                            <th>{__("Actions")}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if $rows}
                            {foreach $rows as $row}
                                <tr>
                                    <td><a href="javascript:;" target="_blank">{$row['id']}</a></td>
                                    
                                    <td>
                                        <a href="{$system['system_url']}/{$row['user_name']}" target="_blank">
                                            {$row['user_name']}
                                        </a>
                                    </td>
                                     <td>
                                        <a target="_blank">
                                            {$row['user_email']}
                                        </a>
                                    </td>
                                   
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title='{__("Edit")}' href="{$system['system_url']}/{$control_panel['url']}/custom-referrals/edit?custom_referral_id={$row['id']}" class="btn btn-sm btn-icon btn-rounded btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>  
                                         <button data-toggle="tooltip" data-placement="top" title='{__("Delete")}' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="custom_referral" data-id="{$row['id']}">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            {/foreach}
                        {else}
                            <tr>
                                <td colspan="6" class="text-center">
                                    {__("No data to show")}
                                </td>
                            </tr>
                        {/if}
                    </tbody>
                </table>
            </div>
            {$pager}
        </div>
    {elseif $sub_view == 'edit' }
        <div class="card-body">
           
            <div class="tab-content">
                <!-- account tab -->
                <div class="tab-pane active" id="account">
                    <form class="js_ajax-forms " data-url="admin/custom_referral.php?do=edit_custom_referral">
                        
                     
                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                Search User(By Email)
                            </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="email_id" placeholder="Enter email to search" readonly value="{$row['user_email']}">
                                    <input type="hidden" name="user_id" value="{$row['user_id']}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="form-table-row">
                            
                                <div class="gaps-2x"></div>
                                <div class="card-text ico-setting setting-token-referral">
                                    <div class="row">
                                      
                                        <div class="col-12">
                                            <div class="switch-content switch-to-referral">
                                                <h5 class="card-title-sm text-secondary">Custom Referral User <small class="ucap text-primary">(who referred)</small></h5>
                                                {if $COINS}
                                                <div class="sap sap-gap mt-3"></div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            {foreach $COINS as $key=>$opt}
                                                            <div class="col-lg-4 col-sm-8" id="referral-level{$opt[$key]}">
                                                                <div class="input-item input-with-label">
                                                                    <label class="form-control-label">{$opt['coin']|upper} - Bonus Offer</label>
                                                                    <div class="row guttar-10px">
                                                                        <div class="col-7">
                                                                            <div class="input-wrap">
                                                                                <select class="form-control" name="referral[{$key}][type]">
                                                                                    <option {if $opt['type'] == 'percent'} selected {/if} value="percent">Percent</option>
                                                                                    <option {if $opt['type'] == 'fixed'} selected {/if} value="fixed">Fixed</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <div class="input-wrap">
                                                                                <input type="number" class="form-control" min="0" name="referral[{$key}][amount]" value="{$opt['amount']}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                                                <span class="input-hint input-hint-lg"><span>&nbsp;&nbsp;</span></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-note">Set '{$opt['coin']|upper}' bonus amount for each time.</div>
                                                                </div>
                                                                <input type="hidden" name="referral[{$key}][coin]" value="{$opt['coin']}">
                                                            </div>
                                                            {/foreach}
                                                        </div>
                                                    </div>
                                                </div>
                                                {/if}
                                            </div>
                                        </div>                                    
                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary">{__("Save Changes")}</button>
                            </div>
                        </div>

                        <div class="alert alert-success mb0 mt20 x-hidden"></div>
                     
                        <div class="alert alert-danger mb0 mt20 x-hidden"></div>
                       
                    </form>
                </div>
              
            </div>
        </div>
         
    {elseif $sub_view == "add"}
        
        <div class="card-body">
           
            <div class="tab-content">
                <!-- account tab -->
                <div class="tab-pane active" id="account">
                    <form class="js_ajax-forms " data-url="admin/custom_referral.php?do=add_custom_referral">
                        
                     
                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                Search User(By Email)
                            </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="user_id" id="selectPage" placeholder="Enter email to search">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="form-table-row">
                            
                                <div class="gaps-2x"></div>
                                <div class="card-text ico-setting setting-token-referral">
                                    <div class="row">
                                      
                                        <div class="col-12">
                                            <div class="switch-content switch-to-referral">
                                                <h5 class="card-title-sm text-secondary">Custom Referral User <small class="ucap text-primary">(who referred)</small></h5>
                                                {if $COINS}
                                                <div class="sap sap-gap mt-3"></div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            {foreach $COINS as $key=>$opt}
                                                            <div class="col-lg-4 col-sm-8" id="referral-level{$opt[$key]}">
                                                                <div class="input-item input-with-label">
                                                                    <label class="form-control-label">{$opt['coin']|upper} - Bonus Offer</label>
                                                                    <div class="row guttar-10px">
                                                                        <div class="col-7">
                                                                            <div class="input-wrap">
                                                                                <select class="form-control" name="referral[{$key}][type]">
                                                                                    <option {if $opt['type'] == 'percent'} selected {/if} value="percent">Percent</option>
                                                                                    <option {if $opt['type'] == 'fixed'} selected {/if} value="fixed">Fixed</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <div class="input-wrap">
                                                                                <input type="number" class="form-control" min="0" name="referral[{$key}][amount]" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                                                                <span class="input-hint input-hint-lg"><span>&nbsp;&nbsp;</span></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-note">Set '{$opt['coin']|upper}' bonus amount for each time.</div>
                                                                </div>
                                                                <input type="hidden" name="referral[{$key}][coin]" value="{$opt['coin']}">
                                                            </div>
                                                            {/foreach}
                                                        </div>
                                                    </div>
                                                </div>
                                                {/if}
                                            </div>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                Activated
                            </label>
                            <div class="col-md-9">
                                <label class="switch" for="user_email_verified">
                                    <input type="checkbox" name="status" id="user_email_verified" {if $detail['investment_active']}checked{/if}>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div> -->

            
                        <div class="form-row">
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn btn-primary">{__("Save Changes")}</button>
                            </div>
                        </div>

                        <!-- success -->
                        <div class="alert alert-success mb0 mt20 x-hidden"></div>
                        <!-- success -->

                        <!-- error -->
                        <div class="alert alert-danger mb0 mt20 x-hidden"></div>
                        <!-- error -->
                    </form>
                </div>
              
                <!-- extra tab -->
            </div>
            <!-- tabs content -->
        </div>
    {else if $sub_view == "transactions" || $sub_view == "find"}
    <div class="card-body">

        {if $sub_view == "find"}
            <div class="mb20">
                <form class="form-inline" action="{$system['system_url']}/{$control_panel['url']}/custom-referrals/find" method="get">
                    <div class="form-group mb0">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search mr5"></i>{__("Search")}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="form-text small">
                    {__('Search by Username, Email')}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{__("ID")}</th>
                            <th>{__("Username")}</th>
                            <th>{__("Email")}</th>
                            <th>{__("Actions")}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if $rows}
                            {foreach $rows as $row}
                                <tr>
                                    <td><a href="javascript:;" target="_blank">{$row['id']}</a></td>
                                    
                                    <td>
                                        <a href="{$system['system_url']}/{$row['user_name']}" target="_blank">
                                            {$row['user_name']}
                                        </a>
                                    </td>
                                     <td>
                                        <a target="_blank">
                                            {$row['user_email']}
                                        </a>
                                    </td>
                                   
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title='{__("Edit")}' href="{$system['system_url']}/{$control_panel['url']}/custom-referrals/edit?custom_referral_id={$row['id']}" class="btn btn-sm btn-icon btn-rounded btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>  
                                        <button data-toggle="tooltip" data-placement="top" title='{__("Delete")}' class="btn btn-sm btn-icon btn-rounded btn-danger js_admin-deleter" data-handle="custom_referral" data-id="{$row['id']}">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            {/foreach}
                        {else}
                            <tr>
                                <td colspan="6" class="text-center">
                                    {__("No data to show")}
                                </td>
                            </tr>
                        {/if}
                    </tbody>
                </table>
            </div>
            {$pager}
        {/if}

      
        {/if}
</div>
