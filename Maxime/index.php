<!DOCTYPE html>
<html lang="en">
<head>
    <title>Animepedia</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'links.html' ?>
</head>
    <?php include 'header.php' ?>
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
	
	<section class="animes" id="animes">
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
    <?php include 'footer.php' ?>
</html> 