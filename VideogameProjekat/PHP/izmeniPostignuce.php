<?php
include_once("./connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idPostignuca = $_SESSION['IdPostignuca'];
    $naziv = $_POST['naziv'];
    $opis = $_POST['opis'];
    $slika = $_POST['slika'];


    $naziv = $connection->real_escape_string($naziv);
    $opis = $connection->real_escape_string($opis);
    $slika = $connection->real_escape_string($slika);
    $slika = './IMG/' . $slika;


    $query = "SELECT * FROM postignuca WHERE IdPostignuca  = '$idPostignuca'";
    $result = $connection->query($query);

    if ($result->num_rows == 1) 
    {
        $data = $result->fetch_object();
        
        if($data->NazivPostignuca == $naziv)
        {
            die(header("Location: ../izmeniPostignuceForma.php?error=1"));
        }
    }

    $statement = $connection->prepare("UPDATE postignuca SET NazivPostignuca = ? , Opis = ? , Img = ? WHERE IdPostignuca = ? ");

    $statement->bind_param("sssi", $naziv, $opis, $slika, $idPostignuca);

    if($statement->execute())
    {
        header("Location: ../izmeniPostignuceForma.php?success=1");
        exit();
    }

    else
    {
        die("Eroor: (" . $connection->errno . ") ". $connection->error);
    }
}

?>