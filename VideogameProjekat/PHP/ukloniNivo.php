<?php
include_once("./connection.php");
session_start();

//if ($_SERVER["REQUEST_METHOD"] == "POST") 
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if(isset($_GET['id'])){
            
        $nivoIDValue = (int)$_GET['id'];
        //$_SESSION['IDNivoa'] = $nivoIDValue;

        $statement = $connection->prepare("DELETE FROM nivoi WHERE IDNivoa = ? ");

        $statement->bind_param("i", $nivoIDValue);

        if($statement->execute())
        {
            header("Location: ../prikazNalogaAdminNivoi.php?success=1");
            exit();
        }

        else
        {
            die("Eroor: (" . $connection->errno . ") ". $connection->error);
        }

    }

    ///////////////////////////////////////////////// drugi način za primanje vrednosti

    /*if(isset($_POST['nivoIDBtn'])){

        $nivoIDValue = (int)$_POST['nivoID'];
        //$_SESSION['IDNivoa'] = $nivoIDValue;

        $statement = $connection->prepare("DELETE FROM nivoi WHERE IDNivoa = ? ");

        $statement->bind_param("i", $nivoIDValue);

        if($statement->execute())
        {
            header("Location: ../prikazNalogaAdminNivoi.php");
            exit();
        }

        else
        {
            die("Eroor: (" . $connection->errno . ") ". $connection->error);
        }

    }*/

    /////////////////////////////////////////////////  
}

?>