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
                    <div class="card investmentWrapSection">
                        <div class="delistingsUpdate">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="delistingsTextWrap">
                                            <h6>November 2020 </h6>
                                            <h4>Asset Delistings Update</h4>
                                            <p>The Grin blockchain has presented significant technical challenges.</p>
                                            <button class="btn findMore">Find out more</button>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="delistingsTextWrap">
                                            <h6>November 2021 </h6>
                                            <h4>Asset Delistings Update</h4>
                                            <p>The Grin blockchain has presented significant technical challenges.</p>
                                            <button class="btn findMore">Find out more</button>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="delistingsTextWrap">
                                            <h6>November 2022 </h6>
                                            <h4>Asset Delistings Update</h4>
                                            <p>The Grin blockchain has presented significant technical challenges.</p>
                                            <button class="btn findMore">Find out more</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="MobileCrousle">
                            <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true,"prevNextButtons": false, "pageDots": false }'>
                                <div class="gallery-cell">
                                    <div class="delistingsUpdate">
                                        <div class="delistingsTextWrap">
                                            <h6>November 2020 </h6>
                                            <h4>Asset Delistings Update</h4>
                                            <p>The Grin blockchain has presented significant technical challenges.</p>
                                            <button class="btn findMore">Find out more</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-cell">
                                    <div class="delistingsUpdate">
                                        <div class="delistingsTextWrap">
                                            <h6>November 2021 </h6>
                                            <h4>Asset Delistings Update</h4>
                                            <p>The Grin blockchain has presented significant technical challenges.</p>
                                            <button class="btn findMore">Find out more</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-cell">
                                    <div class="delistingsUpdate">
                                        <div class="delistingsTextWrap">
                                            <h6>November 2022 </h6>
                                            <h4>Asset Delistings Update</h4>
                                            <p>The Grin blockchain has presented significant technical challenges.</p>
                                            <button class="btn findMore">Find out more</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-cell">
                                    <div class="delistingsUpdate">
                                        <div class="delistingsTextWrap">
                                            <h6>November 2020 </h6>
                                            <h4>Asset Delistings Update</h4>
                                            <p>The Grin blockchain has presented significant technical challenges.</p>
                                            <button class="btn findMore">Find out more</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-cell">
                                    <div class="delistingsUpdate">
                                        <div class="delistingsTextWrap">
                                            <h6>November 2020 </h6>
                                            <h4>Asset Delistings Update</h4>
                                            <p>The Grin blockchain has presented significant technical challenges.</p>
                                            <button class="btn findMore">Find out more</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="coreAssets">
                            <div class="heading">
                                <h3>Core Assets</h3>
                            </div>
                        </div>
                        <div class="coinSectionWrap">
                            {if $allTokens}
                                {foreach $allTokens as $key=>$detail}
                            
                                    <div class="coinDetailSection">
                                        <div class="coinSectionHeader">
                                            <img src="{$system['system_url']}/content/themes/default/images/investment/{if 'btc'==$detail['short_name']  }bit{else}{$detail['short_name']}{/if}Coin.svg"
                                                alt="bit coin">
                                            <div class="coinNameValue">
                                                <h5 class="token_name" data-coin="{$detail['short_name']}">{$detail['name']}</h5>
                                                <p>
                                                    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Wallet_icon_header.svg"
                                                        alt="wallet">
                                                        <span>
                                                            {if $user_data[$detail['wallet_name']] && $user_data[$detail['wallet_name']]>0}
                                                                {$user_data[$detail['wallet_name']]}
                                                            {else}
                                                                0
                                                            {/if} {$detail['short_name']|upper}
                                                            <br/>
                                                            $ {$detail['total_wallet_quote_amount']}
                                                        </span>
                                                </p>
                                            </div>
                                            <div class="timeWrap">24H</div>
                                        </div>
                                        <div class="GraphSection">
                                        <div class="graphSectionHeader">
                                            <h3><span class="coin_price">{$detail['buy_price']}</span> USD</h3>
                                            <div class="imageHikWrap">
                                                {if $detail['fluctuation']>0 }
                                                    <img width="10px" src="{$system['system_url']}/content/themes/default/images/investment/arrowUp.svg" alt="">
                                                {else}
                                                    <img width="10px" class="arrowDown" src="{$system['system_url']}/content/themes/default/images/investment/arrowDown.svg" alt="">
                                                {/if}
                                                <p>{printf("%.1f",$detail['fluctuation']*100)}%</p>
                                            </div>
                                        </div>
                                            {if $detail['fluctuation']>0 }
                                                <div  id="graph{$key}" class="aGraph"  data-element="{$detail['short_name']}" data-color="#52CC8A"></div>
                                            {else}
                                                <div  id="graph{$key}" class="aGraph"  data-element="{$detail['short_name']}" data-color="#ff7979"></div>
                                            {/if}
                                            
                                        </div>
                                        <div class="coinBaseButtonSection btn-group" role="group">
                                            <a href="{$system['system_url']}/investment/buy-sell"
                                                class="btn coinBaseButton">Buy</a>
                                            <a href="{$system['system_url']}/investment/buy-sell"
                                                class="btn coinBaseButton">Sell</a>
                                         <!--    <a href="javascript:;"
                                                class="btn coinBaseButton">Info</a> -->
                                        </div>
                                    </div>
                                {/foreach}
                                <div class="coinDetailSection"  style="display: flex;
                                flex-direction: column;
                                justify-content: space-between;">
                                    <div class="coinSectionHeader">
                                        <img src="{$system['system_url']}/content/themes/default/images/investment/gsx.svg"
                                                    alt="bit coin">
                                        <div class="coinNameValue">
                                            <h5 class="token_name">Gold Secured Currency</h5>
                                            <p>
                                                <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Wallet_icon_header.svg"
                                                    alt="wallet">
                                                    <span>
                                                        0 GSX
                                                        <br/>
                                                        $0
                                                    </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="GraphSection" style="height: 100%">
                                    <div class="graphSectionHeader">
                                        <h3><span class="coin_price">0.1</span> USD</h3>
                                    </div>
                                     <div class="comming_soon_text">
                                         <p>Comming Soon</p>
                                     </div>
                                    </div>
                                    <div class="coinBaseButtonSection btn-group" role="group">
                                        <a href="javascript:;"
                                            class="btn coinBaseButton" disabled>Buy</a>
                                        <a href="javascript:;"
                                            class="btn coinBaseButton" disabled>Sell</a>
                                    
                                    </div>
                                </div>

                                <div class="MobileCrousle">
                                    <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true,"prevNextButtons": false, "pageDots": false }'>
                                        {if $allTokens}
                                            {foreach $allTokens as $element=>$detailMobile}
                                                <div class="gallery-cell">
                                                    <div class="coinDetailSection">
                                                        <div class="coinSectionHeader">
                                                            <img src="{$system['system_url']}/content/themes/default/images/investment/{if 'btc'==$detailMobile['short_name']  }bit{else}{$detailMobile['short_name']}{/if}Coin.svg"
                                                                alt="bit coin">
                                                            <div class="coinNameValue">
                                                                <h5 class="token_name" data-coin="{$detailMobile['short_name']}">{$detailMobile['name']}</h5>
                                                                <p>
                                                                    <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Wallet_icon_header.svg"
                                                                        alt="wallet">
                                                                        <span>
                                                                        {if $user_data[$detailMobile['wallet_name']] && $user_data[$detailMobile['wallet_name']]>0}
                                                                            {$user_data[$detailMobile['wallet_name']]}
                                                                        {else}
                                                                            0
                                                                        {/if} {$detailMobile['short_name']|upper}
                                                                    
                                                                        <br/>
                                                                            $ {$detail['total_wallet_quote_amount']}
                                                                        </span>


                                                                </p>
                                                            </div>
                                                            <div class="timeWrap">24H</div>
                                                        </div>
                                                        <div class="GraphSection">
                                                            <p><span class="coin_price">{$detailMobile['buy_price']}</span> USD</p>
                                                            <div class="imageHikWrap">
                                                                {if $detail['fluctuation']>0 }
                                                                    <img width="10px" src="{$system['system_url']}/content/themes/default/images/investment/arrowUp.svg" alt="">
                                                                {else}
                                                                    <img width="10px" class="arrowDown" src="{$system['system_url']}/content/themes/default/images/investment/arrowDown.svg" alt="">
                                                                {/if}
                                                                <p>{printf("%.1f",$detailMobile['fluctuation']*100)}%</p>
                                                            </div>
                                                            {if $detail['fluctuation']>0 }
                                                                <div  class="graph{$element}"  data-element="{$detail['short_name']}" data-color="#4682b4"></div>
                                                            {else}
                                                                <div  class="graph{$element}"  data-element="{$detail['short_name']}" data-color="#ff7979"></div>
                                                            {/if}
                                                        </div>
                                                        <div class="coinBaseButtonSection btn-group" role="group">
                                                            <a href="{$system['system_url']}/investment/buy-sell"
                                                                class="btn coinBaseButton">Buy</a>
                                                            <a href="{$system['system_url']}/investment/buy-sell"
                                                                class="btn coinBaseButton">Sell</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            {/foreach}
                                        {/if}
                                        <div class="gallery-cell">
                                            <div class="coinDetailSection">
                                                <div class="coinSectionHeader">
                                                    <img src="{$system['system_url']}/content/themes/default/images/investment/gsx.svg"
                                                            alt="bit coin">
                                                    <div class="coinNameValue">
                                                        <h5 class="token_name">Gold Secured Currency</h5>
                                                        <p>
                                                            <img src="{$system['system_url']}/content/themes/default/images/svg/svgImg/Wallet_icon_header.svg"
                                                                alt="wallet">
                                                            <span>
                                                                0 GSX
                                                                <br/>
                                                                $0
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="GraphSection">
                                                    <p><span class="coin_price">0.1</span> USD</p>
                                                
                                                    <div class="comming_soon_text">
                                                        <p>Comming Soon</p>
                                                    </div>
                                                
                                                </div>
                                                <div class="coinBaseButtonSection btn-group" role="group">
                                                    <a href="javascript:;"
                                                        class="btn coinBaseButton" disabled>Buy</a>
                                                    <a href="javascript:;"
                                                        class="btn coinBaseButton" disabled>Sell</a>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                
                            {/if}
                           
                        </div>
                       <!--  <div class="MoreAssetsSection">
                            <button type="button" class="btn MoreAssetsbutton">Discover more assets</button>
                        </div> -->
                    </div>


                </div>
                <!-- right panel -->
                <div class="right-sidebar js_sticky-sidebar">
                    {include file='investment/right-sidebar.tpl'}
                </div>
                <!-- right panel -->
            </div>
        </div>
    </div>
</div>
<script>
    var garph_data = {json_encode($graphData)};
    var labels = {json_encode($labels)};
    var series = {json_encode($series)};
</script>  
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
{include file='_footer.tpl'}