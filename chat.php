<?php
    session_start();
    
    /*accès Charlotte*/
    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
    if($mysqli -> connect_errno)
    {   //Si la connexion echoue
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    
    $id = $_SESSION['chat'];//on récupère l'id de la personne connectée
    $user = $_SESSION['connexion'];//on récupère le type d'utilisateur
    $ok = $_SESSION['connecte'];

    switch($ok){
      case null :
        header("refresh:0,url=index.html");
        break;
      
        case 1 :
          switch($user){
          case 0 :
            $table = 'Profs';
            $choix = 0;//on affiche la liste de tous les profs
            break;
          case 1 :
            $table = 'Etudiants';
            $choix = 1;//on affiche la liste avec seulement les étudiants ayant envoyé un message
            break;
          case 2 :
            header("refresh:0,url=index.html");
            break;
          }
          break;
    }
    

    $sql = "SELECT * FROM $table";
    if(mysqli_query($mysqli, $sql)){
        if($result = $mysqli ->query($sql)){
            if($result->num_rows>0){

              require '../couton_garnier_wagner/Calendrier/views/header.php';
                echo '
                          <div class="container liste">';
                if($choix==0){//il s'agit d'un étudiant
                  while($row = $result->fetch_row()){ 
                    echo 
                        '<div class="row profr">
                          <div class="prof">
                            <form  method=post>
                              <button class="btn btn-ent btn-outline-light round" type="submit" name="btn_'.$row[1].'" value="'.$row[1].'" formaction="message.php">'.$row[1]." ".$row[2] .'</button>
                            </form>
                          </div>
                        </div></br>
                      ';
                      $nom = $row[1];
                  }
                }else{//il s'agit d'un professeur
                  
                  $sql = "SELECT DISTINCT ID_E FROM messages WHERE ID_P = $id";
                  
                  if(mysqli_query($mysqli, $sql)){
                    if($result1 = $mysqli ->query($sql)){
                        if($result1->num_rows>0){
                          
                          
                          
                          while($row1 = $result1->fetch_row()){
                            
                            $sql2 = "SELECT * FROM Etudiants WHERE ID = $row1[0]";
                            
                            if(mysqli_query($mysqli, $sql2)){
                              if($result2 = $mysqli ->query($sql2)){
                                
                                  if($result2->num_rows>0){
                                    while($row2 = $result2->fetch_row()){
                                      echo 
                                    '<div class="row profr">
                                      <div class="prof">
                                        <form  method=post>
                                          <button class="btn btn-ent btn-outline-light round" type="submit" name="btn_'.$row2[1].'" value="'.$row2[1].'" formaction="message.php">'.$row2[1]." ".$row2[2] .'</button>
                                        </form>
                                      </div>
                                    </div></br>
                                  ';
                                    }
                                  }
                              }
                            }
                          }
                        }
                    }
                  }
                }
                
                echo '</div>
                </body>';
            }
        }
    }

    require '../couton_garnier_wagner/Calendrier/views/header.php';
?>