 <div class="modal-dialog investmentModalWrap" data-backdrop="static" data-keyboard="false">
        <div class="modal-content">
            <div class="modal-body" id="confrimModalBody">
                <div class="investmentModal">
                    <div class="row">
                        <div class="col-md-4 coinColumSection">
                            <h3>You are {ucfirst($action)}ing</h3>
                            <div class="coinDetails">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/{if $token_name==btc}bit{else}{$token_name}{/if}Coin.svg"
                                    alt="bit coin">
                                <div class="TextWrap">
                                    <h4><span class="overall_coin">{$token_value}</span> {strtoupper($token_name)}</h4>
                                    <p><span class="per_coin_price">{$per_coin_price}</span> per USD</p>
                                </div>
                            </div>
                            <div class="coinDetails dashedLines">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/dollerCoin.svg"
                                    alt="bit coin">
                                <div class="TextWrap">
                                    <p>Wallet</p>
                                    <h5>Payment Method</h5>
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
                            <div class="coinDetails dashedLines">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/walletIconChange.svg"
                                    alt="bit coin">
                                <div class="TextWrap">
                                    <p>{strtoupper($token_name)} Wallet</p>
                                    <h5>
                                        {if $action=='buy'}
                                             Deposit To
                                        {else}
                                            Withdrawal From
                                        {/if}
                                   </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 confirmTransaction">
                            <h5>Confirm your Transaction</h5>
                            <p>Review all the details and confirm your <br />
                                transaction below</p>
                            <div class="MoreAssetsSection">
                                <button type="button" class="btn MoreAssetsbutton" id="complete_order">Confirm
                                    {ucfirst($action)}</button>
                            </div>
                            <a href="javascript:;" class="confirmBuyLink" id="confirm_cancel" data-dismiss="modal" aria-label="Close">Cancel Transaction</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>