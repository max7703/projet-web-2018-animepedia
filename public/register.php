<?php include 'header.php' ?>
<link rel="stylesheet" href="register_.css">
<div class="container">
  <form class="form-signup">
	<h2 class="form-signup-heading">Please sign up</h2>
	<label for="inputUsername" class="sr-only">Username</label>
	<input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
	<label for="inputEmail" class="sr-only">Email address</label>
	<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
  </form>
</div> <!-- /container -->
<?php include 'footer.php' ?>