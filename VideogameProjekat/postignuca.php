<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="./CSS/postignuca.css" type="text/css">

    <title>Postignuća</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="./pocetnaStranica.php"><h3>SMACKDOWN!</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">     
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./pocetnaStranica.php">Početna<span class="sr-only"> <!--(current)--> </span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./nivoi.php">Nivoi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./postignuca.php">Postignuća</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./loginStranica.php">Prijava</a> 
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="col-md-12 mb-4">

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