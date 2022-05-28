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

    $sql = "SELECT ID FROM `events`";
    
    mysqli_query($mysqli, $sql);
    $result = $mysqli->query($sql);
    $row_cnt = $result->num_rows;

    if($row_cnt >0){
        while($row = $result -> fetch_row() )
        {   //echo isset($_POST['btn_'.$row[0]] && $_POST['btn_'.$row[0]] == $row[0]);
            if(isset($_POST['btn_'.$row[0]]) && $_POST['btn_'.$row[0]] == $row[0]){
                $id = $row[0];
            }
        }
    }

    $sql2 = "DELETE * FROM `events` WHERE ID = $id";
    if(mysqli_query($mysqli, $sql)){
        $result = $mysqli->query($sql);
    }else {
        echo "Erreur : " . $sql2 . "<br>" . mysqli_error($mysqli);
    }
    

    
?>