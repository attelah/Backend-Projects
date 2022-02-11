<article>

<form method="get" action="index.php">
Användarnamn: <input type="text" name="username"><br>
lösenord: <input type="password" name="password"><br>
<input type="submit" value="Login">
</form>

<?php

if(!empty($_REQUEST['username']) && !empty($_REQUEST['password']))
{
$uname = test_input($_REQUEST["username"]);
$pword = test_input($_REQUEST["password"]);
$pword = hash("sha256", $pword);

$sql = "SELECT*FROM annonser";// SQL kommandot vi vill köra
$stmt = $conn->query($sql); // Query är metoden. Returnerar FALSE eller mysqli_result objekt

$controlname = $stmt->fetch(PDO::FETCH_OBJ,'username');
$controlpword = $stmt->fetch(PDO::FETCH_OBJ,'password');

if($uname == $controlname && $ $pword == $controlpword)
{    
    session_start();
    $_SESSION['username']=session_id();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC))// fetch_assoc() är en metod av mysqli_result  
    {
        print("Välkommen tillbaks: ".$row['salary']."<br>");

    }
}

}
?>
</article>