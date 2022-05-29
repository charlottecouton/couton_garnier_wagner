<!--SOURCE : https://www.youtube.com/watch?v=t0s7ycR1Ib8-->
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/couton_garnier_wagner/Calendrier/Public/css/calendar.css">
    <!--<link rel="stylesheet" href="couton_garnier_wagner/couton_garnier_wagner/Calendrier/Public/css/calendar.css">-->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title>Omnes Scolaire</title>
    <link rel="icon" type="image/png" sizes="16x16" href="Accueil/logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="chat.css" rel="stylesheet" type="text/css" />
    <link href="connexion.css" rel="stylesheet" type="text/css" />
    <link href="enseignement.css" rel="stylesheet" type="text/css" />
    <link href="international.css" rel="stylesheet" type="text/css" />
    <link href="parcourir.css" rel="stylesheet" type="text/css" />
    <link href="prof.css" rel="stylesheet" type="text/css" />
    <link href="recherche.css" rel="stylesheet" type="text/css" />

    <!--javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="page">
    <!--header avec le logo Omnes education-->
    <nav class="navbar navbar-expand-lg entete">
        <!--Container fluid pour que la section prenne la totalité de la page-->
        <div class="container-fluid">
            <!--logo omnes-->
            <a class="navbar-brand" href="/couton_garnier_wagner/index.php"><img src="Accueil/logo.png" alt="logo" width="250" height="75"></a>
           <!-- <a class="navbar-brand" href="/couton_garnier_wagner/couton_garnier_wagner/index.php"><img src="Accueil/logo.png" alt="logo" width="250" height="75"></a>-->
            <!--barre de navigation-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 navigation">
                <li class="nav-item">
                    <form>
                        <a class="nav-link" id="bnt_accueil" href="index.php">ACCUEIL</a>
                    </form>
                </li>
                <li class="nav-item">
                    <div class="dropdown pdropdown">

                        <!--ouvrir la page parcourir-->
                        <!--<a class="nav-link" aria-current="page" href="parcourir.html">PARCOURIR</a>-->
                        <a class="nav-link" aria-current="page" href="acces_membre.php?test=parcourir">PARCOURIR</a>

                        <!--menu déroulant-->
                        <!--<button class="btn dropdown-toggle dpd btn-ent" href="parcourir.html" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        </button>-->
                        <button class="btn dropdown-toggle dpd btn-ent" href="acces_membre.php?test=parcourir" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></button>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <!--<li><a class="dropdown-item" href="enseignement.php">Enseignement</a></li>
                            <li><a class="dropdown-item" href="recherche.html">Recherche</a></li>
                            <li><a class="dropdown-item" href="international.php">International</a></li>-->
                            <li><a class="dropdown-item" href="acces_membre.php?test=enseignement">Enseignement</a></li>
                            <li><a class="dropdown-item" href="acces_membre.php?test=recherche">Recherche</a></li>
                            <li><a class="dropdown-item" href="acces_membre.php?test=international">International</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="acces_membre.php?test=rdv">RENDEZ-VOUS</a>
                </li>
                <li class="nav-item recherche">

                    <div class="test">
                        <input class="form-control me-2 input" type="search" id="searchInput" placeholder="Search" aria-label="Search">
                        <!--<input class="input" id = "searchInput" type = "text" placeholder = "Nom ou Spécialité ou Etablissement"/>-->
                        <div id="suggestion"></div>
                    </div>
                </li>
                <li class="nav-item">
                    <form method="post">
                        <button class="btn round btn-outline-light" type="submit" name="btn_compte" value="compte" formaction="voir_compte.php">Compte</button>
                    </form>'
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="utilisateur1.php"><button type="button" class="btn round btn-outline-light">Connexion</button></a>
                    <a class="nav-link" href="deconnexion.php"><button type="button" class="btn round btn-outline-light">Deconnexion</button></a>
                </li>
            </ul>
            <div id=" affichageTest"></div>
        </div>
    </nav>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="barre_de_recherche.js"></script>