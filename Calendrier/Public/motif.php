<?php
    session_start();
    $value = $_SESSION['priserdv'];
    
    ////CONNEXION À LA BDD////
    //accès Charlotte
    $mysqli = new mysqli("localhost","root","root","omnes");
    //accès Anaïs et Solène
    //$mysqli = new mysqli("localhost","root","","omnes");

    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    //Recupère le motif envoyé
    $motif = isset($_POST['motif'])?$_POST['motif']:'';

    //Requete pour remplir le motif
    $sql = "UPDATE `events` SET `Nom`= '$motif' WHERE ID=$value";
    mysqli_query($mysqli, $sql);
    

    header("refresh:0,url=http://localhost/couton_garnier_wagner/index.php");

?>