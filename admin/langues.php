
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
    		<div class="formulaire"><form method="post" action="langues.php?action=add">
                <fieldset class="formulaire">
                    <fieldset class="formulaire">
                    <legend>Ajoutez une langue</legend>
                        <label for="nom">Langue :</label><br>
                        <input type="text" id="langue" name="langue" autofocus required>
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
        if(isset($_POST['langue'])){


                $sql = 'INSERT INTO langue (`language`) VALUES ("' . $_POST['langue'] . '")';
                $link->query($sql);

                echo "<script>alert('Langue insérée avec succès !');</script>";

                
            
        }
    }
}

if($_GET['action'] == "update"){

    if(isset($_GET['show'])){
        $row = mysqli_query($link, 'SELECT * FROM langue');
        
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
                    <th scope="col">Identifiant de la langue</th>
                    <th scope="col">Langue</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    while ($lang = mysqli_fetch_array($row, MYSQLI_ASSOC)) {
                ?>
                  <tr>
                    <td><?php echo $lang['idLangue'] ?></td>
                    <td><?php echo $lang['language'] ?></td>

                    <td><?php echo '<a href="langues.php?action=update&id=' . $lang['idLangue'] . '">Modifier <i class="fa fa-pencil"></i></a>'; ?></td>
                    <td><?php echo '<a href="langues.php?action=delete&id=' . $lang['idLangue'] . '">Supprimer <i class="fa fa-trash"></i></a>'; ?></td>
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
        
        $link->query('DELETE FROM langue WHERE idLangue = ' . $intid);
            
        
        echo "<script>alert('Langue supprimée avec succès !');</script>";

        header('location: langues.php?action=update&show');
    }
}


if($_GET['action'] == "update"){
    if(isset($_GET['id'])){
        
        $intid = (int)$_GET['id'];
        
        $row2 = mysqli_query($link, 'SELECT * FROM langue WHERE idLangue = ' . $intid);
        $lang = mysqli_fetch_array($row2, MYSQLI_ASSOC);

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
                <div class="formulaire"><form method="post" action="langues.php?action=update&id=' . $intid . '">
                    <fieldset class="formulaire">
                        <fieldset class="formulaire">
                        <legend>Modifier une langue</legend>
                            <label for="name">Langue :</label><br>
                            <input type="text" id="langue" name="langue" value="' . $lang['language'] . '" autofocus required>
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
            if(isset($_POST['langue'])){
                            
                    $sql = 'UPDATE langue SET `language` = "' . $_POST['langue'] . '" WHERE idLangue = ' . $intid;
                    $link->query($sql);
                    
                    echo "<script>alert('Langue modifiée avec succès !');</script>";

                
            }
        }
    }
}
?>