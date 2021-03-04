<?php

session_start();

$_SESSION['open'] = "";
$_SESSION['numcarte'] = "";
$_SESSION['username'] = "";
$_SESSION['password'] = "";

echo "Vous avez été déconnecté avec succès !\n Vous allez être redirigé d'ici peu..";
sleep(5);
header("location: index.php");
?>