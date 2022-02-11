<article>
<h2>Annonserna</h2>
<p>Här kommer data från databasen</p>

<?php



$sql = "SELECT*FROM annonser";// SQL kommandot vi vill köra
$stmt = $conn->query($sql); // Query är metoden. Returnerar FALSE eller mysqli_result objekt

while($row = $stmt->fetch(PDO::FETCH_ASSOC))// fetch_assoc() är en metod av mysqli_result  
{ 
  print("Användarnamn: ".$row['username']."<br>"); // Endast ett resultat? Lämna bort while
}
?>


}


?>

</article>