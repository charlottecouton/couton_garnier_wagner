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
<div class="d-flex flex-row align_items-center justify-content-between">
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
    $mysqli = new mysqli("localhost","root","","tutocalendar");
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
                for($l=10;$l<17;$l++)
                {   
                    $sql="SELECT * FROM `events` WHERE Start = '2022-".$date->format('m')."-".$date->format('d')." ".$l.":00:00'";
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
                            echo '<form method="post">
                                <button type="submit" name="btn_'.$row[0].
                                '" value="'.$row[0].'" disabled>'.$row[1].'</button>
                                </form>';
                            }  
  
                        }
                        else 
                        {
                            echo '<form method="post">
                            <button type="submit" name="btn_'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                            '" value="'.$date->format('Y').'-'.$date->format('m').'-'.$date->format('d').'-'.$l.
                            '" formaction="/calendrier/public/priserdv.php?month='.$date->format('m').'day='.$date->format('d').'heure='.$l.'">'.$l.'h00-'.($l+1).'h00</button>
                            </form>'; 
                        }             
                }
                ?>
            </div>
        </td>

        <?php endforeach;?>
    </tr>
    <?php endfor;?>

</table>

