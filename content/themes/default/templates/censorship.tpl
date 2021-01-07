{include file='_head_landing.tpl'}
{include file='_header.tpl'}
{include file='_navbar_landingpage.tpl'}
    <!--headerends-->

    <section class="benefit-col subPageWrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/Censorshipsub.svg" class="SubPageGraphics" alt="Convenience" style="margin-left: auto;"/>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="benefit-right-col">
                        <div class="backMainpageWrap">
                            <a href="{$system['system_url']}" class="backMianPage">
                                <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage//images/arrowReadmore.svg" alt="">
                                <span>Back to the main page</span>
                            </a>
                        </div>
                        <span class="number">05</span>
                        <h3 class="col-heading">Censorship</h3>
                        <p class="col-text">
                            Have you ever had a post removed as soon as you hit the post button? So have we.
                        </p>
                        <p class="subpageLightText">
                            Social media censorship has reached
                            unprecedented proportions, shaping
                            elections, affecting millions of people and
                            ultimately threatening freedom globally.
                            Stratus was birthed out of the belief
                            that free speech is a sacred right and
                            that a free, unrestricted flow of ideas is
                            crucial for a healthy, free society. Instead of
                            working to censor its users, as other
                            platforms do, Stratus employees are tasked
                            with protecting user’s posts and content.
                            Facilitating a safe, unbiased, censor-free
                            environment.
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
