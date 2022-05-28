<?php
    session_start();

    //$mysqli = new mysqli("localhost","root","","omnes");
    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes-1");

    if($mysqli -> connect_errno)
    {
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $mail = isset($_POST['id'])?$_POST['id']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';
    $btn = isset($_POST['btn-co']);
    /*$btn_etudiant = isset($_POST['btn_etudiant']);
    $btn_professeur = isset($_POST['btn_prof']);
    $btn_admin = isset($_POST['btn_admin']);*/
    
    $err_msg ="";

    if($mail==""){
        $err_msg = "Veuillez remplir un email";
    }

    if($password==""){
        $err_msg = $err_msg."Veuillez remplir un password ";
    }

    $compte = $_SESSION['connexion'];
    
    if($err_msg==""){
        
        switch($compte){
            case 0 : 
                $table = "Etudiants";
                break;
            case 1 :
                $table = "Profs";
                break;
            case 2 :
                $table = "Admin";
                break;
        }

        
        $sql = "SELECT * FROM $table WHERE Mail = '$mail' AND Mdp = '$password'";

        if($result = $mysqli->query($sql)){
            
            if($result -> num_rows >0){
                
                echo '<body class="page">
                
                </body>';
                
                while($row = $result->fetch_assoc()) {
                    
                    $id=$row["ID"];
                    $_SESSION['chat'] = $id;
                    $_SESSION['connecte'] = 1;
                    if($_SESSION['connexion']== 2){
                        header('Location: http://localhost/couton_garnier_wagner/administrateur.php');
                    }
                    else{
                        header("refresh:0,url=index.php");
                    }
                    
                }
                //$passwordVerify = password_verify($password, $row["Mdp"]);
                           
                            /*if($passwordVerify){

                                    $id_exists = true;
                                    echo"true";
                }*/

            }else{
                $id_exists = false;
                $_SESSION['connecte'] = 0;
                echo '<body class="page">
                
                </body>';
                
                header("refresh:2,url=connexion1.php");
            }
        }else{
            echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
        }
    }
    else{
        echo $err_msg;
    }
?>