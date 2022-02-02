<article>
    <h2>Besöksräknare - Uppg 8</h2>

    <?php
    $remote_user = $_SERVER["REMOTE_USER"];
    $ip = $_SERVER['REMOTE_ADDR'];
    $myfile = fopen("besok.txt","r") or print("filen gick inte att öppna!"); // Fixa bättre error handling
    print(fread($myfile,filesize("besok.txt")));
    fwrite($myfile,$remote_user." var här ".$givenTid);
    fclose($myfile);
    ?>

</article>
<div class="separator"></div>