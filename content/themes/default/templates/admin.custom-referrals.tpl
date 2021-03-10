
<link rel="stylesheet" href="{$system['system_url']}/includes/assets/js/plugins/advanceSearch/selectSearch.min.css" type="text/css"> 
<!-- <script type="text/javascript" src="{$system['system_url']}/includes/assets/js/plugins/advanceSearch/selectmenu.min.js" ></script> -->

<div class="card">
    <div class="card-header with-icon">
        {if $sub_view == ""}
            <!-- <div class="float-right">
                <a href="{$system['system_url']}/{$control_panel['url']}/blacklist" class="btn btn-sm btn-danger">
                    <i class="fa fa-minus-circle"></i><span class="ml5 d-none d-lg-inline-block">{__("Custom Referrals")}</span>
                </a>
            </div> -->
        {/if}
        <i class="fa fa-user mr10"></i>Custom Referrals
        {if $sub_view != "" && $sub_view != "edit"} &rsaquo;{__($sub_view|capitalize)} {/if}
        {if $sub_view == "edit"} &rsaquo; Edit{/if}
    </div>

    {if $sub_view == ""}
        
        <div class="card-body">
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
                                        <a href="{$system_url}/{$row['user_name']}" target="_blank">
                                            {$row['user_name']}
                                        </a>
                                    </td>
                                     <td>
                                        <a href="javascript:;" target="_blank">
                                            {$row['user_email']}
                                        </a>
                                    </td>
                                   
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title='{__("Edit")}' href="{$system['system_url']}/{$control_panel['url']}/custom-referrals/edit?custom_referral_id={$row['id']}" class="btn btn-sm btn-icon btn-rounded btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>  
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

        {if $sub_view == "transactions" || $sub_view == "find"}
             <!-- search form -->
            <div class="mb20">
                <form class="form-inline" action="{$system['system_url']}/{$control_panel['url']}/investment/find" method="get">
                    <div class="form-group mb0">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query">
                            <input type="hidden" name="tnx_type" value="{$tnx_type}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search mr5"></i>{__("Search")}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="form-text small">
                    {__('Search by TNX ID')}
                </div>
            </div>
            <!-- search form -->
            <div class="container">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {if $tnx_type=='buy'  }active{/if}" href="{$system['system_url']}/{$control_panel['url']}/investment/transactions?tnx_type=buy">Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {if $tnx_type=='sell'  }active{/if}" href="{$system['system_url']}/{$control_panel['url']}/investment/transactions?tnx_type=sell">Sell</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link {if $tnx_type=='referral'  }active{/if}" href="{$system['system_url']}/{$control_panel['url']}/investment/transactions?tnx_type=referral">Referral</a>
                    </li>
                </ul>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{__("TRANX ID")}</th>
                            <th>{__("Order Type")}</th>
                            {if $tnx_type == 'buy'}
                                <th>{__("Trade Pair")}</th>
                                <th>{__("Token Added To")}</th>
                                <th>{__("Token")}</th>
                                <th>{__("Fees(%)")}</th>
                                <th>{__("Recieve Token")}</th>
                                <th>{__("Paid Amount")}</th>
                            {else if $tnx_type == 'sell'}
                                <th>{__("Trade Pair")}</th>
                                <th>{__("Token Added To")}</th>
                                <th>{__("Token")}</th>
                                <th>{__("Amount")}</th>
                                <th>{__("Fees(%)")}</th>
                                <th>{__("Recieve Amount")}</th>
                            {else}  
                                <th>{__("Amount Added To")}</th>
                                <th>{__("Amount")}</th>
                                <th>{__("From TRANX ID")}</th>
                                <th>{__("Referral Bonus For")}</th>
                                <th>{__("Bonus Apply")}</th>
                                <th>{__("Details")}</th>
                                
                            {/if}
                            <th>{__("Status")}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if $rows}
                            {foreach $rows as $key=>$row}
                                <tr>
                                    <td>
                                        {$row['order_id']}
                                    </td>
                                    <td>
                                        {$row['tnx_type']|ucfirst}
                                    </td>

                                    {if $tnx_type == 'buy'}
                                        <td>{$row['currency']|strtoupper}/USDT</td>
                                        <td><a href="{$system['system_url']}/{$row['user_name']}" target="_blank">{$row['user_name']}</a></td>
                                        <td>{$row['tokens']}</td>
                                        <td>{$row['fees']}</td>
                                        <td>{$row['recieve_token']}</td>
                                        <td>{$row['amount']}</td>
                                    {else if $tnx_type == 'sell'}
                                        <td>{$row['currency']|strtoupper}/USDT</td>
                                        <td><a href="{$system['system_url']}/{$row['user_name']}" target="_blank">{$row['user_name']}</a></td>
                                        <td>{$row['tokens']}</td>
                                        <td>{$row['amount']}</td>
                                        <td>{$row['fees']}</td>
                                        <td>{$row['receive_amount']}</td>
                                    {else}
                                        <td><a href="{$system['system_url']}/{$row['user_name']}" target="_blank">{$row['user_name']}</a></td>
                                        <!-- <td><a href="{$system['system_url']}/{$row['user_name']}" target="_blank">{$row['user_name']}</a></td> -->
                                        <td>${$row['amount']}</td>
                                        <td>{$row['extra']['order_id']}</td>
                                        <td><a href="{$system['system_url']}/{$row['refer_by']['user_name']}" target="_blank">{$row['refer_by']['user_name']}</a></td>
                                        <td>
                                            {if $row['extra']['calc']=='fixed'}
                                                ${$row['extra']['bonus']}({$row['extra']['calc']})
                                            {else}
                                                {$row['extra']['bonus']}%
                                            {/if}
                                            -
                                            {$row['extra']['level']|upper}
                                        </td>
                                        <td>{$row['details']}</td>
                                    {/if}

                                    <td>
                                        {if $row['status']=='completed'}
                                            <span class="badge badge-pill badge-lg badge-success">{__("Completed")}</span>
                                        {else}
                                            <span class="badge badge-pill badge-lg badge-danger">{__("Pending")}</span>
                                        {/if}
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
        {else if $sub_view == "dashboard" }
        <div class="card-body">
        <h4>Investment dashboard</h4>
        <div class="">
        <table class="table">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
        {/if}
</div>