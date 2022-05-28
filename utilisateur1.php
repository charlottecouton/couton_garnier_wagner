<?php 
  require '../couton_garnier_wagner/Calendrier/views/header.php';
  //require '../Calendrier/views/header.php';
?>
<body class="page">
<div class="container">
    <div class="row">
        <h1 id="ve">
            Vous êtes
        </h1>
    </div>
    <div class="container choix">
    <div class="row">
        <div class="col-4">
            <div class="card" style="width: 20rem;">
                <img src="Connexion/etud.png" class="card-img-top" alt="jpo">
                <div class="card-body">
                    <form method="post">
                        <button class="btn btn-default co" type="submit" value="etudiant" name="btn_etudiant" formaction="utilisateur.php">Etudiant</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 20rem;">
                <img src="Connexion/prof.png" class="card-img-top" alt="jpo">
                <div class="card-body">
                    <form method="post">
                        <button class="btn btn-default co" type="submit" value="prof" name="btn_prof" formaction="utilisateur.php">Professeur</button>
                    </form>
                </div>
              </div>
        </div>
        <div class="col-4">
            <div class="card" style="width: 20rem;">
                <img src="Connexion/adm.png" class="card-img-top" alt="jpo">
                <div class="card-body">
                    <form method="post">
                        <button class="btn btn-default co" type="submit" value="admin" name="btn_admin" formaction="utilisateur.php">Administrateur</button>
                    </form>
                </div>
              </div>
        </div>
</div>
</div>
<?php 
  require '../couton_garnier_wagner/Calendrier/views/footer.php';
  //require '../Calendrier/views/footer.php';
?>