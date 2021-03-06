<?php
    session_start();

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

    //POUR LES AFFICHAGE DE HAUT ET BAS DE PAGE
    require '../views/header2.php';
   
?>

<!doctype html>
<html lang="en">

<body class="page">
  <div class="container">
    <div class="row rdv-page">
    <div class="col-6">
  <h1>Historique de vos rendez-vous</h1>
    <br><br>
  

<?php

    

    $id = $_SESSION['chat'];//pour récup l'id de la personne connectee
    $compte = $_SESSION['connexion'];//pour récup le type de la personne connectée (etudiant ou prof)

    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
        
    if($mysqli -> connect_errno)
    {   //Si la connexion echoue
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    if($compte==0){
        $att = 'ID_E';
        $aut = 4;
        $table = 'Profs';
        $page = 'http://localhost/couton_garnier_wagner/Calendrier/Public/infoRdvProf.php';
        
    }else if($compte==1){
        $att = 'ID_P';
        $aut = 5;
        $table = 'Etudiants';
        $page = 'http://localhost/couton_garnier_wagner/Calendrier/Public/infoRdvEleve.php';
    }

    /*echo "comp".$compte;
    echo "tab".$table;*/
    $sql = "SELECT * FROM `events` WHERE $att = $id";
    
    
    if(mysqli_query($mysqli, $sql)){
        if($result = $mysqli ->query($sql)){
            if($result->num_rows>0){
                
                while($row = $result->fetch_row()){
                  
                  $sql2 = "SELECT * FROM $table WHERE ID = $row[$aut]";
                  if(mysqli_query($mysqli, $sql2)){
                    if($result2 = $mysqli ->query($sql2)){
                        if($result2->num_rows>0){
                            
                            while($row2 = $result2->fetch_row()){
                              if($dateactuelle > $row[2]){
                                echo '<form method="post">
                                <button type="submit" class="rdv btn btn-outline-light" disabled >'.$row[1].' '.$row2[1].'</button>
                                </form>
                                <br>';

                              }
                            }
                        }
                    }
                  }else {
                    echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                      }

                
                }
            }
        }
    }else {
      echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
        }
?>

      </div>
        <div class="col-6">
          <h1>Les rendez vous à venir</h1>
          <br><br>

<?php

$sql = "SELECT * FROM `events` WHERE $att = $id";
    
    
    if(mysqli_query($mysqli, $sql)){
        if($result = $mysqli ->query($sql)){
            if($result->num_rows>0){
                
                while($row = $result->fetch_row()){
                  
                  $sql2 = "SELECT * FROM $table WHERE ID = $row[$aut]";
                  if(mysqli_query($mysqli, $sql2)){
                    if($result2 = $mysqli ->query($sql2)){
                        if($result2->num_rows>0){
                            
                            while($row2 = $result2->fetch_row()){
                              if($dateactuelle < $row[2]){
                                
                                echo '
                                <div class="venir">
                                <form method="post">
                                  <button type="submit" name="btn_'.$row[0].'" value="'.$row[0].'" class="rdv btn btn-outline-success" formaction="'.$page.'">'.$row[1].' '.$row2[1].'</button>
                                  <button type="submit" name="btn_'.$row[0].'" value="'.$row[0].'" class="rdv btn btn-outline-danger" formaction="suppRDV.php">Annuler</button>
                                </form>
                                </div>
                                <br>';
                              }
                            }
                        }
                    }
                  }else {
                    echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                      }

                
                }
            }
        }
    }else {
      echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
        }



//require '../views/footer2.php';

?>