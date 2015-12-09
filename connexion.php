<?php 
	require ("config.php"); #Connexion a la base (inclusion de la connexion par CLASSE PDO:Statement)
	if (isset($_POST['Connecter'])) {

		$sql = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = :nom AND motdepasse = :mdp");

		$sql->execute(array(
			'nom' => $_POST['name_user'],
			'mdp' =>$_POST['mdp_user'],	
			)) or exit(print_r($sql->errorInfo()));
		$recup = $sql->fetch();
		if (!$recup) {

			header('Location:index.php');
		} 
		else {
			session_start();
			$_SESSION['numuser'] = $recup['numuser'];
			$_SESSION['pseudo'] = $recup['pseudo'];
			$_SESSION['motdepasse'] = $recup['motdepasse'];
			$_SESSION['email'] = $recup['email'];
			$_SESSION['statut_humeur'] = $recup['statut_humeur'];
			$_SESSION['administration'] = $recup['administration'];
			header('Location:accueil.php');
			
		}
	} 
?>	