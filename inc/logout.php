<?php
session_start();
session_destroy();
header('Location: inc/login.php');
exit;
?>
