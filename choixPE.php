<?php
    session_start();

    $mysqli = new mysqli("localhost","root","","chatbox");
    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //$nom = isset($_POST['nom'])?$_POST['nom']:'';

    //POUR Garnier
    if(isset($_POST['btn_garnier']) && $_POST['btn_garnier']=="garnier")
    {
        $sql = "SELECT * FROM eleves WHERE Nom='Garnier'";

        if (mysqli_query($mysqli, $sql)) 
        {
            if($result = $mysqli ->query($sql))
            {
                if($result -> num_rows >0)
                {
                    while($row = $result -> fetch_row() )
                    {
                        $id = $row[0];
                        $_SESSION['choixPE'] = $id;
                        echo "ID : " .$id. "<br/>";
                        echo "Nom : " . $row[1] . "<br/>";
                    }   
                }
                else 
                {
                    echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
                    header("refresh:2,url=choixPE.html");
                }
            }
            header("refresh:2,url=messageriePE.html");
        }
    }

    //POUR Couton
    if(isset($_POST['btn_couton']) && $_POST['btn_couton']=="couton")
    {
        $sql = "SELECT * FROM eleves WHERE Nom='Couton'";

        if (mysqli_query($mysqli, $sql)) 
        {
            if($result = $mysqli ->query($sql))
            {
                if($result -> num_rows >0)
                {
                    while($row = $result -> fetch_row() )
                    {
                        $id = $row[0];
                        $_SESSION['choixPE'] = $id;
                        echo "ID : " .$id. "<br/>";
                        echo "Nom : " . $row[1] . "<br/>";
                    }   
                }
                else 
                {
                    echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
                    header("refresh:2,url=choixPE.html");
                }
            }
            header("refresh:2,url=messageriePE.html");
        }
    }

    //POUR Wagner
    if(isset($_POST['btn_wagner']) && $_POST['btn_wagner']=="wagner")
    {
        $sql = "SELECT * FROM eleves WHERE Nom='Wagner'";

        if (mysqli_query($mysqli, $sql)) 
        {
            if($result = $mysqli ->query($sql))
            {
                if($result -> num_rows >0)
                {
                    while($row = $result -> fetch_row() )
                    {
                        $id = $row[0];
                        $_SESSION['choixPE'] = $id;
                        echo "ID : " .$id. "<br/>";
                        echo "Nom : " . $row[1] . "<br/>";
                    }   
                }
                else 
                {
                    echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
                    header("refresh:2,url=choixPE.html");
                }
            }
            header("refresh:2,url=messageriePE.html");
        }
    }
?>