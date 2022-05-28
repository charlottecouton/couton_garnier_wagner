<?php
    session_start();

    //$mysqli = new mysqli("localhost","root","","omnes");
    $mysqli = new mysqli("localhost","root","root","omnes");

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
                
                while($row = $result->fetch_assoc()) {
                    
                    $id=$row["ID"];
                    $_SESSION['chat'] = $id;
                    $_SESSION['connecte'] = 1;
                    header("refresh:0,url=index.php");
                }
                //$passwordVerify = password_verify($password, $row["Mdp"]);
                           
                            /*if($passwordVerify){

                                    $id_exists = true;
                                    echo"true";
                }*/

            }else{
                $id_exists = false;
                $_SESSION['connecte'] = 0;
                echo '<!DOCTYPE html>
                <html>
                    <head>
                        <!-- Required meta tags -->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                      
                        <!-- CSS -->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
                        <link href="style.css" rel="stylesheet" type="text/css" />
                        <link href="connexionC.css" rel="stylesheet" type="text/css" />
                        
                        <!--javascript-->
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>  <link href="style.css" rel="stylesheet" type="text/css" />
                        </head>
                    
                    <!--header avec le logo Omnes education-->
                <header>
                    <nav class="navbar navbar-expand-lg entete">
                      <!--Container fluid pour que la section prenne la totalité de la page-->
                      
                      <div class="container-fluid">
                        
                        <!--logo omnes-->
                        <a class="navbar-brand" href="index.php"><img src="Accueil/logo.png" alt="logo" width="250" height="75"></a>
                      </div>
                    </nav>
                </header>
                
                <body class="page">
                    <div class="container">
                        <div class="row message">
                                <div class="err-msg">
                                <img src="dngr.png" alt="logo" width="250">
                                <p>Le mot de passe ou le mail est incorrect<p>
                                </div>
                        </div>
                    </div>
                
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