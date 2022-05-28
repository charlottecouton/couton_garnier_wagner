<?php
     session_start();
     require '../views/header2.php';
    //Connection à la bdd
    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //Requête sql qui récupère les ID des événements
    $sql = "SELECT ID FROM events";
    if (mysqli_query($mysqli, $sql)) 
        {   //Recupère toutes les lignes de la bdd
           if($statement = $mysqli ->query($sql))
            {   
                if($statement->num_rows >0)
                {
                    while($row = $statement -> fetch_row() )
                    { 
                        if(isset($_POST['btn_'.$row[0]]))
                        { 
                            $sql2 = "SELECT ID FROM events WHERE ID ='$row[0]'";
                            if(mysqli_query($mysqli, $sql2)){
                            
                                if($result2 = $mysqli ->query($sql2)){
                                    
                                    if($result2->num_rows>0){
                                        while($row2 = $result2->fetch_row())
                                        {
                                            //$_SESSION['index.php'] = $row2[0];
                                            $sql1 = "SELECT * FROM events WHERE ID='$row2[0]'";
                                            if (mysqli_query($mysqli, $sql1)) 
                                            {   //Recupère toutes les lignes de la bdd
                                                if($statement2 = $mysqli ->query($sql1))
                                                {   
                                                    if($statement2 -> num_rows >0)
                                                    {
                                                        while($row3 = $statement2 -> fetch_row() )
                                                        {
                                                            echo "ID du RDV: " .$row3[0]. "<br/><br/>";
                                                            echo "Nom du RDV: " . $row3[1] . "<br/><br/>";
                                                            echo "Heure de début du rendez-vous : ". $row3[2] .  "<br/><br/>";
                                                            echo "Heure de fin du rendez-vous : " . $row3[3] . "<br/><br/>";
                                                            
                                                        }   
                                                    }
                                                    
                                                } 
                                            }
                                                        
                                        }
                                    }else
                                    {echo "aucun resultat";}
                                }
                            }
                            break;
                        }
                    }   
                }
            } else 
            {
                echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
            }
        }
        require '../views/footer.php';
?>

