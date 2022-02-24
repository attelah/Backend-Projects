<?php
if (isset($_POST['like'])) {
    // Get total likes
    $likedAnnons = $_POST['liked'];
    $userId = $_SESSION['userId'];
    $sql = 'SELECT likes FROM annonser WHERE id=?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$likedAnnons]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalLikes = $row['likes'];

    // Check if post is already liked or if own post
    $sql = 'SELECT annonsId FROM likes WHERE userId=?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $result = $row['annonsId'];

    if (!$result && $result !== $userId) {
        // Update likes
        $n = $totalLikes + 1;
        $sql = 'UPDATE annonser SET likes=? WHERE id=?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$n, $likedAnnons]);
        // Store data who liked the post in table 'likes'
        $sql = 'INSERT INTO likes (userId, annonsId) VALUES (?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userId, $likedAnnons]);
    }

}

// DISLIKE CODE

if (isset($_POST['dislike'])) {
    // Get total likes
    $likedAnnons = $_POST['liked'];
    $userId = $_SESSION['userId'];
    $sql = 'SELECT dislikes FROM annonser WHERE id=?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$likedAnnons]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalDislikes = $row['dislikes'];

    // Check if post is already liked or if own post
    $sql = 'SELECT annonsId FROM dislikes WHERE userId=?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $result = $row['annonsId'];

    if (!$result && $result !== $userId) {
        // Update likes
        $n = $totalDislikes + 1;
        $sql = 'UPDATE annonser SET dislikes=? WHERE id=?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$n, $likedAnnons]);
        // Store data who liked the post in table 'likes'
        $sql = 'INSERT INTO dislikes (userId, annonsId) VALUES (?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userId, $likedAnnons]);
    }

}
?>