<article>
    <h2>Uppg 8</h2>
    <p>Besöksräknare</p>

    <?php
    $remote_user = $_SERVER["REMOTE_USER"];
    $ip = $_SERVER['REMOTE_ADDR'];
    $myfile = fopen("besok.txt","r") or die("filen gick inte att öppna!");
    print(fread($myfile,filesize("besok.txt")));
    fwrite($myfile,$remote_user." var här ".$givenTid);
    fclose($myfile);
    ?>
</article>
<div class="separator"></div>