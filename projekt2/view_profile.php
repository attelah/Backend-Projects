<article>
    <h2>MIN PROFIL</h2>
    <p>Här kan du uppdatera din profil!</p>

    <?php
    // hämta profildata
        $username = test_input($_SESSION['username']);
        $sql = "SELECT id,username,`password`,email,fullname,city,salary,preference,aboutme FROM annonser WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        ?>
        <!-- Alternative syntax för conditionals -->
        <?php if($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
        <?php $userID = $row['id']; ?>
        <?php $password = $row['password']; ?>
        <!-- Man kan också inkludera php trots alternative syntax -->
            <form action="profile.php" method="post">
            <!-- Om ni sätter php bland html, kom ihåg att inget syns innan print -->
        Användarnamn: <input type="text" name="username" value="<?=$row['username']?>"> <br>
        E-post: <input type="email" name="email" value="<?=$row['email']?>"><br><br>
        Uppdatera ditt lösenord<br>
        Nuvarande Lösenordet: <input type="password" name="passwordOld"><br>
        Nya Lösenordet:  <input type="password" name="passwordNew"><br><br>
        <h2>MIN ANNONS</h2><br>
        <!-- Shorthand syntax för php preint sparar lite tecken -->
        Ditt hela namn: <input type="text" name="fullname" value="<?=$row['fullname']?>"><br>
        Hemstad: <input type="text" name="city" value="<?= $row['city']?>"><br>
        Årlig inkomst: <input type="number" name="salary" value="<?=$row['salary']?>"><br>
        <label for="preference">Jag söker efter:</label>
        <select id="preference" name="preference">
        <!--https://stackoverflow.com/questions/3518002/how-can-i-set-the-default-value-for-an-html-select-element!-->
            <option value="1"<?php if($row['preference'] == '1'){echo("selected");}?>>Män</option>
            <option value="2"<?php if($row['preference'] == '2'){echo("selected");}?>>Kvinnor</option>
            <option value="3"<?php if($row['preference'] == '3'){echo("selected");}?>>Män & Kvinnor</option>
            <option value="4"<?php if($row['preference'] == '4'){echo("selected");}?>>Vad som helst!</option>
            <option value="5"<?php if($row['preference'] == '5'){echo("selected");}?>>Vill inte specifiera</option>
        </select><br>
        Berätta om dig själv: <input type="text" name="aboutme" value="<?=$row['aboutme']?>"><br>
        <input type="submit" name="skicka" value="Spara Ändringar">
    </form>
    
        <?php endif; ?>

    <?php
    if(!empty($_REQUEST['passwordOld']) && !empty($_REQUEST['passwordNew'])) {
        $passwordNew = test_input($_REQUEST["passwordNew"]);
        $passwordOld = test_input($_REQUEST["passwordOld"]);
        if(hash("sha256", $passwordOld) === $password) {
        $passwordNew = hash("sha256", $passwordNew);
        $sql = "UPDATE annonser SET password='$passwordNew' WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userID]);
        if($stmt) {
            print("Lösenordet uppdaterat!<br>");
            header("Refresh:1; url=profile.php");
        }
        else {
            print("An unexpected error has occurred");
        }
        }
        else {
            print("Ditt gamla lösenord stämmer inte!<br>");
        }
    }
    if(!empty($_REQUEST['username']) || !empty($_REQUEST['fullname']) || !empty($_REQUEST['city']) || !empty($_REQUEST['salary']) || !empty($_REQUEST['preference'])  || !empty($_REQUEST['aboutme']) || !empty($_REQUEST['preference']))
    {
    $username = test_input($_REQUEST["username"]);
    $email = test_input($_REQUEST["email"]);
    $fullname = test_input($_REQUEST["fullname"]);
    $city = test_input($_REQUEST["city"]);
    $salary = test_input($_REQUEST["salary"]);
    $aboutme = test_input($_REQUEST["aboutme"]);
    $preference = test_input($_REQUEST["preference"]);
    
    $sql = "UPDATE annonser SET username='$username',email='$email',fullname='$fullname',city='$city',salary='$salary',preference='$preference',aboutme='$aboutme' WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userID]);
    if($stmt) {
        print("Informationen uppdaterad!");
        $_SESSION['username'] = $username;
        header("Refresh:1; url=profile.php");
    }
    else {
        print("An unexpected error has occurred");
    }
}
    ?>

    <h2>Radera din profil & annons</h2>
    <p>!!KAN INTE ÅTERSTÄLLAS!!<p>
    <form action="profile.php" method="post">
    Ditt lösenord: <input type="password" name="confirmPass"><br>
    <input type="submit" name="delAcc" value="Jag är säker">
    </form>
    <?php
    if (isset($_REQUEST['delAcc'])) {
        $pass = hash("sha256", test_input($_REQUEST['confirmPass']));
    if ($pass === $row['password']) {
        $sql = "DELETE FROM annonser WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userID]);
        if($stmt) {
        print("Din profil och annons har blivit raderad."); 
        header("Refresh:2; url=index.php");
        session_destroy();
        }
        else print("An unexpected error has occurred");
    } 
    else print("Inkorrekt lösenord!");
    }

    ?>

</article>
