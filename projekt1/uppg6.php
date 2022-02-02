<article>
    <h2>Login - Uppg 6</h2>
    <p>Logga in för att se din profil</p>
    <form action="index.php">
        Användarnamn: <input type="text" name="user">
        <br><button type="submit">Logga in</button>
    </form>


<?php
// Request funkar för både get och post data
if (!empty($_REQUEST['user'])) {
    // Stoppa XSS
    $username = test_input($_REQUEST['user']);
    // Lagra användarnamnet i session storage
    $_SESSION['user'] = $username;
    print("Signing in " . $username .". You will be redirected to your profile page in 5 secs ");
        

    header("refresh:5; url=./profile.php");
}

?>


</article>
<div class="separator"></div>
