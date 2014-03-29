<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['id']);
$_SESSION['notice'] = "Oled edukalt välja logitud!";
header('Location: index.php');
?>
