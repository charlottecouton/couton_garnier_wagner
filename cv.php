<?php
    //Pour ecrire en XLM
    header("Content-type: text/xml");
    echo "<?xml version='1.0' encoding='UTF-8'?>";
    //ROOT XML
    echo "<curicculum>";
    //CONNECTION BDD : CHATBOX
    $mysqli = new mysqli("localhost","root","","chatbox");
    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //Selectionne toutes les infos du CV
    $sql = "SELECT * FROM cv";

    if (mysqli_query($mysqli, $sql)) 
    {
        if($result = $mysqli ->query($sql))
        {
            if($result -> num_rows >0)
            {
                while($row = $result -> fetch_row() )
                {
                    //AFFICHAGE SOUS FORME XML
                    echo "<cv>";
                    echo "<formation>$row[2]</formation>";
                    echo "<diplome>$row[3]</diplome>";
                    echo "<date>$row[4]</date>";
                    echo"<experience>$row[1]</experience>";
                    echo "</cv>";
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