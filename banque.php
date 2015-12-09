<?php

	require ("config.php"); #Connexion a la base (inclusion de la connexion par CLASSE PDO:Statement)
	session_start();
	if (!isset($_SESSION['numuser'])){
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html class="full">
	<head>
		<meta charset="utf-8"/>
		<title>Doragon-sama - Banque d'Animes</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<?php require ("boostrap.func.php") ?>
		
	</head>
	
	<body>
		<div id="bloc_page">
		<header>
			<?php require ("inc/header.php"); ?>

    		<?php
    			require ("menu.php") #Menu
    		?>

    	</header>
    	<?php 
    		//Compter le nombre d'élements
    		$sql = $bdd->query("SELECT COUNT(*) AS Nbelements FROM anime");
    		$data = $sql->fetch();
    		#var_dump($data); exit;
    		//Page 1 par défaut
    		$defaut = 1;
    		$nbshow = 4; //Nb de résultats à afficher
    		// On recupère le résultat nb d'animes dans la BDD
    		$nbelements = $data['Nbelements']; 
    		#var_dump($nbelements); exit;
    		//On calcule le nombre d'elements par le nb d'anime a voir
    		$nbpages = ceil($nbelements/$nbshow); 
    		#var_dump($nbshow); exit;
    		if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    			//On recupère la valeur dans l'URL
				$page = intval($_GET['page']);
				if ($page >= 1 && $page <= $nbpages) {
					// Si condition vérif on affecte le num de la page à la page par défaut
					$defaut = $page;
				} elseif ($page < 1) {
					// Si page diff de 0 alors on remet 1 par défaut
					$defaut = 1;
				} else {
					$defaut = $nbpages;
				}
			} 

    	?>
		<section>
			<div id="bar_recherche">
				<form action="recherches.php" method="POST">
				<label>Que recherchez-vous ? : </label><input type="text" name="search_bar" class ="search" placeholder="Quelque chose à chercher ?..." />
				<input type="submit" value="Rechercher" class="btn" name="Rechercher"/>
				</form>
			</div>
			<article style="text-align: center;">;

				<table border=3 align="center" id="table_bank">
						<tr>
							<th>Nom de l'anime</th>
							<th>Genre de l'anime</th>
							<th>Statut de l'anime</th>
							<th>Date de parution</th>
							
							
							<th>Types d'animes</th>
						</tr>
					<?php 
					$req = $bdd->query("SELECT * FROM anime ORDER BY nomanime ASC LIMIT ".(($defaut - 1)*$nbshow).", $nbshow"); //On recup toues les elements de la table anime


					while ($donnees = $req->fetch()) 
					{
						
					?>
					<?php  $param = $donnees['nomanime']; ?>
					<!-- Avec la boucle while on recup dans un tableau et on affiche les infos recup-->
					<tr> 
						<td width="15%"><a href="banque_details.php?nom=<?php echo $param; ?>"><?php echo $donnees['nomanime']; ?></a></td>
						<td width="15%"><?php echo $donnees['genre_anime']; ?></td>
						<td width="15%"><?php echo $donnees['statut_anime']; ?></td>
						<td width="20%"><?php echo $donnees['dateparution']; ?></td>
						
						
						<td width="20%">
							<ul>
							<?php

								$sql = $bdd->query('SELECT * FROM type_anime ORDER BY libelle ASC'); //Pareil mais avec la table type_anime

								while ($data = $sql->fetch()) 
								{
									if ($data['codeanime'] == $donnees['numanime']) 
									{
										echo "<li>";
										echo "<strong><em>";
										echo $data['libelle'];
										echo "</em></strong>";
										echo "</li>";
									}
								}

							?>
							</ul>
						</td>		
					</tr>



					<?php

					}

					$req->closeCursor();
					/* Libère la connexion au serveur, permettant de faire d'autres requêtes 
					*	tout en laissant cette requête la possibilité d'être re-executé
					*/
					?>
				</table>

				<?php
					echo "<br/>";
					echo "<p> Page [ ";
					for ($i=1; $i <= $nbpages ; $i++) { 
						echo " <a href='banque.php?page=$i'>$i</a> - ";
					}
					echo " ]</p>";
				?>
			</article>
		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
	</body>
</html>
