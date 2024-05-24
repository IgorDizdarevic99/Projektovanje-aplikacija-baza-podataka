<?php
    include_once("./connection.php");
    session_start();


   if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mapaId = $_POST["mapa"];
    $idIgraca = $_SESSION['IDIgraca'];

    $query = "SELECT * FROM igraci WHERE NOT IDIgraca = $idIgraca ORDER BY RAND() LIMIT 1";
    $result = $connection->query($query);
    $randomOpponent = $result->fetch_object();
    $randomOpponentId = $randomOpponent->IDIgraca;  

    $outcomes = Array("Pobeda" , "Poraz");
    $randomOutcome = $outcomes[array_rand($outcomes)];

    $statement = $connection->prepare("INSERT INTO onlinemecevi (IDIgraca1, IDIgraca2, IDNivoa, Rezultat) VALUES (?, ?, ?, ?)");
    $statement->bind_param("iiis", $idIgraca, $randomOpponentId, $mapaId, $randomOutcome);
    
    if($statement->execute())
    {
        if($randomOutcome=="Pobeda")
        {   
            $query="SELECT * FROM onlinemecevi WHERE IDIgraca1 = $idIgraca";
            $result = $connection->query($query);

            $victoryCounter = 0;

            if($result->num_rows > 0)
            {
                while($matchData = $result->fetch_object())
                {
                    if($matchData->Rezultat == "Pobeda")
                    {
                        $victoryCounter++;
                    }
                }

                if($victoryCounter == 1)
                {   
                    $statement1 = $connection->prepare("INSERT INTO pojedinacnapostignucaigraca (IDIgraca, IDPostignuca ) VALUES (?, ?)");
                    $achievementID = 1;
                    // unos postignuca: Pobednik
                    $statement1->bind_param("ii", $idIgraca, $achievementID);
                    if(!$statement1->execute())
                    {
                        die("Eroor: (" . $connection->errno . ") ". $connection->error);
                    }
                }

                elseif ($victoryCounter == 5) 
                {
                    $statement2 = $connection->prepare("INSERT INTO pojedinacnapostignucaigraca (IDIgraca, IDPostignuca ) VALUES (?, ?)");
                    $achievementID = 2;
                    // unos postignuca: Nezaustavljiv
                    $statement2->bind_param("ii", $idIgraca, $achievementID);
                    if(!$statement2->execute())
                    {
                        die("Eroor: (" . $connection->errno . ") ". $connection->error);
                    }
                }

                elseif ($victoryCounter == 10) 
                {
                    $statement3 = $connection->prepare("INSERT INTO pojedinacnapostignucaigraca (IDIgraca, IDPostignuca ) VALUES (?, ?)");
                    $achievementID = 3;
                    // unos postignuca: Ultimativni borac
                    $statement3->bind_param("ii", $idIgraca, $achievementID);
                    if(!$statement3->execute())
                    {
                        die("Eroor: (" . $connection->errno . ") ". $connection->error);
                    }
                }
            }

            $achievementChance = Array(1,2,3,4,5,6,7,8,9,10);
            $achievementReached = $achievementChance[array_rand($achievementChance)];

            $query="SELECT * FROM pojedinacnapostignucaigraca WHERE IDIgraca = $idIgraca";
            $result = $connection->query($query);

            $checkAchievement4 = 0;
            $checkAchievement5 = 0;

            if($result->num_rows > 0)
            {

                while(($achievementData = $result->fetch_object()) && ($checkAchievement4 == 0 || $checkAchievement5 == 0))
                {
                    if($achievementData->IDPostignuca == 4)
                    {
                        $checkAchievement4++;
                    }

                    if($achievementData->IDPostignuca == 5)
                    {
                        $checkAchievement5++;
                    }
                }
            }

            if($achievementReached >= 7 && $checkAchievement4 == 0)
            {
                $statement4 = $connection->prepare("INSERT INTO pojedinacnapostignucaigraca (IDIgraca, IDPostignuca ) VALUES (?, ?)");
                $achievementID = 4;
                // unos postignuca: Profesionalac
                $statement4->bind_param("ii", $idIgraca, $achievementID);
                if(!$statement4->execute())
                {
                    die("Eroor: (" . $connection->errno . ") ". $connection->error);
                }
            }

            if($achievementReached == 10 && $checkAchievement5 == 0)
            {
                $statement5 = $connection->prepare("INSERT INTO pojedinacnapostignucaigraca (IDIgraca, IDPostignuca ) VALUES (?, ?)");
                // unos postignuca: Nedodirljiv 
                $achievementID = 5;
                $statement5->bind_param("ii", $idIgraca, $achievementID);
                if(!$statement5->execute())
                {
                    die("Eroor: (" . $connection->errno . ") ". $connection->error);
                }
            }
        }

        if($randomOutcome == "Pobeda")
        {
            header("Location: ../prikazNaloga.php?page=4");
            exit();
        }

        else
        {
            header("Location: ../prikazNaloga.php?page=5");
            exit();
        }
    }

    else
    {
        die("Eroor: (" . $connection->errno . ") ". $connection->error);
    }
}

?>