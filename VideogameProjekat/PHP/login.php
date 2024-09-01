<?php

include_once ("./connection.php");
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM igraci WHERE Email = '$email' AND Sifra = '$password' ";
    $result = $connection->query($query);

    if( $result-> num_rows == 1)
    {
        $data = $result->fetch_object();
        $_SESSION["IDIgraca"] = $data->IDIgraca;
        $_SESSION["Ime"] = $data->Ime;
        $_SESSION["Prezime"] = $data->Prezime;
        $_SESSION["KorisnickoIme"] = $data->KorisnickoIme;
        $_SESSION["Email"] = $data->Email;
        $_SESSION["Sifra"] = $data->Sifra;

        header("Location: ../prikazNaloga.php?page=1");
        exit();
    }

    else
    {
        die(header("Location: ../loginStranica.php?error=1"));
    }

}


?>