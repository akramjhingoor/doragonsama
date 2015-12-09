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
		<section>
			
			<aside>
				<h2>Choix du Sujet</h2>
				<p>Liberté, Poster, et Anime !! Notre devise s'applique bien évidemment ici où la communauté peut s'exprimer sans aucun problème. Le principe de poster un sujet est qu'il soit d'abord spécifique à la catégorie.
				<br/><br/>
				<em>Dans le cas où vous aimeriez faire une liste, utilisez le symbole * <br/>Liste : <br/>*Exemple  1 <br/>*Exemple 2</em> 
				</p>
				
			</aside>
			<?php 
				$tab = array();

				$reukette = $bdd->query('SELECT numuser, pseudo FROM utilisateurs');
				//$donna = $reukette->fetch();
				while ($donna = $reukette->fetch()) {
					$tab[$donna['numuser']] = $donna['pseudo'];
				}
				//print_r($tab); exit;
			?>
			<?php 
				if (isset($_GET['sujet']) && is_numeric($_GET['sujet'])) 
				{
					$sujet = intval($_GET['sujet']);
			?>
			<article id="article_ds">
				<h3>Sujets de la catégorie</h3>
				
				<form action="sujet_post.php" method="POST">
					<label>Votre réponse : </label><br/><textarea name="reponse" placeholder ="Eh bien, moi aussi je pense ça mais tu peux essayer ça..."rows="8" cols="70" maxlength="750"></textarea><br/><br/>
					<input type="hidden" name="sujet" value="<?php echo $sujet; ?>"/>

					<input type="submit" name="repondre" value="Répondre" />

				</form>
				<?php
				$sql = $bdd->prepare("SELECT * FROM messages WHERE keysujet = :codesujet ORDER BY datemsg ASC");
					$sql->execute(array('codesujet' =>$sujet,)) or die(print_r($sql->errorInfo()));
					while($donnees = $sql->fetch()){ 
						//print_r($donnees); exit;
						$contenu = $donnees['contenu'];
						$contenu = str_replace('*', '<br/>-&nbsp;', $contenu);
						$contenu = str_replace('Doragon-sama', '<strong>Doragon-sama</strong>', $contenu);
						$contenu = str_replace('Doragonsama', '<strong>Doragon-sama</strong>', $contenu);
						$date = $donnees['datemsg'];
    					$dates = explode("-", $date);
				?>
				<div id="rubrique"><p><strong><?php echo $tab[$donnees['keyuser']]; ?></strong>&nbsp;&nbsp;<em><?php echo "$dates[2]/$dates[1]/$dates[0]"; ?></em><br/>
				<?php echo $contenu; ?><br/>				
				</p></div>
			<?php } } ?></article>
		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
