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
			</aside>
			
			<article id="article_ds">
				<p class="affich_result">
				<?php
				
				if (isset($_POST['Modif'])) // Si submit reconnu on continue
				{
					
					$list = $_POST['nomanimeList']; // Tous les POST sont stockés dans une variable
					$nom = $_POST['nomanime'];
					$genre = $_POST['genre_anime'];
					$statut = $_POST['statut_anime'];
					$dateparution = $_POST['dateparution'];
					$nbepisodes = $_POST['nbepisodes'];
					$nbsaisons = $_POST['nbsaisons'];
					$synop = $_POST['synopsis'];
				
					if ($list&&$nom&&$genre&&$statut&&$dateparution&&$nbepisodes&&$nbsaisons&&$synop) //Vérif tous les champs remplis
					{	
						
							$request = $bdd->prepare('UPDATE anime SET nomanime = :nom, genre_anime = :genre, 
							statut_anime = :statut, dateparution = :dateparution, 
							nbrepisodes = :nbepisodes, nbresaisons = :nbsaisons, synopsis = :synop
							WHERE nomanime = :result 
							'); // On prépare la requête avec des "alias" 
		 					$request->execute(array(
		 						'nom' => $_POST['nomanime'], 
		 						'genre' => $_POST['genre_anime'],
		 						'statut' => $_POST['statut_anime'],
		 						'dateparution' => $_POST['dateparution'],
		 						'nbepisodes' => $_POST['nbepisodes'], 
		 						'nbsaisons'=> $_POST['nbsaisons'], 
		 						'synop' => $_POST['synopsis'],
		 						'result' => $list, // On execute en remplacant les alias par les var 
		 						)) or die(print_r($request->errorInfo())); // Si requete echoue on utilise la methode errorInfo pour connaitre l'erreur de la requete
		 					echo "<strong>Données bien enregistrées par la base de données</strong><br/><br/>";
    						echo "<a href='modif.php'>Retournez au module de modif</a>";
	 					
	 					
					}
					else // Si c'st pas remplie 
					{
						echo "<strong>Remplir tous les champs est obligatoire</strong><br/>";
						echo "<a href='modif.php'>Retournez au module</a>";
					} 

				}
				else // On peut acceder a la page si on a pas submit
				{
					
					header('Location:modif.php');
				}
				
				
				?>
				</p>
			</article>
		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
		</div>
    </body>
</html>
