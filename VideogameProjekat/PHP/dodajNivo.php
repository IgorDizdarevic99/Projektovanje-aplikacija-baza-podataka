<?php
include_once("./connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $naziv = $_POST['naziv'];
    $tezina = $_POST['tezina'];
    $opis = $_POST['opis'];
    $slika = $_POST['slika'];


    $naziv = $connection->real_escape_string($naziv);
    $tezina = $connection->real_escape_string($tezina);
    $opis = $connection->real_escape_string($opis);
    $slika = $connection->real_escape_string($slika);
    $slika = './IMG/' . $slika;


    $query = "SELECT * FROM nivoi WHERE NazivNivoa = '$naziv'";
    $result = $connection->query($query);

    if ($result->num_rows > 0) 
    {
        die(header("Location: ../prikazNalogaAdmin.php?error=1"));
    }
    
    $statement = $connection->prepare("INSERT INTO nivoi (NazivNivoa, Tezina, Opis, Img) VALUES (?, ?, ?, ?)");

    $statement->bind_param("ssss", $naziv, $tezina, $opis, $slika);

    if($statement->execute())
    {
        header("Location: ../prikazNalogaAdmin.php?success=1");
        exit();
    }

    else
    {
        die("Eroor: (" . $connection->errno . ") ". $connection->error);
    }
}

?>