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
                <div class= "card">
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

                                <?php
                                    include_once ("./PHP/connection.php");
                                    $query = "SELECT * FROM postignuca";
                                    $result = $connection->query($query);

                                    if($result->num_rows>0)
                                    {
                                        while($row = $result->fetch_assoc())                                            //$row =$$result->fetch_object()
                                        {
                                            echo '<table class="table">';   // table-hover      
                                            echo '<tbody>';
                                            echo '    <td class="col-md-4 mb-4">';
                                            echo '      <div>';
                                            echo '           <h2>Postignuće: ' . $row['NazivPostignuca']  . '</h2>';    //$row->NazivPostignuca
                                            echo '       </div>';
                                            echo '       <div>';
                                            echo '       <br>';
                                            echo '           <p>Opis: ' .  $row['Opis'] . '</p>';   echo '';            //$row->Opis
                                            echo '       </div>';
                                                                        //echo '       <form action="./izmeniPostignuceForma.php" method="GET">';
                                            echo '       <a href="./izmeniPostignuceForma.php?id=' . $row['IdPostignuca'] . ' " class="btn btn-primary btn-block">Izmeni</a> ';
                                                                        //echo '       </form>';
                                                                        //echo '       <form action="./PHP/ukloniPostignuce.php" method="GET">';
                                            echo '       <a href="./PHP/ukloniPostignuce.php?id=' . $row['IdPostignuca'] . ' " class="btn btn-primary btn-block">Obriši</a> ';
                                                                        //echo '       </form>';

                                            ///////////////////////////////////////////////// drugi način za slanje vrednosti

                                            /*
                                            echo '       <form action="./izmeniNivoForma.php" method="POST">';
                                            echo '          <input type="hidden" name="postignuceID" value="' . $row['IDPostignuca'] . '">';
                                            echo '          <button type="submit" class="btn btn-primary btn-block" name="postignuceIDBtn">Izmeni</button>';
                                            echo '       </form>';

                                            echo '       <form action="./PHP/ukloniNivo.php" method="POST">';
                                            echo '          <input type="hidden" name="postignuceID" value="' . $row['IDPostignuca'] . '">';
                                            echo '          <button type="submit" class="btn btn-primary btn-block" name="postignuceIDBtn">Obriši</button>';
                                            echo '       </form>';
                                            */

                                            /////////////////////////////////////////////////

                                            echo '   </td>';
                                            echo '   <td class="col-md-2 mb-4">';
                                            echo '       <img src=" ' .  $row['Img'] .' " class="img-fluid gallery-image" alt=" ' .  $row['NazivPostignuca'] .' ">';        //$row->Img  , $row->NazivPostignuca
                                            echo '   </td>';
                                            echo '</tbody>';
                                            echo '</table>'; 
                                        }
                                    }
                                ?>

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
                                        echo    'Uspešno izbrisano postignuće!';
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