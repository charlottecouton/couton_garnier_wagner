<?php
    session_start();

    $mysqli = new mysqli("localhost","root","","chatbox");
    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //$nom = isset($_POST['nom'])?$_POST['nom']:'';

    //POUR SEGADO
    if(isset($_POST['btn_segado']) && $_POST['btn_segado']=="segado")
    {
        $sql = "SELECT * FROM profs WHERE Nom='Segado'";

        if (mysqli_query($mysqli, $sql)) 
        {
            if($result = $mysqli ->query($sql))
            {
                if($result -> num_rows >0)
                {
                    while($row = $result -> fetch_row() )
                    {
                        $id = $row[0];
                        $_SESSION['chatP'] = $id;
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
            header("refresh:2,url=message.html");
        }
    }

    //POUR HINA
    if(isset($_POST['btn_hina']) && $_POST['btn_hina']=="hina")
    {
        $sql = "SELECT * FROM profs WHERE Nom='Hina'";

        if (mysqli_query($mysqli, $sql)) 
        {
            if($result = $mysqli ->query($sql))
            {
                if($result -> num_rows >0)
                {
                    while($row = $result -> fetch_row() )
                    {
                        $id = $row[0];
                        $_SESSION['chatP'] = $id;
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
            header("refresh:2,url=message.html");
        }
    }
?>