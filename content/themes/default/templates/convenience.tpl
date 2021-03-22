{include file='_head_landing.tpl'}
{include file='_header.tpl'}
{include file='_navbar_landingpage.tpl'}

    <!--headerends-->

    <section class="benefit-col subPageWrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/ConvenienceSub.svg" class="SubPageGraphics" alt="Convenience" style="max-height: 600px;" />
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="benefit-right-col">
                        <div class="backMainpageWrap">
                            <a href="{$system['system_url']}" class="backMianPage">
                                <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/arrowReadmore.svg" alt="">
                                <span>Back to the main page</span>
                            </a>
                        </div>
                        <span class="number">01</span>
                        <h3 class="col-heading">Convenience</h3>
                        <p class="col-text">
                            Stratus will offer historic convenience and security by allowing
                            anyone to utilize one account and one wallet to access an
                            Internet of platforms and services within a secure ecosystem.
                        </p>
                        <p class="subpageLightText">
                            As part of this ecosystem, Stratus will be
                            launching the functionality of the following
                            platforms over the next two years:
                            Facebook, Twitter, Youtube, Instagram, Tik Tok,
                            Amazon (Multi-Vender), Ebay, Linked In,
                            Kickstarter, Travelocity, PayPal, Google
                            Search Engine, Godaddy, Banking Services.
                            And many more.
                        </p>

                        <!-- <a class="read-more-btn" href="#">Read more</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="community-col">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
              <div class="com-left">
                <h2 class="main-heading">A Huge <br>Community</h2>

                <h3 class="col-heading">What are you <br> waiting for?</h3>

                <button onclick="window.open('{$system['system_url']}/signup')" class="learn-btn mt-50 desktop-btn" type="button">Sign Up</button>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-12 text-center">
              <img class="community" src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/community.png" alt="community">

              <button onclick="window.open('{$system['system_url']}/signup')" class="learn-btn mt-50 mobile-btn" type="button">Sign Up</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Get in touch -->
      {include file='_getintouch.tpl'}

    <!-- Footer Landing page -->
      {include file='_footer_landingpage.tpl'}
