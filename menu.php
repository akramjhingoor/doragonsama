<!-- Bref le menu fait et prêt à réagir-->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="accueil.php">Doragon-Sama</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="accueil.php">Accueil</a></li>
        <li><a href="banque.php?page=1">Banque d'animes</a></li>
        <li><a href="forum.php">Forum</a></li>
		    <li><a href="ajouter.php">Ajout d'animes</a></li>
	 	    <?php if ($_SESSION['administration'] == 1) { ?><li><a href="modif.php">Modif' d'animes</a></li><?php } ?>
      </ul>
    </div>
  </div>
</nav>
