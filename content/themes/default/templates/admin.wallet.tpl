<div class="card">
    <div class="card-header with-icon">
        <i class="fa fa-wallet mr10"></i>{__("Wallet")}
    </div>

    <!-- Wallet -->
    <form class="js_ajax-forms " data-url="admin/settings.php?edit=wallet">
        <div class="card-body">
            <div class="alert alert-warning">
                <div class="icon">
                    <i class="fa fa-exclamation-triangle fa-2x"></i>
                </div>
                <div class="text pt5">
                    {__("Make sure you have configured")} <a class="alert-link" href="{$system['system_url']}/{$control_panel['url']}/settings/payments">{__("Payments Settings")}</a>
                </div>
            </div>
            
            <div class="form-table-row">
                <div class="avatar">
                    {include file='__svg_icons.tpl' icon="wallet" width="40px" height="40px"}
                </div>
                <div>
                    <div class="form-control-label h6">{__("Wallet Enabled")}</div>
                    <div class="form-text d-none d-sm-block">
                        {__("Turn the wallet On and Off")}
                    </div>
                </div>
                <div class="text-right">
                    <label class="switch" for="wallet_enabled">
                        <input type="checkbox" name="wallet_enabled" id="wallet_enabled" {if $system['wallet_enabled']}checked{/if}>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="form-table-row">
                <div class="avatar">
                    {include file='__svg_icons.tpl' icon="wallet_transfer" width="40px" height="40px"}
                </div>
                <div>
                    <div class="form-control-label h6">{__("Transfer Money Enabled")}</div>
                    <div class="form-text d-none d-sm-block">
                        {__("Turn the transfer money between users On and Off")}
                    </div>
                </div>
                <div class="text-right">
                    <label class="switch" for="wallet_transfer_enabled">
                        <input type="checkbox" name="wallet_transfer_enabled" id="wallet_transfer_enabled" {if $system['wallet_transfer_enabled']}checked{/if}>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <!-- success -->
            <div class="alert alert-success mb0 x-hidden"></div>
            <!-- success -->

            <!-- error -->
            <div class="alert alert-danger mb0 x-hidden"></div>
            <!-- error -->
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">{__("Save Changes")}</button>
        </div>
    </form>
    <!-- Wallet -->

</div>