<article>
    <h2>Uppg 4</h2>
    <p>Registrera dig på sajten</p>

    <form action="index.php" method="get">
        Användarnamn: <input type="text" name="username"> <br>
        E-post: <input type="text" name="email"><br>
        <input type="submit" name="skicka" value="Skapa konto">
    </form>
<?php
    if (!empty($_GET["username"]) && !empty($_GET["email"])) 
    {
        //hämta inmatad data

        $username = $_GET["username"];
        $email = $_GET["email"];
        
        // To-do: skapa slumpmässigt läsenord
        $pass = "jdfjdjdkdo";

        mail($email, "Your password is: ", $pass);

        print("Singning up as " . $username .". A confirmation letter and password will be sent to " . $email);
    }
?>

</article>
<div class="separator"></div>