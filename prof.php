<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="prof.css" rel="stylesheet" type="text/css" />
  
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
              <button class="btn dropdown-toggle btn-ent dpd" href="parcourir.html" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="enseignement.php">Enseignement</a></li>
                <li><a class="dropdown-item" href="recherche.html">Recherche</a></li>
                <li><a class="dropdown-item" href="international.php">International</a></li>
              </ul>
          </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="enseignement.php">RENDEZ-VOUS</a>
          </li>
          <li class="nav-item recherche">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="utilisateur.html"><button type="button" class="btn round btn-outline-light">Connexion</button></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <body class="page">
    <div class="container fiche">
        <div class="row haut">
            <div class="col-4">
</html>

<?php

 session_start();

 $mysqli = new mysqli("localhost","root","root","omnes");
 //$mysqli = new mysqli("localhost","root","","omnes");
    
 if($mysqli -> connect_errno)
 {   //Si la connexion echoue
     echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
     exit();
 }

 $id = $_SESSION['choixprof'];
 //$id = 1;

 $sql = "SELECT * FROM `Profs` WHERE ID = $id";
 if(mysqli_query($mysqli, $sql)){
     if($result = $mysqli ->query($sql)){
         if($result->num_rows>0){
             while($row = $result->fetch_row()){

                 $_SESSION['idProfCal']=$row[0];
                 echo '<img src="'.$row[9].'" class="img-prof" alt="p1"></a>
                 </div>
                 <div class="col-8">
                     <br>
                     <h1>'.$row[2]." ".$row[1].'</h1>
                     <p>💻 Département '.$row[3].'</p>
                     <p>Salle '.$row[8].'</p>
                 </div>
             </div>
             <div>
             <form method="post">
                 <button type="submit" class="btn round btn-outline-success" formaction="/couton_garnier_wagner/Calendrier/Public/index.php">Rendez-vous</button>
             </form>
                 </div>
             <br>
             <div class="row">
                 <div class="col-12">
                     <p>Téléphone : '.$row[7].'</p>
                 </div>
             </div>
             <div class="row">
                 <div class="col-12">
                     <p>Email : '.$row[4].'</p>
                 </div>
             </div>';//name="btn_'.$row[0].'" value="'.$row[0].'"

                if($row[6] != 0){
                    $sql2 = "SELECT * FROM `Chercheurs` WHERE ID = $row[6]";

                    if(mysqli_query($mysqli, $sql2)){
                        if($result2 = $mysqli ->query($sql2)){
                            if($result2->num_rows>0){
                                while($row2 = $result2->fetch_row()){
                                    echo ' Chercheur en '. $row2[1];
                                }
                            }
                        }
                    }


                }

               echo ' </div>';
             }
         }
     }
 }
?>


  <!--              
-->
<html>
<div class="chat">
    <a href="chat.php"><img src="chat.png" alt="chat" width="150"></a>
</div>
</body>

<footer id="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-3 adresse">
          <div>
            <p>37 quai de Grenelle - 75015 - Paris</p>
            <!--Google map-->
            <div class="map-container">
              <iframe src="https://maps.google.com/maps?q=ECE_Paris_Lyon&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                style="border:0" allowfullscreen></iframe>
            </div>
            <!--Google Maps-->
          </div>
        </div>
          <div class="col-3 cont">
            <h1>CONCU PAR</h1>
            <p>Charlotte Couton - Solène Garnier - Anaïs Wagner</p>
            <p>Étudiantes à l'ECE Paris</p>
            <p id="copy">Copyright &copy; 2021 omnes education</p>
          </div>
        
        <div class="col-3 cont-elem">
          <a href="mailto:omnes.education@gmail.com" class="designmail">omnes.education@gmail.com</a>
          <div class="res">
            <a class="nav-link" href="https://www.instagram.com/omneseducationgroup/?hl=fr"><img src="Accueil/insta.png" class="logo" alt="insta"></a>
            <a class="nav-link" href="https://www.youtube.com/c/OMNESEducation"><img src="Accueil/ytb.png" class="logo" alt="ytb"></a>
            <a class="nav-link" href="https://www.facebook.com/omneseducationgroup"><img src="Accueil/fb.png" class="logo" alt="fb"></a>
            <a class="nav-link" href="https://twitter.com/omneseducation_?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img src="Accueil/twt.png" class="logo" alt="twt"></a>
            <a class="nav-link" href="https://www.linkedin.com/school/omneseducation/"><img src="Accueil/lkd.png" class="logo" alt="lkd"></a>
          </div><br>
        </div>
  
        <div class="col-2 rej">
          <p>Convaincus? Rejoignez-nous</p>
          <a class="nav-link" href="utilisateur.html"><button type="button" class="btn round btn-outline-light">Inscription</button></a>
        </div>
        
      </div>
    </div>
  </footer>
</html>