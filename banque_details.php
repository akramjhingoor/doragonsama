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
		<title>Doragon-sama - Banque d'Animes</title>
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
    	<?php 
    		
    		if (isset($_GET['nom']) && is_string($_GET['nom']) && !empty($_GET['nom']) && !is_numeric($_GET['nom'])) {
    		
    			$name = $_GET['nom'];

    			$sql = $bdd->prepare("SELECT * FROM anime WHERE nomanime = :name ");
    			$sql->execute(array(
					'name' => $name,
					)) or exit(print_r($sql->errorInfo()));
    			//var_dump($sql); exit;
    			while ($data = $sql->fetch())
    			{
    				
    				//echo $data['dateparution'];
    				$date = $data['dateparution'];
    				$dates = explode("-", $date);
    				//print_r($dates);

    	?>
		<section>
		<?php

				$req = $bdd->prepare("SELECT * FROM type_anime WHERE codeanime = :num ");
				$req->execute(array(
					'num' =>$data['numanime'], 
					)) or exit(print_r($req->errorInfo()));
				
				

		?>
		
		
			<aside>
				<h2>Informations générales</h2><br/>
				<p>Genre : <em><?php echo $data['genre_anime']; ?></em></p>
				<p>Statut : <em><?php echo $data['statut_anime']; ?></em></p>
				<p>Date de parution : <?php echo "$dates[2]/$dates[1]/$dates[0]"; ?></p>
				<p>Nombre de saisons : <?php echo $data['nbresaisons']; ?></p>
				<p>Nombre d'épisodes : <?php echo $data['nbrepisodes']; ?></p>
				<hr />
				
				<p style="font-size: 1.2em; "><em> 
				<?php
				echo " - "; 
				while ($info = $req->fetch()) 
				{
				 echo $info['libelle'];
				 echo " - ";  
				
				
				}

				?></em></p>
				
			</aside>
			
			<article>
				<div id="synop">
					<h1 align="center"><?php echo $data['nomanime'];?></h1>
					<h2>Synopsis</h2><br/>
					<p style=" text-align: justify;"><strong><?php echo $data['synopsis']?></strong></p>
					
				</div>
				<div id="comm">	
					<form action="commentaires.php" method="POST">
						<h3>Donnez votre avis !</h3>
						<input type="hidden" name="nameauthor" value"<?php echo $_SESSION['pseudo']; ?>" />
						<label>Commentaire : </label><br/><textarea name="contenu" placeholder ="Je pense cela ! Ceci est comme ça ! L'anime reflète ça..."rows="8" cols="70"></textarea><br/><br/>
						<input type="hidden" name="numanime" value="<?php echo $data['numanime']; ?>" />
						<input type="hidden" name="nomanime" value="<?php echo $data['nomanime']; ?>" />
						<input type="submit" name="valider" value="Okay !" /><br/><br/>
					</form>
					<br/><br/>

					<?php

					$requesta = $bdd->prepare('SELECT datecom, auteur, contenu FROM commentaires WHERE keyanime = :num ORDER BY numcom DESC LIMIT 0, 10');
					$requesta->execute(array(
						'num' => $data['numanime'],
						)) or exit(print_r($requesta->errorInfo()));
					while ($donnees = $requesta->fetch()) 
					{
						$datecom = $donnees['datecom'];
    					$datecoms = explode("-", $datecom);
						echo '<h4>' .$donnees['auteur']. '&nbsp&nbsp-&nbsp&nbsp<em>' .$datecoms[2].'/'.$datecoms[1].'/'.$datecoms[0]. '</em></h4>';
						echo "<br/>";
						echo '<p style=" width: 600px;">'.$donnees['contenu'].'</p>';
						echo "<br/><br/>";
					}
					?>
				</div>	
			</article>
		</section>
		<?php 
			}
		}else header('Location:banque.php');

    	?>
		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
	</body>
</html>
