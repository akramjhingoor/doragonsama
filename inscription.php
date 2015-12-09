<?php

	require ("config.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php require ("boostrap.func.php") ?>
		<link rel="stylesheet" type="text/css" href="style.css">
        <title>Doragon-sama - Inscription</title>
    </head>
	
    <body>
    <div id="bloc_page">
    	<header>
    		<div id ="imglogo">
    		<img src="img/logodoragon.png">
    		</div>
    		<h1>Doragon-sama</h1>
    		<blockquote>Le maître dragon et sa culture ancestrale</blockquote>
	
    	</header>
    	<style type="text/css">
    	input, label, textarea, article h2
    	{
    		margin-left: 20px;
    	}
    	.domain
    	{
    		border-style: groove;
		    border-width: 5px;
		    border-color: rgb(224,0,8);
    	}
    	</style>
		<section>
			<aside>
				<h2>Rejoindre la communauté</h2>
				<p>Sachant que la communauté s'agrandit, il est important pour le maître Doragon de connaître ces disciples. Le but est de leur donner un toit, un lieu où tous ces disciples pourront se réunir afin de partager, de confronter et d'apprendre. 
				</p>
				<hr />
				<p><strong>Petite explication sur les modalités d'inscription</strong><br />On vous demande de renseigner les informations suivantes : <br/>
				</p>
				<p><ul><li><em>Pseudo</em> : Afin de pouvoir être connu des autres membres et du Maître</li><li><em>Mot de Passe</em> : Afin d'accéder à votre compte</li><li><em>Email</em> : Montre que vous faites partie de la communauté</li><li><em>Description</em> : Comme vous vous sentez en ce moment</li></ul></p>
			</aside>

			<article id="article_ds">
				<form action="registration.php" method="POST">
					
					<h2>Inscription à la communauté de disciples</h2><br/>
					<blockquote>Le nombre de disciples de Doragon-sama ne fait qu'augmenter afin de recevoir sa sagesse...</blockquote>
					<label> Pseudo </label> : <input type="text" name="pseudo" placeholder="MachinChouette..." maxlength="20"/><br/><br/>
					<label> Mot de Passe </label> : <input type="password" name="mdp" placeholder="*****" maxlength="25"/><br/><br/>
					<label> Confirmer son mot de passe </label> : <input type="password" name="confirm_mdp" placeholder="*****"  maxlength="25"/><br/><br/>
					<label> Email </label> : <input type="text" name="email" placeholder="Nouvel e-mail" maxlength="20" />  <input type="text" name="domain" class="domain" value="@doragonsama.com" disabled /><br/><br/>
					<label>Description (60 caractères max) </label> : <br/><textarea name="description" placeholder ="Votre humeur actuelle"rows="3" cols="30" maxlength="60"></textarea><br/><br/>
					<br/><br/>
					<input type="reset" name="bouton_reset" />
					<input type="submit" name="Inscrire" value="S'inscrire" /><br/><br/>
				
				</form>
				
			</article>
		</section>

		<footer>
			<br/><br/>
			<p>Copyright &copy; - Akram and Doragon-sama Team</p>
			<a href="projetperso.php">Explicatif Projet Perso 1</a>
		</footer>
	</div>
    </body>
</html>
