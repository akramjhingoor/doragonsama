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
    		<?php 
    			if (isset($_GET['option']) && is_string($_GET['option']) && !empty($_GET['option']) && !is_numeric($_GET['option']) && isset($_GET['numero']) && is_numeric($_GET['numero']) && !empty($_GET['numero']) ) {

				$option = strval($_GET['option']);
				$option = htmlspecialchars($option);
				$numero = intval(htmlentities($_GET['numero']));
				//echo $numero; echo $option;
			   
				$req = $bdd->prepare("SELECT * FROM commentaires WHERE numcom = :num");
				$reukette = $bdd->prepare("SELECT * FROM messages WHERE nummsg = :num");
				
				
    		?>
    	</header>
    	<?php 
    		$erreur = "";
    		if (isset($_POST['reformer'])) {
    			if (isset($_POST['modificus']) && !empty($_POST['modificus'])) {
    				$modificus = htmlentities($_POST['modificus']);
    				if ($option == "commentaires") {
    					$updatefocus = $bdd->prepare("UPDATE commentaires SET contenu = :cont WHERE numcom = :num ");
    					$updatefocus->execute(array('cont'=>$modificus, 'num'=>$numero,))or exit(print_r($updatefocus->errorInfo()));
    					$updatefocus->closeCursor();

    					$erreur = '<strong>Commentaire modifié par Modificator !</strong>';
    				}
					elseif ($option == "messages" ) {
						$updatefocus = $bdd->prepare("UPDATE messages SET contenu = :cont WHERE nummsg = :num ");
    					$updatefocus->execute(array('cont'=>$modificus, 'num'=>$numero,))or exit(print_r($updatefocus->errorInfo()));
    					$updatefocus->closeCursor();

    					$erreur = '<strong>Message modifié par Modificator !</strong>';

					}else $erreur = '<strong>Erreur système !</strong>';
    			}else $erreur = '<strong>Veuillez remplir le champ !</strong>';
    		}
    	?>
		<section>
			<article style=" text-align: center;">
			<form action="updatefocus.php?option=<?php echo $option; ?>&numero=<?php echo $numero;?>" method="POST">
			<h3>Modificator d'admin</h3>
			<strong style=" color:rgb(224,0,8);"><?php echo $erreur;?></strong><br/>
			<?php
				if ($option == "commentaires") {
					//$req = $bdd->prepare("SELECT * FROM commentaires WHERE numcom = :num");
					$req->execute(array('num'=>$numero))or exit(print_r($req->errorInfo()));
					$com_recup = $req->fetch();
					//var_dump($com_recup); exit;
			?>
			<label>Commentaires sujet à la modif </label> : <br/><textarea name="modificus" rows="8" cols="70"><?php echo $com_recup['contenu']; ?></textarea><br/><br/>
			<?php
				}elseif ($option == "messages" ) {
					$reukette->execute(array('num'=>$numero))or exit(print_r($req->errorInfo()));
					$msg_recup = $reukette->fetch();
					//var_dump($msg_recup); exit;
			?>
			<label>Messages sujet à la modif </label> : <br/><textarea name="modificus" rows="8" cols="70"><?php echo $msg_recup['contenu']; ?></textarea><br/><br/>
			<?php
				}				 
			?>
			<input type="submit" name="reformer" value="Réformer"><br/><br/>

			</form>
			
			</article>
		</section>
		<?php }else header('Location:paneladmin.php'); ?>
		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
