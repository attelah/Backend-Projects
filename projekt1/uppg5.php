<article>
    <h2>Cookies - Uppg 5</h2>

    <?php

    $cookie_name = "username";
    $cookie_value = $_SERVER["REMOTE_USER"];
    setcookie($cookie_name,$cookie_value , time() + (86400 * 2), "/");

    if(isset($_COOKIE['username'])){
        print("Välkommen tillbacka " . $_COOKIE['username']);
    }
    ?>
</article>
<div class="separator"></div>