<?php

	require ("config.php"); #Connexion a la base (inclusion de la connexion par CLASSE PDO:Statement)
	session_start();
	if (!isset($_SESSION['numuser'])){
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php require ("boostrap.func.php") ?>
		<link rel="stylesheet" type="text/css" href="style.css">
        <title>Doragon-sama - Ajouter</title>
    </head>
	
    <body>
    <div id="bloc_page">
    	<header>
    		<?php require ('inc/header.php'); ?>
    		<?php
    			require ("menu.php")
    		?>
    		
    	</header>

		<section>
			<aside>
				<h2>Amélioration la connaissance de la japanimation</h2>
				<p>Ce formulaire permet d'ajouter des animes dans notre banque à mangas. L'équipe doragon-sama possède effectivement une connaissance incroyable d'anime cependant il n'y a pas d'âge pour apprendre.<br/>
				Dans ce formulaire, il faut renseigner tous les champs pour avoir tous les informations sur l'anime qui va être ajouté. En effet, les animes sont ajoutés à la Banque d'animes de Doragon-sama (BAD).<br/>
				Le genre de l'anime correspond à la destination des spectateurs, c'est-à-dire qu'il est destiné à une portion de la population <em>(ex : Shonen vise un public d'adolescents)</em>.	<br/>
				</p>
				<p>N'oublions pas une chose essentielle : un anime se distingue des autres par les types d'anime. <em>Par exemple, l'anime A est de type 1 et 2 alors que l'anime B est de type 1 et 3.</em><br/>
					Vous êtes mignon ! On va vous laisser ajouter le type d'anime présents dans la base en cliquant sur : <br/><br/>
					<a href="ajouter_typeanime.php" class="button">Ajouter - Type d'Anime</a><br/><br/>
					<strong>Rappel : </strong>Il faut d'abord ajouter l'anime avant d'ajouter les types. C'est comme mettre la charrue avant les boeufs. 
				</p>
			</aside>

		
			<article id="article_ds">
				<form action="enregister_ajout.php" method="POST">
					<fieldset>
					<h2>Ajout d'anime/manga</h2><br/>
					<label>Nom de l'anime </label> : <input type="text" name="nomanime" /><br/><br/>
					<label>Genre de l'anime </label> : <input type="text" name="genre_anime" /><br/><br/>
					L'anime est : 
					<input type="radio" name="statut_anime" value="Terminé"  /><label for="Terminé">Terminé</label>
					<input type="radio" name="statut_anime" value="En cours" /><label for="En_cours">En cours</label> <br/><br/>
					<label>Date de parution </label> : <input type="date" name="dateparution" /><br/><br/>
					<label>Nombre d'épisodes </label> : <input type="number" name="nbepisodes" /><br/><br/>
					<label>Nombre de saisons </label> : <input type="number" name="nbsaisons" /><br/><br/>
					<label>Synopsis (en quelques mots) </label> : <br/><textarea name="synopsis" placeholder ="Entrez votre texte ici"rows="8" cols="70"></textarea><br/><br/>
					<input type="reset" name="bouton_reset" />
					<input type="submit" name="Ajouter" value="Ajouter à la BAD" />
				</fieldset>
				</form>
			</article>
		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
