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

        $username = test_input($_GET["username"]);
        $email = test_input($_GET["email"]);
        
        //skapa slumpmässigt läsenord
        $String ="Detta är texten som enkrypteras för att skapa ett slumpmässigt och säkert lösenord!";
        $Length = 8; //Den här variabeln bestämmer lösenordets längd
        $String = md5($String);
        $StringLength = strlen($String);
        srand((double) microtime() * 1000000);
        $Begin = rand(0,($StringLength-$length-1)); //Väljer en slumpmässig startpunkt
        // PHP: Visuell Snabbguide (2002), Larry Ullman
        
        $pass = substr($String, $Begin, $Length);
        

        mail($email, "Your password and username", " Your username: ".$username." Your password: ".$pass);

        print("Singning up as " . $username .". A confirmation letter and password will be sent to " . $email);
        
        $_SESSION['email'] = $email;
        header("refresh:5; url=index.php");
    }
?>

</article>
<div class="separator"></div>