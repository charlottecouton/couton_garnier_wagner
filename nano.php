<?php 
session_start();
  require '../couton_garnier_wagner/Calendrier/views/header.php';
  //require '../Calendrier/views/header.php';
?>

  <body class="page">
      
    <br><br>

  <div class="container actus">
    <div class="container">

  <?php

    

    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes-1");
    
    if($mysqli -> connect_errno)
    {   //Si la connexion echoue
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $sql = "SELECT Nom, Prenom FROM `Profs` INNER JOIN `Chercheurs` WHERE Profs.ID_C = Chercheurs.ID AND Chercheurs.Labo = 'NANOSCIENCES ET NANOTECHNOLOGIE POUR L INGENIERIE'";
    if(mysqli_query($mysqli, $sql)){
        if($result = $mysqli ->query($sql)){
            if($result->num_rows>0){
                while($row = $result->fetch_row()){
                    echo '
                    <div class="row">
                        <div class="col-12 prof">
                            <div class="card" style="width: 20rem;">
                                <img src="Accueil/jpo.png" class="card-img-top" alt="jpo">
                                    <div class="card-body">
                                    <form method = "post">
                                      <button class="btn btn-outline-default" type="submit" name="btn_'.$row[0].'" value="'.$row[0].'"  formaction="choixprof.php">'. $row[1]. " " .$row[0].'</button>
                                    </form>
                                        ';
                      echo '</div></div><br><br>';
                }
            }
        }
    }
    echo '</div></div></div>';

  ?>
<?php 
  require '../couton_garnier_wagner/Calendrier/views/footer.php';
  //require '../Calendrier/views/footer.php';
?>