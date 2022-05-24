<?php
    session_start();
    /*accès Solène et Anais*/
    //$mysqli = new mysqli("localhost","root","","chatbox");
    
    /*accès Charlotte*/
    $mysqli = new mysqli("localhost","root","root","chatbox");
    
    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    
    $nom = isset($_POST['nom'])?$_POST['nom']:'';
    
    if(isset($_POST['btn_soumettre']) && $_POST['btn_soumettre']=="soumettre")
    {
        $sql = "SELECT * FROM eleves WHERE Nom='$nom'";

        if (mysqli_query($mysqli, $sql)) 
        {
            if($result = $mysqli ->query($sql))
            {
                if($result -> num_rows >0)
                {
                    while($row = $result -> fetch_row() )
                    {
                        $id = $row[0];
                        $_SESSION['chat'] = $id;
                        echo "ID : " .$id. "<br/>";
                        echo "Nom : " . $row[1] . "<br/>";
                    }   
                }
                else 
                {
                    echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
                    header("refresh:2,url=chat.html");
                }
            }
            header("refresh:2,url=chatP.php");
        }
    }
?>