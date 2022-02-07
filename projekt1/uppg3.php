<article>
    <h2>Användarinmatning - Uppg 3</h2>

    <form action="index.php" method="get">
        Dag: <input type="text" name="dag"> <br>
        Månad: <input type="text" name="manad"><br>
        År: <input type="text" name="ar"><br>

        <input type="submit" name="skicka" value="Räkna">
    </form>
    
    <?php
    if (isset($_GET["dag"]) && !empty($_GET["manad"])) 
    {
        //hämta inmatad data
        $dag = test_input($_GET["dag"]);
        $manad = test_input($_GET["manad"]);
        $ar = test_input($_GET["ar"]);

        if (($dag > 0 && $dag <= 31) && ($manad > 0 && $manad <= 12)) 
        {
            
            $tidNu = time();
            $hNu = time("H");
            $mNu = time("i");
            $sNu = time("s");
           
            $givenTid = mktime($hNu, $mNu, $sNu, $manad, $dag, $ar);

            $veckodag = date("w", mktime($hNu, $mNu, $sNu, $manad, $dag, $ar));

            $svedagen = $veckodagar[$veckodag];
            
            echo "<br>Datumet ".$dag.".".$manad.".".$ar." är en ".$svedagen. "<br>";
            echo "<br>";
            
            
           if ($givenTid > $tidNu)
            {
            echo "Det givna datumet är i framtiden! <br><br> ";
                
            $future = $givenTid-$tidNu;
            
            $sec = $future % 60;
            $future = ($future - $sec) / 60;
            $min = $future % 60;
            $future = ($future - $min) / 60;
            $hours = $future % 24;
            $dygn = floor($future / 24);


            print("det är ".$dygn. " dygn, ".$hours."timmar, ".$min."minuter och ".$sec." sekunder tills det inmatade datumet");

            }
            else if ($givenTid < $tidNu)
            {
                echo "Det givna datumet är i det förflutna! <br>";

                $future = $tidNu - $givenTid;
            
                $sec = $future % 60;
                $future = ($future - $sec) / 60;
                $min = $future % 60;
                $future = ($future - $min) / 60;
                $hours = $future % 24;
                $dygn = floor($future / 24)-1;

                print("det är ".$dygn. " dygn, ".$hours."timmar, ".$min."minuter och ".$sec." sekunder sedan det inmatade datumet");
            }

        }
         else {
            print("din inmatning är skum?");
        }
    }
    ?>


</article>

<div class="separator"></div>