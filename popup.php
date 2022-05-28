<?php 
  require '../couton_garnier_wagner/Calendrier/views/header.php';
  //require '../Calendrier/views/header.php';
?>
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
  
  <div class="chatlogo">
    <a href="chat.php"><img src="chat.png" alt="chat" width="150"></a>
  </div>

  <?php 
  require '../couton_garnier_wagner/Calendrier/views/footer.php';
  //require '../Calendrier/views/footer.php';
?>