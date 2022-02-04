<article>

<?php
// Koden lånad från https://stackoverflow.com/questions/6557980/how-can-i-display-latest-uploaded-image-first-phpcss
$path = "bilder/";
$files = scandir($path);
$ignore = array('Thumbs.db', '.', '..');

# removing ignored files
$files = array_filter($files, function($file) use ($ignore) {return !in_array($file, $ignore);});

# getting the modification time for each file
$times = array_map(function($file) use ($path) {return filemtime("$path/$file");}, $files);

# sort the times array while sorting the files array as well
array_multisort($times, SORT_DESC, SORT_NUMERIC, $files);

  echo "<h2>Nuvarande profilbild</h2>";
  echo '<img width="100px" src="bilder/' . $files[0] . '" />';
  echo "<h2>Tidigare profilbilder</h2>";
foreach ($files as $file) {
  echo '<img width="100px" src="bilder/' . $file . '" />';
}

?>

<h2>Byt profilbild</h2>

<form action="profile.php" method="post" enctype="multipart/form-data">
  Ladda upp en ny profilbild:
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  <input type="submit" value="Upload Image" name="submit"><br>
</form>

<?php
$target_dir = "bilder/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "<br>File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "<br>File is not an image.";
    $uploadOk = 0;
  }

// Check if file already exists
if (file_exists($target_file)) {
  echo "<br>Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "<br>Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
// Endast JPG och PNG
if($imageFileType != "jpg" && $imageFileType != "png") {
  echo "<br>Sorry, only JPG & PNG files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "<br>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    header("refresh:2; url=profile.php");
  } else {
    echo "<br>Sorry, there was an error uploading your file.";
  }

}
}
?>

<h2>Uppladdade filer:</h2>
<?php
// Var ska bilderna lagras
$katalog = "bilder/";
// Lista tidigare profilbilder
$innehall = scandir($katalog);
// Skriv ut innehållet av katalogen
foreach ($innehall as $rad) {
  // Om file extension är uppercase så visas den inte på listan, så checkar alla som lowercase
  // Filtrerar . och .. och allt annat än jpg och png från listan
  $lowercase = strtolower($rad);
  if (strstr($lowercase, "jpg") || (strstr($lowercase, "png"))) {
    echo "<a href='./".$katalog."/".$rad."'>".$rad."</a><br>";
  }

}
?>

</article>