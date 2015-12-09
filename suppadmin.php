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

			if (isset($_GET['op']) && is_string($_GET['op']) && !empty($_GET['op']) && !is_numeric($_GET['op'])) {

				$op = strval($_GET['op']);
				$op = htmlspecialchars($op);
				if ($op == 'anime') {
					$count = $bdd->query('SELECT COUNT(*) AS Nbelements FROM anime');
					$data = $count->fetch();
					$nbshow = 10;
				}elseif ($op == 'commentaires') {
					$count = $bdd->query('SELECT COUNT(*) AS Nbelements FROM commentaires');
					$data = $count->fetch();
					$nbshow = 5;
				}elseif ($op == 'messages') {
					$count = $bdd->query('SELECT COUNT(*) AS Nbelements FROM messages');
					$data = $count->fetch();
					$nbshow = 5;
				}elseif ($op == 'utilisateurs') {
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
				switch ($op) { 
				case 'anime':
				
				echo '<h3>Liste d\'animes par ordre d\'ajout</h3>';
				echo '<ul>';
				
					$sql = $bdd->query("SELECT * FROM anime ORDER BY nomanime ASC LIMIT ".(($defaut - 1)*$nbshow).", $nbshow") or exit(print_r($sql->errorInfo()));
					
					while ($infos = $sql->fetch()) 
					{
			?>
				<li><a href="deletefrom.php?op=<?php echo $op; ?>&num=<?php echo $infos['numanime']?>"><?php echo $infos['nomanime']; ?></a></li>
			<?php		
					
					}
					echo "<br/>";
					echo "<p> Page [ ";
					for ($i=1; $i <= $nbpages ; $i++) { 
						echo " <a href='suppadmin.php?op=$op&page=$i'>$i</a> - ";
					}
					echo " ]</p>";
					break;
			
				case 'commentaires':
				
				echo '<h3>Liste de '.$op.' par ordre d\'ajout</h3>';
				echo '<ul>';
				
					$sql = $bdd->query("SELECT * FROM commentaires ORDER BY datecom DESC LIMIT ".(($defaut - 1)*$nbshow).", $nbshow") or exit(print_r($sql->errorInfo()));
					
					while ($infos = $sql->fetch()) 
					{
			?>
				<li><em><a href="deletefrom.php?op=<?php echo $op; ?>&num=<?php echo $infos['numcom']?>"><?php echo $infos['datecom']; ?></a></em> (par <?php echo $infos['auteur']; ?>) - <strong><?php echo $tabAnime[$infos['keyanime']]; ?></strong> : <?php echo $infos['contenu'];?></li><br/>
			<?php		
					
					}
					echo "<br/>";
					echo "<p> Page [ ";
					for ($i=1; $i <= $nbpages ; $i++) { 
						echo " <a href='suppadmin.php?op=$op&page=$i'>$i</a> - ";
					}
					echo " ]</p>";
					break;

					case 'messages':
				
						echo '<h3>Liste d\''.$op.' par ordre d\'ajout</h3>';
						echo '<ul>';
						
							$sql = $bdd->query("SELECT * FROM messages ORDER BY datemsg DESC LIMIT ".(($defaut - 1)*$nbshow).", $nbshow") or exit(print_r($sql->errorInfo()));
							
							while ($infos = $sql->fetch()) 
							{
					?>
						<li><em><?php echo $infos['datemsg'] ?></em> - <a href="deletefrom.php?op=<?php echo $op; ?>&num=<?php echo $infos['nummsg']?>"><?php echo $tabSujet[$infos['keysujet']];?></a> ( <strong><?php echo $tabUser[$infos['keyuser']]; ?></strong> ) : <?php echo $infos['contenu'];?></li>
					<?php		
							
						}
						echo "<br/>";
						echo "<p> Page [ ";
						for ($i=1; $i <= $nbpages ; $i++) { 
							echo " <a href='suppadmin.php?op=$op&page=$i'>$i</a> - ";
						}
						echo " ]</p>";
						break;
						case 'utilisateurs':
				
						echo '<h3>Liste d\''.$op.' par ordre d\'ajout</h3>';
						echo '<ul>';
						
							$sql = $bdd->query("SELECT * FROM utilisateurs ORDER BY dateinscription DESC LIMIT ".(($defaut - 1)*$nbshow).", $nbshow") or exit(print_r($sql->errorInfo()));
							
							while ($infos = $sql->fetch()) 
							{
					?>
						<li><strong><?php echo $infos['dateinscription'];?></strong> - <a href="deletefrom.php?op=<?php echo $op; ?>&num=<?php echo $infos['numuser']?>"><?php echo $infos['pseudo']; ?></a> : <?php echo $infos['email']; ?></li>
					<?php		
							
						}
						echo "<br/>";
						echo "<p> Page [ ";
						for ($i=1; $i <= $nbpages ; $i++) { 
							echo " <a href='suppadmin.php?op=$op&page=$i'>$i</a> - ";
						}
						echo " ]</p>";
						break;
			?>
			</article>
		</section>
		<?php 
					default:
						header('Location:paneladmin.php');
					break;
					}
				}
			} else header('Location:paneladmin.php'); 
		?>
		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
