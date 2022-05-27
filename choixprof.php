<?php
    session_start();

    $mysqli = new mysqli("localhost","root","","omnes");
    //$mysqli = new mysqli("localhost","root","root","omnes");

    if($mysqli -> connect_errno)
    {
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $sql = "SELECT Nom FROM Profs ";

    if(mysqli_query($mysqli, $sql)){
        if($result = $mysqli ->query($sql)){
            if($result->num_rows>0){
                
                while($row = $result->fetch_row()){

                    if(isset($_POST['btn_'.$row[0]]) && $_POST['btn_'.$row[0]]==$row[0]){
                        
                        $sql2 = "SELECT ID FROM Profs WHERE Nom = '$row[0]'";
                        
                        if(mysqli_query($mysqli, $sql2)){
                            
                            if($result2 = $mysqli ->query($sql2)){
                                
                                if($result2->num_rows>0){
                                    while($row2 = $result2->fetch_row()){
                                        
                                        $_SESSION['choixprof'] = $row2[0];
                                    }
                                }else{
                                    echo "aucun resultat";
                                }
                            }
                        }

                        break;
                    }
                    
                }
            }
        }
    }else{
        echo "Erreur : " . $sql . "<br>" . mysqli_error($mysqli);
    }

    header("refresh:0,url=prof.php");
?>