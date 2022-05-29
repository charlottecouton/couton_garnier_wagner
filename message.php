<?php
    //Pour récupérer l'id de l'élève sur la page "chat.php"
    session_start();
    
    //Connection BBD
    /*accès Anais*/
    //$mysqli = new mysqli("localhost","root","","omnes-1");

    /*accès Solène*/
    //$mysqli = new mysqli("localhost","root","","omnes");
    
    /*accès Charlotte*/
    $mysqli = new mysqli("localhost","root","root","omnes");
    if($mysqli -> connect_errno)
    {  //Si la connection est fausse
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    
    $user = $_SESSION['connexion'];//on récupère le type d'utilisateur

    switch($user){
      case 0 :
        $table = 'Profs';
        $etudiant = $_SESSION['chat'];
        
        break;
      case 1 :
        $table = 'Etudiants';
        $prof = $_SESSION['chat'];
        
        break;
      case 2 :
        header("refresh:0,url=index.html");
        break;
    }

    $sql = "SELECT * FROM $table";

    if (mysqli_query($mysqli, $sql)) 
    {
        if($result = $mysqli ->query($sql))
        {
            if($result -> num_rows >0)
            {
                while($row = $result -> fetch_row() )
                {
                  if(isset($_POST['btn_'.$row[1]]) && $_POST['btn_'.$row[1]]==$row[1])
                  {
                    if($user == 0){
                      $prof = $row[0];
                      $_SESSION['recepteur'] = $row[0];
                      $nom = $row[1];
                      $_SESSION['nom'] = $row[1];
                    }else{
                      $etudiant = $row[0];
                      $_SESSION['recepteur'] = $row[0];
                      $nom = $row[1];
                      $_SESSION['nom'] = $row[1];
                    }
                  }
                }   
            }
            else 
            {
                echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
            }
        }
    }

    if($_SESSION['connexion']==0){
      $prof =$_SESSION['recepteur'];
    }
    else{
      $etudiant =$_SESSION['recepteur'];
    }
    $nom = $_SESSION['nom'];
    
    //Récupère l'ID dd l'étudiant
    $value = $_SESSION['chat'];

    $sql = "SELECT `Message`, `Emetteur`, `Date` FROM messages WHERE ID_E='$etudiant' AND ID_P='$prof'";
    //si emetteur est 0, il s'agit d'un éleve
    //sinon il s'agit d'un prof

        if (mysqli_query($mysqli, $sql)) 
        {
            //AFFICHER TOUS LES MESSAGES DU CHAT DU PROF ET DE L'ELEVE CORRESPONDANT
            //$sql1 = "SELECT Message,Date  FROM  messages WHERE ID_eleves='$value' AND ID_profs='$valueP'";
            
            if($result = $mysqli ->query($sql))
            {
                if($result -> num_rows >0)
                {     
                  require '../couton_garnier_wagner/Calendrier/views/header.php';
                        echo '
                            <div class="container d-flex justify-content-center ">
                                <div class="card bg-light mt-5 chatbox" autofocus> 
                                    <div class="d-flex flex-row justify-content-between p-3 adiv">
                                        <i class="fas fa-chevron-left"></i>
                                            <span class="pb-3">'.$nom.'</span>
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" id="message" style="height: 250px; width: 400px">
                                      ';

                                      while($row = $result -> fetch_row() )
                                        {
                                            if($row[1]==0 && $user==0){
                                              echo '<div class="date" >'.$row[2].'</div>
                                              <div class="d-flex flex-row p-3">
                                                    <div class="chat ml-2 p-3">'.$row[0].'</div>
                                                  </div>';
                                            }else if($row[1]==1 && $user==0){
                                                echo '<div class="d-flex flex-row p-3">
                                                <div class="bg-white mr-2 p-3"><span class="chat-blanc">'.$row[0].'</span></div>
                                            </div>';
                                            }else if($row[1]==1 && $user==1){
                                              echo '<div class="date" >'.$row[2].'</div>
                                              <div class="d-flex flex-row p-3">
                                                    <div class="chat ml-2 p-3">'.$row[0].'</div>
                                                  </div>';
                                            }else if($row[1]==0 && $user==1){
                                              echo '<div class="d-flex flex-row p-3">
                                                <div class="bg-white mr-2 p-3"><span class="chat-blanc">'.$row[0].'</span></div>
                                            </div>';
                                            }
                                        }
                                      
                                    echo '</div>
                                    <div class="form-group px-3">
                                    
                                    <form method=post> 
                                    <button class="send btn btn-default-outline" id= "btn_envoi" type="submit" value="soumettre" name="btn_soumettre" formaction = "envoi.php"><img src="envoi.png" alt="send"> </button>
                                    <textarea name="message" id="content" class="form-control" rows="5" placeholder="Type your message" style="max-height: 100px"></textarea>
                                    <script> document.getElementById("message").scrollTop = document.getElementById("message").scrollHeight; console.log("scrollTop : ".document.getElementById("content").scrollTop);</script>
                                    </form>
                                    </div>
                            </div>
                        </body>
                      </html>';
                }else{
                  require '../couton_garnier_wagner/Calendrier/views/header.php';
                  echo '
                                    
                            <div class="container d-flex justify-content-center ">
                                <div class="card bg-light mt-5 chatbox"> 
                                    <div class="d-flex flex-row justify-content-between p-3 adiv">
                                        <i class="fas fa-chevron-left"></i>
                                            <span class="pb-3">'.$nom.'</span>
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" id="message" style="height: 350px; width: 400px"">
                                    
                                    </div>
                                    <div class="form-group px-3 saisie">
                                    <form  method=post>
                                    <button class="send btn btn-default-outline" id= "btn_envoi" type="submit" value="soumettre" name="btn_soumettre" formaction = "envoi.php"><img src="envoi.png" alt="send"> </button>
                                   
                                    <textarea name="message" id="content" class="form-control" rows="5" placeholder="Type your message" style="max-height: 100px"></textarea>
                                    <script> document.getElementById("message").scrollTop = document.getElementById("message").scrollHeight; console.log("scrollTop : ".document.getElementById("content").scrollTop);</script>
                                    </form>
                                    </div>
                            </div>

                            <button class="btn btn-outline-danger" type=submit>Retour</button>
                        </body>
                      </html>';
                }
            }
        }
        else 
        {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
        }

        //require '../couton_garnier_wagner/Calendrier/views/footer.php';
?>
