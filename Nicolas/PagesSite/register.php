<?php include 'links.html' ?>
<?php include 'header.php' ?>

	<link rel="stylesheet" href="register_.css">
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
	<?php include 'footer.php' ?>