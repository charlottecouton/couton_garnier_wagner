<?php
    
    $mysqli = new mysqli("localhost","root","","tpnote2");
    if($mysqli -> connect_errno)
    {
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $id = isset($_POST['id'])?$_POST['id']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    
    $err_msg ="";

    if($id==""){
        $err_msg = "Veuillez remplir un login <br/>";
    }
    if($password==""){
        $err_msg = "Veuillez remplir un password <br/>";
    }
    if($err_msg==""){
        
        

        echo "Verification que l'Id existe <br/><br/>";
        $sql = "SELECT ID FROM  employes WHERE ID = '$id'";
            
        // if ($result = mysqli_query($mysqli, $sql)) 
        if($result = $mysqli->query($sql)){

                if($result -> num_rows >0){
            //  $result = $mysqli->query($sql);
                    $sql2 = "SELECT prenom FROM employes WHERE ID ='$id'";

                    if($result2 = $mysqli->query($sql2)){

                        if ($result2->num_rows > 0) {
                            // output data of each row
                            while($row = $result2->fetch_assoc()) {
                                echo "prenom : ".$row["prenom"]. "<br>";
                            }

                        //   $passwordVerify = password_verify($password, $row["prenom]);
                       /* if($passwordVerify){



                                $id_exists = true;
                                echo"true";
                        }*/
                        }
      
                     }

                }
                
                else 
                {
                        $id_exists = false;
                        echo "id n'est pas dans la base de données";
                }

                /*
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
                header("refresh:10,url=2.php");*/
            }
            /*else 
            {
                echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
                header("refresh:2,url=2.php");
            }*/

    }
    else{
        echo $err_msg;
    }
?>