{include file='_head_landing.tpl'}
{include file='_header.tpl'}
{include file='_navbar_landingpage.tpl'}

    <section class="benefit-col subPageWrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12">
                    <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/FactCheckersSub.svg" class="SubPageGraphics fact-check-img" alt="Convenience" style="margin-left: auto;"/>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div class="benefit-right-col">
                        <div class="backMainpageWrap">
                            <a href="{$system['system_url']}" class="backMianPage">
                                <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage//images/arrowReadmore.svg" alt="">
                                <span>Back to the main page</span>
                            </a>
                        </div>
                        <span class="number">06</span>
                        <h3 class="col-heading">“Independent” <br> Fact Checkers</h3>
                        <p class="col-text">
                            No. Just no.
                        </p>
                        <p class="subpageLightText">
                            Although the idea of providing users warnings about fake content is noble, we believe there is no way to monitor and maintain a verification team that does not use their bias to determine if a post is misleading.

                        </p>
                        <p class="subpageLightText">
                            There are too many variables to determine the accuracy of most posts and the final decision falls to the moderator. We believe that you are smart enough to determine the validity of content, that you do not need a desk jockey for that."
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
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="com-left">
                <h2 class="main-heading">A Huge <br>Community</h2>

                <h3 class="col-heading">What are you <br> waiting for?</h3>

                <button onclick="window.open('{$system['system_url']}/signup')" class="learn-btn mt-50" type="button">Sign Up</button>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <img class="community" src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/community.png" alt="community">
            </div>
          </div>
        </div>
      </div>

      <!-- Get in touch -->
      {include file='_getintouch.tpl'}

    {include file='_footer_landingpage.tpl'}
