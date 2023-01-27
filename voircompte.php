<?php
    session_start();
    $id = $_SESSION['chat'];
    $idqui = $_SESSION['connexion'];

    //$mysqli = new mysqli("localhost","root","root","omnes");
    $mysqli = new mysqli("localhost","root","","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes-1");
    if($mysqli -> connect_errno)
    {
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    //si eleve
    if($idqui == 0){

        $sqlE = "SELECT * FROM `etudiants` WHERE ID = $id";

        if(mysqli_query($mysqli, $sqlE)){
            if($resultE = $mysqli ->query($sqlE)){
                if($resultE->num_rows>0){
                    while($rowE = $resultE->fetch_row()){
                        echo "Nom : ".$rowE[1]."<br/>";
                        echo "Prenom : ".$rowE[2]."<br/>";
                        echo "Adresse 1 : ".$rowE[3]."<br/>";
                        echo "Adresse 2 : ".$rowE[4]."<br/>";
                        echo "Ville : ".$rowE[5]."<br/>";
                        echo "Code Postale : ".$rowE[6]."<br/>";
                        echo "Pays : ".$rowE[7]."<br/>";
                        echo "Numero de tel : ".$rowE[8]."<br/>";
                        echo "Mail : ".$rowE[9]."<br/>";
                        echo "Mot de Passe : ".$rowE[10]."<br/>";
                    }
                }
            }
        }

    }else if($idqui == 1){//si prof

        $sqlP = "SELECT * FROM `profs` WHERE ID = $id";

        if(mysqli_query($mysqli, $sqlP)){
            if($resultP = $mysqli ->query($sqlP)){
                if($resultP->num_rows>0){
                    while($rowP = $resultP->fetch_row()){
                        echo "Nom : ".$rowP[1]."<br/>";
                        echo "Prenom : ".$rowP[2]."<br/>";
                        echo "Specialite : ".$rowP[3]."<br/>";
                        echo "Mail : ".$rowP[4]."<br/>";
                        echo "Mot de Passe : ".$rowP[5]."<br/>";
                        echo "Telephone : ".$rowP[7]."<br/>";
                        echo "Bureau : ".$rowP[8]."<br/>";
                        //echo "Photo : ".$rowP[9]."<br/>";
                    }
                }
            }
        }

    }else if($idqui == 2){//si admin
        $sqlA = "SELECT * FROM `admins` WHERE ID = $id";

        if(mysqli_query($mysqli, $sqlA)){
            if($resultA = $mysqli ->query($sqlE)){
                if($resultA->num_rows>0){
                    while($rowA = $resultA->fetch_row()){
                        echo "Nom : ".$rowA[1]."<br/>";
                        echo "Prenom : ".$rowA[2]."<br/>";
                        echo "Mail : ".$rowA[3]."<br/>";
                        echo "Mot de Passe : ".$rowA[4]."<br/>";
                    }
                }
            }
        }
    }

?>