<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/couton_garnier_wagner/style.css">
    <link rel="stylesheet" href="/couton_garnier_wagner/connexion.css">

<?php
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
        $err_msg = " un email";
    }

    if($password==""){
        $err_msg = $err_msg." un mot de passe ";
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

        
        $sql = "SELECT * FROM $table WHERE Mail = '$mail'";

        if($result = $mysqli->query($sql)){
            
            if($result -> num_rows >0){
                
                while($row = $result->fetch_assoc()) {
                    
                    $passwordVerify = password_verify($password, $row["Mdp"]);
                           
                    if($passwordVerify){

                        $id=$row["ID"];
                    
                        $_SESSION['chat'] = $id;
                        $_SESSION['connecte'] = 1;
                    
                        if($compte== 2){
                            
                            header("refresh:0,url=administrateur.php");
                        }
                        else{
                            header("refresh:0,url=index.php");
                        }
                    }else{
                        $id_exists = false;
                        $_SESSION['connecte'] = 0;
                        echo '<body class="page">
                            <div class="container err-msg">
                            <img src="dngr.png"></img>
                            <br>
                            <h1>Le mot de passe ou le mail est erroné</h1>
                            </div>
                        </body>';
                        
                        header("refresh:2,url=connexion1.php");
                    }
                }
                

            }else{
                $id_exists = false;
                $_SESSION['connecte'] = 0;
                echo '<body class="page">
                    <div class="container err-msg">
                    <img src="dngr.png"></img>
                    <br>
                    <h1>Le mot de passe ou le mail est erroné</h1>
                    </div>
                </body>';
                
                header("refresh:2,url=connexion1.php");
            }
        }else{
            echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
        }
    }
    else{
        echo '<body class="page">
        <div class="container err-msg">
        <img src="dngr.png"></img>
        <br>
        <h1> Veuillez remplir '.$err_msg.'</h1>
        </div>
    </body>';
    header("refresh:2,url=connexion1.php");
    }
?>