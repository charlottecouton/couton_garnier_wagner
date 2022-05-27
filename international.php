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
  <link href="international.css" rel="stylesheet" type="text/css" />
  
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
                <li><a class="dropdown-item" href="#">International</a></li>
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
  
<?php
    session_start();
    /*accès Charlotte*/
    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
    if($mysqli -> connect_errno)
    {   //Si la connexion echoue
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }    
?>

<body class="page">
    
    <div class="container titre">
        <h1>Nos universités partenaires... <br> partout dans le monde</h1>
        <p>Vivez l'expérience internationale en participant à nos programmes dans des campus situés sur les 5 continents</p>
    </div>
    <div class="container car">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="Uni/dcu.png" class="d-block w-100 img-car" alt="dcu">
                      </div>
                      <div class="carousel-item">
                        <img src="Uni/hrvrd.png" class="d-block w-100 img-car" alt="hrvrd">
                      </div>
                      <div class="carousel-item">
                        <img src="Uni/bngr.png" class="d-block w-100 img-car" alt="bngr">
                      </div>
                      <div class="carousel-item">
                        <img src="Uni/lndn.png" class="d-block w-100 img-car" alt="bngr">
                      </div>
                      <div class="carousel-item">
                        <img src="Uni/dgu.png" class="d-block w-100 img-car" alt="bngr">
                      </div>
                      <div class="carousel-item">
                        <img src="Uni/mex.png" class="d-block w-100 img-car" alt="mex">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
    </div>
    <div class="container-fluid uni">

      
    <div class="container coordonnees">
        <h1>Contactez-nous</h1>
        <p>
            Tel : +33 06 82 11 88 29 <br>
            Salle : P-346 <br>
            Mail : <a href="mailto:omnes.education@gmail.com" class="designmail">omnes.international@gmail.com</a>
        </p>

        <h1>Prenez rendez-vous</h1>

        <?php

            $sql = "SELECT * FROM Profs WHERE Nom = 'International'";
            if($result = $mysqli->query($sql)){
            
                if($result -> num_rows >0){
                    
                    while($row = $result->fetch_row()) {
                        $_SESSION['idProfCal'] = $row[0];
                    }
                }
            }
        ?>
        <form method="post">
        <button type="submit" class="btn btn-co round btn-outline-success" name="btn-ins" formaction="/couton_garnier_wagner/Calendrier/Public/index.php" value="ins">Rendez-vous</button>
        </post>
        <br><br>

    </div>
    <div class="row europe">
        <div class="col-8">
          <br><h1>🇬🇧 Royaume uni</h1>
          
          <?php
            $sql = "SELECT * FROM Inter WHERE Pays = 'Royaume Uni'";

            if($result = $mysqli->query($sql)){
            
                if($result -> num_rows >0){
                    
                    while($row = $result->fetch_row()) {
                        echo 'Universite :'.$row[1].'<br>';
                        echo 'Site web : '.$row[3].'<br><br>';//affichage du lien
                    }
                }
            }else{
                echo 'ok';
            }
          ?>

          <audio controls>
                    <source src="Audio/Hroyaume.mp3" type="audio/mpeg">
          </audio>

          
          <br><br><h1>🇮🇪 Irlande</h1>
          
          <?php
            $sql = "SELECT * FROM Inter WHERE Pays = 'Irlande'";

            if($result = $mysqli->query($sql)){
            
                if($result -> num_rows >0){
                    
                    while($row = $result->fetch_row()) {
                        
                        echo 'Universite : '.$row[1].'<br>';
                        echo 'Site web : '.$row[3].'<br><br>';//affichage du lien
                    }
                }
            }
          ?>
          <audio controls>
                     <source src="Audio/Hirlande.mp3" type="audio/mpeg" >
          </audio>

          <br><br><h1>🇸🇪 Suède</h1>
          
          <?php
            $sql = "SELECT * FROM Inter WHERE Pays = 'Suede'";

            if($result = $mysqli->query($sql)){
            
                if($result -> num_rows >0){
                    
                    while($row = $result->fetch_row()) {
                        
                        echo 'Universite - '.$row[1].'<br>';
                        echo 'Site web - '.$row[3].'<br><br>';//affichage du lien
                    }
                }
            }
          ?>
          <audio controls>
            <source src="Audio/Hsuede.mp3" type="audio/mpeg">
          </audio>

        </div>
        <div class="col-4">
          <img src="Uni/europe.png" alt="europe" height="500">
        </div>
      </div>
      

      <div class="row amerique">
        <div class="col-4">
          <img src="Uni/am.png" alt="am" height="500">
        </div>
        <div class="col-8 am">
        
        <br><br><h1>Etats-Unis 🇺🇸</h1>
        
        <?php
            $sql = "SELECT * FROM Inter WHERE Pays = 'Etats Unis'";

            if($result = $mysqli->query($sql)){
            
                if($result -> num_rows >0){
                    
                    while($row = $result->fetch_row()) {
                        
                        echo 'Universite - '.$row[1].'<br>';
                        echo 'Site web - '.$row[3].'<br><br>';//affichage du lien
                    }
                }
            }
          ?>
          <audio controls>
            <source src="Audio/Hetatunis.mp3" type="audio/mpeg">
          </audio>
        
        <br><br><h1>Canada 🇨🇦</h1>
        
        <?php
            $sql = "SELECT * FROM Inter WHERE Pays = 'Canada'";

            if($result = $mysqli->query($sql)){
            
                if($result -> num_rows >0){
                    
                    while($row = $result->fetch_row()) {
                        
                        echo 'Universite - '.$row[1].'<br>';
                        echo 'Site web - '.$row[3].'<br><br>';//affichage du lien
                    }
                }
            }
          ?>
        <audio controls>
            <source src="Audio/HCanada.mp3" type="audio/mpeg">
        </audio>

        <br><br><h1>Mexique 🇲🇽</h1>
        
        <?php
            $sql = "SELECT * FROM Inter WHERE Pays = 'Mexique'";

            if($result = $mysqli->query($sql)){
            
                if($result -> num_rows >0){
                    
                    while($row = $result->fetch_row()) {
                        
                        echo 'Universite - '.$row[1].'<br>';
                        echo 'Site web - '.$row[3].'<br><br>';//affichage du lien
                    }
                }
            }
          ?>
          <audio controls>
            <source src="Audio/Hmexique.mp3" type="audio/mpeg">
          </audio>
      </div>

      

      <div class="row asie">
            <div class="col-8">
            <br><br><h1>🇰🇷 Corée du sud</h1>
            
            <?php
                $sql = "SELECT * FROM Inter WHERE Pays = 'Coree du Sud'";

                if($result = $mysqli->query($sql)){
                
                    if($result -> num_rows >0){
                        
                        while($row = $result->fetch_row()) {
                            
                            echo 'Universite - '.$row[1].'<br>';
                            echo 'Site web - '.$row[3].'<br><br>';//affichage du lien
                        }
                    }
                }
            ?>
            <audio controls>
                <source src="Audio/Hcoree.mp3" type="audio/mpeg">
            </audio>
            
            <br><br><h1>🇹🇭 Thaïlande</h1>
            
            <?php
                $sql = "SELECT * FROM Inter WHERE Pays = 'Thailande'";

                if($result = $mysqli->query($sql)){
                
                    if($result -> num_rows >0){
                        
                        while($row = $result->fetch_row()) {
                            
                            echo 'Universite - '.$row[1].'<br>';
                            echo 'Site web - '.$row[3].'<br><br>';//affichage du lien
                        }
                    }
                }
            ?>
            <audio controls>
                <source src="Audio/Hthailande.mp3" type="audio/mpeg">
            </audio>

        </div>
        <div class="col-4">
            <img src="Uni/asie.png" alt="am" height="400">
        </div>
      </div>

        
      
      <div class="row afrique">
        <div class="col-4">
          <img src="Uni/afrique.png" alt="am" height="400">
        </div>
        <div class="col-8 af">
        <br><br><h1>Afrique du sud 🇿🇦</h1>
        
        <?php
            $sql = "SELECT * FROM Inter WHERE Pays = 'Afrique du sud'";

            if($result = $mysqli->query($sql)){
            
                if($result -> num_rows >0){
                    
                    while($row = $result->fetch_row()) {
                        
                        echo 'Universite - '.$row[1].'<br>';
                        echo 'Site web - '.$row[3].'<br><br>';//affichage du lien
                    }
                }
            }
          ?>
        <audio controls>
            <source src="Audio/Hafriquesud.mp3" type="audio/mpeg">
        </audio>
      </div>
      </div>
        

    </div>
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