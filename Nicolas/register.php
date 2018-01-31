<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<title>Inscription</title>
	
	<div class="form">
	
		<ul class="tab-group">
			<li class="tab active"><a href="#signup">Inscription</a></li>
		</ul>
	  
		<div class="tab-content">
			<div id="signup"> 
				<h1>Inscris-toi !</h1>
			
				<form action="/" method="post">
				
					<div class="top-row">
						<div class="field-wrap">
							<label>
								Pseudo<span class="req">*</span>
							</label>
							<input type="text" required autocomplete="off" />
						</div>
					</div>
					
					<div class="field-wrap">
						<label>
							Email<span class="req">*</span>
						</label>
						<input type="email"required autocomplete="off"/>
					</div>
					
					<div class="field-wrap">
						<label>
							Mot de passe<span class="req">*</span>
						</label>
						<input type="password"required autocomplete="off"/>
					</div>
						
				<button type="submit" class="button button-block"/>Inscription !</button>
				
				</form>
			
			</div>
		</div>
		
		
	</div>
	
	<!-- <link rel="stylesheet" href="assets/styles/main.css"> -->
	
</head>
<body>

	<!-- <script src="assets/scripts/main.js"></script> -->

</body>
</html>