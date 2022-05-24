<?php
     //Pour récupérer l'id de l'élève sur la page "chat.php"
     session_start();
    
     //Connection BBD
     /*accès Solène et Anais*/
     //$mysqli = new mysqli("localhost","root","","chatbox");
     
     /*accès Charlotte*/
     $mysqli = new mysqli("localhost","root","root","chatbox");
     if($mysqli -> connect_errno)
     {  //Si la connection est fausse
         echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
         exit();
     }

    //Recupère le message envoyé par utilisateur
    $message = isset($_POST['message'])?$_POST['message']:'';

    $value = $_SESSION['chat'];
    $valueP = $_SESSION['chatP'];

    if(isset($_POST['btn_soumettre']) && $_POST['btn_soumettre']=="soumettre")
    {
        //INSERER LES INFO VOULU DANS LA BDD
        $sql = "INSERT INTO `messages`(`Message`, `Date`,`ID_eleves`,`ID_Profs`,`emetteur`  ) VALUES ('$message',NOW(),'$value','$valueP', 0)";
        
        if (mysqli_query($mysqli, $sql)) {
            echo "Nouveau message envoye";
            
        }else 
        {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
        }    }
?>