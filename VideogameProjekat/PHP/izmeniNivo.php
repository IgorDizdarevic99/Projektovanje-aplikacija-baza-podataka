<?php
include_once("./connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idNivoa = $_SESSION['IDNivoa'];
    $naziv = $_POST['naziv'];
    $tezina = $_POST['tezina'];
    $opis = $_POST['opis'];
    $slika = $_POST['slika'];


    $naziv = $connection->real_escape_string($naziv);
    $tezina = $connection->real_escape_string($tezina);
    $opis = $connection->real_escape_string($opis);
    $slika = $connection->real_escape_string($slika);
    $slika = './IMG/' . $slika;

    
    $query = "SELECT * FROM nivoi WHERE IDNivoa  = '$idNivoa'";
    $result = $connection->query($query);

    if ($result->num_rows == 1) 
    {
        $data = $result->fetch_object();
        
        if($data->NazivNivoa == $naziv)
        {
            die(header("Location: ../izmeniNivoForma.php?error=1"));
        }
    }
    
    $statement = $connection->prepare("UPDATE nivoi SET NazivNivoa = ? , Tezina = ? , Opis = ? , Img = ? WHERE 	IDNivoa = ? ");

    $statement->bind_param("ssssi", $naziv, $tezina, $opis, $slika, $idNivoa);

    if($statement->execute())
    {
        header("Location: ../izmeniNivoForma.php?success=1");
        exit();
    }

    else
    {
        die("Eroor: (" . $connection->errno . ") ". $connection->error);
    }
}

?>