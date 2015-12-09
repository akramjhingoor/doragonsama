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
    	<div id="bloc_page">
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

				if (isset($_POST['Modif'])) 
				{
					$nom = $_POST['nomanimeList'];
					$champ = $_POST['nomchampList'];
					$input = $_POST['modiftext'];
					
					if($nom&&$champ&&$input) //Champ remplis
					{
						switch ($champ) { #menu pour choisir le champ a modif

							case '1':
								$req1 = $bdd->prepare('UPDATE anime SET nomanime = :nom WHERE nomanime = :result');
								$req1->execute(array(
									'nom' => $input,
									'result' => $nom,
									)) or exit(print_r($req1->errorInfo()));
								echo "<strong>Données mises à jour merci de nous avoir corrigé</strong><br/><a href='modif.php'>Allez hop on retourne à la page de modif</a>";
								break;

							case '2' : 
								$req2 = $bdd->prepare('UPDATE anime SET genre_anime = :genre WHERE nomanime = :result');
								$req2->execute(array(
									'genre' => $input,
									'result' => $nom,
									)) or exit(print_r($req2->errorInfo()));
								echo "<strong>Données mises à jour merci de nous avoir corrigé</strong><br/><a href='modif.php'>Allez hop on retourne à la page de modif</a>";
								break;

							case '3' : 
								$req3 = $bdd->prepare('UPDATE anime SET statut_anime = :statut WHERE nomanime = :result');
								$req3->execute(array(
									'statut' => $input,
									'result' => $nom,
									)) or exit(print_r($req3->errorInfo()));
								echo "<strong>Données mises à jour merci de nous avoir corrigé</strong><br/><a href='modif.php'>Allez hop on retourne à la page de modif</a>";
								break;

							case '4':
								$req4 = $bdd->prepare('UPDATE anime SET synopsis = :synop WHERE nomanime = :result');
								$req4->execute(array(
									'synop' => $input,
									'result' => $nom,
									)) or exit(print_r($req4->errorInfo()));
								echo "<strong>Données mises à jour merci de nous avoir corrigé</strong><br/><a href='modif.php'>Allez hop on retourne à la page de modif</a>";

								break;
							default:
								echo "Erreur SQL";
								break;
						}
						
					}
					else echo "<strong>Remplir tous les champs est essentiel</strong><br/><a href='modif.php'>Retournez au module !</a>";
					
				}else header("Location:modif.php");

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
