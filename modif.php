<?php

	require ("config.php"); #Connexion a la base (inclusion de la connexion par CLASSE PDO:Statement)
	session_start();
	if (!isset($_SESSION['numuser'])){
		header('Location:index.php');
	}
	if ($_SESSION['administration'] == 0) {
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php require ("boostrap.func.php") ?>
		<link rel="stylesheet" type="text/css" href="style.css">
        <title>Doragon-sama - Modifier</title>
    </head>
	
    <body>
    	<div id ="bloc_page">
    	<header>
    		<?php require ("inc/header.php"); ?>
    		<?php
    			require ("menu.php")
    		?>
    		
    	</header>


		<section>

			<aside>
				<h2>Une erreur dans la base d'animes ?</h2>
				<p>Ici, les jeunes disciples de Doragon-sama pourront corriger leur erreur. Doragon-Sama est humble. 
				Il sait que ces disciples ne sont que des jeunes scarabées.<br/>
				Le maître est généreux et vous offre l'opportunité de rattraper vos erreurs avec ces 3 moyens : <ol><li>L'un pour tout modifier</li><li>L'autre pour modifier seulement un seul élement. </li><li>Le dernier pour modifier le type</li></ol> 
				</p>
				
					
					<!--Modif le type d'anime-->
					<h2>Modification du type d'un anime - Première Etape</h2>
					<blockquote>Petite précision concernant ce formulaire :</blockquote>
					<p>Ici, on vous laisse la possibilité de modifier les types des animes présents dans la base de données.<br/>
						Ainsi, on vous laisse choisir l'anime et valider votre choix. Vous serez automatiquement rediriger vers un autre module.<br/> 
						Allez, on est généreux on vous laisse pas mal de choix pour modifier soyez contents mes chèrs disciples.</p>
					<form action="modif_type.php" method="POST">
					<label>Choix de l'anime à modifier : </label>
					<?php
							/* On recup les animes pour les mettre dans la liste 
							*/	                    
	                                 
	                            echo '<select name="nomanimeList" size="5" style=" width: 180px;">';

	                           	$req = $bdd->query('SELECT * FROM anime');
	                            
	            				while ($recup = $req->fetch()) 
	            				{
	            					echo '<option> '.$recup['numanime'].' : '.$recup['nomanime']; #Pour le explode
	              				}

	            				echo "</select><br/><br/>";
	       		
	            	?>

	            		<input type="submit" name="suivant" value=" Passer à la prochaine étape ->" />
				</form>
			</aside>

			<article id="article_ds">
				<form action="modif_all.php" method="POST">
				<fieldset>
					<!--Modif tous les infos -->
					<h2>Modification de l'ensemble des infos de l'anime</h2><br/>
					<label>Choix de l'anime à modifier : </label>
					<?php
	                    	/* On recup les animes pour les mettre dans la liste 
							*/	
	                                 
	                            echo '<select name="nomanimeList" size="5">';

	                           	$req = $bdd->query('SELECT * FROM anime ORDER BY nomanime ASC');
	                            
	            				while ($recup = $req->fetch()) 
	            				{
	            					echo '<option> '.$recup['nomanime']; 
	            					
	            				
	            				}
	            				echo "</select><br/><br/>";
	            				

	            				
	            	?>
					
					<label>Nom de l'anime </label> : <input type="text" name="nomanime" /><br/><br/>
					<label>Genre de l'anime </label> : <input type="text" name="genre_anime" /><br/><br/>
					L'anime est : 
					<input type="radio" name="statut_anime" value="Terminé"  checked ="checked" /><label for="Terminé">Terminé</label>
					<input type="radio" name="statut_anime" value="En cours" /><label for="En_cours">En cours</label> <br/><br/>
					<label>Date de parution </label> : <input type="date" name="dateparution" /><br/><br/>
					<label>Nombre d'épisodes </label> : <input type="number" name="nbepisodes" /><br/><br/>
					<label>Nombre de saisons </label> : <input type="number" name="nbsaisons" /><br/><br/>
					<label>Synopsis (en quelques mots) </label> : <br/><textarea name="synopsis" placeholder ="Entrez votre texte ici"rows="8" cols="70"></textarea><br/><br/>
					<input type="reset" name="bouton_reset" />
					<input type="submit" name="Modif" value="Modifier" />
				</fieldset>
				</form>
				<hr/><hr>
				<form method ="POST" action="modif_one.php">
					<fieldset>
					<!--Modif un seul élement -->
					<h2>Modification d'un élement de l'anime</h2>
					<p>Pour la modification du statut c'est entre : <ul><li>Terminé</li><li>En cours</li></ul></p>
					<label>Choix de l'anime à modifier : </label>
					<?php
	                    /* On recup les animes pour les mettre dans la liste 
							*/	
	                                 
	                            echo '<select name="nomanimeList" size="5">';

	                           	$req = $bdd->query('SELECT * FROM anime ORDER BY nomanime ASC');
	                            
	            				while ($recup = $req->fetch()) 
	            				{
	            					echo '<option> '.$recup['nomanime']; 
	            					
	            				
	            				}
	            				echo "</select><br/><br/>";		
	            	?>
	            	<label>Choix du champ à modifier</label>
	            	<select name="nomchampList" size="1">
	            		<option value="1">Nom de l'anime</option> <?php #Selon la valeur on fait la requete sksh pour le menu ?>
	            		<option value="2">Genre de l'anime</option>
	            		<option value="3">Statut de l'anime</option>
	            		<option value="4">Synopsis</option>
	            		
	            		
	            	</select><br/><br/>
	            	<label>Insérer la valeur qui sera ajouter en guise de modification </label> : <br/> 
	            	<!--J'aurais pu mettre un simple input mais je prends en contre la synopsis qui fait pas mal de ligne -->
	            	<textarea name="modiftext" placeholder ="Entrez votre texte ici"rows="8" cols="50"></textarea><br/><br/>
	            	<input type="submit" value="Modifier" name="Modif"/>
				</form>
			</article>

		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
		</div>
    </body>
</html>
