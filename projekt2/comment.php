<?php 
if(isset($_REQUEST['submitComment'])){

$addComment = $conn->prepare('INSERT INTO kommentarer
(senderId , recieverId , comment)
VALUES (:senderId, :recieverId , :comment)');
//binder värdena till placeholders
$comment = test_input($_REQUEST['comment']);
$addComment->bindParam(":senderId" , $_SESSION['userId'], PDO::PARAM_STR);
$addComment->bindParam(":recieverId" , $_REQUEST['commentId'], PDO::PARAM_STR);
$addComment->bindParam(":comment" , $comment, PDO::PARAM_STR);
//kör query
$addComment->execute();
}

?>