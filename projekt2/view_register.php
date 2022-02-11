<article>

<form action="index.php" method="get">
        Användarnamn: <input type="text" name="username"> <br>
        Lösenord: <input type="text" name="password"><br>
        E-post: <input type="email" name="email"><br>
        <h2>Info till din profil:</h2><br>
        Ditt hela namn: <input type="text" name="fullname"><br>
        Hemstad: <input type="text" name="city"><br>
        Årlig inkomst: <input type="number" name="salary"><br>
        <label for="preference">Jag söker efter:</label>
        <select id="preference" name="preference">
            <option value="1">Män</option>
            <option value="2">Kvinnor</option>
            <option value="3">Män och Kvinnor</option>
            <option value="4">Vad som helst!</option>
            <option value="5">Vill inte specifiera</option>
        </select><br>
        Berätta om dig själv: <input type="text" name="aboutme"><br>
        <input type="submit" name="skicka" value="Registrera dig">
    </form>

<?php

if(!empty($_REQUEST['username']) && !empty($_REQUEST['password']) && !empty($_REQUEST['email']))
{
$username = test_input($_REQUEST["username"]);
$email = test_input($_REQUEST["email"]);
$password = test_input($_REQUEST["password"]);
$password = hash("sha256", $password);
$fullname = test_input($_REQUEST["fullname"]);
$city = test_input($_REQUEST["city"]);
$salary = test_input($_REQUEST["salary"]);
$aboutme = test_input($_REQUEST["aboutme"]);
$preference = $_REQUEST["preference"];

$sql = "INSERT INTO annonser(id, username, fullname, password, email, city, aboutme, salary, preference) VALUES (NULL,?,?,?,?,?,?,?,?);";
$stmt = $conn->prepare($sql);
    if ($stmt->execute([$username, $fullname, $password, $email, $city, $aboutme, $salary, $preference])) 
    {  
    print("Du har registrerats!");
    }
}
?>
</article>