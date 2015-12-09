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
			
			<article style=" text-align: left;">
				<h3>Liste d'utilisateurs par date d'inscription</h3>
				<form action ="updatefrom.php" method="POST">
					<?php 
					echo '<select name="nomuser" size="4" style=" width: 100px;">';
						$listUser = $bdd->query("SELECT numuser, pseudo FROM utilisateurs ORDER BY pseudo ASC");
						while ($donnees = $listUser->fetch()) {
	            					echo '<option>'.$donnees['pseudo'];

	              				}

	            				echo "</select><br/><br/>";
					?>
					 <label>Changer le rang : </label><br/><input type="radio" name="choixadmin" value="oui" /> &nbsp;Oui, le changement c'est maintenant ! ;<br/><input type="radio" name="choixadmin" value="non" />&nbsp; Non, on ne change pas une équipe qui gagne ! ;<br/><br/>
					 <input type="submit" name="droits" value="Choisir" />
				</form><br/><br/>
				<?php 
					$sql = $bdd->query("SELECT * FROM utilisateurs ORDER BY dateinscription");
					while($infos = $sql->fetch())
					{
				?>
				<p>	<strong><?php echo $infos['dateinscription']; ?></strong> : <?php echo $infos['pseudo']; ?>
				<br/>Rang : <?php if ($infos['administration'] == 1){ echo '<strong style="font-size: 1.2em;">Maître Tout-puissant !</strong>'; }else { echo "Disciple de Doragon-sama"; } ?></p>
				<?php		
					}
				?>
			</article>
		</section>
		
		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
