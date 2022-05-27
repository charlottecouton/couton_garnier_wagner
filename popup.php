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
  
  <!--javascript-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>  <link href="style.css" rel="stylesheet" type="text/css" />
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
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
          <form>
            <a class="nav-link" id="bnt_accueil" href="index.html">ACCUEIL</a>
          </form>
        </li>
        <li class="nav-item">
          <div class="dropdown pdropdown">
            
            <!--ouvrir la page parcourir-->
            <a class="nav-link" aria-current="page" href="parcourir.html">PARCOURIR</a>
            
            <!--menu déroulant-->
            <button class="btn dropdown-toggle dpd btn-ent" href="parcourir.html" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
          
          <div class = "test">
            <input class="form-control me-2 input" type="search" id = "searchInput" placeholder="Search" aria-label="Search">
            <div id = "suggestion"></div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="utilisateur.html"><button type="button" class="btn round btn-outline-light">Connexion</button></a>
        </li>
      </ul>
    </div>
  </nav>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src = "barre_de_recherche.js"></script>
</header>

<body class="page">

  <script>/*
    document.setTimeout(Swal.fire({
            title: 'Un ptit creux ?',
            text: 'Prenez donc un cookie pour le goûter !',
            imageUrl: 'https://www.pngmart.com/files/4/Cookies-PNG-Transparent-Image.png',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            footer: '<a href="">Passons à la suite de la présentation</a>',
        }),1000);*/

        document.getElementById("bnt_accueil").addEventListener("click",
                Swal.fire({
                    title: 'Un ptit creux ?',
                    text: 'Prenez donc un cookie pour le goûter !',
                    imageUrl: 'Accueil/cookies.png', //'https://www.pngmart.com/files/4/Cookies-PNG-Transparent-Image.png',
                    imageWidth: 300,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                    showCancelButton: true,
                    cancelButtonColor: '#d33',
                    //footer: '<a href="">Passons à la suite de la présentation</a>',
                })
            );
    
  </script>

  <div class="container message">
    <div class="row">
      <div class="col-12">
        <p>
        <p id="bienvenue">BIENVENUE</p> ...sur la plateforme Omnes Education!
        <br>
        Leader de l’enseignement supérieur privé, OMNES Education forme chaque année 35000 étudiants et 2000 cadres en
        formation continue.
        <br>
        Prenez RDV avec nos professeurs spécialisés dans les domaines qui vous intéressent!
        </p>
      </div>
    </div>
  </div>

  <div class="container actus">
    <div class="row">
      <div class="col-4">
        <div class="card" style="width: 20rem;">
          <img src="Accueil/jpo.png" class="card-img-top" alt="jpo">
          <div class="card-body">
            <h1>Journée portes ouvertes sur notre campus 👨‍🎓</h1>
            <p class="card-text">Venez rencontrer nos professeurs spécialisés et discuter avec nos étudiants lors de cet
              évenement convivial au coeur de notre campus.</p>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">📍 10 rue Sextius Michel - Paris 15</li>
              <li class="list-group-item">⏰ 27 Mai 2022 à 10:00</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card" style="width: 20rem;">
          <img src="Accueil/sem.png" class="card-img-top" alt="jpo">
          <div class="card-body">
            <h1>Séminaire de recherche 🔍</h1>
            <p class="card-text">Venez assister à un séminaire de recherche sur l'Intelligence artificielle tenu par nos
              étudiants.</p>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">📍 37 quai de Grenelle - Paris 15</li>
              <li class="list-group-item">⏰ 30 Mai 2022 à 19:00</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card" style="width: 20rem;">
          <img src="Accueil/inter.png" class="card-img-top" alt="jpo">
          <div class="card-body">
            <h1>Conférence international 🌎</h1>
            <p class="card-text">Venez découvrir les formations diplomantes à l'international proposées par votre école.
              Rencontrez toute l'équipe International et planifiez votre expérience étudiante à l'étranger.
            </p>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">📍 37 quai de Grenelle - Paris 15</li>
              <li class="list-group-item">⏰ 02 Juin 2022 à 15:00</li>
            </ul>
          </div>
        </div>
      </div>
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