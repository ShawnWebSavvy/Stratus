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
                                    {if $action=='buy'}
                                        <p>Fees=<span class="total_fees_amount" id="fees_amount_buy">{$fees} {strtoupper($token_name)}</span></p>
                                        <p>Total=<span class="amount_received_model">{$receive_amount}</span> {strtoupper($token_name)}</p>
                                    {else}
                                        <p>Fees=<span class="total_fees_amount" id="fees_amount_buy">{$fees}</span></p>
                                        <p>Total=<span class="amount_received_model">${$receive_amount}</span></p>
                                    {/if}
                                </div>
                            </div>
                            <div class="coinDetails dashedLines">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/dollerCoin.svg"
                                    alt="bit coin">
                                <div class="TextWrap">
                                    <p>Payment Method</p>
                                    <h5>Wallet</h5>
                                </div>
                            </div>
                            <div class="coinDetails dashedLines avilableColor">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/Instanly.svg"
                                    alt="bit coin">
                                <div class="TextWrap">
                                    <p>Available</p>
                                    <h5>Instantly</h5>
                                </div>
                            </div>
                            <div class="coinDetails dashedLines">
                                <img src="{$system['system_url']}/content/themes/default/images/investment/walletIconChange.svg"
                                    alt="bit coin">
                                <div class="TextWrap">
                                    <p>
                                        {if $action=='buy'}
                                             Deposit To
                                        {else}
                                            Withdrawal From
                                        {/if}
                                    </p>
                                    <h5>
                                        {strtoupper($token_name)} Wallet
                                   </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 confirmTransaction lineChange">
                            <h5>Confirm your Transaction</h5>
                            <p>Review all the details and confirm your <br />
                                transaction below</p>
                            <div class="MoreAssetsSection">
                                <button type="button" class="btn MoreAssetsbutton" id="complete_order" style="max-width:242px;min-height: 56px;">Confirm
                                    {ucfirst($action)}</button>
                            </div>
                            <a href="javascript:;" class="confirmBuyLink" id="confirm_cancel" data-dismiss="modal" aria-label="Close">Cancel Transaction</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>