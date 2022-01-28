<article>
    <h2>Uppg 6</h2>
    <p>Här är användarrprofilen</p>
    
<?php

print("ditt användarnamn är: ".$_COOKIE['username']) . "<br>";
print("din epost är är: ".$_SESSION['email']);


// Vart fan ska sessionen?
/*
?>
<?php
session_start();
?>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.";
?>
</article>
<div class="separator"></div>
*/