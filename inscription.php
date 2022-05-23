<?php
    
    $mysqli = new mysqli("localhost","root","","tpnote2");
    if($mysqli -> connect_errno)
    {
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $nom = isset($_POST['nom'])?$_POST['nom']:'';
    $prenom = isset($_POST['prenom'])?$_POST['prenom']:'';
    $mail = isset($_POST['mail'])?$_POST['mail']:'';
    $password = isset($_POST['mdp'])?$_POST['mdp']:'';
    
    $err_msg ="";

    if($nom==""){
        $err_msg = "Veuillez remplir un nom <br/>";
    }
    if($prenom ==""){
        $err_msg = "Veuillez remplir un prenom <br/>";
    }
    if($mail==""){
        $err_msg = "Veuillez remplir un email <br/>";
    }
    if($password==""){
        $err_msg = "Veuillez remplir un mot de passe <br/>";
    }
    if($err_msg==""){

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        echo "pass : ".$passwordHash;
        

            echo "Inscription du nouvel utilisateur <br/><br/>";
            $sql = "INSERT INTO employes (Prenom,Nom)
            VALUES('$prenom', '$nom')";
            
            if (mysqli_query($mysqli, $sql)) 
            {
                echo "Nouveau enregistrement créé avec succès<br/><br/>";
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
                            echo "Date D'embauche : " . $row[3] . "<br/>";
                            echo "ID Travail : " . $row[4] . "<br/>";
                            echo "Salaire : " . $row[5] . "<br/>";
                            echo "ID Patron : " . $row[6] . "<br/>";
                            echo "ID Departement : " . $row[7] . "<br/><br/><br/>";
                        }   
                    }
                }
              //  header("refresh:10,url=2.php");
            }
            else 
            {
                echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
             ///   header("refresh:2,url=2.php");
            }
    }
    else{
        echo $err_msg;
    }
?>