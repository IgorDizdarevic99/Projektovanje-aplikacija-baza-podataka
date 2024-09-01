<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="./CSS/loginStranica.css" type="text/css">

    <title>Login stranica</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>

            <div class="col-6">
                <div class= "card" >
                    <div class="card-header">Login stranica korisnika</div>

                    <div class="card-body">
                        <p class="card-text">

                            <form action="./PHP/login.php" method="post">
                                <div class="form-group">
                                    <label for="email">E-mail adresa:</label>
                                    <input type="email" name="email" class="form-control" placeholder="Unesite e-mail adresu" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Šifra</label>
                                    <input type="password" name="password" class="form-control" placeholder="Unesite šifru" required>
                                </div>
                                           
                                <div>
                                    <button type="submit" class="btn btn-primary btn-block">Prijavi se</button>
                                    <a href="./registracijaStranica.php" class="btn btn-primary btn-block">Registruj se</a>
                                </div>
                            </form>

                        </p>
                    </div>

                    <div class="card-footer">
                        <a href="./pocetnaStranica.php" class="btn btn-primary btn-block">Nazad</a>   

                        <div> <!--class="errorMsg"-->
                            <?php
                                if(isset($_REQUEST['success']))
                                {
                                    if($_REQUEST['success']==1)
                                    {
                                        echo '<div class="alert alert-success" role="success">';
                                        echo    'Uspešno kreiran nalog!';
                                        echo '</div>';
                                    }

                                    elseif ($_REQUEST['success']==2) 
                                    {
                                        echo '<div class="alert alert-success" role="success">';
                                        echo    'Uspešan logout!';
                                        echo '</div>';
                                    }
                                }

                                if(isset($_REQUEST['error'])){
                                    if($_REQUEST['error']==1)
                                    {
                                        echo '<div class="alert alert-danger" role="danger">';
                                        echo    'Neispravno unet E-mail ili šifra!';
                                        echo '</div>';
                                    }

                                    elseif($_REQUEST['error']==2)
                                    {
                                        echo '<div class="alert alert-danger" role="danger">';
                                        echo    'Došlo je do greške!';
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