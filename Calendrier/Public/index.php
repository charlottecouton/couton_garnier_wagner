<?php 
    session_start();
    require '../src/Date/Month.php';//Pour inclure la classe
    $month = new App\Date\Month($_GET['month']?? null,$_GET['year']?? null); 
    $start = $month->getStartingDay();
    $weeks = $month->getWeeks();
    $start = $start->format('N') ==='1'? $start : $month->getStartingDay()->modify('last monday');
    $end = (clone $start)->modify('+'.(6+7*($weeks-1)).' days');
    
    //POUR LES AFFICHAGE DE HAUT ET BAS DE PAGE
    require '../views/header.php';
    require '../views/footer.php';

    
?>

<!--BARRE DES TACHES QUI PERMET D ALLER AU MOIS SUIVANT ET PRECEDENT ET AFFICHE LE MOIS ACTUEL DU CALENDRIER-->
<div class="title-month">
    <!--Affiche le mois et l'annee-->
    <h3><?= $month->toString();?></h3>
    <div>
        <a href="index.php?month=<?=$month->previousMonth()->month;?>&year=<?=$month->previousMonth()->year;?>" class="btn btn_primary">&lt;</a>
        <a href="index.php?month=<?=$month->nextMonth()->month;?>&year=<?=$month->nextMonth()->year;?>" class="btn btn_primary">&gt;</a>
    </div>
</div>
<!--FIN DE CETTE BARRE DES TACHES***********************************************************************-->

<?php
    //Connection à la bdd
    $mysqli = new mysqli("localhost","root","root","omnes");
    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //Requete sql //$sql = "SELECT * FROM events";
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
                <?php $_SESSION['index']=$date->format('d');

                    $id = $_SESSION['idProfCal'];
                    for($l=10;$l<17;$l++)
                    {   
                        
                        if($l>12 && $jeu%7 == 0){
                            $jeudi = 1;
                        }else{
                            $jeudi =0;
                        }
                        
                        $sql="SELECT * FROM `events` WHERE ID_P=$id AND Start = '2022-".$date->format('m')."-".$date->format('d')." ".$l.":00:00'";
                        //echo "sql : ".$sql."<br/>";
                        mysqli_query($mysqli, $sql);
                        //if(mysqli_query($mysqli, $sql))
                        //{
                            $result = $mysqli->query($sql);
                            /* Détermine le nombre de lignes du jeu de résultats */
                            $row_cnt = $result->num_rows;
                            if($row_cnt >0)//$result -> num_rows >0
                            {
                                while($row = $result -> fetch_row() )
                                {
                                    if($dimanche ==1){
                                        echo '<form method="post" class="bouton">
                                        <button  class="btn btn-outline-default pris" type="submit" name="btn_'.$row[0].
                                        '" value="'.$row[0].'" disabled>Reserve ⛔</button>
                                        </form>';//.$row[1]
                                    }else if($dimanche == 0 && $jeudi == 1){
                                        echo '<form method="post" class="bouton">
                                        <button  class="btn btn-primary pris" type="submit" name="btn_'.$row[0].
                                        '" value="'.$row[0].'" disabled>Associations 🎉</button>
                                        </form>';//.$row[1]
                                    }else if($dimanche == 0 && $jeudi == 0){
                                        echo '<form method="post" class="bouton">
                                        <button  class="btn btn-danger pris" type="submit" name="btn_'.$row[0].
                                        '" value="'.$row[0].'" disabled>Reserve ⛔</button>
                                        </form>';//.$row[1]
                                    }
                                    
                                }  
    
                            }
                            else 
                            {   
                                if($dimanche ==1){
                                    echo '<form method="post" class="bouton">
                                    <button type="submit" class="libre btn btn-outline-default" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                    '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                    '" disabled>'.$l.'h00-'.($l+1).'h00</button>
                                    </form>';

                                }else if($dimanche == 0 && $jeudi == 0){
                                    echo '<form method="post" class="bouton">
                                    <button type="submit" class="libre btn btn-outline-success" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                    '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                    '" formaction="/couton_garnier_wagner/calendrier/public/priserdv.php?month='.$date->format('m').'day='.$date->format('d').'heure='.$l.'">'.$l.'h00-'.($l+1).'h00</button>
                                    </form>';
                                }else if($dimanche == 0 && $jeudi == 1){
                                    echo '<form method="post" class="bouton">
                                    <button type="submit" class="libre btn btn-primary" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                    '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                                    '" disabled>Associations 🎉</button>
                                    </form>';
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

