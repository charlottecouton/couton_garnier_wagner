<?php 
    session_start();
    require '../views/header2.php';
    require '../src/Date/Month.php';//Pour inclure la classe
    $month = new App\Date\Month($_GET['month']?? null,$_GET['year']?? null); 
    $start = $month->getStartingDay();
    $weeks = $month->getWeeks();
    $start = $start->format('N') ==='1'? $start : $month->getStartingDay()->modify('last monday');
    $end = (clone $start)->modify('+'.(6+7*($weeks-1)).' days');
    
    // Set the new timezone
    date_default_timezone_set('Europe/Paris');
    // Return current date from the remote server
    $dateactuelle = date('Y-m-d H');
    //echo "date actuelle : ".$dateactuelle;
?>
<body class="page">

<!--BARRE DES TACHES QUI PERMET D ALLER AU MOIS SUIVANT ET PRECEDENT ET AFFICHE LE MOIS ACTUEL DU CALENDRIER-->
<div class="title-month">
    <!--Affiche le mois et l'annee-->
    <h3><?= $month->toString();?></h3>
    <div>
        <a href="cal.php?month=<?=$month->previousMonth()->month;?>&year=<?=$month->previousMonth()->year;?>" class="btn btn-outline-danger">&lt;</a>
        <a href="cal.php?month=<?=$month->nextMonth()->month;?>&year=<?=$month->nextMonth()->year;?>" class="btn btn-outline-danger">&gt;</a>
    </div>
</div>
<!--FIN DE CETTE BARRE DES TACHES***********************************************************************-->

<?php
    ////CONNEXION À LA BDD////
    //accès Charlotte
    //$mysqli = new mysqli("localhost","root","root","omnes");
    //accès Anaïs et Solène
    $mysqli = new mysqli("localhost","root","","omnes");

    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    //Requete sql qui selectionne les dates comprises entre le 1er avril et le 30 juillet
    $sql = "SELECT * FROM events WHERE Start BETWEEN '2022-04-01 08:00:00' AND '2022-07-30 20:59:59'ORDER BY Start ASC";
    if (mysqli_query($mysqli, $sql)) 
        {   
            //Recupère toutes les lignes de la bdd
            $statement = $mysqli ->query($sql);
            $results = $statement->fetch_all();
            
            //Pour séparer les lignes de la bdd jour par jour
            $days = [];
            foreach($results as $result)
            {
                $date = explode(' ',$result[2])[0];//$result[2] car deuxième ligne de mon array
                if(!isset($days[$date])){
                    $days[$date] = [$result];
                }else{
                    $days[$date][]= $result;
                }
            }
            $resultDays = $days; 
        } 
?>

<!--TABLEAU CONTENANT LE CALENDRIER-->
<table class="calendar__table calendar__table__<?=$weeks;?>weeks">
    <!--Execute la boucle le nombre de semaine correspondante (creer le nombre de ligne pour semaine +aff)-->
    <?php for($i = 0;$i<$weeks;$i++):?>
    <tr>
        <!--Affichage de la grille du mois-->
        <?php foreach($month->days as $k=>$days):
            //Calcul la date actuelle
            $date = (clone $start)->modify("+".($k + $i *7)." days");

            $dim = ($k + $i *7 +1);
            $jeu = ($k + $i *7 -3);
            $sam = ($k + $i *7 +2);
            
            if($dim%7 == 0){
                $dimanche = 1;
            }else{
                $dimanche = 0;
            }
            //On recupère les evenements jour par jour et on les format
            $eventsForDay = $resultDays[$date->format('Y-m-d')]??[];
        ?>
        <!--Le mois de mai à 6 semaines alors que les autres mois 3 ou 4-->
        <td class="<?=$month->withinMonth($date)? '' : 'calendar__othermonth';?>">
            <!--Affiche le jours que la premiere ligne pour pas surcharger-->
            
            <?php if($i === 0 ):?>
                <!--Permet d'afficher les jours de la semaine-->
                <div class="calendar__weekday"><?=$days;?></div>
            <?php endif;?>
            <!--Permet d'afficher les jour dans les cases-->
            <div class="calendar__day"><?=$date->format('d');?>
                <br/>
                <?php 
                    $_SESSION['index']=$date->format('d');
                    //Pour disable les vacances
                    $vac = $date->format('m');
                
                    //Pour id prof
                    $id = $_SESSION['idProfCal'];
                    //pour able/disable jour calendrier
                    for($l=10;$l<17;$l++)
                    {   
                        //pour disable des heure le jeudi
                        if($l>12 && $jeu%7 == 0){
                            $jeudi = 1;
                        }else{
                            $jeudi =0;
                        }
                        //pour disable le samedi aprem
                        if($l>12 && $sam%7 == 0){
                            $samedi = 1;
                        }else{
                            $samedi =0;
                        }
                        $sql="SELECT * FROM `events` WHERE ID_P=$id AND Start = '2022-".$date->format('m')."-".$date->format('d')." ".$l.":00:00'";
                        $sql1="SELECT * FROM `cours` WHERE ID_P=$id AND Start = '2022-".$date->format('m')."-".$date->format('d')." ".$l.":00:00'";

                        mysqli_query($mysqli, $sql);
                        mysqli_query($mysqli, $sql1);
                
                        $result = $mysqli->query($sql);
                        $result1 = $mysqli->query($sql1);

                        /* Détermine le nombre de lignes du jeu de résultats */
                        $row_cnt = $result->num_rows;
                        $row_cnt1 = $result1->num_rows;
                        
                        //Si la date du jour est supérieur à la date (annee-mois-jour heure) de lecture du calendrier
                        if($dateactuelle > $date->format('Y-m-d H'))
                        {   /*
                            echo '<form method="post" class="bouton">
                            <button type="submit" class="libre btn btn-outline-default" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                            '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                            '" disabled >'.$l.'h00-'.($l+1).'h00</button>
                            </form>';*/

                            if($row_cnt >0)
                            {
                                while($row = $result -> fetch_row() )
                                {
                                    if($dimanche ==1){
                                        echo '<form method="post" class="bouton">
                                        <button  class="btn btn-outline-default pris" type="submit" name="btn_'.$row[0].
                                        '" value="'.$row[0].'" disabled>Reserve ⛔</button>
                                        </form>';
                                    }else if($dimanche == 0 && $jeudi == 1 && $samedi == 0){
                                        echo '<form method="post" class="bouton">
                                        <button  class="btn btn-primary pris" type="submit" name="btn_'.$row[0].
                                        '" value="'.$row[0].'" disabled>Associations 🎉</button>
                                        </form>';
                                    }else if($dimanche == 0 && $jeudi == 0 && $samedi == 0){
                                        echo '<form method="post" class="bouton">
                                        <button  class="btn btn-danger pris" type="submit" name="btn_'.$row[0].
                                        '" value="'.$row[0].'" disabled>Reserve ⛔</button>
                                        </form>';
                                    }
                                    
                                }  
                            }
                            else if ($row_cnt1 == 0)
                                {   //QD = 0 c'est pas le jour donc qd 1 c'est le jour
                                    if($dimanche ==1){
                                        echo '<form method="post" class="bouton">
                                        <button type="submit" class="libre btn btn-outline-default" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" disabled>'.$l.'h00-'.($l+1).'h00</button>
                                        </form>';
                                    }else if($dimanche == 0 && $jeudi == 0 && $samedi == 0){
                                        echo '<form method="post" class="bouton">
                                        <button type="submit" class="libre btn btn-outline-default" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" disabled>'.$l.'h00-'.($l+1).'h00</button>
                                        </form>';
                                        //AFFICHAGE DES ASSO
                                    }else if($dimanche == 0 && $jeudi == 1 && $samedi == 0){
                                        echo '<form method="post" class="bouton">
                                        <button type="submit" class="libre btn btn-primary" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" disabled>Associations 🎉</button>
                                        </form>';
                                        //AFFICHAGE SAMEDI DISABLE
                                    }else if($dimanche == 0 && $jeudi == 0 && $samedi == 1){
                                        echo '<form method="post" class="bouton">
                                        <button type="submit" class="libre btn btn-outline-default" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" disabled>'.$l.'h00-'.($l+1).'h00</button>
                                        </form>';
                                    }
                                }else
                                {
                                    //AFFICHAGE DES COURS
                                    echo '<form method="post" class="bouton">
                                        <button type="submit" class="libre btn btn-warning" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" disabled >Cours 📚</button>
                                        </form>';
                                }
                        }
                        else{
                            //POUR DISBALE LES VACNACES DES PORFS
                            if($vac == '07' || $vac == '08')
                            {
                                echo '<form method="post" class="bouton">
                                <button type="submit" class="libre btn btn-outline-default" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                '" disabled >'.$l.'h00-'.($l+1).'h00</button>
                                </form>'; 
                            }
                            else
                            {
                                if($row_cnt >0)
                                {
                                    while($row = $result -> fetch_row() )
                                    {
                                        if($dimanche ==1){
                                            echo '<form method="post" class="bouton">
                                            <button  class="btn btn-outline-default pris" type="submit" name="btn_'.$row[0].
                                            '" value="'.$row[0].'" disabled>Reserve ⛔</button>
                                            </form>';
                                        }else if($dimanche == 0 && $jeudi == 1 && $samedi == 0){
                                            echo '<form method="post" class="bouton">
                                            <button  class="btn btn-primary pris" type="submit" name="btn_'.$row[0].
                                            '" value="'.$row[0].'" disabled>Associations 🎉</button>
                                            </form>';
                                        }else if($dimanche == 0 && $jeudi == 0 && $samedi == 0){
                                            echo '<form method="post" class="bouton">
                                            <button  class="btn btn-danger pris" type="submit" name="btn_'.$row[0].
                                            '" value="'.$row[0].'" disabled>Reserve ⛔</button>
                                            </form>';
                                        }
                                        
                                    }  
        
                                }
                                else if ($row_cnt1 == 0)
                                {   //QD = 0 c'est pas le jour donc qd 1 c'est le jour
                                    if($dimanche ==1){
                                        echo '<form method="post" class="bouton">
                                        <button type="submit" class="libre btn btn-outline-default" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" disabled>'.$l.'h00-'.($l+1).'h00</button>
                                        </form>';
                                    }else if($dimanche == 0 && $jeudi == 0 && $samedi == 0){
                                        echo '<form method="post" class="bouton">
                                        <button type="submit" class="libre btn btn-outline-success" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" formaction="/couton_garnier_wagner/calendrier/public/priserdv.php?month='.$date->format('m').'day='.$date->format('d').'heure='.$l.'">'.$l.'h00-'.($l+1).'h00</button>
                                        </form>';
                                        //Chemin pour Solène
                                        ///couton_garnier_wagner/couton_garnier_wagner/calendrier/public/priserdv.php?month='.$date->format('m').'day='.$date->format('d').'heure='.$l.'
                                        
                                        //AFFICHAGE DES ASSO
                                    }else if($dimanche == 0 && $jeudi == 1 && $samedi == 0){
                                        echo '<form method="post" class="bouton">
                                        <button type="submit" class="libre btn btn-primary" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" disabled>Associations 🎉</button>
                                        </form>';
                                        
                                        //AFFICHAGE SAMEDI DISABLE
                                    }else if($dimanche == 0 && $jeudi == 0 && $samedi == 1){
                                        echo '<form method="post" class="bouton">
                                        <button type="submit" class="libre btn btn-outline-default" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" disabled >'.$l.'h00-'.($l+1).'h00</button>
                                        </form>';
                                    }
                                }else
                                {
                                    //AFFICHAGE DES COURS
                                    echo '<form method="post" class="bouton">
                                        <button type="submit" class="libre btn btn-warning" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                        '" disabled >Cours 📚</button>
                                        </form>';
                                }
                            } 
                        }
                    }
                ?>
            </div>
        </td>

        <?php endforeach;?>
    </tr>
    <?php endfor;?>

</table>

<?php require '../views/footer.php'; ?>

