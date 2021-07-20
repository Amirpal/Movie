<!DOCTYPE html>

<head>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/inputform.css">
  <meta name=viewport content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone-no">

  <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body style="background-color:#020d18;">
  <!--- --->
  
  <!-- BEGIN | Header -->
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


  <!--- --->
  <br>
    <div class="container" style="width:40%">
      <form id="contact" action="/movies" method="POST">
      @csrf
        <h3>Add New Movie</h3>
        <h4>Insert All of movie details</h4>
        <fieldset>
          <input placeholder="movie name" name="movie_name" type="text" tabindex="1" required autofocus>
        </fieldset>
        <fieldset>
          <input placeholder="movie creation year" name="movie_year"type="text" tabindex="2" required>
        </fieldset>
        <fieldset>
          <input placeholder="Movie Director" name="movie_director"type="text" tabindex="3" required>
        </fieldset>
        <fieldset>
          <input placeholder="Movie genre" type="text" name="movie_genre" tabindex="4" required>
        </fieldset>
        <fieldset>
          <input placeholder="Movie casts" type="text" name="movie_casts" tabindex="4" required>
        </fieldset>
        <fieldset>
          <textarea placeholder="Movie Story"name="movie_story"  tabindex="5" required></textarea>
        </fieldset>

        <fieldset>
          <button name="submit" value="movie_submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
        </fieldset>
		
      </form>
      <!------>
 
    </div>

    <script src="/main/js/jquery.js"></script>
    <script src="/main/js/plugins.js"></script>
    <script src="/main/js/plugins2.js"></script>
    <script src="/main/js/custom.js"></script>
</body>

</html>