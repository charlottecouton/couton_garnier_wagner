<?php 
  require '../couton_garnier_wagner/Calendrier/views/header.php';
  //require '../Calendrier/views/header.php';
?>
<body class="page">
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <form class="formulaire" method="post">
                    <h1>Inscription</h1>
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="prenom">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Adresse ligne 1</label>
                        <input type="text" class="form-control" name="ad1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Adresse ligne 2</label>
                        <input type="text" class="form-control" name="ad2">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ville</label>
                        <input type="text" class="form-control" name="ville">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Code Postal</label>
                        <input type="text" class="form-control" name="cp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pays</label>
                        <input type="text" class="form-control" name="pays">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" name="tel">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="mdp">
                    </div>
                    <button type="submit" class="btn btn-co round btn-outline-light" value="ins" name="btn-ins" formaction="inscription.php">Inscription</button>
                  </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    
    <?php 
  require '../couton_garnier_wagner/Calendrier/views/footer.php';
  //require '../Calendrier/views/footer.php';
?>



<!--<form action = "inscription.php" method = "post">
            <div>Nom</div><input name ="nom" type = "text"><br/>
            <div>Prenom</div><input name ="prenom" type = "text"><br/>
            <div>Email</div><input name ="mail" type = "email"><br/>
            <div>Mot de Passe </div><input name ="mdp" type = "password"><br/>
            <button type = "submit">Valider</button>
        </form>-->