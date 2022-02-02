<article>
    <h2>Användarinmatning - Uppg 3</h2>

    <form action="index.php" method="get">
        Dag: <input type="text" name="dag"> <br>
        Månad: <input type="text" name="manad"><br>
        År: <input type="text" name="ar"><br>
        <input type="submit" name="skicka" value="Räkna">
    </form>
    <?php
    if (isset($_GET["dag"]) && !empty($_GET["manad"])) {
        //hämta inmatad data
        $dag = test_input($_GET["dag"]);
        $manad = test_input($_GET["manad"]);
        $ar = test_input($_GET["ar"]);

        if (($dag > 0) && ($dag <= 30)) {

            //hitta tiden nu
            $tidNu = time();
            //Skapa en timestamp baserat på inmatning
            $givenTid = mktime(12, 0, 0, $manad, $dag, 2022);

            //använd floor() för att avrunda nedåt 

            //skriv ut variabler
            print("det är " . $dag . " till det inmatade datumet");
        } else {
            print("din inmatning är skum?");
        }
    }
    ?>


</article>

<div class="separator"></div>