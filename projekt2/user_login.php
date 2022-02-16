<article>

<form method="get" action="index.php">
Användarnamn: <input type="text" name="username"><br>
lösenord: <input type="password" name="password"><br>
<input type="submit" value="Login">
</form>

<?php

if(!empty($_REQUEST['username']) && !empty($_REQUEST['password']))
{
$username = test_input($_REQUEST["username"]);
$password = test_input($_REQUEST["password"]);
$password = hash("sha256", $password);

$sql = "SELECT * FROM `annonser` WHERE `username` LIKE $username AND `password` LIKE $password";// SQL kommandot vi vill köra
$stmt = $conn->query($sql); // Query är metoden. Returnerar FALSE eller mysqli_result objekt

echo $username;
echo $password;

while($row = $stmt->fetch(PDO::FETCH_ASSOC))// fetch_assoc() är en metod av mysqli_result  
    {
if($username == $controlname && $ $password == $controlpword)
        {    
    session_start();
    $_SESSION['username']=session_id();

    
    
        print("Välkommen tillbaks: ".$row['salary']."<br>");

    
        }
    }
}
?>
</article>