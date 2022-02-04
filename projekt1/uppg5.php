<article>
    <h2>Cookies - Uppg 5</h2>

    <?php

    $timestamp = date("d.m.Y H:i:s");

    if(!isset($_COOKIE['username'])){
        setcookie("username", $_SERVER["REMOTE_USER"] , time() + (86400 * 2), "/");
        echo nl2br("Välkommen " . $_SERVER["REMOTE_USER"]);
    }
    if(!isset($_COOKIE['firstVisit'])) {
        setcookie("firstVisit", $timestamp , time() + (86400 * 2), "/");
        echo nl2br("<br>Det här är ditt första besök! - " . $timestamp);
    }
    else {
        echo nl2br("Välkommen tillbaka " . $_COOKIE['username']);
        echo nl2br("<br>Ditt första besök var: " . $_COOKIE['firstVisit']); 
    }
    ?>
</article>
<div class="separator"></div>