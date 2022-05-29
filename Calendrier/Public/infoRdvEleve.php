<?php
session_start();
require '../views/header2.php';

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

    $sql4 = "SELECT ID, ID_E FROM `events` ";

    mysqli_query($mysqli, $sql4);
    $result4 = $mysqli->query($sql4);
    $row_cnt4 = $result4->num_rows;

    if($row_cnt4 >0){
        while($row4 = $result4 -> fetch_row() )
        {   //echo isset($_POST['btn_'.$row[0]] && $_POST['btn_'.$row[0]] == $row[0]);
            if(isset($_POST['btn_'.$row4[0]]) && $_POST['btn_'.$row4[0]] == $row4[0]){
                
                $id=$row4[1];
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
            echo '<div class="texteinfo"> Nom : '.$row1[1] .' </p>';
            echo 'Prenom : '.$row1[2].'</p>';
            echo 'Mail : '.$row1[9].'</p>';
        }
    }

    $sql5 = "SELECT * FROM `Etudiants` WHERE ID = '$id'";

    if(mysqli_query($mysqli, $sql5)){
            $result5 = $mysqli->query($sql5);
        $row_cnt5 = $result5->num_rows;

        if($row_cnt5 >0){
            while($row5 = $result5-> fetch_row() )
            {
                echo '<div class="texteinfo"> Nom : '.$row5[1] .'</p>';
                echo 'Prenom : '.$row5[2].'</p>';
                echo 'Mail : '.$row5[9].'</p>';
            }
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
                    echo 'Message : '.$row2[1].'</p>';
                    echo ' Heure de debut : '.$row2[2].'</p>';
                    echo 'Heure de fin : '.$row2[3].'</p><br>';
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

<?php
require '../views/footer2.php';
?>