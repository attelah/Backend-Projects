<?php 
if(isset($_REQUEST['submitComment'])){

$addComment = $conn->prepare('INSERT INTO kommentarer
(senderId , receiverId , comment)
VALUES (:senderId, :receiverId , :comment)');
//binder värdena till placeholders
$addComment->bindParam(":senderId" , $_SESSION['userId'], PDO::PARAM_INT);
$addComment->bindParam(":receiverId" , $_REQUEST['commentId'], PDO::PARAM_INT);
$addComment->bindParam(":comment" , $_REQUEST['comment'], PDO::PARAM_STR);
//kör query
$addComment->execute();
}

?>