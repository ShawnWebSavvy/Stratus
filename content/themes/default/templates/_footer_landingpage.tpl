<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="logo">
          <img src="{$system['system_uploads_assets']}/content/themes/default/images/landingPage/images/logo.png"
            alt="logo" />
        </div>
      </div>
      <div class="col-md-4 col-sm-12 col-12 order-1 order-sm-0">
        <div class="links">
          <ul>
            <li><a href="{$system['system_url']}/static/about">About us</a></li>
            <li><a href="{$system['system_url']}/contacts">Contact Us</a></li>
            <!-- <li><a href="#">Our features</a></li> -->
          </ul>
          <p class="footer-copy-right desktop-view">
            © {date('Y')} Apollo Fintech CDE. Apollo Fintech All Right Reserved.
          </p>
        </div>
      </div>
      <div class="col-md-4 col-sm-12 col-12 text-right order-0 order-sm-1">
        <div class="social-links">
          <ul>
            <li>
              <a href="#"><img
                  src="{$system['system_uploads_assets']}/content/themes/default/images/landingPage/images/fb.svg" /></a>
            </li>
            <li>
              <a href="#"><img
                  src="{$system['system_uploads_assets']}/content/themes/default/images/landingPage/images/twitter.svg" /></a>
            </li>
            <li>
              <a href="#"><img
                  src="{$system['system_uploads_assets']}/content/themes/default/images/landingPage/images/linkedin.svg" /></a>
            </li>
            <li>
              <a href="#"><img
                  src="{$system['system_uploads_assets']}/content/themes/default/images/landingPage/images/trello.svg" /></a>
            </li>
            <li>
              <a href="#"><img
                  src="{$system['system_uploads_assets']}/content/themes/default/images/landingPage/images/pintrest.svg" /></a>
            </li>
            <li>
              <a href="#"><img
                  src="{$system['system_uploads_assets']}/content/themes/default/images/landingPage/images/insta.svg" /></a>
            </li>
          </ul>
        </div>
        <p class="footer-copy-right mobile-view">
          © {date('Y')} Apollo Fintech CDE. Apollo Fintech All Right Reserved.
        </p>

        <ul class="other-links">
          <li>
            <a href="{$system['system_url']}/static/privacy" target="_blank">{__("Privacy Policy")}</a>
          </li>
          <li>
            <a href="{$system['system_url']}/static/terms" target="_blank">{__("Terms and Condition")}</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

{include file='_landing_footerlinks.tpl'}