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
		<title>Doragon-sama - Changer son profil</title>
    </head>
	<style type="text/css">
	
	</style>
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
				<h2>Modifier son profil</h2>
				<p>Je veux changer mon pseudo, je le trouve un peu vieux jeu ou je veux un pseudo de warrior pas de noob. Eh oui, vous pouvez le faire ici n'importe quelle raison (Faites comme vous le sentez mais avec modération si possible)
			</aside>

			<article id="article_ds">
			<?php 
				if(isset($_POST['changer'])){

					if (isset($_POST['pseudo']) && isset($_POST['motdepasse']) && isset($_POST['description'])) {

						$sql = $bdd->prepare("UPDATE utilisateurs SET pseudo = :pseudo, motdepasse = :mdp, statut_humeur = :humeur WHERE pseudo = :session");
						$sql->execute(array(
							'pseudo'=> $_POST['pseudo'],
							'mdp' => $_POST['motdepasse'],
							'humeur'=> $_POST['description'],
							'session' => $_SESSION['pseudo'],
							)) or exit(print_r($sql->errorInfo()));
						$_SESSION['pseudo'] = $_POST['pseudo'];
						$_SESSION['motdepasse'] = $_POST['motdepasse'];
						$_SESSION['statut_humeur'] = $_POST['description'];
						echo '<strong>Informations modifiés</strong><br/>On se sent mieux maintenant !';
						echo '<a href="profil.php">Retournez au profil</a>';
					}
					//else {header('Location:changerprofil.php'); }


			?>
			<?php 
			}
			else
			{
			?>	
				<form action="changeprofil.php" method="POST">
				<h3>Modifier son profil</h3>
				<label>Pseudo : </label><input type="text" name="pseudo" placeholder="Votre Pseudo..."  /><br/>
				<label>Mot de Passe : </label><input type="text" name="motdepasse" placeholder="Mot de Passe" /><br/>
				<label>Humeur : </label><br/><textarea name="description" placeholder ="Votre humeur actuelle" rows="3" cols="30" maxlength="60"></textarea><br/><br/>
				<input type="submit" value="Changer" name="changer" />
				<input type="reset" value="Réinitialiser" />
				</form>
				<?php } ?>
			</article>
		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
