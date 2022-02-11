<article>
    <h2>Registeringsformulär - Uppg 4</h2>

    <form action="index.php" method="get">
        Användarnamn: <input type="text" name="username"> <br>
        E-post: <input type="text" name="email"><br>
        <input type="submit" name="skicka" value="Skapa konto">
    </form>
<?php
    if (!empty($_GET["username"]) && !empty($_GET["email"])) 
    {
        //hämta inmatad data

        $username = test_input($_GET["username"]);
        $email = test_input($_GET["email"]);
        
        //skapa slumpmässigt läsenord
        $String ="Detta är texten som enkrypteras för att skapa ett slumpmässigt och säkert lösenord!";
        $Length = 8; //Den här variabeln bestämmer lösenordets längd
        $String = md5($String); //krypterar strängen, men borde kanske vara sha256 nuförtiden
        $StringLength = strlen($String);
        srand((double) microtime() * 1000000);
        $Begin = rand(0,($StringLength-$length-1)); //Väljer en slumpmässig startpunkt
        //Skapa det slutliga lösenordet
        $pass = substr($String, $Begin, $Length);
        // PHP: Visuell Snabbguide (2002), Larry Ullman. s. 64-65.

        mail($email, "Ditt lösenord", " Ditt användarnamn: ".$username."<br> Ditt lösenord: ".$pass);

        print("Registrerar dig som " . $username .". Ett bekräftelsemeddelande samt ditt nya lösenord skickas till " . $email);
        
        $_SESSION['email'] = $email;
        header("refresh:5; url=index.php");
    }
?>

</article>
<div class="separator"></div>