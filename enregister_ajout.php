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
		<link rel="stylesheet" type="text/css" href="style.css">
        <title>Doragon-sama - Ajouter</title>
        <?php require ("boostrap.func.php") ?>
    </head>
	
    <body>
    	<div id="bloc_page">
    	<header>
    		<?php require ("inc/header.php"); ?>
    		<?php

    			require ("menu.php");

    		?>
    	</header>

		<section>
			<aside>
			<h2>Amélioration la connaissance de la japanimation</h2>
			<p>Ce formulaire permet d'ajouter des animes dans notre banque à mangas. L'équipe doragon-sama possède effectivement une connaissance incroyable d'anime cependant il n'y a pas d'âge pour apprendre.<br/>
			Dans ce formulaire, il faut renseigner tous les champs pour avoir tous les informations sur l'anime qui va être ajouté. En effet, les animes sont ajoutés à la Banque d'animes de Doragon-sama (BAD).<br/>
			Le genre de l'anime correspond à la destination des spectateurs, c'est-à-dire qu'il est destiné à une portion de la population <em>(ex : Shonen vise un public d'adolescents)</em>.	<br/>
			</p>
			</aside>
			<style type="text/css">
            .affich_result
            {
                position: relative; 
                left: 170px;
                bottom: 290px;
                font-size: 1.2em; 
            }
            </style>
			<article id="article_ds">
				<p class="affich_result">
				<?php

				if (isset($_POST['Ajouter'])) 
				{
					
					$nom = $_POST['nomanime'];
					$genre = $_POST['genre_anime'];
					$statut = $_POST['statut_anime'];
					$dateparution = $_POST['dateparution'];
					$nbepisodes = $_POST['nbepisodes'];
					$nbsaisons = $_POST['nbsaisons'];
					$synop = $_POST['synopsis'];

					if ($nom&&$genre&&$statut&&$dateparution&&$nbepisodes&&$nbsaisons&&$synop)
					{
						$count = $bdd->query('SELECT COUNT(*) AS nbnum FROM anime');
						$donnees = $count->fetch();
						$nbnum = $donnees['nbnum'];
						$nbnum++;
						$requete = $bdd->prepare("INSERT INTO anime(numanime, nomanime, genre_anime, statut_anime, dateparution, nbrepisodes, nbresaisons, synopsis) VALUES (':num', :nom, :genre, :statut, :dateparution, :nbepisodes, :nbsaisons, :synop)");
	 					$requete->execute(array(
	 						'num' => $nbnum,
	 						'nom' => $_POST['nomanime'], 
	 						'genre' => $_POST['genre_anime'],
	 						'statut' => $_POST['statut_anime'],
	 						'dateparution' => $_POST['dateparution'],
	 						'nbepisodes' => $_POST['nbepisodes'], 
	 						'nbsaisons'=> $_POST['nbsaisons'], 
	 						'synop' => $_POST['synopsis'],
	 						)) or die(print_r($requete->errorInfo())); 
	 					echo "Données mis à jour dans la banque d'animes<br/>";
	 					echo "<a href='ajouter.php'>Retournez au formulaire</a>"; 

					}
					else
					{
						echo "Remplir l'ensemble des champs est essentiel";

					}

				}
				else
				{
					header('Location:ajouter.php');
				}

				?>
				</p>
			<article>
		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
		</div>
    </body>
</html>
