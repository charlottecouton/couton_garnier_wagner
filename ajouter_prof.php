<?php

    //$mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
    $mysqli = new mysqli("localhost","root","","omnes-1");
    
    if($mysqli -> connect_errno){
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $nom = isset($_POST['nom'])?$_POST['nom']:'';
    $prenom = isset($_POST['prenom'])?$_POST['prenom']:'';
    $spe = isset($_POST['spe'])?$_POST['spe']:'';
    $bureau = isset($_POST['bureau'])?$_POST['bureau']:'';
    $tel = isset($_POST['tel'])?$_POST['tel']:'';
    $mail = isset($_POST['mail'])?$_POST['mail']:'';
    $password = isset($_POST['mdp'])?$_POST['mdp']:'';
    $id_c = isset($_POST['id_c'])?$_POST['id_c']:'';
    $nom_photo = isset($_POST['photo'])?$_POST['photo']:'';

    $photo = "Profs/".$nom_photo.".png";
    
    $err_msg ="";

    if($nom==""){
        $err_msg = $err_msg."Veuillez remplir un nom <br/>";
    }if($prenom ==""){
        $err_msg = $err_msg."Veuillez remplir un prenom <br/>";
    }if($mail==""){
        $err_msg = $err_msg."Veuillez remplir un email <br/>";
    }if($password==""){
        $err_msg = $err_msg."Veuillez remplir un mot de passe <br/>";
    }if($spe==""){
        $err_msg = $err_msg."Veuillez remplir une specialite <br/>";
    }if($bureau==""){
        $err_msg = $err_msg."Veuillez remplir un bureau <br/>";
    }if($tel==""){
        $err_msg = $err_msg."Veuillez remplir un tel <br/>";
    }if($id_c==""){
        $err_msg = $err_msg."Veuillez remplir un id chercheur <br/>";
    }if($nom_photo==""){
        $err_msg = $err_msg."Veuillez remplir l'adresse de la photo <br/>";
    }

    if($err_msg==""){

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
            $sql = "INSERT INTO profs (Nom, Prenom, Spe, Bureau, ID_C,Tel, Mail,Photo, Mdp)VALUES('$nom', '$prenom', '$spe', '$bureau','$id_c', '$tel', '$mail','$photo', '$passwordHash')";
            
            if(mysqli_query($mysqli, $sql)){
                header("refresh:0,url=administrateur.php");
            }else{
                echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
                header("refresh:0,url=administrateur.php");
            }
    }else{
        echo '<h1>'.$err_msg.'</h1>';
        header("refresh:0,url=ajouter_prof1.php");
    }
?>