<!DOCTYPE html>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
        <!-- CSS -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link href="chat.css" rel="stylesheet" type="text/css" />
        
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
              <button class="btn dropdown-toggle dpd btn-ent" href="parcourir.html" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="enseignement.html">Enseignement</a></li>
                <li><a class="dropdown-item" href="recherche.html">Recherche</a></li>
                <li><a class="dropdown-item" href="international.html">International</a></li>
              </ul>
          </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">RENDEZ-VOUS</a>
          </li>
          <li class="nav-item recherche">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            </form>
            <form>
              <button class="btn btn-outline-light round" type="submit">Search</button>
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="connexionC.html"><button type="button" class="btn round btn-outline-light">Connexion</button></a>
          </li>
        </ul>
      </div>
    </nav>
</header>

<body class="page">
            <!--<button type="submit" name="btn_segado" value="segado" formaction="chatP.php">Segado</button>
            <button type="submit" name="btn_hina" value="hina" formaction="chatP.php">Hina</button>-->
    <div class="container d-flex justify-content-center">
        <div class="card bg-light mt-5"> 
            <div class="d-flex flex-row justify-content-between p-3 adiv">
                <i class="fas fa-chevron-left"></i>
                    <span class="pb-3">Nom</span>
                <i class="fas fa-times"></i>
            </div>
            <div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="max-height: 300px;">
            <div class="d-flex flex-row p-3">
                <div class="chat ml-2 p-3">Hello and thankyou for visiting birdlymind. Please click the video above</div>
            </div>
        
            <div class="d-flex flex-row p-3">
                <div class="bg-white mr-2 p-3"><span class="text-muted">Hello and thankyou for visiting birdlynind.</span></div>
            </div>
                
            <div class="d-flex flex-row p-3">
                <div class="chat ml-2 p-3"><span class="text-muted dot">. . .</span></div>
            </div>

            <div class="d-flex flex-row p-3">
                <div class="bg-white mr-2 p-3"><span class="text-muted">Hello and thankyou for visiting birdlynind.</span></div>
            </div>

            <div class="d-flex flex-row p-3">
                <div class="chat ml-2 p-3">Hello and thankyou for visiting birdlymind. Please click the video above</div>
            </div>

            </div>
            
            <div class="form-group px-3">
                <textarea class="form-control" rows="5" placeholder="Type your message"></textarea>
            </div>

        </div>
    </div>
</body>

</html>

<?php
    
    //Pour récupérer l'id de l'élève sur la page "chat.php"
    session_start();
    $value = $_SESSION['chat'];
    $valueP = $_SESSION['chatP'];

    //Connection BBD
    /*accès Solène et Anais
    $mysqli = new mysqli("localhost","root","","chatbox");*/
    
    /*accès Charlotte*/
    $mysqli = new mysqli("localhost","root","root","chatbox");
    if($mysqli -> connect_errno)
    {  //Si la connection est fausse
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
  
    if(isset($_POST['btn_Segado']) && $_POST['btn_Segado']=="Segado")
    {
        echo "seg";
        $sql = "SELECT * FROM profs WHERE Nom='Segado'";

        if (mysqli_query($mysqli, $sql)) 
        {
            if($result = $mysqli ->query($sql))
            {
                if($result -> num_rows >0)
                {
                    while($row = $result -> fetch_row() )
                    {
                        $id = $row[0];
                        $_SESSION['chatP'] = $id;
                        echo "ID : " .$id. "<br/>";
                        echo "Nom : " . $row[1] . "<br/>";
                    }   
                }
                else 
                {
                    echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
                    header("refresh:2,url=chat.html");
                }
            }
            header("refresh:2,url=message.html");
        }
    }else{
        echo "non";
    }

    //POUR HINA
    if(isset($_POST['btn_Hina']) && $_POST['btn_Hina']=="Hina")
    {
        $sql = "SELECT * FROM profs WHERE Nom='Hina'";

        if (mysqli_query($mysqli, $sql)) 
        {
            if($result = $mysqli ->query($sql))
            {
                if($result -> num_rows >0)
                {
                    while($row = $result -> fetch_row() )
                    {
                        $id = $row[0];
                        $_SESSION['chatP'] = $id;
                        echo "ID : " .$id. "<br/>";
                        echo "Nom : " . $row[1] . "<br/>";
                    }   
                }
                else 
                {
                    echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
                    header("refresh:2,url=chat.html");
                }
            }
            header("refresh:2,url=message.html");
        }
    }
    //Recupère le message envoyé par utilisateur
    $message = isset($_POST['message'])?$_POST['message']:'';
    
    //Si on envois le message
    if(isset($_POST['btn_soumettre']) && $_POST['btn_soumettre']=="soumettre")
    {
        //INSERER LES INFO VOULU DANS LA BDD
        
        $sql = "INSERT INTO `messages`(`Message`, `Date`,`ID_eleves`,`ID_Profs`  ) VALUES ('$message',NOW(),'$value','$valueP')";
        
        if (mysqli_query($mysqli, $sql)) 
        {
            //AFFICHER TOUS LES MESSAGES DU CHAT DU PROF ET DE L'ELEVE CORRESPONDANT
            $sql1 = "SELECT Message,Date  FROM  messages WHERE ID_eleves='$value' AND ID_profs='$valueP'";

            if($result = $mysqli ->query($sql1))
            {
                if($result -> num_rows >0)
                {
                    while($row = $result -> fetch_row() )
                    {   
                        echo "Message : " .$row[0] . "<br/>";
                        echo "Heure d'envois du message : " .$row[1] . "<br/>";
                    }   
                }
            }
            header("refresh:5,url=index.html");
        }
        else 
        {
            echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
            header("refresh:10,url=message.html");
        }
        
    }
?>