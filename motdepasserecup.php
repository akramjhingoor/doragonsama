<?php

	require ("config.php"); #Connexion a la base (inclusion de la connexion par CLASSE PDO:Statement)

?>
<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
		<?php require ("boostrap.func.php") ?>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Doragon-sama - Accueil</title>
    </head>
	<style type="text/css">
	form
	{
		padding: 15px 25px;
	}
	#info_verif
	{
		font-size: 1.2em;
	}
	</style>
    <body>
    <div id="bloc_page">
    	<header>
    		<div id ="imglogo">
    		<img src="img/logodoragon.png">
    		</div>
    		<h1>Doragon-sama</h1>
    		<blockquote>Le maître dragon et sa culture ancestrale</blockquote>
    		<!--<div id="connexion">
    		</div> -->	
    	</header>
    
		<section>
			
			<aside>
				<h2>Récupération du mot de passe</h2>
				<p>Il arrive qu'on oublie son mot de passe, ça prouve qu'on peut être étourdi(e). Ici, nous allons pouvoir récupérer notre mot de passe. </p>
			</aside>
					
			<article id="article_ds">
			<?php
    		if (isset($_POST['recuperer'])) 
    		{
    			 
    			$login = htmlentities($_POST['name_user']);
				$email = htmlentities($_POST['email']);

    			$sql = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = :nom AND email = :email ");

    			$sql->execute(array(
    				'nom' => $login, 
    				'email' => $email,
    				)) or exit(print_r($sql->errorInfo()));
    			$infos = $sql->fetch();
    			//var_dump($infos); exit;

    		
    		echo '<h4>Informations vérifiés, '.$infos['pseudo'].'.<br/>Vous êtes bien présent(e) dans la communauté !<br/>'; 
    		echo 'Voilà votre mot de passe : <em><strong>'.$infos['motdepasse'].'</strong></em><br/></h4>';
    		echo '<a href="index.php">Retournez à l\'accueil</a>';
			?>
			<?php
			}
			else 
			{
			?>	
				<form action ="motdepasserecup.php" method="POST">
    			<label>Pseudo : </label> <input type="text" name="name_user" placeholder="Nom d'utilisateur" required /><br/><br/>
    			<label>E-mail : </label> <input type="text" name="email" placeholder="Email" required /><br/><br/>
    			
    			<input type="submit" name="recuperer" value ="Récupérer" /><br/><br/>
    			
    			</form>
    		<?php } ?>	
			</article>
		</section>

		<footer>
			<br/><br/>
			<p>Copyright &copy; - Akram and Doragon-sama Team</p>
			<a href="projetperso.php">Explicatif Projet Perso 1</a>
		</footer>
	</div>
    </body>
</html>
