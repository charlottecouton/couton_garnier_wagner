<?php
    //Pour récupérer l'id de l'élève sur la page "chat.php"
    session_start();
    $value = $_SESSION['chat'];
    $valueP = $_SESSION['chatP'];

    //Connection BBD
    /*accès Solène et Anais
    $mysqli = new mysqli("localhost","root","","chatbox");*/
    
    /*accès Charlotte*/
    $mysqli = new mysqli("localhost","root","root","chatbox");
    if($mysqli -> connect_errno)
    {  //Si la connection est fausse
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //Recupère le message envoyé par utilisateur
    $message = isset($_POST['message'])?$_POST['message']:'';
    
    //Si on envois le message
    if(isset($_POST['btn_soumettre']) && $_POST['btn_soumettre']=="soumettre")
    {
        //INSERER LES INFO VOULU DANS LA BDD
        
        $sql = "INSERT INTO `messages`(`Message`, `Date`,`ID_eleves`,`ID_Profs`  ) VALUES ('$message',NOW(),'$value','$valueP')";
        
        if (mysqli_query($mysqli, $sql)) 
        {
            //AFFICHER TOUS LES MESSAGES DU CHAT DU PROF ET DE L'ELEVE CORRESPONDANT
            $sql1 = "SELECT Message,Date  FROM  messages WHERE ID_eleves='$value' AND ID_profs='$valueP'";

            if($result = $mysqli ->query($sql1))
            {
                if($result -> num_rows >0)
                {
                    while($row = $result -> fetch_row() )
                    {   
                        echo "Message : " .$row[0] . "<br/>";
                        echo "Heure d'envois du message : " .$row[1] . "<br/>";
                    }   
                }
            }
            header("refresh:5,url=index.html");
        }
        else 
        {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
            header("refresh:10,url=message.html");
        }
        
    }
?>