<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<!-- moviesingle07:38-->

<head>
	<!-- Basic need -->
	<title>{{$movie->movie_name}}</title>
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
	<link rel="stylesheet" href="/css/customselect.css">

</head>

<body>
	<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
		<div class="container">

			<a class="navbar-brand" href="{{ url('/') }}">
				Pali Movies
			</a>
			<a class="navbar-brand" href="{{ url('/movies') }}">
				List Of Movies
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
	<div class="hero mv-single-hero" style="background: url('../img/{{$movie->id}}.jpg') no-repeat;
  height: 598px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>

	<div class="page-single movie-single movie_single">
		<div class="container">
			<div class="row ipad-width2">
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="movie-img sticky-sb">

					</div>
				</div>
				<div class="col-md-8 col-sm-12 col-xs-12">
					<div class="movie-single-ct main-content">
						<h1 class="bd-hd">{{$movie->movie_name}} <span>{{$movie->movie_year}}</span></h1>
						@if(Auth::user())
						@if($fav==0)

						<form method="POST" action="/movies/addremovetofav/{{$movie->id}}" id="myform">
							@csrf
							<div class="social-btn">
								<a onclick="document.getElementById('myform').submit()" name="faved" value="1" href="#" class="parent-btn"><i class="ion-heart"></i> Add to Your watchlist</a>
							</div>
						</form>
						@endif
						@if($fav==1)
						<form method="POST" action="/movies/addremovetofav/{{$movie->id}}" id="myform">
							@csrf
							<div class="social-btn">
								<a onclick="document.getElementById('myform').submit()" style="color:chartreuse" name="faved" value="1" href="#" class="parent-btn"><i class="ion-heart" style="color:chartreuse"></i> Added to watchlist</a>
							</div>
						</form>
						@endif
						@endif
						<h2 class="bd-hd" style="font-size:20px" >Score:</h2>

						<div class="movie-rate">

							<div class="rate-star">
							@if (Auth::user())
								<p>Rate This Movie: </p>
								<div class="rate">
									<form action="/movies/setrate/{{$movie->id}}" method="POST">
									@csrf
									<select onchange="this.form.submit()" style="margin-right: 5%; " name="rate">
										<option disabled selected>rate</option>
										<option  value="1">1</option>
										<option  value="2">2</option>
										<option  value="3">3</option>
										<option  value="4">4</option>
										<option  value="5">5</option>
									</select>
									</form>
								</div>
								&nbsp;&nbsp;&nbsp;&nbsp;
								@endif
								<?php
								for ($i = 1; $i <= $score; $i++)
									echo "<i class='ion-ios-star'></i>";
								for ($i = 1; $i <= 5 - $score; $i++)
									echo "<i class='ion-ios-star-outline'></i>";

								?>


							</div>

						</div>

						</br></br></br></br>

						<div class="movie-tabs">
							<div class="tabs">
								<div class="tab-content">
									<div id="overview" class="tab active">
										<div class="row">

											<div class="col-md-8 col-sm-12 col-xs-12">
												<div class="title-hd-sm">
													<h4>story</h4>
												</div>
												<p>{{$movie->movie_story}}</p>
												<div class="title-hd-sm">
													<h4>Comments</h4>
												</div>
												@foreach ($comment as $c )

												<!-- movie user review -->
												<div class="mv-user-review-item">
													<h3>
														@foreach($user as $u)
														@if($c->uid==$u->id)
														@break
														@endif
														@endforeach
														{{$u->name}}

													</h3>
													<p>{{$c->cm}}</p>
												</div>
												<!-- end movie user review -->
												<br>
												@endforeach
												<div class="mv-user-review-item">
													<h3>
														Write your review:

													</h3>
													@if(Auth::user())
													<form method="POST" action="/movies/comment/{{$movie->id}}">
														@csrf
														<textarea style="height:20%" name="userreview"></textarea>
														<button type="submit" style="
                                                     background-color:#dd003f;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Send</button>
													</form>
													@endif
												</div>
											</div>
											<div class="col-md-4 col-xs-12 col-sm-12">
												<div class="sb-it">
													<h6>Director: </h6>
													<p><a href="#">{{$movie->movie_director}}</a></p>
												</div>

												<div class="sb-it">
													<h6>Stars: </h6>
													<p><a href="#">{{$movie->movie_casts}}</a> </p>
												</div>
												<div class="sb-it">
													<h6>Genres:</h6>
													<p><a href="#">{{$movie->movie_genre}} </a></p>
												</div>



											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer section-->

			<!-- end of footer section-->

			<script src="/main/js/jquery.js"></script>
			<script src="/main/js/plugins.js"></script>
			<script src="/main/js/plugins2.js"></script>
			<script src="/main/js/custom.js"></script>
</body>

<!-- moviesingle11:03-->

</html>