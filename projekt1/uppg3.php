<article>
    <h2>Uppg 3</h2>
    <p>Användarinmatning</p>
    <form action="index.php" method="POST">
        Dag: <input type="text" name="dag"> <br>
        Månad: <input type="text" name="manad"><br>
        <input type="submit" name="skicka" value="Räkna">
    </form>
    <?php 
    //hämta inmatad data
    $dag = $_GET["dag"];

    //hitta tiden nu
    $tidNu = time();
    //Skapa en timestamp baserat på inmatning
    $givenTid = mktime(12,0,0,$manad, $dag, 2022);

    //använd floor() för att avrunda nedåt 

    //skriv ut variabler
    print("det är " . $dag . "till det inmatade datumet");
    ?>


</article>

<div class="separator"></div>