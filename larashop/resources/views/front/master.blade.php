<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<style>
.greyBg{ margin-top:20px}
.inner_msg{
	clear: both;
	padding: 10px;
	margin: 0 auto;
	width:99%;
	background-color:#efefef;
	border:1px solid #ccc;
	min-height: 150px;
}
.inner_msg p{
	color:#000; font-size:15px;
	text-align: center;

}
.list option{
	margin-top: 10px
}
.inboxMain{
	min-height:400px; background-color:#fff; padding:10px;
	border:1px solid #ccc
}
.inboxRow{
	border-bottom:1px solid #ccc; padding:10px
}
</style>
</head>

<body>
<header id="header" class="hidden-xs">
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-sm-6"><div class="tollNum">Tollfree : 888 888 8888</div></div>
				<div class="col-sm-6">

					<div class="account-link ">

						<ul>
							@if(Auth::check())
							<li><a href="{{url('/inbox')}}" >INBOX(0)</a></li>
							<li><a href="{{url('/home')}}">MY ACCOUNT</a></li>
							<li><a href="{{url('/logout')}}">LOGOUT</a></li>
							@else
							<li><a href="{{url('/login')}}">LOGIN</a></li>
							@endif
							<li><a onclick="javascript:showDiv('slidingDiv');"
								 href="javascript:;">SEARCH</a>
								<div id="slidingDiv" class="srchBox">
									<form action="{{url('search')}}">
									 <input type="text" name="searchData" />
						            <i class="fa fa-search"></i>
											</form>
						        </div>
							</li>

						</ul>
					</div>
				</div>
		    </div>
	    </div>
    </div>
    <div class="container">
    	<div class="row">
    		<div class="col-sm-2">
					<div class="logo">
						<a href="{{url('/')}}" class="logo-container"><img src="{{Config::get('app.url')}}/theme/images/logo.jpg" /></a></div></div>
    		<div class="col-sm-8">
				<div class="nav-link">
					<ul>
						<li><a href="{{url('/products')}}">Products</a>
							<ul class="dropdown">
								 @foreach(App\cats::with('childs')
								 ->where('p_id',0)->get() as $item)
								 @if($item->childs->count()>0)
								 <li>
									 <a href="{{url('products')}}/{{$item->cat_name}}"><h4>{{$item->cat_name}}</h3></a>
									 @foreach($item->childs as $subMenu)
									 <ul>
										 <li><a href="{{url('products')}}/{{$subMenu->cat_name}}">
											 --{{$subMenu->cat_name}}</a></li>
									 </ul>
									 @endforeach
								 </li>
								 @else
								 <li>
									<a href="{{url('products')}}/{{$item->cat_name}}">
										<h4>{{$item->cat_name}}</h4></a>
								 </li>
								 @endif
								 @endforeach

				        </ul>
						</li>

					</ul>
				</div>
		    </div>
		    <div class="col-sm-2">
				<div class="nav-btns">
					<div class="nav-cart">
						<a href="{{url('cart')}}"><img src="{{Config::get('app.url')}}/theme/images/cart.png"/>
						 CART
					 </a>
					</div>
				</div>
		    </div>
		</div>
	</div>
</header>
<header id="header" class=" hidden-sm hidden-md hidden-lg">
	<div class="nav-toggle"><div class="icon-menu"> <span class="line line-1"></span> <span class="line line-2"></span> <span class="line line-3"></span> </div></div>
	<div class="logo"><a href="index.php"><img src="{{Config::get('app.url')}}/theme/images/logo.jpg" alt=""  /></a></div>
	<div class="m-cart">
		<div class="nav-btns">
			<div class="nav-cart">
				<img src="{{Config::get('app.url')}}/theme/images/cart.png"/>
				<span>0</span>
			</div>
		</div>
	</div>
	<div class="nav-container">
		<div class="mob-srch">
           <input type="text" placeholder="Search here..." />
        </div>
		<div>
		    <ul class="topnav">

		        <li><a href="#">Products</a>
		            <ul>
								<li><a href="#">Suspendisse semper</a></li>
				                <li><a href="#">lorem gravida</a></li>
				                <li><a href="#">Vestibulum</a></li>
				                <li><a href="#">Tincidunt </a></li>
				    </ul>
		        </li>


		    </ul>
	        <div class="mob-nav">
	        	<ul>
	        		<li><a href="business-enquiry.php"> <i class="fa fa-th"></i> Bulk Buying</a></li>
                    <li><a href="faq.php"><i class="fa fa-question-circle"></i> Faq's</a></li>
                    <li><a href="testimonials.php"><i class="fa fa-users"></i> Testimonials</a></li>
                    <li><a href="shipping-policy.php"><i class="fa fa-paper-plane"></i> Shipping Policy</a></li>
                    <li><a href="return-policy.php"><i class="fa fa-refresh"></i> Return Policy</a></li>
		          	<div class="clearfix"></div>
		        </ul>
	        </div>
        </div>
	</div>
	<div class="clearfix"></div>
</header>
  @yield('content')

<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-3 col-lg-3 hidden-xs">
          <h5>More Info</h5>
          <div class="ft-link">
            <ul>
              <li><a href="business-enquiry.php">Bulk Buying</a></li>
              <li><a href="faq.php">Faq's</a></li>
              <li><a href="testimonials.php">Testimonials</a></li>
              <li><a href="shipping-policy.php">Shipping Policy</a></li>
              <li><a href="return-policy.php">Return Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3 hidden-xs">
           <h5>Resources</h5>
           <div class="ft-link">
            <ul>
              <li><a href="ayurvedic-doshas.php">Ayurvedic Doshas</a></li>
              <li><a href="gluten-allergy.php">Gluten Allergy</a></li>
              <li><a href="ayurvedic-diet.php">Ayurvedic Diet</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-5 col-lg-4">
          <h5>Newsletter</h5>
          <div class="newsletter">
            <p>Sign up for email to get the latest updates &amp; more.</p>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="enter your email...">
              <span class="input-group-btn">
                <input type="submit" class="btn btn-default" type="button" Value="Subscribe" />
              </span>
            </div>
            <ul class="social">
              <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="youtube"><i class="fa fa-play"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="copyrt">
          &copy; 2017 LaraShop55. All Rights Reserved. <a href="terms-conditions.php">Terms &amp; Conditions</a>
        </div>
      </div>
    </div>
  </div>
</footer>
<script type="text/javascript" src="{{Config::get('app.url')}}/theme/js/html5.js"></script>
<script type="text/javascript" src="{{Config::get('app.url')}}/theme/js/bootstrap.js"></script>
<script type="text/javascript" src="{{Config::get('app.url')}}/theme/js/multiple-accordion.js"></script>
<script type="text/javascript" src="{{Config::get('app.url')}}/theme/js/jquery.nice-select.js"></script>
<script type="text/javascript" src="{{Config::get('app.url')}}/theme/js/jquery.bootstrap-responsive-tabs.js"></script>
<script>
$(function() {
    var html = $('html, body'),
        navContainer = $('.nav-container'),
        navToggle = $('.nav-toggle'),
        navDropdownToggle = $('.has-dropdown');
    // Nav toggle
    navToggle.on('click', function(e) {
        var $this = $(this);
        e.preventDefault();
        $this.toggleClass('is-active');
        navContainer.toggleClass('is-visible');
        html.toggleClass('nav-open');
    });
});
</script>
<script language="JavaScript">
  $(document).ready(function() {
    $(".topnav").accordion({
      accordion:false,
      speed: 500,
      closedSign: '+',
      openedSign: '-'
    });
  });
</script>
<script type="text/javascript">

    $(document).ready(function() {
      $('select').niceSelect();
    //  FastClick.attach(document.body);
    });
</script>
<script>
$('.responsive-tabs').responsiveTabs({
  accordionOn: ['xs', 'sm']
});
</script>
<script type="text/javascript">
  function showDiv(divname){
    closealldivs(divname);
    $("#"+divname).slideToggle();
  }
  function closeMe(trgt)
  {
   $("#slidingDiv"+trgt).toggle();
  }
  function closealldivs(divname){
    for(var i=1; i<=3; i++){
      var abc="slidingDiv"+i;
      if(divname!=abc){
     $("#slidingDiv"+i).hide(); }
  }}
</script>
<script type="text/javascript">
  $('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
</body>
</html>
