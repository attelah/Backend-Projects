<article>
    <h2>Uppg 1 - Användar och serverdata</h2>
    <p><b>Användar & Serverinfo</b></p>
    <?php 
        // phpinfo();
        echo nl2br("Användare: " . $_SERVER["REMOTE_USER"]);
        echo nl2br("<br>Användarens IP: " . $_SERVER["REMOTE_ADDR"]);
        echo nl2br("<br>Serverns namn: " . $_SERVER["SERVER_NAME"]);
        echo nl2br("<br>Serverns IP: " . $_SERVER["SERVER_ADDR"]);
        echo nl2br("<br>Servern snurrar på port: " . $_SERVER["SERVER_PORT"]);
        echo nl2br("<br>Apache versionen: " . apache_get_version());
        echo nl2br("<br>PHP versionen: " . phpversion());
    ?> 
    
</article>
<div class="separator"></div>