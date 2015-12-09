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
    	<meta charset="utf-8">
		<?php require ("boostrap.func.php") ?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Doragon-sama - Catégories</title>
    </head>
	<body>
    <div id="bloc_page">
    	<header>
    		<?php require ("inc/header.php"); ?>
			<?php
    			require ("menu.php") //Affiche le menu (inclut le menu en gros)
    		?>

    	</header>
    	<style type="text/css">
    	#rubrique
    	{
    		padding: 15px;
    		font-size: 1.2em;
    		border-style: solid;
		    border-width: 1px;
		    border-color: rgb(224,0,8);
    	}
    	</style>
    	<?php
    		$sql = $bdd->query("SELECT COUNT(*) AS Nbelements FROM anime");
    		$data = $sql->fetch();
			$nbelements = $data['Nbelements']; ?>
		<section>
			
			<aside>
				<h2>Choix du Sujet</h2>
				<p>Liberté, Poster, et Anime !! Notre devise s'applique bien évidemment ici où la communauté peut s'exprimer sans aucun problème. Le principe de poster un sujet est qu'il soit d'abord spécifique à la catégorie. 
				</p>
				
			</aside>

			<?php 
				if (isset($_GET['cat']) && is_numeric($_GET['cat'])) 
				{
					$cat = intval($_GET['cat']);
					if($cat < $nbelements){
					$sql = $bdd->query("SELECT COUNT(*) AS Nbelements FROM anime");
    				$data = $sql->fetch();
					$nbelements = $data['Nbelements']; 
					//Page 1 par défaut
		    		$defaut = 1;
		    		$nbshow = 5; //Nb de résultats à afficher
		    		// On recupère le résultat nb d'animes dans la BDD
		    		$nbelements = $data['Nbelements']; 
		    		#var_dump($nbelements); exit;
		    		//On calcule le nombre d'elements par le nb d'anime a voir
		    		$nbpages = ceil($nbelements/$nbshow); 
		    		#var_dump($nbshow); exit;
    					if ($cat >= 1 && $cat <= $nbpages) {
							// Si condition vérif on affecte le num de la page à la page par défaut
							$defaut = $cat;
						} elseif ($cat < 1) {
							// Si page diff de 0 alors on remet 1 par défaut
							$defaut = 1;
						} else {
							$defaut = $nbpages;
						}
					
				
				
			?>
			<article id="article_ds">
				<h3>Sujets de la catégorie <?php ?></h3>
				<?php 
					$calc = (($defaut - 1)*$nbshow);
					//var_dump($calc); exit;
					$req = $bdd->prepare("SELECT * FROM sujet WHERE codecat = :cat ORDER BY datesujet ASC");
					$req->execute(array(
						'cat'=>$cat,
						))or die(print_r($req->errorInfo()));
					//var_dump($req); exit;
					while($infos = $req->fetch()) 
					{
						$date = $infos['datesujet'];
    					$dates = explode("-", $date);
				?>
				<div id ="rubrique">
					<p>
					<strong><a href="sujets.php?sujet=<?php echo $infos['numsujet'];?>"><?php echo $infos['nomsujet']; ?></a></strong><br/><em><?php echo "$dates[2]/$dates[1]/$dates[0]"; ?></em><br/>
					</p>
				</div>
				<?php 
						//}
					}

					}else { header('Location:forum.php'); }
				?>

				<br/><br/>
				<?php 
				if ($_SESSION['administration'] == 1){
					if (isset($_POST['ajouter'])){
						$reukette = $bdd->query('SELECT COUNT(numsujet) AS nbsujet FROM sujet');
    					$data = $reukette->fetch();
    					$count = $data['nbcat'];
    					$count++;//var_dump($count); exit;	
   						$titre = htmlentities($_POST['titre']);
						$datesujet = date('Y-m-d');
						$sql = $bdd->prepare("INSERT INTO sujet(numsujet, nomsujet, datesujet, codecat, codeuser) VALUES (:num, :titre, :datesujet, :codecat, :codeuser)");
						$sql->execute(array(
							'num' => $count,
							'titre' => $titre,
							'datesujet' => $datesujet,
							'codecat' => $cat, 
							'codeuser' =>$_SESSION['numuser'],
							))or exit(print_r($sql->errorInfo()));
							echo "<strong>Sujet enregistré !</strong><br/>";
				?>
				<?php } else { ?>
				<form action="categories.php" method="POST">
					<h3>Ajouter une nouveau sujet</h3>
					<label>Titre : </label><input type="text" name="titre" maxlength="50" required /><br/><br/>
					
					<input type="submit" name="ajouter" value="Créer" />
				</form>
				<?php 
					} 
				} ?>
				<?php
				} else { header('Location:forum.php'); }
				?>
			</article>
		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
