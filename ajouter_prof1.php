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
                        <label class="form-label">Spécialité</label>
                        <input type="text" class="form-control" name="spe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Chercheur ? (1 si oui 0 sinon)</label>
                        <input type="number" class="form-control" name="id_c">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Laboratoire de recherche</label>
                        <input type="text" class="form-control" name="labo">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bureau</label>
                        <input type="text" class="form-control" name="bureau">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" name="tel">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nom de la photo</label>
                        <input type="text" class="form-control" name="photo">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="mdp">
                    </div>
                    <button type="submit" class="btn btn-co round btn-outline-light" value="ins" name="btn-ins" formaction="ajouter_prof.php">Ajouter l'enseignant</button>
                    <button type="reset" class="btn btn-co round btn-outline-light" value="ins" name="btn-ins">Effacer</button>

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