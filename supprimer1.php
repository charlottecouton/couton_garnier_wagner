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
                    <h1>Entrez l'e-mail du professeur que vous voulez supprimer</h1>
                    
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">
                    </div>
                    
                    <button type="submit" class="btn btn-co round btn-outline-light" value="ins" name="btn-ins" formaction="supprimer.php">Supprimer l'enseignant</button>
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

