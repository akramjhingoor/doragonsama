<?php

	require ("config.php"); #Connexion a la base (inclusion de la connexion par CLASSE PDO:Statement)

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php require ("boostrap.func.php") ?>
		<link rel="stylesheet" type="text/css" href="style.css">
        <title>Doragon-sama - Projet Perso</title>
    </head>

    <body>
    	<div id = "bloc_page">
    	<header>
    		<div id ="imglogo">
    		<img src="img/logodoragon.png">
    		</div>
    		<h1>Doragon-sama</h1>
    		<blockquote>Le maître dragon et sa culture ancestrale</blockquote>

    	</header>

		<section>

			<aside>
				<h2>Commentaires personnels</h2>
				<p>Ce site fait partie du Projet Perso 1. Il peut s'avérer que le site subit une amélioration tant dans les détails graphiques que dans les techniques et actions possibles par l'utilisateur. Ce projet permet surtout de revoir les acquis en développement Web et voir la logique de <em>How to develop</em> en général. Pour la réalisation de cette interface, l'équipe Doragon-sama s'est appuyé sur un "cahier des charges" pour comprendre les besoins liés au projet. Voici un aperçu des exigences de ce projet.  
				</p>
			</aside>

		
			<article id="article_ds">
				<!--En attendant le css, on utilise les attributs-->
				<iframe src="fichiers/projetpersov3.pdf" width="800" height="600" align="middle"></iframe>
			</article>
			
		</section>

		<footer>
			<br/><br/>
			<p>Copyright &copy; - Akram and <a href="index.php">Doragon-sama</a> Team</p>
			<a href="projetperso.php">Explicatif Projet Perso 1</a>
		</footer>
		</div>
    </body>
</html>
