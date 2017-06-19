<?php
session_start();
echo $_SESSION["error"];
require "../includes/header.php";
?>
<div class="container">
	<div class="row main">
		<div class="panel-heading">
			<div class="panel-title text-center">
	            <hr />
	        </div>
			
			<div class="form-box">
				<form method="POST" action="../actions/register_action.php">
					<div class="form-profile">
						<label for="email">Email</label>
							<input type="email" name="email" id="email"  placeholder="Email"/>
					</div>
				
					<div class="form-profile">
						<label for="password">Wachtwoord</label>
							<input type="password" name="password" id="password"  placeholder="Wachtwoord"/>
					</div>
				
					<div class="form-profile">
						<label for="repeat-password">Herhaal Wachtwoord</label>
							<input type="password" name="repeat-password" id="repeat-password" placeholder="Herhaal Wachtwoord" />
					</div>
				
					<div class="form-login">
						<button class='submit_button' type="submit">
							<!--<img src="../img/registreren-button.png" width="215" height="32" border="0" alt="submit" />-->
							Registreren
						</button>
					</div>
					
					<div class="form-login">
						<a href="login.php">
							<img src="../img/aanmelden-button.png" alt="Naar Login" width="215" height="32" border="0">
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>	
</div>