<article>
    <h2>Gästbok - Uppg 9</h2>
    <form method="POST" action="">
        <label for="bloggText">Blogg text</label> <br>
        <textarea name="bloggText" id="bloggText" cols="35" rows="7"></textarea> <br>
        <input type="submit" name="submitBloggText" id="submitBloggText">
    </form>

    <?php 
    $bloggFileName = "bloggTexter.php";

        if(isset($_POST['submitBloggText'])){
            $postUser = $_SERVER["REMOTE_USER"];
            $postTimestamp = date("H:i");
            $postDate = date("d.m.Y");
            $BloggText = test_input( $_POST['bloggText']);
            $content = 
            "användare: " . $postUser . ", Klockan: " . $postTimestamp . " Den " . $postDate ."<br> <br>" .
            $BloggText ." <br> <br> <br> <br>";

            echo $content;

            $fp = fopen($bloggFileName, 'r+');
            fwrite($fp, $content);
            fclose($fp);

            //file_put_contents($bloggFileName, $content, FILE_APPEND);
        }

        //echo "Klockan: " . date("H:i") . " Den " . date("d.m.Y");
        //include $bloggFileName;
    
    ?>
    

</article>
<div class="separator"></div>