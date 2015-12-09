<?php

	require ("config.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php require ("boostrap.func.php") ?>
		<link rel="stylesheet" type="text/css" href="style.css">
        <title>Doragon-sama - Inscription</title>
    </head>
	
    <body>
    <div id="bloc_page">
    	<header>
    		<div id ="imglogo">
    		<img src="img/logodoragon.png">
    		</div>
    		<h1>Doragon-sama</h1>
    		<blockquote>Le maître dragon et sa culture ancestrale</blockquote>
    		
    	</header>
    	<?php

    	$req = $bdd->query('SELECT COUNT(numuser) AS nbusers FROM utilisateurs');
    	$data = $req->fetch();
    	$count = $data['nbusers']; 

    	?>
		<section>
			<aside>
				<h2>Rejoindre la communauté</h2>
				<p>Sachant que la communauté s'agrandit, il est important pour le maître Doragon de connaître ces disciples. Le but est de leur donner un toit, un lieu où tous ces disciples pourront se réunir afin de partager, de confronter et d'apprendre. 
				</p>
				<hr />
				<p><strong>Petite explication sur les modalités d'inscription</strong><br />On vous demande de renseigner les informations suivantes : <br/>
				</p>
				<p><ul><li><em>Pseudo</em> : Afin de pouvoir être connu des autres membres et du Maître</li><li><em>Mot de Passe</em> : Afin d'accéder à votre compte</li><li><em>Email</em> : Montre que vous faites partie de la communauté</li><li><em>Description</em> : Comme vous vous sentez en ce moment</li></ul></p>
			</aside>

			<article id="article_ds">
				<?php 

				if (isset($_POST['Inscrire'])) 
				{
					$pseudo = $_POST['pseudo'];
					$mdp = $_POST['mdp'];
					$confirm_mdp = $_POST['confirm_mdp'];
					$email = $_POST['email'];
					$humeur = $_POST['description'];
					//var_dump($_POST['Inscrire']);
					if ($pseudo&&$mdp&&$confirm_mdp&&$email&&$humeur) {
						
						if ($mdp == $confirm_mdp) 
						{
							$email = $_POST['email'].'@doragonsama.com';
							$count++;
							$date = date("Y-m-d");
							$admin = FALSE;
							//var_dump($email); exit;	
							$requete = $bdd->prepare("INSERT INTO utilisateurs(numuser, pseudo, motdepasse, email, statut_humeur, dateinscription, administration) VALUES (:num, :pseudo, :motdepasse, :email, :statut, :dateinscription, :admin)");
		 					$requete->execute(array(
		 						'num' => $count,
		 						'pseudo' => $pseudo,
		 						'motdepasse' => $mdp,
		 						'email' => $email,
		 						'statut' => $humeur,
		 						'dateinscription'=> $date,
		 						'admin' => $admin,
		 						)) or die(print_r($requete->errorInfo())); 
		 					echo "Inscription enregistré !<br/><strong>Bienvenue dans la communauté ! <br/>Que la force et la sagesse te guide !</strong><br/>";
		 					echo "<a href='index.php'>Retournez à l'accueil</a>"; 


						}else { echo '<strong>Les mots de passe ne correspondent pas...</strong><br/>'; echo '<a href="inscription.php">Réessayez de nouveau</a>'; }

					} else { echo '<strong>Remplir tous les champs est essentiel pour s\'inscrire</strong><br/>'; echo '<a href="inscription.php">Réessayez de nouveau</a>'; }

				}else { header('Location:inscription.php'); }
				?>
			</article>
		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
