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
		<title>Doragon-sama - Profil</title>
    </head>
	<body>
    <div id="bloc_page">
    	<header>
    		<?php require ("inc/header.php"); ?>
			<?php
    			require ("menu.php") //Affiche le menu (inclut le menu en gros)
    		?>

    	</header>
		<section>
			<?php 
				$sql = $bdd->query("SELECT * FROM utilisateurs WHERE numuser = ".$_SESSION['numuser']);
				$infos = $sql->fetch();
			?>
			<aside>
				<h2>Informations du profil</h2>
				<p><strong>Pseudo : </strong><?php echo $infos['pseudo']; ?><br/><br/>
				<strong>Email : </strong><span style="text-decoration:underline;"><?php echo $infos['email']; ?></span><br/><br/>
				<strong>Humeur : </strong><em><?php echo $infos['statut_humeur']; ?></em><br/><br/>
				<strong>Droits d'administration : </strong><br/>
				<?php if ($infos['administration'] == 1){ echo '*<strong style="font-size: 1.2em;">Maître Tout-puissant !</strong>*'; }else { echo "Disciple de Doragon-sama"; }  ?><br/>
				<a href="changeprofil.php" style="color:silver;">Rectifier son profil</a>
				</p> 
			</aside>

		
			<article id="article_ds">
				<h3>Dernières activités sur le site : </h3>
				<p><?php 
				$reukette = $bdd->prepare('SELECT * FROM commentaires WHERE auteur = :pseudo ORDER BY datecom');
				$reukette->execute(array( 'pseudo' => $_SESSION['pseudo'],)) or die(print_r($reukette->errorInfo()));
				while($data = $reukette->fetch()){
				?>
				<strong style="font-size: 1.1em;"><?php echo $data['datecom']; ?></strong> - <span style="font-size: 1.3em;"><?php echo $data['contenu']; ?></span><br/><br/>
				<?php		
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
