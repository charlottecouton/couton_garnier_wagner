<?php
     //Pour récupérer l'id de l'élève sur la page "chat.php"
     session_start();
    
     //Connection BBD
     /*accès Anais*/
    //$mysqli = new mysqli("localhost","root","","omnes-1");

     /*accès Solène*/
     //$mysqli = new mysqli("localhost","root","","omnes");
     
     /*accès Charlotte*/
     $mysqli = new mysqli("localhost","root","root","omnes");
     if($mysqli -> connect_errno)
     {  //Si la connection est fausse
         echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
         exit();
     }

    //Recupère le message envoyé par utilisateur
    $message = isset($_POST['message'])?$_POST['message']:'';

    $user = $_SESSION['connexion'];//on récupère le type d'utilisateur

    switch($user){
      case 0 :
        $emetteur = 0;
        $etudiant = $_SESSION['chat'];
        $prof = $_SESSION['recepteur'];
        break;
      case 1 :
        $emetteur = 1;
        $prof = $_SESSION['chat'];
        $etudiant = $_SESSION['recepteur'];
        break;
      case 2 :
        header("refresh:0,url=index.php");
        break;
    }
    

    if(isset($_POST['btn_soumettre']) && $_POST['btn_soumettre']=="soumettre")
    {
        //INSERER LES INFO VOULU DANS LA BDD
        $sql = "INSERT INTO `messages`(`Message`, `Date`,`ID_E`,`ID_P`,`Emetteur`  ) VALUES ('$message',NOW(),'$etudiant','$prof', $emetteur)";
        
        if (mysqli_query($mysqli, $sql)) {
          header('Location: http://localhost/couton_garnier_wagner/message.php');
        }else 
        {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
        }    
    }
?>