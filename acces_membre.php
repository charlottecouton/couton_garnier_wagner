<?php

    session_start();
    //echo $_SESSION['connecte'];
  //  $parcourir = isset($_POST['lien_parcourir']);

    if(empty($_SESSION['connecte']) || $_SESSION['connecte']==0){
    //if($_SESSION['chat']==1){
        //echo "looser connect toi";
        //header("refresh:3,url=index.html");
        header('Location: http://localhost/couton_garnier_wagner/index.php');
    }
    else{
        //echo "TRUE ";
        echo $_SESSION['chat'];//Pour voir qui est connecté

        if(isset( $_GET['test']))
        {
            if($_GET['test'] == "parcourir"){
                header('Location: http://localhost/couton_garnier_wagner/parcourir.php');
                //header("refresh:3,url=parcourir.html");

            }
            elseif($_GET['test'] == "enseignement"){
                header('Location: http://localhost/couton_garnier_wagner/enseignement.php');

            }
            elseif($_GET['test'] == "recherche"){
                header('Location: http://localhost/couton_garnier_wagner/recherche.html');

            }
            elseif($_GET['test'] == "international"){
                header('Location: http://localhost/couton_garnier_wagner/international.php');

            }
            elseif($_GET['test'] == "chat"){
                header('Location: http://localhost/couton_garnier_wagner/chat.php');

            }elseif($_GET['test'] == "rdv"){
                header('Location: http://localhost/couton_garnier_wagner/Calendrier/Public/RDV.php');

            }
            
        }
        else echo 'Une erreur sest produite';

    }
?>