<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/index.css">

        <!-- SCRIPT -->

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <title></title>
    </head>
    <body>

        <?php
        include 'inc/header.php';
        include 'inc/db_conn.php';
        ?>
        <!-- MAIN CONTENT -->

<?php
    $res = $link->query("SELECT livre.titre,livre.isbn,personne.prenom,personne.nom FROM livre JOIN auteur ON auteur.isbn =livre.isbn JOIN personne ON personne.idPersonne = auteur.idPersonne JOIN roles ON auteur.idRole=roles.idRole WHERE role='Ecrivain'");
    if($res)
    {
        echo'<div class="main"><div class="container"><br>';
        $i=1;
        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
        {
            if($i%3==1)
            {
                echo '<div class="row">';
            }
                    echo'<div class="col"><div class="panel1">';
                                echo '<a href="detail.php?isbn='.$row["isbn"].'"><img src="img/'.$row["isbn"].'.jpg"></a><br>';
                                echo 'Titre : '.$row["titre"].'<br>';
                                echo 'Auteur : '.$row["prenom"].' '.$row["nom"].'<br><br>';
                                
                        echo'</div></div>';
            if($i%3==0)
            {
                echo '</div>';
            }
            $i++;
        }
    }
    echo '</div></div></div>';
?>

        <?php include 'inc/footer.php'; ?>
    </body>
</html>

<?php

if(isset($_GET['disconnected'])){
    echo "<script>alert('Déconnecté avec succès');</script>";
}

if(isset($_GET['error'])){
    echo "<script>alert('Problème surevnu.');</script>";
}

if(isset($_GET['success'])){
    echo "<script>alert('Formulaire envoyé avec succès');</script>";
}

?>