<?php

	require ("config.php"); #Connexion a la base (inclusion de la connexion par CLASSE PDO:Statement)
	session_start();
	if (!isset($_SESSION['numuser']) ){
		header('Location:index.php');
	}
?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
		<?php require ("boostrap.func.php") ?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Doragon-sama - Accueil</title>
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
				<h2>Commentaires personnels</h2>
				<p>Ce site fait partie du Projet Perso 1. Il peut s'avérer que le site subit une amélioration tant dans les détails graphiques que dans les techniques et actions possibles par l'utilisateur. Ce projet permet surtout de revoir les acquis en développement Web et voir la logique de <em>How to develop</em> en général. 
				</p>
			</aside>

		
			<article id="article_ds">
				<h2>Doragon-sama, le maître</h2>
				<p>Il fut un temps où les dragons et les humains vivaient paisiblement dans le monde d'Emerald Land. Dans ce royaume, il existait une éleveuse de dragon appelé Elsa. Elle vivait dans les plaines de GreatMara près de la campagne de la capitale impériale. Son amoureux avec qui elle était tombée enceinte est mort dans des circonstances mystérieuses. Il eut un fils qu’Elsa appelait Doragon par admiration pour ces créatures légendaires. C’est ainsi que Doragon-sama devient un chevalier sacré de l’empereur Vergo sixième du nom. Ses exploits étaient contés au-delà des terres inconnus tel était la grandeur de sa force. Bien évidemment, ce n’est pas vrai. Doragon-sama est juste un vieux ermite qui possède un culture sur la japanimation enfin surtout les types d’anime qui lui plaît. 
				</p>
				<h2>Objectifs de site</h2>
				<p>Ce site permet d'exposer de manière non-officiel les animes vu par l'équipe de développement qui s'est occupé de l'application Web. Le principal objectif est donc d'avoir une base où l'on peut voir les animes visionnés et bien encore d'en ajouter. D'un point de vue technique, elle permet de mettre en oeuvre les compétences en HTML/CSS et pour dynamiser le site en utilisant le PHP. Ce site va de pair avec la <strong>base de données qui stocke toutes les infos des animes</strong>(<em>ex : Le nom, le résumé de l'anime et s'il est récent ou non</em>). En définitive, on intéragie avec la base grâce à l'interprétation du PHP et on récupère, manipule enfin ce qu'on veut avec le Langage MySQL (<em>Annexe : le module utilisé est <strong>phpmyadmin</strong> livré avec le serveur Apache dans la plateforme de développement WAMP</em>). 
				</p>
			</article>
		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
