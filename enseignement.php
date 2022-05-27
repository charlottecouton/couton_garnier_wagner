<?php

/*accès Charlotte*/
$mysqli = new mysqli("localhost","root","root","omnes");
//$mysqli = new mysqli("localhost","root","","omnes");
if($mysqli -> connect_errno)
{  //Si la connection est fausse
    echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
    exit();
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
  <link href="style.css" rel="stylesheet" type="text/css" />
  <link href="enseignement.css" rel="stylesheet" type="text/css" />
  
    <!--javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>  <link href="style.css" rel="stylesheet" type="text/css" />
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
            <a class="nav-link" aria-current="page" href="index.html">ACCUEIL</a>
          </li>
          <li class="nav-item">
            <div class="dropdown pdropdown">
              
              <!--ouvrir la page parcourir-->
              <a class="nav-link" aria-current="page" href="parcourir.html">PARCOURIR</a>
              
              <!--menu déroulant-->
              <button class="btn dropdown-toggle btn-ent dpd" href="parcourir.html" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Enseignement</a></li>
                <li><a class="dropdown-item" href="recherche.html">Recherche</a></li>
                <li><a class="dropdown-item" href="international.php">International</a></li>
              </ul>
          </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="enseignement.php">RENDEZ-VOUS</a>
          </li>
          <li class="nav-item recherche">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="utilisateur.html"><button type="button" class="btn btn-ent round btn-outline-light">Connexion</button></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

<body class="page">
<div class="container">
    <div class="row titre">
        <h1>Choisissez un domaine</h1>
    </div>
    <div class="row dept">
        <div class="col-2">
            <div class="card" style="width: 15rem;">
            
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

if (mysqli_query($mysqli, $sql)) 
    {
        if($result = $mysqli ->query($sql))
        {
            if($result -> num_rows >0)
            {
                while($row = $result -> fetch_row())
                {
                  echo '
                  <li>
                    <form method = "post">
                        <button class="btn btn-outline-default" type="submit" name="btn_'.$row[0].'" value="'.$row[0].'"  formaction="choixprof.php">'.$row[0].'</button>
                    </form>
                  </li>';
                }   
            }
            else 
            {
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
            <div class="card" style="width: 15rem;">
                <img src="Enseignement/info.png" class="img-dept" alt="jpo">
                <div class="card-body">
                    <!--menu déroulant-->
                    <div class="dropdown">
                        <button class="btn menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Informatique
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';

$sql = "SELECT Nom FROM Profs WHERE Spe = 'Informatique'";

if (mysqli_query($mysqli, $sql)) 
    {
        if($result = $mysqli ->query($sql))
        {
            if($result -> num_rows >0)
            {
                while($row = $result -> fetch_row())
                {
                  echo '
                  <li>
                    <form method = "post">
                        <button class="btn btn-outline-default" type="submit" name="btn_'.$row[0].'" value="'.$row[0].'"  formaction="choixprof.php">'.$row[0].'</button>
                    </form>
                  </li>';
                }   
            }
            else 
            {
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
    <div class="card" style="width: 15rem;">
        <img src="Enseignement/ssoc.png" class="img-dept" alt="jpo">
        <div class="card-body">
            <!--menu déroulant-->
            <div class="dropdown">
                <button class="btn menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                   Sciences sociales
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';

                $sql = "SELECT Nom FROM Profs WHERE Spe = 'Sciences sociales'";

                if (mysqli_query($mysqli, $sql)) 
                    {
                        if($result = $mysqli ->query($sql))
                        {
                            if($result -> num_rows >0)
                            {
                                while($row = $result -> fetch_row())
                                {
                                  echo '<li>
                                  <form method = "post">
                                      <button class="btn btn-outline-default" type="submit" name="btn_'.$row[0].'" value="'.$row[0].'"  formaction="choixprof.php">'.$row[0].'</button>
                                  </form>
                                </li>';
                                }   
                            }
                            else 
                            {
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
    <div class="card" style="width: 15rem;">
        <img src="Enseignement/elec.png" class="img-dept" alt="jpo">
        <div class="card-body">
            <!--menu déroulant-->
            <div class="dropdown">
                <button class="btn menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Electronique
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
                $sql = "SELECT Nom FROM Profs WHERE Spe = 'Electronique'";

                if (mysqli_query($mysqli, $sql)) 
                    {
                        if($result = $mysqli ->query($sql))
                        {
                            if($result -> num_rows >0)
                            {
                                while($row = $result -> fetch_row())
                                {
                                  echo '<li>
                                  <form method = "post">
                                      <button class="btn btn-outline-default" type="submit" name="btn_'.$row[0].'" value="'.$row[0].'"  formaction="choixprof.php">'.$row[0].'</button>
                                  </form>
                                </li>';
                                }   
                            }
                            else 
                            {
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
        <div class="row dept">
        <div class="col-2">
            <div class="card" style="width: 15rem;">
                <img src="Enseignement/phys.png" class="img-dept" alt="jpo">
                <div class="card-body">
                    <!--menu déroulant-->
                    <div class="dropdown">
                        <button class="btn menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                           Physique
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';

                        $sql = "SELECT Nom FROM Profs WHERE Spe = 'Physique'";

                        if (mysqli_query($mysqli, $sql)) 
                            {
                                if($result = $mysqli ->query($sql))
                                {
                                    if($result -> num_rows >0)
                                    {
                                        while($row = $result -> fetch_row())
                                        {
                                          echo '<li>
                                          <form method = "post">
                                              <button class="btn btn-outline-default" type="submit" name="btn_'.$row[0].'" value="'.$row[0].'"  formaction="choixprof.php">'.$row[0].'</button>
                                          </form>
                                        </li>';
                                        }   
                                    }
                                    else 
                                    {
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
                            <div class="card" style="width: 15rem;">
                                <img src="Enseignement/langue.png" class="img-dept" alt="jpo">
                                <div class="card-body">
                                    <!--menu déroulant-->
                                    <div class="dropdown">
                                        <button class="btn menu dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Langues
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
                                        $sql = "SELECT Nom FROM Profs WHERE Spe = 'Langues'";

                                        if (mysqli_query($mysqli, $sql)) 
                                            {
                                                if($result = $mysqli ->query($sql))
                                                {
                                                    if($result -> num_rows >0)
                                                    {
                                                        while($row = $result -> fetch_row())
                                                        {
                                                          echo '
                                                          <li>
                                                          <form method = "post">
                                                            <button class="btn btn-outline-default" type="submit" name="btn_'.$row[0].'" value="'.$row[0].'"  formaction="choixprof.php">'.$row[0].'</button>
                                                          </form>
                                                          </li>
                                                        ';
                                                        }   
                                                    }
                                                    else 
                                                    {
                                                        echo "Pas de professeur dans cette matière";
                                                    }
                                                    echo '</ul>';
                                                }
                                            } 
?>
                                    </div>
                                    </div>
                                    </div>
                                    </div> </div>
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
            <p>Étudiantes à l ECE Paris</p>
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