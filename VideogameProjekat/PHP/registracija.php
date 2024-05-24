<?php
include_once("./connection.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnickoIme = $_POST['korisnickoIme'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];

    $ime = $connection->real_escape_string($ime);
    $prezime = $connection->real_escape_string($prezime);
    $korisnickoIme = $connection->real_escape_string($korisnickoIme);
    $email = $connection->real_escape_string($email);
    $password = $connection->real_escape_string($password);
    $passwordAgain = $connection->real_escape_string($passwordAgain);

    if($password != $passwordAgain)
    {
        die(header("Location: ../registracijaStranica.php?error=2"));
    }

    else
    {
        $query = "SELECT * FROM igraci WHERE email = '$email'";
        $result = $connection->query($query);
        if ($result->num_rows > 0) 
        {
            die(header("Location: ../registracijaStranica.php?error=1"));
        }
        
        $statement = $connection->prepare("INSERT INTO igraci (Ime, Prezime, KorisnickoIme, Email, Sifra) VALUES (?, ?, ?, ?, ?)");

        $statement->bind_param("sssss", $ime, $prezime, $korisnickoIme, $email, $password);

        if($statement->execute())
        {
            header("Location: ../loginStranica.php?success=1");
            exit();
        }

        else
        {
            die("Eroor: (" . $connection->errno . ") ". $connection->error);
        }
    }
}

?>