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
			<?php

					if (empty($_POST['nomanimeList'])) {
						header('Location:modif.php');
					}
					else{
					$list = $_POST['nomanimeList'];
					#echo $list;
					#echo "<br/><br/>";
					
					$tab = explode(':', $list);

				/*	echo "<br/>";
					echo $tab[0];
					echo "<br/>";
					echo $tab[1]; */
					}
				
				?>
			<article id="article_ds">
				<form action="modif_typefinal.php" method="POST">
						<h3>Modification du type d'un anime - Deuxième Etape</h3>
						<blockquote>Petite précision concernant ce formulaire :</blockquote>
						<p>Ici, on vous laisse la possibilité de modifier les types des animes présents dans la base de données.<br/>
						Ainsi, on vous laisse choisir l'anime et valider votre choix. Vous serez automatiquement rediriger vers un autre module.<br/> 
						Allez, on est généreux on vous laisse pas mal de choix pour modifier soyez contents mes chèrs disciples.</p>
						<label>Choix du type à modifier : </label>
						<?php

							echo '<select name="nomtypeList" size="5">';

		                	$sql = $bdd->query('SELECT * FROM type_anime WHERE codeanime ='.$tab[0] );
		                        
		        			while ($data = $sql->fetch()) 
		        			{
		        				echo '<option> '.$data['libelle']; 
		          			}

		        			echo "</select><br/><br/>"; 

						?>
						
						<input type="hidden" name="passeport_numanime" value="<?php echo $tab[0]; ?>" />
						<label>Type de l'anime en cours de modif : </label><input type="text" name="lib_modif" /><br/><br/>
						<input type="submit" name="Modif" value="Confirmer" />
						
					</form>
			</article>

				<?php
				//} #else echo "Bonoj";;
				?>

		</section>

		<footer>
				<?php require('footer.php'); ?>
		</footer>
		</div>		
    </body>
</html> 
