<!DOCTYPE html>

<html>

<body>
    <form  method="post">
        <h1>Envoyer un message à </h1>
    </form>
</body>

</html>

<?php
    session_start();
    /*accès Solène et Anais
    $mysqli = new mysqli("localhost","root","","chatbox");*/
    
    /*accès Charlotte*/
    $mysqli = new mysqli("localhost","root","root","chatbox");
    if($mysqli -> connect_errno)
    {   //SI CONNECTION ECHOUE
        echo "Failed to connect to MySQL : " . $mysqli -> connect_error;
        exit();
    }

    $sql = "SELECT Nom FROM profs";
    if(mysqli_query($mysqli, $sql)){

        if($result = $mysqli ->query($sql)){
            if($result->num_rows>0){
                while($row = $result->fetch_row()){
                                echo
                                '<button type="submit" name="btn_'.$row[0].'" value="'.$row[0].'" formaction="message.php">'.$row[0].'</button>';
                }
            }
        }
    }
?>