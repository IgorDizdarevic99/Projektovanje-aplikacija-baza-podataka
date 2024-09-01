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

    <?php

        if(isset($_GET['id'])){
            
            $nivoIDValue = (int)$_GET['id'];
            $_SESSION['IDNivoa'] = $nivoIDValue;
            //echo $_SESSION['IDNivoa'];
        }

    ///////////////////////////////////////////////// drugi način za slanje vrednosti

        /*if(isset($_POST['nivoIDBtn'])){
            //--$nivoIDValue = $_POST['nivoID'];
            $nivoIDValue = (int)$_POST['nivoID'];
            $_SESSION['IDNivoa'] = $nivoIDValue;
            //--echo $_SESSION['IDNivoa'];
        }*/


    /////////////////////////////////////////////////    
    ?>

    <div class="container">
        <div class="row">
            <div class="col-2">

            </div>

            <div class="col-8">
                <div class= "card" >
                    <div class="card-header">
                        <div class="container">
                            <h3>Izmena nivoa</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <p class="card-text">

                                <form action="./PHP/izmeniNivo.php" method="POST">
                                    <div class="form-group">
                                        <label for="naziv">Naziv nivoa:</label>
                                        <input type="naziv" name="naziv" class="form-control" placeholder="Unesite nov naziv nivoa" required>
                                    </div>           

                                    <div class="form-group">
                                        <label for="tezina">Izaberite težinu:</label>
                                        <select name="tezina" class="form-control" >
                                                        
                                            <option value='Lako (1/5)'>Lako (1/5)</option>
                                            <option value='Uglavnom lako (2/5)'>Uglavnom lako (2/5)</option>
                                            <option value='Srednja težina (3/5)'>Srednja težina (3/5)</option>
                                            <option value='Malo teže (4/5)'>Malo teže (4/5)</option>
                                            <option value='Teško (5/5)'>Teško (5/5)</option>
                                                                
                                        </select>                     
                                    </div>

                                    <div class="form-group">
                                        <label for="opis">Opis:</label>
                                        <input type="opis" name="opis" class="form-control" placeholder="Unesite nov opis nivoa" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="slika">Naziv slike:</label>
                                        <input type="slika" name="slika" class="form-control" placeholder="Unesite nov naziv slike"> <!--required-->
                                    </div>
                                            
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-block">Izmeni</button>
                                    </div>

                                    <a href="./prikazNalogaAdminNivoi.php" class="btn btn-primary btn-block">Nazad</a> 
                                
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
                                        echo    'Uspešno izmenjen nivo!';
                                        echo '</div>';
                                    }
                                }

                                if(isset($_REQUEST['error'])){
                                    if($_REQUEST['error']==1)
                                    {
                                        echo '<div class="alert alert-danger" role="danger">';
                                        echo    'Greška! Uneli ste isti naziv!';
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
    

    <!-- scripte potrebne za rad dugmeta za meni -- >
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script> 
    
    
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script-- > 

    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script-->
</body>
</html>