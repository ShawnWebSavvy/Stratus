{include file='_head_landing.tpl'}
{include file='_header.tpl'}
{include file='_navbar_landingpage.tpl'}
    <!--headerends-->

    <section class="benefit-col subPageWrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/dataPrivcySub.png" class="SubPageGraphics" alt="Convenience" />
                    <div class="benefit-right-col leftBottomImage desktop-view">
                        <p class="subpageLightText ">
                            Stratus believes that the only person that has the right to sell your data is you.
                        </p>
                        <p class="col-text ">
                            Not only will Stratus never misuse or sell user data, the data we do hold is never distributed and is always encrypted with military grade encryption.
                        </p>

                        <!-- <a class="read-more-btn" href="#">Read more</a> -->
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="benefit-right-col">
                        <div class="backMainpageWrap">
                            <a href="{$system['system_url']}" class="backMianPage">
                                <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/arrowReadmore.svg" alt="">
                                <span>Back to the main page</span>
                            </a>
                        </div>
                        <span class="number">02</span>
                        <h3 class="col-heading">Data Privacy</h3>
                        <p class="col-text">
                            Stratus believes that one of the biggest
                            threats from big tech platforms is the
                            collection, tracking and sale of user data
                            and personal information.
                        </p>
                        <p class="subpageLightText">
                            Did you know that when you access most
                            social networks and search engines that
                            much, if not all, of your browsing history and
                            personal information is collected, tracked,
                            distributed and sold? As you are tracked,
                            this same information is then used to
                            manipulate you on almost every other
                            platform you visit, through suggestions, ads
                            and everything in between.
                        </p>
                        <p class="subpageLightText">
                            Maybe you have talked to someone in
                            person about a product you want to buy,
                            with your phone in your pocket, only to have
                            ads for that product show up the next time
                            you jump on social media. You’re not alone!
                        </p>
                        <div class="benefit-right-col leftBottomImage mobile-view">
                            <p class="subpageLightText ">
                                Stratus believes that the only person that has the right to sell your data is you.
                            </p>
                            <p class="col-text ">
                                Not only will Stratus never misuse or sell user data, the data we do hold is never distributed and is always encrypted with military grade encryption.
                            </p>

                            <!-- <a class="read-more-btn" href="#">Read more</a> -->
                        </div>
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

              <button  onclick="window.open('{$system['system_url']}/signup')" class="learn-btn mt-50 mobile-btn" type="button">Sign Up</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Get in touch -->
      {include file='_getintouch.tpl'}

    <!-- Footer Landing page -->
      {include file='_footer_landingpage.tpl'}
