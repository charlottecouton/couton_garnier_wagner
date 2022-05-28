<?php
    session_start();
    require '../couton_garnier_wagner/Calendrier/views/header.php';
    //require '../Calendrier/views/header.php';
    /*accès Charlotte*/
    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes-1");
    if($mysqli -> connect_errno)
    {   //Si la connexion echoue
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }    
?>

<body class="page">
    
    <div class="container titreinter">
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
        <button type="submit" class="btn  round btn-outline-success" name="btn-ins" formaction="/couton_garnier_wagner/Calendrier/Public/cal.php" value="ins">Rendez-vous</button>
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
        <div class="col-4 trans">
          <img src="Uni/europe.png" alt="europe" height="500">
        </div>
      </div>
      

      <div class="row amerique">
        <div class="col-4 trans">
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
        <div class="col-4 trans">
            <img src="Uni/asie.png" alt="am" height="400">
        </div>
      </div>

        
      
      <div class="row afrique">
        <div class="col-4 trans">
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
    <div class="chatlogo">
      <a href="chat.php"><img src="chat.png" alt="chat" width="150"></a>
    </div>

    <?php 
  require '../couton_garnier_wagner/Calendrier/views/footer.php';
  //require '../Calendrier/views/footer.php';
?>