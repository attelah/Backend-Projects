<?php 
if(isset($_REQUEST['submitComment'])){

$addComment = $conn->prepare('INSERT INTO kommentarer
(senderId , receiverId , comment)
VALUES (:senderId, :receiverId , :comment)');
//binder värdena till placeholders
$addComment->bindParam(":senderId" , test_input($_SESSION['userId']), PDO::PARAM_STR);
$addComment->bindParam(":receiverId" , $_REQUEST['commentId'], PDO::PARAM_STR);
$addComment->bindParam(":comment" , test_input($_REQUEST['comment']), PDO::PARAM_STR);
//kör query
$addComment->execute();
}

?>