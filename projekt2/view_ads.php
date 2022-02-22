<article>
<h2>Här hittar du våra mest desperata singlar!</h2>

<form action="index.php" method="post">
<p>Sortera annonser enligt:</p>
  <input type="radio" id="salary" name="orderby" value="salary">
  <label for="salary">Inkomst</label><br>
  <input type="radio" id="city" name="orderby"  value="city">
  <label for="city">Hemstad</label><br>
  <input type="radio" id="pref" name="orderby"  value="preference">
  <label for="preference">Preferens</label><br> 
  <br>
  <p>Ordning:</p>
  <input type="radio" id="desc" name="descasc"  value="DESC">
  <label for="desc">123 a->z</label><br>
  <input type="radio" id="asc" name="descasc"  value="ASC">
  <label for="asc">321 z->a</label><br> 
<br>
<input type="submit" value="Sortera">
</form>

<?php $username = ($_SESSION['username']);?>


<?php

$könis = array("Män", "Kvinnor", "Män och Kvinnor", "Vad som helst!", "vill inte specifiera");

if(!empty($_REQUEST['orderby']) && !empty($_REQUEST['descasc']))
{

$order = test_input($_REQUEST["orderby"]);
$descasc = test_input($_REQUEST["descasc"]);

switch ($order)
 {
  case "salary":
    $sql = "SELECT * FROM annonser ORDER BY salary $descasc LIMIT 30";
$stmt = $conn->query($sql);
  $stmt->execute();
    break;
  case "city":
    $sql = "SELECT * FROM annonser ORDER BY city $descasc LIMIT 30";
$stmt = $conn->query($sql);
  $stmt->execute();
    break;
  case "preference":
    $sql = "SELECT * FROM annonser ORDER BY preference $descasc LIMIT 30";
    $stmt = $conn->query($sql);
      $stmt->execute();
    break;
  
  default:
  $sql = "SELECT * FROM annonser ORDER BY salary DESC LIMIT 30";
    $stmt = $conn->query($sql);
      $stmt->execute();
  }
}
elseif((empty($_REQUEST['orderby']) && empty($_REQUEST['descasc'])))
{
$order = "salary";
  $sql = "SELECT * FROM annonser ORDER BY $order DESC LIMIT 30";
  $stmt = $conn->query($sql);
  $stmt->execute([$order]);
}
?>

<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?> 

 <?php print("<br>");
  print("Användarnamn: ".$row['username']."<br>"); 
  print("Namn: ".$row["fullname"]."<br>"); 
  print("Stad: ".$row["city"]."<br>");
  $preferens =  $row["preference"];
  $preferens = $könis[$preferens-1];
  print("Jag söker efter: ".$preferens."<br>"); 
  print("Mer om mig: ".$row["aboutme"]."<br>"); 
  print("<br>")
  ?>

  <?php if(!isset($_SESSION['username']) == null) :
    print("Inkomst: ".$row["salary"]."€/år <br>"); 
    print("Kontakta mig: ".$row["email"]."<br>"); 
    print("<br>"); 
  ?>

 <h5>Likes:</h5>
 <form>
<form action='index.php' method='POST'>
<input type='hidden' name='liked' value=".$row['id'].">
<input type='submit' name='submit' value='Like'>
</form>

<?php 
if(isset($_POST['submit']))
{
$likedAnnons = $_POST['liked'];
echo $_POST['liked'];
}
?>

<?php endif;?>
<?php endwhile; ?>

</article>
