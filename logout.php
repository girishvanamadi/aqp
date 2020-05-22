<?php
session_start();
$email1= $_SESSION['gen'];
$email2= $_SESSION['dis'];
$email3= $_SESSION['ad'];//add
$email4= $_SESSION['edi'];//edit
session_destroy();
echo "<script>location.href='http://localhost/JUMP/login/login.php'</script>";

?>