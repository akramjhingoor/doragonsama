<?php
session_start();	
	require ("config.php"); #Connexion BDD
	
	if (isset($_POST['valider']) &&  isset($_POST['contenu'])) 
		{
			
			//$author = htmlentities($_POST['auteur']);
			$containt = htmlentities($_POST['contenu']);
			$nom = $_POST['nomanime'];
			$date = date("Y-m-d");
			$count = $bdd->query('SELECT COUNT(*) AS nbnum FROM commentaires');
			$donnees = $count->fetch();
			$nbnum = $donnees['nbnum'];
			$nbnum++;
			$reukette = $bdd->prepare("INSERT INTO commentaires( numcom, datecom, auteur, contenu, keyanime) VALUES (:num, :dateday, :author, :containt, :code)");
		 	$reukette->execute(array(
		 		"num" => $nbnum,
		 		"dateday" => $date,
		 		"author" => $_SESSION['pseudo'],
		 		"containt" => $containt,
		 		"code" => $_POST['numanime'], 
		 		)) or exit(print_r($reukette->errorInfo()));
		 	
		 	header('Location:banque_details.php?nom='.$nom);
		}

    /* 	$reukette = $bdd->prepare("INSERT INTO  VALUES");
	 *	$reukette->execute(array());
	 */
?>