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
		<meta charset="utf-8"/>
		<title>Doragon-sama - Recherches</title>
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
    	
		<section>
		
			<style type="text/css">
			

			</style>

			<?php
				if (isset($_POST['Rechercher']) && !empty($_POST['search_bar'])) 
				{

					$recherche = '%'.$_POST['search_bar'].'%';

					//var_dump($recherche); exit;
					$sql = $bdd->prepare("SELECT * FROM anime WHERE nomanime LIKE :requete ORDER BY nomanime ASC"); 

					$sql->execute(array( 
						'requete'=> $recherche,
						)) or exit(print_r($sql->errorInfo())); 
					//var_dump($sql); exit;	
					$cpt = $sql->rowCount();
					if($cpt != 0)
					{	
					?>
					<h3>Résultats de votre recherche.</h3>
					<p>Nous avons trouvé 
						<?php 
						echo $cpt;  
						if($cpt > 1) { echo ' résultats'; } 
						else { echo ' résultat'; } 
						?>
						dans la banque d'animes. Voici les animes trouvées :<br/>
						<br/>
						<ul>
						<?php
						while($donnees = $sql->fetch()) 
						{
						?>
						<li><a href="banque_details.php?nom=<?php echo $donnees['nomanime']; ?>"><?php echo $donnees['nomanime']; ?></a></li>
						<?php
						} 
						?></ul><br/>
						<br/>
					<a href="banque.php">Nouvelle recherche ?</a></p>
					<?php
					} 
					else
					{ //Message en cas d'erreur ou pas de résultats
					?>
					<h3>Aucun résultat</h3>
					<p>Nous n'avons trouvé aucun résultat pour votre recherche " <em><?php echo $_POST['search_bar']; ?> </em>". <br/><a href="banque.php">Réessayez</a> une autre recherche.</p>
					<?php
					}
					$sql->closeCursor(); 
				} else { header('Location:banque.php'); }

			?>
		</section>
		
		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
	</body>
</html>
