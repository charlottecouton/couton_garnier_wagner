<?php

require '../couton_garnier_wagner/Calendrier/views/header.php';
//require '../Calendrier/views/header.php';

/*accès Charlotte*/
$mysqli = new mysqli("localhost","root","root","omnes");
//$mysqli = new mysqli("localhost", "root", "", "omnes");
if ($mysqli->connect_errno) {  //Si la connection est fausse
  echo "Failed to connect to MySQL : " . $mysqli->connect_error;
  exit();
}
?>

<body class="page">
  <div class="container">
    <div class="row titreens">
      <h1>Choisissez un domaine</h1>
    </div>
    <div class="row depte">
      <div class="col-2">
        <div class="card mat" style="width: 15rem;">

          <img src="Enseignement/maths.png" class="img-dept" alt="jpo">
          <div class="card-body">
            <!--menu déroulant-->
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Mathématiques
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                <?php

                $sql = "SELECT Nom FROM Profs WHERE Spe = 'Mathématiques'";

                if (mysqli_query($mysqli, $sql)) {
                  if ($result = $mysqli->query($sql)) {
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_row()) {
                        echo '
                  <li>
                    <form method = "post">
                        <button class="btn btn-outline-default" type="submit" name="btn_' . $row[0] . '" value="' . $row[0] . '"  formaction="choixprof.php">' . $row[0] . '</button>
                    </form>
                  </li>';
                      }
                    } else {
                      echo "Pas de professeur dans cette matière";
                    }
                    echo '</ul>';
                  }
                }

                echo '</ul>
</div>
</div>
</div>
</div>
<div class="col-2">
            <div class="card mat" style="width: 15rem;">
                <img src="Enseignement/info.png" class="img-dept" alt="jpo">
                <div class="card-body">
                    <!--menu déroulant-->
                    <div class="dropdown">
                        <button class="btn menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Informatique
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';

                $sql = "SELECT Nom FROM Profs WHERE Spe = 'Informatique'";

                if (mysqli_query($mysqli, $sql)) {
                  if ($result = $mysqli->query($sql)) {
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_row()) {
                        echo '
                  <li>
                    <form method = "post">
                        <button class="btn btn-outline-default" type="submit" name="btn_' . $row[0] . '" value="' . $row[0] . '"  formaction="choixprof.php">' . $row[0] . '</button>
                    </form>
                  </li>';
                      }
                    } else {
                      echo "Pas de professeur dans cette matière";
                    }
                    echo '</ul>';
                  }
                }
                echo '</ul>
    </div>
    </div>
    </div>
    </div>
    <div class="col-2">
    <div class="card mat" style="width: 15rem;">
        <img src="Enseignement/ssoc.png" class="img-dept" alt="jpo">
        <div class="card-body">
            <!--menu déroulant-->
            <div class="dropdown">
                <button class="btn menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                   Sciences sociales
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';

                $sql = "SELECT Nom FROM Profs WHERE Spe = 'Sciences sociales'";

                if (mysqli_query($mysqli, $sql)) {
                  if ($result = $mysqli->query($sql)) {
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_row()) {
                        echo '<li>
                                  <form method = "post">
                                      <button class="btn btn-outline-default" type="submit" name="btn_' . $row[0] . '" value="' . $row[0] . '"  formaction="choixprof.php">' . $row[0] . '</button>
                                  </form>
                                </li>';
                      }
                    } else {
                      echo "Pas de professeur dans cette matière";
                    }
                    echo '</ul>';
                  }
                }

                echo '</ul>
    </div>
    </div>
    </div>
    </div>
    <div class="col-2">
    <div class="card mat" style="width: 15rem;">
        <img src="Enseignement/elec.png" class="img-dept" alt="jpo">
        <div class="card-body">
            <!--menu déroulant-->
            <div class="dropdown">
                <button class="btn menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Electronique
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
                $sql = "SELECT Nom FROM Profs WHERE Spe = 'Electronique'";

                if (mysqli_query($mysqli, $sql)) {
                  if ($result = $mysqli->query($sql)) {
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_row()) {
                        echo '<li>
                                  <form method = "post">
                                      <button class="btn btn-outline-default" type="submit" name="btn_' . $row[0] . '" value="' . $row[0] . '"  formaction="choixprof.php">' . $row[0] . '</button>
                                  </form>
                                </li>';
                      }
                    } else {
                      echo "Pas de professeur dans cette matière";
                    }
                    echo '</ul>';
                  }
                }
                echo ' </div>
        </div>
        </div>
        </div> </div>
        <br><br>
        <div class="row depte">
        <div class="col-2">
            <div class="card mat" style="width: 15rem;">
                <img src="Enseignement/phys.png" class="img-dept" alt="jpo">
                <div class="card-body">
                    <!--menu déroulant-->
                    <div class="dropdown">
                        <button class="btn menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                           Physique
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';

                $sql = "SELECT Nom FROM Profs WHERE Spe = 'Physique'";

                if (mysqli_query($mysqli, $sql)) {
                  if ($result = $mysqli->query($sql)) {
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_row()) {
                        echo '<li>
                                          <form method = "post">
                                              <button class="btn btn-outline-default" type="submit" name="btn_' . $row[0] . '" value="' . $row[0] . '"  formaction="choixprof.php">' . $row[0] . '</button>
                                          </form>
                                        </li>';
                      }
                    } else {
                      echo "Pas de professeur dans cette matière";
                    }
                    echo '</ul>';
                  }
                }
                echo ' </div>
                            </div>
                            </div>
                            </div> 
                            <div class="col-2">
                            <div class="card mat" style="width: 15rem;">
                                <img src="Enseignement/langue.png" class="img-dept" alt="jpo">
                                <div class="card-body">
                                    <!--menu déroulant-->
                                    <div class="dropdown">
                                        <button class="btn menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Langues
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
                $sql = "SELECT Nom FROM Profs WHERE Spe = 'Langues'";

                if (mysqli_query($mysqli, $sql)) {
                  if ($result = $mysqli->query($sql)) {
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_row()) {
                        echo '
                                                          <li>
                                                          <form method = "post">
                                                            <button class="btn btn-outline-default" type="submit" name="btn_' . $row[0] . '" value="' . $row[0] . '"  formaction="choixprof.php">' . $row[0] . '</button>
                                                          </form>
                                                          </li>
                                                        ';
                      }
                    } else {
                      echo "Pas de professeur dans cette matière";
                    }
                    echo '</ul>';
                  }
                }
                ?>
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