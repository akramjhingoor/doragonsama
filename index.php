<?php

	require ("config.php"); #Connexion a la base (inclusion de la connexion par CLASSE PDO:Statement)

?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
		<?php require ("boostrap.func.php") ?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Doragon-sama - Accueil</title>
    </head>
	<style type="text/css">
	form
	{
		padding: 15px 25px;
	}
	</style>
    <body>
    <div id="bloc_page">
    	<header>
    		<div id ="imglogo">
    		<img src="img/logodoragon.png">
    		</div>
    		<h1>Doragon-sama</h1>
    		<blockquote>Le maître dragon et sa culture ancestrale</blockquote>
    		<!--<div id="connexion">
    		</div> -->	
    	</header>

		<section>
			
			<aside>
				<h2>Bienvenue sur notre page !</h2>
				<p>Afin d'accéder à l'ensemble de l'interface, il faut faire partie de la communauté. Sur cette application, on verra une vraie banque d'animes remplie par le maître Doragon et ses disciples. En effet, <em>Être un disciple</em> signifie devenir un membre de la communauté Doragon-sama. </p>
			</aside>

		
			<article id="article_ds">
				<form action ="connexion.php" method="POST">
				<h2>Bienvenue sur le site Doragon-sama !</h2>
    			<label>Pseudo : </label> <input type="text" name="name_user" placeholder="Nom d'utilisateur" required /><br/><br/>
    			<label>Mot de Passe : </label> <input type="password" name="mdp_user" placeholder="* * * * * *" required /><br/><br/>
    			<a href="motdepasserecup.php"></a>
    			<input type="submit" name="Connecter" value ="Se connecter" /><br/><br/>
    			<a href="inscription.php">Pas encore inscrit ?</a>&nbsp &nbsp
    			<a href="motdepasserecup.php">Mot de passe oublié ?</a>
    			</form>
			</article>
		</section>

		<footer>
			<br/><br/>
			<p>Copyright &copy; - Akram and Doragon-sama Team</p>
			
		</footer>
	</div>
    </body>
</html>
