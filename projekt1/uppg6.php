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
}

if ($username == "tennis") {
        // Lagra användarnamnet i session storage
        $_SESSION['user'] = $username;
        print("Signing in as " . $username .". You will be redirected to your profile page in 3 secs ");
        header("refresh:3; url=./profile.php");
}
else if (!empty($_REQUEST['user'])) {
    print("Wrong username! (Hint: tennis)");
}
?>


</article>
<div class="separator"></div>
