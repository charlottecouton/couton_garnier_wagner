<?php

    session_start();
    //echo $_SESSION['connecte'];
  //  $parcourir = isset($_POST['lien_parcourir']);

    if(empty($_SESSION['connecte'])){
    //if($_SESSION['chat']==1){
        echo "looser connect toi";
        header("refresh:3,url=index.html");
        //header('Location: http://localhost/couton_garnier_wagner/index.html');
    }
    else{
        //echo "TRUE ";
        //echo $_SESSION['chat'];//Pour voir qui est connecté

        if(isset( $_GET['test']))
        {
            if($_GET['test'] == "parcourir"){
                header('Location: http://localhost/couton_garnier_wagner/parcourir.html');

            }
            elseif($_GET['test'] == "enseignement"){
                header('Location: http://localhost/couton_garnier_wagner/enseignement.php');

            }
            elseif($_GET['test'] == "recherche"){
                header('Location: http://localhost/couton_garnier_wagner/recherche.html');

            }
            elseif($_GET['test'] == "international"){
                header('Location: http://localhost/couton_garnier_wagner/international.html');

            }
            elseif($_GET['test'] == "chat"){
                header('Location: http://localhost/couton_garnier_wagner/chat.php');

            }
            
        }
        else echo 'Une erreur sest produite';

    }
?>
