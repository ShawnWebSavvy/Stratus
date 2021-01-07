<header>
  <nav
    class="navbar navbar-expand-lg navbar-light fixed-top nav-bg navigation-bar"
  >
    <div class="container">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
        <span class="close"> <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/ic_close.svg" /></span>
      </button>

      <a class="navbar-brand landing-logo" href="{$system['system_url']}">
        <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/logo.png" alt="logo"/>
    </a>
      <div class="mobile-signup">
          
          <!-- <a href ="{$system['system_url']}/signup" class="signupBtnLanding" >
            <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/signup.svg" alt="signup" />
          </a> -->

          <a href ="{$system['system_url']}/signin" >
            <img src="{$system['system_url']}/content/themes/{$system['theme']}/images/landingPage/images/signup.svg" alt="signup" />
        </a>

      </div>
      <div class="collapse navbar-collapse landing-menu" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="{$system['system_url']}/static/about">About us <span class="sr-only">(current)</span></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Our features</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="{$system['system_url']}/monetization">Contact Us</a>
          </li>
        </ul>

        <!-- <button
          class="btn my-2 my-sm-0 mr-4 signup-btn d-md-none d-lg-block d-sm-none"
          type="button">
          Sign up
        </button> -->
        <a href="{$system['system_url']}/signup"
            class="btn my-2 my-sm-0 mr-4 signup-btn d-md-none d-lg-block d-sm-none">{__("Sign up")}</a>
        <a href="{$system['system_url']}/signin"
          class="btn my-2 my-sm-0 signup-btn d-md-none d-lg-block d-sm-none">
          Login
        </a>
      </div>
    </div>
  </nav>
</header>
