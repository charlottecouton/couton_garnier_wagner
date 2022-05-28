<?php 
  require '../couton_garnier_wagner/Calendrier/views/header.php';
  //require '../Calendrier/views/header.php';
?>
  <body class="page">
    <div class="container fiche">
        <div class="row haut">
            <div class="col-4">
</html>

<?php

 session_start();

 $mysqli = new mysqli("localhost","root","root","omnes");
 //$mysqli = new mysqli("localhost","root","","omnes");
    
 if($mysqli -> connect_errno)
 {   //Si la connexion echoue
     echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
     exit();
 }

 $id = $_SESSION['choixprof'];
 //$id = 1;

 $sql = "SELECT * FROM `Profs` WHERE ID = $id";
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
                 <button type="submit" class="btn round btn-outline-success" formaction="/couton_garnier_wagner/Calendrier/Public/index.php">Rendez-vous</button>
             </form>
                 </div>
             <br>
             <div class="row">
                 <div class="col-12">
                     <p>Téléphone : '.$row[7].'</p>
                 </div>
             </div>
             <div class="row">
                 <div class="col-12">
                     <p>Email : '.$row[4].'</p>
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
<div class="chat">
    <a href="chat.php"><img src="chat.png" alt="chat" width="150"></a>
</div>

    <?php 
  require '../couton_garnier_wagner/Calendrier/views/footer.php';
  //require '../Calendrier/views/footer.php';
?>