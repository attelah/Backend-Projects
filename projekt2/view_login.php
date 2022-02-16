<article>

<form method="get" action="login.php">
Användarnamn: <input type="text" name="username"><br>
lösenord: <input type="password" name="password"><br>
<input type="hidden" name="page" value="login">
<input type="submit" value="Login">
</form>
Inget konto? <a href="view_register.php?page=register">Registrera dig här</a>
<?php

if(!empty($_REQUEST['username']) && !empty($_REQUEST['password']))
{
$username = test_input($_REQUEST["username"]);
$password = test_input($_REQUEST["password"]);
$password = hash("sha256", $password);

$sql = "SELECT `username`,`password`,`fullname`  FROM `annonser` WHERE `username` = ? AND `password` = ?";// SQL för att "prata" med databasen
$stmt = $conn->prepare($sql);
$stmt->execute([$username,$password]);

if($stmt->fetchObject())
{       
    print("Välkommen tillbaka ".$row['fullname']);
    //spara username i sessionen för att hålla login aktiv
    $_SESSION['username']=session_id();                    
    header("refresh:5, url=profile.php");
    //To do: Logga ut med session_destroy
} 
}
?>
</article> 
