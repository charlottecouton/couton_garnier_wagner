<?php
    $mysqli = new mysqli("localhost","root","root","omnes");
    if($mysqli -> connect_errno)
    {
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //session_start();


    if(isset($_GET['user'])){ // si ya variable ajax est vide

        $info = (String)trim($_GET['user'])."%";
        $req = $mysqli->prepare("SELECT Nom FROM Profs WHERE Nom LIKE ? 
                UNION SELECT Nom FROM Etudiants WHERE Nom LIKE ? 
                /*UNION SELECT NomSalle FROM salles WHERE NomSalle LIKE ? */LIMIT 10");

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
                    <?= $row['Nom'] ?>
                </div>
                <?php 
            }
        }
        else{
            echo "<br>Pas de resultat à votre recherche<br>";
        }

    }
?>