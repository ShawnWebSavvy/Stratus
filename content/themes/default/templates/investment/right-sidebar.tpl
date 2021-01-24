<div class="right-sidebar-inner-ant investSideBarHome">
    <div class="chat-conversations js_scroller" data-slimScroll-height="calc(100vh - 167px)">
        <div class="investSidebar">

            {if (!empty($page)&&$page!='investment/index')}
                <div class="buyingWrap pt30">
                    <div class="mainHeading">You are &nbsp;<span id="buying_text">{$order_action_type}ing</span></div>
                    <div class="buyingInformation">
                        <img src="{$system['system_url']}/content/themes/default/images/investment/{if $set_active_coin==btc}bit{else}{$set_active_coin}{/if}Coin.svg"
                            alt="coin icon" class="coin_img">
                        <div class="informationTextSection">
                            <ul>
                                <li>
                                    <div class="activityBlock">
                                        <div class="activityDetails">
                                            <h3><span class="overall_coin">0</span> &nbsp; <span class="coin_text">{strtoupper($set_active_coin)}</span></h3>
                                            <p class="infoText">$
                                                <span class="per_coin_price">
                                                {if $order_action_type=='Buy'}
                                                    {$_buy_details[$set_active_coin]}
                                                {else}
                                                    {$_sell_details[$set_active_coin]}
                                                {/if}
                                                </span>
                                                per &nbsp; <span class="coin_text">USD</span></p>
                                        </div>
                                        <div class="activityDate">{date('M d, Y')}</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="information">
                                        <h3>Payment Method</h3>
                                        <p>USD Wallet</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="information">
                                        <h3 id="deposit_text">Deposit to</h3>
                                        <p><span class="coin_text">{strtoupper($set_active_coin)}</span>&nbsp; Wallet</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="information">
                                        <h3>Wait Time</h3>
                                        <p>Instant</p>
                                    </div>
                                </li>
                                <li class="smallList pt30">
                                    <div class="feeTotalInfo">
                                        <h5>Fee</h5>
                                        <h5><span id="total_fees">0</span></h5>
                                    </div>
                                </li>
                                <li class="smallList">
                                    <div class="feeTotalInfo">
                                        <h5>Subtotal</h5>
                                        <h5>$<span id="sub_total"></span></h5>
                                    </div>
                                </li>
                                <li class="smallList">
                                    <div class="feeTotalInfo">
                                        <h5>Total</h5>
                                        <h5>$<span id="order_total">0</span></h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            {else}
                <div class="WithdrowGraphWrap">
                    <!-- <img src="{$system['system_url']}/content/themes/default/images/investment/roundgraph.svg"
                        alt="round Graph"> -->
                        <div id="apex_chart"></div>
                    <div class="GraphTextSection">
                        <h4>Total Balance</h4>
                        <p class="btcBackground">BTC</p>
                        <h5>2.0384</h5>
                        <h6>3,700.96 USD</h6>
                        <!-- <button class="btn withdrawSidebar">Withdraw</button> -->
                    </div>
                </div>
            {/if}
            <!-- You are Buying -->
            {if !empty($lat_transactions) }
            <!-- Latest Activities -->
                <div class="latestActivitys">
                    <div class="mainHeading">Latest Activities</div>
                    <ul>
                        {foreach $lat_transactions as $transaction}
                        <li>
                            <div class="activityBlock">
                                {if $transaction['tnx_type']=='buy'}
                                    <img src="{$system['system_url']}/content/themes/default/images/investment/deposit.svg"
                                    alt="withdraw Icon">
                                {else}
                                    <img src="{$system['system_url']}/content/themes/default/images/investment/withdraw.svg"
                                    alt="withdraw Icon">
                                {/if}
                                
                                <div class="activityDetails">
                                    <h3>{$transaction['tnx_type']|ucfirst} {$transaction['currency']|strtoupper}</h3>
                                    <h5>{$transaction['status']|ucfirst}</h5>
                                    <p>{$transaction['recieve_token']|number_format:5} {$transaction['currency']|strtoupper}</p>
                                </div>
                                <div class="activityDate">{$transaction['created_at']|date_format}</div>
                            </div>
                        </li>
                        {/foreach}
                        <li>
                            <a href="{$system['system_url']}/investment/activities" class="viewAllSection">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/arrow-right.svg"
                                    alt="arrow-right Icon"> View all activity
                            </a>
                        </li>
                    </ul>
                </div>
            {/if}
            <!-- Latest Activities -->
        </div>
    </div>
</div>