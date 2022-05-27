<?php
session_start();
require '../views/header.php';

//Connection à la bdd
//$mysqli = new mysqli("localhost","root","root","omnes");
$mysqli = new mysqli("localhost","root","","omnes");
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
                $id=$row[0];
            }
        }
    }
    echo $id;
    $sql1 = "SELECT * FROM `Etudiants` WHERE Nom = '$id'";

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

    $sql2 = "SELECT * FROM `events` WHERE ID_E = $idrdv";
    mysqli_query($mysqli, $sql2);
    $result2 = $mysqli->query($sql2);
    $row_cnt2 = $result2->num_rows;

    if($row_cnt2 >0){
        while($row2 = $result2 -> fetch_row() )
        {
            echo 'Message : '.$row2[1];
            echo 'Heure de debut : '.$row2[2];
            echo 'Heure de fin : '.$row2[3];
        }
    }
?>