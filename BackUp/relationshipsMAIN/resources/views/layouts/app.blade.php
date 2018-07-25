<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Site</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/open-iconic-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript">
      /*var zero = 0;
      $(document).ready(function(){
        $(window).on('scroll', function(){
          $('.navbar').toggleClass('hide', $(window).scrollTop() > zero);

          zero = $(window).scrollTop();
        })
      })*/

      /*$(function () {
        var lastScrollTop = 0;
        var $navbar = $('.navbar');

        $(window).scroll(function(event){
          var st = $(this).scrollTop();

          if (st > lastScrollTop) { // scroll down
            
            // use this is jQuery full is used
            $navbar.fadeOut()
            
            // use this to use CSS3 animation
            // $navbar.addClass("fade-out");
            // $navbar.removeClass("fade-in");
            
            // use this if no effect is required
            // $navbar.hide();
          } else { // scroll up
            
            // use this is jQuery full is used
            $navbar.fadeIn()
            
            // use this to use CSS3 animation
            // $navbar.addClass("fade-in");
            // $navbar.removeClass("fade-out");
            
            // use this if no effect is required
            // $navbar.show();
          }
          lastScrollTop = st;
        });
      });*/

      /*$(function () {
        var lastScrollTop = 0;
        var $navbar = $('.navbar');
        var navbarHeight = $navbar.outerHeight();
        var movement = 0;
        var lastDirection = 0;

        $(window).scroll(function(event){
          var st = $(this).scrollTop();
          movement += st - lastScrollTop;

          if (st > lastScrollTop) { // scroll down
            if (lastDirection != 1) {
              movement = 0;
            }
            var margin = Math.abs(movement);
            if (margin > navbarHeight) {
              margin = navbarHeight;
            }
            margin = -margin;
            $navbar.css('margin-top', margin+"px")

            lastDirection = 1;
          } else { // scroll up
            if (lastDirection != -1) {
              movement = 0;
            }
            var margin = Math.abs(movement);
            if (margin > navbarHeight) {
              margin = navbarHeight;
            }
            margin = margin-navbarHeight;
            $navbar.css('margin-top', margin+"px")

            lastDirection = -1;
          }

          lastScrollTop = st;
          // console.log(margin);
        });
      });*/
    </script>
</head>
<body>
    <div class="header">
      <img class="card-img-top" src="/images/walkman/wm.png" style="width: 100px; height: 50px;">
    </div>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" 
         style="position: sticky; top: 0; width: 100%;">
      <ul>
        <li class="nav-item" style="list-style-type:none">
          <span style="padding-left: 60px;"></span>
        </li>
      </ul>
      <a class="active" href="{{ URL::to('/') }}">
        <span class="oi oi-home" aria-hidden="true" style="font-size: 20px;"></span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <span style="padding-left: 25px;"></span>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('products') }}">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ URL::to('categories') }}">Categories</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" style="float: right;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" 
        style="border-radius: 50px;">
        <a class="nav-link" href="#"><span class="oi oi-magnifying-glass" aria-hidden="true" 
        style="color: white;"></span></a>
        </form>

        <li class="nav-item dropdown" style="list-style-type:none">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Config::get('app.locale') }}
              <span class="caret"></span>
            </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownLang">
            <li>
              <a class="dropdown-item" href="{{ URL::to('change/en') }}">
                {{ trans('layouts.English') }}
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ URL::to('change/th') }}">
                {{ trans('layouts.Thai') }}
              </a>
            </li>
          </ul>
        </li>

        <ul>
          <li class="nav-item" style="list-style-type:none">
            <span style="padding-right: 60px;"></span>
          </li>
        </ul>

      </div>
    </nav>

    <main class="py-4">

      @yield('content')

      <footer class="page-footer font-small unique-color-dark mt-4" 
              style="background: #333; color: white;">
        <div style="background-color: #6351ce;">
          <div class="container">
            <div class="row py-4 d-flex align-items-center">
              <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                <h6 class="mb-0">Get connected with us on social networks!</h6>
              </div>
              <div class="col-md-6 col-lg-7 text-center text-md-right">
                <a class="fb-ic">
                  <i class="fa fa-facebook white-text mr-4"> </i>
                </a>
                <a class="tw-ic">
                  <i class="fa fa-twitter white-text mr-4"> </i>
                </a>
                <a class="gplus-ic">
                  <i class="fa fa-google-plus white-text mr-4"> </i>
                </a>
                <a class="li-ic">
                  <i class="fa fa-linkedin white-text mr-4"> </i>
                </a>
                <a class="ins-ic">
                  <i class="fa fa-instagram white-text"> </i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="container text-center text-md-left mt-5">
          <div class="row mt-3">
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <h6 class="text-uppercase font-weight-bold">Company name</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <h6 class="text-uppercase font-weight-bold">Products</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <a href="#!">MDBootstrap</a>
              </p>
              <p>
                <a href="#!">MDWordPress</a>
              </p>
              <p>
                <a href="#!">BrandFlow</a>
              </p>
              <p>
                <a href="#!">Bootstrap Angular</a>
              </p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <h6 class="text-uppercase font-weight-bold">Useful links</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <a href="#!">Your Account</a>
              </p>
              <p>
                <a href="#!">Become an Affiliate</a>
              </p>
              <p>
                <a href="#!">Shipping Rates</a>
              </p>
              <p>
                <a href="#!">Help</a>
              </p>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <h6 class="text-uppercase font-weight-bold">Contact</h6>
              <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p>
                <i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
              <p>
                <i class="fa fa-envelope mr-3"></i> info@example.com</p>
              <p>
                <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
              <p>
                <i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
            </div>
          </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
          <a href="https://mdbootstrap.com/bootstrap-tutorial/"> MDBootstrap.com</a>
        </div>
      </footer>

    </main>

</body>

</html>