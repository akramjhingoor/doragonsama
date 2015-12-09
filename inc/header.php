<div id ="imglogo">
<img src="img/logodoragon.png">
</div>
<h1>Doragon-sama</h1>
<blockquote>Le maître dragon et sa culture ancestrale</blockquote>
<div id="connexion">
	<p class="connecte">Bienvenue <?php echo $_SESSION['pseudo']; ?> &nbsp; <a href="inc/deconnexion.php">Se déconnecter ?</a><br/>
	<em><?php echo $_SESSION['statut_humeur']; ?></em><br/>
	<a href="profil.php">Accéder à son profil</a><br/>
	<?php if ($_SESSION['administration'] == 1) {
	?><a href="paneladmin.php">Panneau d'administration</a><?php } ?>
	</p>
</div>