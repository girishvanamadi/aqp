<?php
session_start();
$email99= $_SESSION['emails'];

session_destroy();
echo "<script>location.href='http://localhost/JUMP/login/login.php'</script>";

?>