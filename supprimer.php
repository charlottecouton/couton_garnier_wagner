<?php
    
    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes-1");

    if($mysqli -> connect_errno)
    {
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $mail = isset($_POST['mail'])?$_POST['mail']:'';
    $err_msg ="";
   
    if($mail==""){
        $err_msg = $err_msg."Veuillez remplir un email <br/>";
    }

    if($err_msg==""){


        $sql = "DELETE FROM profs WHERE Mail = '$mail'";

        if (mysqli_query($mysqli, $sql)) 
        {
            header("refresh:0,url=administrateur.php");
        }
        else 
        {
            //echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
            header("refresh:0,url=administrateur.php");
        }
    }else{
        echo '<h1>'.$err_msg.'</h1>';
        header("refresh:0,url=supprimer1.php");
    }
?>
