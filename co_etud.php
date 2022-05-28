<?php
  require '../couton_garnier_wagner/Calendrier/views/header.php';
  //require '../Calendrier/views/header.php';
?>

<body class="page">
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
              <form class="formulaire"  method = "post">
                    <h1>Connexion</h1>
                    
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" name="id" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                      <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-co round btn-outline-light" name="btn-co" formaction = "connexion.php" value="co">Connexion</button>
                    
                    <br><br>
                    <p>Vous n'avez pas encore de compte ? Inscrivez-vous!</p>
                    <button type="submit" class="btn btn-co round btn-outline-light" name="btn-ins" formaction = "inscription1.php" value="ins">Inscription</button>
                    <button type="submit" class="btn btn-co round btn-outline-light" name="btn-bck" formaction = "utilisateur1.php" value="back">Retour</button>

                  </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    
</body>

<?php 
  require '../couton_garnier_wagner/Calendrier/views/footer.php';
  //require '../Calendrier/views/footer.php';
?>
</html>