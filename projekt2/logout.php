<?php include "handy_method.php"; ?>

logging out...

<?php
session_destroy();
header("Refresh:1; url=index.php");
?>