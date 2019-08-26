<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$title}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    @include('layouts.header.styles.styles')

</head>
<body class="sidebar-mini fixed">
<div class="loader-bg">
    <div class="loader-bar">
    </div>
</div>
<div class="wrapper">

    <!-- Navbar-->
    <header class="main-header-top hidden-print">
        {{--Logo--}}
        @include('layouts.header.logo.logo')


        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button--><a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu f-right">
                {{--<div class="upgrade-button m-r-10">
                    <a href="https://themeforest.net/item/able-pro-responsive-bootstrap-4-admin-template/19300403?ref=phoenixcoded" class="icon-circle txt-white btn btn-sm btn-warning upgrade-button">
                        <span>Upgrade To Pro</span>
                    </a>
                </div>--}}

                {{--Top navigation includes Search, Chat, Notifications etc--}}
                @include('layouts.navigation.top-navigation.topnavigation')

                <!-- search -->
                {{--<div id="morphsearch" class="morphsearch">
                    <form class="morphsearch-form">

                        <input class="morphsearch-input" type="search" placeholder="Search..."/>

                        <button class="morphsearch-submit" type="submit">Search</button>

                    </form>
                    <div class="morphsearch-content">
                        <div class="dummy-column">
                            <h2>People</h2>
                            <a class="dummy-media-object" href="#!">
                                <img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan"/>
                                <h3>Sara Soueidan</h3>
                            </a>

                            <a class="dummy-media-object" href="#!">
                                <img class="round" src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G" alt="Shaun Dona"/>
                                <h3>Shaun Dona</h3>
                            </a>
                        </div>
                        <div class="dummy-column">
                            <h2>Popular</h2>
                            <a class="dummy-media-object" href="#!">
                                <img src="assets/images/avatar-1.png" alt="PagePreloadingEffect"/>
                                <h3>Page Preloading Effect</h3>
                            </a>

                            <a class="dummy-media-object" href="#!">
                                <img src="assets/images/avatar-1.png" alt="DraggableDualViewSlideshow"/>
                                <h3>Draggable Dual-View Slideshow</h3>
                            </a>
                        </div>
                        <div class="dummy-column">
                            <h2>Recent</h2>
                            <a class="dummy-media-object" href="#!">
                                <img src="assets/images/avatar-1.png" alt="TooltipStylesInspiration"/>
                                <h3>Tooltip Styles Inspiration</h3>
                            </a>
                            <a class="dummy-media-object" href="#!">
                                <img src="assets/images/avatar-1.png" alt="NotificationStyles"/>
                                <h3>Notification Styles Inspiration</h3>
                            </a>
                        </div>
                    </div><!-- /morphsearch-content -->
                    <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
                </div>--}}
                <!-- search end -->
            </div>
        </nav>
    </header>

    <!-- Side-Nav-->
    @include('layouts.navigation.side-navigation.sidenavigation')

    <!-- Sidebar chat start -->
    @include('layouts.navigation.side-navigation.sidechat')
    @include('layouts.navigation.top-navigation.chat.innerchat')
    <!-- Sidebar chat end-->

    <div class="content-wrapper">
        <div class="container-fluid">
            @include('layouts.header.breadcrumps')
            @include('messages.flashmessage')
            @yield('contents')

        </div>

    </div>
</div>


<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 9]>
      <div class="ie-warning">
          <h1>Warning!!</h1>
          <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
          <div class="iew-container">
              <ul class="iew-download">
                  <li>
                      <a href="http://www.google.com/chrome/">
                          <img src="assets/images/browser/chrome.png" alt="Chrome">
                          <div>Chrome</div>
                      </a>
                  </li>
                  <li>
                      <a href="https://www.mozilla.org/en-US/firefox/new/">
                          <img src="assets/images/browser/firefox.png" alt="Firefox">
                          <div>Firefox</div>
                      </a>
                  </li>
                  <li>
                      <a href="http://www.opera.com">
                          <img src="assets/images/browser/opera.png" alt="Opera">
                          <div>Opera</div>
                      </a>
                  </li>
                  <li>
                      <a href="https://www.apple.com/safari/">
                          <img src="assets/images/browser/safari.png" alt="Safari">
                          <div>Safari</div>
                      </a>
                  </li>
                  <li>
                      <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                          <img src="assets/images/browser/ie.png" alt="">
                          <div>IE (9 & above)</div>
                      </a>
                  </li>
              </ul>
          </div>
          <p>Sorry for the inconvenience!</p>
      </div>
      <![endif]-->
<!-- Warning Section Ends -->

<!-- Required Jqurey -->

@include('layouts.footer.scripts.scripts')


<script>
    var $window = $(window);
    var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
            nav.addClass('active');
        }
        else {
            nav.removeClass('active');
        }
    });
    $('.alert').fadeOut(3000)

    //setInterval(function(){ $('.alert').fadeOut; }, 3000);
</script>
</body>

</html>
