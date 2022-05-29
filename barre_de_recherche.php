<?php
    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes-1");
    
    if($mysqli -> connect_errno)
    {
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //session_start();


    if(isset($_GET['user'])){ // si ya variable ajax est vide

        $info = (String)trim($_GET['user'])."%";
        $req = $mysqli->prepare("SELECT Nom FROM Profs WHERE Nom LIKE ? OR Spe LIKE ? LIMIT 10");

       // select nom from prof where nom
//REGARDER POUR FAIRE TOUTE LES RECHERCHES !!!!!!!!!!!!!!!!!!!

        $req->bind_param("ss",$info,$info);

        $req->execute();
        //$req->bind_result($nom);
        
        $result = $req->get_result();
        //$req = $req->fetchALL(); //rechercher toutes les info quils vont nous proposer

        //$req->fetch();
        if($result -> num_rows >0){
            foreach($result as $row){
                ?>
                <div id="suggestion">
                    <a class="dropdown-item" href="choixprof.php?choix=<?= $row['Nom']?>"><?= $row['Nom']?></a>  
                </div>
                <?php 
            }
        }
        else{
            ?>
                <div id="suggestion">
                    <a class="dropdown-item">Pas de resultat à votre recherche</a>
                              
                </div>
            <?php 
        }

    }
?>