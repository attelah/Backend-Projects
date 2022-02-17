<article>
    <h2>Här är din profil</h2>
    <p>Du kan ändra på värdena för att uppdatera din annons</p>

    <?php
    // hämta profildata
        //hämta profildata
        $username = test_input($_SESSION['username']);
        $sql = "SELECT username,`password`,email,fullname,city,salary,preference,aboutme FROM annonser WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        ?>
        <!-- Alternative syntax för conditionals -->
        <?php if($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <!-- Man kan också inkludera php trots alternative syntax -->
        <?php print("Välkommen tillbaka " . $row['fullname'] . "<br>"); ?>
            <form action="profile.php" method="get">
            <!-- Om ni sätter php bland html, kom ihåg att inget syns innan print -->
        Användarnamn: <input type="text" name="username" value="<?=$row['username']?>"> <br>
        Lösenord: <input type="text" name="password" value="<?=$row['password']?>"><br>
        E-post: <input type="email" name="email" value="<?=$row['email']?>"><br>
        <h2>Info till din profil:</h2><br>
        <!-- Shorthand syntax för php preint sparar lite tecken -->
        Ditt hela namn: <input type="text" name="fullname" value="<?=$row['fullname']?>"><br>
        Hemstad: <input type="text" name="city" value="<?= $row['city']?>"><br>
        Årlig inkomst: <input type="number" name="salary" value="<?=$row['salary']?>"><br>
        <label for="preference">Jag söker efter:</label>
        <select id="preference" name="preference">
        <!--https://stackoverflow.com/questions/3518002/how-can-i-set-the-default-value-for-an-html-select-element!-->
            <option <?php if($row['preference'] == '1'){echo("selected");}?>>Män</option>
            <option <?php if($row['preference'] == '2'){echo("selected");}?>>Kvinnor</option>
            <option <?php if($row['preference'] == '3'){echo("selected");}?>>Män & Kvinnor</option>
            <option <?php if($row['preference'] == '4'){echo("selected");}?>>Vad som hällst</option>
            <option <?php if($row['preference'] == '5'){echo("selected");}?>>Vill inte specifiera</option>
        </select><br>
        Berätta om dig själv: <input type="text" name="aboutme" value="<?=$row['aboutme']?>"><br>
        <input type="hidden" name="page" value="modify">
        <input type="submit" name="skicka" value="Spara Ändringar">
    </form>
        <?php endif; ?>

</article>
