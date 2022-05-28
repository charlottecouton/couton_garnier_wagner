<?php
    
    //$mysqli = new mysqli("localhost","root","","tpnote2");
    //$mysqli = new mysqli("localhost","root","root","omnes");
    $mysqli = new mysqli("localhost","root","","omnes-1");

    if($mysqli -> connect_errno)
    {
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $id = isset($_POST['id'])?$_POST['id']:'';
    $prenom = isset($_POST['prenom'])?$_POST['prenom']:'';
    $nom = isset($_POST['nom'])?$_POST['nom']:'';
    $mail = isset($_POST['mail'])?$_POST['mail']:'';
   
    

    echo "SUPPRIMER UN PROF <br/><br/>";
    $sql = "DELETE FROM employes WHERE ID = '$id'";

    if (mysqli_query($mysqli, $sql)) 
    {
        echo "Nouveau enregistrement créé avec succès<br/><br/>";
        echo "LIGNE BIEN SUPPRIME<br/><br/>";

        $sql = "SELECT * FROM  employes";

        if($result = $mysqli ->query($sql))
        {
            if($result -> num_rows >0)
            {
                while($row = $result -> fetch_row() )
                {
                    echo "ID : " . $row[0] . "<br/>";
                    echo "Prenom : " . $row[1] . "<br/>";
                    echo "Nom : " . $row[2] . "<br/>";
                    echo "mail : " . $row[3] . "<br/>";
    
                }   
            }
        }
       // header("refresh:10,url=2.php");
    }
    else 
    {
       // echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
      //  header("refresh:2,url=2.php");
    }
?>