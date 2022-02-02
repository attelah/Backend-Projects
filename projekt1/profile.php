<?php include "handy_method.php"; ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dennis Back-end template</title>
    <link rel="stylesheet" href="../style.css">
    <script src="./script.js" defer></script>
</head>

<body>

    <div id="container">
        <!-- Max 800px bred container-->

<?php include "header.php" ?>

        <!-- Sektionen omringar artiklar (eg. blogposts)-->
        <section>

        <h2>Profilsida</h2>            

        <?php include "profilepic.php" ?>
        </section>

        <!-- Footern innehåller t.ex. somelänkar och kontaktuppg -->
        <footer>
            Made by Sippe, Patrik & Atte<sup>&#169;</sup>
        </footer>

    </div>
</body>

</html>