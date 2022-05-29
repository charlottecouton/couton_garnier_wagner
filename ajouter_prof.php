<!--<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/couton_garnier_wagner/style.css">
    <link rel="stylesheet" href="/couton_garnier_wagner/connexion.css">-->

<?php

    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes-1");
    
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
    $labo = isset($_POST['labo'])?$_POST['labo']:'';
    $nom_photo = isset($_POST['photo'])?$_POST['photo']:'';
    $teams = "https://teams.microsoft.com/l/meetup-join/19%3ameeting_ZDBkMjNiYzAtZDdmZC00NjRmLWFmZjMtYTVhYzQ1NTNlNGRk%40thread.v2/0?context=%7b%22Tid%22%3a%22a2697119-66c5-4126-9991-b0a8d15d367f%22%2c%22Oid%22%3a%229dc45205-7b25-4d41-8306-b15f24672cf1%22%7d";
    $photo = "Profs/".$nom_photo.".png";
    
    $err_msg ="";

    if($nom==""){
        $err_msg = $err_msg." un nom <br/>";
    }if($prenom ==""){
        $err_msg = $err_msg." un prenom <br/>";
    }if($mail==""){
        $err_msg = $err_msg." un email <br/>";
    }if($password==""){
        $err_msg = $err_msg." un mot de passe <br/>";
    }if($spe==""){
        $err_msg = $err_msg." une specialite <br/>";
    }if($bureau==""){
        $err_msg = $err_msg." un bureau <br/>";
    }if($tel==""){
        $err_msg = $err_msg." un tel <br/>";
    }if($id_c==""){
        $err_msg = $err_msg." un id chercheur <br/>";
    }if($nom_photo==""){
        $err_msg = $err_msg." l'adresse de la photo <br/>";
    }if($labo =="" && $id_c==1){
        $err_msg = $err_msg." un laboratoire de recherche";
    }

    if($err_msg==""){

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
            $sql = "INSERT INTO profs (Nom, Prenom, Spe, Bureau, ID_C, Tel, Mail, Photo, Mdp, Teams, ID_CV)VALUES('$nom', '$prenom', '$spe', '$bureau','$id_c', '$tel', '$mail','$photo', '$passwordHash', '$teams', 0)";
            
            if(mysqli_query($mysqli, $sql)){
                
                if($id_c == 1){
                    
                    $sql2 = "INSERT INTO Chercheurs (Labo)VALUES('$labo')";
                    
                    if(mysqli_query($mysqli, $sql2)){

                        
                        $sql3 = "SELECT MAX(ID) FROM Chercheurs";
                        
                        if(mysqli_query($mysqli, $sql3)){

                            
                            
                            if($result3 = $mysqli->query($sql3)){
                                if($result3 -> num_rows >0){
                                    while($row3 = $result3->fetch_row()) {

                                       
                                        $sql4 = "UPDATE Profs SET ID_C = '$row3[0]' WHERE Nom = '$nom'";
                                        
                                        if(mysqli_query($mysqli, $sql4)){
                        
                                            header("refresh:0,url=administrateur.php");
                                        }else{
                                            echo "Erreur : " . $sql4 . "<br>" . mysqli_error($mysqli);
                                            header("refresh:4,url=ajouter_prof1.php");
                                        }
                                    }
                                }
                            }
                            
                        }else{
                        echo "Erreur : " . $sql3 . "<br>" . mysqli_error($mysqli);
                            header("refresh:4,url=ajouter_prof1.php");
                        }
                        
                    }else{
                        
                        echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                        header("refresh:4,url=ajouter_prof1.php");
                    }
                }else{
                    header("refresh:0,url=administrateur.php");
                }
                
            }else{
                echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
                header("refresh:4,url=ajouter_prof1.php");
            }

            
    }else{
        echo '<h1> Veuillez remplir'.$err_msg.'</h1>';
        header("refresh:4,url=ajouter_prof1.php");
    }
?>