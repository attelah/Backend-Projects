<article>

<form action="index.php" method="get">
        Användarnamn: <input type="text" name="username"> <br>
        Lösenord: <input type="text" name="password"><br>
        E-post: <input type="email" name="email"><br>
        <input type="submit" name="skicka" value="Registrera dig">
    </form>

<?php

if(!empty($_REQUEST['username']) && !empty($_REQUEST['password']) && !empty($_REQUEST['email']))
$username = test_input($_GET["username"]);
$email = test_input($_GET["email"]);

$sql = "INSERT INTO annonser(id, username, fullname, password, email, city, aboutme, salary, preference) VALUES (NULL,?,?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql);
if ($stmt->execute([$username, $fullname, $password, $email, $city, $aboutme, $salary, $preference])) 
{  
    print("Du har registrerats!");
}
?>
</article>