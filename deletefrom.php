<?php 
	require ("config.php"); #Connexion a la base (inclusion de la connexion par CLASSE PDO:Statement)
	session_start();
	if (!isset($_SESSION['numuser'])){
		header('Location:index.php');
	}
	if ($_SESSION['administration'] == 0) {
		header('Location:index.php');
	}
	if (isset($_GET['op']) && is_string($_GET['op']) && !empty($_GET['op']) && !is_numeric($_GET['op'])) {

		if (isset($_GET['num']) && is_numeric($_GET['num']) && !empty($_GET['num'])) {
				$op = strval($_GET['op']);
				$op = htmlspecialchars($op);
				$num = intval($_GET['num']);

			switch ($op) {
				case 'anime':
					$deltype = $bdd->prepare('DELETE FROM type_anime WHERE codeanime = :num');
					$deltype->execute(array('num' => $num, )) or die(print_r($deltype->errorInfo()));
					$delcomm = $bdd->prepare('DELETE FROM commentaires WHERE keyanime = :num');
					$delcomm->execute(array('num' => $num, )) or die(print_r($delcomm->errorInfo()));
					$delanime = $bdd->prepare('DELETE FROM anime WHERE numanime = :num');
					$delanime->execute(array('num' => $num, )) or die(print_r($delanime->errorInfo()));
					header('Location:paneladmin.php');

					break;
				case 'commentaires':
					$delcomm = $bdd->prepare('DELETE FROM commentaires WHERE numcom = :num');
					$delcomm->execute(array('num' => $num, )) or die(print_r($delcomm->errorInfo()));
					header('Location:paneladmin.php');
					break;
				case 'messages':
					$delcomm = $bdd->prepare('DELETE FROM messages WHERE nummsg = :num');
					$delcomm->execute(array('num' => $num, )) or die(print_r($delcomm->errorInfo()));
					header('Location:paneladmin.php');
					break;
	
				case 'utilisateurs':
					$delcomm = $bdd->prepare('DELETE FROM utilisateurs WHERE numuser = :num');
					$delcomm->execute(array('num' => $num, )) or die(print_r($delcomm->errorInfo()));
					header('Location:paneladmin.php');
					break;
				default:
					echo "404 USER NOT FOUND";
					break;
			}
		}else header('Location:accueil.php');
	}else header('Location:accueil.php'); 
?>	