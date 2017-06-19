<?php
session_start();
echo $_SESSION["error"];
require "../includes/header.php";
require "../class/user.php";

$user = new User(null,null,null,null,null,null,null,null,null,null,null,null,null,null);
$user = unserialize($_SESSION['u']);

?>
<div class="container">
	<div class="row main">
		<div class="panel-heading">
			<div class="panel-title text-center">
	            <hr />
	        </div>
			<?php require "../includes/nav.php"; ?>
			
			<h1>Persoonsgegevens</h1>
			
			<div class="form-box">	
				<form method="POST" action="../actions/profiel_action.php">
					
					<input type="hidden" name ="id" id="id" value="<?php $user->getId(); ?>">
					
					<div class="form-profile">
						<label for="firstname">Voornaam</label>
							<input type="text" name="firstname" id="firstname" placeholder="Voornaam" value="<?php $user->getFirstname(); ?>"/>
					</div>
					
					<div class="form-profile">
						<label for="insertion">Tussenvoegsel</label>
							<input type="text" name="insertion" id="insertion" placeholder="Tussenvoegsel" value="<?php $user->getInsertion(); ?>"/>
					</div>	
					
					<div class="form-profile">
						<label for="lastname">Achternaam</label>
							<input type="text" name="lastname" id="lastname" placeholder="Achternaam" value="<?php $user->getLastname(); ?>"/>
					</div>
					
					<div class="form-profile">
						<label for="email">Email</label>
							<input type="email" name="email" id="email"  placeholder="Email" value="<?php $user->getEmail(); ?>"/>
					</div>
					
					<div class="form-profile">
						<label for="phone-number">Telefoonnummer</label>
							<input type="text" name="phone-number" id="phone-number" placeholder="Telefoonnummer" value="<?php $user->getPhone(); ?>"/>
					</div>
					
					<div class="form-profile">
						<label for="city">Woonplaats</label>
							<input type="text" name="city" id="city" placeholder="Woonplaats" value="<?php $user->getCity(); ?>"/>
					</div>
					
					<div class="form-profile">
						<label for="zip">Postcode</label>
							<input type="text" name="zip" id="zip" placeholder="Postcode" pattern="[0-9]{4}[A-Z]{2}" value="<?php $user->getZip(); ?>"/>
					</div>
					
					<div class="form-profile">
						<label for="street-name">Straatnaam</label>
							<input type="text" name="street-name" id="street-name" placeholder="Straatnaam" value="<?php $user->getStreet(); ?>"/>
					</div>
					
					<div class="form-profile">
						<label for="house-number">Huisnummer</label>
							<input type="text" name="house-number" id="house-number" placeholder="Huisnummer" value="<?php $user->getHousenumber(); ?>"/>
					</div>
					
					<div class="form-profile">
						<label for="birth">Geboortedatum</label>
							<input type="date" name="birth" id="birth" placeholder="Geboortedatum" value="<?php $user->getBirth(); ?>"/>
					</div>
					
					<div class="form-profile">
						<label for="gender">Geslacht</label>
							<input type="radio" name="gender" id="gender" placeholder="Geslacht" value="male" checked> Man
							<input type="radio" name="gender" id="gender" placeholder="Geslacht" value="female"> Vrouw
							<input type="radio" name="gender" id="gender" placeholder="Geslacht" value="other"> Overig 
					</div>
					
					<div class="form-profile">
						<label for="iban">IBAN</label>
							<input type="text" name="iban" id="iban" placeholder="IBAN" value="<?php $user->getIban(); ?>"/>
					</div>
				
					<div>
						<button type="submit" class='submit_button' name="person">
							Bevestigen
						</button>
					</div>
					
				</form>
			</div>
			
			<hr />
			<h1>Wachtwoord Veranderen</h1>
			
			<div class="form-box">
				<form method="POST" action="../actions/profiel_action.php">
				
					<input type="hidden" name ="id" id="id" value="<?php $user->getId(); ?>">
					
					<div class="form-profile">
						<label for="old-password">Huidig Wachtwoord</label>
							<input type="password" name="old-password" id="old-password"  placeholder="Huidig Wachtwoord"/>
					</div>
				
					<div class="form-profile">
						<label for="new-password">Nieuw Wachtwoord</label>
							<input type="password" name="new-password" id="new-password"  placeholder="Nieuw Wachtwoord"/>
					</div>
				
					<div class="form-profile">
						<label for="repeat-new-password">Herhaal Nieuw Wachtwoord</label>
							<input type="password" name="repeat-new-password" id="repeat-new-password" placeholder="Herhaal Nieuw Wachtwoord" />
					</div>
				
					<div>
						<button type="submit" class='submit_button' name="pass">
							Bevestigen
						</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>	
</div>