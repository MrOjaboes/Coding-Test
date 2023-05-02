<!DOCTYPE html>
<html lang="en">

<head>
  <title>Coding Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="/FrontEnd/css/bootstrap.min.css">
  <link rel="stylesheet" href="/FrontEnd/css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9 d-none d-lg-block">
             </div>
          <div class="col-lg-3 text-right">
            @guest
            @if (Route::has('login'))
            <a href="{{ route('login') }}" class="small mr-3"><span class="icon-unlock-alt"></span> Log In</a>
            <a href="{{ route('register') }}" class="small btn btn-primary px-4 py-2 rounded-0"><span class="icon-users"></span> Register</a>

            @endif
            @endguest


           </div>
        </div>
      </div>
    </div>



    @yield('content')

  </div>
  <!-- .site-wrap -->

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

  <script src="/FrontEnd/js/jquery-3.3.1.min.js"></script>
  <script src="/FrontEnd/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/FrontEnd/js/jquery-ui.js"></script>
  <script src="/FrontEnd/js/popper.min.js"></script>
  <script src="/FrontEnd/js/bootstrap.min.js"></script>
  <script src="/FrontEnd/js/owl.carousel.min.js"></script>
  <script src="/FrontEnd/js/jquery.stellar.min.js"></script>
  <script src="/FrontEnd/js/jquery.countdown.min.js"></script>
  <script src="/FrontEnd/js/bootstrap-datepicker.min.js"></script>
  <script src="/FrontEnd/js/jquery.easing.1.3.js"></script>
  <script src="/FrontEnd/js/aos.js"></script>
  <script src="/FrontEnd/js/jquery.fancybox.min.js"></script>
  <script src="/FrontEnd/js/jquery.sticky.js"></script>
  <script src="/FrontEnd/js/jquery.mb.YTPlayer.min.js"></script>




  <script src="/FrontEnd/js/main.js"></script>

</body>

</html>

