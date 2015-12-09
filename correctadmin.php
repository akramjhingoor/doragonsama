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
    	<meta charset="utf-8">
		<?php require ("boostrap.func.php"); ?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Doragon-sama - Panneau d'admin</title>
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
    	
    	</style>
		<section>
			<?php 

			if (isset($_GET['option']) && is_string($_GET['option']) && !empty($_GET['option']) && !is_numeric($_GET['option'])) {

				$option = strval($_GET['option']);
				$option = htmlspecialchars($option);
				if ($option == 'anime') {
					$count = $bdd->query('SELECT COUNT(*) AS Nbelements FROM anime');
					$data = $count->fetch();
					$nbshow = 10;
				}elseif ($option == 'commentaires') {
					$count = $bdd->query('SELECT COUNT(*) AS Nbelements FROM commentaires');
					$data = $count->fetch();
					$nbshow = 5;
				}elseif ($option == 'messages') {
					$count = $bdd->query('SELECT COUNT(*) AS Nbelements FROM messages');
					$data = $count->fetch();
					$nbshow = 5;
				}elseif ($option == 'utilisateurs') {
					$count = $bdd->query('SELECT COUNT(*) AS Nbelements FROM utilisateurs');
					$data = $count->fetch();
					$nbshow = 5;
				}
				//Page 1 par défaut
	    		$defaut = 1;
	    		//Nb de résultats à afficher
	    		// On recupère le résultat nb d'animes dans la BDD
	    		$nbelements = $data['Nbelements']; 
	    		#var_dump($nbelements); exit;
	    		//On calcule le nombre d'elements par le nb d'anime a voir
	    		$nbpages = ceil($nbelements/$nbshow); 
	    		#var_dump($nbshow); exit;
				if (isset($_GET['page']) && is_numeric($_GET['page']) && !empty($_GET['page'])) {
				
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
				$tabAnime = array();
				$tabSujet = array();
				$tabUser = array();

				$listAnime = $bdd->query("SELECT numanime, nomanime FROM anime");
				while ($data = $listAnime->fetch()) {
					$tabAnime[$data['numanime']] = $data['nomanime']; //Tableau des animes
				}
				$listSujet = $bdd->query("SELECT numsujet, nomsujet FROM sujet");
				while ($datos = $listSujet->fetch()) {
					$tabSujet[$datos['numsujet']] = $datos['nomsujet']; // Tableau des sujets
				}
				$listUser = $bdd->query("SELECT numuser, pseudo FROM utilisateurs");
				while ($donnees = $listUser->fetch()) {
					$tabUser[$donnees['numuser']] = $donnees['pseudo']; //Tableau des utilisateurs
				}
			?>

			<article style=" text-align: center;">
			<?php
			
				if($option == 'commentaires'){
				
				echo '<h3>Liste de '.$option.' par ordre d\'ajout</h3>';
				echo '<ul>';
				
					$sql = $bdd->query("SELECT * FROM commentaires ORDER BY datecom DESC LIMIT ".(($defaut - 1)*$nbshow).", $nbshow") or exit(print_r($sql->errorInfo()));
					
					while ($infos = $sql->fetch()) 
					{
			?>
				<li><em><a href="updatefocus.php?option=commentaires&numero=<?php echo $infos['numcom'];?>" ><?php echo $infos['datecom']; ?></a></em> (par <?php echo $infos['auteur']; ?>) - <strong><?php echo $tabAnime[$infos['keyanime']]; ?></strong> : <?php echo $infos['contenu'];?></li><br/>
			<?php		
					
					}
					echo "<br/>";
					echo "<p> Page [ ";
					for ($i=1; $i <= $nbpages ; $i++) { 
						echo " <a href='correctadmin.php?option=$option&page=$i'>$i</a> - ";
					}
					echo " ]</p>";
					
					}
					elseif($option == 'messages'){
				
						echo '<h3>Liste de '.$option.' par ordre d\'ajout</h3>';
						echo '<ul>';
						
							$sql = $bdd->query("SELECT * FROM messages ORDER BY datemsg DESC LIMIT ".(($defaut - 1)*$nbshow).", $nbshow") or exit(print_r($sql->errorInfo()));
							
							while ($infos = $sql->fetch()) 
							{
					?>
						<li><em><a href="updatefocus.php?option=messages&numero=<?php echo $infos['nummsg'];?>" ><?php echo $infos['datemsg']; ?></a></em> - <?php echo $tabSujet[$infos['keysujet']];?></a> ( <strong><?php echo $tabUser[$infos['keyuser']]; ?></strong> ) : <?php echo $infos['contenu'];?></li>
					<?php		
							
						}
						echo "<br/>";
						echo "<p> Page [ ";
						for ($i=1; $i <= $nbpages ; $i++) { 
							echo " <a href='correctadmin.php?option=$option&page=$i'>$i</a> - ";
						}
						echo " ]</p>";
						}//else header('Location:paneladmin.php');
					
			?>
			</article>
		</section>
		<?php 
					
					}
				
			} else header('Location:paneladmin.php'); 
		?>
		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
