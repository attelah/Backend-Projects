<article>
    <h2>Uppg 8</h2>
    <p>Besöksräknare</p>

    <?php
    $remote_user = $_SERVER["REMOTE_USER"];
    $ip = $_SERVER['REMOTE_ADDR'];
    $myfile = fopen("besok.txt","r") or die("filen gick inte att öppna!");
    print(fread($myfile,filesize("besok.txt")));
    print("Hej ".$remote_user.", ditt bla bla bla");
    ?>
</article>
<div class="separator"></div>