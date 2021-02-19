<div class="modal-dialog investmentModalWrap">
        <div class="modal-content">
            <div class="modal-body">
                <div class="investmentModal">
                    <div class="row">
                        <div class="col-md-4 coinColumSection">
                            <h3>You are {ucfirst($action)}ing</h3>
                            <div class="coinDetails">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/{if $token_name==btc}bit{else}{$token_name}{/if}Coin.svg"
                                    alt="bit coin">
                                <div class="TextWrap">
                                    <h4>{$token_value} {strtoupper($token_name)}</h4>
                                    <p>{$per_coin_price} USD</p>
                                </div>
                            </div>
                            <div class="coinDetails dashedLines">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/dollarGray.svg"
                                    alt="bit coin">
                                <div class="TextWrap">
                                    <p>Payment Method</p>
                                    <h5 style="color:#FF7A68;">
                                        {if $action=='sell'}
                                            USD Wallet
                                        {else}
                                            Top up USD
                                        {/if}
                                        
                                    </h5>
                                </div>
                            </div>
                            <div class="coinDetails dashedLines avilableColor">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/Instanly.svg"
                                    alt="bit coin">
                                <div class="TextWrap">
                                    <p>Instantly</p>
                                    <h5>Available</h5>
                                </div>
                            </div>
                            <div class="coinDetails dashedLines avilableColor">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/walletChangeGray.svg"
                                    alt="bit coin">
                                <div class="TextWrap">
                                    <p>{strtoupper($token_name)} Wallet</p>
                                    <h5>Deposit to</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 confirmTransaction">
                            <h5>The transaction is not possible <br> because there are not enough <br> funds in your
                                account.</h5>
                            <!-- <p>Review all the details and confirm your <br/>
                                    trqnsaction below</p> -->
                            {if $action!='sell'}
                                <div class="topUpWrap">
                                <a href="{$system['system_url']}/wallet">
                                <button type="button" class="btn topUpWrapbutton">
                                    <img src="{$system['system_url']}/content/themes/default/images/investment/Info_Circle.svg"
                                        alt=""> Top up USD
                                </button></a>
                            </div>                
                            {/if}
                            
                            <a href="javascript:;" class="confirmBuyLink" data-dismiss="modal" aria-label="Close">Cancel Transaction</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>