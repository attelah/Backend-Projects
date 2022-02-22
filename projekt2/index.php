<?php include "handy_method.php"; ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back-End Projekt 2</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div id="container">
        <!-- Max 800px bred container-->

<?php include "header.php" ?>

        <!-- Sektionen omringar artiklar (eg. blogposts)-->
        <section>

         <?php
            include "view_ads.php";
         ?>
            
        </section>

        <footer>
            Made by Sippe, Patrik & Atte<sup>&#169;</sup>
        </footer>

    </div>
</body>

</html>