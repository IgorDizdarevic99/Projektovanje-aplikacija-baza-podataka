<?php

include_once ("./connection.php");
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM admini WHERE Email = '$email' AND Sifra = '$password' ";
    $result = $connection->query($query);

    if( $result-> num_rows == 1)
    {
        $data = $result->fetch_object();
        $_SESSION["IDAdmina"] = $data->IDAdmina;
        $_SESSION["Ime"] = $data->Ime;
        $_SESSION["Prezime"] = $data->Prezime;
        $_SESSION["KorisnickoIme"] = $data->KorisnickoIme;
        $_SESSION["Email"] = $data->Email;
        $_SESSION["Sifra"] = $data->Sifra;

        header("Location: ../prikazNalogaAdmin.php");  //IZMENITI PUTANJU ZA LOGIN || 
        //header("Location: ../prikazNalogaAdmini.php?page=1"); 
        exit();
    }

    else
    {
        die(header("Location: ../loginStranicaAdmin.php?error=1"));
    }

}


?>