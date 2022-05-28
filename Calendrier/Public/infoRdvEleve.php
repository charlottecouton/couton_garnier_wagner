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

    $sql = "SELECT Nom FROM `Etudiants` ";
    
    mysqli_query($mysqli, $sql);
    $result = $mysqli->query($sql);
    $row_cnt = $result->num_rows;

    if($row_cnt >0){
        while($row = $result -> fetch_row() )
        {   //echo isset($_POST['btn_'.$row[0]] && $_POST['btn_'.$row[0]] == $row[0]);
            if(isset($_POST['btn_'.$row[0]]) && $_POST['btn_'.$row[0]] == $row[0]){
                $nom=$row[0];
            }
        }
    }

    echo '<div class="container">';
    
    $sql1 = "SELECT * FROM `Etudiants` WHERE Nom = '$nom'";

    mysqli_query($mysqli, $sql1);
    $result1 = $mysqli->query($sql1);
    $row_cnt1 = $result1->num_rows;

    if($row_cnt1 >0){
        while($row1 = $result1 -> fetch_row() )
        {
            echo 'Nom : '.$row1[1] .'<br/>';
            echo 'Prenom : '.$row1[2].'<br/>';
            echo 'Mail : '.$row1[9].'<br/>';
        }
    }

    $idrdv = $_SESSION['idRDV'];
    $sql3 = "SELECT ID FROM `events`";
    
    if(mysqli_query($mysqli, $sql3)){
        $result3 = $mysqli->query($sql3);
            $row_cnt3 = $result3->num_rows;

            if($row_cnt3 >0){
                while($row3 = $result3 -> fetch_row() )
                {
                    if(isset($_POST['btn_'.$row3[0]])){
                        $idrdv = $row3[0];
                    }
                }
            }
    }else {
        echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
    }

    $sql2 = "SELECT * FROM `events` WHERE ID = $idrdv";
    if(mysqli_query($mysqli, $sql2)){
        $result2 = $mysqli->query($sql2);
            $row_cnt2 = $result2->num_rows;

            if($row_cnt2 >0){
                while($row2 = $result2 -> fetch_row() )
                {
                    echo 'Message : '.$row2[1].'<br>';
                    echo 'Heure de debut : '.$row2[2].'<br>';
                    echo 'Heure de fin : '.$row2[3].'<br><br>';
                }
            }
    }else {
        echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
    }

    
    
?>

<form method="post">
    <button type="submit" class="rdv btn btn-outline-danger" formaction="http://localhost/couton_garnier_wagner/index.php">Retour</button>
</form>

</div>