<?php
    include("./PHP/connection.php");
    session_start();

    if(!isset($_SESSION["Email"])){
    die(header("Location: ./loginStranicaAdmin.php?error=2"));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="./CSS/prikazNalogaAdmin.css" type="text/css">

    <title>Prikaz Naloga</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-2">

            </div>

            <div class="col-8">
                <div class= "card" >
                    <div class="card-header">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="./prikazNalogaAdmin.php">
                                <?php
                                    echo $_SESSION['KorisnickoIme'];
                                ?>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">    
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarNav"> <!-- id="navbarColor03"-->
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="./prikazNalogaAdmin.php">Dodaj nivo<span class="sr-only"> <!--(current)--> </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./prikazNalogaAdminDodajPostignuce.php">Dodaj postignuće</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./prikazNalogaAdminNivoi.php">Prikaz nivoa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./prikazNalogaAdminPostignuca.php">Prikaz postignuća</a>
                                    </li>
                                </ul>

                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="./PHP/logoutAdmin.php">Odjavi se</a> 
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <p class="card-text">

                                <form action="./PHP/dodajPostignuce.php" method="post">
                                    <div class="form-group">
                                        <label for="naziv">Naziv postignuća:</label>
                                        <input type="naziv" name="naziv" class="form-control" placeholder="Unesite naziv postignuća" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="opis">Opis:</label>
                                        <input type="opis" name="opis" class="form-control" placeholder="Unesite opis nivoa" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="slika">Naziv slike:</label>
                                        <input type="slika" name="slika" class="form-control" placeholder="Unesite naziv slike"> <!--required-->
                                    </div>
                                            
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-block">Dodaj</button>
                                    </div>
                                </form>

                            </p>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div>
                            <?php
                                if(isset($_REQUEST['success']))
                                {
                                    if($_REQUEST['success']==1)
                                    {
                                        echo '<div class="alert alert-success" role="success">';
                                        echo    'Uspešno dodato postignuće!';
                                        echo '</div>';
                                    }
                                }

                                if(isset($_REQUEST['error'])){
                                    if($_REQUEST['error']==1)
                                    {
                                        echo '<div class="alert alert-danger" role="danger">';
                                        echo    'Već postoji postignuće sa ovim nazivom!';
                                        echo '</div>';
                                    }
                                }
                            ?>
                        </div>         
                    </div>
                </div>
            </div>

            <div class="col-2">

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    

    <!-- scripte potrebne za rad dugmeta za meni -->
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script> 
    
    
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script--> 

    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>
</body>
</html>