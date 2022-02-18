<article>
    <h2>Här är kommentarerna på din annons</h2>
    <p>Svara med en kommentar genom att skrive en kommentar i avsändarens annons</p>

    <?php

    // hämta profildata
        $username = test_input($_SESSION['username']);
        $recieverId = test_input($_SESSION["recieverId"]);
        $sql = "SELECT kommentarer.comment,annonser.username FROM kommentarer INNER JOIN annonser ON kommentarer.senderId = annonser.id WHERE kommentarer.recieverId = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$recieverId]);
        ?>
        <!-- Alternative syntax för conditionals -->
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
            <!-- -->
            <p> <strong> <a href="profile.php?profile= <?php $row['username'];?>"><?php $row['username'];?></a>  </strong> kommenterar: <br>
                <?php $row["comment"];?>
            </p>
        <?php endwhile; ?>

</article>
