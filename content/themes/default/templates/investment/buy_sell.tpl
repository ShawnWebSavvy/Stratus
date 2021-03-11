{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="container mt20 offcanvas">
    <div class="row">
        <div class="offcanvas-sidebar sidebar-left-ant">
            {include file='_sidebar.tpl'}
        </div>
    </div>
    <div class="row right-side-content-ant">
        <div class="col-lg-12 offcanvas-mainbar">
            <div class="row">
                <div class="home-page-middel-block">
                    <div class="card buySellSection">
                        <div class="btnSectionBuySell">
                            <a href="javascript:;" class="btn buySellButton {if $order_action_type=='Buy'} active {/if}" data-actionType="buy">Buy</a>
                            <a href="javascript:;" class="btn buySellButton {if $order_action_type=='Sell'} active {/if}" data-actionType="sell">Sell</a>
                        </div>
                        <div class="CurrencyHeading">
                            <div class="heading">
                                <h3>Currency</h3>
                            </div>
                            <!-- <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    More Info
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <p>At vero eos censes tantas res gessisse sine dubio praeclara sunt, explicabo nemo
                                        enim maxime placeat, facere possimus, omnis voluptas nulla pariatur? at vero eos
                                        censes tantas res gessisse sine causa? quae fuerit causa, mox videro; interea
                                        hoc epicurus in bonis sit sentiri haec putat.</p>
                                </div>
                            </div> -->
                        </div>
                        <div class="coinSelection">
                            <ul>
                                <div class="MobileCrousle">
                                    <div class="gallery js-flickity" data-flickity-options='{ "cellAlign": "left", "wrapAround": false, "contain": true, "prevNextButtons": false, "pageDots": false }'>
                                        {foreach $token_details as $tkn_detail}
                                        <div class="gallery-cell">
                                            <li>
                                                <a href="javascript:;" class="coinDetailPrice coinDetailPrice_wallet  {if $set_active_coin==$tkn_detail['short_name']} active {/if}" data-coin="{strtoupper($tkn_detail['short_name'])}">
                                                    <div class="coinDetailHeader">
                                                        <img src="{$system['system_url']}/content/themes/default/images/investment/{if 'btc'==$tkn_detail['short_name']  }bit{else}{$tkn_detail['short_name']}{/if}Coin.svg"
                                                            alt="bit coin">
                                                        <div class="textSection">
                                                            <h5>{$tkn_detail['name']}</h5>
                                                            <p>{strtoupper($tkn_detail['short_name'])}</p>
                                                        </div>
                                                          <div class="priceCount priceCountDetail">
                                                            <p>
                                                                <span>
                                                                {if $order_action_type=='Buy'}
                                                                    {$tkn_detail['buy_price']}
                                                                {else}
                                                                    {$tkn_detail['sell_price']}
                                                                {/if}
                                                                </span>
                                                                USD
                                                            </p>
                                                        
                                                        </div>
                                                    </div>
                                                  
                                                     <div class="buySellBox">
                                                            <p class="d-flex align-items-start ">
                                                                <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Wallet_icon_header.svg"
                                                                    alt="wallet">
                                                                    <span>
                                                                        {if $wallet_coins_amount[$tkn_detail['short_name']] && $wallet_coins_amount[$tkn_detail['short_name']]>0}
                                                                            {$wallet_coins_amount[$tkn_detail['short_name']]}
                                                                        {else}
                                                                            0
                                                                        {/if} 
                                                                        {$tkn_detail['short_name']|upper}
                                                                        <br/>
                                                                        ${$tkn_detail['total_wallet_quote_amount']}
                                                                    </span>
                                                            </p>
                                                        </div>
                                                </a>
                                            </li>
                                        </div>
                                        {/foreach}
                                        <div class="gallery-cell" disabled>
                                            <li>
                                                <a href="javascript:;" class="coinDetailPrice"  data-coin="gsx">
                                                    <div class="coinDetailHeader">
                                                        <img src="{$system['system_url']}/content/themes/default/images/investment/gsx.svg"
                                                            alt="bit coin">
                                                        <div class="textSection">
                                                            <h5>Gold Secured Currency</h5>
                                                            <p>GSX</p>
                                                            <p class="comingSoon comingSoon1">Coming Soon</p>
                                                        </div>
                                                          <div class="priceCount priceCountDetail">
                                                            <p>
                                                                <span>
                                                                    0.1
                                                                </span>
                                                                USD
                                                            </p>
                                                        </div>
                                                    </div>
                                                     <div class="buySellBox">
                                                            <p class="d-flex align-items-start ">
                                                                <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Wallet_icon_header.svg"
                                                                    alt="wallet">
                                                                    <span>
                                                                        0 GSX
                                                                        <br/>
                                                                        $0
                                                                    </span>
                                                            </p>
                                                        </div>
                                                  
                                                </a>
                                            </li>
                                        </div>
                                     
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="CurrencyHeading">
                            <div class="heading">
                                <h3>Payment Method</h3>
                            </div>
                        </div>
                        <div class="coinSelection">
                            <ul>
                                <div class="MobileCrousle">
                                    <div class="gallery js-flickity" data-flickity-options='{ "cellAlign": "left", "wrapAround": false, "contain": true, "prevNextButtons": false, "pageDots": false }'>
                                        <div class="gallery-cell">
                                            <li>
                                                <a href="#" class="coinDetailPrice active">
                                                    <div class="coinDetailHeader">
                                                        <img src="{$system['system_url']}/content/themes/default/images/investment/dollerCoin.svg"
                                                            alt="bit coin">
                                                        <div class="textSection">
                                                            <h5>Wallet</h5>
                                                            <p>USD</p>
                                                        </div>
                                                    </div>
                                                    <div class="priceCount">
                                                        <p>{$user_data['user_wallet_balance']|number_format:2} USD</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <!-- <div class="gallery-cell">
                                            <li>
                                                <a href="#" class="coinDetailPrice ">
                                                    <div class="coinDetailHeader">
                                                        <img src="{$system['system_url']}/content/themes/default/images/investment/bankAccount.svg"
                                                            alt="bit coin">
                                                        <div class="textSection">
                                                            <h5>Bank Account</h5>
                                                            <p>USD</p>
                                                        </div>
                                                    </div>
                                                    <div class="priceCount">
                                                        <p>************123</p>
                                                    </div>
                                                </a>
                                            </li>
                                        </div>
                                        <div class="gallery-cell" style="height: 100%;">
                                            <li style="height: 100%;">
                                                <a href="#" class="coinDetailPrice addNewPayment">
                                                    <img src="{$system['system_url']}/content/themes/default/images/investment/addnewPayment.svg"
                                                        alt="bit coin">
                                                </a>
                                            </li>
                                        </div> -->
                                    </div>
                                </div>
                            </ul>
                        </div>

                        <div class="CurrencyHeading">
                            <div class="heading">
                                <h3>Amount</h3>
                            </div>
                            <div class="dropdown minMaxDrop">
                                <button class="btn dropdown-toggle drop-down-data" type="button" id="dropdownMenu"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Use Min/Max
                                </button>
                                <div class="dropdown-menu " aria-labelledby="dropdownMenu2" style="max-width:198px">
                                    <a class="dropdown-item purchase_value" href="javascript:;" data-value="Min"><span class="x-hidden purchase_value_tick" id="tick1"><img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/checkedBlue.svg" alt="swap" style="margin-right: 10px;"></span>Use Min</a>
                                    <a class="dropdown-item purchase_value" href="javascript:;" data-value="Max"><span class="x-hidden purchase_value_tick" id="tick1"><img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/checkedBlue.svg" alt="swap" style="margin-right: 10px;"></span>Use Max</a>
                                </div>
                            </div>
                        </div>
                        <div class="amountSectionChange" id="amountSectionChange">
                            <div class="amountCount">
                                <input type="text" class="" placeholder="USD" id="amount">
                                <p class="currancyNme" id="currency_show">USD</p>
                                <a href="javascript:;" class="availableBalnce " id="availableBalnce1">Balance Available: $<span id="wallet_balance">{$wallet_coins_amount['usd']|number_format:2}</span></a>
                            
                            </div>
                            <button class="swapButton" id="swapButton">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/ic_switch.svg" alt="swap" id="investment_swap">
                                <span class="spinner-grow spinner-grow-sm ml10 x-hidden" id="investment_spiner"></span>
                            </button>
                            <div class="amountCount">
                                <!-- <p>1.0000 BTC</p> -->
                                <input type="text" class="" placeholder="{strtoupper($set_active_coin)}" id="total_coin">
                                <p class="currancyNme" id="coin_show">{strtoupper($set_active_coin)}</p>
                                <a href="javascript:;" class="availableBalnce" id="availableBalnce2">Balance Available: <span class="balance wallet_amount11" id="coin_balance">{$wallet_coins_amount[$set_active_coin]}</span><span class="coin_text">{strtoupper($set_active_coin)}</span></a>
                            </div>
                        </div>
                          <div class="amountSectionChange">
                            <div class="amountCount">
                             <p class="alert alert-danger mb0 mt0 x-hidden" style="float: inline-end;" id="usd_balance">USD balance is insufficient</p>
                            </div>
                            <button class="swapButton" style="opacity:0;">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/ic_switch.svg">
                            </button>
                            <div class="amountCount">
                               <p class="alert alert-danger mb0 mt0 x-hidden" style="float: inline-end;" id="token_balance">BTC balance is insufficient</p>
                            </div>
                        </div>
                        <div class="MoreAssetsSection">
                            <button type="button" class="btn MoreAssetsbutton" id="buy_btn"><span class="coin_element">{$order_action_type}</span>&nbsp;<span id="buy_btn_txt">{strtoupper($set_active_coin)}</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="confrimModal" role="dialog" data-backdrop="static" data-keyboard="false">
   
</div>


<div class="modal fade" id="topUpModal" role="dialog">
    
</div>

<div class="right-sidebar js_sticky-sidebar" style="z-index:0;">
    {include file='investment/right-sidebar.tpl'}
</div>

<script>
    var order_detail  = {json_encode($order_detail)};

    var buy_details ={json_encode($_buy_details)};
    var wallet     = {json_encode($wallet_balance)};
    var sell_details = {json_encode($_sell_details)};
    var wallet_coins = {json_encode($wallet_coins_amount)};
</script>
{include file='_footer.tpl'}