<?php
include_once("./connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $naziv = $_POST['naziv'];
    $opis = $_POST['opis'];
    $slika = $_POST['slika'];


    $naziv = $connection->real_escape_string($naziv);
    $opis = $connection->real_escape_string($opis);
    $slika = $connection->real_escape_string($slika);
    $slika = './IMG/' . $slika;


    $query = "SELECT * FROM postignuca WHERE NazivPostignuca = '$naziv'";
    $result = $connection->query($query);

    if ($result->num_rows > 0) 
    {
        die(header("Location: ../prikazNalogaAdminDodajPostignuce.php?error=1"));
    }
    
    $statement = $connection->prepare("INSERT INTO postignuca (NazivPostignuca, Opis, Img) VALUES (?, ?, ?)");

    $statement->bind_param("sss", $naziv, $opis, $slika);

    if($statement->execute())
    {
        header("Location: ../prikazNalogaAdminDodajPostignuce.php?success=1");
        exit();
    }

    else
    {
        die("Eroor: (" . $connection->errno . ") ". $connection->error);
    }
}

?>