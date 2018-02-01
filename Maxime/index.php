<!DOCTYPE html>
<html lang="en">
<head>
    <title>Animepedia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="javascript:void(0)">Logo</a>
		  <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="navbar-collapse collapse" id="navb" style="">
			<ul class="navbar-nav mr-auto">
			  <li class="nav-item">
				<a class="nav-link" href="javascript:void(0)">Animes</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="javascript:void(0)">Communautés</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="javascript:void(0)">Boutique</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="javascript:void(0)">Contact</a>
			  </li>
			  <!-- Dropdown -->
			  <li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				Dropdown link
			    </a>
			    <div class="dropdown-menu">
				  <a class="dropdown-item" href="#">Link 1</a>
				  <a class="dropdown-item" href="#">Link 2</a>
				  <a class="dropdown-item" href="#">Link 3</a>
			    </div>
			</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
			  <input class="form-control mr-sm-2" placeholder="Search" type="text">
			  <button class="btn btn-success my-2 my-sm-0" type="button">Search</button>
			</form>
		  </div>
		</nav>
	</header>

	<div class="container">
	  <h1>My First Bootstrap Page</h1>
	  <p>This is some text.</p>
    </div>
  
	<div id="demo" class="carousel slide" data-ride="carousel">

	  <!-- Indicators -->
	  <ul class="carousel-indicators">
		<li data-target="#demo" data-slide-to="0" class="active"></li>
		<li data-target="#demo" data-slide-to="1"></li>
		<li data-target="#demo" data-slide-to="2"></li>
	  </ul>

	  <!-- The slideshow -->
	  <div class="carousel-inner">
		<div class="carousel-item active">
		  <img src="https://vignette.wikia.nocookie.net/creepypasta/images/e/e2/Anime-Girl-With-Silver-Hair-And-Purple-Eyes-HD-Wallpaper.jpg/revision/latest?cb=20140120061808&format=original">
		  <div class="carousel-caption">
			<h3>Cute</h3>
			<p>WTF!!</p>
		  </div>
		</div>
		<div class="carousel-item">
		  <img src="http://media.comicbook.com/2017/10/1536737-japanese-keyart-officialvideoimage-21cf3b84-5780-e611-80-1027211.jpg">
		  <div class="carousel-caption">
			<h3>Overlord</h3>
			<p>WTF!!</p>
		  </div>
		</div>
		<div class="carousel-item">
		  <img src="https://myanimelist.cdn-dena.com/s/common/uploaded_files/1474091647-7123f5fef60976326133d0aa49d17e04.jpeg">
		  <div class="carousel-caption">
			<h3>Re Zero</h3>
			<p>WTF!!</p>
		  </div>
		</div>
	  </div>

	  <!-- Left and right controls -->
	  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		<span class="carousel-control-prev-icon"></span>
	  </a>
	  <a class="carousel-control-next" href="#demo" data-slide="next">
		<span class="carousel-control-next-icon"></span>
	  </a>

	</div>

</body>
</html> 