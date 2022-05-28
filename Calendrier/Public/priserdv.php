<?php
    session_start();
    require '../views/header2.php';

    ////CONNEXION À LA BDD////
    //accès Charlotte
    $mysqli = new mysqli("localhost","root","root","omnes");
    //accès Anaïs et Solène
    //$mysqli = new mysqli("localhost","root","","omnes");

    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //Fomulaire pour remplir bdd envoyé a motif.php
    echo '<div class="container">
    <form method="post">
        <h1 class="titre-envoi"> Motif du rendez-vous : </h1> <br> <br> <input type="text" name="motif">
        <button type="submit" name="btn_soumettre" class="btn btn-outline-light round" value="soumettre" formaction="motif.php">Envoyer</button>
        <button class="btn btn-outline-light round" type="reset">Effacer</button>
        </form>
        
        </div>';

    //$motif = isset($_POST['motif'])?$_POST['motif']:'';

    $id = $_SESSION['idProfCal'];
    $idc = $_SESSION['chat'];
    for($month1=0;$month1<2;$month1++)
    {
        if($month1==0){
            for($month2=1;$month2<10;$month2++)
            {
            for($day1=0;$day1<=3;$day1++)
            {
                if($day1==0){
                    for($day2=1;$day2<10;$day2++)
                    {
                        for($j=0;$j<7;$j++)
                        {
                            if(isset($_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.'-'.'1'.$j]) ){

                                $heurePlusUn = $j+1;
                                $sql = "INSERT INTO `events` (`Nom`, `Start`, `End`, `ID_P`,`ID_E` ) 
                                        VALUES ('barde a patate', '2022-$month1$month2-$day1$day2 1$j:00:00', '2022-$month1$month2-$day1$day2 1$heurePlusUn:00:00', $id,$idc)"; 
                            
                                
                            //$sql3 = "SELECT Mail FROM `etudiants` INNER JOIN `events` ON etudiants.ID = events.ID_E";
                            //SELECTIONNE LE MAIL DE L ETUDIANT
                            $sqlmail = "SELECT Mail FROM `etudiants` INNER JOIN `events` WHERE etudiants.ID = events.ID_E";
                            if (mysqli_query($mysqli, $sqlmail)) 
                            {
                                if($resultmail = $mysqli ->query($sqlmail))
                                {
                                    if($resultmail -> num_rows >0)
                                    {
                                        while($rowmail = $resultmail -> fetch_row() )
                                        {
                                            $to=$rowmail[0];
                                        }  
                                    }
                                    else 
                                    {
                                        echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                                    }
                                }
                            }

                            echo "mail : ".$to;
                                
                            //$to = "inscription@provider.com";
                            $subject = "Confirmation de RDV";
                            $message = "Votre rdv du : 2022-".$month1.$month2."-".$day1.$day2." 1".$j.":00:00'";
                            $from = "solene.garnier@edu.ece.fr";
                            $headers = "From:" . $from;
                            //ENVOI LE MAIL
                            mail($to,$subject,$message,$headers);
                            echo "Mail Sent.";
                            die();
                            //Envoie la requete à la bdd
                            mysqli_query($mysqli, $sql);
                            
                            $sql2 = "SELECT ID FROM `events` WHERE Start = '2022-$month1$month2-$day1$day2 1$j:00:00'";
                            if (mysqli_query($mysqli, $sql2)) 
                            {
                                if($result = $mysqli ->query($sql2))
                                {
                                    if($result -> num_rows >0)
                                    {
                                        while($row = $result -> fetch_row() )
                                        {
                                            $_SESSION['priserdv']=$row[0];
                                        }  
                                    }
                                    else 
                                    {
                                        echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                                    }
                                }
                                //echo "Session : ".$_SESSION['priserdv'];
                            }
                            }
                        }
                    } 
                }else{
                    for($day2=0;$day2<10;$day2++){
                        for($j=0;$j<7;$j++){
                            
                            if(isset($_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.'-'.'1'.$j]) ){//&& $_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'] == $month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'
                                $heurePlusUn = $j+1;
                                $sql = "INSERT INTO `events` (`Nom`, `Start`, `End`, `ID_P`,`ID_E`) 
                                VALUES ('barde a patate', '2022-$month1$month2-$day1$day2 1$j:00:00', '2022-$month1$month2-$day1$day2 1$heurePlusUn:00:00', $id,$idc)"; 
                                //echo "Rendez-vous de : 2022-".$month1.$month2.'-'.$day1.$day2.'-'.'1'.$j.'h<br/><br/>';
                                
                                //SELECTIONNE LE MAIL DE L ETUDIANT
                            $sqlmail = "SELECT Mail FROM `etudiants` INNER JOIN `events` WHERE etudiants.ID = events.ID_E";
                            if (mysqli_query($mysqli, $sqlmail)) 
                            {
                                if($resultmail = $mysqli ->query($sqlmail))
                                {
                                    if($resultmail -> num_rows >0)
                                    {
                                        while($rowmail = $resultmail -> fetch_row() )
                                        {
                                            $to=$rowmail[0];
                                        }  
                                    }
                                    else 
                                    {
                                        echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                                    }
                                }
                            }

                            echo "mail : ".$to;

                            $subject = "Confirmation de RDV";
                            $message = "Votre rdv du : 2022-".$month1.$month2."-".$day1.$day2." 1".$j.":00:00'";
                            $from = "solene.garnier@edu.ece.fr";
                            $headers = "From:" . $from;
                            //ENVOI LE MAIL
                            mail($to,$subject,$message,$headers);
                            echo "Mail Sent.";
                            die();

                                //Envoie la requete à la bdd
                                mysqli_query($mysqli, $sql);
                                $sql2 = "SELECT ID FROM `events` WHERE Start = '2022-$month1$month2-$day1$day2 1$j:00:00'";
                                if (mysqli_query($mysqli, $sql2)) 
                                {
                                    if($result = $mysqli ->query($sql2))
                                    {
                                        if($result -> num_rows >0)
                                        {
                                            while($row = $result -> fetch_row() )
                                            {
                                                $_SESSION['priserdv']=$row[0];
                                            }  
                                        }
                                        else 
                                        {
                                            echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                                            
                                        }
                                    }
                                
                                }
                            }
                        }
                     
                    }
                }
                
            }
        }
        }else{
            for($month2=0;$month2<3;$month2++)
            {
                for($day1=0;$day1<=3;$day1++)
                {
                    if($day1==0){
                        for($day2=1;$day2<10;$day2++)
                        {
                            for($j=0;$j<7;$j++)
                            {
                                if(isset($_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.'-'.'1'.$j]) ){//&& $_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'] == $month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'
                                    $heurePlusUn = $j+1;
                                    $sql = "INSERT INTO `events` (`Nom`, `Start`, `End`, `ID_P`,`ID_E`) 
                                    VALUES ('barde a patate', '2022-$month1$month2-$day1$day2 1$j:00:00', '2022-$month1$month2-$day1$day2 1$heurePlusUn:00:00', $id,1)"; 
                                
                                //SELECTIONNE LE MAIL DE L ETUDIANT
                            $sqlmail = "SELECT Mail FROM `etudiants` INNER JOIN `events` WHERE etudiants.ID = events.ID_E";
                            if (mysqli_query($mysqli, $sqlmail)) 
                            {
                                if($resultmail = $mysqli ->query($sqlmail))
                                {
                                    if($resultmail -> num_rows >0)
                                    {
                                        while($rowmail = $resultmail -> fetch_row() )
                                        {
                                            $to=$rowmail[0];
                                        }  
                                    }
                                    else 
                                    {
                                        echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                                    }
                                }
                            }

                            $subject = "Confirmation de RDV";
                            $message = "Votre rdv du : 2022-".$month1.$month2."-".$day1.$day2." 1".$j.":00:00'";
                            $from = "solene.garnier@edu.ece.fr";
                            $headers = "From:" . $from;
                            //ENVOI LE MAIL
                            mail($to,$subject,$message,$headers);
                            echo "Mail Sent.";
                            die();

                            echo "mail : ".$to;

                                //Envoie la requete à la bdd
                                mysqli_query($mysqli, $sql);
                                $sql2 = "SELECT ID FROM `events` WHERE Start = '2022-$month1$month2-$day1$day2 1$j:00:00'";
                            if (mysqli_query($mysqli, $sql2)) 
                            {
                                if($result = $mysqli ->query($sql2))
                                {
                                    if($result -> num_rows >0)
                                    {
                                        while($row = $result -> fetch_row() )
                                        {
                                            $_SESSION['priserdv']=$row[0];
                                        }  
                                    }
                                    else 
                                    {
                                        echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                                        
                                    }
                                }
                                echo "Session : ".$_SESSION['priserdv'];
                               
                            }
                                }
                            }  
                        } 
                    }else{
                        for($day2=0;$day2<10;$day2++)
                        {
                            for($j=0;$j<7;$j++)
                            {   
                                if(isset($_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.'-'.'1'.$j]) ){//&& $_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'] == $month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'
                                    $heurePlusUn = $j+1;
                                    $sql = "INSERT INTO `events` (`Nom`, `Start`, `End`, `ID_P`,`ID_E`) 
                                            VALUES ('barde a patate', '2022-$month1$month2-$day1$day2 1$j:00:00', '2022-$month1$month2-$day1$day2 1$heurePlusUn:00:00', $id,1)"; 
                                    
                                    //SELECTIONNE LE MAIL DE L ETUDIANT
                            $sqlmail = "SELECT Mail FROM `etudiants` INNER JOIN `events` WHERE etudiants.ID = events.ID_E";
                            if (mysqli_query($mysqli, $sqlmail)) 
                            {
                                if($resultmail = $mysqli ->query($sqlmail))
                                {
                                    if($resultmail -> num_rows >0)
                                    {
                                        while($rowmail = $resultmail -> fetch_row() )
                                        {
                                            $to=$rowmail[0];
                                        }  
                                    }
                                    else 
                                    {
                                        echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                                    }
                                }
                            }

                            $subject = "Confirmation de RDV";
                            $message = "Votre rdv du : 2022-".$month1.$month2."-".$day1.$day2." 1".$j.":00:00'";
                            $from = "solene.garnier@edu.ece.fr";
                            $headers = "From:" . $from;
                            //ENVOI LE MAIL
                            mail($to,$subject,$message,$headers);
                            echo "Mail Sent.";
                            die();

                            echo "mail : ".$to;

                                //Envoie la requete à la bdd
                                mysqli_query($mysqli, $sql);
                                
                                $sql2 = "SELECT ID FROM `events` WHERE Start = '2022-$month1$month2-$day1$day2 1$j:00:00'";
                                    if (mysqli_query($mysqli, $sql2)) 
                                    {
                                        if($result = $mysqli ->query($sql2))
                                        {
                                            if($result -> num_rows >0)
                                            {
                                                while($row = $result -> fetch_row() )
                                                {
                                                    $_SESSION['priserdv']=$row[0];
                                                }  
                                            }
                                            else 
                                            {
                                                echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
                                            }
                                        }
                                        echo "Session : ".$_SESSION['priserdv'];
                                    }
                                }
                            }
                        }
                    }
                } 
            }
        }
    }                       
?>