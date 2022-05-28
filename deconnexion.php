<?php
    session_start();
    
    
    $_SESSION = array();// Réinitialisation du tableau de session, on le vide intégralement
        
    
    session_destroy(); // Destruction de la session
    

    unset($_SESSION); // Destruction du tableau de session

    
    header('Location: http://localhost/couton_garnier_wagner/index.php');

?>