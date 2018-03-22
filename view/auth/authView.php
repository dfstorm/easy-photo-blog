
<div class="ui text container">


	<a class="ui basic labeled icon button" href="<?php echo BASE_URL; ?>">
		<i class="chevron left icon"></i>
		Retour à l'acceuil
	</a>
	
	<?php if(file_exists("./INSTALL_MARKER")) { ?>
	<div class="ui warning message">
		<i class="warning icon"></i>
		Le blog ne semble pas complètement installé. <a href="<?php echo BASE_URL ?>install">compléter l'installation</a>
	</div>
	<?php } ?>
	
	<?php if(isset($_GET['code'])) { if($_GET['code'] == "new") { ?>
	<div class="ui green message">
		<i class="check icon"></i>
		<strong>Installation réussite</strong>. Connectez-vous à votre nouveau blog!
	</div>
	<?php }} ?>

	<h1 class="ui header">
		<i class="shield alternate icon"></i>
		<div class="content">
			Connexion
		</div>
	</h1>
	
	<form class="ui form" method="POST" style="max-width: 400px;">
	<div class="field">
		<label for="sUsername">Utilisateur</label>
		<input type="text" name="sUsername" id="sUsername" placeholder="John doo">
	</div>
	<div class="field">
		<label for="sPassword">Mot de passe</label>
		<input type="password" name="sPassword" id="sPassword" placeholder="* * * *">
	</div>

	<button class="ui green button" <?php if(file_exists("./INSTALL_MARKER")) { ?>disabled<?php } ?> type="submit">Se connecter</button>
	</form>
	
</div>
