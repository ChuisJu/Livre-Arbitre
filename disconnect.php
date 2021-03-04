<?php

error_reporting(0);

session_start();

if($_SESSION['open'] == 1){
    $_SESSION['open'] = "";
    $_SESSION['numcarte'] = "";
    $_SESSION['username'] = "";
    $_SESSION['password'] = "";

    session_destroy();

} 

header("location: index.php?disconnected");

?>