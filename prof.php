<?php 
  session_start();
  require '../couton_garnier_wagner/Calendrier/views/header.php';
  //require '../Calendrier/views/header.php';
  
?>
  <body class="page">
    <div class="container fiche">
        <div class="row haut">
            <div class="col-4">
</html>

<?php

 $mysqli = new mysqli("localhost","root","root","omnes");
 //$mysqli = new mysqli("localhost","root","","omnes");
 //$mysqli = new mysqli("localhost","root","","omnes-1");
    
 if($mysqli -> connect_errno)
 {   //Si la connexion echoue
     echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
     exit();
 }

 $id = $_SESSION['choixprof'];

 $sql = "SELECT * FROM `profs` WHERE ID = $id";
 if(mysqli_query($mysqli, $sql)){
     if($result = $mysqli ->query($sql)){
         if($result->num_rows>0){
             while($row = $result->fetch_row()){

                 $_SESSION['idProfCal']=$row[0];
                 echo '<img src="'.$row[9].'" class="img-prof" alt="p1"></a>
                 </div>
                 <div class="col-8">
                     <br>
                     <h1>'.$row[2]." ".$row[1].'</h1>
                     <p>💻 Département '.$row[3].'</p>
                     <p>Salle '.$row[8].'</p>
                 </div>
             </div>
             <div>
             <form method="post">
                 <button type="submit" class="btn round btn-outline-success" formaction="/couton_garnier_wagner/Calendrier/Public/cal.php">Rendez-vous</button>
                 <button type="submit" class="btn round btn-outline-primary" formaction="cv.php">CV</button>
              </form>
              <a class="nav-link" href="'.$row[10].'"><button type="button" class="btn round btn-outline-light">Visioconférence</button></a>
                 </div>
             <br>
             <div class="row">
                 <div class="col-12">
                     <p>Téléphone : +33 0'.$row[7].'</p>
                 </div>
             </div>
             <div class="row">
                 <div class="col-12">
                 
                     <p>Email : <a href="mailto:omnes.education@gmail.com" class = "mailprof">'.$row[4].'</a></p>
                 </div>
             </div>';//name="btn_'.$row[0].'" value="'.$row[0].'"

                if($row[6] != 0){
                    $sql2 = "SELECT * FROM `Chercheurs` WHERE ID = $row[6]";

                    if(mysqli_query($mysqli, $sql2)){
                        if($result2 = $mysqli ->query($sql2)){
                            if($result2->num_rows>0){
                                while($row2 = $result2->fetch_row()){
                                    echo ' Chercheur en '. $row2[1];
                                }
                            }
                        }
                    }else{
                      echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
                    }

                }

               echo ' </div>';
             }
         }
     }
 }
?>

  <!--              
-->
<html>
<div class="chatlogo">
    <a href="chat.php"><img src="chat.png" alt="chat" width="150"></a>
</div>

    <?php 
  require '../couton_garnier_wagner/Calendrier/views/footer.php';
  //require '../Calendrier/views/footer.php';
?>

