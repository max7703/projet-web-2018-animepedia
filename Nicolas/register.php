<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<title>Inscription</title>
	<link rel="stylesheet" href="register.css">
	
</head>
<body>
	<div class="form">	  
		<div class="tab-content">
			<div id="signup"> 
				<h1>Inscription :</h1>
			
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
						
				<button type="submit" class="button button-block"/>Confirmer l'inscription</button>
				
				</form>
			
			</div>
		</div>
		
		
	</div>

	<script src="register.js"></script>

</body>
</html>