<?php

    require 'config.php';
    
    $link = mysqli_connect($CONFIG['dbhost'], $CONFIG['dbuser'], $CONFIG['dbpwd'], $CONFIG['dbname']);
    if(!$link){
        echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
        echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
        echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    mysqli_set_charset($link,'utf8');

?>