{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page header -->
<!--<div class="page-header bg-2">
    <img class="floating-img d-none d-md-block" src="{$system['system_url']}/content/themes/{$system['theme']}/images/headers/undraw_message_sent_1030.svg">
    <div class="crystal c03"></div>
    <div class="circle-2"></div>
    <div class="circle-3"></div>
    <div class="inner">
        <h2>{__("Reset Password")}</h2>
        <p>{__("Enter the email address you signed up with and we'll email you a reset link")}</p>
    </div>
</div> -->
<!-- page header -->

<!-- page content -->
<div class="mainloginBlock reset-container">.
    <span class="cloud_imgs"> </span>
    <div class="card card-register">
        <div class="js_panel">
            <div class="card-header">
                <h2>{__("Reset Password")}</h2>
                <p>{__("Enter the email address you signed up with and we'll email you a reset link")}</p>
            </div>
            <div class="card-body" style="padding: 40px; padding-bottom: 30px;padding-top: 15px;">
                <!-- <div class="ResetHedingWrap">
                <div class="inner">
                   
                </div>
            </div> -->
                <form class="js_ajax-forms reset-from" data-url="core/forget_password.php">
                    <div class="form-group">
                        <label class="form-control-label">{__("Email")}</label>
                        <input name="email" id="email" type="text" class="form-control" required autofocus>
                    </div>
                    <div class="form-group reset-login-section">
                        <span class="reset-login-href">
                            <a href="{$system['system_url']}/signin">Have an account? {_("login")}</a>
                        </span>
                    </div>
                    {if $system['reCAPTCHA_enabled']}
                    <div class="form-group">
                        <!-- reCAPTCHA -->
                        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
                        <div class="g-recaptcha" data-sitekey="{$system['reCAPTCHA_site_key']}"></div>
                        <!-- reCAPTCHA -->
                    </div>
                    {/if}
                    <button type="submit" class="btn btn-md btn-block loginbutton ">
                        <i class="far fa-envelope-open mr10"></i>{__("Send")}
                    </button>
                    <!-- error -->
                    <div class="alert alert-danger x-hidden"></div>
                    <!-- error -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- page content -->

{include file='_footer.tpl'}