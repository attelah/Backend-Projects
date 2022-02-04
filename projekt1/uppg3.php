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

        if (($dag > 0) && ($dag <= 30) && ($month > 0) && ($month <=12)) 
        {
            //hitta tiden nu
            $tidNu = time();
            //Skapa en timestamp baserat på inmatning
            $givenTid = mktime(12, 0, 0, $manad, $dag, $ar);

            $veckodag = date("w", mktime(0,0,0,$manad,$dag,$ar));

            $svedagen = $veckodagar[-1];
            //använd floor() för att avrunda nedåt 
            echo "Datumet ".$dag.$manad.$ar."är en ".$svedagen;

            if($tidNu < $givenTid)
            {
            echo "Det givna datumet är i framtiden!";

            $future = $giventid - $tidNu;
            
            $sec = $future % 60;
            floor($future = ($future - $sec) / 60);
            $minutes = $future % 60;
            floor($future = ($future - $min) / 60);
            $hours = $future % 60;
            floor($future = ($future - $hours) / 60);
            $dygn = floor($future - $hours) / 24;
            
            print("det är ".$dygn. " dygn, ".$hours."timmar, ".$minutes."minuter och".$sec." tills det inmatade datumet");

            }
            if($tidNu > $givenTid)
            {

            echo "Det givna datumet är i det förflutna!";

            $future = $tidNu - $giventid;
            

            $dygn = $future / 86400;
            $hours = $dygn / 3600;
            $minutes = $hours / 60;
            
            

            //skriv ut variabler
            print("det är " . $givenTid . " till det inmatade datumet");

            }
        }
         else {
            print("din inmatning är skum?");
        }
    }
    ?>


</article>

<div class="separator"></div>