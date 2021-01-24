<div class="card">
    <div class="card-header with-icon">
        {if $sub_view == "exchanges"}
            <!-- <div class="float-right">
                <a href="{$system['system_url']}/{$control_panel['url']}/blacklist" class="btn btn-sm btn-danger">
                    <i class="fa fa-minus-circle"></i><span class="ml5 d-none d-lg-inline-block">{__("Manage Banned IPs")}</span>
                </a>
            </div> -->
        {elseif $sub_view == "find"}
            <div class="float-right">
                <a href="{$system['system_url']}/{$control_panel['url']}/users" class="btn btn-sm btn-light">
                    <i class="fa fa-arrow-circle-left mr5"></i>{__("Go Back")}
                </a>
            </div>
        {elseif $sub_view == "edit"}
            <div class="float-right">
                <a href="{$system['system_url']}/{$control_panel['url']}/users" class="btn btn-sm btn-light">
                    <i class="fa fa-arrow-circle-left"></i><span class="ml5 d-none d-lg-inline-block">{__("Go Back")}</span>
                </a>
                <a target="_blank" href="{$system['system_url']}/{$data['user_name']}" class="btn btn-sm btn-info">
                        <img  width="30px" height="30px" src="{$system['system_url']}/content/themes/default/images/svg/svgImg/eye-icon.svg"/>
                    <span class="ml5 d-none d-lg-inline-block">{__("View Profile")}</span>
                </a>
                <button type="button" class="btn btn-sm btn-danger js_admin-deleter" data-handle="user_posts" data-id="{$data['user_id']}">
                    <i class="fa fa-trash-alt"></i><span class="ml5 d-none d-lg-inline-block">{__("Delete All Posts")}</span>
                </button>
            </div>
        {/if}
        <i class="fa fa-user mr10"></i>Investment
        {if $sub_view != "" && $sub_view != "edit"} &rsaquo; {__($sub_view|capitalize)}{/if}
        {if $sub_view == "exchange"} &rsaquo; Edit{/if}
    </div>

    {if $sub_view == "" || $sub_view == "exchanges"}
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{__("ID")}</th>
                            <th>{__("Name")}</th>
                            <th>API Token</th>
                            <th>{__("Activated")}</th>
                            <th>{__("Actions")}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if $exchanges}
                            {foreach $exchanges as $row}
                                <tr>
                                    <td><a href="javascript:;" target="_blank">{$row['id']}</a></td>
                                    
                                    <td>
                                        <a href="javascript:;" target="_blank">
                                            {$row['name']}
                                        </a>
                                    </td>
                                    <td>{$row['api_token']}</td>
                                    <td>
                                        {if $row['is_active']}
                                            <span class="badge badge-pill badge-lg badge-success">{__("Yes")}</span>
                                        {else}
                                            <span class="badge badge-pill badge-lg badge-danger">{__("No")}</span>
                                        {/if}
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="top" title='{__("Edit")}' href="{$system['system_url']}/{$control_panel['url']}/investment/exchange?edit={$row['id']}&exchange={$row['name']}" class="btn btn-sm btn-icon btn-rounded btn-primary">
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

    {elseif $sub_view == "exchange"}
        
        <div class="card-body">
           

            <!-- tabs nav -->
           
            <!-- tabs nav -->

            <!-- tabs content -->
            <div class="tab-content">
                <!-- account tab -->
                <div class="tab-pane active" id="account">
                    <form class="js_ajax-forms " data-url="admin/investment.php?id={$exchange_id}&do=edit_exchange">
                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                Exchange Name
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                   <label class="col-md-3 form-control-label">{$exchange_name}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                Markup Price(%)
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="markup_price" value="{$detail[0]['markup_price']}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                Markdown Price(%)
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="markdown_price" value="{$detail[0]['markdown_price']}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                Fees(%)
                            </label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="fees" value="{$detail[0]['fees']}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label class="col-md-3 form-control-label">
                                Activated
                            </label>
                            <div class="col-md-9">
                                <label class="switch" for="user_email_verified">
                                    <input type="checkbox" name="status" id="user_email_verified" {if $detail[0]['investment_active']}checked{/if}>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

            
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
                </ul>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{__("TRANX ID")}</th>
                            <th>{__("Order Type")}</th>
                            <th>{__("Trade Pair")}</th>
                            {if $tnx_type == 'buy'}
                            <th>{__("Token")}</th>
                            <th>{__("Fees(%)")}</th>
                            <th>{__("Recieve Token")}</th>
                            <th>{__("Paid Amount")}</th>
                            {else}
                            <th>{__("Token")}</th>
                            <th>{__("Amount")}</th>
                            <th>{__("Fees(%)")}</th>
                            <th>{__("Recieve Amount")}</th>
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
                                    <td>{$row['currency']|strtoupper}/USDT</td>
                                    {if $tnx_type == 'buy'}
                                    <td>{$row['tokens']}</td>
                                    <td>{$row['fees']}</td>
                                    <td>{$row['recieve_token']}</td>
                                    <td>{$row['amount']}</td>
                                    {else}
                                    <td>{$row['tokens']}</td>
                                    <td>{$row['amount']}</td>
                                    <td>{$row['fees']}</td>
                                    <td>{$row['receive_amount']}</td>
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