<article>
    <h2>Här är kommentarerna på din annons</h2>
    <p>Svara med en kommentar genom att skriva en kommentar i avsändarens annons</p>

    <?php
    // hämta profildata
        $username = test_input($_SESSION['username']);
        $recieverId = $_SESSION['userId'];
        $sql = "SELECT kommentarer.comment,annonser.username,annonser.id FROM kommentarer INNER JOIN annonser ON kommentarer.senderId = annonser.id WHERE kommentarer.recieverId = ? ORDER BY kommentarer.timestamp LIMIT 8";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$recieverId]);
        ?>
        <!-- Alternative syntax för conditionals -->
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <!-- -->
            <br><strong> <?= $row['username']?> kommenterar:</strong><br><br>
            <textarea disabled rows="3" cols="30">
            <?= $row["comment"]?>
            </textarea><br>
            

        <?php endwhile; ?>
            
</article>