<article>
    <h2>Gästbok - Uppg 9</h2>
    <!--formulär för blogg inkägget -->
    <form method="POST" action="">
        <label for="bloggText">Blogg text</label> <br>
        <textarea name="bloggText" id="bloggText" cols="35" rows="7"></textarea> <br>
        <input type="submit" name="submitBloggText" id="submitBloggText">
    </form>

    <?php 
    //deklarerar filens namn i en variabel
    $bloggFileName = "bloggTexter.txt";
        //checkar att nån har tryckt på formulärets submit knapp
        if(isset($_POST['submitBloggText'])){
            //Kollar upp vem usern är
            $postUser = $_SERVER["REMOTE_USER"];
            //loggar tiden
            $postTimestamp = date("H:i");
            //loggar datumet
            $postDate = date("d.m.Y");
            //loggar texten och ser till att man inte kan skicka in skadliga HTML querries
            $BloggText = test_input( $_POST['bloggText']);
            //skriver ut kodstycket i ett HTML format så som det skall se ut på sidan kan göra det finare med classer ;)
            $content = 
            "Användare: " . $postUser . ", Klockan: " . $postTimestamp . " Den " . $postDate ."<br> <br>" .
            $BloggText ." <br> <br> <br> <br>";

            //echo $content;
            //lägger till content in i filen så att den nyaste bloggen kommer först
            $content .= file_get_contents($bloggFileName);
            file_put_contents($bloggFileName, $content);

            //refreshar sidan så att POST variabeln blir unset
            header('location: '. $_SERVER['PHP_SELF'] );

            
        }
        //inkluderar text filen så att texten skrivs ut
        include $bloggFileName;
    
    ?>
    

</article>
<div class="separator"></div>