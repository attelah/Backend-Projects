logging out...
<?php
$username =($_SESSION['username']);

session_destroy();

header("Refresh:1; url=index.php");
?>