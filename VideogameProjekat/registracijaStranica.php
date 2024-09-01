<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="./CSS/registracijaStranica.css" type="text/css">
    
    <title>Registracija</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>

            <div class="col-6">
                <div class= "card" >
                    <div class="card-header">Registracija korisnika</div>

                    <div class="card-body">
                        <p class="card-text">

                            <form action="./PHP/registracija.php" method="post">
                                <div class="form-group">
                                    <label for="ime">Ime:</label>
                                    <input type="text" name="ime" class="form-control" placeholder="Unesite ime" required>
                                </div>
                                <div class="form-group">
                                    <label for="prezime">Prezime:</label>
                                    <input type="text" name="prezime" class="form-control" placeholder="Unesite prezime" required>
                                </div>
                                <div class="form-group">
                                    <label for="korisnickoIme">Korisničko ime:</label>
                                    <input type="text" name="korisnickoIme" class="form-control" placeholder="Unesite korisnicko ime" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail adresa:</label>
                                    <input type="email" name="email" class="form-control" placeholder="Unesite e-mail adresu" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Šifra:</label>
                                    <input type="password" name="password" class="form-control" placeholder="Unesite šifru" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Potvrda šifre:</label>
                                    <input type="password" name="passwordAgain" class="form-control" placeholder="Potvrdite šifru" required>
                                </div>
       
                                <div>
                                    <button type="submit" class="btn btn-primary btn-block">Registruj se</button>
                                </div>
                            </form>

                        </p>
                    </div>

                    <div class="card-footer">
                        <a href="./loginStranica.php" class="btn btn-primary btn-block">Nazad</a>   
                        <div> <!--class="errorMsg"-->
                            <?php
                                if(isset($_REQUEST['error'])){
                                    if($_REQUEST['error']==1)
                                    {
                                        echo '<div class="alert alert-danger" role="danger">';
                                        echo    'Već postoji nalog sa ovom E-mail adresom!';
                                        echo '</div>';
                                    }

                                    elseif($_REQUEST['error']==2)
                                    {
                                        echo '<div class="alert alert-danger" role="danger">';
                                        echo    'Šifre se ne poklapaju!';
                                        echo '</div>';
                                    }
                                }
                            ?>
                        </div>  
                    </div>

                </div>
            </div>

            <div class="col-3">

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>