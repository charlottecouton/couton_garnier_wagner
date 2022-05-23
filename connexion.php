<?php
    
    $mysqli = new mysqli("localhost","root","","omnes");
    if($mysqli -> connect_errno)
    {
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $id = isset($_POST['id'])?$_POST['id']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $btn_etudiant = isset($_POST['btn_etudiant']);
    $btn_professeur = isset($_POST['btn_prof']);
    $btn_admin = isset($_POST['btn_admin']);
    
    $err_msg ="";

    if($id==""){
        $err_msg = "Veuillez remplir un login <br/>";
    }
    if($password==""){
        $err_msg = "Veuillez remplir un password <br/>";
    }
    if($err_msg==""){
        
        
        if($btn_etudiant == "etudiant"){
            $table = "eleves";
            echo "Verification que l'Id existe <br/><br/>";
         //   $sql = "SELECT ID FROM  eleves WHERE ID = '$id'";
        }

        if($btn_professeur == "professeur"){
            $table = "professeurs";
            echo "Verification que l'Id existe <br/><br/>";
        //    $sql = "SELECT ID FROM  professeurs WHERE ID = '$id'";
        }
        /*if($btn_admin == "administrateur"){
            echo "Verification que l'Id existe <br/><br/>";
            $sql = "SELECT ID FROM  employes WHERE ID = '$id'";
        }*/
        $sql = "SELECT ID FROM $table WHERE ID = '$id'";

        if($result = $mysqli->query($sql)){

                if($result -> num_rows >0){
                    $sql2 = "SELECT Mdp FROM $tables WHERE ID ='$id'";

                    if($result2 = $mysqli->query($sql2)){

                        if ($result2->num_rows > 0) {

                            while($row = $result2->fetch_assoc()) {
                                echo "mdp : ".$row["Mdp"]. "<br>";
                            }

                            $passwordVerify = password_verify($password, $row["Mdp"]);
                           
                            if($passwordVerify){

                                    $id_exists = true;
                                    echo"true";
                            }
                        }
      
                    }

                }
                
                else 
                {
                        $id_exists = false;
                        echo "id n'est pas dans la base de données";
                }
            

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