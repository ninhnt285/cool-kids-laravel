<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="author" content="TheBigDev LTD">
  <meta name="copyright" content="TheBigDev LTD">
  <meta name="description" content="Cool Kids App">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{--  <meta name="apple-itunes-app" content="app-id=1486604821">--}}
  <!-- SITE TITLE -->
  <title>Cool Kids App</title>
  <!-- FAVICON AND TOUCH ICONS  -->
  <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicon.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicon.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('img/favicon.png') }}">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:300,400,500,700,900" rel="stylesheet">
  <!-- BOOTSTRAP CSS -->
  <link href="{{ asset('css/welcome/bootstrap.min.css') }}" rel="stylesheet" />
  <!-- FONT ICONS -->
  <link href="{{ asset('css/welcome/fontawesome.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/welcome/flaticon.css') }}" rel="stylesheet" />
  <!-- PLUGINS STYLESHEET -->
  <link href="{{ asset('css/welcome/magnific-popup.css') }}" rel="stylesheet">
  <link href="{{ asset('css/welcome/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/welcome/owl.theme.default.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/welcome/slick.css') }}" rel="stylesheet">
  <link href="{{ asset('css/welcome/slick-theme.css') }}" rel="stylesheet">

  <!-- On Scroll Animations -->
  <link href="{{ asset('css/welcome/animate.css') }}" rel="stylesheet">

  <!-- TEMPLATE CSS -->
  <link href="{{ asset('css/welcome/spinner.css') }}" rel="stylesheet">
  <link href="{{ asset('css/welcome/style.css') }}" rel="stylesheet">

  <!-- RESPONSIVE CSS -->
  <link href="{{ asset('css/welcome/responsive.css') }}" rel="stylesheet">
</head>

<body>
<!-- PRELOADER SPINNER
============================================= -->
<div id="loader-wrapper">
  <div id="loader">
    <div class="cssload-spinner"></div>
  </div>
</div>

<!-- PAGE CONTENT
============================================= -->
<div id="page" class="page">

  <!-- HEADER
      ============================================= -->
  <header id="header" class="header">
    <nav class="navbar fixed-top navbar-expand-md hover-menu bg-tra white-scroll">
      <div class="container">
        <!-- LOGO IMAGE -->
        <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 218 x 46 pixels) -->
        <a class="navbar-brand logo-black"><img src="{{ asset('img/logo-shadow.png') }}" alt="header-logo" width="133" height="100"></a>

        <!-- Responsive Menu Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-bar-icon"><svg class="svg-inline--fa fa-bars fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg><!-- <i class="fas fa-bars"></i> --></span>
        </button>

        <!-- Navigation Menu -->
        <div id="navbarContent" class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            @auth
              <li class="nav-item nl-simple"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
            @endauth
            @guest
              <li class="nav-item nl-simple"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            @endguest
            <li class="nav-item nl-simple"><a class="nav-link" href="#info-5">Our Mission</a></li>
            <li class="nav-item nl-simple"><a class="nav-link" href="#pricing-1">Locations</a></li>
            <li class="nav-item nl-simple"><a class="nav-link" href="#info-7">Supporters</a></li>

            {{-- <li class="nav-item nl-simple"><a class="nav-link" href="#faqs-1">Jobs</a></li> --}}

            <!--AppStore Badge -->
            <li class="nav-item">
              <a href="#" class="header-store">
                <img class="appstore-header" src="{{ asset('img/welcome/appstore.png') }}" alt="appstore-logo">
              </a>
            </li>

            <!-- Google Play Badge  -->
            <li class="nav-item">
              <a href="#" class="header-store">
                <img class="googleplay-header" src="{{ asset('img/welcome/googleplay.png') }}" alt="googleplay-logo">
              </a>
            </li>
          </ul>
        </div>	<!-- End Navigation Menu -->
      </div>	  <!-- End container -->
    </nav>	   <!-- End navbar -->
  </header>	<!-- END HEADER -->

  <!-- HERO-15
============================================= -->
  <section id="hero-15" class="bg-skyblue hero-section division">
    <div class="container">
      <div class="row">


        <!-- HERO TEXT -->
        <div class="col-md-6 col-xl-5 offset-xl-1">
          <div class="hero-txt mb-40 wow fadeInUp" data-wow-delay="0.3s">
{{--            <h1 class="h1-header">Cool Kids App</h1>--}}
            <!-- HERO APP LOGO -->
            <div class="hero-app-logo">
              <div class="d-flex align-items-center">
                <img class="img-fluid" src="{{ asset('img/logo-shadow.png') }}" alt="App Logo" width="327" height="69">
              </div>
            </div>

            <!-- Title -->
            <h2 class="h2-header">Cool Kids App</h2>

            <!-- Text -->
            <p class="p-lg">Supporting the Coolest Kids Fighting Cancer!</p>

            <!-- STORE BADGES -->
            <div class="stores-badge">

              <!-- AppStore -->
              <a href="#" class="store">
                <img class="appstore-original" src="{{ asset('img/welcome/appstore.png') }}" alt="appstore-logo">
              </a>

              <!-- Google Play -->
              <a href="#" class="store">
                <img class="googleplay-original" src="{{ asset('img/welcome/googleplay.png') }}" alt="googleplay-logo" />
              </a>

            </div>	<!-- END STORE BADGES -->

          </div>
        </div>	<!-- END HERO TEXT -->


        <!-- HERO IMAGE -->
        <div class="col-md-6 col-xl-6">
          <div class="hero-6-img text-center mb-40 wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s">
            <img class="img-fluid" src="{{ asset('img/welcome/dashboard.jpg') }}" alt="Cool Kids App">
          </div>
        </div>
      </div>	    <!-- End row -->
    </div>	    <!-- End container -->

    <!-- Bottom Inclined Line -->
    <div class="bg-fixed left-incline"></div>
  </section>	<!-- END HERO-15 -->

  <br><br>
  <h2 style="text-align: center;">Discover Cool Kids App</h2>
  <!-- INFO-5
  ============================================= -->
  <section id="info-5" class="info-5-row pt-100 info-section">
    <div class="pt-100 bg-inner division">
      <div class="container">
        <div class="row d-flex align-items-center">

          <!-- IMAGE BLOCK -->
          <div class="col-md-6">
            <div class="info-5-img pl-45 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
              <img class="img-fluid" src="{{ asset('img/welcome/our-mission.jpg') }}" alt="Cool Kids App">
            </div>
          </div>


          <!-- TEXT BLOCK -->
          <div class="col-md-6">
            <div class="txt-block pc-45 mb-40 wow fadeInUp" data-wow-delay="0.3s">

              <!-- Title -->
              <h3 class="h3-lg">Our Mission</h3>

              <p>Our mission is devoted to improving the quality of life for pediatric oncology patients,
                survivors and their families by focusing on the academic, social and emotional needs brought
                on by a cancer diagnosis.</p>

            </div>
          </div>	<!-- END CONTENT TXT -->


        </div>	  <!-- End row -->
      </div>	   <!-- End container -->
    </div>		<!-- End Inner Background -->
  </section>	<!-- END INFO-5 -->

  <!-- HERO-2
        ============================================= -->
  <section id="pricing-1" class="hero-section">
    <!-- HERO TEXT -->
    <div class="hero-2-txt division">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-xl-8 offset-md-1 offset-xl-2 text-center">
            <!-- Title -->
            <h3 class="h3-lg">Locations</h3>
            <br>
            <!-- Text -->
          </div>
        </div>	 <!-- End row -->

        <div class="row">
          <div class="col-lg-10 col-xl-10 offset-lg-1 offset-xl-1">
            <div class="row">
              <div class="col-md-4">
                <div class="pricing-table wow fadeInRight">
                  <div class="price-icon">
                    <img class="img-150" src="{{ asset('img/welcome/MDCover.png') }}" alt="MD">
                  </div>
                  <div class="pricing-plan mb-10">
                    <h5 class="h5-lg">Maryland Clubhouse</h5>
                    <p>In Honor of Ken Singleton</sup>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="pricing-table wow fadeInRight">
                  <div class="price-icon">
                    <img class="img-150" src="{{ asset('img/welcome/NCCover.jpg') }}" alt="NC">
                  </div>
                  <div class="pricing-plan mb-10">
                    <h5 class="h5-lg">North Carolina Clubhouse</h5>
                    <p>In Honor of Dan Jansen</p>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="pricing-table wow fadeInRight">
                  <div class="price-icon">
                    <img class="img-fluid" src="{{ asset('img/welcome/TNCover.jpg') }}" alt="TN">
                  </div>
                  <div class="pricing-plan mb-10">
                    <h5 class="h5-lg">Cool Kids Tennessee</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>	 <!-- End container -->
    </div> 	  <!-- END HERO TEXT -->
  </section>	<!-- END HERO-2 -->


  <!-- FOOTER-2
============================================= -->
  <footer id="footer-2" class="wide-50 footer division">
    <div class="container">
      <!-- FOOTER CONTENT -->
      <div class="row">
        <!-- FOOTER STORE BADGES -->
        <div class="col-md-4 col-lg-3">
          <div class="footer-stores-badge mb-40">

            <!-- AppStore -->
            <a href="#" class="store">
              <img class="appstore-original" src="{{ asset('img/welcome/appstore.png') }}" alt="appstore-logo">
            </a>

            <!-- Google Play -->
            <a href="#" class="store">
              <img class="googleplay-original" src="img/welcome/googleplay.png" alt="googleplay-logo" />
            </a>

            <!-- Aamazon Market
            <a href="#" class="store">
              <img class="amazon-original" src="images/store_badges/amazon.png" alt="amazon-logo" />
            </a>  -->

            <!-- Windows Market
            <a href="#" class="store">
              <img class="windows-original" src="images/store_badges/windows.png" alt="windows-logo" />
            </a> -->

          </div>
        </div>	<!-- END FOOTER STORE BADGES -->

        <!-- FOOTER LINKS -->
        <div class="col-md-3 col-lg-3 offset-lg-1">
          <div class="footer-links">
            <!-- Title -->
            <h5 class="h5-sm">About</h5>
            <!-- Footer Links -->
            <ul class="foo-links clearfix">
              <li><p><a href="{{ url('privacy-policy') }}">Privacy Policy</a></p></li>
              <li><p><a href="{{ url('tos') }}">Terms of Service</a></p></li>
              <li><p><a href="{{ url('legal-information') }}">Legal Information</a></p></li>
            </ul>
          </div>
        </div>

        <!-- FOOTER LINKS -->
        <div class="col-md-2 col-lg-3">
          <div class="footer-links">
            <!-- Title -->
            <h5 class="h5-sm">Help</h5>
            <!-- Footer Links -->
            <ul class="foo-links clearfix">
              <li><p><a href="#">FAQ</a></p></li>
            </ul>
          </div>
        </div>

        <!-- FOOTER SOCIAL LINKS -->
        <div class="col-md-3 col-lg-2">
          <div class="footer-socials-links text-right mb-25">

            <h5 class="h5-sm"><a href="https://www.facebook.com/CoolKidsFoundation/" class="foo-facebook">Facebook</a></h5>
            <h5 class="h5-sm"><a href="https://twitter.com/coolkidsorg/" class="foo-twitter">Twitter</a></h5>
            <h5 class="h5-sm"><a href="https://www.instagram.com/coolkidscampaign/" class="foo-instagram">Instagram</a></h5>
            <h5 class="h5-sm"><a href="https://www.pinterest.com/coolkidsorg/" class="foo-pinterest">Pinterest</a></h5>
            <!--
            <h5 class="h5-sm"><a href="https://www.instagram.com/coolkidscampaign/" class="foo-linkedin">Linkedin</a></h5>
            <h5 class="h5-sm"><a href="#" class="google-plus">Dribbble</a></h5>
            <h5 class="h5-sm"><a href="#" class="youtube">Twitter</a></h5>
            <h5 class="h5-sm"><a href="#" class="foo-tumblr">Instagram</a></h5>
            <h5 class="h5-sm"><a href="#" class="foo-vk">Dribbble</a></h5>
            -->
          </div>
        </div>
      </div>	 <!-- END FOOTER CONTENT -->

      <!-- BOTTOM FOOTER -->
      <div class="bottom-footer">
        <div class="row">
          <!-- FOOTER COPYRIGHT -->
          <div class="col-md-12">
            <div class="footer-copyright">
              <p class="p-sm">&copy;<script>document.write(new Date().getFullYear())</script> Cool Kids Apps resulting in self enhancement LTD. All Rights Reserved</p>
            </div>
          </div>
        </div>
      </div>	<!-- END BOTTOM FOOTER -->
    </div>	    <!-- End container -->
  </footer>	<!-- END FOOTER-2 -->
</div>

<!-- EXTERNAL SCRIPTS
============================================= -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-git.min.js"></script>
<script src="{{ asset('js/welcome/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/welcome/fontawesome.min.js') }}"></script>
<script src="{{ asset('js/welcome/modernizr.custom.js') }}"></script>
<script src="{{ asset('js/welcome/jquery.easing.js') }}"></script>
<script src="{{ asset('js/welcome/retina.js') }}"></script>
<script src="{{ asset('js/welcome/jquery.appear.js') }}"></script>
<script src="{{ asset('js/welcome/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/welcome/jquery.scrollto.js') }}"></script>
<script src="{{ asset('js/welcome/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/welcome/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/welcome/slick.min.js') }}"></script>
<script src="{{ asset('js/welcome/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/welcome/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/welcome/contact-form.js') }}"></script>
<script src="{{ asset('js/welcome/quick-form.js') }}"></script>
<script src="{{ asset('js/welcome/comment-form.js') }}"></script>
<script src="{{ asset('js/welcome/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/welcome/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/welcome/wow.js') }}"></script>

<!-- Custom Script -->
<script src="{{ asset('js/welcome/custom.js') }}"></script>

<script>
  new WOW().init();
</script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!-- [if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js" type="text/javascript"></script>
<![endif] -->
</body>
</html>
