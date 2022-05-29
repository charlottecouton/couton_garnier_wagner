<?php
    session_start();
    //Pour ecrire en XLM
    header("Content-type: text/xml");
    echo "<?xml version='1.0' encoding='UTF-8'?>";
    echo '<?xml-stylesheet href="cv.css" type="text/css"?>';
    //ROOT XML
    echo "<curicculum>";
    //CONNECTION BDD 
    //$mysqli = new mysqli("localhost","root","","omnes");
    $mysqli = new mysqli("localhost","root","root","omnes");
    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //Selectionne toutes les infos du CV
    $id = $_SESSION['choixprof'];
    $sql = "SELECT ID_CV FROM Profs WHERE ID= '$id'";

    if (mysqli_query($mysqli, $sql)) 
    {
        if($result = $mysqli ->query($sql))
        {
            if($result -> num_rows >0)
            {
                while($row = $result -> fetch_row() )
                {
                    
                    if($row[0]==0){
                        echo 'ce professeur n a pas de cv';
                    }else{
                    
                            $sql2 = "SELECT * FROM cv WHERE ID = '$row[0]'";

                            if (mysqli_query($mysqli, $sql2)) 
                            {
                                if($result2 = $mysqli ->query($sql2))
                                {
                                    if($result2 -> num_rows >0)
                                    {
                                        
                                            while($row2 = $result2 -> fetch_row() )
                                        {
                            
                                            //AFFICHAGE SOUS FORME XML
                                            echo "<cv>";
                                            echo "<formation>$row2[2]</formation>";
                                            echo "<diplome>$row2[3]</diplome>";
                                            echo "<date>$row2[4]</date>";
                                            echo"<experience>$row2[1]</experience>";
                                            echo "<publiscience>$row2[5]</publiscience>";
                                            echo "</cv>";
                                        
                                        }
                                        
                                    }
                                    
                                }
                            }else{
                                echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                            }
                        }   
                }
            }
        }
    }
    else 
    {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
    }
    //Ferme la balise ROOT
    echo "</curicculum>";
?>