<article>
<h2>Här hittar du våra mest desperata singlar!</h2>

<form action="index.php" method="post">
<p>Sortera annonser enligt:</p>
  <input type="radio" id="salary" name="orderby" value="salary" checked="checked">
  <label for="salary">Inkomst</label><br>
  <input type="radio" id="city" name="orderby" value="city">
  <label for="city">Hemstad</label><br>
  <input type="radio" id="pref" name="orderby" value="preference">
  <label for="preference">Preferens</label><br> 
  <input type="radio" id="likes" name="orderby" value="likes">
  <label for="likes">Likes</label><br> 
  <input type="radio" id="dislikes" name="orderby" value="dislikes">
  <label for="dislikes">Dislikes</label><br> 
  <br>
  <p>Ordning:</p>
  <input type="radio" id="desc" name="descasc" value="DESC" checked="checked">
  <label for="desc">123 a->z</label><br>
  <input type="radio" id="asc" name="descasc" value="ASC">
  <label for="asc">321 z->a</label><br>
<br>
<label for="preference">Hur många annonser vill du se?</label>
        <select id="amount" name="amount">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="30">30</option>
        </select><br> 

<br>
<input type="submit" value="Sortera">
</form>

<?php

$könis = array("Män", "Kvinnor", "Män och Kvinnor", "Vad som helst!", "vill inte specifiera");

if(!empty($_REQUEST['orderby']) && !empty($_REQUEST['descasc']))
{

$order = test_input($_REQUEST["orderby"]);
$descasc = test_input($_REQUEST["descasc"]);
$srclimit = test_input($_REQUEST["amount"]);

switch ($order)
 {
  case "salary":
    $sql = "SELECT * FROM annonser ORDER BY salary $descasc LIMIT $srclimit";
$stmt = $conn->query($sql);
  $stmt->execute();
    break;
  case "city":
    $sql = "SELECT * FROM annonser ORDER BY city $descasc LIMIT $srclimit";
$stmt = $conn->query($sql);
  $stmt->execute();
    break;
  case "preference":
    $sql = "SELECT * FROM annonser ORDER BY preference $descasc LIMIT $srclimit";
    $stmt = $conn->query($sql);
      $stmt->execute();
    break;
  case "likes":
    $sql = "SELECT * FROM annonser ORDER BY likes $descasc LIMIT $srclimit";
    $stmt = $conn->query($sql);
      $stmt->execute();
    break;
  case "dislikes":
    $sql = "SELECT * FROM annonser ORDER BY dislikes $descasc LIMIT $srclimit";
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


 <?php 
  print("<br><br><br>");
  print("Användarnamn: ".$row['username']."<br>"); 
  print("Namn: ".$row["fullname"]."<br>"); 
  print("Stad: ".$row["city"]."<br>");
  $preferens =  $row["preference"];
  $preferens = $könis[$preferens-1];
  print("Jag söker efter: ".$preferens."<br>"); 
  print("Mer om mig: ".$row["aboutme"]."<br>"); 
  ?>

  <?php if(!isset($_SESSION['username']) == null) :
    print("Inkomst: ".$row["salary"]."€/år <br>"); 
    print("Kontakta mig: ".$row["email"]); 
  ?>


<?php

if ($row['id'] !== $_SESSION['userId']) {
echo "<br><br>";
echo "<form action='index.php' method='POST'>";
echo "<textarea name='comment' cols='30' rows='3'></textarea>";
echo "<input type='hidden' name='commentId' value=" . $row['id'] . ">";
echo "<br>";
echo "<input type='submit' name='submitComment' value='Submit Comment'>";
echo "</form>";
}

echo "<h2>+" . $row['likes'] . " -" . $row['dislikes'] . "</h2>";
if ($row['id'] !== $_SESSION['userId']) {
echo "<form action='index.php' method='POST'>";
echo "<input type='hidden' name='liked' value=" . $row['id'] . ">";
echo "<input type='submit' name='like' value='Like'>";
echo "<input type='submit' name='dislike' value='Dislike'>";
echo "</form>";
}
?>

<?php endif;?>
<?php endwhile; ?>
<?php include "like.php"?>
<?php include "comment.php"?>
</article>
