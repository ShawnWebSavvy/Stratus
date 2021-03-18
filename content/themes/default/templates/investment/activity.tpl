{include file='_head.tpl'}
{include file='_header.tpl'}

<div class="container mt20 offcanvas">
    <div class="row">
        <div class="offcanvas-sidebar sidebar-left-ant">
            {include file='_sidebar.tpl'}
        </div>
    </div>
    
    <div class="row right-side-content-ant">
        <div class="col-lg-12 offcanvas-mainbar">
            <div class="row">
                <div class="col-11 card buySellSection">
                    <ul class="nav nav-pills mb-3 btnSectionBuySell" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link buySelltableTabs active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" data-actionType="buy" aria-controls="pills-home" aria-selected="true">Buy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link buySelltableTabs" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" data-actionType="sell" aria-controls="pills-profile"
                                aria-selected="false">Sell</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link buySelltableTabs" id="pills-profile-tab11" data-toggle="pill" href="#referral"
                                role="tab" data-actionType="referral" aria-controls="pills-profile"
                                aria-selected="false">Referrals</a>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                          
                            <div class="section-title transactionTableChangeHeading">
                                <img width="24px" class="mr10"
                                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/Wallet_icon_header.svg">
                                <span>Latest Activities</span>
                            </div>
                            {if $all_transactions}
                            <!-- <div class="tableWrapTransactions"> -->
                                <div class="coinSelection">
                                    <table class="table table-borderless js_dataTable">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Tranx NO</th>
                                                <th>Trade Pair</th>
                                                <th>Token</th>
                                                <th>Fees(%)</th>
                                                <th>Receive Token</th>
                                                <th>Paid Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {foreach $all_transactions['buy'] as $buy_tnx}
                                            <tr>
                                                <td><span class=" "
                                                    data-time="{$buy_tnx['created_at']|date_format}">{$buy_tnx['created_at']|date_format}</span>
                                                </td>
                                                <td>{$buy_tnx['order_id']}</td>
                                                <td>
                                                    <img src="{$system['system_url']}/content/themes/default/images/investment/withdraw.svg"
                                                        alt="withdraw Icon">
                                                    {$buy_tnx['currency']|strtoupper}/USDT
                                                </td>
                                              
                                                <td>{$buy_tnx['tokens']}</td>
                                                <td>{$buy_tnx['fees']}</td>
                                                <td>{$buy_tnx['recieve_token']}</td>
                                                <td>{$buy_tnx['amount']}</td>
                                                <td>{$buy_tnx['status']}</td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                </div>

                            <!-- </div> -->
                            {else}
                            <div class="text-center text-muted mtb10 no_results_Wrap">
                                <img width="100%"
                                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/no_results1.png">
                            </div>
                            {/if}
                        </div>
                        
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="section-title transactionTableChangeHeading">
                                <img width="24px" class="mr10"
                                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/Wallet_icon_header.svg">
                                <span>Latest Activities</span>
                            </div>
                            <div class="coinSelection">
                               
                                <table class="table table-borderless js_dataTable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Tranx NO</th>
                                            <th>Trade Pair</th>
                                            <th>Token</th>
                                            <th>Amount</th>
                                            <th>Fees(%)</th>
                                            <th>Received Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach $all_transactions['sell'] as $sell_tnx}
                                        <tr>
                                            <td><span class=" "
                                                data-time="{$sell_tnx['created_at']|date_format}">{$sell_tnx['created_at']|date_format}</span>
                                            </td>
                                            <td>{$sell_tnx['order_id']}</td>
                                            <td>
                                                <img src="{$system['system_url']}/content/themes/default/images/investment/sell.svg"
                                                    alt="withdraw Icon">
                                                {$sell_tnx['currency']|strtoupper}/USDT
                                            </td>
                                          
                                            <td>{$sell_tnx['tokens']}</td>
                                          
                                            <td>{$sell_tnx['amount']}</td>
                                            <td>{$sell_tnx['fees']}</td>
                                            <td>{$sell_tnx['receive_amount']}</td>
                                            <td>{$sell_tnx['status']}</td>
                                        </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="referral" role="tabpanel"
                        aria-labelledby="pills-profile-tab11">
                            <div class="section-title transactionTableChangeHeading">
                                <img width="24px" class="mr10"
                                    src="{$system['system_url']}/content/themes/{$system['theme']}/images/svg/svgImg/Wallet_icon_header.svg">
                                <span>Latest Activities</span>
                            </div>
                            <div class="coinSelection">
                            
                                <table class="table table-borderless js_dataTable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Tranx NO</th>
                                            <th>Received Amount</th>
                                            <th>Referral Bonus For</th>
                                            <th>Bonus Apply</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach $all_transactions['referral'] as $referral}
                                        <tr>
                                            <td><span class=" "
                                                data-time="{$referral['created_at']|date_format}">{$referral['created_at']|date_format}</span>
                                            </td>
                                            <td>{$referral['order_id']}</td>
                                            <td>
                                                <img src="{$system['system_url']}/content/themes/default/images/investment/withdraw.svg"
                                                    alt="referral Icon">
                                                ${$referral['amount']}
                                            </td>
                                            <td><a href="{$system['system_url']}/{$referral['refer_by']['user_name']}" target="_blank">{$referral['refer_by']['user_name']}</a></td>
                                            <td>{if $referral['extra']['calc']=='fixed'}
                                                    ${$referral['extra']['bonus']}({$referral['extra']['calc']})
                                                {else}
                                                    {$referral['extra']['bonus']}%
                                                {/if}
                                                -
                                                {$referral['extra']['level']|upper}
                                            </td>
                                            <td>{$referral['details']}</td>
                                            <td>{$referral['status']}</td>
                                        
                                        </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{* <div class="right-sidebar js_sticky-sidebar">
    {include file='investment/right-sidebar.tpl'}
</div> *}
<!-- page content -->
{include file='_footer.tpl'}