<?php 
	require ("config.php"); #Connexion a la base (inclusion de la connexion par CLASSE PDO:Statement)
	session_start();
	if (!isset($_SESSION['numuser'])){
		header('Location:index.php');
	}
	if ($_SESSION['administration'] == 0) {
		header('Location:accueil.php');
	}

	if (isset($_POST['droits'])) {
		#echo "Vive les vaches !";
		if (isset($_POST['nomuser']) && isset($_POST['choixadmin'])) {
			 #echo "Nan vive les brebis !";
			$list = htmlentities($_POST['nomuser']);
			$choix = htmlentities($_POST['choixadmin']); //echo $choix; exit;
			$admincheck = $bdd->prepare("SELECT numuser, administration FROM utilisateurs WHERE pseudo = :list");
			$admincheck->execute(array('list' => $list, ))or die(print_r($admincheck->errorInfo())); 
			//var_dump($admincheck); exit;
			$verif = $admincheck->fetch();
			//var_dump($verif); exit;
			if($choix == 'oui'){
				if ($verif['administration'] == 0) {
					//echo "Bienvenue Maître !"; exit;
					$sql = $bdd->prepare("UPDATE utilisateurs SET administration = :admin WHERE numuser = :user");
					$sql->execute(array(
						'admin'=> 1,
						'user' =>$verif['numuser'],
						))or die(print_r($sql->errorInfo()));
					header('Location:droitadmin.php');
				}elseif ($verif['administration'] == 1) {
					//echo "Bienvenue cher disciple"; exit;
					$sql = $bdd->prepare("UPDATE utilisateurs SET administration = :admin WHERE numuser = :user");
					$sql->execute(array(
						'admin'=> 0,
						'user' =>$verif['numuser'],
						))or die(print_r($sql->errorInfo()));
					header('Location:droitadmin.php');
				}
			}else header('Location:droitadmin.php');
		}else header('Location:droitadmin.php');
	}else header('Location:paneladmin.php');
?>