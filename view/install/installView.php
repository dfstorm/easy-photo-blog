
<div class="ui text container">


	<a class="ui basic labeled icon button" href="<?php echo BASE_URL; ?>">
		<i class="chevron left icon"></i>
		Retour à l'acceuil
	</a>
	
	<?php if(file_exists("./INSTALL_MARKER")) { ?>
	

	<h1 class="ui header">
		<i class="dolly icon"></i>
		<div class="content">
			Finalisation de l'installation
		</div>
	</h1>
	
	
	<div class="ui compact inverted segment">
		
		Ce blog est un projet <a style="color: #fff; text-decoration: underline;" target="_blank" href="https://github.com/dfstorm/easy-photo-blog">open source</a> et est distribué sans aucune garantie.
	</div>
	
	<?php if ($sMessage != '') { ?>
		<div class="ui compact inverted red segment">
			<i class="warning icon"></i>
			<?php echo $sMessage; ?>
		</div>
	<?php } ?>
	
	<form class="ui form" method="post" style="">
	
	<h3 class="ui header">
		<i class="circle info icon"></i>
		<div class="content">
			Général
		</div>
	</h3>
	
	<div class="field">
		<label for="sBlogName">Nom du Blog</label>
		<input value="<?php echo $form['sBlogName']; ?>" type="text" name="sBlogName" id="sBlogName" placeholder="Mon blog">
	</div>
	
	
	<h3 class="ui header">
		<i class="user icon"></i>
		<div class="content">
			Utilisateur
		</div>
	</h3>
	
	<div class="field">
		<label for="sUsername">Utilisateur</label>
		<input value="<?php echo $form['sBlogName']; ?>" type="text" name="sUsername" id="sUsername" placeholder="John doo">
	</div>
	<div class="two fields">
		<div class="field">
			<label for="sPassword">Mot de passe</label>
			<input value="<?php echo $form['sPassword']; ?>" type="password" name="sPassword" id="sPassword" placeholder="* * * *">
		</div>
		<div class="field">
			<label for="sRPassword">Répéter le mot de passe</label>
			<input value="<?php echo $form['sRPassword']; ?>" type="password" name="sRPassword" id="sRPassword" placeholder="* * * *">
	</div>
	</div>

	
	<h3 class="ui header">
		<i class="microchip icon"></i>
		<div class="content">
			Système
		</div>
	</h3>
	<p><strong>Informations DSM</strong> - Base de donnée <a href="https://github.com/dfstorm/dsm" target="_blank"><i class="circle question icon"></i></a></p>
	<div class="three fields">
		<div class="field">
			<label for="sDsmuri">DSM Uri</label>
			<input value="<?php echo $form['sDsmuri']; ?>" type="text" name="sDsmuri" id="sDsmuri" placeholder="/dsm">
		</div>
		<div class="field">
			<label for="sDsmkey">Clef d'accès DSM</label>
			<input value="<?php echo $form['sDsmkey']; ?>" type="text" name="sDsmkey" id="sDsmkey" placeholder="Access Key">
		</div>
		<div class="field">
			<label for="sDsmname">Nom de la base de donnée DSM</label>
			<input value="<?php echo $form['sDsmname']; ?>" type="text" name="sDsmname" id="sDsmname" placeholder="pogo">
		</div>
	</div>
	
	<p><strong>Informations DSFR</strong> - Stockage des médias <a href="https://github.com/dfstorm/dsfr" target="_blank"><i class="circle question icon"></i></a></p>
	<div class="two fields">
		<div class="field">
			<label for="sDsfruri">DSFR Uri</label>
			<input value="<?php echo $form['sDsfruri']; ?>" type="text" name="sDsfruri" id="sDsfruri" placeholder="/dsfr">
		</div>
		<div class="field">
			<label for="sDsfrkey">Clef d'accès DSFR</label>
			<input value="<?php echo $form['sDsfrkey']; ?>" type="text" name="sDsfrkey" id="sDsfrkey" placeholder="Access Key">
		</div>
	</div>
	
	<button class="ui green labeled icon button" type="submit">
		<i class="flag checkered icon"></i>
		Finaliser l'installation
	</button>
	</form>
	<?php } else { ?>
		<h1 class="ui header">
			L'installation est terminé.
		</h1>
	<?php } ?>
</div>
