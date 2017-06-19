<?php
	session_start();
	echo $_SESSION["error"];
	require "../includes/header.php";
?>
		<div class="panel-title text-center">
	        <hr />
        </div>
		<div class="form-box">	
			<form method="post" action="../actions/login_action.php">
	
				<div class="form-group form-profile">
					<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Email"/>
				</div>
		
				<div class="form-group form-profile">
					<label for="password">Wachtwoord</label>
						<input type="password" name="password" class="form-control" id="password"  placeholder="Wachtwoord"/>
				</div>
		
				<div class="form-login">
					<button class='btn submit_button' type="submit">
						Inloggen
					</button>
				</div>
				
				<div class="form-login">
				<p>heeft u nog geen account?
					<a href="register.php">
						Registreren
					</a></p>
				</div>
				
			</form>
		</div>