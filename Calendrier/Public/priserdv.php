<?php
    session_start();
    require '../views/header.php';

    //Connection à la bdd
    $mysqli = new mysqli("localhost","root","root","omnes");
    //$mysqli = new mysqli("localhost","root","","omnes");
    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }
    //Fomulaire pour remplir bdd envoyé a motif.php
    echo '<form method="post">
        Motif du rendez-vous : <input type="text" name="motif">
        <button type="submit" name="btn_soumettre" value="soumettre" formaction="motif.php">Envoyer</button>
        <button type="reset">Effacer</button>
        </form>';

    //$motif = isset($_POST['motif'])?$_POST['motif']:'';

    $id = $_SESSION['idProfCal'];
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
                                        VALUES ('barde a patate', '2022-$month1$month2-$day1$day2 1$j:00:00', '2022-$month1$month2-$day1$day2 1$heurePlusUn:00:00', $id,1)"; 
                            
                                
                            //$sql3 = "SELECT Mail FROM `etudiants` INNER JOIN `events` ON etudiants.ID = events.ID_E";
                            
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
                    {//echo $day1.$day2."<br/>";
                    for($j=0;$j<7;$j++)
                    {//echo"H 1".$j."<br/>";
                        //echo 'btn_2022-'.$month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00';
                        if(isset($_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.'-'.'1'.$j]) ){//&& $_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'] == $month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'
                            $heurePlusUn = $j+1;
                            $sql = "INSERT INTO `events` (`Nom`, `Start`, `End`, `ID_P`,`ID_E`) 
                            VALUES ('barde a patate', '2022-$month1$month2-$day1$day2 1$j:00:00', '2022-$month1$month2-$day1$day2 1$heurePlusUn:00:00', $id,1)"; 
                            //echo "Rendez-vous de : 2022-".$month1.$month2.'-'.$day1.$day2.'-'.'1'.$j.'h<br/><br/>';
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
        }else{
            for($month2=0;$month2<3;$month2++)
            {//echo $month1.$month2.'-';
                for($day1=0;$day1<=3;$day1++)
                {//echo "-d".$day1;
                    if($day1==0){
                        for($day2=1;$day2<10;$day2++)
                        {//echo $day1.$day2."<br/>";
                            for($j=0;$j<7;$j++)
                            {//echo"H 1".$j."<br/>";
                                //echo 'btn_2022-'.$month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00';
                                if(isset($_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.'-'.'1'.$j]) ){//&& $_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'] == $month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'
                                    $heurePlusUn = $j+1;
                                    $sql = "INSERT INTO `events` (`Nom`, `Start`, `End`, `ID_P`,`ID_E`) 
                                    VALUES ('barde a patate', '2022-$month1$month2-$day1$day2 1$j:00:00', '2022-$month1$month2-$day1$day2 1$heurePlusUn:00:00', $id,1)"; 
                                    //echo "Rendez-vous de : 2022-".$month1.$month2.'-'.$day1.$day2.'-'.'1'.$j.'h<br/><br/>';
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
                            {   //echo 'btn_2022-'.$month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00';
                                if(isset($_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.'-'.'1'.$j]) ){//&& $_POST['btn_2022-'.$month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'] == $month1.$month2.'-'.$day1.$day2.' '.'1'.$j.':00:00'
                                    $heurePlusUn = $j+1;
                                    $sql = "INSERT INTO `events` (`Nom`, `Start`, `End`, `ID_P`,`ID_E`) 
                                            VALUES ('barde a patate', '2022-$month1$month2-$day1$day2 1$j:00:00', '2022-$month1$month2-$day1$day2 1$heurePlusUn:00:00', $id,1)"; 
                                    //echo "Rendez-vous de : 2022-".$month1.$month2.'-'.$day1.$day2.'-'.'1'.$j.'h<br/><br/>';
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
    require '../views/footer.php';
?>