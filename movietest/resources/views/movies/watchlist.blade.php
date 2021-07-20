@extends('layouts.app')

@section('content')

<head>
	<title>Open Pediatrics</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

	<!--Google Font-->
	<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="main/css/plugins.css">
	<link rel="stylesheet" href="main/css/style.css">
</head>

<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>{{Auth::user()->name}}’s Watchlist</h1>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width2">
			<br> <br> <br> <br> <br> <br>

			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">

					<div class="user-fav">
						<p>Account Details</p>
						<ul>
							<li><a href="/dashboard">Profile</a></li>
							<li class="active"><a href="/watchlist">watchlist</a></li>
						</ul>
					</div>

				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">

				<div class="flex-wrap-movielist grid-fav">
					@foreach ($movie as $m)
					<div class="movie-item-style-2 movie-item-style-1 style-3">
						<img src="/img/{{$m->mid}}b.jpg" alt="">
						<div class="hvr-inner">
							<a href="/movies/{{$m->mid}}"> Read more <i class="ion-android-arrow-dropright"></i> </a><br>
						</div>
						<div class="mv-item-infor">
							<h6><a href="moviesingle.html">{{$m->movie_name}}</a></h6>
						</div>
						<form method="POST" action="/watchlist/{{$m->mid}}" id="myform">
							@csrf
							<div class="mv-item-infor">
								@if($m->watched==1)
								<input name="mid"  type="submit" value="Watched">
								@else
								<input name="mid" type="submit" value="Not Watched ">
								@endif
							</div>
						</form>
					</div>
					@endforeach
				</div>

			</div>
		</div>
	</div>
</div>

<script src="main/js/jquery.js"></script>
<script src="main/js/plugins.js"></script>
<script src="main/js/plugins2.js"></script>
<script src="main/js/custom.js"></script>
</body>

<!-- userfavoritegrid13:49-->
@endsection