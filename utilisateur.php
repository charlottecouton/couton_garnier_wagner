<?php
    session_start();

    if(isset($_POST['btn_etudiant']) && $_POST['btn_etudiant']=="etudiant"){
        $_SESSION['connexion']= 0;
        header("refresh:0,url=co_etud.html");
    }

    if(isset($_POST['btn_prof']) && $_POST['btn_prof']=="prof"){
        $_SESSION['connexion']= 1;
        header("refresh:0,url=connexion.html");
    }

    if(isset($_POST['btn_admin']) && $_POST['btn_admin']=="admin"){
        $_SESSION['connexion']= 2;
        header("refresh:0,url=connexion.html");
    }
?>
