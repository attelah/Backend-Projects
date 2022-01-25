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

            <!-- Artiklar placerar sig snyggt nedanför varann-->
            <article>
                <h2>uppg 1 - Användardata</h2>
                <p>Användarinfo</p>
                <?php 
                print ("Servern snurrar på port:" . $_SERVER["SERVER_PORT"] );
                phpinfo(); 
                ?> 

            </article>
            <div class="separator"></div>

            <article>
                <h2>Uppg 2</h2>
                <p>Elcyklar och solkraft</p>
            </article>

        </section>

        <!-- Footern innehåller t.ex. somelänkar och kontaktuppg -->
        <footer>
            Made by Sippe & Patrik<sup>&#169;</sup>
        </footer>

    </div>
</body>

</html>