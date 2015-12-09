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
		<link rel="stylesheet" type="text/css" href="style.css">
        <title>Doragon-sama - Ajouter</title>
        <?php require ("boostrap.func.php") ?>
    </head>
	<div id ="bloc_page">
    <body>

    	<header>
            <?php require ("inc/header.php"); ?>
    		<?php
    			require ("menu.php");
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
            <style type="text/css">
            .affich_result
            {
                position: relative; 
                left: 170px;
                bottom: 290px;
                font-size: 1.2em; 
            }
            </style>
            <article id="article_ds">
                <p class="affich_result">
                <?php 
               /* $elements = array(
                *    '2' => "Amour et Amitié",
                *    '4' => "Combats et Arts Martiaux" 
                *   );
                *print_r($elements); exit;
                */if (isset($_POST['numanimeList']) && isset($_POST['type_anime'])) {
                
                    /*echo $_POST['numanimeList'];
                    echo "<br/><br/>";
                    print_r($_POST['type_anime']); echo "<br/>";//exit;
                    */
                    $tabcase = array();
                    foreach ($_POST['type_anime'] as $value) {
                        $tabcase[$value] = $value;
                    }
                    
                    $nbfois = count($tabcase);
                    //echo $nbfois; exit;
                    $requesta = $bdd->query('SELECT DISTINCT libelle FROM type_anime ORDER BY libelle ASC');
                    $katon = 1;
                    
                    while ($donnees = $requesta->fetch())
                        {
                            $elements[$katon] = $donnees['libelle'];
                            $katon++;
                            
                        }
                    
                    //print_r($elements); exit;
                    $libeltab = array();
                    $suiton = 1;
                    //echo "<br/>";
                    foreach ($tabcase as $value) 
                        { 
                            $libeltab[$suiton] = $elements[$tabcase[$value]]; 
                            $suiton++;
                        }    
                        //print_r($elements); exit;
                        //echo "<br/>";
                        //print_r($libeltab); exit;
                       
                    $req = $bdd->query('SELECT * FROM anime');

                    while ($donnees = $req->fetch()) 
                    {

                        for ($futon=1; $futon <= $nbfois ; $futon++) 
                        { 
                            if ($donnees['nomanime'] == $_POST['numanimeList']) 
                            {
                                $count = $bdd->query('SELECT COUNT(*) AS nbnum FROM type_anime');
                                $donnees = $count->fetch();
                                $nbnum = $donnees['nbnum'];
                                $nbnum++;
                                $codeT = $donnees['numanime'];
                                $sql= $bdd->prepare("INSERT INTO type_anime(numtype, libelle, codeanime) VALUES (':num', :lib, :code)");
                                $sql->execute(array(
                                    'num' =>$nbnum,
                                    'lib' => $libeltab[$futon],
                                    'code' => $codeT,
                                    )) or die(print_r($sql->errorInfo()));
                                
                            }
                        }
                    }
                    
                    echo "<strong>Données bien enregistrées par la base de données</strong><br/><br/>";
                    echo "<a href='ajouter_typeanime.php'>Retournez au module d'ajout</a>";

                }else header('Location:ajouter_typeanime.php');

                /*
        			$req = $bdd->query('SELECT * FROM anime');

        			while ($donnees = $req->fetch()) 
        			{
			
    					if ($donnees['nomanime'] == $_POST['numanimeList']) 
    					{
    						$codeT = $donnees['numanime'];
    						$sql= $bdd->prepare("INSERT INTO type_anime(numtype, libelle, codeanime) VALUES ('', :lib, :code)");
    						$sql->execute(array(
    							'lib' => $_POST['libelle_ajout'],
    							'code' => $codeT,
    							)) or die(print_r($sql->errorInfo()));
    						echo "<strong>Données bien enregistrées par la base de données</strong><br/><br/>";
    						echo "<a href='ajouter_typeanime.php'>Retournez au module d'ajout</a>";
    					}

                */
    				
                
    			?>
                </p>
            </article>
		</section>
        
        <footer>
            <?php require('footer.php'); ?>
        </footer>
        </div>
    </body>
</html>
