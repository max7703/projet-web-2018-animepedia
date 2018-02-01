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
	<script src="https://mdbootstrap.com/previews/docs/latest/js/mdb.min.js"></script>
    <script src="https://mdbootstrap.com/previews/docs/latest/js/jarallax.js"></script>
    <script src="https://mdbootstrap.com/previews/docs/latest/js/jarallax-video.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	<link rel="stylesheet" href="index.css">
</head>
<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="javascript:void(0)">Logo</a>
	  <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false">
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="navbar-collapse collapse" id="navb" style="">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item">
			<a class="nav-link" href="http://127.0.0.1/animepedia/animes.php">Animes</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="http://127.0.0.1/animepedia/forum.php">Forum</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="http://127.0.0.1/animepedia/subscribe.php">Souscrire</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="http://127.0.0.1/animepedia/contact.php">Contact</a>
		  </li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
		  <input class="form-control mr-sm-2" placeholder="Search" type="text">
		  <button class="btn btn-success my-2 my-sm-0" type="button">Search</button>
		</form>
	  </div>
	</nav>
</header>
<body>  
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="first-slide" src="https://static.comicvine.com/uploads/scale_super/11127/111275532/5436341-4183275962-momon.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-left">
              <h1>Example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="https://static.comicvine.com/uploads/original/14/146991/4835141-8035351198-overl.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption d-none d-md-block">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="https://res.cloudinary.com/teepublic/image/private/s--dAB6qwDA--/t_Preview/b_rgb:484849,c_limit,f_jpg,h_630,q_90,w_630/v1446245005/production/designs/299446_1.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption d-none d-md-block text-right">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
	
	<section class="movies" id="movies">
    <h2>Featured Animes</h2>
	<div class="row">
		<div class="col-lg-3 col-md-4 col-sm-6">
			<article class="card">
				<header class="title-header">
					<h3>Anime Title</h3>
				</header>
				<div class="card-block">
					<div class="img-card">
						<img src="//placehold.it/300x250" alt="Anime" class="w-100" />
					</div>
					<p class="tagline card-text text-xs-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					<a href="#" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> Watch Now</a>
				</div>
			</article>
		</div>
		<div class="col-lg-3 col-md-4 col-sm-6">
    		<article class="card">
				<header class="title-header">
					<h3>Anime Title</h3>
				</header>
				<div class="card-block">
					<div class="img-card">
						<img src="https://placehold.it/300x250" alt="Anime" class="w-100" />
					</div>
					<p class="tagline card-text text-xs-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					<a href="#" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> Watch Now</a>
				</div>
			</article>
		</div>
        <div class="col-lg-3 col-md-4 col-sm-6">
    		<article class="card">
				<header class="title-header">
					<h3>Anime Title</h3>
				</header>
				<div class="card-block">
					<div class="img-card">
						<img src="https://placehold.it/300x250" alt="Anime" class="w-100" />
					</div>
					<p class="tagline card-text text-xs-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					<a href="#" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> Watch Now</a>
				</div>
			</article>
		</div>
        <div class="col-lg-3 col-md-4 col-sm-6">
    		<article class="card">
				<header class="title-header">
					<h3>Anime Title</h3>
				</header>
				<div class="card-block">
					<div class="img-card">
						<img src="https://placehold.it/300x250" alt="Anime" title="Anime" class="w-100" />
					</div>
					<p class="tagline card-text text-xs-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
					<a href="#" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> Watch Now</a>
				</div>
			</article>
		</div>
	</div>
</section>
</body>
<!--   FOOTER START================== --> 
<footer class="footer">
    <div class="container">
        <div class="row">
        <div class="col-sm-3">
            <h4 class="title">A propos</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit, libero a molestie consectetur, sapien elit lacinia mi.</p>
            <ul class="social-icon">
                <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
                <a href="#" class="social"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
            </ul>
        </div>
        <div class="col-sm-3">
            <h4 class="title">Navigation</h4>
            <span class="acount-icon">          
            <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> List</a>
            <a href="#"><i class="fa fa-users" aria-hidden="true"></i>Group</a>
            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
            <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Langue</a>           
            </span>
        </div>
        <div class="col-sm-3">
            <h4 class="title">Categories</h4>
            <div class="category">
                <a href="#">Ecchi</a>
                <a href="#">Seinen</a>
                <a href="#">Shōjo</a>
                <a href="#">Shōnen</a>
                <a href="#">Yaoi</a>
                <a href="#">Yandere</a>
                <a href="#">Yuri</a>
                <a href="#">Magical girl</a>      
            </div>
        </div>
        <div class="col-sm-3">
            <h4 class="title">Moyens de paiement</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <ul class="payment">
                <li><a href="#"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i></a></li>            
                <li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>
            </ul>
            </div>
        </div>
        <hr>
        <div class="row text-center"><a href="http://dev.animepedia.fr/" style="color: #fff;">Copyright © Animepedia 2018</a></div>
    </div>	
</footer>
</html> 