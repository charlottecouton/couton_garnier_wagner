<?php
    //CONNECTION A LA BASE DE DONNEE
    //NOM DE LA BASE : omnes
    //$mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
    $mysqli = new mysqli("localhost","root","","omnes-1");

    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    //TOUTES LES DONNEES DE LA BASE 
    //TABLE : Professeurs
    /*
    $id = isset($_POST['ID'])?$_POST['ID']:'';
    $nom = isset($_POST['nom'])?$_POST['nom']:'';
    $prenom = isset($_POST['prenom'])?$_POST['prenom']:'';*/
    //$photo = isset($_POST['photo'])?$_POST['photo']:'';
    /*$spe = isset($_POST['spe'])?$_POST['spe']:'';
    $video = isset($_POST['video'])?$_POST['video']:'';
    $cv = isset($_POST['cv'])?$_POST['cv']:'';
    $dept = isset($_POST['dept'])?$_POST['dept']:'';
    $bureau = isset($_POST['bureau'])?$_POST['bureau']:'';
    $id_dispo = isset($_POST['id_dispo'])?$_POST['id_dispo']:'';
    $id_chercheur = isset($_POST['id_chercheur'])?$_POST['id_chercheur']:'';
    $mail = isset($_POST['mail'])?$_POST['mail']:'';
    $mdp = isset($_POST['mdp'])?$_POST['mdp']:'';
    $id_user = isset($_POST['id_user'])?$_POST['id_user']:'';*/

    //QU'est ce que je fais : affiche les info d'un prof
    echo "Voici les informations des professeurs <br/><br/>";
    
    //REQUETE SQL POUR SELECTIONNER TOUS LES PROFESSEURS
    $sql = "SELECT * FROM Professeurs";

    if (mysqli_query($mysqli, $sql)) 
    {
        echo "Nouveau enregistrement créé avec succès<br/><br/>";

        if($result = $mysqli ->query($sql))
        {
            if($result -> num_rows >0)
            {
                while($row = $result -> fetch_row() )
                {
                    echo "ID : " . $row[0] . "<br/>";
                    echo "Nom : " . $row[1] . "<br/>";
                    echo "Prenom : " . $row[2] . "<br/>";
                    //AFFICHE L IMAGE DU PROFESSEUR
                    echo "Photo de Profil : <img src='$row[3]' height='120' width='100'> <br/>";
                    echo "Specialite : " . $row[4] . "<br/>";
                    echo "Video : " . $row[5] . "<br/>";
                    echo "CV : " . $row[6] . "<br/>";
                    echo "Departement : " . $row[7] . "<br/>";
                    echo "Bureau : " . $row[8] . "<br/>";
                    echo "ID_dispo : " . $row[9] . "<br/>";
                    echo "ID_chercheur : " . $row[10] . "<br/>";
                    echo "Mail : " . $row[11] . "<br/>";
                    echo "Mdp : " . $row[12] . "<br/>";
                    echo "ID_user : " . $row[13] . "<br/><br/><br/>"; 
                }   
            }
        }
        header("refresh:10,url=index.html");
    }
    else 
    {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
        header("refresh:2,url=index.html");
    }
?>