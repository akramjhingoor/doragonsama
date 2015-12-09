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
        <title>Doragon-sama - Plan du Site</title>
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

			<aside>
				<h2>Plan du Site</h2>
				<p>Vous êtes perdu(e)(s) ? Pas d'inquiétude. <br/>Ici, vous avez le plan du site avec des liens vers les différentes pages du site !<br/> Eh oui, Doragon-sama est bienveillant auprès de ses disciples.</p>
			</aside>

			<article id="article_ds">
				<h2>Cheminement du Site Doragon-sama</h2>
				<ul>
					<li><strong><a href="accueil.php">Page d'accueil</a></strong></li>
					<li><strong><a href="banque.php?page=1">Banque d'animes</a></strong></li>
					<li><strong><a href="forum.php">Forum du site</a></strong></li>
					<li><strong><a href="ajouter.php">Ajout d'animes</a></strong></li>
					<li><strong><a href="ajouter_typeanime.php">Ajout du types des animes</a></strong></li>
					<li><strong><a href="modif.php">Modification d'animes</a></strong></li>
					<li><strong><a href="projetperso.php">Présentation du projet perso</a></strong></li>
				</ul>	
			</article>	

		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
		</div>
    </body>
</html>
