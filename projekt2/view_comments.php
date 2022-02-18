<article>
    <h2>Här är kommentarerna på din annons</h2>
    <p>Svara med en kommentar genom att skrive en kommentar i avsändarens annons</p>

    <?php
    // hämta profildata
        $username = test_input($_SESSION['username']);
        $recieverId = test_input($_SESSION["recieverId"]);
        $sql = "SELECT kommentarer.comment,annonser.username FROM kommentarer INNER JOIN annonser ON kommentarer.senderId = annonser.id WHERE kommentarer.recieverId = ? ORDER BY kommentarer.timestamp";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$recieverId]);
        ?>
        <!-- Alternative syntax för conditionals -->
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <!-- -->
            <p> <strong> <a href="profile.php?profile= <?= $row['username']?>"><?= $row['username']?></a>  </strong> kommenterar: <br>
                <?= $row["comment"]?>
            </p>
        <?php endwhile; ?>
        
        <?php 
        $userId = "SELECT id FROM annonser";
        $userstmt = $conn->prepare($userId);
        $userstmt->execute();

        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){       
            $_SESSION['recieverId'] = $row['id'];
        } 
        ?>

        <form action="#">
            <textarea name="comment" cols="30" rows="10"></textarea>
            <input type="hidden" name="recieverId" value="<?php $recieverId ?>">
            <input type="hidden" name="userid" value="<?php ?>">
        </form>
            
</article>
