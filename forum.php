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
		<title>Doragon-sama - Forum</title>
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
				<h2>Bienvenue sur le Forum !</h2>
				<p>Dans ce lieu de partage, tout le monde est libre de discuter avec la communauté. L'utilité de ce forum, c'est simple ! Une question, une envie de donner son opinion, de s'exprimer, que vous soyez un admin ou un utilisateur, vous pouvez poster un message dans la catégorie qui correspond. 
				</p>
			</aside>

		
			<article id="article_ds">
			<?php
				$req = $bdd->query('SELECT COUNT(numcat) AS nbcat FROM categories');
    			$data = $req->fetch();
    			$count = $data['nbcat'];
    			$count++;
    			//var_dump($count); exit;
    		?>
    			<h3>Catégories du Forum</h3>
				<?php 
					$req = $bdd->query("SELECT * FROM categories ORDER BY numcat ASC");
					while($infos = $req->fetch()) 
					{
				?>
				<div id ="rubrique"><p><strong><a href="categories.php?cat=<?php echo $infos['numcat']?>"><?php echo $infos['nomcat']; ?></a></strong><br/><?php echo $infos['description']; ?>
				</p></div>
				<?php 
					}
				?><br/><br/>
				<?php 
				if ($_SESSION['administration'] == 1){
					if (isset($_POST['ajouter'])){
						$reukette = $bdd->query('SELECT COUNT(numcat) AS nbcat FROM categories');
    					$data = $reukette->fetch();
    					$count = $data['nbcat'];
    					$count++;//var_dump($count); exit;	
   						$titre = htmlentities($_POST['titre']);
						$descrip = htmlentities($_POST['description']);
						$sql = $bdd->prepare("INSERT INTO categories(numcat, nomcat, description) VALUES (:num, :titre, :descrip)");
						$sql->execute(array(
							'num' => $count,
							'titre' => $titre,
							'descrip' => $descrip,
							))or exit(print_r($sql->errorInfo()));
							echo "<strong>Catégories enregistrés !</strong><br/>";
				?>
				<?php } else { ?>
				<form action="forum.php" method="POST">
					<h3>Ajouter une nouvelle Catégorie</h3>
					<label>Titre : </label><input type="text" name="titre" maxlength="40" required /><br/>
					<label>Description : </label><input type="text" name="description" maxlength="60" required/><br/>
					<input type="submit" name="ajouter" value="Créer" />
				</form>
				<?php 
					} 
				} ?>
			</article>
		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
