<?php include "handy_method.php"; ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sida</title>
    <link rel="stylesheet" href="../style.css">
    <script src="./script.js" defer></script>
</head>

<?php
if ($_SESSION['user'] == null) {
    header("refresh:0; url=./index.php");
}
?>

<body>

    <div id="container">
        <!-- Max 800px bred container-->

        <?php include "header.php" ?>

        <!-- Sektionen omringar artiklar (eg. blogposts)-->
        <section>
        <article>

        <?php
        echo "<h2>Välkommen till din profil!</h2>Här kan du byta din profilbild och se dina föregående profilbilder!";
        echo "<h2>Ditt användarnamn: " . $_SESSION['user'] . "</h2>";
        ?>
        
        <?php include "profilepic.php" ?>

        </article>
        </section>

        <!-- Footern innehåller t.ex. somelänkar och kontaktuppg -->
        <footer>
            Made by Sippe, Patrik & Atte<sup>&#169;</sup>
        </footer>

    </div>
</body>

</html>