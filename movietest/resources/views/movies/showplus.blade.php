<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<!-- movielist_light16:30-->

<head>
  <!-- Basic need -->
  <title>Movies list</title>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <link rel="profile" href="#">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!--Google Font-->
  <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
  <!-- Mobile specific meta -->
  <meta name=viewport content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone-no">

  <!-- CSS files -->

  <link rel="stylesheet" href="/main/css/plugins.css">
  <link rel="stylesheet" href="/main/css/style.css">

</head>

<body>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
		<div class="container">
			
			<a class="navbar-brand" href="{{ url('/') }}">
				Pali Movies |
			</a>
			<a class="navbar-brand" href="{{ url('/movies') }}">
				List Of Movies |
			</a>
			<a class="navbar-brand" href="{{ url('/movies') }}">
				About Us
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Left Side Of Navbar -->
				<ul class="navbar-nav mr-auto">

				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="navbar-nav ml-auto">
					<!-- Authentication Links -->
					@guest
					@if (Route::has('login'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@endif

					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
					</li>
					@endif
					@else
				
					@if (Auth::user()&& Auth::user()->id=='4')
					<li class="nav-item dropdown">
						<a class="nav-link " href="/movies/create" role="button">
							Add a movie
						</a>
					</li>
					@endif
		
					<li class="nav-item dropdown">
						<a class="nav-link " href="/watchlist" role="button">
							Watchlist
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link " href="/dashboard" role="button">
							Dashboard
						</a>
					</li>
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }}
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>

					</li>

					@endguest
				</ul>
			</div>
		</div>
	</nav>
  <div class="buster-light">
    <div class="hero common-hero">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="hero-ct">
              <h1> movies list</h1>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="page-single movie_list">
      <div class="container">
        <div class="row ipad-width2">
          <div class="col-md-8 col-sm-12 col-xs-12">
		  @foreach ($movies as $m)
		  <div class="movie-item-style-2">
              <img src="img/{{$m->id}}b.jpg" alt="">
              <div class="mv-item-infor">
                <h6><a href="movies/{{$m->id}}">{{$m->movie_name}} <span>{{$m->movie_year}}</span></a></h6>
                <p class="describe">{{$m->movie_story}}</p>

                <p>Director: {{$m->movie_director}}</p>
                <p>Stars: {{$m->movie_casts}} </p>
                <br>
                @if (Auth::user()&& Auth::user()->id=='4')
                <form action="/movies/{{$m->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" style="
                    background-color:#dd003f;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Delete</button>

                </form>

                @endif
              </div>
          </div>
		  @endforeach
        </div>
        <br>


      </div>
    </div>
  </div>



  <script src="/main/js/jquery.js"></script>
  <script src="/main/js/plugins.js"></script>
  <script src="/main/js/plugins2.js"></script>
  <script src="/main/js/custom.js"></script>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>





</body>

</html>