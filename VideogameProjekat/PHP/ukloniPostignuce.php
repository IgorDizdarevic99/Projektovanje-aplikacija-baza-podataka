<?php
include_once("./connection.php");
session_start();

//if ($_SERVER["REQUEST_METHOD"] == "POST") 
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if(isset($_GET['id'])){
            
        $postignuceIDValue = (int)$_GET['id'];
        //$_SESSION['IdPostignuca'] = $postignuceIDValue;

        $statement = $connection->prepare("DELETE FROM postignuca WHERE IdPostignuca = ? ");

        $statement->bind_param("i", $postignuceIDValue);

        if($statement->execute())
        {
            header("Location: ../prikazNalogaAdminPostignuca.php?success=1");
            exit();
        }

        else
        {
            die("Eroor: (" . $connection->errno . ") ". $connection->error);
        }

    }

    ///////////////////////////////////////////////// drugi način za primanje vrednosti

    /*if(isset($_POST['postignuceIDBtn'])){
        $postignuceIDValue = (int)$_POST['postignuceID'];
        //$_SESSION['IDPostignuca'] = $postignuceIDValue;

        $statement = $connection->prepare("DELETE FROM postignuca WHERE IdPostignuca = ? ");

        $statement->bind_param("i", $postignuceIDValue);

        if($statement->execute())
        {
            header("Location: ../prikazNalogaAdminPostignuca.php");
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