<?php 
  require '../couton_garnier_wagner/Calendrier/views/header.php';
  //require '../Calendrier/views/header.php';
?>
<body class="page">
  <div class="container-fluid ens">
      <div class="row gauche">
          <div class="col-5">
            <img src="Parcourir/enseignement.png" class="dept" alt="ens">
          </div>
          <div class="col-7">
              <h1 class="titrepar">Enseignement</h1>
              <p class="texte"> Nos enseignants exercent dans plus de dix spécialités, couvrant les domaines de l'electronique, l'informatique,
                  les sciences appliquées, les langues et les sciences sociales.
              </p>
              <a class="nav-link" href="enseignement.php"><button type="button" class="btn round btn-outline-light">Voir plus</button></a>

          </div>
      </div>
      
      <br><br>

      <div class="row droite">
            <div class="col-7">
                <h1 class="titrepar">Recherche</h1>
                <p class="texte"> Une grande partie de nos enseignants sont aussi investi dans la recherche.
                </p>
                <a class="nav-link" href="recherche.php"><button type="button" class="btn round btn-outline-light">Voir plus</button></a>

            </div>
            <div class="col-5">
            <img src="Parcourir/recherche.png" class="dept imgdroite" alt="rec">
            </div>
        </div>

        <br><br>

        <div class="row gauche">
            <div class="col-4">
              <img src="Parcourir/inter.png" class="dept" alt="ens">
            </div>
            <div class="col-8">
                <h1 class="titrepar">Relations internationales</h1>
                <p class="texte"> Omnes education propose également des formations diplomantes en partenariat avec des universités internationales.
                </p>
                <a class="nav-link" href="international.php"><button type="button" class="btn round btn-outline-light">Voir plus</button></a>
  
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

