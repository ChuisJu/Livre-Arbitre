
<?php 

include '../inc/config.php';
include '../inc/db_conn.php';

if($_GET['action'] == "add"){

    echo 
    '<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="../css/header.css">
            <link rel="stylesheet" href="../css/footer.css">
            <link rel="stylesheet" href="../css/login.css">
            <link rel="stylesheet" href="../css/gridn.css">

            <!-- SCRIPT -->

            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <title></title>
        </head>
        <body>
            ';
            
            include "../inc/header.php";

            echo '

            <!-- MAIN CONTENT -->

            <div class="main">
                <div class="container"><br><br><br>
    				<div class ="grille">
    		<div class="formulaire"><form method="post" action="auteurs.php?action=add">
                <fieldset class="formulaire">
                    <fieldset class="formulaire">
                    <legend>Ajoutez un genre</legend>

                        <label for="nom">Nom de l\'auteur :</label><br>
                        <input type="text" id="nom" name="nom" autofocus required>
                        <br>
                        <label for="prenom">Prénom de l\'auteur :</label><br>
                        <input type="text" id="prenom" name="prenom" autofocus required>
                        <br>
                </fieldset>
                <br>
                <div align="center">
                    <button class="formulaire" type="submit" name="submit">Confirmer</button></fieldset>
                </div>
            </form></div></div>
            <br><br><br>

                </div>
                <div align="center">
                    <a href="index.php">Revenir sur le panel administrateur</a>
                </div>
            </div>';

            include "../inc/footer.php";

            echo '
        </body>
    </html>';

    if(isset($_POST['submit'])){
        if(isset($_POST['nom'])){
            if(isset($_POST['prenom'])){


                $sql = 'INSERT INTO personne (`nom`, `prenom`) VALUES ("' . $_POST['nom'] . '", "' . $_POST['prenom'] . '")';
                $link->query($sql);

                echo "<script>alert('Auteur inséré avec succès !');</script>";

                
            }
        }
    }
}

if($_GET['action'] == "update"){

    if(isset($_GET['show'])){
        $row = mysqli_query($link, 'SELECT * FROM personne');
        
        echo 
        '<!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <!-- CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="../css/header.css">
                <link rel="stylesheet" href="../css/footer.css">
                <link rel="stylesheet" href="../css/login.css">
                <link rel="stylesheet" href="../css/gridn.css">

                <!-- SCRIPT -->

                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                <title></title>
            </head>
            <body>
                ';

                include "../inc/header.php";

                echo '

                <!-- MAIN CONTENT -->

                <div class="container">
                    <div align="center">
                    <h1 class="title">Administration</h1>
                </div>

                </br>
';

?>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Identifiant de l'auteur</th>
                    <th scope="col">Nom de l'auteur</th>
                    <th scope="col">Prénom de l'auteur</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    while ($auth = mysqli_fetch_array($row, MYSQLI_ASSOC)) {
                ?>
                  <tr>
                    <td><?php echo $auth['idPersonne'] ?></td>
                    <td><?php echo $auth['nom'] ?></td>
                    <td><?php echo $auth['prenom'] ?></td>

                    <td><?php echo '<a href="auteurs.php?action=update&id=' . $auth['idPersonne'] . '">Modifier <i class="fa fa-pencil"></i></a>'; ?></td>
                    <td><?php echo '<a href="auteurs.php?action=delete&id=' . $auth['idPersonne'] . '">Supprimer <i class="fa fa-trash"></i></a>'; ?></td>
                  </tr>

                  <?php
                    }
                  ?>
                </tbody>
            </table>
            </br>
            <div align="center">
                <a href="index.php">Revenir sur le panel administrateur</a>
            </div>
    </div>
<?php

            include "../inc/footer.php";

            echo '
        </body>
    </html>';
                }
    
}

if($_GET['action'] == "delete"){
    if(isset($_GET['id'])){
        
        $intid = (int)$_GET['id'];
        
        $link->query('DELETE FROM personne WHERE idPersonne = ' . $intid);
            
        
        echo "<script>alert('Auteur supprimé avec succès !');</script>";

        header('location: auteurs.php?action=update&show');
    }
}


if($_GET['action'] == "update"){
    if(isset($_GET['id'])){
        
        $intid = (int)$_GET['id'];
        
        $row2 = mysqli_query($link, 'SELECT * FROM personne WHERE idPersonne = ' . $intid);
        $auteur = mysqli_fetch_array($row2, MYSQLI_ASSOC);

        echo
        '<!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <!-- CSS -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="../css/header.css">
                <link rel="stylesheet" href="../css/footer.css">
                <link rel="stylesheet" href="../css/login.css">
                <link rel="stylesheet" href="../css/gridn.css">

                <!-- SCRIPT -->

                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                <title></title>
            </head>
            <body>
                ';

                include "../inc/header.php";

                echo '

                <!-- MAIN CONTENT -->

                <div class="main">
                    <div class="container"><br><br><br>
                        <div class ="grille">
                <div class="formulaire"><form method="post" action="auteurs.php?action=update&id=' . $intid . '">
                    <fieldset class="formulaire">
                        <fieldset class="formulaire">
                        <legend>Modifier un auteur</legend>
                            <label for="name">Nom de l\'auteur :</label><br>
                            <input type="text" id="name" name="nom" value="' . $auteur['nom'] . '" autofocus required>
                            <br>
                            <label for="name">Prénom de l\'auteur :</label><br>
                            <input type="text" id="prenom" name="prenom" value="' . $auteur['prenom'] . '" autofocus required>
                            <br>
                    </fieldset>
                    <br>
                    <div align="center">
                        <button class="formulaire" type="submit" name="submit">Confirmer</button></fieldset>
                    </div>
                </form></div></div>
                <br><br><br>

                    </div>
                    <div align="center">
                        <a href="index.php">Revenir sur le panel administrateur</a>
                    </div>
                </div>';

                include "../inc/footer.php";

                echo '
            </body>
        </html>';

        if(isset($_POST['submit'])){
            if(isset($_POST['nom'])){
                if(isset($_POST['prenom'])){
                            
                    $sql = 'UPDATE personne SET nom = "' . $_POST['nom'] . '", prenom = "' . $_POST['prenom'] . '" WHERE idPersonne = ' . $intid;
                    $link->query($sql);
                    
                    echo "<script>alert('Auteur modifié avec succès !');</script>";

                }
            }
        }
    }
}
?>