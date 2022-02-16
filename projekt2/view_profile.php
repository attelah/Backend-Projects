<article>
    <h2>Här är din profil</h2>
    <p>Du kan ändra på värdena för att uppdatera din annons</p>

    <?php
    // hämta profildata
    $username = test_input($_SESSION['username']);
        //hämta profildata
        $username = test_input($_SESSION['username']);
        $sql = "SELECT username,fullname FROM annonser WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        ?>
        <!-- Alternative syntax för conditionals -->
        <?php if($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <!-- Man kan också inkludera php trots alternative syntax -->
        <?php print("Välkommen tillbaka " . $row['fullname'] . "<br>"); ?>
            <form action="profile.php" method="get">
            <!-- Om ni sätter php bland html, kom ihåg att inget syns innan print -->
        Användarnamn: <input type="text" name="username" value=" <?php print($username); ?>"> <br>
        Lösenord: <input type="text" name="password"><br> 
        E-post: <input type="email" name="email"><br>
        <h2>Info till din profil:</h2><br>
        <!-- Shorthand syntax för php print sparar lite tecken -->
        Ditt hela namn: <input type="text" name="fullname" value=" <?php $row['fullname'] ?>"><br>
        Hemstad: <input type="text" name="city"><br>
        Årlig inkomst: <input type="number" name="salary"><br>
        <label for="preference">Jag söker efter:</label>
        <select id="preference" name="preference">
            <option value="1">Män</option>
            <option value="2">Kvinnor</option>
            <option value="3">Män och Kvinnor</option>
            <option value="4">Vad som helst!</option>
            <option value="5">Vill inte specifiera</option>
        </select><br>
        Berätta om dig själv: <input type="text" name="aboutme"><br>
        <input type="hidden" name="page" value="modify">
        <input type="submit" name="skicka" value="Spara Ändringar">
    </form>
        <?php endif; ?>

</article>