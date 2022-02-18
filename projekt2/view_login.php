<article>

<form action="login.php" method="GET">
Användarnamn: <input type="text" name="username"><br>
lösenord: <input type="password" name="password"><br>
<input type="hidden" name="page" value="login">
<input type="submit" value="Login">
</form>
Inget konto? <a href="login.php?page=register">Registrera dig här</a><br>
<?php

if(!empty($_REQUEST['username']) && !empty($_REQUEST['password']))
{
$username = test_input($_REQUEST["username"]);
$password = test_input($_REQUEST["password"]);
$password = hash("sha256", $password);

$sql = "SELECT `id`,`username`,`password`,`fullname`  FROM `annonser` WHERE `username` = ? AND `password` = ?";// SQL för att "prata" med databasen
$stmt = $conn->prepare($sql);
$stmt->execute([$username,$password]);

if($row = $stmt->fetch(PDO::FETCH_ASSOC))
{       
    print("Välkommen tillbaka ".$row['fullname']."!<br>");
    print("Du blir omdirigerad till din profilsida om 5 sekunder");
    //spara username i sessionen för att hålla login aktiv
    $_SESSION['username'] = $username; 
    $_SESSION['recieverID'] = $row['id'];                   
    header("Refresh:1; url=profile.php");
    //To do: Loggout  knapp i headern med session_destroy
} 
}
?>
</article> 
