<?php
// En funktion som tar bort whitespace med trim,
// backslashes (escape char), och konverterar
// eventuella skadliga html tecken som < eller > till deras html represetantationer
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>