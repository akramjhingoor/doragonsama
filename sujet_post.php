<?php
session_start();	
require ("config.php"); #Connexion BDD

	if (isset($_POST['repondre']) &&  isset($_POST['reponse'])) 
		{
			
			//$author = htmlentities($_POST['auteur']);
			
    		$req = $bdd->query("SELECT COUNT(nummsg) AS Nbelements FROM messages");
    		$data = $req->fetch();
			$nbelements = $data['Nbelements']; 
			$nbelements++;
			$containt = htmlentities($_POST['reponse']);
			$num = $_POST['nomanime'];
			$date = date("Y-m-d");
			$sujet = $_POST['sujet'];
			
			$reukette = $bdd->prepare("INSERT INTO messages(nummsg, contenu, datemsg, keysujet, keyuser) VALUES (:num, :contenu, :datemsg, :clesujet, :cleuser)");
		 	$reukette->execute(array(
		 		 'num' => $nbelements,
		 		 'contenu' => $containt,
		 		 'datemsg' => $date,
		 		 'clesujet' => $sujet,
		 		 'cleuser' => $_SESSION['numuser'],
		 		)) or exit(print_r($reukette->errorInfo()));
		 	
		 	header('Location:sujets.php?sujet='.$sujet);
		}

?>