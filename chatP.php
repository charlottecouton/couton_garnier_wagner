<?php
    session_start();
    /*accès Solène et Anais*/
    //$mysqli = new mysqli("localhost","root","","chatbox");
    
    /*accès Charlotte*/
    $mysqli = new mysqli("localhost","root","root","chatbox");
    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $sql = "SELECT Nom FROM profs";
    if(mysqli_query($mysqli, $sql)){

        if($result = $mysqli ->query($sql)){
            if($result->num_rows>0){

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
                                <link href="chat.css" rel="stylesheet" type="text/css" />
                                
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
                                <a class="navbar-brand" href="index.html"><img src="Accueil/logo.png" alt="logo" width="250" height="75"></a>
                                
                                <!--barre de navigation-->
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 navigation">
                                  <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="index.html">ACCUEIL</a>
                                  </li>
                                  <li class="nav-item">
                                    <div class="dropdown pdropdown">
                                      
                                      <!--ouvrir la page parcourir-->
                                      <a class="nav-link" aria-current="page" href="parcourir.html">PARCOURIR</a>
                                      
                                      <!--menu déroulant-->
                                      <button class="btn dropdown-toggle dpd btn-ent" href="parcourir.html" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                      </button>
                                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="enseignement.html">Enseignement</a></li>
                                        <li><a class="dropdown-item" href="recherche.html">Recherche</a></li>
                                        <li><a class="dropdown-item" href="international.html">International</a></li>
                                      </ul>
                                  </div>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#">RENDEZ-VOUS</a>
                                  </li>
                                  <li class="nav-item recherche">
                                    <form class="d-flex">
                                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                    <form>
                                      <button class="btn btn-outline-light round" type="submit">Search</button>
                                    </form>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="connexionC.html"><button type="button" class="btn round btn-outline-light">Connexion</button></a>
                                  </li>
                                </ul>
                              </div>
                            </nav>
                        </header>

                        <body class="page">';

                while($row = $result->fetch_row()){ 
                    echo '<form  method=post>
                    <button class="btn btn-ent btn-outline-light round" type="submit" name="btn_'.$row[0].'" value="'.$row[0].'" formaction="message.php">'.$row[0].'</button>';
                    echo "</form></body>";
                    $nom = $row[0];
                }
            }
        }
    }
?>