<!DOCTYPE html>
    <head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@600&display=swap" rel="stylesheet">
    


        <style>
            body {
                background-color: #080700;                
            }
            ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #163A59;
}
        </style>
            <link rel="stylesheet" href="/css/movie.css">

    </head>
    <body>
    <ul>
  <li><a href="/">Home</a></li>
  <li><a href="/movies">Movies</a></li>
  <li><a href="#contact">About Us</a></li>

  
  <li style="float:right"><a class="active" href="#about">Login</a></li>
  <li style="float:right"><a class="active" href="#about">Register</a></li>
  <li style="float:right"><a class="active" href="#about">Profile</a></li>

</ul>
  

<!--- --->
	
<div id="movie-card-list">
	<!-- Card 1: Blade Runner -->
  @foreach ($movies as $m)
	<div class="movie-card" style="background:url('img/{{$m->id}}.jpg')">

		<div class="color-overlay">
		
			<div class="movie-content" >

				<div class="movie-header" >

					<h1 class="movie-title">{{$m->movie_name}}</h1>
					<h4 class="movie-info">({{$m->movie_year}}) - {{$m->movie_genre}}</h4>
				</div>
				<a class="btn btn-outline" href="/movies/{{$m->id}}">More Information</a>

			</div>
		</div>
	</div>

</div>
@endforeach
<!--- --->

    </body>
</html>
