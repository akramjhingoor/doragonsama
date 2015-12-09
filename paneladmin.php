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

    	</header>
    	<style type="text/css">
    	
    	</style>
		<section>
			<?php
				$tabAnime = array();
				$tabSujet = array();
				$tabUser = array();

				$listAnime = $bdd->query("SELECT numanime, nomanime FROM anime");
				while ($data = $listAnime->fetch()) {
					$tabAnime[$data['numanime']] = $data['nomanime']; //Tableau des animes
				}
				$listSujet = $bdd->query("SELECT numsujet, nomsujet FROM sujet");
				while ($datos = $listSujet->fetch()) {
					$tabSujet[$datos['numsujet']] = $datos['nomsujet']; // Tableau des sujets
				}
				$listUser = $bdd->query("SELECT numuser, pseudo FROM utilisateurs");
				while ($donnees = $listUser->fetch()) {
					$tabUser[$donnees['numuser']] = $donnees['pseudo']; //Tableau des utilisateurs
				}

				$sql = $bdd->prepare('SELECT * FROM anime ORDER BY numanime DESC LIMIT 0, 4');
				$req = $bdd->prepare('SELECT datecom, auteur, keyanime FROM commentaires ORDER BY  datecom DESC LIMIT 0, 4');
				$reukette = $bdd->prepare('SELECT * FROM messages ORDER BY datemsg DESC LIMIT 0, 4');
				$query = $bdd->prepare('SELECT pseudo, dateinscription, administration FROM utilisateurs ORDER BY dateinscription DESC LIMIT 0, 4');

			?>

			<article style=" text-align: center;">
				<table align="center">
					<tr>
						<td>
							<h4>Animes</h4>
							<div id="encadre_admin"><strong>Derniers animes ajoutés</strong>
							<p><a href="modif.php">Modifier</a> | <a href="suppadmin.php?op=anime&page=1">Supprimer</a></p>
							<ul><?php 
								$sql->execute();
								while ($infos = $sql->fetch()) { ?>
								<li> - <a href="banque_details.php?nom=<?php echo $infos['nomanime']; ?>"><?php echo $infos['nomanime']; ?></a></li>
								 
							<?php } //$sql->closeCursor; ?>
							</ul>
							</div>
					</td>
						<td>
							<h4>Commentaires</h4>
							<div id="encadre_admin"><strong>Derniers commentaires postés</strong>
							<p><a href="correctadmin.php?option=commentaires&page=1">Corriger</a> | <a href="suppadmin.php?op=commentaires&page=1">Supprimer</a></p>
							<ul>
							<?php 
									$req->execute();
								while ($infos = $req->fetch()) {	?>
								<li><strong><?php echo $infos['datecom']; ?></strong> - <?php echo $infos['auteur'];?> : <a href="banque_details.php?nom=<?php echo $tabAnime[$infos['keyanime']]; ?>"><?php echo $tabAnime[$infos['keyanime']]; ?></a></li>
							<?php } ?>
							</ul>	
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<h4>Forum</h4>
							<div id="encadre_admin"><strong>Derniers messages postés</strong>
							<p><a href="correctadmin.php?option=messages&page=1">Corriger</a> | <a href="suppadmin.php?op=messages&page=1">Supprimer</a></p>
							<ul>
							<?php 
								$reukette->execute();
								while ($infos = $reukette->fetch()) {	?>
								<li><strong><?php echo $infos['datemsg'] ?> - </strong><a href="sujets.php?sujet=<?php echo $infos['keysujet']; ?>"><?php echo $tabSujet[$infos['keysujet']];?></a> ( <?php echo $tabUser[$infos['keyuser']]; ?> )</li>
								<?php } ?>
							</ul>
							</div>
						</td>
						<td>
							<h4>Utilisateurs</h4>
							<div id="encadre_admin"><strong>Derniers utilisateurs inscrits</strong>
							<p><a href="droitadmin.php">Droits d'admin</a> | <a href="suppadmin.php?op=utilisateurs&page=1">Supprimer</a></p>
							<ul>
								<?php 
									$query->execute();
								while ($infos = $query->fetch()) {
									if ($infos['administration'] == 1) {
										$statut = 'Admin';
									}else { $statut = 'Utilisateur normal'; }
									echo '<li><strong>';
									echo $infos['dateinscription'];
									echo '</strong> - ';
									echo $infos['pseudo'];
									echo ' (';
									echo $statut;
									echo ')</li>';
								}
								?>
							</ul>
							</div>
						</td>
					</tr>
					<!--<td><tr></tr></td>-->
				</table>		
			</article>
		</section>

		<footer>
			<?php require('footer.php'); ?>
		</footer>
	</div>
    </body>
</html>
