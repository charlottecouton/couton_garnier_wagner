<?php
    session_start();
    $value = $_SESSION['priserdv'];
    
    //var_dump($value);
    //Connection à la bdd
    //$mysqli = new mysqli("localhost","root","root","omnes");
    $mysqli = new mysqli("localhost","root","","omnes");
    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //Recupère le motif envoyé
    $motif = isset($_POST['motif'])?$_POST['motif']:'';

    //var_dump($motif);
    //Requete pour remplir le motif
    $sql = "UPDATE `events` SET `Nom`= '$motif' WHERE ID=$value";
    mysqli_query($mysqli, $sql);
    

    header("refresh:0,url=index.html");

?>