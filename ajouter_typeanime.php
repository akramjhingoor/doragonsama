<?php

    require ("config.php"); #Connexion a la base (inclusion de la connexion par CLASSE PDO:Statement)
    session_start();
    if (!isset($_SESSION['numuser'])){
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <?php require ("boostrap.func.php") ?>
		<link rel="stylesheet" type="text/css" href="style.css">
        <title>Doragon-sama - Ajouter</title>
    </head>
	
    <body>
        <div id="bloc_page">
    	<header>
            <?php require ("inc/header.php"); ?>

    		<?php
    			require ("menu.php")
    		?>
    		
    	</header>

    	


		<section>
            <aside>
                <h2>Module d'ajout du type</h2>
                <p>Ce module permet d'ajouter les types d'anime déjà présentes dans la base de données.<br/>
                En somme, les animes présentes dans la base sont affichés dans la liste déroulante.<br/> 
                Il suffit juste de sélectionner l'anime en question
                pour ajouter des types lui correspondant.
                </p>
            </aside>
            <article id="article_ds">
    			<form method="POST" action="enregiser_type.php" >
                    <fieldset>
                    <h3>Ajouter des types d'animes : </h3>

    				 <?php
                    
                                 
                            echo '<select name="numanimeList" size="5">';

                           	$req = $bdd->query('SELECT * FROM anime ORDER BY nomanime ASC');
                            
            				while ($recup = $req->fetch()) 
            				{
            					echo '<option> '.$recup['nomanime']; 
            				}
            				$req->closeCursor(); 
                            /*  Libère la connexion au serveur, permettant de faire d'autres requêtes 
                                tout en laissant cette requête la possibilité d'être re-executé
                            */
            				echo '</select>';

                            /*$count = $bdd->query('SELECT count(DISTINCT libelle) AS nblibelle FROM type_anime');
                            
                            $data = $count->fetch();
                            $nblibelle = $data['nblibelle'];
                            var_dump($nblibelle); exit;
                            */
                            $tab = array();
                            echo "<br/><br/>";
                            $sql = $bdd->query('SELECT DISTINCT libelle FROM type_anime ORDER BY libelle ASC');
                            //var_dump($sql); exit;
                            echo "<h4>Type d'anime existant(s)</h4>";
                           // for ($i=0; $i < ; $i++) { 
                                # code...
                            //}
                            
                            $i = 1;
                            while ($infos = $sql->fetch()) 
                            {
                                echo '<input type="checkbox" name="type_anime[]" value='.$i.' /><label for="case">'. $infos['libelle'] .'</label>';
                                echo "<br/>";
                                //$tab[$i] = $infos['libelle'];
                                echo '<input type="hidden" name="type[]" value='.  $infos['libelle'] .' />';
                                $i++;
                            }
                            //var_dump($infos); exit;
                            echo "<br/><br/>";
                            
                            //print_r($tab); exit;
                            echo '<input type="reset" name="bouton_reset" />&nbsp;';
                            echo '<input type="submit" value="Ajouter" />';
        			?>

                    </fieldset>
    			</form>
    			
            </article>
		</section>
        
        <footer>
            <?php require('footer.php'); ?>
        </footer>
    </div>
    </body>

</html>
