<?php

require '../couton_garnier_wagner/Calendrier/views/header.php';
    
    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes-1");
    
    if($mysqli -> connect_errno){
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $nom = isset($_POST['nom'])?$_POST['nom']:'';
    $prenom = isset($_POST['prenom'])?$_POST['prenom']:'';
    $ad1 = isset($_POST['ad1'])?$_POST['ad1']:'';
    $ad2 = isset($_POST['ad2'])?$_POST['ad2']:'';
    $pays = isset($_POST['pays'])?$_POST['pays']:'';
    $cp = isset($_POST['cp'])?$_POST['cp']:'';
    $tel = isset($_POST['tel'])?$_POST['tel']:'';
    $mail = isset($_POST['mail'])?$_POST['mail']:'';
    $password = isset($_POST['mdp'])?$_POST['mdp']:'';
    
    $err_msg ="";

    if($nom==""){
        $err_msg = $err_msg."Veuillez remplir un nom <br/>";
    }if($prenom ==""){
        $err_msg = $err_msg."Veuillez remplir un prenom <br/>";
    }if($mail==""){
        $err_msg = $err_msg."Veuillez remplir un email <br/>";
    }if($password==""){
        $err_msg = $err_msg."Veuillez remplir un mot de passe <br/>";
    }if($ad1==""){
        $err_msg = $err_msg."Veuillez remplir une adresse <br/>";
    }if($ad2==""){
        $err_msg = $err_msg."Veuillez remplir une adresse <br/>";
    }if($pays==""){
        $err_msg = $err_msg."Veuillez remplir un pays <br/>";
    }if($cp==""){
        $err_msg = $err_msg."Veuillez remplir un cp <br/>";
    }if($tel==""){
        $err_msg = $err_msg."Veuillez remplir un tel <br/>";
    }

    if($err_msg==""){
        
        $sql2 = "SELECT * FROM Etudiants WHERE Mail = '$mail'";
        if (mysqli_query($mysqli, $sql2)) 
        {
            if($result2 = $mysqli ->query($sql2))
            {
                if($result2 -> num_rows >0)
                {
                    echo '<body class="page">
                    <div class="container err-msg">
                    <img src="dngr.png"></img>
                    <br>
                    <p>Vous avez deja un compte, connectez-vous !</p>
                    </div>
                    
            </body>';
            header("refresh:2,url=inscription1.php");
                }else{
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
                    $sql = "INSERT INTO Etudiants (Nom, Prenom, Adresse1, Adresse2, Ville, CP, Pays, Tel, Mail, Mdp)VALUES('$nom', '$prenom', '$ad1', '$ad2', '$ville', '$cp', '$pays', '$tel', '$mail', '$passwordHash')";
                    
                    if(mysqli_query($mysqli, $sql)){
                        header("refresh:0,url=index.php");
                    }else{
                        echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
                        header("refresh:0,url=index.php");
                    }
                }
            }
        }
                    
        
    }else{
        echo '<body class="page">
                    <div class="container err-msg">
                    <img src="dngr.png"></img>
                    <br>
                    <p>'.$err_msg.'</p>
                    </div>
            </body>';
        header("refresh:2,url=inscription1.php");
    }
?>