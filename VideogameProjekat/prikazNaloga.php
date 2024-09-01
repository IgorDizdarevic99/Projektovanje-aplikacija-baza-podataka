<?php
    include("./PHP/connection.php");
    session_start();

    if(!isset($_SESSION["Email"])){
    die(header("Location: ./loginStranica.php?error=2"));
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
    
    <link rel="stylesheet" href="./CSS/prikazNaloga.css" type="text/css">

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
                            <a class="navbar-brand" href="./prikazNaloga.php?page=1">
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
                                        <a class="nav-link" href="./prikazNaloga.php?page=1">Igraj<span class="sr-only"> <!--(current)--> </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./prikazNaloga.php?page=2">Istorija mečeva</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="./prikazNaloga.php?page=3">Ostvarena postignuća</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="./PHP/logout.php">Odjavi se</a> 
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                    <div class="card-body">
                        <div class="container">
                            <?php
                                if(isset($_REQUEST['page']))
                                {
                                    if($_REQUEST['page']==1)
                                    {   
                                        echo '<div>';
                                        echo '   <p class="card-text">';                                              
                                        echo '   <form action="./PHP/novaIgra.php" method="post">';
                                        echo '       <div class="form-group">';
                                        echo '           <div>';
                                        echo '               Pozdrav ' . $_SESSION["Ime"] . " " . $_SESSION["Prezime"] . '!';
                                        echo '           </div>';
                                        echo '           <br>';

                                        echo '           <label for="mapa">Nova igra? Izaberite mapu:</label>';
                                        echo '           <select name="mapa" class="form-control" >';  //onchange="this.form.submit()"
                                                        
                                                            $query = "SELECT * FROM nivoi";
                                                            $result = $connection->query($query);

                                                            if($result->num_rows > 0){

                                                                $value = 1;
                                                                while($data = $result->fetch_object())
                                                                {
                                                                    echo '<option value=' . $data->IDNivoa . ' >' . $value++ . '. ' . $data->NazivNivoa . '</option>';
                                                                }
                                                            }
                                                            
                                                        //?/>
                                        echo '           </select>';                     
                                        echo '       </div>';
                                        
                                        echo '       <div>';
                                        //echo            '<a class="btn btn-primary btn-block" href="./prikazNaloga.php?page=1">Igraj</a>';
                                        echo '           <button type="submit" class="btn btn-primary btn-block">Igraj</button>';
                                        echo '       </div>';
                                    }

                                    elseif ($_REQUEST['page']==2) 
                                    {
                                        echo '       <div class="container">';
                                        echo '       <div class="col-md-12"> <!--mb-4-->';
                                        echo '       <h3>Istorija mečeva</h3>';
                                                        $idIgraca = $_SESSION['IDIgraca'];
                                                        $query1 = "SELECT * FROM onlinemecevi WHERE IDIgraca1 = $idIgraca";
                                                        $result1 = $connection->query($query1);

                                                        if($result1->num_rows > 0)
                                                        {
                                        echo '                              <table class="table">';   //table-hover
                                        echo '                              <thead>';
                                        echo '                                  <th>Naziv nivoa</th>';
                                        echo '                                  <th>Protivnik</th>';
                                        echo '                                  <th>Rezultat</th>';
                                        echo '                              </thead>';                                                       
                                                            while($row1 = $result1->fetch_object())
                                                            {
                                                                $query2 = "SELECT * FROM nivoi WHERE IDNivoa = $row1->IDNivoa";
                                                                $result2 = $connection->query($query2);

                                                                $query3 = "SELECT * FROM igraci WHERE IDIgraca = $row1->IDIgraca2";
                                                                $result3 = $connection->query($query3);

                                                                if($result2->num_rows == 1 && $result3->num_rows == 1)
                                                                {
                                                                    $row2 = $result2->fetch_object();
                                                                    $row3 = $result3->fetch_object();

                                        echo '                              <tbody>';                             
                                        echo '                                  <td>';
                                        echo                                        $row2->NazivNivoa;
                                        echo '                                  </td>';
                                        echo '                                  <td>';
                                        echo                                        $row3->KorisnickoIme; 
                                        echo '                                  </td>';
                                        echo '                                  <td>';
                                        echo                                        $row1->Rezultat;
                                        echo '                                  </td>'; 
                                        echo '                              </tbody>';
                                                                }
                                                            }
                                        echo '                              </table>';
                                                        }

                                        echo '       </div>';
                                        echo '    </div>';
                                    }

                                    elseif ($_REQUEST['page']==3) 
                                    {
                                        echo '       <div class="container">';
                                        echo '       <div class="col-md-12 "> <!--mb-4-->';
                                        echo '       <h3>Ostvarena postignuća</h3>';
                                                        $idIgraca = $_SESSION['IDIgraca'];
                                                        $query1 = "SELECT * FROM pojedinacnapostignucaigraca WHERE IDIgraca = $idIgraca";
                                                        $result1 = $connection->query($query1);

                                                        if($result1->num_rows > 0)
                                                        {
                                        echo '                              <table class="table">';   //table-hover
                                        echo '                              <thead>';
                                        echo '                                  <th>Naziv postignuća</th>';
                                        echo '                                  <th>Opis</th>';
                                        echo '                              </thead>';                                                       
                                                            while($row1 = $result1->fetch_object())                                    //$row =$$result->fetch_object()
                                                            {

                                                                $query2 = "SELECT * FROM postignuca WHERE IDPostignuca = $row1->IDPostignuca";
                                                                $result2 = $connection->query($query2);

                                                                if($result2->num_rows == 1)
                                                                {
                                                                    $row2 = $result2->fetch_object();
                                                                    

                                        echo '                              <tbody>';                             
                                        echo '                                  <td>';         //class="col-md-4 mb-4"
                                        echo                                        $row2->NazivPostignuca;
                                        echo '                                  </td>';
                                        echo '                                  <td>';          //class="col-md-5 mb-4"
                                        echo                                        $row2->Opis; 
                                        echo '                                  </td>';
                                        echo '                              </tbody>';
                                                                }
                                                            }
                                        echo '                              </table>';
                                                        }

                                        echo '       </div>';
                                        echo '    </div>';
                                    }


                                    elseif ($_REQUEST['page']==4) 
                                    {
                                        echo '<div class="alert alert-primary" role="success">';
                                        echo    'Ostvarili ste pobedu!';
                                        echo '</div>';

                                        echo '<a class="btn btn-primary btn-block" href="./prikazNaloga.php?page=1">Nova igra<span class="sr-only"> <!--(current)--> </span></a>';
                                    }

                                    elseif ($_REQUEST['page']==5) 
                                    {
                                        echo '<div class="alert alert-secondary" role="success">';
                                        echo    'Ostvarili ste poraz!';
                                        echo '</div>';

                                        echo '<a class="btn btn-primary btn-block" href="./prikazNaloga.php?page=1">Nova igra<span class="sr-only"> <!--(current)--> </span></a>';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <!--div class="card-footer">
                            
                </div-->
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