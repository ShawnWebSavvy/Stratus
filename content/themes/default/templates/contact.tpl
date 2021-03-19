{include file='_head.tpl'}
{include file='_header.tpl'}

<!-- page content -->
<div class="container staticPageBg {if $user->_logged_in}offcanvas{/if}" style="min-height: calc(100vh - 98px);">
    <div class="staticPageTitle">
        {__("Contact Us")}
        <p style="text-shadow: 2px 1px 4px rgba(0, 0, 0, 1);font-size: 15px;">{__("Contact us and we’ll get back to you as soon as possible")}</p>
    </div>
    <div class="row">
        <!-- content panel -->
        <div class="col-12 col-md-8 col-lg-6 col-xl-5 mx-md-auto {if $user->_logged_in}offcanvas-mainbar{/if}">
            <div class="card px-4 py-4 shadow">
                <div class="card-body">
                    <form class="js_ajax-forms " data-url="core/contact.php">
                        <div class="form-group">
                            <label class="form-control-label">{__("Name")} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">{__("Email")} <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">{__("Subject")} <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">{__("Message")} <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="message" rows="5"></textarea>
                        </div>
                        {if $system['reCAPTCHA_enabled']}
                            <div class="form-group">
                                <!-- reCAPTCHA -->
                                <script src='https://www.google.com/recaptcha/api.js' async defer></script>
                                <div class="g-recaptcha" data-sitekey="{$system['reCAPTCHA_site_key']}"></div>
                                <!-- reCAPTCHA -->
                            </div>
                        {/if}
                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-block rounded-pill btn-primary">
                                <i class="far fa-envelope-open mr10"></i>{__("Send")}
                            </button>
                        </div>
                        <!-- success -->
                        <div class="alert alert-success x-hidden"></div>
                        <!-- success -->
                        <!-- error -->
                        <div class="alert alert-danger text-center x-hidden"></div>
                        <!-- error -->
                    </form>
                </div>
            </div>
        </div>
        <!-- content panel -->
    </div>
</div>
<!-- page content -->
<div class="staticPageFooter">
{include file='_footer.tpl'}
</div>